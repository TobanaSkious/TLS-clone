<?php
class admin {
    function addsuite($POST){
        $arr['typesuite'] = $POST['typesuite'];
		$arr['idadmin'] = $POST['idadmin'];
        $query = "insert into suite (TYPE_SUITE,ID_ADMIN) values (:typesuite,:idadmin)";
		$data = $DB->write($query,$arr);
    }
    function addroom($POST){
		$DB = new Database();
		if(isset($_POST['typeroom']) && isset($_POST['capacite']) && isset($_POST['capacite'])){
			$arr['typeroom'] = $_POST['typeroom'];
			$arr['idadmin'] = $_SESSION['idadmin'];
			$arr['capacite'] = $_POST['capacite'];
			$arr['prix'] = $_POST['price'];
			$query = "insert into room (TYPE,ID_ADMIN,CAPACITE,prix) values (:typeroom,:idadmin,:capacite,:prix)";
			$data = $DB->write($query,$arr);
			// unset($arr['typeroom']);
			// unset($arr['idadmin']);
			// unset($arr['capacite']);
			// unset($arr['prix']);
			unset($arr);
		}
		unset($_POST['typeroom']);
		unset($_POST['capacite']);
		unset($_POST['capacite']);
    }

	function updateroom($POST){
		$DB = new Database();
		
		if(isset($_POST['typeroomupdate']) && isset($_POST['capaciteupdate']) && isset($_POST['priceupdate'])){
			
			$arr['typeroom'] = $_POST['typeroomupdate'];
			$arr['idadmin'] = $_SESSION['idadmin'];
			$arr['capacite'] = $_POST['capaciteupdate'];
			$arr['prix'] = $_POST['priceupdate'];
			$arr['idroom'] = $_POST['ghaber'];
			$query = "update room set TYPE = :typeroom, ID_ADMIN = :idadmin, CAPACITE = :capacite, prix = :prix where ID_R = :idroom" ;
			$data = $DB->write($query,$arr);
			unset($arr);
		}
		unset($_POST['typeroom']);
		unset($_POST['capacite']);
		unset($_POST['capacite']);

	}
    function supproom($GET){
		$DB = new Database();
		$arr['idroom']=$_GET['ID_R'];
		$query = "DELETE FROM room WHERE `ID_R` = :idroom";
		$data = $DB->write($query,$arr);
    }
    function suppUser(){

    }
	function showroom(){
		$DB = new Database();
		$query = "SELECT * FROM room ";
		$arr = [];
		$data = $DB->read($query,$arr);
		return $data;
	}
    function login(){
        $DB = new Database();
		$_SESSION['errorAdmin'] = "";
		
		if(isset($_POST['email']) && isset($_POST['password']))
		{
			$arr['email'] = $_POST['email'];
			$arr['password'] = $_POST['password'];
			$query = "SELECT * FROM admin WHERE EMAIL = :email && PASSWORD = :password LIMIT 1";
			$data = $DB->read($query,$arr);
			
			if(is_array($data))
			{
 				//logged in
 				$_SESSION['admin_name'] = $data[0]->ADMIN;
				$_SESSION['idadmin'] = $data[0]->ID_ADMIN;
                $_SESSION['loginA'] = "YES";

				header("Location:". ROOT . "roomA");
				die;
			}else{

				$_SESSION['errorAdmin'] = "wrong username or password";
			}
		}else{
			$_SESSION['errorAdmin'] = "please enter a valid email and password";
		}

	}

	function signup($POST)
	{

		$DB = new Database();
		$_SESSION['error'] = "";
		if(isset($POST['username']) && isset($POST['password']))
		{
			$arr['username'] = $POST['username'];
			$arr['password'] = $POST['password'];
			$arr['email'] = $POST['email'];
			$query = "insert into admin (USERNAME,PASSWORD,EMAIL) values (:username,:password,:email)";
			$data = $DB->write($query,$arr);
			if($data)
			{
				header("Location:". ROOT . "loginA");
				die;
			}

		}else{
			$_SESSION['error'] = "please enter a valid username and password";
		}
	}

    function check_log(){
        if(isset($_SESSION['loginA']))
        {
            return 1;
        }else{
            return 0;
        }
    }
	

	function logout()
	{
		//logged in
		unset($_SESSION['admin_name']);
        unset($_SESSION['loginA']);
        unset($_SESSION['idadmin']);
		header("Location:". ROOT . "loginA");
		die;
	}


    
}