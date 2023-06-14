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

                <div class="container-xxl flex-grow-1 container-p-y">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->

                        <div class="card mb-4">
                            <h5 class="card-header">Buat Surat Pemanggilan</h5>
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <form action="{{route('pemanggilan.store')}}" method="POST">
                                    @csrf

                                    <div class="form">
                                        <label class="form-label" for="selectSiswa">Siswa</label>
                                        <select class="form-select placement-dropdown" name="siswa_id" id="selectSiswa">
                                            <option value="" hidden>Pilih Siswa</option>
                                            @foreach ($siswa as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    

                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">hari</label>
                                        <div class="input-group">
                                            <input type="text" name="hari" class="form-control" placeholder="Pick a Day"
                                                aria-label="hari" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default">Date</label>
                                            <div class="input-group">
                                                <input type="date" name="tanggal" class="form-control"
                                                    placeholder="Tanggal" aria-label="Tanggal"
                                                    aria-describedby="basic-addon11" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default">Time</label>
                                            <div class="input-group">
                                                <input type="time" name="jam" class="form-control"
                                                    placeholder="Tanggal" aria-label="Tanggal"
                                                    aria-describedby="basic-addon11" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Tempat Lokasi</label>
                                        <div class="input-group">
                                            <input type="text" name="tempat" class="form-control" placeholder="Tempat Lokasi"
                                                aria-label="Tempat Lokasi" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Necessary</label>
                                        <div class="input-group">
                                            <input type="text" name="acara" class="form-control" placeholder="Topik"
                                                aria-label="Topik" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>
                                    

                                
                                    <div class="d-flex" style="justify-content: end; gap:10px; margin-top: 10px">
                                        <a href="{{ route('pemanggilan.index') }}">
                                            <button type="button" class="btn btn-danger"
                                                style="height: 35px; padding:  0px 15px">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-primary"
                                            style="height: 35px; padding:  0px 22px">Save</button>

                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <script>
            new TomSelect("#select-state", {
                maxItems: 20
            });

            new TomSelect("#select-beast", {
                create: true,
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });

        </script>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

</x-app-layout>