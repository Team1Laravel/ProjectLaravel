<?php
use Illuminate\Support\Facades\Auth;
use App\Models\User;

$subcribe = User::all()->find(Auth::user()->id);
 ?>

<link rel="stylesheet" href="{{asset("css/buttonsubcribe.css")}}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div title="Subcribe" class="wrap">
     <button id="clicksubscribes" class="buttonsubcribe" ><img width="80%" src="<?php echo url('/') . '/img/logo.svg'; ?>"
             style="cursor:pointer"></button>
      <input id="subcribeupdate" value="{{$subcribe->isSubcribe}}" type = "hidden">
 </div>
 <script>
     $(document).ready(function() {
         $("#clicksubscribes").click(function() {
              let ratingValue = document.getElementById('subcribeupdate').value;
             
              if(ratingValue == 0)
              { 
                	ratingValue = 1;
                document.getElementById('subcribeupdate').value = 1;
                
              } 
                else 
               { 
               	ratingValue = 0;
               	document.getElementById('subcribeupdate').value = 0;
               	
            } 
            
            post2(ratingValue);
            
         });
     });
         function post2(ratingValue) {
        $.ajax({
            url: "{{route('chats.index')}}",
            method: "post",
            data: {
                "_token": $("input[name='_token']").val(),
                "_method": "post",
                subcribevalue : ratingValue,
                
            },
            success: function(res) {
            if(ratingValue)
            {
            swal("Good job!", "Subcribe successfully!", "success");
            }
            else{
            	swal("Sad job!", "Unsubcriber successfully!", "error");
            }
    			
    			
            }
        });
    }
 </script>


