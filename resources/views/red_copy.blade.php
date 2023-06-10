<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/red copy.css">
</head>
<header>
    <div class="logo">
        <a href="{{route('welc')}}">INSIGHTS</a> <img src="img/Ellipse 18.svg" alt="" />
    </div>
    <div class="url">
        <a href="{{route('catalog')}}" class="Url_center">Аренда</a>
        <a href="{{route('zaiavka')}}">Добавить объявление</a>
    </div>

    <a class="login" href="{{route('Pa')}}">{{$session[0]['name']}}</a>
</header>

<body>
<hr class="first_hr">
<form class="div" method="post" enctype="multipart/form-data" action="{{route('edit_arend')}}">
    @csrf
    <input name="id" value="{{$session[0]['id']}}" hidden>
    <div class="left">
        <img class="left_img" src="storage/{{$session[0]['photo']}}" alt="">
        <input type="file" name="user">
        <button class="left_a">Обновить фото</button>

    </div>
    <div class="right">
        <div class="first_right_p">
            <p style="    color: #424530;">Здравствуйте, меня зовут
            </p>
            <p style="    text-decoration-line: underline;    color: #424530;">{{$session[0]['name']}}</p>
        </div>
        <div class="right_div">
            <div class="right_div_first">
                <p class="right_div_first_p" style="    color: #424530;">Личные данные:</p>
                <div class="right_div_first_div">
                    <label class="right_div_first_lable" for="" style="color: #424530;">Имя: <input
                            style="width: 26.4vw" class="right_div_first_input" type="text" name="name"
                            value="{{$session[0]['name']}}"></label>
                    <label class="right_div_first_lable" for="" style="color: #424530;">Фамилия: <input
                            style="    width: 23.219vw;" class="right_div_first_input" type="text" name="surname"
                            value="{{$session[0]["surname"]}}"></label>

                    <label class="right_div_first_lable" for="" style="color: #424530;">Номер телефона: <input
                            style="width: 17.219vw;" class="right_div_first_input" type="text" name="phone"
                            value="{{$session[0]['phone']}}"></label>
                </div>
            </div>
            <div class="right_div_second">
                <p class="right_div_first_p" style="    color: #424530;">Данные аккаунта:</p>
                <div class="right_div_second_div">
                    <label class="right_div_first_lable" for="" style="color: #424530;">E-mail: <input name="email"
                                                                                                       style="    width: 25.219vw;"
                                                                                                       class="right_div_first_input"
                                                                                                       type="email"
                                                                                                       value="{{$session[0]['email']}}"></label>
                    <label class="right_div_first_lable" for="" style="color: #424530;">Старый пароль: <input
                            style="width: 18.2vw;" name="password" class="right_div_first_input"
                            type="password"></label>
                    <label class="right_div_first_lable" for="" style="color: #424530;">Новый пароль: <input
                            style="width: 19.219vw;" name="new_password" class="right_div_first_input" type="password"></label>
                    <label class="right_div_first_lable" for="" style="color: #424530;">Повторите пароль: <input
                            style="width: 15.2vw;" class="right_div_first_input" name="repeat_passwrd" type="password"></label>
                </div>
            </div>
            <div class="date" style="    margin-top: 7.604vw; margin-left: 6.51vw;">
                <p class="right_div_first_p" style="    color: #424530;">Дополнительные данные:</p>
                <div class="two"><label class="date_lable" for="">Серия: <input class="date_lable_input"
                                                                                value="{{$session[0]['series']}}"
                                                                                type="text"
                                                                                name="seria"></label>
                    <label class="date_lable" for="">Номер: <input class="date_lable_input"
                                                                   value="{{$session[0]['number']}}"
                                                                   name="number"
                                                                   type="text"></label>
                </div>
                <div class="date">
                    <div class="two" style="margin-top: 0.781vw;"><label class="date_lable" for="">Дата рождения:
                            <input class="date_lable_input" value="{{$session[0]['date_of_b']}}" name="date_of_bithday"
                                   type="date"></label>
                        <label class="date_lable" for="">Дата выдачи: <input
                                name="date_of_vidacha"
                                class="date_lable_input"
                                type="date"
                                value="{{$session[0]['Date']}}"></label>
                    </div>
                    <label class="date_lable" for="">Код подразделения: <input class="date_lable_input"
                                                                               style="width: 15.26vw; "
                                                                               name="cod"
                                                                               value="{{$session[0]['Unit_code']}}"
                                                                               type="text"></label>
                    <label class="date_lable" for="">Кем выдан: <input class="date_lable_input"
                                                                       value="{{$session[0]['Who_issued']}}"
                                                                       name="who"
                                                                       style="width: 24.792vw;" type="text"></label>
                    <label class="date_lable" style="font-weight: 600;
                      font-size: 1.667vw;" for="">СНИЛС: <input class="date_lable_input" style="width: 24.792vw;"
                                                                value="{{$session[0]['SNILS']}}" name="SNILC"
                                                                type="text"></label>
                    <label class="date_lable" style="font-weight: 600;
                      font-size: 1.667vw;" for="">ИНН: <input class="date_lable_input" style="width: 24.792vw;"
                                                              value="{{$session[0]['TIN']}}" name="INN"
                                                              type="text"></label>
                </div>
            </div>
        </div>
        <button class="save">Сохранить</button>
    </div>
</form>
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
