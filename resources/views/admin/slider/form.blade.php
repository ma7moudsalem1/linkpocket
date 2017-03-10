@if(isset($slider))
        <img src="{{ Request::root().'/public/website/img/slider/'.$slider->img }}" height="250" style="margin: 0 auto" width="350">
    @endif
<br />
<div class="col-md-6">
    <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
        <label for="img">Image</label>
            {!! Form::file("img", null, [
            'class' => 'form-control input-lg'
            ]) !!}
            @if ($errors->has('img'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('img') }}</strong>
            </span>
            @endif
    </div> 


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

    
   
    <button class="btn btn-danger input-lg" style="width:150px" type="submit">Done</button>
</div>
                      
                            
                    