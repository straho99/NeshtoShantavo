<section class="register">
	<h1>Качи снимка</h1>

<form method="post" action="{{ secure_url('picture/upload') }}" enctype="multipart/form-data">
	<div class="fileUpload">
		<select name="albumId" id="albumId" required title="избери албум">
			<option name="albumId" value="" disabled selected>Избери</option>
			@foreach ($user->albums as $album)
			<option name="albumId" value="{{ $album->id }}" required>{{ $album->name }}</option>
			@endforeach
		</select>
      	<input type="checkbox" id="isPrivate" name="isPrivate" value="0" checked />
      	<label for="isPrivate">Публично достъпна</label>
		<input type="text" id="title" name="title" placeholder="Заглавие" required pattern=".{5,30}" title="напиши заглавие">
		<span>Избор на файл</span>
		<input type="file" id="image" name="image" class="upload" required/>
		<input type="hidden" id="userId" name="userId" value="{{ $user->id }}"/>
	</div>
	<div style="margin-top:20px;">
		<input type="submit" value="Качи">
	</div>
	</form>
</section>