  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">Poverty Resource Center <span>Initiative</span></h1>
      <p class="mb-4 pb-0">Pusat data dan informasi seputar kemiskinan di Kabupaten Bojonegoro</p>
      </a>
      <a href="<?= base_url() ?>home/datajatim/2019/1/1" class="about-btn scrollto" target="_blank">Data Terbuka</a>
    </div>
  </section>

  <main id="main">

    <!--==========================
      Speakers Section
    ============================-->

    <section id="ttgAplikasi" class="wow fadeInUp mt-3 mb-3 p-3 bg-light">
      <div class="container mt-3">
        <div class="section-header">
          <h2>Tentang Kami</h2>
          <p>Poverty Resource Center Initiative</p>
        </div>

        <div class="row">
          <div class="row">
           <div class="col-md-7 text-justify">
             <p style="font-size: 18px">Poverty Resource Center Initiative atau PRCI adalah sebuah organiasi masyarakat sipil atau Civil Society Organization (CSO) yang bergerak di bidang penelitian, advokasi yang berfokus pada sektor kemiskinan, gender dan pertanian di Kabupaten Bojonegoro, Provinsi Jawa Timur, dan Nasional</p>
             <p style="font-size: 18px">Di awal pendiriannya, lembaga ini diharapkan dapat menjadi wakil masyarakat sipil dalam mengawal regulasi/kebijakan  dan pembaharuan tata pemerintahan lokal yang lebih baik, berkelanjutan dan berbasis pada kebutuhan dan keberpihakan pada masyarakat. Dengan mewujudkan kerangka demokratisasi dan desentralisasi, guna menuju relasi antara negara dan masyarakat yang kuat dan bermakna, serta kehidupan masyarakat sipil yang tangguh, semarak, dinamis dan partisipatif <a href="#" class="text-red"><b>Read More>></b></a></p>

           </div>
           <div class="col-md-5">
             <img src="<?= base_url() ?>/assets/home/img/pengertian-sistem-orange.png" class="img-fluid">
           </div>
          </div>
        </div>
      </div>

    </section>
    <!--==========================
      Schedule Section
    ============================-->
    <section id="layanan" class="section ">
      <div class="container wow fadeInUp mt-3 mb-3 p-3">
        <div class="section-header">
          <h2>Program</h2>
          <p>Poverty Resource Center Initiative</p>
        </div>
        <div class="container">
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-6x">
              <i class="fas fa-circle fa-stack-2x text-orange"></i>
              <i class="fas fa-balance-scale-right fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading mt-3">Kemiskinan</h4>
            <p class="text-muted">Berfokus pada sektor kemiskinan yang cukup tinggi di bojonegoro</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-6x">
              <i class="fas fa-circle fa-stack-2x text-orange"></i>
              <i class="fas fa-tractor fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading mt-3">Pertanian</h4>
            <p class="text-muted">Berfokus pada sektor pertanian yang merupakan sektor paling penting dalam kehidupan</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-6x">
              <i class="fas fa-circle fa-stack-2x text-orange"></i>
              <i class="fas fa-venus-mars fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading mt-3">Gender</h4>
            <p class="text-muted">Berfokus pada pemberdayaan perempuan dan kaum rentan untuk menjadi bojonegooro yang lebih baik</p>
          </div>
          <!-- <div class="col-md-3">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-orange"></i>
              <i class="fas fa-chart-bar fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading mt-3">Analisis Data</h4>
            <p class="text-muted">Menganalisis data terkait kemiskinan di bojonegoro atau jawa timur</p>
          </div> -->
        </div>
      </div>
        </div>

      </div>

    </section>


    <!--==========================
      Venue Section
    ============================-->
    <section id="publikasi" class="wow fadeInUp bg-light">

      <div class="container wow fadeInUp">

        <div class="section-header mt-3 mb-3 p-3">
          <h2>Berita & Kegiatan</h2>
          <p>Poverty Resource Center Initiative</p>
        </div>
        <div class="row">
          <?php  
          $no=1;
          foreach ($berita_list->result() as $row) {

            $judul=substr($row->judul, 0, 50);
            if ($no <= 2) {
          ?>

          <div class="col-md-6 col-xs-6 p-2">
            <a href="<?= base_url() ?>home/berita_view/<?= $row->id_post ?>">
              <img class="img-fluid img-brita" src="<?= base_url() ?>assets/images/<?= $row->featured_image ?>" alt="">
              <div class="back-brita1">
                &nbsp;                
              </div>
                <h4 class="p-3 text-white text-capitalize text-brita1"><?= $judul ?></h4>
            </a>
          </div> 
          <?php    
            }
            if ($no >= 3 && $no <=6) {
          ?>
         
          <div class="col-md-3 col-xs-6 p-2">
            <a href="<?= base_url() ?>home/berita_view/<?= $row->id_post ?>">
              <img class="img-fluid img-brita" src="<?= base_url() ?>assets/images/<?= $row->featured_image ?>" alt="" style="opacity: 1">
              <div class="back-brita2">
                &nbsp;                
              </div>
                <h6 class="p-3 text-white text-capitalize text-brita2"><?= $judul ?></h6>
            </a>
          </div> 
          <?php    
            }
            $no++;
          }
          ?>
        </div>
          <a href="#" class="btn btn-orange float-right mt-1">Selengkapnya <span class="fas fa-arrow-right"></span></a>
          <br>

      </div>

      <br><br>
    </section>



    <!--==========================
      Subscribe Section
    ============================-->
    <section id="subscribe">
      <div class="container wow fadeInUp mt-3 mb-3 p-3">
        
      </div>
    </section>

    <!--==========================
      Contact Section
    ============================-->
    <section id="hubungiKami" class="bg-light wow fadeInUp mt-3 mb-3 p-3">

      <div class="container">

        <div class="section-header">
          <h2>Hubungi Kami</h2>
          <p>Poverty Resource Center</p>
        </div>

        <div class="form">
          <div id="sendmessage">Sampaikan aspirasi anda dengan mengisi form berikut :</div>
          <?= $this->session->flashdata('message'); ?>
          <div id="errormessage"></div>
          <form action="<?=base_url() ?>home/prosesAspirasi" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?= set_value('nama') ?>"/>
                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="form-group col-md-6">
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>"/>
                <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
              </div>
            </div>
            <div class="form-row">              
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>"/>
                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="form-group col-md-6">                
                <div class="form-group">
                  <label class="radio-inline h5 mt-2 ml-2"  for="Jk">
                    <input type="radio" name="jk" value="Laki-Laki" checked> Laki-Laki
                  </label>
                  <label class="radio-inline h5 mt-2 ml-2" for="Jk">
                    <input type="radio" name="jk" value="Perempuan" class="ml-2"> Perempuan
                  </label>
                </div>
                <?= form_error('jk', '<small class="text-danger">', '</small>') ?>
              </div>
            </div>
            <div class="form-group">
              <!-- <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="<?= set_value('subject') ?>"/> -->

              <select class="form-control" id="subject" name="subject">
                <option>Pertanyaan</option>
                <option>Komentar</option>
                <option>Aspirasi</option>
              </select>
              <?= form_error('subject', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="aspirasi" rows="5" placeholder="Tuliskan Aspirasi Anda"></textarea>              
              <?= form_error('aspirasi', '<small class="text-danger">', '</small>') ?>
            </div>
            <small class="text-danger">*Aspirasi bisa berupa Komentar, Pertanyaan, atau pernyataan terkait aplikasi ini, tindak lanjut aspirasi akan ditindak lanjuti lewat email!!!</small>
            <div class="text-center"><button type="submit" class="btn btn-orange float-right mb-3"><i class="fas fa-send"></i> Kirim</button></div>
          </form>

        </div>
        <br><br>

      </div>
    </section><!-- #contact -->

  </main>
<?php $this->load->view('home/_partial/footer') ?>  