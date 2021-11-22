<?php
    if (defined("GELANG")===false) {
       die("Anda tidak boleh mengakses halaman ini secara langsung!");
    }

    $id_genre = ($_GET['id_genre']);
    $data = [
        'deleted_at' => date("Y-m-d H:i:s")
    ];

    # insert into nama_tabel (col1,col2,col3...) values (val1,val2,val3...)
    update_data($koneksi, "genre", $data,$id_genre,"id_genre");

    #redirect
    redirect("?page=genre_list");