@if(! Auth::guest())
  @if($pocket->type == 0)
    <a href="#" id="share" data-target="{{ $pocket->id }}" class="btn btn-default pull-right" style="margin-left:5px"><i class="fa fa-share" aria-hidden="true"></i></a>
    <a href="#" id="addmark" data-target="{{ $pocket->id }}" class="btn btn-default pull-right"><i class="fa fa-bookmark" aria-hidden="true"></i></a>
 <br /><br />
  @endif
 @endif
<div class="list-group product-bread-a" id="desc">
  <span class="list-group-item product-bread-a">{{ $pocket->descrip == '' ? 'No Description found' : $pocket->descrip }}</span>
</div>  
<ul class="list-group product-category-all">
  @forelse($links as $link)
    <li class="list-group-item">
    	
        <i class="fa fa-link"></i> . <a href="{{ chackUrl($link->link) }}" target="_blank">{{ $link->title }}</a>
        @if(! Auth::guest() && Auth::user()->id == $link->pocket->user_id)
        <a href="{{ url('/links/'.$link->id.'/delete') }}" class="pull-right confirmation"><i class="fa fa-trash-o icon-data"></i></a>
        <a href="{{ url('/links/'.$link->id.'/edit') }}" class="pull-right"><i class="fa fa-edit icon-data"></i></a>
        @endif
    </li>
    @empty
     <li class="list-group-item">Oops !! There isn't link found</li>
  @endforelse
</ul>
<div class="text-center" style="margin-bottom:50px">{{ $links->links() }}</div>