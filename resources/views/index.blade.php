@include('layouts.header')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Курсы валют к рублю</h3>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Date</th>
                      <th scope="col">FROM</th>
                      <th scope="col">TO</th>
                      <th scope="col">NOMINAL</th>
                      <th scope="col">VALUE</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($exchangeRate as $currency)
                    <tr>
                      <th scope="row">{{ $currency['day']}}</th>
                      <th>{{ $currency['currency_from'] }}</th>
                      <th>{{ $currency['currency_to'] }}</th>
                      <th>{{ $currency['nominal'] }}</th>
                      <th>{{ $currency['value'] }}</th>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $exchangeRate->links() }}
            </div>
        </div>
    </div>