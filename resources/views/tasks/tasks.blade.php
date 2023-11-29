@extends('components.header')

@section('content')
<div class="card">
    <h2>Task List <a href="{{ route('tasks.create') }} " class="btn btn-sm btn-primary float-end mt-2"> Create Task</a> </h2>

    <div class="card-body">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th width="150">Title</th>
                    <th width="500">Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td> {{ $task->id }} </td>
                    <td> {{ $task->title }} </td>
                    <td> {{ $task->description }} </td>
                    <td> {{ $task->status }} </td>
                    <td> {{ $task->due_date }} </td>
                    <td> <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a> <form action="{{ route('tasks.destroy', $task->id) }}" method="post" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Are u Sure to delete ?')" class="btn btn-sm btn-danger"> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

      

<div class="d-flex justify-content-between">
        {!! $tasks->links() !!}
    </div>
    </div>
</div>

@endsection
