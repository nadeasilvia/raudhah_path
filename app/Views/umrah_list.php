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
                <a href="<?= base_url('travel_resmi') ?>" class="bg-white p-8 rounded-[32px] shadow-xl border border-gray-50 flex flex-col items-center group hover:-translate-y-2 transition-all cursor-pointer">
                <span class="text-3xl mb-5">🛡️</span>
                <h3 class="font-bold text-[#1e3a5a] text-lg mb-2">Travel Resmi</h3>
                <p class="text-xs text-gray-400 leading-relaxed">Terdaftar resmi di Kemenag RI.</p>
            </a>
               <a href="<?= base_url('perbandingan') ?>" class="bg-white p-8 rounded-[32px] shadow-xl border border-gray-50 flex flex-col items-center group hover:-translate-y-2 transition-all cursor-pointer">
                <span class="text-3xl mb-5">✨</span>
                <h3 class="font-bold text-[#1e3a5a] text-lg mb-2">Perbandingan Mudah</h3>
                <p class="text-xs text-gray-400 leading-relaxed">Temukan harga terbaik dengan filter cerdas.</p>
            </a>
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
                <form id="filterForm" action="<?= base_url('packages') ?>" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-6 items-end">
                    <div>
                        <label class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-2 block">Jenis Paket</label>
                        <select id="paket_type" class="w-full bg-gray-50 border-none rounded-2xl py-3.5 px-4 text-sm font-bold text-[#1e3a5a]">
                            <option value="">Semua Paket</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['kategori'] ?>" <?= (request()->getGet('paket_type') == $k['kategori']) ? 'selected' : '' ?>>
                                    <?= ucfirst($k['kategori']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-2 block">Durasi</label>
                        <select id="durasi" class="w-full bg-gray-50 border-none rounded-2xl py-3.5 px-4 text-sm font-bold text-[#1e3a5a]">
                            <option value="">Semua Durasi</option>
                        <?php if (!empty($durasi)): ?>
                            <?php foreach ($durasi as $d): ?>
                                <option value="<?= $d['durasi_hari'] ?>" <?= (request()->getGet('durasi') == $d['durasi_hari']) ? 'selected' : '' ?>>
                                    <?= $d['durasi_hari'] ?> Hari
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Data Kosong</option>
                        <?php endif; ?>
                    </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-2 block">Maskapai</label>
                        <select id="maskapai" class="w-full bg-gray-50 border-none rounded-2xl py-3.5 px-4 text-sm font-bold text-[#1e3a5a]">
                            <option value="">Semua Maskapai</option>
        
                        <?php if (!empty($all_airlines)): ?>
                            <?php foreach ($all_airlines as $a): ?>
                                <option value="<?= $a->id ?>" <?= (request()->getGet('maskapai') == $a->id) ? 'selected' : '' ?>>
                                    <?= $a->nama_maskapai ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Data Maskapai Kosong</option>
                        <?php endif; ?>
                        
                    </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-2 block">Cari Paket</label>
                        <input type="text" name="search" placeholder="Contoh: Ramadhan" class="w-full bg-gray-50 border-none rounded-2xl py-3.5 px-4 text-sm font-bold text-[#1e3a5a]" value="<?= $keyword ?? '' ?>">
                    </div>
                    <button type="submit" class="bg-[#1e3a5a] text-white py-3.5 rounded-2xl font-bold text-sm hover:bg-[#c29047] transition-all shadow-lg">Cari Paket</button>
                </form>
                <div id="activeFiltersContainer" class="mt-8 pt-6 border-t border-gray-100/50 flex flex-wrap items-center gap-3 hidden">
                <span class="text-[10px] text-gray-400 font-bold uppercase mr-2">Filter aktif:</span>
                <div id="filterList" class="flex flex-wrap gap-2">
                    </div>
                <button type="button" onclick="resetAllFilters()" class="flex items-center gap-2 text-[11px] font-bold text-blue-600 hover:text-[#c29047] transition-all ml-2 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 stroke-current fill-none group-hover:rotate-[-45deg] transition-transform duration-300" viewBox="0 0 24 24" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
                        <path d="M3 3v5h5"/>
                    </svg>
                    <span class="tracking-wide">Reset Filter</span>
                </button>
            </div>
            </div>
        </section>
    <?php endif; ?>

<section class="container mx-auto px-6 md:px-12 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php if (!empty($packages)): ?>
                    <?php foreach ($packages as $p): ?>
    <a href="<?= base_url('packages/detail/' . $p->id) ?>" class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden card-hover transition-all block group">
        <div class="h-48 bg-gray-200 relative">
            <img src="https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=400" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-[10px] font-bold text-[#1e3a5a] uppercase">
                <?= $p->kategori ?>
            </div>
        </div>
        <div class="p-5">
            <h3 class="font-bold text-[#1e3a5a] mb-2 group-hover:text-[#c29047] transition-colors"><?= $p->nama_paket ?></h3>
            <p class="text-xs text-gray-400 mb-4"><?= $p->nama_maskapai ?> • <?= $p->durasi_hari ?> Hari</p>
            <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-50">
                <div>
                    <p class="text-[10px] text-gray-400 font-bold uppercase">Mulai Dari</p>
                    <p class="font-bold text-[#c29047]">Rp <?= number_format($p->harga_jual, 0, ',', '.') ?></p>
                </div>
                <div class="bg-[#1e3a5a] text-white p-2.5 rounded-xl group-hover:bg-[#c29047] transition-all">
                    →
                </div>
            </div>
        </div>
    </a>
<?php endforeach; ?>
                <?php else: ?>
                    <div class="col-span-full text-center py-20">
                        <p class="text-gray-400 font-bold italic text-lg">Paket "<?= esc($keyword ?? '') ?>" tidak ditemukan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>

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
     <?php if ($view == 'travel_resmi'): ?>
        <section class="packages-header pt-32 pb-20 relative overflow-hidden">
            <div class="container mx-auto px-6 md:px-12 relative z-10">
                <nav class="flex text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-8 items-center gap-2">
                    <a href="<?= base_url('/') ?>" class="hover:text-[#c29047]">Home</a>
                    <span>/</span>
                    <span class="text-[#1e3a5a]">Travel Resmi</span>
                </nav>
                
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="md:w-1/2">
                        <div class="inline-block px-4 py-2 bg-blue-50 rounded-full text-[#1e3a5a] text-[10px] font-bold uppercase tracking-widest mb-6">
                            🛡️ Terverifikasi Kemenag RI
                        </div>
                        <h1 class="text-5xl md:text-6xl font-extrabold text-[#1e3a5a] leading-tight mb-6 uppercase tracking-tighter">
                            Ibadah Aman <br> Bersama <span class="text-[#c29047]">Travel Resmi</span>
                        </h1>
                        <p class="text-gray-500 text-lg leading-relaxed mb-8 italic">
                            Raudhah Path hanya bekerja sama dengan Penyelenggara Perjalanan Ibadah Umrah (PPIU) yang memiliki izin resmi dan rekam jejak terpercaya.
                        </p>
                    </div>
                    <div class="md:w-1/2 relative">
                        <div class="absolute -top-10 -left-10 w-32 h-32 bg-[#c29047]/10 rounded-full blur-3xl"></div>
                        <img src="https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=800" 
                             class="rounded-[60px] shadow-2xl border-[15px] border-white relative z-10 w-full h-[400px] object-cover" alt="Makkah">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
    <div class="container mx-auto px-6 md:px-12">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl font-extrabold text-[#1e3a5a] mb-4">Kenapa memilih Travel Resmi?</h2>
            <p class="text-gray-400 text-sm italic">Kami memastikan setiap perjalanan Umrah Anda terlindungi dengan standar layanan terbaik.</p>
        </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="p-8 rounded-[40px] bg-white border border-gray-100 shadow-sm hover:shadow-md transition-all text-center">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-2xl mb-6 mx-auto">🛡️</div>
                    <h3 class="font-bold text-[#1e3a5a] text-sm mb-3">Terdaftar Resmi</h3>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Seluruh mitra travel kami terdaftar dan diawasi oleh Kementerian Agama RI.</p>
                </div>
                <div class="p-8 rounded-[40px] bg-white border border-gray-100 shadow-sm hover:shadow-md transition-all text-center">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-2xl mb-6 mx-auto">📄</div>
                    <h3 class="font-bold text-[#1e3a5a] text-sm mb-3">Perlindungan Jemaah</h3>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Hak dan keamanan jemaah terlindungi sesuai regulasi pemerintah.</p>
                </div>
                <div class="p-8 rounded-[40px] bg-white border border-gray-100 shadow-sm hover:shadow-md transition-all text-center">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-2xl mb-6 mx-auto">🎧</div>
                    <h3 class="font-bold text-[#1e3a5a] text-sm mb-3">Layanan Terstandar</h3>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Pelayanan mengikuti standar operasional dan kualitas yang telah ditetapkan.</p>
                </div>
                <div class="p-8 rounded-[40px] bg-white border border-gray-100 shadow-sm hover:shadow-md transition-all text-center">
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-2xl mb-6 mx-auto">🤝</div>
                    <h3 class="font-bold text-[#1e3a5a] text-sm mb-3">Aman & Terpercaya</h3>
                    <p class="text-[11px] text-gray-500 leading-relaxed">Fokus kami adalah kenyamanan, keamanan, dan kelancaran ibadah Anda.</p>
                </div>
            </div>
        </div>
    </section>

        <section class="py-20 bg-gray-50/30">
    <div class="container mx-auto px-6 md:px-12 text-center">
        <h2 class="text-2xl font-bold text-[#1e3a5a] mb-4">Mitra Travel Resmi Kami</h2>
        <p class="text-gray-400 text-xs mb-12">Berikut adalah sebagian mitra PPIU resmi yang berkolaborasi dengan Raudhah Path.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-12">
            
            <div class="bg-white p-5 rounded-[24px] border border-gray-100 flex items-center gap-4 shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold shrink-0">A</div>
                <div class="text-left">
                    <h4 class="font-bold text-[#1e3a5a] text-[11px] uppercase">An Namiroh Group</h4>
                    <p class="text-[9px] text-gray-400">PPIU No. 1234 Tahun 2018</p>
                    <span class="text-[8px] bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full font-bold">Resmi Kemenag</span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-[24px] border border-gray-100 flex items-center gap-4 shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 bg-green-600 rounded-xl flex items-center justify-center text-white font-bold shrink-0">R</div>
                <div class="text-left">
                    <h4 class="font-bold text-[#1e3a5a] text-[11px] uppercase">Rihlah</h4>
                    <p class="text-[9px] text-gray-400">PPIU No. 5678 Tahun 2019</p>
                    <span class="text-[8px] bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full font-bold">Resmi Kemenag</span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-[24px] border border-gray-100 flex items-center gap-4 shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 bg-amber-500 rounded-xl flex items-center justify-center text-white font-bold shrink-0">T</div>
                <div class="text-left">
                    <h4 class="font-bold text-[#1e3a5a] text-[11px] uppercase">Tajalli</h4>
                    <p class="text-[9px] text-gray-400">PPIU No. 9012 Tahun 2020</p>
                    <span class="text-[8px] bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full font-bold">Resmi Kemenag</span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-[24px] border border-gray-100 flex items-center gap-4 shadow-sm hover:shadow-md transition-all">
                <div class="w-12 h-12 bg-emerald-600 rounded-xl flex items-center justify-center text-white font-bold shrink-0">A</div>
                <div class="text-left">
                    <h4 class="font-bold text-[#1e3a5a] text-[11px] uppercase">Antrav</h4>
                    <p class="text-[9px] text-gray-400">PPIU No. 3456 Tahun 2017</p>
                    <span class="text-[8px] bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full font-bold">Resmi Kemenag</span>
                </div>
            </div>

        </div>

        <a href="#" class="inline-flex items-center gap-2 text-xs font-bold text-[#1e3a5a] hover:text-[#c29047] transition-colors group">
            Lihat Semua Mitra <span class="text-lg group-hover:translate-x-1 transition-transform">→</span>
        </a>
    </div>
</section>
        <section class="py-10">
    <div class="container mx-auto px-6 md:px-12">
        <div class="bg-blue-50/50 rounded-[40px] p-10 flex flex-col md:flex-row items-center justify-between gap-8 border border-blue-100/50">
            <div class="flex items-center gap-6">
                <div class="w-16 h-16 bg-white rounded-3xl flex items-center justify-center text-3xl shadow-sm">📅</div>
                <div class="max-w-md text-left">
                    <h3 class="text-xl font-bold text-[#1e3a5a] mb-1">Siap berangkat dengan travel resmi?</h3>
                    <p class="text-sm text-gray-500">Temukan paket Umrah terbaik dari mitra resmi kami dan wujudkan perjalanan ibadah Anda.</p>
                </div>
            </div>
            
            <a href="<?= base_url('packages') ?>" class="bg-[#1e3a5a] text-white px-10 py-4 rounded-2xl font-bold hover:bg-[#c29047] transition-all flex items-center gap-3 shadow-lg shadow-blue-900/10 whitespace-nowrap">
                Lihat Paket Umrah <span class="text-xl">→</span>
            </a>
        </div>
    </div>
</section>
    <?php endif; ?>   
    <?php if ($view == 'perbandingan'): ?>
    <section class="packages-header pt-32 pb-12 relative overflow-hidden">
            <div class="container mx-auto px-6 md:px-12 -mt-10 relative z-20">
                <nav class="flex text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-8 items-center gap-2">
                    <a href="<?= base_url('/') ?>" class="hover:text-[#c29047]">Home</a>
                    <span>/</span>
                    <span class="text-[#1e3a5a]">Perbandingan Mudah</span>
                </nav>
                
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="md:w-1/2">
                        <div class="inline-block px-4 py-2 bg-blue-50 rounded-full text-[#1e3a5a] text-[10px] font-bold uppercase tracking-widest mb-6">
                          ✨ Fitur Cerdas  
                        </div>
                        <h1 class="text-5xl md:text-6xl font-extrabold text-[#1e3a5a] leading-tight mb-6 uppercase tracking-tighter">
                            Perbandingan <br><span class="text-[#c29047]">Mudah</span>
                        </h1>
                        <p class="text-gray-500 text-lg leading-relaxed mb-8 italic">
                            Temukan harga terbaik dan fasilitas terlengkap <br class="hidden md:block"> dari berbagai travel terpercaya dalam satu tampilan.
                        </p>
                    </div>
                    <div class="md:w-1/2 relative">
                        <div class="absolute -top-10 -left-10 w-32 h-32 bg-[#c29047]/10 rounded-full blur-3xl"></div>
                        <img src="https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?q=80&w=800" 
                             class="rounded-[60px] shadow-2xl border-[15px] border-white relative z-10 w-full h-[400px] object-cover" alt="Makkah">
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-20 bg-white">
            <div class="container mx-auto px-6 md:px-12 -mt-25 relative z-20">
    <div class="bg-white/70 backdrop-blur-xl rounded-[40px] p-8 md:p-10 border border-white/40 shadow-2xl">
        <form action="<?= base_url('perbandingan') ?>" method="GET" id="filterForm">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase text-gray-400 ml-2">Kota Keberangkatan</label>
                    <select name="kota" id="selectKota" class="w-full bg-white/50 border border-gray-100 rounded-2xl px-4 py-3 text-sm">
                        <option value="">Semua Kota</option>
                        <optgroup label="Jawa">
            <option value="Jakarta">Jakarta</option>
            <option value="Surabaya">Surabaya</option>
            <option value="Bandung">Bandung</option>
            <option value="Semarang">Semarang</option>
            <option value="Yogyakarta">Yogyakarta</option>
            <option value="Malang">Malang</option>
            <option value="Solo">Solo</option>
        </optgroup>

        <optgroup label="Sumatera">
            <option value="Medan">Medan</option>
            <option value="Palembang">Palembang</option>
            <option value="Pekanbaru">Pekanbaru</option>
            <option value="Padang">Padang</option>
            <option value="Bandar Lampung">Bandar Lampung</option>
            <option value="Aceh">Banda Aceh</option>
        </optgroup>

        <optgroup label="Kalimantan">
            <option value="Balikpapan">Balikpapan</option>
            <option value="Banjarmasin">Banjarmasin</option>
            <option value="Pontianak">Pontianak</option>
            <option value="Samarinda">Samarinda</option>
        </optgroup>

        <optgroup label="Sulawesi & Papua">
            <option value="Makassar">Makassar</option>
            <option value="Manado">Manado</option>
            <option value="Palu">Palu</option>
            <option value="Kendari">Kendari</option>
            <option value="Jayapura">Jayapura</option>
        </optgroup>

        <optgroup label="Bali & Nusa Tenggara">
            <option value="Denpasar">Denpasar</option>
            <option value="Mataram">Mataram</option>
            <option value="Kupang">Kupang</option>
        </optgroup>
    </select>
</div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase text-gray-400 ml-2">Durasi</label>
                    <select name="durasi" id="selectDurasi" class="w-full bg-white/50 border border-gray-100 rounded-2xl px-4 py-3 text-sm">
                        <option value="">Semua Durasi</option>
                        <option value="9-12">9 - 12 Hari</option>
                        <option value="13+"> > 12 Hari</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase text-gray-400 ml-2">Maskapai</label>
                    <select name="maskapai" id="selectMaskapai" class="w-full bg-white/50 border border-gray-100 rounded-2xl px-4 py-3 text-sm">
                        <option value="">Semua Maskapai</option>
                        <option value="Garuda">Garuda Indonesia</option>
                        <option value="Saudia">Saudia Airlines</option>
                        <option value="Saudia">Lion Air</option>
                        <option value="Saudia">Batik Air</option>
                        <option value="Saudia">Emirates</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="text-[10px] font-bold uppercase text-gray-400 ml-2">Budget</label>
                    <select name="budget" id="selectBudget" class="w-full bg-white/50 border border-gray-100 rounded-2xl px-4 py-3 text-sm">
                        <option value="">Semua Budget</option>
                        <option value="low"> < 30 Juta</option>
                        <option value="mid">30 - 40 Juta</option>
                    </select>
                </div>

                <button type="submit" class="bg-[#1e3a5a] text-white rounded-2xl py-3.5 px-6 font-bold text-sm hover:bg-[#c29047] transition-all flex items-center justify-center gap-2.5 shadow-lg shadow-blue-900/10">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-4 h-4 fill-none stroke-current" 
         viewBox="0 0 24 24" 
         stroke-width="2.5" 
         stroke-linecap="round" 
         stroke-linejoin="round">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
    </svg>
    
    <span>Terapkan Filter</span>
</button>
            </div>
        </form>

        <div id="activeFiltersContainer" class="mt-8 pt-6 border-t border-gray-100/50 flex flex-wrap items-center gap-3 hidden">
            <span class="text-[10px] text-gray-400 font-bold uppercase mr-2">Filter aktif:</span>
            <div id="filterList" class="flex flex-wrap gap-2">
                </div>
            <button type="button" onclick="resetAllFilters()" class="flex items-center gap-2 text-[11px] font-bold text-blue-600 hover:text-[#c29047] transition-all ml-2 group">
    <svg xmlns="http://www.w3.org/2000/svg" 
         class="w-3.5 h-3.5 stroke-current fill-none group-hover:rotate-[-45deg] transition-transform duration-300" 
         viewBox="0 0 24 24" 
         stroke-width="2.5" 
         stroke-linecap="round" 
         stroke-linejoin="round">
        <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
        <path d="M3 3v5h5"/>
    </svg>
    <span class="tracking-wide">Reset Filter</span>
</button>
</div>
    </div>
</div>
    </section>
    <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6 md:px-12">
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-[#1e3a5a] mb-2">Bandingkan Paket</h2>
                <p class="text-gray-500 text-sm">Pilih hingga 3 paket untuk dibandingkan.</p>
            </div>
            <div class="flex items-center gap-6">
                <span class="text-sm font-semibold text-gray-400"><span id="compare-count" class="text-[#1e3a5a]">3</span>/3 paket dipilih</span>
                <button class="bg-white border border-gray-200 text-gray-700 px-6 py-2.5 rounded-xl font-bold text-sm hover:bg-gray-50 transition-all shadow-sm">
                    Ubah Paket
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-start">
            
            <div class="bg-white rounded-[24px] border border-gray-100 shadow-sm overflow-hidden mt-14">
                <div class="p-6 font-bold text-[#1e3a5a] border-b border-gray-50 bg-gray-50/50">Fitur yang Dibandingkan</div>
                <div class="flex flex-col text-sm text-gray-500 font-medium">
                    <div class="p-4 border-b border-gray-50 flex items-center gap-3">🏢 Travel</div>
                    <div class="p-4 border-b border-gray-50 flex items-center gap-3">🕒 Durasi</div>
                    <div class="p-4 border-b border-gray-50 flex items-center gap-3">✈️ Maskapai</div>
                    <div class="p-4 border-b border-gray-50 flex items-center gap-3 font-bold text-[#1e3a5a]">💰 Harga per Orang</div>
                    <div class="p-4 border-b border-gray-50 flex items-center gap-3">🕋 Hotel Makkah</div>
                    <div class="p-4 border-b border-gray-50 flex items-center gap-3">🕌 Hotel Madinah</div>
                    <div class="p-4 border-b border-gray-50 flex items-center gap-3">🍱 Makan</div>
                    <div class="p-4 border-b border-gray-50 flex items-center gap-3">🚌 Transportasi</div>
                    <div class="p-4 border-b border-gray-50 flex items-center gap-3">📋 Visa</div>
                    <div class="p-4 border-b border-gray-50 flex items-center gap-3">👤 Pembimbing</div>
                    <div class="p-4 border-b border-gray-50 flex items-center gap-3">⭐ Rating</div>
                    <div class="p-4 flex items-center gap-3">🎁 Fasilitas Unggulan</div>
                </div>
            </div>

            <div class="compare-card bg-white rounded-[24px] border-2 border-transparent shadow-md hover:border-blue-100 transition-all relative">
                <input type="checkbox" checked class="absolute top-6 left-6 w-5 h-5 accent-blue-600 z-20">
                <div class="p-6 pt-16 text-center border-b border-gray-50">
                    <img src="https://via.placeholder.com/40" class="mx-auto mb-3 rounded-full">
                    <h3 class="font-bold text-[#1e3a5a]">Amanah Wisata</h3>
                    <p class="text-[10px] text-gray-400">PPIU No. 9012 Tahun 2020</p>
                </div>
                <div class="flex flex-col text-sm text-center">
                    <div class="p-4 border-b border-gray-50">9 Hari</div>
                    <div class="p-4 border-b border-gray-50 font-medium">Garuda Indonesia</div>
                    <div class="p-4 border-b border-gray-50 font-bold text-blue-600 text-lg">Rp 29.900.000</div>
                    <div class="p-4 border-b border-gray-50">Makkah Towers ⭐5</div>
                    <div class="p-4 border-b border-gray-50">Dallah Taibah ⭐5</div>
                    <div class="p-4 border-b border-gray-50">3x Sehari (Menu Indo)</div>
                    <div class="p-4 border-b border-gray-50">Bus AC Executive</div>
                    <div class="p-4 border-b border-gray-50 text-green-600 font-bold">Termasuk</div>
                    <div class="p-4 border-b border-gray-50">Ust. Abdul Rahman</div>
                    <div class="p-4 border-b border-gray-50 text-yellow-500">⭐⭐⭐⭐⭐ (4.8)</div>
                    <div class="p-4 flex flex-wrap justify-center gap-2">
                        <span class="px-3 py-1 bg-gray-100 rounded-full text-[10px] font-bold text-gray-500 uppercase">Ziarah Lengkap</span>
                    </div>
                </div>
            </div>

            <div class="compare-card bg-white rounded-[24px] border-2 border-green-500 shadow-xl relative scale-105 z-10">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-green-500 text-white text-[10px] font-bold px-4 py-1 rounded-full uppercase tracking-widest">Paling Populer</div>
                <input type="checkbox" checked class="absolute top-6 left-6 w-5 h-5 accent-green-600 z-20">
                <div class="p-6 pt-16 text-center border-b border-gray-50">
                    <img src="https://via.placeholder.com/40" class="mx-auto mb-3 rounded-full">
                    <h3 class="font-bold text-[#1e3a5a]">Sahabat Umrah</h3>
                    <p class="text-[10px] text-gray-400">PPIU No. 5678 Tahun 2019</p>
                </div>
                <div class="flex flex-col text-sm text-center">
                    <div class="p-4 border-b border-gray-50">10 Hari</div>
                    <div class="p-4 border-b border-gray-50 font-medium text-green-600">Saudia Airlines</div>
                    <div class="p-4 border-b border-gray-50 font-bold text-green-600 text-lg">Rp 31.500.000</div>
                    <div class="p-4 border-b border-gray-50 font-bold">Swissôtel Makkah ⭐5</div>
                    <div class="p-4 border-b border-gray-50">Anwar Al Madinah ⭐5</div>
                    <div class="p-4 border-b border-gray-50">3x Sehari (Intl)</div>
                    <div class="p-4 border-b border-gray-50">Bus AC Executive</div>
                    <div class="p-4 border-b border-gray-50 text-green-600 font-bold">Termasuk</div>
                    <div class="p-4 border-b border-gray-50">Ust. M. Syafi'i</div>
                    <div class="p-4 border-b border-gray-50 text-yellow-500">⭐⭐⭐⭐⭐ (4.9)</div>
                    <div class="p-4 flex flex-wrap justify-center gap-2">
                        <span class="px-3 py-1 bg-green-50 rounded-full text-[10px] font-bold text-green-600 uppercase">Free Zamzam 5L</span>
                    </div>
                </div>
            </div>

            <div class="compare-card bg-white rounded-[24px] border-2 border-transparent shadow-md relative">
                <input type="checkbox" checked class="absolute top-6 left-6 w-5 h-5 accent-blue-600 z-20">
                <div class="p-6 pt-16 text-center border-b border-gray-50">
                    <img src="https://via.placeholder.com/40" class="mx-auto mb-3 rounded-full">
                    <h3 class="font-bold text-[#1e3a5a]">Barakah Madinah</h3>
                    <p class="text-[10px] text-gray-400">PPIU No. 3456 Tahun 2017</p>
                </div>
                </div>

        </div>
    </div>
</section>
    <section class="pb-20">
        <div class="container mx-auto px-6 md:px-12">
            <div class="bg-[#1e3a5a] rounded-[40px] p-10 flex flex-col md:flex-row items-center justify-between gap-8 shadow-2xl">
                <div class="flex items-center gap-6 text-white">
                    <div class="w-16 h-16 bg-white/10 rounded-3xl flex items-center justify-center text-3xl">🎧</div>
                    <div>
                        <h3 class="text-xl font-bold mb-1 uppercase tracking-tight">Belum yakin dengan pilihan Anda?</h3>
                        <p class="text-blue-200 text-sm italic">Konsultasikan gratis dengan tim ahli kami untuk paket terbaik.</p>
                    </div>
                </div>
                <a href="https://wa.me/yournumber" class="bg-[#c29047] text-white px-10 py-4 rounded-2xl font-bold hover:bg-white hover:text-[#1e3a5a] transition-all flex items-center gap-3">
                    📞 Konsultasi Gratis <span>→</span>
                </a>
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
                <div class="rounded-[50px] overflow-hidden shadow-2xl mb-10 relative group">
                    <img src="https://images.unsplash.com/photo-1564769662533-4f00a87b4056?q=80&w=1200" 
                         class="w-full h-[500px] object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute top-8 left-8 bg-white/90 backdrop-blur px-6 py-2 rounded-full text-[10px] font-bold text-[#1e3a5a] uppercase tracking-widest shadow-sm">
                        ✨ <?= $package->kategori ?> Package
                    </div>
                    <div class="absolute bottom-8 right-8 bg-[#1e3a5a]/80 backdrop-blur px-6 py-3 rounded-2xl border border-white/20">
                         <p class="text-[9px] text-blue-200 font-bold uppercase tracking-widest mb-1 text-right">Status Paket</p>
                         <p class="text-white font-black text-xs uppercase italic tracking-tighter">
                            <?= $package->status_crawling ?? 'Verified Active' ?>
                         </p>
                    </div>
                </div>

                <div class="mb-10">
                    <h1 class="text-5xl font-black text-[#1e3a5a] mb-2 uppercase tracking-tighter leading-none">
                        <?= $package->nama_paket ?>
                    </h1>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-[2px] bg-[#c29047]"></div>
                        <p class="text-[#c29047] font-bold text-sm tracking-widest uppercase">
                            Oleh: <?= $package->nama_agent ?>
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
                    <div class="bg-gray-50 p-6 rounded-[32px] border border-gray-100 shadow-sm">
                        <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mb-2">Durasi</p>
                        <p class="text-[#1e3a5a] font-black text-lg italic tracking-tighter">🕒 <?= $package->durasi_hari ?> Hari</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-[32px] border border-gray-100 shadow-sm">
                        <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mb-2">Rute</p>
                        <p class="text-[#1e3a5a] font-black text-lg uppercase tracking-tighter"><?= $package->rute ?></p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-[32px] border border-gray-100 shadow-sm">
                        <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mb-2">Miqat Awal</p>
                        <p class="text-[#1e3a5a] font-black text-lg uppercase tracking-tighter"><?= $package->miqat_awal ?></p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-[32px] border border-gray-100 shadow-sm">
                        <p class="text-[9px] text-gray-400 font-bold uppercase tracking-widest mb-2">Keberangkatan</p>
                        <p class="text-[#1e3a5a] font-black text-lg tracking-tighter"><?= date('d M Y', strtotime($package->tanggal_keberangkatan)) ?></p>
                    </div>
                </div>

                <div class="bg-[#1e3a5a] p-10 rounded-[40px] shadow-xl text-white">
                    <h3 class="text-lg font-bold uppercase tracking-widest mb-8 flex items-center gap-3">
                        <span class="w-2 h-2 bg-[#c29047] rounded-full"></span>
                        Akomodasi Penginapan
                    </h3>
                    <div class="grid md:grid-cols-2 gap-10">
                        <div class="flex items-start gap-4">
                            <div class="text-3xl">🕋</div>
                            <div>
                                <p class="text-[10px] text-blue-200 font-bold uppercase tracking-widest mb-1">Hotel Makkah</p>
                                <p class="text-xl font-black uppercase tracking-tight leading-tight"><?= $package->hotel_makkah ?></p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="text-3xl">🕌</div>
                            <div>
                                <p class="text-[10px] text-blue-200 font-bold uppercase tracking-widest mb-1">Hotel Madinah</p>
                                <p class="text-xl font-black uppercase tracking-tight leading-tight"><?= $package->hotel_madinah ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/3">
                <div class="sticky top-10 bg-white p-10 rounded-[50px] shadow-2xl border border-gray-100 overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-50/50 rounded-full blur-3xl"></div>
                    
                    <div class="relative z-10">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Total Harga Paket</p>
                        <h2 class="text-4xl font-black text-[#1e3a5a] mb-2 uppercase tracking-tighter">
                            Rp <?= number_format($package->harga_jual, 0, ',', '.') ?>
                        </h2>
                        <p class="text-[11px] text-gray-500 font-medium mb-8">*Harga sudah termasuk biaya visa & asuransi</p>
                        
                        <div class="space-y-4 mb-8">
                            <div class="flex justify-between text-sm border-b border-gray-50 pb-3">
                                <span class="text-gray-400">Tersedia</span>
                                <span class="font-bold text-[#1e3a5a]"><?= $package->total_seat ?> Kursi</span>
                            </div>
                            <div class="flex justify-between text-sm border-b border-gray-50 pb-3">
                                <span class="text-gray-400">Terdaftar</span>
                                <span class="font-bold text-[#1e3a5a]"><?= $package->jamaah_terdaftar ?> Jamaah</span>
                            </div>
                        </div>

                        <button class="w-full bg-[#1e3a5a] text-white py-5 rounded-3xl font-black hover:bg-[#c29047] transition-all shadow-xl shadow-blue-900/10 uppercase tracking-widest text-sm hover:-translate-y-1">
                            Booking Sekarang
                        </button>
                        
                        <p class="text-center mt-6 text-[10px] text-gray-400 font-bold uppercase tracking-widest">
                            Butuh bantuan? <a href="#" class="text-[#c29047] border-b border-[#c29047]">Hubungi CS</a>
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
<?php endif; ?>
    <?php if ($view == 'home' || $view == 'packages'): ?>
    <section class="py-20 container mx-auto px-6 md:px-12">
        <h2 class="text-3xl font-bold text-[#1e3a5a] mb-12 uppercase tracking-tighter">
            <?= ($view == 'home') ? 'Paket Pilihan' : 'Paket Unggulan' ?>
        </h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php if (!empty($packages)): foreach ($packages as $p): ?>
                <div class="bg-white rounded-[32px] overflow-hidden shadow-sm border border-gray-100 card-hover flex flex-col group transition-all duration-300 hover:shadow-xl">
                    <div class="p-6 flex flex-col flex-grow">
                        
                        <div class="mb-3">
                            <span class="bg-blue-50 text-[#1e3a5a] text-[9px] px-3 py-1 rounded-full font-bold uppercase tracking-widest border border-blue-100">
                                <?= $p->kategori ?> Package
                            </span>
                        </div>

                        <h4 class="font-bold text-lg text-[#1e3a5a] mb-1 leading-tight uppercase tracking-tighter min-h-[3rem]">
                            <?= $p->nama_paket ?>
                        </h4>
                        
                        <p class="text-[10px] text-[#c29047] font-extrabold mb-4 uppercase tracking-widest">
                            Rute: <?= $p->rute ?>
                        </p>

                        <div class="flex items-center gap-2 mb-6 text-gray-500 text-[11px] font-medium">
                            <span class="flex items-center gap-1">
                                🕒 <?= $p->durasi_hari ?> Hari Perjalanan
                            </span>
                        </div>

                        <div class="flex justify-between items-center border-t border-gray-50 pt-5 mt-auto">
                            <div>
                                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Harga Paket</p>
                                <p class="text-xl font-extrabold text-[#1e3a5a] uppercase tracking-tighter">
                                    Rp <?= number_format((float)$p->harga_jual, 0, ',', '.') ?>
                                </p>
                            </div>
                            
                            <a href="<?= base_url('packages/detail/' . $p->id) ?>" 
                               class="bg-[#1e3a5a] text-white p-3 rounded-2xl hover:bg-[#c29047] transition-all transform group-hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-none stroke-current" viewBox="0 0 24 24" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; else: ?>
                <div class="col-span-full text-center py-20 italic text-gray-400 uppercase tracking-widest">
                    Paket tidak ditemukan.
                </div>
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
    // --- INISIALISASI VARIABEL GLOBAL ---
    const inputField = document.getElementById('user-input');
    const chatWindow = document.getElementById('chat-window');
    const selects = document.querySelectorAll('#filterForm select');
    const filterList = document.getElementById('filterList');
    const container = document.getElementById('activeFiltersContainer');
    const urlParams = new URLSearchParams(window.location.search);

    const filterLabels = {
        'search': 'Cari',
        'paket_type': 'Tipe',
        'durasi': 'Durasi',
        'maskapai': 'Maskapai'
    };

    // --- EVENT DOM CONTENT LOADED ---
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Inisialisasi Filter Berdasarkan URL (Script Tambahanmu)
        let hasFilter = false;
        urlParams.forEach((value, key) => {
            if (value && filterLabels[key]) {
                hasFilter = true;
                const badge = document.createElement('div');
                badge.className = "flex items-center gap-2 bg-blue-50 text-[#1e3a5a] px-3 py-1 rounded-full text-[11px] font-bold border border-blue-100";
                
                let displayValue = value;
                if(key === 'durasi') displayValue += ' Hari';
                
                badge.innerHTML = `
                    <span class="opacity-60">${filterLabels[key]}:</span>
                    <span>${displayValue}</span>
                `;
                if (filterList) filterList.appendChild(badge);
            }
        });

        if (hasFilter && container) {
            container.classList.remove('hidden');
        }

        // 2. Logika Perbandingan Paket (Maksimal 3)
        const checkboxes = document.querySelectorAll('.compare-card input[type="checkbox"]');
        const compareCountDisplay = document.getElementById('compare-count');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const checkedCount = document.querySelectorAll('.compare-card input[type="checkbox"]:checked').length;
                
                if (checkedCount > 3) {
                    alert("Maksimal pilih 3 paket untuk dibandingkan.");
                    this.checked = false;
                    return;
                }

                if (compareCountDisplay) compareCountDisplay.innerText = checkedCount;

                const card = this.closest('.compare-card');
                if (card) {
                    if (!this.checked) {
                        card.classList.add('opacity-40', 'grayscale');
                    } else {
                        card.classList.remove('opacity-40', 'grayscale');
                    }
                }
            });
        });

        // 3. Inisialisasi Filter Chips Awal
        updateFilters();
    });

    // --- FUNGSI UPDATE FILTERS (DARI SCRIPT AWAL) ---
    function updateFilters() {
        if (!filterList) return;
        
        // Agar tidak duplikat dengan badge dari URL, kita bersihkan dulu
        // atau biarkan logic URL yang menangani saat load pertama
        let hasActive = false;

        selects.forEach(select => {
            if (select.value !== "") {
                hasActive = true;
                const label = select.previousElementSibling ? select.previousElementSibling.innerText : "Filter";
                const valueText = select.options[select.selectedIndex].text;

                const chip = document.createElement('div');
                chip.className = "flex items-center gap-2 bg-blue-50/50 border border-blue-100 px-3 py-1.5 rounded-full";
                chip.innerHTML = `
                    <span class="text-[10px] font-bold text-[#1e3a5a]">${label}: ${valueText}</span>
                    <button type="button" onclick="clearFilter('${select.id}')" class="text-blue-400 hover:text-red-500 text-xs">✕</button>
                `;
                filterList.appendChild(chip);
            }
        });

        if (container) container.classList.toggle('hidden', !hasActive && !urlParams.has('search'));
    }

    function clearFilter(id) {
        const el = document.getElementById(id);
        if (el) {
            el.value = "";
            updateFilters();
        }
    }

    function resetAllFilters() {
        // Gabungan: Kosongkan select DAN redirect untuk membersihkan URL
        if (selects) selects.forEach(select => select.value = "");
        window.location.href = "<?= base_url('packages') ?>";
    }

    // Jalankan updateFilters saat ada perubahan di select
    selects.forEach(select => {
        select.addEventListener('change', updateFilters);
    });

    // --- FITUR AI & MODAL ---
    function toggleAI() {
        const modal = document.getElementById('ai-modal');
        if (modal) {
            modal.style.display = (modal.style.display === 'flex') ? 'none' : 'flex';
            if (modal.style.display === 'flex' && inputField) inputField.focus();
        }
    }

    function bicara(teks) {
        window.speechSynthesis.cancel();
        const msg = new SpeechSynthesisUtterance(teks);
        msg.lang = 'id-ID';
        window.speechSynthesis.speak(msg);
    }

    function mulaiVoice() {
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (!SpeechRecognition) return alert("Browser tidak mendukung suara");

        const recognition = new SpeechRecognition();
        recognition.lang = 'id-ID';
        const micBtn = document.getElementById('mic-btn');

        recognition.onstart = () => { if(micBtn) micBtn.classList.add('listening'); };
        recognition.onend = () => { if(micBtn) micBtn.classList.remove('listening'); };
        
        recognition.onresult = (event) => {
            if (inputField) {
                inputField.value = event.results[0][0].transcript;
                tanyaAI();
            }
        };
        recognition.start();
    }

    async function tanyaAI() {
        if (!inputField || !chatWindow) return;
        const pesan = inputField.value.trim();
        if(!pesan) return;

        chatWindow.innerHTML += `<div class="bubble user">${pesan}</div>`;
        inputField.value = '';
        chatWindow.scrollTop = chatWindow.scrollHeight;

        try {
            const response = await fetch('<?= base_url("ai/proses") ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'pesan=' + encodeURIComponent(pesan)
            });
            const data = await response.json();
            chatWindow.innerHTML += `<div class="bubble ai">${data.jawaban}</div>`;
            chatWindow.scrollTop = chatWindow.scrollHeight;
        } catch (e) {
            console.error(e);
        }
    }

    if (inputField) {
        inputField.addEventListener("keydown", (e) => { if (e.key === "Enter") tanyaAI(); });
    }
</script>

</body>
</html>