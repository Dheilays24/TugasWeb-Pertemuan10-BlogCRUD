@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

<div style="max-width: 800px; margin: auto;">

    <h1 class="page-title">Edit Post</h1>

    <p style="color: #6b7280; margin-bottom: 25px;">
        Perbarui informasi artikel kamu.
    </p>

    <x-card>

        <form
            action="{{ route('posts.update', $post) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')

            {{-- Judul --}}
            <div class="form-group">

                <label for="title">
                    Judul Artikel
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $post->title) }}"
                    placeholder="Masukkan judul artikel..."
                >

                @error('title')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Isi --}}
            <div class="form-group">

                <label for="content">
                    Isi Artikel
                </label>

                <textarea
                    id="content"
                    name="content"
                    placeholder="Tulis isi artikel..."
                >{{ old('content', $post->content) }}</textarea>

                @error('content')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Gambar Lama --}}
            @if($post->image)

                <div class="form-group">

                    <label>
                        Gambar Saat Ini
                    </label>

                    <img
                        src="{{ asset('storage/' . $post->image) }}"
                        alt="{{ $post->title }}"
                        style="
                            width: 220px;
                            height: 140px;
                            object-fit: cover;
                            border-radius: 10px;
                            display: block;
                            margin-bottom: 10px;
                        "
                    >

                </div>

            @endif

            {{-- Gambar Baru --}}
            <div class="form-group">

                <label for="image">
                    Ganti Gambar
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <small style="color: #6b7280;">
                    Kosongkan jika tidak ingin mengganti gambar.
                    Maksimal 2 MB.
                </small>

                @error('image')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Tombol --}}
            <div class="actions">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    💾 Simpan Perubahan
                </button>

                <a
                    href="{{ route('posts.show', $post) }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

            </div>

        </form>

    </x-card>

</div>

@endsection