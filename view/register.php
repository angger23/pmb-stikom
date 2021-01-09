  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container">
      <!-- Main content -->
      <section class="content">
        <div class="box box-default" style="border:none;box-shadow:2px 2px 10px -3px #b1b1b1; ">
          <div class="box-body" style="padding: 0.8vw 1.5vw 1.25vw 1.5vw;">
              <h3 style="font-weight: 500; text-align: left;">Pendaftaran Mahasiswa Baru Stikom Banyuwangi</h3>
              <h4 style="font-weight: 400; text-align: left;">Petunjuk Pendaftaran</h4>
              <?php //echo $_SESSION['user']
  // echo $_SESSION['log_as'];
              // echo 
               ?>
                  <ul>
                    <li> Pastikan waktu pendaftaran untuk jalur yang akan Anda pilih telah dimulai.</li>
                    <li> Isilah semua isian dengan lengkap dan benar pada form di bawah ini lalu tekan tombol <b>Kirim Data Pendaftaran</b>.</li> 
                    <li> Selanjutnya Anda diwajibkan datang ke kampus STIKOM PGRI Banyuwangi untuk membayar biaya pendaftaran sebesar Rp.250.000,- (kecuali yang memilih jalur STIKOM BERBAGI)</li>
                    <li> Pembayaran biaya pendaftaran bisa langsung ke Bagian Pendaftaran di <em>Front-Office</em> Lantai 2 Kampus STIKOM PGRI Banyuwangi.</li>
                    <li> Informasi selanjutnya akan diberikan oleh bagian pendaftaran.</li>
                </ul>
                <?php 
                  $cari_gel = $db->where($conn,'jadwal_gelombang',array('active' => '1'));
                 ?>
                <h3 style="font-weight: 400; text-align: left;">Anda saat ini memasuki Gelombang <?php echo $cari_gel['gelombang'] ?></h3>
          </div>
        </div>
        <form enctype="multipart/form-data" id="upload_form">
          <div class="box box-default" style="border:none;box-shadow:2px 2px 10px -3px #b1b1b1; ">
             <div class="box-header with-border">
            <h3 class="" style="font-weight: 300;padding:1.5vw">Form Pendaftaran</h3>
          </div>
            <div class="box-body" style="padding: 1.5vw;">
              <?php //echo tokenField(); ?>
               <div class="form-horizontal">
                <div class="form-group">
                  <div class="col-sm-2">
                    <input type="hidden" name="gelombang" value="<?php echo $cari_gel['gelombang']; ?>">
                    <label>Pilih Jalur Kuliah <b style="color:red;">*</b></label>
                  </div>
                  <div class="col-sm-10">
                      <label style="margin:5px;font-weight:500">
                        <input type="radio" name="r2" class="flat-red" value="Stikom Berbagi">
                        Stikom Berbagi
                      </label>
                      <label style="margin:5px;font-weight:500">
                        <input type="radio" name="r2" class="flat-red" value="Stikom Peduli">
                        Stikom Peduli
                      </label>
                      <label style="margin:5px;font-weight:500">
                        <input type="radio" name="r2" class="flat-red" value="S1 Reguler Pagi" checked>
                        S1 Reguler Pagi
                      </label>
                      <label style="margin:5px;font-weight:500">
                        <input type="radio" name="r2" class="flat-red" value="S1 Reguler Sore">
                        S1 Reguler Sore
                      </label>
                      <label style="margin:5px;font-weight:500">
                        <input type="radio" name="r2" class="flat-red" value="D3 Reguler">
                        D3 Reguler
                      </label>
                  </div>
                </div>
                 <div class="form-group">
                     <div class="col-sm-2">
                          <label class="control-label text-left" for="nama-siswa" style="text-align:left;">Nama Lengkap <b style="color:red;">*</b></label>
                      </div>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="nama_lengkap" value="" id="nama-siswa" required>
                    </div>
                 </div>
                 <div class="form-group">
                    <div class="col-sm-2">
                      <label class="control-label text-left" for="" style="text-align: left;">Tempat / Tanggal Lahir <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-5 padding-left0" style="margin-right: 0px;margin-bottom:10px;">
                      <input class="form-control" type="text" name="tempat_lahir" placeholder="Tempat" required>
                    </div>
                    <div class='col-sm-5'>
                      <div class="input-group date" data-date-format="yyyy-mm-dd">
                        <input name="tgl_lahir" type="text" class="form-control" id="datepicker" placeholder="Tanggal Lahir" required data-date-format="yyyy-mm-dd">
                        <div class="input-group-addon" >
                          <span class="fa fa-calendar"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label class="control-label text-left" for="agama">Agama <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <select class="form-control select2" name="agama" id="agama" required style="width: 100%;">
                        <option value="">Pilih</option>
                        <?php
                            $agama = $db->semua($conn,'agama');
                            foreach($agama as $a){
                        ?>
                        <option value="<?php echo $a['id_agama'] ?>"><?php echo $a['agama'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label class="control-label text-left" for="jenis_kelamin">Jenis Kelamin <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <select class="form-control select2" name="jenis_kelamin" id="jenis_kelamin" required style="width: 100%;">
                        <option value="">Pilih</option>
                        <option value="1">Laki - Laki</option>
                        <option value="2">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label class="control-label text-left" for="status">Status <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <select class="form-control select2" name="status" id="status" required style="width: 100%;">
                        <option value="">Pilih</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label id="pekerjaan">Pekerjaan Anda <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="pekerjaan_anda" id="pekerjaan">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>Alamat Rumah Anda <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="alamat_rumah" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>Kode Pos <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" name="zip_code" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>Asal Sekolah <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" name="asal_sekolah" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>Tahun Lulus <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <select class="form-control select2" name="tahun_lulus" style="width: 100%;">
                        <option value="">Pilih Tahun Lulus</option>
                          <?php
                                $tahunnow = date("Y");
                                for($i=$tahunnow;$i>=2008;$i--){
                            ?>
                            <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                            <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>Nomor Telp / Hp Anda <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="no_hp">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>No Telp / Hp Ortu <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="no_hp_ortu">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>Email</label>                    
                    </div>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-2">
                        <label class="control-label text-left" for="pas-foto">Foto <b style="color:red;">*</b></label>
                      </div>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                <i class="fa fa-camera"></i> <input type="file" name="file" id="imgInp"> Pilih Gambar
                            </span>
                          </span>
                          <input type="text" class="form-control" readonly>
                        </div>
                        <hr style="margin-top: 10px;margin-bottom: 0px;">
                        <img style="width: 31%; margin: 10px 0px;" id='img-upload'/>
                        <script type="text/javascript">
                        $(document).ready( function() {
                          $(document).on('change', '.btn-file :file', function() {
                            var input = $(this),
                            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                            input.trigger('fileselect', [label]);
                          });
                          $('.btn-file :file').on('fileselect', function(event, label) {
                            var input = $(this).parents('.input-group').find(':text'),
                            log = label;
                            if( input.length ) {
                              input.val(log);
                            } else {
                              if( log ) alert(log);
                            }
                          });
                          function readURL(input) {
                            if (input.files && input.files[0]) {
                              var reader = new FileReader();
                              reader.onload = function (e) {
                                $('#img-upload').attr('src', e.target.result);
                              }
                              reader.readAsDataURL(input.files[0]);
                            }
                          }
                          $("#imgInp").change(function(){
                            readURL(this);
                          });
                        });
                        </script>
                      </div>
                    </div>
               </div>
            </div>
          </div>
          <div class="box box-default" style="border:none;box-shadow:2px 2px 10px -3px #b1b1b1; ">
            <div class="box-body" style="padding:1.5vw">
                <div class="form-horizontal">
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>Nama Orang Tua <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_ortu">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label for="ortuq">Alamat Orang Tua <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="alamat_ortu" rows="4" id="ortuq"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>Pekerjaan Orang Tua <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="pekerjaan_ortu">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>Penghasilan Ortu <b style="color:red;">*</b></label>
                    </div>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon">Rp.</span>
                          <input type="number" class="form-control" name="penghasilan_ortu">
                      </div>
                      <small><b><i>Penghasilan Orang Tua Per-Bulan</i></b></small>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>Prestasi Akademik</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" name="prestasi_akademik" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>Prestasi Non-Akademik</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" name="prestasi_non_akademik" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-2">
                      <label>Rekomendasi Dari</label>
                    </div>
                    <div class="col-sm-10">
                      <input type="text" name="rekomendasi" class="form-control">
                    </div>
                  </div>
                  <div class="statusMsg"></div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button id="galoading" class="btn btn-success btn-flat col-sm-3" onclick="aksiku()" type="button">Daftar</button>
                      <button id="loading" class="btn btn-primary btn-flat col-sm-3" disabled type="button">Loading <i class="fa fa-refresh fa-spin"></i></button>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </form>
        <script type="text/javascript">
          $("#loading").hide();
        function aksiku(){
          // alert('sdfsdf');
            var data = new FormData(document.getElementById('upload_form'));
            // e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url() ?>?p=<?php echo base64_encode('oke') ?>',
            data: data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
              $("#loading").show();
              $("#galoading").hide();
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'sukses'){
                    $('#upload_form')[0].reset();
                    showSuccessMessage2('Sukses Mendaftar !');
                    //   setTimeout(function(){
                    //    window.location.reload(1);
                    // }, 2000);
                }else{
                    pesanGagal(msg);
                }
                $("#loading").hide();
              $("#galoading").show();
            }
        });
          }
        </script>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
