<a class="favorite {{Auth::guest()? 'off' : ($model->is_favorited ? 'favorited': '')}} mt-1" title="Click to make favorite"
	onclick="event.preventDefault(); document.getElementById('favorite-question-{{$model->id}}').submit();"
	>
	<i class="fas fa-star fa-2x"></i>
</a>
<form id="favorite-question-{{$model->id}}" action="/questions/{{$model->id}}/favorites" method="POST">
	@csrf
	@if($model->is_favorited)
		@method('DELETE')
	@endif
</form>
<span class="favorites-count">{{$model->favorites_count}}</span>