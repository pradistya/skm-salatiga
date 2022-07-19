
<div class="page-heading">
    <!-- <h3>Horizontal Layout</h3> -->
</div>
<div class="page-content">
    <section class="row">
       <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <!-- <img class="card-img img-fluid" src="assets/images/samples/origami.jpg" alt="Card image cap" style="height: 20rem" /> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="card-img img-fluid" src="<?= base_url('assets/home.svg');?>" alt="Card image cap" style="height: 20rem" />
                        </div>
                        <div class="col-md-6">
                            <br class="mb-5">
                            <?php if(!empty($this->session->flashdata('failed'))){?>
                                <div class="alert alert-danger"><?= $this->session->flashdata('failed');?></div>
                            <?php }?>
                            <h3 class="text-center mt-4">Sistem Informasi <br> Survey Kepuasaan Masyarakat</h3>
                            <h3 class="text-center"> Kota Salatiga </h3>
                            <br>
                            <center>
                                <a href="<?php echo base_url('home/datadiri') ?>" class="btn btn-primary block">Ikuti Survey</a>
                            </center>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<br>

