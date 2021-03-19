<div class="row">
  <div class="col-md-12">
    <div class="card shadow-sm">
      <div class="card-header">
        Daftar data surat masuk
      </div>
      <div class="card-body">
        <div class="datatable">
          <table class="table table-stripped table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Misc</th>
                <th>Nomor Surat</th>
                <th>Tanggal Masuk</th>
                <th>Asal Instansi</th>
                <th>Ditujukan</th>
                <th>Perihal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($suratmasuk == FALSE) {
                echo "<tr><td colspan='7'><center>Belum ada data</center></td></tr>";
              }else{
                $no = 1;
                foreach ($suratmasuk as $key) {
                  ?>
                  <tr>
                    <td><?= $no;?></td>
                    <td>
                      <a href="<?php echo site_url('Surat-Masuk/Ubah-Surat/'.$key->ID_SURATM);?>" class="btn btn-datatable btn-icon btn-transparent-dark mr-1"><i class="text-info" data-feather="edit"></i></a>
                      <button class="btn btn-datatable btn-icon btn-transparent-dark mr-1" data-toggle="modal" data-target="#hapus<?= $no;?>"><i class="text-danger" data-feather="trash-2"></i></button>
                      <?php $file = explode(".", substr($key->FILE, -4)); ?>

                      <?php if (end($file) == "doc" || end($file) == "docx") { ?>
                        <a href="https://docs.google.com/viewer?url=<?php echo base_url();?>berkas/surat-masuk/<?=$key->TANGGAL;?>/<?=$key->FILE;?>&embedded=true" target="_blank" class="btn btn-datatable btn-icon btn-transparent-dark" ><i class="text-warning" data-feather="eye"></i></a>
                      <?php }else { ?>
                        <a href="<?php echo base_url();?>berkas/surat-masuk/<?=$key->TANGGAL;?>/<?=$key->FILE;?>" target="_blank" class="btn btn-datatable btn-icon btn-transparent-dark" ><i class="text-warning" data-feather="eye"></i></a>
                      <?php }?>
                      <?php $download = "{$key->TANGGAL}/{$key->FILE}";?>
                        <a href="<?php echo site_url('Suratmasuk/download/'.$download)?>" target="_blank" class="btn btn-datatable btn-icon btn-transparent-dark" ><i class="text-success" data-feather="download"></i></a>
                    </td>
                    <td><?= $key->NOMOR;?></td>
                    <td><?= date("d F Y", strtotime($key->TANGGAL));?></td>
                    <td><?= $key->DARI;?></td>
                    <td><?= $key->TUJUAN;?></td>
                    <td><?= $key->KEPERLUAN;?></td>
                  </tr>
                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapus<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="hapus_modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-danger" id="hapus_modal">Hapus data surat masuk</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <form class="form-horizontal" action="<?= site_url('Suratmasuk/hapus');?>" method="post">
                          <input type="hidden" name="NOMOR" value="<?= $key->NOMOR;?>">
                          <input type="hidden" name="ID_SURATM" value="<?= $key->ID_SURATM;?>">
                          <div class="modal-body">
                            <p>Apakah anda yakin ingin <span class="text-danger">menghapus</span> data surat masuk dengan nomor <b><?= $key->NOMOR;?></b>?</p>
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
