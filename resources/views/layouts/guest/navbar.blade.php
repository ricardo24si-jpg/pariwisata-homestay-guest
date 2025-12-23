<div class="container-fluid nav-bar p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ route('dashboard') }}" class="navbar-brand p-0">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Bina Desa Logo"
                style="height: 100px; width: auto; max-width: none; max-height: none;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">

                {{-- HOME --}}
                <a href="{{ route('dashboard') }}"
                    class="nav-item nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Home
                </a>

                {{-- ABOUT --}}
                <a href="{{ route('about') }}"
                    class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    About
                </a>

                {{-- SERVICE --}}
                <a href="{{ route('ulasan.index') }}"
                    class="nav-item nav-link {{ request()->routeIs('service') ? 'active' : '' }}">
                    Ulasan
                </a>

                {{-- DROPDOWN PAGES --}}
                <div class="nav-item dropdown">
                    <a href="#"
                        class="nav-link dropdown-toggle
                        {{ request()->routeIs('warga.*') ||
                        request()->routeIs('users.*') ||
                        request()->routeIs('destinasi.*') ||
                        request()->routeIs('homestay.*') ||
                        request()->routeIs('kamar.*')
                            ? 'active'
                            : '' }}"
                        data-bs-toggle="dropdown">
                        Pages
                    </a>

                    <div class="dropdown-menu m-0">

                        {{-- WARGA --}}
                        <a href="{{ route('warga.index') }}"
                            class="dropdown-item {{ request()->routeIs('warga.*') ? 'active' : '' }}">
                            Data Warga
                        </a>

                        {{-- USERS --}}
                        <a href="{{ route('users.index') }}"
                            class="dropdown-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                            Data User
                        </a>

                        {{-- DESTINASI --}}
                        <a href="{{ route('destinasi.index') }}"
                            class="dropdown-item {{ request()->routeIs('destinasi.*') ? 'active' : '' }}">
                            Destinasi Wisata
                        </a>

                        {{-- HOMESTAY --}}
                        <a href="{{ route('homestay.index') }}"
                            class="dropdown-item {{ request()->routeIs('homestay.*') ? 'active' : '' }}">
                            Homestay
                        </a>

                        {{-- KAMAR HOMESTAY --}}
                        <a href="{{ route('kamar.index') }}"
                            class="dropdown-item {{ request()->routeIs('kamar.*') ? 'active' : '' }}">
                            Kamar Homestay
                        </a>

                    </div>
                </div>

                {{-- CONTACT --}}
                <a href="{{ route('booking.index') }}"
                    class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    Booking
                </a>

            </div>

            {{-- LOGIN --}}
            @if (session('user'))
                <div class="dropdown ms-3">
                    <a href="#" class="btn btn-outline-primary rounded-pill dropdown-toggle"
                        data-bs-toggle="dropdown">
                        <i class="fa fa-user me-1"></i> {{ session('user')->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item text-danger"><i class="fa fa-sign-out-alt me-2"></i>
                                    Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('users.create') }}" class="btn btn-primary rounded-pill py-2 px-4">Register</a>
            @endif
        </div>
    </nav>
</div>
