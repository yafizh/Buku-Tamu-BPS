<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Form elements </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Tamu Per Tanggal</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" value="<?= Date("Y-m-d"); ?>" id="exampleInputUsername2" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Divisi</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Pegawai</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Tamu Per Bulan</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample">
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="month" value="<?= Date("Y-m"); ?>" class="form-control" id="exampleInputUsername2" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Divisi</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Pegawai</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pegawai</h4>
                        <p class="card-description"> Data Pegawai </p>
                        <form class="forms-sample">
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                        <br>
                        <p class="card-description"> Jumlah Pengunjung Tiap Pegawai </p>
                        <form class="forms-sample">
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Divisi</h4>
                        <p class="card-description"> Data Divisi </p>
                        <form class="forms-sample">
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                        <br>
                        <p class="card-description"> Jumlah Pengunjung Tiap Divisi </p>
                        <form class="forms-sample">
                            <button type="submit" class="btn btn-primary me-2">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->