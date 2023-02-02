<?php
class dossier {
    private $DB;

	public function __construct()
	{
		$this->DB = new Database;
	}
	public function getAlldocument($id)
	{
		$query = "SELECT * FROM document WHERE ID_USER = :id";
		$data = $this->DB->read($query,$arr);
        return $data;		
	}

	public function getdocument($id)
	{
		$arr['id'] = $id;
		$query = "SELECT * FROM document WHERE ID = :id LIMIT 1";
		$data = $this->DB->read($query,$arr);
        return $data;
	}
    
	public function addDocument($name,$age_date,$situation_f,$adress,$date_depart,$date_darrive,$type_pass,$num_pass,$nationalite,$type_visa)
	{
		$arr['name'] = $name;
		$arr['age_date'] = $age_date;
		$arr['situation_f'] = $situation_f;
		$arr['adress'] = $adress;
		$arr['date_depart'] = $date_depart;
		$arr['date_darrive'] = $date_darrive;
		$arr['type_pass'] = $type_pass;
		$arr['num_pass'] = $num_pass;
		$arr['nationalite'] = $nationalite;
		$arr['type_visa'] = $type_visa;
		$query = "INSERT INTO document (name,age_date,situation_f,adress,date_depart,date_darrive,type_pass,num_pass,nationalite,type_visa) values (:name,:age_date,:EMAIL,:situation_f,:adress,:date_depart,:date_darrive,:type_pass,:num_pass,:nationalite,:type_visa)";
		$data = $this->DB->read($query,$arr);
	}

	public function updateDocument($name,$age_date,$situation_f,$adress,$date_depart,$date_darrive,$type_pass,$num_pass,$nationalite,$type_visa)
	{
		$arr['name'] = $name;
		$arr['age_date'] = $age_date;
		$arr['situation_f'] = $situation_f;
		$arr['adress'] = $adress;
		$arr['date_depart'] = $date_depart;
		$arr['date_darrive'] = $date_darrive;
		$arr['type_pass'] = $type_pass;
		$arr['num_pass'] = $num_pass;
		$arr['nationalite'] = $nationalite;
		$arr['type_visa'] = $type_visa;
		$query = "UPDATE document SET name =:name, age_date = :age_date, situation_f = :situation_f, adress = :adress, date_depart = :date_depart, date_darrive = :date_darrive, type_pass = :type_pass, num_pass =:num_pass , nationalite =:nationalite, type_visa = :type_visa";
		$data = $this->DB->read($query,$arr);
	}

	public function deleteDocument($id)
	{
		$arr['id'] = $id;
		$query = "DELETE FROM room WHERE ID = :id LIMIT 1";
		$data = $this->DB->read($query,$arr);
        return $data;
	}
}

 