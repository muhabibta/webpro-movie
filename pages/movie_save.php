<?php
    if (defined("GELANG")===false) {
       die("Anda tidak boleh mengakses halaman ini secara langsung!");
    }

    $now = date("Y-m-d H:i:s");
    $data = [
        'judul_movie' => clean_data($_POST['judul_movie']),
        'tahun' => clean_data($_POST['tahun']),
        'deskripsi' => clean_data($_POST['deskripsi']),
        'created_at' => $now,
        'updated_at' => $now
    ];

    # array genre
    $genre = $_POST['genre'];
    
    # insert into nama_tabel (col1,col2,col3...) values (val1,val2,val3...)
    save_data($koneksi, "movie", $data);
    $id_movie = get_last_id($koneksi);

    // Add to movie_genre
    foreach ($genre as $id_genre) {
        $dataa = [
            'id_movie' => $id_movie,
            'id_genre' => $id_genre,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        save_data($koneksi, "movie_genre", $dataa);
    }


    #redirect
    redirect("?page=movie_list");