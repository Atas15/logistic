@extends('layouts.app')

@section('content')
<div class="container py-5" style="margin-top: 80px !important;">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-primary text-white py-3 rounded-top-4">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-calendar-plus me-2"></i>Yeni Sevkiyat Planı Ekle</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.shipments.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary">Taşıma Modu</label>
                            <select name="transport_mode_id" class="form-select form-select-lg border-2 shadow-sm" required>
                                <option value="" selected disabled>Taşıma türünü seçin...</option>
                                @foreach($transportModes as $mode)
                                    <option value="{{ $mode->id }}">
                                        {{ $mode->title }} ({{ $mode->code }})
                                    </option>
                                @endforeach
                            </select>
                            @error('transport_mode_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class="form-label fw-bold text-secondary">Sevkiyat Tarihi</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-2"><i class="fas fa-calendar-alt"></i></span>
                                    <input type="date" name="shipment_date" class="form-control form-control-lg border-2 shadow-sm" required>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold text-secondary">Nereden (Çıkış)</label>
                                <select name="from_city" class="form-select select2 border-2 shadow-sm" required>
                                    <option value="">Şehir Seçin...</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->name }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold text-secondary">Nereye (Varış)</label>
                                <select name="to_city" class="form-select select2 border-2 shadow-sm" required>
                                    <option value="">Şehir Seçin...</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->name }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary">Operasyonel Notlar</label>
                            <textarea name="notes" class="form-control border-2 shadow-sm" rows="3" placeholder="Yükleme detayları, araç bilgisi vb..."></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold rounded-3 shadow">
                                <i class="fas fa-save me-2"></i>Takvime Kaydet
                            </button>
                            <a href="{{ route('admin.shipments.index') }}" class="btn btn-link btn-sm text-decoration-none text-muted">Vazgeç ve Listeye Dön</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus, .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
    }
    .input-group-text {
        border-right: none;
    }
    .input-group .form-control {
        border-left: none;
    }
</style>
@endsection