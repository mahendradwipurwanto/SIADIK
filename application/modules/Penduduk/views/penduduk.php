<div class="row">
  <div class="col-md-12">
    <div class="card shadow-sm">
      <div class="card-header">
        Daftar data penduduk
      </div>
      <div class="card-body">
        <div class="datatable">
          <table class="table table-stripped table-hover" id="dataTable" width="100%" cellspacing="0"><!-- Modal Excel -->
          <div class="modal fade" id="t_excel" tabindex="-1" role="dialog" aria-labelledby="excel_modal" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-success" id="excel_modal">Impor data penduduk dari excel</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form class="form-horizontal" action="<?= site_url('Excel/impor_penduduk');?>" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group file-area">
                      <label class="title">File <small class="text-danger">*</small></label>
                      <input type="file" id="file-upload" name="FILE_EXCEL">
                      <div class="file-dummy">
                        <div class="default" id="file-upload-filename">Tidak ada file yang dipilih</div>
                      </div>
                      <small class="text-danger">Format file *.xlx, *.xlxs, *.csv dan maksimal file 2 MB.</small>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm" type="button">Impor file</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
            <thead>
              <tr>
                <th>No</th>
                <th>Misc</th>
                <th>No. KK</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>TTL</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($penduduk == FALSE) {
                echo "<tr><td colspan='7'><center>Belum ada data</center></td></tr>";
              }else{
                $no = 1;
                foreach ($penduduk as $key) {
                  ?>
                  <tr>
                    <td><?= $no;?></td>
                    <td>
                      <a href="<?php echo site_url('Penduduk/Ubah-Penduduk/'.$key->ID_PENDUDUK);?>" class="btn btn-datatable btn-icon btn-transparent-dark mr-1"><i class="text-info" data-feather="edit"></i></a>
                      <button class="btn btn-datatable btn-icon btn-transparent-dark mr-1" data-toggle="modal" data-target="#hapus<?= $no;?>"><i class="text-danger" data-feather="trash-2"></i></button>
                      <a href="<?php echo site_url('Penduduk/Detail-Penduduk/'.$key->ID_PENDUDUK);?>" target="_blank" class="btn btn-datatable btn-icon btn-transparent-dark" ><i class="text-warning" data-feather="eye"></i></a>
                    </td>
                    <td><?= $key->KK;?></td>
                    <td><?= $key->NIK;?></td>
                    <td><?= $key->NAMA;?></td>
                    <td><?= $key->JK;?></td>
                    <td><?= $key->TEMPAT_LAHIR;?>, <?= date("d F Y", strtotime($key->TGL_LAHIR));?></td>
                  </tr>

                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapus<?= $no;?>" tabindex="-1" role="dialog" aria-labelledby="hapus_modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-danger" id="hapus_modal">Hapus data surat masuk</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <form class="form-horizontal" action="<?= site_url('Penduduk/hapus');?>" method="post">
                          <input type="hidden" name="NAMA" value="<?= $key->NAMA;?>">
                          <input type="hidden" name="ID_PENDUDUK" value="<?= $key->ID_PENDUDUK;?>">
                          <div class="modal-body">
                            <p>Apakah anda yakin ingin <span class="text-danger">menghapus</span> data penduduk atas nama <b><?= $key->NAMA;?></b>?</p>
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
<script type="text/javascript">

//File name

var input = document.getElementById( 'file-upload' );
var infoArea = document.getElementById( 'file-upload-filename' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {

  // the change event gives us the input it occurred in
  var input = event.srcElement;

  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
  var fileName = input.files[0].name;

  // use fileName however fits your app best, i.e. add it into a div
  infoArea.textContent = 'File name: ' + fileName;
}
</script>
