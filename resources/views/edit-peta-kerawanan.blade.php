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
                            <h5 class="card-header">Edit Data Kerawanan Siswa</h5>
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <form action="{{ route('peta-kerawanan.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form">
                                        <label class="form-label" for="selectsiswa">siswa</label>
                                        <select id="select-beast" name="siswa_id" placeholder="Select a person..." autocomplete="off">
                                            <option value="">Select a person...</option>
                                            @foreach ($siswa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form">
                                        <label class="form-label" for="selectJenis">Jenis Kerawanan</label>
                                        <select id="select-state" name="jenis_kerawanan_id[]" multiple
                                            placeholder="Select a state..." autocomplete="off">
                                            <option value="">Jenis Kerawanan</option>
                                            @foreach ($jenis_kerawanan as $item)
                                            <option value="{{ $item->id }}">{{ $item->jenis_kerawanan }}</option>
                                            @endforeach
                                        </select>
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