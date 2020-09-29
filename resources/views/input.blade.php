<h1>URL shortener</h1>
<form action="/" method="post">
	@csrf

	<input type="text" name="original_address" required>
	<input type="submit">
</form>

@if(isset($link))
	<div class="result">
		<p>Result link:<a 
			href="http://urlshortener.test/{{$link->id}}">
			http://urlshortener.test/{{$link->id}}</a>
		</p>
	</div>
@endif