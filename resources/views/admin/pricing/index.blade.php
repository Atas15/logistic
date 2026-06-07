@extends('layouts.app')

@section('content')
<div class="container py-5" style="margin-top: 80px !important;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Fiyatlandırma Yönetimi</h2>
            <p class="text-muted">Tüm taşıma modları ve rotalar için güncel fiyat listesi</p>
        </div>
        <a href="{{ route('admin.pricing.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-2"></i>Yeni Rota Ekle
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary">
                        <tr>
                            <th class="ps-4 py-3">Mod</th>
                            <th class="py-3">Nereden</th>
                            <th class="py-3">Nereye</th>
                            <th class="py-3 text-center">Fiyat</th>
                            <th class="py-3 text-center">Süre</th>
                            <th class="py-3 text-end pe-4">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pricings as $pricing)
                            <tr>
                                <td class="ps-4">
                                    <span class="badge rounded-pill bg-info text-dark bg-opacity-10 px-3 py-2">
                                        <i class="fas fa-ship me-1"></i> {{ $pricing->transportMode->title }}
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $pricing->fromLocation->name }}</div>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $pricing->toLocation->name }}</div>
                                </td>
                                <td class="text-center">
                                    <span class="fw-bold text-primary">
                                        {{ number_format($pricing->price, 2) }} {{ $pricing->currency }}
                                    </span>
                                </td>
                                <td class="text-center text-muted small">
                                    {{ $pricing->estimated_time ?? 'Belirtilmedi' }}
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group shadow-sm">
                                        <a href="{{ route('admin.pricing.edit', $pricing->id) }}" 
                                           class="btn btn-sm btn-outline-warning" title="Düzenle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.pricing.destroy', $pricing->id) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Bu rotayı silmek istediğinize emin misiniz?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Sil">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="fas fa-folder-open fa-3x mb-3 d-block"></i>
                                        Henüz bir fiyatlandırma kaydı bulunamadı.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .table thead th {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .btn-group .btn {
        padding: 0.4rem 0.8rem;
    }
    .custom-mode-badge {
        font-weight: 500;
    }
</style>
@endsection