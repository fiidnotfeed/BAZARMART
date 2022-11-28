<div class="container-fluid">
    <div class="row">
        <?php $this->load->view('template/admin/sidebar'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 p-4">
            <div class="container">
                <h1>Form Tambah Produk</h1>
                <form action="<?= base_url('produk/create'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukan Nama" name="name"
                            autofocus required />
                        <?= form_error("name", '<small class="text-danger">', "</small>"); ?>
                    </div>
                    <div class="mb-2">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" placeholder="Masukan Harga" name="price"
                            required />
                        <?= form_error("price", '<small class="text-danger">', "</small>"); ?>
                    </div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Description</label>
                        <input type="hidden" id="description" name="description" value="">
                        <trix-editor input="description"></trix-editor>
                        <?= form_error("description", '<small class="text-danger">', "</small>"); ?>
                    </div>
                    <div class="mb-2">
                        <label for="image" class="form-label">Image</label>
                        <img src="" class="img-preview img-fluid mb-2 col-sm-5 d-block">
                        <input type="file" class="form-control" id="image" placeholder="Masukan Gambar" name="image"
                            required onchange="previewImage()" />
                    </div>
                    <div class="mb-2">
                        <label for="status" class="form-label">Status</label>
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" id="aktif" checked name="status" value="1">
                            <label class="form-check-label" for="aktif">
                                Aktif
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="tidakAktif" name="status" value="0">
                            <label class="form-check-label" for="tidakAktif">
                                Tidak Aktif
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
                            <option value="<?= $c["id_category"]; ?>">
                                <?= $c["category_name"]; ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error("category", '<small class="text-danger">', "</small>"); ?>
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