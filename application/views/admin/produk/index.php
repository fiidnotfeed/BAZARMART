<div class="container-fluid">
    <div class="row">
        <?php $this->load->view('template/admin/sidebar'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 p-4">
            <div class="container">
                <?= $this->session->flashdata("message"); ?>
                <h1>Daftar Produk</h1>
                <a href="<?= base_url('produk/create'); ?>" class="btn btn-primary mb-3">Tambah Produk</a>
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
                                <a href="<?= base_url('produk/update/' . $p['id_product']) ?>"
                                    class="btn btn-warning mb-2" style="bottom: 0;">Edit</a>
                                <a href="<?= base_url('produk/delete/' . $p['id_product']) ?>"
                                    class="btn btn-danger mb-2" style="bottom: 0;"
                                    onclick="return confirm('Yakin ingin menghapus produk?');">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <?php else : ?>
                    <p>Produk tidak ada</p>
                    <?php endif ?>
                </div>
        </main>
    </div>
</div>