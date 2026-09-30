<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'My Blog')
    </title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: #111827;
            color: white;
            padding: 16px 0;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.12);
        }

        .nav-container {
            max-width: 1100px;
            margin: auto;
            padding: 0 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            color: white;
            font-size: 22px;
            font-weight: 700;
        }

        .logo span {
            color: #60a5fa;
        }

        /* =========================
           CONTAINER
        ========================= */

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* =========================
           TITLE
        ========================= */

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 5px;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn {
            display: inline-block;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
            opacity: 0.9;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        /* =========================
           CARD
        ========================= */

        .card {
            background: white;
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        /* =========================
           SEARCH
        ========================= */

        .search-box {
            display: flex;
            gap: 10px;
            margin: 25px 0;
        }

        .search-box input {
            flex: 1;
        }

        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 7px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        input:focus,
        textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        textarea {
            min-height: 180px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
        }

        /* =========================
           POST
        ========================= */

        .post-title {
            color: #111827;
            font-size: 22px;
            margin-bottom: 8px;
        }

        .post-content {
            color: #6b7280;
            margin-bottom: 12px;
        }

        .post-meta {
            color: #9ca3af;
            font-size: 13px;
            margin-bottom: 16px;
        }

        .post-image {
            width: 100%;
            max-height: 320px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 18px;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            text-align: center;
            color: #9ca3af;
            font-size: 14px;
            padding: 30px 20px;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 650px) {

            .container {
                margin-top: 25px;
            }

            .page-title {
                font-size: 26px;
            }

            .search-box {
                flex-direction: column;
            }

            .nav-container {
                gap: 10px;
            }

            .actions {
                width: 100%;
            }

            .actions .btn {
                flex: 1;
                text-align: center;
            }
        }

    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar">

        <div class="nav-container">

            <a
                href="{{ route('posts.index') }}"
                class="logo"
            >
                📝 My<span>Blog</span>
            </a>

            <a
                href="{{ route('posts.create') }}"
                class="btn btn-primary"
            >
                + Buat Post
            </a>

        </div>

    </nav>


    {{-- Main Content --}}
    <main class="container">

        {{-- Flash Message --}}
        @if(session('success'))

            <div class="alert alert-success">

                ✅ {{ session('success') }}

            </div>

        @endif

        @yield('content')

    </main>


    {{-- Footer --}}
    <footer class="footer">

        © {{ date('Y') }} MyBlog — Laravel CRUD

    </footer>

</body>

</html>