<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>PMB STIKOM BANYUWANGI</title>
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link href="<?php echo base_url() ?>assets/dist/css/animate.css" rel="stylesheet"> 
  <link href="<?php echo base_url() ?>assets/dist/css/main.css" rel="stylesheet">
  <link id="css-preset" href="<?php echo base_url() ?>assets/dist/css/presets/preset1.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/dist/css/responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vegas/vegas.min.css">
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico">
  <style type="text/css">
    .main-timeline{
    font-family: 'Source Sans Pro', sans-serif;
    position: relative;
    padding: 20px 0;
}
.main-timeline .timeline{
    width: 80%;
    margin: 0 auto 70px;
    position: relative;
}
.main-timeline .timeline:after{
    content: '';
    background: linear-gradient(-65deg,#F28D00 40%,#fff 41%,#fff 60%, #F28D00 61%);
    height: 173px;
    width: 173px;
    border-radius: 50%;
    transform: translateY(-50%);
    position: absolute;
    left: 88px;
    top: 50%;
    z-index: 0;
}
.main-timeline .timeline-content{
    color: #fff;
    background-color: #F28D00;
    padding: 15px 15px 15px 280px;
    border-radius: 40px;
    display: block;
}
.main-timeline .timeline-content:hover{
    color: #fff;
    text-decoration: none;
}
.main-timeline .timeline-icon{
    color: #fff;
    background-color: #FDCD00;
    font-size: 60px;
    text-align: center;
    line-height: 130px;
    height: 150px;
    width: 150px;
    border: 10px solid #fff;
    border-radius: 50%;
    transform: translateY(-50%);
    position: absolute;
    left: 100px;
    top: 50%;
    z-index: 1;
}
.main-timeline .title{
    font-size: 25px;
    font-weight: 600;
    margin: 0 0 5px 0;
    color:#fff;
    font-family: 'Open Sans', sans-serif
}
.main-timeline .description{
    font-size: 15px;
    letter-spacing: 1px;
    font-family: 'Open Sans', sans-serif
    margin: 0;
}
.main-timeline .timeline:nth-child(even):after{
    left: auto;
    right: 88px;
}
.main-timeline .timeline:nth-child(even) .timeline-icon{
    left: auto;
    right: 100px;
}
.main-timeline .timeline:nth-child(even) .timeline-content{ padding: 15px 280px 15px 30px; }
.main-timeline .timeline:nth-child(3n+2):after{
    background: linear-gradient(-65deg,#0D70B4 40%,#fff 41%,#fff 60%, #0D70B4 61%);
}
.main-timeline .timeline:nth-child(3n+2) .timeline-content{ background-color: #0D70B4; }
.main-timeline .timeline:nth-child(3n+2) .timeline-icon{ background-color: #2EA6E4; }
.main-timeline .timeline:nth-child(3n+3):after{
    background: linear-gradient(-65deg,#A2175B 40%,#fff 41%,#fff 60%, #A2175B 61%);
}
.main-timeline .timeline:nth-child(3n+3) .timeline-content{ background-color: #A2175B; }
.main-timeline .timeline:nth-child(3n+3) .timeline-icon{ background-color: #E71873; }
@media only screen and (max-width:1200px){
    .main-timeline .timeline{ width: 100%; }
}
@media only screen and (max-width:767px){
    .main-timeline .timeline{
        padding-top: 109px;
        margin: 0 0 30px;
    }
    .main-timeline .timeline:after,
    .main-timeline .timeline:nth-child(even):after{
        height: 110px;
        width: 110px;
        left: 50%;
        top: 0;
        transform: translateX(-50%) translateY(0);
    }
    .main-timeline .timeline-content,
    .main-timeline .timeline:nth-child(even) .timeline-content{
        text-align: center;
        padding: 15px;
    }
    .main-timeline .timeline-icon,
    .main-timeline .timeline:nth-child(even) .timeline-icon{
        font-size: 35px;
        height: 90px;
        width: 90px;
        line-height: 70px;
        right: auto;
        left: 50%;
        top: 10px;
        transform: translateX(-50%) translateY(0);
    }
    .main-timeline .title{ font-size: 20px; }
}
  </style>
</head><!--/head-->

<body>

  <!--.preloader-->
  <!-- <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div> -->
  <!--/.preloader-->

  <header>
    <div id="con" style="height:600px;">
      <div class="container">
        <div id="text" style="margin-top:150px;">
        <h2 style="color:#fff;font-weight: 400;font-size: 45px;text-shadow:2px 2px 10px -3px #b1b1b1;">Stikom PGRI Banyuwangi</h2>
        <h1 style="color:#fff;font-weight: 600;font-size:65px;text-shadow:2px 2px 10px -3px #b1b1b1;">Pendaftaran Mahasiswa Baru</h1>
        <h3 style="color:#fff;font-weight: 500;font-size: 25px;text-shadow:2px 2px 10px -3px #b1b1b1;">Tahun Akademik <?php echo date('Y') ?>/<?php echo date('Y') + 1 ?></h3>
        </div>
      </div>
    </div>
    <div class="main-nav" style="height: 50px;">
      <div style="background-color: rgba(0,0,0,.2);">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
              <!-- <img class="img-responsive" src="<?php echo base_url() ?>assets/img/logo new.png" alt="logo"> -->
            </a>                    
          </div>
          <div class="collapse navbar-collapse" style="padding: 1.5vh">
           <a href="?p=login" class="btn btn-danger btn-flat btn-sm pull-right" style="border-radius: 5px;"><b>LOGIN</b></a>
          </div>
        </div>
      </div>
      </div><!--/#main-nav-->
     <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">
            <img class="img-responsive" src="<?php echo base_url() ?>assets/img/logo new.png" alt="logo">
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="#home">Home</a></li>
            <li class="scroll"><a href="#services">About Us</a></li>                     
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h1>Mengapa STIKOM PGRI Banyuwangi ?</h1>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p> -->
          </div>
        </div> 
      </div>
      <div class="text-center our-services">
        <div class="row">
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="service-icon">
              <i class="fa fa-laptop"></i>
            </div>
            <div class="service-info">
              <h3>Kampus Ilmu Komputer Terbaik</h3>
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p> -->
            </div>
          </div>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
            <div class="service-icon">
              <i class="fa fa-building-o"></i>
            </div>
            <div class="service-info">
              <h3>Fasilitas Lengkap</h3>
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p> -->
            </div>
          </div>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
            <div class="service-icon">
              <i class="fa fa-bookmark"></i>
            </div>
            <div class="service-info">
              <h3>Akreditasi BAN-PT</h3>
             <!--  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p> -->
            </div>
          </div>
          </div>
        </div>
      </div>
  </section><!--/#services-->
  <section id="alur" style="margin-top:-100px;">
    <div class="container">
       <div class="heading wow fadeInUp" style="margin-bottom:-45px;">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h1>Alur Pendaftaran</h1>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p> -->
          </div>
        </div> 
      </div>
        <div class="col-md-12">
            <div class="main-timeline">
                <div class="timeline">
                    <div class="timeline-content">
                        <div class="timeline-icon">
                            1
                        </div>
                        <div class="inner-content">
                            <h3 class="title">Daftar Online</h3>
                            <p class="description">Mendaftar secara online di form online yang telah disediakan.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline">
                    <div class="timeline-content">
                        <div class="timeline-icon">
                            2
                        </div>
                        <div class="inner-content">
                            <h3 class="title">Validasi Data</h3>
                            <p class="description">Kami akan secepatnya minimal 3 hari kerja memvalidasi data anda agar bisa ke tahap selanjutnya.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline">
                    <div class="timeline-content">
                        <div class="timeline-icon">
                            3
                        </div>
                        <div class="inner-content">
                            <h3 class="title">Login</h3>
                            <p class="description">Jika data sudah tervalidasi maka anda login untuk bisa melihat pengumuman tentang jadwal test , upload dokumen , cetak kartu dan lain-lain.</p>
                        </div>
                    </div>
                </div>
                 <div class="timeline">
                    <div class="timeline-content">
                        <div class="timeline-icon">
                           4
                        </div>
                        <div class="inner-content">
                            <h3 class="title">Pembayaran</h3>
                            <p class="description">Melakukan Transfer biaya pendaftaran sebesar Rp 200.000.,</p>
                        </div>
                    </div>
                </div>
                <div class="timeline">
                    <div class="timeline-content">
                        <div class="timeline-icon">
                           5
                        </div>
                        <div class="inner-content">
                            <h3 class="title">Upload Dokumen</h3>
                            <p class="description">Melakukan upload dokumen - dokumen yang di perlukan terkait pendaftaran dan juga upload bukti transfer. Untuk upload bisa di lakukan jika sudah login.</p>
                        </div>
                    </div>
                </div>
                <div class="timeline">
                    <div class="timeline-content">
                        <div class="timeline-icon">
                           6
                        </div>
                        <div class="inner-content">
                            <h3 class="title">Validasi Data</h3>
                            <p class="description">Kami akan memvalidasi data anda dalam kurun waktu 3 hari kerja. </p>
                        </div>
                    </div>
                </div>
               <div class="timeline">
                    <div class="timeline-content">
                        <div class="timeline-icon">
                           7
                        </div>
                        <div class="inner-content">
                            <h3 class="title">Cetak</h3>
                            <p class="description">Peserta yang datanya sudah tervalidasi dapat mencetak kartu test / pendaftaran jika sudah login.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="col-sm-8">
        <h3 style="color:#fff;font-weight: 300" class="text-left">Ayo Segera Mendaftar di <b style="font-weight: 600">STIKOM PGRI Banyuwangi</b> !</h3>
        <h4 style="color:#fff;font-weight: 300" class="text-left">Wujudkan Impian <b>Jadi</b> Pengusaha Bidang IT !</h4>
      </div>
      <div class="col-md-4" style="padding: 3.5vh">
        <a href="?p=register" class="btn btn-warning btn-flat "><b style="font-weight: 600;">DAFTAR</b></a>
      </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6" style="color:#000">
            <strong>Copyright &copy; <?php echo date('Y') ?> </strong> All rights
      reserved | Developed By . <a href="">Angger Pangestu Ari</a>
          </div>
          <!-- <div class="col-sm-6">
            <p class="pull-right">Crafted by <a href="http://designscrazed.org/">Allie</a></p>
          </div> -->
        </div>
      </div>
    </div>
  </footer>
<!-- <script src="<?php echo base_url() ?>assets/dist/js/jquery.js"></script> -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/vegas/vegas.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url() ?>assets/dist/js/wow.min.js"></script>
<script type="text/javascript">
  new WOW().init();
  $('#con').vegas({
  // overlay: true,
  transition: 'fade', 
  transitionDuration: 4000,
  delay: 10000,
  // color: 'red',
  align:'center',
  valign:'center',
  animation: 'random',
  animationDuration: 20000,
  overlay: '<?php echo base_url() ?>assets/img/overlays/06.png',
  slides: [
    { src: '<?php echo base_url() ?>assets/img/slide/1.png' },
    { src: '<?php echo base_url() ?>assets/img/slide/2.jpg' },
    { src: '<?php echo base_url() ?>assets/img/slide/3.JPG' },
    { src: '<?php echo base_url() ?>assets/img/slide/4.JPG' },
    { src: '<?php echo base_url() ?>assets/img/slide/5.JPG' },
    
  ]
});

</script>
</body>
</html>