<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raudhah Path - Agregator Umrah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }
        .hero-gradient {
            background: linear-gradient(rgba(255,255,255,0.1), rgba(255,255,255,0.2)), url('https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=2070&auto=format&fit=crop');
            background-size: cover; background-position: center;
        }
        .packages-header {
            background: linear-gradient(rgba(249, 250, 251, 0.85), rgba(249, 250, 251, 0.95)), 
                        url('https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=1920&auto=format&fit=crop');
            background-size: cover; background-position: center;
        }
        .base-shadow { box-shadow: 0 10px 40px rgba(29, 58, 90, 0.05); }
        .card-hover:hover { transform: translateY(-8px); transition: all 0.3s ease; }
    </style>
</head>
<body class="bg-[#fcfcfc]">

    <nav class="<?= ($view == 'home') ? 'absolute bg-transparent' : 'relative bg-white border-b border-gray-100 shadow-sm' ?> w-full z-20 flex justify-between items-center px-6 md:px-12 py-5 transition-all">
        <div class="flex items-center gap-2">
            <a href="<?= base_url('/') ?>" class="text-2xl font-extrabold text-[#1e3a5a] flex items-center">
                <span class="text-[#c29047] text-3xl mr-1">𓏬</span> Raudhah Path
            </a>
        </div>
        <div class="hidden md:flex gap-8 text-sm font-semibold text-gray-700">
            <a href="<?= base_url('/') ?>" class="<?= ($view == 'home') ? 'text-[#c29047] border-b-2 border-[#c29047]' : 'hover:text-[#c29047]' ?> transition">Home</a>
            <a href="<?= base_url('packages') ?>" class="<?= ($view == 'packages') ? 'text-[#c29047] border-b-2 border-[#c29047]' : 'hover:text-[#c29047]' ?> transition">Packages</a>
            <a href="<?= base_url('about') ?>" class="<?= ($view == 'about') ? 'text-[#c29047] border-b-2 border-[#c29047]' : 'hover:text-[#c29047]' ?> transition">About Us</a>
            <a href="<?= base_url('contact') ?>" class="<?= ($view == 'contact') ? 'text-[#c29047] border-b-2 border-[#c29047]' : 'hover:text-[#c29047]' ?> transition">Contact Us</a>
        </div>
        <div class="flex gap-4 items-center">
            <?php if (session()->get('isLoggedIn')): ?>
                <div class="flex items-center gap-3">
                    <div class="flex flex-col items-end leading-tight">
                        <span class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">Profil Saya</span>
                        <a href="<?= base_url('user/profile') ?>" class="text-sm font-bold text-[#1e3a5a]"><?= session()->get('username') ?></a>
                    </div>
                    <div class="w-10 h-10 bg-[#c29047] rounded-full flex items-center justify-center text-white font-extrabold shadow-sm">
                        <?= strtoupper(substr(session()->get('username'), 0, 1)) ?>
                    </div>
                </div>
            <?php else: ?>
                <a href="<?= base_url('auth') ?>" class="text-sm font-bold text-[#1e3a5a]">Login</a>
                <a href="#" class="bg-[#1e3a5a] text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-lg hover:bg-[#162d46] transition">Beli List</a>
            <?php endif; ?>
        </div>
    </nav>

    <?php if ($view == 'home'): ?>
        <section class="hero-gradient min-h-[550px] flex items-center justify-center relative px-4 text-center md:text-left">
            <div class="max-w-5xl w-full mt-[-50px]">
                <h1 class="text-4xl md:text-6xl font-bold text-[#1e3a5a] leading-[1.1] mb-6 max-w-xl">Temukan Paket Umrah Terpercaya</h1>
                <p class="text-gray-600 text-lg mb-10 max-w-md font-medium">Bandingkan paket Umrah dari agen terpercaya di Indonesia dengan mudah dan aman.</p>
            </div>
        </section>

        <section class="container mx-auto px-6 md:px-12 -mt-24 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <div class="bg-white p-8 rounded-[32px] shadow-xl border border-gray-50 flex flex-col items-center group hover:-translate-y-2 transition-all">
                    <span class="text-3xl mb-5">🛡️</span>
                    <h3 class="font-bold text-[#1e3a5a] text-lg mb-2">Travel Resmi</h3>
                    <p class="text-xs text-gray-400 leading-relaxed">Terdaftar resmi di Kemenag RI.</p>
                </div>
                <div class="bg-white p-8 rounded-[32px] shadow-xl border border-gray-50 flex flex-col items-center group hover:-translate-y-2 transition-all">
                    <span class="text-3xl mb-5">✨</span>
                    <h3 class="font-bold text-[#1e3a5a] text-lg mb-2">Perbandingan Mudah</h3>
                    <p class="text-xs text-gray-400 leading-relaxed">Temukan harga terbaik dengan filter cerdas.</p>
                </div>
                <div class="bg-white p-8 rounded-[32px] shadow-xl border border-gray-50 flex flex-col items-center group hover:-translate-y-2 transition-all border-2 border-transparent hover:border-[#c29047]" 
                    onclick="toggleAI()" 
                    style="cursor: pointer;"> <span class="text-3xl mb-5">🤖</span>
                    <h3 class="font-bold text-[#1e3a5a] text-lg mb-2">Rekomendasi AI</h3>
                    <p class="text-xs text-gray-400 leading-relaxed">Rencana paket diatur otomatis oleh sistem AI.</p>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($view == 'packages'): ?>
        <header class="packages-header pt-24 pb-16">
            <div class="container mx-auto px-6 md:px-12">
                <h1 class="text-6xl font-extrabold text-[#1e3a5a] mb-3 italic">Packages</h1>
                <p class="text-gray-500 max-w-xl italic">Cari dan filter paket umrah terbaik sesuai kebutuhan Anda.</p>
            </div>
        </header>

        <section class="container mx-auto px-6 md:px-12 -mt-16 relative z-10">
            <div class="bg-white p-7 rounded-[35px] shadow-2xl shadow-gray-200/50 border border-gray-50">
                <form action="<?= base_url('packages') ?>" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-6 items-end">
                    <div>
                        <label class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-2 block">Jenis Paket</label>
                        <select name="paket_type" class="w-full bg-gray-50 border-none rounded-2xl py-3.5 px-4 text-sm font-bold text-[#1e3a5a]">
                            <option value="">Semua Paket</option>
                            <option value="Reguler" <?= (request()->getGet('paket_type') == 'Reguler') ? 'selected' : '' ?>>Reguler</option>
                            <option value="Plus" <?= (request()->getGet('paket_type') == 'Plus') ? 'selected' : '' ?>>Plus</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-2 block">Durasi</label>
                        <select name="durasi" class="w-full bg-gray-50 border-none rounded-2xl py-3.5 px-4 text-sm font-bold text-[#1e3a5a]">
                            <option value="">Semua</option>
                            <option value="9" <?= (request()->getGet('durasi') == '9') ? 'selected' : '' ?>>9 Hari</option>
                            <option value="12" <?= (request()->getGet('durasi') == '12') ? 'selected' : '' ?>>12 Hari</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-2 block">Maskapai</label>
                        <select name="maskapai" class="w-full bg-gray-50 border-none rounded-2xl py-3.5 px-4 text-sm font-bold text-[#1e3a5a]">
                            <option value="">Semua Maskapai</option>
                            <?php if(!empty($all_airlines)): foreach($all_airlines as $a): ?>
                                <option value="<?= $a->id ?>" <?= (request()->getGet('maskapai') == $a->id) ? 'selected' : '' ?>><?= $a->nama_maskapai ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-2 block">Cari Paket</label>
                        <input type="text" name="search" placeholder="Contoh: Ramadhan" class="w-full bg-gray-50 border-none rounded-2xl py-3.5 px-4 text-sm font-bold text-[#1e3a5a]" value="<?= $keyword ?? '' ?>">
                    </div>
                    <button type="submit" class="bg-[#1e3a5a] text-white py-3.5 rounded-2xl font-bold text-sm hover:bg-[#c29047] transition-all shadow-lg">Cari Paket</button>
                </form>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($view == 'about'): ?>
        <header class="packages-header pt-24 pb-16">
            <div class="container mx-auto px-6 md:px-12">
                <span class="text-[#c29047] font-bold text-xs uppercase tracking-widest">Tentang Kami</span>
                <h1 class="text-6xl font-extrabold text-[#1e3a5a] mt-4 mb-3 italic">Raudhah Path</h1>
                <p class="text-gray-500 max-w-2xl leading-relaxed italic">Platform agregator terpercaya perjalanan spiritual Anda.</p>
            </div>
        </header>
        <section class="container mx-auto px-6 md:px-12 py-16">
            <div class="flex flex-col md:flex-row gap-16 items-center">
                <div class="w-full md:w-1/2">
                    <h2 class="text-4xl font-bold text-[#1e3a5a] mb-6 leading-tight uppercase">Mewujudkan Ibadah Impian</h2>
                    <p class="text-gray-500 leading-relaxed mb-8 italic">Kami bekerja sama dengan mitra resmi untuk menjamin keamanan ibadah Anda.</p>
                    <div class="grid grid-cols-2 gap-8 text-center">
                        <div class="bg-white p-6 rounded-3xl base-shadow border border-gray-50">
                            <h4 class="text-[#c29047] font-bold text-3xl">50+</h4>
                            <p class="text-[10px] text-gray-400 uppercase font-extrabold tracking-widest">Agen Travel</p>
                        </div>
                        <div class="bg-white p-6 rounded-3xl base-shadow border border-gray-50">
                            <h4 class="text-[#c29047] font-bold text-3xl">1000+</h4>
                            <p class="text-[10px] text-gray-400 uppercase font-extrabold tracking-widest">Jamaah</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 text-center">
                    <img src="https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=800" class="rounded-[60px] shadow-2xl border-[12px] border-white inline-block">
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($view == 'contact'): ?>
        <header class="packages-header pt-24 pb-16">
            <div class="container mx-auto px-6 md:px-12">
                <span class="text-[#c29047] font-bold text-xs uppercase tracking-widest">Hubungi Kami</span>
                <h1 class="text-6xl font-extrabold text-[#1e3a5a] mt-4 mb-3 italic uppercase">Contact Us</h1>
                <p class="text-gray-500 max-w-2xl leading-relaxed italic">Tim kami siap melayani pertanyaan Anda 24/7.</p>
            </div>
        </header>

        <main class="container mx-auto px-6 md:px-12 pb-20 -mt-10 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white p-10 rounded-[40px] base-shadow border border-gray-50">
                    <h3 class="text-2xl font-bold text-[#1e3a5a] mb-6 underline decoration-[#c29047] underline-offset-8 uppercase">Kirim Pesan</h3>
                    <form action="#" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <input type="text" placeholder="Nama Lengkap" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 text-sm font-bold focus:ring-2 focus:ring-[#c29047] outline-none">
                        <input type="email" placeholder="Email Anda" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 text-sm font-bold focus:ring-2 focus:ring-[#c29047] outline-none">
                        <input type="text" placeholder="WhatsApp" class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 text-sm font-bold focus:ring-2 focus:ring-[#c29047] outline-none">
                        <select class="w-full bg-gray-50 border-none rounded-2xl py-4 px-6 text-sm font-bold text-gray-400 focus:ring-2 focus:ring-[#c29047] outline-none uppercase">
                            <option>Topik Pertanyaan</option>
                            <option>Info Paket</option>
                        </select>
                        <textarea rows="4" placeholder="Pesan Anda..." class="md:col-span-2 w-full bg-gray-50 border-none rounded-2xl py-4 px-6 text-sm font-bold focus:ring-2 focus:ring-[#c29047] outline-none"></textarea>
                        <button type="submit" class="md:col-span-2 bg-[#1e3a5a] text-white py-4 rounded-2xl font-bold hover:bg-[#c29047] transition-all shadow-lg uppercase">Kirim Pesan Sekarang</button>
                    </form>
                </div>

                <div class="space-y-6">
                    <div class="bg-white p-8 rounded-[40px] base-shadow border border-gray-50">
                        <h3 class="text-xl font-bold text-[#1e3a5a] mb-6 uppercase">Info Kontak</h3>
                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <span class="text-2xl">🟢</span>
                                <div><p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">WhatsApp</p><p class="text-sm font-bold text-[#1e3a5a]">+62 812 3456 789</p></div>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="text-2xl">📧</span>
                                <div><p class="text-[10px] text-gray-400 font-bold uppercase tracking-tighter">Email</p><p class="text-sm font-bold text-[#1e3a5a]">hi@raudhahpath.com</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-8 rounded-[40px] base-shadow border border-gray-50">
                        <h3 class="text-lg font-bold text-[#1e3a5a] mb-4 uppercase">Operasional</h3>
                        <div class="text-xs font-bold space-y-2 text-gray-400 uppercase tracking-tighter">
                            <div class="flex justify-between"><span>Senin - Jumat</span> <span class="text-[#1e3a5a]">08:00 - 17:00</span></div>
                            <div class="flex justify-between"><span>Sabtu</span> <span class="text-[#1e3a5a]">08:00 - 15:00</span></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 bg-white p-10 rounded-[40px] base-shadow border border-gray-50 flex flex-col md:flex-row gap-8 items-center">
                <div class="md:w-1/3 text-center md:text-left"><h3 class="text-xl font-bold text-[#1e3a5a] mb-2 uppercase tracking-tighter">Kantor Pusat</h3><p class="text-sm text-gray-400 font-medium leading-relaxed italic uppercase">Surabaya, Jawa Timur.</p></div>
                <div class="md:w-2/3 h-40 bg-gray-100 rounded-[30px] overflow-hidden grayscale opacity-40">
                    <img src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?q=80&w=1200" class="w-full h-full object-cover">
                </div>
            </div>
        </main>
    <?php endif; ?>

    <?php if ($view == 'detail'): ?>
        <section class="pt-16 pb-20 container mx-auto px-6 md:px-12 animate-fadeIn">
            <div class="flex flex-col lg:flex-row gap-12">
                <div class="w-full lg:w-2/3">
                    <div class="rounded-[50px] overflow-hidden shadow-2xl mb-8 relative">
                        <img src="https://images.unsplash.com/photo-1564769662533-4f00a87b4056?q=80&w=1200" class="w-full h-[450px] object-cover">
                        <div class="absolute top-8 left-8 bg-white/90 backdrop-blur px-6 py-2 rounded-full text-xs font-bold text-[#1e3a5a] uppercase tracking-widest">
                            <?= $package->jenis_paket ?> Package
                        </div>
                    </div>
                    <h1 class="text-4xl font-extrabold text-[#1e3a5a] mb-2 uppercase tracking-tighter"><?= $package->nama_paket ?></h1>
                    <p class="text-[#c29047] font-bold text-sm tracking-widest uppercase mb-10">Oleh: <?= $package->nama_agent ?></p>
                </div>
                <div class="w-full lg:w-1/3">
                    <div class="sticky top-10 bg-white p-10 rounded-[50px] shadow-2xl border border-gray-50">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Mulai Dari</p>
                        <h2 class="text-4xl font-extrabold text-[#1e3a5a] mb-8 uppercase tracking-tighter">Rp <?= number_format($package->harga_jual, 0, ',', '.') ?></h2>
                        <button class="w-full bg-[#1e3a5a] text-white py-4 rounded-2xl font-bold hover:bg-[#c29047] transition-all shadow-xl uppercase">Booking Sekarang</button>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($view == 'home' || $view == 'packages'): ?>
        <section class="py-20 container mx-auto px-6 md:px-12">
            <h2 class="text-3xl font-bold text-[#1e3a5a] mb-12 uppercase tracking-tighter"><?= ($view == 'home') ? 'Paket Pilihan' : 'Paket Unggulan' ?></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php if (!empty($packages)): foreach ($packages as $p): ?>
                    <div class="bg-white rounded-[32px] overflow-hidden shadow-sm border border-gray-100 card-hover flex flex-col">
                        <div class="p-6 flex flex-col flex-grow">
                            <h4 class="font-bold text-lg text-[#1e3a5a] mb-1 leading-tight uppercase tracking-tighter"><?= $p->nama_paket ?></h4>
                            <p class="text-[10px] text-[#c29047] font-extrabold mb-5 uppercase tracking-widest">By <?= $p->nama_agent ?></p>
                            <div class="flex justify-between items-center border-t border-gray-50 pt-5 mt-auto">
                                <div><p class="text-xl font-extrabold text-[#1e3a5a] uppercase tracking-tighter">Rp <?= number_format((float)$p->harga_jual, 0, ',', '.') ?></p></div>
                                <a href="<?= base_url('packages/detail/' . $p->id) ?>" class="text-[#1e3a5a] font-bold text-xs hover:text-[#c29047] transition-all uppercase tracking-widest">Detail →</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; else: ?>
                    <div class="col-span-full text-center py-20 italic text-gray-400 uppercase tracking-widest">Paket tidak ditemukan.</div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($view != 'home'): ?>
        <footer class="bg-white py-12 border-t border-gray-100">
            <div class="container mx-auto px-12 grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="flex items-center gap-3"><span class="text-3xl">🛡️</span><span class="text-[10px] font-bold text-gray-400 uppercase leading-tight tracking-widest uppercase">Terpercaya</span></div>
                <div class="flex items-center gap-3"><span class="text-2xl">🎧</span><span class="text-[10px] font-bold text-gray-400 uppercase leading-tight tracking-widest uppercase">Support 24/7</span></div>
                <div class="flex items-center gap-3"><span class="text-2xl">💰</span><span class="text-[10px] font-bold text-gray-400 uppercase leading-tight tracking-widest uppercase">Transparan</span></div>
                <div class="flex items-center gap-3"><span class="text-2xl">📅</span><span class="text-[10px] font-bold text-gray-400 uppercase leading-tight tracking-widest uppercase">Fleksibel</span></div>
            </div>
        </footer>
    <?php endif; ?>

<style>
    /* MODAL UTAMA */
    #ai-modal {
        display: none; position: fixed; inset: 0; 
        background: rgba(0, 0, 0, 0.6); z-index: 99999; 
        justify-content: center; align-items: center;
        backdrop-filter: blur(8px);
    }

    /* KOTAK CHAT */
    .chat-container-ai {
        width: 95%; max-width: 450px; background: white; 
        border-radius: 28px; height: 75vh; display: flex; 
        flex-direction: column; overflow: hidden; 
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    #chat-window { 
        flex: 1; overflow-y: auto; padding: 20px; 
        display: flex; flex-direction: column; gap: 15px; 
        background-color: #f8fafc !important; /* Latar belakang jendela chat */
    }

    #chat-window { 
        flex: 1; overflow-y: auto; padding: 25px; 
        display: flex; flex-direction: column; gap: 18px; 
        background-color: #f8fafc !important;
    }

    .bubble { 
        padding: 12px 20px !important; 
        border-radius: 22px !important; 
        font-size: 14px !important; 
        max-width: 80% !important;
        line-height: 1.6 !important;
        display: block !important;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03) !important;
    }

    /* Bubble AI - Putih dengan bayangan halus */
    .bubble.ai { 
        align-self: flex-start !important; 
        background-color: #ffffff !important; 
        color: #1e3a5a !important; 
        border: 1px solid #f1f5f9 !important;
        border-bottom-left-radius: 4px !important;
    }

    /* Bubble User - Biru Navy sesuai tema Raudhah Path */
    .bubble.user { 
        align-self: flex-end !important; 
        background-color: #1e3a5a !important; 
        color: #ffffff !important; 
        border-bottom-right-radius: 4px !important;
        text-align: right;
    }

    /* BAGIAN INPUT */
    .input-group-ai { padding: 15px 20px; background: white; border-top: 1px solid #f1f5f9; display: flex; align-items: center; gap: 10px; }
    .input-wrapper { flex: 1; background: #f1f5f9; border-radius: 12px; padding: 10px 15px; }
    #user-input { background: transparent; border: none; width: 100%; outline: none; font-size: 14px; color: #1e3a5a; }
    .btn-icon { background: #1e3a5a; color: white; border: none; width: 42px; height: 42px; border-radius: 10px; display: flex; align-items: center; justify-content: center; cursor: pointer; flex-shrink: 0; }
</style>

<div id="ai-modal" onclick="if(event.target == this) toggleAI()">
    <div class="chat-container-ai">
        <div class="chat-header-ai flex justify-between items-center bg-[#1e3a5a] p-4 text-white">
    <div class="flex items-center gap-3">
        <span class="text-2xl">🤖</span>
        <div class="text-left">
            <h2 class="font-bold text-sm leading-tight">RAUDHAH PATH AI</h2>
            <p class="text-[10px] text-blue-200">Rekomendasi AI Cerdas</p>
        </div>
    </div>
    <button onclick="toggleAI()" class="text-2xl leading-none hover:text-gray-300 transition-all">&times;</button>
</div>

        <div id="chat-window">
            <div class="bubble ai">Assalamu'alaikum! Ada yang bisa saya bantu terkait paket Umroh hari ini?</div>
        </div>

        <div class="input-group-ai">
            <button class="btn-icon" id="mic-btn" onclick="mulaiVoice()">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M12 14c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3S9 3.34 9 5v6c0 1.66 1.34 3 3 3z"/><path d="M17 11c0 2.76-2.24 5-5 5s-5-2.24-5-5H5c0 3.53 2.61 6.43 6 6.92V21h2v-3.08c3.39-.49 6-3.39 6-6.92h-2z"/></svg>
            </button>
            <div class="input-wrapper">
                <input type="text" id="user-input" placeholder="Tulis pesan..." autocomplete="off">
            </div>
            <button class="btn-icon" onclick="tanyaAI()">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
            </button>
        </div>
    </div>
</div>

<script>
    const inputField = document.getElementById('user-input');
    const chatWindow = document.getElementById('chat-window');

    function toggleAI() {
        const modal = document.getElementById('ai-modal');
        modal.style.display = (modal.style.display === 'flex') ? 'none' : 'flex';
        if (modal.style.display === 'flex') inputField.focus();
    }

    // --- FITUR SUARA (TEXT TO SPEECH) ---
    function bicara(teks) {
        window.speechSynthesis.cancel();
        const msg = new SpeechSynthesisUtterance(teks);
        msg.lang = 'id-ID';
        window.speechSynthesis.speak(msg);
    }

    // --- FITUR MIC (SPEECH TO TEXT) ---
    function mulaiVoice() {
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (!SpeechRecognition) return alert("Browser tidak mendukung suara");

        const recognition = new SpeechRecognition();
        recognition.lang = 'id-ID';
        const micBtn = document.getElementById('mic-btn');

        recognition.onstart = () => micBtn.classList.add('listening');
        recognition.onend = () => micBtn.classList.remove('listening');
        
        recognition.onresult = (event) => {
            inputField.value = event.results[0][0].transcript;
            tanyaAI();
        };
        recognition.start();
    }

    async function tanyaAI() {
    const input = document.getElementById('user-input');
    const chatWindow = document.getElementById('chat-window');
    const pesan = input.value.trim();
    if(!pesan) return;

    // PASTIKAN CLASS NYA SEPERTI INI: bubble user
    chatWindow.innerHTML += `<div class="bubble user">${pesan}</div>`;
    input.value = '';
    chatWindow.scrollTop = chatWindow.scrollHeight;

    try {
        const response = await fetch('<?= base_url("ai/proses") ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'pesan=' + encodeURIComponent(pesan)
        });
        const data = await response.json();
        
        // PASTIKAN CLASS NYA SEPERTI INI: bubble ai
        chatWindow.innerHTML += `<div class="bubble ai">${data.jawaban}</div>`;
        chatWindow.scrollTop = chatWindow.scrollHeight;
    } catch (e) {
        console.error(e);
    }
}

    inputField.addEventListener("keydown", (e) => { if (e.key === "Enter") tanyaAI(); });
</script>

</body>
</html>