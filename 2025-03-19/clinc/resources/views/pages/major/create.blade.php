@extends('layout.app')

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ Route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Major</li>
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
            <form class="form" method="POST" action="{{ route('majors.store') }}">
                @csrf
                <div class="form-items">
                    <div class="mb-3">
                        <label class="form-label required-label" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create Major</button>
            </form>
        </div>

    </div>
    </div>
@endsection
