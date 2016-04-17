<?php 
defined('_BDZ') or die;
	$response = array();
	$response['status']=0;
	$response['sku']=array();
	$response['message']="Product Tidak Tersedia";

		$querySKU = "SELECT * FROM sku ORDER BY product_name";
		$dataSKU = queryData($querySKU);
		while ($row = mysqli_fetch_array($dataSKU)) {

			$rowID = $row["id"];
			$arraySKUAsset = array();
			$queryAssets = "SELECT * FROM sku_asset where sku_id = $rowID";
			$executeAssets = queryData($queryAssets);
				while ($rowAssets = mysqli_fetch_array($executeAssets)) {
				$skuAssets = array(
							'id'				=>		$rowAssets["id"],
							'sku_id'			=>		$rowAssets["sku_id"],
							'type'				=>		$rowAssets["type"],
							'file_path'			=>		$rowAssets["file_path"],
							'updated_date'		=>		$rowAssets["updated_date"]
							);
					array_push($arraySKUAsset, $skuAssets);
				}


			$sku = array(
					'id' 					=> 			$row["id"],
					'product_name' 			=> 			$row["product_name"],
					'product_description' 	=> 			$row["product_description"],
					'point' 				=> 			$row["point"],
					'updated_date' 			=> 			$row["updated_date"],
					'product_asset' 		=> 			$arraySKUAsset
					);
			array_push($response['sku'], $sku);
			$response['status']=1;
			$response['message']="Product Tersedia";
}
echo json_encode($response);
 ?>