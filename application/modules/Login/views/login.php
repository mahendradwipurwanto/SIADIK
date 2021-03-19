<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-xl-8 col-lg-6 col-md-8 col-sm-12">
      <div class="vertical-center">
        <i class="feather-xxxl text-primary mb-2" data-feather="package"></i>
        <h1 class="font-weight-700 font-size-4r">SIADIK</h1>
        <h4 class="text-muted">Sistem Informasi Administrasi Kelurahan</h4>
        <h2 class="font-weight-500">Kantor Kelurahan Mangliawan</h2>
      </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-12">
      <!-- Social login form-->
      <div class="card my-5">
        <div class="card-body text-center">
          <div class="h3 font-weight-bold">Masuk ke AKUN anda!!</div>
          <img class="img-account-profile rounded-circle mb-2" src="<?php echo base_url();?>assets/backend/img/logo.jpg" style="width: 4rem !important" alt />
          <div class="small text-muted">Silahkan masukkan <span class="badge badge-primary">No Pegawai/Username</span> & <span class="badge badge-primary">PIN</span> anda</div>
        </div>
        <hr class="my-0" />
        <div class="card-body p-4">
          <!-- Login form-->
          <form action="<?php echo site_url('Login/auth')?>" method="POST">
            <div class="form-group">
              <label class="text-gray-600 small" for="NoPegawai">No Pegawai/Username</label>
              <input class="form-control form-control-solid py-4" type="text" name="username" minlength="5" maxlength="20" placeholder-aria-label="No Pegawai" aria-describedby="NoPegawai" required/>
            </div>
            <div class="form-group">
              <label class="text-gray-600 small" for="PinPegawai">PIN Pegawai </label><span class="badge badge-warning ml-1 font-italic">6 Digit PIN</span>
              <input class="form-control form-control-solid py-4" id="pin" type="password" name="pin" minlength="6" maxlength="6" placeholder-aria-label="Pin Pegawai" aria-describedby="PinPegawai" required />
            </div>
            <!-- Form Group (forgot password link)-->
            <!-- Form Group (login box)-->
            <div class="form-group d-flex align-items-center justify-content-between mb-0">
              <a class="small text-primary no-dec" href="<?php echo site_url('login/lupa-pin');?>">Lupa PIN anda?</a>
              <button type="submit" class="btn btn-primary shadow-sm pull-right">MASUK</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
