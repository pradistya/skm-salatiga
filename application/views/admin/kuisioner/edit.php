
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
                    <form class="form form-vertical" method="post" action="<?= base_url('kuisioner/update');?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Kuisioner</label>
                                        <textarea class="form-control" name="kuisioner"><?php echo $pertanyaan->pertanyaan; ?></textarea>
                                        <input type="hidden" name="id" value="<?php echo $pertanyaan->id_pertanyaan; ?>">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Submit</button>
                                    <a href="<?php echo base_url('kuisioner'); ?>" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
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