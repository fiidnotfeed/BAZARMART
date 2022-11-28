<div class="section">
    <div class="container">
        <h3>Detail Produk</h3>
        <div class="row">
            <div class="col">
                <img src="<?= base_url('assets/images/produk/' . $product["image"]) ?>" width="100%">
            </div>
            <div class="col">
                <h2><?php echo $product["name"] ?></h>
                    <h3>Rp. <?= number_format($product["price"] * $product["qty"]) ?></h3>
                    <p>Invoice : <?= $product["invoice"]; ?></p>
                    <p>Qty : <?= $product["qty"]; ?></p>
                    <p>Status : <?= $product["status_order"]; ?></p>
                    <p>Deskripsi :<br>
                        <?php echo $product["description"] ?>
                    </p>
                    <?php if (!$product["bukti_bayar"]) : ?>
                    <div>
                        <a href="<?= base_url("pesanan/delete/" . $product["invoice"]); ?>" type="button"
                            class="btn btn-danger" onclick="return confirm('Yakin ingin membatalkan pesanan?');">
                            Batalkan Pemesanan
                        </a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Upload Bukti Bayar
                        </button>
                    </div>
                    <?php endif ?>


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
            <form action="<?= base_url("pesanan/uploadBukti"); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" value="<?= $product["invoice"]; ?>" name="invoice">
                    <div class="mb-2">
                        <label for="bukti_bayar" class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="bukti_bayar" placeholder="Masukan Bukti Pembayaran"
                            name="bukti_bayar" required />
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