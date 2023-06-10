<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_stranizha_arendodatelia.css">
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
        <div class="komnata">
            <div class="komnata_img">
                <img src="storage/{{$user->photo}}" alt="">
            </div>
            <div class="komnata_name">
                <a>{{$user->name}} {{$user->surname}}</a>
            </div>
            <div class="komnata_email">
                <a>E-mail :</a>
            </div>
            <div class="komnata_email2">
                <a>{{$user->email}}</a>
            </div>
            <div class="komnata_number">
                <a>Номер телефона :</a>
            </div>
            <div class="komnata_number2">
                <a>{{$user->phone}}</a>
            </div>
            <div class="pasportnie">
                <a>Паспортные данные</a>
            </div>
            <div class="komnata_seria">
                <a>Серия: {{$user->series}}</a>
            </div>
            <div class="komnata_number_passport">
                <a>Номер: {{$user->number}}</a>
            </div>
            <div class="komnata_happy">
                <a>Дата рождения: {{$user->date_of_b}}</a>
            </div>
            <div class="komnata_vidachi">
                <a>Дата выдачи: {{$user->Date}}</a>
            </div>
            <div class="komnata_kod">
                <a>Код подразделения: {{$user->Unit_code}}</a>
            </div>
            <div class="komnata_kem_vidan">
                <a>Кем выдан: {{$user->Who_issued}}</a>
            </div>
            <div class="komnata_snils">
                <a>СНИЛС: {{$user->SNILS}}</a>
            </div>
            <div class="komnata_inn">
                <a>ИНН: {{$user->TIN}}</a>
            </div>
            @if($user['role']==1)
            <form method="post" action="{{route('accept')}}" class="komnata_priniati">
                @csrf
                <input value="{{$user->id}}" name="id" hidden>
                <button style="border: none; background: transparent"><a>Принять</a></button>
            </form>
            <form method="post" action="{{route('cancel')}}" class="komnata_otkaz">
                @csrf
                <input value="{{$user->id}}" name="id" hidden>
                <button style="border: none; background: transparent"><a>Отказ</a></button>
            </form>
            @endif
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
