<!-- <meta http-equiv="refresh" content="0; <?php echo base_url() ?>khs"> -->
<body onload="window.print();window.close();">
<style type="text/css">
@media print{
	@page {
    margin: 0px;
    padding: 0px 0px;
}
 /*
      .clear{
        padding: 15px;
      }
*/
      .box-body {
          border-top-left-radius: 0;
          border-top-right-radius: 0;
          border-bottom-right-radius: 3px;
          border-bottom-left-radius: 3px;
          /*padding: 24px 38px;*/
          padding-right: 60px;
      }
.head1,
.head2,
.head3,
.head4{
	text-align: center;
	margin: 0px;
}
table {
  border-collapse:collapse;
  background-color: transparent;
}
caption {
  padding-top: 8px;
  padding-bottom: 8px;
  color: #777;
  text-align: left;
}
th {
  text-align: left;
}
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 20px;
}
.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 0px solid #333;
}
.table > thead > tr > th {
  vertical-align: bottom;
  border-bottom: 2px solid #333;
}
.table > caption + thead > tr:first-child > th,
.table > colgroup + thead > tr:first-child > th,
.table > thead:first-child > tr:first-child > th,
.table > caption + thead > tr:first-child > td,
.table > colgroup + thead > tr:first-child > td,
.table > thead:first-child > tr:first-child > td {
  border-top: 0;
}
.table > tbody + tbody {
  border-top: 0px solid #333;
}
.table .table {
  background-color: #fff;
}
.table-condensed > thead > tr > th,
.table-condensed > tbody > tr > th,
.table-condensed > tfoot > tr > th,
.table-condensed > thead > tr > td,
.table-condensed > tbody > tr > td,
.table-condensed > tfoot > tr > td {
  padding: 5px;
}
.table-bordered {
  border: 1px solid #333;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
  border: 1px solid #333;
}
.table-bordered > thead > tr > th,
.table-bordered > thead > tr > td {
  border-bottom-width: 2px;
}
.table-striped > tbody > tr:nth-of-type(odd) {
  background-color: #f9f9f9;
}
.table-hover > tbody > tr:hover {
  background-color: #f5f5f5;
}
table col[class*="col-"] {
  position: static;
  display: table-column;
  float: none;
}
table td[class*="col-"],
table th[class*="col-"] {
  position: static;
  display: table-cell;
  float: none;
}
.table > thead > tr > td.active,
.table > tbody > tr > td.active,
.table > tfoot > tr > td.active,
.table > thead > tr > th.active,
.table > tbody > tr > th.active,
.table > tfoot > tr > th.active,
.table > thead > tr.active > td,
.table > tbody > tr.active > td,
.table > tfoot > tr.active > td,
.table > thead > tr.active > th,
.table > tbody > tr.active > th,
.table > tfoot > tr.active > th {
  background-color: #f5f5f5;
}
.table-hover > tbody > tr > td.active:hover,
.table-hover > tbody > tr > th.active:hover,
.table-hover > tbody > tr.active:hover > td,
.table-hover > tbody > tr:hover > .active,
.table-hover > tbody > tr.active:hover > th {
  background-color: #e8e8e8;
}
.table > thead > tr > td.success,
.table > tbody > tr > td.success,
.table > tfoot > tr > td.success,
.table > thead > tr > th.success,
.table > tbody > tr > th.success,
.table > tfoot > tr > th.success,
.table > thead > tr.success > td,
.table > tbody > tr.success > td,
.table > tfoot > tr.success > td,
.table > thead > tr.success > th,
.table > tbody > tr.success > th,
.table > tfoot > tr.success > th {
  background-color: #dff0d8;
}
.table-hover > tbody > tr > td.success:hover,
.table-hover > tbody > tr > th.success:hover,
.table-hover > tbody > tr.success:hover > td,
.table-hover > tbody > tr:hover > .success,
.table-hover > tbody > tr.success:hover > th {
  background-color: #d0e9c6;
}
.table > thead > tr > td.info,
.table > tbody > tr > td.info,
.table > tfoot > tr > td.info,
.table > thead > tr > th.info,
.table > tbody > tr > th.info,
.table > tfoot > tr > th.info,
.table > thead > tr.info > td,
.table > tbody > tr.info > td,
.table > tfoot > tr.info > td,
.table > thead > tr.info > th,
.table > tbody > tr.info > th,
.table > tfoot > tr.info > th {
  background-color: #d9edf7;
}
.table-hover > tbody > tr > td.info:hover,
.table-hover > tbody > tr > th.info:hover,
.table-hover > tbody > tr.info:hover > td,
.table-hover > tbody > tr:hover > .info,
.table-hover > tbody > tr.info:hover > th {
  background-color: #c4e3f3;
}
.table > thead > tr > td.warning,
.table > tbody > tr > td.warning,
.table > tfoot > tr > td.warning,
.table > thead > tr > th.warning,
.table > tbody > tr > th.warning,
.table > tfoot > tr > th.warning,
.table > thead > tr.warning > td,
.table > tbody > tr.warning > td,
.table > tfoot > tr.warning > td,
.table > thead > tr.warning > th,
.table > tbody > tr.warning > th,
.table > tfoot > tr.warning > th {
  background-color: #fcf8e3;
}
.table-hover > tbody > tr > td.warning:hover,
.table-hover > tbody > tr > th.warning:hover,
.table-hover > tbody > tr.warning:hover > td,
.table-hover > tbody > tr:hover > .warning,
.table-hover > tbody > tr.warning:hover > th {
  background-color: #faf2cc;
}
.table > thead > tr > td.danger,
.table > tbody > tr > td.danger,
.table > tfoot > tr > td.danger,
.table > thead > tr > th.danger,
.table > tbody > tr > th.danger,
.table > tfoot > tr > th.danger,
.table > thead > tr.danger > td,
.table > tbody > tr.danger > td,
.table > tfoot > tr.danger > td,
.table > thead > tr.danger > th,
.table > tbody > tr.danger > th,
.table > tfoot > tr.danger > th {
  background-color: #f2dede;
}
.table-hover > tbody > tr > td.danger:hover,
.table-hover > tbody > tr > th.danger:hover,
.table-hover > tbody > tr.danger:hover > td,
.table-hover > tbody > tr:hover > .danger,
.table-hover > tbody > tr.danger:hover > th {
  background-color: #ebcccc;
}
.table-responsive {
  min-height: .01%;
  overflow-x: auto;
}
	.container-fluid {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
.container {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
.row {
  margin-right: -15px;
  margin-left: -15px;
}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}
.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
    float: left;
  }
  .col-md-12 {
    width: 100%;
  }
  .col-md-11 {
    width: 91.66666667%;
  }
  .col-md-10 {
    width: 83.33333333%;
  }
  .col-md-9 {
    width: 75%;
  }
  .col-md-8 {
    width: 66.66666667%;
  }
  .col-md-7 {
    width: 58.33333333%;
  }
  .col-md-6 {
    width: 50%;
  }
  .col-md-5 {
    width: 41.66666667%;
  }
  .col-md-4 {
    width: 33.33333333%;
  }
  .col-md-3 {
    width: 25%;
  }
  .col-md-2 {
    width: 16.66666667%;
  }
  .col-md-1 {
    width: 8.33333333%;
  }
  .col-md-pull-12 {
    right: 100%;
  }
  .col-md-pull-11 {
    right: 91.66666667%;
  }
  .col-md-pull-10 {
    right: 83.33333333%;
  }
  .col-md-pull-9 {
    right: 75%;
  }
  .col-md-pull-8 {
    right: 66.66666667%;
  }
  .col-md-pull-7 {
    right: 58.33333333%;
  }
  .col-md-pull-6 {
    right: 50%;
  }
  .col-md-pull-5 {
    right: 41.66666667%;
  }
  .col-md-pull-4 {
    right: 33.33333333%;
  }
  .col-md-pull-3 {
    right: 25%;
  }
  .col-md-pull-2 {
    right: 16.66666667%;
  }
  .col-md-pull-1 {
    right: 8.33333333%;
  }
  .col-md-pull-0 {
    right: auto;
  }
  .col-md-push-12 {
    left: 100%;
  }
  .col-md-push-11 {
    left: 91.66666667%;
  }
  .col-md-push-10 {
    left: 83.33333333%;
  }
  .col-md-push-9 {
    left: 75%;
  }
  .col-md-push-8 {
    left: 66.66666667%;
  }
  .col-md-push-7 {
    left: 58.33333333%;
  }
  .col-md-push-6 {
    left: 50%;
  }
  .col-md-push-5 {
    left: 41.66666667%;
  }
  .col-md-push-4 {
    left: 33.33333333%;
  }
  .col-md-push-3 {
    left: 25%;
  }
  .col-md-push-2 {
    left: 16.66666667%;
  }
  .col-md-push-1 {
    left: 8.33333333%;
  }
  .col-md-push-0 {
    left: auto;
  }
  .col-md-offset-12 {
    margin-left: 100%;
  }
  .col-md-offset-11 {
    margin-left: 91.66666667%;
  }
  .col-md-offset-10 {
    margin-left: 83.33333333%;
  }
  .col-md-offset-9 {
    margin-left: 75%;
  }
  .col-md-offset-8 {
    margin-left: 66.66666667%;
  }
  .col-md-offset-7 {
    margin-left: 58.33333333%;
  }
  .col-md-offset-6 {
    margin-left: 50%;
  }
  .col-md-offset-5 {
    margin-left: 41.66666667%;
  }
  .col-md-offset-4 {
    margin-left: 33.33333333%;
  }
  .col-md-offset-3 {
    margin-left: 25%;
  }
  .col-md-offset-2 {
    margin-left: 16.66666667%;
  }
  .col-md-offset-1 {
    margin-left: 8.33333333%;
  }
  .col-md-offset-0 {
    margin-left: 0;
  }
}
</style>
   <div class="content-wrapper bg" style="margin: 10px">
    <div class="container-fluid">
        <section class="content">
            <div class="container">
            	<div class="row">
            	<div class="col-md-12">
            		<div class="box">
				            <!-- /.box-header -->
				            <div class="box-body">
					            	<div class="row">
            <!-- <div class="col-md-2"></div> -->
            <div class="col-md-12 cop" style="text-align: center;font-size: 25px;padding-bottom: 15px;margin-top: 20px" >
                <div style="width: 115px;display: inline-block;padding-right: 36px">
                <img src="<?php echo base_url() ?>assets/img/logo/logo tes baru.png" style="width:138px;"></div>
                 <div style="display: inline-block" >
                <p class="head1 aa" style="margin: 2px;">SEKOLAH TINGGI ILMU KOMPUTER (STIKOM) PGRI<br><i></i></p>
                <p class="head2 aa" style="margin: 2px;"><b>BANYUWANGI</b></p>
        <p class="head2 aa" style="margin: 2px;color: #2490BD ">PANITIA PENERIMAAN MAHASISWA BARU</p>
                <p class="head3 aa" style="margin: 2px;">Jl. Jenderal Ahmad Yani No.80, Taman Baru, Kec. Banyuwangi, <br> Kabupaten Banyuwangi, Jawa Timur 68416 . Telp : (0333) 417902</p>
                <p class="head4 aa" style="margin: 2px;">Website : <a >www.stikombanyuwangi.ac.id</a>, Email : stikom@stikombanyuwangi.ac.id</p>
                </div>
            </div>
        </div>
        <hr style="border:1px double #333;">
        <br>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-12 bottom-cop">
                <u>
                <p class="head2" style="font-family: initial;font-size: 20pt;font-weight: 500;">BUKTI PENDAFTARAN</p></u>
            </div>
        </div>
<br>
<br>
<br>
  <div class="row">
    <?php   
                $base_64 = $_GET['id'] . str_repeat('=', strlen($_GET['id']) % 4);
                $datax = base64_decode($base_64);

                $asal = $_GET['asal_sekolah'] . str_repeat('=', strlen($_GET['asal_sekolah']) % 4);
                $asalq = base64_decode($asalq);
                $jenis = $_GET['jenis_kelamin'] . str_repeat('=', strlen($_GET['jenis_kelamin']) % 4);
                $jenisq = base64_decode($jenisq);
                $pilihan = $_GET['pilihan_jalur'] . str_repeat('=', strlen($_GET['pilihan_jalur']) % 4);
                $pilihanq = base64_decode($pilihanq);
                $gel = $_GET['gelombang'] . str_repeat('=', strlen($_GET['gelombang']) % 4);
                $gelq = base64_decode($gelq);

                $data = array(
                  'nomor_pendaftaran' => $datax,
                  'asal_sekolah' => $asalq,
                  'jenis_kelamin' => $jenisq,
                  'pilihan_jalur' => $pilihanq,
                  'gelombang' => $gelq,
                );
                $list = $db->list_peserta_cus1($conn,$data);

     ?>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <div class="col-md-6 text-17">
                            <p>Nama Lengkap</p>
                        </div>
                        <div class="col-md-5 text-17 margin-left-off">
                         :&nbsp;&nbsp;<?php echo $list['nama_lengkap'] ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6 text-17">
                            <p>No Pendaftaran</p>
                        </div>
                        <div class="col-md-5 text-17 margin-left-off">
                            :&nbsp;&nbsp;<?php echo $list['nomor_pendaftaran'] ?>
                        </div>
                    </div>
                     <div class="col-md-12">
                        <div class="col-md-6 text-17">
                            <p>Gelombang </p>
                        </div>
                        <div class="col-md-5 text-17 margin-left-off">
                            :&nbsp;&nbsp;Gelombang <?php echo $list['gelombang'] ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6 text-17">
                            <p>Tempat/Tanggal Lahir</p>
                        </div>
                        <div class="col-md-5 text-17 margin-left-off">
                            :&nbsp;&nbsp;<?php echo $list['tempat_lahir'] ?>,&nbsp;
                            <?php
                            echo date('d-m-Y',strtotime($list['tgl_lahir']))
                                  ?>
                        </div>
                    </div>
                <!-- </div> -->
                <div class="col-md-12">
                    <div class="col-md-6 text-17">
                        <p>Agama</p>
                    </div>
                    <?php 
                    $agama = $db->where($conn,'agama',array('id_agama' => $list['id_agama']));
                     ?>
                    <div class="col-md-5 text-17 margin-left-off">
                        :&nbsp;&nbsp;<?php echo $agama['agama'] ?>
                    </div>
                </div>
              <!--   <div class="col-md-12">
                    <div class="col-md-6 text-17">
                        <p>No Ktp</p>
                    </div>
                    <div class="col-md-5 text-17 margin-left-off">
                        :&nbsp;&nbsp;<?php //echo $peserta->no_ktp ?>
                    </div>
                </div> -->
                <div class="col-md-12">
                    <div class="col-md-6 text-17">
                        <p>No Telp</p>
                    </div>
                    <div class="col-md-5 text-17 margin-left-off">
                        :&nbsp;&nbsp;<?php echo $list['no_hp'] ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6 text-17">
                        <p>Email</p>
                    </div>
                    <div class="col-md-5 text-17 margin-left-off">
                        :&nbsp;&nbsp;<?php echo $list['email'] ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6 text-17">
                        <p>Tahun Lulus</p>
                    </div>
                    <div class="col-md-5 text-17 margin-left-off">
                        :&nbsp;&nbsp;<?php echo $list['tahun_lulus'] ?>
                    </div>
                </div>
                 <?php 
                    $data_keluarga = $db->where($conn,'data_keluarga',array('id_pendaftaran' => $list['id_pendaftaran']));
                  ?>
                <div class="col-md-12">
                    <div class="col-md-6 text-17">
                        <p>Nama Orang Tua</p>
                    </div>
                    <div class="col-md-5 text-17 margin-left-off">
                        :&nbsp;&nbsp;<?php echo $data_keluarga['nama_ortu'] ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6 text-17">
                        <p>Alamat Orang Tua</p>
                    </div>
                    <div class="col-md-5 text-17 margin-left-off">
                        :&nbsp;&nbsp;<?php echo $data_keluarga['alamat_ortu'] ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6 text-17">
                        <p>No Telp Ortu</p>
                    </div>
                    <div class="col-md-5 text-17 margin-left-off">
                        :&nbsp;&nbsp;<?php echo $data_keluarga['no_telp_ortu'] ?>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <img src="<?php echo $list['foto'] ?>" width="100%">
            </div>
            <div class="row">
                <div class="space"></div>
            </div>
            <div class="row padd-print-tab">
                <!-- <div class="col-md-3"></div> -->
                <div class="col-md-12">
                    <div class="col-md-6">
                        <p><b>Catatan :</b></p>
                        <ul>
                            <li>Bawa Bukti Pendaftaran saat mengikuti tes</li>
                            <li>Seluruh rangkaian tes dimulai pukul 08:00 WIB</li>
                            <li>Peserta <b>WAJIB</b> hadir 30 menit sebelumnya </li>
                            <li>Jadwal Tes tertera pada menu informasi di website portal pendaftaran Tes</li>
                            <li>Info kelulusan Tes akan diinformasikan di website portal pendaftaran Tes</li>
                        </ul>
                    </div>
                    <div class="col-md-6 footer">
                    <p>Banyuwangi, <?php echo date("d"); ?>-<?php echo date("m"); ?>-<?php echo date("Y"); ?></p>
                    <p><b>Panitia PMB STIKOM Banyuwangi</b></p>
                    
                </div>
                </div>
            </div>
            <div class="row">
                <div class="space"></div>
                <div class="space"></div>
            </div>
            <div class="row">
                <div class="col-md-7">
                </div>
                
            </div>
        </section>
      </div>
					            
					            
				          </div>
			          </div>
			          <!-- /.box -->
            	</div>
            </div>
            </div>
        </section>
    </div>
</div>
</body>
