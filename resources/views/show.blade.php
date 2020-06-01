<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<h1>{{ $company->title . 'company' }}</h1>
<div id="main">
@include('total')
</div>
<div class="row">
    <div class="col-6">
        <h2>Incomes</h2>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLongTitle"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="income_uploader" action="#" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title-input">Title</label>
                                <input type="text" id="title-input" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="sum-input">Sum</label>
                                <input type="text" id="sum-input" name="sum" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date-input">Date</label>
                                <input type="date" id="date-input" name="date" class="form-control">
                            </div>
                            <input type="hidden" name="company_id" value="{{ $company->id  }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <th>Title</th>
            <th>Sum</th>
            <th>Date</th>
            <th>action</th>
            </thead>
            <tbody id="income_table">
            @if($company->financial->income)
                @foreach($company->financial->income as $key => $income)
                    <tr>
                        <td>{{ $income['title'] }}</td>
                        <td>{{ $income['sum'] }}</td>
                        <td>{{ $income['date'] }}</td>
                        <td>
                            <button data-id="{{ $key }}" data-title="income" class=" btn btn-danger income_delete">
                                Delete
                            </button>
                            <button data-id="{{ $key }}" data-title="income" class="btn btn-primary edit">Edit</button>

                        </td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="col-6">
        <h2>Consumptions</h2>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLong">
            Add consupmtion
        </button>

        <!-- Modal -->
        <div class="modal fade" id="ModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="consumption_uploader" action="#" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title-input">Title</label>
                                <input type="text" id="title-input" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="sum-input">Sum</label>
                                <input type="text" id="sum-input" name="sum" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date-input">Date</label>
                                <input type="date" id="date-input" name="date" class="form-control">
                            </div>
                            <input type="hidden" name="company_id" value="{{ $company->id  }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <th>Title</th>
            <th>Sum</th>
            <th>Date</th>
            <th>action</th>
            </thead>
            <tbody id="consumption_table">
            @if($company->financial->consumption)
                @foreach($company->financial->consumption as $key =>$consumption)
                    <tr>
                        <td>{{ $consumption['title'] }}</td>
                        <td>{{ $consumption['sum'] }}</td>
                        <td>{{ $consumption['date'] }}</td>
                        <td>
                            <button data-id="{{ $key }}" data-title="consumption"
                                    class="btn btn-danger income_delete">Delete
                            </button>
                            <button type="button" data-id="{{ $key }}" class="btn btn-primary edit" data-title="consumption" data-toggle="modal" data-target="#EditModal">
                                Edit
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Consumption</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="edit_uploader" action="#" method="post">
                        @csrf
                        <div class="modal-body">

                                <label for="title-input">Title</label>
                                <input type="text" id="title-input" name="title" class="form-control">

                                <label for="sum-input">Sum</label>
                                <input type="text" id="sum-input" name="sum" class="form-control">

                                <label for="date-input">Date</label>
                                <input type="date" id="date-input" name="date" class="form-control">
                            <input type="hidden" name="company_id" value="{{ $company->id  }}">
                            <input type="hidden" name="element">
                            <input type="hidden" name="type">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
{{--        End Modal--}}
    </div>
</div>


</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $('#income_uploader').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('ajax.income') }}",
                method: "post",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#exampleModalLong').modal('hide');
                    $('#income_table').append(data.html_code);
                    $('#main').html(data.view);
                }
            })
        })
    })
    $(document).ready(function () {
        $('#consumption_uploader').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('ajax.consumption') }}",
                method: "post",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#ModalLong').modal('hide');
                    $('#consumption_table').append(data.html_code);
                    $('#main').html(data.view);
                }
            })
        })

        $(document).on('click', '.income_delete', function (event) {
            let target = $(event.currentTarget);
            let id = target.data('id');
            let title = target.data('title');
            console.log(id);
            console.log(title, target);
            $.ajax({
                url: "{{ route('ajax.delete') }}",
                method: 'post',
                data: {
                    'id': id,
                    '_token': "{{ csrf_token() }}",
                    'title': title,
                    'company_id': "{{ $company->id }}",
                },
                success: function (data) {
                    let row = target.parent().parent();
                    row.remove();
                    "Success",
                        $('#main').html(data.view);
                }
            })
        })
        $(document).on('click', '.edit', function (event) {
            let target = $(event.currentTarget);
            let id = target.data('id');
            let title = target.data('title');
            let row = target.parent().parent();
            let form = document.getElementById('edit_uploader');

            form.children[1].children[1].value = row.children().eq(0).text();
            form.children[1].children[3].value = row.children().eq(1).text();
            form.children[1].children[5].value = row.children().eq(2).text();
            form.children[1].children[5].value = row.children().eq(2).text();
            form.children[1].children[7].value = id;
            form.children[1].children[8].value = title;
            console.log(form.children[1].children[7]);
        })

        $('#edit_uploader').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('ajax.edit') }}",
                method: "post",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#main').html(data.
                }
            })
            })
    })



</script>

