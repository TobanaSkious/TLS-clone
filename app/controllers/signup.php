<?php

Class signup extends Controller 
{
	function index()
	{
 	 	
 	 	$data['page_title'] = "Login";
          $user = $this->loadModel("user");
          if($user->check_log()==1){
              $data['stat'] = "logout";
          }else{
              $data['stat'] = "login";
          }
        
 	 	if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
            echo "<br". $_POST['email'];
 	 		$user = $this->loadModel("user");
 	 		$user->signup($_POST);
 	 	}
        
		$this->view("hotel/signup",$data);
	}

}