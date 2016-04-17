<?php 
defined('_BDZ') or die;

$response['faq'] = array();
$queryFAQ = "SELECT * FROM faq ";
		$executeFAQ = queryData($queryFAQ);
		while ($rowFAQ = mysqli_fetch_array($executeFAQ)) {
			$rowID = $rowFAQ["id"];
			$arrayAnswer = array();
			$queryAnswer = "SELECT * FROM faq_answer where id_question = $rowID";
			$executeAnswer = queryData($queryAnswer);
				while ($rowAnswer = mysqli_fetch_array($executeAnswer)) {
				array_push($arrayAnswer, $rowAnswer["answer"]);
				}

			$faq = array(
						'question'			=>		$rowFAQ["question"],
						'answers'			=>		$arrayAnswer

						);
			array_push($response['faq'], $faq);
		}

		$response['status']=1;
		$response['message']="FAQ Tersedia";


	echo json_encode($response);



?>