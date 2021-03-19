
<form action="<?= site_url('Suratkeluar/edit');?>" method="post">
  <div class="row mb-4">
    <div class="col-md-9">
      <div class="card shadow-sm">
        <div class="card-header text-info">
          Edit data surat keluar
        </div>
        <div class="card-body">
          <div class="form-group">
            <label class="title">Nomor Surat</label>
            <input type="text" class="form-control" name="NOMOR" value="<?= $suratkeluar->NOMOR;?>" autofocus required>
            <input type="hidden" name="ID_KATEGORI" value="<?= $kategori->ID_KATEGORI;?>">
            <input type="hidden" name="ID_SURATK" value="<?= $suratkeluar->ID_SURATK;?>">
            <small class="text-muted">Ubah jika diperlukan</small>
          </div>
          <div class="form-group">
            <div class="row mb-2">
              <div class="col-md-6">
                <label class="title">Nama Ayah</label>
                <input type="hidden" name="ID[]" value="<?= $controller->M_suratkeluar->get_data_id($suratkeluar->ID_SURATK, "NAMA_AYAH");?>">
                <input type="search" class="form-control get_ayah" name="VALUE[]" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "NAMA_AYAH");?>" id="get_ayah" required>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="title">Nama Ibu</label>
                  <input type="hidden" name="ID[]" value="<?= $controller->M_suratkeluar->get_data_id($suratkeluar->ID_SURATK, "NAMA_IBU");?>">
                  <input type="search" class="form-control autocomplete" name="VALUE[]" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "NAMA_IBU");?>" id="get_ibu" required>
                </div>
              </div>
            </div>
          </div>
          <hr class="mt-1 mb-1">
          <div class="form-group">
            <label class="title">Alamat</label>
            <input type="hidden" name="ID[]" value="<?= $controller->M_suratkeluar->get_data_id($suratkeluar->ID_SURATK, "ALAMAT");?>">
            <textarea class="form-control" name="VALUE[]" rows="3" required><?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "ALAMAT");?></textarea>
          </div>
          <div class="form-group">
            <label class="title">Lahir Pada:</label>
            <div class="row mb-2">
              <div class="col-md-3">
                <label class="title">Hari</label>
                <input type="hidden" name="ID[]" value="<?= $controller->M_suratkeluar->get_data_id($suratkeluar->ID_SURATK, "HARI");?>">
                <select class="form-control" name="VALUE[]">
                  <optgroup label="Current">
                    <option value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "HARI");?>"><?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "HARI");?></option>
                  </optgroup>
                  <optgroup label="Change">
                    <option value="SENIN">SENIN</option>
                    <option value="SELASA">SELASA</option>
                    <option value="RABU">RABU</option>
                    <option value="KAMIS">KAMIS</option>
                    <option value="JUM'AT">JUM'AT</option>
                    <option value="SABTU">SABTU</option>
                    <option value="MINGGU">MINGGU</option>
                  </optgroup>
                </select>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">Tanggal</label>
                  <input type="hidden" name="ID[]" value="<?= $controller->M_suratkeluar->get_data_id($suratkeluar->ID_SURATK, "TANGGAL");?>">
                  <input type="date" class="form-control" name="VALUE[]" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "TANGGAL");?>">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="title">Jam</label>
                  <input type="hidden" name="ID[]" value="<?= $controller->M_suratkeluar->get_data_id($suratkeluar->ID_SURATK, "JAM");?>">
                  <input type="time" class="form-control" name="VALUE[]" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "JAM");?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="title">Di</label>
                  <input type="hidden" name="ID[]" value="<?= $controller->M_suratkeluar->get_data_id($suratkeluar->ID_SURATK, "DI");?>">
                  <input type="text" class="form-control" name="VALUE[]" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "DI");?>">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row mb-2">
              <div class="col-md-3">
                <label class="title">Jenis Kelamin</label>
                <input type="hidden" name="ID[]" value="<?= $controller->M_suratkeluar->get_data_id($suratkeluar->ID_SURATK, "JK");?>">
                <select class="form-control" name="VALUE[]">
                  <optgroup label="Current">
                    <option value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "JK");?>"><?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "JK");?></option>
                  </optgroup>
                  <optgroup label="Change">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </optgroup>
                </select>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="title">Anak Ke</label>
                  <input type="hidden" name="ID[]" value="<?= $controller->M_suratkeluar->get_data_id($suratkeluar->ID_SURATK, "ANAK_KE");?>">
                  <input type="number" class="form-control" name="VALUE[]" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "ANAK_KE");?>">
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group">
                  <label class="title">Diberi Nama</label>
                  <input type="hidden" name="ID[]" value="<?= $controller->M_suratkeluar->get_data_id($suratkeluar->ID_SURATK, "NAMA_ANAK");?>">
                  <input type="text" class="form-control" name="VALUE[]" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "NAMA_ANAK");?>">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <button type="submit" name="simpan" class="btn btn-info btn-block shadow-sm">Simpan Perubahan</button>
    </div>
  </div>
</form>
<!-- <script type='text/javascript'>
var site = "<?php echo site_url();?>";
$(function(){
  $('.get_ayah').autocomplete({
    // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
    serviceUrl: site+'Suratkeluar/cari_penduduk',
    // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
    onSelect: function (suggestion) {
      $('#get_ayah').val(''+suggestion.nama); // membuat id 'v_nim' untuk ditampilkan
    }
  });
});

$(function(){
  $('#get_ibu').autocomplete({
    // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
    serviceUrl: site+'Suratkeluar/cari_penduduk',
    // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
    onSelect: function (suggestion) {
      $('#get_ibu').val(''+suggestion.nama); // membuat id 'v_nim' untuk ditampilkan
    }
  });
});
</script> -->
