<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
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
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>