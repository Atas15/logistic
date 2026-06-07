@extends('layouts.app')

@section('content')
<!-- Hero Section: Animasyonlu Gradyan Arka Plan -->
<div class="hero-wrapper position-relative overflow-hidden text-white" style="margin-top: 100px !important;">
    <div class="animated-bg"></div>
    
    <div class="container position-relative py-5">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-7 text-center text-lg-start animate__animated animate__fadeInLeft">
                <div class="glass-badge mb-4 d-inline-block">
                    <span class="badge rounded-pill text-uppercase tracking-widest">
                        <i class="fas fa-star me-2 text-warning"></i>Next-Gen Logistics
                    </span>
                </div>
                <h1 class="display-2 fw-bolder mb-4 lh-sm">
                    The Future of <br>
                    <span class="text-gradient">{{ $mode->title }}</span>
                </h1>
                <p class="lead mb-5 opacity-75 fs-4 fw-light" style="max-width: 600px;">
                    {{ $mode->description }}
                </p>
                <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
                    <a href="#details" class="btn btn-primary btn-cta rounded-pill">
                        Explore Now <i class="fas fa-chevron-down ms-2"></i>
                    </a>
                    <a href="https://wa.me/yournumber" class="btn btn-glass rounded-pill">
                        Quick Quote
                    </a>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block text-center animate__animated animate__zoomIn">
                <div class="hero-image-frame shadow-2xl">
                    <img src="{{ asset('images/' . $mode->code . '.png') }}" 
                         alt="{{ $mode->title }}" 
                         class="img-fluid floating-img">
                    
                    <!-- Dekoratif Elementler -->
                    <div class="blob-bg"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section: Glassmorphism Kartlar -->
<div class="container" id="details" style="margin-top: -50px;">
    <div class="row g-4">
        @php
            $features = [
                ['icon' => 'fa-globe-americas', 'title' => 'Global Network', 'text' => 'Seamlessly connecting over 150+ ports.', 'color' => 'primary'],
                ['icon' => 'fa-fingerprint', 'title' => 'Smart Tracking', 'text' => 'AI-powered real-time surveillance.', 'color' => 'success'],
                ['icon' => 'fa-leaf', 'title' => 'Eco-Friendly', 'text' => 'Optimized carbon footprint routes.', 'color' => 'info']
            ];
        @endphp
        @foreach($features as $f)
        <div class="col-md-4">
            <div class="glass-card border-0 p-5 h-100 shadow-hover">
                <div class="icon-box-modern mb-4 bg-{{ $f['color'] }}-soft">
                    <i class="fas {{ $f['icon'] }} text-{{ $f['color'] }}"></i>
                </div>
                <h4 class="fw-bold">{{ $f['title'] }}</h4>
                <p class="text-muted mb-0 lh-lg">{{ $f['text'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Interactive Detail Section -->
<div class="container py-5 my-5">
    <div class="row align-items-center g-5">
        <div class="col-lg-6 order-2 order-lg-1">
            <div class="image-stack position-relative">
                <div class="rounded-5 overflow-hidden shadow-2xl main-img">
                    <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&q=80&w=800" class="img-fluid" alt="Logistics">
                </div>
                <div class="floating-data-card shadow-lg p-3 rounded-4 bg-white animate__animated animate__pulse animate__infinite">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-success rounded-circle p-2 text-white">
                            <i class="fas fa-check"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block">Live Status</small>
                            <span class="fw-bold">Active Delivery</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
            <h6 class="text-primary fw-bold text-uppercase mb-3 tracking-widest">Excellence in Motion</h6>
            <h2 class="display-5 fw-bold mb-4">Why we lead in {{ $mode->title }}?</h2>
            
            <div class="benefit-item d-flex gap-4 mb-4">
                <div class="benefit-number">01</div>
                <div>
                    <h5 class="fw-bold">Advanced Logistics AI</h5>
                    <p class="text-muted">We use machine learning to predict the fastest routes and avoid delays.</p>
                </div>
            </div>
            <div class="benefit-item d-flex gap-4 mb-4">
                <div class="benefit-number">02</div>
                <div>
                    <h5 class="fw-bold">White-Glove Handling</h5>
                    <p class="text-muted">Every package is treated as high-priority with specialized care protocols.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Modern Renkler ve Font Ayarları */
    :root {
        --glass-bg: rgba(255, 255, 255, 0.95);
        --primary-gradient: linear-gradient(135deg, #0d6efd 0%, #00d2ff 100%);
    }

    /* Animasyonlu Arka Plan */
    .hero-wrapper {
        background: #0f172a;
        min-height: 80vh;
        display: flex;
        align-items: center;
    }
    .animated-bg {
        position: absolute;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 20% 30%, rgba(13, 110, 253, 0.15) 0%, transparent 50%),
                    radial-gradient(circle at 80% 70%, rgba(0, 210, 255, 0.15) 0%, transparent 50%);
    }

    /* Text Gradient */
    .text-gradient {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Glassmorphism Badge & Card */
    .glass-badge {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 5px;
        border-radius: 50px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .glass-card {
        background: var(--glass-bg);
        backdrop-filter: blur(15px);
        border-radius: 2rem;
        transition: all 0.4s ease;
    }
    .shadow-hover:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15) !important;
    }

    /* Hero İkon Efekti */
    .hero-icon-blob {
        background: rgba(13, 110, 253, 0.1);
        width: 300px;
        height: 300px;
        margin: auto;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: blob 10s infinite alternate;
    }
    .main-floating-icon {
        font-size: 8rem;
        color: #0d6efd;
        filter: drop-shadow(0 0 20px rgba(13, 110, 253, 0.5));
    }

    /* Butonlar */
    .btn-cta {
        padding: 18px 40px;
        font-weight: 700;
        box-shadow: 0 10px 20px rgba(13, 110, 253, 0.3);
    }
    .btn-glass {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
        padding: 18px 40px;
        backdrop-filter: blur(10px);
    }
    .btn-glass:hover {
        background: white;
        color: black;
    }

    /* Detay Bölümü Görsel Efektleri */
    .image-stack .main-img {
        transform: perspective(1000px) rotateY(-5deg);
    }
    .floating-data-card {
        position: absolute;
        bottom: 30px;
        left: -20px;
        min-width: 200px;
        border-left: 5px solid #198754;
    }

    .benefit-number {
        font-size: 1.5rem;
        font-weight: 900;
        color: #0d6efd;
        background: rgba(13, 110, 253, 0.1);
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
    }

    @keyframes blob {
        0% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
        100% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; }
    }

    .bg-primary-soft { background: rgba(13, 110, 253, 0.1); }
    .bg-success-soft { background: rgba(25, 135, 84, 0.1); }
    .bg-info-soft { background: rgba(13, 202, 240, 0.1); }

    .icon-box-modern {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        font-size: 1.5rem;
    }

    .hero-image-frame {
        position: relative;
        padding: 20px;
    }

    .floating-img {
        width: 100%;
        filter: drop-shadow(0 20px 50px rgba(0,0,0,0.5));
        animation: floatImg 6s ease-in-out infinite;
        z-index: 2;
        position: relative;
    }

    .blob-bg {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        height: 400px;
        background: var(--primary-gradient);
        filter: blur(80px);
        opacity: 0.3;
        z-index: 1;
        border-radius: 50%;
    }

    @keyframes floatImg {
        0%, 100% { transform: translateY(0); rotate: 0deg; }
        50% { transform: translateY(-30px); rotate: 2deg; }
    }
</style>

<!-- Animate.css kütüphanesini layouts dosyanızda yoksa ekleyin -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection