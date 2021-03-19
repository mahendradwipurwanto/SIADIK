<div class="row mb-4">
  <div class="col-md-9">
    <div class="card shadow-sm">
      <div class="card-header text-info">
        Detail data surat keluar
      </div>
      <div class="card-body">
        <div class="form-group">
          <label class="title">Nomor Surat</label>
          <input type="text" class="form-control" value="<?= $suratkeluar->NOMOR;?>"  disabled>
          <small class="text-muted">Ubah jika diperlukan</small>
        </div>
        <div class="form-group">
          <div class="row mb-2">
            <div class="col-md-6">
              <label class="title">Nama Ayah</label>
              <input type="text" class="form-control get_ayah" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "NAMA_AYAH");?>" disabled>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="title">Nama Ibu</label>
                <input type="text" class="form-control autocomplete" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "NAMA_IBU");?>" disabled>
              </div>
            </div>
          </div>
        </div>
        <hr class="mt-1 mb-1">
        <div class="form-group">
          <label class="title">Alamat</label>
          <textarea class="form-control"rows="3" disabled><?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "ALAMAT");?></textarea>
        </div>
        <div class="form-group">
          <label class="title">Lahir Pada:</label>
          <div class="row mb-2">
            <div class="col-md-3">
              <label class="title">Hari</label>
              <input type="text" class="form-control" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "HARI");?>" disabled>
            </div>
            <div class="col-md-3">
              <label class="title">Tanggal</label>
              <input type="text" class="form-control" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "TANGGAL");?>" disabled>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label class="title">Jam</label>
                <input type="text" class="form-control" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "JAM");?>" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="title">Di</label>
                <input type="text" class="form-control" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "DI");?>" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row mb-2">
            <div class="col-md-3">
              <label class="title">Jenis Kelamin</label>
              <input type="text" class="form-control" value="<?= $controller->M_suratkeluar->get_data_id($suratkeluar->ID_SURATK, "JK");?>" disabled>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label class="title">Anak Ke</label>
                <input type="number" class="form-control" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "ANAK_KE");?>" disabled>
              </div>
            </div>
            <div class="col-md-7">
              <div class="form-group">
                <label class="title">Diberi Nama</label>
                <input type="text" class="form-control" value="<?= $controller->M_suratkeluar->get_data($suratkeluar->ID_SURATK, "NAMA_ANAK");?>" disabled>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
