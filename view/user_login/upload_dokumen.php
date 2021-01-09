<div class="content-wrapper">
  <br>
  <div class="container">
    <div class="box" style="border:none;box-shadow:2px 2px 10px -3px #b1b1b1;">
        <div class="box-header with-border">
          <h3 class="box-title">Upload Dokumen</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <?php
             echo $_SESSION['msg']; 
              unset($_SESSION['msg']);
             ?>
            <form method="post" action="" enctype="multipart/form-data">
              <div class="form-group">
                <label>Bukti Transfer Pendaftaran</label>
                <?php 
                $cek_stat = $db->where_like($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','bukti_transfer');
                if($cek_stat['status'] == '2'){
                 ?>
                <div class="input-group qw has-error">
                    <span class="input-group-btn">
                      <span class="btn btn-danger btn-file btn-flo">
                          <i class="fa fa-camera"></i> <input type="file" name="file_transfer" id="imgInp"> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" readonly placeholder="Dokumen yang anda upload perlu pembenahan">
                  </div>
                <?php }elseif($cek_stat['status'] == '0'){ ?>
                  <div class="input-group qw">
                    <span class="input-group-btn">
                      <span class="btn btn-default btn-file" disabled>
                          <i class="fa fa-camera"></i> <input type="file" name="file_transfer" disabled> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" disabled placeholder="Menunggu Di Verifikasi">
                  </div>
                <?php }else{ ?>
                <div class="input-group qw">
                    <span class="input-group-btn">
                      <span class="btn btn-default btn-file btn-flo" disabled>
                          <i class="fa fa-camera"></i> <input type="file" name="file_transfer" id="imgInp" disabled> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" disabled placeholder="Dokumen Sudah Di verifikasi">
                  </div>
                <?php } ?>
                <!-- <small><b>Format extensi : jpg , jpeg, png </b></small> -->
                <script type="text/javascript">
                    $(document).ready( function() {
                      $(document).on('change', '.btn-flo :file', function() {
                          var input = $(this),
                          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                          input.trigger('fileselect', [label]);
                        });
                        $('.btn-flo :file').on('fileselect', function(event, label) {
                          var input = $(this).parents('.qw').find(':text'),
                          log = label;
                          if( input.length ) {
                            input.val(log);
                          } else {
                            if( log ) alert(log);
                          }
                        });
                    });
                </script>
              </div>
              <div class="form-group">
                <label>Scan Foto 4x6</label>
                <?php 
                $cek_stat1 = $db->where_like($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','foto_camaba');
                if($cek_stat1['status'] == '2'){
                 ?>
                <div class="input-group qw1 has-error">
                    <span class="input-group-btn">
                      <span class="btn btn-danger btn-file btn-flo1">
                          <i class="fa fa-camera"></i> <input type="file" name="file_foto" id="imgInp"> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" readonly placeholder="Dokumen yang anda upload perlu pembenahan">
                  </div>
                <?php }elseif($cek_stat1['status'] == '0'){ ?>
                  <div class="input-group qw1">
                    <span class="input-group-btn">
                      <span class="btn btn-default btn-file" disabled>
                          <i class="fa fa-camera"></i> <input type="file" name="file_foto" disabled> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" disabled placeholder="Menunggu Di Verifikasi">
                  </div>
                <?php }else{ ?>
                <div class="input-group qw1">
                    <span class="input-group-btn">
                      <span class="btn btn-default btn-file btn-flo1">
                          <i class="fa fa-camera"></i> <input type="file" name="file_foto" id="imgInp" disabled> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" disabled placeholder="Dokumen Sudah Di verifikasi">
                  </div>
                <?php } ?>
                
                <script type="text/javascript">
                    $(document).ready( function() {
                      $(document).on('change', '.btn-flo1 :file', function() {
                          var input = $(this),
                          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                          input.trigger('fileselect', [label]);
                        });
                        $('.btn-flo1 :file').on('fileselect', function(event, label) {
                          var input = $(this).parents('.qw1').find(':text'),
                          log = label;
                          if( input.length ) {
                            input.val(log);
                          } else {
                            if( log ) alert(log);
                          }
                        });
                    });
                </script>
              </div>
              <div class="form-group">
                <label>Scan Identitas Diri KTP/SIM/KTS</label>
                <?php 
                $cek_stat2 = $db->where_like($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','identitas_camaba');
                if($cek_stat2['status'] == '2'){
                 ?>
                <div class="input-group qw2 has-error">
                    <span class="input-group-btn">
                      <span class="btn btn-danger btn-file btn-flo2">
                          <i class="fa fa-camera"></i> <input type="file" name="file_identitas" id="imgInp"> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" readonly placeholder="Dokumen yang anda upload perlu pembenahan">
                  </div>
                <?php }elseif($cek_stat2['status'] == '0'){ ?>
                  <div class="input-group qw2">
                    <span class="input-group-btn">
                      <span class="btn btn-default btn-file" disabled>
                          <i class="fa fa-camera"></i> <input type="file" name="file_identitas" disabled> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" disabled placeholder="Menunggu Di Verifikasi">
                  </div>
                <?php }else{ ?>
                <div class="input-group qw2">
                    <span class="input-group-btn">
                      <span class="btn btn-default btn-file btn-flo2" disabled>
                          <i class="fa fa-camera"></i> <input type="file" name="file_identitas" id="imgInp" disabled> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" disabled placeholder="Dokumen Sudah Di verifikasi">
                  </div>
                <?php } ?>
                <script type="text/javascript">
                    $(document).ready( function() {
                      $(document).on('change', '.btn-flo2 :file', function() {
                          var input = $(this),
                          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                          input.trigger('fileselect', [label]);
                        });
                        $('.btn-flo2 :file').on('fileselect', function(event, label) {
                          var input = $(this).parents('.qw2').find(':text'),
                          log = label;
                          if( input.length ) {
                            input.val(log);
                          } else {
                            if( log ) alert(log);
                          }
                        });
                    });
                </script>
              </div>
              <div class="form-group">
                <label>Scan Ijazah Terakhir</label>
                 <?php 
                $cek_stat3 = $db->where_like($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','ijazah_camaba');
                if($cek_stat3['status'] == '2'){
                 ?>
                <div class="input-group qw3 has-error">
                    <span class="input-group-btn">
                      <span class="btn btn-danger btn-file btn-flo3">
                          <i class="fa fa-camera"></i> <input type="file" name="file_ijazah" id="imgInp"> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" readonly placeholder="Dokumen yang anda upload perlu pembenahan">
                  </div>
                <?php }elseif($cek_stat3['status'] == '0'){ ?>
                  <div class="input-group qw3">
                    <span class="input-group-btn">
                      <span class="btn btn-default btn-file" disabled>
                          <i class="fa fa-camera"></i> <input type="file" name="file_ijazah" disabled> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" disabled placeholder="Menunggu Di Verifikasi">
                  </div>
                <?php }else{ ?>
                <div class="input-group qw3">
                    <span class="input-group-btn">
                      <span class="btn btn-default btn-file btn-flo3" disabled>
                          <i class="fa fa-camera"></i> <input type="file" name="file_ijazah" id="imgInp" disabled> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" disabled placeholder="Dokumen Sudah Di verifikasi">
                  </div>
                <?php } ?>
                
                <script type="text/javascript">
                    $(document).ready( function() {
                      $(document).on('change', '.btn-flo3 :file', function() {
                          var input = $(this),
                          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                          input.trigger('fileselect', [label]);
                        });
                        $('.btn-flo3 :file').on('fileselect', function(event, label) {
                          var input = $(this).parents('.qw3').find(':text'),
                          log = label;
                          if( input.length ) {
                            input.val(log);
                          } else {
                            if( log ) alert(log);
                          }
                        });
                    });
                </script>
              </div>
              <div class="form-group">
                <label>Scan Nilai UN yang sudah di legalisir</label>
                <?php 
                $cek_stat4 = $db->where_like($conn,'file_camaba',array('id_pendaftaran' => $id_pendaftaran),'file','nilai_un_camaba');
                if($cek_stat4['status'] == '2'){
                 ?>
                <div class="input-group qw4 has-error">
                    <span class="input-group-btn">
                      <span class="btn btn-danger btn-file btn-flo4">
                          <i class="fa fa-camera"></i> <input type="file" name="file_nilai_un" id="imgInp"> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" readonly placeholder="Dokumen yang anda upload perlu pembenahan">
                  </div>
                <?php }elseif($cek_stat4['status'] == '0'){ ?>
                  <div class="input-group qw4">
                    <span class="input-group-btn">
                      <span class="btn btn-default btn-file" disabled>
                          <i class="fa fa-camera"></i> <input type="file" name="file_nilai_un" disabled> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" disabled placeholder="Menunggu Di Verifikasi">
                  </div>
                <?php }else{ ?>
                <div class="input-group qw4">
                    <span class="input-group-btn">
                      <span class="btn btn-default btn-file btn-flo4" disabled>
                          <i class="fa fa-camera"></i> <input type="file" name="file_nilai_un" id="imgInp" disabled> Pilih Gambar
                      </span>
                    </span>
                    <input type="text" class="form-control" disabled placeholder="Dokumen Sudah Di verifikasi">
                  </div>
                <?php } ?>
               
                <script type="text/javascript">
                    $(document).ready( function() {
                      $(document).on('change', '.btn-flo4 :file', function() {
                          var input = $(this),
                          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                          input.trigger('fileselect', [label]);
                        });
                        $('.btn-flo4 :file').on('fileselect', function(event, label) {
                          var input = $(this).parents('.qw4').find(':text'),
                          log = label;
                          if( input.length ) {
                            input.val(log);
                          } else {
                            if( log ) alert(log);
                          }
                        });
                    });
                </script>
              </div>
              <button class="btn btn-success btn-sm btn-flat" type="submit" name="upload_dokumen">Upload Dokumen</button>                
            </form>
          </div>
        </div>
      </div>
  </div>    
</div>