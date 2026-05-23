<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login - Raudhah Path</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { background: #f8f9fa; font-family: 'Poppins', sans-serif; }
        .auth-card { border-radius: 20px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden; }
        .bg-auth { background: #1a374d; color: white; display: flex; align-items: center; justify-content: center; }
        .btn-primary { background: #1a374d; border: none; border-radius: 10px; padding: 12px; transition: 0.3s; }
        .btn-primary:hover { background: #406882; transform: translateY(-2px); }
        .back-link { text-decoration: none; transition: 0.3s; display: inline-flex; align-items: center; gap: 8px; font-size: 0.875rem; color: #6c757d; }
        .back-link:hover { color: #1a374d; }
        .alert { border-radius: 12px; font-size: 0.9rem; }
    </style>
</head>
<body class="d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="card auth-card">
                    <div class="row g-0">
                        <div class="col-md-5 bg-auth d-none d-md-flex p-4 text-center">
                            <div>
                                <h3 class="fw-bold">Raudhah Path</h3>
                                <p class="small opacity-75">Temukan Paket Umrah Terpercaya Anda Bersama Kami.</p>
                            </div>
                        </div>
                        <div class="col-md-7 p-lg-5 p-4">
                            <div class="mb-4">
                                <a href="<?= base_url('/') ?>" class="back-link">
                                    <span>←</span> Kembali ke Beranda
                                </a>
                            </div>

                            <h4 class="mb-1 fw-bold text-dark" id="authTitle">Masuk</h4>
                            <p class="text-muted small mb-4" id="authSubtitle">Silakan masuk dengan akun Anda.</p>
                            
                            <form id="authForm" action="<?= base_url('auth/login') ?>" method="post">
                                <?= csrf_field() ?>
                                
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                                </div>

                                <div class="mb-3" id="emailGroup" style="display:none;">
                                    <label class="form-label small fw-bold">Email</label>
                                    <input type="email" name="email" id="emailInput" class="form-control" placeholder="nama@email.com">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mt-3 fw-bold" id="mainBtn">Login</button>
                                
                                <p class="text-center mt-4 text-muted mb-0">
                                    <small id="toggleText">Belum punya akun? <a href="javascript:void(0)" class="text-primary fw-bold" onclick="toggleAuth()" style="text-decoration:none;">Daftar di sini</a></small>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let isLogin = true;
        function toggleAuth() {
            isLogin = !isLogin;
            const title = document.getElementById('authTitle');
            const subtitle = document.getElementById('authSubtitle');
            const emailGroup = document.getElementById('emailGroup');
            const emailInput = document.getElementById('emailInput');
            const mainBtn = document.getElementById('mainBtn');
            const toggleText = document.getElementById('toggleText');
            const form = document.getElementById('authForm');

            if (isLogin) {
                title.innerText = "Masuk";
                subtitle.innerText = "Silakan masuk dengan akun Anda.";
                emailGroup.style.display = "none";
                emailInput.required = false;
                mainBtn.innerText = "Login";
                toggleText.innerHTML = 'Belum punya akun? <a href="javascript:void(0)" class="text-primary fw-bold" onclick="toggleAuth()" style="text-decoration:none;">Daftar di sini</a>';
                form.action = "<?= base_url('auth/login') ?>";
            } else {
                title.innerText = "Daftar Akun";
                subtitle.innerText = "Lengkapi data untuk membuat akun baru.";
                emailGroup.style.display = "block";
                emailInput.required = true;
                mainBtn.innerText = "Daftar";
                toggleText.innerHTML = 'Sudah punya akun? <a href="javascript:void(0)" class="text-primary fw-bold" onclick="toggleAuth()" style="text-decoration:none;">Login di sini</a>';
                form.action = "<?= base_url('auth/register') ?>";
            }
        }
    </script>
</body>
</html>