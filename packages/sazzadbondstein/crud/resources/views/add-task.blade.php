@extends('crud::html')

@section('content')

<div class="container mt-5">
    <h1>Create a New Task</h1>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
    <form action="{{ route('save-task') }}" method="POST">

        {{csrf_field()}}
        <div class="mb-3">
            <label for="taskName" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter task title" value= "{{old('title')}}">
            {{-- @if($errors->has('title'))
            <span class="error"> {{$errors->first('title')}}</span>
            @endif --}}
        </div>
        <div class="mb-3">
            <label for="taskDescription" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter task description" value={{old('description')}}></textarea>

            {{-- @if($errors->has('description'))
            <span class="error"> {{$errors->first('description')}}</span>
            @endif --}}
        </div>
        <div class="mb-3">
            <label for="taskDescription" class="form-label">Long Description</label>
            <textarea class="form-control" id="long_description" name="long_description" rows="3" placeholder="Enter long task description" value={{old('long_description')}}></textarea>

            {{-- @if($errors->has('long_description'))
            <span class="error"> {{$errors->first('long_description')}}</span>
            @endif --}}
        </div>
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
</div>

@endsection
