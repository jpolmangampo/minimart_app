@extends('layouts.app')

@section('title', 'Products')
    
@section('content')
<div class="row mb-4">
    <div class="col">
        <h2 class="fw-light">Products</h2>
    </div>
    <div class="col text-end">
        <a href="{{ route('product.create') }}" class="btn btn-success"><i class="fa-solid fa-plus-circle"></i> New Product</a>
    </div>
</div>

<table class="table table-hover align-middle bg-white border">
    <thead class="small table-success text-secondary">
        <tr>
            <th>ID</th>
            <th style="width: 100px">NAME</th>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
            <th>SECTION</th>
            <th style="width: 95px"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($all_products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td class="fw-bold">{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>${{ $product->price }}</td>
                {{-- If the section of the product is NULL, display Uncategorized --}}
                <td class="text-secondary">{{ $product->section ? $product->section->name : 'Uncategorized' }}</td>
                <td>
                    <div class="d-flex">
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-outline-secondary border-0" title="Edit"><i class="fa-solid fa-pen"></i></a>
                    <button class="btn btn-outline-danger border-0 ms-1" title="Delete" data-bs-toggle="modal" data-bs-target="#delete-product-{{ $product->id }}"><i class="fa-solid fa-trash-can"></i></button>
                </div>
                </td>
            </tr>
            @include('products.modal.delete')
        @empty
            <tr>
                <td colspan="6">
                    <div class="lead text-center">No item to display.</div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
    
@endsection

