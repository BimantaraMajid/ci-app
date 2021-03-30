<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="card">
                <form action="" method="post">
                    <div class="card-header">
                        <a href="<?= base_url('mahasiswa'); ?>" class="card-link">Kembali</a>

                        <h5 class="card-title">Ubah Data Mahasiswa</h5>
                    </div>
                    <div class="card-body">
                        <!-- <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= validation_errors(); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <?php endif;?> -->


                        <input type="number" name="id" id="id" value="<?= $mahasiswa['id']; ?>" hidden>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?= $mahasiswa["nama"]; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nrp">NRP</label>
                            <input type="number" class="form-control" id="nrp" name="nrp"
                                value="<?= $mahasiswa["nrp"]; ?>">
                            <small class="form-text text-danger"><?= form_error('nrp'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?= $mahasiswa["email"]; ?>">
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" id="jurusan" name="jurusan">
                                <?php foreach ($jurusan as $j) : ?>
                                <?php if ($j == $mahasiswa["jurusan"]): ?>
                                <option value="<?= $j; ?>" selected><?= $j; ?></option>
                                <?php else:?>
                                <option value="<?= $j; ?>"><?= $j; ?></option>
                                <?php endif;?>
                                <?php endforeach;?>
                            </select>
                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary right">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>