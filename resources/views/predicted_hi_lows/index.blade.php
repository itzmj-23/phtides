@extends('layouts.app')

@section('content')

    <div class="container mb-4">
        <div class="mt-5 text-center">
            <h1 class="font-bold">Predicted High and Low</h1>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="">
                    <a href="{{ route('predicted_hi_lows.create') }}" class="btn btn-primary">Add Data</a>
                    <a href="{{ route('predicted_hi_lows.removalData') }}" class="btn btn-danger">Remove Data</a>
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
