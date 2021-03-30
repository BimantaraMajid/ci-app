<div class="container">
    <?php if ($this->session->flashdata('mahasiswa')) :?>
    <div class="row mt-3">
        <div class="col-lg-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('mahasiswa'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
        </div>
    </div>
    <?php endif;?>
    <!-- <?= var_dump($this->session->flashdata()); ?>
    <?= var_dump($this->session->userdata()); ?> -->
    <div class="row mt-3">
        <div class="col-lg-6">
            <a type="button" class="btn btn-primary tombolTambahData" href="<?= base_url('mahasiswa/tambah'); ?>">
                Tambah Data Mahasiswa
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Mahasiswa</h3>
            <?php if( empty($mahasiswa)) :?>
            <div class="alert alert-danger" role='alert'>
                Data Mahasiswa tidak ditemukan
            </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($mahasiswa as $mhs) : ?>
                <li class="list-group-item"><?= $mhs["nama"]; ?>
                    <div class="float-right">
                        <a class="badge badge-primary"
                            href="<?= base_url('mahasiswa/detail/'); ?><?= $mhs['id']; ?>">Detail</a>
                        <a class="badge badge-warning"
                            href="<?= base_url('mahasiswa/ubah/'); ?><?= $mhs['id']; ?>" >Ubah</a>
                        <a class="badge badge-danger"
                            onclick="return confirm('yakin menghapus data dengan nama (<?= strtoupper($mhs['nama']); ?>)?');"
                            href="<?= base_url('mahasiswa/hapus/'); ?><?= $mhs['id']; ?>">Hapus</a>
                    </div>
                </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>