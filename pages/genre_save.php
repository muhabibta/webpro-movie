<?php
    if (defined("GELANG")===false) {
       die("Anda tidak boleh mengakses halaman ini secara langsung!");
    }

    $data = [
        'nama_genre' => clean_data($_POST['nama_genre'])
    ];

    # insert into nama_tabel (col1,col2,col3...) values (val1,val2,val3...)
    save_data($koneksi, "genre", $data);

    #redirect
    redirect("?page=genre_list");