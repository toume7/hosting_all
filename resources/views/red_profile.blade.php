<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/red.css">
</head>
<header>
    <div class="logo">
        <a href="">INSIGHTS</a> <img src="img/Ellipse 18.svg" alt="" />
    </div>
    <div class="url">
        <a href="">О нас</a>
        <a href="" class="Url_center">Аренда</a>
        <a href="">Сотрудничество</a>
    </div>

    <a class="login" href="{{route('Pu')}}">{{$session[0]['name']}}</a>
</header>

<body>
<hr class="first_hr">
<form class="div" method="post" enctype="multipart/form-data" action="{{route('edit')}}">
    @csrf
    <input name="id" value="{{$session[0]['id']}}" hidden>
    <div class="left">
        <img class="left_img" src="storage/{{$session[0]['photo']}}" alt="">
        <input type="file" name="user">
        <button class="left_a">Обновить фото</button>

    </div>
    <div class="right" >

        <div class="first_right_p">
            <p style="    color: #424530;">Здравствуйте, меня зовут
            </p>
            <p style="    text-decoration-line: underline;    color: #424530; margin-left: 1vw;">{{$session[0]['name']}}</p>
        </div>

        <div class="right_div">
            <div class="right_div_first">
                <p class="right_div_first_p" style="    color: #424530;">Личные данные:</p>
                <div class="right_div_first_div">
                    <label class="right_div_first_lable" for="" style="color: #424530;">Имя: <input
                            style="width: 26.4vw" class="right_div_first_input" type="text" name="name" value="{{$session[0]['name']}}"></label>
                    <label class="right_div_first_lable" for="" style="color: #424530;">Фамилия: <input
                            style="    width: 23.219vw;" class="right_div_first_input" type="text" name="surname" value="{{$session[0]["surname"]}}"></label>

                    <label class="right_div_first_lable" for="" style="color: #424530;">Номер телефона: <input
                            style="width: 17.219vw;" class="right_div_first_input" type="text" name="phone" value="{{$session[0]['phone']}}"></label>
                </div>
            </div>
            <div class="right_div_second">
                <p class="right_div_first_p" style="    color: #424530;">Данные аккаунта:</p>
                <div class="right_div_second_div">
                    <label class="right_div_first_lable" for="" style="color: #424530;">E-mail: <input name="email"
                            style="    width: 25.219vw;" class="right_div_first_input" type="email" value="{{$session[0]['email']}}"></label>
                    <label class="right_div_first_lable" for="" style="color: #424530;">Старый пароль: <input
                            style="width: 18.2vw;" name="password" class="right_div_first_input" type="password" ></label>
                    <label class="right_div_first_lable" for="" style="color: #424530;">Новый пароль: <input
                            style="width: 19.219vw;" name="new_password" class="right_div_first_input" type="password" ></label>
                    <label class="right_div_first_lable" for="" style="color: #424530;">Повторите пароль: <input
                            style="width: 15.2vw;" class="right_div_first_input" name="repeat_passwrd" type="password" ></label>
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
</html>
