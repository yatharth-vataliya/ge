@extends('layouts.app')

@section('title')
Setting
@endsection

@section('js_script')

@endsection

@section('css')

@endsection

@section('content')
@php
$setting = $settings->where('key', '=', 'registration')->first();
if(!empty($setting)){
	$registration = $setting->value;
}else{
	$registration = 'off';
}
@endphp
<div class="container-fluid">
	<div class="row shadow rounded">
		<div class="col-md-12">
			<form method="POST">
				<div class="form-group">
					<div class="col-md-4">
						<label for="registration">Registration</label>
						<select id="registration" name="registration" class="custom-select">
							<option value="on" {{ $registration == 'on' ? 'selected' : '' }}>on</option>
							<option value="off" {{ $registration == 'off' ? 'selected' : '' }}>off</option>
						</select>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@section('javascript')

<script type="text/javascript">
	$("#registration").on('change', function(){
		var reg = $(this).val();
		axios.post('{{ route("edit.registration") }}',{
			'_token' : '{{ csrf_token() }}',
			'registration' : reg
		}).then(response => {
			res = response.data;
			if(res.check){
				Swal.fire({
					title: 'Changes are done to registration',
					text: `${res.message}`,
					icon: 'info',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'OK'
				});
			}else{
				Swal.fire({
					title: 'Something is wrong',
					text: `${res.message}`,
					icon: 'warning',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'OK'
				});
			}
		}).catch(error => {});
	});
</script>

@endsection
