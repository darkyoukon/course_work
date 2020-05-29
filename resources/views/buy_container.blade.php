<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>1000 Store</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{asset('js/buy_order_improvements.js')}}"></script>
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
    </nav>
</header>
<main id="buy_block">
    <div id="radial"></div>
    <span id="up"></span>
    <div id="catalog">
        @for($i = 0; $i < count($all_types); $i++)
            @if($all_types[$i]->id == $type->id)
                <div style="cursor: default" class="entry">
                    <img src="{{asset('img/types/'.$all_types[$i]->image_name)}}" class="catalog_icon" alt="icon">
                    <div class="text marked">{{$all_types[$i]->type}}</div>
                </div>
            @else
                <form id="catalog_{{$i}}" class="entry_form" action="{{route('store_type_choice')}}" method="POST">
                    @csrf
                    <input type="hidden" name="type_id" value="{{$all_types[$i]->id}}"/>
                </form>
                <a href="javascript:{}" onclick="document.getElementById('catalog_{{$i}}').submit({{$i}}); return false;" class="entry">
                    <img src="{{asset('img/types/'.$all_types[$i]->image_name)}}" class="catalog_icon" alt="icon">
                    <div class="text">{{$all_types[$i]->type}}</div>
                </a>
            @endif
            @if($i != count($all_types) - 1)
                <div class="vertical_line"></div>
            @endif
        @endfor
        <div id="vertical_line_small_dpi"></div>
    </div>
    <a onclick="dropdown()" id="catalog_small_dpi">
        @for($i = 0; $i < count($all_types); $i++)
            @if($all_types[$i]->id == $type->id)
                <div class="entry">
                    <img src="{{asset('img/types/'.$all_types[$i]->image_name)}}" class="catalog_icon" alt="icon">
                    <div class="text marked">{{$all_types[$i]->type}}</div>
                </div>
                <div class="vertical_line"></div>
            @endif
        @endfor
        <div id="catalog_variants"></div>
    </a>
    <div id="catalog_small_dpi_dropdown">
        @for($i = 0; $i < count($all_types); $i++)
            @if($all_types[$i]->id != $type->id)
                <form id="catalog_small_dpi_{{$i}}" style="display: none;" action="{{route('store_type_choice')}}" method="POST">
                    @csrf
                    <input type="hidden" name="type_id" value="{{$all_types[$i]->id}}"/>
                </form>

                <a href="javascript:{}" onclick="document.getElementById('catalog_small_dpi_{{$i}}').submit({{$i}}); return false;" class="entry">
                    <img src="{{asset('img/types/'.$all_types[$i]->image_name)}}" class="catalog_icon" alt="icon">
                    <div class="text">{{$all_types[$i]->type}}</div>
                </a>
            @endif
        @endfor
    </div>

    <div id="buy_window">
        <div id="elements">
            @for($i = 0; $i < ceil(sizeof($all_products) / 3); $i++)
                @if(!(sizeof($all_products) % 3) || $i != ceil(sizeof($all_products) / 3) - 1)
                    <div class="buy_row">
                        @for($j = $i * 3; $j <= $i * 3 + 2; $j++)
                            @if(array_key_exists($all_products[$j]->id, $bag))
                                <div class="piece_bag">
                                    <form id="buy_window_delete_{{$j}}" style="display: none;" action="{{route('bag_delete', $all_products[$j]->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$all_products[$j]->id}}"/>
                                    </form>
                                    <form id="buy_window_add_{{$j}}" style="display: none;" action="{{route('bag_product', $all_products[$j]->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$all_products[$j]->id}}"/>
                                    </form>
                                    <a href="javascript:{}" onclick="document.getElementById('buy_window_add_{{$j}}').submit({{$j}}); return false;" class="shopping_add_panel">
                                        <div class="add">{{$bag[$all_products[$j]->id]}}x</div>
                                    </a>
                                    <a href="javascript:{}" onclick="document.getElementById('buy_window_delete_{{$j}}').submit({{$j}}); return false;" class="shopping_top_panel">
                                        <div class="cancel"></div>
                                    </a>
                                    <div class="picture_green"></div>
                                        <img src="{{asset('img/toys/'.$all_products[$j]->image_name)}}" class="picture" alt="buy_pic">
                                    <div class="bottom_panel">
                                        <div class="name">{{$all_products[$j]->name}}</div>
                                        <div class="pricing">
                                            <span>{{$all_products[$j]->price_uah}}</span>
                                            <div class="hruvnya"></div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <form id="buy_window_add_{{$j}}" style="display: none;" action="{{route('bag_product', $all_products[$j]->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$all_products[$j]->id}}"/>
                                </form>

                                <a href="javascript:{}" onclick="document.getElementById('buy_window_add_{{$j}}').submit({{$j}}); return false;" class="piece">
                                    <img src="{{asset('img/toys/'.$all_products[$j]->image_name)}}" class="picture" alt="buy_pic">
                                    <img src="{{asset('img/buy_icon.png')}}" class="buy_icon" alt="buy_icon">
                                    <div class="bottom_panel">
                                        <div class="name">{{$all_products[$j]->name}}</div>
                                        <div class="pricing">
                                            <span>{{$all_products[$j]->price_uah}}</span>
                                            <div class="hruvnya"></div>
                                        </div>
                                    </div>
                                </a>
                            @endif
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
                            @if(array_key_exists($all_products[$j]->id, $bag))
                                <div class="piece_bag">
                                    <form id="buy_window_delete_{{$j}}" style="display: none;" action="{{route('bag_delete', $all_products[$j]->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$all_products[$j]->id}}"/>
                                    </form>
                                    <form id="buy_window_add_{{$j}}" style="display: none;" action="{{route('bag_product', $all_products[$j]->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$all_products[$j]->id}}"/>
                                    </form>
                                    <a href="javascript:{}" onclick="document.getElementById('buy_window_add_{{$j}}').submit({{$j}}); return false;" class="shopping_add_panel">
                                        <div class="add">{{$bag[$all_products[$j]->id]}}x</div>
                                    </a>

                                    <a href="javascript:{}" onclick="document.getElementById('buy_window_delete_{{$j}}').submit({{$j}}); return false;" class="shopping_top_panel">
                                        <div class="cancel"></div>
                                    </a>
                                    <div class="picture_green"></div>
                                    <img src="{{asset('img/toys/'.$all_products[$j]->image_name)}}" class="picture" alt="buy_pic">
                                    <div class="bottom_panel">
                                        <div class="name">{{$all_products[$j]->name}}</div>
                                        <div class="pricing">
                                            <span>{{$all_products[$j]->price_uah}}</span>
                                            <div class="hruvnya"></div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <form id="buy_window_{{$j}}" style="display: none;" action="{{route('bag_product', $all_products[$j]->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$all_products[$j]->id}}"/>
                                </form>

                                <a href="javascript:{}" onclick="document.getElementById('buy_window_{{$j}}').submit({{$j}}); return false;" class="piece">
                                    <img src="{{asset('img/toys/'.$all_products[$j]->image_name)}}" class="picture" alt="buy_pic">
                                    <img src="{{asset('img/buy_icon.png')}}" class="buy_icon" alt="buy_icon">
                                    <div class="bottom_panel">
                                        <div class="name">{{$all_products[$j]->name}}</div>
                                        <div class="pricing">
                                            <span>{{$all_products[$j]->price_uah}}</span>
                                            <div class="hruvnya"></div>
                                        </div>
                                    </div>
                                </a>
                            @endif
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
            @for($i = 0; $i < ceil(sizeof($all_products) / 2); $i++)
                @if(!(sizeof($all_products) % 2) || $i != ceil(sizeof($all_products) / 2) - 1)
                    <div class="buy_row_small_dpi">
                        @for($j = $i * 2; $j <= $i * 2 + 1; $j++)
                            @if(array_key_exists($all_products[$j]->id, $bag))
                                <div class="piece_bag">
                                    <form id="buy_window_small_dpi_delete_{{$j}}" style="display: none;" action="{{route('bag_delete', $all_products[$j]->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$all_products[$j]->id}}"/>
                                    </form>
                                    <form id="buy_window_small_dpi_add_{{$j}}" style="display: none;" action="{{route('bag_product', $all_products[$j]->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$all_products[$j]->id}}"/>
                                    </form>
                                    <a href="javascript:{}" onclick="document.getElementById('buy_window_small_dpi_add_{{$j}}').submit({{$j}}); return false;" class="shopping_add_panel">
                                        <div class="add">{{$bag[$all_products[$j]->id]}}x</div>
                                    </a>

                                    <a href="javascript:{}" onclick="document.getElementById('buy_window_small_dpi_delete_{{$j}}').submit({{$j}}); return false;" class="shopping_top_panel">
                                        <div class="cancel"></div>
                                    </a>
                                    <div class="picture_green"></div>
                                    <img src="{{asset('img/toys/'.$all_products[$j]->image_name)}}" class="picture" alt="buy_pic">
                                    <div class="bottom_panel">
                                        <div class="name">{{$all_products[$j]->name}}</div>
                                        <div class="pricing">
                                            <span>{{$all_products[$j]->price_uah}}</span>
                                            <div class="hruvnya"></div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <form id="buy_window_small_dpi_{{$j}}" style="display: none;" action="{{route('bag_product', $all_products[$j]->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$all_products[$j]->id}}"/>
                                </form>

                                <a href="javascript:{}" onclick="document.getElementById('buy_window_small_dpi_{{$j}}').submit({{$j}}); return false;" class="piece">
                                    <img src="{{asset('img/toys/'.$all_products[$j]->image_name)}}" class="picture" alt="buy_pic">
                                    <img src="{{asset('img/buy_icon.png')}}" class="buy_icon" alt="buy_icon">
                                    <div class="bottom_panel">
                                        <div class="name">{{$all_products[$j]->name}}</div>
                                        <div class="pricing">
                                            <span>{{$all_products[$j]->price_uah}}</span>
                                            <div class="hruvnya"></div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                            @if($j < $i * 2 + 1)
                                <div class="vertical_line"></div>
                            @endif
                        @endfor
                    </div>
                    @if($i < ceil(sizeof($all_products) / 2) - 2 || !(sizeof($all_products) % 2) && $i == ceil(sizeof($all_products) / 2) - 2)
                        <div class="horizontal">
                            <div class="horizontal_line" style="margin-right: 40px"></div>
                            <div class="horizontal_line" style="margin-left: 40px"></div>
                        </div>
                    @elseif($i < ceil(sizeof($all_products) / 2) - 1 && sizeof($all_products) % 2)
                        <div class="horizontal">
                            <div class="horizontal_line" style="margin: auto"></div>
                        </div>
                    @endif
                @else
                    <div class="buy_row_small_dpi">
                        @for($j = $i * 2; $j <= $i * 2; $j++)
                            @if(array_key_exists($all_products[$j]->id, $bag))
                                <div class="piece_bag">
                                    <form id="buy_window_small_dpi_delete_{{$j}}" style="display: none;" action="{{route('bag_delete', $all_products[$j]->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$all_products[$j]->id}}"/>
                                    </form>
                                    <form id="buy_window_small_dpi_add_{{$j}}" style="display: none;" action="{{route('bag_product', $all_products[$j]->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$all_products[$j]->id}}"/>
                                    </form>
                                    <a href="javascript:{}" onclick="document.getElementById('buy_window_small_dpi_add_{{$j}}').submit({{$j}}); return false;" class="shopping_add_panel">
                                        <div class="add">{{$bag[$all_products[$j]->id]}}x</div>
                                    </a>

                                    <a href="javascript:{}" onclick="document.getElementById('buy_window_small_dpi_delete_{{$j}}').submit({{$j}}); return false;" class="shopping_top_panel">
                                        <div class="cancel"></div>
                                    </a>
                                    <div class="picture_green"></div>
                                    <img src="{{asset('img/toys/'.$all_products[$j]->image_name)}}" class="picture" alt="buy_pic">
                                    <div class="bottom_panel">
                                        <div class="name">{{$all_products[$j]->name}}</div>
                                        <div class="pricing">
                                            <span>{{$all_products[$j]->price_uah}}</span>
                                            <div class="hruvnya"></div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <form id="buy_window_small_dpi_{{$j}}" style="display: none;" action="{{route('bag_product', $type->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$all_products[$j]->id}}"/>
                                </form>

                                <a href="javascript:{}" onclick="document.getElementById('buy_window_small_dpi_{{$j}}').submit({{$j}}); return false;" class="piece">
                                    <img src="{{asset('img/toys/'.$all_products[$j]->image_name)}}" class="picture" alt="buy_pic">
                                    <img src="{{asset('img/buy_icon.png')}}" class="buy_icon" alt="buy_icon">
                                    <div class="bottom_panel">
                                        <div class="name">{{$all_products[$j]->name}}</div>
                                        <div class="pricing">
                                            <span>{{$all_products[$j]->price_uah}}</span>
                                            <div class="hruvnya"></div>
                                        </div>
                                    </div>
                                </a>
                            @endif
                        @endfor
                    </div>
                @endif
            @endfor
        </div>
    </div>
    <div id="buy_window_single_row">
        <div id="elements_single_row">
            @for($i = 0; $i < sizeof($all_products); $i++)
                    <div class="buy_row_small_dpi">
                        @if(array_key_exists($all_products[$i]->id, $bag))
                            <div class="piece_bag">
                                <form id="buy_window_single_row_delete_{{$i}}" style="display: none;" action="{{route('bag_delete', $all_products[$i]->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$all_products[$i]->id}}"/>
                                </form>
                                <form id="buy_window_single_row_add_{{$i}}" style="display: none;" action="{{route('bag_product', $all_products[$i]->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$all_products[$i]->id}}"/>
                                </form>
                                <a href="javascript:{}" onclick="document.getElementById('buy_window_single_row_add_{{$i}}').submit({{$i}}); return false;" class="shopping_add_panel">
                                    <div class="add">{{$bag[$all_products[$i]->id]}}x</div>
                                </a>

                                <a href="javascript:{}" onclick="document.getElementById('buy_window_single_row_delete_{{$i}}').submit({{$i}}); return false;" class="shopping_top_panel">
                                    <div class="cancel"></div>
                                </a>
                                <div class="picture_green"></div>
                                <img src="{{asset('img/toys/'.$all_products[$i]->image_name)}}" class="picture" alt="buy_pic">
                                <div class="bottom_panel">
                                    <div class="name">{{$all_products[$i]->name}}</div>
                                    <div class="pricing">
                                        <span>{{$all_products[$i]->price_uah}}</span>
                                        <div class="hruvnya"></div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <form id="buy_window_single_row_{{$i}}" style="display: none;" action="{{route('bag_product', $all_products[$i]->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$all_products[$i]->id}}"/>
                            </form>

                            <a href="javascript:{}" onclick="document.getElementById('buy_window_single_row_{{$i}}').submit({{$i}}); return false;" class="piece">
                                <img src="{{asset('img/toys/'.$all_products[$i]->image_name)}}" class="picture" alt="buy_pic">
                                <img src="{{asset('img/buy_icon.png')}}" class="buy_icon" alt="buy_icon">
                                <div class="bottom_panel">
                                    <div class="name">{{$all_products[$i]->name}}</div>
                                    <div class="pricing">
                                        <span>{{$all_products[$i]->price_uah}}</span>
                                        <div class="hruvnya"></div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                    @if($i != sizeof($all_products) - 1)
                        <div class="horizontal">
                            <div class="horizontal_line" style="margin: auto"></div>
                        </div>
                    @endif
            @endfor
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
{{--            <div id="translate_icon"></div>--}}
{{--            <div class="text">Русский</div>--}}
{{--            <div id="dn_arrow"></div>--}}
        </a>
    </div>
</footer>
</body>
</html>
