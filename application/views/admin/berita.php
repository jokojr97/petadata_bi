<?php $this->load->view('admin/_partial/header'); ?>
      <div class="container-fluid bg-white">
        <div class="row" >
          <div class="col-md-12">
            <div class="table table-responsive">
              <a href="<?= base_url()  ?>admin/tambah_berita"><button class="btn btn-primary"><span class="fas fa-plus"></span> Tambah Berita</button></a>  
              <table class="table table-striped table-bordered data mt-3">
                <thead>
                  <tr class="text-center">
                    <th style="width:5%">No</th>
                    <th style="width:10%"></th>
                    <th style="width:15%">Judul</th>
                    <th style="width:30%">Isi</th>
                    <th style="width:7%">Jenis</th>
                    <th style="width:8%">Kategori</th>
                    <th style="width:5%">Uploader</th>
                    <th style="width:10%">Published Date</th>
                    <th style="width:10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                  $no = 1;
                  foreach ($brita->result() as $row) {
                     $isi=substr($row->deskripsi, 0, 40);
                  ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><img src="<?= base_url()  ?>assets/images/<?= $row->featured_image ?>" class="img img-fluid"></td>
                    <td><?= $row->judul ?></td>
                    <td><p><?= $isi ?></p></td>
                    <td><?= $row->jenis ?></td>
                    <td><?= $row->kategori ?></td>
                    <td><?= $row->nama_user ?></td>
                    <td><?= $row->date_created ?></td>
                    <td> 
                      <a href="#" class="btn btn-sm btn-success m-1"><span class="fas fa-eye"></span></a>
                      <a href="#" class="btn btn-sm btn-warning m-1"><span class="fas fa-lock"></span></a>
                      <a href="#" class="btn btn-sm btn-primary m-1"><span class="fas fa-edit"></span></a>
                      <a href="#" class="btn btn-sm btn-danger m-1"><span class="fas fa-trash"></span></a>
                    </td>
                  </tr>
                  <?php 
                  $no++; }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


      </div><!--/. container-fluid -->
<?php $this->load->view('admin/_partial/footer') ?>
<!-- <?php $this->load->view('admin/_partial/highchart') ?> -->
