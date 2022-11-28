<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-signin">
            <form action="<?= base_url("Auth/register"); ?>" method="post">
                <h1 class="h3 mb-3 fw-normal text-center">Form Register</h1>
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control <?= (form_error("name")) ? "is-invalid" : ''; ?>" id="name"
                        placeholder="Masukan name" name="name" autofocus required value="<?= set_value("name"); ?>" />
                    <?= form_error("name", '<small class="text-danger">', "</small>"); ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="email" class="form-control <?= (form_error("email")) ? "is-invalid" : ''; ?>"
                        id="email" placeholder="Masukan email" name="email" required
                        value="<?= set_value("email"); ?>" />
                    <?= form_error("email", '<small class="text-danger">', "</small>"); ?>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control <?= (form_error("address")) ? "is-invalid" : ''; ?>"
                        id="address" placeholder="Masukan Alamat" name="address" required
                        value="<?= set_value("address"); ?>" />
                    <?= form_error("address", '<small class="text-danger">', "</small>"); ?>
                </div>
                <div class="mb-3">
                    <label for="noWhatsapp" class="form-label">No Whatsapp</label>
                    <input type="number" class="form-control <?= (form_error("no_whatsapp")) ? "is-invalid" : ''; ?>"
                        id="noWhatsapp" placeholder="Masukan No Whatsapp" name="no_whatsapp"
                        value="<?= set_value("no_whatsapp"); ?>" required />
                    <?= form_error("no_whatsapp", '<small class="text-danger">', "</small>"); ?>
                </div>
                <div class="mb-3">
                    <label for="password1" class="form-label">Password</label>
                    <input type="password" class="form-control <?= (form_error("password1")) ? "is-invalid" : ''; ?>"
                        id="password1" placeholder="Masukan password" name="password1" required />
                    <?= form_error("password1", '<small class="text-danger">', "</small>"); ?>
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control <?= (form_error("password2")) ? "is-invalid" : ''; ?>"
                        id="password2" placeholder="Masukan konfirmasi password" name="password2" required />
                </div>
                <button class="btn btn-primary mb-2" style="width: 100%">Register</button>
                <p>Already have account ? <a href="<?= base_url("auth"); ?>" class="text-decoration-none">Login</a>
                </p>
            </form>
        </main>
    </div>
</div>