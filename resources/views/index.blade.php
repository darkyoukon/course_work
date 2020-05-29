<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>1000_elephants</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
</head>

<body>
@if (session()->has('success'))
    <div id="complete_message">{{session('success')}}</div>
@endif
<header id="header">
    <nav id="subsites">
        <a href="#ordering_block" id="k_big" style="margin-left: 0;">Каталог & Конструктор</a>
        <a href="#ordering_block" id="k_small" style="margin-left: 0;">К&К</a>
        <div class="line"></div>
        <a href="{{route('info')}}" style="margin-right: 0;">О нас</a>
    </nav>
    <p id="logo">1000_elephants</p>
    <nav id="buttons">
{{--        <a href="" id="currency">--}}
{{--            <div id="current_currency"></div>--}}
{{--            <div id="arrow"></div>--}}
{{--        </a>--}}
        @if(!$bag_capacity)
            <a href="{{route('bag')}}" id="bag"></a>
        @else
            <a href="{{route('bag')}}" id="bag">
                <div id="bag_products">{{$bag_capacity}}</div>
            </a>
        @endif
{{--        <a href="" id="hamburger"></a>--}}
    </nav>
</header>
<main id="main_block">
    <div id="middle">
        <div id="order_block">
            <div id="ordering">
                <H3 style="text-align: center; ">Радуйте себя и своих близких чаще!</H3>
                <p>• все слоны (и не только) ручной работы!</p>
                <p>• бесплатная доставка по Украине на заказы от трёх
                    товаров</p>
                <p style="margin-bottom: 0">• шьём Ваши заказы с любовью <3</p>
                <a href="#ordering_block" id="button">Заказать сейчас!</a>
            </div>
            <div id="quote"><p>“Ручные слоны. Дарят радость. Лечат душу.” <br>
                    @1000_elephants</p></div>
        </div>
        <div id="insta_photos">
            <div id="photos_block">
                <a href="#your_happiness" id="photos">
                    <div id="first_photo">
                        <div id="press">Нажмите, чтобы просмотреть</div>
                        <img src="{{asset('img/first_photo.png')}}" id="photo" alt="first_photo :)">
                    </div>
                    <div id="second_photo"></div>
                    <div id="third_photo"></div>
                </a>
            </div>
        </div>
        <a href="" id="coupon">минус<br>10%</a>
    </div>
    <div id="gradient"></div>
    <a href="#second_block" id="down_button"></a>
</main>
<div id="second_block">
    <H1 id="your_desire">Хендмейд игрушки на Ваш вкус!</H1>
    <div id="desire_line"></div>
    <div id="toys">
        <div id="left_toy">
            <img id="left_toy_image" src="{{asset('img/left_toy.png')}}" alt="left_toy">
            <div id="grad_left"></div>
        </div>
        <img id="middle_toy" src="{{asset('img/middle_toy.png')}}" alt="middle_toy">
        <div id="right_toy">
            <img id="right_toy_image" src="{{asset('img/right_toy.png')}}" alt="right_toy">
            <div id="grad_right"></div>
        </div>
    </div>
    <H1 id="your_happiness">Дарите своим близким радость :)</H1>
    <div id="instagram_blocks">
        <div id="first_instagram_block">
            <div class="upper">
                <div class="profile_photo"></div>
                <p class="profile_nickname">1000_elephants</p>
            </div>
            <img class="photos" src="{{asset('img/first_photo.png')}}" alt="first_ig_photo">
            <p class="profile_text" style="font-weight: bold; margin-bottom: 0">1000_elephants</p>
            <p class="profile_text" style="margin-top: 0">Все слонятки мои любимые. Потому что я пришла сюда любить.</p>
            <div class="horizontal_line"></div>
            <div class="bottom">
                <div class="left_border">14 заметок</div>
                <div class="right_border">
                    <div class="share"></div>
                    <div class="reshare"></div>
                    <div class="like"></div>
                </div>
            </div>
        </div>
        <div class="vertical_line"></div>
        <div id="second_instagram_block">
            <div class="upper">
                <div class="profile_photo"></div>
                <p class="profile_nickname">1000_elephants</p>
            </div>
            <img class="photos" src="{{asset('img/second_photo.png')}}" alt="second_ig_photo">
            <p class="profile_text" style="font-weight: bold; margin-bottom: 0">1000_elephants</p>
            <p class="profile_text" style="margin-top: 0">Новая команда слоняш. Когда мне бывает грустно, когда одолевает беспокойство или когда я чувствую недостаток сил, меня исцеляет моя религия - моё рукотворчество.</p>
            <div class="horizontal_line"></div>
            <div class="bottom">
                <div class="left_border">42 заметок</div>
                <div class="right_border">
                    <div class="share"></div>
                    <div class="reshare"></div>
                    <div class="like"></div>
                </div>
            </div>
        </div>
        <div class="vertical_line"></div>
        <div id="third_instagram_block">
            <div class="upper">
                <div class="profile_photo"></div>
                <p class="profile_nickname">1000_elephants</p>
            </div>
            <img class="photos" src="{{asset('img/fourth_photo.png')}}" alt="fourth_ig_photo">
            <p class="profile_text" style="font-weight: bold; margin-bottom: 0">1000_elephants</p>
            <p class="profile_text" style="margin-top: 0">Моя давно забытая серия психоделических игрушек «Чудовище по имени Чудо».
                Где-то глубоко в каждом из нас живут монстрики, которые иногда нами управляют. Этот - любит, когда бабочки в животе.... А еще у него то ли одна подтяжка порвалась, то ли это хвост... доподлинно неизвестно. И, да, у него не то, чтобы глаза нет, просто он закрыт на некоторые вещи.... В общем, если хотите бабочек в животе - милости просим.
                сварим вам фарфалле по крайней мере)))
                Такие вот чудеса) забытые, но работают исправно.

                #1000_elephants
            </p>
            <div class="horizontal_line"></div>
            <div class="bottom">
                <div class="left_border">21 заметка</div>
                <div class="right_border">
                    <div class="share"></div>
                    <div class="reshare"></div>
                    <div class="like"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="ordering_block">
    <div id="ordering_window">
        <a href="{{route('store')}}" id="available">
            <div id="available_image"></div>
            <div id="available_order">В наличии</div>
        </a>
        <div id="kit">
            <div id="kit_image"></div>
            <div id="kit_order">Конструктор<br><span id="beta">(Work in progress)</span></div>
        </div>
    </div>
</div>
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
    <a href="#main_block" id="middle_block" style="display: block"></a>
    <div id="right_block">
        <a href="" id="translate">
{{--            <div id="translate_icon"></div>--}}
{{--            <div class="text">Русский</div>--}}
{{--            <div id="dn_arrow"></div>--}}
        </a>
    </div>
</footer>
<a id="instagram" href="https://www.instagram.com/1000_elephants/"></a>
</body>
