@extends('layouts.app')

@section('title', $post->title)

@section('content')

<div style="max-width: 850px; margin: auto;">

    <a
        href="{{ route('posts.index') }}"
        class="btn btn-secondary"
        style="margin-bottom: 20px;"
    >
        ← Kembali
    </a>

    <x-card>

        {{-- Gambar --}}
        @if($post->image)
            <img
                src="{{ asset('storage/' . $post->image) }}"
                alt="{{ $post->title }}"
                style="
                    width: 100%;
                    max-height: 400px;
                    object-fit: cover;
                    border-radius: 12px;
                    margin-bottom: 25px;
                "
            >
        @endif

        {{-- Judul --}}
        <h1 style="
            font-size: 36px;
            margin-bottom: 10px;
        ">
            {{ $post->title }}
        </h1>

        {{-- Tanggal --}}
        <p style="
            color: #6b7280;
            margin-bottom: 25px;
        ">
            Dipublikasikan pada
            {{ $post->created_at->format('d M Y, H:i') }}
        </p>

        <hr style="
            border: 0;
            border-top: 1px solid #e5e7eb;
            margin-bottom: 25px;
        ">

        {{-- Isi --}}
        <div style="
            font-size: 17px;
            line-height: 1.8;
            white-space: pre-line;
        ">
            {{ $post->content }}
        </div>

        {{-- Tombol --}}
        <div class="actions" style="margin-top: 30px;">

            <a
                href="{{ route('posts.edit', $post) }}"
                class="btn btn-warning"
            >
                ✏️ Edit
            </a>

            <form
                action="{{ route('posts.destroy', $post) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin menghapus post ini?')"
            >

                @csrf

                @method('DELETE')

                <button
                    type="submit"
                    class="btn btn-danger"
                >
                    🗑️ Hapus
                </button>

            </form>

        </div>

    </x-card>

</div>

@endsection