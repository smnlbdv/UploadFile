@extends('admin.layouts.main')

@section('content')
    <table class="table pt-5">
        <thead>
        <tr>
            <th scope="col">Имя</th>
            <th scope="col">Email</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Добавить</th>
            <th scope="col">Удалить</th>
            <th scope="col">Тип пользователя</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <form action="{{route('users.user.edit', $user->id)}}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-block btn-primary btn-sm">Редактировать</button>
                </form>
            </td>
            <td>
                <form action="{{route('users.user.create')}}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-block btn-success btn-sm">Добавить</button>
                </form>
            </td>

            <td>
                <form action="{{route('users.user.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-block btn-danger btn-sm">Удалить</button>
                </form>
            </td>
            <td>
                <li>{{\App\Enums\RoleEnum::from($user->role)->label()}}</li>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table
@endsection
