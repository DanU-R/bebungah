<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk — {{ config('app.name', 'Temanten') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400;1,600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* === Base === */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #f8f9ff;
        }

        /* =====================================
           LEFT PANEL — Decorative Wedding Side
        ===================================== */
        .panel-left {
            display: none;
            position: relative;
            width: 55%;
            overflow: hidden;
            background: linear-gradient(145deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
        }

        @media (min-width: 768px) {
            .panel-left { display: flex; flex-direction: column; justify-content: flex-end; }
        }

        /* Elegant texture overlay */
        .panel-left::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 50% 20%, rgba(102,126,234,0.25) 0%, transparent 70%),
                radial-gradient(ellipse 50% 80% at 80% 80%, rgba(118,75,162,0.2) 0%, transparent 60%);
        }

        /* Floating ring ornament */
        .ring-ornament {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }

        .ring-ornament svg {
            width: 340px;
            height: 340px;
            opacity: 0.15;
            animation: slowSpin 40s linear infinite;
        }

        @keyframes slowSpin {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }

        /* Petal particles */
        .petal {
            position: absolute;
            width: 10px;
            height: 14px;
            border-radius: 50% 0 50% 0;
            background: rgba(102,126,234,0.3);
            animation: fallDown linear infinite;
        }

        @keyframes fallDown {
            0%   { transform: translateY(-40px) rotate(0deg); opacity: 0; }
            10%  { opacity: 1; }
            90%  { opacity: 0.5; }
            100% { transform: translateY(110vh) rotate(720deg); opacity: 0; }
        }

        /* Text content on left panel */
        .panel-left-content {
            position: relative;
            z-index: 10;
            padding: 3rem 3.5rem;
            color: white;
        }

        .panel-tagline {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            line-height: 1.15;
            font-weight: 600;
            color: #e8eeff;
            margin-bottom: 1.25rem;
            text-shadow: 0 2px 20px rgba(0,0,0,0.4);
        }

        .panel-tagline em {
            font-style: italic;
            color: #a5b4fc;
        }

        .panel-sub {
            font-size: 0.9rem;
            color: rgba(200,210,255,0.65);
            line-height: 1.75;
            max-width: 340px;
        }

        /* Divider ornament */
        .panel-divider {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 1.5rem 0;
        }

        .panel-divider span {
            flex: 1;
            height: 1px;
            background: rgba(102,126,234,0.4);
        }

        .panel-divider svg {
            color: #a5b4fc;
            opacity: 0.8;
            flex-shrink: 0;
        }

        /* ============================
           RIGHT PANEL — Login Form
        ============================ */
        .panel-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 1.5rem;
            background: #f8f9ff;
            position: relative;
        }

        /* Subtle background pattern matching landing page blobs */
        .panel-right::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 10% 15%, rgba(102,126,234,0.07) 0%, transparent 45%),
                radial-gradient(circle at 90% 85%, rgba(118,75,162,0.06) 0%, transparent 45%);
            pointer-events: none;
        }

        .login-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 400px;
        }

        /* Brand */
        .brand {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .brand-logo {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .brand-logo svg {
            color: #4F46E5;
        }

        .brand-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.25rem;
            font-weight: 600;
            color: #1e1b4b;
            letter-spacing: -0.01em;
            line-height: 1;
        }

        .brand-name span {
            color: #4F46E5;
        }

        .brand-sub {
            font-size: 0.825rem;
            color: #6366f1;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-top: 0.4rem;
        }

        /* Ornament divider */
        .ornament-divider {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin: 0 auto 2rem auto;
            max-width: 180px;
        }

        .ornament-divider::before, .ornament-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, #a5b4fc, transparent);
        }

        .ornament-divider span {
            font-size: 0.8rem;
            color: #6366f1;
        }

        /* Alert / Status */
        .alert-info {
            background: #eef2ff;
            border: 1px solid #c7d2fe;
            color: #3730a3;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 0.8rem;
            margin-bottom: 1.25rem;
        }

        /* Form */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            color: #3730a3;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .input-wrapper {
            position: relative;
        }

        /* FIX: gunakan top + transform agar ikon tepat di tengah vertikal */
        .input-icon {
            position: absolute;
            top: 50%;
            left: 0.875rem;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            pointer-events: none;
            color: #818cf8;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            border: 1.5px solid #c7d2fe;
            border-radius: 10px;
            background: #ffffff;
            font-size: 0.875rem;
            color: #1e1b4b;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            font-family: 'Inter', sans-serif;
        }

        .form-input::placeholder { color: #a5b4fc; }

        .form-input:focus {
            border-color: #4F46E5;
            box-shadow: 0 0 0 3px rgba(79,70,229,0.12);
            background: #fff;
        }

        /* Error */
        .form-error {
            font-size: 0.75rem;
            color: #b91c1c;
            margin-top: 0.4rem;
        }

        /* Remember row */
        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.8rem;
            color: #4338ca;
            cursor: pointer;
        }

        .form-checkbox {
            width: 15px;
            height: 15px;
            border-radius: 4px;
            border: 1.5px solid #a5b4fc;
            accent-color: #4F46E5;
            cursor: pointer;
        }

        /* Submit Button — indigo/purple gradient matching landing page CTA */
        .btn-submit {
            width: 100%;
            padding: 0.875rem 1rem;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 20px rgba(79,70,229,0.35);
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 28px rgba(79,70,229,0.45);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Shimmer effect on button */
        .btn-submit::after {
            content: '';
            position: absolute;
            top: 0; left: -75%;
            width: 50%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transform: skewX(-20deg);
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0%, 100% { left: -75%; }
            50% { left: 125%; }
        }

        /* Bottom link */
        .login-footer {
            text-align: center;
            margin-top: 1.75rem;
        }

        .login-footer p {
            font-size: 0.775rem;
            color: #6366f1;
            line-height: 1.6;
        }

        /* Corner rings decoration */
        .corner-deco {
            position: absolute;
            pointer-events: none;
        }

        .corner-deco.top-right {
            top: 1.5rem;
            right: 1.5rem;
            opacity: 0.12;
        }

        .corner-deco.bottom-left {
            bottom: 1.5rem;
            left: 1.5rem;
            opacity: 0.12;
        }
    </style>
</head>
<body>

    {{-- ========== LEFT PANEL ========== --}}
    <div class="panel-left">

        {{-- Animated petal particles --}}
        @foreach(range(1,12) as $i)
        <div class="petal" style="
            left: {{ rand(5, 90) }}%;
            animation-duration: {{ rand(8,18) }}s;
            animation-delay: {{ rand(0,12) }}s;
            width: {{ rand(6,14) }}px;
            height: {{ rand(10,20) }}px;
            opacity: {{ rand(1,3)/10 }};
        "></div>
        @endforeach

        {{-- Rotating mandala ornament --}}
        <div class="ring-ornament">
            <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="100" r="95" stroke="#818cf8" stroke-width="0.8" stroke-dasharray="4 6"/>
                <circle cx="100" cy="100" r="80" stroke="#818cf8" stroke-width="0.5"/>
                <circle cx="100" cy="100" r="65" stroke="#818cf8" stroke-width="0.8" stroke-dasharray="2 4"/>
                <circle cx="100" cy="100" r="50" stroke="#818cf8" stroke-width="0.5"/>
                <!-- 8-point star ornament -->
                <g fill="#a5b4fc" opacity="0.8">
                    <polygon points="100,10 103,95 100,98 97,95" />
                    <polygon points="100,190 103,105 100,102 97,105" />
                    <polygon points="10,100 95,103 98,100 95,97" />
                    <polygon points="190,100 105,103 102,100 105,97" />
                    <polygon points="29,29 102,97 99,100 96,97" />
                    <polygon points="171,171 98,103 101,100 104,103" />
                    <polygon points="171,29 103,97 100,94 103,97" />
                    <polygon points="29,171 97,103 100,106 97,103" />
                </g>
                <!-- Center diamond -->
                <polygon points="100,92 108,100 100,108 92,100" fill="#a5b4fc" opacity="0.9"/>
            </svg>
        </div>

        {{-- Couple illustration area --}}
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center; padding-bottom: 10rem;">
            <div style="text-align: center; position: relative; z-index: 5;">
                {{-- Heart / ring icon --}}
                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin: 0 auto 1.5rem;">
                    <circle cx="40" cy="40" r="38" stroke="rgba(102,126,234,0.35)" stroke-width="1.5"/>
                    <path d="M40 55 C40 55 18 42 18 28 C18 21 24 16 31 18 C35 19 38 22 40 25 C42 22 45 19 49 18 C56 16 62 21 62 28 C62 42 40 55 40 55Z" fill="rgba(102,126,234,0.45)" stroke="rgba(165,180,252,0.8)" stroke-width="1.5"/>
                </svg>
                <p style="font-family: 'Cormorant Garamond', serif; font-size: 1.1rem; color: rgba(200,210,255,0.55); letter-spacing: 0.15em; text-transform: uppercase;">Wedding Invitation</p>
            </div>
        </div>

        {{-- Bottom text --}}
        <div class="panel-left-content">
            <div class="panel-divider">
                <span></span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                <span></span>
            </div>
            <p class="panel-tagline">
                Setiap momen<br>adalah <em>kenangan</em><br>yang abadi.
            </p>
            <p class="panel-sub">
                Platform undangan pernikahan digital terbaik untuk hari istimewa Anda.
            </p>
        </div>
    </div>

    {{-- ========== RIGHT PANEL (LOGIN FORM) ========== --}}
    <div class="panel-right">

        {{-- Corner decorations --}}
        <div class="corner-deco top-right">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                <path d="M80 0 Q40 0 0 40" stroke="#818cf8" stroke-width="1.5" fill="none" stroke-dasharray="3 5"/>
                <circle cx="70" cy="10" r="3" fill="#6366f1" opacity="0.4"/>
                <circle cx="55" cy="25" r="2" fill="#a5b4fc" opacity="0.4"/>
            </svg>
        </div>
        <div class="corner-deco bottom-left">
            <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                <path d="M0 80 Q40 80 80 40" stroke="#818cf8" stroke-width="1.5" fill="none" stroke-dasharray="3 5"/>
                <circle cx="10" cy="70" r="3" fill="#6366f1" opacity="0.4"/>
                <circle cx="25" cy="55" r="2" fill="#a5b4fc" opacity="0.4"/>
            </svg>
        </div>

        <div class="login-card">
            {{-- Brand Header --}}
            <div class="brand">
                <div class="brand-logo">
                    {{-- Wedding rings icon — indigo/purple to match landing --}}
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="10" cy="14" r="7" stroke="#4F46E5" stroke-width="2" fill="none"/>
                        <circle cx="18" cy="14" r="7" stroke="#764ba2" stroke-width="2" fill="none"/>
                        <path d="M14 10.5 C14 10.5 12 12 12 14 C12 16 14 17.5 14 17.5 C14 17.5 16 16 16 14 C16 12 14 10.5 14 10.5Z" fill="rgba(79,70,229,0.3)"/>
                    </svg>
                    <span class="brand-name">Temanten<span>.</span></span>
                </div>
                <p class="brand-sub">Portal Klien</p>
            </div>

            <div class="ornament-divider">
                <span>✦</span>
            </div>

            {{-- Session Status --}}
            @if (session('status'))
                <div class="alert-info">{{ session('status') }}</div>
            @endif

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="form-group">
                    <label class="form-label" for="email">Alamat Email</label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </span>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            class="form-input @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="nama@temanten.inv"
                        >
                    </div>
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label class="form-label" for="password">Kata Sandi</label>
                    <div class="input-wrapper">
                        <span class="input-icon">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </span>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="form-input @error('password') is-invalid @enderror"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                        >
                    </div>
                    @error('password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember me --}}
                <div class="form-row">
                    <label class="checkbox-label" for="remember_me">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="form-checkbox"
                        >
                        Ingat saya
                    </label>
                    <span style="font-size:0.75rem; color:#6366f1; font-family:'Cormorant Garamond',serif; font-style:italic;">
                        ✦ Selamat datang
                    </span>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-submit">
                    Masuk ke Dashboard
                </button>
            </form>

            {{-- Footer note --}}
            <div class="login-footer">
                <p>
                    Belum memiliki akun undangan?<br>
                    <a href="{{ route('order.create') }}" style="color:#4F46E5; font-weight:500; text-decoration:none; font-family:'Cormorant Garamond',serif; font-size:0.9rem;">
                        Pesan sekarang →
                    </a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>
