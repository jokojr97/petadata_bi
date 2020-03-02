  <main id="main" class="main-page  ">

    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="section-header">
          <h2><?= $kategori_sekarang ?> Jawa Timur Tahun <?= $tahun_data ?></h2>
          <p>Poverty Resource Center Initiative</p>
        </div>
        <form method="POST" action="<?= base_url() ?>home/proses_cari">            
          <div class="row">
            <div class="col-sm-2 pt-2 pb-2" style="margin-right: -20px">
              <div class="input-group">              
                <select class="form-control bg-gray" name="tahun" style="border:1px solid gray">
                  
                  <?php
                  $uri1 = $this->uri->segment(3);
                  if (!isset($uri1)) {
                    echo "<option>-- Pilih Tahun --</option>";
                  }  else {
                    echo  "<option>".$tahun_data."</option>";
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
            <div class="col-sm-4 pt-2 pb-2" style="margin-right: -20px">
              <div class="input-group">              
                <select class="form-control bg-gray" name="bidang" onchange="myfunction(this)" style="border:1px solid gray">
                  <?php  
                  $uri2 = $this->uri->segment(4);
                  if (!isset($uri2)) {
                    echo "<option>-- Pilih Bidang --</option>";
                  }  else {
                    echo  "<option value=\"".$id_bidang_sekarang."\">".$bidang_sekarang."</option>";
                  }
                  foreach ($bidang->result() as $row) {
                    echo "<option value=\"".$row->id_bidang."\">".$row->nama_bidang."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-5 pt-2 pb-2" style="margin-right: -13px">
              <div class="input-group">              
                <select class="form-control bg-gray" name="kategori" style="border:1px solid gray" id="kategori">
                  <?php    
                  $uri3 = $this->uri->segment(5);
                  if (!isset($uri3)) {
                    echo "<option>-- Pilih Kategori --</option>";
                  }  else {
                    echo  "<option value=\"".$id_kategori_sekarang."\">".$kategori_sekarang."</option>";
                  }
                  foreach ($kategori_list->result() as $row) {
                    echo "<option value=\"".$row->id_kategori_data."\">".$row->nama_kategori."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-1 pt-2 pb-2">              
              <button type="submit" class="btn btn-success float-right"><span class="fas fa-search"></span> Cari </button>
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col-md-6">
            <!-- <div class="mt-3 pt-3">
              <br>
              <h3><b><?= $kategori_sekarang ?> Jawa Timur Tahun <?= $tahun_data ?></b></h3>
              <hr>
            </div> -->
            <br>
            <table class="table table-striped table-bordered data mt-3 table-sm">
              <thead>
                <tr class="bg-orange text-white text-center">
                  <th scope="col">No</th>
                  <th scope="col">Kabupaten/Kota</th>
                  <th scope="col"><?= $kategori_sekarang ?></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;  
                foreach ($kab->result() as $row) {
                ?>
                
                <tr style="">
                  <th scope="row" class="text-center"><?= $no ?></th>
                  <td><a href="<?= base_url() ?>home/detailkab/2015/2019/<?= $row->kd_kab ?>/<?= $id_bidang_sekarang ?>/<?= $id_kategori_sekarang ?>" target="_blank"><?= $row->nama_kab ?></a></td>
                  <td class="text-center"><?php 
                  $nilai = $hasil[$row->kd_kab];
                  if ($nilai >1000) {
                    $nilai = number_format((float)"$nilai",0,",",",");
                  }else if($nilai < 100){
                    $nilai = number_format($nilai, 2);
                  }
                  echo $nilai;
                  ?></td>
                </tr>  
                <?php 
                $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <div class="border p-3 mt-3">
              <!-- &nbsp<br><br><br><br><br><br><br><br> -->
              <div id="grafik1" style="height: 1320px"></div>
            </div>
          </div>
        </div>
      </div>

    </section>

  </main>
  <?php $this->load->view('home/_partial/publikasi_footer') ?>
  <?php $katbid = json_encode($kategori_bidang); echo $katbid ?>
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
        "order": [[ 2, 'Desc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>
<script type="text/javascript">
  var katbid = <?= $katbid ?>;
  console.log(katbid[2]);
  function myfunction(id){
    // console.log(id.value);
    var ids = id.value;
    if (ids == 1) {
      var dt = "<?= $kategori_bidang[1][0]; ?><?= $kategori_bidang[1][1]; ?><?= $kategori_bidang[1][2]; ?><?= $kategori_bidang[1][3]; ?><?= $kategori_bidang[1][4]; ?>";
    }else if (ids == 2) {
      var dt = "<?= $kategori_bidang[2][0]; ?><?= $kategori_bidang[2][1]; ?><?= $kategori_bidang[2][2]; ?><?= $kategori_bidang[2][3]; ?><?= $kategori_bidang[2][4]; ?><?= $kategori_bidang[2][5]; ?><?= $kategori_bidang[2][6]; ?>"
    }else {
      var dt = "<option value=\"\">Kosong</option>"
    }
    // console.log(dt);
    const kat = document.querySelector('#kategori');
    kat.innerHTML = dt;
  }
</script>