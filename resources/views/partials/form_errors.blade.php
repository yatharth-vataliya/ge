@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li class="border border-danger m-2 m-md-2 p-2 p-md-2">{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif