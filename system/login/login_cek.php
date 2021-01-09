<?php 
	$login_berhasil = false;

	//Kunci Akun State
		$total_gagal = 3;
		$waktu_kunci = 5;
		$akun_kunci = false;

		//cek di database
		$field = array('failed_login','last_login');
		$where = array(
			'username' => $_SESSION['user']
		);
		$data = $db->select_cus($conn,$field,'users',$where,'id','DESC');
		$dataCount = $db->select_cus_count($conn,$field,'users',$where,'id','DESC');
		if(($dataCount == 1) && ($data['failed_login'] >= $total_gagal)){
			$last_login = strtotime($data['last_login']);
			$timeout = $last_login + ($waktu_kunci  * 60);
			$timenow = time();

			if($timenow < $timeout){
				$akun_kunci = true;
				
			}
		}

		//verifikasi login
		$cari_password_lama = $db->where($conn,'users',array('username' => $_SESSION['user']));
			$where2 = array(
			'username' => $_SESSION['user'],
			'password' => $cari_password_lama['password']
		);
		$data2 = $db->where_cus($conn,'users',$where2);
		$data2Count = $db->where_cus_count($conn,'users',$where2);
		if(($data2Count == 1) && ($akun_kunci == false) && (password_verify(mysqli_real_escape_string($conn,stripslashes($_SESSION['passq'])), $cari_password_lama['password']))){
			$where_grup = array(
				'id_user' => $data2['id']
			);
			$cari_grup = $db->where_cus($conn,'user_groups',$where_grup);

			if($cari_grup['id_group'] == '1'){ // admin role
				$log_as = 1;
				$username = $data2['username'];
			}else{ // user role
				// $userData = array(
				// 	'id_pendaftaran' => $data2['id_pendaftaran']
				// );
				// $data_user = $db->where_cus($conn,'pendaftaran',$userData);
				$log_as = 2;
				$username = $data2['username'];
				$id_pendaftaran = $data2['id_pendaftaran'];
				$email = $data2['email'];
			}
			$login_berhasil = true;
			$_SESSION['user'] = $data2['username'];
			$_SESSION['pass'] = mysqli_real_escape_string($conn,stripslashes($_POST['password']));
			$update_login = $db->update_data($conn,array('id' => $data2['id']),array('failed_login' => '0'),'users');
			if(isset($_POST['log']) && isset($_POST['username']) && isset($_POST['password'])){
				header("Location: ./");
			}
		}else{

				$login_berhasil = false;
				unset($_SESSION['user']);
				unset($_SESSION['passq']);
				unset($_SESSION['pass']);
				if(isset($_POST['log']) && isset($_POST['username']) && isset($_POST['password'])){
					sleep(rand(2,4)); 
					$fail = $data2['failed_login'] + 1;
					$update_login = $db->update_data($conn,array('id' => $data2['id']),array('failed_login' => $fail),'users');
					if($akun_kunci){
						$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade in">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				    <strong>Ups !</strong> Anda sudah mencoba login beberapa kali coba tunggu '.$waktu_kunci.' menit.
				  </div>'; 
					}else{
						$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade in">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <strong>Ups !</strong> Username atau password salah !
					  </div>';
					} 
				}
				
			
		}

			$update_login = $db->update_data($conn,array('id' => $data2['id']),array('last_login' => date('Y-m-d H:i:s')),'users');

 ?>