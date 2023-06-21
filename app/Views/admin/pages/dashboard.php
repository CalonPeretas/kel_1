<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<style>
    label {
        color: black;
    }
</style>

<style>
    /*the container must be positioned relative:*/

    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 35%;
        right: 10px;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    /*when hovering an item:*/
    .autocomplete-items div:hover {
        background-color: #e9e9e9;
    }

    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
</style>

<div class="container-fluid py-4">
    <div class="row">

        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card text-center">
                <div class="card-header p-3 pt-2 mb-1">
                    <div class="bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 p-3">
                        <i class="text-white" style="margin-top: 0; display:inline-block">Pinjam / Kembali Aset Modal</i>
                    </div>

                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <button class="btn bg-warning text-white" data-bs-toggle="modal" data-bs-target="#modalPinjamBarangModal"><i class="material-icons opacity-10 text-white">input</i> Pinjam</button>
                    <button class="btn bg-success text-white" data-bs-toggle="modal" data-bs-target="#modalKembaliBarangModal"><i class="material-icons opacity-10 text-white">input</i> Kembali</button>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <div class="card text-center">
                <div class="card-header p-3 pt-2 mb-1">
                    <div class="bg-gradient-success shadow-success text-center border-radius-xl mt-n4 p-3">
                        <i class="text-white" style="margin-top: 0; display:inline-block">Ambil Aset</i>
                    </div>

                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <button class="btn bg-danger text-white" data-bs-toggle="modal" data-bs-target="#modalAmbilBarang"><i class="material-icons opacity-10 text-white">input</i> Ambil Aset Habis Pakai</button>

                </div>
            </div>
        </div>

    </div>


    <div class="modal fade" id="modalPinjamBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Pinjam Aset</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('/admin/prosesPinjamBarangModal', ["onSubmit" => 'return cekProsesPinjamBarang()']); ?>
                <input type="hidden" name="pjIdBarang" id="pjIdBarang" style="display: none;">
                <input type="hidden" name="pjIdPinjaman" id="pjIdPinjaman" style="display: none;">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Kode Aset</label>
                            <input type="text" name="pjKodeBarang" id="pjKodeBarang" class="form-control" placeholder="Masukkan Kode Aset">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Nama Aset</label>
                            <input type="text" readonly name="pjNamaBarang" id="pjNamaBarang" class="form-control" placeholder="Auto Load">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Stok Aset</label>
                            <input type="text" readonly name="pjStokBarang" id="pjStokBarang" class="form-control" placeholder="Auto Load">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Satuan</label>
                            <input type="text" readonly name="pjSatuan" id="pjSatuan" class="form-control" placeholder="Auto Load">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline autocomplete">
                            <label for="" class="col-4">Nama Peminjam</label>
                            <input autocomplete="off" type="text" name="namaPeminjam" id="namaPeminjam" class="form-control" placeholder="Masukkan nama peminjam">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline autocomplete">
                            <label for="" class="col-4">Nomor HP</label>
                            <input autocomplete="off" type="number" name="hpPeminjam" id="hpPeminjam" class="form-control" placeholder="Masukkan nomor WA peminjam">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Jumlah Aset</label>
                            <input type="number" name="jumlahBarang" id="jumlahBarang" class="form-control" placeholder="Masukkan jumlah aset yang dipinjam">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Waktu Pinjam</label>
                            <input type="text" name="waktu" id="filter-date-2" autocomplete="off" class="form-control" placeholder="Tanggal dan waktu pinjam">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Keperluan</label>
                            <textarea name="keperluan" id="keperluan" class="form-control" rows="3" placeholder="Masukkan keperluan (Contoh: Pembelajaran, Ekstrakurikuler, Rapat, Dll)"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" id="tombolSimpanPinjamBarang" class="btn bg-gradient-primary">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <div class="modal fade " id="modalKembaliBarangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Kembalikan Aset</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('/admin/prosesKembaliBarangModal', ["onSubmit" => 'return cekProsesKembaliBarang()']); ?>
                <input type="hidden" name="kbIdBarang" id="kbIdBarang" style="display: none;">
                <input type="hidden" name="kbIdPinjaman" id="kbIdPinjaman" style="display: none;">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Kode Aset</label>
                            <input type="text" name="kbKodeBarang" id="kbKodeBarang" class="form-control" placeholder="Masukkan Kode Aset">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Nama Peminjam</label>
                            <select name="kbNamaPeminjam" id="kbNamaPeminjam" class="form-control">
                                <option value="">-- Masukkan kode Aset --</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Nama Aset</label>
                            <input type="text" readonly name="kbNamaBarang" id="kbNamaBarang" class="form-control" placeholder="Auto Load">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Jumlah Dipinjam</label>
                            <input type="text" readonly name="kbJumlahDipinjam" id="kbJumlahDipinjam" class="form-control" placeholder="Auto Load">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Jumlah Aset Kembali</label>
                            <input type="number" name="jumlahBarangKembali" id="jumlahBarangKembali" class="form-control" placeholder="Masukkan jumlah aset yang kembali">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Nama Mengembalikan</label>
                            <input type="text" name="namaKembali" id="namaKembali" class="form-control" placeholder="Masukkan nama yang mengembalikan">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Waktu Kembali</label>
                            <input type="text" name="waktu" id="filter-date" autocomplete="off" class="form-control" placeholder="Tanggal dan waktu kembali">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" id="tombolSimpanKembaliBarang" class="btn bg-gradient-primary">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAmbilBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Ambil Aset Habis Pakai</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('/admin/prosesAmbilBarang', ["onSubmit" => 'return cekProsesAmbilBarang()']); ?>
                <input type="hidden" name="amIdBarang" id="amIdBarang" style="display: none;">
                <input type="hidden" name="amIdAmbil" id="amIdAmbil" style="display: none;">
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Kode Aset</label>
                            <input type="text" name="amKodeBarang" id="amKodeBarang" class="form-control" placeholder="Masukkan Kode aset">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Nama Aset</label>
                            <input type="text" readonly name="amNamaBarang" id="amNamaBarang" class="form-control" placeholder="Auto Load">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Stok Aset</label>
                            <input type="text" readonly name="amStokBarang" id="amStokBarang" class="form-control" placeholder="Auto Load">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Satuan</label>
                            <input type="text" readonly name="amSatuan" id="amSatuan" class="form-control" placeholder="Auto Load">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Nama Pengambil</label>
                            <input type="text" name="namaPengambil" id="namaPengambil" class="form-control" placeholder="Masukkan nama yang mengambil aset">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Jumlah Aset</label>
                            <input type="number" name="amJumlahBarang" id="amJumlahBarang" class="form-control" placeholder="Masukkan jumlah aset yang diambil">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Waktu Ambil</label>
                            <input type="text" name="waktu" id="filter-date-3" autocomplete="off" class="form-control" placeholder="Tanggal dan waktu ambil">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="input-group input-group-outline">
                            <label for="" class="col-4">Keperluan</label>
                            <textarea name="amKeperluan" id="amKeperluan" class="form-control" rows="3" placeholder="Masukkan keperluan (Contoh: Pembelajaran, Ekstrakurikuler, Rapat, Dll)"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" id="tombolSimpanAmbilBarang" class="btn bg-gradient-success">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>


    <div class="row mb-4 mt-2">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Daftar Permintaan Aset</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive mb-5 ms-2 me-4">
                        <table class="table align-items-center">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary font-weight-bolder opacity-7">No</th>
                                    <th class="text-secondary font-weight-bolder opacity-7 ps-2">Kode Aset</th>
                                    <th class="text-secondary font-weight-bolder opacity-7 ps-2">Nama Aset</th>
                                    <th class="text-secondary font-weight-bolder opacity-7 ps-2">Jenis Aset</th>
                                    <th class="text-secondary font-weight-bolder opacity-7 ps-2">Nama Pemesan</th>
                                    <th class="text-center text-secondary font-weight-bolder opacity-7">Jumlah</th>
                                    <th class="text-secondary font-weight-bolder opacity-7 ps-2">Keperluan</th>
                                    <th class="text-secondary font-weight-bolder opacity-7 ps-2">Waktu Pakai</th>
                                    <th class="text-secondary font-weight-bolder opacity-7 ps-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($pesanan) : ?>
                                    <?php $no = 1;
                                    foreach ($pesanan as $ps) : ?>
                                        <tr>
                                            <td class="text-center text-xs">
                                                <?= $no++; ?>
                                            </td>
                                            <td class="text-xs">
                                                <?= $ps->kodeBarang; ?>
                                            </td>
                                            <td class="text-xs">
                                                <?= $ps->namaBarang; ?>
                                            </td>
                                            <td class="text-xs">
                                                <?= ($ps->jenisBarang == '1') ? 'Aset Modal' : 'Habis Pakai'; ?>
                                            </td>
                                            <td class="text-xs">
                                                <?= $ps->nama; ?>
                                            </td>
                                            <td class="align-middle text-center text-xs">
                                                <?= $ps->jumlahBarang; ?>
                                            </td>
                                            <td class="align-middle text-xs">
                                                <?= $ps->kepPesanan; ?>
                                            </td>
                                            <td class="align-middle text-xs">
                                                <?= $ps->tanggalPakai . ' ' . $ps->waktuPakai; ?>
                                            </td>
                                            <td class="text-xs">
                                                <span type="button" class="badge bg-success tmbUbahStatusPesanan" data-id="<?= $ps->idP; ?>" data-nama="<?= $ps->namaBarang; ?>" data-pemesan="<?= $ps->nama; ?>">Tolak</span>

                                                <span data-idp="<?= $ps->idP; ?>" type="button" class="badge bg-danger tbmProsesPesanan">Proses Pesanan</span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="9" class="text-center text-secondary font-weight-bolder opacity-7">
                                            Tidak ada data pesanan
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</div>

<?php
$nama = '';
foreach ($users as $us) {
    $nama .= '"';
    $nama .= $us->nama;
    $nama .= '",';
} ?>
<script>
    /*An array containing all the country names in the world:*/
    var countries = [<?= $nama; ?>];
</script>

<script src="/template/myscript/autocomplate.js"></script>


<?= $this->endSection() ?>