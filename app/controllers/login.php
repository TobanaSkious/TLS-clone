<?php

Class Login extends Controller 
{

	function index()
	{   
        // $user = $this->loadModel("user");
        // if($user->check_log()==1){
        //     $data['stat'] = "logout";
        //     header("Location:". ROOT . "home");
        // }else{
        //     $data['stat'] = "login";
        // }
 	 	
 	 	$data['page_title'] = "Login";
		$this->view("login",$data);
	}

    function create($arr = [])
    {
        $user = $this->loadModel("user");
        for($i=0;$i<count($arr);$i++)
        {
            echo $arr[$i];
            echo "<br>";
        }
        echo call_user_func_array([$user,'getUsers'],$arr);
    }
}



