<?php
if (!isset($title)) $title="Нещо Шантаво!?";
if (!isset($description)) $description="Нещо Шантаво!?";
if (!isset($keywords)) $keywords="neshto shantavo, image board";
if (!isset($robots)) $robots="index,follow,noodp,noydir";
if (!isset($canonical)) $canonical="https://neshto.shantavo.com/";
if (!App::environment('local')) { Asset::$secure=true; }
Asset::addFirst('css/main.css?');
Asset::addFirst('css/bootstrap-theme.min.css');
Asset::addFirst('css/bootstrap.min.css');
Asset::addFirst('js/default.js?');
Asset::addFirst('https://cdn.roumen.it/snowstorm/snowstorm-min.js');
Asset::addFirst('js/bootstrap.min.js');
Asset::addFirst('js/jquery-1.11.1.min.js');
$categories = Category::orderBy('order')->get();
?>
<!DOCTYPE html>
<html lang="bg">

<head>

<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="Team Navy Pier"/>
<meta name="description" content="{{$description}}"/>
<meta name="keywords" content="{{$keywords}}"/>
<meta name="robots" content="{{$robots}}"/>

<link rel="canonical" href="{{$canonical}}"/>
<link rel="alternate" hreflang="bg" type="application/rss+xml" title="Най-новите картинки" href="https://neshto.shantavo.com/feed"/>

{{ Asset::css() }}
{{ Asset::scripts('header') }}

<title>{{$title}}</title>

</head>

<body class="container">

<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ secure_url('/'); }}">Нещо Шантаво</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ secure_url('/') }}">Популярни</a></li>
            <li><a href="{{ secure_url('category/new') }}">Нови</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Категории <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    @foreach ($categories as $category)
                      <li><a href="{{ secure_url('category/'.$category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ secure_url('picture/upload') }}">Качване</a></li>
          @if (Auth::check() && Auth::user()->isAdmin > 0)
          <li><a href="{{ secure_url('admin') }}">Админ</a></li>
          @endif
            <li class="dropdown">
              @if (Auth::check())
                <a href="{{ secure_url('user/profile') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ secure_url('user/profile') }}">Профил</a></li>
                  <li><a href="{{ secure_url('user/albums') }}">Албуми</a></li>
                  <li><a href="{{ secure_url('user/logout') }}">Изход</a></li>
                </ul>
              @else
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Гост <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ secure_url('user/login') }}">Вход</a></li>
                  <li><a href="{{ secure_url('user/register') }}">Регистрация</a></li>
                </ul>
              @endif
            </li>
          </ul>
        </div>
      </div>
    </nav>
</header>

<div id="content" class="container">
{{$content}}
</div>

<footer id="footer" class="container">
    <div class="pull-left">
    &copy; 2014 <a href="{{ secure_url('/') }}" rel="home">Нещо Шантаво</a>
    </div>
    <div class="pull-right">
      <a href="{{ secure_url('/rules') }}">Правила</a>
    </div>
</footer>

{{ Asset::js() }}
{{ Asset::scripts('footer') }}
{{ Asset::scripts('ready') }}
</body>
</html>