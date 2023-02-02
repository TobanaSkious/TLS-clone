<?php 

Class Database
{

	// Method to connect to the database
	public function db_connect()
	{
		// try to connect to the database
		try{
			// Concatenate the database connection string
			$string = DB_TYPE .":host=".DB_HOST.";dbname=".DB_NAME.";";
			// Return the database connection object
			return $db = new PDO($string,DB_USER,DB_PASS);
			
		}catch(PDOExecption $e){
			// die and display the error message if the connection fails
			die($e->getMessage());
		}
	}



	// Method to read data from the database
	public function read($query,$data = [])
	{
		// Connect to the database
		$DB = $this->db_connect();
		// Prepare the SQL statement
		$stm = $DB->prepare($query);

		// If data array is empty
		if(count($data) == 0)
		{
			// Execute the query
			$stm = $DB->query($query);
			// Initialize a check variable
			$check = 0;
			// If the query is executed successfully, set the check variable to 1
			if($stm){
				$check = 1;
			}
		}else{
			// If the data array is not empty, execute the query with the data array
			$check = $stm->execute($data);
		}

		// If the query is executed successfully
		if($check)
		{
			// Fetch the results as an array of objects
			$data = $stm->fetchAll(PDO::FETCH_OBJ);
			// If the data array is not empty, return the data array
			if(is_array($data) && count($data) > 0)
			{
				return $data;
			}
			// Return false if the data array is empty
			return false;
		}else
		{
			// Return false if the query is not executed successfully
			return false;
		}
	}

	// Method to write data from the database
	public function write($query,$data = [])
	{

		$DB = $this->db_connect(); // Connect to the database

		$stm = $DB->prepare($query); // Prepare the SQL statement

		if(count($data) == 0) // If no data is provided
		{
			$stm = $DB->query($query); // Execute the query directly
			$check = 0;
			if($stm){
				$check = 1;
			}
		}else{

			$check = $stm->execute($data); // Bind the data to the placeholders in the statement and execute
		}

		if($check) // If the query execution was successful
		{
			return true;
		}else // If the query execution failed
		{
			return false;
		}
	}


}