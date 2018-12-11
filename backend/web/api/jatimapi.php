<?php
	header('Access-Control-Allow-Origin: http://localhost:8080');
	header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
?>
<?php
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dataprb_yii2";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

	$sql = "SELECT nama_kabupaten, AsText(koordinat) as koordinat
	from geom WHERE id_kabupaten <> 0
	ORDER BY id_kabupaten";

	// $sql = "SELECT ST_AsGeoJSON(koordinat) as koordinat from map";

	if(!$conn){
		echo "Koneksi Gagal";
	}
	else{
		$geojson = mysqli_query($conn, $sql);

		$data = array();
  		$content = array();

		while($datas = mysqli_fetch_array($geojson)) {
	      	array_push($content, array(
	      		"nama_kab" => $datas['nama_kabupaten'],
	      		"koordinat" => $datas['koordinat'],
	      		
	    	));
	    }

	    $data = array(
			"data" => $content
		);

		header('Content-Type: application/json');
  		echo json_encode($data);
	}
?>