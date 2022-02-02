<!-- partial -->
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/dashboard.js"></script>
<!-- End custom js for this page -->
<script>
    <?php
    $data = [];
    $result = $mysqli->query("SELECT nama_divisi, (SELECT COUNT(id) FROM tabel_tamu WHERE tabel_tamu.id_divisi=tabel_divisi.id) AS pengunjung FROM tabel_divisi");
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    ?>
    const data = JSON.parse('<?= json_encode($data); ?>');
    if ($("#transaction-history").length) {
        var areaData = {
            labels: data.map(value => value.nama_divisi),
            datasets: [{
                data: data.map(value => value.pengunjung),
                backgroundColor: [
                    "#111111", "#00d25b", "#ffab00"
                ]
            }]
        };
        var areaOptions = {
            responsive: true,
            maintainAspectRatio: true,
            segmentShowStroke: false,
            cutoutPercentage: 70,
            elements: {
                arc: {
                    borderWidth: 0
                }
            },
            legend: {
                display: false
            },
            tooltips: {
                enabled: true
            }
        }
        var transactionhistoryChartPlugins = {
            beforeDraw: function(chart) {
                var width = chart.chart.width,
                    height = chart.chart.height,
                    ctx = chart.chart.ctx;

                ctx.restore();
                var fontSize = 1;
                ctx.font = fontSize + "rem sans-serif";
                ctx.textAlign = 'left';
                ctx.textBaseline = "middle";
                ctx.fillStyle = "#ffffff";

                var text = (data.map(value => parseInt(value.pengunjung))).reduce((partialSum, a) => partialSum + a, 0) + ' Orang',
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2.4;

                ctx.fillText(text, textX, textY);

                ctx.restore();
                var fontSize = 0.75;
                ctx.font = fontSize + "rem sans-serif";
                ctx.textAlign = 'left';
                ctx.textBaseline = "middle";
                ctx.fillStyle = "#6c7293";

                var texts = "Total",
                    textsX = Math.round((width - ctx.measureText(text).width) / 1.93)+5,
                    textsY = height / 1.7;

                ctx.fillText(texts, textsX, textsY);
                ctx.save();
            }
        }
        var transactionhistoryChartCanvas = $("#transaction-history").get(0).getContext("2d");
        var transactionhistoryChart = new Chart(transactionhistoryChartCanvas, {
            type: 'doughnut',
            data: areaData,
            options: areaOptions,
            plugins: transactionhistoryChartPlugins
        });
    }
</script>
</body>

</html>