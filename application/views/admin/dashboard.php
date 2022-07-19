 <section class="row">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Jumlah Responden</h6>
                                <h6 class="font-extrabold mb-0"><?php echo $responden; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Jumlah OPD</h6>
                                <h6 class="font-extrabold mb-0"><?php echo $odp; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="iconly-boldAdd-User"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Jumlah Pertanyaan</h6>
                                <h6 class="font-extrabold mb-0"><?php echo $pertanyaan; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Survey</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="jawaban" width="100%"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Grafik Survey</h4>
        </div>

        <div class="card-body">

        </div>
    </div>
</section> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script type="text/javascript">
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