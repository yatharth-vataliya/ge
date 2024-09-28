@extends('layouts.app')

@section('title')
    Brochure
@endsection

@section('js_script')
@endsection

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form id="brochure_form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="file_name" id="file_name" class="form-control" placeholder="Brochure Name">
                    </div>
                    <div class="form-group">
                        <textarea name="file_description" id="file_description" placeholder="Brochure description" class="form-control"
                            rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="brochure_file" id="brochure_file" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-success btn-lg" id="submit_brochure">Store Brochure</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <table class="table table-striped table-responsive" id="brochure_table">
                    <tr>
                        <th>Brochure Name</th>
                        <th>Brochure Description</th>
                        <th>Download Brochure</th>
                        <th>Delete Brochure</th>
                    </tr>
                    @foreach ($brochures as $brochure)
                        <tr id="row{{ $brochure->id }}">
                            <td>{{ $brochure->file_name }}</td>
                            <td>{{ $brochure->file_description }}</td>
                            <td><a href="{{ url('/download/brochure/' . $brochure->id) }}" class="btn btn-primary">Download
                                    Brochure</a></td>
                            <td><button type="button" class="btn btn-danger"
                                    onclick="delete_brochure({{ $brochure->id }})">Delete Brochure</button></td>
                        </tr>
                    @endforeach
                </table>
                <div>{{ $brochures->links() }}</div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', () => {
            $(document).ready(function() {
                $('#submit_brochure').on('click', function(event) {
                    // event.preventDefault();
                    /* Act on the event */
                    var fd = new FormData(document.getElementById("brochure_form"));
                    axios.post('{{ route('brochure.store') }}', fd).then(function(response) {
                        if (response.data.check) {
                            $('#brochure_form').trigger('reset');
                            var brochure = response.data.brochure;
                            var add_brochure_row = `<tr id="${brochure.id}">
        <td>${brochure.file_name}</td>
        <td>${brochure.file_description}</td>
        <td><a href="{{ url('/download/brochure') }}/${brochure.id}" class="btn btn-primary">Download Brochure</a></td>
        <td><button type="button" class="btn btn-danger" onclick="delete_brochure(${brochure.id})">Delete Brochure</button></td>
        <tr>`;
                            $('#brochure_table').append(add_brochure_row);
                            Swal.fire({
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false,
                                title: 'Success fully added the brochure'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                timer: 1500,
                                showConfirmButton: false,
                                title: 'Something Went Wrong Please try again'
                            });
                        }
                    });
                });
            });
        });

        function delete_brochure(brochure_id) {
            axios.get(`{{ url('/delete_brochure') }}/${brochure_id}`).then(function(response) {
                if (response.data.check) {
                    $('#row' + brochure_id).remove();
                    Swal.fire({
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false,
                        title: 'Success fully Deleted Brochure with File'
                    });
                }
            });
        }
    </script>
@endsection
