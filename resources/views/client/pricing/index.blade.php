@extends('layouts.app')

@section('content')
<section class="py-5 bg-white position-relative overflow-hidden" style="margin-top: 80px; min-height: 100vh;">
    <!-- Dekoratif Arka Plan (Görseldeki o kaba ikon yerine modern dokunuş) -->
    <div class="bg-decoration">
        <div class="blob-1"></div>
        <div class="blob-2"></div>
    </div>

    <div class="container position-relative" style="z-index: 2;">
        <!-- Başlık Alanı -->
        <div class="text-center mb-5">

    <span class="hero-badge">
        GLOBAL FREIGHT NETWORK
    </span>

    <h1 class="hero-title">
        Taşımacılık Modunu Seçin
    </h1>

    <p class="hero-desc">
        İhtiyacınıza en uygun taşıma modelini seçin,
        rotaları ve fiyatlandırmaları anında görüntüleyin.
    </p>

</div>

        <!-- Kartlar -->
        <div class="row g-4 justify-content-center">
            @foreach($modes as $mode)
            <div class="col-lg-4 col-md-6">
    <a href="{{ route('client.pricing.details', $mode->slug) }}"
       class="text-decoration-none d-block h-100">

        <div class="pricing-card-v2">

            <div class="card-glow"></div>

            <div class="card-icon">

                <div class="icon-bg">

                    <i class="fas {{ $mode->code == 'air'
                        ? 'fa-plane'
                        : ($mode->code == 'sea'
                            ? 'fa-ship'
                            : 'fa-truck') }}">
                    </i>

                </div>

            </div>

            <div class="card-body-modern">

                <span class="service-tag">
                    Premium Route
                </span>

                <h3>{{ $mode->title }}</h3>

                <p>
                    {{ Str::limit($mode->description,120) }}
                </p>

                <div class="card-footer-link">

                    <span>Rotaları İncele</span>

                    <i class="fas fa-arrow-right"></i>

                </div>

            </div>

        </div>

    </a>
</div>
            @endforeach
        </div>
    </div>
</section>

<style>
    /* Arka Plan Dekorasyonları */
    .bg-decoration {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        pointer-events: none;
    }
    .blob-1 {
        position: absolute;
        top: -100px;
        left: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(13, 110, 253, 0.05) 0%, transparent 70%);
        border-radius: 50%;
    }
    .blob-2 {
        position: absolute;
        bottom: 100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(0, 210, 255, 0.05) 0%, transparent 70%);
        border-radius: 50%;
    }

    /* Kart Tasarımı */
    .pricing-choice-card {
        border-radius: 24px;
        background: #ffffff;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(0,0,0,0.02);
    }

    .pricing-icon-wrapper {
        padding: 40px 0 20px;
        display: flex;
        justify-content: center;
    }

    .icon-circle {
        width: 90px;
        height: 90px;
        background: #f8faff;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s ease;
    }

    /* Hover Efektleri */
    .pricing-choice-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.08) !important;
        border-color: rgba(13, 110, 253, 0.2);
    }

    .pricing-choice-card:hover .icon-circle {
        background: #0d6efd;
        transform: rotate(10deg);
    }

    .pricing-choice-card:hover .icon-circle i {
        color: #ffffff !important;
    }

    /* Link Butonu */
    .btn-modern-link {
        color: #0d6efd;
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
    }

    .pricing-choice-card:hover .transition-arrow {
        transform: translateX(8px);
    }

    .bg-soft-primary { background: rgba(13, 110, 253, 0.08); }
    .tracking-widest { letter-spacing: 0.2em; }

    /* ==========================
   MODERN CARD
========================== */

.pricing-card-v2{

    position:relative;

    height:100%;

    border-radius:32px;

    overflow:hidden;

    background:
    rgba(255,255,255,.75);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,.5);

    transition:.45s;

    padding:40px 30px;

    text-align:center;

    box-shadow:
    0 20px 40px rgba(0,0,0,.05);
}

/* gradient border */

.pricing-card-v2::before{

    content:'';

    position:absolute;

    inset:0;

    padding:1px;

    border-radius:32px;

    background:
    linear-gradient(
        135deg,
        rgba(13,110,253,.2),
        rgba(0,210,255,.2)
    );

    -webkit-mask:
        linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);

    -webkit-mask-composite:xor;

    mask-composite:exclude;
}

/* glow */

.card-glow{

    position:absolute;

    width:250px;
    height:250px;

    top:-120px;
    right:-120px;

    border-radius:50%;

    background:
    radial-gradient(
        circle,
        rgba(13,110,253,.12),
        transparent
    );

    transition:.5s;
}

.pricing-card-v2:hover .card-glow{

    transform:scale(1.4);
}

/* icon */

.icon-bg{

    width:90px;
    height:90px;

    margin:auto;

    border-radius:24px;

    display:flex;
    justify-content:center;
    align-items:center;

    background:
    linear-gradient(
        135deg,
        #0d6efd,
        #00d2ff
    );

    color:white;

    font-size:2rem;

    box-shadow:
    0 15px 35px rgba(13,110,253,.25);

    transition:.4s;
}

.pricing-card-v2:hover .icon-bg{

    transform:
    rotate(10deg)
    scale(1.1);
}

/* tag */

.service-tag{

    display:inline-block;

    margin-top:25px;
    margin-bottom:15px;

    padding:8px 16px;

    border-radius:50px;

    background:
    rgba(13,110,253,.08);

    color:#0d6efd;

    font-size:.75rem;

    font-weight:700;

    letter-spacing:1px;
}

.card-body-modern h3{

    font-size:1.7rem;

    font-weight:800;

    color:#111827;

    margin-bottom:15px;
}

.card-body-modern p{

    color:#64748b;

    line-height:1.8;

    min-height:90px;
}

/* footer */

.card-footer-link{

    display:flex;

    justify-content:center;
    align-items:center;

    gap:12px;

    color:#0d6efd;

    font-weight:700;

    margin-top:25px;
}

.card-footer-link i{
    transition:.3s;
}

.pricing-card-v2:hover
.card-footer-link i{

    transform:translateX(8px);
}

/* hover */

.pricing-card-v2:hover{

    transform:
    translateY(-12px);

    box-shadow:
    0 40px 80px rgba(13,110,253,.12);

    background:white;
}

.hero-title{

    font-size:clamp(3rem,6vw,5rem);

    font-weight:900;

    background:
    linear-gradient(
        135deg,
        #0d6efd,
        #00d2ff
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.hero-badge{

    display:inline-block;

    padding:10px 20px;

    border-radius:50px;

    background:white;

    border:1px solid rgba(13,110,253,.15);

    color:#0d6efd;

    font-weight:700;

    letter-spacing:2px;
}

.hero-desc{

    max-width:700px;

    margin:auto;

    color:#64748b;

    font-size:1.1rem;

    line-height:1.9;
}
</style>
@endsection