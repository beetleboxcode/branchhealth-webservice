<?php 
defined('_BDZ') or die;


			$arrayAnswer = array();
			$addressTitle = "";
			$addressContent="";
			$phone="";
			$fax="";
			$website="";

			$queryContact = "SELECT * FROM contact_us ";
			$executeContact = queryData($queryContact);
				while ($rowContact = mysqli_fetch_array($executeContact)) {

				$addressTitle = $rowContact["address_title"];
				$addressContent = $rowContact["address_content"];
				$phone = $rowContact["phone"];
				$fax = $rowContact["fax"];
				$website = $rowContact["website"];
		}

		$respString = '{"contact_us":{"address_title":"'.$addressTitle.'","address_content":"'.$addressContent.'","phone":"'.$phone.'","fax":"'.$fax.'","website":"'.$website.'"},"status":"1","message":"Contact Us Tersedia"}';
		$response['contact_us']='{"address_tittle":"'.$addressTitle.'","address_content":"'.$addressContent.'","phone":"'.$phone.'","fax":"'.$fax.'","website":"'.$website.'"}';
		$response['status']=1;
		$response['message']="Contact Us Tersedia";


	echo $respString;


?>