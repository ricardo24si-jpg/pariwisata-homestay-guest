<div class="container-fluid nav-bar p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ route('dashboard') }}" class="navbar-brand p-0">
            <h1 class="display-5 text-secondary m-0">Bina Desa</h1>
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
                <a href="{{ route('service') }}"
                    class="nav-item nav-link {{ request()->routeIs('service') ? 'active' : '' }}">
                    Service
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
                <a href="{{ route('contact') }}"
                    class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    Contact
                </a>

            </div>

            {{-- LOGIN --}}
            <a href=""
                class="btn btn-primary border-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0">
                Login
            </a>
        </div>
    </nav>
</div>
