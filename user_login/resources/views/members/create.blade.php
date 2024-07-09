@extends('layout') 
@section('title', 'create_member') 
@section('content')
<div class="container">

    <div class="mt-5">
        {{-- Display validation errors --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        {{-- Display session error message --}}
        {{-- @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif --}}

        {{-- Display session success message --}}
        {{-- @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif --}}
    </div>

    <form action="{{ route('member.post') }}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
        @csrf
        <div class="mb-3">
            <label class="form-label">Member Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="integer" class="form-control" name="phone_number">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection