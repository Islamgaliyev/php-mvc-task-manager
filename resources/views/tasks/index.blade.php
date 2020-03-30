@extends('layouts.index')
@php
    use App\Helpers\Auth as Auth;
@endphp
@section('content')
    <div class="container">
        <div class="row col-md-6 col-md-offset-2 custyle">
            <table id="tasks" class="table table-striped custab">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя пользователя</th>
                    <th>Email</th>
                    <th>Текст задачи</th>
                    <th>Статус</th>
                    <th class="text-center">Action</th>
                    <th class="text-center">Is Edited</th>
                </tr>
                </thead>
                @foreach($tasks as $task)
                    <tr>
                        <td>{!! $task->id !!}</td>
                        <td>{!! $task->email !!}</td>
                        <td>{!! $task->user !!}</td>
                        <td>{!! $task->title !!}</td>
                        <td>{{ $task->isDone ? 'Yes' : 'No' }}</td>
                        <td class="text-center">
                            @if(Auth::user() && Auth::user()->isAdmin)
                                <a class='btn btn-info btn-xs' href="{{route('task/edit?taskId=' . $task->id)}}">
                                    <span class="glyphicon glyphicon-edit"></span>Edit</a>
                            @endif
                        </td>
                        <td class="text-center">
                            {{ $task->isEdited ? 'Отредактировано админом' : 'Не редактировалось' }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
@push('head')
    <script src="/public/js/task.js"></script>
@endpush
