<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Konfirmasi Validasi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php 
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
           ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>No Pendaftaran</th>
                <th>Nama Pendaftar</th>
                <th>File Bukti Transfer Pendaftaran</th>
                <th>File Foto ( 4 x 6 )</th>
                <th>File Identitas Diri (KTP / SIM / KTS)</th>
                <th>File Ijazah Terakhir</th>
                <th>File Nilai UN ( Terlegalisir )</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $list = $db->list_validasi($conn);
              $no=0;
              foreach($list as $l){
              $no++;
              $pen = $db->select_cus($conn,array('nama_lengkap','nomor_pendaftaran'),'pendaftaran',array('id_pendaftaran' => $l['id_pendaftaran']),'id_pendaftaran','DESC');
              ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $pen['nomor_pendaftaran'] ?></td>
                <td><?php echo $pen['nama_lengkap'] ?></td>
                <?php 
                $li = $db->list_validasi2($conn,$l['id_pendaftaran']);
                $nos=0;
                foreach($li as $lis){
                $nos++;
                 ?>
                <td><button class="btn btn-warning btn-flat" data-toggle="modal" data-target="#myModalq<?php echo $nos ?>"><i class="fa fa-eye"></i></button></td>
                <?php 
                  }
                 ?>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        <?php 
        $list = $db->list_validasi($conn);
        $no=0;
        foreach($list as $l){
        $no++;
        $li = $db->list_validasi2($conn,$l['id_pendaftaran']);
          $nos=0;
          foreach($li as $lis){
          $nos++;
        ?>
        <!-- Modal -->
        <div id="myModalq<?php echo $nos ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <?php 
                $bukti_transfer = 'bukti_transfer'; 
                $foto_camaba = 'foto_camaba';
                $identitas_camaba = 'identitas_camaba';
                $ijazah_camaba = 'ijazah_camaba';
                $nilai_un_camaba = 'nilai_un_camaba';
                if(preg_match("/{$bukti_transfer}/i", $lis['file'])){
                  echo '<h4 class="modal-title">File Bukti Transfer</h4>';
                }elseif(preg_match("/{$foto_camaba}/i", $lis['file'])){
                  echo '<h4 class="modal-title">File Foto Camaba</h4>';
                }elseif(preg_match("/{$identitas_camaba}/i", $lis['file'])){
                  echo '<h4 class="modal-title">File Identitas Camaba</h4>';
                }elseif(preg_match("/{$ijazah_camaba}/i", $lis['file'])){
                  echo '<h4 class="modal-title">File Ijazah Camaba</h4>';
                }else{
                  echo '<h4 class="modal-title">File Nilai Un Camaba</h4>';
                }
                ?>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="container-fluid">
                    <img src="<?php echo $lis['file'] ?>" class="img-responsive" width="300" style="margin:0 auto;">
                    <div class="col-sm-6 col-sm-offset-3" style="margin-top:30px;">
                      <?php 
                      if($lis['status'] == '1'){
                       ?>
                       <a href="?p=konfir_validasi&validasi=2&id_file=<?php echo $lis['id_file'] ?>" class="btn btn-danger btn-flat btn-block">Tolak</a>   
                     <?php }elseif($lis['status'] == '2'){ ?>
                      <a href="?p=konfir_validasi&validasi=1&id_file=<?php echo $lis['id_file'] ?>" class="btn btn-info btn-flat btn-block">Konfirmasi</a>
                     <?php }else{ ?>
                    <a href="?p=konfir_validasi&validasi=1&id_file=<?php echo $lis['id_file'] ?>" class="btn btn-info btn-flat btn-block">Konfirmasi</a>
                    <a href="?p=konfir_validasi&validasi=2&id_file=<?php echo $lis['id_file'] ?>" class="btn btn-danger btn-flat btn-block">Tolak</a>   
                    <?php } ?>
                      
                                        
                    </div>
                  </div>                  
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
        <?php 
          }
        } 
        ?>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>