<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_arendodateli.css">
    <title>INSIGHTS</title>
</head>

<body>
<header>
    <div class="logo">
        <a href=""{{route('welc')}}>INSIGHTS</a> <img src="/img/Ellipse 18.png" alt=""/>
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
            <h1>Арендодатели</h1>
        </div>
        <div class="v_obrabotke">
            <a>В обработке</a>
        </div>
        <div class="deistvushie">
            <a>Действующие</a>
        </div>
        <div class="flex_komnata">
            @foreach($waits as $wait)
            <div class="komnata">
                <div class="komnata_img">
                    <img src="storage/{{$wait->photo}}" alt="">
                </div>
                <div class="komnata_name">
                    <a>{{$wait->name}} {{$wait->surname}} </a>
                </div>
                <form method="post" action="{{route('view_ared')}}" class="komnata_prosmotreti">
                    @csrf
                    <input name="id" value="{{$wait->id}}" hidden>
                    <button><a>Просмотреть</a></button>
                </form>
                <form method="post" action="{{route('accept')}}" class="komnata_prinzti">
                    @csrf
                    <input name="id" value="{{$wait->id}}" hidden>
                    <button>Принять</button>
                </form>
                <form action="{{route('cancel')}}" method="post" class="komnata_x">
                    @csrf
                    <input name="id" value="{{$wait->id}}" hidden>
                    <button href="">X</button>
                </form>
            </div>
            @endforeach
        </div>

        <div class="flex_komnata2">
            @foreach($Actings as $Acting)
            <div class="komnata2">
                <div class="komnata_img2">
                    <img src="storage/{{$Acting->photo}}" alt="">
                </div>
                <div class="komnata_name2">
                    <a>{{$Acting->name}} {{$Acting->surname}}</a>
                </div>
                <form method="post" action="{{route('view_ared')}}" class="komnata_prosmotreti2">
                    @csrf
                    <input name="id" value="{{$Acting->id}}" hidden>
                    <button><a>Просмотреть</a></button>
                </form>
                <form method="post" action="{{route('cancel')}}" class="komnata_razhalovati">
                    @csrf
                    <input name="id" value="{{$Acting->id}}" hidden>
                    <button><a>Разжаловать</a></button>
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
