@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="hero mt-5 text-center">
            <h1 class="text-5xl font-bold">Location Data</h1>
        </div>

        <div class="card bg-base-100 shadow-xl mt-4">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <div class="card-actions justify-end">
                        <a href="{{ route('location.create') }}" class="btn btn-primary">Add Data</a>
                    </div>
                </div>

                <div class="grid overflow-auto">
                    {{ $dataTable->table() }}
                </div>
{{--                <div class="grid">--}}
{{--                    <div class="overflow-x-auto">--}}
{{--                        <table class="table w-full">--}}
{{--                            <!-- head -->--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th></th>--}}
{{--                                <th>Code</th>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Station Datum</th>--}}
{{--                                <th>Description</th>--}}
{{--                                <th>Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($data as $data)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $data['id'] }}</td>--}}
{{--                                    <td>{{ $data['code'] }}</td>--}}
{{--                                    <td>{{ $data['name'] }}</td>--}}
{{--                                    <td>{{ $data['station_datum'] }}</td>--}}
{{--                                    <td>{{ $data['description'] }}</td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{ route('location.show', $data['id']) }}"--}}
{{--                                           class="btn btn-primary">Manage</a>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
