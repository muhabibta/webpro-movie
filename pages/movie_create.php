<?php
    if (defined("GELANG")===false) {
       die("Anda tidak boleh mengakses halaman ini secara langsung!");
    }
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 fw-bold">Form Movie</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="?page=movie_list" type="button" class="btn btn-sm btn-outline-secondary">Kembali</a>
        </div>
    </div>
</div>
<?php
    $sql = "select * from genre where deleted_at is null";
    $genre = mysqli_query($koneksi,$sql);
?>
<form action="?page=movie_save" method="POST">
    <div class="mb-3">
        <label for="AddJudul" class="form-label">Judul Movie</label>
        <input type="text" id="AddJudul" name="judul_movie" class="form-control">
    </div>
    <div class="mb-3">
        <label for="AddTahun" class="form-label">Tahun</label>
        <input type="text" id="AddTahun" name="tahun" class="form-control">
    </div>
    <div class="mb-3">
        <label for="AddDesk" class="form-label">Deskripsi</label>
        <textarea id="AddDesk" name="deskripsi" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="AddGenre" class="form-label">Genre(s)</label></br>
        <?php
        while($row = mysqli_fetch_assoc($genre))
        {
            echo"<input type='checkbox' name='genre[]' value='".$row['id_genre']."'/>".$row['nama_genre']."</br>";
        }
        ?>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Data</button>
</form>