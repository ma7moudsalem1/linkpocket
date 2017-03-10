<div class="col-md-6">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::text("name", null, [
            'class' => 'form-control input-lg',
            'placeholder' => 'Write Name',
            'required'
            ]) !!}
            @if ($errors->has('name'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('name') }}</strong>
            </span>
            @endif
    </div> 

    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            {!! Form::text("username", null, [
            'class' => 'form-control input-lg',
            'placeholder' => 'Write Username',
            'required'
            ]) !!}
            @if ($errors->has('username'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('username') }}</strong>
            </span>
            @endif
            </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::email("email", null, [
            'class' => 'form-control input-lg',
            'placeholder' => 'Write E-mail',
            'required'
            ]) !!}
            @if ($errors->has('email'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('email') }}</strong>
            </span>
            @endif
    </div>

    <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
            {!! Form::textarea("bio", null, [
            'class' => 'form-control input-lg',
            'placeholder' => 'Write Bio'
            ]) !!}
            @if ($errors->has('bio'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('bio') }}</strong>
            </span>
            @endif
    </div>

    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            {!! Form::select("gender", getGender(), null, [
            'class' => 'form-control input-lg'
            ]) !!}                              
       
        @if ($errors->has('gender'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('gender') }}</strong>
            </span>
        @endif
                               
    </div>
    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">                              
        {!! Form::select("type", userType(), null, [
            'class' => 'form-control input-lg'
            ]) !!}  
        @if ($errors->has('type'))
        <span class="help-block">
            <strong style="color:red">{{ $errors->first('type') }}</strong>
        </span>
        @endif
                               
    </div>
    @if(!isset($user))
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Write Your Password" required>
            @if ($errors->has('password'))
            <span class="help-block">
                <strong style="color:red">{{ $errors->first('password') }}</strong>
            </span>
            @endif    
    </div>
    <div class="form-group">
        <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" placeholder="Confirm Password" required>
    </div>
    @endif
    <button class="btn btn-danger input-lg" style="width:150px" type="submit">Done</button>
</div>
                      
                            
                    