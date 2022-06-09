<!-- by xeniorita h -->
<?= $this->extend('layout/index'); ?>

<?= $this->section('page-content'); ?>
    <a href="<?= base_url('/mapel')?>" class="btn btn-md btn-secondary">Kembali</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                <?php
                    $inputs = session()->getFlashdata('inputs');
                    $errors = session()->getFlashdata('errors');
                    if(!empty($errors)){ ?>
                        <div class='alert alert-danger'>
                            Ada kesalahan saat Input Data, yaitu :
                            <ul>
                            <?php foreach($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                <?php } ?>
                        <form action="<?= base_url('mapel/save') ?>" method="post">
                            <div class="form-group">
                                <label for="">Mata Pelajaran</label>
                                <input type="text" class="form-control" value="<?= $inputs['mapel'] ?>" name="mapel">
                            </div><br>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <input type="text" class="form-control" value="<?= $inputs['kelas'] ?>" name="kelas">
                            </div><br>
                            <div class="form-group mt-3">
                                <input type="reset" class="btn btn-warning">
                                <input type="submit" class="btn btn-primary" value="Simpan" name="save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

<?= $this->endSection('content'); ?>