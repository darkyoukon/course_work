<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>1000 Store</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
</head>

<body id="body_order">
<header id="header">
    <nav id="subsites">
        <a href="{{route('index')}}" id="k_big" style="margin-left: 0;">1000_elephants</a>
        {{--        <div class="line"></div>--}}
        {{--        <a href="" class="k_big" >Конструктор</a>--}}
        <a href="{{route('index')}}" id="k_small" style="margin-left: 0;">Главная</a>
        <div class="line"></div>
        <a href="{{route('info')}}" style="margin-right: 0; padding: 0 2px">О нас</a>
    </nav>
    <p id="logo" class="buy_c">Корзина</p>
    <nav id="buttons">
{{--        <a href="" id="currency">--}}
{{--            <div id="current_currency"></div>--}}
{{--            <div id="arrow"></div>--}}
{{--        </a>--}}
        <div id="bag_active">
            <div id="bag_products">{{$bag_capacity}}</div>
        </div>
{{--        <a href="" id="hamburger"></a>--}}
    </nav>
</header>
<main>
    <div id="order_blur"></div>
    <span id="order_up"></span>
    <h1>Выберите способ получения:</h1>
    <div id="order_top_block">
        <a href="{{route('bag')}}" id="order_back_button">
            <div id="left_arrow"></div>
            <div class="vertical_line"></div>
            <div class="text">Назад</div>
        </a>
{{--        <div id="order_catalog">--}}
{{--            <a href="" id="new">--}}
{{--                <div id="new_icon"></div>--}}
{{--                <div class="text">Почта+доставка</div>--}}
{{--                <div class="text_small_dpi">Почта</div>--}}
{{--                <div class="vertical_line_small_dpi"></div>--}}
{{--                <div id="down_menu"></div>--}}
{{--            </a>--}}
{{--            <div class="vertical_line"></div>--}}
{{--            <a href="" id="mail">--}}
{{--                <div id="mail_icon"></div>--}}
{{--                <div class="text">Почта</div>--}}
{{--            </a>--}}
{{--            <div class="vertical_line"></div>--}}
{{--            <a href="" id="personally">--}}
{{--                <div id="personally_icon"></div>--}}
{{--                <div class="text">Лично</div>--}}
{{--            </a>--}}
{{--        </div>--}}
        <div id="catalog" style="margin: 0 15px">
            @for($i = 0; $i < count($all_order_types); $i++)
                @if($all_order_types[$i]->id == $cur->id)
                    <div style="cursor: default" class="entry">
                        <img src="{{asset('img/order_types/'.$all_order_types[$i]->image_name)}}" class="catalog_icon" alt="icon">
                        <div class="text marked">{{$all_order_types[$i]->name}}</div>
                    </div>
                @else
                    <form id="catalog_{{$i}}" class="entry_form" action="{{route('bag_order')}}" method="POST">
                        @csrf
                        <input type="hidden" name="type_id" value="{{$all_order_types[$i]->id}}"/>
                    </form>
                    <a href="javascript:{}" onclick="document.getElementById('catalog_{{$i}}').submit({{$i}}); return false;" class="entry">
                        <img src="{{asset('img/order_types/'.$all_order_types[$i]->image_name)}}" class="catalog_icon" alt="icon">
                        <div class="text">{{$all_order_types[$i]->name}}</div>
                    </a>
                @endif
                @if($i != count($all_order_types) - 1)
                    <div class="vertical_line"></div>
                @endif
            @endfor
            <div id="vertical_line_small_dpi"></div>
        </div>
        <a href="javascript:{}" onclick="document.getElementById('order_window').submit(); return false;" id="order_card_button" type="submit">
        {{--form="order_window" type="submit">--}}
            <div id="card_icon"></div>
            <div class="text">{{$sum}}</div>
            <div class="vertical_line"></div>
            <div id="down_arrow"></div>
        </a>
    </div>
    <form id="order_window" method="post" action="{{route('order_complete', $cur->id)}}">
        <h1 style="padding: 0">Куда мы должны отправить Ваш заказ?</h1>
        @csrf
        <input type="hidden" name="product_id" value="{{$sum}}"/>
        <fieldset>
            <legend>ФИО:</legend>
            <label for="lname"></label>
            <input id="lname" name="lname" required placeholder="Фамилия" style="padding-left: 20px">
            <label for="fname"></label>
            <input id="fname" name="fname" required placeholder="Имя" style="padding-left: 20px">
        </fieldset>
        <fieldset>
            <legend>Адресс:</legend>
            <label for="country"></label>
            <input id="country" name="country" required placeholder="Страна" style="padding-left: 20px">
            <label for="region"></label>
            <input id="region" name="region" required placeholder="Область" style="padding-left: 20px">
            <label for="city"></label>
            <input id="city" name="city" required placeholder="Город" style="padding-left: 20px">
            <label for="street"></label>
            <input id="street" name="street" required placeholder="Улица" style="padding-left: 20px">
            <label for="home"></label>
            <input id="home" name="home" required placeholder="Дом" style="padding-left: 20px">
            <label for="index"></label>
            <input id="index" name="index" required placeholder="Почтовый индекс" style="padding-left: 20px">
        </fieldset>
        <fieldset>
            <legend>Контакты:</legend>
            <label for="email"></label>
            <input id="email" name="email" required placeholder="Почта" style="padding-left: 20px">
            <label for="mobile_phone"></label>
            <input id="mobile_phone" name="mobile_phone" required placeholder="Телефон" style="padding-left: 20px">
        </fieldset>
    </form>
    <a href="javascript:{}" onclick="document.getElementById('order_window').submit(); return false;" id="order_card_button_small_dpi" type="submit">
        <div id="card_icon_small_dpi"></div>
        <div class="text">{{$sum}} ₴</div>
        <div class="vertical_line"></div>
        <div id="down_arrow_small_dpi"></div>
    </a>
</main>
<footer class="footer">
    <div id="left_block">
        <a href="" id="mobile">Связаться</a>
        <a href="https://www.instagram.com/1000_elephants/" id="ig_icon"></a>
        <a href="" id="tg_icon"></a>
        <a href="https://www.facebook.com/lubava.kalinina" id="fb_icon"></a>
        <a href="" id="gm_icon"></a>
        <!--ADD COPYING-->
        <a href="" id="phone_icon"></a>
        <span id="phone">+38 067-524-28-71</span>
    </div>
    <a href="#up" id="middle_block"></a>
    <div id="right_block">
        <a href="" id="translate">
{{--            <div id="translate_icon"></div>--}}
{{--            <div class="text">Русский</div>--}}
{{--            <div id="dn_arrow"></div>--}}
        </a>
    </div>
</footer>
</body>
</html>
