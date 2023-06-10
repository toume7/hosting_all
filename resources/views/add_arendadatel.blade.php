<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>INSIGHTS</title>
    <link rel="stylesheet" href="css/index (2).css"/>
</head>

<body>
<div class="main">
    <img class="main_img" src="img/Group 125.svg" alt=""/>
    <img class="main_center" src="img/Group 126.svg" alt=""/>
    <div class="main_div">
        <p class="main_div_p">То, что мы о вас уже знаем</p>
        <div class="unhidendate">
            <div class="block">
                <p>E-mail :</p>
                <p style="    width: 23vw;" class="second_block">{{$session[0]['email']}}</p>
            </div>
            <div class="block">
                <p>Имя :</p>
                <p class="second_block">{{$session[0]['name']}}</p>
            </div>
            <div class="block">
                <p>Фамилия :</p>
                <p class="second_block">{{$session[0]['surname']}}</p>
            </div>
            <div class="block">
                <p>Номер телефона :</p>
                <p class="second_block">{{$session[0]['phone']}}</p>
            </div>
        </div>
        <p class="main_div_p">Расскажите о себе больше</p>
        <div class="second_div_p">
            <p class="pasport">Паспортный данные</p>
            <form class="date" method="post" action="{{route('wait')}}">
                @csrf
                <input name="id" value="{{$session[0]['id']}}" hidden>
                <div class="two"><label class="date_lable" for="">Серия: <input class="date_lable_input" name="seria"
                                                                                type="number" placeholder="4507"
                                                                                pattern="[0-9]{4}"></label>
                    <label class="date_lable" for="">Номер: <input class="date_lable_input" type="number" name="number"
                                                                   placeholder="691152" pattern="[0-9]{6}"></label>
                </div>
                <div class="date">
                    <div class="two" style="margin-top: 0.781vw;"><label class="date_lable" for="">Дата рождения: <input
                                required name="date_of_bithday"
                                class="date_lable_input" type="date"></label>
                        <label class="date_lable" for="">Дата выдачи: <input class="date_lable_input" type="date"
                                                                             required name="date_of_vidacha"></label>
                    </div>
                    <label class="date_lable" for="">Код подразделения: <input class="date_lable_input" required
                                                                               style="width: 15.26vw; " name="cod"
                                                                               type="number" placeholder="772050"
                                                                               pattern="[0-9]{6}"></label>
                    <label class="date_lable" for="">Кем выдан: <input class="date_lable_input" style="width: 24.792vw;"
                                                                       required name="who"
                                                                       type="text"></label>
                    <label class="date_lable" style="font-weight: 600;
            font-size: 1.667vw;" for="">СНИЛС: <input class="date_lable_input" style="width: 24.792vw;" required
                                                      name="SNILC"
                                                      type="number" pattern="[0-9]{11}"></label>
                    <label class="date_lable" style="font-weight: 600;
            font-size: 1.667vw;" for="">ИНН: <input required class="date_lable_input" style="width: 24.792vw;"
                                                    name="INN"
                                                    type="number"></label>
                </div>
                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>
    <a href="{{route('welc')}}"><img class="arrow" src="img/Arrow 3.svg" alt=""></a>
</body>

</html>
