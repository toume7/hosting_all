<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/brone.css">
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
        <a href="">Сотрудничество</a>
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
<div hidden>
    {{$commets}}
    {{$users}}
</div>
<body>\
@if($message!=0)
    <div id="message" class="message" style="display: block">
        <div class="backround">
            <a class="krest"><img src="img/Group 85 (2).svg"></a>
            <div class="message_flex">
                <h1>Ошибка</h1>
                <div class="br"></div>
                <p>{{$message}}</p>
            </div>
        </div>
    </div>
@endif
<div class="main">
    <div class="head"></div>
    <p class="main_p">{{$room['name']}}</p>
    <form method="post" action="{{route('brone_room')}}" class="two">
        @csrf
        <input name="id_room" value="{{$room['id']}}" hidden>
        <input name="phone" value="{{$session[0]['phone']}}" hidden>
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

        <div class="second" id="top-block">
            <div class="second_first">
                <div class="cost_and_night">
                    <p class="cost">{{$room['fee']}}P
                    <p class="hight">ночь</p>
                    </p>
                </div>

                <p class="rating"><img src="img/Star 1.svg" alt="" style="
                        width: 1.46vw;
                        height: 1.46vw;
                    ">{{$room['rating']}}</p>
                <p class="coment">{{count($commets)}} Отзывов</p>
            </div>
            <div class="second_second">
                <div class="arrival">
                    <p class="text">Прибытие:</p>
                    <input name="date_arraive" required id="date_arraive" type="date" class="date" min="2023-01-01">
                </div>
                <div class="departure">
                    <p class="text">выезд:</p>
                    <input name="date_departure" required id="date_departure" onclick="departure()" type="date"
                           class="date"
                           min="2023-01-01">
                </div>
            </div>

            <div class="second_third">
                <div hidden>{{$i=1}}</div>
                <p class="second_third_p">для кого:
                    <select name="guest" class="second_third_select">
                        @while($i<=$room['Maximum_guests'])
                            <option name="guest" value="{{$i}}">{{$i}} гость</option>
                <div hidden>{{$i++}}</div>
                @endwhile
                </select>
                </p>
                @if(count($favorit)==1)

                    <a onclick="event.preventDefault();
                                   document.getElementById('favorit').submit();"
                       style=" margin-top: 2.5vw;background: transparent; border: none"><img
                            class="second_third_img" src="img/path154 (1).svg" alt=""></a>

                @else

                    <a onclick="event.preventDefault();
                                   document.getElementById('favorit').submit();"
                       style=" margin-top: 2.5vw;background: transparent; border: none"><img
                            class="second_third_img" src="img/path154.svg" alt=""></a>
                @endif

            </div>

            <div class="second_fourth">
                <button type="submit" class="second_fourth_button">Забронировать</button>
                <p class="second_fourth_p">Пока вы ни за что не платите</p>
            </div>
            <div class="second_fifth">
                <input value="{{$room['fee']}}" id="cost" hidden>
                <p class="second_fifth_sum" id="p"></p>
                <p class="second_fifth_itog" id="count"></p>
            </div>
            <div class="second_fifth">
                <p class="second_fifth_sum" id="p">Залог в размере 30%</p>
                <p class="second_fifth_itog" id="count_zal"></p>
            </div>
            <hr>

            <div class="second_sixth">
                <p class="second_sixth_p"> Всего (без учета налогов)</p>
                <p class="second_sixth_p" id="counts"></p>
                <input value="0" name="count" class="count" hidden>
                <input value="0" name="night" class="night" hidden>

            </div>
        </div>


    </form>
    @if(count($favorit)==1)

        <form id="favorit" method="post" action="{{route('favorites_del')}}">
            @csrf
            <input name="id_user" value="{{$session[0]['id']}}" hidden>
            <input name="id_room" value="{{$room['id']}}" hidden>
        </form>

    @else
        <form hidden id="favorit" method="post" action="{{route('favorites_add')}}">
            @csrf
            <input name="id_user" value="{{$session[0]['id']}}" hidden>
            <input name="id_room" value="{{$room['id']}}" hidden>
        </form>
    @endif
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

            <label for="" class="third_first_description_lable">Интернет и ТВ:
                @if(($room['Television']==1)&&($room['Wi_Fi']==0))
                    <p class="third_first_description_p">Телевидение</p>
                @elseif($room['Television']==0)&&($room['Wi_Fi']==1))
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
    <a href="js/blank-akt-priema-peredachi-nedvizhimosti-dlya-dogovora-najma.doc" style=" font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 0.88vw;
    line-height: 2.29vw;
    color: #424530;
    text-decoration: underline">Типовой акт приема-передачи жилья в найм</a>
    <p class="third_p" style="margin-top: 3vw;">Описание</p>
    <p class="third_p_description">{{$room['description']}}</p>
    <div class="third_div_otziv">
        <p class="third_p">Отзывы</p>
        @if(count($brone)!=0)
            @foreach($brone as $b)
                @foreach($users as $u)
                    @if($b['phone']==$u['phone'])
                        @if($u['id']==$session[0]['id'])

                            <form class="form_otziv" method="post" action="{{route('add_comm')}}">
                                @csrf
                                @foreach($brone as $bron)

                                    @foreach($users as $user)
                                        @if($bron['phone']==$user['phone'])

                                            <input name="id_room" value="{{$room['id']}}" hidden>
                                            <input name="id_user" value="{{$session[0]['id']}}" hidden>

                                        @endif
                                    @endforeach
                                @endforeach
                                <p>Оставьте свой отзыв</p>
                                <input name="rating" id="rating_comm" value="0" type="text" hidden>
                                <input name="date" id="date_comm" value="0" type="text" hidden>
                                <div class="form_star_main">
                                    <div class="form_star" id="1"><img id="igm1"
                                                                       style="display:block "
                                                                       src="img/Star 3 (1).svg"> <img id="im1"
                                                                                                      style="display:none "
                                                                                                      src="img/Star 4.svg">
                                    </div>
                                    <div class="form_star" id="2"><img id="igm2"
                                                                       style="display:block "
                                                                       src="img/Star 3 (1).svg"> <img id="im2"
                                                                                                      style="display: none"
                                                                                                      src="img/Star 4.svg">
                                    </div>
                                    <div class="form_star" id="3"><img id="igm3"
                                                                       style="display: block"
                                                                       src="img/Star 3 (1).svg"> <img id="im3"
                                                                                                      style="display: none"
                                                                                                      src="img/Star 4.svg">
                                    </div>
                                    <div class="form_star" id="4"><img id="igm4"
                                                                       style="display: block"
                                                                       src="img/Star 3 (1).svg"> <img id="im4"
                                                                                                      style="display: none"
                                                                                                      src="img/Star 4.svg">
                                    </div>
                                    <div class="form_star" id="5"><img id="igm5"
                                                                       style="display: block"
                                                                       src="img/Star 3 (1).svg"> <img id="im5"
                                                                                                      style="display: none"
                                                                                                      src="img/Star 4.svg">
                                    </div>
                                </div>
                                <textarea name="text" required class="form_textArea"></textarea>
                                <button class="form_button">Отправить</button>
                            </form>
                        @endif
                    @endif
                @endforeach
            @endforeach
        @endif

    </div>


</div>

<div class="slider_count" id="pp" style="    height: 51.604vw;">
    @for($i=0;$i<count($commets)/2;$i++)
        @if($i!=0)
            <div class="number" style="border: none" id="number{{$i+=1}}" data-last-value="{{$i}}"
                 data-progress="number{{$i}}"><p>{{$i}}</p>
            </div>
            <div hidden> {{ $i--}}</div>
        @else
            <div class="number"
                 style="border-bottom: 0.208vw solid rgb(30, 30, 30);" id="number{{$i+=1}}"
                 data-last-value="{{$i}}" data-progress="number{{$i}}">
                <p>{{$i}}</p></div>
            <div hidden> {{ $i--}}</div>
        @endif

    @endfor

</div>
<footer>
    <div class="footer_up">
        <a href="{{route('welc')}}">Главная</a>
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
    <div hidden>{{$users}}</div>
</footer>
</body>

<script>
    let now = new Date();

    document.getElementById('date_arraive').min = now.toISOString().split('T')[0];

    function departure() {
        let Arrival = document.getElementById('date_arraive').value
        document.getElementById('date_departure').min = Arrival
        date_departure.oninput = function () {
            let departure = document.getElementById('date_departure').value
            let Arrival = document.getElementById('date_arraive').value
            let timeDiff = Date.parse(departure) - Date.parse(Arrival)
            let diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24))


            let cost = document.getElementById('cost').value
            let tags = document.getElementById('p')[0]
            document.getElementById('p').innerHTML = cost + 'x ' + diffDays + ' ночей'
            count.innerHTML = cost * diffDays + 'P'
            counts.innerHTML = cost * diffDays + 'P'
            count_zal.innerHTML = ((cost * diffDays) / 100) * 30 + 'P'
            document.querySelector('.count').value = cost * diffDays
            document.querySelector('.night').value = diffDays
        }
    }

    // function Subtraction() {
    //     let departure = document.getElementById('date_departure').value
    //     let Arrival = document.getElementById('date_arraive').value
    //     let timeDiff = Date.parse(departure) - Date.parse(Arrival)
    //     let diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24))
    //
    //
    //     let cost = document.getElementById('cost').value
    //     let tags = document.getElementById('p')[0]
    //     document.getElementById('p').innerHTML = cost + 'x ' + diffDays + ' ночей'
    //     count.innerHTML = cost * diffDays + 'P'
    //     counts.innerHTML = cost * diffDays + 'P'
    //     document.querySelector('.count').value = cost * diffDays
    //     document.querySelector('.night').value = diffDays
    // }
</script>
<script src="js/slider.js"></script>
<script>
    let p = 1
    let index = 0
    let comment = <?= $commets ?>;
    let user = <?= $users ?>;
    let text = ''
    let third = document.querySelector('.third')
    let slider = document.querySelector('.slider_count')
    for (let i = 0; i < (comment.length / 2); i++) {
        let div = document.createElement('div');
        div.className = 'third_div_coment';
        div.id = 'TDC' + i
        if (i > 0) {
            div.style.display = 'none'
        } else {
            div.style.display = 'block'
        }
        third.appendChild(div);
        document.getElementById('pp').style.height = ''
    }

    let TDC = document.getElementById('TDC0')

    for (let j = 0; j < comment.length; j++) {
        let TTC = document.createElement('div');
        TTC.className = 'third_type_comment';
        TTC.id = 'TTC' + j
        TDC.appendChild(TTC)
        let gx = document.getElementById('TTC' + j)
        for (let us = 0; us < user.length; us++) {
            if (user[us]['id'] == comment[j]['id_user']) {
                text = "<div class='third_type_comment_left'><img class='third_type_comment_left_img' src='storage/" + user[us]['photo'] + "'> <p class='third_type_comment_left_p'>" + comment[j]['rating'] + "<img src='img/Star 1.svg' ></p> </div> <div class='third_type_comment_right'><div class='third_type_comment_right_up'><p class='third_type_comment_right_up_name'>" + user[us]['name'] + " </p><p class='third_type_comment_right_up_date'>" + comment[j]['date'] + " </p></div><div class='third_type_comment_right_down'>" + comment[j]['text'] + " </div></div>"
                break
            }
        }

        gx.innerHTML = text;

        if ((((j % 2) != 0) && j != 0) && j != comment.length - 1) {
            TDC = document.getElementById('TDC' + p)
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
            let div = document.getElementById('TDC' + (number - 1))
            div.style.display = 'block'
            let numb = document.getElementById(progress)
            if (numb.style.border === 'none') {
                numb.style.borderBottom = "0.208vw solid #1E1E1E";
                for (let i = 1; i <= count_numb; i++) {
                    if (i == number) {

                    } else {
                        document.getElementById('number' + i).style.border = 'none'
                        document.getElementById('TDC' + (i - 1)).style.display = 'none'
                    }


                }
            }
        });
    });
</script>
<script>
    let j = 1
    $(document).ready(function () {
        $('.form_star').on('click', function () {
            let number = $(this).attr('id');

            document.getElementById('rating_comm').value = number
            for (let i = 1; i <= number; i++) {
                document.getElementById('igm' + i).style.display = 'none'
                document.getElementById('im' + i).style.display = 'block'
            }
            let Data = new Date();
            let Month = Data.getMonth();
            let Day = Data.getDate()
            switch (Month) {
                case 0:
                    fMonth = "января";
                    break;
                case 1:
                    fMonth = "февраля";
                    break;
                case 2:
                    fMonth = "марта";
                    break;
                case 3:
                    fMonth = "апреля";
                    break;
                case 4:
                    fMonth = "мая";
                    break;
                case 5:
                    fMonth = "июня";
                    break;
                case 6:
                    fMonth = "июля";
                    break;
                case 7:
                    fMonth = "августа";
                    break;
                case 8:
                    fMonth = "сентября";
                    break;
                case 9:
                    fMonth = "октября";
                    break;
                case 10:
                    fMonth = "ноября";
                    break;
                case 11:
                    fMonth = "декабря";
                    break;
            }
            document.getElementById('date_comm').value = Day + ' ' + fMonth
        });
    });
</script>
<script>
    setTimeout(function () {
        document.getElementById('message').style.display = 'none';
    }, 3000);
</script>
</html>






