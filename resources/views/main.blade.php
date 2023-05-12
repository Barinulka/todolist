@extends('layouts.app')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">ToDo список</h1>
                
                @auth
                    <p class="lead text-muted"> Простой ToDo list для создания личных списков. С возможность редактирования сохраненных списков.</p>
                    <p>
                        <a href="{{ route('task') }}" class="btn btn-outline-primary my-2">К списоку задач</a>
                    </p>
                @else
                    <p class="lead text-muted"> Для получения доступа к ToDo list необходимо авторизоваться или зарегистрироваться.</p>
                    <p>
                        <a href="{{ route('login') }}" class="btn btn-primary my-2">Войти</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-secondary my-2">Регистрация</a>
                        @endif
                    </p>
                @endauth
                
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        const _URL = {{ route('task') }}
    </script>
@endsection