@extends('layouts.app')

@section('content')

    <div class="container mt-5 mb-3">
        <div class="text-center">
            <h1 class="">User Manual</h1>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <h2 class="card-title">Add User Manual</h2>
                </div>

                <div class="mt-5">
                    <form id="location_form" action="{{ route('userManual.store') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Pick a file</span>
                                    <span class="label-text-alt">*</span>
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Title</span>
                                    <span class="label-text-alt">*</span>
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter the title of the user manual">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Remarks</span>
                                    <span class="label-text-alt">(optional)</span>
                                </label>
                            </div>
                            <div class="col text-left">
                                <textarea class="form-control @error('remarks') is-invalid @enderror" name="remarks" id="remarks" cols="30" rows="5" placeholder="(Optional) Enter remarks if there is any">{{ old('remarks') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="col-form-label">Upload By</label>
                            </div>
                            <div class="col-sm-10 col-md-6 col-lg-4">
                                <input class="form-control" type="text" name="uploaded_by" value="{{ auth()->user()->email }}" readonly>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-block text-center">
                            <a href="{{ route('userManual.index') }}"
                               class="btn btn-link" type="button">Cancel</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
        </script>
    @endpush()

@endsection
