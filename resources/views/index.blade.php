@extends('layout')

@section('content')
  <div class="mb-2">
    <div class="float-start">
      <h2  class="bold">My Tasks</h2>
    </div>
    <div class="float-end">
     <a href="{{ route('tasks.create')}}" class="btn btn-info">Create Task</a>
    </div>
    <div class="clearfix"></div>
  </div>

  @foreach ($tasks as $task)
  <div class="card mt-3">
    <div class="card-header">
      @if ($task->status ==='Todo')
      {{ $task->title }}
      @else
      <del>{{ $task->title }}</del>
      @endif
      <span class="badge rounded-pill bg-warning text-dark">
        {{ $task->created_at->diffForHumans() }} 
      </span>
    </div>
    <div class="card-body">
      <div class="float-start">
        <p class="card-text">
          @if ($task->status ==='Todo')
          {{ $task->title }}
          @else
          <del>{{ $task->title }}</del>
          @endif
        </p>

        @if ($task->status ==='Todo')
          <span class="badge rounded-pill bg-info text-dark">
            Todo
          </span>      
        @else
        <span class="badge rounded-pill bg-success text-white">
          Done
        </span>      
        @endif
         
         
        <small> Last Updated - {{ $task->updated_at->diffForHumans() }}</small>
      </div>
      <div class="float-end">
        <a href="{{ route('tasks.edit' ,$task->id)}}" class="btn btn-success">Edit</a>
        <form action="{{ route('tasks.destroy',$task->id)}}" style="display: inline" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn bg-danger text-white">Delete</button>
        </form>       
      </div>
      <div class="clearfix"></div>
      
    </div>
  </div>
  @endforeach
  @if (count($tasks) === 0)
      <div class="alert alert-danger o-2">
        No TasK Found. Please Create One Task 
        <br>
        <br>
        <a href="{{ route('tasks.create')}}" class="btn btn-info btn-sm">Create Task</a>
      </div>
  @endif
@endsection