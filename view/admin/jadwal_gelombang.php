<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Jadwal Gelombang</h3>

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
                <th style="background-color: #eee;">No</th>
                <th style="background-color: #eee;">Gelombang</th>
                <th style="background-color: #eee;">Tanggal Mulai</th>
                <th style="background-color: #eee;">Tanggal Selesai</th>
                <th style="background-color: #eee;">Tahun PMB</th>
                <th style="background-color: #eee;">Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $jadwal_gel = $db->semua($conn,'jadwal_gelombang');
              $no=0;
              foreach($jadwal_gel as $j){
              $no++;
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td>Gelombang Ke <?php echo $j['gelombang']; ?></td>
                <td><?php echo date('d-m-Y',strtotime($j['tanggal_buka'])) ?></td>
                <td><?php echo date('d-m-Y',strtotime($j['tanggal_tutup'])) ?></td>
                <td><?php echo $j['tahun_pmb'] ?></td>
                <td>
                  <button class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#myModal<?php echo $no ?>"><i class="fa fa-edit"></i></button>
                  <a href="<?php echo base_url() ?>?delete_gel=<?php echo $j['id_jadwal'] ?>" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <div id="myModal<?php echo $no ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit Jadwal</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <form method="post" action="">
                          <div class="form-group">
                              <label>Gelombang</label>
                              <select class="form-control select2" name="gelombang" style="width: 100%;" required>
                            <option value="">Pilih Gelombang</option>
                              <?php 
                                for ($i=1; $i <= 10; $i++) { 
                               ?>
                              <option value="<?php echo $i ?>" <?php echo ($i == $j['gelombang']) ? 'selected' : '' ?>><?php echo $i ?></option>
                                <?php } ?> 
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="text" name="tanggal_mulai" class="form-control datepicker1" required data-date-format="yyyy-mm-dd" value="<?php echo $j['tanggal_buka']  ?>" >
                            </div>
                          <div class="form-group">
                            <label>Tanggal Selesai</label>
                            <input type="text" name="tanggal_selesai" class="form-control datepicker1" required data-date-format="yyyy-mm-dd" value="<?php echo $j['tanggal_tutup']  ?>" >
                            </div>
                          <div class="form-group">
                            <label>Tahun PMB</label>
                            <input type="text" name="tahun_pmb" class="form-control" value="<?php echo $j['tahun_pmb']  ?>" >
                            <input type="hidden" name="id_jadwal" class="form-control" value="<?php echo $j['id_jadwal']  ?>" >
                            </div>
                            <div class="form-group"> 
                              <button class="btn btn-primary btn-flat" type="submit" name="update_jadwal">Update</button>
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
              <form method="post" action="">
                  <tr style="background: #e4f1f1">
                  <td> <?php if(empty($no)){ echo '1';}else{ echo $no+1; } ?></td>
                  <td>Gelombang Ke
                        <select class="form-control select2" name="gelombang" style="width: 100px;display: inline-block" required>
                        <option>Pilih Gelombang</option>
                        <?php 
                        $active = $no+1;
                          for ($i=1; $i <= 10; $i++) { 
                         ?>
                        <option value="<?php echo $i ?>" <?php echo ($i == $active) ? 'selected' : '' ?>><?php echo $i ?></option>
                          <?php } ?>                        
                        </select>
                   </td>
                  <td>
                  <input type="text" name="tanggal_mulai" class="form-control datepicker1" required data-date-format="yyyy-mm-dd">
                  </td>
                  <td><input type="text" name="tanggal_selesai" class="form-control datepicker1" required data-date-format="yyyy-mm-dd"></td>
                  <td><input type="text" name="tahun_pmb" class="form-control" value="<?php echo date('Y') ?>" required></td>
                  <td>
                  <button type="submit" class="btn btn-success btn-flat btn-block" name="add_jadwal">Simpan</button>
                  </td>
                </tr>
              </form>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>