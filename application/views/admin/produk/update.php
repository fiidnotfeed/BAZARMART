<div class="container-fluid">
    <div class="row">
        <?php $this->load->view('template/admin/sidebar'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 p-4">
            <div class="container">
                <h1>Form Edit Produk</h1>
                <form action="<?= base_url('produk/update/' . $product["id_product"]); ?>" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" value="<?= $product["image"]; ?>" name="oldImage">
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukan Nama" name="name"
                            autofocus required value="<?= $product["name"]; ?>" />
                    </div>
                    <div class="mb-2">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" placeholder="Masukan Harga" name="price"
                            required value="<?= $product["price"]; ?>" />
                    </div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Description</label>
                        <input type="hidden" id="description" name="description"
                            value="<?= $product["description"]; ?>">
                        <trix-editor input="description"></trix-editor>
                    </div>
                    <div class="mb-2">
                        <label for="image" class="form-label">Image</label>
                        <img src="<?= base_url('assets/images/produk/' . $product['image']) ?>"
                            class="img-preview img-fluid mb-2 col-sm-5 d-block">
                        <input type="file" class="form-control" id="image" placeholder="Masukan Gambar" name="image"
                            onchange="previewImage()" />
                    </div>
                    <div class="mb-2">
                        <label for="status" class="form-label">Status</label>
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" id="aktif"
                                <?= $product["status"] == 1 ? "checked" : "" ?> name="status" value="1">
                            <label class="form-check-label" for="aktif">
                                Aktif
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="tidakAktif" name="status" value="0"
                                <?= $product["status"] == 0 ? "checked" : "" ?>>
                            <label class="form-check-label" for="tidakAktif">
                                Tidak aktif
                            </label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="category" class="form-label">Category</label>
                        <select id="category" name="id_category" required class="form-control">
                            <option>
                                Pilih Category
                            </option>
                            <?php foreach ($category as $c) : ?>
                            <option value="<?= $c["id_category"]; ?>"
                                <?= $product["id_category"] == $c["id_category"] ? "selected" : "" ?>>
                                <?= $c["category_name"]; ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Tambah</button>
                </form>
            </div>
        </main>
    </div>
</div>
<script>
function previewImage() {
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector(".img-preview");

    const blob = URL.createObjectURL(image.files[0]);
    imgPreview.src = blob;

}
</script>