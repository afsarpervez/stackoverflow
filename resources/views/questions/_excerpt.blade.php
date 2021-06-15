<div class="media post">
 <div class="d-flex flex-column counter">
     <div class="vote">
         <strong>{{$question->votes_count}}</strong> {{Str::plural('vote', $question->votes_count)}}
     </div>

     <div class="status {{$question->status}}">
         <strong>{{$question->answers_count}}</strong> {{Str::plural('answer', $question->answers_count)}}
     </div>

     <div class="view">
         {{$question->views. " ". Str::plural('view', $question->views)}}
     </div>

 </div>
 {{-- EDIT & DELETE Button  --}}
 <div class="media-body">
     <div class="d-flex flex align-items-center">
         <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
         <div class="ml-auto">
             @can('update', $question)
             <a href="{{route('questions.edit', $question->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
             @endcan
             
             @can('delete', $question)    
             <form class="form-delete" method="POST" action="{{route('questions.destroy', $question->id)}}">
             {{method_field('DELETE')}}
                 @csrf
                 <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
             </form>
             @endcan
         </div>
     </div>
     <p class="lead">
         asked by
         <a href="{{$question->user->url}}">{{$question->user->name}}</a>
         <small class="text-muted">{{$question->created_date}}</small>
     </p>
 <div class="excerpt">
     {{$question->excerpt(250)}}
 </div>
 </div>
</div>