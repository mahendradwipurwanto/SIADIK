<div class="row">
  <div class="col-md-12">
    <div class="card shadow-sm">
      <div class="card-header">
        Daftar data penduduk
        <input id="submit" name="submit" type="button" data-toggle="modal" data-target="#all" class="btn btn-danger btn-sm float-right" value="Delete Selected Data(s)" />
      </div>
      <form action="<?php echo site_url('Penduduk/hapus_data_all'); ?>" method="post" enctype="multipart/form-data" >
        <div class="modal fade" id="all" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header modal-header-danger">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus Data Yang Dipilih</h4>
              </div>
              <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data yang terpilih ?</p>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="datatable">
            <table class="table table-stripped table-hover" id="table" width="100%" cellspacing="0"><!-- Modal Excel -->
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
                  <th></th>
                  <th>No</th>
                  <th>Misc</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>TTL</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
var table;
$(document).ready(function() {

  //datatables
  table = $('#table').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    // Load data for the table's content from an Ajax source
    "ajax": {
      "url": "<?php echo site_url('Penduduk/get_data_user')?>",
      "type": "POST"
    },

    //Set column definition initialisation properties.
    "columnDefs": [
      {
        "targets": [ -1 ], //last column
        "orderable": false, //set not orderable
      },
    ],

  });

});

function reload_table(){
  table.ajax.reload(null,false); //reload datatable ajax
}

function delete_person(id){
  if(confirm('Yakin hapus data?'))
  {
    // ajax delete data to database
    $.ajax({
      url : "<?php echo site_url('Penduduk/ajax_delete')?>/"+id,
      type: "POST",
      dataType: "JSON",
      success: function(data)
      {
        //if success reload ajax table
        alert('Success deleting data');
        reload_table();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error deleting data');
      }
    });

  }
}

$(document).ready(function() {
  $("input[name='checkAll']").click(function() {
    var checked = $(this).attr("checked");
    $("#table tr td input:checkbox").attr("checked", checked);
  });
});
$("#checkAll").click(function(){
  $('input:checkbox').not(this).prop('checked', this.checked);
});

</script>
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
