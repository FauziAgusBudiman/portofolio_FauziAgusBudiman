@extends('layouts.admin')

@section('title', 'Detail Pesan')
@section('page_title', 'Detail Pesan Masuk')

@section('content')

<div class="row">
    <div class="col-xl-8">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-success">Pesan Diterima</span>
                    <span class="text-muted small">{{ $message->created_at->format('l, d F Y - H:i') }}</span>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="mb-4 p-3 rounded-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08);">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <span class="text-muted small d-block">Dari:</span>
                        <strong class="text-white">{{ $message->name }}</strong>
                    </div>
                    <div class="col-sm-6">
                        <span class="text-muted small d-block">Email:</span>
                        <a href="mailto:{{ $message->email }}" class="text-info text-decoration-none">
                            {{ $message->email }}
                        </a>
                    </div>
                    <div class="col-12 mt-2 pt-2 border-top border-secondary border-opacity-25">
                        <span class="text-muted small d-block">Subjek:</span>
                        <strong class="text-white">{{ $message->subject ?? '(Tanpa Subjek)' }}</strong>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label class="admin-form-label text-muted">Isi Pesan:</label>
                <div class="p-4 rounded-3 text-white leading-relaxed" style="background: #111827; border: 1px solid rgba(255,255,255,0.1); white-space: pre-line; font-size: 1rem;">
                    {{ $message->message }}
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center pt-3 border-top border-secondary border-opacity-25">
                <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject ?? 'Pesan Portfolio') }}" class="btn btn-info text-dark fw-bold">
                    <i class="bi bi-reply-fill me-1"></i> Balas via Email
                </a>

                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirmDelete(event, 'Pesan ini')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="bi bi-trash me-1"></i> Hapus Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
