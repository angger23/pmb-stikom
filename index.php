<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
// memulai status login bernilai false
require 'system/conn.php'; 
require 'system/database.php'; 
include 'system/login/login_set.php';
include 'system/login/login_cek.php';
include 'system/global_sys.php'; 
$current_page = isset($_GET['p']) ? $_GET['p'] : 'home';
if($login_berhasil){
	if($log_as == 1){ // login sebagai admin
		switch ($current_page) {
	        case ('home'):
			    include 'view/admin/header_admin.php';
				include 'view/admin/home.php'; 
				include 'view/footer.php';
	            break;
	        case ('daftar_peserta'):
			    include 'view/admin/header_admin.php';
				include 'view/admin/list_peserta.php'; 
				include 'view/footer.php';
	            break;
	        case ('rekap_pendaftaran'):
			    include 'view/admin/header_admin.php';
				include 'view/admin/rekap_pendaftaran.php'; 
				include 'view/footer.php';
	            break;
	        case ('seleksi_pendaftaran'):
	        	include 'view/admin/header_admin.php';
				include 'view/admin/tes_pendaftaran.php'; 
				include 'view/footer.php';
	        	break;
	        case ('jadwal_gelombang'):
	        	include 'view/admin/header_admin.php';
				include 'view/admin/jadwal_gelombang.php'; 
				include 'view/footer.php';
	        	break;
	        case ('jadwal_global'):
	        	include 'view/admin/header_admin.php';
				include 'view/admin/jadwal_global.php'; 
				include 'view/footer.php';
	        	break;
	       	case ('load_ulang'):
				include 'view/admin/load_ulang_tes.php';
	       		break;
	       	case ('grade_nilai'):
	       		include 'view/admin/header_admin.php';
				include 'view/admin/grade_nilai.php'; 
				include 'view/footer.php';
	        	break;
	        case ('hasil_seleksi'):
	        	include 'view/admin/header_admin.php';
				include 'view/admin/hasil_seleksi.php'; 
				include 'view/footer.php';
	        	break;
	        case ('daftar_kelulusan'):
	        	include 'view/admin/header_admin.php';
				include 'view/admin/daftar_kelulusan.php'; 
				include 'view/footer.php';
	        	break;
	        case ('konfirmasi_validasi'):
			    include 'view/admin/header_admin.php';
				include 'view/admin/konfirmasi_validasi.php'; 
				include 'view/footer.php';
	            break;
	        case ('print_detail'):
				include 'view/admin/print_detail_peserta.php'; 
	        case ('konfir_validasi'):
	        	include 'system/konfir_val.php';
	        	break;
	        default:
	            include 'view/header.php';
            	include 'view/404.php';
		    	include 'view/footer.php';    
	    }
	}else{ // login sebagai camaba
		switch ($current_page) {
			case ('cetak'):
				include 'view/header.php';
				include 'view/user_login/cetak_dokumen.php'; 
				include 'view/footer.php';
				break;
			case ('print'):
				include 'view/user_login/print_dokumen.php'; 
				break;
	        case ('home'):
			    include 'view/header.php';
				include 'view/user_login/home.php'; 
				include 'view/footer.php';
	            break;
	        case ('jadwal_test'):
	        	include 'view/header.php';
				include 'view/user_login/jadwal_test.php'; 
				include 'view/footer.php';
	            break;
	        case ('upload_dokumen'):
	        	include 'view/header.php';
				include 'view/user_login/upload_dokumen.php'; 
				include 'view/footer.php';
	            break;
	        case (base64_encode('oke')):
				include 'system/ajax1.php';
	            break;
	        default:
	            include 'view/header.php';
            include 'view/404.php';
		    include 'view/footer.php';    
	    }
	}
}else{ // tidak login
	switch ($current_page) {
		case ('redirect'):
			include 'view/header.php';
			include 'view/redirect.php'; 
			include 'view/footer.php';
			break;
        case ('register'):
		    include 'view/header.php';
			include 'view/register.php'; 
			include 'view/footer.php';
            break;
        case ('home'):
         	// include 'view/header.php';
			include 'view/home2.php'; 
			// include 'view/footer.php';
            break;
        case ('login'):
			include 'view/login/login.php';
            break;
        case (base64_encode('oke')):
			include 'system/ajax1.php';
            break;
        default:
		    include 'view/header.php';
            include 'view/404.php';
		    include 'view/footer.php';    
    }
}
?>
