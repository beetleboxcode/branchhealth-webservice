<?php 
defined('_BDZ') or die;

	$response = array();
	$response['status']=0;
	$response['message']="Berita Tidak Tersedia";
	$response['news'] = array();
$data_back = file_get_contents('php://input');
if (isset($data_back) ) {
		$obj = json_decode($data_back);
		$username = $obj->{'username'};

		$queryNews = "SELECT n.id,n.title,n.short_description,n.content,n.type,n.city,n.cabang,n.apotek_group,n.updated_date FROM news n LEFT JOIN user u on (n.city = u.city or n.city = 41) and (n.cabang = u.branch or n.cabang = 107) and (n.apotek_group = u.apotek_group or n.apotek_group = 'ALL')  where u.email = '$username' order by n.updated_date DESC";
		$executeNews = queryData($queryNews);
		while ($rowNews = mysqli_fetch_array($executeNews)) {
			$rowID = $rowNews["id"];
			$arrayNews = array();
			$queryAssets = "SELECT * FROM news_asset where id_news = $rowID";
			$executeAssets = queryData($queryAssets);
				while ($rowAssets = mysqli_fetch_array($executeAssets)) {
				$newsAssets = array(
							'id'				=>		$rowAssets["id"],
							'id_news'			=>		$rowAssets["id_news"],
							'type'				=>		$rowAssets["type"],
							'file_path'			=>		$rowAssets["file_path"],
							'updated_date'		=>		$rowAssets["updated_date"]
							);
					array_push($arrayNews, $newsAssets);
				}

			$news = array(
						'id'				=>		$rowNews["id"],
						'title'				=>		$rowNews["title"],
						'short_description'	=>		$rowNews["short_description"],
						'content'			=>		$rowNews["content"],
						'type'				=>		$rowNews["type"],
						'city'				=>		$rowNews["city"],
						'branch'			=>		$rowNews["cabang"],
						'apotek_group'		=>		$rowNews["apotek_group"],
						'updated_date'		=>		$rowNews["updated_date"],
						'asssets'			=>		$arrayNews

						);
			array_push($response['news'], $news);
		}

		$response['status']=1;
		$response['message']="Berita Tersedia";
	}else{
		$response['status']=0;
		$response['message']="Parameter Username Null";
	}

	echo json_encode($response);
 ?>