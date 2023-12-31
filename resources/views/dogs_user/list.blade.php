@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success mx-4">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card mx-4">
    <div class="card-header">
        Dogs
        <p class="text-info mb-0">ADMIN</p>
        <div class="float-end mt-0">
            <!-- <a href="{{ url('/') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Inapoi
            </a> -->
            <a href="{{ route('dogs.create') }}" class="btn btn-info">Add new dog</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Birth year</th>
                    <th>Weight</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Owner Id</th>
                    <th>Verification</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dogs as $dog)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $dog->id }}</td>
                    <td>{{ $dog->name }}</td>
                    <td>{{ $dog->birth_year }}</td>
                    <td>{{ $dog->weight . " kg"}}</td>
                    <td>{{ $dog->image }}</td>
                    <td>{{ $dog->description }}</td>
                    <td>{{ $dog->owner_id }}</td>
                    <td>{{ $dog->verification }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('dogs_user.show', $dog->id) }}">View</a>
                        @can('access-crud-page')
                        <a class="btn btn-primary" href="{{ route('dogs_user.edit', $dog->id) }}">Edit</a>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['dogs_user.destroy', $dog->id], 'style' =>
                        'display:inline']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $dogs->links($paginationView) }}
        </div>
    </div>
</div>
@endsection