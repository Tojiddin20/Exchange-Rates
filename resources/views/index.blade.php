<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Rates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Курс валют к рублю на {{ date('d-m-y') }}</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Code</th>
                      <th scope="col">Name of currency</th>
                      <th scope="col">Nominal</th>
                      <th scope="col">Value</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($exchangeRate as $currency)
                    <tr>
                      <th scope="row">{{ $currency['code'] }}</th>
                      <td>{{ $currency['name_of_currency'] }}</td>
                      <td>{{ $currency['nominal'] }}</td>
                      <td>{{ $currency['value'] }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Курс доллара к рублю за последние 30 дней</h3>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Day</th>
                      <th scope="col">Code</th>
                      <th scope="col">Value</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($usd as $us)
                    <tr>
                      <th scope="row">{{ $us['id'] }}</th>
                      <th scope="row">{{ $us['code'] }}</th>
                      <td>{{ $us['value'] }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>