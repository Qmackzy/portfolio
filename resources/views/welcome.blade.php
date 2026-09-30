<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Safril Furqon Isnaini | IT Support</title>

    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container nav-container">

            <a href="#" class="logo">
                SAFRIL<span>.</span>
            </a>

            <div class="nav-menu">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#experience">Experience</a>
                <a href="#projects">Projects</a>
                <a href="#contact">Contact</a>
            </div>

        </div>
    </nav>


    <!-- Hero -->
    <section id="home" class="hero">

        <div class="container hero-container">

            <div class="hero-content">

                <p class="greeting">
                    Halo, saya
                </p>

                <h1>
                    Safril Furqon Isnaini
                </h1>

                <h2>
                    IT Support <span>&</span> Web Developer
                </h2>

                <p class="hero-description">
                    IT Support dengan pengalaman 2 tahun di PT. Angkasa Pura Suport,
                    serta memiliki kemampuan dalam PHP, Laravel, dan MySQL.
                </p>

                <div class="hero-buttons">
                    <a href="#projects" class="btn btn-primary">
                        Lihat Proyek
                    </a>

                    <a href="#contact" class="btn btn-outline">
                        Hubungi Saya
                    </a>
                </div>

            </div>

            <div class="hero-card">

                <div class="profile-circle">
                    <img src="{{ asset('images/profile.jpg') }}" alt="Foto Safril Furqon Isnaini">
                </div>

                <h3>IT Support</h3>

                <p>
                    Laravel • PHP • MySQL
                </p>

                <div class="location">
                    📍 Lombok Barat, Indonesia
                </div>

            </div>

        </div>

    </section>


    <!-- About -->
    <section id="about" class="section">

        <div class="container">

            <div class="section-title">
                <p>ABOUT ME</p>
                <h2>Tentang Saya</h2>
            </div>

            <div class="about-content">

                <div>
                    <h3>IT Support dengan ketertarikan pada Web Development</h3>
                </div>

                <div>
                    <p>
                        Saya adalah seorang IT Support dengan pengalaman 2 tahun
                        di PT. Angkasa Pura Suport. Saya memiliki latar belakang
                        pendidikan D3 Sistem Informasi.
                    </p>

                    <p>
                        Selain pengalaman di bidang IT Support, saya memiliki
                        kemampuan dalam pengembangan aplikasi berbasis web
                        menggunakan PHP, Laravel, dan MySQL.
                    </p>

                    <p>
                        Saya terus mengembangkan kemampuan di bidang teknologi
                        informasi dan tertarik membangun sistem yang dapat
                        membantu kebutuhan operasional dan bisnis.
                    </p>
                </div>

            </div>

        </div>

    </section>


    <!-- Skills -->
    <section id="skills" class="section section-dark">
        <div class="skills-grid">
            @foreach ($skills as $skill)
                <div class="skill-card">
                    <div class="skill-icon">{{ $skill->icon }}</div>
                    <h3>{{ $skill->name }}</h3>
                    <p>{{ $skill->description }}</p>
                </div>
            @endforeach
        </div>
    </section>


    <!-- Experience -->
    <section id="experience" class="section">

        <div class="container">

            <div class="section-title">
                <p>EXPERIENCE</p>
                <h2>Pengalaman</h2>
            </div>

            <div class="experience-card">

                <div class="experience-year">
                    2 Tahun
                </div>

                <div>
                    <h3>IT Support</h3>

                    <h4>PT. Angkasa Pura Suport</h4>

                    <p>
                        Memiliki pengalaman selama 2 tahun sebagai IT Support
                        dengan fokus pada dukungan teknis, troubleshooting,
                        serta membantu kebutuhan teknologi informasi di
                        lingkungan kerja.
                    </p>
                </div>

            </div>

        </div>

    </section>


    <!-- Projects -->
    <section id="projects" class="section section-dark">
        <div class="projects-container">
            @foreach ($projects as $project)
                <div class="project-card">
                    <div class="project-content">
                        <span class="project-label">{{ $project->label }}</span>
                        <h3>{{ $project->title }}</h3>
                        <p>{{ $project->description }}</p>

                        <div class="technology">
                            @foreach ($project->technologies as $tech)
                                <span>{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


    <!-- Education -->
    <section class="section">

        <div class="container">

            <div class="section-title">
                <p>EDUCATION</p>
                <h2>Pendidikan</h2>
            </div>

            <div class="education-card">

                <div class="education-icon">
                    🎓
                </div>

                <div>
                    <h3>D3 Sistem Informasi</h3>
                    <p>
                        Sistem Informasi
                    </p>
                </div>

            </div>

        </div>

    </section>


    <!-- Contact -->
    <section id="contact" class="section contact-section">
        <div class="container">
            <div class="section-title">
                <p>CONTACT</p>
                <h2>Hubungi Saya</h2>
            </div>

            <div class="contact-content">
                <div class="contact-info">
                    <p>
                        Tertarik untuk berdiskusi atau bekerja sama?
                        Silakan hubungi saya melalui kontak berikut atau isi formulir di samping.
                    </p>

                    <div class="contact-list">
                        <a href="mailto:safrilisnaini45@gmail.com">
                            📧 safrilisnaini45@gmail.com
                        </a>
                        <a href="https://wa.me/62895360584472" target="_blank">
                            📱 0895360584472
                        </a>
                        <span>
                            📍 Lombok Barat, Indonesia
                        </span>
                    </div>
                </div>

                <!-- Form Kontak -->
                <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
                    @csrf

                    {{-- Notifikasi Sukses --}}
                    @if (session('success'))
                        <div class="alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="form-control">
                        @error('name')
                            <small style="color: #ef4444;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="form-control">
                        @error('email')
                            <small style="color: #ef4444;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea name="message" id="message" rows="4" required class="form-control">{{ old('message') }}</textarea>
                        @error('message')
                            <small style="color: #ef4444;">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer>

        <div class="container">

            <p>
                © {{ date('Y') }} Safril Furqon Isnaini. All Rights Reserved.
            </p>

        </div>

    </footer>

</body>

</html>
