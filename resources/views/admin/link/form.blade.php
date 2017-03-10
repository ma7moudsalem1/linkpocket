<div class="col-md-6">
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {!! Form::text("title", null, [
            'class' => 'form-control input-lg',
            'placeholder' => 'Title',
            'required'
            ]) !!}
            @if ($errors->has('title'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('title') }}</strong>
            </span>
            @endif
    </div> 

    <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
            {!! Form::textarea("link", null, [
            'class' => 'form-control',
            'placeholder' => 'Link url [www.exmple.com]'
            ]) !!}
            @if ($errors->has('link'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('link') }}</strong>
            </span>
            @endif
            </div>
    @if(!empty($pockets))
    <div class="form-group{{ $errors->has('pocket_id') ? ' has-error' : '' }}">                              
        {!! Form::select("pocket_id", $pockets, null, [
            'class' => 'form-control input-lg dbType'
            ]) !!}  
        @if ($errors->has('pocket_id'))
        <span class="help-block">
            <strong style="color:red">{{ $errors->first('pocket_id') }}</strong>
        </span>
        @endif
                               
    </div>
    @endif
    
   
    <button class="btn btn-danger input-lg" style="width:150px" type="submit">Done</button>
</div>
                      
                            
                    