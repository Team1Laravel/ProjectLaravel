
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset("css/bootstrap-reboot.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/bootstrap-grid.min.css")}}">


    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>

</head>
<body>
@csrf
    <div class="container">
        <div class="row justify-content-center">
            <div id="data">
            	@foreach ($chats as $chat)
            		<p><strong>{{$chat->author}}: </strong>{{$chat->content}}</p>
            		
            	@endforeach
            </div>
            <div class="row">
            	<div class="col">
            		<div action="{{route('chats.index')}}" method="POST" >
            			@csrf
            			<label class="form-check-label" for="name"></label>
            			<input id="content" name="content" class="form-control" value="{{old('content')}}" required="required">
            			<button onclick="post()" id="submit" class="btn btn-success" type="submit">OK</button>
            		</div>
            	</div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.js" integrity="sha512-PU5S6BA03fRv1Q5fpwXjg5nlRrgdoguZ74urFInkbABMCENyx5oP3hrDzYMMPh3qdLdknIvrGj3yqZ4JuU7Nag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
	function post(){
		$.ajax({
			url : "{{route('chats.index')}}",
			method: "post",
			data: {
				"_token": $("input[name='_token']").val(),
				"_method" : "post",
				content : $("#content").val(),
			}, 
			success : function (result){
				$("#result").html(result);	
			}
		});
	}   			
			
	var socket = io('http://localhost:6001', { transports: ['websocket', 'polling', 'flashsocket'] })
	socket.on('darkmovies_database_chat:message', function(data){
		console.log(data)
		if($("#"+data.id).length == 0){
			$("#data").append('<p><strong>'+data.author+'</strong>: '+data.content+'</p>')
		}else{
			console.log('Da co tin nhan')
		}
	})
</script>
</body>
</html>

