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
            <a href="{{ route('dogs.create') }}" class="btn btn-info">{{ __('Add new dog') }}</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr>
                    <th>{{ __('No.') }}</th>
                    <th>{{ __('Id') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Birth year') }}</th>
                    <th>{{ __('Weight') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Owner Id') }}</th>
                    <th>{{ __('Verification') }}</th>
                    <th>{{ __('Actions') }}</th>
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
                        <a class="btn btn-success" href="{{ route('dogs.show', $dog->id) }}">{{ __('View') }}</a>
                        @can('access-crud-page')
                        <a class="btn btn-primary" href="{{ route('dogs.edit', $dog->id) }}">{{ __('Edit') }}</a>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['dogs.destroy', $dog->id], 'style' =>
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