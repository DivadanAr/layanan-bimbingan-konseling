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

                            {{-- pribadi --}}
                            @if (Route::is('pribadi-addschedule'))
                            <h5 class="card-header">Buat Jadwal Bimbingan Pribadi</h5>
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <form action="{{url('layanan/bimbingan-pribadi/menambah')}}" method="POST">
                                    @csrf

                                    <div class="form" style="display: none">
                                        <label class="form-label" for="basic-default-password12">layanan</label>
                                        <div class="input-group">
                                            <input type="text" value="bimbingan pribadi"  name="layanan" class="form-control" placeholder="layanan"
                                                aria-label="layanan" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="selectSiswa">Siswa</label>
                                        <select class="form-select placement-dropdown" name="siswa[]" id="select-beast"
                                            >
                                            <option value="" hidden>Pilih Siswa</option>
                                            @foreach ($siswa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Topik</label>
                                        <div class="input-group">
                                            <input type="text" name="topik" class="form-control" placeholder="Topik"
                                                aria-label="Topik" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>
                                    
                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Tempat Lokasi</label>
                                        <div class="input-group">
                                            <input type="text" name="lokasi" class="form-control" placeholder="Tempat Lokasi"
                                                aria-label="Tempat Lokasi" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default">Tanggal</label>
                                            <div class="input-group">
                                                <input type="date" name="tanggal" class="form-control"
                                                    placeholder="Tanggal" aria-label="Tanggal"
                                                    aria-describedby="basic-addon11" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default">Jam</label>
                                            <div style="display: flex;  justify-content:space-between; gap:20px">
                                                <div class="mb-3 row" style="width: 50%;">
                                                    <div >
                                                        <input name="jam_mulai" class="form-control" type="time"
                                                            id="html5-time-input" />
                                                    </div>
                                                </div>
                                                <span style="font-size: 25px">
                                                    -
                                                </span>
                                                <div class="mb-3 row" style="width: 50%">
                                                    <div >
                                                        <input name="jam_berakhir" class="form-control" type="time"
                                                            id="html5-time-input" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex" style="justify-content: end; gap:10px; margin-top: 10px">
                                        <a href="layanan/bimbingan-pribadi">
                                            <button type="button" class="btn btn-danger"
                                                style="height: 35px; padding:  0px 15px">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-primary"
                                            style="height: 35px; padding:  0px 22px">Save</button>

                                    </div>
                            </div>
                            @endif


                            {{-- sosial --}}
                            @if (Route::is('sosial-addschedule'))
                            <h5 class="card-header">Buat Jadwal Bimbingan Sosial</h5>
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <form action="{{url('layanan/bimbingan-pribadi/menambah')}}" method="POST">
                                    @csrf

                                    <div class="form" style="display: none">
                                        <label class="form-label" for="basic-default-password12">layanan</label>
                                        <div class="input-group">
                                            <input type="text" value="bimbingan sosial"  name="layanan" class="form-control" placeholder="layanan"
                                                aria-label="layanan" aria-describedby="basic-addon13" hidden/>
                                        </div>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="selectSiswa">Siswa</label>
                                        <select class="form-select placement-dropdown" name="siswa[]" id="select-state"
                                            >
                                            <option value="" hidden>Pilih Siswa</option>
                                            @foreach ($siswa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Topik</label>
                                        <div class="input-group">
                                            <input type="text" name="topik" class="form-control" placeholder="Topik"
                                                aria-label="Topik" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>
                                    
                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Tempat Lokasi</label>
                                        <div class="input-group">
                                            <input type="text" name="lokasi" class="form-control" placeholder="Tempat Lokasi"
                                                aria-label="Tempat Lokasi" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default">Tanggal</label>
                                            <div class="input-group">
                                                <input type="date" name="tanggal" class="form-control"
                                                    placeholder="Tanggal" aria-label="Tanggal"
                                                    aria-describedby="basic-addon11" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default">Jam</label>
                                            <div style="display: flex;  justify-content:space-between; gap:20px">
                                                <div class="mb-3 row" style="width: 50%;">
                                                    <div >
                                                        <input name="jam_mulai" class="form-control" type="time"
                                                            id="html5-time-input" />
                                                    </div>
                                                </div>
                                                <span style="font-size: 25px">
                                                    -
                                                </span>
                                                <div class="mb-3 row" style="width: 50%">
                                                    <div >
                                                        <input name="jam_berakhir" class="form-control" type="time"
                                                            id="html5-time-input" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex" style="justify-content: end; gap:10px; margin-top: 10px">
                                        <a href="layanan/bimbingan-pribadi">
                                            <button type="button" class="btn btn-danger"
                                                style="height: 35px; padding:  0px 15px">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-primary"
                                            style="height: 35px; padding:  0px 22px">Save</button>

                                    </div>
                            </div>
                            @endif


                            {{-- karir --}}
                            @if (Route::is('karir-addschedule'))
                            <h5 class="card-header">Buat Jadwal Bimbingan Karir</h5>
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <form action="{{url('layanan/bimbingan-pribadi/menambah')}}" method="POST">
                                    @csrf

                                    <div class="form" style="display: none">
                                        <label class="form-label" for="basic-default-password12">layanan</label>
                                        <div class="input-group">
                                            <input type="text" value="bimbingan karir"  name="layanan" class="form-control" placeholder="layanan"
                                                aria-label="layanan" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="selectSiswa">Siswa</label>
                                        <select class="form-select placement-dropdown" name="siswa[]" id="select-beast"
                                            >
                                            <option value="" hidden>Pilih Siswa</option>
                                            @foreach ($siswa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Topik</label>
                                        <div class="input-group">
                                            <input type="text" name="topik" class="form-control" placeholder="Topik"
                                                aria-label="Topik" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>
                                    
                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Tempat Lokasi</label>
                                        <div class="input-group">
                                            <input type="text" name="lokasi" class="form-control" placeholder="Tempat Lokasi"
                                                aria-label="Tempat Lokasi" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default">Tanggal</label>
                                            <div class="input-group">
                                                <input type="date" name="tanggal" class="form-control"
                                                    placeholder="Tanggal" aria-label="Tanggal"
                                                    aria-describedby="basic-addon11" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default">Jam</label>
                                            <div style="display: flex;  justify-content:space-between; gap:20px">
                                                <div class="mb-3 row" style="width: 50%;">
                                                    <div >
                                                        <input name="jam_mulai" class="form-control" type="time"
                                                            id="html5-time-input" />
                                                    </div>
                                                </div>
                                                <span style="font-size: 25px">
                                                    -
                                                </span>
                                                <div class="mb-3 row" style="width: 50%">
                                                    <div >
                                                        <input name="jam_berakhir" class="form-control" type="time"
                                                            id="html5-time-input" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex" style="justify-content: end; gap:10px; margin-top: 10px">
                                        <a href="layanan/bimbingan-pribadi">
                                            <button type="button" class="btn btn-danger"
                                                style="height: 35px; padding:  0px 15px">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-primary"
                                            style="height: 35px; padding:  0px 22px">Save</button>

                                    </div>
                            </div>
                            @endif

                            {{-- belajar --}}
                            @if (Route::is('belajar-addschedule'))
                            <h5 class="card-header">Buat Jadwal Bimbingan Belajar</h5>
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <form action="{{url('layanan/bimbingan-pribadi/menambah')}}" method="POST">
                                    @csrf

                                    <div class="form" style="display: none">
                                        <label class="form-label" for="basic-default-password12">layanan</label>
                                        <div class="input-group">
                                            <input type="text" value="bimbingan belajar"  name="layanan" class="form-control" placeholder="layanan"
                                                aria-label="layanan" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="selectSiswa">Siswa</label>
                                        <select class="form-select placement-dropdown" name="siswa[]" id="select-beast"
                                            >
                                            <option value="" hidden>Pilih Siswa</option>
                                            @foreach ($siswa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Topik</label>
                                        <div class="input-group">
                                            <input type="text" name="topik" class="form-control" placeholder="Topik"
                                                aria-label="Topik" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>
                                    
                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Tempat Lokasi</label>
                                        <div class="input-group">
                                            <input type="text" name="lokasi" class="form-control" placeholder="Tempat Lokasi"
                                                aria-label="Tempat Lokasi" aria-describedby="basic-addon13" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default">Tanggal</label>
                                            <div class="input-group">
                                                <input type="date" name="tanggal" class="form-control"
                                                    placeholder="Tanggal" aria-label="Tanggal"
                                                    aria-describedby="basic-addon11" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default">Jam</label>
                                            <div style="display: flex;  justify-content:space-between; gap:20px">
                                                <div class="mb-3 row" style="width: 50%;">
                                                    <div >
                                                        <input name="jam_mulai" class="form-control" type="time"
                                                            id="html5-time-input" />
                                                    </div>
                                                </div>
                                                <span style="font-size: 25px">
                                                    -
                                                </span>
                                                <div class="mb-3 row" style="width: 50%">
                                                    <div >
                                                        <input name="jam_berakhir" class="form-control" type="time"
                                                            id="html5-time-input" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex" style="justify-content: end; gap:10px; margin-top: 10px">
                                        <a href="layanan/bimbingan-pribadi">
                                            <button type="button" class="btn btn-danger"
                                                style="height: 35px; padding:  0px 15px">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-primary"
                                            style="height: 35px; padding:  0px 22px">Save</button>

                                    </div>
                            </div>
                            @endif

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