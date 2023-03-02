@extends('admin.layouts.main')

@section('content')
<form method="POST" action="{{route('users.user.store')}}">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Имя</label>
            <input name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            @error('name')
                <span class="red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            @error('email')
                <span class="red">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            @error('password')
                <span class="red">{{$message}}</span>
            @enderror
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
</form>
@endsection
