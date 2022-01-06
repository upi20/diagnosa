<!DOCTYPE html>
<html><head>
    <title>Data Pasien</title>
</head><body>
    <style type="text/css">
        table {
            border-collapse: collapse;
        }
    </style>
    <?php if ($this->input->get('start_date') != '' && $this->input->get('end_date') != '') : ?>
        <h3>DATA PAKET Dari Tanggal <?= $this->input->get('start_date'); ?> - <?= $this->input->get('end_date'); ?></h3>
    <?php elseif($this->input->get('filter') != '') : ?>
        <h3 style="text-transform: uppercase;">DATA PAKET BERDASARKAN FILTER <?= $this->input->get('filter'); ?></h3>
    <?php else: ?>
        <h3>DATA PAKET KESELURUHAN</h3>
    <?php endif; ?>
    <br>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Email Pasien</th>
                <th>Nama Paket</th>
                <th>Status</th>
                <th>Masa Berlaku</th>
                <th>Tanggal Membeli</th>
                <th>Tujuan Pembayaran</th>
                <th>Tanggal Diterima</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($records as $q) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $q['user_nama'] ?></td>
                    <td><?= $q['user_email'] ?></td>
                    <td><?= $q['judul'] ?></td>
                    <td><?= $q['status'] == '' ? 'Belum Dikonfirmasi' : $q['status'] ?></td>
                    <td><?= $q['masa_berlaku'] ?> Hari</td>
                    <td><?= $q['tanggal'] ?></td>
                    <td><?= $q['tujuan_pembayaran']; ?></td>
                    <td><?= $q['tanggal_diterima'] == '' ? 'Belum Dikonfirmasi' : $q['tanggal_diterima'] ?></td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
</body></html>