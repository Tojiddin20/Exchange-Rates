@include('layouts.header')

<div class="container">
	<div class="row">
		
		<form action="/prediction" method="post">
			<div class="col-md-3 offset-md-4 text-center">
				<h5 class="text-center">Выбрать период</h5>
	      @csrf
	        <select class="form-select" aria-label="Default select example" name="select_period">
	        
	          <option>DAY</option>
	          <option>WEEK</option>
	          <option>MONTH</option>

	        </select>
				<h5 class="text-center">Выбрать валюту</h5>
		      <select class="form-select" aria-label="Default select example" name="select_currency">
		      
		      	<option>ALL CURRENCIES</option>

		      	@for ($i = 0; $i < count($currencies); $i++)
						
							<option>{{ $currencies[$i]['currency_from'] }}</option>
						
						@endfor

		      </select>
			<button class="btn btn-secondary mt-1" type="submit" name="submit_convert">Submit</button>
			</div>
  	</form>
	</div>

		<div class="row">
		<div class="col-md-12">
      <h4 class="mt-3 mb-3 text-center">Возможный курс валют к рублю</h4>
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
			  	@if (isset($_POST['submit_convert']))
			  		@switch ($_POST['select_period'])
					    @case('DAY')
					    	@switch ($_POST['select_currency'])
					    		@case('ALL CURRENCIES')
					    			@foreach($prediction as $value)
								    <tr>
								      <th scope="row">{{ $carbon->toDateString() }}</th>
								      <th>{{ $value[0]['currency_from'] }}</th>
								      <th>{{ $value[0]['nominal'] }}</th>
								      <th>{{ $value[0]['value'] }}</th>
								    </tr>
								    @endforeach
						    	@break
						    	@case('EUR')
								    <tr>
								      <th scope="row">{{ $carbon->toDateString() }}</th>
								      <th>{{ $prediction[0][0]['currency_from'] }}</th>
								      <th>{{ $prediction[0][0]['nominal'] }}</th>
								      <th>{{ $prediction[0][0]['value'] }}</th>
								    </tr>
						    	@break
						    	@case('KZT')
								    <tr>
								      <th scope="row">{{ $carbon->toDateString() }}</th>
								      <th>{{ $prediction[1][0]['currency_from'] }}</th>
								      <th>{{ $prediction[1][0]['nominal'] }}</th>
								      <th>{{ $prediction[1][0]['value'] }}</th>
								    </tr>
						    	@break
						    	@case('TJS')
								    <tr>
								      <th scope="row">{{ $carbon->toDateString() }}</th>
								      <th>{{ $prediction[2][0]['currency_from'] }}</th>
								      <th>{{ $prediction[2][0]['nominal'] }}</th>
								      <th>{{ $prediction[2][0]['value'] }}</th>
								    </tr>
						    	@break
						    	@case('USD')
								    <tr>
								      <th scope="row">{{ $carbon->toDateString() }}</th>
								      <th>{{ $prediction[3][0]['currency_from'] }}</th>
								      <th>{{ $prediction[3][0]['nominal'] }}</th>
								      <th>{{ $prediction[3][0]['value'] }}</th>
								    </tr>
						    	@break
						    	@case('UZS')
								    <tr>
								      <th scope="row">{{ $carbon->toDateString() }}</th>
								      <th>{{ $prediction[4][0]['currency_from'] }}</th>
								      <th>{{ $prediction[4][0]['nominal'] }}</th>
								      <th>{{ $prediction[4][0]['value'] }}</th>
								    </tr>
						    	@break
						    @endswitch
					    @break
					    @case('WEEK')
					    	@switch ($_POST['select_currency'])
					    		@case('ALL CURRENCIES')
					    			@foreach($prediction as $value)
					    			<?php $carbon = now(); ?>
							    		@for($i = 0; $i < 7; $i++)
										    <tr>
										      <th scope="row">{{ mb_substr($carbon = $carbon->addDay(), 0, 10) }}</th>
										      <th>{{ $value[$i]['currency_from'] }}</th>
										      <th>{{ $value[$i]['nominal'] }}</th>
										      <th>{{ $value[$i]['value'] }}</th>
										    </tr>
								    	@endfor
								    @endforeach
								  @break
								  @case('EUR')
								  <?php $carbon = now(); ?>
							    	@for($i = 0; $i < 7; $i++)
									    <tr>
									      <th scope="row">{{ mb_substr($carbon = $carbon->addDay(), 0, 10) }}<th>{{ $prediction[0][$i]['currency_from'] }}</th>
									      <th>{{ $prediction[0][$i]['nominal'] }}</th>
									      <th>{{ $prediction[0][$i]['value'] }}</th>
									    </tr>
								    @endfor
								  @break
								  @case('KZT')
								  <?php $carbon = now(); ?>
							    	@for($i = 0; $i < 7; $i++)
									    <tr>
									      <th scope="row">{{ mb_substr($carbon = $carbon->addDay(), 0, 10) }}</th>
									      <th>{{ $prediction[1][$i]['currency_from'] }}</th>
									      <th>{{ $prediction[1][$i]['nominal'] }}</th>
									      <th>{{ $prediction[1][$i]['value'] }}</th>
									    </tr>
								    @endfor
								  @break
								  @case('TJS')
								  <?php $carbon = now(); ?>
							    	@for($i = 0; $i < 7; $i++)
									    <tr>
									      <th scope="row">{{ mb_substr($carbon = $carbon->addDay(), 0, 10) }}</th>
									      <th>{{ $prediction[2][$i]['currency_from'] }}</th>
									      <th>{{ $prediction[2][$i]['nominal'] }}</th>
									      <th>{{ $prediction[2][$i]['value'] }}</th>
									    </tr>
								    @endfor
								  @break
								  @case('USD')
								  <?php $carbon = now(); ?>
							    	@for($i = 0; $i < 7; $i++)
									    <tr>
									      <th scope="row">{{ mb_substr($carbon = $carbon->addDay(), 0, 10) }}</th>
									      <th>{{ $prediction[3][$i]['currency_from'] }}</th>
									      <th>{{ $prediction[3][$i]['nominal'] }}</th>
									      <th>{{ $prediction[3][$i]['value'] }}</th>
									    </tr>
								    @endfor
								  @break
								  @case('UZS')
								  <?php $carbon = now(); ?>
							    	@for($i = 0; $i < 7; $i++)
									    <tr>
									      <th scope="row">{{ mb_substr($carbon = $carbon->addDay(), 0, 10) }}</th>
									      <th>{{ $prediction[4][$i]['currency_from'] }}</th>
									      <th>{{ $prediction[4][$i]['nominal'] }}</th>
									      <th>{{ $prediction[4][$i]['value'] }}</th>
									    </tr>
								    @endfor
								  @break
								@endswitch
					    @break
					    @case('MONTH')
					    	@switch ($_POST['select_currency'])
					    		@case('ALL CURRENCIES')
							    	@foreach ($prediction as $all)
					    			<?php $carbon = now(); ?>
							    		@foreach ($all as $value)
										    <tr>
										      <th scope="row">{{ mb_substr($carbon = $carbon->addDay(), 0, 10) }}</th>
										      <th>{{ $value['currency_from'] }}</th>
										      <th>{{ $value['nominal'] }}</th>
										      <th>{{ $value['value'] }}</th>
										    </tr>
								    	@endforeach
								    @endforeach
								  @break
								  @case('EUR')
								  <?php $carbon = now(); ?>
							    	@for ($i = 0; $i < 30; $i++)
								    <tr>
								      <th scope="row">{{ mb_substr($carbon = $carbon->addDay(), 0, 10) }}</th>
								      <th>{{ $prediction[0][$i]['currency_from'] }}</th>
								      <th>{{ $prediction[0][$i]['nominal'] }}</th>
								      <th>{{ $prediction[0][$i]['value'] }}</th>
								    </tr>
								    @endfor
								  @break
								  @case('KZT')
								  <?php $carbon = now(); ?>
							    	@for ($i = 0; $i < 30; $i++)
								    <tr>
								      <th scope="row">{{ mb_substr($carbon = $carbon->addDay(), 0, 10) }}</th>
								      <th>{{ $prediction[1][$i]['currency_from'] }}</th>
								      <th>{{ $prediction[1][$i]['nominal'] }}</th>
								      <th>{{ $prediction[1][$i]['value'] }}</th>
								    </tr>
								    @endfor
								  @break
								  @case('TJS')
								  <?php $carbon = now(); ?>
							    	@for ($i = 0; $i < 30; $i++)
								    <tr>
								      <th scope="row">{{ mb_substr($carbon = $carbon->addDay(), 0, 10) }}</th>
								      <th>{{ $prediction[2][$i]['currency_from'] }}</th>
								      <th>{{ $prediction[2][$i]['nominal'] }}</th>
								      <th>{{ $prediction[2][$i]['value'] }}</th>
								    </tr>
								    @endfor
								  @break
								  @case('USD')
								  <?php $carbon = now(); ?>
							    	@for ($i = 0; $i < 30; $i++)
								    <tr>
								      <th scope="row">{{ mb_substr($carbon = $carbon->addDay(), 0, 10) }}</th>
								      <th>{{ $prediction[3][$i]['currency_from'] }}</th>
								      <th>{{ $prediction[3][$i]['nominal'] }}</th>
								      <th>{{ $prediction[3][$i]['value'] }}</th>
								    </tr>
								    @endfor
								  @break
								  @case('UZS')
								  <?php $carbon = now(); ?>
							    	@for ($i = 0; $i < 30; $i++)
								    <tr>
								      <th scope="row">{{ mb_substr($carbon = $carbon->addDay(), 0, 10) }}</th>
								      <th>{{ $prediction[4][$i]['currency_from'] }}</th>
								      <th>{{ $prediction[4][$i]['nominal'] }}</th>
								      <th>{{ $prediction[4][$i]['value'] }}</th>
								    </tr>
								    @endfor
								  @break
								@endswitch
					    @break
					@endswitch
			    @endif
			  </tbody>
			</table>
				
			</div>
		</div>
	</div>
