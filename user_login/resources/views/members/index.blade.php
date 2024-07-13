@extends('layout')

@section('title', 'Home Page')

@section('content')
<div class="container">
    <div class="row justify-content-end">
        <div class="col-auto">
            <a href="{{ route('member.create') }}" class="btn btn-success">Add Member</a>
        </div>
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone number</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td scope="row">{{ $member->id }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->address }}</td>
                <td>{{ $member->phone_number }}</td>
                <td><a href="{{ route('member.view', ['member' => $member]) }}" class="btn btn-primary">View</a></td>
                <td><a href="{{ route('member.edit', ['member' => $member]) }}" class="btn btn-success">Edit</a></td>
                <td>
                    <form action="{{ route('member.delete', ['member' => $member]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    {{-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end" >
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#"> {{ $members->links() }}</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav> --}}
    <div class="container" style="width: 200px; float: right;">
        {{ $members->links() }}
    </div>
</div>
@endsection
