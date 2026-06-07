@extends('layouts.app')

@section('content')

<div class="modes-page-wrapper" style="margin-top:70px; min-height:100vh;">

    <div class="grid-pattern"></div>

    <div class="abstract-circles">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
    </div>

    <section class="services-section py-5 position-relative">

        <div class="container py-5">

            <!-- HEADER -->

            <div class="text-center mb-5">

                <span class="section-badge">
                    GLOBAL LOGISTICS SOLUTIONS
                </span>

                <h1 class="hero-title mt-4">
                    Hizmet Alanlarımız
                </h1>

                <p class="hero-description">
                    Hava, kara ve deniz taşımacılığında yüklerinizi dünyanın
                    her noktasına güvenli, hızlı ve optimize çözümlerle ulaştırıyoruz.
                </p>

            </div>

            <div class="row g-4 justify-content-center">

                @foreach($modes as $mode)

                    <div class="col-lg-4 col-md-6">

                        <a href="{{ route('client.transport_modes.show', $mode->code) }}"
                           class="text-decoration-none">

                            <div class="service-card-modern">

                                <!-- IMAGE -->

                                <div class="card-image-wrapper">

                                    <div class="service-badge">
                                        Premium Service
                                    </div>

                                    <div class="mode-icon-floating">

                                        <i class="fas
                                        {{ $mode->code == 'air'
                                            ? 'fa-plane'
                                            : ($mode->code == 'sea'
                                                ? 'fa-ship'
                                                : 'fa-truck') }}">
                                        </i>

                                    </div>

                                    <img
                                        src="{{ asset('images/' . $mode->code . '.png') }}"
                                        alt="{{ $mode->title }}"
                                        class="main-mode-img"
                                    >

                                    <div class="image-overlay"></div>

                                </div>

                                <!-- CONTENT -->

                                <div class="card-content-modern">

                                    <h3>
                                        {{ $mode->title }}
                                    </h3>

                                    <p>
                                        {{ Str::limit($mode->description, 120) }}
                                    </p>

                                    <div class="learn-more-btn-modern">

                                        <span>Detaylı İncele</span>

                                        <i class="fas fa-arrow-right"></i>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                @endforeach

                <!-- STATS SECTION -->

                <div class="row mt-5 pt-5">
                
                
                    <div class="col-12">
                    
                        <div class="stats-section">
                    
                            <div class="row g-4">
                    
                                <div class="col-lg-3 col-md-6">
                                    <div class="stat-card">
                                        <h2>150+</h2>
                                        <span>Ülkeye Teslimat</span>
                                    </div>
                                </div>
                    
                                <div class="col-lg-3 col-md-6">
                                    <div class="stat-card">
                                        <h2>25K+</h2>
                                        <span>Başarılı Gönderi</span>
                                    </div>
                                </div>
                    
                                <div class="col-lg-3 col-md-6">
                                    <div class="stat-card">
                                        <h2>99.8%</h2>
                                        <span>Zamanında Teslimat</span>
                                    </div>
                                </div>
                    
                                <div class="col-lg-3 col-md-6">
                                    <div class="stat-card">
                                        <h2>24/7</h2>
                                        <span>Operasyon Desteği</span>
                                    </div>
                                </div>
                    
                            </div>
                    
                        </div>
                    
                    </div>
                    
                    
                    </div>
                    
                    <!-- CTA SECTION -->
                    
                    <div class="cta-modern-section">
                    
                    
                    <div class="cta-glow"></div>
                    
                    <div class="cta-content">
                    
                        <span class="cta-badge">
                            GLOBAL FREIGHT NETWORK
                        </span>
                    
                        <h2>
                            Taşımacılık Sürecinizi
                            Dijitalleştirmeye Hazır mısınız?
                        </h2>
                    
                        <p>
                            Hava, kara ve deniz taşımacılığında ihtiyaçlarınıza özel
                            çözümler sunuyoruz. Operasyonlarınızı daha hızlı,
                            daha güvenli ve daha verimli hale getirin.
                        </p>
                    
                        <div class="cta-buttons">
                    
                            <a href="/contact" class="btn-primary-modern">
                                Teklif Al
                            </a>
                    
                            <a href="/services" class="btn-secondary-modern">
                                Hizmetleri İncele
                            </a>
                    
                        </div>
                    
                    </div>


                </div>


            </div>

        </div>

    </section>

</div>

<style>

/* =======================================================
   PAGE
======================================================= */

.modes-page-wrapper{
    position:relative;
    overflow:hidden;
    background:#f8fafc;
}

/* =======================================================
   GRID
======================================================= */

.grid-pattern{
    position:absolute;
    inset:0;

    background-image:
        linear-gradient(rgba(0,0,0,.025) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0,0,0,.025) 1px, transparent 1px);

    background-size:40px 40px;
}

/* =======================================================
   CIRCLES
======================================================= */

.abstract-circles .circle{
    position:absolute;
    border-radius:50%;
    z-index:0;
}

.circle-1{
    width:500px;
    height:500px;
    top:-200px;
    right:-150px;

    background:
    radial-gradient(
        circle,
        rgba(13,110,253,.15),
        transparent
    );
}

.circle-2{
    width:400px;
    height:400px;
    bottom:-100px;
    left:-100px;

    background:
    radial-gradient(
        circle,
        rgba(0,210,255,.12),
        transparent
    );
}

/* =======================================================
   HEADER
======================================================= */

.section-badge{
    display:inline-block;

    padding:10px 20px;

    border-radius:50px;

    background:white;

    border:1px solid rgba(13,110,253,.15);

    color:#0d6efd;

    font-size:.8rem;
    font-weight:700;
    letter-spacing:2px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.04);
}

.hero-title{
    font-size:clamp(2.5rem,5vw,4rem);
    font-weight:900;
    color:#111827;
}

.hero-description{
    max-width:700px;
    margin:auto;

    color:#6b7280;
    font-size:1.1rem;
    line-height:1.8;
}

/* =======================================================
   CARD
======================================================= */

.service-card-modern{

    position:relative;

    background:rgba(255,255,255,.9);

    backdrop-filter:blur(20px);

    border-radius:28px;

    overflow:hidden;

    height:100%;

    transition:.45s ease;

    box-shadow:
    0 15px 40px rgba(0,0,0,.06);
}

/* gradient border */

.service-card-modern::before{

    content:'';

    position:absolute;
    inset:0;

    padding:1px;

    border-radius:28px;

    background:
    linear-gradient(
        135deg,
        rgba(13,110,253,.25),
        rgba(0,210,255,.25)
    );

    -webkit-mask:
        linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);

    -webkit-mask-composite:xor;

    mask-composite:exclude;
}

/* shine */

.service-card-modern::after{

    content:'';

    position:absolute;

    top:-120%;
    left:-120%;

    width:220%;
    height:220%;

    background:
    linear-gradient(
        45deg,
        transparent,
        rgba(255,255,255,.4),
        transparent
    );

    transform:rotate(25deg);

    transition:.9s;
}

.service-card-modern:hover::after{

    top:100%;
    left:100%;
}

/* =======================================================
   IMAGE
======================================================= */

.card-image-wrapper{

    height:260px;

    position:relative;

    display:flex;
    justify-content:center;
    align-items:center;

    background:
    linear-gradient(
        180deg,
        #ffffff,
        #f1f5f9
    );
}

.main-mode-img{

    width:170px;

    position:relative;

    z-index:2;

    animation:floatImage 5s ease-in-out infinite;
}

@keyframes floatImage{

    0%{
        transform:translateY(0px);
    }

    50%{
        transform:translateY(-10px);
    }

    100%{
        transform:translateY(0px);
    }
}

.image-overlay{

    position:absolute;
    bottom:0;
    width:100%;
    height:80px;

    background:
    linear-gradient(
        to top,
        white,
        transparent
    );
}

/* =======================================================
   BADGE
======================================================= */

.service-badge{

    position:absolute;

    top:20px;
    left:20px;

    padding:8px 14px;

    background:rgba(255,255,255,.9);

    backdrop-filter:blur(12px);

    border-radius:30px;

    font-size:.75rem;
    font-weight:700;

    z-index:5;

    box-shadow:
    0 10px 20px rgba(0,0,0,.06);
}

/* =======================================================
   ICON
======================================================= */

.mode-icon-floating{

    position:absolute;

    top:20px;
    right:20px;

    width:50px;
    height:50px;

    border-radius:16px;

    background:rgba(255,255,255,.9);

    display:flex;
    justify-content:center;
    align-items:center;

    color:#0d6efd;

    font-size:1.2rem;

    z-index:5;

    box-shadow:
    0 10px 25px rgba(0,0,0,.08);
}

/* =======================================================
   CONTENT
======================================================= */

.card-content-modern{

    padding:30px;
    text-align:center;
}

.card-content-modern h3{

    font-weight:800;
    color:#111827;

    margin-bottom:15px;

    transition:.3s;
}

.card-content-modern p{

    color:#6b7280;

    line-height:1.8;

    margin-bottom:25px;
}

/* =======================================================
   BUTTON
======================================================= */

.learn-more-btn-modern{

    display:inline-flex;

    align-items:center;

    gap:12px;

    padding:14px 22px;

    border-radius:14px;

    background:
    linear-gradient(
        135deg,
        #0d6efd,
        #00d2ff
    );

    color:white;

    font-weight:700;

    transition:.35s;
}

.learn-more-btn-modern i{
    transition:.35s;
}

.service-card-modern:hover
.learn-more-btn-modern i{

    transform:translateX(6px);
}

/* =======================================================
   HOVER
======================================================= */

.service-card-modern:hover{

    transform:
    translateY(-12px)
    scale(1.02);

    box-shadow:
    0 35px 70px rgba(13,110,253,.18);
}

.service-card-modern:hover h3{
    color:#0d6efd;
}

.service-card-modern:hover .main-mode-img{
    transform:scale(1.1);
}

/* ==========================================
   PREMIUM EFFECTS
========================================== */

.modes-page-wrapper::after{
    content:'';
    position:absolute;
    inset:0;
    pointer-events:none;
    opacity:.03;
    background-image:
    url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='120' height='120'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.8'/%3E%3C/filter%3E%3Crect width='120' height='120' filter='url(%23n)' opacity='.6'/%3E%3C/svg%3E");
}

/* ==========================================
   HERO TITLE
========================================== */

.hero-title{

    background:
    linear-gradient(
        135deg,
        #0d6efd,
        #00d2ff
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;

    font-size:clamp(2.8rem,5vw,4.5rem);
}

/* ==========================================
   BADGE ANIMATION
========================================== */

.service-badge{
    animation:pulseBadge 3s infinite;
}

@keyframes pulseBadge{

    0%{
        box-shadow:
        0 0 0 0 rgba(13,110,253,.35);
    }

    70%{
        box-shadow:
        0 0 0 15px rgba(13,110,253,0);
    }

    100%{
        box-shadow:
        0 0 0 0 rgba(13,110,253,0);
    }
}

/* ==========================================
   CARD ANIMATION
========================================== */

.service-card-modern{

    animation:cardAppear .8s ease forwards;

    opacity:0;

    transform:translateY(40px);

    isolation:isolate;
}

@keyframes cardAppear{

    to{
        opacity:1;
        transform:translateY(0);
    }
}

.service-card-modern .card-content-modern,
.service-card-modern .card-image-wrapper{
    position:relative;
    z-index:2;
}

/* ==========================================
   CARD HOVER
========================================== */

.service-card-modern:hover{

    transform:
    translateY(-12px)
    scale(1.03);

    box-shadow:
    0 40px 80px rgba(13,110,253,.18),
    0 0 60px rgba(0,210,255,.15);
}

.service-card-modern:hover h3{
    color:#0d6efd;
}

.service-card-modern:hover .main-mode-img{
    transform:scale(1.12);
}

/* ==========================================
   BUTTON SHINE
========================================== */

.learn-more-btn-modern{

    position:relative;
    overflow:hidden;
}

.learn-more-btn-modern::before{

    content:'';

    position:absolute;

    top:0;
    left:-100%;

    width:100%;
    height:100%;

    background:
    linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,.4),
        transparent
    );

    transition:.7s;
}

.learn-more-btn-modern:hover::before{
    left:100%;
}

/* ==========================================
   ICON HOVER
========================================== */

.mode-icon-floating{
    transition:.4s;
}

.service-card-modern:hover .mode-icon-floating{

    transform:
    rotate(10deg)
    scale(1.1);

    background:#0d6efd;
    color:white;
}

/* ==========================================
   IMAGE EFFECT
========================================== */

.main-mode-img{
    transition:.5s ease;
}

.service-card-modern:hover .main-mode-img{

    filter:
    drop-shadow(
        0 20px 30px rgba(13,110,253,.25)
    );
}

/* ==========================================
   TRUSTED SECTION
========================================== */

.trusted-section{

    margin-top:100px;

    text-align:center;
}

.trusted-section p{

    color:#64748b;

    text-transform:uppercase;

    letter-spacing:3px;

    margin-bottom:35px;

    font-weight:700;
}

.logo-row{

    display:flex;

    justify-content:center;

    align-items:center;

    flex-wrap:wrap;

    gap:50px;

    font-size:1.5rem;

    font-weight:900;

    color:#94a3b8;
}

.logo-row span{
    transition:.3s;
}

.logo-row span:hover{

    color:#0d6efd;

    transform:translateY(-3px);
}

/* =======================================================
   STATS SECTION
======================================================= */

.stats-section{
    margin-top:40px;
}

.stat-card{

    background:white;

    border-radius:24px;

    padding:35px 20px;

    text-align:center;

    height:100%;

    box-shadow:
    0 15px 40px rgba(0,0,0,.05);

    transition:.35s ease;
}

.stat-card:hover{

    transform:translateY(-10px);

    box-shadow:
    0 25px 60px rgba(13,110,253,.15);
}

.stat-card h2{

    font-size:3rem;

    font-weight:900;

    margin-bottom:10px;

    background:
    linear-gradient(
        135deg,
        #0d6efd,
        #00d2ff
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.stat-card span{

    color:#64748b;

    font-weight:600;
}

/* =======================================================
   CTA SECTION
======================================================= */

.cta-modern-section{

    position:relative;

    margin-top:90px;

    padding:90px 50px;

    border-radius:40px;

    overflow:hidden;

    background:
    linear-gradient(
        135deg,
        #0f172a,
        #1e293b
    );

    text-align:center;

    color:white;
}

.cta-glow{

    position:absolute;

    width:500px;
    height:500px;

    right:-150px;
    top:-150px;

    background:
    radial-gradient(
        circle,
        rgba(0,210,255,.25),
        transparent
    );
}

.cta-content{

    position:relative;
    z-index:2;
}

.cta-badge{

    display:inline-block;

    padding:10px 18px;

    border-radius:40px;

    background:
    rgba(255,255,255,.08);

    backdrop-filter:blur(10px);

    margin-bottom:25px;

    font-size:.8rem;

    letter-spacing:2px;

    font-weight:700;
}

.cta-content h2{

    font-size:clamp(2rem,5vw,4rem);

    font-weight:900;

    margin-bottom:20px;
}

.cta-content p{

    max-width:750px;

    margin:auto;

    color:#cbd5e1;

    line-height:1.9;

    margin-bottom:40px;
}

.cta-buttons{

    display:flex;

    justify-content:center;

    gap:20px;

    flex-wrap:wrap;
}

.btn-primary-modern{

    padding:15px 35px;

    border-radius:14px;

    text-decoration:none;

    font-weight:700;

    color:white;

    background:
    linear-gradient(
        135deg,
        #0d6efd,
        #00d2ff
    );

    transition:.3s;
}

.btn-primary-modern:hover{

    transform:translateY(-3px);

    color:white;
}

.btn-secondary-modern{

    padding:15px 35px;

    border-radius:14px;

    text-decoration:none;

    font-weight:700;

    color:white;

    border:1px solid rgba(255,255,255,.15);

    background:
    rgba(255,255,255,.05);

    backdrop-filter:blur(10px);
}

.btn-secondary-modern:hover{

    color:white;

    background:
    rgba(255,255,255,.1);
}
</style>

@endsection