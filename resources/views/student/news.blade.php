@extends('layouts.app')

@section('title')
News For Students
@endsection

@section('js_script')

@endsection

@section('css')

@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
        <tr>
          <th>Brochure Name</th>
          <th>Brochure Description</th>
          <th>Download Brochure</th>
        </tr>
        @foreach($brochures as $brochure)
        <tr>
          <td>{{ $brochure->file_name }}</td>
          <td>{{ $brochure->file_description }}</td>
          <td><a href="{{ url('/download/brochure/'.$brochure->id) }}" class="btn btn-primary">Download Brochure</a></td>
        </tr>
        @endforeach
      </table>
      <div class="col-md-12 text-center">{{ $brochures->links() }}</div>
    </div>
  </div>
</div>
@endsection

@section('javascript')

@endsection
