<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
    </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div> --}}
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            @include('components.sidebar-dashboard')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @livewire('navigation-menu')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4>
                            <strong>
                                Welcome {{ Auth::user()->name }}
                            </strong>
                        </h4>
                        <p style="margin-top: -15px; font-size:16px;">What can we do for you today?</p>
                        <div class="col">

                            <div class="col-lg-4 col-md-4 order-4">
                                <div class="col" style="display: flex; gap:40px;">
                                    <div class="col-lg-8 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/chart-success.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>

                                                </div>
                                                <span class="fw-semibold d-block mb-1">Student Data</span>
                                                <h3 class="card-title mb-2">{{$siswa}}</h3>
                                                <small class="text-success fw-semibold" style="margin-left:125px;"><i
                                                        class=""></i>{{$siswa}} students</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/chart-success.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>

                                                </div>
                                                <span class="fw-semibold d-block mb-1">Guidance Counselor</span>
                                                <h3 class="card-title mb-2">{{$gurubk}}</h3>
                                                <small class="text-success fw-semibold" style="margin-left:125px;"><i
                                                        class=""></i>{{$gurubk}} Counselor</small>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-8 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/chart-success.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>

                                                </div>
                                                <span class="fw-semibold d-block mb-1">Class Data</span>
                                                <h3 class="card-title mb-2">{{$kelas}}</h3>
                                                <small class="text-success fw-semibold" style="margin-left:125px;"><i
                                                        class=""></i>{{$kelas}} classes</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div
                                                    class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <img src="../assets/img/icons/unicons/chart-success.png"
                                                            alt="chart success" class="rounded" />
                                                    </div>

                                                </div>
                                                <span class="fw-semibold d-block mb-1">Counseling Data</span>
                                                <h3 class="card-title mb-2">{{$konseling}}</h3>
                                                <small class="text-success fw-semibold"><i
                                                        style="margin-left:110px;"></i>{{$konseling}} Counseling</small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Total Revenue -->

                            <!-- Total Revenue -->
                            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="card">
                                    <div class="row row-bordered g-0">
                                        <div class="col-md-8">
                                            <h5 class="card-header m-0 me-2 pb-3">Total Counseling</h5>
                                            <div id="totalRevenueChart" class="px-2"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="dropdown"  style="margin-top: 10px">
                                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle"
                                                            type="button" id="growthReportId" data-bs-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            2022
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="growthReportId">
                                                            <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="growthChart" style="margin-top: 0px"></div>
                                            <div class="text-center fw-semibold pt-5 mb-2">62% Students With their <br> study Problems</div>

                                            
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

</x-app-layout>
