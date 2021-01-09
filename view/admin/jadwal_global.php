<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Jadwal Global</h3>

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
                <th style="background-color: #eee;">Judul Jadwal</th>
                <th style="background-color: #eee;">Deskripsi</th>
                <th style="background-color: #eee;">Tanggal Mulai</th>
                <th style="background-color: #eee;">Tanggal Akhir</th>
                <th style="background-color: #eee;">Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $jadwal_gel = $db->semua($conn,'jadwal_all');
              $no=0;
              foreach($jadwal_gel as $j){
              $no++;
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $j['title']; ?></td>
                <td><?php echo $j['deskripsi']; ?></td>
                <td><?php echo date('d-m-Y',strtotime($j['start'])) ?></td>
                <td><?php echo date('d-m-Y',strtotime($j['end'])) ?></td>
                <td>
                  <button class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#myModal<?php echo $no ?>"><i class="fa fa-edit"></i></button>
                  <a href="<?php echo base_url() ?>?delete_gel_all=<?php echo $j['_id'] ?>" class="btn btn-danger btn-flat btn-sm"><i class="fa fa-trash"></i></a>
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
                              <input type="hidden" name="id_jadwalx" value="<?php echo $j['_id'] ?>">
                              <label>Judul Jadwal</label>
                              <input type="text" class="form-control" name="judul_jadwal" value="<?php echo $j['title'] ?>">
                            </div>
                            <div class="form-group">
                              <label>Deskripsi Jadwal</label>
                              <textarea class="form-control" rows="4" name="deskripsi"><?php echo $j['deskripsi'] ?></textarea>
                            </div>
                            <div class="form-group">
                              <label>Tanggal Awal</label>
                              <input type="text" name="start" class="form-control datepicker1" required data-date-format="yyyy-mm-dd" value="<?php echo $j['start'] ?>">                   
                            </div>
                            <div class="form-group">
                              <label>Tanggal Akhir</label>
                              <input type="text" name="end" class="form-control datepicker1" required data-date-format="yyyy-mm-dd" value="<?php echo $j['end'] ?>">                   
                            </div>
                            <div class="form-group"> 
                              <button class="btn btn-primary btn-flat" type="submit" name="update_jadwal_global">Update</button>
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
                      <td><input type="text" class="form-control" name="title" placeholder="Judul Jadwal ... "></td>
                      <td><textarea class="form-control" rows="4" name="deskripsi" style="resize: none;"></textarea></td>
                      <td>
                      <input type="text" name="start" class="form-control datepicker1" required data-date-format="yyyy-mm-dd" placeholder="Tanggal Mulai ...">
                      </td>
                      <td><input type="text" name="end" class="form-control datepicker1" required data-date-format="yyyy-mm-dd" placeholder="Tanggal Mulai ..."></td>
                      
                      <td>
                      <button type="submit" class="btn btn-success btn-flat btn-block" name="add_jadwal_global">Simpan</button>
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