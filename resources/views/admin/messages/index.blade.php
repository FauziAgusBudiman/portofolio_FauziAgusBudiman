@extends('layouts.admin')

@section('title', 'Pesan Masuk')
@section('page_title', 'Kotak Masuk Pesan Pengunjung')

@section('content')

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="h6 fw-bold text-white mb-1">Pesan dari Formulir Kontak Publik</h3>
            <p class="text-muted small mb-0">Daftar pertanyaan, pesan kolaborasi, atau tawaran kerja dari pengunjung website.</p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 40px;">Status</th>
                    <th>Nama Pengirim</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Waktu Masuk</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                    <tr class="{{ !$msg->is_read ? 'bg-info bg-opacity-10' : '' }}">
                        <td>
                            @if(!$msg->is_read)
                                <span class="badge bg-danger rounded-pill">Baru</span>
                            @else
                                <span class="badge bg-secondary rounded-pill">Dibaca</span>
                            @endif
                        </td>
                        <td class="fw-semibold text-white">{{ $msg->name }}</td>
                        <td>
                            <a href="mailto:{{ $msg->email }}" class="text-info text-decoration-none">
                                {{ $msg->email }}
                            </a>
                        </td>
                        <td>{{ $msg->subject ?? '(Tanpa Subjek)' }}</td>
                        <td class="text-muted small">{{ $msg->created_at->format('d M Y, H:i') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-outline-info" title="Buka Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirmDelete(event, 'Pesan dari {{ $msg->name }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="bi bi-inbox fs-3 d-block mb-1"></i>
                            Kotak pesan masih kosong.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($messages->hasPages())
        <div class="pt-3">
            {{ $messages->links() }}
        </div>
    @endif
</div>

@endsection
