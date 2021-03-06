<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="SIADIK copyright Nganggurs Team supported by Creative Crew" />
  <meta name="author" content />
  <title>SIADIK - Sistem Informasi Administrasi Kelurahan</title>
  <link href="<?php echo base_url();?>assets/backend/css/styles.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/backend/css/custom.css" rel="stylesheet" />
  <link rel="icon" type="image/x-icon" href="assets/backend/img/favicon.png" />

  <script data-search-pseudo-elements defer src="<?php echo base_url();?>assets/backend/js/plugin/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
</head>
<body class="">

  <?php if ($this->session->flashdata('success')){ ?>
    <!-- Toast success -->
    <div style="position: absolute; top: 1.25rem; right: 1rem; z-index:99 !important">
      <!-- Toast -->
      <div class="toast" id="success_toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
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
    <div style="position: absolute; top: 1.25rem; right: 1rem; z-index:99 !important">
      <!-- Toast -->
      <div class="toast" id="error_toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
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

  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <?php $this->load->view($module.'/'.$fileview); ?>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="footer mt-auto footer-dark">
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
  // Restricts input for the given textbox to the given inputFilter.
  function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
      textbox.addEventListener(event, function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          this.value = "";
        }
      });
    });
  }

  // Install input filters.
  setInputFilter(document.getElementById("pin"), function(value) {
    return /^\d*$/.test(value); });
  </script>
  <script src="<?php echo base_url();?>assets/backend/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/scripts.js"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/datatables/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/datatables/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/momentjs/moment.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url();?>assets/backend/js/plugin/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
</body>
</html>
