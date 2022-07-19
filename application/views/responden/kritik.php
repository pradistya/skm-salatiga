
<section class="section">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><center>Kritik dan Saran</center></h4>
                </div>

                <div class="card-body">
                    <?php if(!empty($this->session->flashdata('success'))){?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success');?></div>
                    <?php }?>
                    <?php if(!empty($this->session->flashdata('failed'))){?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('failed');?></div>
                    <?php }?>
                    <form class="form form-vertical" method="post" action="<?= base_url('home/kritikstore');?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Silahkan Isi Kritik dan Saran untuk kemajuan layanan Organisasi Pemerintah Daerah Kota Salatiga</label>
                                        <textarea name="kritik" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="<?php echo base_url('kuisioner'); ?>" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                    <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Kirim</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<br class="mt-5">
<br class="mt-5">