
<section class="section">
    <div class="row">
        <div class="col-md-8 mx-auto mt-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><center>Silahkan Isi Data Diri</center></h4>
                </div>

                <div class="card-body">
                    <?php if(!empty($this->session->flashdata('success'))){?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success');?></div>
                    <?php }?>
                    <?php if(!empty($this->session->flashdata('failed'))){?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('failed');?></div>
                    <?php }?>
                    <form class="form form-vertical" method="post" action="<?= base_url('home/storediri');?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" <?php if ($datadiri != "") { echo 'value="'.$datadiri['nama'].'"'; }?> >
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                               <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk"
                                                id="radio" value="Laki-Laki" <?php if ($datadiri != "") { if ($datadiri['jk'] == "Laki-Laki") { echo "checked"; } }?>>
                                                <label class="form-check-label" for="radio">
                                                    Laki-Laki
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                           <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jk"
                                            id="radio" value="Perempuan" <?php if ($datadiri != "") { if ($datadiri['jk'] == "Perempuan") { echo "checked"; } }?>>
                                            <label class="form-check-label" for="radio">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control" placeholder="Masukkan pekerjaan" <?php if ($datadiri != "") { echo 'value="'.$datadiri['pekerjaan'].'"'; }?>>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="pendidikan">
                                        <option>- Pilih Salah Satu -</option>
                                        <option <?php if ($datadiri != "") { if ($datadiri['pendidikan'] == "SD/MI") { echo "selected"; } }?> value="SD/MI">SD / MI</option>
                                        <option <?php if ($datadiri != "") { if ($datadiri['pendidikan'] == "SMP/MTs/Sederajat") { echo "selected"; } }?> value="SMP/MTs/Sederajat">SMP / MTs / Sederajat</option>
                                        <option <?php if ($datadiri != "") { if ($datadiri['pendidikan'] == "SMA/SMK/MA/Sederajat") { echo "selected"; } }?> value="SMA/SMK/MA/Sederajat">SMA / SMK / MA / Sederajat</option>
                                        <option <?php if ($datadiri != "") { if ($datadiri['pendidikan'] == "D-1/D-3") { echo "selected"; } }?> value="D-1/D-3">D-1 / D-3</option>
                                        <option <?php if ($datadiri != "") { if ($datadiri['pendidikan'] == "D-4/S-1") { echo "selected"; } }?> value="D-4/S-1">D-4 / S-1</option>
                                        <option <?php if ($datadiri != "") { if ($datadiri['pendidikan'] == "S2") { echo "selected"; } }?> value="S2">S2</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Alamat</label>
                                <textarea class="form-control" name="alamat"><?php if ($datadiri != "") { echo $datadiri['alamat']; }?></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="number" name="nohp" class="form-control" placeholder="Masukkan nomor telepon" <?php if ($datadiri != "") { echo 'value="'.$datadiri['nohp'].'"'; }?>>
                            </div>
                        </div>

                        <h5 class="card-text mt-3 mb-3"><center>Silahkan Pilih Organisasi Pemerintahan dan Pelayanan terkait</center></h5>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Pilih OPD</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="opd">
                                     <option value="" disabled selected>- Pilih OPD -</option>
                                     <?php 
                                     foreach($odp as $d){
                                        // if ($d->id_odp == 1) {
                                        //     continue;
                                        // }
                                        ?>
                                        <option <?php if ($datadiri != "") { if ($datadiri['opd'] == $d->id_opd) { echo "selected"; } }?> value="<?= $d->id_opd;?>"><?= $d->opd_nama;?></option>
                                    <?php }?>
                                </select>
                            </fieldset>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Pilih Pelayanan</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="basicSelect" name="layanan">
                                    <option value="" disabled selected>- Pilih Pelayanan -</option>
                                    <?php 
                                    foreach($layanan as $k){
                                        // if ($d->id_odp == 1) {
                                        //     continue;
                                        // }
                                        ?>
                                        <option <?php if ($datadiri != "") { if ($datadiri['layanan'] == $k->id_layanan) { echo "selected"; } }?> value="<?= $k->id_layanan;?>"><?= $k->layanan_nama;?></option>
                                    <?php }?>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <a href="<?php echo base_url('home'); ?>" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
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