<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-1 mb-sm-0">
    <h1 class="mb-0">Isi Data Surat <?= $kategori->NAMA;?></h1>
  </div>
</div>
<hr>
<div id="msform">
  <ul id="progressbar">
    <li class="active" id="account"><h6>Pilih Kategori Surat</h6></li>
    <li class="active" id="personal"><h6>Isi Data Surat</h6></li>
    <li id="confirm"><h6>Publish</h6></li>
  </ul> <!-- fieldsets -->
</div>
<form action="<?= site_url('Suratkeluar/tambah');?>" method="post">
  <div class="row mb-4">
    <div class="col-md-9">
      <div class="card shadow-sm">
        <div class="card-header">
          Formulir data surat
        </div>
        <div class="card-body">
          <div class="form-group">
            <label class="title">Nomor Surat</label>
            <input type="text" class="form-control" name="NOMOR" value="<?= $kategori->KODE;?>/ <?= $kategori->COUNT;?> /35.07.18.2010/<?= date("Y")?>" autofocus required>
            <input type="hidden" name="ID_KATEGORI" value="<?= $kategori->ID_KATEGORI;?>">
            <small class="text-muted">Ubah jika diperlukan</small>
          </div>
          <div class="form-group">
            <div class="row mb-2">
              <div class="col-md-6">
                <label class="title">Nama Ayah</label>
                <input type="hidden" name="ID[]" value="NIK_AYAH">
                <input type="hidden" name="VALUE[]" id="nik_ayah">

                <input type="hidden" name="ID[]" value="NAMA_AYAH">
                <input type="search" class="form-control autocomplete" name="VALUE[]" placeholder="Masukkan nama ayah" id="pend1" required>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="title">Nama Ibu</label>
                  <input type="hidden" name="ID[]" value="NIK_IBU">
                  <input type="hidden" name="VALUE[]" id="nik_ibu">

                  <input type="hidden" name="ID[]" value="NAMA_IBU">
                  <input type="search" class="form-control autocomplete" name="VALUE[]" placeholder="Masukkan nama ibu" id="pend2" required>
                </div>
              </div>
            </div>
          </div>
          <hr class="mt-1 mb-1">
          <div class="form-group">
            <label class="title">Alamat</label>
            <input type="hidden" name="ID[]" value="ALAMAT">
            <textarea class="form-control" name="VALUE[]" rows="3" placeholder="Alamat penduduk" required></textarea>
          </div>
          <div class="form-group">
            <label class="title">Lahir Pada:</label>
            <div class="row mb-2">
              <div class="col-md-3">
                <label class="title">Hari</label>
                <input type="hidden" name="ID[]" value="HARI">
                <select class="form-control" name="VALUE[]">
                  <option value="SENIN">SENIN</option>
                  <option value="SELASA">SELASA</option>
                  <option value="RABU">RABU</option>
                  <option value="KAMIS">KAMIS</option>
                  <option value="JUM'AT">JUM'AT</option>
                  <option value="SABTU">SABTU</option>
                  <option value="MINGGU">MINGGU</option>
                </select>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="title">Tanggal</label>
                  <input type="hidden" name="ID[]" value="TANGGAL">
                  <input type="date" class="form-control" name="VALUE[]">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="title">Jam</label>
                  <input type="hidden" name="ID[]" value="JAM">
                  <input type="time" class="form-control" name="VALUE[]">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="title">Di</label>
                  <input type="hidden" name="ID[]" value="DI">
                  <input type="text" class="form-control" name="VALUE[]" placeholder="Masukkan tempat kelahiran">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row mb-2">
              <div class="col-md-3">
                <label class="title">Jenis Kelamin</label>
                <input type="hidden" name="ID[]" value="JK">
                <select class="form-control" name="VALUE[]">
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="title">Anak Ke</label>
                  <input type="hidden" name="ID[]" value="ANAK_KE">
                  <input type="number" class="form-control" name="VALUE[]">
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group">
                  <label class="title">Diberi Nama</label>
                  <input type="hidden" name="ID[]" value="NAMA_ANAK">
                  <input type="text" class="form-control" name="VALUE[]" placeholder="Masukkan nama bayi">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <button type="submit" name="simpan" class="btn btn-primary btn-block shadow-sm">Simpan</button>
    </div>
  </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

  // Initialize
  $( "#pend1" ).autocomplete({
    source: function( request, response ) {
      // Fetch data
      $.ajax({
        url: "<?= site_url('Suratkeluar/userList') ?>",
        type: 'post',
        dataType: "json",
        data: {
          search: request.term
        },
        success: function( data ) {
          response( data );
        }
      });
    },
    select: function (suggestion) {
      // Set selection
      $('#nik_ayah').val(''+suggestion.nik); // membuat id 'v_nim' untuk
      $('#pend1').val(''+suggestion.nama); // membuat id 'v_jurusan' untuk ditampilkan
    }
  });

  // Initialize
  $( "#pend2" ).autocomplete({
    source: function( request, response ) {
      // Fetch data
      $.ajax({
        url: "<?= site_url('Suratkeluar/userList') ?>",
        type: 'post',
        dataType: "json",
        data: {
          search: request.term
        },
        success: function( data ) {
          response( data );
        }
      });
    },
    select: function (suggestion) {
      // Set selection
      $('#nik_ibu').val(''+suggestion.nik); // membuat id 'v_nim' untuk
      $('#pend2').val(''+suggestion.nama); // membuat id 'v_jurusan' untuk ditampilkan
    }
  });

});

</script>
