<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Raudhah Path</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root { 
            --primary-navy: #1e3a8a; 
            --text-dark: #1e293b; 
            --bg: #f8fafc; 
        }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: var(--bg); 
            margin: 0; 
            padding: 0; 
            min-height: 100vh; 
        }
        
        /* Branding Kiri Atas */
        .brand { 
            padding: 40px 50px; 
            font-weight: 800; 
            font-size: 24px; 
            color: var(--primary-navy); 
        }

        /* Container Utama */
        .container { 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            width: 100%; 
            margin: 0 auto; 
            padding: 20px 20px 50px 20px; 
        }

        /* Form Card Styling */
        .card { 
            background: #fff; 
            padding: 40px; 
            border-radius: 16px; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.05); 
            max-width: 500px; 
            width: 100%; 
        }
        
        /* Typography & Form Elements */
        h2 { font-size: 20px; margin-bottom: 5px; text-align: center; color: var(--text-dark); }
        .subtitle { text-align: center; color: #64748b; font-size: 14px; margin-bottom: 25px; }
        
        .form-group { margin-bottom: 20px; }
        label { display: block; font-size: 0.75rem; font-weight: 700; color: #475569; margin-bottom: 8px; text-transform: uppercase; }
        
        input, textarea { 
            width: 100%; 
            padding: 12px; 
            border: 1px solid #e2e8f0; 
            border-radius: 8px; 
            box-sizing: border-box; 
            transition: border-color 0.2s;
        }
        input:focus, textarea:focus { border-color: var(--primary-navy); outline: none; }
        
        .row { display: flex; gap: 15px; }
        .col { flex: 1; }
        
        /* Button */
        button { 
            width: 100%; 
            background: var(--primary-navy); 
            color: white; 
            padding: 14px; 
            border: none; 
            border-radius: 8px; 
            font-weight: 600; 
            cursor: pointer; 
            margin-top: 10px;
        }
        button:hover { background: #172554; }
        
        /* Footer Link */
        .back-btn { 
            display: block; 
            text-align: center; 
            margin-top: 20px; 
            color: #64748b; 
            text-decoration: none; 
            font-size: 0.85rem; 
        }
        .back-btn:hover { color: var(--primary-navy); }
    </style>
</head>
<body>

    <div class="brand">Raudhah Path</div>

    <div class="container">
        <div class="card">
            <h2>Lengkapi Profil Travel</h2>
            <p class="subtitle">Informasi ini diperlukan untuk memvalidasi dokumen keberangkatan Anda.</p>
            
            <form action="<?= base_url('user/update_profile'); ?>" method="POST">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label>NAMA LENGKAP (SESUAI PASPOR)</label>
                    <input type="text" name="nama_lengkap" 
                           value="<?= isset($profile['nama_lengkap']) ? $profile['nama_lengkap'] : '' ?>" 
                           placeholder="Aris Maulana" required>
                </div>

                <div class="row">
                    <div class="col form-group">
                        <label>NOMOR PASPOR</label>
                        <input type="text" name="nomor_paspor" 
                               value="<?= isset($profile['nomor_paspor']) ? $profile['nomor_paspor'] : '' ?>" 
                               placeholder="A 1234567">
                    </div>
                    <div class="col form-group">
                        <label>NOMOR WHATSAPP</label>
                        <input type="text" name="nomor_whatsapp" 
                               value="<?= isset($profile['nomor_whatsapp']) ? $profile['nomor_whatsapp'] : '' ?>" 
                               placeholder="0812 3456 7890">
                    </div>
                </div>

                <div class="form-group">
                    <label>ALAMAT DOMISILI</label>
                    <textarea name="alamat_domisili" placeholder="Jl. Contoh No. 123..."><?= isset($profile['alamat_domisili']) ? $profile['alamat_domisili'] : '' ?></textarea>
                </div>

                <button type="submit">Simpan Perubahan Profil</button>
                <a href="<?= base_url('/'); ?>" class="back-btn">← Kembali ke Beranda</a>
            </form>
        </div>
    </div>

    <?php if(session()->getFlashdata('message')): ?>
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('message') ?>',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#1e3a8a'
            });
        </script>
    <?php endif; ?>

</body>
</html>