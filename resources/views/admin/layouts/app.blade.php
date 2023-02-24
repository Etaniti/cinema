@extends('layouts.app')

@section('sidebar')
    <div>
        <div class="d-flex justify-content-start">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mt-1">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary mx-3 mb-2" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary mx-3 mb-2" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary mx-3 mb-2" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary mx-3 mb-2" href="#">Disabled</a>
                    </li>
                </ul>
            </nav>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
@endsection
