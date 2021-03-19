<!-- Main page content-->
<div class="container mt-5">
  <!-- Custom page header alternative example-->
  <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
    <div class="mr-4 mb-3 mb-sm-0">
      <h1 class="mb-0">Dashboard</h1>
      <div class="small">
        <span class="font-weight-500 text-primary"><?php echo date("l");?></span>
        &#xB7; <?php echo date("j F Y");?> &#xB7; <?php echo date("H:i");?> WIB
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-3 col-md-6">
      <!-- Dashboard info widget 1-->
      <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-grow-1">
              <div class="small font-weight-bold text-primary mb-1">Total Pegawai</div>
              <div class="h5"><?= $pegawai;?></div>
              <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                <i class="mr-1" data-feather="activity"></i>
              </div>
            </div>
            <div class="ml-2"><i class="fas fa-briefcase fa-2x text-gray-200"></i></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <!-- Dashboard info widget 1-->
      <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-grow-1">
              <div class="small font-weight-bold text-primary mb-1">Total Penduduk</div>
              <div class="h5"><?= $penduduk;?></div>
              <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                <i class="mr-1" data-feather="activity"></i>

              </div>
            </div>
            <div class="ml-2"><i class="fas fa-users fa-2x text-gray-200"></i></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <!-- Dashboard info widget 1-->
      <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-grow-1">
              <div class="small font-weight-bold text-primary mb-1">Surat Masuk</div>
              <div class="h5"><?= $surat_masuk;?></div>
              <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                <i class="mr-1" data-feather="activity"></i>

              </div>
            </div>
            <div class="ml-2"><i class="fas fa-inbox fa-2x text-gray-200"></i></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <!-- Dashboard info widget 1-->
      <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-grow-1">
              <div class="small font-weight-bold text-primary mb-1">Surat Keluar</div>
              <div class="h5"><?= $surat_keluar;?></div>
              <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                <i class="mr-1" data-feather="activity"></i>

              </div>
            </div>
            <div class="ml-2"><i class="fas fa-paper-plane fa-2x text-gray-200"></i></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Illustration dashboard card example-->
  <div class="card card-waves mb-4 mt-4">
    <div class="card-body p-5">
      <div class="row align-items-center justify-content-between">
        <div class="col-md-7">
          <h2 class="text-gray-500">Selamat Datang, <span class="text-dark"><?= $this->session->userdata('nama');?></span> !!</h2>
          <p class="text-gray-600">SIADIK (Sistem Informasi Administrasi Kelurahan) masih dalam pengerjaan beta version. Dan masih diperuntukan untuk demo.</p>
          <a class="btn btn-primary btn-sm px-3 py-2" href="<?php echo site_url('Changelog');?>">Changelogs <i class="ml-1" data-feather="git-pull-request"></i></a>
        </div>
        <div class="col-md-5 d-none d-lg-block mt-xxl-n4"><img class="img-fluid px-xl-4 mt-xxl-n5" src="<?php echo base_url();?>assets/backend/img/freepik/statistics-pana.svg" /></div>
      </div>
    </div>
  </div>
