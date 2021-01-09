<?php 
	if(isset($_GET['validasi'])){
		$val = $_GET['validasi'];
		$sq = $db->update_data($conn,array('id_file' => $_GET['id_file']),array('status' => $val),'file_camaba');
		if($sq){
			$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Berhasil Mevalidasi
  </div>';
		}else{
			$_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> Gagal Validasi
  </div>';
		}
		header('Location:?p=konfirmasi_validasi');
	}
 ?>