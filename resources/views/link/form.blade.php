

                        <label for="title">Title</label>
                        {!! Form::text("title", null, [
                            'class' => 'form-control',
                            'id'    => 'title',
                            'required'
                        ]) !!}
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                        <br />
                        <label for="link">Link</label>
                        {!! Form::text("link", null, [
                            'class' => 'form-control',
                            'id'    => 'link',
                            'required'
                        ]) !!}
                        @if ($errors->has('link'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('link') }}</strong>
                            </span>
                        @endif
                        <br />
                        <label for="pocket_id">Put it into</label>
                        {!! Form::select("pocket_id", $pockets, null, [
                            'class' => 'form-control'
                        ]) !!} 
                        @if ($errors->has('pocket_id'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('pocket_id') }}</strong>
                            </span>
                        @endif 
                        <br /><br />
                        <a class="btn btn-default" href="{{ url('/') }}"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</a>
                        <button class="btn btn-primary" autocomplete="off" data-loading-text="Loading..." id="BTNupdate"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Save</button>
               