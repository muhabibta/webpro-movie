<?php
if (defined("GELANG") === false) {
    die("Anda tidak boleh mengakses halaman ini secara langsung!");
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 fw-bold">List Movie</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="?page=movie_create" type="button" class="btn btn-sm btn-outline-secondary me-1"><ion-icon style="vertical-align: middle;font-size:20px;" name="add-circle-outline"></ion-icon> Tambah Data</a>
        <a href="?page=movie_excel" type="button" class="btn btn-sm btn-outline-secondary me-1"><ion-icon name="document-text-outline"></ion-icon> Export XLSX</a>
        <a href="?page=movie_chart" type="button" class="btn btn-sm btn-outline-secondary me-1"><ion-icon name="stats-chart-outline"></ion-icon> Data Chart</a>
        <a href="?page=movie_pdf" type="button" class="btn btn-sm btn-outline-secondary"><ion-icon name="document-outline"></ion-icon> Export PDF</a>
    </div>
</div>
<?php
$sql = "SELECT m.*,group_concat(g.nama_genre) as genre
FROM `movie_genre` as mg
join movie as m on m.id_movie=mg.id_movie
join genre as g on g.id_genre=mg.id_genre
where mg.deleted_at is null and m.deleted_at is null
group by id_movie";
$result = mysqli_query($koneksi, $sql);
$is_boleh_edit = cek_akses($koneksi, 2, $_SESSION['id_role'], "update");
$is_boleh_hapus = cek_akses($koneksi, 2, $_SESSION['id_role'], "delete");
?>
<p>Daftar film Movie Database</p>
<table class="table table-striped">
    <tr>
        <th width="50px" class="text-center">No.</th>
        <th>Name Movie</th>
        <th>Tahun</th>
        <th>Desripsi</th>
        <th width="22%">Action</th>
    </tr>
    <?php
$no = 0;
foreach ($result as $res) {
    $no++;
    $btn = [];
    $btn[] = "<a href='?page=movie_word&id_movie=" . $res['id_movie'] . "' class='btn btn-sm btn-outline-primary'><ion-icon name='document-text-outline'></ion-icon> Cetak</a>";
    if ($is_boleh_edit == true) {
        $btn[] = "<a href='?page=movie_edit&id_movie=" . $res['id_movie'] . "' class='btn btn-sm btn-outline-info'><ion-icon name='create-outline'></ion-icon> Edit</a>";
    }
    if ($is_boleh_hapus == true) {
        $btn[] = "<a href='?page=movie_delete&id_movie=" . $res['id_movie'] . "' class='btn btn-sm btn-outline-danger'><ion-icon name='remove-circle-outline'></ion-icon> Hapus</a>";
    }

    echo '<tr>
            <td class="text-center">' . $no . "</td>
            <td width='20%'>" . $res['judul_movie'] ."</br>Genre: <strong>".$res['genre']. "</strong></td>
            <td>" . $res['tahun'] . "</td>
            <td>" . $res['deskripsi'] . "</td>
            <td>
                " . implode(" ", $btn) . "
            </td>
            </tr>";
}
?>
</table>