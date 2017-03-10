<div class="col-md-6">
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title">Title</label>
            {!! Form::text("title", null, [
            'class' => 'form-control input-lg',
            'required'
            ]) !!}
            @if ($errors->has('title'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('title') }}</strong>
            </span>
            @endif
    </div> 
    {!! Form::hidden("id", null, [
            'class' => 'form-control',
            ]) !!}

    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
        <label for="body">Body</label>
            {!! Form::textarea("body", null, [
            'class' => 'form-control',
            'id'    => 'editor1'
            ]) !!}
            @if ($errors->has('body'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('body') }}</strong>
            </span>
            @endif
    </div>

    @if($page->descrip != null)
    <div class="form-group{{ $errors->has('descrip') ? ' has-error' : '' }}">
        <label for="descrip">Description</label>
            {!! Form::textarea("descrip", null, [
            'class' => 'form-control'
            ]) !!}
            @if ($errors->has('descrip'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('descrip') }}</strong>
            </span>
            @endif
    </div>
    @endif

    @if($page->keywords != null)
    <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
        <label for="keywords">Keywords</label>
            {!! Form::textarea("keywords", null, [
            'class' => 'form-control'
            ]) !!}
            @if ($errors->has('keywords'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('keywords') }}</strong>
            </span>
            @endif
    </div>
   @endif
    
   
    <button class="btn btn-danger input-lg" style="width:150px" type="submit">Done</button>
</div>
                      
                            
                    