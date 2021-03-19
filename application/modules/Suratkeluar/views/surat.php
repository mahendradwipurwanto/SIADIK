<div class="row">
  <div class="col-md-12">
    <div class="card shadow-sm">
      <div class="card-header">
        Daftar data surat keluar
      </div>
      <div class="card-body">
        <div class="datatable">
          <table class="table table-stripped table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Misc</th>
                <th>Nomor Surat</th>
                <th>Tanggal Keluar</th>
                <th>Perihal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($suratkeluar == FALSE) {
                echo "<tr><td colspan='7'><center>Belum ada data</center></td></tr>";
              }else{
                $no = 1;
                foreach ($suratkeluar as $key) {
                  ?>
                  <tr>
                    <td><?= $no;?></td>
                    <td>
                      <a href="<?php echo site_url('Surat-Keluar/Ubah-Surat/'.$key->ID_KATEGORI.'/'.$key->ID_SURATK);?>" class="btn btn-datatable btn-icon btn-transparent-dark mr-1"><i class="text-info" data-feather="edit"></i></a>
                      <button class="btn btn-datatable btn-icon btn-transparent-dark mr-1" data-toggle="modal" data-target="#hapus<?= $no;?>"><i class="text-danger" data-feather="trash-2"></i></button>
                      <a href="<?php echo site_url('Surat-Keluar/Detail-Surat/'.$key->ID_KATEGORI.'/'.$key->ID_SURATK);?>" class="btn btn-datatable btn-icon btn-transparent-dark mr-1"><i class="text-success" data-feather="eye"></i></a>
                      <a href="<?php echo site_url('Surat-Keluar/Cetak-Surat/'.$key->ID_KATEGORI.'/'.$key->ID_SURATK);?>" target="_blank" class="btn btn-datatable btn-icon btn-transparent-dark mr-1"><i class="text-warning" data-feather="printer"></i></a>
                    </td>
                    <td><?= $key->NOMOR;?></td>
                    <td><?= date("d F Y", strtotime($key->TANGGAL));?></td>
                    <td><?= $key->KATEGORI;?></td>
                  </tr>
                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapus<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="hapus_modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-danger" id="hapus_modal">Hapus data surat keluar</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <form class="form-horizontal" action="<?= site_url('Suratkeluar/hapus');?>" method="post">
                          <input type="hidden" name="NOMOR" value="<?= $key->NOMOR;?>">
                          <input type="hidden" name="ID_SURATK" value="<?= $key->ID_SURATK;?>">
                          <div class="modal-body">
                            <p>Apakah anda yakin ingin <span class="text-danger">menghapus</span> data surat keluar dengan nomor <b><?= $key->NOMOR;?></b>?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger btn-sm" type="button">Yakin hapus</button>
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
