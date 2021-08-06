// <?php 
// use Illuminate\Support\Facades\DB;
// use App\Models\Models\Chat;
// $contacts = DB::table('chats')->where('sendto','=',Auth::user()->email)->where('author','!=',Auth::user()->email)->distinct()->get('author');
// ?>
<!-- @foreach ($contacts as $user) -->
  <div class="text-center" onclick="loadChats('{{$user->author}}')" style="cursor:pointer;min-height:45px;padding:5px;margin-bottom:3px; border-radius: 5px; border: 1px solid #dedede;"><li >{{$user->author}}</li></div>
<!-- @endforeach -->
