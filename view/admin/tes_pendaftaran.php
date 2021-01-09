<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tes Pendaftaran Mahasiswa Baru</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
           <div class="col-md-6 col-md-offset-3">
            <?php 
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="background-color: #ecf0f1">No</th>
                  <th style="background-color: #ecf0f1">Tes Tulis</th>
                  <th style="background-color: #ecf0f1">Tes Psikologi</th>
                  <th style="background-color: #ecf0f1">Tes Wawancara</th>
                  <th style="background-color: #ecf0f1"></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $list_grade = $db->semua($conn,'grade_tes_maba');
                $no=0;
                foreach($list_grade as $l){
                $no++;
                 ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $l['tes_tulis']; ?></td>
                  <td><?php echo $l['tes_psikologi'] ?></td>
                  <td><?php echo $l['tes_wawancara'] ?></td>
                  <td><button class="btn btn-info btn-flat btn-sm" data-toggle="modal" data-target="#myModal<?php echo $no ?>"><i class="fa fa-edit"></i></button></td>
                </tr>
                <!-- Modal -->
                  <div id="myModal<?php echo $no ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Grade</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <form method="post" action="">
                              <input type="hidden" name="id_grade" value="<?php echo $l['id_grade'] ?>">
                              <div class="form-group">
                                <label>Tes Tulis</label>
                                <input type="text" class="form-control" name="tes_tulis" value="<?php  echo $l['tes_tulis']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Tes Psikologi</label>
                                <input type="text" class="form-control" name="tes_psikologi" value="<?php echo $l['tes_psikologi']; ?>">
                              </div>
                              <div class="form-group">
                                <label>Tes Psikologi</label>
                                <input type="text" class="form-control" name="tes_psikologi" value="<?php echo $l['tes_wawancara']; ?>">
                              </div>
                              <div class="form-group">
                                <button class="btn btn-primary btn-sm btn-flat pull-right" type="submit" name="update_grade">Update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                    </div>
                  </div>
              <?php } ?>
              </tbody>
            </table>  
           </div>
          <div class="col-md-12">
          <hr>
            <div id="loadx">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Tes Tulis</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Tes Psikologi</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Tes Wawancara</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nomor Pendaftaran</th>
                          <th>Nama Pendaftar</th>
                          <th>Jalur Pilihan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        $list_tulis = $db->select_cus_loopq($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis'),'pendaftaran',array('tes_tulis' => ''));
                        foreach($list_tulis as $s){
                        $no++;
                        $cek_validasi = $db->where_cus_count($conn,'file_camaba',array('id_pendaftaran' => $s['id_pendaftaran'],'status' => '1'));
                        if($cek_validasi == 5){
                        ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $s['nomor_pendaftaran'] ?></td>
                          <td><?php echo $s['nama_lengkap'] ?></td>
                          <td><?php echo $s['pilihan_jalur'] ?></td>
                          <?php 
                          $cek_nilai = $db->where_cus($conn,'nilai_tes_maba',array('id_pendaftaran' => $s['id_pendaftaran'],'keterangan' => 'tes tulis'));
                          if(!$cek_nilai){
                           ?>
                          <td>
                            <button class="btn btn-info btn-flat btn-sm" data-toggle="modal" data-target="#myModalx<?php echo $no ?>">Proses <i class="fa fa-edit"></i></button>
                            <!-- Modal -->
                              <div id="myModalx<?php echo $no ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Tambahkan Nilai <?php echo $s['nama_lengkap'] ?></h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">
                                          <form id="upload_form<?php echo $no ?>">
                                            <div class="form-group">
                                              <label>Masukkan Nilai</label>
                                              <input type="text" class="form-control" name="nilai_tes_tulis">
                                              <input type="hidden" name="id_pendaftaran" value="<?php echo $s['id_pendaftaran'] ?>">
                                            </div>
                                            <div class="form-group">
                                              <button id="galoadingz<?php echo $no ?>" class="btn btn-primary btn-flat btn-sm" onclick="aksiku<?php echo $no ?>()" type="button">Tambahkan Nilai</button>
                                              <button id="loadingz<?php echo $no ?>" class="btn btn-primary btn-sm btn-flat" type="button">Tambahkan Nilai</button>
                                            </div>
                                          </form>
                                        <script type="text/javascript">
                                              $("#loadingz<?php echo $no ?>").hide();
                                            function aksiku<?php echo $no ?>(){
                                                var data = new FormData(document.getElementById('upload_form<?php echo $no ?>'));
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '<?php echo base_url() ?>',
                                                    data: data,
                                                    contentType: false,
                                                    cache: false,
                                                    processData:false,
                                                    beforeSend: function(){
                                                      $("#loadingz<?php echo $no ?>").show();
                                                      $("#galoadingz<?php echo $no ?>").hide();
                                                    },
                                                    success: function(msg){
                                                      showSuccessMessage('Berhasil menambah nilai <?php echo $s['nama_lengkap'] ?>');
                                                      $('#myModalx<?php echo $no ?>').modal('hide');
                                                      $('body').removeClass('modal-open');
                                                      $('.modal-backdrop').remove();
                                                      $("#loadx").load("<?php echo base_url() ?>?p=load_ulang");
                                                      $("#loadingz<?php echo $no ?>").hide();
                                                      $("#galoadingz<?php echo $no ?>").show();
                                                    }
                                                });
                                              }
                                            </script>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>

                                </div>
                              </div>
                          </td>
                        <?php }else{ ?>
                          <td>
                            <?php 
                            if($s['tes_tulis'] == 'Lulus'){
                             ?>
                             <button class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#myModalz<?php echo $no ?>"><?php echo $s['tes_tulis'] ?> <i class="fa fa-edit"></i></button>
                           <?php }else{ ?>
                            <button class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#myModalz<?php echo $no ?>"><?php echo $s['tes_tulis'] ?> <i class="fa fa-edit"></i></button>
                           <?php } ?>
                            
                            <!-- Modal -->
                              <div id="myModalz<?php echo $no ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Kelulusan Tes Tulis <?php echo $s['nama_lengkap'] ?></h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">
                                          <div class="container-fluid">
                                             <button id="loadingx<?php echo $no ?>" class="btn btn-primary btn-sm btn-flat" type="button">Tambahkan Nilai</button>
                                          <?php 
                                            if($s['tes_tulis'] == 'Lulus'){
                                           ?>
                                           <button class="btn btn-danger btn-flat btn-block" onclick="okek<?php echo $no ?>()" id="galoadingx<?php echo $no ?>">Tidak Lulus</button>
                                           <?php }else{ ?>
                                            <button class="btn btn-success btn-flat btn-block" onclick="okek<?php echo $no ?>()" id="galoadingx<?php echo $no ?>">Lulus</button>
                                           <?php } ?>
                                          </div>
                                        <script type="text/javascript">
                                              $("#loadingx<?php echo $no ?>").hide();
                                              function okek<?php echo $no ?>(){
                                                 <?php 
                                            if($s['tes_tulis'] == 'Lulus'){
                                           ?>
                                                var statq = 'Tidak Lulus';
                                           <?php }else{ ?>
                                                var statq = 'Lulus';
                                           <?php } ?>
                                                  id_pendaftaran = <?php echo $s['id_pendaftaran'] ?>;
                                                jQuery.ajax({
                                                  type: 'POST',
                                                  url: "<?php echo base_url() ?>",
                                                  data: {stat_tes_tulis:statq,id_pendaftaran:id_pendaftaran},
                                                  beforeSend: function(){
                                                      $("#loadingx<?php echo $no ?>").show();
                                                      $("#galoadingx<?php echo $no ?>").hide();
                                                    },
                                                  success: function(data) {
                                                    showSuccessMessage("Berhasil mengubah data !");
                                                    $('#myModalz<?php echo $no ?>').modal('hide');
                                                      $('body').removeClass('modal-open');
                                                      $('.modal-backdrop').remove();
                                                      $("#loadx").load("<?php echo base_url() ?>?p=load_ulang");
                                                      $("#loadingx<?php echo $no ?>").hide();
                                                      $("#galoadingx<?php echo $no ?>").show();
                                                  },
                                                error: function (data) {
                                                    pesanGagal('Gagal mengubah data');
                                                }                           
                                                });

                                              }
                                            </script>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>

                                </div>
                              </div>
                          </td>
                        <?php } ?>
                        </tr>
                      <?php }else{} ?>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nomor Pendaftaran</th>
                          <th>Nama Pendaftar</th>
                          <th>Jalur Pilihan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        $list_psikologi = $db->select_cus_loop2_cus($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_psikologi'),'pendaftaran',array('tes_tulis' => 'lulus','tes_psikologi' => ''));
                        if(!$list_psikologi){}else{
                        foreach($list_psikologi as $s){
                        
                        $no++;
                        ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $s['nomor_pendaftaran'] ?></td>
                          <td><?php echo $s['nama_lengkap'] ?></td>
                          <td><?php echo $s['pilihan_jalur'] ?></td>
                          <?php 
                          $cek_nilai = $db->where_cus($conn,'nilai_tes_maba',array('id_pendaftaran' => $s['id_pendaftaran'],'keterangan' => 'tes psikologi'));
                          if(!$cek_nilai){
                           ?>
                          <td>
                            <button class="btn btn-info btn-flat btn-sm" data-toggle="modal" data-target="#myModalxx<?php echo $no ?>">Proses <i class="fa fa-edit"></i></button>
                            <!-- Modal -->
                              <div id="myModalxx<?php echo $no ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Tambahkan Nilai <?php echo $s['nama_lengkap'] ?></h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">
                                          <form id="upload_formm<?php echo $no ?>">
                                            <div class="form-group">
                                              <label>Masukkan Nilai</label>
                                              <input type="text" class="form-control" name="nilai_tes_psiko">
                                              <input type="hidden" name="id_pendaftaran" value="<?php echo $s['id_pendaftaran'] ?>">
                                            </div>
                                            <div class="form-group">
                                              <button id="galoadingzz<?php echo $no ?>" class="btn btn-primary btn-flat btn-sm" onclick="aksikuu<?php echo $no ?>()" type="button">Tambahkan Nilai</button>
                                              <button id="loadingzz<?php echo $no ?>" class="btn btn-primary btn-sm btn-flat btn-disabled" type="button">Loading ... </button>
                                            </div>
                                          </form>
                                        <script type="text/javascript">
                                              $("#loadingzz<?php echo $no ?>").hide();
                                            function aksikuu<?php echo $no ?>(){
                                                var data = new FormData(document.getElementById('upload_formm<?php echo $no ?>'));
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '<?php echo base_url() ?>',
                                                    data: data,
                                                    contentType: false,
                                                    cache: false,
                                                    processData:false,
                                                    beforeSend: function(){
                                                      $("#loadingzz<?php echo $no ?>").show();
                                                      $("#galoadingzz<?php echo $no ?>").hide();
                                                    },
                                                    success: function(msg){
                                                      showSuccessMessage('Berhasil menambah nilai <?php echo $s['nama_lengkap'] ?>');
                                                      $('#myModalxx<?php echo $no ?>').modal('hide');
                                                      $('body').removeClass('modal-open');
                                                      $('.modal-backdrop').remove();
                                                      $("#loadx").load("<?php echo base_url() ?>?p=load_ulang");
                                                      $("#loadingzz<?php echo $no ?>").hide();
                                                      $("#galoadingzz<?php echo $no ?>").show();
                                                    }
                                                });
                                              }
                                            </script>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>

                                </div>
                              </div>
                          </td>
                        <?php }else{ ?>
                          <td>
                            <?php 
                            if($s['tes_psikologi'] == 'Lulus'){
                             ?>
                             <button class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#myModalzz<?php echo $no ?>"><?php echo $s['tes_psikologi'] ?> <i class="fa fa-edit"></i></button>
                           <?php }else{ ?>
                            <button class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#myModalzz<?php echo $no ?>"><?php echo $s['tes_psikologi'] ?> <i class="fa fa-edit"></i></button>
                           <?php } ?>
                            
                            <!-- Modal -->
                              <div id="myModalzz<?php echo $no ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Kelulusan Tes Psikologi <?php echo $s['nama_lengkap'] ?></h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">
                                          <div class="container-fluid">
                                             
                                          <?php 
                                            if($s['tes_psikologi'] == 'Lulus'){
                                           ?>
                                           <button class="btn btn-danger btn-flat btn-block" onclick="okekk<?php echo $no ?>()" id="galoadingxx<?php echo $no ?>">Tidak Lulus</button>
                                           <?php }else{ ?>
                                            <button class="btn btn-success btn-flat btn-block" onclick="okekk<?php echo $no ?>()" id="galoadingxx<?php echo $no ?>">Lulus</button>
                                           <?php } ?>
                                          </div>
                                        <script type="text/javascript">
                                              $("#loadingxx<?php echo $no ?>").hide();
                                              function okekk<?php echo $no ?>(){
                                                 <?php 
                                            if($s['tes_psikologi'] == 'Lulus'){
                                           ?>
                                                var statq = 'Tidak Lulus';
                                           <?php }else{ ?>
                                                var statq = 'Lulus';
                                           <?php } ?>
                                                  id_pendaftaran = <?php echo $s['id_pendaftaran'] ?>;
                                                jQuery.ajax({
                                                  type: 'POST',
                                                  url: "<?php echo base_url() ?>",
                                                  data: {stat_tes_psiko:statq,id_pendaftaran:id_pendaftaran},
                                                  beforeSend: function(){
                                                      $("#loadingxx<?php echo $no ?>").show();
                                                      $("#galoadingxx<?php echo $no ?>").hide();
                                                    },
                                                  success: function(data) {
                                                    showSuccessMessage("Berhasil mengubah data !");
                                                    $('#myModalzz<?php echo $no ?>').modal('hide');
                                                      $('body').removeClass('modal-open');
                                                      $('.modal-backdrop').remove();
                                                      $("#loadx").load("<?php echo base_url() ?>?p=load_ulang");
                                                      $("#loadingxx<?php echo $no ?>").hide();
                                                      $("#galoadingxx<?php echo $no ?>").show();
                                                  },
                                                error: function (data) {
                                                    pesanGagal('Gagal mengubah data');
                                                }                           
                                                });

                                              }
                                            </script>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>

                                </div>
                              </div>
                          </td>
                        <?php } ?>
                        </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane" id="tab_3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nomor Pendaftaran</th>
                          <th>Nama Pendaftar</th>
                          <th>Jalur Pilihan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        $list_wawancara = $db->select_cus_loop2_cus($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_wawancara'),'pendaftaran',array('tes_psikologi' => 'lulus','tes_wawancara' => ''));
                        if(!$list_wawancara){}else{
                        foreach($list_wawancara as $s){
                        $no++;
                        ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $s['nomor_pendaftaran'] ?></td>
                          <td><?php echo $s['nama_lengkap'] ?></td>
                          <td><?php echo $s['pilihan_jalur'] ?></td>
                          <?php 
                          $cek_nilai = $db->where_cus($conn,'nilai_tes_maba',array('id_pendaftaran' => $s['id_pendaftaran'],'keterangan' => 'tes wawancara'));
                          if(!$cek_nilai){
                           ?>
                          <td>
                            <button class="btn btn-info btn-flat btn-sm" data-toggle="modal" data-target="#myModalxxx<?php echo $no ?>">Proses <i class="fa fa-edit"></i></button>
                            <!-- Modal -->
                              <div id="myModalxxx<?php echo $no ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Tambahkan Nilai <?php echo $s['nama_lengkap'] ?></h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">
                                          <form id="upload_formmm<?php echo $no ?>">
                                            <div class="form-group">
                                              <label>Masukkan Nilai</label>
                                              <input type="text" class="form-control" name="nilai_tes_wawancara">
                                              <input type="hidden" name="id_pendaftaran" value="<?php echo $s['id_pendaftaran'] ?>">
                                            </div>
                                            <div class="form-group">
                                              <button id="galoadingzzz<?php echo $no ?>" class="btn btn-primary btn-flat btn-sm" onclick="aksikuuu<?php echo $no ?>()" type="button">Tambahkan Nilai</button>
                                              <button id="loadingzzz<?php echo $no ?>" class="btn btn-primary btn-sm btn-flat btn-disabled" type="button">Loading ... </button>
                                            </div>
                                          </form>
                                        <script type="text/javascript">
                                              $("#loadingzzz<?php echo $no ?>").hide();
                                            function aksikuuu<?php echo $no ?>(){
                                                var data = new FormData(document.getElementById('upload_formmm<?php echo $no ?>'));
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '<?php echo base_url() ?>',
                                                    data: data,
                                                    contentType: false,
                                                    cache: false,
                                                    processData:false,
                                                    beforeSend: function(){
                                                      $("#loadingzzz<?php echo $no ?>").show();
                                                      $("#galoadingzzz<?php echo $no ?>").hide();
                                                    },
                                                    success: function(msg){
                                                      showSuccessMessage('Berhasil menambah nilai <?php echo $s['nama_lengkap'] ?>');
                                                      $('#myModalxxx<?php echo $no ?>').modal('hide');
                                                      $('body').removeClass('modal-open');
                                                      $('.modal-backdrop').remove();
                                                      $("#loadx").load("<?php echo base_url() ?>?p=load_ulang");
                                                      $("#loadingzzz<?php echo $no ?>").hide();
                                                      $("#galoadingzzz<?php echo $no ?>").show();
                                                    }
                                                });
                                              }
                                            </script>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>

                                </div>
                              </div>
                          </td>
                        <?php }else{ ?>
                          <td>
                            <?php 
                            if($s['tes_wawancara'] == 'Lulus'){
                             ?>
                             <button class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#myModalzzz<?php echo $no ?>"><?php echo $s['tes_wawancara'] ?> <i class="fa fa-edit"></i></button>
                           <?php }else{ ?>
                            <button class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#myModalzzz<?php echo $no ?>"><?php echo $s['tes_wawancara'] ?> <i class="fa fa-edit"></i></button>
                           <?php } ?>
                            
                            <!-- Modal -->
                              <div id="myModalzzz<?php echo $no ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">

                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Kelulusan Tes Wawancara <?php echo $s['nama_lengkap'] ?></h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">
                                          <div class="container-fluid">
                                             
                                          <?php 
                                            if($s['tes_wawancara'] == 'Lulus'){
                                           ?>
                                           <button class="btn btn-danger btn-flat btn-block" onclick="okekkk<?php echo $no ?>()" id="galoadingxxx<?php echo $no ?>">Tidak Lulus</button>
                                           <?php }else{ ?>
                                            <button class="btn btn-success btn-flat btn-block" onclick="okekkk<?php echo $no ?>()" id="galoadingxxx<?php echo $no ?>">Lulus</button>
                                           <?php } ?>
                                          </div>
                                        <script type="text/javascript">
                                              $("#loadingxxx<?php echo $no ?>").hide();
                                              function okekkk<?php echo $no ?>(){
                                                 <?php 
                                            if($s['tes_wawancara'] == 'Lulus'){
                                           ?>
                                                var statq = 'Tidak Lulus';
                                           <?php }else{ ?>
                                                var statq = 'Lulus';
                                           <?php } ?>
                                                  id_pendaftaran = <?php echo $s['id_pendaftaran'] ?>;
                                                jQuery.ajax({
                                                  type: 'POST',
                                                  url: "<?php echo base_url() ?>",
                                                  data: {stat_tes_wawan:statq,id_pendaftaran:id_pendaftaran},
                                                  beforeSend: function(){
                                                      $("#loadingxxx<?php echo $no ?>").show();
                                                      $("#galoadingxxx<?php echo $no ?>").hide();
                                                    },
                                                  success: function(data) {
                                                    showSuccessMessage("Berhasil mengubah data !");
                                                    $('#myModalzzz<?php echo $no ?>').modal('hide');
                                                      $('body').removeClass('modal-open');
                                                      $('.modal-backdrop').remove();
                                                      $("#loadx").load("<?php echo base_url() ?>?p=load_ulang");
                                                      $("#loadingxxx<?php echo $no ?>").hide();
                                                      $("#galoadingxxx<?php echo $no ?>").show();
                                                  },
                                                error: function (data) {
                                                    pesanGagal('Gagal mengubah data');
                                                }                           
                                                });

                                              }
                                            </script>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>

                                </div>
                              </div>
                          </td>
                        <?php } ?>
                        </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.tab-content -->
              </div>
            </div>
          </div>
         
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>