<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Recapitulation</title>
    <style>
        .row {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }
        .text-center {
            text-align: center !important;
        }
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }
        .table td,
        .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }
        .table .table {
            background-color: #fff;
        }
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .table-bordered thead td,
        .table-bordered thead th {
            border-bottom-width: 2px;
        }
    </style>
</head>
<body>
    <h3>Your Recapitulation on date: {{ date('d F Y', strtotime($data['start_date'])) }}</h3>
    <div class="row text-center">
        <table class="table table-bordered">
            <thead>
                <th>Income</th>
                <th>Expenses</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        IDR
                        @if (isset($data['income']['IDR']))
                            {{number_format($data['income']['IDR'])}}
                        @else
                            {{number_format(0)}}
                        @endif
                    </td>
                    <td>
                        IDR
                        @if (isset($data['expenses']['IDR']))
                            {{number_format($data['expenses']['IDR'])}}
                        @else
                            {{number_format(0)}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        JPY
                        @if (isset($data['income']['JPY']))
                            {{number_format($data['income']['JPY'])}}
                        @else
                            {{number_format(0)}}
                        @endif
                    </td>
                    <td>
                        JPY
                        @if (isset($data['expenses']['JPY']))
                            {{number_format($data['expenses']['JPY'])}}
                        @else
                            {{number_format(0)}}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        USD
                        @if (isset($data['income']['USD']))
                            {{number_format($data['income']['USD'])}}
                        @else
                            {{number_format(0)}}
                        @endif
                    </td>
                    <td>
                        USD
                        @if (isset($data['expenses']['USD']))
                            {{number_format($data['expenses']['USD'])}}
                        @else
                            {{number_format(0)}}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
