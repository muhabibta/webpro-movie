<?php
    if (defined("GELANG")===false) {
       die("Anda tidak boleh mengakses halaman ini secara langsung!");
    }
    $id_movie = $_GET['id_movie'];
    $sql = "SELECT m.*,group_concat(g.nama_genre) as genre
    FROM `movie_genre` as mg
    join movie as m on m.id_movie=mg.id_movie
    join genre as g on g.id_genre=mg.id_genre
    where m.id_movie=$id_movie and mg.deleted_at is null and m.deleted_at is null";
    $result = mysqli_query($koneksi,$sql);
    $row = mysqli_fetch_assoc($result);

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 fw-bold">Form Movie</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="?page=movie_list" type="button" class="btn btn-sm btn-outline-secondary"><ion-icon style="vertical-align:middle; font-size:16px;" name="chevron-back-outline"></ion-icon> Kembali</a>
        </div>
    </div>
</div>
<?php
    $sql = "select * from genre where deleted_at is null";
    $genre = mysqli_query($koneksi,$sql);
?>
<form action="?page=movie_save" method="POST">
<input type="hidden" name="id_genre" value="<?= $row['id_movie'];?>"/>
    <div class="mb-3">
        <label for="AddJudul" class="form-label">Judul Movie</label>
        <input type="text" id="AddJudul" value="<?= $row['judul_movie'];?>" name="judul_movie" class="form-control">
    </div>
    <div class="mb-3">
        <label for="AddTahun" class="form-label">Tahun</label>
        <input type="text" id="AddTahun" value="<?= $row['tahun'];?>" name="tahun" class="form-control">
    </div>
    <div class="mb-3">
        <label for="AddDesk" class="form-label">Deskripsi</label>
        <textarea id="AddDesk" name="deskripsi" class="form-control"><?= $row['deskripsi'];?></textarea>
    </div>
    <div class="mb-3">
        <?php
        $genres=explode(",",$row['genre']);
        ?>
        <label for="AddGenre" class="form-label">Genre(s)</label></br>
        <?php
        while($row = mysqli_fetch_assoc($genre)):?>
        <?php $nama_genre = $row['nama_genre'] ?>
            <input type="checkbox" name="genre[]" <?php echo (in_array($nama_genre,$genres)) ? 'checked="checked"' : '';?> value="<?=$row['id_genre']?>"/><?=$row['nama_genre']?></br>
        
        <?php endwhile?>
    </div>
    <button type="submit" class="btn btn-outline-primary">Simpan Data</button>
</form>