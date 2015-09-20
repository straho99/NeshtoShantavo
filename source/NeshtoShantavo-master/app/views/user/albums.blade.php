<style>
#newAlbum {margin:20px 0;}
#newAlbum a {curson:pointer;}
</style>

<div class="jumbotron">

<h1 style="margin-bottom:30px;">Потребителски албуми</h1>

<div id="newAlbum">
	<a onclick="newAlbum()">Създай нов албум</a>
	<div id="dialog-form" style="display:none">
	<form method="post" action="{{ secure_url('album/add') }}">
		<label for="category">Категория: </label>
		<select name="category" required>
			<option value="" selected disabled>Избери</option>
			@foreach ($categories as $category)
			<option name="category" value="{{ $category->id }}" required>{{ $category->name }}</option>
			@endforeach
		</select>
		<input name="name" id="name" placeholder="Име на албума" required>
  		<input type="checkbox" id="isPrivate" name="isPrivate" value="0" checked />
  		<label for="isPrivate">Публично достъпен</label>
  		<input type="hidden" id="userId" name="userId" value="{{ Auth::user()->id }}"/>
  		<input type="submit" value="Създай">
	</form>
	</div>
</div>

@if ($albums)

<ul>
@foreach ($albums as $album)
<li style="font-size:16px;font-weight:bolder;">{{ $album->name; }} (снимки: {{ count($album->pictures) }}) {{ ($album->isPrivate==1) ? "(скрит)" : "" }} - <a href="">редактирай</a></li>
@endforeach
</ul>

@else
<p>Нямаш нито 1 албум.</p>
@endif

</div>

<script>
function newAlbum()
{
	$("#dialog-form").show().dialog("open");
}
</script>