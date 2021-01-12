<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Recapitulation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="row text-center">
        <h3>Your Recapitulation on date: {{ date('d F Y', strtotime($data['start_date'])) }}</h3>
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
