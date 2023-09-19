@extends('layout')

@section('content')
  <div class="mb-2">
    <div class="float-start">
      <h4  class=" "> Create Task</h4>
    </div>
    <div class="float-end">
    <a href="{{ route('tasks.index')}}" class="btn btn-info">All Tasks</a>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="card card-body bg-light p-4">
  
    <form action="{{route('tasks.store')}}" method="POST">
      @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" id="title" >
        </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Description</label>
          <textarea class="form-control" id="desc" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="status" class="form-label">Description</label>
          <select name="status" id="status" class="form-control">
            @foreach ($statuses as $status)
              <option value="{{ $status['value']}}">{{$status['label']}}</option>
            @endforeach
          </select>
        </div>
        <a href="{{ route('tasks.index')}}" class="btn bg-sucess">cancel</a>
        <button type="submit" class="btn btn-info">Save</button>
    </form>
  </div>
@endsection