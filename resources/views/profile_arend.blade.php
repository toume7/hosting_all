<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSIGHTS</title>
    <link rel="stylesheet" href="css/profil_user copy.css">
</head>
<header>
    <div class="logo">
        <a href="{{route('welc')}}">INSIGHTS</a> <img src="img/Ellipse 18.svg" alt="" />
    </div>
    <div class="url">
        <a href="{{route('catalog')}}" class="Url_center">Аренда</a>
        <a href="{{route('zaiavka')}}">Добавить объявление</a>
    </div>

    <a class="login" href="{{route('logout')}}">Выйти</a>
</header>
<body>
<div hidden>
    {{$com=0}}
    {{$rating=0}}
    {{$count=0}}
    @foreach($room_accept as $room)
        @foreach($commets as $commet)
            @if($room['id']==$commet['id_room'])
                {{$com++}}
                {{$rating+=$commet['rating']}}
                {{$count++}}
            @endif

        @endforeach
    @endforeach
</div>
<hr class="first_hr">
<div class="first">
    <div class="first_left">
        <img class="first_left_ava" src="storage/{{$session[0]['photo']}}" alt="">
        <a class="first_left_ava_a" style="margin-top: 1.8vw;" href="{{route('zaiavka')}}">Создать объявление</a>
    </div>

    <div class="first_right">
        <div class="first_right_p">
            <p style="    color: #424530;">Здравствуйте, меня зовут
            </p>
            <p style="text-decoration-line: underline;    color: #424530; margin-left: 1vw;">{{$session[0]['name']}}</p>
        </div>
        <a class="first_right_a" href="{{route('edit_profile_arend')}}">Редактировать профиль</a>
        <div class="star">
            <img class="star_img" src="img/Group 127.svg" alt="">
            <p style="  margin-left: 24.01px;  color: #424530;">{{count($room_accept)}} помещений</p>
        </div>
        <div class="star">
            @if($rating==0)
                <img class="star_img" src="img/Star 1.svg" alt="">
                <p style="  margin-left: 24.01px;  color: #424530;">{{$rating}}</p>
            @else
            <img class="star_img" src="img/Star 1.svg" alt="">
            <p style="  margin-left: 24.01px;  color: #424530;">{{$rating/$count}}</p>
            @endif
        </div>
        <div class="star">
            <img class="star_img" src="img/path146 (1).svg" alt="">
            <p style=" margin-left: 24.01px;   color: #424530;">{{$com}} отзывов</p>
        </div>
    </div>
</div>
<p class="doc">Перед сдачей своего помещения в аренду ознакомьтесь с <a
        style="text-decoration-line: underline; color: #424530;"
        href="js/blank-akt-priema-peredachi-nedvizhimosti-dlya-dogovora-najma.doc"> актом приема передачи имущества в аренду</a></p>
<div class="second">
    <div class="second_left">
        <div class="second_left_first" style="    width: 22.865vw;">
            <p style="  color: #E2D1C1;   "> На рассмотрении
            <p style=" color: #E2D1C1; margin-left: 1vw; text-decoration-line: underline;"> {{count($room_wait)}}</p>
            </p>
        </div>
        <hr class="second_left_hr">
        @foreach($room_wait as $room)
            <div class="room">
                <a href="" class="room_name" style="color: #E2D1C1;">{{$room['name']}}</a>
                <div class="room_star">
                    <p style=" color: #E2D1C1;">На рассмотрении</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="second_right">
        <div>
            <div class="second_left_first" style="    width: 22.865vw;">
                <p style="color: #424530;  "> В общем доступе
                <p style="color: #424530; margin-left: 1vw; text-decoration-line: underline;"> {{count($room_accept)}}</p>
                </p>
            </div>
            <hr class="second_right_hr">
            @foreach($room_accept as $room)
                <div class="room">

                    <a href="" class="room_name" style="color: #424530;">{{$room['name']}}</a>
                    <div class="div_form_2">
                        <form action="{{route('del_room')}}" method="post">
                            @csrf
                            <input name="id" value="{{$room['id']}}" hidden>
                            <button class="button_da"><img style="width: 1.302vw;
                            height: 1.146vw;" src="img/Group 83.svg" alt=""></button>
                        </form>
                        <div hidden>
                            {{$rating=0}}
                            {{$count=0}}
                            @foreach($commets as $commet)
                                @if($room['id']==$commet['id_room'])
                                    {{$rating+=$commet['rating']}}
                                    {{$count++}}
                                @endif
                            @endforeach
                            @if(($count)!=0)
                                {{$rating=$rating/$count}}
                            @endif
                        </div>
                        <div class="form_star"><img style="width: 1.458vw;
                            height: 1.458vw;" src="img/Star 3.svg" alt="">
                            <p style="    color: #424530;">{{$rating}}</p>
                        </div>

                    </div>
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
