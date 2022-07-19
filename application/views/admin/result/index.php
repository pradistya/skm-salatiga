
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Seluruh <?php echo $title; ?></h4>
        </div>

        <div class="card-body">
            <?php if(!empty($this->session->flashdata('success'))){?>
                <div class="alert alert-success"><?= $this->session->flashdata('success');?></div>
            <?php }?>
            <?php if(!empty($this->session->flashdata('failed'))){?>
                <div class="alert alert-danger"><?= $this->session->flashdata('failed');?></div>
            <?php }?>
            <a href="<?php echo base_url(); ?>laporan?jns=print" class="btn btn-primary btn-sm">
                <svg class="bi" width="1em" height="1em" fill="currentColor">
                    <use
                    xlink:href="<?php echo base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.svg#printer-fill" />
                </svg>
                Print
            </a>
            <a href="<?php echo base_url(); ?>laporan?jns=excel" class="btn btn-warning btn-sm">
                <svg class="bi" width="1em" height="1em" fill="currentColor">
                    <use
                    xlink:href="<?php echo base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.svg#file-earmark-spreadsheet-fill" />
                </svg>
                Ekspor Excel
            </a>
            <br>
            <br>
            <table class="table table-striped table-bordered" id="table1">

                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Lengkap</th>
                        <th>OPD</th>
                        <th>Pelayanan</th>
                        <th>Tanggal</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($peserta as $key) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $key->peserta_nama; ?></td>
                            <td><?php echo $key->opd_nama; ?></td>
                            <td><?php echo $key->layanan_nama; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($key->peserta_date)); ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>result/detail/<?php echo $key->id_peserta; ?>" class="btn btn-sm btn-primary">
                                   <svg class="bi" width="1em" height="1em" fill="currentColor">
                                    <use
                                    xlink:href="<?php echo base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.svg#eye-fill" />
                                </svg> Detail
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Grafik Hasil Survey</h4>
    </div>

    <div class="card-body">
        <div class="row">
            <h5>Grafik Berdasarkan Jawaban</h5>
            <hr>
            <div class="col-md-7 mb-4">
                <canvas id="jawaban" width="100%"></canvas>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <h5>Grafik Berdasarkan Kuisioner</h5>
                    <hr>
                    <?php $no = 1; foreach ($pertanyaan as $key) { ?>

                        <div class="col-sm-6 mb-4">
                            <p><b><?php echo $no++; ?>. <?php echo $key->pertanyaan ?></b></p>
                            <canvas id="myChart<?php echo $key->id_pertanyaan ?>" width="50%" height="300"></canvas> 
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script>
// const ctx = document.getElementById('myChart').getContext('2d');

<?php 
foreach ($pertanyaan as $key) { 
    $kurang = $this->db->query("SELECT COUNT(result_jawaban) AS kurang FROM pertanyaan_result WHERE result_pertanyaan=? AND result_jawaban=?", array($key->id_pertanyaan, "Kurang"))->row();
    $cukup = $this->db->query("SELECT COUNT(result_jawaban) AS cukup FROM pertanyaan_result WHERE result_pertanyaan=? AND result_jawaban=?", array($key->id_pertanyaan, "Cukup"))->row();
    $puas = $this->db->query("SELECT COUNT(result_jawaban) AS puas FROM pertanyaan_result WHERE result_pertanyaan=? AND result_jawaban=?", array($key->id_pertanyaan, "Puas"))->row();
    $sangat = $this->db->query("SELECT COUNT(result_jawaban) AS sangat FROM pertanyaan_result WHERE result_pertanyaan=? AND result_jawaban=?", array($key->id_pertanyaan, "Sangat Puas"))->row();

    ?>


    const data<?php echo $key->id_pertanyaan ?> = {
      labels: [
      'Kurang',
      'Cukup',
      'Puas',
      'Sangat Puas'
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [<?php echo $kurang->kurang; ?>, <?php echo $cukup->cukup; ?>, <?php echo $puas->puas; ?>, <?php echo $sangat->sangat; ?>],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(54, 453, 323)',
        'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
    }]
};

const config<?php echo $key->id_pertanyaan ?> = {
  type: 'pie',
  data: data<?php echo $key->id_pertanyaan ?>,
};
<?php } ?>
<?php foreach ($pertanyaan as $key) { ?>
    const ctx<?php echo $key->id_pertanyaan ?> = new Chart(
     document.getElementById('myChart<?php echo $key->id_pertanyaan ?>').getContext('2d'),
     config<?php echo $key->id_pertanyaan ?>
     );
<?php } ?>

<?php 
$kurangjwb = $this->db->query("SELECT COUNT(result_jawaban) AS kurang FROM pertanyaan_result WHERE result_jawaban=?", array("Kurang"))->row();
$cukupjwb = $this->db->query("SELECT COUNT(result_jawaban) AS cukup FROM pertanyaan_result WHERE result_jawaban=?", array("Cukup"))->row();
$puasjwb = $this->db->query("SELECT COUNT(result_jawaban) AS puas FROM pertanyaan_result WHERE result_jawaban=?", array("Puas"))->row();
$sangatjwb = $this->db->query("SELECT COUNT(result_jawaban) AS sangat FROM pertanyaan_result WHERE result_jawaban=?", array("Sangat Puas"))->row();
?>
const ctx = document.getElementById('jawaban').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Kurang', 'Cukup', 'Puas', 'Sangat Puas'],
        datasets: [{
            label: 'Dipilih Sebanyak',
            data: [<?php echo $kurangjwb->kurang; ?>, <?php echo $cukupjwb->cukup; ?>, <?php echo $puasjwb->puas; ?>, <?php echo $sangatjwb->sangat; ?>],
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>