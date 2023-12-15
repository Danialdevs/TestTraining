@extends('layouts.app')

@section('content')
    <section class="container-fluid">
        <!--row justify-content-center is used for centering the login form-->
        <section class="row justify-content-center">
            <!--Making the form responsive-->
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" method="post" action="{{route('action-auth')}}">
                    @csrf
                    <!--Binding the label and input together-->
                    <div class="form-group">
                        <h4 class="text-center font-weight-bold"> Вход </h4>
                        <label for="Inputuser1">Email</label>
                        <input type="email" name="email" class="form-control" id="Inputuser1" aria-describeby="usernameHelp" placeholder="Введите адрес электронной почты">
                    </div>
                    <!--Binding the label and input together-->
                    <div class="form-group mb-2">
                        <label for="InputPassword1">Пароль</label>
                        <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Введите пароль">
                    </div>
                    <button class="btn btn-primary btn-block">войти</button>

                </form>
            </section>
        </section>
    </section>
@endsection
