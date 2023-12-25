@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success mx-4">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card mx-4">
    <div class="card-header">
        Brackets
        <p class="text-info mb-0">ADMIN</p>
        <div class="float-end mt-0">
            <a href="{{ url('/') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Inapoi
            </a>
            <a href="{{ route('brackets.create') }}" class="btn btn-info">Add new bracket</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Lower limit</th>
                    <th>Upper limit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brackets as $bracket)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $bracket->id }}</td>
                    <td>{{ $bracket->name }}</td>
                    <td>{{ $bracket->lower_limit . " kg"}}</td>
                    <td>{{ $bracket->upper_limit . " kg"}}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('brackets.show', $bracket->id) }}">View</a>
                        <a class="btn btn-primary" href="{{ route('brackets.edit', $bracket->id) }}">Edit</a>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['brackets.destroy', $bracket->id], 'style' =>
                        'display:inline']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $brackets->links($paginationView) }}
        </div>
    </div>
</div>
@endsection