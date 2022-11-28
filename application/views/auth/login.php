<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-signin">
            <form action="<?= base_url("auth"); ?>" method="post">
                <h1 class="h3 mb-3 fw-normal text-center">Form Login</h1>
                <?= $this->session->flashdata("message"); ?>
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukan Email" name="email"
                        autofocus required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukan Password"
                        name="password" required />
                </div>
                <button class="btn btn-primary mb-2" style="width: 100%">Login</button>
                <p>Dont have account ? <a href="<?= base_url("auth/register"); ?>"
                        class="text-decoration-none">Register</a></p>
            </form>
        </main>
    </div>
</div>