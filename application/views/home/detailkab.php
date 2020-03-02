  <main id="main" class="main-page  ">

    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="section-header">
          <h2>data <?= $kategori_sekarang ?> <?= $kabupat['nama'] ?></h2>
          <p>Poverty Resource Center Initiative</p>
        </div>
        <form  method="POST" action="<?= base_url() ?>home/proses_cari_detail">
          <div class="row">
            <div class="col-sm-3 pt-w pb-2" style="margin-right: -20px">
              <div class="input-group">
                <select class="form-control bg-gray" name="kabupaten" style="border:1px solid gray">
                  <?php                    
                  $uri2 = $this->uri->segment(5);
                  if (!isset($uri2)) {
                    echo "<option>-- Kabupaten/Kota --</option>";
                  }  else {
                    echo  "<option value=\"".$id_kabupaten_sekarang."\">".$kabupaten_sekarang."</option>";
                  }
                  foreach ($kabupatens->result() as $row) {
                    echo  "<option value=\"".$row->kd_kab."\">".$row->nama_kab."</option>"; 
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-2 pt-w pb-2" style="margin-right: -20px">
              <div class="input-group">
                <select class="form-control bg-gray" name="kabupaten" style="border:1px solid gray">
                  <?php                    
                  $uri2 = $this->uri->segment(3);
                  if (!isset($uri2)) {
                    echo "<option>-- Tahun Mulai --</option>";
                  }  else {
                    echo  "<option value=\"".$uri2."\">".$uri2."</option>";
                  }
                  $tahun = date(Y)-1;
                  for ($i=0; $i < 5; $i++) { 
                    echo "<option>".$tahun."</option>";
                    $tahun--;
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-2 pt-w pb-2" style="margin-right: -20px">
              <div class="input-group">
                <select class="form-control bg-gray" name="kabupaten" style="border:1px solid gray">   
                  <?php                    
                  $uri2 = $this->uri->segment(4);
                  if (!isset($uri2)) {
                    echo "<option>-- Tahun Sampai --</option>";
                  }  else {
                    echo  "<option value=\"".$uri2."\">".$uri2."</option>";
                  }
                  $tahun = date(Y)-1;
                  for ($i=0; $i < 5; $i++) { 
                    echo "<option>".$tahun."</option>";
                    $tahun--;
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-2 pt-w pb-2" style="margin-right: -20px">
              <div class="input-group">
                <select class="form-control bg-gray" name="kabupaten" style="border:1px solid gray">
                  <?php                    
                  $uri2 = $this->uri->segment(6);
                  if (!isset($uri2)) {
                    echo "<option>-- Pilih Bidang --</option>";
                  }  else {
                    echo  "<option value=\"".$id_bidang_sekarang."\">".$bidang_sekarang."</option>";
                  }

                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-2 pt-w pb-2" style="margin-right: -20px">
              <div class="input-group">
                <select class="form-control bg-gray" name="kabupaten" style="border:1px solid gray">
                  <?php                    
                  $uri2 = $this->uri->segment(7);
                  if (!isset($uri2)) {
                    echo "<option>-- Pilih Kategori --</option>";
                  }  else {
                    echo  "<option value=\"".$id_kategori_sekarang."\">".$kategori_sekarang."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-1 pt-w pb-2" style="margin-right: -20px">
              <div class="input-group">                
                <button type="submit" class="btn btn-success float-right"><span class="fas fa-search"></span> Cari </button>
              </div>
            </div>
          </div>
        </form>
        <br>
        <div class="row">          
          <div class="col-md-6">
            <table class="table table-striped table-bordered data mt-3">              
              <thead>
                <tr class="bg-orange text-white text-center">                  
                  <th style="width:5%">No</th>
                  <th>Tahun</th>
                  <th><?= $kategori_sekarang ?></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1; 
                $tahuna = $this->uri->segment(3);
                $tahunb = $this->uri->segment(4);
                if (!$tahuna) {
                  $tahuna = 2015;
                }
                if (!$tahunb) {
                  $tahuna = 2019;
                }
                for ($i=$tahuna;$i<=$tahunb;$i++) {
                ?>
                <tr class="text-center">
                  <td><?= $no ?></td>
                  <td><?= $i ?></td>
                  <td><?php 
                  $nilai = $hasil[$i];
                  if ($nilai >1000) {
                    $nilai = number_format((float)"$nilai",0,",",",");
                  }else if($nilai < 100){
                    $nilai = number_format($nilai, 2);
                  }
                  echo $nilai; 
                  ?></td>
                </tr>

                <?php $no++;} ?>

              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <div id="grafik2"></div>
          </div>     

          <!-- <div class="col-md-6">
            <div id="grafik2"></div>
          </div> -->
        </div>
      </div>

    </section>

  </main>
  <?php  
    // echo $kab[0]['nilai']." ";
    // echo $hasil[2015]." ";
  ?>
  <?php $this->load->view('home/_partial/publikasi_footer') ?>
  
<script type="text/javascript">
  $(document).ready(function() {
    var t = $('.data').DataTable( {
      "pageLength": 50,
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

