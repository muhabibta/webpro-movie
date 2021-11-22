<?php
    if (defined("GELANG")===false) {
       die("Anda tidak boleh mengakses halaman ini secara langsung!");
    }

    $data = [
        
        'nama_genre' => clean_data($_POST['nama_genre'])
    ];

    $id_genre = clean_data($_POST['id_genre']);

    # insert into nama_tabel (col1,col2,col3...) values (val1,val2,val3...)
    update_data($koneksi, "genre", $data,$id_genre,"id_genre");

    #redirect
    redirect("?page=genre_list");