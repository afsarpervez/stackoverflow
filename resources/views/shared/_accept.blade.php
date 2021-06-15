@can('accept', $model)
    <a class="{{$model->status}} mt-1" 
        title="Mark as best" 
        onclick="event.preventDefault(); document.getElementById('accept-answer-{{$model->id}}').submit();"
        >
        <i class="fas fa-check fa-2x"></i>
    </a>
    <form id="accept-answer-{{$model->id}}" action="{{route('answers.accept', $model->id)}}" method="POST">
        @csrf
    </form>
@else
    @if ($model->is_best)
        <a class="{{$model->status}} mt-1"title="Best answer">
            <i class="fas fa-check fa-2x"></i>
        </a>
    @endif
@endcan