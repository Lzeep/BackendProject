<table class="table">
    <thead>
    <th>Total income</th>
    <th>Total consumption</th>
    <th>Total</th>
    </thead>
    <tbody>
    <tr>
{{--        @dd($company->financial->total)--}}
            <td>{{ $company->financial->total_income }}</td>
            <td>{{ $company->financial->total_consumption }}</td>
            <td>{{ $company->financial->total }}</td>
    </tr>
    </tbody>
</table>
