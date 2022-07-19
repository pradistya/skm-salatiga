
<section class="section">
    <div class="row">
        <div class="col-md-12 mx-auto mt-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><center>Grafik Hasil Survey</center></h4>
                </div>

                <div class="card-body">
                    <?php if(!empty($this->session->flashdata('success'))){?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success');?></div>
                    <?php }?>
                    <?php if(!empty($this->session->flashdata('failed'))){?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('failed');?></div>
                    <?php }?>
                    
                    <div class="form-body">
                        <div class="row">

                            <?php $no = 1; foreach ($pertanyaan as $key) { ?>
                                <div class="col-12">
                                    <h5><?php echo $no++; ?>. <?php echo $key->pertanyaan ?></h5>
                                    <div class="row mt-3 mb-3">
                                        <div class="col-md-4">
                                            <canvas id="myChart<?php echo $key->id_pertanyaan ?>" width="400" height="400"></canvas>  
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="col-12 d-flex justify-content-end">
                                <a href="<?php echo base_url('home/selesai'); ?>" class="btn btn-light-secondary me-1 mb-1">Selesai</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<br class="mt-5">
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

</script>
