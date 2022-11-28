<div class="container-fluid">
    <div class="row">
        <?php $this->load->view('template/admin/sidebar'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 p-4">
            <div class="container">
                <h1>Daftar Pesanan</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total</th>
                            <th scope="col">Pesan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($pesanan)) : ?>
                        <?php $count = 1; ?>
                        <?php foreach ($pesanan as $p) : ?>
                        <tr>
                            <td><?= $count++; ?></td>
                            <td><?= $p["name"]; ?></td>
                            <td><?= $p["qty"]; ?></td>
                            <td><?= $p["qty"] * $p["price"]; ?></td>
                            <td><?= $p["pesan"]; ?></td>
                            <td><?= $p["status_order"]; ?></td>
                            <td><a href="" class="badge bg-primary text-decoration-none" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal<?= $p["invoice"]; ?>">Bukti bayar</a></td>
                        </tr>
                        <div class="modal fade" id="exampleModal<?= $p["invoice"]; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Pembayaran</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url("pesanan/konfirmasi"); ?>" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" value="" name="id_product">
                                            <div class="mb-2">
                                                <input type="hidden" class="form-control" id="qty" name="invoice"
                                                    required value="<?= $p["invoice"]; ?>" />
                                            </div>
                                            <img src="<?= base_url('assets/images/bukti/' . $p['bukti_bayar']) ?>"
                                                alt="bukti bayar" class="img-thumbnail">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <?php if ($p["status_order"] == "Belum dikonfirmasi") : ?>
                                            <button type="submit" class="btn btn-primary">Konfirmasi pembayaran</button>
                                            <?php endif ?>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <?php endforeach ?>
                        <?php else : ?>
                        <p>Tidak ada pesanan</p>

                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>