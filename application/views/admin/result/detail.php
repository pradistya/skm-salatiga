
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?php echo $title; ?></h4>
        </div>

        <div class="card-body">
            <a href="<?php echo base_url(); ?>result" class="btn btn-warning mb-3 btn-sm">Kembali</a>
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td><b>Detail Diri Peserta</b></td>
                        </tr>
                        <tr>
                            <td><?php echo $peserta->peserta_nama; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $peserta->peserta_jk; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $peserta->peserta_pekerjaan; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $peserta->peserta_alamat; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $peserta->peserta_hp; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $peserta->opd_nama; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $peserta->layanan_nama; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo date('d/m/Y H:i', strtotime($peserta->peserta_date)); ?></td>
                        </tr>
                    </table>

                    <table class="table table-striped table-bordered">
                        <tr>
                            <td><b>Kritik dan Saran</b></td>
                        </tr>
                        <tr>
                            <td><?php echo $kritik->kritik; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-8">
                    <?php $no = 1; foreach ($pertanyaan as $key) { ?>
                        <div class="col-12">
                            <p><b><?php echo $no++; ?></b>. <?php echo $key->pertanyaan ?></p>
                            <p><b>Jawaban: </b> <?php echo $key->result_jawaban; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>