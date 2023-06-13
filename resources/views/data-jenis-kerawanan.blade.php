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
                                        <h5 class="card-header">Jenis Kerawanan</h5>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#smallModal"
                                            style="height: 37px; margin-right:20px">Add</button>
                                    </div>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center; width: 10%">no</th>
                                                    <th style="text-align:center; width: 45%">Nama</th>
                                                    <th style="text-align:center; width: 45%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($kerawanan as $key => $item)

                                                <tr>
                                                    <td style="text-align: center">
                                                        {{$key +1}}
                                                    </td>
                                                    <td style="text-align: center"><i
                                                            class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $item->jenis_kerawanan }}</strong></td>

                                                    <td style="text-align: center">
                                                                {{-- <a class="dropdown-item edit-btn"
                                                                    data-id="{{ $item->id }}" href="#"><i
                                                                        class="bx bx-edit-alt me-1"></i> Edit</a> --}}
                                                                <form
                                                                    action="{{ route('kerawanan.destroy', $item->id) }}"
                                                                    method="POST" style="display: inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger"
                                                                    style="height: 37px; margin-right:20px">
                                                                    <i class=" bx bx-trash me-1"></i>
                                                                    Delete
                                                                </button>
                                                                </form>
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
        <div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
            <form id="formKerawanan" action="{{ route('kerawanan.store') }}" method="POST">
                @csrf
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Tambah Jenis Kerawanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col ">
                                    <label for="nameSmall" class="form-label">Jenis Kerawanan</label>
                                    <input type="text" id="nameSmall" class="form-control" name="jenis_kerawanan"
                                        placeholder="Masukan Jenis Kerawanan" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- <script>
        $(document).ready(function () {
            $('#formKerawanan').on('submit', function (event) {
                event.preventDefault(); // Mencegah form dari pengiriman default

                // Mengambil URL dan data form
                var url = $(this).attr('action');
                var formData = $(this).serialize();

                // Mengirim request Ajax
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        // Menutup modal setelah berhasil
                        $('#smallModal').modal('hide');

                        // Menampilkan pesan sukses
                        alert(response.success);
                    },
                    error: function (xhr, status, error) {
                        // Menangani kesalahan jika ada
                        var err = JSON.parse(xhr.responseText);
                        if (err.error) {
                            alert(err.error.nama[0]);
                        } else {
                            alert('Terjadi kesalahan. Silakan coba lagi.');
                        }
                    }
                });
            });
        });
    </script> --}}
</x-app-layout>