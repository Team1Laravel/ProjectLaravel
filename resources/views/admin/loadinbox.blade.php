<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Models\Chat;
//$contacts = DB::table('chats')->where('sendto','=',Auth::user()->email)->where('author','!=',Auth::user()->email)->distinct()->get(['author','isRead'])->sortBy('isRead');
$contacts =  DB::table('chats')->where('sendto','=',Auth::user()->email)->where('author','!=',Auth::user()->email)->join('users', 'users.email', '=', 'chats.author')->groupBy('author')->get(['author', 'image', 'content'])->sortByDesc('id');
$notReads = DB::select('SELECT * from V_Inbox');
$tmp;
?>

@foreach ($contacts as $chat)
	<a class="dropdown-item preview-item" onclick="openFormchat('{{$chat->author}}')">
		<div class="preview-thumbnail">
			@if (!empty($chat->image))
            	<img src="{{$chat->image}}" alt="image" class="profile-pic">
            @else
            	<img src="{{asset('img/users/nonavata.png')}}" alt="image" class="profile-pic">
            @endif
        </div>
        <div class="preview-item-content flex-grow">
            @php
    			$tmp = $chat->author;
    		@endphp
            <?php 
    		  $lastChat = DB::select("select content from chats where author = '$tmp' order by id desc limit 1");
    		?>
 	@if (!empty($notReads))
    	@foreach ($notReads as $isRead)
    		@if ($isRead->author == $chat->author)
    		<h6 class="preview-subject ellipsis font-weight-normal" style="color:blue">{{$chat->author}}</h6>
    		<p class="font-weight-light small-text text-muted mb-0"><?php echo ($lastChat[0]->content);?></p>
    		@else
    			<h6 class="preview-subject ellipsis font-weight-normal">{{$chat->author}}</h6>
    			<p class="font-weight-light small-text text-muted mb-0"><?php echo ($lastChat[0]->content);?></p>
    		@endif
    	@endforeach
    @else
    	<h6 class="preview-subject ellipsis font-weight-normal">{{$chat->author}}</h6>
    	<p class="font-weight-light small-text text-muted mb-0"><?php echo ($lastChat[0]->content);?></p>
    @endif	
		</div>
	</a>	
@endforeach