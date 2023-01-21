@extends('layouts.app')

@section('content')

    <div class="container mb-4">
        <div class="mt-5 text-center">
            <h1 class="font-bold">Predicted Hourly Heights</h1>
            <p class="">Predicted Hourly Heights Management begins here</p>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="">
                    <a href="{{ route('predicted_hourly_heights.create') }}" class="btn btn-primary">Add Data</a>
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
