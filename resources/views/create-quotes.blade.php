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
                            <h5 class="card-header">Tambah Data Siswa</h5>
                            <div class="card-body demo-vertical-spacing demo-only-element">
                                <form action="{{ route('quotes.store') }}" method="POST">
                                    @csrf

                                    <div class="form">
                                        <label class="form-label" for="basic-default-password12">Quotes</label>
                                        <div class="input-group">
                                            {{-- <span class="input-group-text" id="basic-addon11">@</span> --}}
                                            <textarea type="text" name="quotes" class="form-control" placeholder="quotes"
                                                aria-label="nama" aria-describedby="basic-addon11"></textarea>
                                        </div>
                                    </div>

                                    

                                    <div class="d-flex" style="justify-content: end; gap:10px; margin-top: 10px">
                                        <a href="{{ route('quotes.create') }}">
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