<div class="row">
  <div class="col-md-12">
    <div class="card shadow-sm">
      <div class="card-header">
        Daftar data pegawai
      </div>
      <!-- Modal Tambah -->
      <div class="modal fade" id="t_pegawai" tabindex="-1" role="dialog" aria-labelledby="t_pegawai_modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="t_pegawai_modal">Tambah data pegawai</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form class="form-horizontal" action="<?= site_url('Pegawai/tambah');?>" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label class="title">No Pegawai <small class="text-danger">*</small></label>
                  <input type="text" class="form-control" name="NO_PEGAWAI" placeholder="Masukkan nomor pegawai" required>
                </div>
                <div class="form-group">
                  <label class="title">Nama Pegawai <small class="text-danger">*</small></label>
                  <input type="text" class="form-control" name="NAMA" placeholder="Masukkan nama pegawai" required>
                </div>
                <div class="form-group">
                  <label class="title">Nomor Telepon <small class="text-danger">*</small></label>
                  <input type="text" class="form-control" id="t_hp" name="HP" maxlength="18" placeholder="Masukkan nomor telepon pegawai" required>
                  <small class="text-muted">Usahakan nomor Whatsapp</small>
                </div>
                <div class="form-group">
                  <label class="title">Jabatan <small class="text-danger">*</small></label>
                  <select class="select2" name="JABATAN">
                    <option value="Administrasi">Administrasi</option>
                    <option value="Keuangan">Keuangan</option>
                    <option value="Pelayanan Publik">Pelayanan Publik</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-light btn-sm" type="button" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm" type="button">Tambahkan data</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="datatable">
          <table class="table table-stripped table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Misc</th>
                <th>No Pegawai</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Jabatan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($pegawai == FALSE) {
                echo "<tr><td colspan='6'><center></center></td></tr>";
              }else{
                $no = 1;
                foreach ($pegawai as $key) {
                  ?>
                  <tr>
                    <td><?= $no;?></td>
                    <td>
                      <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" data-toggle="modal" data-target="#edit<?= $no;?>"><i class="text-info" data-feather="edit"></i></button>
                      <?php if($this->session->userdata('role') == 0){ ?>
                      <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" data-toggle="modal" data-target="#hak_edit<?= $no;?>"><i class="text-<?= ($this->M_pegawai->hak_akses($key->ID_USER) == TRUE ? "success" : "warning") ?>" data-feather="key"></i></button>
                      <button class="btn btn-datatable btn-icon btn-transparent-dark" data-toggle="modal" data-target="#hapus<?= $no;?>"><i class="text-danger" data-feather="trash-2"></i></button>
                      <?php }?>
                    </td>
                    <td><?= $key->NO_PEGAWAI;?></td>
                    <td><?= $key->NAMA;?></td>
                    <td><?= $key->HP;?></td>
                    <td><?= $key->JABATAN;?></td>
                  </tr>
                  <!-- Modal Edit -->
                  <div class="modal fade" id="edit<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="edit_modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-info" id="edit_modal">Ubah data pegawai</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <form class="form-horizontal" action="<?= site_url('Pegawai/edit');?>" method="post">
                          <input type="hidden" name="ID_USER" value="<?= $key->ID_USER;?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label class="title">No Pegawai <small class="text-danger">*</small></label>
                              <input type="text" class="form-control" name="NO_PEGAWAI" value="<?= $key->NO_PEGAWAI;?>" required>
                            </div>
                            <div class="form-group">
                              <label class="title">Nama Pegawai <small class="text-danger">*</small></label>
                              <input type="text" class="form-control" name="NAMA" value="<?= $key->NAMA;?>" required>
                            </div>
                            <div class="form-group">
                              <label class="title">Nomor Telepon <small class="text-danger">*</small></label>
                              <input type="text" class="form-control" id="e_hp" name="HP" maxlength="18" value="<?= $key->HP;?>" required>
                              <small class="text-muted">Usahakan nomor Whatsapp</small>
                            </div>
                            <div class="form-group">
                              <label class="title">Jabatan <small class="text-danger">*</small></label>
                              <select class="select2" name="JABATAN">
                                <optgroup label="Current">
                                  <option value="<?= $key->JABATAN;?>"><?= $key->JABATAN;?></option>
                                </optgroup>
                                <optgroup label="Change">
                                  <option value="Administrasi">Administrasi</option>
                                  <option value="Keuangan">Keuangan</option>
                                  <option value="Pelayanan Publik">Pelayanan Publik</option>
                                </optgroup>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light btn-sm" type="button" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info btn-sm" type="button">Simpan perubahan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapus<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="hapus_modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-danger" id="hapus_modal">Hapus data pegawai</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <form class="form-horizontal" action="<?= site_url('Pegawai/hapus');?>" method="post">
                          <input type="hidden" name="NAMA" value="<?= $key->NAMA;?>">
                          <input type="hidden" name="ID_USER" value="<?= $key->ID_USER;?>">
                          <div class="modal-body">
                            <p>Apakah anda yakin ingin <span class="text-danger">menghapus</span> data pegawai atas nama <b><?= $key->NAMA;?></b>?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger btn-sm" type="button">Yakin hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Modal Hak akses -->
                  <div class="modal fade" id="hak_edit<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="hak_modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-warning" id="hak_modal">Atur HAK AKSES pegawai</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <form class="form-horizontal" action="<?= site_url('Pegawai/hak_akses');?>" method="post">
                          <input type="hidden" name="NAMA" value="<?= $key->NAMA;?>">
                          <input type="hidden" name="ID_USER" value="<?= $key->ID_USER;?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label class="title">Username Pegawai <small class="text-danger">*</small></label>
                              <input type="text" class="form-control" name="USERNAME" minlength="5" maxlength="20" placeholder="Masukkan username" required>
                              <small class="text-muted">Minimal 6 karakter, Maksimal 20 Karakter</small>
                            </div>
                            <div class="form-group">
                              <label class="title">PIN/Password Pegawai <small class="text-danger">*</small></label>
                              <input type="password" class="form-control" name="PASSWORD" minlength="6" maxlength="6" placeholder="Masukkan password" required>
                              <small class="text-muted">6 Digit PIN/Password</small>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="reset" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-<?= ($this->M_pegawai->hak_akses($key->ID_USER) == TRUE ? "success" : "warning") ?> btn-sm"><?= ($this->M_pegawai->hak_akses($key->ID_USER) == TRUE ? "Ubah" : "Beri") ?> Hak Akses</button>
                            <a href="<?php echo site_url('Pegawai/HapusHakAkses/'.$key->ID_USER.'/'.$key->NAMA);?>" class="btn btn-danger btn-sm">Hapus Hak Akses</a>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <?php $no++;
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
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

  // Install input filters Tambah Hp Pegawai.
  setInputFilter(document.getElementById("t_hp"), function(value) { return /^\d*$/.test(value); });
  // Install input filters Edit Hp Pegawai.
  setInputFilter(document.getElementById("e_hp"), function(value) { return /^\d*$/.test(value); });
  </script>
