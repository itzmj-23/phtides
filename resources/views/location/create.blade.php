@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="hero bg-base-200 mt-5">
            <div class="hero-content text-center">
                <div class="max-w-xxl">
                    <h1 class="text-5xl font-bold">Location Data</h1>
                    <p class="py-6">Add new data in the Location</p>
                </div>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl mt-5">
            <div class="card-body">
                <div class="grid justify-center">
                    <h2 class="card-title">Add New Data</h2>
                </div>

                <div class="grid mt-5">
                    <form id="location_form" action="{{ route('location.store') }}" method="POST">
                        @csrf
                        <div class="grid">
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Code</span>
                                    <span class="label-text-alt">optional</span>
                                </label>
                                <input type="text" name="code" value="{{ old('code') }}" placeholder="Type here" class="input input-bordered w-full" />
                            </div>
                        </div>
                        <div class="grid">
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Name</span>
                                    <span class="label-text-alt">required</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Type here" class="input input-bordered @error('name') input-error @enderror }} w-full" />
                                @error('name')
                                <label class="label">
                                    <span class="label-text-alt text-error">*This field is required.</span>
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="grid">
                            <div class="form-control w-full ">
                                <label class="label">
                                    <span class="label-text">Description</span>
                                    <span class="label-text-alt">optional</span>
                                </label>
                                <input type="text" name="description" value="{{ old('description') }}" placeholder="Type here" class="input input-bordered w-full" />
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            <a href="{{ route('location.create') }}" class="btn bg-error col-start-2 max-w-xs mt-5 text-right" type="button">Clear</a>
                            <button class="btn bg-primary max-w-xs mt-5" type="submit">Submit</button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>

@endsection
