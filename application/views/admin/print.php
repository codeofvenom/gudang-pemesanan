<html>
<head>
	<title>Cetak PDF</title>
</head>
<body>

<h1 style="text-align: center;">Data Mahasiswa</h1>

<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
</style>

<table border="1" align="center">
<tr>
	<th>No</th>
	<th>NIS</th>
	<th>Nama</th>
	<th>Jenis Kelamin</th>
	<th>Telepon</th>
	<th>Alamat</th>
</tr>
<?php
if (!empty($persediaan)) {
    $no = 1;
    foreach ($persediaan as $data) {
        echo '<tr>';
        echo '<td>'.$no.'</td>';
        echo '<td>'.$data->nis.'</td>';
        echo '<td>'.$data->nama_barang.'</td>';
        echo '<td>'.$data->jumlah.'</td>';

        ++$no;
    }
}
?>
</table>

</body>
</html>
