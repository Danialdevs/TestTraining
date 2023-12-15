@extends('layouts.app')

@section('content')
    <section class="container-fluid">
        <!--row justify-content-center is used for centering the login form-->
        <section class="row justify-content-center">
            <!--Making the form responsive-->
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" method="post" action="{{route('action-register')}}">
                    @csrf
                    <div class="form-group mb-2">
                        <h4 class="text-center font-weight-bold"> Регистрация </h4>
                        <label for="InputPassword1">Имя</label>
                        <input type="text" class="form-control"  name="username" id="InputPassword1" placeholder="Введите пароль">
                    </div>
                    <!--Binding the label and input together-->
                    <div class="form-group">
                        <label for="Inputuser1">Email</label>
                        <input type="email" class="form-control" name="email"  id="Inputuser1" aria-describeby="usernameHelp" placeholder="Введите адрес электронной почты">
                    </div>
                    <!--Binding the label and input together-->
                    <div class="form-group mb-2">
                        <label for="InputPassword1">Пароль</label>
                        <input type="password" class="form-control" name="password"  id="InputPassword1" placeholder="Введите пароль">
                    </div>
                    <button class="btn btn-primary btn-block">зарегистрироваться</button>

                </form>
            </section>
        </section>
    </section>
@endsection
