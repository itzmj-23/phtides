@extends('layouts.app')

@section('content')

    <div class="container mt-5 mb-3">
        <div class="text-center">
            <h1 class="">Privacy Policy</h1>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <h2 class="card-title">Add Privacy Policy</h2>
                </div>

                <div class="mt-5">
                    <form id="location_form" action="{{ route('privacyPolicy.update', $data['id']) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Title</span>
                                    <span class="label-text-alt">*</span>
                                </label>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input id="title" name="title" type="text" value="{{ old('title', $data['title']) }}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter the title of the Privacy Policy">
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
                                    <span class="label-text">HTML-based Policy</span>
{{--                                    <span class="label-text-alt">(optional)</span>--}}
                                </label>
                            </div>
                            <div class="col text-left">
                                <textarea class="form-control @error('policy') is-invalid @enderror" name="policy" id="policy" cols="30" rows="20" placeholder="<h1>Privacy Policy of National Mapping and Resource Information Authority (NAMRIA)</h1>">{{ old('policy', $data['policy']) }}</textarea>
                                @error('policy')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10 col-md-6 col-lg-4 offset-3">
                                <button id="previewPolicy" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal">Preview the Privacy Policy</button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="col-form-label">Added By</label>
                            </div>
                            <div class="col-sm-10 col-md-6 col-lg-4">
                                <input class="form-control" type="text" name="added_by" value="{{ $data['added_by'] }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="col-form-label">Updated By</label>
                            </div>
                            <div class="col-sm-10 col-md-6 col-lg-4">
                                <input class="form-control" type="text" name="updated_by" value="{{ auth()->user()->email }}" readonly>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-block text-center">
                            <a href="{{ route('privacyPolicy.index') }}"
                               class="btn btn-link" type="button">Cancel</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="privacyPolicyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Privacy Policy Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="module">
            $(document).ready(function () {
               $('#previewPolicy').click(function () {
                   let policy = $('#policy').val();

                   $('#privacyPolicyModal .modal-body').html(policy).text();
               });
            });
        </script>
    @endpush()

@endsection
