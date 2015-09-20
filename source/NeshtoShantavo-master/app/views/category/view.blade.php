<?php
function isVotedCheck($picture)
{
	if (Auth::check())
	{
		foreach ($picture->voted as $vote)
		{
			if ($vote->user->id == Auth::user()->id)
			{
				return true;
			}
		}
	}

	return false;
}
function countPictures($albums)
{
	$n=0;

	foreach ($albums as $album)
	{
		$n += count($album->pictures);
	}

	return $n;
}
function countVotes($albums)
{
	$n=0;

	foreach ($albums as $album)
	{
		foreach ($album->pictures as $picture)
		{
			$n += intval($picture->votes);
		}
	}

	return $n;
}
function removeQuotes($string)
{
	$string = str_replace('"', "", $string);
	$string = str_replace("'", "", $string);

	return $string;
}
?>
<div class="page-title">
    <h2>Категория: {{ $category->name }}</h2>
    <h4>(съдържа {{ count($category->albums) }} албума с {{ countPictures($category->albums) }} снимки имащи общо {{ countVotes($category->albums) }} гласа)</h4>
    @if (Auth::check())
    <p>Добре дошъл {{ Auth::user()->username }}!</p>
    <p>Можеш да разгледаш профила си в сайта <a href="{{ secure_url('user/profile') }}">тук</a></p>
    @else
    <p>В момента не си логнат!</p>
    <p>За да можеш да ползваш сайта трябва първо да се <a href="{{ secure_url('user/login') }}">логнеш</a> в твоя акаунт или да <a href="{{ secure_url('user/register') }}">регистрираш</a> нов, ако все още нямаш такъв.</p>
    @endif
</div>

<div class="row">
@foreach ($pictures as $picture)

<div class="col-sm-6 col-md-4">
    <div class="thumbnail tilt">
        <a href="{{ secure_url('picture/'.$picture->id) }}"><img class="thumb-picture" src="{{ secure_url('files/'.$picture->user->id.'/'.$picture->album->id.'/'.$picture->filename) }}" alt="{{ removeQuotes($picture->title) }}" title="{{ removeQuotes($picture->title) }}"></a>
        <div class="caption">
            <h4><a href="{{ secure_url('picture/'.$picture->id) }}">{{ $picture->title }}</a></h4>
            <div class="meta">
                Гласове: <span id="votes-{{ $picture->id }}">{{ $picture->votes }}</span>
                @if (isVotedCheck($picture))
				<span id="voting-{{ $picture->id }}">(<a title='Вече си гласувал!'>гласувал</a>)</span><br/>
				@else
				<span id="voting-{{ $picture->id }}">(<a onclick="vote({{ $picture->id }})" title="Гласувай!">гласувай</a>)</span><br/>
				@endif
                Качена на: {{ date('d.m.Y в H:i часа',strtotime($picture->uploaded_at)) }} от <a href="{{ secure_url('user/'.$picture->user->username) }}">{{ $picture->user->username }}</a><br/>
                В албум: <a href="{{ secure_url('album/'.$picture->album->id) }}">{{ $picture->album->name }}</a>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="text-center pagination-wrapper">
	{{$pictures->links()}}
</div>

</div>
<script>
function vote(id)
{
	$.post("{{ secure_url('picture/vote') }}",
	{
	    id: id
	  },
	  function(data,status) {
	   //console.log("Data: " + data + "\nStatus: " + status);
	   $("#votes-"+id).text(data);
	   $("#voting-"+id).replaceWith('<span id="voting-'+id+'">(<a title="Вече си гласувал!">гласувал</a>)</span>');
	});
}
</script>