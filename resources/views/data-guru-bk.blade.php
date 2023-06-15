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
                                        <h5 class="card-header">Counseling Teacher User</h5>
                                        <a href="{{ route('guru.create') }}">
                                            <button type="button" class="btn btn-primary" style="height: 37px; margin-right:20px">Add</button>
                                        </a>
                                    </div>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    {{-- <th>kelas</th> --}}
                                                    <th>kelamin</th>
                                                    <th>Telepon</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($guru as $item)
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>{{ $item->nama }}</strong></td>
                                                    <td>{{ $item->user->email }}</td>
                                                    <td>{{ $item->kelamin }}</td>
                                                    <td>{{ $item->telepon }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ route('guru.edit', $item->id) }}"><i
                                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                        <form action="{{ route('guru.destroy', $item->id) }}" method="POST" style="display: inline-block">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="dropdown-item" type="submit""><i
                                                                                class="bx bx-trash me-1"></i> Delete</button>
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