<?php (Auth::user()->sex == 1) ? ($greeting='г-н') : ($greeting = 'г-жа') ?>

<div class="jumbotron">

<h1>Потребитески профил</h1>

	<div style="margin-top:30px;">
		<p>Име: {{ $greeting . " " . Auth::user()->first_name . " " . Auth::user()->last_name }}</p>
		<p>Потребителско име: {{ Auth::user()->username }}</p>
		<p>E-mail адрес: {{ Auth::user()->email }}</p>
	</div>

</div>