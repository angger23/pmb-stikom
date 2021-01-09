<?php 
	session_start();
	include 'conn.php';
	include 'database.php';
	include 'login/login_set.php';
	include 'login/login_cek.php';


	if(isset($_POST['title'])){
    	$cek_akhirq = $db->order_by($conn,'jadwal_all','_id','DESC');
	    $data = array(
	      '_id' => $cek_akhirq['_id']+1,
	      'title' => $_POST['title'],
	      'start' =>$_POST['start'],
	      'end' => $_POST['end'],
	      // 'className' => $this->input->post('className'),
	      'deskripsi' => $_POST['deskripsi'],
	      
	    );
	    // $this->db->insert('jadwal_kuliah',$data);
	    $db->insert($conn,'jadwal_all',$data);
	    // echo ($this->db->affected_rows()!=1)?false:true;
	    // echo $this->input->post('title')." - ".$cari_matkul->matakuliah;
	    echo true;
	}
 ?>