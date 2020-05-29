<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bag</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="{{asset('libs/owlcarousel2/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('libs/owlcarousel2/assets/owl.theme.default.min.css')}}" rel="stylesheet">
    <!-- Vendor scripts -->
    <script src="{{asset('libs/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('libs/owlcarousel2/owl.carousel.min.js')}}"></script>

    <!-- User scripts -->
    <script src="{{asset('js/main.js')}}"></script>
</head>

<body>
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
    <div id="shopping_blur"></div>
    <h1>Всего игрушек: {{$bag_capacity}}</h1>
    <div id="shopping_horizontal_line_up"></div>
    @if($bag)
        <div class="owl-carousel owl-theme">
            @for($i = 0; $i < sizeof($all_products); $i++)
                @if(array_key_exists($all_products[$i]->id, $bag))
                    <div id="shopping_items" style="margin-left: 35px">
                        <div class="shopping_piece"> {{---js-item-campaign---}}
                            <form id="buy_window_delete_{{$i}}" style="display: none;" action="{{route('order_delete', $all_products[$i]->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$all_products[$i]->id}}"/>
                            </form>
                            <form id="buy_window_add_{{$i}}" style="display: none;" action="{{route('order_product', $all_products[$i]->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$all_products[$i]->id}}"/>
                            </form>
                            <a href="javascript:{}" onclick="document.getElementById('buy_window_add_{{$i}}').submit({{$i}}); return false;" class="shopping_add_panel">
                                <div class="add">{{$bag[$all_products[$i]->id]}}x</div>
                            </a>
                            <a href="javascript:{}" onclick="document.getElementById('buy_window_delete_{{$i}}').submit({{$i}}); return false;" class="shopping_top_panel">
                                <div class="cancel"></div>
                            </a>
                            <img src="{{asset('img/toys/'.$all_products[$i]->image_name)}}" class="shopping_picture" alt="buy_pic">
                            <div class="shopping_bottom_panel">
                                <div class="name">{{$all_products[$i]->name}}</div>
                                <div class="pricing">
                                    <span>{{$all_products[$i]->price_uah}}</span>
                                    <div class="hruvnya"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(next($bag))
                        <div class="shopping_vertical_line"></div>
                    @endif
                @endif
            @endfor
        </div>
        @else
            <h1 style="right: 0; margin: 120px auto; padding: 0;">В Вашей корзине нет товаров!</h1>
        @endif
    <div id="shopping_horizontal_line_down"></div>
    <h1 id="shopping-value">Стоимость: {{$sum}} ₴</h1>
    <div id="shopping_buttons">
        <a href="{{route('store')}}" id="shopping_catalog_and_buy_buttons">
            <p>K каталогу</p>
        </a>
        @if($bag_capacity)
            <form action="{{route('bag_order')}}" method="post">
                @csrf
                <input type="submit" id="shopping_catalog_and_buy_buttons" style="background: #EF7674; font-weight: bold; cursor: pointer; outline: none" value="Оплатить">
            </form>
        @else
            <div id="shopping_catalog_and_buy_buttons" style="background: #888;"><p style="cursor:default;">Оплатить</p></div>
        @endif
    </div>
</main>
{{--<div class="shopping-overlay js-overlay-campaign">--}}
{{--    <div class="shopping-popup js-popup-campaign">--}}
{{--        <div class="popup_top_panel">--}}
{{--            <div class="cancel js-close-campaign"></div>--}}
{{--        </div>--}}
{{--        <h1>Название</h1>--}}
{{--        <div class="popup-info">--}}
{{--            <img src="{{asset('img/example2.png')}}" class="popup-picture" alt="example2">--}}
{{--            <div class="popup_vertical_line"></div>--}}
{{--            <div class="popup-info-text">--}}
{{--                <div>--}}
{{--                    <p>Информация о товаре..................</p>--}}
{{--                    <p>asdasdasdasasd</p>--}}
{{--                </div>--}}
{{--                <h2>Цена</h2>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div id="popup_buttons">--}}
{{--            <a href="#" id="buttons">--}}
{{--                <p>Добавить копию</p>--}}
{{--            </a>--}}
{{--            <a href="#" id="buttons" style="background: #EF7674">--}}
{{--                <p style="font-weight: bold">Удалить товар</p>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
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
