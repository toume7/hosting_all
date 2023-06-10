<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Document</title>
    <link rel="stylesheet" href="css/reg.css"/>
    <script src="https://unpkg.com/imask"></script>
</head>
<body>
<div class="main">
    <img class="main_img_left" src="img/Group 124.svg" alt="">
    <img class="main_img" src="img/Group 123.svg" alt="">

    <form method="post" action="{{route('registration')}}" class="left">
        @csrf

        <p class="reg">Регистрация</p>
        <div class="poly">
            <label class="lable_poly" for="">E-mail :
                <input class="lable_poly_input" type="email" name="email" placeholder="Email@email.email" id="" required
                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"></label>
            <label class="lable_poly" for="">Имя :<input class="lable_poly_input" type="text" name="name" id="" required
                                                         placeholder="Иван"></label>
            <label class="lable_poly" for="">Фамилия :<input class="lable_poly_input" type="text" name="surname" id=""
                                                             required placeholder="Иванов"></label>
            <label class="lable_poly" for="phone">Номер Телефона :<input class="lable_poly_input" type="text"
                                                                         name="phone"
                                                                         id="phone"
                                                                         required
                                                                         placeholder="+7(000)000-00-00"
                "></label>
            <label class="lable_poly" for="">Пароль :<input class="lable_poly_input" type="password" name="password"
                                                            id="" required></label>
            <label class="lable_poly" for="">Повторите Пароль :<input class="lable_poly_input" type="password"
                                                                      name="password_request" id="" required></label>
        </div>
        <button type="submit">Регистрация</button>
        <a class="a_submit" href="{{route('auth')}}">Вход</a>
    </form>
    <a href="{{route('welc')}}"><img class="body_arrow" src="img/Arrow 3.svg" alt=""></a>
</div>
@if($warning==1)
    <div id="message" class="message" style="display: block">
        <div class="backround">
            <a class="krest"><img src="img/Group 85 (2).svg"></a>
            <div class="message_flex">
                <h1>Ошибка</h1>
                <div class="br"></div>
                <p>Неправильно введенные данные</p>
            </div>
        </div>
    </div>
@endif

</body>
<script>
    setTimeout(function () {
        document.getElementById('message').style.display = 'none';
    }, 2000);
</script>
<script>
    var element = document.getElementById('phone');
    var maskOptions = {
        mask: '+7(000)000-00-00',
        lazy: false
    }
    var mask = new IMask(element, maskOptions);

</script>
</html>
