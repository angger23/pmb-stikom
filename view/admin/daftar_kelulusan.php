<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Seleksi Kelulusan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Grade Nilai Tes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
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
                                      <label>Tes Wawancara</label>
                                      <input type="text" class="form-control" name="tes_wawancara" value="<?php echo $l['tes_wawancara']; ?>">
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
          </div>
           <hr>
           <div class="col-md-12">
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tabb_11" data-toggle="tab">Peserta Lulus</a></li>
              <li><a href="#tabb_22" data-toggle="tab">Peserta Tidak Lulus</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tabb_11">
                 <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <?php 
                    $s1pagi = $db->select_cus_loop2_nums($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'S1 Reguler Pagi','status_kelulusan' => 'Lulus'));
                    $s1sore = $db->select_cus_loop2_nums($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'S1 Reguler Sore','status_kelulusan' => 'Lulus'));
                    $d3reguler = $db->select_cus_loop2_nums($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'D3 Reguler','status_kelulusan' => 'Lulus'));
                    $peduli = $db->select_cus_loop2_nums($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'Stikom Peduli','status_kelulusan' => 'Lulus'));
                    $berbagi = $db->select_cus_loop2_nums($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'Stikom Berbagi','status_kelulusan' => 'Lulus'));
                     ?>
                    <li class="active"><a href="#tab_1" data-toggle="tab">S1 Reguler Pagi <span class="label label-info"><?php echo $s1pagi ?></span></a></li>
                    <li><a href="#tab_2" data-toggle="tab">S1 Reguler Sore <span class="label label-info"><?php echo $s1sore ?></span></a></li>
                    <li><a href="#tab_3" data-toggle="tab">D3 Reguler <span class="label label-info"><?php echo $d3reguler ?></span></a></li>
                    <li><a href="#tab_4" data-toggle="tab">STIKOM Peduli <span class="label label-info"><?php echo $peduli ?></span></a></li>
                    <li><a href="#tab_5" data-toggle="tab">STIKOM Berbagi <span class="label label-info"><?php echo $berbagi ?></span></a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nomor Pendaftaran</th>
                              <th>Nama Pendaftar</th>
                              <th>Tes Tulis</th>
                              <th>Tes Psikologi</th>
                              <th>Tes Wawancara</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=0;
                            $lulus = $db->select_cus_loop2($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'S1 Reguler Pagi','status_kelulusan' => 'Lulus'));
                            if($lulus){
                            foreach($lulus as $s){
                            $no++;
                            ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $s['nomor_pendaftaran'] ?></td>
                              <td><?php echo $s['nama_lengkap'] ?></td>
                              <td>
                                <?php if($s['tes_tulis'] == 'Lulus'){ ?>
                                <!-- <button class="btn btn-success btn-flat">Lulus</button> -->
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_psikologi'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_wawancara'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                            </tr>
                            <?php } }else{}?>
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
                              <th>Tes Tulis</th>
                              <th>Tes Psikologi</th>
                              <th>Tes Wawancara</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=0;
                            $s1sorek = $db->select_cus_loop2($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'S1 Reguler Sore','status_kelulusan' => 'Lulus'));
                            if($s1sorek){
                            foreach($s1sorek as $s){
                            $no++;
                            ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $s['nomor_pendaftaran'] ?></td>
                              <td><?php echo $s['nama_lengkap'] ?></td>
                              <td>
                                <?php if($s['tes_tulis'] == 'Lulus'){ ?>
                                <!-- <button class="btn btn-success btn-flat">Lulus</button> -->
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_psikologi'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_wawancara'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                            </tr>
                            <?php } }else{}?>
                          </tbody>
                      </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nomor Pendaftaran</th>
                              <th>Nama Pendaftar</th>
                              <th>Tes Tulis</th>
                              <th>Tes Psikologi</th>
                              <th>Tes Wawancara</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=0;
                            $d3le = $db->select_cus_loop2($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'D3 Reguler','status_kelulusan' => 'Lulus'));
                            if($d3le){
                            foreach($d3le as $s){
                            $no++;
                            ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $s['nomor_pendaftaran'] ?></td>
                              <td><?php echo $s['nama_lengkap'] ?></td>
                              <td>
                                <?php if($s['tes_tulis'] == 'Lulus'){ ?>
                                <!-- <button class="btn btn-success btn-flat">Lulus</button> -->
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_psikologi'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_wawancara'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                            </tr>
                            <?php } }else{} ?>
                          </tbody>
                      </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_4">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nomor Pendaftaran</th>
                              <th>Nama Pendaftar</th>
                              <th>Tes Tulis</th>
                              <th>Tes Psikologi</th>
                              <th>Tes Wawancara</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=0;
                            $pedulisi = $db->select_cus_loop2($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'Stikom Peduli','status_kelulusan' => 'Lulus'));
                            if($pedulisi){
                            foreach($pedulisi as $s){
                            $no++;
                            ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $s['nomor_pendaftaran'] ?></td>
                              <td><?php echo $s['nama_lengkap'] ?></td>
                              <td>
                                <?php if($s['tes_tulis'] == 'Lulus'){ ?>
                                <!-- <button class="btn btn-success btn-flat">Lulus</button> -->
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_psikologi'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_wawancara'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                            </tr>
                            <?php } }else{} ?>
                          </tbody>
                      </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_5">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nomor Pendaftaran</th>
                              <th>Nama Pendaftar</th>
                              <th>Tes Tulis</th>
                              <th>Tes Psikologi</th>
                              <th>Tes Wawancara</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=0;
                            $berbagisi = $db->select_cus_loop2($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'Stikom Berbagi','status_kelulusan' => 'Lulus'));
                            if($berbagisi){
                            foreach($berbagisi as $s){
                            $no++;
                            ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $s['nomor_pendaftaran'] ?></td>
                              <td><?php echo $s['nama_lengkap'] ?></td>
                              <td>
                                <?php if($s['tes_tulis'] == 'Lulus'){ ?>
                                <!-- <button class="btn btn-success btn-flat">Lulus</button> -->
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_psikologi'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_wawancara'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                            </tr>
                            <?php } }else{} ?>
                          </tbody>
                      </table>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tabb_22">
                 <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <?php 
                    $s1pagii = $db->select_cus_loop2_nums($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'S1 Reguler Pagi','status_kelulusan' => 'Tidak Lulus'));
                    $s1soree = $db->select_cus_loop2_nums($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'S1 Reguler Sore','status_kelulusan' => 'Tidak Lulus'));
                    $d3regulerr = $db->select_cus_loop2_nums($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'D3 Reguler','status_kelulusan' => 'Tidak Lulus'));
                    $pedulii = $db->select_cus_loop2_nums($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'Stikom Peduli','status_kelulusan' => 'Tidak Lulus'));
                    $berbagii = $db->select_cus_loop2_nums($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'Stikom Berbagi','status_kelulusan' => 'Tidak Lulus'));
                     ?>
                    <li class="active"><a href="#tab_1m" data-toggle="tab">S1 Reguler Pagi <span class="label label-info"><?php echo $s1pagii ?></span></a></li>
                    <li><a href="#tab_2m" data-toggle="tab">S1 Reguler Sore <span class="label label-info"><?php echo $s1soree ?></span></a></li>
                    <li><a href="#tab_3m" data-toggle="tab">D3 Reguler <span class="label label-info"><?php echo $d3reguler ?></span></a></li>
                    <li><a href="#tab_4m" data-toggle="tab">STIKOM Peduli <span class="label label-info"><?php echo $pedulii ?></span></a></li>
                    <li><a href="#tab_5m" data-toggle="tab">STIKOM Berbagi <span class="label label-info"><?php echo $berbagii ?></span></a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_1m">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nomor Pendaftaran</th>
                              <th>Nama Pendaftar</th>
                              <th>Tes Tulis</th>
                              <th>Tes Psikologi</th>
                              <th>Tes Wawancara</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=0;
                            $luluss = $db->select_cus_loop2($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'S1 Reguler Pagi','status_kelulusan' => 'Tidak Lulus'));
                            if($luluss){
                            foreach($luluss as $s){
                            $no++;
                            ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $s['nomor_pendaftaran'] ?></td>
                              <td><?php echo $s['nama_lengkap'] ?></td>
                              <td>
                                <?php if($s['tes_tulis'] == 'Lulus'){ ?>
                                <!-- <button class="btn btn-success btn-flat">Lulus</button> -->
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_psikologi'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_wawancara'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                            </tr>
                            <?php } }else{}?>
                          </tbody>
                      </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2m">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nomor Pendaftaran</th>
                              <th>Nama Pendaftar</th>
                              <th>Tes Tulis</th>
                              <th>Tes Psikologi</th>
                              <th>Tes Wawancara</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=0;
                            $s1sorekk = $db->select_cus_loop2($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'S1 Reguler Sore','status_kelulusan' => 'Tidak Lulus'));
                            if($s1sorekk){
                            foreach($s1sorekk as $s){
                            $no++;
                            ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $s['nomor_pendaftaran'] ?></td>
                              <td><?php echo $s['nama_lengkap'] ?></td>
                              <td>
                                <?php if($s['tes_tulis'] == 'Lulus'){ ?>
                                <!-- <button class="btn btn-success btn-flat">Lulus</button> -->
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_psikologi'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_wawancara'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                            </tr>
                            <?php } }else{}?>
                          </tbody>
                      </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3m">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nomor Pendaftaran</th>
                              <th>Nama Pendaftar</th>
                              <th>Tes Tulis</th>
                              <th>Tes Psikologi</th>
                              <th>Tes Wawancara</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=0;
                            $d3lee = $db->select_cus_loop2($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'D3 Reguler','status_kelulusan' => 'Tidak Lulus'));
                            if($d3lee){
                            foreach($d3lee as $s){
                            $no++;
                            ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $s['nomor_pendaftaran'] ?></td>
                              <td><?php echo $s['nama_lengkap'] ?></td>
                              <td>
                                <?php if($s['tes_tulis'] == 'Lulus'){ ?>
                                <!-- <button class="btn btn-success btn-flat">Lulus</button> -->
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_psikologi'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_wawancara'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                            </tr>
                            <?php } }else{} ?>
                          </tbody>
                      </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_4m">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nomor Pendaftaran</th>
                              <th>Nama Pendaftar</th>
                              <th>Tes Tulis</th>
                              <th>Tes Psikologi</th>
                              <th>Tes Wawancara</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=0;
                            $pedulisii = $db->select_cus_loop2($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'Stikom Peduli','status_kelulusan' => 'Tidak Lulus'));
                            if($pedulisii){
                            foreach($pedulisii as $s){
                            $no++;
                            ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $s['nomor_pendaftaran'] ?></td>
                              <td><?php echo $s['nama_lengkap'] ?></td>
                              <td>
                                <?php if($s['tes_tulis'] == 'Lulus'){ ?>
                                <!-- <button class="btn btn-success btn-flat">Lulus</button> -->
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_psikologi'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_wawancara'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                            </tr>
                            <?php } }else{} ?>
                          </tbody>
                      </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_5m">
                      <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nomor Pendaftaran</th>
                              <th>Nama Pendaftar</th>
                              <th>Tes Tulis</th>
                              <th>Tes Psikologi</th>
                              <th>Tes Wawancara</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $no=0;
                            $berbagisii = $db->select_cus_loop2($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','tes_wawancara','transfer','status_kelulusan'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'Stikom Berbagi','status_kelulusan' => 'Tidak Lulus'));
                            if($berbagisii){
                            foreach($berbagisii as $s){
                            $no++;
                            ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $s['nomor_pendaftaran'] ?></td>
                              <td><?php echo $s['nama_lengkap'] ?></td>
                              <td>
                                <?php if($s['tes_tulis'] == 'Lulus'){ ?>
                                <!-- <button class="btn btn-success btn-flat">Lulus</button> -->
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_psikologi'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                              <td>
                                <?php if($s['tes_wawancara'] == 'Lulus'){ ?>
                                <p style="font-size: 20px"><b>LULUS</b></p>
                              <?php }else{ ?>
                                <p style="font-size: 20px;text-transform: italic"><b>TIDAK LULUS</b></p>
                              <?php } ?>
                              </td>
                            </tr>
                            <?php } }else{} ?>
                          </tbody>
                      </table>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
           
           </div>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>