<?php>
/************************************************
* 	Response - A wrapper for the mysql result	*
*												*
*	Author: Byron Babcock						*
*	Date: 13/03/2012							*
************************************************/
public class Response{
	private $response;
	public function __construct($resp){
		$this->response = $resp;
	}
	public function getNextRow(){
		return mysql_fetch_assoc($response);
	}
	//getRow - returns the specified row
	//SideEffects - sets the index back to zero
	public function getRow($rowNum){
		mysql_data_seek($reponse, $rowNum);
		return $this->getNextRow();
	}
	//getFirstRow - returns the first row
	//SideEffects - sets the index back to zero
	public function getFirstRow(){
		return $this->getRow(0);
	}
}
	