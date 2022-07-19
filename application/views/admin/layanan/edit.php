
<section class="section">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form <?php echo $title; ?></h4>
                </div>

                <div class="card-body">
                    <?php if(!empty($this->session->flashdata('failed'))){?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('failed');?></div>
                    <?php }?>
                    <form class="form form-vertical" method="post" action="<?= base_url('pelayanan/update');?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Nama Pelayanan</label>
                                        <input type="text" id="first-name-vertical"
                                        class="form-control" name="layanan"
                                        placeholder="Masukkan nama Pelayanan" value="<?php echo $layanan->layanan_nama; ?>">
                                        <input type="hidden" name="id" value="<?php echo $layanan->id_layanan; ?>">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Submit</button>
                                    <a href="<?php echo base_url('pelayanan'); ?>" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
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