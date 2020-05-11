@include('inc.header')
	<div class="container">
		<div class="row">
			<legend>Read Article</legend>
			<p class="lead">{{ $articles->title }}</p><br>
			<div class="col-lg-6">
				<p>- {{ $articles->description }}</p>
			</div>
		</div>
	</div>
@include('inc.footer')