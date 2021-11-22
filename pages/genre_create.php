<?php
    if (defined("GELANG")===false) {
       die("Anda tidak boleh mengakses halaman ini secara langsung!");
    }
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 fw-bold">Form Genre</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="?page=genre_list" type="button" class="btn btn-sm btn-outline-secondary">Kembali</a>
          </div>
        </div>
    </div>
    <form action="?page=genre_save" method="POST">
        <div class="mb-3">
            <label for="AddGenre" class="form-label">Nama Genre</label>
            <input type="text" id="AddGenre" name="nama_genre" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>