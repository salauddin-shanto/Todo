@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Edit Todo</h1>

            <!-- Edit Todo Form -->
            <div class="card">
                <div class="card-header">Update Todo</div>
                <div class="card-body">
                    <form action="{{ route('todos.update', $id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="todo" class="form-label">Todo</label>
                            <input type="text" id="todo" class="form-control" name="todo" value="{{ $todo }}" required>
                        </div>
                        <button type="submit" class="btn btn-success">Update Todo</button>
                        <a href="{{ route('todos.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
