@extends('layouts.guest.app')

@section('content')
    <style>
        /* ===== GLASS CARD ===== */
        .glass-card {
            position: relative;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-radius: 22px;
            padding: 26px 20px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            transition: .3s ease;
            overflow: hidden;
            min-height: 200px;
        }

        .glass-card:hover {
            transform: translateY(-6px);
            box-shadow: 0px 10px 35px rgba(0, 0, 0, .15);
        }

        /* CIRCLE DECOR */
        .circle-decor {
            position: absolute;
            width: 120px;
            height: 120px;
            background: rgba(59, 130, 246, 0.18);
            border-radius: 50%;
            top: -35px;
            right: -35px;
            z-index: 0;
        }

        .circle-decor-small {
            position: absolute;
            width: 65px;
            height: 65px;
            background: rgba(16, 185, 129, 0.2);
            border-radius: 50%;
            bottom: -20px;
            left: -20px;
            z-index: 0;
        }

        /* AVATAR */
        .glass-avatar {
            position: absolute;
            top: -3px;
            left: 50%;
            transform: translateX(-50%);
            width: 85px;
            height: 85px;
            border-radius: 50%;
            border: 4px solid #fff;
            overflow: hidden;
            z-index: 3;
            box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.15);
        }

        .glass-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* NAME & INFO */
        .glass-content {
            margin-top: 60px;
            text-align: center;
            z-index: 5;
            position: relative;
        }

        .glass-name {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
        }

        .glass-sub {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        /* ICON TEXT */
        .info-item {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            color: #374151;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .info-item i {
            color: #2563eb;
            font-size: 15px;
        }

        /* ACTION BUTTONS */
        .glass-action {
            position: absolute;
            top: 14px;
            right: 14px;
            display: flex;
            gap: 8px;
            z-index: 10;
        }

        .glass-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            color: #fff;
            cursor: pointer;
            transition: 0.2s;
        }

        .glass-btn.edit {
            background: #3b82f6;
        }

        .glass-btn.edit:hover {
            background: #1d4ed8;
        }

        .glass-btn.delete {
            background: #ef4444;
        }

        .glass-btn.delete:hover {
            background: #dc2626;
        }
    </style>

    <!-- HEADER -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5">
            <h3 class="text-white display-3 mb-4 wow fadeInDown">Warga</h3>
            <ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown">
                <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                <li class="breadcrumb-item text-white">Pages</li>
                <li class="breadcrumb-item text-secondary">Warga</li>
            </ol>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container-xxl py-5">
        <div class="container">

            <a href="{{ route('warga.create') }}" class="btn btn-secondary mb-4">
                <i class="fa fa-plus"></i> Tambah Warga
            </a>

            @include('layouts.guest.alerts')

            <div class="row">
                @foreach ($datas as $data)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="glass-card">

                            <!-- DECOR -->
                            <div class="circle-decor"></div>
                            <div class="circle-decor-small"></div>

                            <!-- ACTION -->
                            <div class="glass-action">
                                <a href="{{ route('warga.edit', $data) }}" class="glass-btn edit">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('warga.destroy', $data->warga_id) }}" method="POST"
                                    onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="glass-btn delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>

                            <!-- AVATAR -->
                            <div class="glass-avatar">
                                <img
                                    src="https://ui-avatars.com/api/?name={{ urlencode($data->nama) }}&background=0D8ABC&color=fff">
                            </div>

                            <!-- CONTENT -->
                            <div class="glass-content">
                                <div class="glass-name">{{ $data->nama }}</div>
                                <div class="glass-sub">{{ $data->no_ktp }}</div>

                                <div class="glass-sub">
                                    {{ $data->pekerjaan }} — {{ $data->agama }} — {{ $data->jenis_kelamin }}
                                </div>

                                <div class="info-item">
                                    <i class="fa fa-phone"></i>{{ $data->telp }}
                                </div>
                                <div class="info-item">
                                    <i class="fa fa-envelope"></i>{{ $data->email }}
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-3">
                {{ $datas->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
@endsection
