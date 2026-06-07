@extends('layouts.app')



@section('content')

<section class="shipment-schedule py-5" id="shipment" style="margin-top: 100px !important;">

    <div class="container">

        <div class="text-center mb-5">

            <h1 class="fw-bold text-uppercase" style="color: #2c3e50;">Sevkiyat Programı</h1>

            <p class="text-muted">Tercih ettiğiniz taşıma moduna göre haftalık planımızı inceleyin.</p>

        </div>



        <div class="row shadow rounded-4 overflow-hidden bg-white g-0 border">

            <div class="col-md-4 bg-light border-end">

                <div class="nav flex-column nav-pills p-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                   

                    <button class="nav-link active p-4 mb-2 text-start d-flex align-items-center border-0"

                            id="air-tab"

                            data-bs-toggle="pill" data-bs-target="#air-content"

                            data-toggle="pill" data-target="#air-content"

                            type="button" role="tab" aria-selected="true">

                        <i class="fas fa-plane fa-2x me-3 text-primary"></i>

                        <div>

                            <h5 class="mb-0 fw-bold">Hava Yolu</h5>

                            <small class="text-muted">Haftada 3 Sefer</small>

                        </div>

                    </button>



                    <button class="nav-link p-4 mb-2 text-start d-flex align-items-center border-0"

                            id="road-tab"

                            data-bs-toggle="pill" data-bs-target="#road-content"

                            data-toggle="pill" data-target="#road-content"

                            type="button" role="tab" aria-selected="false">

                        <i class="fas fa-truck fa-2x me-3 text-primary"></i>

                        <div>

                            <h5 class="mb-0 fw-bold">Kara Yolu</h5>

                            <small class="text-muted">Haftada 2 Sefer</small>

                        </div>

                    </button>



                    <button class="nav-link p-4 text-start d-flex align-items-center border-0"

                            id="sea-tab"

                            data-bs-toggle="pill" data-bs-target="#sea-content"

                            data-toggle="pill" data-target="#sea-content"

                            type="button" role="tab" aria-selected="false">

                        <i class="fas fa-ship fa-2x me-3 text-primary"></i>

                        <div>

                            <h5 class="mb-0 fw-bold">Deniz Yolu</h5>

                            <small class="text-muted">Ayda 3 Sefer</small>

                        </div>

                    </button>



                </div>

            </div>



            <div class="col-md-8 p-0"> <!-- İç boşluğu (p-4) sildik, içeriği kartlarla yöneteceğiz -->

                <div class="tab-content h-100" id="v-pills-tabContent">

                   

                    <!-- HAVA YOLU İÇERİK -->

                    <div class="tab-pane fade show active p-4 p-lg-5" id="air-content" role="tabpanel" aria-labelledby="air-tab">

                        <div class="d-flex align-items-center mb-4">

                            <div class="flex-grow-1">

                                <h3 class="fw-bold text-dark mb-1">Hava Yolu Çizelgesi</h3>

                                <p class="text-muted">Global acil sevkiyatlar için ekspres çözümler.</p>

                            </div>

                            <i class="fas fa-plane-departure fa-3x text-light"></i>

                        </div>

                       

                        <!-- Haftalık Takvim Görseli -->

                        <div class="row g-2 mb-4">

                            @foreach(['Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt', 'Paz'] as $day)

                            <div class="col text-center">

                                <div class="p-3 rounded-4 border {{ in_array($day, ['Pzt', 'Çar', 'Cum']) ? 'bg-primary text-white shadow-sm' : 'bg-light text-muted opacity-75' }}">

                                    <span class="d-block small fw-bold">{{ $day }}</span>

                                    <i class="fas {{ in_array($day, ['Pzt', 'Çar', 'Cum']) ? 'fa-check-circle' : 'fa-minus-circle' }} mt-2"></i>

                                </div>

                            </div>

                            @endforeach

                        </div>

           

                        <!-- Teknik Bilgi Kartları -->

                        <div class="row g-3">

                            <div class="col-sm-6">

                                <div class="card border-0 bg-light rounded-4 p-3 h-100">

                                    <div class="d-flex align-items-center mb-2">

                                        <div class="icon-sm bg-white text-primary rounded-3 shadow-sm p-2 me-2">

                                            <i class="fas fa-clock"></i>

                                        </div>

                                        <span class="fw-bold text-dark">Kapanış Saati</span>

                                    </div>

                                    <p class="small text-muted mb-0">Uçuştan tam 24 saat önce tüm evrakların tamamlanmış olması gerekmektedir.</p>

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="card border-0 bg-light rounded-4 p-3 h-100">

                                    <div class="d-flex align-items-center mb-2">

                                        <div class="icon-sm bg-white text-primary rounded-3 shadow-sm p-2 me-2">

                                            <i class="fas fa-weight-hanging"></i>

                                        </div>

                                        <span class="fw-bold text-dark">Yükleme Kapasitesi</span>

                                    </div>

                                    <p class="small text-muted mb-0">Sefer başına maksimum 5.000kg kapasite ile hizmet verilmektedir.</p>

                                </div>

                            </div>

                        </div>

                    </div>

           

                    <!-- KARA YOLU İÇERİK -->

                    <div class="tab-pane fade p-4 p-lg-5" id="road-content" role="tabpanel" aria-labelledby="road-tab">

                        <h3 class="fw-bold text-dark mb-4">Kara Yolu Operasyon Süreci</h3>

                       

                        <div class="position-relative ps-4 border-start border-2 border-primary" style="margin-left: 10px;">

                            <div class="mb-4 position-relative">

                                <div class="position-absolute top-0 start-0 translate-middle bg-primary rounded-circle" style="width:12px; height:12px; left:-11px !important;"></div>

                                <h6 class="fw-bold text-primary mb-1">Yük Kabul & Konsolidasyon</h6>

                                <p class="text-muted small">Pazartesi gününe kadar depomuza ulaşan yükler plana alınır.</p>

                            </div>

                            <div class="mb-4 position-relative">

                                <div class="position-absolute top-0 start-0 translate-middle bg-primary rounded-circle" style="width:12px; height:12px; left:-11px !important;"></div>

                                <h6 class="fw-bold text-dark mb-1">Düzenli Çıkış (Salı & Perşembe)</h6>

                                <p class="text-muted small">Merkez depomuzdan gümrük işlemlerini takiben araç çıkışları sağlanır.</p>

                            </div>

                            <div class="position-relative">

                                <div class="position-absolute top-0 start-0 translate-middle bg-primary rounded-circle" style="width:12px; height:12px; left:-11px !important;"></div>

                                <h6 class="fw-bold text-dark mb-1">Varış & Dağıtım</h6>

                                <p class="text-muted small">Tahmini 4-6 iş günü içerisinde kapıdan kapıya teslimat tamamlanır.</p>

                            </div>

                        </div>

           

                        <div class="alert bg-soft-primary border-0 rounded-4 p-3 mt-5 d-flex align-items-center">

                            <i class="fas fa-shipping-fast text-primary fa-2x me-3"></i>

                            <span class="small text-dark fw-medium">Parsiyel ve komple yükleriniz için kapıdan kapıya kesintisiz takip sistemi.</span>

                        </div>

                    </div>

           

                    <!-- DENİZ YOLU İÇERİK -->

                    <div class="tab-pane fade p-4 p-lg-5" id="sea-content" role="tabpanel" aria-labelledby="sea-tab">

                        <h3 class="fw-bold text-dark mb-3">Deniz Yolu Gemi Programı</h3>

                        <p class="text-muted mb-4">Maliyet avantajlı LCL ve FCL yüklemeleriniz için aylık takvimimiz.</p>

                       

                        <div class="table-responsive rounded-4 shadow-sm overflow-hidden">

                            <table class="table table-hover border-0 mb-0">

                                <thead class="bg-dark text-white">

                                    <tr>

                                        <th class="p-3 border-0">Gemi Kalkış Periyodu</th>

                                        <th class="p-3 border-0 text-center">Transit Süre</th>

                                        <th class="p-3 border-0 text-end">Servis Tipi</th>

                                    </tr>

                                </thead>

                                <tbody class="bg-white">

                                    <tr class="align-middle">

                                        <td class="p-3 border-bottom"><i class="fas fa-anchor text-primary me-2"></i> Her Ayın 10. Günü</td>

                                        <td class="p-3 border-bottom text-center"><span class="badge bg-soft-primary text-primary px-3">25-30 Gün</span></td>

                                        <td class="p-3 border-bottom text-end small fw-bold text-muted">LCL / FCL</td>

                                    </tr>

                                    <tr class="align-middle">

                                        <td class="p-3 border-0"><i class="fas fa-anchor text-primary me-2"></i> Her Ayın 25. Günü</td>

                                        <td class="p-3 border-0 text-center"><span class="badge bg-soft-primary text-primary px-3">25-30 Gün</span></td>

                                        <td class="p-3 border-0 text-end small fw-bold text-muted">LCL / FCL</td>

                                    </tr>

                                </tbody>

                            </table>

                        </div>

                    </div>

           

                </div>

            </div>

        </div>

    </div>

</section>



<style>

    /* Tasarımın bozulmaması için küçük dokunuşlar */

    .nav-pills .nav-link {

        border-radius: 12px;

        color: #495057;

        transition: 0.3s;

    }

    .nav-pills .nav-link.active {

        background-color: #ffffff !important;

        color: #0d6efd !important;

        box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;

        border-left: 5px solid #0d6efd !important;

    }

    .nav-pills .nav-link:hover:not(.active) {

        background-color: #f1f3f5;

    }



    .bg-soft-primary { background-color: rgba(13, 110, 253, 0.1); }

    .icon-sm { width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; }

    .nav-link { cursor: pointer; }

    .tab-content { min-height: 450px; }

    /* ==========================================
   MODERN PAGE BACKGROUND
========================================== */

.shipment-schedule{
    position:relative;
    background:#f8fafc;
    overflow:hidden;
}

.shipment-schedule::before{
    content:'';
    position:absolute;
    width:500px;
    height:500px;
    top:-200px;
    right:-150px;
    border-radius:50%;

    background:
    radial-gradient(
        circle,
        rgba(13,110,253,.12),
        transparent
    );
}

.shipment-schedule::after{
    content:'';
    position:absolute;
    width:400px;
    height:400px;
    bottom:-150px;
    left:-150px;
    border-radius:50%;

    background:
    radial-gradient(
        circle,
        rgba(0,210,255,.12),
        transparent
    );
}

/* ==========================================
   MAIN CONTAINER
========================================== */

.shipment-schedule .row.shadow{

    background:
    rgba(255,255,255,.85);

    backdrop-filter:
    blur(20px);

    border-radius:30px !important;

    overflow:hidden;

    box-shadow:
    0 25px 60px rgba(0,0,0,.08) !important;
}

/* ==========================================
   TITLE
========================================== */

.shipment-schedule h1{

    background:
    linear-gradient(
        135deg,
        #0d6efd,
        #00d2ff
    );

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;

    font-size:clamp(2.2rem,5vw,4rem);
}

/* ==========================================
   SIDEBAR
========================================== */

.nav-pills{
    padding:20px !important;
}

.nav-pills .nav-link{

    border-radius:18px;

    transition:.4s;

    background:white;

    margin-bottom:12px;

    box-shadow:
    0 10px 25px rgba(0,0,0,.04);
}

.nav-pills .nav-link.active{

    background:white !important;

    border-left:none !important;

    transform:translateX(8px);

    box-shadow:
    0 15px 35px rgba(13,110,253,.15);

    position:relative;
}

.nav-pills .nav-link.active::before{

    content:'';

    position:absolute;

    left:0;
    top:0;

    width:5px;
    height:100%;

    background:
    linear-gradient(
        180deg,
        #0d6efd,
        #00d2ff
    );

    border-radius:20px;
}

.nav-pills .nav-link:hover{

    transform:translateX(5px);
}

/* ==========================================
   CONTENT PANEL
========================================== */

.tab-pane{

    animation:
    fadeSlide .5s ease;
}

@keyframes fadeSlide{

    from{
        opacity:0;
        transform:translateY(20px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* ==========================================
   INFO CARDS
========================================== */

.card.bg-light{

    background:
    rgba(255,255,255,.8) !important;

    backdrop-filter:
    blur(10px);

    border:
    1px solid rgba(13,110,253,.08) !important;

    transition:.35s;
}

.card.bg-light:hover{

    transform:
    translateY(-6px);

    box-shadow:
    0 15px 40px rgba(13,110,253,.12);
}

/* ==========================================
   WEEK CALENDAR
========================================== */

#air-content .border{

    transition:.3s;
}

#air-content .border:hover{

    transform:
    translateY(-4px);

    box-shadow:
    0 10px 20px rgba(13,110,253,.12);
}

/* ==========================================
   ROAD TIMELINE
========================================== */

#road-content .position-relative{

    transition:.3s;
}

#road-content .position-relative:hover h6{

    color:#0d6efd !important;
}

/* ==========================================
   ALERT
========================================== */

.alert{

    backdrop-filter:
    blur(12px);

    box-shadow:
    0 10px 30px rgba(13,110,253,.08);
}

/* ==========================================
   TABLE
========================================== */

.table{

    border-radius:20px;
    overflow:hidden;
}

.table tbody tr{

    transition:.3s;
}

.table tbody tr:hover{

    background:
    rgba(13,110,253,.04);
}

/* ==========================================
   BADGES
========================================== */

.badge{

    padding:10px 16px;

    border-radius:30px;

    font-weight:700;
}

/* ==========================================
   ICONS
========================================== */

.icon-sm{

    transition:.35s;
}

.card:hover .icon-sm{

    transform:
    rotate(10deg)
    scale(1.1);
}

/* ==========================================
   RESPONSIVE
========================================== */

@media(max-width:768px){

    .tab-content{
        min-height:auto;
    }

    .nav-pills .nav-link{
        padding:20px !important;
    }

    .shipment-schedule h1{
        font-size:2rem;
    }
}

</style>