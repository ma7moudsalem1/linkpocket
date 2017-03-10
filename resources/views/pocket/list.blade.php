
@forelse($pockets as $key => $pocket)
      
  
    <div class="col-lg-3 col-sm-3" id="allbox{{ $pocket->id }}">
        <div class="panel panel-default">
            <div class="panel-body" id="pocket_main_box">
                <a href="{{ url('/pockets/'.$pocket->id.'/show') }}" class="text-center"
                data-toggle="tooltip" data-placement="bottom" title="{{ $pocket->name }}">
                    <img src="{{ GetPocketImage($pocket->type) }}" class="img-thumbnail cus img-responsive">
                </a>
            </div>
            <div class="panel-footer" data-target="{{ $pocket->id }}" id="controlBox">
               <a href="{{ url('/pockets/'.$pocket->id.'/show') }}" style="font-size:13px"
               data-toggle="tooltip" data-placement="bottom" title="{{ $pocket->name }}" >
               {{ strlen($pocket->name) > 20 ? substr($pocket->name, 0, 20).'...' : $pocket->name }}</a>
             <br />  
             @if(! Auth::guest() && Auth::user()->id == $pocket->user_id)
             <div id="control">
             <a href="{{ url('/pockets/'.$pocket->id.'/edit') }}" data-toggle="tooltip" data-placement="bottom" title="Edit pocket"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
             |  <a href="#" data-id="{{ $pocket->id }}" id="delete" class="delete" data-toggle="tooltip" data-placement="bottom" title="Delete pocket"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            <span data-target="{{ $pocket->id }}" class="id"></span>
            </div>    
                @else
                <small><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $pocket->created_at->diffForHumans() }}</small><br />
                @if(isset($shares))
                <a href="">{{ $pocket->user->name }}</a><br />
                <a href="#" sharebtn-id="{{ $pocket->id }}" id="sharebtn" class="shareBtn"><i class="fa fa-trash-o " aria-hidden="true"></i></a>
                @else
                <i class="fa fa-at share" aria-hidden="true"></i>{{ $pocket->user->username }}<br/>
                @endif
                

            @endif
            </div> 
        </div> 
    </div>
    <div class="clear"></div>
 @empty
    	<div class="alert alert-danger"><b>Oops !! </b>look like there isn't pocket to show.</div>
@endforelse 
<div class="col-md-12 text-center" style="margin-bottom:50px">{{ $pockets->links() }}</div>

