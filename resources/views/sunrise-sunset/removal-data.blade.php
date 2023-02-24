@extends('layouts.app')

@section('content')

    <div class="container mt-5 mb-3">
        <div class="text-center">
            <h1 class="font-bold">Sunrise Sunset</h1>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="grid grid-cols-2">
                    <h2 class="card-title">Removal of Data</h2>

                </div>

                <div class="mt-5">
                    <form id="location_form" action="{{ route('sunrise-sunset.submitRemovalData') }}" method="POST">
                        @csrf
{{--                        @method('DELETE')--}}
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Location</span>
                                    <span class="label-text-alt">*</span>
                                </label>
                            </div>
                            <div class="col">
                                <select class="form-select @error('location_id') is-invalid @enderror" name="location_id" id="location_id">
                                    <option disabled selected>Pick one</option>
                                    @foreach($locations as $location)
                                        <option
                                            value="{{ $location['id'] }}" {{ old('location_id') == $location['id'] ? 'selected' : '' }}>{{ $location['name'] . ' - Code: '. $location['code'] }}</option>
                                    @endforeach
                                </select>
                                @error('location_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Year</span>
                                    <span class="label-text-alt">*</span>
                                </label>
                            </div>
                            <div class="col">
                                <select class="form-select @error('year') is-invalid @enderror" name="year" id="year">
                                    <option disabled selected>Please select location first.</option>
{{--                                    @foreach($years as $year)--}}
{{--                                        <option--}}
{{--                                            value="{{ $location['id'] }}">{{ $location['name'] . ' - Code: '. $location['code'] }}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                                @error('year')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-block text-center">
                            <a href="{{ route('sunrise-sunset.index') }}"
                               class="btn btn-link" type="button">Cancel</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                        <div class="row mt-3 text-center">
                            <span>Note: This will delete the entire records of selected location within the specific year.</span>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script type="module">
            $(document).ready(function () {

               $("#location_id").change(function () {
                  let id = $(this).val();
                   let url = "{{ route('sunrise-sunset.removalData', ":id") }}";
                   url = url.replace(":id", id);

                   let formData = {
                       "_token": "{{ csrf_token() }}",
                       id: id,
                   }

                   $.ajax({
                       type: "POST",
                       url: url,
                       data: formData,
                       success: function (data) {
                           console.log(data);

                           if (data) {
                               $("#year").empty();
                               $("#year").append('<option disabled selected>Pick one</option>');
                               $.each(data, function (key, value) {
                                   $("#year").append('<option value="' + value + '">' + value +
                                       '</option>');
                               });
                           }
                       }
                  });
               });
            });
        </script>
    @endpush

@endsection
