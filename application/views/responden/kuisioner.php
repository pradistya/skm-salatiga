
<section class="section">
    <div class="row">
        <div class="col-md-9 mx-auto mt-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><center>Silahkan Isi Kuisioner Dibawah</center></h4>
                </div>

                <div class="card-body">
                    <?php if(!empty($this->session->flashdata('success'))){?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success');?></div>
                    <?php }?>
                    <?php if(!empty($this->session->flashdata('failed'))){?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('failed');?></div>
                    <?php }?>
                    <form class="form form-vertical" method="post" action="<?= base_url('home/kuisionerstore');?>">
                        <div class="form-body">
                            <div class="row">

                                <?php $no = 1; foreach ($pertanyaan as $key) { ?>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label><?php echo $no++; ?>. <?php echo $key->pertanyaan ?></label>

                                            <input class="form-control" type="hidden" name="id[]" value="<?php echo $key->id_pertanyaan ?>">

                                            <div class="row mt-3 mb-4">
                                                <div class="col-sm-3">
                                                 <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pilihan[<?php echo $key->id_pertanyaan ?>]"
                                                    id="radio" value="Kurang">
                                                    <label class="form-check-label" for="radio">
                                                        Kurang
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                             <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pilihan[<?php echo $key->id_pertanyaan ?>]"
                                                id="radio" value="Cukup">
                                                <label class="form-check-label" for="radio">
                                                    Cukup
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                         <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pilihan[<?php echo $key->id_pertanyaan ?>]"
                                            id="radio" value="Puas">
                                            <label class="form-check-label" for="radio">
                                                Puas
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                     <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilihan[<?php echo $key->id_pertanyaan ?>]"
                                        id="radio" value="Sangat Puas">
                                        <label class="form-check-label" for="radio">
                                            Sangat Puas
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-12 d-flex justify-content-end">
                    <a href="<?php echo base_url('home/datadiri'); ?>" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                    <button type="submit"
                    class="btn btn-primary me-1 mb-1">Selanjutnya</button>
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