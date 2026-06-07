@extends('layouts.app')

@section('content')
<div class="container py-5" style="margin-top: 80px !important;">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="mb-3">
                <a href="{{ route('admin.pricing.index') }}" class="text-decoration-none text-muted">
                    <i class="fas fa-arrow-left me-1"></i> Listeye Geri Dön
                </a>
            </div>

            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-warning text-dark py-3 rounded-top-4">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i>Rotayı Düzenle</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.pricing.update', $pricing->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary">Taşıma Modu</label>
                            <select name="transport_mode_id" class="form-select border-2 shadow-sm" required>
                                @foreach($modes as $mode)
                                    <option value="{{ $mode->id }}" {{ $pricing->transport_mode_id == $mode->id ? 'selected' : '' }}>
                                        {{ $mode->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold text-secondary">Nereden (Çıkış)</label>
                                <select name="from_location_id" class="form-select select2 border-2 shadow-sm" required>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}" {{ $pricing->from_location_id == $location->id ? 'selected' : '' }}>
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold text-secondary">Nereye (Varış)</label>
                                <select name="to_location_id" class="form-select select2 border-2 shadow-sm" required>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}" {{ $pricing->to_location_id == $location->id ? 'selected' : '' }}>
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold text-secondary">Fiyat</label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text border-2 bg-light"><i class="fas fa-tag"></i></span>
                                    <input type="number" step="0.01" name="price" value="{{ $pricing->price }}" class="form-control border-2" required>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold text-secondary">Para Birimi</label>
                                <select name="currency" class="form-select border-2 shadow-sm" required>
                                    <option value="USD" {{ $pricing->currency == 'USD' ? 'selected' : '' }}>USD ($)</option>
                                    <option value="EUR" {{ $pricing->currency == 'EUR' ? 'selected' : '' }}>EUR (€)</option>
                                    <option value="TRY" {{ $pricing->currency == 'TRY' ? 'selected' : '' }}>TRY (₺)</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary">Tahmini Teslim Süresi</label>
                            <input type="text" name="estimated_time" value="{{ $pricing->estimated_time }}" class="form-control border-2 shadow-sm" placeholder="Örn: 3-5 İş Günü">
                        </div>

                        <div class="d-grid pt-2">
                            <button type="submit" class="btn btn-warning btn-lg fw-bold shadow">
                                <i class="fas fa-save me-2"></i>Değişiklikleri Güncelle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus, .form-select:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.1);
    }
</style>
@endsection