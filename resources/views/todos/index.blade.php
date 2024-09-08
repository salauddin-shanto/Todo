@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-4">Todo List</h2>

            <!-- Add Todo Form -->
            <div class="card mb-4">
                <div class="card-header">
                    Add New Todo
                </div>
                <div class="card-body">
                    <form action="{{ route('todos.store') }}" method="POST" class="d-flex">
                        @csrf
                        <input type="text" name="todo" class="form-control me-2" placeholder="New Todo" required>
                        <button type="submit" class="btn btn-primary">Add Todo</button>
                    </form>
                </div>
            </div>

            <!-- Todo List Table -->
            @if (count($todos) > 0)
                <div class="card">
                    <div class="card-header">
                        Your Todos
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Todo</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($todos as $index => $todo)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $todo }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('todos.edit', $index) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('todos.destroy', $index) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <p class="text-center text-muted">No todos available. Start by adding one!</p>
            @endif
        </div>
    </div>
</div>
@endsection
