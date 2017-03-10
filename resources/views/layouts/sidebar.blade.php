<div style="padding-top:50px;"> </div>
				<div class="col-lg-3 col-md-3">
					<div class="panel-group" id="accordion">
						{!! Form::open([
                          'method'  => 'POST',
                          'url'     => '/search'
                          ]) 
            			!!}
		                <div class="input-group{{ $errors->has('search') ? ' has-error' : '' }} stylish-input-group input-append">
		                    <input type="text" name="search" class="form-control" placeholder="Search..." required>
		                    <span class="input-group-addon">
		                        <button type="submit">
		                            <span class="glyphicon glyphicon-search"></span>
		                        </button>  
		                    </span>
		                    
		               	{!! Form::close() !!}

            				</div><br />
            				@if ($errors->has('search'))
				            <span class="help-block">
				                <strong style="color:red">{{ $errors->first('search') }}</strong>
				            </span>
				            @endif
					@if(Auth::guest())
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Option"><span class="glyphicon glyphicon-folder-close">
									</span>Option</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body">
									<table class="table">
										<tr>
											<td>
												<a href="{{ url('/') }}" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Home">Home</a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="{{ url('/login') }}" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="{{ getPageData(13, 'title') }}">{{ getPageData(13, 'title') }}</a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="{{ url('/register') }}" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="{{ getPageData(14, 'title') }}">{{ getPageData(14, 'title') }}</a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					@else
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" title="Pockets"><span class="glyphicon glyphicon-folder-close">
									</span>Pocktes</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body">
									<table class="table">
										<tr>
											<td>
												<span class="glyphicon glyphicon-pencil text-primary"></span><a href="{{ url('/pockets/create') }}"
												aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Add Pocket">Add Pocket</a>
											</td>
										</tr>
										<tr>
											<td>
												<span class="glyphicon glyphicon-link text-success"></span><a href="{{ url('/links/create') }}"
												aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Add Link">Add Link</a>
											</td>
										</tr>
										<tr>
											<td>
												<span class="glyphicon glyphicon-folder-open text-info"></span><a href="{{ url('/pockets') }}"
												aria-hidden="true" data-toggle="tooltip" data-placement="right" title="My Pockets">MY Pockets</a>
											</td>
										</tr>
										<tr>
											<td>
												<span class="glyphicon glyphicon-refresh text-success"></span><a href="{{ url('/pockets/share') }}"
												aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Shared Pockets">Shared Pockets</a>
												
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" title="Info"><span class="glyphicon glyphicon-file">
									</span>Info</a>
								</h4>
							</div>
							<div id="collapseFour" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tr>
											<td>
												<span class="glyphicon glyphicon-comment text-success"></span><a href="{{ url('/inbox') }}"
												aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Inbox">Inbox</a>
											</td>
										</tr>
										<tr>
											<td>
												<span class="glyphicon glyphicon-tasks"></span><a href="{{ url('/numbers') }}"
												aria-hidden="true" data-toggle="tooltip" data-placement="right" title="My Numbers">My Numbers</a>
											</td>
										</tr>
										
									</table>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" title="Account"><span class="glyphicon glyphicon-user">
									</span>Account</a>
								</h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tr>
											<td>
												<a href="{{ url('/profile/'. Auth::user()->username ) }}"
												aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Mt Profile">My Profile</a>
											</td>
										</tr>
										<tr>
											<td>
												<a href="{{ url('/account') }}"
												aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Update Profile">Update Profile</a> 
											</td>
										</tr>
										<tr>
											<td>
												<a href="{{ url('/account') }}#change-password"
												aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Change Password">Change Password</a>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>