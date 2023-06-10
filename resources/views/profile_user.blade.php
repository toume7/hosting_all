<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/profil_user.css">
    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
</head>
<header>
    <div class="logo">
        <a href="{{route('welc')}}">INSIGHTS</a> <img src="img/Ellipse 18.svg" alt=""/>
    </div>
    <div class="url">
        <a href="{{route('welc')}}">О нас</a>
        <a href="{{route('catalog')}}" class="Url_center">Аренда</a>
        <a href="{{route('form_add_arenda')}}">Сотрудничество</a>
    </div>

    <a class="login" href="{{route('logout')}}">Выйти</a>
</header>

<body>
<hr class="first_hr">
<div class="first">
    <div class="first_left">
        <img class="first_left_ava" src="storage/{{$session[0]['photo']}}" alt="">
    </div>
    <div class="first_right">
        <div class="first_right_p">
            <p style="    color: #424530;">Здравствуйте, меня зовут
            </p>
            <p style="text-decoration-line: underline;    color: #424530; margin-left: 1vw;">{{$session[0]->name}}</p>
        </div>
        <a class="first_right_a" href="{{route('red_user')}}">Редактировать профиль</a>

        <div class="star">
            <img class="star_img" src="img/Star 1.svg" alt="">
            <p style="    color: #424530;">{{count($commets)}} отзывов</p>
        </div>
        <a class="first_right_a" href="{{route('form_add_arenda')}}">Стать Арендадателем</a>
        <br>
        <br>
        <br>
        <a class="first_right_a" href="{{route('faivorit')}}">Мое избранное</a>
    </div>
</div>
<div class="second">
    <div class="second_left">
        <div class="second_left_first" style="width: 22.9vw;">
            <img style="width: 1.823vw; height:1.458vw ;" src="img/path154.svg" alt="">
            <p style="    color: #424530;">Заявки бронирования</p>
        </div>

        <hr class="second_left_hr">
        @foreach($brones as $brone)
            @foreach($rooms as $room)
                @if($brone['id_room']==$room['id'])
                    <div class="room">

                        <a href="" class="room_name"
                           style="    color: #424530;">{{$room['name']}}</a>
                        <div class="room_star">
                            <img style="width: 1.458vw; height: 1.458vw;" src="img/Star 1.svg" alt="">
                            <p style=" margin-left: 0.313vw; color: #424530;">4.7</p>
                        </div>
                        <p class="description" style="    color: #424530;">{{$room['description']}}</p>

                    </div>

                @endif
            @endforeach
        @endforeach
    </div>
    <div class="second_right">
        <div>
            <div class="second_left_first" style="    width: 15.8vw;">
                <img style="width: 1.823vw; height:1.406vw ;" src="img/path146.svg" alt="">
                <p style="    color: #E2D1C1;">Ваши отзывы</p>
            </div>
            <hr class="second_right_hr">
            @foreach($commets as $comm)

                <div class="room">
                    @foreach($rooms as $room)
                        @if($comm['id_room']==$room['id'])
                            <a onclick="event.preventDefault();
                                   document.getElementById('forms{{$room['id']}}').submit();" href="" class="room_name"
                               style="color: #E2D1C1;           ">{{$room['name']}}</a>
                            <form method="post" action="{{route('brone')}}" id="forms{{$room['id']}}" hidden>
                                @csrf
                                <input name="id" value="{{$room['id']}}">
                            </form>
                        @endif
                    @endforeach
                    <div class="room_star">

                        <img style="width: 1.458vw; height: 1.458vw;" src="img/Star 2.svg" alt="">
                        <p style=" margin-left: 0.313vw; color: #E2D1C1;">{{$comm['rating']}}</p>
                    </div>
                    <p class="description" style="color: #E2D1C1;">{{$comm['text']}}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
<footer>
    <div class="footer_up">
        <a href="">Главная</a>
        @if(count($session)==1)
            @if($session[0]['role']==0)
                <a href="{{route('form_add_arenda')}}">Сотрудничать</a>
                <a href="{{route('Pu')}}">Личный кабинет</a>
                <a href={{route('logout')}}"">Выход</a>
            @else
                <a href="{{route('zaiavka')}}">Добавить объявление</a>
                <a href="{{route('Pa')}}">Личный кабинет</a>
                <a href={{route('logout')}}"">Выход</a>
            @endif
        @else
            <a href="{{route('auth')}}">Сотрудничать</a>
            <a href="{{route('auth')}}">Личный кабинет</a>
        @endif

    </div>
    <div class="footer_down">
        <img class="footer_down_img" src="img/Group 14.svg" alt="">
        <div class="footer_center">
            <div class="footer_center_div_img">
                <a class="footer_center_img" href=""><img src="img/path718.svg" alt=""></a>
                <a class="footer_center_img" href=""><img src="img/Group 15.svg" alt=""></a>
                <a class="footer_center_img" href=""><img src="img/Group 16.svg" alt=""></a>
            </div>

            <p class="Copyright">Copyright All Rights Reserved 2023 © </p>
        </div>
        <div class="footer_right">
            <a href="">Пользовательское соглашение</a>
            <a href="">Политика конфиденциальности</a>
        </div>
    </div>
</footer>

</html>
