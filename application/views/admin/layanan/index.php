
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
            <a href="<?php echo base_url(); ?>pelayanan/tambah" class="btn btn-primary">Tambah Data Baru</a>
            <table class="table table-striped table-bordered" id="table1">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Pelayanan</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($layanan as $key) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $key->layanan_nama; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>pelayanan/edit/<?php echo $key->id_layanan; ?>" class="btn btn-sm btn-warning">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor">
                                        <use
                                        xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#pencil-square" />
                                    </svg>
                                </a>

                                <a href="<?php echo base_url(); ?>pelayanan/delete/<?php echo $key->id_layanan; ?>" class="btn btn-sm btn-danger">
                                    <svg class="bi" width="1em" height="1em" fill="currentColor">
                                        <use
                                        xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#trash" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>