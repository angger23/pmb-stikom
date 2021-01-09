<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Rekap Pendaftaran</h3>

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
                    <form method="post" action="?p=rekap_pendaftaran">
                        <div class="col-md-3">
                          <label for="sel1">Pilihan Tahun</label>
                            <select class="form-control select2" name="pilihan_sekolah" id="sel1">
                              <option value="">Pilih Tahun</option>
                              <?php
                                    $tahunnow = date("Y");
                                    for($i=$tahunnow;$i>=2008;$i--){
                                ?>
                                <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                                <?php } ?>
                              
                            </select>
                        </div>
                        <div class="col-md-3">
                          <label for="sel1">Status Kelulusan</label>
                            <select class="form-control select2" name="status_kelulusan" id="sel1">
                              <option value="">Pilih Status Kelulusan</option>
                              <option value="Lulus">Lulus</option>
                              <option value="Tidak Lulus">Tidak Lulus</option>
                              <option value="all">Semua</option>
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
                          <button class="btn btn-primary btn-flat" type="submit" name="rekap">Cari</button>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
              </div>
          <hr>
          <?php 
            // if(isset($_POST['detail_peserta'])){
            //     $data = array(
            //       'asal_sekolah' => $_POST['pilihan_sekolah'],
            //       'jenis_kelamin' => $_POST['jenis_kelamin'],
            //       'pilihan_jalur' => $_POST['jalur'],
            //       'gelombang' => $_POST['gelombang'],
            //     );
            //     $list = $db->list_peserta_cus($conn,$data);
            //   }else{
            //     $list = $db->semua($conn,'pendaftaran');
            //   }
           ?>
           <div class="col-md-6">
              <div class="col-md-12">
                <h3>Berdasar Jalur Pendaftaran</h3>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Nama Jalur</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                           if(isset($_POST['rekap'])){
                              $data = array(
                                'asal_sekolah' => $_POST['pilihan_sekolah'],
                                'jenis_kelamin' => $_POST['jenis_kelamin'],
                                'pilihan_jalur' => $_POST['jalur'],
                                'gelombang' => $_POST['gelombang'],
                              );
                              // $list = $db->list_peserta_cus($conn,$data);

                            }else{
                              // $list = $db->semua($conn,'pendaftaran');
                              $berbagi = $db->where_cus_count($conn,'pendaftaran',array('pilihan_jalur' => 'Stikom Berbagi'));
                        $peduli = $db->where_cus_count($conn,'pendaftaran',array('pilihan_jalur' => 'Stikom Peduli'));
                        $s1pagi = $db->where_cus_count($conn,'pendaftaran',array('pilihan_jalur' => 'S1 Reguler Pagi'));
                        $s1sore = $db->where_cus_count($conn,'pendaftaran',array('pilihan_jalur' => 'S1 Reguler Sore'));
                        $d3reg = $db->where_cus_count($conn,'pendaftaran',array('pilihan_jalur' => 'D3 Reguler'));
                            }
                        

                       ?>
                      <tr>
                        <td>Stikom Berbagi</td>
                        <td><?php echo $berbagi ?> Orang</td>
                      </tr>
                       <tr>
                        <td>Stikom Peduli</td>
                        <td><?php echo $peduli ?> Orang</td>
                      </tr>
                       <tr>
                        <td>S1 Reguler Pagi</td>
                        <td><?php echo $s1pagi ?> Orang</td>
                      </tr>
                      <tr>
                        <td>S1 Reguler Sore</td>
                        <td><?php echo $s1sore ?> Orang</td>
                      </tr>
                      <tr>
                        <td>D3 Reguler</td>
                        <td><?php echo $d3reg ?> Orang</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>