<?php 
date_default_timezone_set('Asia/Jakarta');

	class input{
		function post($post){
			$post = $_POST[''.$post.''];
			return $post;
		}
		function get($get){
			$get = $_GET[''.$get.''];
			return $get;
		}
	}
	$input = new input;
	function redirect($loc){
		header("Location: $loc");
	}
	// url 
	function base_url(){
		$root = "http://".$_SERVER['HTTP_HOST'];
		$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
		return $root;
	}
	//generate angka dan huruf
	function random_generate($ttl){
		$rand = NULL;
        $no = $ttl; // jumlah karakter yang akan di bentuk.
        $chr = "0123456789ABCDEFGHIJKLMNOPQRSTUVWUXYZabcdefghijklmnopqrstuvwuxyz";
        for ($i = 0; $i < $no; $i++) {
        $create = rand(1, strlen($chr));
        $rand .= substr($chr, $create, 1);
        }
        return $rand;
	}
	// generate angka
	function random_generate_apl($ttl){
		$rand = NULL;
        $no = $ttl; // jumlah karakter yang akan di bentuk.
        $chr = "ABCDEFGHIJKLMNOPQRSTUVWUXYZ";
        for ($i = 0; $i < $no; $i++) {
        $create = rand(1, strlen($chr));
        $rand .= substr($chr, $create, 1);
        }
        return $rand;
	}
	function tgl_indo($tanggal, $cetak_hari = false){
		$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		
		if ($cetak_hari) {
			$num = date('N', strtotime($tanggal));
			return $hari[$num] . ', ' . $tgl_indo;
		}
		return $tgl_indo;
	}
	function nama_hari($hari){
			switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;
			case 'Mon':			
				$hari_ini = "Senin";
			break;
			case 'Tue':
				$hari_ini = "Selasa";
			break;
			case 'Wed':
				$hari_ini = "Rabu";
			break;
			case 'Thu':
				$hari_ini = "Kamis";
			break;
			case 'Fri':
				$hari_ini = "Jumat";
			break;
			case 'Sat':
				$hari_ini = "Sabtu";
			break;
			default:
				$hari_ini = "Tidak di ketahui";		
			break;
		}	
		return $hari_ini;
	}

	// if(isset($_POST['rekap_pendaftaran'])){
	// 	$data = array(

	// 		);
	// }


	if(isset($_GET['delete_gel_all'])){
		$db->delete($conn,array('_id' => $input->get('delete_gel_all')),'jadwal_all');
		redirect('?p=jadwal_global');
	}

	if(isset($_GET['delete_gel'])){
		$db->delete($conn,array('id_jadwal' => $input->get('delete_gel')),'jadwal_gelombang');
		redirect('?p=jadwal_gelombang');
	}

	if(isset($_POST['add_jadwal_global'])){
		$data = array(
			'start' => $input->post('start'),
			'end' => $input->post('end'),
			'title' => $input->post('title'),
			'deskripsi' => $input->post('deskripsi'),
		);
		$db->insert($conn,'jadwal_all',$data);
		redirect('?p=jadwal_global');
	}


	if(isset($_POST['add_jadwal'])){
		$data = array(
			'tanggal_buka' => $input->post('tanggal_mulai'),
			'tanggal_tutup' => $input->post('tanggal_selesai'),
			'gelombang' => $input->post('gelombang'),
			'tahun_pmb' => $input->post('tahun_pmb'),
		);
		$db->insert($conn,'jadwal_gelombang',$data);
		redirect('?p=jadwal_gelombang');
	}

	if(isset($_POST['update_jadwal'])){
		$data = array(
			'tanggal_buka' => $input->post('tanggal_mulai'),
			'tanggal_tutup' => $input->post('tanggal_selesai'),
			'gelombang' => $input->post('gelombang'),
			'tahun_pmb' => $input->post('tahun_pmb'),
		);
		$db->update_data($conn,array('id_jadwal' => $input->post('id_jadwal')),$data,'jadwal_gelombang');
		redirect('?p=jadwal_gelombang');
	}

	if(isset($_POST['update_jadwal_global'])){
		$data = array(
			'title' => $input->post('judul_jadwal'),
			'start' => $input->post('start'),
			'end' => $input->post('end'),
			'deskripsi' => $input->post('deskripsi'),
			'className' => '#e74c3c'
		);
		$db->update_data($conn,array('_id' => $input->post('id_jadwalx')),$data,'jadwal_all');
		redirect('?p=jadwal_global');
	}

	if(isset($_POST['nilai_tes_tulis'])){
		$data = array(
			'id_pendaftaran' => $_POST['id_pendaftaran'],
			'nilai_tes' => $_POST['nilai_tes_tulis'],
			'keterangan' => 'tes tulis',
		);
		$cari_grade_tulis = $db->semuaq($conn,'grade_tes_maba');
		if($_POST['nilai_tes_tulis'] < $cari_grade_tulis['tes_tulis']){
			$datax = array(
				'tes_tulis' => 'Tidak Lulus'
			);
		}else{
			$datax = array(
				'tes_tulis' => 'Lulus'
			);
		}
		$db->update_data($conn,array('id_pendaftaran' => $_POST['id_pendaftaran']),$datax,'pendaftaran');
		$db->insert($conn,'nilai_tes_maba',$data);
	}

	if(isset($_POST['nilai_tes_psiko'])){
		$data = array(
			'id_pendaftaran' => $_POST['id_pendaftaran'],
			'nilai_tes' => $_POST['nilai_tes_psiko'],
			'keterangan' => 'tes psikologi',
		);
		$cari_grade_tulis = $db->semuaq($conn,'grade_tes_maba');
		if($_POST['nilai_tes_psiko'] < $cari_grade_tulis['tes_psikologi']){
			$datax = array(
				'tes_psikologi' => 'Tidak Lulus'
			);
		}else{
			$datax = array(
				'tes_psikologi' => 'Lulus'
			);
		}
		$db->update_data($conn,array('id_pendaftaran' => $_POST['id_pendaftaran']),$datax,'pendaftaran');
		$db->insert($conn,'nilai_tes_maba',$data);
	}

	if(isset($_POST['nilai_tes_wawancara'])){
		$data = array(
			'id_pendaftaran' => $_POST['id_pendaftaran'],
			'nilai_tes' => $_POST['nilai_tes_wawancara'],
			'keterangan' => 'tes wawancara',
		);
		$cari_grade_tulis = $db->semuaq($conn,'grade_tes_maba');
		if($_POST['nilai_tes_wawancara'] < $cari_grade_tulis['tes_wawancara']){
			$datax = array(
				'tes_wawancara' => 'Tidak Lulus'
			);
		}else{
			$datax = array(
				'tes_wawancara' => 'Lulus'
			);
		}
		$db->update_data($conn,array('id_pendaftaran' => $_POST['id_pendaftaran']),$datax,'pendaftaran');
		$cek_lulus = $db->select_cus($conn,array('id_pendaftaran','tes_tulis','tes_psikologi','tes_wawancara'),'pendaftaran',array('id_pendaftaran' => $_POST['id_pendaftaran']),'id_pendaftaran','DESC');
		if($cek_lulus['tes_tulis'] == 'Lulus' && $cek_lulus['tes_psikologi'] == 'Lulus' && $cek_lulus['tes_wawancara'] == 'Lulus'){
			$datay = array(
				'status_kelulusan' => 'Lulus'
			);
		}else{
			$datay = array(
				'status_kelulusan' => 'Tidak Lulus'
			);
		}
		$db->update_data($conn,array('id_pendaftaran' => $_POST['id_pendaftaran']),$datay,'pendaftaran');
		$db->insert($conn,'nilai_tes_maba',$data);
	}

	if(isset($_POST['stat_tes_tulis'])){
		$datax = array(
				'tes_tulis' => $_POST['stat_tes_tulis']
			);
		$db->update_data($conn,array('id_pendaftaran' => $_POST['id_pendaftaran']),$datax,'pendaftaran');
	}

	if(isset($_POST['stat_tes_psiko'])){
		$datax = array(
				'tes_psikologi' => $_POST['stat_tes_psiko']
			);
		$db->update_data($conn,array('id_pendaftaran' => $_POST['id_pendaftaran']),$datax,'pendaftaran');
	}

	if(isset($_POST['stat_tes_wawan'])){
		$datax = array(
				'tes_wawancara' => $_POST['stat_tes_wawan']
			);
		$db->update_data($conn,array('id_pendaftaran' => $_POST['id_pendaftaran']),$datax,'pendaftaran');
		$cek_lulus = $db->select_cus($conn,array('id_pendaftaran','tes_tulis','tes_psikologi','tes_wawancara'),'pendaftaran',array('id_pendaftaran' => $_POST['id_pendaftaran']),'id_pendaftaran','DESC');
		if($cek_lulus['tes_tulis'] == 'Lulus' && $cek_lulus['tes_psikologi'] == 'Lulus' && $cek_lulus['tes_wawancara'] == 'Lulus'){
			$datay = array(
				'status_kelulusan' => 'Lulus'
			);
		}else{
			$datay = array(
				'status_kelulusan' => 'Tidak Lulus'
			);
		}
		$db->update_data($conn,array('id_pendaftaran' => $_POST['id_pendaftaran']),$datay,'pendaftaran');
	}

	if(isset($_POST['update_grade'])){
		$data = array(
			'tes_tulis' => $_POST['tes_tulis'],
			'tes_psikologi' => $_POST['tes_psikologi'],
			'tes_wawancara' => $_POST['tes_wawancara'],
		);
		$where = array(
			'id_grade' => $_POST['id_grade']
		);
		$db->update_data($conn,$where,$data,'grade_tes_maba');
		    $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade in">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <strong>Update Berhasil.</strong> 
					  </div>';
	}

	if(isset($_POST['upload_dokumen'])){
		$target='./assets/file/';
		// file bukti transfer
		$nama_awal = $_FILES[ 'file_transfer' ][ 'name' ]; 
        $pecahNama = end(explode('.',$nama_awal));
        $nama_transfer = 'bukti_transfer-'.md5(uniqid().random_generate(4).'-'.date('Y-m-d')).'.'.$pecahNama;
		$sumber = $_FILES['file_transfer'][ 'tmp_name' ]; 
        // file foto 4x6
		$nama_awal1 = $_FILES[ 'file_foto' ][ 'name' ]; 
        $pecahNama1 = end(explode('.',$nama_awal1));
        $nama_transfer1 = 'foto_camaba-'.md5(uniqid().random_generate(4).'-'.date('Y-m-d')).'.'.$pecahNama1;
		$sumber1 = $_FILES['file_foto'][ 'tmp_name' ]; 
        // file identitas
		$nama_awal2 = $_FILES[ 'file_identitas' ][ 'name' ]; 
        $pecahNama2 = end(explode('.',$nama_awal2));
        $nama_transfer2 = 'identitas_camaba-'.md5(uniqid().random_generate(4).'-'.date('Y-m-d')).'.'.$pecahNama2;
		$sumber2 = $_FILES['file_identitas'][ 'tmp_name' ]; 
        // file ijazah
		$nama_awal3 = $_FILES[ 'file_ijazah' ][ 'name' ]; 
        $pecahNama3 = end(explode('.',$nama_awal3));
        $nama_transfer3 = 'ijazah_camaba-'.md5(uniqid().random_generate(4).'-'.date('Y-m-d')).'.'.$pecahNama3;
		$sumber3 = $_FILES['file_ijazah'][ 'tmp_name' ]; 
        // file nilai_un
		$nama_awal4 = $_FILES[ 'file_nilai_un' ][ 'name' ]; 
        $pecahNama4 = end(explode('.',$nama_awal4));
        $nama_transfer4 = 'nilai_un_camaba-'.md5(uniqid().random_generate(4).'-'.date('Y-m-d')).'.'.$pecahNama4;
		$sumber4 = $_FILES['file_nilai_un'][ 'tmp_name' ]; 

        $extensi_upload  = substr( $nama_transfer, strrpos( $nama_transfer, '.' ) + 1);
        $extensi_upload1  = substr( $nama_transfer1, strrpos( $nama_transfer1, '.' ) + 1);
        $extensi_upload2  = substr( $nama_transfer2, strrpos( $nama_transfer2, '.' ) + 1);
        $extensi_upload3  = substr( $nama_transfer3, strrpos( $nama_transfer3, '.' ) + 1);
        $extensi_upload4  = substr( $nama_transfer4, strrpos( $nama_transfer4, '.' ) + 1);
        $img_size = $_FILES[ 'file_transfer' ][ 'size' ];
        $img_size1 = $_FILES[ 'file_foto' ][ 'size' ];
        $img_size2 = $_FILES[ 'file_identitas' ][ 'size' ];
        $img_size3 = $_FILES[ 'file_ijazah' ][ 'size' ];
        $img_size4 = $_FILES[ 'file_ijazah' ][ 'size' ];
        
        $err = "";
        if(empty($nama_awal)){}else{
        	if((strtolower( $extensi_upload) == "jpg" || strtolower($extensi_upload) == "jpeg" || strtolower($extensi_upload) == "png") && ($img_size < 5000000)){ 
        	$cek_stat = $db->where_numsw($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','bukti_transfer');
        	if($cek_stat >= 1){
        	$cek_statq = $db->where_like($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','bukti_transfer');
        		$link = str_replace("http://localhost","../",$cek_statq['file']);
        		unlink($link);
				move_uploaded_file($sumber, $target.$nama_transfer);
				
        		$datax = array(
					'file' => base_url().'assets/file/'.$nama_transfer,
					'status' => '0',
					'id_pendaftaran' => $id_pendaftaran,	
					'baca' => '0'

				);
				$db->update_data($conn,array('id_file' => $cek_statq['id_file']),$datax,'file_camaba');
        	}else{
				move_uploaded_file($sumber, $target.$nama_transfer);
        		$datax = array(
					'file' => base_url().'assets/file/'.$nama_transfer,
					'id_pendaftaran' => $id_pendaftaran,
					'created' => date('Y-m-d H:i:s')

				);
				$db->insert($conn,'file_camaba',$datax);
			}
	        }else{
	        	$err = "Bukti Transfer";
	        }
        }

        if(empty($nama_awal1)){}else{
        	if((strtolower($extensi_upload1) == "jpg" || strtolower($extensi_upload1) == "jpeg" || strtolower($extensi_upload1) == "png") && ($img_size1 < 5000000)){
        	$cek_stat = $db->where_numsw($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','foto_camaba');
        	if($cek_stat >= 1){
        	$cek_statq = $db->where_like($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','foto_camaba');
        		$link = str_replace("http://localhost","../",$cek_statq['file']);
        		unlink($link);
				move_uploaded_file($sumber1, $target.$nama_transfer1);
        		$datax = array(
				'file' => base_url().'assets/file/'.$nama_transfer1,
				'id_pendaftaran' => $id_pendaftaran,	
					'baca' => '0'

				);
				$db->update_data($conn,array('id_file' => $cek_statq['id_file']),$datax,'file_camaba');
        	}else{
        		move_uploaded_file($sumber1, $target.$nama_transfer1);
        		$datax = array(
				'file' => base_url().'assets/file/'.$nama_transfer1,
				'id_pendaftaran' => $id_pendaftaran,	
					'created' => date('Y-m-d H:i:s')
				);
				$db->insert($conn,'file_camaba',$datax);
			}
	        }else{
	        	if(empty($err)){
	        		$err = "Scan Foto 4x6";
	        	}else{
	        		$err .= ", Scan Foto 4x6";
	        	}
	        }
        }
        

        if(empty($nama_awal2)){}else{
        	if((strtolower($extensi_upload2) == "jpg" || strtolower($extensi_upload2) == "jpeg" || strtolower($extensi_upload2) == "png") && ($img_size2 < 5000000)){
        		$cek_stat = $db->where_numsw($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','identitas_camaba');
        	if($cek_stat >= 1){
        	$cek_statq = $db->where_like($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','identitas_camaba');
        		$link = str_replace("http://localhost","../",$cek_statq['file']);
        		unlink($link);
				move_uploaded_file($sumber2, $target.$nama_transfer2);
	        	$datax = array(
					'file' => base_url().'assets/file/'.$nama_transfer2,
					'id_pendaftaran' => $id_pendaftaran,
					'baca' => '0'

				);
				$db->update_data($conn,array('id_file' => $cek_statq['id_file']),$datax,'file_camaba');
        	}else{
        		move_uploaded_file($sumber2, $target.$nama_transfer2);
	        	$datax = array(
					'file' => base_url().'assets/file/'.$nama_transfer2,
					'id_pendaftaran' => $id_pendaftaran,	
					'created' => date('Y-m-d H:i:s')
				);
				$db->insert($conn,'file_camaba',$datax);
			}
	        }else{
	        	if(empty($err)){
	        		$err = "Scan Identitas";
	        	}else{
	        		$err .= ", Scan Identitas";
	        	}
	        }
        }

        if(empty($nama_awal3)){}else{
        	if((strtolower($extensi_upload3) == "jpg" || strtolower($extensi_upload3) == "jpeg" || strtolower($extensi_upload3) == "png") && ($img_size3 < 5000000)){
        		$cek_stat = $db->where_numsw($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','ijazah_camaba');
        	if($cek_stat >= 1){
        	$cek_statq = $db->where_like($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','ijazah_camaba');
        		$link = str_replace("http://localhost","../",$cek_statq['file']);
        		unlink($link);
				move_uploaded_file($sumber2, $target.$nama_transfer2);
	        	$datax = array(
					'file' => base_url().'assets/file/'.$nama_transfer2,
					'id_pendaftaran' => $id_pendaftaran,	
					'baca' => '0'

				);
				$db->update_data($conn,array('id_file' => $cek_statq['id_file']),$datax,'file_camaba');
        	}else{
        		move_uploaded_file($sumber2, $target.$nama_transfer2);
	        	$datax = array(
					'file' => base_url().'assets/file/'.$nama_transfer2,
					'id_pendaftaran' => $id_pendaftaran,	
					'created' => date('Y-m-d H:i:s')

				);
				$db->insert($conn,'file_camaba',$datax);
			}
	        }else{
	        	if(empty($err)){
	        		$err = "Scan Ijazah";
	        	}else{
	        		$err .= ", Scan Ijazah";
	        	}
	        }
        }

        if(empty($nama_awal4)){}else{
        	if((strtolower($extensi_upload4) == "jpg" || strtolower($extensi_upload4) == "jpeg" || strtolower($extensi_upload4) == "png") && ($img_size4 < 5000000)){
        	$cek_stat = $db->where_numsw($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','ijazah_camaba');
        	if($cek_stat >= 1){
        	$cek_statq = $db->where_like($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','ijazah_camaba');
        		$link = str_replace("http://localhost","../",$cek_statq['file']);
        		unlink($link);
				move_uploaded_file($sumber4, $target.$nama_transfer4);
	        	$datax = array(
					'file' => base_url().'assets/file/'.$nama_transfer4,
					'id_pendaftaran' => $id_pendaftaran,	
					'baca' => '0'
				);
				$db->update_data($conn,array('id_file' => $cek_statq['id_file']),$datax,'file_camaba');
        	}else{
        		move_uploaded_file($sumber4, $target.$nama_transfer4);
	        	$datax = array(
					'file' => base_url().'assets/file/'.$nama_transfer4,
					'id_pendaftaran' => $id_pendaftaran,	
					'created' => date('Y-m-d H:i:s')
				);
				$db->insert($conn,'file_camaba',$datax);
			}
	        }else{
	        	if(empty($err)){
	        		$err = "Scan Nilai UN";
	        	}else{
	        		$err .= ", Scan Nilai UN";
	        	}
	        }
        }

        if(empty($err)){
        $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade in">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <strong>Upload Berhasil.</strong> 
					  </div>';
        }else{
        $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade in">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <strong>Upload Berhasil Namun terjadi Error Upload pada '.$err.'</strong> 
					  </div>';
        }

	}

 ?>