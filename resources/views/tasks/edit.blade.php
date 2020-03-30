@extends('layouts.index')

@section('content')
    <div class="span3">
        <h2>Task: {!! $task->title !!}</h2>
        <form class="form-horizontal" action='{{  route('task/update')  }}' method="POST">
            <input type="hidden" name="taskId" value="{{$task->id}}">
            <label>Email</label>
                <input type="text" name="email" class="span3" value="{!! $task->email !!}">
            <label>Текст задачи</label>
                <input type="text" name="title" class="span3" value="{!! $task->title !!}">
            <label>Имя пользователя</label>
                <input type="text" name="user" class="span3" value="{!! $task->user !!}">
            <label>Статус</label>
                <input type="checkbox" name="isDone" {{ $task->isDone ? 'checked' : '' }} />
            <input type="submit" value="Submit" class="btn btn-primary pull-right">
            <div class="clearfix"></div>

            <span style="color: red">{{isset($error) ? $error : ''}}</span>
        </form>
    </div>
@endsection