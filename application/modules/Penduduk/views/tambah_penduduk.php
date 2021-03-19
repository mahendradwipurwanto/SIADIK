<div class="row">
  <div class="col-md-12">
    <div class="card shadow-sm">
      <div class="card-header">
        Tambahkan data penduduk
      </div>
      <form class="form-horizontal" action="<?php echo site_url('Penduduk/tambah');?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 col-sm-12">

              <div class="form-group">
                <label class="title">No. KK <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="KK" placeholder="Masukkan nomor KK" required>
              </div>
              <div class="form-group">
                <label class="title">No. NIK <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="NIK" placeholder="Masukkan nomor NIK" required>
              </div>
              <div class="form-group">
                <label class="title">Nama Lengkap <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="NAMA" placeholder="Masukkan nama lengkap" required>
              </div>
              <div class="form-group">
                <label class="title">Jenis Kelamin <small class="text-danger">*</small></label><br>
                <input type="radio" name="JK" value="L" checked>
                <label for="male">Pria</label><br>
                <input type="radio" name="JK" value="P">
                <label for="female">Wanita</label><br>
              </div>
              <div class="form-group">
                <label class="title">TEMPAT LAHIR <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="TEMPAT_LAHIR" placeholder="Masukkan tempat lahir" required>
              </div>
              <div class="form-group">
                <label class="title">TANGGAL LAHIR <small class="text-danger">*</small></label>
                <input type="date"  class="form-control" name="TGL_LAHIR" required>
              </div>
              <div class="form-group">
                <label class="title">UMUR <small class="text-danger">*</small></label>
                <input type="number"  class="form-control" name="UMUR" placeholder="Masukkan umur" required>
              </div>

            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="title">Golongan Darah <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="GOL_DARAH" placeholder="masukkan golongan darah" required>
              </div>
              <div class="form-group">
                <label class="title">Agama <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="AGAMA" placeholder="masukkan agama" required>
              </div>
              <div class="form-group">
                <label class="title">Status <small class="text-danger">*</small></label><br>
                <input type="radio" name="STATUS" value="BELUM MENIKAH" checked>
                <label for="female">BELUM MENIKAH</label><br>
                <input type="radio" name="STATUS" value="MENIKAH">
                <label for="male">MENIKAH</label><br>
              </div>
              <div class="form-group">
                <label class="title">Hubungan <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="HUBUNGAN" placeholder="masukkan status" required>
              </div>
              <div class="form-group">
                <label class="title">Pendidikan <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="PENDIDIKAN" placeholder="masukkan pendidikan" required>
              </div>
              <div class="form-group">
                <label class="title">Pekerjaan <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="PEKERJAAN" placeholder="masukkan pekerjaan" required>
              </div>
              <div class="form-group">
                <label class="title">Nama Ibu <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="IBU" placeholder="masukkan nama ibu" required>
              </div>
              <div class="form-group">
                <label class="title">Nama Ayah <small class="text-danger">*</small></label>
                <input type="text"  class="form-control" name="AYAH" placeholder="masukkan nama ayah" required>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <a href="<?php echo site_url('Surat-Masuk');?>" class="btn btn-sm btn-light">Batal</a>
          <button type="submit" class="btn btn-sm btn-primary">Tambahkan data</button>
        </div>
      </form>
    </div>
  </div>
</div>
