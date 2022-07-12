@extends('layouts.app')

@section('title', 'Sections')

@section('content')
<div class="row justify-content-center">
    <div class="col-6">
        
        <div class="rounded shadow px-3 py-4">
            <h2 class="h4 text-info">Add New Section</h2>
    
            <form action="{{ route('section.store') }}" method="post">
                @csrf
    
                <div class="row gx-2">
                    <div class="col">
                        <input type="text" name="name" placeholder="Add here..." class="form-control" autofocus>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-info w-100"><i class="fa-solid fa-plus"></i> Add</button>
                    </div>
                </div>
                @error('name')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </form>
        </div>

        <table class="table table-hover table-sm table-borderless bg-white align-middle text-center mt-5">
            <thead class="table-info">
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($all_sections as $section)
                    <tr>
                        <td>{{ $section->id }}</td>
                        <td>{{ $section->name }}</td>
                        <td>
                            <form action="{{ route('section.destroy', $section->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            <div class="lead text-center">No sections.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection


