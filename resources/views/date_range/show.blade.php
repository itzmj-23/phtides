@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="text-center mt-5">
            <h1 class="text-5xl font-bold">Location Data</h1>
            <p class="py-6">Manage data in the Location</p>
        </div>

        <div class="card bg-base-100 shadow-xl mt-5">
            <div class="card-body">
                <div class="grid justify-center">
                    <h2 class="card-title">Manage Data</h2>
                </div>

                <div class="grid mt-5">
                    <form id="location_form" action="{{ route('location.update', $data['id']) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Disable form submit on enter -->
                        <button type="submit" disabled style="display: none" aria-hidden="true"></button>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Name</span>
                                    <span class="label-text-alt">*</span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" name="name" value="{{ old('name', $data['name']) }}" placeholder="Type here"
                                       class="form-control @error('name') is-invalid @enderror"/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Code <span class="small">(optional)</span></span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" name="code" value="{{ old('code', $data['code']) }}" placeholder="Type here"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Location <span class="small">(optional)</span></span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" name="location" value="{{ old('location', $data['location']) }}" placeholder="Type here"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Coordinate Lat <span class="small">(optional)</span></span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" name="coordinates_lat" value="{{ old('coordinates_lat', $data['coordinates_lat']) }}" placeholder="Type here"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Coordinate Long <span class="small">(optional)</span></span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" name="coordinates_long" value="{{ old('coordinates_long', $data['coordinates_long']) }}" placeholder="Type here"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Tide House <span class="small">(optional)</span></span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" name="tide_house" value="{{ old('tide_house', $data['tide_house']) }}" placeholder="Type here"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Instruments <span class="small">(optional)</span></span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" name="instruments" value="{{ old('instruments', $data['instruments'] ? implode(',', $data['instruments']) : '') }}" placeholder="Type here"
                                       class="form-control"/>
                                <span class="">If multiple values, separate with a comma or Enter key.</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Enclosure <span class="small">(optional)</span></span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" name="enclosure" value="{{ old('enclosure', $data['enclosure'] ? implode(',', $data['enclosure']) : '') }}" placeholder="Type here"
                                       class="form-control"/>
                                <span class="">If multiple values, separate with a comma or Enter key.</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Controller <span class="small">(optional)</span></span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" name="controller" value="{{ old('controller', $data['controller'] ? implode(',', $data['controller']) : '') }}" placeholder="Type here"
                                       class="form-control"/>
                                <span class="">If multiple values, separate with a comma or Enter key.</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">TGBMs <span class="small">(optional)</span></span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" name="tgbm" value="{{ old('tgbm', $data['tgbm']) }}" placeholder="Type here"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Tide Staff <span class="small">(optional)</span></span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" name="tide_staff" value="{{ old('tide_staff', $data['tide_staff']) }}" placeholder="Type here"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                <label class="label">
                                    <span class="label-text">Description <span class="small">(optional)</span></span>
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" name="description" value="{{ old('description', $data['description']) }}" placeholder="Type here"
                                       class="form-control"/>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-block text-center">
                            <a href="{{ route('location.index') }}"
                               class="btn btn-link">Cancel</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>

                    </form>


                </div>

            </div>
        </div>
    </div>

@endsection
