<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
<!-- Custom page header alternative example-->
<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-1 mb-sm-0">
    <h1 class="mb-0">Pilih Kategori Surat</h1>
  </div>
</div>
<hr>
<div id="msform">
  <ul id="progressbar">
    <li class="active" id="account"><h6>Pilih Kategori Surat</h6></li>
    <li id="personal"><h6>Isi Data Surat</h6></li>
    <li id="confirm"><h6>Publish</h6></li>
  </ul> <!-- fieldsets -->
</div>
<div class="row mb-4">
  <div class="col-md-8">
    <div class="row mb-4">
      <?php foreach ($kategori as $key) { ?>
      <div class="col-md-3">
        <a href="<?php echo site_url('Surat-Keluar/Tambah-Surat-Keluar/Isi-Data/'.$key->ID_KATEGORI);?>" class="c--card shadow text-none">
          <div class="card--header"><?= $key->NAMA;?></div>
          <div class="card--main">
            <h3 class="text-danger"><?= $controller->M_suratkeluar->cek_surat($key->ID_KATEGORI) ;?></h3>
            <div class="main--description">Lihat data surat</div>
          </div>
        </a>
      </div>
      <?php }?>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-info shadow-sm">
      <div class="card-header">
        Perhatian
      </div>
      <div class="card-body">
        <small class="mb-0">Anda dapat menambahkan kategori surat di: Pengaturan > Kategori, atau dapat meng klik <a href="<?php echo site_url('Pengaturan/Kategori');?>" class="text-primary text-none">link ini</a></small><br>
      </div>
    </div>
  </div>
</div>
