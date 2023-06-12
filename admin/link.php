<?php
if (isset($_GET['url'])) {

	$url = $_GET['url'];

	switch ($url) {
		case 'dashboard':
			include 'dashboard.php';
			break;
		case 'data_anggota':
			include 'data_anggota.php';
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
		case 'data_keuangan':
			include 'data_keuangan.php';
			break;
		case 'saldo_awal':
			include 'saldo_awal.php';
			break;
		case 'index_keuangan':
			include 'index_keuangan.php';
			break;
		case 'data_acara':
			include 'data_acara.php';
			break;
		case 'lap_keuangan':
			include 'lap_keuangan.php';
			break;
		case 'lap_acara':
			include 'lap_acara.php';
			break;
		case 'cek_saldo':
			include 'cek_saldo.php';
			break;			
		case 'edit':
			include 'edit.php';
			break;
		case 'list_acara':
			include 'list_acara.php';
			break;
		case 'edit_acara':
			include 'edit_acara.php';
			break;																																																																																
	}
}