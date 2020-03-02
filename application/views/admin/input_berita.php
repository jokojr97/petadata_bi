<?php $this->load->view('admin/_partial/header'); ?>

      <div class="container-fluid">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">          
          <div class="col-md-7">
            <form  action="<?= base_url() ?>admin/tambah_berita" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_user" value="<?= $id_user ?>">
              <input type="hidden" name="nama_user" value="<?= $nama_user ?>">
              <div class="form-group mb-3">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Post ..."  value="<?= set_value('judul') ?>">
                        <?= form_error('judul', '<small class="text-danger">', '</small>') ?>
              </div>
              <div class="form-group mb-3">
                <label for="isi">Isi</label>
                <textarea  rows="20" id="post_content" name="isi" class="form-control ckeditor">
                  Masukkan isi dari berita yang akan di tulis!!!
                  <?= set_value('isi') ?>
                </textarea>
              </div>
              <!-- <div class="form-group"> -->
            
          </div>
          <div class="col-md-5">
              <div class="form-group mb-3">
                <label for="gambar">Gambar Tumbnail</label>
                <input type="file" name="gambar" class="form-control" value="<?= set_value('gambar') ?>">
              </div>             
              <div class="form-group mb-3">
                <label for="tanggal">Tanggal Upload</label>
                <input type="date" name="tanggal" class="form-control"  value="<?= set_value('tanggal') ?>">
              </div>             
              <div class="form-group mb-3">
                <label for="jenis">Jenis</label>
                <select name="jenis" class="form-control">
                  <option>Berita</option>
                  <option>Artikel</option>
                  <option>Poster</option>
                </select>
              </div>             
              <div class="form-group mb-3">
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?= set_value('kategori') ?>">
              </div>             

              <button type="submit" class="btn btn-danger float-right ml-3"><i class="fas fa-upload"></i>&nbsp;&nbsp;Publish</button>
              <a href="<?= base_url() ?>admin/berita" class="text-bold btn btn-default float-right"><i class="fa fa-close"></i>&nbsp;&nbsp;Cancel</a>
              <!-- </div> -->
            </form>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


      </div><!--/. container-fluid -->
<?php $this->load->view('admin/_partial/footer') ?>
<script type="text/javascript">
    tinymce.init({
        selector: "#post_content",
        plugins: [
             "advlist autolink lists link image charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars code fullscreen",
             "insertdatetime nonbreaking save table contextmenu directionality",
             "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager",
        automatic_uploads: true,
        image_advtab: true,
        images_upload_url: "<?php echo base_url("CONTROLLER_UPLOAD")?>",
        file_picker_types: 'image', 
        paste_data_images:true,
        relative_urls: false,
        remove_script_host: false,
          file_picker_callback: function(cb, value, meta) {
             var input = document.createElement('input');
             input.setAttribute('type', 'file');
             input.setAttribute('accept', 'image/*');
             input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                   var id = 'post-image-' + (new Date()).getTime();
                   var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                   var blobInfo = blobCache.create(id, file, reader.result);
                   blobCache.add(blobInfo);
                   cb(blobInfo.blobUri(), { title: file.name });
                };
             };
             input.click();
          }
   });
</script>

