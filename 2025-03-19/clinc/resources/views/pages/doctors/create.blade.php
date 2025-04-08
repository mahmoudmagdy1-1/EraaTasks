@extends('layout.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ Route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Doctor</li>
            </ol>
        </nav>
        <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form class="form" method="POST" action="{{ route('doctors.store') }}">
                @csrf
                <div class="form-items">
                    <div class="mb-3">
                        <label class="form-label required-label" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="major_id">Major ID</label>
                            <select class="form-control" id="major_id" name="major_id">
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Create Doctor</button>
            </form>
        </div>

    </div>
    </div>
@endsection
