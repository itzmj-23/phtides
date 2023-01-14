@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="hero bg-base-200 mt-5">
            <div class="hero-content text-center">
                <div class="max-w-xxl">
                    <h1 class="text-5xl font-bold">Predicted Hourly Heights</h1>
                    <p class="py-6">Predicted Hourly Heights Management begins here</p>
                </div>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl mt-5">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <h2 class="card-title">Lists of Data</h2>
                    <div class="card-actions justify-end">
                        <a href="{{ route('predicted_hourly_heights.create') }}" class="btn btn-primary">Add Data</a>
                    </div>
                </div>

                <div class="grid overflow-auto">
                    <table class="table table-compact w-full">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Hour</th>
                            <th>Tide</th>
                            <th>Location ID, Code & Name</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                                <tr>
                                    <td>{{ $data['date'] }}</td>
                                    <td>{{ $data['hour'] }}</td>
                                    <td>{{ $data['tide'] }}</td>
                                    <td>{{ $data['location_id'] .' - '. $data['location']['code'] .' - ' . $data['location']['name'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
