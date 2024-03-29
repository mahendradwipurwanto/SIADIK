<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="SIADIK copyright Nganggurs Team supported by Creative Crew" />
  <meta name="author" content />
  <title>SIADIK - Sistem Informasi Administrasi Kelurahan</title>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/backend/img/favicon.png" />

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

  <link href="<?php echo base_url();?>assets/backend/css/styles.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/backend/css/custom.css" rel="stylesheet" />

  <link href="<?php echo base_url();?>assets/backend/css/plugin/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="<?php echo base_url();?>assets/backend/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="<?php echo base_url();?>assets/backend/js/plugin/autocomplete/jquery.autocomplete.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

  <script src="<?php echo base_url();?>assets/backend/js/plugin/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>

  <script src="<?php echo base_url();?>assets/backend/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js" integrity="sha512-5/eRdfJh8YCiP8t7VTfUwJY9CivKAchQP2vgcNIvDz9na9RuGBYHlt5WiUywwCWsAf+yrtJBjnaoxS0eUy7Ryg==" crossorigin="anonymous"></script>
</head>
<body class="nav-fixed">
  <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
    <a class="navbar-brand" href="index.html">SIADIK</a>
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
    <ul class="navbar-nav align-items-center ml-auto">
      <li class="nav-item dropdown no-caret mr-3 d-none d-md-inline">
        <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="d-none d-md-inline font-weight-500">Dokumentasi</div>
          <i class="fas fa-chevron-right dropdown-arrow"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right py-0 mr-sm-n15 mr-lg-0 o-hidden animated--fade-in-up" aria-labelledby="navbarDropdownDocs">
          <a class="dropdown-item py-3" href="<?php echo site_url('Changelog');?>">
            <div class="icon-stack bg-primary-soft text-primary mr-4"><i data-feather="git-pull-request"></i></div>
            <div>
              <div class="small text-gray-500">Changelogs</div>
              Lihat proses development
            </div>
          </a>
          <div class="dropdown-divider m-0"></div>
        </div>
      </li>
      <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i></a>
        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
          <h6 class="dropdown-header dropdown-notifications-header">
            <i class="mr-2" data-feather="bell"></i>
            Pemberitahuan
          </h6>
          <a class="dropdown-item dropdown-notifications-item" href="#!">
            <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="git-pull-request"></i></div>
            <div class="dropdown-notifications-item-content">
              <div class="dropdown-notifications-item-content-details">Februari 26, 2021</div>
              <div class="dropdown-notifications-item-content-text">Changelogs website.</div>
            </div>
          </a>
          <a class="dropdown-item dropdown-notifications-footer" href="#!">Lihat semua pemberitahuan</a>
        </div>
      </li>
      <li class="nav-item dropdown no-caret mr-2 dropdown-user">
        <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"/></a>
        <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
          <h6 class="dropdown-header d-flex align-items-center">
            <img class="dropdown-user-img" src="https://source.unsplash.com/QAB-WJcbgJk/60x60" />
            <div class="dropdown-user-details">
              <div class="dropdown-user-details-name"><?= $this->session->userdata('nama');?></div>
            </div>
          </h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo site_url('logout');?>">
            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
            Keluar
          </a>
        </div>
      </li>
    </ul>
  </nav>

  <?php if ($this->session->flashdata('success')){ ?>
    <!-- Toast success -->
    <div style="position: absolute; top: 4.5rem; right: 1rem; z-index:99 !important">
      <!-- Toast -->
      <div class="toast" id="success_toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="8000">
        <div class="toast-header text-success">
          <i data-feather="check-circle"></i>
          <strong class="mr-auto">Notifikasi</strong>
          <small class="text-muted ml-4">baru jasa</small>
          <button class="ml-2 mb-1 close" type="button" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="toast-body"><?= $this->session->flashdata('success'); ?></div>
      </div>
    </div>
  <?php }elseif($this->session->flashdata('error')){ ?>
    <!-- Toast error -->
    <div style="position: absolute; top: 4.5rem; right: 1rem; z-index:99 !important">
      <!-- Toast -->
      <div class="toast" id="error_toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="8000">
        <div class="toast-header text-danger">
          <i data-feather="alert-circle"></i>
          <strong class="mr-auto">Terjadi Kesalahan</strong>
          <small class="text-muted ml-4">baru saja</small>
          <button class="ml-2 mb-1 close" type="button" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="toast-body"><?= $this->session->flashdata('error'); ?></div>
      </div>
    </div>
  <?php } ?>

  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
          <div class="nav accordion" id="accordionSidenav">
            <div class="sidenav-menu-heading">Dashboard</div>
            <a class="nav-link" href="<?php echo site_url('Dashboard');?>">
              <div class="nav-link-icon"><i data-feather="trello"></i></div>
              Dashboard
            </a>
            <div class="sidenav-menu-heading">Berkas</div>
            <a class="nav-link" href="<?php echo site_url('Pegawai');?>">
              <div class="nav-link-icon"><i data-feather="briefcase"></i></div>
              Data Pegawai
            </a>
            <a class="nav-link" href="<?php echo site_url('Penduduk');?>">
              <div class="nav-link-icon"><i data-feather="users"></i></div>
              Data Penduduk
            </a>
            <div class="sidenav-menu-heading">Surat</div>
            <a class="nav-link" href="<?php echo site_url('Surat-Masuk');?>">
              <div class="nav-link-icon"><i data-feather="inbox"></i></div>
              Surat Masuk
            </a>
            <a class="nav-link" href="<?php echo site_url('Surat-Keluar');?>">
              <div class="nav-link-icon"><i data-feather="archive"></i></div>
              Surat Keluar
            </a>
            <?php if($this->session->userdata('role') == 0){ ?>
            <div class="sidenav-menu-heading">Utilities</div>
            <a class="nav-link" href="<?php echo site_url('Pengaturan');?>">
              <div class="nav-link-icon"><i data-feather="settings"></i></div>
              Pengaturan
            </a>
            <?php }?>
          </div>
        </div>
        <div class="sidenav-footer">
          <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Masuk sebagai:</div>
            <div class="sidenav-footer-title"><?= $this->session->userdata('nama');?></div>
          </div>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <?php if ($this->uri->segment(1) <> "Statistik" && $this->uri->segment(1) <> "Dashboard") { ?>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white">
          <div class="container-fluid">
            <div class="page-header-content">
              <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                  <h1 class="page-header-title">
                    <div class="page-header-icon"><i data-feather="trello"></i></div>
                    <a class="text-none text-muted" href="<?= site_url('Dashboard');?>">Dashboard</a> <span class="ml-2 mr-2">/</span>
                    <?= ($this->uri->segment(1) ? '<a class="text-none text-'.($this->uri->segment(2) ? 'muted' : 'dark').'" href="'.site_url($this->uri->segment(1)).'">'.str_replace("-", " ", $this->uri->segment(1)).'</a>' : ''); ?>
                    <?= ($this->uri->segment(2) ? '<span class="ml-2 mr-2">/</span> <a class="text-none text-'.($this->uri->segment(2) ? 'muted' : 'dark').'" href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2)).'">'.str_replace("-", " ", $this->uri->segment(2)).'</a>' : ''); ?>
                    <?= ($this->uri->segment(3) == "Isi-Data" ? ($this->uri->segment(3) ? '<span class="ml-2 mr-2">/</span> <a class="text-none text-dark">'.str_replace("-", " ", $this->uri->segment(3)).'</a>' : '') : '') ?>
                  </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                  <?= ($this->uri->segment(1) == "Pegawai" ? '<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#t_pegawai">Tambah Pegawai</button>' : ''); ?>
                  <?= ($this->uri->segment(1) == "Surat-Masuk" && $this->uri->segment(2) != "Tambah-Surat-Masuk" ? '<a href="'.site_url("Surat-Masuk/Tambah-Surat-Masuk").'" class="btn btn-sm btn-primary" >Tambah Surat Masuk</a>' : ''); ?>
                  <?= ($this->uri->segment(1) == "Surat-Keluar" && $this->uri->segment(2) != "Tambah-Surat-Keluar" ? '<a href="'.site_url("Surat-Keluar/Tambah-Surat-Keluar").'" class="btn btn-sm btn-primary" >Tambah Surat Keluar</a>' : ''); ?>
                  <?= ($this->uri->segment(1) == "Penduduk" ? '<button type="button" class="btn btn-sm btn-success mr-2" data-toggle="modal" data-target="#t_excel">Impor Data Penduduk</button> <a href="'.site_url("Penduduk/Tambah-Penduduk").'" class="btn btn-sm btn-primary" >Tambah Data Penduduk</a>' : ''); ?>
                </div>
              </div>
            </div>
          </div>
        </header>
      <?php }?>
      <main>
        <!-- Main page content-->
        <div class="container mt-4">
          <?php $this->load->view($module.'/'.$fileview); ?>
        </div>
      </main>
      <footer class="footer mt-auto footer-light">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 small">Copyright &#xA9; Nganggurs 2020</div>
            <div class="col-md-6 text-md-right small">
              <a href="#!">Kebijakan Privasi</a>
              &#xB7;
              <a href="#!">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="<?php echo base_url();?>assets/backend/js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/momentjs/moment.min.js" crossorigin="anonymous"></script>

  <script src="<?php echo base_url();?>assets/backend/js/plugin/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

  <?php if ($this->session->flashdata('success')){ ?>
    <script>
    $( document ).ready(function() {
      $('#success_toast').toast('show');
    });
    </script>
  <?php }elseif($this->session->flashdata('error')){ ?>
    <script>
    $( document ).ready(function() {
      $('#error_toast').toast('show');
    });
    </script>
  <?php }?>

  <script type="text/javascript">
  $(document).ready(function() {
    var table = $('#dataTable').DataTable( {
      scrollX:        true,
      "autoWidth": true,
    } );
  } );
  $(document).ready(function() {
    $('.select2').select2({
      placeholder: "Pilih data",
      allowClear: true
    });
  });
  </script>

</body>
</html>
