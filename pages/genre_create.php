<?php
    if (defined("GELANG")===false) {
       die("Anda tidak boleh mengakses halaman ini secara langsung!");
    }
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 fw-bold">Form Genre</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="?page=genre_list" type="button" class="btn btn-sm btn-outline-secondary"><ion-icon style="vertical-align:middle; font-size:16px;" name="chevron-back-outline"></ion-icon> Kembali</a>
          </div>
        </div>
    </div>
    <form action="?page=genre_save" method="POST">
        <div class="mb-3">
            <label for="AddGenre" class="form-label">Nama Genre</label>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control"  name="nama_genre"  aria-describedby="button-addon2">
          <button class="btn btn-outline-primary" type="submit" id="button-addon2">Simpan Data</button>
        </div>
    </form>