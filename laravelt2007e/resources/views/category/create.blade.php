<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Insert title here</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
    <body>
    <div class="container">
    	<h1>Thêm mới chuyên ngành</h1>
    	<!-- 
    	- trong blade:
    	sử dụng hàm url('<uri>') của 1 route
    	sử dụng hàm route('<name>') của 1 route để điều hướng
    	 -->
    	<form action = "{{ route ('category.themmoi')}}" method = "post">
    		@csrf
    		<div class="form-group">
    			<label>Ma cn:</label>
    			<input type="text" class="form-control" name="code"/>
    		</div>
    		<div class="form-group">
    			<label>Ten cn:</label>
    			<input type="text" class="form-control" name="name"/>
    		</div>
    		<button type="submit" class="btn btn-primary">Them moi</button>
    		<button type="reset" class="btn btn-danger">Lam trang</button>
    	</form>
    </div>
    </body>
</html>