@csrf
<div class="form-group">
    <label for="question-title">Question Title</label>
    <input id="question-title" value="{{old('title', $question->title)}}" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" type="text" name="title">
    @if ($errors->has('title'))
        <div class="invalid-feedback"><strong>{{$errors->first('title')}}</strong></div>
    @endif
</div>
<div class="form-group">
    <label for="question-body">Explain your questio</label>
    <textarea id="question-body" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}" name="body" rows="3">{{old('body', $question->body)}}</textarea>
    @if ($errors->has('body'))
        <div class="invalid-feedback"><strong>{{$errors->first('body')}}</strong></div>
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary btn-lg">{{$buttonText}}</button>
</div>