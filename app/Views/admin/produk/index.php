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
                                Produk
                            </div>
                            <div class="card-body">
                                <a href="<?= base_url('produk/tambah'); ?>" class="btn btn-success btn-sm mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Slug</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($daftar_produk as $produk){ ?>
                                        <tr>
                                            <td class="text-center"><?= $i; ?></td>
                                            <td><?= $produk->nama_produk; ?></td>
                                            <td><?= $produk->slug_produk; ?></td>
                                            <td><?= date('d M Y H:i:s', strtotime($produk->tanggal_input)); ?></td>
                                            <td>
                                                <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ubahModal<?= $i; ?>"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $i; ?>"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <!-- Modal Ubah -->
                                        <div class="modal fade" id="ubahModal<?= $i; ?>" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary text-white">
                                                        <h1 class="modal-title fs-5" id="ubahModalLabel">Ubah Produk</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('produk/ubah/'.$produk->id_produk); ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="kategori_slug">Kategori Slug</label>
                                                                <input type="text" name="kategori_slug" class="form-control" value="<?= $produk->kategori_slug; ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama">Nama Produk</label>
                                                                <input type="text" name="nama" class="form-control" value="<?= $produk->nama_produk; ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi">Deskripsi Produk</label>
                                                                <textarea name="deskripsi" class="form-control" required><?= $produk->deskripsi; ?></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="gambar">Gambar Produk</label>
                                                                <input type="text" name="gambar" class="form-control" value="<?= $produk->gambar_produk; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapusModal<?= $i; ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h1 class="modal-title fs-5" id="hapusModalLabel">Hapus Produk</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('produk/hapus/'.$produk->id_produk); ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <p>Data produk <b><?= $produk->nama_produk; ?></b> akan dihapus, yakin ingin memproses?</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Tambah -->
                    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('produk/tambah'); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="kategori_slug">Kategori Slug</label>
                                            <input type="text" name="kategori_slug" class="form-control" placeholder="Ketikkan kategori slug" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama">Nama Produk</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Ketikkan nama produk" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="deskripsi">Deskripsi Produk</label>
                                            <textarea name="deskripsi" class="form-control" placeholder="Ketikkan deskripsi produk" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gambar">Gambar Produk</label>
                                            <input type="text" name="gambar" class="form-control" placeholder="Berikan gambar produk" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
<?= $this->endSection(); ?>