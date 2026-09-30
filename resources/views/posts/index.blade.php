@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')

<div style="
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
">
    <div>
        <h1 class="page-title">Daftar Post</h1>
        <p style="color: #6b7280;">
            Kelola semua artikel blog kamu di sini.
        </p>
    </div>

    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        + Tambah Post
    </a>
</div>

{{-- Form pencarian --}}
<form action="{{ route('posts.index') }}" method="GET" class="search-box">

    <input
        type="text"
        name="search"
        value="{{ $search }}"
        placeholder="Cari judul atau isi artikel..."
    >

    <button type="submit" class="btn btn-primary">
        🔍 Cari
    </button>

    @if($search)
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">
            Reset
        </a>
    @endif

</form>

{{-- Daftar post --}}
@if($posts->count())

    @foreach($posts as $post)

        <x-card>

            <h2 style="margin-bottom: 8px;">
                {{ $post->title }}
            </h2>

            <p style="
                color: #6b7280;
                margin-bottom: 12px;
            ">
                {{ Str::limit($post->content, 150) }}
            </p>

            <small style="color: #9ca3af;">
                Dibuat:
                {{ $post->created_at->format('d M Y H:i') }}
            </small>

            <div class="actions">

                <a
                    href="{{ route('posts.show', $post) }}"
                    class="btn btn-primary"
                >
                    Lihat
                </a>

                <a
                    href="{{ route('posts.edit', $post) }}"
                    class="btn btn-warning"
                >
                    Edit
                </a>

                <form
                    action="{{ route('posts.destroy', $post) }}"
                    method="POST"
                    style="display: inline;"
                    onsubmit="return confirm('Yakin ingin menghapus post ini?')"
                >

                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Hapus
                    </button>

                </form>

            </div>

        </x-card>

    @endforeach

    {{-- Pagination --}}
    <div style="margin-top: 25px;">
        {{ $posts->links() }}
    </div>

@else

    <x-card>

        <div style="text-align: center; padding: 30px;">

            <h2>Belum ada post</h2>

            <p style="
                color: #6b7280;
                margin: 10px 0 20px;
            ">
                Silakan buat artikel pertama kamu.
            </p>

            <a
                href="{{ route('posts.create') }}"
                class="btn btn-primary"
            >
                + Buat Post Pertama
            </a>

        </div>

    </x-card>

@endif

@endsection