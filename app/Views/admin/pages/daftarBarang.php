<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <?= form_open('admin/hapusSemua', ['onsubmit' => 'return confirm("Yakin akan menghapus data terpilih")']); ?>
    <div class="row">
        <div class="col-lg-2 d-grid gap-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn bg-gradient-success" data-bs-toggle="modal" data-bs-target="#modalTambahBarang">
                Tambah Aset
            </button>
        </div>
        <div class="col-lg-2 d-grid gap-2">
            <button type="submit" class="btn bg-gradient-danger">Hapus Data</button>
        </div>

        <div class="col-lg-2 d-grid gap-2">
            <a href="/admin/dwnBrg" class="btn bg-gradient-info">Unduh Data</a>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Tabel Daftar Aset</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 2%;" class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">No</th>
                                    <th style="width: 1%;" class="ps-2">#</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">Kode Aset</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">Nama Aset</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">Stok</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">Dimiliki</th>
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">Satuan</th>
                                    <th class="text-uppercase text-secondary text-sm opacity-7 ps-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($barang as $brg) : ?>
                                    <tr>
                                        <td class="ps-4 text-xs">
                                            <?= $nomor++; ?>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="hapus[]" value="<?= $brg->id; ?>">
                                        </td>
                                        <td class="text-xs"><?= $brg->kodeBarang; ?></td>
                                        <td class="text-xs"><?= $brg->namaBarang; ?></td>
                                        <td class="text-xs"><?= $brg->stokBarang; ?></td>
                                        <td class="text-xs"><?= $brg->jmlDimiliki; ?></td>
                                        <td class="text-xs"><?= $brg->satuan; ?></td>
                                        <td class="text-xs">
                                            <span type="button" class="badge bg-gradient-warning tombolUbahBarang" data-id="<?= $brg->id; ?>">Tolak</span>
                                            <span type="button" class="badge bg-gradient-warning tombolTolakBarang" data-id="<?= $brg->id; ?>">Tolak</span>
                                            <span type="button" class="badge bg-gradient-danger tombolHapus" data-id="<?= $brg->id; ?>" data-nama="<?= $brg->namaBarang; ?>">Hapus</span>
                                            <span type="button" class="badge bg-gradient-info tombolCetakBarcode" data-id="<?= $brg->id; ?>">Cetak Barcode</span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <?= $pager->links('dataBarang', 'my_pagination') ?>

                </div>



            </div>


        </div>
    </div>
    <?= form_close(); ?>


</div>

<!-- Modal -->
<div class="modal fade" id="modalTambahBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Tambah Data Aset</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <small class="text-info mb-2" id="target2" style="display: inline-block; font-size:9pt"></small>
                <div class="input-group input-group-outline mb-4">
                    <label class="form-label">Kode Aset</label>
                    <input type="text" name="kodeBarang" id="kodeBarang" class="form-control">
                </div>
                <div class="input-group input-group-outline mb-4 target">
                    <label class="form-label">Nama Aset</label>
                    <input type="text" name="namaBarang" id="namaBarang" class="form-control">
                </div>
                <div class="input-group input-group-outline mb-4">
                    <select name="jenisBarang" id="jenisBarang" class="form-control">
                        <option value="">-- Pilih Kategori Aset --</option>
                        <option value="2">Aset Habis Pakai</option>
                        <option value="1">Aset Modal</option>
                    </select>
                </div>
                <div class="input-group input-group-outline mb-4 target">
                    <label class="form-label">Jumlah Aset</label>
                    <input type="number" name="stokBarang" id="stokBarang" class="form-control">
                </div>
                <div class="input-group input-group-outline target">
                    <label class="form-label">Satuan Jumlah</label>
                    <input type="text" name="satuan" id="satuan" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" id="tombolTambahBarang" class="btn bg-gradient-primary">Tambah Data</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalUbahBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Ubah Data Aset</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('admin/ubahDataBarang'); ?>
            <div class="modal-body">
                <input type="hidden" name="idUbahBarang" id="idUbahBarang" style="display: none;">
                <div class="input-group input-group-outline mb-2">
                    <div class="col-sm-4">
                        <label>Kode Aset</label>
                    </div>
                    <input type="text" readonly name="ubahKodeBarang" id="ubahKodeBarang" class="form-control" required>
                </div>
                <div class="input-group input-group-outline mb-2">
                    <div class="col-sm-4">
                        <label>Nama Aset</label>
                    </div>
                    <input type="text" name="ubahNamaBarang" id="ubahNamaBarang" class="form-control" required>
                </div>
                <div class="input-group input-group-outline mb-2">
                    <div class="col-sm-4">
                        <label for="">Jenis Aset</label>
                    </div>
                    <select name="ubahJenisBarang" id="ubahJenisBarang" class="form-control" required>
                        <option value="">-- Pilih Jenis Aset --</option>
                        <option value="2">Aset Habis Pakai</option>
                        <option value="1">Aset Modal</option>
                    </select>
                </div>
                <div class="input-group input-group-outline mb-2">
                    <div class="col-sm-4">
                        <label>Stok Aset</label>
                    </div>
                    <input type="number" name="ubahStokBarang" id="ubahStokBarang" class="form-control" required>
                </div>
                <div class="input-group input-group-outline mb-2">
                    <div class="col-sm-4">
                        <label>Jumlah Dimiliki</label>
                    </div>
                    <input type="number" name="ubahJmlDimiliki" id="ubahJmlDimiliki" class="form-control" required>
                </div>
                <div class="input-group input-group-outline">
                    <div class="col-sm-4">
                        <label>Satuan Jumlah</label>
                    </div>
                    <div class="col-sm-8">

                        <input type="text" name="ubahSatuan" id="ubahSatuan" class="form-control" required>
                        <small class="mb-4" style="font-size: 8pt;">buah, lusin, box, lembar, liter, kg, meter, dll</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" id="tombolUbahBarang" class="btn bg-gradient-primary">Ubah Data</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCetakBarcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Cetak Barcode</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('/admin/printBarcode', 'target="_blank"'); ?>
            <input type="hidden" name="idBarcode" id="idBarcode">
            <div class="modal-body">
                <div>
                    <img id="imgBarcode" src="" alt="">
                </div>
                <br>
                <label for="">Kode Aset :</label>
                <span id="kodeBrg"></span>
                <hr>
                <div class="row">
                    <label for="">Jumlah Cetak</label>
                    <div class="input-group input-group-outline">
                        <input type="number" name="jumlah" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" id="tombolCetakB" class="btn bg-gradient-primary">Cetak</button>
            </div>
            <?= form_close(); ?>

        </div>
    </div>
</div>

<?= $this->endSection() ?>