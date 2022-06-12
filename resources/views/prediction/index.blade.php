@include('layouts.header')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			  <form action="/prediction" method="post">
                @csrf
                <select class="form-select" aria-label="Default select example" name="select_period">
                
                  <option>DAY</option>
                  <option>WEEK</option>
                  <option>MONTH</option>

                </select>
                  <button class="btn btn-primary mt-1" type="submit" name="submit_period">Submit</button>
              </form>

              <h4 class="m-2 text-center">Возможный курс доллара</h4>
              <table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">DATE</th>
				      <th scope="col">CURRENCY</th>
				      <th scope="col">NOMINAL</th>
				      <th scope="col">VALUE</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@if (isset($_POST['submit_period']))
				  		@switch ($_POST['select_period'])
						    @case('DAY')
							    <tr>
							      <th scope="row">{{ date("y.m.d") }}</th>
							      <th>USD</th>
							      <th>1</th>
							      <th>{{ $day }}</th>
							    </tr>
						    @break
						    @case('WEEK')
						    	@foreach ($week as $value)
							    <tr>
							      <th scope="row">2022-06-12</th>
							      <th>USD</th>
							      <th>1</th>
							      <th>{{ $value }}</th>
							    </tr>
							    @endforeach
						    @break
						    @case('MONTH')
						    	@foreach ($month as $value)
							    <tr>
							      <th scope="row">2022-06-12</th>
							      <th>USD</th>
							      <th>1</th>
							      <th>{{ $value }}</th>
							    </tr>
							    @endforeach
						    @break
						@endswitch
				    @endif
				  </tbody>
				</table>
				
		</div>
	</div>
</div>