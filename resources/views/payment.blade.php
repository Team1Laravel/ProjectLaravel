@extends("layouts.common")
@section('content')
<style>
@import url(https://fonts.googleapis.com/css?family=Lato:400,300,700);


h2 {
  margin-bottom:0px;
  margin-top:25px;
  text-align:center;
  font-weight:200;
  font-size:19px;
  font-size:1.2rem;
  
}
.container-modal {
  position : relative;
  height:100%;
  -webkit-box-pack:center;
  -webkit-justify-content:center;
      -ms-flex-pack:center;
          justify-content:center;
  -webkit-box-align:center;
  -webkit-align-items:center;
      -ms-flex-align:center;
          align-items:center;
  display:-webkit-box;
  display:-webkit-flex;
  display:-ms-flexbox;
  display:flex;
}
.dropdown-select.visible {
  display:block;
}
.dropdown {
  position:relative;
}
ul {
  margin:0;
  padding:0;
}
ul li {
  list-style:none;
  padding-left:10px;
  cursor:pointer;
}
ul li:hover {
  background:rgba(255,255,255,0.1);
}
.dropdown-select {
  position:absolute;
  background:#77aaee;
  text-align:left;
  box-shadow:0px 3px 5px 0px rgba(0,0,0,0.1);
  border-bottom-right-radius:5px;
  border-bottom-left-radius:5px;
  width:90%;
  left:2px;
  line-height:2em;
  margin-top:2px;
  box-sizing:border-box;
}
.thin {
  font-weight:400;
}
.small {
  font-size:12px;
  font-size:.8rem;
}
.half-input-table {
  border-collapse:collapse;
  width:100%;
}
.half-input-table td:first-of-type {
  border-right:10px solid #DB6574;
  width:50%;
}
.window {
  height:540px;
  width:800px;
  background:#fff;
  display:-webkit-box;
  display:-webkit-flex;
  display:-ms-flexbox;
  display:flex;
  box-shadow: 0px 15px 50px 10px rgba(0, 0, 0, 0.2);
  border-radius:30px;
  z-index:10;
}
.order-info {
  height:100%;
  width:50%;
  padding-left:25px;
  padding-right:25px;
  box-sizing:border-box;
  display:-webkit-box;
  display:-webkit-flex;
  display:-ms-flexbox;
  display:flex;
  -webkit-box-pack:center;
  -webkit-justify-content:center;
      -ms-flex-pack:center;
          justify-content:center;
  position:relative;
}

.order-table td:first-of-type {
  width:25%;
}
.order-table {
    position:relative;
}
.line {
  height:1px;
  width:100%;
  margin-top:10px;
  margin-bottom:10px;
  background:#ddd;
}
.order-table td:last-of-type {
  vertical-align:top;
  padding-left:25px;
}
.order-info-content {
  table-layout:fixed;

}

.full-width {
  width:100%;
}
.pay-btn {
  border:none;
  background:#FF6347;
  line-height:2em;
  border-radius:10px;
  font-size:19px;
  font-size:1.2rem;
  color:#fff;
  cursor:pointer;
  position:absolute;
  bottom:25px;
  width:calc(100% - 50px);
  -webkit-transition:all .2s ease;
          transition:all .2s ease;
}
.pay-btn:hover {
  background:#FF6347;
    color:#eee;
  -webkit-transition:all .2s ease;
          transition:all .2s ease;
}

.total {
  margin-top:25px;
  font-size:20px;
  font-size:1.3rem;
  position:absolute;
  bottom:30px;
  right:27px;
  left:35px;
}
.dense {
  line-height:1.2em;
  font-size:16px;
  font-size:1rem;
}
.input-field {
  background:rgba(255,255,255,0.1);
  margin-bottom:10px;
  margin-top:3px;
  line-height:1.5em;
  font-size:20px;
  font-size:1.3rem;
  border:none;
  padding:5px 10px 5px 10px;
  color:#fff;va
  box-sizing:border-box;
  width:100%;
  margin-left:auto;
  margin-right:auto;
}
.credit-info {
  background:#DB6574;
  height:100%;
  width:50%;
  color:#eee;
  -webkit-box-pack:center;
  -webkit-justify-content:center;
      -ms-flex-pack:center;
          justify-content:center;
  font-size:14px;
  font-size:.9rem;
  display:-webkit-box;
  display:-webkit-flex;
  display:-ms-flexbox;
  display:flex;
  box-sizing:border-box;
  padding-left:25px;
  padding-right:25px;
  border-top-right-radius:30px;
  border-bottom-right-radius:30px;
  position:relative;
}
.dropdown-btn {
  background:rgba(255,255,255,0.1);
  width:100%;
  border-radius:5px;
  text-align:center;
  line-height:1.5em;
  cursor:pointer;
  position:relative;
  -webkit-transition:background .2s ease;
          transition:background .2s ease;
}
.dropdown-btn:after {
  content: '\25BE';
  right:8px;
  position:absolute;
}
.dropdown-btn:hover {
  background:rgba(255,255,255,0.2);
  -webkit-transition:background .2s ease;
          transition:background .2s ease;
}
.dropdown-select {
  display:none;
}
.credit-card-image {
  display:block;
  max-height:80px;
  margin-left:auto;
  margin-right:auto;
  margin-top:35px;
  margin-bottom:15px;
}
.credit-info-content {
  margin-top:25px;
  -webkit-flex-flow:column;
      -ms-flex-flow:column;
          flex-flow:column;
  display:-webkit-box;
  display:-webkit-flex;
  display:-ms-flexbox;
  display:flex;
  width:100%;
}
@media (max-width: 600px) {
  .window {
    width: 100%;
    height: 100%;
    display:block;
    border-radius:0px;
  }
  .order-info {
    width:100%;
    height:auto;
    padding-bottom:100px;
    border-radius:0px;
  }
  .credit-info {
    width:100%;
    height:auto;
    padding-bottom:100px;
    border-radius:0px;
  }
  .pay-btn {
    border-radius:0px;
  }
}
</style>

               <div class='container-modal'>
                  <div class='window'>
                    <div class='order-info' style="background-color: #2b2b31;">
                      <div class='order-info-content' >
                        <h2 style="color:white">Order Package</h2>
                            <div class='line'></div>
                           	<ul class="">
                						<li  class="price__item price__item--first"><span id="name" name="name">{{$package->name}}</span> <span id="price" name="price">${{$package->price}}</span></li>
                						<li  class="price__item"><span>{{$package->time}}</span></li>
                						<li class="price__item">{{$package->type}}</li>
                						<li class="price__item">{{$package->description}}</li>
                						<li class="price__item">{{$package->Availability}}</li>
                						<li class="price__item">{{$package->support}}</li>
                						<li class="price__item">You can even Download & watch offline.</li>
                					</ul>   
                      </div>
                    </div>
                    
                    
                    
                        <div class='credit-info'>
                        <form id="postPayment" method="post" action="{{ url('/chats') }}">
                        	@csrf
                              <div class='credit-info-content'>
                                <table class='half-input-table'>
                                  <tr><td>Please select your card: </td><td><div class='dropdown' id='card-dropdown'><div class='dropdown-btn' id='current-card'>Visa</div>
                                    <div class='dropdown-select'>
                                    <ul>
                                      <li>Master Card</li>
                                      <li>American Express</li>
                                      </ul></div>
                                    </div>
                                   </td></tr>
                                </table>
                                <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png' height='80' class='credit-card-image' id='credit-card-image'></img>
                                Card Number
                                <input name="user_id" value="{{Auth::user()->id}}" type="hidden"/>
                                <input name="package_id" value="{{$package->id}}" type="hidden"/>
                                <input minlength="16" maxlength="16" name="cardnumber" class='input-field' placeholder="Enter Card Number" pattern="[0-9]{16}" required="required"></input>
                                Card Holder
                                <input minlength="10" maxlength="50" name="name" class='input-field' placeholder="Enter Name"  required="required"></input>
                                <table class='half-input-table'>
                                  <tr>
                                    <td> Expires
                                      <input minlength="7" maxlength="7" name="expires" class='input-field' placeholder="MM/YYYY" pattern="[0-9]{2}/[0-9]{4}" required="required"></input>
                                    </td>
                                    <td>CVC
                                      <input class='input-field' minlength="3" name="CVC" maxlength="3" der="Enter Name" pattern="[0-9]{3}" required="required"></input>
                                    </td>
                                  </tr>
                                </table>
                                <div id="alert"></div>
                                <button id="btn-btnPayment" class='pay-btn'>Checkout</button>
                              </div>
                          </form>
                        </div>
                      </div>
       		 </div>
       		 
       		 <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
       		 <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.js" integrity="sha512-PU5S6BA03fRv1Q5fpwXjg5nlRrgdoguZ74urFInkbABMCENyx5oP3hrDzYMMPh3qdLdknIvrGj3yqZ4JuU7Nag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       		 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       		 
       		 <script>
       		   var d = new Date();
  				var n = d.getFullYear();
  				var m = d.getMonth();
       		 const year = n;
           		 $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
       		 $("#postPayment").submit(function(e){
				e.preventDefault();
				let expires = $("input[name='expires']").val();
				let yearsplit = expires.split("/");
				
				if(Number(yearsplit[1]) >  Number(year)+5 || Number(yearsplit[1]) < Number(year))
				{
					   $("#alert").html('<strong class="text-danger">Invalid year</strong>'); 
					   $("input[name='expires']").focus();
					   return;
				}else if(Number(yearsplit[0]) >12 || Number(yearsplit[0])<0)
				{
					$("#alert").html('<strong class="text-danger">Invalid month</strong>'); 
					   $("input[name='expires']").focus();
					   return;
				}
				if(Number(yearsplit[0]) < Number(m) && Number(yearsplit[1]) == Number(year))
				{
					$("#alert").html('<strong class="text-danger">The card has expired</strong>'); 
					   $("input[name='expires']").focus();
					   return;
				}
                const url = $(this).attr("action");
                const formData = new FormData(this);
                $.ajax({
                    url,
                    method: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(result) {
                    	       
                    }
                });
                let html = '<img style="width:50px;height:50px;" src="{{asset('img/loadding.gif')}}">Wait a for minutes';
                        $("#btn-btnPayment").html(html);    
                        $("#btn-btnPayment").attr('disabled','disabled'); 
            });
       		 	let socket2 = io('http://localhost:6001', {
                transports: ['websocket', 'polling', 'flashsocket']
           	 })
            socket2.on('darkmovies_database_resBill:message', function(data) {
             	if(data.result){
             		$("#btn-btnPayment").html('Checkout');    
                    $("#btn-btnPayment").removeAttr('disabled'); 
                     
                        
                        swal("Good job!", "Payment successfully!", "success");
                        
                        
             	}                       
             	else{
                        	swal("Sad job!", "Payment fail!", "error");
                        }
            })
       		 </script>
@endsection
