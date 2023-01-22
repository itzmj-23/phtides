@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="hero mt-5">
            <h1 class="text-5xl font-bold">Location Data</h1>
            <p class="py-6">Location Data management begins here</p>
        </div>

        <div class="card bg-base-100 shadow-xl mt-5">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <div class="card-actions justify-end">
                        <a href="{{ route('location.create') }}" class="btn btn-primary">Add Data</a>
                    </div>
                </div>
                <div class="grid">
                    <div class="overflow-x-auto">
                        <table class="table w-full">
                            <!-- head -->
                            <thead>
                            <tr>
                                <th></th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $data)
                                <tr>
                                    <td>{{ $data['id'] }}</td>
                                    <td>{{ $data['code'] }}</td>
                                    <td>{{ $data['name'] }}</td>
                                    <td>{{ $data['description'] }}</td>
                                    <td>
                                        <a href="{{ route('location.show', $data['id']) }}"
                                           class="btn btn-primary btn-sm">Manage</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
