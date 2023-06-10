<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
<a href="{{route('welc')}}"><img class="body_arrow" src="img/Arrow 3.svg" alt=""></a>
<div class="main">
    <form class="log" method="post" action="{{route('login')}}">
        @csrf
        <p class="log_p" style="color: #424530;">Вход</p>
        <p class="log_lable" style="    color: #424530;" for="">E-mail :</p><input class="log_input" type="email"
                                                                                   name="email" id="" required
                                                                                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
        <p class="log_lable" style="    color: #424530;" for="">Пароль :</p><input class="log_input" type="password"
                                                                                   name="password" id="" required>
        <button type="submit">Войти</button>
        <a class="login_a" href="{{route('registration')}}">Регистрация</a>
    </form>
    <img class="log_img" src="img/Group 122.svg" alt="">
    <img style="width: 22.552vw; height: 17.917vw; position: absolute; top: 3.125vw; left: 58.594vw; z-index: 0;"
         src="img/Rectangle 102.svg" alt="">
    <img style="width: 22.552vw; height: 19.323vw; position: absolute; top: 21.042vw; left: 58.594vw; z-index: 0;"
         src="img/Rectangle 101.svg" alt="c">
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
</body>

</html>
