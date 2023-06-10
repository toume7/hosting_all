<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>INSIGHTS</title>
    <link rel="stylesheet" href="css/style.css">
    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
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
                <a href=""></a>
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
<div class="rent">
    <div class="center">
        <div class="arent">
            <img class="Ellipse" src="img/Ellipse 13.svg" alt="">
            <h2 class="Ellipse_h2">Estate agency</h2>
            <h1 class="Ellipse_h1">INSIGHTS</h1>
            <h3 class="Ellipse_h3">Основу хорошего отдыха составляет место проживания и мы здесь чтобы помочь вам с
                этим</h3>
            <a href="#arenda" class="Ellipse_a">Аренда</a>
            <img class="Ellipse_arrow" src="img/Arrow 1.svg" alt="">
        </div>
        <img class="right" src="img/image 26.svg" alt="">
    </div>
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
<div class="rent_block">
    <div class="sosicka">
        <p id="arenda" class="sosicka_p">Аренда</p>
    </div>
    <div class="filter_and_room">
        <form class="filter">
            <p class="filter_p_main">Фильтер</p>
            <p class="filter_city">Город:<input id="city" class="filter_city_select">
                </input></p>

            <p class="filter_city">Снять:<select id="type" class="filter_city_select">
                    <option hidden disabled selected>Выбрать</option>
                    <option value="Квартира">Квартира</option>
                    <option value="Дом">Дом</option>
                </select></p>
            <p class="filter_city">Цена:</p>
            <div class="filter_from_to">
                <input class="from" id="From" type="number" placeholder="от:">
                <input class="to" id="To" type="number" placeholder="до:">
            </div>


            <div class="filter_type">
                <p class="filter_city">Количество гостей:</p>
                <input class="filter_city_select" id="guest" type="number">

            </div>
            <p class="filter_city">Тип дома:</p>
            <div class="filter_type_house">
                <label for="" class="filter_fuul_home"> <input type="checkbox" id="balcon">Балкон</label>
                <label for="" class="filter_fuul_home"> <input type="checkbox" id="lodg">Лоджия</label>
                <label for="" style="width: 5vw" class="filter_fuul_home"> <input type="checkbox"
                                                                                  id="Wi_Fi">Wi-Fi</label>
                <label for="" class="filter_fuul_home"> <input type="checkbox" id="children">Можно с детьми</label>
                <label for="" class="filter_fuul_home"> <input type="checkbox" id="animals">Можно с животными</label>
                <label for="" class="filter_fuul_home"> <input type="checkbox" id="smoke">Разрешено курить</label>
            </div>
            <div class="life_and_death">
                <button class="filter_del"><img src="img/Group 32.svg"
                                                alt=""></button>
                <div onclick="lox()" class="filter_button"><p>Показать</p></div>
            </div>

        </form>
        <div hidden>
            {{$rooms}}
        </div>
        <div class="room">
            <div hidden>{{$i=0}}</div>
            @foreach($rooms as $room)
                <form method='post' id="{{$room['id']}}" action='{{route('brone')}}' hidden>
                    @csrf
                    <input name='id' value='{{$room['id']}}' hidden>
                </form>
            @endforeach

        </div>
    </div>
    <div class="slider_count" id="pp">
        @for($i=0;$i<count($rooms)/9;)
            @if($i!=0)
                <div hidden>{{$i++}}</div>
                <div class="number" style="border: none" id="number{{$i}}" data-last-value="{{$i}}"
                     data-progress="number{{$i}}"><p>{{$i}}</p>
                </div>

            @else
                <div class="number"
                     style="border-bottom: 0.208vw solid rgb(30, 30, 30);" id="number{{$i+=1}}"
                     data-last-value="{{$i}}" data-progress="number{{$i}}">
                    <p>{{$i}}</p></div>
            @endif
        @endfor

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
<script>
    let p = 1
    let c = 0;
    let rooms = <?= $rooms ?>;
    let div_room = document.querySelector('.room')
    for (let i = 0; i < (rooms.length / 9); i++) {
        let div = document.createElement('div');
        div.className = 'rooms_flex';
        div.id = 'RF' + i
        if (i > 0) {
            div.style.display = 'none'
        } else {
            div.style.display = 'flex'
        }
        div_room.appendChild(div);
    }

    let RF = document.getElementById('RF0')

    for (let j = 0; j < rooms.length; j++) {

        if (c == 0) {
            let FRLI = document.createElement('div');
            FRLI.className = 'flex_room_left_index';
            FRLI.id = 'FRLI' + j
            RF.appendChild(FRLI)

            text = "<div class='visit'> <a href=''onclick='event.preventDefault();document.getElementById(" + rooms[j]['id'] + ").submit()' class='visit_a'>Смотреть</a> </div> <p> "+rooms[j]['name'] + "</p>  <div class='flex_room_img'> <div class='flex_room_left'> <img class='flex_room_left_img' src='storage/" + rooms[j]['photo1'] + "'> <img class='flex_room_left_img_center' src='storage/" + rooms[j]['photo2'] + "'> <img class='flex_room_left_img' src='storage/" + rooms[j]['photo3'] + "'> </div> <div class='flex_room_right'> <img class='flex_room_right_img' src='storage/" + rooms[j]['photo4'] + "' > </div> <p class='flex_room_left_img_p'>" + rooms[j]['fee'] + "</p> </div>"
            c = 1
        } else if (c == 1) {
            let FRLI = document.createElement('div');
            FRLI.className = 'flex_room_modle';
            FRLI.id = 'FRLI' + j
            RF.appendChild(FRLI)
            text = "<div class='visit'> <a href=''onclick='event.preventDefault();document.getElementById(" + rooms[j]['id'] + ").submit()' class='visit_a'>Смотреть</a> </div> <p> "+rooms[j]['name'] + "</p>  <div class='flex_room_img'> <div class='flex_room_left'> <img class='flex_room_left_img' src='storage/" + rooms[j]['photo1'] + "'> <img class='flex_room_left_img_center' src='storage/" + rooms[j]['photo2'] + "'> <img class='flex_room_left_img' src='storage/" + rooms[j]['photo3'] + "'> </div> <div class='flex_room_right'> <img class='flex_room_right_img' src='storage/" + rooms[j]['photo4'] + "' > </div> <p class='flex_room_midle_img_p'>" + rooms[j]['fee'] + "</p> </div>"

            c = 2
        } else if (c == 2) {
            let FRLI = document.createElement('div');
            FRLI.className = 'flex_room_right_index';
            FRLI.id = 'FRLI' + j
            RF.appendChild(FRLI)
            text = "<div class='visit'> <a href=''onclick='event.preventDefault();document.getElementById(" + rooms[j]['id'] + ").submit()' class='visit_a'>Смотреть</a> </div> <p> "+rooms[j]['name'] + "</p>  <div class='flex_room_img'> <div class='flex_room_left'> <img class='flex_room_left_img' src='storage/" + rooms[j]['photo1'] + "'> <img class='flex_room_left_img_center' src='storage/" + rooms[j]['photo2'] + "'> <img class='flex_room_left_img' src='storage/" + rooms[j]['photo3'] + "'> </div> <div class='flex_room_right'> <img class='flex_room_right_img' src='storage/" + rooms[j]['photo4'] + "' > </div> <p class='flex_room_right_img_p'>" + rooms[j]['fee'] + "</p> </div>"

            c = 0
        }

        let gx = document.getElementById('FRLI' + j)


        gx.innerHTML = text;

        if ((((j % 8) == 0) && j != 0) && j != rooms.length - 1) {
            RF = document.getElementById('RF' + p)
            p++
        }

    }
</script>
<script>
    let count_numb = document.getElementsByClassName('number').length
    $(document).ready(function () {
        $('.number').on('click', function () {
            let progress = $(this).attr('data-progress');
            let number = $(this).attr('data-last-value');
            let div = document.getElementById('RF' + (number - 1))
            div.style.display = 'flex'
            let numb = document.getElementById(progress)
            if (numb.style.border === 'none') {
                numb.style.borderBottom = "0.208vw solid #1E1E1E";
                for (let i = 1; i <= count_numb; i++) {
                    if (i == number) {

                    } else {
                        document.getElementById('number' + i).style.border = 'none'
                        document.getElementById('RF' + (i - 1)).style.display = 'none'
                    }


                }
            }
        });
    });
</script>
<script>
    function lox() {
        let p = 1
        let c = 0;
        let j = 0
        let new_city = [];
        let new_type = [];
        let new_price = [];
        let new_guest = [];
        let new_xyina = [];
        let new_arr = []
        for (i = 0; i < rooms.length; i++) {
            if (type.value != 'Выбрать') {
                if ((type.value == rooms[i]['type'])) {
                    new_type[j] = rooms[i]
                    j++
                }
            }
        }
        j = 0
        for (i = 0; i < rooms.length; i++) {
            if (guest.value == rooms[i]['Maximum_guests']) {
                new_guest[j] = rooms[i]
                j++
            }

        }
        j = 0
        for (i = 0; i < rooms.length; i++) {
            if ((rooms[i]['fee'] >= From.value) && (rooms[i]['fee'] <= To.value)) {
                new_price[j] = rooms[i]
                j++
            }
        }
        j = 0
        for (i = 0; i < rooms.length; i++) {
            if (Wi_Fi.checked) {
                if (rooms[i]['Wi_Fi'] == 1) {
                    new_xyina[j] = rooms[i];
                    j++
                }
            }
        }
        new_arr = intersect(new_type, new_guest)
        new_arr = intersect(new_arr, new_price)
        new_arr = intersect(new_arr, new_xyina)
        console.log(new_arr)

        let div_room = document.querySelector('.room')

        div_room.removeChild(document.getElementById('RF0'))
        div_room.removeChild(document.getElementById('RF1'))
        for (let i = 0; i < (new_arr.length / 9); i++) {
            let div = document.createElement('div');
            div.className = 'rooms_flex';
            div.id = 'RF' + i
            if (i > 0) {
                div.style.display = 'none'
            } else {
                div.style.display = 'flex'
            }
            div_room.appendChild(div);
        }

        let RF = document.getElementById('RF0')

        for (let j = 0; j < new_arr.length; j++) {

            if (c == 0) {
                let FRLI = document.createElement('div');
                FRLI.className = 'flex_room_left_index';
                FRLI.id = 'FRLI' + j
                RF.appendChild(FRLI)

                text = "<div class='visit'> <a href=''onclick='event.preventDefault();document.getElementById(" + new_arr[j]['id'] + ").submit()' class='visit_a'>Смотреть</a> </div> <div class='flex_room_img'> <div class='flex_room_left'> <img class='flex_room_left_img' src='storage/" + new_arr[j]['photo1'] + "'> <img class='flex_room_left_img_center' src='storage/" + new_arr[j]['photo2'] + "'> <img class='flex_room_left_img' src='storage/" + new_arr[j]['photo3'] + "'> </div> <div class='flex_room_right'> <img class='flex_room_right_img' src='storage/" + new_arr[j]['photo4'] + "' > </div> <p class='flex_room_left_img_p'>" + new_arr[j]['fee'] + "</p> </div>"
                c = 1
            } else if (c == 1) {
                let FRLI = document.createElement('div');
                FRLI.className = 'flex_room_modle';
                FRLI.id = 'FRLI' + j
                RF.appendChild(FRLI)
                text = "<div class='visit'> <a href=''onclick='event.preventDefault();document.getElementById(" + new_arr[j]['id'] + ").submit()' class='visit_a'>Смотреть</a> </div> <div class='flex_room_img'> <div class='flex_room_left'> <img class='flex_room_left_img' src='storage/" + new_arr[j]['photo1'] + "'> <img class='flex_room_left_img_center' src='storage/" + new_arr[j]['photo2'] + "'> <img class='flex_room_left_img' src='storage/" + new_arr[j]['photo3'] + "'> </div> <div class='flex_room_right'> <img class='flex_room_right_img' src='storage/" + new_arr[j]['photo4'] + "' > </div> <p class='flex_room_midle_img_p'>" + new_arr[j]['fee'] + "</p> </div>"

                c = 2
            } else if (c == 2) {
                let FRLI = document.createElement('div');
                FRLI.className = 'flex_room_right_index';
                FRLI.id = 'FRLI' + j
                RF.appendChild(FRLI)
                text = "<div class='visit'> <a href=''onclick='event.preventDefault();document.getElementById(" + new_arr[j]['id'] + ").submit()' class='visit_a'>Смотреть</a> </div> <div class='flex_room_img'> <div class='flex_room_left'> <img class='flex_room_left_img' src='storage/" + new_arr[j]['photo1'] + "'> <img class='flex_room_left_img_center' src='storage/" + new_arr[j]['photo2'] + "'> <img class='flex_room_left_img' src='storage/" + new_arr[j]['photo3'] + "'> </div> <div class='flex_room_right'> <img class='flex_room_right_img' src='storage/" + new_arr[j]['photo4'] + "' > </div> <p class='flex_room_right_img_p'>" + new_arr[j]['fee'] + "</p> </div>"

                c = 0
            }

            let gx = document.getElementById('FRLI' + j)


            gx.innerHTML = text;

            if ((((j % 8) == 0) && j != 0) && j != new_arr.length - 1) {
                RF = document.getElementById('RF' + p)
                p++
            }

        }
    }


    function intersect(a, b) {
        let new_arrr = [];
        for (element_a of a) {
            for (element_b of b) {
                if (element_a == element_b) {
                    new_arrr.push(element_a)
                }
            }
        }
        return new_arrr
    }
</script>
</html>
