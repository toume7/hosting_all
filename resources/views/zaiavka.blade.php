<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/zaiavka.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
            integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>
<header>
    <div class="logo">
        <a href="{{route('welc')}}">INSIGHTS</a> <img src="img/Ellipse 18.svg" alt=""/>
    </div>
    <div class="url">
        <a href="{{route('catalog')}}" class="Url_center">Аренда</a>
        <a href="{{route('zaiavka')}}">Добавить объявление</a>
    </div>

    <a class="login" href="{{route('Pa')}}">{{$session[0]['name']}}</a>
</header>

<body>
<a class="body_a" href="{{route('Pa')}}">Назад</a>
<form class="main" action="{{route('add_catalog')}}" method="post" enctype="multipart/form-data">
    <input name="id_user" value="{{$session[0]['id']}}" hidden>
    @csrf
    <div class="main_first_second">
        <label class="main_lable" for="">Название :<input style="    width: 29vw;" name="name" class="main_input"
                                                          type="text"
                                                          placeholder="Серебряный тополь Geode возле Сент-Эмильон"></label>
    </div>
    <div class="main_first">

        <label class="main_lable" for="">Вид помещения: <select name="room" class="main_select">
                <option value="" hidden disabled selected>Выбрать</option>
                <option value="Квартира">Квартира</option>
                <option value="Дом">Дом</option>
            </select></label>
        <label class="main_lable" for="">Этаж :<input name="Floor" class="main_input" type="number"
                                                      placeholder="0"></label>
        <label class="main_lable" for="">Количество комнат :<input name="rooms" class="main_input" type="text"
                                                                   placeholder="0"> </label>
        <div class="main_div_first">
            <label class="main_lable" style=" display: flex; align-items: flex-end;" for="">
                <div class="balcon" style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                    <input name="balcon" id="balcon" value="0" hidden></div>
                Балкон
            </label>

            <label class="main_lable" style=" display: flex; align-items: flex-end;" for="">
                <div class="lodg" style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                    <input name="lodg" id="lodg" value="0" hidden></div>
                Лоджия
            </label>

        </div>
        <label class="main_lable" style="margin-top: 2.14vw;" for="">Общая площадь :<input name="area"
                                                                                           class="main_input"
                                                                                           type="text"
                                                                                           placeholder="0,0 кв.м.">
        </label>
        <label for="" class="main_lable">Техника:
            <div class="main_div_second">
                <div class="left">
                    <label class="main_lable" style="display: flex; align-items: flex-end;" for="">
                        <div class="Air_conditioning"
                             style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                            <input name="Air_conditioning" id="Air_conditioning" value="0" hidden></div>
                        Кондиционер</label>
                    <label class="main_lable" style="display: flex; align-items: flex-end;" for="">
                        <div class="Refrigerator"
                             style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                            <input name="Refrigerator" id="Refrigerator" value="0" hidden></div>
                        Холодильник
                    </label>
                    <label class="main_lable" style="display: flex; align-items: flex-end;" for="">
                        <div class="Plate"
                             style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                            <input name="Plate" id="Plate" value="0" hidden></div>
                        Плита
                    </label>
                    <label class="main_lable" style="display: flex; align-items: flex-end;" for="">
                        <div class="Microwave"
                             style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                            <input name="Microwave" id="Microwave" value="0" hidden></div>
                        Микроволновка
                    </label>
                    <label class="main_lable" style="display: flex; align-items: flex-end;" for="">
                        <div class="Washing_machine"
                             style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                            <input name="Washing_machine" id="Washing_machine" value="0" hidden></div>
                        Стиральная машина
                    </label>
                </div>
                <div class="right">
                    <label class="main_lable" style="display: flex; align-items: flex-end;" for="">
                        <div class="Dishwasher"
                             style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                            <input name="Dishwasher" id="Dishwasher" value="0" hidden></div>
                        Посудомоечная машина
                    </label>
                    <label class="main_lable" style="display: flex; align-items: flex-end;" for="">
                        <div class="Water_heater"
                             style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                            <input name="Water_heater" id="Water_heater" value="0" hidden></div>
                        Водонагреватель
                    </label>
                    <label class="main_lable" style="display: flex; align-items: flex-end;" for="">
                        <div class="TV"
                             style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                            <input name="TV" id="TV" value="0" hidden></div>
                        Телевизор
                    </label>
                    <label class="main_lable" style="display: flex; align-items: flex-end;" for="">
                        <div class="hair_dryer"
                             style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                            <input name="hair_dryer" id="hair_dryer" value="0" hidden></div>
                        Фен
                    </label>
                    <label class="main_lable" style="display: flex; align-items: flex-end;" for="">
                        <div class="Iron"
                             style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                            <input name="Iron" id="Iron" value="0" hidden></div>
                        Утюг
                    </label>
                </div>
            </div>
        </label>
        <label for="" style=" margin-top: 2.81vw; height: 4.17vw" class="main_lable">Интернет и ТВ :
            <div class="main_div_second" style="width: 8vw;">
                <div class="left" style="height: 4.17vw;">
                    <label class="main_lable" style="display: flex; align-items: flex-end;" for="">
                        <div class="Television"
                             style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                            <input name="Television" id="Television" value="0" hidden></div>
                        Телевидение
                    </label>
                    <label class="main_lable" style="display: flex; align-items: flex-end;" for="">
                        <div class="Wi_Fi"
                             style="width: 1.25vw; height: 1.35vw; margin-right: 0.99vw;   background: #D9D9D9;">
                            <input name="Wi_Fi" id="Wi_Fi" value="0" hidden></div>
                        Wi-Fi</label>
                </div>
            </div>
        </label>
    </div>
    <div class="main_second">
        <p class="main_second_p" style="margin-bottom: 2vw;">Правила заселения</p>
        <label class="main_lable" for="">Максимум гостей : <input class="main_input" style="width: 2vw;"
                                                                  name="max_guest" type="number"
                                                                  placeholder="0"> </label>
        <div class="div_lable">
            <label style=" margin-right: 1vw; display: flex; align-items: baseline;" class="main_lable" for="">Можно с
                детьми:
                <div class="main_lable_left_button">
                    <div class="children_yes" style="color: rgb(0, 0, 0)">Да</div>
                    <hr class="main_lable_left_button_hr">
                    <div class="children_no" style="color: rgb(0, 0, 0)">Нет</div>
                    <input name="children" id="children" value="0" hidden>
                </div>
            </label>
            <label style=" margin-top: -2vw; margin-right: 1vw; display: flex; align-items: baseline;"
                   class="main_lable" for="">Можно с животными:
                <div class="main_lable_left_button">
                    <div class="animals_yes" style="color: rgb(0, 0, 0)">Да</div>
                    <hr class="main_lable_left_button_hr">
                    <div class="animals_no" style="color: rgb(0, 0, 0)">Нет</div>
                    <input name="animals" id="animals" value="0" hidden>
                </div>
            </label>
            <label style=" margin-top: -2vw; margin-right: 1vw; display: flex; align-items: baseline;"
                   class="main_lable" for="">Разрешено
                курить :
                <div class="main_lable_left_button">
                    <div class="smoke_yes" style="color: rgb(0, 0, 0)">Да</div>
                    <hr class="main_lable_left_button_hr">
                    <div class="smoke_no" style="color: rgb(0, 0, 0)">Нет</div>
                    <input name="smoke" id="smoke" value="0" hidden>
                </div>
            </label>

        </div>
    </div>
    <div class="main_third">
        <p class="main_second_p">Описание</p>
        <textarea class="main_third_textarea" name="description" id="" cols="30" rows="10"
                  placeholder="Расскажите, что есть в сдаваемом помещении, рядом с ним, опишите правила заселения и выезда.Пожалуйста, не указывайте ограничения для арендаторов. Например: пол/национальность.Не забудьте ознакомиться с актом приема и передачи имущества!С уважением, компания INSSIGHTS <3"></textarea>
    </div>
    <div class="main_fourth">
        <p class="main_second_p">Условия сделки</p>
        <label class="main_fourth_lab" for="">Арендная плата <p></p><input class="main_fourth_input" type="text"
                                                                           name="arenda" id="">
            Р</p> сутки</label>
        <label class="main_fourth_lab" for="">Надбавка за дополнительных гостей<p></p><input
                class="main_fourth_input" type="text" name="premium" id="">
            Р</p> </label>
    </div>
    <div class="main_fife">
        <p class="main_second_p">Фотографии/Видео</p>
        <input type="file" id="imageFile1" name="photo1">
        <input type="file" id="imageFile2" name="photo2">
        <input type="file" id="imageFile3" name="photo3">
        <input type="file" id="imageFile4" name="photo4">
        <input type="file" id="imageFile5" name="photo5">

    </div>
    <div class="main_six">
        <img class="left" id="prevImage1" src="#" alt="Image">
        <img class="left" id="prevImage2" src="#" alt="Image">
        <img class="left" id="prevImage3" src="#" alt="Image">
        <img class="left" id="prevImage4" src="#" alt="Image">
        <img class="left" id="prevImage5" src="#" alt="Image">
    </div>
    <div class="div_button">
        <button type="submit">Отправить</button>
        <a class="div_button_a" href="{{route('Pa')}}">Назад</a>
    </div>
    <p class="test">Перед сдачей своего помещения в аренду ознакомьтесь с <a
            style="text-decoration-line: underline;" href="js/blank-akt-priema-peredachi-nedvizhimosti-dlya-dogovora-najma.doc">актом приема передачи имущества в аренду</a>
    </p>
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
<script src="js/button-chexbox.js"></script>
<script>
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onloadend = function (e) {
                $('#prevImage1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onloadend = function (e) {
                $('#prevImage2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onloadend = function (e) {
                $('#prevImage3').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onloadend = function (e) {
                $('#prevImage4').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL5(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onloadend = function (e) {
                $('#prevImage5').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageFile1").change(function () {
        readURL1(this);
    });
    $("#imageFile2").change(function () {
        readURL2(this);
    });
    $("#imageFile3").change(function () {
        readURL3(this);
    });
    $("#imageFile4").change(function () {
        readURL4(this);
    });
    $("#imageFile5").change(function () {
        readURL5(this);
    });

</script>
</html>
