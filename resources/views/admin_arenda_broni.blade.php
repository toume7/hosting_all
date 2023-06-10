<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_arenda_broni.css">
    <title>INSIGHTS</title>
    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
</head>

<body>
<header>
    <div class="logo">
        <a href="{{route('welc')}}">INSIGHTS</a> <img src="/img/Ellipse 18.png" alt=""/>
    </div>
    <div class="url">
        <a href="{{route('admin_arend')}}">Аренда</a>
        <a href="{{route('admin_arendodateli')}}" class="Url_center">Арендодатели</a>
        <a href="{{route('admin_arenda_broni')}}">Сделки</a>
    </div>

    <a class="login" href="{{route('logout')}}">Выйти</a>
</header>
<main>
    <section class="section1">
        <div class="sec1_h1">
            <h1>Заявки Аренды</h1>
        </div>
        <div class="flex_komnata">
            @foreach($brone as $bron)
                <div class="komnata">
                    @foreach($rooms as $room)
                        @if($bron['id_room']==$room['id'])

                            <div class="komnata_img">
                                <img src="storage/{{$room['photo1']}}" alt="">
                            </div>
                            <form action="{{route('brone')}}" method="post" class="komnata_nazvanie">
                                @csrf
                                <input name="id" value="{{$room['id']}}" hidden>
                                <button style="border: none; background: transparent;"><a>{{$room['name']}}</a></button>
                            </form>
                        @endif
                    @endforeach
                    <div class="komnata_opisanie">
                        <a>Ночей : {{$bron['night']}}</a>
                    </div>
                    <div class="komnata_opisanie2">
                        <a>Гостей : {{$bron['guest']}}</a>
                    </div>
                    <div class="komnata_summa">
                        <a>Сумма : {{$bron['price']}} Р</a>
                    </div>
                    <div class="komnata_viezd">
                        <a>Въезд : {{$bron['arrivied']}}</a>
                    </div>
                    <div class="komnata_viezd_iz_gostinichi">
                        <a>Выезд : {{$bron['Departure']}}</a>
                    </div>
                    <div class="phone">
                        <a>Номер телефона :{{$bron['phone']}} </a>
                    </div>
                    <div class="komnata_posmotreti">
                        @if($bron['accept']==0)
                            <a>В ожидании</a>
                        @elseif($bron['accept']==1)
                            <a>Заронированно</a>
                        @endif

                    </div>
                    @if($bron['accept']==0)
                        <div class="yes_0r_not">

                            <a href="" onclick="event.preventDefault();
                                   document.getElementById('accept').submit(); " style="text-decoration: none;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 1.5vw;
    color: #424530;
    border-bottom: 2px solid #424530;">Одобрить</a>
                            <a onclick="event.preventDefault();
                                   document.getElementById('cancel').submit();" style="text-decoration: none;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 1.5vw;
    color: #8B0000;
    border-bottom: 2px solid #8B0000;
        margin-left: 1vw;">Отклонить</a>


                            <form method="post" action="{{route('brone_accept_admin')}}" id="accept" hidden>
                                @csrf
                                <input name="id" value="{{$bron['id']}}" hidden>
                            </form>
                            <form method="post" action="{{route('brone_cancel_admin')}}" id="cancel" hidden>
                                @csrf
                                <input name="id" value="{{$bron['id']}}" hidden>
                            </form>

                        </div>
                    @else
                        <div class="komnata_otkaz">
                            <a onclick="event.preventDefault();
                                   document.getElementById('cancel').submit();" href="">X</a>
                        </div>
                        <form method="post" action="{{route('brone_cancel_admin')}}" id="cancel" hidden>
                            @csrf
                            <input name="id" value="{{$bron['id']}}" hidden>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
</main>
<footer>
    <div class="footer_up">
        <a href="">Главная</a>
        <a href="">Каталог</a>
        <a href="">Каталог</a>
        <a href="">Каталог</a>
    </div>
    <div class="footer_down">
        <img class="footer_down_img" src="/img/Group 14.png" alt="">
        <div class="footer_center">
            <div class="footer_center_div_img">
                <a class="footer_center_img" href=""><img src="/img/path718.png" alt=""></a>
                <a class="footer_center_img" href=""><img src="/img/Group 15.png" alt=""></a>
                <a class="footer_center_img" href=""><img src="/img/Group 16.png" alt=""></a>
            </div>

            <p class="Copyright">Copyright All Rights Reserved 2023 © </p>
        </div>
        <div class="footer_right">
            <a href="">Пользовательское соглашение</a>
            <a href="">Политика конфиденциальности</a>
        </div>
    </div>
</footer>
</body>

</html>
