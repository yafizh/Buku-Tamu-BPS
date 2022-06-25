<style>
    .card:hover {
        background-color: #E4EAEC;
        cursor: pointer;
        color: black;
    }
</style>
<?php
require_once "database/koneksi.php";
if (isset($_POST['nilai'])) {
    $sql = "INSERT INTO tabel_ikm VALUES(null," . $_POST['nilai'] . ")";
    if ($mysqli->query($sql)) {
        $last_id = $mysqli->insert_id;
        $sql = "UPDATE tabel_pengajuan SET id_ikm=$last_id, status='SELESAI' WHERE id=".$_GET['e-ikm'];
        $mysqli->query($sql);
    }
}

$sql = "SELECT * FROM tabel_pengajuan WHERE id=" . $_GET['e-ikm'];
$result = $mysqli->query($sql);
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <?php if ($result->num_rows > 0) : ?>
                <?php $data = $result->fetch_assoc(); ?>
                <?php if (is_null($data['id_ikm']) && $data['status'] === 'DITERIMA') : ?>
                    <div class="row mb-5">
                        <h1>Pendapat Anda Mengenai Pelayanan pada Badan Pusat Statistik Hulu Sungai Selatan?</h1>
                    </div>
                    <div class="row">
                        <div class="col card px-5 pt-4 pb-2 text-center me-5">
                            <form action="" method="POST">
                                <input type="text" name="nilai" value="1" hidden>
                            </form>
                            <img src="assets/images/e-ikm/very_sad.png" alt="" class="mb-3">
                            <h2 style="font-size: 1.4rem;">Sangat Buruk</h2>
                        </div>
                        <div class="col card px-5 pt-4 pb-2 text-center me-5">
                            <form action="" method="POST">
                                <input type="text" name="nilai" value="2" hidden>
                            </form>
                            <img src="assets/images/e-ikm/sad.png" alt="" class="mb-3">
                            <h2 style="font-size: 1.4rem;" class="mt-3">Buruk</h2>
                        </div>
                        <div class="col card px-5 pt-4 pb-2 text-center me-5">
                            <form action="" method="POST">
                                <input type="text" name="nilai" value="3" hidden>
                            </form>
                            <img src="assets/images/e-ikm/neutral.png" alt="" class="mb-3">
                            <h2 style="font-size: 1.4rem;" class="mt-3">Cukup</h2>
                        </div>
                        <div class="col card px-5 pt-4 pb-2 text-center me-5">
                            <form action="" method="POST">
                                <input type="text" name="nilai" value="4" hidden>
                            </form>
                            <img src="assets/images/e-ikm/smile.png" alt="" class="mb-3">
                            <h2 style="font-size: 1.4rem;" class="mt-3">Baik</h2>
                        </div>
                        <div class="col card px-5 pt-4 pb-2 text-center me-5">
                            <form action="" method="POST">
                                <input type="text" name="nilai" value="5" hidden>
                            </form>
                            <img src="assets/images/e-ikm/smiling.png" alt="" class="mb-3">
                            <h2 style="font-size: 1.4rem;">Sangat Baik</h2>
                        </div>
                    </div>
                    <script>
                        document.querySelectorAll('.card').forEach(card => {
                            card.addEventListener('click', function() {
                                this.children[0].submit();
                            });
                        });
                    </script>
                <?php else : ?>
                    <div class="row mb-5 text-center">
                        <div class="col" style="padding: 13rem;">
                            <h1>Terima Kasih</h1>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else : ?>
            <?php endif; ?>
        </div>
    </div>
</div>