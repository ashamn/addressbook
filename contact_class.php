<?php

class Contact
{
	var $attributes[] = array(id, firstname, lastname, address, city, mobile, email, birthday, salary, notes);
	
	function getContact()
	{
		global $link;
		$query = "SELECT * FROM contacts WHERE ID=";
		$query .= $this->attributes['id'];
		$result = mysqli_query($link, $query);
		$record = mysqli_fetch_assoc($result);
		
		return $record;
	}
	
	
	
	
}


?>