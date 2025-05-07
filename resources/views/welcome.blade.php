<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELearning SMA</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-white text-gray-800 font-sans relative">

<!-- Loading Spinner -->
<div id="loader" class="fixed inset-0 bg-white flex items-center justify-center z-50">
    <i class="fas fa-spinner fa-spin text-blue-600 text-4xl"></i>
</div>

<!-- HEADER / NAVBAR -->
<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-700"><i class="fas fa-graduation-cap mr-2"></i>PELiS SMA N 1 Lahat</h1>
        <nav class="space-x-4 hidden md:flex">
            <a href="#fitur" class="text-gray-600 hover:text-blue-600 transition">Fitur</a>
            <a href="#testimoni" class="text-gray-600 hover:text-blue-600 transition">Testimoni</a>
            <a href="/login" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Masuk</a>
        </nav>
    </div>
</header>

<!-- HERO SECTION -->
<section class="bg-gradient-to-br from-blue-600 to-indigo-700 text-white py-24 relative">
    <div class="absolute top-0 left-0 w-full h-full">
        <svg class="w-full h-full opacity-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,96L1440,224L1440,320L0,320Z"></path>
        </svg>
    </div>
    <div class="max-w-6xl mx-auto px-6 text-center relative z-10">
        <h1 class="text-4xl md:text-6xl font-bold mb-4" data-aos="fade-down">Belajar Lebih Seru & Interaktif!</h1>
        <p class="text-lg md:text-xl mb-6" data-aos="fade-up">Platform eLearning inovatif untuk siswa dan guru SMA N 1 Lahat.</p>
        <a href="/register" class="bg-yellow-300 text-blue-900 font-bold px-8 py-3 rounded-full hover:scale-105 hover:bg-yellow-400 transition-transform duration-300 shadow-md" data-aos="zoom-in">
            Daftar Sekarang
        </a>
    </div>
</section>

<!-- FITUR UTAMA -->
<section id="fitur" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold" data-aos="fade-up">📚 Fitur Unggulan</h2>
            <p class="text-gray-600 mt-2" data-aos="fade-up">Dirancang khusus untuk pembelajaran efektif & menyenangkan.</p>
        </div>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition" data-aos="fade-up">
                <i class="fas fa-video text-indigo-500 text-4xl mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Video Pembelajaran</h3>
                <p class="text-gray-600">Materi SMA lengkap dari guru berpengalaman dalam bentuk video interaktif.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-comments text-green-500 text-4xl mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Forum Diskusi</h3>
                <p class="text-gray-600">Tanya jawab langsung bersama teman atau guru kapan saja.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-chart-pie text-yellow-500 text-4xl mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Laporan Belajar</h3>
                <p class="text-gray-600">Pantau perkembangan kamu secara berkala dan dapatkan feedback.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition" data-aos="fade-up">
                <i class="fas fa-file-alt text-pink-500 text-4xl mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Bank Soal & Kuis</h3>
                <p class="text-gray-600">Latihan soal dan kuis interaktif untuk semua mata pelajaran.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-mobile-alt text-blue-500 text-4xl mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Akses Mobile</h3>
                <p class="text-gray-600">Belajar kapan saja, di mana saja lewat HP atau tablet kamu.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-laptop-code text-purple-500 text-4xl mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Web Interaktif</h3>
                <p class="text-gray-600">Belajar langsung dengan simulasi interaktif seperti lab virtual, quiz real-time, dan pemrograman online.</p>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONI -->
<section id="testimoni" class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold" data-aos="fade-up">💬 Apa Kata Mereka?</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-6 rounded-lg shadow text-center" data-aos="fade-up">
                <p class="italic text-gray-600 mb-4">“ELearning ini sangat membantu saya memahami pelajaran yang sulit di sekolah.”</p>
                <h4 class="font-semibold text-blue-700">– Lina, Kelas 11</h4>
            </div>
            <div class="bg-gray-50 p-6 rounded-lg shadow text-center" data-aos="fade-up" data-aos-delay="100">
                <p class="italic text-gray-600 mb-4">“Forum diskusinya seru! Bisa ngobrol langsung sama guru & teman.”</p>
                <h4 class="font-semibold text-blue-700">– Fajar, Kelas 10</h4>
            </div>
            <div class="bg-gray-50 p-6 rounded-lg shadow text-center" data-aos="fade-up" data-aos-delay="200">
                <p class="italic text-gray-600 mb-4">“Banyak fitur menarik dan tampilannya enak banget buat belajar.”</p>
                <h4 class="font-semibold text-blue-700">– Siska, Kelas 12</h4>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-gradient-to-br from-indigo-600 to-blue-700 text-white text-center">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="text-3xl md:text-4xl font-bold mb-4" data-aos="fade-down">Yuk, Bergabung Sekarang!</h2>
        <p class="text-lg mb-6" data-aos="fade-up">Tingkatkan cara belajarmu bersama ELearning PELiS SMA N 1 Lahat. Mudah, dan menyenangkan!</p>
        <a href="/register" class="bg-yellow-300 text-blue-800 font-bold px-8 py-3 rounded-full hover:bg-yellow-400 transition" data-aos="zoom-in">
            Daftar
        </a>
    </div>
</section>

<!-- Floating WhatsApp -->
<a href="https://wa.me/62895346053848" target="_blank" class="fixed bottom-6 right-6 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition" title="Hubungi Kami">
    <i class="fab fa-whatsapp text-2xl"></i>
</a>

<!-- FOOTER -->
<footer class="bg-gray-900 text-gray-300 py-8">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <p class="text-sm">&copy; {{ date('Y') }} ELearning SMA. Dibuat dengan 💙 untuk pendidikan Indonesia.</p>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
    window.addEventListener('load', function () {
        document.getElementById('loader').style.display = 'none';
    });
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute("href")).scrollIntoView({ behavior: "smooth" });
        });
    });
</script>

</body>
</html>