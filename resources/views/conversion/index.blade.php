@include('layouts.header')

<div class="container">
	<div class="row">
		<div class="col-md-6">

			<h4>Конвертация валют к рублю</h4>
			
			<form action="/conversion" method="post">
                @csrf
                <select class="form-select" aria-label="Default select example" name="select_foreign">
            
                	@for ($i = 0; $i < count($currencies); $i++)
					
					<option>{{ $currencies[$i]['currency_from'] }}</option>
					
					@endfor

				</select>

				<select class="form-select" aria-label="Disabled select example" disabled>
					<option selected>RUB</option>
				</select>

				<input type="number" class="form-control mb-2" name="type_foreign"> 
				<button class="btn btn-primary" type="submit" name="foreign">Calculate</button>
				<button class="reset btn btn-danger">Clear</button>

			@if (isset($_POST['foreign']) && !empty($_POST['type_foreign']))

				@switch($_POST['select_foreign'])

					@case('USD')
						{{ $request['type_foreign'] * $currencies[0]['value'] / $currencies[0]['nominal'] }}	
						@break

					@case('EUR')
						{{ $request['type_foreign'] * $currencies[1]['value'] / $currencies[1]['nominal']}}	
						@break

					@case('KZT')
						{{ $request['type_foreign'] * $currencies[2]['value'] / $currencies[2]['nominal']}}	
						@break

					@case('TJS')
						{{ $request['type_foreign'] * $currencies[3]['value'] / $currencies[3]['nominal']}}	
						@break

					@case('UZS')
						{{ $request['type_foreign'] * $currencies[4]['value'] / $currencies[4]['nominal']}}	
						@break

				@endswitch

			@endif

			</form>

		</div>
			
		<div class="col-md-6">
			
			<h4>Конвертация рубля к валютам</h4>

			<form action="/conversion" method="post">
                @csrf
                <select class="form-select" aria-label="Disabled select example" disabled>
					<option selected>RUB</option>
				</select>
                
                <select class="form-select" aria-label="Default select example" name="select_rub">
                	
                	@for ($i = 0; $i < count($currencies); $i++)
					
					<option>{{ $currencies[$i]['currency_from'] }}</option>
					
					@endfor
					
				</select>

				<input type="number" class="form-control mb-2" name="type_rub"> 
				<button class="btn btn-primary" type="submit" name="rub">Calculate</button>
				<button class="reset btn btn-danger">Clear</button>

			@if (isset($_POST['rub']) && !empty($_POST['type_rub']))

				@switch($_POST['select_rub'])

					@case('USD')
						{{ $request['type_rub'] / $currencies[0]['value'] * $currencies[0]['nominal'] }}	
						@break

					@case('EUR')
						{{ $request['type_rub'] / $currencies[1]['value'] * $currencies[1]['nominal']}}	
						@break

					@case('KZT')
						{{ $request['type_rub'] / $currencies[2]['value'] * $currencies[2]['nominal']}}	
						@break

					@case('TJS')
						{{ $request['type_rub'] / $currencies[3]['value'] * $currencies[3]['nominal']}}	
						@break

					@case('UZS')
						{{ $request['type_rub'] / $currencies[4]['value'] * $currencies[4]['nominal']}}	
						@break

				@endswitch

			@endif

			</form>		

		</div>
	</div>
</div>