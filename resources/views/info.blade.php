<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>1000 Facts</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
</head>

<body id="body_info">
<header id="header">
    <nav id="subsites">
        <a href="{{route('index')}}" id="k_big" style="margin-left: 0;">1000_elephants</a>
{{--        <div class="line"></div>--}}
{{--        <a href="{{route('constructor')}}" class="k_big" >Конструктор</a>--}}
        <a href="{{route('index')}}" id="k_small" style="margin-left: 0;">Главная</a>
        <div class="line"></div>
        <a href="{{route('store')}}" style="margin-right: 0; padding: 0 2px">Каталог</a>
    </nav>
    <p id="logo" class="info_c">О нас</p>
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
<main>
    <span id="up"></span>
    <div id="info_page">
        <img src="{{asset('img/me.png')}}" alt="myself photo" id="info_myself">
        <div id="info_line"></div>
        <span id="info_text">
            Уважаемые посетители, рада приветствовать вас в моём
            укромном уголке рукоделия. Это моё хобби, и я посвящаю
            ему большую часть свободного времени.
            <br><br>
            Мои работы возможно и не отличается идеальными
            стяжками и безупречной точностью, однако каждая сшитая
            мною игрушка сделана с любовью и душой :)
            <br><br>
            Вы можете легко найти меня в инстаграмме и связаться,
            нажав на кнопку справа снизу или найдя меня там же по
            никнейму сайта (большинство контактов представлены в конце сайта).
            <br><br>
            Если у вас возникнут вопросы,
            <a href="https://www.instagram.com/1000_elephants/">обращайтесь</a>,
            с удовольствием вам помогу и проконсультирую.
            <br><br>
            Приятного времяпровождения на моей скромной фабрике!
        </span>
    </div>
    @if(isset($checker) && $checker === false)
        <form method="post" action="{{route('info_sub')}}" target="_self">
            <label id="sign_form">
                @csrf
                <input type="text" name="mail" placeholder="Почта уже зарегистрирована!" required
                       oninvalid="this.setCustomValidity('Пожалуйста, введите Вашу почту :)')"
                       oninput="setCustomValidity('')" class="email_outline"/>
                <input type="submit" name="submit" class="email_outline" value="✔" />
            </label>
        </form>
    @elseif(!isset($checker))
        <form method="post" action="{{route('info_sub')}}" target="_self">
            <label id="sign_form">
                @csrf
                <input type="text" name="mail" placeholder="Подписаться на рассылку" required
                       oninvalid="this.setCustomValidity('Пожалуйста, введите Вашу почту :)')"
                       oninput="setCustomValidity('')"/>
                <input type="submit" name="submit" class="submit" value="✔" />
            </label>
        </form>
    @else
        <div id="sign_success">
            <div id="success_form">Вы успешно подписались на рассылку!</div>
        </div>
    @endif

</main>
<footer class="footer info_f">
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
