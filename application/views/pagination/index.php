<div class="container">
    <h3 class="mt-3">Mahasiswa Pagination</h3>
    <div class="row">
        <div class="col-lg-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword"
                        autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name='cari' value="cari">cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if($this->session->userdata('keyword')): ?>
    <div class="row">
        <div class="col">
            Hasil pencarian <span class="badge badge-info"> <?= $this->session->userdata('keyword'); ?> </span> :
            <b><?= $total_pencarian; ?></b> Data
        </div>
    </div>
    <?php endif; ?>
    <div class="row mt-3">
        <div class="col-md-10">

            <table class="table text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($mahasiswa)):?>
                    <div class="alert alert-danger" role="alert">
                        Data Not Found
                    </div>
                    <?php endif; ?>
                    <?php $i = ++$start;?>
                    <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $mhs["nama"]; ?></td>
                        <td><?= $mhs["email"]; ?></td>
                        <td><?= $mhs["jurusan"]; ?></td>
                        <td>
                            <a href="" class="badge badge-success">detil</a>
                            <a href="" class="badge badge-warning">edit</a>
                            <a href="" class="badge badge-danger">hapus</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <?= $this->pagination->create_links(); ?>

        </div>
    </div>
</div>