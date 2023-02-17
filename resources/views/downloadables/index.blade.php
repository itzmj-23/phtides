@extends('layouts.app')

@section('content')
    <style>
        td, th {
            vertical-align: middle;
            text-align: center;
        }
    </style>

    <div class="container mb-4">
        <div class="mt-5 text-center">
            <h1 class="">Downloadable Resources</h1>
            <p class="">Downloadable Resources Management begins here</p>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="">
                    <a href="{{ route('downloads.create') }}" class="btn btn-primary">Add Resources</a>
                </div>

                <div class="grid overflow-auto">
                    {{ $dataTable->table() }}
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
