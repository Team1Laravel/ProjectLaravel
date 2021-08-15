

<div class="container">
	<div class="row">
		@csrf
		<div class="d-flex justify-content-center">
			<button onclick="responseOrder('ok')" class="btn btn-success">Accept</button>
			<button onclick="responseOrder('')" class="btn btn-danger">Cancel</button>
		</div>
	</div>
</div>
 <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.js" integrity="sha512-PU5S6BA03fRv1Q5fpwXjg5nlRrgdoguZ74urFInkbABMCENyx5oP3hrDzYMMPh3qdLdknIvrGj3yqZ4JuU7Nag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       		 
<script>
	function responseOrder(action){
		switch(action){
			case '':
				$.ajax({
        		url :  "billaccecpt",
        		method: "POST",
                data: {
                    _token: $("input[name=_token]").val(),
        			result: false,
                },
                success: function(result) {
                    $("div[name='tableData']").html(result);
                },
        	});
			break;
			case 'ok':
                $.ajax({
                		url :  "billaccecpt",
                		method: "POST",
                        data: {
                            _token: $("input[name=_token]").val(),
                			result: true,
                        },
                        success: function(result) {
                            $("div[name='tableData']").html(result);
                        },
                	});
			break;
		}
	}

</script>
