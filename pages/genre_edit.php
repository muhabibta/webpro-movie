<?php
    if (defined("GELANG")===false) {
       die("Anda tidak boleh mengakses halaman ini secara langsung!");
    }
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 fw-bold">Form Edit Genre</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="?page=genre_list" type="button" class="btn btn-sm btn-outline-secondary">Kembali</a>
          </div>
        </div>
    </div>
    <?php
    $id_genre = clean_data($_GET['id_genre']);
    $sql = "select * from genre where id_genre=".$id_genre;
    $result = mysqli_query($koneksi,$sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <form action="?page=genre_update" method="POST">
        <input type="hidden" name="id_genre" value="<?= $row['id_genre'];?>"/>
        <div class="mb-3">
            <label for="AddGenre" class="form-label">Nama Genre</label>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control"  value="<?= $row['nama_genre'];?>" name="nama_genre"  aria-describedby="button-addon2">
          <button class="btn btn-outline-success" type="submit" id="button-addon2">Update Data</button>
        </div>
    </form>