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
function removeQuotes($string)
{
	$string = str_replace('"', "", $string);
	$string = str_replace("'", "", $string);

	return $string;
}
?>
<div class="row">
    <div class="col-md-9">
        <div class="thumbnail large-thumbnail">
            <h4 class="picture-title">{{ $picture->title }}</h4>
            <img class="whole-picture" src="{{ secure_url('files/'.$picture->user->id.'/'.$picture->album->id.'/'.$picture->filename) }}" alt="{{ removeQuotes($picture->title) }}" title="{{ removeQuotes($picture->title) }}">
            <div class="caption">
                <div id="buttons">
                	<span class='st_sharethis_hcount' displayText='Share'></span>
                    <span class='st_facebook_hcount' displayText='Facebook'></span>
                    <span class='st_googleplus_hcount' displayText='G+'></span>
                    <span class='st_twitter_hcount' displayText='Tweet' st_via='Shantavo'></span>
                    <span class='st_pinterest_hcount' displayText='Pinterest'></span>
                    <span class='st_tumblr_hcount' displayText='Tumblr'></span>
                    <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                    <span class='st_email_hcount' displayText='Email'></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="thumbnail large-thumbnail">
            <div class="meta">
                <strong>Гласове:</strong> <span id="votes">{{ $picture->votes }}</span>
                @if (isVotedCheck($picture))
				<span id="voting">(<a title='Вече си гласувал!'>гласувал</a>)</span><br/>
				@else
				<span id="voting">(<a onclick="vote({{ $picture->id }})" title="Гласувай!">гласувай</a>)</span><br/>
				@endif
				<strong>Автор:</strong> <a href="{{ secure_url('user/'.$picture->user->username) }}">{{ $picture->user->username }}</a><br/>
                <strong>Качена на:</strong> {{ date('d.m.Y в H:i часа',strtotime($picture->uploaded_at)) }} </br>
                <strong>В албум:</strong> <a href="{{ secure_url('album/'.$picture->album->id) }}">{{ $picture->album->name }}</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-9">
    	<div id="disqus_thread"></div>
    </div>
</div>

<script>
function vote()
{
	$.post("{{ secure_url('picture/vote') }}",
	{
	    id: {{ $picture->id }}
	  },
	  function(data,status) {
	   //console.log("Data: " + data + "\nStatus: " + status);
	   $("#votes").text(data);
	   $("#voting").replaceWith('<span id="voting">(<a title="Вече си гласувал!">гласувал</a>)</span>');
	});
}
</script>