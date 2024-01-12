@php
    $path = explode('/', Request::path());
@endphp
{{-- @dd($path) --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="">
    <meta charset="utf-8" />
    <title> {{ config('app.name') }} </title>
    <meta name="description"
        content="Si Peka (Sistem Informasi Pengetesan Kemiskinan) Adalah Wadah Perencanaan, Monitoring Pelakasanaan dan Evaluasi Kinerja Program Pengetesan Kemiskinan Terintegrasi Dengan Konsep Kolaborasi Program dan Anggaran." />
    <meta name="keywords" content="Kemiskinan, perencanaan,monitoring, evaluasi" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/logo.png" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/plugins/custom/jquery-ui/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    @yield('style')
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed aside-fixed-custom"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="post d-flex flex-column-fluid w-100" id="kt_post">
                <!--begin::Container-->
                <div class="card shadow-sm card-content">
                    <div class="row h-sm-100">
                        <div class="col-md-2">
                            <div class="bg-primary rounded h-sm-100 py-5">
                                <img class="w-sm-100 mb-5" src="{{ asset('logo.png') }}" alt="">
                                <div class="aside-menu bg-primary flex-column-fluid">
                                    <!--begin::Aside Menu-->
                                    <div class="hover-scroll-overlay-y mb-5 mb-lg-5" id="kt_aside_menu_wrapper"
                                        {{-- data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                        data-kt-scroll-height="auto"
                                        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                                        data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0" --}}>
                                        <!--begin::Menu-->
                                        <div class="menu menu-column mt-2 menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                                            id="kt_aside_menu" data-kt-menu="true" style="gap: 3px;">
                                            <div class="menu-item">
                                                <a class="menu-link {{ $path[0] === '' ? 'active' : '' }}"
                                                    href="{{ route('demografi') }}">
                                                    <span class="menu-icon">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <img src="{{ url('admin/assets/media/icons/aside/datagurudef.svg') }}"
                                                                alt="">
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <span class="menu-title"
                                                        style="{{ $path[0] === '' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Demografi</span>
                                                </a>
                                            </div>

                                            <div class="menu-item">
                                                <a class="menu-link {{ $path[0] === 'pendidikan' ? 'active' : '' }}"
                                                    href="{{ route('pendidikan') }}">
                                                    <span class="menu-icon">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <img src="{{ url('admin/assets/media/icons/aside/datagurudef.svg') }}"
                                                                alt="">
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <span class="menu-title"
                                                        style="{{ $path[0] === 'pendidikan' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Pendidikan</span>
                                                </a>
                                            </div>

                                            <div class="menu-item">
                                                <a class="menu-link {{ $path[0] === 'pekerjaan' ? 'active' : '' }}"
                                                    href="{{ route('pekerjaan') }}">
                                                    <span class="menu-icon">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <img src="{{ url('admin/assets/media/icons/aside/datagurudef.svg') }}"
                                                                alt="">
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <span class="menu-title"
                                                        style="{{ $path[0] === 'pekerjaan' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Pekerjaan
                                                        &
                                                        Pengangguran</span>
                                                </a>
                                            </div>

                                            <div class="menu-item">
                                                <a class="menu-link {{ $path[0] === 'status' ? 'active' : '' }}"
                                                    href="{{ route('status') }}">
                                                    <span class="menu-icon">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <img src="{{ url('admin/assets/media/icons/aside/datagurudef.svg') }}"
                                                                alt="">
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <span class="menu-title"
                                                        style="{{ $path[0] === 'status' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Status
                                                        Perkawinan</span>
                                                </a>
                                            </div>

                                            <div class="menu-item">
                                                <a class="menu-link {{ $path[0] === 'teknologi' ? 'active' : '' }}"
                                                    href="{{ route('teknologi') }}">
                                                    <span class="menu-icon">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <img src="{{ url('admin/assets/media/icons/aside/datagurudef.svg') }}"
                                                                alt="">
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <span class="menu-title"
                                                        style="{{ $path[0] === 'teknologi' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Teknologi
                                                        &
                                                        Media Sosial</span>
                                                </a>
                                            </div>

                                            <div class="menu-item">
                                                <a class="menu-link {{ $path[0] === 'kecamatan' ? 'active' : '' }}"
                                                    href="{{ route('kecamatan') }}">
                                                    <span class="menu-icon">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <img src="{{ url('admin/assets/media/icons/aside/datagurudef.svg') }}"
                                                                alt="">
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <span class="menu-title"
                                                        style="{{ $path[0] === 'kecamatan' ? 'color: #F4BE2A' : 'color: #FFFFFF' }}">Kecamatan</span>
                                                </a>
                                            </div>

                                            {{-- <div class="menu-item">
                                                <a class="menu-link {{ $isActive ? 'active' : '' }}" href="{{ route($dashboardRoutes[$role]) }}">
                                                    <span class="menu-icon">
                                                        <span class="svg-icon svg-icon-2">
                                                            <img src="{{ $isActive ? url('admin/assets/media/icons/aside/dashboardact.svg') : url('admin/assets/media/icons/aside/dashboarddef.svg') }}"
                                                                alt="">
                                                        </span>
                                                    </span>
                                                    <span class="menu-title" style="{{ $activeColor }}">Dashboard</span>
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="py-2">
                                <div
                                    class="bg-primary rounded-2 d-flex align-items-center p-2 fs-3 fw-bolder justify-content-center">
                                    VISUALISASI
                                    DATA
                                    KEPEMUDAAN
                                    MAKASSAR</div>
                                <div class="fs-5 p-2">Filter Tahun</div>
                                <div class="d-flex gap-3">
                                    <a href="" class="btn btn-primary p-3 py-2">
                                        2020</a>
                                    <a href="" class="btn btn-primary p-3 py-2">
                                        2021</a>
                                    <a href="" class="btn btn-primary p-3 py-2">
                                        2022</a>
                                    <a href="" class="btn btn-primary p-3 py-2">
                                        2023</a>
                                </div>
                                <div class="py-3">
                                    <div class="d-flex justify-content-center gap-5">
                                        <div class="card d-grid text-center shadow-lg p-3 px-5" style="width: 280px;">
                                            <div class="fw-bolder bg-primary-kotak rounded p-2">Jumlah Penduduk
                                                Kepemudaan
                                            </div>
                                            <div class="fs-1" id="jumlah_penduduk">
                                                <div class="spinner-border text-danger" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                            </div>
                                            <div class="fs-5">Jiwa</div>
                                        </div>
                                        <div class="card d-grid text-center shadow-lg p-3 px-5" style="width: 280px;">
                                            <div class="fw-bolder bg-primary-kotak rounded p-2">Total Kecamatan
                                            </div>
                                            <div class="fs-1">14</div>
                                            <div class="fs-5">Kecamatan</div>
                                        </div>
                                        <div class="card d-grid text-center shadow-lg p-3 px-5" style="width: 280px;">
                                            <div class="fw-bolder bg-primary-kotak rounded p-2">Kepadatan Penduduk
                                            </div>
                                            <div class="fs-1">100</div>
                                            <div class="fs-5">Jiwa/Km Persegi</div>
                                        </div>
                                        <!-- <div class="card d-grid text-center shadow-lg p-3 px-5"style="width: 280px;">
                                            <div class="fw-bolder bg-primary-kotak rounded p-2">Jumlah Penduduk
                                                Kepemudaan
                                            </div>
                                            <div class="fs-1">100</div>
                                            <div class="fs-5">Jiwa</div>
                                        </div>-->
                                    </div>
                                </div>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <!--end::Container-->
                </div>
            </div>
            <!--end::Page-->
        </div>
        <!--end::Root-->



        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
            <span class="svg-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10"
                            rx="1" />
                        <path
                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                            fill="#000000" fill-rule="nonzero" />
                    </g>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>


        @yield('side-form')

        <!--end::Main-->
        <!--begin::Javascript-->
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

        <script src="{{ asset('admin/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
        <script src="{{ asset('admin/assets/plugins/custom/jquery-ui/jquery-ui.js') }}"></script>
        <script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="{{ asset('admin/assets/js/widgets.bundle.js') }}"></script>
        <script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
        <script src="{{ asset('admin/assets/js/custom/apps/chat/chat.js') }}"></script>
        <script src="{{ asset('admin/assets/js/custom/modals/create-app.js') }}"></script>
        <script src="{{ asset('admin/assets/js/custom/modals/upgrade-plan.js') }}"></script>
        <script src="{{ asset('admin/assets/js/panel.js') }}"></script>
        <!-- Contoh dengan menggunakan CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

        {{-- <script src="resources/js/face-api.js"></script> --}}
        {{-- <script src="{{ asset('js/face-api.js') }}"></script> --}}

        @yield('script')
        <!--end::Page Custom Javascript-->
        <!--end::Javascript-->

        <script>
            $(document).ready(async function() {
                try {
                    const res = await $.ajax({
                        url: '/data-master',
                        method: 'GET'
                    });

                    if (res.success === true) {
                        const jumlahPenduduk = res.data;

                        // Mengubah angka menjadi format ribuan dengan titik
                        const jumlahPendudukFormatted = jumlahPenduduk.toLocaleString();

                        // Menetapkan nilai ke elemen HTML dengan ID 'jumlah_penduduk'
                        $('#jumlah_penduduk').text(jumlahPendudukFormatted);
                    } else {
                        console.error('Gagal mengambil data:', res.message);
                    }
                } catch (error) {
                    console.error('Gagal melakukan permintaan AJAX:', error.statusText);
                }
            });
        </script>
</body>
<!--end::Body-->

</html>
