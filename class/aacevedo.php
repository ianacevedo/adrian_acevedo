<?php
	
	class Aacevedo
	{
		public function addData()
		{
			$ch = curl_init(); 
			$fields = array(
				'first_name' => urlencode($_POST['first_name']),
				'last_name' => urlencode($_POST['last_name']),
				'contact_number' => urlencode($_POST['contact_number']),
			);
			$fields_string = '';
			foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string, '&');
			//print_r($fields_string);
			//open connection
			$ch = curl_init();

			//set the url, number of POST vars, POST data
			curl_setopt($ch,CURLOPT_URL, "localhost:8081/person");
			curl_setopt($ch,CURLOPT_POST, count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
			
			$result = curl_exec($ch);

			//close connection
			curl_close($ch);
		}
		
		public function getAll()
		{
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, "localhost:8081/person"); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			$output = curl_exec($ch); 
			$result = json_decode($output);
			curl_close($ch);  
			return $result;
		}
		public function getData($id)
		{
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, "localhost:8081/person/".$id); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			$output = curl_exec($ch); 
			$result = json_decode($output);
			curl_close($ch);  
			return $result;	
		}
		public function deleteData($id)
		{
			$ch = curl_init(); 
			curl_setopt($ch, CURLOPT_URL, "localhost:8081/person/".$id); 
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
			$output = curl_exec($ch); 
			$result = json_decode($output);
			curl_close($ch);  
			return $result;	
		}
		public function updateData($id)
		{
			$ch = curl_init(); 
			$fields = array(
				'first_name' => urlencode($_POST['first_name']),
				'last_name' => urlencode($_POST['last_name']),
				'contact_number' => urlencode($_POST['contact_number']),
			);
			$fields_string = '';
			foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string, '&');
			//print_r($fields_string);
			//open connection
			$ch = curl_init();

			//set the url, number of POST vars, POST data
			curl_setopt($ch,CURLOPT_URL, "localhost:8081/person/".$id);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch,CURLOPT_POST, count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
			
			$result = curl_exec($ch);

			//close connection
			curl_close($ch);
		}
		
	}

?>