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
                        {{-- <div class="alert alert-danger">
                            <ul>
                                
                            </ul>
                        </div> --}}
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
                            <h5 class="card-header">Tambah Data Wali Kelas</h5>
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <form action="{{ route('walas.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">profile</label>
                                        <div class="input-group">
                                            <input type="file" name="photo" class="form-control" placeholder="profile"
                                                aria-label="profile" aria-describedby="basic-addon11"  wire:model="photo" x-ref="photo" />
                                        </div>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Nama</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon11">@</span>
                                            <input type="text" name="nama" class="form-control" placeholder="nama"
                                                aria-label="nama" aria-describedby="basic-addon11" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default">nipd</label>
                                            <div class="input-group">
                                                <input type="number" name="nipd" class="form-control" placeholder="nipd"
                                                    aria-label="nipd" aria-describedby="basic-addon11" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default">Tanggal Lahir</label>
                                            <div class="input-group">
                                                <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"
                                                    aria-label="Tanggal Lahir" aria-describedby="basic-addon11" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="selectKelamin">Jenis Kelamin</label>
                                        <select class="form-select placement-dropdown" name="kelamin"
                                            id="selectKelamin">
                                            <option value="top-0 start-0" hidden>Pilih Jenis Kelamin</option>
                                            <option value="laki-laki">Laki - Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="selectKelas">Kelas</label>
                                        <select class="form-select placement-dropdown" name="kelas" id="selectKelas">
                                            <option value="top-0 start-0" hidden>Pilih Kelas</option>
                                            @foreach ($kelas as $item)
                                                @if (!$item->wali_kelas_id)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="form">
                                            <label class="form-label" for="basic-default-password12">Telepon</label>
                                            <div class="input-group">
                                                <input type="number" name="telepon" class="form-control"
                                                    placeholder="Telepon" aria-label="Telepon"
                                                    aria-describedby="basic-addon11" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Email</label>
                                        <div class="input-group">
                                            <input type="text" name="email" class="form-control" placeholder="Email"
                                                aria-label="Email" aria-describedby="basic-addon13" />
                                            <span class="input-group-text" id="basic-addon13">@example.com</span>
                                        </div>
                                    </div>

                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" class="form-control"
                                                id="basic-default-password12"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="basic-default-password2" />
                                            <span id="basic-default-password2"
                                                class="input-group-text cursor-pointer"><i
                                                    class="bx bx-hide"></i></span>
                                        </div>
                                    </div>

                                    <div class="d-flex" style="justify-content: end; gap:10px; margin-top: 10px">
                                        <a href="{{ route('siswa.create') }}">
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

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

</x-app-layout>