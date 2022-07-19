
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
            <a href="<?php echo base_url(); ?>users/tambah" class="btn btn-primary">Tambah Data Baru</a>
            <table class="table table-striped table-bordered" id="table1">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($user as $key) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $key->user_nama; ?></td>
                            <td><?php echo $key->user_username; ?></td>
                            <td>
                                <?php if ($this->session->userdata('id') != $key->id_user) { ?>
                                    <a href="<?php echo base_url(); ?>users/edit/<?php echo $key->id_user; ?>" class="btn btn-sm btn-warning">
                                        <svg class="bi" width="1em" height="1em" fill="currentColor">
                                            <use
                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#pencil-square" />
                                        </svg>
                                    </a>

                                    <a href="<?php echo base_url(); ?>users/delete/<?php echo $key->id_user; ?>" class="btn btn-sm btn-danger">
                                        <svg class="bi" width="1em" height="1em" fill="currentColor">
                                            <use
                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#trash" />
                                        </svg>
                                    </a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>