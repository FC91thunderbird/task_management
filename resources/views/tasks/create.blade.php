@extends('components.header')

@section('content')
<div class="card">
    <h2>Create Task <a href="{{ route('tasks.index') }} " class="btn btn-sm btn-primary float-end mt-2"> Back</a> </h2>

    <div class="card-body">
        {!! Form::open(['route' => 'tasks.store', 'method' => 'post']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=> 'Enter Title']) !!}
            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group mt-2">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', null , ['class' => 'form-control', 'cols'=>'0', 'rows'=>'0', 'placeholder'=>'Enter Description']) !!}
            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group mt-2">
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('status', ['0'=>'Select Status' ,'in-progress' => 'In Progress', 'complete' => 'Complete', 'pending' => 'Pending'], null, ['class' => 'form-control']) !!}
            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group mt-2 mb-3">
            {!! Form::label('due_date', 'Due Date') !!}
            {!! Form::date('due_date',null, ['class' => 'form-control']) !!}
            @error('due_date')<span class="text-danger">{{ $message }}</span>@enderror
        </div>

        {!! Form::submit('Create Task', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}

    </div>
</div>

@endsection