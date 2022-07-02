@include('layouts.header')
    <div class="container">
        <div class="row justify-content-between">
          <h3 class="text-center">Курсы валют к рублю</h3>
            <div class="col-md-4 mt-4">

              <h5 class="">Сегодняшнее число</h5>
              <strong>{{ date('Y-m-d') }}</strong>

              <hr>

            </div>

             <div class="col-md-3 text-center">
        
              <form action="/" method="post">
                @csrf
                <select class="form-select" aria-label="Default select example" name="select">
                
                  <option>ALL CURRENCIES</option>

                  @for ($i = 0; $i < count($currencies); $i++)
          
                    <option>{{ $currencies[$i] }}</option>
                  
                  @endfor
                
                </select>
                  <button class="btn btn-secondary mt-1" type="submit" name="submit">Submit</button>
              </form>

            <hr>

            </div>

        </div>
            <div class="row"> 
            <div class="col-md-12">
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
                    @if (isset($_POST['submit']) && $_POST['select'] != 'ALL CURRENCIES')

                      @switch($_POST['select'])

                        @case('EUR')
                          @foreach ($eur as $currency)
                            <tr>
                              <th scope="row">{{ $currency['date']}}</th>
                              <th>{{ $currency['currency_from'] }}</th>
                              <th>{{ $currency['currency_to'] }}</th>
                              <th>{{ $currency['nominal'] }}</th>
                              <th>{{ $currency['value'] }}</th>
                            </tr>
                          @endforeach
                        @break

                        @case('KZT')
                          @foreach ($kzt as $currency)
                            <tr>
                              <th scope="row">{{ $currency['date']}}</th>
                              <th>{{ $currency['currency_from'] }}</th>
                              <th>{{ $currency['currency_to'] }}</th>
                              <th>{{ $currency['nominal'] }}</th>
                              <th>{{ $currency['value'] }}</th>
                            </tr>
                          @endforeach
                        @break

                        @case('TJS')
                          @foreach ($tjs as $currency)
                            <tr>
                              <th scope="row">{{ $currency['date']}}</th>
                              <th>{{ $currency['currency_from'] }}</th>
                              <th>{{ $currency['currency_to'] }}</th>
                              <th>{{ $currency['nominal'] }}</th>
                              <th>{{ $currency['value'] }}</th>
                            </tr>
                          @endforeach
                        @break

                        @case('USD')
                          @foreach ($usd as $currency)
                            <tr>
                              <th scope="row">{{ $currency['date']}}</th>
                              <th>{{ $currency['currency_from'] }}</th>
                              <th>{{ $currency['currency_to'] }}</th>
                              <th>{{ $currency['nominal'] }}</th>
                              <th>{{ $currency['value'] }}</th>
                            </tr>
                          @endforeach
                        @break

                        @case('UZS')
                          @foreach ($uzs as $currency)
                            <tr>
                              <th scope="row">{{ $currency['date']}}</th>
                              <th>{{ $currency['currency_from'] }}</th>
                              <th>{{ $currency['currency_to'] }}</th>
                              <th>{{ $currency['nominal'] }}</th>
                              <th>{{ $currency['value'] }}</th>
                            </tr>
                          @endforeach
                        @break

                    @endswitch

                    @else

                      @foreach ($exchangeRate as $currency)
                        <tr>
                          <th scope="row">{{ $currency['date']}}</th>
                          <th>{{ $currency['currency_from'] }}</th>
                          <th>{{ $currency['currency_to'] }}</th>
                          <th>{{ $currency['nominal'] }}</th>
                          <th>{{ $currency['value'] }}</th>
                        </tr>
                      @endforeach

                    @endif
                  </tbody>
                </table>
              {{ $exchangeRate->links() }}
            </div>
        </div>
    </div>