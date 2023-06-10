<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet"/>
    <link rel="stylesheet" href="css/index.css"/>
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
                <a href="{{route('zaiavka')}}">Добавить объявление</a>
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
<div class="main">
    <div class="main_left">
        <img class="main_left_img" src="img/Group 9.svg" alt="">
        <p class="main_left_p">Мы поможем вам подобрать квартиру в лучшем месте и в лучшее время </p>
        <div class="main_left_arenda">
            <a class="main_left_arenda_a" href="{{route('catalog')}}">Арендовать</a>
            <img style="  margin-top: 1.719vw;     width: 40.4vw;" src="img/Line 3.svg" alt="">
            <div class="main_left_div">
                @if(count($session)==1)
                    @if($session[0]['role']==0)
                        <a class="main_left_arenda_a" href="{{route('form_add_arenda')}}">Сотрудничать</a>
                    @else
                        <a class="main_left_arenda_a" href="{{route('zaiavka')}}">Сотрудничать</a>
                    @endif

                @else
                    <a class="main_left_arenda_a" href="{{route('auth')}}">Сотрудничать</a>
                @endif
            </div>
        </div>
    </div>
    <div class="main_right">
        <img class="main_right_img" src="img/Group 115.svg" alt="">
        <p class="main_right_p">Ищете квартиру ?
            <br/>
            Здесь вы найдете то что искали</p>
    </div>
</div>
<div class="how_it_works">
    <div class="how_it_works_left">
        <p class="how_it_works_p">Как это работает?</p>
        <div class="how_it_works_div_number">
            <img src="img/Group 116.svg" alt="">
            <p class="how_it_works_div_number_etap">Этап</p>
            <p class="how_it_works_div_number_p">Чтобы забронировать помещение вам нужно зарегистрироваться на нашем сайте </p>
        </div>
        <div class="how_it_works_div_number">
            <img src="img/Group 116 (1).svg" alt="">
            <p class="how_it_works_div_number_etap">Этап</p>
            <p class="how_it_works_div_number_p">После регистрации вам нужно выбрать помещение которое подойдет именно вам</p>
        </div>
        <div class="how_it_works_div_number">
            <img src="img/Group 116 (2).svg" alt="">
            <p class="how_it_works_div_number_etap">Этап</p>
            <p class="how_it_works_div_number_p">Сразу после того как вы выбрали понравившееся вам место, вам нужно будет оставить заявку </p>
        </div>
        <div class="how_it_works_div_number" style="  border-bottom: 0.104vw solid #E2D1C1;">
            <img src="img/Group 116 (3).svg" alt="">
            <p class="how_it_works_div_number_etap">Этап</p>
            <p class="how_it_works_div_number_p">Затем вам позвонит представитель нашей компании и уточнит все детали с вами</p>
        </div>
    </div>
    <img class="how_it_works_right" src="img/image 25.png" alt="">
</div>
<div class="popular_main">
    <p class="popular_p">Популярное</p>
    <div class="popular_second">
        <div hidden>{{$i=0}}</div>
        @foreach($populars as $pop)
            <form class="popular_block" method="post" action="{{route('brone')}}">
                @csrf
                <input name="id" value="{{$pop['id']}}" hidden>
                <img class="popular_img" src="storage/{{$pop['photo1']}}" alt="">
                <p class="popular_second_p">{{$pop['name']}}</p>
                <button type="submit" class="popular_b">Смотреть</button>
            </form>
            <div hidden>{{$i++}}</div>
            @if($i==3)
                @break
            @endif
        @endforeach
    </div>
</div>
<div class="Why_us">
    <p class="Why_us_p" id="Why_us_p">Почему мы?</p>
    <div class="Why_us_div">
        <img class="Why_us_div_img" src="img/мини галерея преимуществ.svg" alt="">
        <div class="Why_us_div_first">
        </div>
        <div class="Why_us_div_second">
            <p class="Abzac">О нас</p>
            <p class="Abzac_p">На нашем сайте вы найдете уютную и просторную квартиру на удобное для вас количество
                времени, квартиры находятся в 1.100 городов Российской Федерации и с каждым годом мы увеличиваем этот
                список. </p>
            <p class="Abzac">Услуги</p>
            <p class="Abzac_p">Мы предоставляем услуги сдачи квартир, помещение можно снять всего за 4 этапа.
                В первую очередь мы стараемся помочь вам, чтобы вы затратили как можно наименьшее количество времени
                именно поэтому у нас отличные отзывы. </p>
        </div>
    </div>
</div>
<div class="final" id="final">
    <img class="final_img" src="img/Group 117 (1).svg" alt="">
    <p class="final_p">Мы поможем вам сделать все в лучшем виде!</p>
    <p class="final_p_description" style="  color: #202217;">Если вы студент которому далеко добираться до своего
        учебного учреждения или турист который приехал в один из прекрасных городов России то мы вам поможем за короткое
        количество времени, мы гарантируем что вы найдете помещение и оно вас приятно удивит.
        <br>
        <br>
        Многие думают что поиск помещения это долгое и затратное дело, но мы опровергнем этот миф, на нашем сайте вы
        сможете найти себе подходящее место всего за 4 простых этапов.
        <br>
        <br>
        У нас отличные отзывы и мы именно те кто “Помогает а, не продает” </p>
    <div class="button">
        @if(count($session)==1)
            <a href="{{route('catalog')}}" class="button_p">Аренда</a>
        @else
            <a href="{{route('auth')}}" class="button_p">Аренда</a>
        @endif

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
