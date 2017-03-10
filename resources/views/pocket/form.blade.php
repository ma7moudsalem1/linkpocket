

                        <label for="name">Name</label>
                        {!! Form::text("name", null, [
                            'class' => 'form-control namePocket',
                            'id'    => 'name',
                            'required'
                        ]) !!}
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                        <br />
                        <label for="descrip">Description</label>
                        {!! Form::textarea("descrip", null, [
                            'class' => 'form-control',
                            'id'    => 'descrip'
                        ]) !!}
                        @if ($errors->has('descrip'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('descrip') }}</strong>
                            </span>
                        @endif

                        <br />
                        <label for="type">Visiablty</label>
                        {!! Form::select("type", pocketType(), null, [
                            'class' => 'form-control dbType',
                            'id'    => 'dbType'
                        ]) !!} 
                        @if ($errors->has('type'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('type') }}</strong>
                            </span>
                        @endif
                        <br />
                        <div style="display:none;" id="passType">
                            <label for="password">Password</label>
                             <input id="password" type="password" class="form-control" name="password" placeholder="Write Your Password">
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('password') }}</strong>
                            </span>
                            @endif 
                        </div>  
                        <br /><br />
                        @if(! isset($links))
                        <a class="btn btn-default" href="{{ url('/') }}"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</a>
                        <button class="btn btn-primary" autocomplete="off" data-loading-text="Loading..." id="BTNupdate"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Save</button>
                        @endif