<nav x-data="{ open: false }" class="nav-container">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo & Nav Links -->
            <div class="flex items-center gap-8">
                <a href="{{ route('dashboard') }}" class="nav-logo group">
                    <div class="logo-icon" style="overflow: hidden; padding: 0; background: transparent;">
                        <img src="{{ asset('assets/mini-logo.jpg') }}" alt="Logo Temanten" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <span class="logo-text">Temanten</span>
                </a>

                <div class="hidden sm:flex items-center gap-1">
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'nav-link-active' : '' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.admins') }}" class="nav-link {{ request()->routeIs('admin.admins') ? 'nav-link-active' : '' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            Kelola Admin
                        </a>
                    @else
                        <a href="{{ route('client.dashboard') }}" class="nav-link {{ request()->routeIs('client.dashboard') ? 'nav-link-active' : '' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('client.settings') }}" class="nav-link {{ request()->routeIs('client.settings') ? 'nav-link-active' : '' }}">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Edit Undangan
                        </a>
                    @endif
                </div>
            </div>

            <!-- User Info & Actions -->
            <div class="hidden sm:flex sm:items-center gap-4">
                <div class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="user-details">
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        <span class="user-role {{ Auth::user()->role === 'admin' ? 'role-admin' : 'role-client' }}">
                            {{ Auth::user()->role === 'admin' ? 'Administrator' : 'Client' }}
                        </span>
                    </div>
                </div>

                <div class="nav-divider"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn group">
                        <svg class="w-4 h-4 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="hidden lg:inline">Keluar</span>
                    </button>
                </form>
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="mobile-menu-btn">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden mobile-menu">
        <div class="mobile-menu-header">
            <div class="mobile-user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div>
                <p class="mobile-user-name">{{ Auth::user()->name }}</p>
                <p class="mobile-user-email">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <div class="mobile-nav-links">
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="mobile-nav-link {{ request()->routeIs('admin.dashboard') ? 'mobile-nav-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    Dashboard Admin
                </a>
                <a href="{{ route('admin.admins') }}" class="mobile-nav-link {{ request()->routeIs('admin.admins') ? 'mobile-nav-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Kelola Admin
                </a>
            @else
                <a href="{{ route('client.dashboard') }}" class="mobile-nav-link {{ request()->routeIs('client.dashboard') ? 'mobile-nav-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('client.settings') }}" class="mobile-nav-link {{ request()->routeIs('client.settings') ? 'mobile-nav-active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Undangan
                </a>
            @endif
        </div>

        <div class="mobile-logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="mobile-logout-btn">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Keluar
                </button>
            </form>
        </div>
    </div>

    <style>
        .nav-container {
            background: white;
            border-bottom: 1px solid rgba(229, 231, 235, 0.8);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 40;
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.95);
        }
        .dark .nav-container {
            background: rgba(17, 24, 39, 0.95);
            border-color: rgba(55, 65, 81, 0.8);
        }

        /* Logo */
        .nav-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }
        .logo-icon {
            width: 2.25rem;
            height: 2.25rem;
            background: linear-gradient(135deg, #ec4899, #8b5cf6);
            border-radius: 0.625rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px -2px rgba(236, 72, 153, 0.4);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .nav-logo:hover .logo-icon {
            transform: scale(1.05) rotate(-3deg);
            box-shadow: 0 6px 16px -2px rgba(236, 72, 153, 0.5);
        }
        .logo-text {
            font-size: 1.25rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ec4899, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Nav Links */
        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.5rem 0.875rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #6b7280;
            border-radius: 0.625rem;
            transition: all 0.2s;
            text-decoration: none;
        }
        .nav-link:hover {
            color: #1f2937;
            background: rgba(99, 102, 241, 0.08);
        }
        .dark .nav-link { color: #9ca3af; }
        .dark .nav-link:hover { color: white; background: rgba(99, 102, 241, 0.15); }
        .nav-link-active {
            color: #6366f1 !important;
            background: rgba(99, 102, 241, 0.1);
        }
        .dark .nav-link-active {
            color: #818cf8 !important;
            background: rgba(99, 102, 241, 0.2);
        }

        /* User Info */
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .user-avatar {
            width: 2.25rem;
            height: 2.25rem;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 0.625rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.875rem;
            box-shadow: 0 2px 8px -2px rgba(99, 102, 241, 0.4);
        }
        .user-details {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        .user-name {
            font-size: 0.875rem;
            font-weight: 700;
            color: #1f2937;
        }
        .dark .user-name { color: white; }
        .user-role {
            font-size: 0.625rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.125rem 0.375rem;
            border-radius: 0.25rem;
        }
        .role-admin {
            background: rgba(236, 72, 153, 0.1);
            color: #db2777;
        }
        .dark .role-admin {
            background: rgba(236, 72, 153, 0.2);
            color: #f472b6;
        }
        .role-client {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }
        .dark .role-client {
            background: rgba(16, 185, 129, 0.2);
            color: #34d399;
        }

        .nav-divider {
            width: 1px;
            height: 2rem;
            background: #e5e7eb;
        }
        .dark .nav-divider { background: #374151; }

        /* Logout Button */
        .logout-btn {
            display: flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.5rem 0.875rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #ef4444;
            border-radius: 0.625rem;
            border: 1px solid transparent;
            transition: all 0.2s;
        }
        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.2);
        }
        .dark .logout-btn { color: #f87171; }
        .dark .logout-btn:hover { background: rgba(239, 68, 68, 0.15); border-color: rgba(239, 68, 68, 0.3); }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            padding: 0.5rem;
            border-radius: 0.625rem;
            color: #6b7280;
            transition: all 0.2s;
        }
        .mobile-menu-btn:hover {
            background: #f3f4f6;
            color: #1f2937;
        }
        .dark .mobile-menu-btn { color: #9ca3af; }
        .dark .mobile-menu-btn:hover { background: #374151; color: white; }

        /* Mobile Menu */
        .mobile-menu {
            background: white;
            border-top: 1px solid #e5e7eb;
            animation: slideDown 0.2s ease;
        }
        .dark .mobile-menu { background: rgb(17 24 39); border-color: #374151; }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .mobile-menu-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem;
            background: linear-gradient(to right, rgba(99, 102, 241, 0.05), transparent);
            border-bottom: 1px solid #e5e7eb;
        }
        .dark .mobile-menu-header { border-color: #374151; background: linear-gradient(to right, rgba(99, 102, 241, 0.1), transparent); }
        .mobile-user-avatar {
            width: 2.75rem;
            height: 2.75rem;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1rem;
        }
        .mobile-user-name {
            font-weight: 700;
            color: #1f2937;
        }
        .dark .mobile-user-name { color: white; }
        .mobile-user-email {
            font-size: 0.75rem;
            color: #6b7280;
        }
        .dark .mobile-user-email { color: #9ca3af; }

        .mobile-nav-links {
            padding: 0.5rem;
        }
        .mobile-nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            font-size: 0.9375rem;
            font-weight: 600;
            color: #374151;
            border-radius: 0.625rem;
            text-decoration: none;
            transition: all 0.2s;
        }
        .mobile-nav-link:hover { background: #f3f4f6; }
        .dark .mobile-nav-link { color: #d1d5db; }
        .dark .mobile-nav-link:hover { background: #374151; }
        .mobile-nav-active {
            background: rgba(99, 102, 241, 0.1) !important;
            color: #6366f1 !important;
        }
        .dark .mobile-nav-active {
            background: rgba(99, 102, 241, 0.2) !important;
            color: #818cf8 !important;
        }

        .mobile-logout {
            padding: 0.5rem;
            border-top: 1px solid #e5e7eb;
        }
        .dark .mobile-logout { border-color: #374151; }
        .mobile-logout-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 0.9375rem;
            font-weight: 600;
            color: #ef4444;
            border-radius: 0.625rem;
            transition: all 0.2s;
        }
        .mobile-logout-btn:hover {
            background: rgba(239, 68, 68, 0.1);
        }
        .dark .mobile-logout-btn { color: #f87171; }
        .dark .mobile-logout-btn:hover { background: rgba(239, 68, 68, 0.15); }
    </style>
</nav>