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
                                        <h5 class="card-header">Peta Kerawanan Siswa</h5>
                                        <div class="" style="width:200px; display:flex;">
                                            <a href="{{ route('peta-kerawanan.create') }}">
                                                <button type="button" class="btn btn-primary"
                                                    style="height: 37px; margin-right:20px">Add</button>
                                            </a>
                                            <form action="{{ route('export-excel') }}" method="POST" target="_blank">
                                                {{-- <form action="{{ route('export-pdf') }}" method="GET" target="_blank"> --}}

                                                @csrf
                                                <a href="">
                                                    <button type="submit" class="btn btn-secondary"
                                                        style="height: 37px; margin-right:20px">Export</button>
                                                </a>
                                            </form>
                                        </div>

                                    </div>


                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>kelas</th>
                                                    <th>Wali Kelas</th>
                                                    <th>Jenis Kerawanan</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($data as $key => $item)
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $item->siswa->nama }}</strong></td>
                                                    <td>{{ $item->kelas->nama }}</td>
                                                    <td>{{ $item->wali_kelas->nama }}</td>
                                                    <td>{{ $item->jenis_kerawanan }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu" >
                                                                <a class="dropdown-item"
                                                                    href="{{ route('siswa.edit', $item->id) }}"><i
                                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                <form action="{{ route('siswa.destroy', $item->id) }}"
                                                                    method="POST" style="display: inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="dropdown-item" type="submit""><i
                                                                                class=" bx bx-trash me-1"></i>
                                                                        Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
