<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bag</title>
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
        <a href="" id="currency">
            <div id="current_currency"></div>
            <div id="arrow"></div>
        </a>
        <div id="bag_active">
            <div id="bag_products">4</div>
        </div>
        <a href="" id="hamburger"></a>
    </nav>
</header>
<main>
    <div id="shopping_blur"></div>
    <h1>Всего игрушек: 4</h1>
    <div id="shopping_horizontal_line_up"></div>
    <div id="shopping_items">
        <div class="shopping_piece">
            <a href="" class="shopping_top_panel">
                <div class="cancel"></div>
            </a>
            <img src="{{asset('img/example2.png')}}" class="shopping_picture" alt="example2">
            <div class="shopping_bottom_panel">
                <div class="name">Тест</div>
                <div class="pricing">
                    <span>400</span>
                    <div class="hruvnya"></div>
                </div>
            </div>
        </div>
        <div class="shopping_vertical_line"></div>
        <div class="shopping_piece">
            <a href="" class="shopping_top_panel">
                <div class="cancel"></div>
            </a>
            <img src="{{asset('img/example3.png')}}" class="shopping_picture" alt="example3">
            <div class="shopping_bottom_panel">
                <div class="name">Тест</div>
                <div class="pricing">
                    <span>400</span>
                    <div class="hruvnya"></div>
                </div>
            </div>
        </div>
        <div class="shopping_vertical_line"></div>
        <div class="shopping_piece">
            <a href="" class="shopping_top_panel">
                <div class="cancel"></div>
            </a>
            <img src="{{asset('img/example4.png')}}" class="shopping_picture" alt="example4">
            <div class="shopping_bottom_panel">
                <div class="name">Тест</div>
                <div class="pricing">
                    <span>400</span>
                    <div class="hruvnya"></div>
                </div>
            </div>
        </div>
        <div class="shopping_vertical_line"></div>
        <div class="shopping_piece">
            <a href="" class="shopping_top_panel">
                <div class="cancel"></div>
            </a>
            <img src="{{asset('img/example5.png')}}" class="shopping_picture" alt="example5">
            <div class="shopping_bottom_panel">
                <div class="name">Тест</div>
                <div class="pricing">
                    <span>400</span>
                    <div class="hruvnya"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="shopping_middle_block">
        <div id="shopping_packaging">
            <div id="shopping_choice">
                <p>Упаковка:</p>
                <div id="wrapping">...</div>
            </div>
            <div id="shopping_horizontal_line"></div>
            <p style="border-bottom: 1px solid black">Дополнительно</p>
        </div>
    </div>
    <div id="shopping_horizontal_line_down"></div>
    <h1 style="margin-top: 50px">Стоимость: 1600 ₴</h1>
    <div id="shopping_buttons">
        <a href="{{route('store')}}" id="shopping_catalog_and_buy_buttons">
            <p>K каталогу</p>
        </a>
        <form action="{{route('bag_order')}}" method="POST">
            @csrf
            <input type="submit" id="shopping_catalog_and_buy_buttons" style="background: #EF7674; font-weight: bold" value="Оплатить">
        </form>
    </div>
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
            <div id="translate_icon"></div>
            <div class="text">Русский</div>
            <div id="dn_arrow"></div>
        </a>
    </div>
</footer>
</body>
</html>
