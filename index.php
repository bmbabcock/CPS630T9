<?php 
//This manual includes in nessessary as it's not a class
include 'postLoginInfo.php'?>

<html>
	<head>
		<title>Familiar Stranger Login</title>
    </head>
    
	<body>
   
	<!-- this div required by fb I believe -->
	<div id="fb-root"></div>
	<?php
	include(mainpage.html);?>
	<script type="text/javascript">
	
	//Load sdk
	(function(d){
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
    }(document));

	//Init FB JavaScript sdk
	window.fbAsyncInit = function() {
		FB.init({appId: '182082218568438', channelUrl : '//www.team9labs.com/channel.php', status: true, cookie: true, xfbml: true});

		//Listen for and handle auth.statusChange events
		FB.Event.subscribe('auth.statusChange', function(response) {  
		  
		//User has auth'd your us and is logged into Facebook
		if (response.authResponse){
					
			//Get some info from open graph and display in hidden fields to be posted to the db
            FB.api('/me', function(me){
			
				//If ID has been provided
				if (me.id){
					document.getElementById("hidden-fi-field").value=me.id;					
				}
			  
				//If first name has been provided
				if (me.first_name){
					document.getElementById('hidden-fn-field').value=me.first_name;
				}
			  
				//If last name has been provided
				if (me.last_name){
					document.getElementById('hidden-ln-field').value=me.last_name;
				}
			
			//Post login info to server
			doAction();		
			});
			
			//Hide login, show logout
            document.getElementById('auth-loggedout').style.display = 'none';
            document.getElementById('auth-loggedin').style.display = 'block';
			
			} 
			//User has not auth'd us or is not logged into Facebook
			else{
				document.getElementById('auth-loggedout').style.display = 'block';
				document.getElementById('auth-loggedin').style.display = 'none';				
			}
        });

        //On click listeners for login link
        document.getElementById('auth-loginlink').addEventListener('click', function(){
			FB.login(function(response){
			
				//Needed to get the access token
				if (response.authResponse){
					var accesstoken = FB.getAuthResponse()['accessToken'];
					document.getElementById('hidden-at-field').value=accesstoken;
				} 	
			},
			//Scope of extra user information needed
			{scope: 'user_checkins, user_location'});
        });
		
		//On click listeners for login link
        document.getElementById('auth-logoutlink').addEventListener('click', function(){
			FB.logout();
			document.getElementById('ajaxDiv').innerHTML="";
        }); 		
}
   
//Function to create a XHR or ActiveX Object depending on users browser 	
function getXHR(){
		
	var req=null;
	
	try{
		req = new XMLHttpRequest();	
	}
	catch(e){
		try{
			req = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e){
			req = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
		
	return req;
}

//Execute an async POST to postLoginInfo.php to add auth info to db and session	
function doAction(){	
		
	var fname=document.getElementById("hidden-fn-field").value;
	var lname=document.getElementById('hidden-ln-field').value;
	var fbid=document.getElementById("hidden-fi-field").value;
	var accesstoken=document.getElementById('hidden-at-field').value;
	
	var req = getXHR();
		
	//Set up request
	req.onreadystatechange = function(){
			
		var ajaxDiv = document.getElementById("ajaxDiv");
		if(req.readyState==4){
			if (req.status==200){
				ajaxDiv.innerHTML = req.responseText;
			}
		}			
	}
	
	//URL
	var url = "postLoginInfo.php";
		
	//Parameters
	var parameters = "fname="+encodeURIComponent(fname)+"&lname="+encodeURIComponent(lname)+"&fbid="+encodeURIComponent(fbid)+"&accesstoken="+encodeURIComponent(accesstoken);
		
	//Open
	req.open("POST",url,true);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.send(parameters);
}
	</script>
	
	<!--Div containing authorization html, all hidden except login or logout-->
	<div id="auth-status">
		
		<!--Logout button, gets toggled between hidden/show-->
		<div id="auth-loggedout">
			<a href="#" id="auth-loginlink">Login</a>
		</div>
        
		<!--Login button, gets toggled between hidden/show-->
		<div id="auth-loggedin" style="display:none">    
			<a href="#" id="auth-logoutlink">logout</a>
		</div>	
		
		<!--Used to temp store user authorization fields before they're POST'd  -->
		<div id="hidden-div">
			<input type="hidden" id="hidden-at-field"  />
			<input type="hidden" id="hidden-fn-field"  />
			<input type="hidden" id="hidden-ln-field"  />
			<input type="hidden" id="hidden-fi-field"  />
		</div>
	
	</div>
	
	<!--Just for debugging, postLoginInfo.php should return login info here -->
	<div id="ajaxDiv"> </div>
	
    </body>
</html>
