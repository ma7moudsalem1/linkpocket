<div class="col-md-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::text("name", null, [
            'class' => 'form-control input-lg',
            'placeholder' => 'Name',
            'required'
            ]) !!}
            @if ($errors->has('name'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('name') }}</strong>
            </span>
            @endif
    </div> 

    <div class="form-group{{ $errors->has('descrip') ? ' has-error' : '' }}">
            {!! Form::textarea("descrip", null, [
            'class' => 'form-control input-lg',
            'placeholder' => 'Description'
            ]) !!}
            @if ($errors->has('descrip'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('descrip') }}</strong>
            </span>
            @endif
            </div>

    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">                              
        {!! Form::select("type", pocketType(), null, [
            'class' => 'form-control input-lg dbType',
            'id'    => 'dbType'
            ]) !!}  
        @if ($errors->has('type'))
        <span class="help-block">
            <strong style="color:red">{{ $errors->first('type') }}</strong>
        </span>
        @endif
                               
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" id="passType" style="display:none;">
 
            <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Write Your Password">
            @if ($errors->has('password'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('password') }}</strong>
            </span>
            @endif    
    </div>
    
   
    <button class="btn btn-danger input-lg" style="width:150px" type="submit">Done</button>
</div>
                      
                            
                    