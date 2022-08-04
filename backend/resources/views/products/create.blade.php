@extends('layouts.app')

@section('title', 'New Product')

@section('content')
    <div class="row justify-content-center">
        <div class="col-5">

            <h2 class="fw-light mb-3">New Product</h2>

            <form action="{{ route('product.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label small fw-bold">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" autofocus>
                    @error('name')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label small fw-bold">Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label small fw-bold">Price</label>
                    <div class="input-group">
                        <div class="input-group-text">$</div>
                        <input type="number" name="price" id="price" class="form-control" step="any" value="{{ old('price') }}">
                    </div>
                    @error('price')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="section-id" class="form-label small fw-bold">Section</label>
                    <select name="section_id" id="section-id" class="form-select">
                        <option value="" hidden>Select Section</option>
                        @foreach ($all_sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                    @if ($all_sections->isEmpty())
                        <a href="{{ route('section') }}" class="small text-decoration-none">Add a new section</a>
                    @endif
                    @error('section_id')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>

                <a href="{{ route('index') }}" class="btn btn-outline-success">Cancel</a>
                <button type="submit" class="btn btn-success fw-bold px-5"><i class="fa-solid fa-plus"></i> Add</button>
            </form>
        </div>
    </div>
@endsection