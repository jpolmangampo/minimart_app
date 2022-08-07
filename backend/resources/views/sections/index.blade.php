@extends('layouts.app')

@section('title', 'Sections')

@section('content')
<div class="row justify-content-center">
    <div class="col-5">
        
        <h2 class="fw-light mb-3">Sections</h2>

        <div class="mb-3">
            <form action="{{ route('section.store') }}" method="post">
                @csrf
    
                <div class="row gx-2">
                    <div class="col">
                        <input type="text" name="name" placeholder="Add new section here..." class="form-control" autofocus>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-info w-100 fw-bold"><i class="fa-solid fa-plus"></i> Add</button>
                    </div>
                </div>
                @error('name')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </form>
        </div>

        <table class="table table-sm bg-white align-middle text-center">
            <thead class="table-info">
                <tr>
                    <th>ID</th>
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
                                
                                <button type="submit" class="btn btn-outline-danger border-0" title="Delete">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            <div class="lead text-center">No item to display.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


