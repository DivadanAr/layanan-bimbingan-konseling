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
                                        <h5 class="card-header">Pemanggilan Orang Tua</h5>
                                        <a href="{{ route('pemanggilan.create') }}">
                                            <button type="button" class="btn btn-primary"
                                                style="height: 37px; margin-right:20px">Add</button>
                                        </a>
                                        

                                    </div>


                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>hari</th>
                                                    <th>tanggal</th>
                                                    <th>jam</th>
                                                    <th>tempat</th>
                                                    <th>acara</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($pemanggilan as $key => $item)
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                    {{ $item->siswa->nama }}</td>
                                                    <td>{{ $item->hari }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->jam }}</td>
                                                    <td>{{ $item->tempat }}</td>
                                                    <td>{{ $item->acara }}</td>
                                                    
                                                    
                                                    <td>
                                                    

                                                            
                                                            


                                                                <form action="{{ route('export-pdf', ['id' => $item->id]) }} method="GET" target="_blank">

                                                                    @csrf
                                                                    <a href="">
                                                                        <button type="submit" class="btn btn-secondary"
                                                                            style="height: 37px; margin-right:20px">Export</button>
                                                                    </a>
                                                                </form>

                                                              


                                                                <form action="{{ route('pemanggilan.destroy', $item->id) }}"
                                                                    method="POST" style="display: inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="danger" type="submit""><i
                                                                                class=" bx bx-trash me-1"></i>
                                                     
                                                                                Delete</button>
                                                                </form>
                                                           
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
