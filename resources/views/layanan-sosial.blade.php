<x-app-layout>
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

                <div class="container-xxl flex-grow-1 container-p-y">
                    @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="">
                            <div class="card mb-4">
                                <div class="card">
                                    <div style="align-items: center;display: flex; justify-content:space-between">
                                        <h5 class="card-header">Layanan</h5>
                                        <a href="{{url('layanan/tambah/bimbingan-pribadi')}}">
                                            <button type="button" class="btn btn-primary"
                                                style="height: 37px; margin-right:20px">Add</button>
                                        </a>
                                    </div>
                                    <div class="table-responsive text-nowrap">
                                        @if ($konselingBk->isEmpty())
                                        <p>Tidak ada layanan BK yang tersedia.</p>
                                        @else
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Topik</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam Mulai</th>
                                                    <th>Jam Berakhir</th>
                                                    <th>Lokasi</th>
                                                    <th>siswa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($konselingBk as $konseling)
                                                <tr>
                                                    <td>{{ $konseling->topik }}</td>
                                                    <td>{{ $konseling->tanggal }}</td>
                                                    <td>{{ $konseling->jam_mulai }}</td>
                                                    <td>{{ $konseling->jam_berakhir }}</td>
                                                    <td>{{ $konseling->tempat }}</td>
                                                    <td>
                                                        @foreach ($konseling->siswaKonseling as $siswaKonseling)
                                                            {{ $siswaKonseling->siswa->nama }}
                                                            <br>
                                                        @endforeach
                                                    </td>
                                            
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

</x-app-layout>