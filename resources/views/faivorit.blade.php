<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>INSIGHTS</title>
    <link rel="stylesheet" href="css/fav.css">
</head>
<header>
    <div class="logo">
        <a href="{{route('welc')}}">INSIGHTS</a> <img src="img/Ellipse 18.svg" alt=""/>
    </div>
    <div class="url">
        <a href="#Why_us_p">О нас</a>
        <a href="#final" class="Url_center">Аренда</a>
        @if(count($session)==1)
            @if($session[0]['role']==0)
                <a href="{{route('form_add_arenda')}}">Сотрудничество</a>
            @else
                <a href=""></a>
            @endif

        @else
            <a href="{{route('auth')}}">Сотрудничество</a>
        @endif
    </div>
    @if(count($session)==1)
        @if($session[0]['role']==7)
            <a style="text-decoration: underline" class="login"
               href="{{route('admin_arendodateli')}}">{{$session[0]['name']}}</a>
        @elseif($session[0]['role']==2)
            <a style="text-decoration: underline" class="login" href="{{route('Pa')}}">{{$session[0]['name']}}</a>
        @else
            <a style="text-decoration: underline" class="login" href="{{route('Pu')}}">{{$session[0]['name']}}</a>
        @endif

    @else
        <a class="login" href="{{route('auth')}}">Войти</a>
    @endif
</header>

<body>

<div class="rent_block">
    <p id="arenda" class="sosicka_p">Мое избранное</p>
    <div class="filter_and_room">

        <div class="room">
            <div class="rooms_flex">
                <div hidden>{{$i=0}}</div>
                @foreach($favorit as $fav)
                    @foreach($rooms as $room)
                        @if($fav['id_room']==$room['id'])
                            @if($i==0)
                                <!-- блок слева -->
                                <div class="flex_room_left_index">
                                    <form class="visit" method="post" action="{{route('brone')}}">
                                        @csrf
                                        <input name="id" value="{{$room['id']}}" hidden>
                                        <button href="" class="visit_a">Смотреть</button>

                                    </form>
                                    <p> {{$room['name']}}</p>
                                    <div class="flex_room_img">
                                        <div class="flex_room_left">
                                            <img class="flex_room_left_img" src="storage/{{$room['photo1']}}" alt="">
                                            <img class="flex_room_left_img_center" src="storage/{{$room['photo2']}}"
                                                 alt="">
                                            <img class="flex_room_left_img" src="storage/{{$room['photo3']}}" alt="">
                                        </div>
                                        <div class="flex_room_right">
                                            <img class="flex_room_right_img" src="storage/{{$room['photo4']}}" alt="">
                                        </div>
                                        <p class="flex_room_left_img_p">{{$room['fee']}}р</p>
                                    </div>
                                    <div hidden>{{$i=1}}</div>
                                </div>
                            @elseif($i==1)
                                <!-- блок центр -->
                                <div class="flex_room_modle">
                                    <form class="visit" method="post" action="{{route('brone')}}">
                                        @csrf
                                        <input name="id" value="{{$room['id']}}" hidden>
                                        <button href="" class="visit_a">Смотреть</button>

                                    </form>
                                    <p> {{$room['name']}}</p>
                                    <div class="flex_room_img">
                                        <div class="flex_room_left">
                                            <img class="flex_room_left_img" src="storage/{{$room['photo1']}}" alt="">
                                            <img class="flex_room_left_img_center" src="storage/{{$room['photo2']}}"
                                                 alt="">
                                            <img class="flex_room_left_img" src="storage/{{$room['photo3']}}" alt="">
                                        </div>
                                        <div class="flex_room_right">
                                            <img class="flex_room_right_img" src="storage/{{$room['photo4']}}" alt="">
                                        </div>
                                        <p class="flex_room_midle_img_p">{{$room['fee']}}р</p>
                                    </div>
                                    <div hidden>{{$i=2}}</div>
                                </div>
                            @else
                                <!-- блок справа -->
                                <div class="flex_room_right_index">
                                    <form class="visit" method="post" action="{{route('brone')}}">
                                        @csrf
                                        <input name="id" value="{{$room['id']}}" hidden>
                                        <button href="" class="visit_a">Смотреть</button>

                                    </form>
                                    <p> {{$room['name']}}</p>
                                    <div class="flex_room_img">
                                        <div class="flex_room_left">
                                            <img class="flex_room_left_img" src="storage/{{$room['photo1']}}" alt="">
                                            <img class="flex_room_left_img_center" src="storage/{{$room['photo2']}}"
                                                 alt="">
                                            <img class="flex_room_left_img" src="storage/{{$room['photo3']}}" alt="">
                                        </div>
                                        <div class="flex_room_right">
                                            <img class="flex_room_right_img" src="storage/{{$room['photo4']}}" alt="">
                                        </div>
                                        <p class="flex_room_right_img_p">{{$room['fee']}}р</p>
                                    </div>

                                    <div hidden>{{$i=0}}</div>
                                </div>

                            @endif
                        @endif
                    @endforeach
                @endforeach
            </div>
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
