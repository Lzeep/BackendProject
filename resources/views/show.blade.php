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
<h1>{{ $company->title  }}</h1>
<table class="table">
    <thead>
    <th>Income</th>
    <th>consumption</th>
    </thead>
    <tbody>
    @if($company->financial->income)
    @foreach($company->financial->income as $financial)
        <td>{{ $financial['title'] . ' ' .$financial['sum'] }}</td>

    @endforeach
    @endif
    @if($company->financial->consumption)
    @foreach($company->financial->consumption as $financial)
        <td>{{ $financial['title'] . ' ' .$financial['sum'] }}</td>
    @endforeach
        @endif
    </tbody>
</table>
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
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
<button>add consumption</button>
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
                alert("Запись добавлен!");
                }
            })
        })
    })
</script>

