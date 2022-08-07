<div class="modal fade" id="delete-product-{{ $product->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title h2 fw-light">Delete Product</h3>
            </div>
            <div class="modal-body">
                <h4>{{ $product->name }}</h4>

                <p class="mb-0 text-muted">Section: {{ $product->section ? $product->section->name : 'Uncategorized' }}</p>
                <p class="mb-0 text-muted">Price: ${{ $product->price }}</p>

                <p class="mt-3 mb-0">Description: {{ $product->description }}</p>
            </div>
            <div class="modal-footer border-0">
                <form action="{{ route('product.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-triangle-exclamation "></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>