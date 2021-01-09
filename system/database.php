<?php 
	class database{
		function semua($conn,$table){
			$array = [];
			$q=mysqli_query($conn, "SELECT * FROM $table");
			while($d=mysqli_fetch_assoc($q)){
				$array[] = $d;
			}
			return $array;
		}
		function semuaq($conn,$table){
			$array = [];
			$q=mysqli_query($conn,"SELECT * FROM $table") or die (mysqli_error($conn));
			$query = mysqli_fetch_array($q);
			return $query;
		}
		function semua_count($conn,$table){
			$array = [];
			$q=mysqli_query($conn,"SELECT * FROM $table") or die (mysqli_error($conn));
			$query = mysqli_num_rows($q);
			return $query;
		}
		function list_sekolah($conn){
			$array = [];
			$q=mysqli_query($conn, "SELECT DISTINCT(asal_sekolah) as sekolah FROM `pendaftaran`") or die (mysqli_error($conn));
			while($d=mysqli_fetch_assoc($q)){
				$array[] = $d;
			}
			return $array;
		}
		function list_peserta_cus($conn,$where=array()){
			$array = [];
			$sql = "SELECT * FROM `pendaftaran` LEFT JOIN `users` ON `users`.`id_pendaftaran`=`pendaftaran`.`id_pendaftaran` WHERE";
			$no=0;
			foreach(array_keys($where) as $k => $v){$no++;}
			$noz=0;
			foreach(array_keys($where) as $k => $v){
			$noz++;
			$ex = array_values($where);
				if($noz == $no){
					if(empty($ex[$k])){

					}else{
						$sql .= " `$v` = '$ex[$k]'";
					}	
				}else{
					if(empty($ex[$k])){

					}else{

						if(empty($ex[$k+1])){
							$sql .= " `$v` = '$ex[$k]'";
						}else{
							$sql .= " `$v` = '$ex[$k]' AND";
						}
					}
				}
			}
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			while($d=mysqli_fetch_assoc($q)){
				$array[] = $d;
			}
			return $array;
		}
		function list_peserta_cus1($conn,$where=array()){
			$array = [];
			$sql = "SELECT * FROM `pendaftaran` LEFT JOIN `users` ON `users`.`id_pendaftaran`=`pendaftaran`.`id_pendaftaran` WHERE";
			$no=0;
			foreach(array_keys($where) as $k => $v){$no++;}
			$noz=0;
			foreach(array_keys($where) as $k => $v){
			$noz++;
			$ex = array_values($where);
				if($noz == $no){
					if(empty($ex[$k])){

					}else{
						$sql .= " `$v` = '$ex[$k]'";
					}	
				}else{
					if(empty($ex[$k])){

					}else{

						if(empty($ex[$k+1])){
							$sql .= " `$v` = '$ex[$k]'";
						}else{
							$sql .= " `$v` = '$ex[$k]' AND";
						}
					}
				}
			}
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			$query = mysqli_fetch_array($q);
			return $query;
		}
		function list_validasi($conn){
			$array = [];
			$q=mysqli_query($conn, "SELECT DISTINCT(pendaftaran.id_pendaftaran) FROM `pendaftaran` LEFT JOIN `file_camaba` ON `file_camaba`.`id_pendaftaran`=`pendaftaran`.`id_pendaftaran`") or die (mysqli_error($conn));
			while($d=mysqli_fetch_assoc($q)){
				$array[] = $d;
			}
			return $array;
		}
		function list_validasi2($conn,$id_pendaftaran){
			$array = [];
			$q=mysqli_query($conn, "SELECT * FROM `pendaftaran` LEFT JOIN `file_camaba` ON `file_camaba`.`id_pendaftaran`=`pendaftaran`.`id_pendaftaran` WHERE file_camaba.id_pendaftaran = '$id_pendaftaran'") or die (mysqli_error($conn));
			while($d=mysqli_fetch_assoc($q)){
				$array[] = $d;
			}
			return $array;
		}
		function select_cus($conn,$field=array(),$table,$where=array(),$id_order,$stat_order){
			$sql = "SELECT";
			$no=0;
			foreach($field as $k => $v){$no++;}
			$noz=0;
			foreach($field as $k => $v){
			$noz++;
				if($noz == $no){
					$sql .= "`$v`";
				}else{
					$sql .= "`$v`,";
				}
			}
			$sql .= "FROM `$table` WHERE";
			$noq=0;
			foreach(array_keys($where) as $q => $qq){
			$noq++;
			$ex = array_values($where);
				$sql .= " `$qq` = '$ex[$q]'";
			}
			$sql .= "ORDER BY $id_order $stat_order LIMIT 1";
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			$query = mysqli_fetch_array($q);
			return $query;
		}
		function select_cus_loop($conn,$field=array(),$table,$where=array()){
			$sql = "SELECT";
			$no=0;
			foreach($field as $k => $v){$no++;}
			$noz=0;
			foreach($field as $k => $v){
			$noz++;
				if($noz == $no){
					$sql .= "`$v`";
				}else{
					$sql .= "`$v`,";
				}
			}
			$sql .= "FROM `$table` WHERE";
			$noq=0;
			foreach(array_keys($where) as $q => $qq){
			$noq++;
			$ex = array_values($where);
				$sql .= " `$qq` = '$ex[$q]'";
			}
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			while($d=mysqli_fetch_assoc($q)){
				$array[] = $d;
			}
			return $array;
		}
		function select_cus_loop2($conn,$field=array(),$table,$where=array()){
			$sql = "SELECT";
			$no=0;
			foreach($field as $k => $v){$no++;}
			$noz=0;
			foreach($field as $k => $v){
			$noz++;
				if($noz == $no){
					$sql .= "`$v`";
				}else{
					$sql .= "`$v`,";
				}
			}
			$sql .= "FROM `$table` WHERE";
			$now=0;
			foreach(array_keys($where) as $k => $v){$now++;}
			$nol=0;
			foreach(array_keys($where) as $k => $v){
			$nol++;
			$ex = array_values($where);
				if($nol == $now){
					$sql .= " `$v` = '$ex[$k]'";
				}else{
					$sql .= " `$v` = '$ex[$k]' AND";
				}
			}
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			while($d=mysqli_fetch_assoc($q)){
				$array[] = $d;
			}
			return $array;
		}
		function select_cus_loop2_nums($conn,$field=array(),$table,$where=array()){
			$sql = "SELECT";
			$no=0;
			foreach($field as $k => $v){$no++;}
			$noz=0;
			foreach($field as $k => $v){
			$noz++;
				if($noz == $no){
					$sql .= "`$v`";
				}else{
					$sql .= "`$v`,";
				}
			}
			$sql .= "FROM `$table` WHERE";
			$now=0;
			foreach(array_keys($where) as $k => $v){$now++;}
			$nol=0;
			foreach(array_keys($where) as $k => $v){
			$nol++;
			$ex = array_values($where);
				if($nol == $now){
					$sql .= " `$v` = '$ex[$k]'";
				}else{
					$sql .= " `$v` = '$ex[$k]' AND";
				}
			}
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			$query = mysqli_num_rows($q);
			return $query;
		}
		function select_cus_loop2_cus($conn,$field=array(),$table,$where=array()){
			$sql = "SELECT";
			$no=0;
			foreach($field as $k => $v){$no++;}
			$noz=0;
			foreach($field as $k => $v){
			$noz++;
				if($noz == $no){
					$sql .= "`$v`";
				}else{
					$sql .= "`$v`,";
				}
			}
			$sql .= "FROM `$table` WHERE";
			$now=0;
			foreach(array_keys($where) as $k => $v){$now++;}
			$nol=0;
			foreach(array_keys($where) as $k => $v){
			$nol++;
			$ex = array_values($where);
				if($nol == $now){
					$sql .= " `$v` != '$ex[$k]'";
				}else{
					$sql .= " `$v` = '$ex[$k]' AND";
				}
			}
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			while($d=mysqli_fetch_assoc($q)){
				$array[] = $d;
			}
			return $array;
		}
		function select_cus_loopq($conn,$field=array(),$table,$where=array()){
			$sql = "SELECT";
			$no=0;
			foreach($field as $k => $v){$no++;}
			$noz=0;
			foreach($field as $k => $v){
			$noz++;
				if($noz == $no){
					$sql .= "`$v`";
				}else{
					$sql .= "`$v`,";
				}
			}
			$sql .= "FROM `$table` WHERE";
			$noq=0;
			foreach(array_keys($where) as $q => $qq){
			$noq++;
			$ex = array_values($where);
				$sql .= " `$qq` != '$ex[$q]'";
			}
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			while($d=mysqli_fetch_assoc($q)){
				$array[] = $d;
			}
			return $array;
		}
		function select_cus_count($conn,$field=array(),$table,$where=array(),$id_order,$stat_order){
			$sql = "SELECT";
			$no=0;
			foreach($field as $k => $v){$no++;}
			$noz=0;
			foreach($field as $k => $v){
			$noz++;
				if($noz == $no){
					$sql .= "`$v`";
				}else{
					$sql .= "`$v`,";
				}
			}
			$sql .= "FROM `$table` WHERE";
			$noq=0;
			foreach(array_keys($where) as $q => $qq){
			$noq++;
			$ex = array_values($where);
				$sql .= " `$qq` = '$ex[$q]'";
			}
			$sql .= "ORDER BY $id_order $stat_order LIMIT 1";
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			$query = mysqli_num_rows($q);
			return $query;
		}
		function where($conn,$table,$where=array()){
			$sql = "SELECT * FROM `$table` WHERE";
			$noz=0;
			foreach(array_keys($where) as $k => $v){
			$noz++;
			$ex = array_values($where);
				$sql .= " `$v` = '$ex[$k]'";
			}
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			$query = mysqli_fetch_array($q);
			return $query;
		}
		function where_count($conn,$table,$where=array()){
			$sql = "SELECT * FROM `$table` WHERE";
			$noz=0;
			foreach(array_keys($where) as $k => $v){
			$noz++;
			$ex = array_values($where);
				$sql .= " `$v` = '$ex[$k]'";
			}
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			$query = mysqli_num_rows($q);
			return $query;
		}
		function where_like($conn,$table,$where=array(),$like,$likethis){
			$sql = "SELECT * FROM `$table` WHERE";
			$noz=0;
			foreach(array_keys($where) as $k => $v){
			$noz++;
			$ex = array_values($where);
				$sql .= " `$v` = '$ex[$k]'";
			}
			$sql .= " AND ";
			$sql .= " `$like` LIKE '%$likethis%' ";
			// return $sql;
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			$query = mysqli_fetch_array($q);
			return $query;
		}
		function where_numsw($conn,$table,$where=array(),$like,$likethis){
			$sql = "SELECT * FROM `$table` WHERE";
			$noz=0;
			foreach(array_keys($where) as $k => $v){
			$noz++;
			$ex = array_values($where);
				$sql .= " `$v` = '$ex[$k]'";
			}
			$sql .= " AND ";
			$sql .= " `$like` LIKE '%$likethis%' ";
			// return $sql;
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			$query = mysqli_num_rows($q);
			return $query;
		}
		function where_cus($conn,$table,$where=array()){
			$sql = "SELECT * FROM `$table` WHERE";
			$no=0;
			foreach(array_keys($where) as $k => $v){$no++;}
			$noz=0;
			foreach(array_keys($where) as $k => $v){
			$noz++;
			$ex = array_values($where);
				if($noz == $no){
					$sql .= " `$v` = '$ex[$k]'";
				}else{
					$sql .= " `$v` = '$ex[$k]' AND";
				}
			}
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			$query = mysqli_fetch_array($q);
			return $query;
		}
		function counts1($conn){
			$sql = "SELECT id_pendaftaran FROM `pendaftaran` where pilihan_jalur LIKE '%s1%'";
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			$query = mysqli_num_rows($q);
			return $query;
		}
		function countd3($conn){
			$sql = "SELECT id_pendaftaran FROM `pendaftaran` where pilihan_jalur LIKE '%d3%'";
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			$query = mysqli_num_rows($q);
			return $query;
		}
		function where_cus_count($conn,$table,$where=array()){
			$sql = "SELECT * FROM `$table` WHERE";
			$no=0;
			foreach(array_keys($where) as $k => $v){$no++;}
			$noz=0;
			foreach(array_keys($where) as $k => $v){
			$noz++;
			$ex = array_values($where);
				if($noz == $no){
					$sql .= " `$v` = '$ex[$k]'";
				}else{
					$sql .= " `$v` = '$ex[$k]' AND";
				}
			}
			$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
			$query = mysqli_num_rows($q);
			return $query;
		}
		function order_by($conn,$table,$nm_field,$stat){
			$sql = "SELECT * FROM `$table` ORDER BY $nm_field $stat LIMIT 1";
			$q=mysqli_query($conn,$sql);
			$query = mysqli_fetch_array($q);
			return $query;
		}
		function where_loop($conn,$table,$where=array()){
			$array = [];
			$sql = "SELECT * FROM `$table` WHERE";
			$noz=0;
			foreach(array_keys($where) as $k => $v){
			$noz++;
			$ex = array_values($where);
				$sql .= " `$v` = '$ex[$k]'";
			}
			$q=mysqli_query($conn,$sql);
			while($d=mysqli_fetch_assoc($q)){
				$array[] = $d;
			}
			return $query;
		}
		function insert($conn,$table,$data=array()){
			$sql = "INSERT INTO `$table` (";
			$nos=0;
			foreach(array_keys($data) as $k => $v){$nos++;}
			$no=0;
			foreach(array_keys($data) as $k => $v){
			$no++;
				if($no == $nos){
					$sql .= "`$v`";
				}else{
					$sql .= "`$v`".',';

				}
			}
			$sql .=") VALUES(";
			$noq=0;
			foreach(array_values($data) as $k1 => $v1){$noq++;}
			$noz=0;
			foreach(array_values($data) as $k1 => $v1){
			$noz++;
				if($noz == $noq){
					$sql .="'$v1'";
				}else{
					$sql .="'$v1',";

				}
			}
			$sql.=")";
			// echo $sql;
			$q = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			return $q;
		}
		function update_data($conn,$where=array(),$data=array(),$table){
			$sql = "UPDATE `$table` SET ";
			$nos=0;
			foreach(array_values($data) as $k2 => $v2){$nos++;}
			$no=0;
			foreach(array_keys($data) as $k => $v){
			$no++;
			$ex = array_values($data);
				if($no == $nos){
					$sql .= "`$v` = '$ex[$k]' ";	
				}else{
					$sql .= "`$v` = '$ex[$k]', ";
				}
			}
			$sql .="WHERE";
			$noz=0;
			foreach(array_keys($where) as $k1 => $v1){
			$noz++;
			$ex1 = array_values($where);
				$sql .= " `$v1` = '$ex1[$k1]'";
			}
			$q = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			return $q;
		}
		function delete($conn,$where=array(),$table){
			$sql = "DELETE FROM `$table` WHERE";
			$noz=0;
			foreach(array_keys($where) as $k => $v){
			$noz++;
			$ex = array_values($where);
				$sql .= " `$v` = '$ex[$k]'";
			}
			$q = mysqli_query($conn,$sql);
			return $q;
		}
	}
$db = new database;

 ?>