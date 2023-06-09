<?php
if (isset($_GET['url'])) {

	$url = $_GET['url'];

	switch ($url) {
		case 'dashboard':
			include 'dashboard.php';
			break;
		case 'anggota':
			include 'anggota.php';
			break;			
		case 'keuangan':
			include 'keuangan.php';
			break;			
		case 'data_keuangan':
			include 'data_keuangan.php';
			break;			
		case 'profile':
			include 'profile.php';
			break;						
	}
}
