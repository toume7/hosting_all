<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_arenda.css">
    <title>INSIGHTS</title>
</head>
<body>
<header>
    <div class="logo">
        <a href="{{route('welc')}}">INSIGHTS</a> <img src="/img/Ellipse 18.png" alt=""/>

    </div>
    <div class="url">
        <a href="{{route('admin_arend')}}">Аренда</a>
        <a href="{{route('admin_arendodateli')}}" class="Url_center">Арендодатели</a>
        <a href="">Сделки</a>
    </div>

    <a class="login" href="{{route('logout')}}">Выйти</a>
</header>
<main>
    <section class="section1">
        <div class="sec1_h1">
            <h1>Заявки Аренды</h1>
        </div>
        <div class="flex_komnata">
            @foreach($rooms as $room)
                <div class="komnata">
                    <div class="komnata_img">
                        <img src="storage/{{$room['photo1']}}" alt="">
                    </div>
                    <div class="komnata_nazvanie">
                        <a>{{$room['name']}}</a>
                    </div>
                    <div class="komnata_opisanie">
                        <p>{{$room['description']}}</p>
                    </div>
                    <form method="post" action="{{route('brone_view')}}" class="komnata_posmotreti">
                        @csrf
                        <input name="id_room" value="{{$room['id']}}" hidden>
                        <button type="submit" style="background: transparent; border: none;"><a>Посмотреть</a></button>
                    </form>
                    <div class="komnata_v_obrabotke">
                        <a>В обработке</a>
                    </div>
                    <form method="post" action="{{route('brone_accept')}}" class="komnata_otpavit">
                        @csrf
                        <input name="id_room" value="{{$room['id']}}" hidden>
                        <button style="background: transparent; border: none;"><a>Одобрить</a></button>
                    </form>
                    <form method="post" action="{{route('arenda_cancel')}}" class="komnata_otkaz">
                        @csrf
                        <input name="id_room" value="{{$room['id']}}" hidden>
                        <button style="background: transparent; border: none;"><a >Отказать</a></button>
                    </form>
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
