@extends('layouts.app')

@section('content')

    <div class="container mx-auto">
        <div class="hero bg-base-200 mt-5">
            <div class="hero-content text-center">
                <div class="max-w-xxl">
                    <h1 class="text-5xl font-bold">Location Data</h1>
                    <p class="py-6">Manage Location <span class="font-bold">{{ $data['name'] }}</span></p>
                </div>
            </div>
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
                        <div class="grid">
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Code</span>
                                    <span class="label-text-alt">optional</span>
                                </label>
                                <input type="text" name="code" value="{{ old('code', $data['code']) }}" placeholder="Type here" class="input input-bordered @error('code') input-error @enderror w-full" />
                                @error('code')
                                <label class="label">
                                    <span class="label-text-alt text-error">*{{ $message }}</span>
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="grid">
                            <div class="form-control w-full">
                                <label class="label">
                                    <span class="label-text">Name</span>
                                    <span class="label-text-alt">required</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name', $data['name']) }}" placeholder="Type here" class="input input-bordered @error('name') input-error @enderror }} w-full" />
                                @error('name')
                                <label class="label">
                                    <span class="label-text-alt text-error">*{{ $message }}</span>
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
                                <input type="text" name="description" value="{{ old('description', $data['description']) }}" placeholder="Type here" class="input input-bordered w-full" />
                            </div>
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            <a href="{{ route('location.index') }}" class="btn bg-error col-start-2 max-w-xs mt-5 text-right" type="button">Cancel</a>
                            <button class="btn bg-primary max-w-xs mt-5" type="submit">Update</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection
