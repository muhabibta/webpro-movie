<?php
    if (defined("GELANG")===false) {
       die("Anda tidak boleh mengakses halaman ini secara langsung!");
    }
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 fw-bold">List Genre</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="?page=genre_create" type="button" class="btn btn-sm btn-outline-secondary">Tambah Data</a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
    </div>
</div>
<?php
    $sql = "select * from genre where deleted_at is null";
    $result = mysqli_query($koneksi,$sql);
    ?>
<p>This is List Genre page.</p>
<table class="table table-striped">
    <tr>
        <th width="50px" class="text-center">No.</th>
        <th>Name Genre</th>
        <th width="20%">Action</th>
    </tr>
    <?php
        $no=0;
        foreach($result as $res){
            $no++;
            echo '<tr>
            <td class="text-center">'.$no."</td>
            <td>".$res['nama_genre']."</td>
            <td>
            <a href='?page=genre_edit&id_genre=".$res['id_genre']."' class='btn btn-sm btn-info'>Edit</a>
            <a href='?page=genre_delete&id_genre=".$res['id_genre']."' class='btn btn-sm btn-danger'>Hapus</a>
            </td>
            </tr>";
        }
        ?>
</table>