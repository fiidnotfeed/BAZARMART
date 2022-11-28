<div class="container-fluid">
    <div class="row">
        <?php $this->load->view('template/admin/sidebar'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 p-4">
            <div class="container">
                <h1>Dashboard</h1>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-dark bg-primary text-white">
                            <div class="card-body pb-0">
                                <h3 class="mb-2">Product</h3>
                                <h4><?= $jumlah_produk; ?></h4>
                                <div class="pull-in sparkline-fix chart-as-background">
                                    <div id="lineChart2"><canvas width="327" height="70"
                                            style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-dark bg-success text-white">
                            <div class="card-body pb-0">
                                <h3 class="mb-2">Order</h3>
                                <h4><?= $jumlah_pesanan; ?></h4>
                                <div class="pull-in sparkline-fix chart-as-background">
                                    <div id="lineChart2"><canvas width="327" height="70"
                                            style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-dark bg-warning text-white">
                            <div class="card-body pb-0">
                                <h3 class="mb-2">Customer</h3>
                                <h4><?= $jumlah_customer; ?></h4>
                                <div class="pull-in sparkline-fix chart-as-background">
                                    <div id="lineChart2"><canvas width="327" height="70"
                                            style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>