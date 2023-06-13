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

                                    </div>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-striped">
                                            @if (Route::is('pribadi-pending-index'))
                                            <thead>
                                                <tr>
                                                    {{-- <th>No</th> --}}
                                                    <th>Topik</th>
                                                    <th>Tempat</th>
                                                    <th>Tanggal</th>
                                                    <th>jam mulai</th>
                                                    <th>jam berakhir</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($data as $item)
                                                <tr>
                                                    {{-- <td>{{$key +1}}</td> --}}
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $item->topik }}</strong></td>
                                                    {{-- <td>
                                                        @foreach ($data2 as $item2)
                                                        {{ $item2->siswa->nama }}
                                                    @endforeach
                                                    </td> --}}
                                                    <td>{{ $item->tempat }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->jam_mulai }}</td>
                                                    <td>{{ $item->jam_berakhir }}</td>
                                                    <td><span
                                                            class="badge bg-label-warning me-1">{{ $item->status }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <form action="{{ route('pribadi-acc',$item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-success"
                                                                        style="height: 33px; margin-right:2px">
                                                                        <svg style="font-size: 15px; margin-top:-10px"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="18" height="18" viewBox="0 0 24 24">
                                                                            <g fill="none" fill-rule="evenodd">
                                                                                <path
                                                                                    d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                                                                                <path fill="currentColor"
                                                                                    d="M21.546 5.111a1.5 1.5 0 0 1 0 2.121L10.303 18.475a1.6 1.6 0 0 1-2.263 0L2.454 12.89a1.5 1.5 0 1 1 2.121-2.121l4.596 4.596L19.424 5.111a1.5 1.5 0 0 1 2.122 0Z" />
                                                                            </g>
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                                    <button 
                                                                    type="button"
                                                                    class="btn btn-warning"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#basicModal"
                                                                        style="height: 33px; margin-right:2px">
                                                                        <i style="font-size: 15px; margin-top:-10px"
                                                                            class="bx bx-edit-alt me-1"></i>
                                                                    </button>
                                                                <form action="{{ route('pribadi-reject',$item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-danger"
                                                                        style="height: 33px; margin-right:2px">
                                                                        <svg style="font-size: 15px; margin-top:-10px"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="18" height="18" viewBox="0 0 24 24">
                                                                            <path fill="currentColor"
                                                                                d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2zm4.3 14.3a.996.996 0 0 1-1.41 0L12 13.41L9.11 16.3a.996.996 0 1 1-1.41-1.41L10.59 12L7.7 9.11A.996.996 0 1 1 9.11 7.7L12 10.59l2.89-2.89a.996.996 0 1 1 1.41 1.41L13.41 12l2.89 2.89c.38.38.38 1.02 0 1.41z" />
                                                                            </svg>
                                                                    </button>
                                                                </form>


                                                            </div>
                                                        </div>
                                                        <div class="modal fade" id="basicModal" tabindex="-1"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel1">
                                                                            Modal title</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col mb-3">
                                                                                <label for="nameBasic"
                                                                                    class="form-label">Name</label>
                                                                                <input type="text" id="nameBasic"
                                                                                    class="form-control"
                                                                                    placeholder="Enter Name" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-2">
                                                                            <div class="col mb-0">
                                                                                <label for="emailBasic"
                                                                                    class="form-label">Email</label>
                                                                                <input type="text" id="emailBasic"
                                                                                    class="form-control"
                                                                                    placeholder="xxxx@xxx.xx" />
                                                                            </div>
                                                                            <div class="col mb-0">
                                                                                <label for="dobBasic"
                                                                                    class="form-label">DOB</label>
                                                                                <input type="text" id="dobBasic"
                                                                                    class="form-control"
                                                                                    placeholder="DD / MM / YY" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary"
                                                                            data-bs-dismiss="modal">
                                                                            Close
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @endif
                                            @if (Route::is('pribadi-accept-index'))
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Topik</th>
                                                    <th>Tempat</th>
                                                    <th>Tanggal</th>
                                                    <th>jam mulai</th>
                                                    <th>jam berakhir</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($data as $key => $item)
                                                <tr>
                                                    <td>{{$key +1}}</td>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $item->topik }}</strong></td>
                                                    <td>{{ $item->tempat }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->jam_mulai }}</td>
                                                    <td>{{ $item->jam_berakhir }}</td>
                                                    <td><span
                                                            class="badge bg-label-success me-1">{{ $item->status }}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @endif
                                            @if (Route::is('pribadi-reschedule-index'))
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Topik</th>
                                                    <th>Tempat</th>
                                                    <th>Tanggal</th>
                                                    <th>jam mulai</th>
                                                    <th>jam berakhir</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($data as $key => $item)
                                                <tr>
                                                    <td>{{$key +1}}</td>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $item->topik }}</strong></td>
                                                    <td>{{ $item->tempat }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->jam_mulai }}</td>
                                                    <td>{{ $item->jam_berakhir }}</td>
                                                    <td><span
                                                            class="badge bg-label-success me-1">{{ $item->status }}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @endif
                                            @if (Route::is('pribadi-cancel-index'))
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Topik</th>
                                                    <th>Tempat</th>
                                                    <th>Tanggal</th>
                                                    <th>jam mulai</th>
                                                    <th>jam berakhir</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($data as $key => $item)
                                                <tr>
                                                    <td>{{$key +1}}</td>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $item->topik }}</strong></td>
                                                    <td>{{ $item->tempat }}</td>
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->jam_mulai }}</td>
                                                    <td>{{ $item->jam_berakhir }}</td>
                                                    <td><span
                                                            class="badge bg-label-danger me-1">{{ $item->status }}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @endif
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