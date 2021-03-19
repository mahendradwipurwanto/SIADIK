<div class="row">
  <div class="col-md-12">
    <div class="card shadow-sm">
      <div class="card-header">
        Tambahkan surat masuk
      </div>
      <form class="form-horizontal" action="<?php echo site_url('Suratmasuk/tambah');?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="title">Nomor Surat <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="NOMOR" placeholder="Masukkan nomor surat" required>
              </div>
              <div class="form-group">
                <label class="title">Tanggal Masuk <small class="text-danger">*</small></label>
                <input type="date" id="date" class="form-control" name="TANGGAL" required>
                <small class="text-muted">Tanggal hari ini <i><?= date("d/m/Y");?></i>, ubah jika perlu.</small>
              </div>
              <div class="form-group file-area">
                <label class="title">File <small class="text-danger">*</small></label>
                <input type="file" id="file-upload" name="FILE">
                <div class="file-dummy">
                  <div class="default" id="file-upload-filename">Tidak ada file yang dipilih</div>
                </div>
                <small class="text-danger">Format file *.JPG, *.PNG, *.PDF, *.DOC, *.DOCX dan maksimal file 2 MB.</small>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="title">Asal Instansi <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="DARI" placeholder="Asal Instansi" required>
              </div>
              <div class="form-group">
                <label class="title">Ditujukan Untuk <small class="text-danger">*</small></label>
                <input type="text" class="form-control" name="TUJUAN" placeholder="Ditujukan kepada" required>
              </div>
              <div class="form-group">
                <label class="title">Perihal <small class="text-danger">*</small></label>
                <textarea type="text" class="form-control" name="KEPERLUAN" rows="3" placeholder="Perihal surat" required></textarea>
                <small class="text-muted">Max 250 kata.</small>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <a href="<?php echo site_url('Surat-Masuk');?>" class="btn btn-sm btn-light">Batal</a>
          <button type="submit" class="btn btn-sm btn-primary">Tambahkan data</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
//Today date
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = yyyy+'-'+mm+'-'+dd;
$('#date').attr('value', today);

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
