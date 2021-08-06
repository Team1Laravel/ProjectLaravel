$(document).ready(function(){

	 $(document).on('click', '.page-link', function(event){
	    event.preventDefault(); 
	    event.stopPropagation();
	    event.stopImmediatePropagation();    
	    let page = $(this).attr('href').split('page=')[1];
	    fetch_data(page);
	 });
	
	 function fetch_data(page)
	 {
	  var _token = $("input[name=_token]").val();
	  $.ajax({
	      url:"{{ url('admin/fetch') }}",
	      method:"POST",
	      data:{
	      _token:_token,
	       page:page,
	       table:$("#table").val(),
	       },
	       cache:false,
	      success:function(data)
	      {
	       	 $("#mainData").html(data);
	      },         
	    });
	 }
});
    