@extends('layouts.main')

@section('content')

    {{ Form::open(array('url'=>'users/signin', 'role'=>'form', 'class'=>'form-signin')) }}
        <h2 class="form-signin-heading">管理员登录</h2>
        <input type="text" class="form-control" placeholder="用户名" required autofocus name="username">
        <input type="password" class="form-control" placeholder="密码" required name="password">
        <!--label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
    {{ Form::close() }}

@stop
