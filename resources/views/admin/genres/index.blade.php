<div class="col-lg-12" style="margin-top:20px;">
    <div class="block margin-bottom-sm" style="background-color:#F0F8FF;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);font-weight: bolder;">
   		<div class="title">
			<strong style="font-size:30px;">List Genre</strong>
		</div>
        <div class="row form-group form-inline">
          
            <div class="col-md-4 col-lg-4 col-xs-4">
                <div class="col-md-10" style=" ;margin: 20px 0">
                	<input class="form-control" id="myInput" type="text" placeholder="Search..">
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-4">
            	<button style=";margin: 20px 0" type="button" class="btn btn-success" data-toggle="modal" data-target="#InsertModal">
            	Add new &nbsp;<i class="fa fa-plus-circle"></i></button> 
        
            </div>  
        </div>            
        <div class="flash">
  			<div class="flash__icon">
    			<i class="icon fa fa-check-circle"></i>
  			</div>
  			<p id="loginstatus" class="flash__body"></p>
		</div>
        <div id="loadTable">    		
			@include('admin.genres.table')  			     		
		</div>	                              
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    let pageCurrent = localStorage.getItem('pageCurrent');
    $(document).on('click', ".page-link", function(event) {
        event.preventDefault();
        event.stopPropagation();
        event.stopImmediatePropagation();
        let page = $(this).attr('href').split('page=')[1];
        localStorage.setItem('pageCurrent', page);
        fetch_datas(page);
    });

    function fetch_datas(page) {
        var _token = $("input[name=_token]").val();
        $.ajax({
            url: "{{ url('admin/fetch') }}",
            method: "POST",
            data: {
                _token: _token,
                page: page,
                table: $("#table").val(),
            },
            cache: false,
            success: function(data) {
                $("#mainData").html(data);
            },
        });
    }

    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~```````
 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    // --------------------INSERT--------------------------------
    $("#formInsert").submit(function(e) {
        e.preventDefault();
        const url = $(this).attr("action");
        const formData = new FormData(this);

        $.ajax({
            url,
            method: "POST",
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,

            success: function(response) {
                console.log(response);
                let html = '';
                if (response.success) {
                    $("#loginstatus").html(response.message);
                    $(".flash__icon").html('<i class="icon fa fa-check-circle"></i>');
                    $(".flash").addClass("animate--drop-in-fade-out");
                    setTimeout(function() {
                        $(".flash").removeClass("animate--drop-in-fade-out");
                    }, 5500);
                    setTimeout(function() {
                        if (pageCurrent == null || isNaN(pageCurrent)) {
                                fetch_datas(1);
                            } else {
                                fetch_datas(pageCurrent);
                            }
                    }, 1000);
                     $('#InsertModal').modal('hide');
                } else {
                    $("#loginstatus").html(response.message);
                    $(".flash__icon").html('<i class="icon fa fa-times-circle"></i>');
                    $("input[name='name']").focus();
                    $(".flash").addClass("animate--drop-in-fade-out");
                    setTimeout(function() {
                        $(".flash").removeClass("animate--drop-in-fade-out");
                    }, 3500);
                }
                $('body').prepend(html);
            }
        });
    });

	$("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    // --------------------UPDATE--------------------------------
    $(".btnEdit").click(function() {
        $('editGenreModal').modal('show');
        const url = $(this).attr('data-url');
        $.ajax({
            type: "GET",
            url,
            success: function(res) {
                $("#name_update").val(res.data.name);
                $("#formEditGenre").attr('action', '{{asset("/admin/genre")}}/' + res.data.id);
            }
        })
    })

    $("#formEditGenre").submit(function(event) {
        event.preventDefault();
        const url = $(this).attr("action");
        const formData = new FormData(this);
        $.ajax({
            url,
            method: "POST",
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,

            success: function(res) {
                console.log(res);
                if (res.success) {
                    $("#loginstatus").html(res.message);
                    $(".flash__icon").html('<i class="icon fa fa-check-circle"></i>');
                    $(".flash").addClass("animate--drop-in-fade-out");
                    setTimeout(function() {
                        $(".flash").removeClass("animate--drop-in-fade-out");
                    }, 5500);
                    setTimeout(function() {
                        if (pageCurrent == null || isNaN(pageCurrent)) {
                                fetch_datas(1);
                            } else {
                                fetch_datas(pageCurrent);
                            }
                    }, 1000);
                    $('#editGenreModal').modal('hide');
                } else {
                    $("#loginstatus").html(res.message);
                    $(".flash__icon").html('<i class="icon fa fa-times-circle"></i>');
                    $("input[name='email']").focus();
                    $(".flash").addClass("animate--drop-in-fade-out");
                    setTimeout(function() {
                        $(".flash").removeClass("animate--drop-in-fade-out");
                    }, 3500);
                }
            }
        })

    })

    // --------------------DELETE--------------------------------
    $(".btnDelete").click(function() {
        const url = $(this).attr('data-url');
        $("#deleteGenre").click(function() {
            $.ajax({
                type: "DELETE",
                url,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
                    console.log(res)
                    let html = '';
                    if (res.success) {
                        $("#loginstatus").html(res.message);
                        $(".flash__icon").html('<i class="icon fa fa-check-circle"></i>');
                        $(".flash").addClass("animate--drop-in-fade-out");
                        setTimeout(function() {
                            $(".flash").removeClass("animate--drop-in-fade-out");
                        }, 5500);
                        setTimeout(function() {
                            if (pageCurrent == null || isNaN(pageCurrent)) {
                                fetch_datas(1);
                            } else {
                                fetch_datas(pageCurrent);
                            }
                        }, 1000);
                        $('#DeleteModal').modal('hide');
                    } else {
                        $("#loginstatus").html(res.message);
                        $(".flash__icon").html('<i class="icon fa fa-times-circle"></i>');
                        $("input[name='name']").focus();
                        $(".flash").addClass("animate--drop-in-fade-out");
                        setTimeout(function() {
                            $(".flash").removeClass("animate--drop-in-fade-out");
                        }, 3500);
                    }
                }
            })
        })
    })

});
});
</script>
