<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Kapella Bootstrap Admin Dashboard Template</title>
      <!-- base:css -->
      <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
      <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css')}}">
      <!-- endinject -->
      <!-- plugin css for this page -->
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="{{ asset('admin/css/newstyle.css')}}">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
      <!-- endinject -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="{{asset('admin/css/flashmessage.css')}}">
      <link rel="stylesheet" href="{{ asset('admin/css/style.edit.css') }}">
      <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" crossorigin="anonymous">
   </head>
   <body>

      <div class="container-scroller">
         <div id="bannerClose" class="btn border-0 p-0">
         </div>
         <!-- partial:partials/_horizontal-navbar.html -->
         <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
               <div class="container-fluid">
                  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                     <ul class="navbar-nav navbar-nav-left">
                        <li class="nav-item ml-0 mr-5 d-lg-flex d-none">
                           <a href="#" class="nav-link horizontal-nav-left-menu"><i class="mdi mdi-format-list-bulleted"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                           <i class="mdi mdi-bell mx-0"></i>
                           <span class="count bg-success">2</span>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                              <a class="dropdown-item preview-item">
                                 <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                       <i class="mdi mdi-information mx-0"></i>
                                    </div>
                                 </div>
                                 <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                       Just now
                                    </p>
                                 </div>
                              </a>
                              <a class="dropdown-item preview-item">
                                 <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                       <i class="mdi mdi-settings mx-0"></i>
                                    </div>
                                 </div>
                                 <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                       Private message
                                    </p>
                                 </div>
                              </a>
                              <a class="dropdown-item preview-item">
                                 <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                       <i class="mdi mdi-account-box mx-0"></i>
                                    </div>
                                 </div>
                                 <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                       2 days ago
                                    </p>
                                 </div>
                              </a>
                           </div>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown"  data-toggle="dropdown">
                           <i class="mdi mdi-email mx-0"></i>
                           		<div id="loadNocticemess">
                           			@include('admin.inbox.messagenotice')
                           		</div>                                                      		
                           </a>
                           <div  class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                              <div id="loadInboxs" >
                                  
                              </div> 
                           </div>
                        </li>
                        <li class="nav-item dropdown">
                           <a href="#" class="nav-link count-indicator "><i class="mdi mdi-message-reply-text"></i></a>
                        </li>
                        <li class="nav-item nav-search d-none d-lg-block ml-3">
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="search">
                                 <i class="mdi mdi-magnify"></i>
                                 </span>
                              </div>
                              <input type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="search">
                           </div>
                        </li>
                     </ul>
                     <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo" href="{{route('home')}}"><img src="{{asset('img/logo.svg')}}" alt="logo"/></a>
                        <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img src="images/logo-mini.svg" alt="logo"/></a>
                     </div>
                     <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown  d-lg-flex d-none">
                           <button type="button" class="btn btn-inverse-primary btn-sm">Product </button>
                        </li>
                        <li class="nav-item dropdown d-lg-flex d-none">
                           <a class="dropdown-toggle show-dropdown-arrow btn btn-inverse-primary btn-sm" id="nreportDropdown" href="#" data-toggle="dropdown">
                           Reports
                           </a>
                           <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="nreportDropdown">
                              <p class="mb-0 font-weight-medium float-left dropdown-header">Reports</p>
                              <a class="dropdown-item">
                              <i class="mdi mdi-file-pdf text-primary"></i>
                              Pdf
                              </a>
                              <a class="dropdown-item">
                              <i class="mdi mdi-file-excel text-primary"></i>
                              Exel
                              </a>
                           </div>
                        </li>
                        <li class="nav-item dropdown d-lg-flex d-none">
                           <button type="button" class="btn btn-inverse-primary btn-sm">Settings</button>
                        </li>
                        <li class="nav-item nav-profile dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                           <span class="nav-profile-name">{{Auth::user()->email}}</span>
                           <span class="online-status"></span>
                           <img src="{{Auth::user()->image}}" alt="profile"/>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                              <a class="dropdown-item">
                              <i class="mdi mdi-settings text-primary"></i>
                              Settings
                              </a>
                              <a style="cursor: pointer;" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                 </form>
                                 <i class="mdi mdi-logout text-primary"></i>
                                 Logout
                              </a>
                           </div>
                        </li>
                     </ul>
                     <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                     <span class="mdi mdi-menu"></span>
                     </button>
                  </div>
               </div>
            </nav>
            <nav class="bottom-navbar">
               <div class="container">
                  <ul class="nav page-navigation">
                     <li class="nav-item">
                        <a class="nav-link" onclick="event.preventDefault(); loadChart()">
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="mdi mdi-grid menu-icon"></i>
                        <span class="menu-title">Tables</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="submenu">
                           <ul>
                              <li class="nav-item"><a class="nav-link" href="" onclick="event.preventDefault(); loadUser()">Users</a></li>
                              <li class="nav-item"><a class="nav-link" href="" onclick="event.preventDefault(); loadMovies()">Movies</a></li>
                              <li class="nav-item"><a class="nav-link" href="" onclick="event.preventDefault(); loadDirectors()">Directors</a></li>
                              <li class="nav-item"><a class="nav-link" href="" onclick="event.preventDefault(); loadWritters()">Writters</a></li>
                              <li class="nav-item"><a class="nav-link" href="" onclick="event.preventDefault(); loadGenres()">Genres</a></li>
                           </ul>
                        </div>
                     </li>
                     <li class="nav-item">
                        <a href="pages/forms/basic_elements.html" class="nav-link">
                        <i class="mdi mdi-chart-areaspline menu-icon"></i>
                        <span class="menu-title">Form Elements</span>
                        <i class="menu-arrow"></i>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="pages/icons/mdi.html" class="nav-link">
                        <i class="mdi mdi-emoticon menu-icon"></i>
                        <span class="menu-title">Icons</span>
                        <i class="menu-arrow"></i>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="mdi mdi-codepen menu-icon"></i>
                        <span class="menu-title">Sample Pages</span>
                        <i class="menu-arrow"></i>
                        </a>
                        <div class="submenu">
                           <ul class="submenu-item">
                              <li class="nav-item"><a class="nav-link" href="pages/samples/login.html">Login</a></li>
                              <li class="nav-item"><a class="nav-link" href="pages/samples/login-2.html">Login 2</a></li>
                              <li class="nav-item"><a class="nav-link" href="pages/samples/register.html">Register</a></li>
                              <li class="nav-item"><a class="nav-link" href="pages/samples/register-2.html">Register 2</a></li>
                              <li class="nav-item"><a class="nav-link" href="pages/samples/lock-screen.html">Lockscreen</a></li>
                           </ul>
                        </div>
                     </li>
                     <li class="nav-item">
                        <a href="docs/documentation.html" class="nav-link">
                        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                        <span class="menu-title">Documentation</span></a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
        
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
               <div id="mainData">
                  @include("admin.chart")
               </div>
               
            </div>
             <div id="showformChat" class="d-flex justify-content-end"></div>
            <!-- main-panel ends -->
         </div>
         
         <!-- page-body-wrapper ends -->
      </div>
      <script src="{{asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>
      <!-- endinject -->
      <!-- Plugin js for this page-->
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="{{asset('admin/js/template.js')}}"></script>
      <!-- endinject -->
      <!-- plugin js for this page -->
      <!-- End plugin js for this page -->
      <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
      <script src="{{asset('admin/vendors/progressbar.js/progressbar.min.js')}}"></script>
      <script src="{{asset('admin/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js')}}"></script>
      <script src="{{asset('admin/vendors/justgage/raphael-2.1.4.min.js')}}"></script>
      <script src="{{asset('admin/vendors/justgage/justgage.js')}}"></script>
      <!-- Custom js for this page-->
      <script src="{{asset('admin/js/dashboard.js')}}"></script>
      <script src="{{ asset('/admin/js/edit.js') }}"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.js" integrity="sha512-PU5S6BA03fRv1Q5fpwXjg5nlRrgdoguZ74urFInkbABMCENyx5oP3hrDzYMMPh3qdLdknIvrGj3yqZ4JuU7Nag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
      
      @yield('scripts')
	<script>
	var author1 = '';
         function loadMovies(){
         	 localStorage.removeItem('pageCurrent');
         	$("#mainData").load('<?php echo url('/').'/admin/movies';?>');
         }
         function loadChart(){
         	 localStorage.removeItem('pageCurrent');
         	$("#mainData").load('<?php echo url('/').'/admin/chart';?>');
         }
         function loadUser(){
         	localStorage.removeItem('pageCurrent');
         	$("#mainData").load('<?php echo url('/').'/admin/users';?>');
         }
         function loadDirectors(){
         	localStorage.removeItem('pageCurrent');
         	$("#mainData").load('<?php echo url('/').'/admin/director';?>');
         }
         function loadWritters(){
         	localStorage.removeItem('pageCurrent');
         	$("#mainData").load('<?php echo url('/').'/admin/writer';?>');
         }
         function loadGenres(){
         	localStorage.removeItem('pageCurrent');
         	$("#mainData").load('<?php echo url('/').'/admin/genre';?>');
         }
         
         $("#messageDropdown").click(function(){
         	$("#loadInboxs").load('<?php echo url('/').'/loadinbox';?>');
         })
        
         function openFormchat(email){      
         	author1 = email;  
          let idheader = email + 'header';
          let notYet = document.getElementById(email) == null;
          if(notYet){
          	let color = getRandomColor();
           const formChat = '<div id="'+email+'" style="position: absolute;z-index: 9;background-color: #f1f1f1;text-align: center;border: 1px solid #d3d3d3"><div id="'+idheader+'" style="padding: 10px;cursor: move;z-index: 10; background-color: '+color+';color: #fff;">'+email+'<a onclick="closeFormchat('+"'"+email+"'"+')" data="'+email+'" style="cursor:pointer" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspX</a></div><div id="'+email+'chats" style="overflow-x:hidden;overflow-y:auto;max-height:300px;"></div><span id="'+email+'sendbox" style="position:relative"></span></div>';       	
         	$("#showformChat").append(formChat);
         	loadChatsbyemail(email);
         	dragElement(document.getElementById(email)); 
         	$("#loadInboxs").load('<?php echo url('/').'/loadinbox';?>');
          }              
         }
               
        function loadChatsbyemail(email){
        	
        	$.ajax({
    			url : "{{url('getmessages')}}",
    			method: "post",
    			data: {
    				"_token": $("input[name='_token']").val(),
    				"_method" : "post",
    				author: email
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
            			}
    				}
    				let html2 = '<div class="form-group form-inline" style="margin-top: 10px;">';
            		html2 += '<input id="'+email+'content" class="form-control" onclick="setcurrentEmail('+"'"+email+"'"+')" type="text"><button onclick="post('+"'"+email+"'"+')" class="btn btn-primary" ><i class="far fa-paper-plane"></i></button>';
             		html2 += '</div>';
					$("#loadInboxs").html('<?php echo url('/').'/loadinbox.blade.php';?>');
					let senboxid = email+'sendbox';
					let chatsid = email+'chats';		
    				document.getElementById(chatsid).innerHTML  = html;
					document.getElementById(senboxid).innerHTML  = html2;		      		
                    var elem = document.getElementById(chatsid);
                    elem.scrollTop = elem.scrollHeight; 			
    		}});
    		$("#loadNocticemess").load('<?php echo url('/').'/loadnoticemess';?>');	
        };
        
	    $(document).keypress(function(event) {
            var keycode = event.keyCode || event.which;
            if(keycode == '13') {
                post(author1);
               
            }
        });
        function setcurrentEmail(email){
        	author1 = email;
        	console.log(author1);
        }
          function post(author){
          author1 = author;
          	let idInput = author + 'content';
       		let content = document.getElementById(idInput).value;
       		if(content.length < 1){
       			document.getElementById(idInput).focus();
       			return;
       		}
    		$.ajax({
    			url : "{{route('chats.index')}}",
    			method: "post",
    			data: {
    				"_token": $("input[name='_token']").val(),
    				"_method" : "post",
    				content : content,
    				sendto: author
    			}, 
    			success : function (result){
    				document.getElementById(idInput).value = ''; 	
    				document.getElementById(idInput).focus();			
    			}
    		});
    		$("#loadNocticemess").load('<?php echo url('/').'/loadnoticemess';?>');	
    	}  
        function closeFormchat(email){
        	document.getElementById(email).remove();
        }
        function getRandomColor() {
          var letters = '0123456789ABCDEF';
          var color = '#';
          for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
          }
          return color;
        }
        
         function dragElement(elmnt) {
          var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
          if (document.getElementById(elmnt.id + "header")) {
            /* if present, the header is where you move the DIV from:*/
            document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
          } else {
            /* otherwise, move the DIV from anywhere inside the DIV:*/
            elmnt.onmousedown = dragMouseDown;
          }
        
          function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
          }
        
          function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
          }
        
          function closeDragElement() {
            /* stop moving when mouse button is released:*/
            document.onmouseup = null;
            document.onmousemove = null;
          }
        }
        
        var socket = io('http://localhost:6001', { transports: ['websocket', 'polling', 'flashsocket'] })
		socket.on('darkmovies_database_chat:message', function(data){
		if($("#"+data.id).length == 0){
			let html = "";
			let chatsid = '' ;
			if('{{Auth::user()->email}}' == data.author){			
    			html += '<div class="chat normal">';
    			html += '<img src="<?php echo url('/').'/img/users/nonavata.png';?>" alt="Avatar" class="right">';               		
    			html += '<p>'+data.content+'</p></div>';    
    			chatsid = data.sendto+'chats' 
			}else{	
				html += '<div class="chat darker">';
    			html += '<img src="<?php echo url('/').'/img/users/nonavata.png';?>" alt="Avatar">';
    			html += '<p>'+data.content+'</p></div>';	
    			chatsid = data.author+'chats' ;													   			   			
			}			  
			let ellll = document.getElementById(chatsid);
			if(ellll != null){
    			ellll.insertAdjacentHTML('beforeend', html);
    			var elem = document.getElementById(chatsid);
                elem.scrollTop = elem.scrollHeight; 
			}else{
			}	
			$("#loadNocticemess").load('<?php echo url('/').'/loadnoticemess';?>');					  			    						
		}});
		
      </script>
   </body>
</html>