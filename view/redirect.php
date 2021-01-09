<div class="content-wrapper">
  <div class="container">
        <section class="content">
          <div class="box box-default" style="border:none;box-shadow:2px 2px 10px -3px #b1b1b1; ">
            <div class="box-body" style="padding: 0.8vw 1.5vw 1.25vw 1.5vw;">
              <h3 style="font-weight: 500; text-align: left;">Selamat Anda telah mendaftar di website PMB ini !</h3>
              <h4 style="font-weight: 400; text-align: left;">Petunjuk Penggunaan Login :</h4>
                   <table class="" style="width:25%;margin-left:40%;">
                    <tbody>
                      <?php 
                    $cek_akhirta = $db->order_by($conn,'users','id','DESC');
                    $cek_akhirta2 = $db->order_by($conn,'pendaftaran','id_pendaftaran','DESC');

                       ?>
                      <tr>
                        <td>Username</td>
                        <td>: <?php echo $cek_akhirta['username']; ?></td>
                      </tr>
                      <tr>
                        <td>Password</td>
                        <td>: <?php echo date('d-m-Y',strtotime($cek_akhirta2['tgl_lahir'])); ?></td>
                      </tr>
                    </tbody>
                  </table> 
            <p>Gunakan username dan password diatas untuk login ke sistem PMB.</p>
              </div>
        </section>
  </div>  
  </div>