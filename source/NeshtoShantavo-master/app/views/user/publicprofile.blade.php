<div class="jumbotron">

<h1>Профил на {{ $user->username }}</h1>

<h2>Публични албуми</h2>
<ul>
@foreach ($user->albums as $album)
@if ($album->isPrivate == 0)
<li><a href="{{ secure_url('album/'.$album->id) }}">{{ $album->name }}</a></li>
@endif
@endforeach
</ul>
</div>