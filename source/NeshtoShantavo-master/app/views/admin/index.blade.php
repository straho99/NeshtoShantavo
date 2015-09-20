<div class="jumbotron">

	<h1 class="text-center" style="margin-bottom:50px;">Админ панел</h1>

	<div>
		<h3>Статистика</h3>
		<hr>

		<p>Общо регистрирани потребители: <strong>{{ $users }}</strong></p>
		<p>Общо администратори: <strong>{{ $admins }}</strong></p>
		<p>Общо категории: <strong>{{ $categories }}</strong></p>
		<p>Общо албуми: <strong>{{ $albums }}</strong></p>
		<p>Общо снимки: <strong>{{ $pictures }}</strong></p>
		<p>Общ размер на снимките: <strong>{{ round($pictureSize/1024) }} KB</strong></p>
		<p>Общо дадени (реални) гласове: <strong>{{ $votes }}</strong></p>
		<p>Коментари (disqus): {{ count($comments) }}</p>
	</div>

	<div style="margin-top:60px;">
		<h3>Инструменти за администрация</h3>
		<hr>

		<p>Управление на сайта</p>
		<p>Управление на потребители</p>
		<p>Управление на категории</p>
	</div>

</div>