@extends('layouts.admin')

@section('title', 'Employee List')
@section('content-header', 'Employee List')
@section('content-actions')
    <a href="{{route('users.create')}}" class="btn btn-primary">Add Employee</a>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr class="">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img width="50" class="" src="{{$user->user_avatar}}" alt="Avatar">
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone ?? '-'}}</td>
                        <td>{{$user->created_at->format('M d, Y')}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-secondary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-delete" data-url="{{route('users.destroy', $user)}}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
