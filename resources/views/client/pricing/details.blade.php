@extends('layouts.app')

@section('content')

<div class="pricing-page">

<div class="pricing-bg">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
</div>

<div class="container py-5" style="margin-top: 120px !important;">
    <div class="row g-4">
        <!-- SOL TARAF: FİLTRELEME (SIDEBAR) -->
        <div class="col-lg-3">
            <div class="filter-sidebar sticky-top" style="top: 120px;">
                <div class="card shadow-lg p-4 rounded-4 border-0 bg-white filter-card">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-shape bg-soft-primary text-primary rounded-3 me-3">
                            <i class="fas fa-sliders-h"></i>
                        </div>
                        <h5 class="fw-bold mb-0">Rota Filtresi</h5>
                    </div>
                    
                    <form action="" method="GET">
                        <!-- FROM LOCATION -->
                        <div class="mb-4 position-relative">
                            <label class="form-label small fw-bolder text-uppercase tracking-wider text-muted">Kalkış İstasyonu</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-light rounded-start-3"><i class="fas fa-map-marker-alt text-primary"></i></span>
                                <select name="from" class="form-select border-0 bg-light rounded-end-3 py-2 fs-6">
                                    <option value="">Tüm Konumlar</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}" {{ request('from') == $location->id ? 'selected' : '' }}>
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- TO LOCATION -->
                        <div class="mb-4">
                            <label class="form-label small fw-bolder text-uppercase tracking-wider text-muted">Varış İstasyonu</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-light rounded-start-3"><i class="fas fa-flag-checkered text-success"></i></span>
                                <select name="to" class="form-select border-0 bg-light rounded-end-3 py-2 fs-6">
                                    <option value="">Tüm Konumlar</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}" {{ request('to') == $location->id ? 'selected' : '' }}>
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 rounded-4 py-3 fw-bold shadow-primary hover-lift">
                            Filtreyi Uygula
                        </button>
                        
                        @if(request()->has('from') || request()->has('to'))
                            <a href="{{ url()->current() }}" class="btn btn-light btn-sm w-100 mt-3 rounded-pill text-muted">
                                <i class="fas fa-sync-alt me-1"></i> Temizle
                            </a>
                        @endif
                    </form>
                </div>

                <!-- Yardım Kutusu -->
                <div class="card border-0 rounded-4 bg-dark text-white p-4 mt-4 shadow-lg">
                    <h6 class="fw-bold"><i class="fab fa-whatsapp me-2"></i>Özel Teklif mi Lazım?</h6>
                    <p class="small opacity-75">Hacimli gönderileriniz için müşteri temsilcimizle hemen görüşün.</p>
                    <a href="https://wa.me/numaraniz" class="btn btn-outline-light btn-sm rounded-pill px-3">Hızlı Destek</a>
                </div>
            </div>
        </div>

        <!-- SAĞ TARAF: SONUÇLAR -->
        <div class="col-lg-9">
            
            <!-- Başlık ve Filtre Özeti -->
            <div class="d-flex flex-column mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Pricing</a></li>
                        <li class="breadcrumb-item active">{{ $mode->title }}</li>
                    </ol>
                </nav>
        
                @if(request('from') && request('to'))
                    @php
                        $fromLoc = $locations->firstWhere('id', request('from'));
                        $toLoc = $locations->firstWhere('id', request('to'));
                        $match = $pricings->first(); 
                    @endphp
        
                    @if($match)
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-5 animate-fade-in" style="background: linear-gradient(135deg, #0d6efd 0%, #003d99 100%);">
                        <div class="card-body p-4 p-md-5 text-white">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h5 class="text-white-50 small text-uppercase fw-bold mb-4">Seçili Rota Analizi</h5>
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="text-center">
                                            <h2 class="fw-black mb-0">{{ $fromLoc->name }}</h2>
                                            <span class="badge bg-white text-primary rounded-pill mt-2">Kalkış</span>
                                        </div>
                                        <div class="flex-grow-1 px-4 text-center">
                                            <div class="position-relative">
                                                <hr class="border-white opacity-50" style="border-top: 2px dashed #fff;">
                                                <i class="fas {{ $mode->code == 'air' ? 'fa-plane' : ($mode->code == 'sea' ? 'fa-ship' : 'fa-truck') }} position-absolute top-50 start-50 translate-middle bg-primary p-2 rounded-circle"></i>
                                            </div>
                                            <span class="small opacity-75">Haftalık Düzenli Sefer</span>
                                        </div>
                                        <div class="text-center">
                                            <h2 class="fw-black mb-0">{{ $toLoc->name }}</h2>
                                            <span class="badge bg-white text-success rounded-pill mt-2">Varış</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 text-center border-start border-white-50">
                                    <p class="mb-1 opacity-75">En Uygun Navlun Fiyatı</p>
                                    <!-- ÜST ÖZET KARTI FİYAT ALANI -->
                                    <h1 class="display-4 fw-black mb-2">
                                        <span class="fs-3 fw-light opacity-75">{{ $match->currency }}</span> 
                                        {{ number_format($match->price, 0, ',', '.') }}
                                    </h1>
                                    <div class="d-flex justify-content-center gap-2">
                                        <span class="badge bg-light text-dark px-3 py-2"><i class="fas fa-clock me-1 text-primary"></i> {{ $match->estimated_time ?? '3-5 Gün' }}</span>
                                        <span class="badge bg-light text-dark px-3 py-2"><i class="fas fa-check me-1 text-success"></i> Garantili Yer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @else
                    <h2 class="display-6 fw-bold mb-4 text-dark">{{ $mode->title }} Rotaları</h2>
                @endif
            </div>
        
            <!-- ALT LİSTE (KARTLAR) -->
            <div class="row g-4">
                <div class="col-12 mb-2">
                    <h6 class="text-muted text-uppercase fw-bold small tracking-wider">
                        <i class="fas fa-list me-2"></i> {{ request('from') ? 'Eşleşen Rota Detayları' : 'Tüm Mevcut Rotalar' }}
                    </h6>
                </div>
        
                @forelse($pricings as $item)
                <div class="col-12 animate-fade-in">
                    <div class="card p-0 shadow-hover border-0 rounded-4 overflow-hidden pricing-card-modern">
                        <div class="row g-0 align-items-stretch">
                            <div class="col-md-8 p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="mode-badge">
                                        <i class="fas {{ $mode->code == 'air' ? 'fa-plane' : ($mode->code == 'sea' ? 'fa-ship' : 'fa-truck') }}"></i>
                                        <span>{{ strtoupper($mode->code) }}</span>
                                    </div>
                                    <span class="ms-3 text-muted small"><i class="fas fa-calendar-check text-success me-1"></i> Düzenli Sefer Mevcut</span>
                                </div>
        
                                <div class="d-flex justify-content-between align-items-center route-visual">
                                    <div class="station">
                                        <span class="city">{{ $item->fromLocation->name }}</span>
                                        <span class="label">Kalkış İstasyonu</span>
                                    </div>
                                    
                                    <div class="route-line">
                                        <div class="line"></div>
                                        <i class="fas {{ $mode->code == 'air' ? 'fa-plane' : ($mode->code == 'sea' ? 'fa-ship' : 'fa-truck') }} plane-icon"></i>
                                    </div>
        
                                    <div class="station text-end">
                                        <span class="city">{{ $item->toLocation->name }}</span>
                                        <span class="label">Varış İstasyonu</span>
                                    </div>
                                </div>
        
                                <div class="mt-4 d-flex gap-3 flex-wrap">
                                    <div class="info-pill"><i class="far fa-clock"></i> {{ $item->estimated_time ?? '3-5 Gün' }}</div>
                                    <div class="info-pill"><i class="fas fa-warehouse"></i> Depo Teslim</div>
                                    <div class="info-pill"><i class="fas fa-file-invoice-dollar"></i> Gümrük Dahil</div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 price-panel bg-light-subtle p-4 d-flex flex-column justify-content-center text-center">
                                <!-- ALT LİSTE KARTLARI FİYAT ALANI -->
                                <div class="modern-price">

                                    <span class="currency">
                                        {{ $item->currency }}
                                    </span>
                                
                                    <span class="amount">
                                        {{ number_format($item->price,0,',','.') }}
                                    </span>
                                
                                </div>
                                
                                <div class="price-subtitle">
                                    all inclusive freight
                                </div>
                                <p class="text-muted small mb-3">Tüm vergiler dahil güncel fiyat</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning rounded-4 border-0 shadow-sm p-4 text-center">
                            <i class="fas fa-exclamation-circle mb-2 fs-2"></i>
                            <p class="mb-0 fw-bold">Aradığınız kriterlere uygun rota bulunamadı.</p>
                            <small>Lütfen farklı şehirler seçin veya bizimle iletişime geçin.</small>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #0d6efd;
        --soft-primary: #eef5ff;
    }

    /* Genel Animasyonlar */
    .animate-fade-in {
        animation: fadeInUp 0.5s ease backwards;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Filtre Sidebar */
    .icon-shape {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }
    .shadow-primary { box-shadow: 0 8px 20px rgba(13, 110, 253, 0.25); }
    .hover-lift { transition: all 0.3s ease; }
    .hover-lift:hover { transform: translateY(-3px); box-shadow: 0 12px 25px rgba(13, 110, 253, 0.35); }

    /* Modern Rota Kartı */
    .pricing-card-modern{

    position:relative;

    overflow:hidden;

    transition:.45s;
}

.pricing-card-modern::before{

    content:'';

    position:absolute;

    inset:0;

    border-radius:28px;

    padding:1px;

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

.pricing-card-modern:hover{

    transform:
    translateY(-10px);

    box-shadow:
    0 35px 70px rgba(13,110,253,.12);
}
    .shadow-hover:hover {
        box-shadow: 0 15px 40px rgba(0,0,0,0.08) !important;
        transform: translateY(-5px);
    }

    .border-start-dashed {
        border-left: 2px dashed #e0e0e0;
    }

    /* Rota Görselleştirme */
    .route-visual {
        padding: 10px 0;
    }
    .station .city {
        display: block;
        font-size: 1.25rem;
        font-weight: 800;
        color: #2d3436;
    }
    .station .label {
        font-size: 0.75rem;
        text-transform: uppercase;
        color: #b2bec3;
        letter-spacing: 1px;
    }
    .route-line {
        flex-grow: 1;
        margin: 0 25px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .route-line .line{

    width:100%;
    height:3px;

    border-radius:20px;

    background:
    linear-gradient(
        90deg,
        #0d6efd,
        #00d2ff
    );

    opacity:.25;
}
    .plane-icon{

    color:#0d6efd;

    animation:
    fly 4s linear infinite;
}

@keyframes fly{

    0%{
        transform:
        translateX(-40px);
    }

    100%{
        transform:
        translateX(40px);
    }
}

    /* Rozetler ve Piller */
    .mode-badge {
        background: var(--soft-primary);
        color: var(--primary-color);
        padding: 5px 15px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.8rem;
    }
    .info-pill {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        color: #636e72;
    }

    /* Fiyat Etiketi */
    .price-tag {
        color: var(--primary-color);
    }
    .price-tag .currency { font-size: 1.2rem; font-weight: 600; vertical-align: top; margin-top: 5px; display: inline-block; }
    .price-tag .amount { font-size: 2.5rem; font-weight: 900; letter-spacing: -1px; }
    .price-tag .decimal { font-size: 1.1rem; font-weight: 600; opacity: 0.8; }

    /* Responsive */
    @media (max-width: 768px) {
        .border-start-dashed { border-left: 0; border-top: 2px dashed #e0e0e0; }
        .station .city { font-size: 1rem; }
    }

    .filter-card{

    background:
    rgba(255,255,255,.75);

    backdrop-filter:
    blur(20px);

    border:
    1px solid rgba(255,255,255,.6);

    border-radius:28px !important;

    box-shadow:
    0 20px 50px rgba(0,0,0,.06);
}

.pricing-page{
    position:relative;
    min-height:100vh;
    background:#f8fafc;
    overflow:hidden;
}

.pricing-bg{
    position:absolute;
    inset:0;
    z-index:1;
    pointer-events:none;
}

.blob{
    position:absolute;
    border-radius:50%;
}

.blob-1{
    width:600px;
    height:600px;
    top:-250px;
    right:-250px;

    background:
    radial-gradient(
        circle,
        rgba(13,110,253,.12),
        transparent 70%
    );
}

.blob-2{
    width:500px;
    height:500px;
    bottom:-200px;
    left:-200px;

    background:
    radial-gradient(
        circle,
        rgba(0,210,255,.12),
        transparent 70%
    );
}

.route-status{

    position:absolute;

    top:20px;
    right:20px;

    padding:8px 14px;

    border-radius:30px;

    background:
    rgba(16,185,129,.12);

    color:#10b981;

    font-size:.75rem;

    font-weight:700;
}

.modern-price{

    display:flex;

    justify-content:center;
    align-items:flex-start;

    gap:5px;
}

.modern-price .currency{

    margin-top:12px;

    font-size:1.2rem;

    color:#0d6efd;

    font-weight:700;
}

.modern-price .amount{

    font-size:3.2rem;

    font-weight:900;

    line-height:1;

    background:
    linear-gradient(
        135deg,
        #0d6efd,
        #00d2ff
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.price-subtitle{

    font-size:.8rem;

    text-transform:uppercase;

    letter-spacing:2px;

    color:#94a3b8;
}

.price-panel{

    background:
    linear-gradient(
        135deg,
        #0f172a,
        #1e293b
    );

    color:white;

    display:flex;

    flex-direction:column;

    justify-content:center;

    align-items:center;
}
</style>

</div>
@endsection
