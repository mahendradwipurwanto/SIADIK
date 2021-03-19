<div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-2">
  <div class="mr-4 mb-3 mb-sm-0">
    <h1 class="mb-0">Data Kategori Surat</h1>
  </div>
</div>
<hr>
<div id="tambah" class="modal fade" role="dialog" tabindex="-1" >
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Tambah data <b>Kategori Surat</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo site_url('Pengaturan/tambah_kategori');?>" method="post">

          <div class="form-group">
            <label class="title">Kode Kategori Surat <small class="text-danger">*</small> </label>
            <input type="text" name="KODE" maxlength="5" class="form-control" placeholder="Kode Kategori Surat" required>
            <small class="text-muted">Max 5 karakter. <i>Ex: 145</i></small>
          </div>

          <div class="form-group">
            <label class="title">Nama Kategori Surat <small class="text-danger">*</small> </label>
            <input type="text" name="NAMA" maxlength="50" class="form-control" placeholder="Nama Kategori Surat" required>
            <small class="text-muted">Max 50 karakter</small>
          </div>

          <div class="form-group">
            <label class="title">Keterangan</label>
            <textarea type="text" name="KETERANGAN" class="form-control" maxlength="300" rows="3" placeholder="Isikan keterangan kategori"></textarea>
            <small class="text-muted">Max 300 karakter</small>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary btn-sm">Tambahkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8">
    <div class="card shadow-sm">
      <div class="card-header">Daftar Kategori Surat
        <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambah"> <i class="fa fa-plus fa-xs mr-2"></i> Tambah Kategori</button>
      </div>
      <div class="card-body">
        <table id="dataTable" class="table table-hover table-bordered" width="100%">
          <thead>
            <tr>
              <th>KODE</th>
              <th>Misc</th>
              <th>Kategori</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($kategori == FALSE) { echo "<tr><td colspan='5'><center>Belum ada data</center></td></tr>";}else{ $no = 1; foreach ($kategori as $key) { ?>
              <tr>
                <td><?= $key->KODE;?></td>
                <td>
                  <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#edit<?= $key->ID_KATEGORI;?>"><i class="fa fa-edit fa-sm"></i></button>
                  <?php if($controller->M_pengaturan->kat_count($key->ID_KATEGORI) > 0){ ?>
                    <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#error"><i class="fa fa-trash fa-sm"></i></button>
                  <?php }else{?>
                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?= $key->ID_KATEGORI;?>"><i class="fa fa-trash fa-sm"></i></button>
                  <?php }?>
                </td>
                <td><?= $key->NAMA;?></td>
                <td><?= $key->KETERANGAN;?></td>
              </tr>

              <!-- MODAL error -->
              <div id="error" class="modal fade" role="dialog" tabindex="-1" >
                <div class="modal-dialog" role="document">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Opps...</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <p>Anda tidak dapat menghapus data Kategori, yang masih digunakan.</p>

                      <button type="button" class="btn btn-primary btn-sm float-right" data-dismiss="modal">Ok, Mengerti</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- MODAL edit -->
              <div id="edit<?= $key->ID_KATEGORI;?>" class="modal fade" role="dialog" tabindex="-1" >
                <div class="modal-dialog" role="document">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header bg-info">
                      <h5 class="modal-title text-white">Ubah data Kategori Surat <b><?= $key->NAMA;?></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <form class="form-horizontal" action="<?php echo site_url('Pengaturan/ubah_kategori');?>" method="post">
                        <input type="hidden" name="ID_KATEGORI" value="<?= $key->ID_KATEGORI;?>">

                        <div class="form-group">
                          <label class="title">Kode Kategori <small class="text-danger">*</small></label>
                          <input type="text" name="KODE" maxlength="5" class="form-control" value="<?= $key->KODE;?>" required>
                          <small class="text-muted">Max 5 karakter</small>
                        </div>

                        <div class="form-group">
                          <label class="title">Nama Kategori <small class="text-danger">*</small></label>
                          <input type="text" name="NAMA" maxlength="50" class="form-control" value="<?= $key->NAMA;?>" required>
                          <small class="text-muted">Max 50 karakter</small>
                        </div>

                        <div class="form-group">
                          <label class="title">Keterangan</label>
                          <textarea type="text" name="KETERANGAN" maxlength="300" class="form-control" rows="3"><?= $key->KETERANGAN;?></textarea>
                          <small class="text-muted">Max 300 karakter</small>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-info btn-sm">Ubah data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- MODAL hapus -->
              <div id="hapus<?= $key->ID_KATEGORI;?>" class="modal fade" role="dialog" tabindex="-1" >
                <div class="modal-dialog" role="document">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header bg-danger">
                      <h5 class="modal-title text-white">Hapus data Kategori <b></b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <form class="form-horizontal" action="<?php echo site_url('Pengaturan/hapus_kategori');?>" method="post">
                        <input type="hidden" name="ID_KATEGORI" value="<?= $key->ID_KATEGORI;?>">
                        <input type="hidden" name="NAMA" value="<?= $key->NAMA;?>">

                        <p>Apakah anda yakin akan menghapus data Kategori Surat <b><?= $key->NAMA;?></b> </p>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger btn-sm">Hapus data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php $no++;}};?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="alert alert-info shadow-sm">
        <p class="mb-0">Harap atur data kategori terlebih dahulu, setiap kategori akan memiliki menu khusus pada Proses Tambah Surat Masuk.</p>
      </div>
    </div>
  </div>
