<!-- by xeniorita h -->
<?= $this->extend('layout/index'); ?>

<?= $this->section('page-content'); ?>
    <a href="<?= base_url('/siswa')?>" class="btn btn-md btn-secondary">Kembali</a>
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
                        <form action="<?= base_url('siswa/save') ?>" method="post">
                            <div class="form-group">
                                <label for="">NIS</label>
                                <input type="text" class="form-control" value="<?= $inputs['nis'] ?>" name="nis" autofocus>
                            </div><br>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" value="<?= $inputs['nama'] ?>" name="nama">
                            </div><br>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label> &nbsp
                                <input type="radio" name="jk" value="Laki-Laki">Laki-Laki &nbsp&nbsp
                                <input type="radio" name="jk" value="Perempuan">Perempuan
                            </div> <br>
                            <div class="form-group">
                                <label for="">Tempat Tanggal Lahir</label>
                                <input type="date" class="form-control" value="<?= $inputs['ttl'] ?>" name="ttl">
                            </div><br>
                            <div class="from-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" value="<?= $inputs['alamat'] ?>" name="alamat">
                            </div>
                            <div class="from-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="<?= $inputs['email'] ?>" name="email">
                            </div>
                            <div class="from-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" value="<?= $inputs['phone'] ?>" name="phone">
                            </div>
                            <div class="from-group">
                                <label for="">Kelas</label>
                                <select name="kelas_id" class="form-control" >
                                    <?php foreach ($kelas as $row){ ?>

                                        
                                    <option value="<?= $row['id'] ?>"><?= $row['nama'] ?> </option>
                                   <?php  } ?>
                                </select>
                            </div>
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