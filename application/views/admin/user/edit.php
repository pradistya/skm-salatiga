
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
                    <?php if(!empty($this->session->flashdata('success'))){?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success');?></div>
                    <?php }?>
                    <form class="form form-vertical" method="post" action="<?= base_url('users/update');?>">
                        <div class="form-body">
                            <div class="row">
                                 <div class="col-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" value="<?php echo $user->user_nama; ?>">
                                        <input type="hidden" name="id" value="<?php echo $user->id_user; ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Masukkan username" value="<?php echo $user->user_username; ?>">
                                        <small class="text-muted">Jangan ada spasi!</small>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                                        <small class="text-muted">Kosongkan apabila tidak ingin diganti</small>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit"
                                    class="btn btn-primary me-1 mb-1">Submit</button>
                                    <a href="<?php echo base_url('users'); ?>" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
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