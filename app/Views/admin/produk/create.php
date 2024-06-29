<?= $this->extend('admin/layout/default') ?>

<?= $this->section('content') ?>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?= $title; ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tambah Produk
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('produk/simpan'); ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>

                                    <div class="row">
                                        <div class="mb-3 col-6">
                                            <label>Nama Produk</label>
                                            <input type="text" name="nama" class="form-control <?= session('errors.nama') ? 'is-invalid' : ''; ?>" value="<?= old('nama'); ?>">
                                            <?php if (session('errors.nama')){ ?>
                                                <div class="invalid-feedback">
                                                    Harap mengisikan nama produk.
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label>Kategori Produk</label>
                                            <select name="kategori" class="form-control <?= session('errors.kategori') ? 'is-invalid' : ''; ?>">
                                                <option value="">--- Pilih Data ---</option>
                                                <?php foreach($kategori as $k){ ?>
                                                    <option value="<?= $k->slug_kategori; ?>"><?= $k->nama_kategori; ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php if (session('errors.kategori')){ ?>
                                                <div class="invalid-feedback">
                                                    Harap memilih kategori produk.
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>Deskripsi Produk</label>
                                        <textarea name="deskripsi" class="form-control <?= session('errors.deskripsi') ? 'is-invalid' : ''; ?>"><?= old('deskripsi'); ?></textarea>
                                        <?php if (session('errors.deskripsi')){ ?>
                                                <div class="invalid-feedback">
                                                    Harap mengisikan deskripsi produk.
                                                </div>
                                            <?php } ?>
                                    </div>
                                    <div class="mb-3">
                                        <label>Gambar Produk</label>
                                        <input type="file" name="gambar" class="form-control" value="<?= old('gambar'); ?>">
                                    </div>
                                    <div class="justify-content-end d-flex">
                                        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
<?= $this->endSection(); ?>