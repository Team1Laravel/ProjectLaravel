@extends('admin.layouts.common')
@section('panel')
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {

  padding: 8px 10px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 8px;
  width: 110px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 7px;
  border-radius: 10px;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
  max-height: 590px;

}

.form-data {
  bottom: 20;
  right: 15px;
  z-index: 9;
  max-height: 400px;
  overflow-y: scroll;
}


/* Add styles to the form container */
.form-container {
  min-width: 300px;
  padding: 10px;
  background-color: #212529d9;
   max-height: 550px;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 6px 13px;
  border: none;
  cursor: pointer;
  width: 40%;
  margin-bottom:10px;
  opacity: 0.8;
}


/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

.chat {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 3px;
  margin: 3px 0;

}

.darker {
  border-color: #ccc;
  background-color: #ddd;
  margin-right: 190px;
    width: auto
}

.normal {
  margin-left: 190px;
    width: auto
}

.chat::after {
  content: "";
  clear: both;
  display: table;
}

.chat img {
  float: left;
  max-width: 30px;
  width: 30%;
  margin-right: 20px;
  border-radius: 50%;
}

.chat img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.c-checkbox {
	 display: none;
}
 .c-checkbox:checked + .c-formContainer .c-form {
	 width: 180%;
}
 .c-checkbox:checked + .c-formContainer .c-form__toggle {
	 visibility: hidden;
	 opacity: 0;
	 transform: scale(0.7);
}
 .c-checkbox:checked + .c-formContainer .c-form__input, .c-checkbox:checked + .c-formContainer .c-form__buttonLabel {
	 transition: 0.2s 0.1s;
	 visibility: visible;
	 opacity: 1;
	 transform: scale(1);
}
 .c-checkbox:not(:checked) + .c-formContainer .c-form__input:required:valid ~ .c-form__toggle::before, .c-checkbox:checked + .c-formContainer .c-form__input:required:valid ~ .c-form__toggle::before {
	 content: 'Thank You! \1F60A';
}
 .c-checkbox:not(:checked) + .c-formContainer .c-form__input:required:valid ~ .c-form__toggle {
	 pointer-events: none;
	 cursor: default;
}
 .c-formContainer, .c-form, .c-form__toggle {
	 width: 15em;
	 height: 3.25em;
}
 .c-formContainer {
	 position: relative;
	 font-weight: 700;
}
 .c-form, .c-form__toggle {
	 position: absolute;
	 border-radius: 6.25em;
	 background-color: #fff;
	 transition: 0.2s;
}
 .c-form {
	 transform: translateX(-50%);
	 padding: 0.625em;
	 box-sizing: border-box;
	 box-shadow: 0 0.125em 0.3125em rgba(0, 0, 0, 0.3);
	 display: flex;
	 justify-content: center;
}
 .c-form__toggle {
	 color: #ff7b73;
	 top: 0;
	 cursor: pointer;
	 z-index: 1;
	 display: flex;
	 align-items: center;
	 justify-content: center;
}
 .c-form__toggle::before {
	 font-size: 1.75em;
	 content: attr(data-title);
}
 .c-form__input, .c-form__button {
	 font: inherit;
	 border: 0;
	 outline: 0;
	 border-radius: 3em;
	 box-sizing: border-box;
}
 .c-form__input, .c-form__buttonLabel {
	 font-size: 1.75em;
	 opacity: 0;
	 visibility: hidden;
	 transform: scale(0.7);
	 transition: 0s;
}
 .c-form__input {
	 //color: #fcc;
	 height: 100%;
	 width: 100%;
	 padding: 0 0.714em;
}
 .c-form__input::placeholder {
	 color: currentColor;
}
 .c-form__input:required:valid {
	 color: #ff7b73;
}
 .c-form__input:required:valid + .c-form__buttonLabel {
	 color: #fff;
}
 .c-form__input:required:valid + .c-form__buttonLabel::before {
	 pointer-events: initial;
}
 .c-form__buttonLabel {
	 color: #ffaea9;
	 height: 100%;
	 width: auto;
}
 .c-form__buttonLabel::before {
	 content: '';
	 position: absolute;
	 width: 100%;
	 height: 100%;
	 pointer-events: none;
	 cursor: pointer;
}
 .c-form__button {
	 color: inherit;
	 padding: 0;
	 top : 10px;
	 height: 80%;
	 width: 2.5em;
	 background-color: #ff7b73;
}
  .c-form__button:hover{
	 background-color: red;
}




</style>

    <div class="col-lg-12" style="margin-top:20px;">
        <div class="block margin-bottom-sm"
             style="background-color:#222222;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);font-weight: bolder;">
            </div>
            <div  class="table-responsive">

            	<div class="col-md-12 col-xs-12 row">
            		<div class="col-md-3 col-xs-3 text-center" style="overflow: auto">
            		<div class="form-inline">
            		
            		<input type="text" style="width: 180px; border-radius: 10px"  name="inputFind" class="form-control form-inline" value="" placeholder="Find" autofocus>
            		<button type="submit" class="btn btn-warning" style="cursor:pointer" >
            			<i class="fas fa-search fa"></i>
            		</button>       		
            			
            		</div>
            			<h1>Messages</h1>
            			@csrf
            			<ul class="list-unstyled text-center" id="reload">
                			
                    		@include('admin.loadinbox')
                        </ul>
            		</div>
            		<div class="col-md-7 col-xs-7 " style=" max-height: 350px; border-radius: 5px; border: 1px solid #dedede;">
            			<div id="chats" style="overflow: auto; max-height: 280px;"></div>
            			<span id="sendbox">
            			</span>
            		</div>
            	</div>
                
            </div>
            <hr>
            <div class="d-flex justify-content-center align-items-center">

            </div>
        </div>
              @endsection
              <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.js" integrity="sha512-PU5S6BA03fRv1Q5fpwXjg5nlRrgdoguZ74urFInkbABMCENyx5oP3hrDzYMMPh3qdLdknIvrGj3yqZ4JuU7Nag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  
       <script>
       		var author1 = '';
    	    $(document).keypress(function(event) {
                var keycode = event.keyCode || event.which;
                if(keycode == '13') {
                    post(author1);
                    $("#reload").load('<?php echo url('/').'/loadinbox.blade.php';?>');
                }
            });
  
       	function loadChats(author){
   			$(".abcd").each(function(e){
				$(this).find("strong").remove()
												
			})
       		author1 = author;
       		
       		$.ajax({
    			url : "{{url('getmessages')}}",
    			method: "post",
    			data: {
    				"_token": $("input[name='_token']").val(),
    				"_method" : "post",
    				author: author
    			}, 
    			success : function (result){
    				let html = '';
    				for(let data of result){
        				if('{{Auth::user()->email}}' == data.author){			
                			html += '<div class="chat normal">';
                			html += '<img src="<?php echo url('/').'/img/users/nonavata.png';?>" alt="Avatar" class="right">';
                		
                			html += '<p>'+data.content+'</p></div>';                			               			
            			}else if('{{Auth::user()->email}}' == data.sendto){
            				html += '<div class="chat darker">';
                			html += '<img src="<?php echo url('/').'/img/users/nonavata.png';?>" alt="Avatar">';
                			html += '<p>'+data.content+'</p></div>';
                			sendto = data.author;
                			//console.log("aaaaa: "+sendto);
            			}
    				}
    				let html2 = '<div class="form-group form-inline" style="margin-top: 10px;">';
            		html2 += '<input class="c-checkbox" type="checkbox" id="checkbox">';
            		html2 += '<div class="c-formContainer">';
              		html2 += '<div class="c-form d-flex justify-content-center" style=" position: relative; z-index: 2;left:85%;float: left">';
                	html2 += '<input autofocus  id="content" name="content"  class="c-form__input" placeholder="..." type="email" pattern="[A-Za-z0-9._%+-]" required>';
                	html2 += '<label class="c-form__buttonLabel" for="checkbox">';
                  	html2 += '<button onclick="post('+"'"+author+"'"+')"';
                  	html2 +=  'class="c-form__button" type="button" style="font-size:18px">Send</button></label>';                
                	html2 += '<label class="c-form__toggle" for="checkbox"  data-title="Start"></label>';
             		html2 += '</div></div></div>';
					$("#reload").load('<?php echo url('/').'/loadinbox.blade.php';?>');
					$("#sendbox").html(html2);
		      				
    				$("#chats").html(html);
    				
    				$(function () {
           	 			$("div, #sendbox").animate({
            			scrollTop: $('#chats, hr').get(0).scrollHeight}, 1000);});
        			}
        			
    		});
       	}
       		function post(author){
       		if($("#content").val() == null || $("#content").val() == ''){
       		$("#content").focus();
				return;
			}
    		$.ajax({
    			url : "{{route('chats.index')}}",
    			method: "post",
    			data: {
    				"_token": $("input[name='_token']").val(),
    				"_method" : "post",
    				content : $("#content").val(),
    				sendto: author
    			}, 
    			success : function (result){
    				$("#result").html(result);	
    				
    			}
    		});
    		$("#content").focus();
    			$("#content").val('');
    	}   
    	var socket = io('http://localhost:6001', { transports: ['websocket', 'polling', 'flashsocket'] })
		socket.on('darkmovies_database_chat:message', function(data){
		if($("#"+data.id).length == 0){
			var html = "";
			if('{{Auth::user()->email}}' == data.author){			
    			html += '<div class="chat normal">';
    			html += '<img src="<?php echo url('/').'/img/users/nonavata.png';?>" alt="Avatar" class="right">';
    			html += '<p>'+data.content+'</p></div>';
    			
			}else if(data.author == author1){
				html += '<div class="chat darker">';
    			html += '<img src="<?php echo url('/').'/img/users/nonavata.png';?>" alt="Avatar">';
    			html += '<p>'+data.content+'</p></div>';
    			$.ajax({
    			url : "{{url('getmessages')}}",
    			method: "post",
    			data: {
    				"_token": $("input[name='_token']").val(),
    				"_method" : "post",
    				author: author1,
    				isRead: 'true'
    			},}); 
			}else{			
				$("#reload").load('<?php echo url('/').'/loadinbox.blade.php';?>');
			}
			$("#chats").append(html);
			$(function () {
           	 			$("div, #sendbox").animate({
            			scrollTop: $('#chats, hr').get(0).scrollHeight}, 1000);});
            			
			
		}else{
			console.log('Da co tin nhan')
		}
	})
       </script>
