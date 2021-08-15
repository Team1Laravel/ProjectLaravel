<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>Insert title here</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
    <body>
    <div class="container">
    	<h1>Sửa chuyên ngành</h1>
    	<!-- 
    	- trong blade:
    	sá»­ dá»¥ng hÃ m url('<uri>') cá»§a 1 route
    	sá»­ dá»¥ng hÃ m route('<name>') cá»§a 1 route Ä‘á»ƒ Ä‘iá»�u hÆ°á»›ng
    	 -->
    	<form action = "{{ route ('category.capnhat')}}" method = "post">
    		@csrf
    		@method('put')
    		<input type="hidden" name="id" value="{{ $chuyennganh->id }}"/>
    		<div class="form-group">
    			<label>Ma cn:</label>
    			<input type="text" class="form-control" name="code" value="{{ $chuyennganh->code }}"/>
    		</div>
    		<div class="form-group">
    			<label>Ten cn:</label>
    			<input type="text" class="form-control" name="name" value="{{ $chuyennganh->name }}"/>
    		</div>
    		<button type="submit" class="btn btn-primary">Cập nhật</button>
    	</form>
    </div>
    </body>
</html>