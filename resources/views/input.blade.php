<h1>URL shortener</h1>
<form action="/link" method="post">
	@csrf

	<input type="text" name="original_address" required>
	<input type="submit">
</form>

@if(isset($link))
	<div class="result">
		<p>Result link:<a 
			href="{{$_SERVER['APP_URL'].'/link/'.$link->id}}">
			{{$_SERVER['APP_URL'].'/link/'.$link->id}}</a>
		</p>
	</div>
@endif