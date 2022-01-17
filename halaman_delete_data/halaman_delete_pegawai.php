<?php

if (isset($_GET['id'])) {
    require_once "database/koneksi.php";

    $sql = "DELETE FROM tabel_pegawai WHERE id=" . $_GET['id'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Data Pegawai Berhasil Dihapus.')</script>";
        echo "<script>" .
            "window.location.href='index.php?page=data_pegawai';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;    
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_pegawai';" .
        "</script>";