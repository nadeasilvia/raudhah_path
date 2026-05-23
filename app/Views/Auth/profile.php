<!DOCTYPE html>
<html lang="id">
<head>
    <title>Profil Saya - Raudhah Path</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#fcfcfc] font-['Plus_Jakarta_Sans']">
    <nav class="w-full px-12 py-6 flex justify-between items-center bg-white shadow-sm">
        <div class="text-2xl font-bold text-[#1e3a5a]"><span class="text-[#c29047]">𓏬</span> Raudhah Path</div>
        <a href="<?= base_url('/') ?>" class="text-sm font-bold text-[#1e3a5a]">Kembali ke Home</a>
    </nav>

    <div class="container mx-auto px-6 py-12">
        <div class="max-w-3xl mx-auto bg-white rounded-[32px] shadow-xl overflow-hidden border border-gray-50">
            <div class="h-32 bg-[#1e3a5a]"></div>
            <div class="px-8 pb-12 -mt-16 text-center">
                <div class="inline-block p-2 bg-white rounded-full mb-4 shadow-lg">
                    <div class="w-24 h-24 bg-[#c29047] rounded-full flex items-center justify-center text-white text-3xl font-bold">
                        <?= strtoupper(substr(session()->get('username'), 0, 1)) ?>
                    </div>
                </div>
                <h2 class="text-2xl font-bold text-[#1e3a5a]"><?= session()->get('username') ?></h2>
                <p class="text-gray-400 text-sm">Member Raudhah Path</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-10 text-left">
                    <div class="p-6 bg-gray-50 rounded-2xl">
                        <p class="text-[10px] font-bold text-[#c29047] uppercase tracking-widest">Email Terdaftar</p>
                        <p class="text-[#1e3a5a] font-semibold mt-1"><?= session()->get('email') ?? 'User@email.com' ?></p>
                    </div>
                    <div class="p-6 bg-gray-50 rounded-2xl">
                        <p class="text-[10px] font-bold text-[#c29047] uppercase tracking-widest">Status Akun</p>
                        <p class="text-[#1e3a5a] font-semibold mt-1">Jamaah Aktif</p>
                    </div>
                </div>
                
                <a href="<?= base_url('auth/logout') ?>" class="inline-block mt-10 text-red-500 font-bold text-sm hover:underline">Keluar dari Akun</a>
            </div>
        </div>
    </div>
</body>
</html>