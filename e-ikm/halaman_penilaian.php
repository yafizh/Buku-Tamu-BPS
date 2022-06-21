<style>
    .card:hover {
        background-color: #E4EAEC;
        cursor: pointer;
        color: black;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <?php
            require_once "database/koneksi.php";
            $sql = "SELECT * FROM tabel_pengajuan WHERE id=" . $_GET['id_tamu'];
            $result = $mysqli->query($sql);
            ?>
            <?php if ($result->num_rows > 0) : ?>
                <?php $data = $result->fetch_assoc(); ?>
                <?php if (is_null($data['id_ikm']) && $data['status'] === 'SELESAI') : ?>
                    <div class="row mb-5">
                        <h1>Pendapat Anda Mengenai Pelayanan pada Badan Pusat Statistik Hulu Sungai Selatan?</h1>
                    </div>
                    <div class="row">
                        <div data-nilai="1" class="col card px-5 pt-4 pb-2 text-center me-5">
                            <img src="assets/images/e-ikm/very_sad.png" alt="" class="mb-3">
                            <h2>Sangat Buruk</h2>
                        </div>
                        <div data-nilai="2" class="col card px-5 pt-4 pb-2 text-center me-5">
                            <img src="assets/images/e-ikm/sad.png" alt="" class="mb-3">
                            <h2 class="mt-3">Buruk</h2>
                        </div>
                        <div data-nilai="3" class="col card px-5 pt-4 pb-2 text-center me-5">
                            <img src="assets/images/e-ikm/neutral.png" alt="" class="mb-3">
                            <h2 class="mt-3">Cukup</h2>
                        </div>
                        <div data-nilai="4" class="col card px-5 pt-4 pb-2 text-center me-5">
                            <img src="assets/images/e-ikm/smile.png" alt="" class="mb-3">
                            <h2 class="mt-3">Baik</h2>
                        </div>
                        <div data-nilai="5" class="col card px-5 pt-4 pb-2 text-center me-5">
                            <img src="assets/images/e-ikm/smiling.png" alt="" class="mb-3">
                            <h2>Sangat Baik</h2>
                        </div>
                    </div>
                    <script>
                        document.querySelectorAll('.card').forEach(card => {
                            card.addEventListener('click', function() {
                                window.location.href = `index.php?e-ikm=selesai&id_tamu=<?= $_GET['id_tamu'] ?>&nilai=${this.getAttribute('data-nilai')}`;
                            });
                        });
                    </script>
                <?php endif; ?>
            <?php else : ?>
            <?php endif; ?>
        </div>
    </div>
</div>