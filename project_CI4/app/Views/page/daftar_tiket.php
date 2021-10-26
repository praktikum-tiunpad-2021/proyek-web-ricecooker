<?= $this->extend('layout/template'); ?>
<?= $this->section('isi'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Data Pemesanan Tiket Pesawat Terbang</h1>
            <table>
                <tr>
                    <td>
                        <a id="pesanbtn" href="/tambah_tiket">Pesan Tiket</a>
                    </td>
                </tr>
            </table>
            <br>
            <table border="1" cellspacing="0" cellpadding="8" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>Nomor Tiket</th>
                        <th>Nomor Kursi</th>
                        <th>Jam Terbang</th>
                        <th>Nama</th>
                        <th>Nomor ID</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Nomor Maskapai</th>
                        <th>Nama Maskapai</th>
                        <th>Jenis Pesawat</th>
                        <th>Nomor Rute</th>
                        <th>Asal</th>
                        <th>Tujuan</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tiket as $row) :  ?>
                        <tr>
                            <td>
                                <a href="/pages/ubah_data/<?= $row['nomor_tiket']; ?>" id="ubahbtn">Ubah Data</a>
                                <br>
                                <br>
                                <a href="/pages/hapus_tiket/<?= $row['nomor_id']; ?>" onclick="return confirm(
                        'Apakah Anda yakin ingin menghapus data ini?')" id="hapusbtn">Hapus Data</a>
                            </td>
                            <td width="2"><?php echo $row["nomor_tiket"]; ?></td>
                            <td width="2"><?php echo $row["nomor_kursi"]; ?></td>
                            <td width="2"><?php echo $row["jamterbang"]; ?></td>
                            <td><?php echo $row["nama_penumpang"]; ?></td>
                            <td><?php echo $row["nomor_id"]; ?></td>
                            <td width="2"><?php echo $row["jk"]; ?></td>
                            <td><?php echo $row["alamat"]; ?></td>
                            <td><?php echo $row["notelp"]; ?></td>
                            <td><?php echo $row["kode_maskapai"]; ?></td>
                            <td><?php echo $row["nama_maskapai"]; ?></td>
                            <td><?php echo $row["jenis_pesawat"]; ?></td>
                            <td><?php echo $row["nomor_rute"]; ?></td>
                            <td width="2"><?php echo $row["asal"]; ?></td>
                            <td><?php echo $row["tujuan"]; ?></td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>