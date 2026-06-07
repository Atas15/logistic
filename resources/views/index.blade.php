@extends('layouts.app')

@section('content')
<style>
    .transport-mode {
        transition: all 0.2s ease-in-out;
        background-color: #f8f9fa;
    }
    .transport-mode.active {
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.15);
        transform: translateX(5px); 
    }
    .shipment-active {
        background-color: #0d6efd !important;
        color: white !important;
        border-radius: 50%;
        font-weight: bold;
    }

    .pricing-mode-card {
        transition: all 0.3s ease;
        border-bottom: 4px solid transparent !important;
    }
    .pricing-mode-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        border-bottom: 4px solid #0d6efd !important;
    }
    .pricing-mode-card i {
        transition: transform 0.3s ease;
    }
    .pricing-mode-card:hover i {
        transform: scale(1.1);
    }
    .custom-mode-card {
        border-radius: 20px;
        background: #ffffff;
        overflow: hidden;
    }

    .mode-image-wrapper {
        position: relative;
        background: #f8faff;
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .image-bg-blob {
        position: absolute;
        width: 140px;
        height: 140px;
        background: rgba(13, 110, 253, 0.05);
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        transition: all 0.5s ease;
    }

    .mode-main-img {
        max-width: 150px;
        z-index: 1;
        transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .custom-mode-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
    }

    .custom-mode-card:hover .image-bg-blob {
        transform: scale(1.5) rotate(90deg);
        background: rgba(13, 110, 253, 0.1);
    }

    .custom-mode-card:hover .mode-main-img {
        transform: scale(1.15) translateY(-5px);
    }

    .explore-link .arrow-icon {
        transition: transform 0.3s ease;
    }

    .custom-mode-card:hover .explore-link .arrow-icon {
        transform: translateX(8px);
    }

    .group-hover-primary {
        transition: color 0.3s ease;
    }

    .custom-mode-card:hover .group-hover-primary {
        color: #0d6efd !important;
    }

    .tracking-widest { letter-spacing: 0.15em; }
    .transition-all { transition: all 0.4s ease; }

    .db-shipment { background-color: #ffc107 !important; color: #000 !important; font-weight: bold !important; border-radius: 50% !important; position: relative; }
    .db-shipment::after { content: '•'; position: absolute; bottom: 2px; left: 50%; transform: translateX(-50%); font-size: 12px; }
    .shipment-active { background-color: #007bff !important; color: #fff !important; border-radius: 50% !important; }
    .transport-mode { cursor: pointer !important; transition: 0.3s; }
    .transport-mode.active { background-color: #e9ecef !important; border-color: #007bff !important; }
</style>
<body>
  <div class="page-wrapper">

    <!-- hero section starts -->
    <section class="hero bg-light" id="hero">
      <div class="row">
        <div class="col-lg-5 col-md-12">
          <div class="hero-text">
            <h1>@lang('app.hero_title')</h1>
              <p>@lang('app.hero_subtitle')</p>
                <div class="cons">
                  <button><a href="">@lang('app.hero_cta')</a></button>
                </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-12">
          <div class="hero-img">
            <img src="./images/hero-img2.890bc366b6afa003e65dccbf1d5d6e28 (2)_1.svg" alt="@lang('app.hero_img_alt')">
          </div>
        </div>
      </div>
      <section class="about-us" id="about-us">
        <div class="row about-container">
          <div class="col-md-4">
            <div class="row about-us-text">
              <div class="col-md-2 about-us-img">
                <img src="./images/delivery1.822790e0972f2d8565470b8e33253e92.svg" alt="@lang('app.stats_delivery_alt')">
              </div>
              <div class="col-md-2 about-text">
                <h4>10000+</h4>
                <p>@lang('app.stats_delivery')</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row about-us-text">
              <div class="col-md-2 about-us-img">
                <img src="./images/customer1.e7e534040d890c5249205e49efd37458.svg" alt="@lang('app.stats_customers_alt')">
              </div>
              <div class="col-md-2 about-text">
                <h4>150+</h4>
                <p>@lang('app.stats_customers')</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row about-us-text">
              <div class="col-md-2 about-us-img">
                <img src="./images/location1.d24038e62242a3e6dc64e172e4d79996.svg" alt="@lang('app.stats_reach_alt')">
              </div>
              <div class="col-md-2 about-text">
                <h4>100+</h4>
                <p>@lang('app.stats_reach')</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
    <!-- hero section end -->


    <!-- why choose section starts -->
    <section class="choose-us" id="choose-us">
      <div class="row">
        <div class="col-lg-5">
          <div class="choose-us-img">
            <img src="./images/video-img.d12268a2ff9e53614d8ee769287d45cb.svg" alt="@lang('app.why_choose_img_alt')">
            <img src="./images/play.c2ab3512a8395b5a855f9ae37fe72c7e (1).svg" alt="@lang('app.why_choose_play_alt')" class="play-img">
          </div>
        </div>
        <div class="col-lg-7">
          <div class="choose-us-text">
            <h1>@lang('app.why_choose_title')</h1>
              <div class="choose-text-options">
                <h5> <img src="./images/arrow.svg" alt=""> @lang('app.why_choose_speed_title')</h5>
                <p>@lang('app.why_choose_speed_desc')</p>
                 <h5> <img src="./images/arrow.svg" alt=""> @lang('app.why_choose_retailer_title')</h5>
                <p>@lang('app.why_choose_retailer_desc')</p>
                 <h5> <img src="./images/arrow.svg" alt=""> @lang('app.why_choose_tracking_title')</h5>
                <p>@lang('app.why_choose_tracking_desc')</p>
                 <h5> <img src="./images/arrow.svg" alt=""> @lang('app.why_choose_reach_title')</h5>
                <p>@lang('app.why_choose_reach_desc')</p>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- why choose section end -->


    <!-- services section starts -->
    <section class="services-section py-5 bg-light position-relative overflow-hidden">
    <div class="container position-relative">
        <div class="text-center mb-5 animate__animated animate__fadeIn">
            <h2 class="display-5 fw-bold mb-3">@lang('app.services_title')</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                @lang('app.services_subtitle')
            </p>
        </div>

        <div class="row g-4">
            @foreach($modes as $mode)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('client.transport_modes.show', $mode->code) }}" class="text-decoration-none group">
                        <div class="card h-100 border-0 shadow-sm custom-mode-card transition-all">
                            <div class="mode-image-wrapper p-4 text-center">
                                <div class="image-bg-blob"></div>
                                <img src="{{ asset('images/' . $mode->code . '.png') }}" 
                                     alt="{{ $mode->title }}" 
                                     class="img-fluid mode-main-img">
                            </div>

                            <div class="card-body p-4 text-center">
                                <h4 class="fw-bold mb-3 text-dark group-hover-primary transition-colors">
                                    {{ $mode->title }}
                                </h4>
                                <p class="text-muted mb-4 px-2">
                                    {{ Str::limit($mode->description, 95) }}
                                </p>
                                
                                <div class="d-inline-flex align-items-center text-primary fw-bold explore-link">
                                    <span>@lang('app.services_examine_details')</span>
                                    <div class="ms-2 arrow-icon">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
    <!-- services section end -->

    <!-- shipment section starts -->
    <section class="shipment" id="shipment">
      <div class="heading-text">
        <h1>@lang('app.calendar_title')</h1>
        <p>@lang('app.calendar_subtitle')</p>
      </div>
      <div class="row">
        <div class="col-md-4 city-options">
            <div class="transport-mode border p-3 rounded-4 mb-3 d-flex justify-content-between align-items-center" data-days="1,3,5" style="cursor: pointer;">
                <div>
                    <h4 class="mb-0"><i class="fas fa-plane me-2"></i> @lang('app.mode_air')</h4>
                    <small class="text-muted">@lang('app.days_air')</small>
                </div>
                <i class="fas fa-check-circle text-success check-icon d-none"></i>
            </div>
        
            <div class="transport-mode border p-3 rounded-4 mb-3 d-flex justify-content-between align-items-center" data-days="2,4" style="cursor: pointer;">
                <div>
                    <h4 class="mb-0"><i class="fas fa-truck me-2"></i> @lang('app.mode_road')</h4>
                    <small class="text-muted">@lang('app.days_road')</small>
                </div>
                <i class="fas fa-check-circle text-success check-icon d-none"></i>
            </div>
        
            <div class="transport-mode border p-3 rounded-4 mb-3 d-flex justify-content-between align-items-center" data-days="6" style="cursor: pointer;">
                <div>
                    <h4 class="mb-0"><i class="fas fa-ship me-2"></i> @lang('app.mode_sea')</h4>
                    <small class="text-muted">@lang('app.days_sea')</small>
                </div>
                <i class="fas fa-check-circle text-success check-icon d-none"></i>
            </div>
        </div>
        <div class="col-md-8">
          <section class="ftco-section">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="elegant-calencar d-md-flex">
                    <div class="wrap-header d-flex align-items-center img">
                      <p id="reset">@lang('app.calendar_today')</p>
                      <div id="header" class="p-0">
                        <div class="head-info">
                          <div class="head-month"></div>
                            <div class="head-day"></div>
                        </div>
                      </div>
                    </div>
                    <div class="calendar-wrap">
                      <div class="w-100 button-wrap">
                        <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
                        <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
                      </div>
                      <table id="calendar">
                        <thead>
                            <tr>
                              <th>@lang('app.sun')</th>
                              <th>@lang('app.mon')</th>
                              <th>@lang('app.tue')</th>
                              <th>@lang('app.wed')</th>
                              <th>@lang('app.thu')</th>
                              <th>@lang('app.fri')</th>
                              <th>@lang('app.sat')</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                          </tr>
                          <tr>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                          </tr>
                          <tr>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                          </tr>
                          <tr>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                          </tr>
                          <tr>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                          </tr>
                          <tr>
                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>
    <!-- shipment section end -->
    
    <!-- how-it-works section start-->
    <section class="how-it-works" id="how-it-works">
      <div class="heading-text">
        <h1>@lang('app.how_it_works_title')</h1>
        <p>@lang('app.how_it_works_subtitle')</p>
      </div>
      <div class="row how-it-works-flex">
        <div class="how-container" data-aos="fade-up">
          <div class="lines"></div>
          <div class="how-img1">
            <img src="./images/package1.c1191cca8e2ce8fb873bc6d74bca3666.svg" alt="@lang('app.step_1_alt')">
          </div>
          <div class="line"></div>
          <div class="how-text">
            <h4>@lang('app.step_1_title')</h4>
            <p>@lang('app.step_1_desc')</p>
          </div>
        </div>
        <div class="how-container" data-aos="fade-up">
          <div class="how-img2">
            <img src="./images/delivery-truck1.7a22827869d53d1eac9845fde8f46363.svg" alt="@lang('app.step_2_alt')">
          </div>
          <div class="line"></div>
          <div class="how-text">
            <h4>@lang('app.step_2_title')</h4>
            <p>@lang('app.step_2_desc')</p>
          </div>
        </div>
        <div class="how-container" data-aos="fade-up">
          <div class="how-img3">
            <img src="./images/delivery1.822790e0972f2d8565470b8e33253e92.svg" alt="@lang('app.step_3_alt')">
          </div>
          <div class="line"></div>
          <div class="how-text">
            <h4>@lang('app.step_3_title')</h4>
            <p>@lang('app.step_3_desc')</p>
          </div>
        </div>
      </div>
    </section>
    <!-- how-it-works section end-->

    <!-- pricing section starts -->
    <section class="pricing py-5" id="pricing">
    <div class="container">
        <div class="heading-text text-center mb-5">
            <h1 class="fw-bold">@lang('app.pricing_title')</h1>
            <p class="text-muted">@lang('app.pricing_subtitle')</p>
        </div>

        <div class="row g-4 justify-content-center">
            
            <div class="col-md-4">
                <a href="{{ route('client.pricing.details', 'air-freight') }}" class="text-decoration-none">
                    <div class="card pricing-mode-card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="icon-box mb-3">
                            <i class="fas fa-plane fa-3x text-primary"></i>
                        </div>
                        <h3 class="fw-bold text-dark">@lang('app.pricing_air_title')</h3>
                        <p class="text-muted small">@lang('app.pricing_air_desc')</p>
                        <div class="mt-auto">
                            <span class="btn btn-outline-primary rounded-pill">@lang('app.pricing_view_rates')</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('client.pricing.details', 'road-freight') }}" class="text-decoration-none">
                    <div class="card pricing-mode-card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="icon-box mb-3">
                            <i class="fas fa-truck fa-3x text-primary"></i>
                        </div>
                        <h3 class="fw-bold text-dark">@lang('app.pricing_road_title')</h3>
                        <p class="text-muted small">@lang('app.pricing_road_desc')</p>
                        <div class="mt-auto">
                            <span class="btn btn-outline-primary rounded-pill">@lang('app.pricing_view_rates')</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('client.pricing.details', 'sea-freight') }}" class="text-decoration-none">
                    <div class="card pricing-mode-card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="icon-box mb-3">
                            <i class="fas fa-ship fa-3x text-primary"></i>
                        </div>
                        <h3 class="fw-bold text-dark">@lang('app.pricing_sea_title')</h3>
                        <p class="text-muted small">@lang('app.pricing_sea_desc')</p>
                        <div class="mt-auto">
                            <span class="btn btn-outline-primary rounded-pill">@lang('app.pricing_view_rates')</span>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>
    <!-- pricing section end -->

    <!-- location section starts -->
    <section class="location" id="location">
      <div class="heading-text">
        <h1>@lang('app.locations_title')</h1>
        <p>@lang('app.locations_subtitle')</p>
      </div>
      <div class="card-deck">
        <div class="card" id="location-card">
          <a href="">
            <img src="./images/loc-1.608d637748269a59d047.png" class="card-img-top main-img" alt="@lang('app.location_1_alt')">
          </a>
          <div class="card-body location-text">
            <p class="address">12763 capricorn st suite 900, stafford TX77477 </p>
            <div class="button">
              <button><a href="">@lang('app.locations_view_direction')</a></button>
            </div>
            <div class="location-imgs">
              <a href="">
              <p> <a href=""><img src="./images/whatsapp-icon.png" alt="Whatsapp"></a> +1(346) 3819573</p>
              </a>
             </div>
          </div>
        </div>
        <div class="card" id="location-card">
          <a href="">
            <img src="./images/loc-2.e0b8ba80e5059905fe66.png" class="card-img-top main-img" alt="@lang('app.location_2_alt')">
          </a>
          <div class="card-body location-text">
            <p class="address">3300 county road 10 brooklyn center mn 55429, suite 26</p>
            <div class="button">
              <button><a href="">@lang('app.locations_view_direction')</a></button>
            </div>
            <div class="location-imgs">
              <a href="">
              <p> <a href=""><img src="./images/whatsapp-icon.png" alt="Whatsapp"></a> +1(952) 6070580</p>
              </a>
            </div>
          </div>
        </div>
        <div class="card" id="location-card">
          <a href="">
            <img src="./images/loc-3.02fcde694d1577b2805a.png" class="card-img-top main-img" alt="@lang('app.location_3_alt')">
          </a>
          <div class="card-body location-text">
            <p class="address">shop d213 ogba multipurpose shopping complex, abiodun jagun street, ogba, lagos </p>
            <div class="button">
              <button><a href="">@lang('app.locations_view_direction')</a></button>
            </div>
            <div class="location-img">
              <a href="">
              <p> <a href=""><img src="./images/whatsapp-icon.png" alt="Whatsapp"></a> +234(913)2457112</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- location section end -->

    <!-- footer section starts -->
    <section class="footer" id="footer">
      <div class="row">
        <div class="col-lg-3 footer-container">
          <div class="logo">
            <img src="./images/ei_1670007627699-removebg-preview.png" alt="Logo">
          </div>
          <div class="footer-icon">
            <h3>@lang('app.footer_follow_us')</h3>
            <ul class="social list-unstyled">
              <li><a href=""><span class="icon-twitter"></span></a></li>
              <li><a href=""><span class="icon-facebook"></span></a></li>
              <li><a href=""><span class="icon-instagram"></span></a></li>
              <li><a href=""><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="home">
            <h5>@lang('app.footer_home')</h5>
            <h6>@lang('app.footer_about_us')</h6>
            <h6>@lang('app.footer_pricing')</h6>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="links">
            <h5>@lang('app.footer_quick_links')</h5>
            <h6>@lang('app.footer_services')</h6>
            <h6>@lang('app.footer_shipping_calendar')</h6>
            <h6>@lang('app.footer_how_it_works')</h6>
          </div>
        </div>
        <div class="col-lg-2">
          <div class="reach">
            <h5>@lang('app.footer_reach_us')</h5>
            <h6> <i class="fas fa-mail-bulk"></i> <a href="mailto:contact@seallogistics.com">contact@seallogistics.com</a></h6>
            <h6><i class="fas fa-phone"></i> <a href="">+1 (346) 3819573</a></h6>
          </div>
        </div>
      </div>
      <hr>
      <div class="copyright">
        <p class="small text-black-50">@lang('app.footer_copyright') &copy;<script>document.write(new Date().getFullYear());</script>. @lang('app.footer_rights_reserved')
        </p>
      </div>
    </section>
    <!-- footer section end -->

  </div>

<script>
    window.dbShipments = @json($shipments);
</script>

<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>

<script>
$(document).ready(function() {
    window.markDatabaseShipments = function() {
        $('#calendar tbody td').each(function() {
            var td = $(this);
            var dayNum = td.text().trim();
            if (dayNum !== "") {
                window.dbShipments.forEach(function(s) {
                    var d = s.date.split('-')[2]; 
                    if (dayNum == d) {
                        td.addClass('db-shipment').attr('title', s.title);
                    }
                });
            }
        });
    };

    $(document).on('click', '.transport-mode', function() {
        $('.transport-mode').removeClass('active border-primary');
        $('.check-icon').addClass('d-none');

        $(this).addClass('active border-primary');
        $(this).find('.check-icon').removeClass('d-none');

        var daysAttr = $(this).attr('data-days');
        if (daysAttr) {
            var activeDays = daysAttr.split(',').map(Number);
            markCalendarDays(activeDays);
        }

        window.markDatabaseShipments();
    });

    function markCalendarDays(activeDays) {
        $('#calendar tbody td').removeClass('shipment-active');
        $('#calendar tbody td').each(function(index) {
            var td = $(this);
            if (td.text().trim() !== "") {
                var dayOfWeek = index % 7; 
                if (activeDays.includes(dayOfWeek)) {
                    td.addClass('shipment-active');
                }
            }
        });
    }

    setTimeout(window.markDatabaseShipments, 300);
});
</script>
</body>
@endsection