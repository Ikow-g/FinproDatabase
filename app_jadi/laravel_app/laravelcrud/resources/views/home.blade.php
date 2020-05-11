 @include('inc.header')
	<div class="container">
		<div class="row">
			<legend>Perpus Dasboard</legend>
			<div class="row">
				<div class="col-md-32">
					@if(session('info'))
						<div class="alert alert-success">
							{{session('info')}}
						</div>	
					@endif
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>id</th>
						<th>Title</th>
						<th>Desciption</th>
						<th style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($articles) > 0)
						@foreach($articles->all() as $article)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $article->id }}</td>
							<td>{{ $article->title }}</td>
							<td>{{ $article->description }}</td>
							<td style="text-align:center;">
								<a href='{{ url("/read/{$article->id}") }}' class="btn btn-primary">Read</a> |
								<a href='{{ url("/update/{$article->id}") }}' class="btn btn-success">Update</a> |
								<a href='{{ url("/delete/{$article->id}") }}' class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this item?');">Delete</a> 
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
@include('inc.footer')