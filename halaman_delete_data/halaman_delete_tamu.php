<?php

require_once "database/koneksi.php";

if (isset($_GET['id'])) {
    $sql = "DELETE FROM tabel_kunjungan WHERE id=" . $_GET['id'];
} else if (isset($_GET['id_pengajuan'])) {
    $sql = "DELETE FROM tabel_pengajuan WHERE id=" . $_GET['id_pengajuan'];
}

if ($mysqli->query($sql)) {
    echo "<script>alert('Data Tamu Berhasil Dihapus.')</script>";
    echo "<script>" .
        "window.location.href='index.php?page=data_tamu';" .
        "</script>";
} else echo "Error: " . $sql . "<br>" . $mysqli->error;
