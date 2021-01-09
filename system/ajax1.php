<?php 
    if(isset($_POST['r2'])){
        $cari_gel = $db->where($conn,'jadwal_gelombang',array('active' => '1'));
        $nama_awal = $_FILES[ 'file' ][ 'name' ]; 
        $pecahNama = end(explode('.',$nama_awal));
        $NamaBaru = md5(uniqid().random_generate(4).'-'.date('Y-m-d')).'.'.$pecahNama;
        $target_path  = "./assets/img/"; 
        $target_path .= basename( $NamaBaru ); 

        $uploaded_name=$NamaBaru;
        $extensi_upload  = substr( $uploaded_name, strrpos( $uploaded_name, '.' ) + 1); 
        $img_size = $_FILES[ 'file' ][ 'size' ]; 
        $uploaded_tmp  = $_FILES[ 'file' ][ 'tmp_name' ]; 

        if((strtolower( $extensi_upload) == "jpg" || strtolower($extensi_upload) == "jpeg" || strtolower($extensi_upload) == "png") && ($img_size < 5000000) && getimagesize($uploaded_tmp)) { 
            // upload gambar gagal
            if( !move_uploaded_file( $uploaded_tmp, $target_path ) ) { 
                echo 'Upload gagal'; 
            }else{ 
                //upload gambar sukses
                $data_awal = array(
                    'nomor_pendaftaran' => date('Y').'-'.random_generate_apl(4),
                    'nama_lengkap' => mysqli_real_escape_string($conn,htmlspecialchars($_POST['nama_lengkap'])),
                    'tempat_lahir' => $_POST['tempat_lahir'],
                    'tgl_lahir' => mysqli_real_escape_string($conn,$_POST['tgl_lahir']),
                    'id_agama' => $_POST['agama'],
                    'jenis_kelamin' => $_POST['jenis_kelamin'],
                    'pekerjaan' => mysqli_real_escape_string($conn,htmlspecialchars($_POST['pekerjaan_anda'])),
                    'status_kawin' => $_POST['status'],
                    'alamat' => htmlspecialchars($_POST['alamat_rumah']),
                    'kode_pos' => $_POST['zip_code'],
                    'asal_sekolah' => $_POST['asal_sekolah'],
                    'tahun_lulus' => $_POST['tahun_lulus'],
                    'no_hp' => $_POST['no_hp'],
                    'foto' => base_url().'assets/img/'.$NamaBaru,
                    'pilihan_jalur' => $_POST['r2'],
                    'rekomendasi_dari' => (empty($_POST['rekomendasi'])) ? '' : $_POST['rekomendasi'],
                    'prestasi_akademik' => (empty($_POST['prestasi_akademik'])) ? '' : $_POST['prestasi_akademik'],
                    'prestasi_non_akademik' => (empty($_POST['prestasi_non_akademik'])) ? '' : $_POST['prestasi_non_akademik'],
                    'gelombang' => $cari_gel['gelombang'],
                    'tes_tulis' => 'belum',
                    'tes_psikologi' => 'belum',
                    'tes_wawancara' => 'belum',
                    'status_kelulusan' => 'belum',
                    'transfer' => 'belum',
                    'created' => date('Y-m-d H:i:s')
                );  
                $s = $db->insert($conn,'pendaftaran',$data_awal);
                if($s){
                    $cek_akhir = $db->order_by($conn,'pendaftaran','id_pendaftaran','DESC');
                    $data_kedua = array(
                        'nama_ortu' => $_POST['nama_ortu'],
                        'pekerjaan_ortu' => $_POST['pekerjaan_ortu'],
                        'alamat_ortu' => $_POST['alamat_ortu'],
                        'penghasilan_ortu' => $_POST['penghasilan_ortu'],
                        'no_telp_ortu' => $_POST['no_hp_ortu'],
                        'id_pendaftaran' => $cek_akhir['id_pendaftaran']
                    );
                    $q = $db->insert($conn,'data_keluarga',$data_kedua);
                    if($q){
                        $us = strtolower(current(explode(' ',$_POST['nama_lengkap'])));
                        $no_us = current(explode('-',date('d-m-Y',strtotime($_POST['tgl_lahir']))));
                        $username = $us.''.$no_us;
                        $data_ketiga = array(
                            'username' => $username,
                            'password' => password_hash(date('d-m-Y',strtotime($_POST['tgl_lahir'])), PASSWORD_DEFAULT),
                            'email' => $_POST['email'],
                            'created' => date('Y-m-d H:i:s'),
                            'id_pendaftaran' => $cek_akhir['id_pendaftaran']
                        );
                       $l = $db->insert($conn,'users',$data_ketiga);
                        if($l){
                            $cek_akhir1 = $db->order_by($conn,'users','id','DESC');
                            $data_keempat = array(
                                'id_user' => $cek_akhir1['id'],
                                'id_group' => '2'
                            );
                            $y = $db->insert($conn,'user_groups',$data_keempat);
                            if($y){
                                echo 'sukses';
                            }else{
                                echo $y;
                            }
                        }else{
                            echo $l;
                        }
                    }else{
                        echo $q;
                    }
                }else{
                    echo $s;
                }
            } 
        }else{ 
            // file tidak didukung 
            echo 'Gambar Kamu tidak di dukung , Ekstensi yang diperbolehkan adalah .jpg ,  .jpeg , .png dan ukuran gambar maximal 5mb !'; 
        } 
    }
 ?>