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

<body id="body_buy">
<header id="header">
    <nav id="subsites">
        <a href="{{route('index')}}" id="k_big" style="margin-left: 0;">1000_elephants</a>
{{--        <div class="line"></div>--}}
{{--        <a href="" class="k_big" >Конструктор</a>--}}
        <a href="{{route('index')}}" id="k_small" style="margin-left: 0;">Главная</a>
        <div class="line"></div>
        <a href="{{route('info')}}" style="margin-right: 0; padding: 0 2px">О нас</a>
    </nav>
    <p id="logo" class="buy_c">Каталог</p>
    <nav id="buttons">
        <a href="" id="currency">
            <div id="current_currency"></div>
            <div id="arrow"></div>
        </a>
        <a href="{{route('bag')}}" id="bag"></a>
        <a href="" id="hamburger"></a>
    </nav>
</header>
<main id="buy_block">
    <div id="radial"></div>
    <span id="up"></span>
    <div id="catalog">
        @for($i = 0; $i < count($all_types); $i++)
            @if($all_types[$i]->id == $type->id)
                <div class="entry">
                    <img src="{{'data:image/jpeg;base64,'.base64_encode($all_types[$i]->image)}}" class="catalog_icon" alt="icon">
                    <div class="text marked">{{$all_types[$i]->type}}</div>
                </div>
            @else
                <form id="{{$i}}" class="entry_form" action="{{route('store_type_choice')}}" method="POST">
                    @csrf
                    <input type="hidden" name="type_id" value="{{$all_types[$i]->id}}"/>
                </form>
                <a href="javascript:{}" onclick="document.getElementById('{{$i}}').submit({{$i}}); return false;" class="entry">
                    <img src="{{'data:image/jpeg;base64,'.base64_encode($all_types[$i]->image)}}" class="catalog_icon" alt="icon">
                    <div class="text">{{$all_types[$i]->type}}</div>
                </a>
            @endif
            @if($i != count($all_types) - 1)
                <div class="vertical_line"></div>
            @endif
        @endfor
        <div id="vertical_line_small_dpi"></div>
        <a href="" id="down_menu"></a>
    </div>
    <div id="buy_window">
        <div id="elements">
            @for($i = 0; $i < ceil(sizeof($all_products) / 3); $i++)
                @if(!(sizeof($all_products) % 3) || $i != ceil(sizeof($all_products) / 3) - 1)
                    <div class="buy_row">
                        @for($j = $i * 3; $j <= $i * 3 + 2; $j++)
                            <a href="" class="piece">
                                <img src="{{'data:image/jpeg;base64,'.base64_encode($all_products[$j]->image)}}" class="picture" alt="buy_pic">
                                <img src="{{asset('img/buy_icon.png')}}" class="buy_icon" alt="buy_icon">
                                <div class="bottom_panel">
                                    <div class="name">{{$all_products[$j]->name}}</div>
                                    <div class="pricing">
                                        <span>{{$all_products[$j]->price_uah}}</span>
                                        <div class="hruvnya"></div>
                                    </div>
                                </div>
                            </a>
                            @if($j < $i * 3 + 2)
                                <div class="vertical_line"></div>
                            @endif
                        @endfor
                    </div>
                    @if($i < ceil(sizeof($all_products) / 3) - 2 || !(sizeof($all_products) % 3) && $i == ceil(sizeof($all_products) / 3) - 2)
                        <div class="horizontal">
                            @for($j = $i * 3; $j <= $i * 3 + 2; $j++)
                                @if($j == 0)
                                    <div class="horizontal_line" style="margin-right: 40px"></div>
                                @elseif($j == 2)
                                    <div class="horizontal_line" style="margin-left: 40px"></div>
                                @else
                                    <div class="horizontal_line" style="margin: 0 40px"></div>
                                @endif
                            @endfor
                        </div>
                    @elseif($i < ceil(sizeof($all_products) / 3) - 1 && sizeof($all_products) % 3)
                        <div class="horizontal">
                            @for($j = $i * 3; $j <= $i * 3 + 2 - (3 - sizeof($all_products) % 3); $j++)
                                @if($j == 0)
                                    <div class="horizontal_line" style="margin-right: 40px"></div>
                                @elseif($j == 2)
                                    <div class="horizontal_line" style="margin-left: 40px"></div>
                                @else
                                    <div class="horizontal_line" style="margin: 0 40px"></div>
                                @endif
                            @endfor
                        </div>
                    @endif
                @else
                    <div class="buy_row">
                        @for($j = $i * 3; $j <= $i * 3 + 2 - (3 - sizeof($all_products) % 3); $j++)
                            <a href="" class="piece">
                                <img src="{{'data:image/jpeg;base64,'.base64_encode($all_products[$j]->image)}}" class="picture" alt="buy_pic">
                                <img src="{{asset('img/buy_icon.png')}}" class="buy_icon" alt="buy_icon">
                                <div class="bottom_panel">
                                    <div class="name">{{$all_products[$j]->name}}</div>
                                    <div class="pricing">
                                        <span>{{$all_products[$j]->price_uah}}</span>
                                        <div class="hruvnya"></div>
                                    </div>
                                </div>
                            </a>
                            @if($j != $i * 3 + 2 - (3 - sizeof($all_products) % 3))
                                <div class="vertical_line"></div>
                            @endif
                        @endfor
                    </div>
                @endif
            @endfor
        </div>
    </div>
    <div id="buy_window_small_dpi">
        <div id="elements_small_dpi">
            <div id="first_row_small_dpi">
                <a href="" class="piece">
                    <img src="img/nezabudka.png" class="picture" alt="nezabudka">
                    <img src="img/buy_icon.png" class="buy_icon" alt="buy_icon">
                    <div class="bottom_panel">
                        <div class="name">Незабудка</div>
                        <div class="pricing">
                            <span>500</span>
                            <div class="hruvnya"></div>
                        </div>
                    </div>
                </a>
                <div class="vertical_line"></div>
                <a href="" class="piece">
                    <img src="img/example2.png" class="picture" alt="example2">
                    <img src="img/buy_icon.png" class="buy_icon" alt="buy_icon">
                    <div class="bottom_panel">
                        <div class="name">example2</div>
                        <div class="pricing">
                            <span>...</span>
                            <div class="hruvnya"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="horizontal">
                <div class="horizontal_line"></div>
                <div class="horizontal_line"></div>
            </div>
            <div id="second_row_small_dpi">
                <a href="" class="piece">
                    <img src="img/example4.png" class="picture" alt="example4">
                    <img src="img/buy_icon.png" class="buy_icon" alt="buy_icon">
                    <div class="bottom_panel">
                        <div class="name">example4</div>
                        <div class="pricing">
                            <span>...</span>
                            <div class="hruvnya"></div>
                        </div>
                    </div>
                </a>
                <div class="vertical_line"></div>
                <a href="" class="piece">
                    <img src="img/example5.png" class="picture" alt="example5">
                    <img src="img/buy_icon.png" class="buy_icon" alt="buy_icon">
                    <div class="bottom_panel">
                        <div class="name">example5</div>
                        <div class="pricing">
                            <span>...</span>
                            <div class="hruvnya"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="horizontal">
                <div class="horizontal_line"></div>
                <div class="horizontal_line"></div>
            </div>
            <div id="third_row_small_dpi">
                <a href="" class="piece">
                    <img src="img/nezabudka.png" class="picture" alt="nezabudka">
                    <img src="img/buy_icon.png" class="buy_icon" alt="buy_icon">
                    <div class="bottom_panel">
                        <div class="name">example7</div>
                        <div class="pricing">
                            <span>...</span>
                            <div class="hruvnya"></div>
                        </div>
                    </div>
                </a>
                <div class="vertical_line"></div>
                <a href="" class="piece">
                    <img src="img/example2.png" class="picture" alt="example2">
                    <img src="img/buy_icon.png" class="buy_icon" alt="buy_icon">
                    <div class="bottom_panel">
                        <div class="name">example8</div>
                        <div class="pricing">
                            <span>...</span>
                            <div class="hruvnya"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="horizontal">
                <div class="horizontal_line"></div>
                <div class="horizontal_line"></div>
            </div>
            <div id="fourth_row_small_dpi">
                <a href="" class="piece">
                    <img src="img/example3.png" class="picture" alt="example3">
                    <img src="img/buy_icon.png" class="buy_icon" alt="buy_icon">
                    <div class="bottom_panel">
                        <div class="name">example3</div>
                        <div class="pricing">
                            <span>...</span>
                            <div class="hruvnya"></div>
                        </div>
                    </div>
                </a>
                <div class="vertical_line"></div>
                <a href="" class="piece">
                    <img src="img/example6.png" class="picture" alt="example6">
                    <img src="img/buy_icon.png" class="buy_icon" alt="buy_icon">
                    <div class="bottom_panel">
                        <div class="name">example6</div>
                        <div class="pricing">
                            <span>...</span>
                            <div class="hruvnya"></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
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
