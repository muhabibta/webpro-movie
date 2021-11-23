<?php
function cek_akses($koneksi, $id_modul, $id_role, $action_modul)
{
    $sql = "select * from modul_role where id_modul=$id_modul and id_role=$id_role and is_$action_modul=1 and deleted_at is null";
    $data_modul_role = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($data_modul_role) == 0) {
        // tidak memiliki hak akses
        return false;
    }
    return true;
}

function save_data($koneksi, $nama_tabel, $data)
{
    $sql = "INSERT INTO " . $nama_tabel . " (";
    $keys = array_keys($data);
    $values = array_values($data);

    $sql .= implode(",", $keys) . ") ";
    $sql .= "VALUES ('" . implode("','", $values) . "')";

    mysqli_query($koneksi, $sql);
}

function update_data($koneksi, $nama_tabel, $data, $id, $primary_key)
{
    // update [nama tabel] set col1=val1, ... where [primary_key]=[id]
    $sql = "UPDATE $nama_tabel SET ";
    $arr_update = [];
    foreach ($data as $k => $v) {
        $arr_update[] = $k . "='" . $v . "'";
    }
    $sql .= implode(",", $arr_update);
    $sql .= " WHERE $primary_key=" . $id;

    mysqli_query($koneksi, $sql);
}

function redirect($page)
{
    echo "<script>
        window.location.replace('$page');
        </script>";
}

function clean_data($data)
{
    $data = addslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}