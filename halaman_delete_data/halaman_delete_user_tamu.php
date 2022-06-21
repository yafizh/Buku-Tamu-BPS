<?php

if (isset($_GET['id'])) {
    require_once "database/koneksi.php";

    $sql = "DELETE FROM tabel_tamu WHERE id=" . $_GET['id'];
    if ($mysqli->query($sql)) {
        $sql = "DELETE FROM tabel_user WHERE id=" . $_GET['id_user'];
        if ($mysqli->query($sql)) {
            echo "<script>alert('Data Tamu Berhasil Dihapus.')</script>";
            echo "<script>" .
                "window.location.href='index.php?page=data_user_tamu';" .
                "</script>";
        } else echo "Error1: " . $sql . "<br>" . $mysqli->error;
    } else echo "Error2: " . $sql . "<br>" . $mysqli->error;
} else
    echo "<script>" .
        "window.location.href='index.php?page=data_tamu';" .
        "</script>";
