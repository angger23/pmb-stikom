<div class="content-wrapper">
    <div class="container">
      <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Ijin Onlen List</h3>
          </div>
          <div class="box-body">
             <?php  if(isset($_SESSION['alert'])){
                    echo $_SESSION['alert'];
                    unset($_SESSION['alert']);
                } ?>
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <?php
              $cari_tgl=$database->list_tgl_ijin($conn);
              $no=0;
              foreach($cari_tgl as $c){
              $no++;
              if(nama_hari(date('D',strtotime($c['tgl_ijin_dibuat']))) == 'Senin'){
                $dosen = 'Pak Cus (Sesi 1) & Pak Dwi (Sesi 2)';
              }elseif(nama_hari(date('D',strtotime($c['tgl_ijin_dibuat']))) == 'Selasa'){
                $dosen = 'Pak Umam (Sesi 1) & Bu Tintin (Sesi 2)';
              }elseif(nama_hari(date('D',strtotime($c['tgl_ijin_dibuat']))) == 'Rabu'){
                $dosen = 'Pak Agus (Sesi 1)';
              }elseif(nama_hari(date('D',strtotime($c['tgl_ijin_dibuat']))) == 'Kamis'){
                $dosen = 'Pak Sony (Sesi 1)';
              }elseif(nama_hari(date('D',strtotime($c['tgl_ijin_dibuat']))) == 'Jumat'){
                $dosen = 'Pak Untung (Sesi 1)';
              }else{
                $dosen = '';
              }
              ?>
              <li class="<?php echo ($c['tgl_ijin_dibuat'] == date('Y-m-d')) ? 'active' : '' ?>"><a href="#tab_<?php echo $c['tgl_ijin_dibuat'] ?>" data-toggle="tab"><?php echo nama_hari(date('D',strtotime($c['tgl_ijin_dibuat'])));?>, <?php echo tgl_indo($c['tgl_ijin_dibuat']); ?> - <?php echo $dosen ?></a></li>
            <?php } ?>
            </ul>
            <div class="tab-content">
              <?php
              $cari_tgl=$database->list_tgl_ijin($conn);
              $no=0;
              foreach($cari_tgl as $c){
              $no++;
              ?>
              <div class="tab-pane <?php echo ($c['tgl_ijin_dibuat'] == date('Y-m-d')) ? 'active' : '' ?>" id="tab_<?php echo $c['tgl_ijin_dibuat'] ?>">
                <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                       <tr>
                         <th>No</th>
                         <th>Nama</th>
                         <th>Status Ijin</th>
                         <th>Alasan</th>
                         <th>Sesi Ijin</th>
                         <th>Jam</th>
                         <?php
                         if(date('Y-m-d') != $c['tgl_ijin_dibuat']){}else{
                         ?>
                         <th>Aksi</th>
                       <?php } ?>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
                       $no=0;
                       $list_ijin=$database->list_mahasiswa($conn,$c['tgl_ijin_dibuat']);
                       foreach($list_ijin as $l){
                       $no++;
                       ?>
                       <tr>
                         <td><?php echo $no?></td>
                         <td><?php echo $l['nim'] ?> <?php echo $l['nama_mahasiswa'] ?></td>
                         <td><?php echo $l['stat_ijin'] ?></td>
                         <td><?php echo $l['alasan'] ?></td>
                         <td><?php echo $l['sesi'] ?></td>
                         <td><?php echo date('H:i:s',strtotime($l['ijin_dibuat'])) ?></td>
                         <?php
                         if(date('Y-m-d') != $c['tgl_ijin_dibuat']){}else{ // kalau harinya sudah tidak sama dengan hari tab yang di pilih maka tombol tidak muncul
                         ?>
                         <td>
                          <form method="post">
                            <input type="hidden" name="id" value="<?php echo $l['id_ijin'] ?>">
                           <button type="submit" value="1" class="btn btn-danger btn-flat btn-sm" name="del"><i class="fa fa-remove"></i> Batal Ijin</button>
                          <form>
                         </td>
                       <?php } ?>
                       </tr>
                     <?php } ?>
                     </tbody>
                   </table>
                </div>
              </div>
            <?php } ?>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
