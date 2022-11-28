<?php $this->load->view('template/customer/navbar') ?>

<!-- search -->
<div class="search">
	<div class="container">
		<form action="produk.php">
			<input type="text" name="search" placeholder="Cari Produk" value="">
			<input type="hidden" name="kat" value="">
			<input type="submit" name="cari" value="Cari Produk">
		</form>
	</div>
</div>

<!-- new product -->
<div class="section">
	<div class="container">
		<h3>Produk</h3>
		<div class="box">
			<?php if ($products) : ?>
				<?php foreach ($products as $product) : ?>
					<a href="detail-produk.php?id=<?= $product->product_id ?>">
						<div class="col-4">
							<img src="<?= base_url('assets/images/') ?>produk/<?= $product->product_image ?>">
							<p class="nama"><?= substr($product->product_name, 0, 30) ?></p>
							<p class="harga">Rp. <?= number_format($product->product_price) ?></p>
						</div>
					</a>
				<?php endforeach ?>
			<?php else : ?>
				<p>Produk tidak ada</p>
			<?php endif; ?>
		</div>
	</div>
</div>
