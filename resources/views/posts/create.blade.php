@extends('layouts.app')

@section('title', 'Buat Post Baru')

@section('content')

<div style="max-width: 800px; margin: auto;">

    <h1 class="page-title">Buat Post Baru</h1>

    <p style="color: #6b7280; margin-bottom: 25px;">
        Tulis artikel baru untuk blog kamu.
    </p>

    <x-card>

        <form
            action="{{ route('posts.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            {{-- Judul --}}
            <div class="form-group">

                <label for="title">
                    Judul Artikel
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
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
                >{{ old('content') }}</textarea>

                @error('content')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            {{-- Gambar --}}
            <div class="form-group">

                <label for="image">
                    Gambar Artikel
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <small style="color: #6b7280;">
                    Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
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
                    💾 Simpan Post
                </button>

                <a
                    href="{{ route('posts.index') }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

            </div>

        </form>

    </x-card>

</div>

@endsection