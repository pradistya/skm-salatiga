<?php
if($this->input->get('jns') == 'print'){
  echo '<script>window.print();</script>';
}elseif($this->input->get('jns') == 'excel'){
  header("Pragma: public");
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
  header("Content-type:application/vnd.ms-excel");
  header("Content-disposition:attachment;filename=laporan_survey_".date('Y-m-d').".xls");
  header("Content-transfer-Encoding: binary ");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <?php
  if($this->input->get('jns') == 'print'){?>
    <style>
      #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      #customers td,
      #customers th {
        border: 1px solid #333;
        padding: 8px;
      }

      #customers tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      #customers tr:hover {
        background-color: #ddd;
      }

      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        color: #333;
      }
    </style>
  <?php }?>
</head>

<body>
  <center>
    <h3>Laporan Hasil Survey <br> Kepuasan Masyarakat Kota Salatiga</h3>
  </center>
  <?php echo date('d/m/Y'); ?>
  <table id="customers">
    <tr>
      <th>No</th>
      <th>Nama Lengkap</th>
      <th>Jk</th>
      <th>Pekerjaan</th>
      <th>No.HP</th>
      <th>OPD</th>
      <th>Pelayanan</th>
      <th>Tanggal</th>
      <th>Hasil</th>
    </tr>
    <?php $no=1; foreach ($peserta as $key) { ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $key->peserta_nama; ?></td>
        <td><?php echo $key->peserta_jk; ?></td>
        <td><?php echo $key->peserta_pekerjaan; ?></td>
        <td><?php echo $key->peserta_hp; ?></td>
        <td><?php echo $key->opd_nama; ?></td>
        <td><?php echo $key->layanan_nama; ?></td>
        <td><?php echo date('d/m/Y', strtotime($key->peserta_date)); ?></td>
        <td>
          <table id="customers">
            <?php 
            $i =1;
            $pertanyaan = $this->db->query("SELECT * FROM pertanyaan LEFT JOIN pertanyaan_result ON pertanyaan.id_pertanyaan=pertanyaan_result.result_pertanyaan WHERE pertanyaan_result.result_peserta=? AND pertanyaan_result.result_code=?", array($key->id_peserta, $key->peserta_code))->result();
            $kritik =  $this->db->query("SELECT kritik FROM kritik WHERE kritik_code=?", array($key->peserta_code))->row();
            foreach ($pertanyaan as $arr) { 

              ?>
              <tr>
                <td><p><b><?php echo $i++; ?></b>. <?php echo $arr->pertanyaan ?></p></td>
                <td><b>Jawaban: </b> <?php echo $arr->result_jawaban; ?></td>
                <td><b>Kritik & Saran: </b><?php echo $kritik->kritik; ?></td>
              </tr>
            <?php } ?>
          </table>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>