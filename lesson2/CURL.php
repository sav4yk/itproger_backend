<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Технология CURL</title>
	</head>
	<body>
		<?php
	/*	$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL,'https://itproger.com');
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


		$result = curl_exec($curl);
		curl_close($curl);

		$section = explode('<section class="courses-section container">', $result);
		$section_2 = explode('</section>', $section[1]);
		print_r($section_2[0]);
		*/
		$curl = curl_init();

		$params = array('name' => 'cooke_set');

		curl_setopt_array($curl, array (
			CURLOPT_URL => "http://localhost:8000/cookie.php", //поставить адрес сайта
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => http_build_query($params)
		));


		$result = curl_exec ($curl);
		curl_close($curl);
		echo $_COOKIE['myCookie'];
		 ?>
	</body>
</html>
