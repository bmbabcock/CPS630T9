<?php>

public class Response{
	private $response;
	public function __construct($resp){
		$this->response = $resp;
	}
	public function getNextRow(){
		return mysql_fetch_assoc($response);
	}
	public function getRow($rowNum){
		mysql_data_seek($reponse, $rowNum);
		return $this->getNextRow();
	}
	public function getFirstRow(){
		return $this->getRow(0);
	}
}
	