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
            <h1 class="">User Manual</h1>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                @if($data->count() < 1)
                <div class="text-center">
                    <p>There is no user manual found.</p>
                    <a href="{{ route('userManual.create') }}" class="btn btn-primary">Add Now</a>
                </div>
                @else
                <div class="grid overflow-auto">
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Remarks</th>
                            <th>Uploaded By</th>
                            <th>Uploaded At</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>
                                    <a target="_blank" href="{{ route('userManual.show', $data['id']) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('userManual.download', $data['id']) }}" class="btn btn-success">Download</a>
                                    <a href="{{ route('userManual.edit', $data['id']) }}" class="btn btn-secondary">Edit</a>
                                    <form class="d-inline-block" action="{{ route('userManual.destroy', $data['id']) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>{{ $data['title'] }}</td>
                                <td>{{ $data['remarks'] }}</td>
                                <td>{{ $data['uploaded_by'] }}</td>
                                <td>{{ Carbon\Carbon::parse($data['updated_at'])->format('m/d/Y') }}</td>
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
