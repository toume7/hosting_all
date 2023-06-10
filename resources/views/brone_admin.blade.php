<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/brone.css">
</head>
<header>
    <div class="logo">
        <a href="">INSIGHTS</a> <img src="/img/Ellipse 18.png" alt=""/>
    </div>
    <div class="url">
        <a href="{{route('admin_arend')}}">Аренда</a>
        <a href="{{route('admin_arendodateli')}}" class="Url_center">Арендодатели</a>
        <a href="">Сделки</a>
    </div>

    <a class="login" href="{{route('logout')}}">Выйти</a>
</header>

<body>
<div class="main">
    <div class="head"></div>
    <p class="main_p">{{$room['name']}}</p>
    <div class="two">
        <div class="firts">
            <div class="dots">

                <div class="dot_non" id="photo1" style="    background: #424530;"></div>
                <div class="dot_non" id="photo2" style="    background: #D9D9D9;"></div>
                <div class="dot_non" id="photo3" style="    background: #D9D9D9;"></div>
                <div class="dot_non" id="photo4" style="    background: #D9D9D9;"></div>
                <div class="dot_non" id="photo5" style="    background: #D9D9D9;"></div>

            </div>
            <img class="first_img" id="img1" src="storage/{{$room['photo1']}}" alt="" style=" display: block">
            <img class="first_img" id="img2" src="storage/{{$room['photo2']}}" alt="" style=" display: none">
            <img class="first_img" id="img3" src="storage/{{$room['photo3']}}" alt="" style=" display: none">
            <img class="first_img" id="img4" src="storage/{{$room['photo4']}}" alt="" style=" display: none">
            <img class="first_img" id="img5" src="storage/{{$room['photo5']}}" alt="" style=" display: none">
        </div>
    </div>

</div>
<div class="third">
    <p class="third_p">О жилье</p>
    <div class="third_first_description">
        <div class="third_first_description_left">
            <label for="" class="third_first_description_lable">Количество
                комнат : <p class="third_first_description_p">{{$room['count_room']}}</p></label>

            <label for="" class="third_first_description_lable">Балкон или лоджия :
                @if($room['balcon']==1)
                    <p class="third_first_description_p">есть</p>
                @elseif($room['lodg']==1)
                    <p class="third_first_description_p">есть</p>
                @else
                    <p class="third_first_description_p">нет</p>
                @endif
            </label>
            <label for="" class="third_first_description_lable">Страна :<p class="third_first_description_p">Россия
                </p></label>
            <label for="" class="third_first_description_lable">Город : <p class="third_first_description_p">Москва
                </p></label>

            <label for="" class="third_first_description_lable">Интернет и ТВ:
                @if(($room['Television']==1)&&($room['Wi_Fi']==0))
                    <p class="third_first_description_p">Телевидение</p>
                @elseif(($room['Television']==0)&&($room['Wi_Fi']==1))
                <p class="third_first_description_p">WI-FI</p>
                @elseif(($room['Television']==1)&&($room['Wi_Fi']==1))
                    <p class="third_first_description_p">WI-FI,<br> Телевидение</p>
            @endif
        </div>
        <div class="third_first_description_right">

            <label for="" class="third_first_description_lable">Этаж:<p
                    class="third_first_description_p">{{$room['floor']}}</p>
            </label>
            <label for="" class="third_first_description_lable">Техника:
                <p class="third_first_description_p">
                    Кондиционер,Холодильник, плита, микроволновка, стиральная машина, посудомоечная
                    машина, водонагреватель, телевизор, фен, утюг. </p></label>
        </div>
    </div>
    <p class="third_p">Правила</p>
    <div class="third_second_description">
        <div class="third_first_description_left">
            <label for="" class="third_first_description_lable">Количество гостей: <p
                    class="third_first_description_p">{{$room['Maximum_guests']}}</p></label>
            <label for=""
                   class="third_first_description_lable">Можно с
                детьми:
                @if($room['children']==1)
                    <p class="third_first_description_p">да</p>
                @else
                    <p class="third_first_description_p">нет</p>
                @endif

            </label>
        </div>
        <div class="third_first_description_right">
            <label for="" class="third_first_description_lable">Можно с животными:
                @if($room['animals']==1)
                    <p class="third_first_description_p">да</p>
                @else
                    <p class="third_first_description_p">нет</p>
                @endif
            </label>
            <label for="" class="third_first_description_lable">Можно
                курить:
                @if($room['smoke']==1)
                    <p class="third_first_description_p">да</p>
                @else
                    <p class="third_first_description_p">нет</p>
                @endif
            </label>
        </div>
    </div>
    <p class="third_p">Описание</p>
    <p class="third_p_description">{{$room['description']}}</p>
</div>
<footer style="margin-top: 22vw;">
    <div class="footer_up">
        <a href="">Главная</a>
        <a href="">Каталог</a>
        <a href="">Каталог</a>
        <a href="">Каталог</a>
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
</body>
<script src="js/date.js"></script>
<script src="js/slider.js"></script>

</html>
