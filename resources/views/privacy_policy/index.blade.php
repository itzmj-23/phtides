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
            <h1 class="">Privacy Policy</h1>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                @if($data->count() < 1)
                    <div class="text-center">
                        <p>There is no Privacy Policy found.</p>
                        <a href="{{ route('privacyPolicy.create') }}" class="btn btn-primary">Add Now</a>
                    </div>
                @else
                    <div class="grid overflow-auto">
                        <table class="table w-full">
                            <!-- head -->
                            <thead>
                            <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Added By</th>
                                <th>Added On</th>
                                <th>Updated By</th>
                                <th>Updated On</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>
                                        <a target="_blank" href="{{ route('privacyPolicy.show') }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('privacyPolicy.edit', $data['id']) }}" class="btn btn-secondary">Edit</a>
{{--                                        <form class="d-inline-block" action="{{ route('privacyPolicy.destroy', $data['id']) }}" method="POST">--}}
{{--                                            @method('DELETE')--}}
{{--                                            @csrf--}}
{{--                                            <button class="btn btn-danger">Delete</button>--}}
{{--                                        </form>--}}
                                    </td>
                                    <td>{{ $data['title'] }}</td>
                                    <td>{{ $data['added_by'] }}</td>
                                    <td>{{ Carbon\Carbon::parse($data['created_at'])->format('m/d/Y h:i:s a') }}</td>
                                    <td>{{ $data['updated_by'] }}</td>
                                    <td>{{ Carbon\Carbon::parse($data['updated_at'])->format('m/d/Y h:i:s a') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif



            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}
@endpush
