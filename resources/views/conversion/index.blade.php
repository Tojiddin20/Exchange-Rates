@include('layouts.header')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			
			<form action="#" method="post">
                
                <select class="form-select" aria-label="Default select example">
					<option value="USD">{{ $currencies[0]['currency_from'] }}</option>
					<option value="EUR">{{ $currencies[1]['currency_from'] }}</option>
					<option value="KZT">{{ $currencies[2]['currency_from'] }}</option>
					<option value="TJS">{{ $currencies[3]['currency_from'] }}</option>
					<option value="UZS">{{ $currencies[4]['currency_from'] }}</option>
				</select>

				<input type="number" class="form-control mb-2"> 
				<input class="btn btn-primary" type="submit" value="Submit">
				<input class="btn btn-primary" type="reset" value="Reset">

			</form>

		</div>
	</div>
</div>