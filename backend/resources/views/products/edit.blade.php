@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="row justify-content-center">
        <div class="col-5">

            <h2 class="fw-light mb-3">Edit Product</h2>

            <form action="{{ route('product.update', $product->id) }}" method="post">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name" class="form-label small fw-bold">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" autofocus>
                    @error('name')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label small fw-bold">Description</label>
                    <textarea name="description" id="description" rows="5" class="form-control">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label small fw-bold">Price</label>
                    <div class="input-group">
                        <div class="input-group-text">$</div>
                        <input type="number" name="price" id="price" class="form-control" step="any" value="{{ old('price', $product->price) }}">
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
                            @if ($section->id == $product->section_id)
                                <option value="{{ $section->id }}" selected>{{ $section->name }}</option>
                            @else
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('section_id')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror
                </div>

                <a href="{{ route('index') }}" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-secondary fw-bold px-5"><i class="fa-solid fa-check"></i> Save changes</button>
            </form>
        </div>
    </div>
@endsection