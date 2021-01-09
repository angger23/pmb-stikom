<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Peserta</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-search"></i>

              <h3 class="box-title"> Cari berdasarkan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="?p=daftar_peserta">
                    <div class="col-md-3">
                      <label for="sel1">Pilihan Sekolah</label>
                        <select class="form-control select2" name="pilihan_sekolah" id="sel1">
                          <option value="">Pilih Sekolah</option>
                          <?php 
                            $sekolah = $db->list_sekolah($conn);
                            foreach($sekolah as $s){
                          ?>
                          <option value="<?php echo $s['sekolah'] ?>"><?php echo $s['sekolah'] ?></option>
                          <?php
                            }
                          ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                      <label for="sel1">Jenis Kelamin</label>
                        <select class="form-control select2" name="jenis_kelamin" id="sel1">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="1">Laki - Laki</option>
                          <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                      <label for="sel1">Jalur Pendaftaran</label>
                        <select class="form-control select2" name="jalur" id="sel1">
                          <option value="">Pilih Jalur Pendaftaran</option>
                          <option value="Stikom Berbagi">Stikom Berbagi</option>
                          <option value="S1 Reguler Pagi">S1 Reguler Pagi</option>
                          <option value="S1 Reguler Sore">S1 Reguler Sore</option>
                          <option value="Stikom Peduli">Stikom Peduli</option>
                          <option value="D3 Reguler">D3 Reguler</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                      <label for="sel1">Gelombang</label>
                        <select class="form-control select2" name="gelombang" id="sel1">
                          <option value="">Pilih Gelombang</option>
                          <option value="1">1</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                      <label style="visibility: hidden;">sdfsd</label>
                      <button class="btn btn-primary btn-flat" type="submit" name="detail_peserta">Cari</button>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <hr>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>No Pendaftaran</th>
                <th>Nama Pendaftar</th>
                <th>Tanggal Pendaftar</th>
                <th>Gelombang</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if(isset($_POST['detail_peserta'])){
                $data = array(
                  'asal_sekolah' => $_POST['pilihan_sekolah'],
                  'jenis_kelamin' => $_POST['jenis_kelamin'],
                  'pilihan_jalur' => $_POST['jalur'],
                  'gelombang' => $_POST['gelombang'],
                );
                $list = $db->list_peserta_cus($conn,$data);
              }else{
                $list = $db->semua($conn,'pendaftaran');
              }
              $no=0;
              foreach($list as $l){
              $no++;
              ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $l['nomor_pendaftaran'] ?></td>
                <td><?php echo $l['nama_lengkap'] ?></td>
                <td><?php echo date('d-m-Y',strtotime($l['created'])) ?></td>
                <td><?php echo $l['gelombang'] ?></td>
                <td>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $no ?>">Detail</button>
                    <a href="" type="button" class="btn btn-danger btn-sm" name="button"><i class="fa fa-trash"></i></a>
                    <?php 
                    $base_64 = base64_encode($l['nomor_pendaftaran']);
                    $url_param = rtrim($base_64, '=');
                     ?>
                     <?php 
              if(isset($_POST['detail_peserta'])){
                      $asal = base64_encode($_POST['pilihan_sekolah']);
                      $asalq = rtrim($asal, '=');
                      $jenis = base64_encode($_POST['jenis_kelamin']);
                      $jenisq = rtrim($jenis, '=');
                      $pilihan = base64_encode($_POST['jalur']);
                      $pilihanq = rtrim($pilihan, '=');
                      $gel = base64_encode($_POST['gelombang']);
                      $geq = rtrim($gel, '=');
                      ?>
                    <a href="?p=print_detail&id=<?php echo $url_param ?>&asal_sekolah=<?php echo $asalq ?>&jenis_kelamin=<?php echo $jenisq ?>&pilihan_jalur=<?php echo $pilihanq ?>&gelombang=<?php echo $gelq ?>" target="_blank" type="button" class="btn btn-success btn-sm" name="button"><i class="fa fa-print"></i> Print</a>
                  <?php }else{ ?>
                    <a href="?p=print_detail&id=<?php echo $url_param ?>" target="_blank" type="button" class="btn btn-success btn-sm" name="button"><i class="fa fa-print"></i> Print</a>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
          <?php 
          $list = $db->semua($conn,'pendaftaran');
          $no=0;
          foreach($list as $l){
          $no++;
          $cari_detail = $db->where($conn,'users',array('id_pendaftaran' => $l['id_pendaftaran']));
          $agama = $db->where($conn,'agama',array('id_agama' => $l['id_agama']));
          ?>
            <!-- Modal -->
              <div id="myModal<?php echo $no ?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Detail Peserta</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                          <table class="table table-bordered">
                              <tbody>
                                <tr>
                                  <td>Nama Lengkap</td>
                                  <td><?php echo $l['nama_lengkap'] ?></td>
                                </tr>
                                <tr>
                                  <td>Email</td>
                                  <td><?php echo $cari_detail['email'] ?></td>
                                </tr>
                                <tr>
                                  <td>Tempat , Tanggal Lahir</td>
                                  <td><?php echo $l['tempat_lahir'] ?>, <?php echo date('d-m-Y',strtotime($l['tgl_lahir'])) ?></td>
                                </tr>
                                <tr>
                                  <td>Agama</td>
                                  <td><?php echo $agama['agama'] ?></td>
                                </tr>
                                <tr>
                                  <td>Jenis Kelamin</td>
                                  <td><?php echo ($l['jenis_kelamin'] == '1') ? 'Laki -Laki' : 'Perempuan'; ?></td>
                                </tr>
                                <tr>
                                  <td>Status Nikah</td>
                                  <td>
                                    <?php echo $l['status_kawin'] ?></td>
                                </tr>
                                <tr>
                                  <td>Asal Sekolah</td>
                                  <td><?php echo $l['asal_sekolah'] ?></td>
                                </tr>
                                <tr>
                                  <td>Tahun Lulus</td>
                                  <td><?php echo $l['tahun_lulus'] ?></td>
                                </tr>
                                <tr>
                                  <td>No Telp</td>
                                  <td><?php echo $l['no_hp'] ?></td>
                                </tr>
                                <tr>
                                  <td>Jalur Masuk</td>
                                  <td>Jalur <?php echo $l['pilihan_jalur'] ?></td>
                                </tr>
                              
                              </tbody>
                            </table>            
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>

                </div>
              </div>  
          <?php } ?>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>