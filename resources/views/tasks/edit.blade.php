@extends('layout')

@section('content')
  <div class="mb-2">
    <div class="float-start">
      <h4  class=" "> Edit Task <span class="badge bg-info p-2 ">{{ $task->title }}</span></h4>
    </div>
    <div class="float-end">
    <a href="{{ route('tasks.index')}}" class="btn btn-info">All Tasks</a>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="card card-body bg-light p-4">
  
    <form action="{{route('tasks.update',$task->id)}}" method="POST">
      @csrf
      @method('PUT')
      
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" id="title" value="{{ $task->title }}">
        </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Description</label>
          <textarea class="form-control" id="desc" name="description" rows="3">{{ $task->description }}</textarea>
        </div>
        <div class="mb-3">
          <label for="status" class="form-label">Description</label>
          <select name="status" id="status" class="form-control" value="{{ $task->status }}">
            @foreach ($statuses as $status)
              <option value="{{ $status['value']}}" {{ $task->status === $status['value'] ? 'selected' :''}}>{{$status['label']}}</option>
            @endforeach
          </select>
        </div>
        <a href="{{ route('tasks.index')}}" class="btn bg-sucess">cancel</a>
        <button type="submit" class="btn btn-info">Save</button>
    </form>
  </div>
@endsection