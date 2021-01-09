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
                  <li class="active"><a href="#tab_1" data-toggle="tab">S1 Reguler Pagi <span class="label label-info">0</span></a></li>
                  <li><a href="#tab_2" data-toggle="tab">S1 Reguler Sore <span class="label label-info">0</span></a></li>
                  <li><a href="#tab_2" data-toggle="tab">D3 Reguler <span class="label label-info">0</span></a></li>
                  <li><a href="#tab_2" data-toggle="tab">STIKOM Peduli <span class="label label-info">0</span></a></li>
                  <li><a href="#tab_2" data-toggle="tab">STIKOM Berbagi <span class="label label-info">0</span></a></li>
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
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $no=0;
                          $list_tulis = $db->select_cus_loop2($conn,array('id_pendaftaran','nomor_pendaftaran','nama_lengkap','pilihan_jalur','tes_tulis','tes_psikologi','transfer'),'pendaftaran',array('transfer' => 'sudah','pilihan_jalur' => 'S1 Reguler Pagi'));
                          foreach($list_tulis as $s){
                          $no++;
                          ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $s['nomor_pendaftaran'] ?></td>
                            <td><?php echo $s['nama_lengkap'] ?></td>
                            <td>
                              <?php if($s['tes_tulis'] == 'Lulus'){ ?>
                              <button class="btn btn-success btn-flat">Lulus</button>
                            <?php }else{ ?>
                              <button class="btn btn-danger btn-flat">Tidak Lulus</button>
                            <?php } ?>
                            </td>
                            <td>
                              <?php if($s['tes_psikologi'] == 'Lulus'){ ?>
                              <button class="btn btn-success btn-flat">Lulus</button>
                            <?php }else{ ?>
                              <button class="btn btn-danger btn-flat">Tidak Lulus</button>
                            <?php } ?>
                            </td>
                            <td></td>
                            <td>
                              <button class="btn btn-success btn-flat">Lulus</button>
                              <button class="btn btn-danger btn-flat">Tidak Lulus</button>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    The European languages are members of the same family. Their separate existence is a myth.
                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
                    new common language would be desirable: one could refuse to pay expensive translators. To
                    achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                    words. If several languages coalesce, the grammar of the resulting language is more simple
                    and regular than that of the individual languages.
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                  </div>
                  <!-- /.tab-pane -->
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