<main class="container">
    <!-- search -->
    <div class="row flex-column flex-md-row">
        <div class="col">
            <h3>Daftar Pesanan</h3>
        </div>
        <div class="col">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari produk..." id="searchInput" />
                <button class="btn btn-secondary" type="button" id="searchButton">Search</button>
            </div>
        </div>
    </div>

    <!-- new product -->
    <div class="section">
        <div class="container">

            <div class="row">
                <?php if (count($product)) : ?>
                <?php foreach ($product as $p) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card" style="height: 100%">
                        <img src="<?= base_url('assets/images/produk/' . $p['image']) ?>" alt="Web Programming"
                            class="card-img-top" width="500" height="300">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo substr($p['name'], 0, 30) ?></h5>
                            <p class="card-text mb-5">Rp. <?php echo number_format($p['price']) ?></p>
                            <a href="<?= base_url('customer/pesanan/' . $p['invoice']) ?>"
                                class="btn btn-primary position-absolute mb-2" style="bottom: 0;">Detail</a>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <?php else : ?>
                <p>Pesanan tidak ada</p>
                <?php endif ?>
            </div>
        </div>
    </div>
</main>