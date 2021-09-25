@extends('layouts.app')

@section('content')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 font-weight-normal">Nirvana</h1>
            <p class="lead font-weight-normal">Скоро появится полная информация о портале. Пока можете испробовать демо версию нашего портала!  </p>
            @guest
                <div class="row">
                    <div class="col-sm-12">
                    <a class="btn btn-secondary btn-sliders"  href="{{url('/register')}}">
                        Зарегистрироваться
                    </a>
                    </div>
                    <div class="col-sm-12 pt-2">
                        <a class="btn btn-secondary btn-sliders"  href="{{url('/login')}}">
                            Войти
                        </a>
                    </div>

                </div>
            @else
                <a class="btn btn-secondary btn-sliders"  href="{{url('/check')}}">
                    Вернуться
                </a>
            @endguest

        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>
@endsection
