<div class="row">
  <div class="col-md-12">
    <div class="card shadow-sm">
      <div class="card-header tex">
        Ubah data surat masuk
      </div>
      <form class="form-horizontal" action="<?php echo site_url('Penduduk/edit');?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="ID_PENDUDUK" value="<?= $penduduk->ID_PENDUDUK;?>">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="title">No. KK <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="KK" value="<?= $penduduk->KK;?>" required>
              </div>
              <div class="form-group">
                <label class="title">No. NIK <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="NIK" value="<?= $penduduk->NIK;?>" required>
              </div>
            <div class="form-group">
              <label class="title">Nama Lengkap <small class="text-danger">*</small></label>
              <input type="text"  class="form-control" name="NAMA" value="<?= $penduduk->NAMA;?>" required>
            </div>
            <div class="form-group">
              <label class="title">Jenis Kelamin <small class="text-danger">*</small></label><br>
              <input type="radio" name="JK" value="L" <?= ($penduduk->JK == "L" ? 'checked' : '')?>>
              <label for="male">Pria</label><br>
              <input type="radio" name="JK" value="P" <?= ($penduduk->JK == "P" ? 'checked' : '')?>>
              <label for="female">Wanita</label><br>
            </div>
            <div class="form-group">
              <label class="title">TEMPAT LAHIR <small class="text-danger">*</small></label>
              <input type="text" class="form-control" name="TEMPAT_LAHIR" value="<?= $penduduk->TEMPAT_LAHIR;?>" required>
            </div>
            <div class="form-group">
              <label class="title">TANGGAL LAHIR <small class="text-danger">*</small></label>
              <input type="date"  class="form-control" name="TGL_LAHIR" required>
            </div>
            <div class="form-group">
              <label class="title">UMUR <small class="text-danger">*</small></label>
              <input type="text"  class="form-control" name="UMUR" value="<?= $penduduk->UMUR;?>" required>
            </div>
          </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="title">Golongan Darah <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="GOL_DARAH" value="<?= $penduduk->GOL_DARAH;?>" required>
              </div>
              <div class="form-group">
                <label class="title">Agama <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="AGAMA" value="<?= $penduduk->AGAMA;?>" required>
              </div>
              <div class="form-group">
                <label class="title">Status <small class="text-danger">*</small></label><br>
                <input type="radio" name="STATUS" value="BELUM MENIKAH" <?= ($penduduk->STATUS == "BELUM MENIKAH" ? 'checked' : '')?>>
                <label for="female">BELUM MENIKAH</label><br>
                <input type="radio" name="STATUS" value="MENIKAH"<?= ($penduduk->STATUS == "MENIKAH" ? 'checked' : '')?>>
                <label for="male">MENIKAH</label><br>
              </div>
              <div class="form-group">
                <label class="title">Hubungan <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="HUBUNGAN" value="<?= $penduduk->HUBUNGAN;?>" required>
              </div>
              <div class="form-group">
                <label class="title">Pendidikan <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="PENDIDIKAN" value="<?= $penduduk->PENDIDIKAN;?>" required>
              </div>
              <div class="form-group">
                <label class="title">Pekerjaan <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="PEKERJAAN" value="<?= $penduduk->PEKERJAAN;?>" required>
              </div>
              <div class="form-group">
                <label class="title">Nama Ibu <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="IBU" value="<?= $penduduk->IBU;?>" required>
              </div>
              <div class="form-group">
                <label class="title">Nama Ayah <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="AYAH" value="<?= $penduduk->AYAH;?>" required>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <a href="<?php echo site_url('Surat-Masuk');?>" class="btn btn-sm btn-light">Batal</a>
          <button type="submit" class="btn btn-sm btn-info">Simpan perubahan</button>
        </div>
      </form>
    </div>
  </div>


  <script type="text/javascript">
  var input = document.getElementById( 'file-upload' );
  var infoArea = document.getElementById( 'file-upload-filename' );

  input.addEventListener( 'change', showFileName );

  function showFileName( event ) {

    // the change event gives us the input it occurred in
    var input = event.srcElement;

    // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
    var fileName = input.files[0].name;

    // use fileName however fits your app best, i.e. add it into a div
    infoArea.textContent = 'File name: ' + fileName;
  }
</script>
