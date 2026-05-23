<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Raudhah Path</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#fcfcfc]">

    <!-- Navbar yang lebih Rapat & Simetris -->
    <nav class="flex justify-between items-center px-6 md:px-10 py-3 bg-white border-b border-gray-100 shadow-sm">
        <div class="flex items-center">
            <div class="text-xl font-bold text-[#1e3a5a] flex items-center">
                <span class="text-[#c29047] text-2xl mr-1">𓏬</span> Raudhah Path
            </div>
        </div>
        
        <div class="flex items-center">
            <a href="<?= base_url('/') ?>" class="flex items-center gap-1.5 text-[13px] font-bold text-gray-500 hover:text-[#1e3a5a] transition-all">
                <span>←</span> 
                <span>Beranda</span>
            </a>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-6">
        <div class="max-w-2xl mx-auto">
            <div class="mb-6 text-center md:text-left">
                <h1 class="text-2xl font-bold text-[#1e3a5a]">Lengkapi Profil Travel</h1>
                <p class="text-sm text-gray-500 mt-1">Informasi ini diperlukan untuk memvalidasi dokumen keberangkatan Anda.</p>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-[24px] shadow-sm border border-gray-100">
                <form action="<?= base_url('user/update_profile') ?>" method="POST">
                    <!-- Menambahkan CSRF Protection untuk keamanan CodeIgniter 4 -->
                    <?= csrf_field() ?>

                    <div class="space-y-5">
                        
                        <!-- Input Nama Lengkap -->
                        <div>
                            <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2">Nama Lengkap (Sesuai Paspor)</label>
                            <input type="text" name="full_name" 
                                class="w-full bg-gray-50 border border-gray-100 py-3 px-4 rounded-xl focus:ring-2 focus:ring-[#c29047] focus:bg-white outline-none transition-all text-sm"
                                placeholder="Masukkan nama lengkap Anda"
                                value="<?= esc($user['full_name'] ?? '') ?>">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <!-- Input Nomor Paspor -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2">Nomor Paspor</label>
                                <input type="text" name="passport_number" 
                                    class="w-full bg-gray-50 border border-gray-100 py-3 px-4 rounded-xl focus:ring-2 focus:ring-[#c29047] focus:bg-white outline-none transition-all text-sm"
                                    placeholder="Contoh: A 1234567"
                                    value="<?= esc($user['passport_number'] ?? '') ?>">
                            </div>
                            <!-- Input Nomor WhatsApp -->
                            <div>
                                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2">Nomor WhatsApp</label>
                                <input type="tel" name="phone" 
                                    class="w-full bg-gray-50 border border-gray-100 py-3 px-4 rounded-xl focus:ring-2 focus:ring-[#c29047] focus:bg-white outline-none transition-all text-sm"
                                    placeholder="0812xxxx"
                                    value="<?= esc($user['phone'] ?? '') ?>">
                            </div>
                        </div>

                        <!-- Input Alamat Domisili -->
                        <div>
                            <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2">Alamat Domisili</label>
                            <textarea name="address" rows="3"
                                class="w-full bg-gray-50 border border-gray-100 py-3 px-4 rounded-xl focus:ring-2 focus:ring-[#c29047] focus:bg-white outline-none transition-all text-sm"
                                placeholder="Tuliskan alamat lengkap sesuai KTP"><?= esc($user['address'] ?? '') ?></textarea>
                        </div>

                        <div class="pt-4">
                            <button type="submit" 
                                class="w-full bg-[#1e3a5a] text-white font-bold py-3.5 rounded-xl hover:bg-[#162d46] transform active:scale-[0.98] transition-all shadow-md">
                                Simpan Perubahan Profil
                            </button>
                        </div>
                        
                    </div>
                </form>
            </div>

            <p class="text-center text-[11px] text-gray-400 mt-6 uppercase tracking-widest">
                Data Anda aman dan terenkripsi secara otomatis
            </p>
        </div>
    </main>

</body>
</html>