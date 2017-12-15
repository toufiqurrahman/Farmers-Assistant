@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($experts as $expert)
                    <tr>
                        <td>{{ $expert->name }}</td>
                        <td>{{ $expert->email }}</td>
                        <td>{{ $expert->phone }}</td>
                        <td>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection