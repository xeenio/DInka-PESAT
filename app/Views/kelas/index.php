<?= $this->extend('layout/index') ?>

<?= $this->section('page-content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            <?php if (!empty(session()->getFlashdata('message'))) : ?>

                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('message'); ?>
                </div>

            <?php endif ?>

            <div class="row">
                <div class="col-10">
                    <h1>Tabel Kelas</h1>
                </div>
                <div class="col-2">
                <a href="<?php echo base_url('kelas/add') ?>" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                </div>
            </div>
            <table class="table table-bordered table-hover table-striped table-responsive  col-12">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kelas as $key => $kelas) : ?>

                        <tr>
                            <td><?php echo $kelas['nama'] ?></td>
                            <td><?php echo $kelas['jumlah'] ?></td>
                            <td><?php echo $kelas['total'] ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url('kelas/edit/' . $kelas['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="<?= base_url('/kelas/hapus/' . $kelas['id'])?>" class="btn btn-danger" onclick="return confirm('Yakin akan dihapus')">Hapus</a>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>;