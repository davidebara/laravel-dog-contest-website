@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success mx-4">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card mx-4">
    <div class="card-header">
        Contests
        @can('access-crud-page')
        <p class="text-info mb-0">ADMIN</p>
        <div class="float-end mt-0">
            <a href="{{ url('/') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
            <a href="{{ route('contests.create') }}" class="btn btn-info">Add new contest</a>
        </div>
        @endcan
    </div>
    <div class="card-body">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Prize</th>
                    <th>Bracket ID & Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contests as $contest)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $contest->id }}</td>
                    <td>{{ $contest->name }}</td>
                    <td>{{ $contest->date }}</td>
                    <td>{{ $contest->prize . " euro"}}</td>
                    @if ($contest->bracket)
                    <td>{{ $contest->bracket->id }} - {{ $contest->bracket->name }}</td>
                    @endif
                    <td>
                        <a class="btn btn-success" href="{{ route('contests.show', $contest->id) }}">View</a>
                        @can('access-crud-page')
                        <a class="btn btn-primary" href="{{ route('contests.edit', $contest->id) }}">Edit</a>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['contests.destroy', $contest->id], 'style' =>
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
            {{ $contests->links($paginationView) }}
        </div>
    </div>
</div>
@endsection