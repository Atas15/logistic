@extends('layouts.app')

@section('content')
<div class="container py-5" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Üst Başlık ve Geri Dön Butonu -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Yeni Rota Ekle</h2>
                    <p class="text-muted small">Navlun ve lojistik fiyatlandırma verisi oluşturun.</p>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="fas fa-arrow-left me-2"></i> Vazgeç
                </a>
            </div>

            <!-- Başarı/Hata Mesajları -->
            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4 animate-fade-in">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                </div>
            @endif

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-primary py-3">
                    <h5 class="card-title text-white mb-0 px-2"><i class="fas fa-plus-circle me-2"></i> Rota Detayları</h5>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('admin.pricing.store') }}" method="POST">
                        @csrf
                        
                        <div class="row g-4">
                            <!-- Taşıma Modu -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary">Taşıma Modu</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-primary"><i class="fas fa-ship"></i></span>
                                    <select name="transport_mode_id" class="form-select border-start-0 @error('transport_mode_id') is-invalid @enderror" required>
                                        <option value="" selected disabled>Mod Seçiniz...</option>
                                        @foreach($modes as $mode)
                                            <option value="{{ $mode->id }}">{{ $mode->title }} ({{ strtoupper($mode->code) }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('transport_mode_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <!-- Tahmini Süre -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary">Tahmini Teslim Süresi</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-primary"><i class="fas fa-clock"></i></span>
                                    <input type="text" name="estimated_time" class="form-control border-start-0" placeholder="Örn: 3-5 İş Günü">
                                </div>
                            </div>

                            <!-- Kalkış Noktası -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary">Kalkış (From)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-success"><i class="fas fa-map-marker-alt"></i></span>
                                    <select name="from_location_id" class="form-select border-start-0 shadow-none" required>
                                        @foreach($locations as $loc)
                                            <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Varış Noktası -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary">Varış (To)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-danger"><i class="fas fa-map-pin"></i></span>
                                    <select name="to_location_id" class="form-select border-start-0 shadow-none" required>
                                        @foreach($locations as $loc)
                                            <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Fiyat -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary">Navlun Fiyatı</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-dark fw-bold">$ / € / ₺</span>
                                    <input type="number" name="price" class="form-control border-start-0" step="0.01" placeholder="0.00" required>
                                </div>
                            </div>

                            <!-- Para Birimi -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-secondary">Para Birimi</label>
                                <select name="currency" class="form-select shadow-none" required>
                                    <option value="USD">USD ($)</option>
                                    <option value="EUR">EUR (€)</option>
                                    <option value="TRY">TRY (₺)</option>
                                    <option value="GBP">GBP (£)</option>
                                </select>
                            </div>

                            <!-- Butonlar -->
                            <div class="col-12 mt-5">
                                <hr class="opacity-10 mb-4">
                                <div class="d-grid d-md-flex justify-content-md-end gap-2">
                                    <button type="reset" class="btn btn-light px-5 fw-bold text-muted">Formu Temizle</button>
                                    <button type="submit" class="btn btn-primary px-5 fw-bold shadow-primary">
                                        <i class="fas fa-save me-2"></i> Rotayı Sisteme Kaydet
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .shadow-primary { box-shadow: 0 4px 15px rgba(13, 110, 253, 0.35); }
    .fw-black { font-weight: 900; }
    .form-select, .form-control { padding: 0.75rem 1rem; border-radius: 0.5rem; border: 1px solid #e0e0e0; }
    .input-group-text { border: 1px solid #e0e0e0; }
    .form-select:focus, .form-control:focus { border-color: #0d6efd; box-shadow: none; }
</style>
@endsection