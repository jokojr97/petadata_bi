
      <!-- <div class="site-section-cover overlay inner-page bg-light" style="background-image: url('images/cargo_sea_big.jpg')" data-aos="fade"> -->
      
      <div class="container-fluid p-4" style="background-color: red">
        <div class="container">
          <div class="row">
            <div class="col-7">
              <h3 class="text-white pt-2">Peta Data Kabupaten</h3>
            </div>
            <div class="col-4">              
              <select class="form-control" style="border:1px solid gray;" onchange="myfunction(this)">
                <option value="peta_kabupaten">Peta Kabupaten</option>
                <option value="peta_kecamatan">Peta Kecamatan</option>
                <option value="peta_desa">Peta Desa</option>
              </select>
            </div>
            <div class="col-1">              
              <button style="margin-left: -15px;padding:  12px 18px" onclick="reloadfunc()"><span class="fas fa-sync-alt"></span></button>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <br>

            <br><br>
            <p><iframe style="width: 100%; height: 520px; border: 0px;" src="https://bi.or.id/kab/" width="300" height="150"></iframe></p>
            <p style="text-align: center;"><a href="https://bi.or.id/penduduk-miskin/" target="_blank" rel="noopener">Penduduk Miskin</a> | <a href="https://bi.or.id/basis-data-terpadu/" target="_blank" rel="noopener">Basis Data Terpadu</a> | <a href="https://bi.or.id/klaster-1/" target="_blank" rel="noopener">Klaster 1</a> | <a href="https://bi.or.id/klaster-2/" target="_blank" rel="noopener">Klaster 2</a> | <a href="https://bi.or.id/klaster-3/" target="_blank" rel="noopener">Klaster 3</a> | <a href="https://bi.or.id/indeks-kesejahteraan-rakyat/" target="_blank" rel="noopener">Indeks Kesejahteraan Rakyat</a> | PPLS 2011 | PPLS 2015</p>
          </div>
        </div>
      </div>

      
    </div>

<script type="text/javascript">
  function myfunction(id){
    var idss = id.value;
    window.location.replace("<?= base_url() ?>peta/"+idss+"");      
  }
  function reloadfunc(){
   window.location.replace("<?= base_url() ?>"); 
  }
</script>