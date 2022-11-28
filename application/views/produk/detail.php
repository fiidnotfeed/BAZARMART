<div class="section">
    <div class="container">
        <h3>Detail Produk</h3>
        <div class="row">
            <div class="col">
                <img src="<?= base_url('assets/images/produk/' . $product["image"]) ?>" width="100%">
            </div>
            <div class="col">
                <h2><?php echo $product["name"] ?></h>
                    <h3>Rp. <?php echo number_format($product["price"]) ?></h3>
                    <p>Deskripsi :<br>
                        <?php echo $product["description"] ?>
                    </p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Order Now
                    </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url("pesanan/create"); ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" value="<?= $product["id_product"]; ?>" name="id_product">
                    <div class="mb-2">
                        <label for="qty" class="form-label">Qty</label>
                        <input type="number" class="form-control" id="qty" placeholder="Masukan Qty" name="qty"
                            required />
                    </div>
                    <div class="mb-2">
                        <label for="pesan" class="form-label">Pesan</label>
                        <input type="text" class="form-control" id="pesan" placeholder="Masukan Pesan" name="pesan" />
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>

        </div>
    </div>
</div>


</body>

</html>