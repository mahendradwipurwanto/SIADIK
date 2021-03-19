<style>
table {
  margin-left: 40px;
  margin-right: 40px;
  font-size: 20px;
}
</style>
<!-- <img src="<?php echo $_SERVER["DOCUMENT_ROOT"];?>./s_header.png" width="100%" alt=""> -->
<table cellpadding="1" width="100%">
  <tr>
    <td width="30%"></td>
    <td width="70%"></td>
  </tr>
  <tr>
    <td colspan="2"><center><h2 style="margin-bottom:0px"><u>SURAT KETERANGAN KELAHIRAN</u></h2></center></td>
  </tr>
  <tr>
    <td colspan="2"><p style="margin-top:5px"><center>No. <?= $surat->NOMOR;?></center></p></td>
  </tr>
  <tr>
    <td colspan="2"><p>Yang bertanda tangan di bawah ini, Kepala Desa Mangliawan, Kec. Pakis,<br> Kab. Malang. Menerangkan dengan sebenarnya bahwa :</p></td>
  </tr>
  <tr>
    <td>Nama Bapak</td>
    <td>: <b>Tn.</b><?= $controller->M_cetak->get_data($surat->ID_SURATK, "NAMA_AYAH");?></td>
  </tr>
  <tr>
    <td>Nama Ibu</td>
    <td>: <b>Ny.</b><?= $controller->M_cetak->get_data($surat->ID_SURATK, "NAMA_IBU");?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>: <?= $controller->M_cetak->get_data($surat->ID_SURATK, "ALAMAT");?></td>
  </tr>
  <tr>
    <td>Pada Hari</td>
    <td>: <?= $controller->M_cetak->get_data($surat->ID_SURATK, "HARI");?></td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>: <b><?= $controller->M_cetak->get_data($surat->ID_SURATK, "TANGGAL");?></b></td>
  </tr>
  <tr>
    <td>Jam</td>
    <td>: <b><?= $controller->M_cetak->get_data($surat->ID_SURATK, "JAM");?></b></td>
  </tr>
  <tr>
    <td>Di</td>
    <td>: <b><?= $controller->M_cetak->get_data($surat->ID_SURATK, "DI");?></b></td>
  </tr>
  <tr>
    <td colspan="2"><center><strong><h2>Telah melahirkan anak <?= ($controller->M_cetak->get_data($surat->ID_SURATK, "JK") == "Perempuan" ? '<s>Laki-laki</s> / Perempuan' : 'Laki-laki / <s>Perempuan</s>');?><br>Ke- <?= $controller->M_cetak->get_data($surat->ID_SURATK, "ANAK_KE");?></h2></strong></center></td>
  </tr>
  <tr>
    <td>Diberi Nama :</td>
    <td> <h1><?= $controller->M_cetak->get_data($surat->ID_SURATK, "NAMA_ANAK");?></h1></td>
  </tr>
  <tr>
    <td colspan="2"><p>Surat keterangan ini dibuat atas dasar yang sebenarnya.</p></td>
  </tr>
</table>
<br><br><br><br>
<table cellpadding="1" width="100%">
  <tr>
    <td width="60%"></td>
    <td width="40%"><u>Mangliawan, <?= $surat->TANGGAL;?></u></td>
  </tr>
  <tr>
    <td></td>
    <td>Kepala Desa Mangliawan</td>
  </tr>
  <tr>
    <td colspan="2"><br><br><br></td>
  </tr>
  <tr>
    <td></td>
    <td><b><u>SUPRAPTO</u></b></td>
  </tr>
</table>
