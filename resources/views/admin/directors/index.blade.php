<div class="col-lg-12" style="margin-top:20px;">
    <div class="block margin-bottom-sm" style="background-color:#F0F8FF;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);font-weight: bolder;">
   		<div class="title">
			<strong style="font-size:30px;">List Director</strong>
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
			@include('admin.directors.table')  			     		
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
        $("#insertDirector").submit(function(e) {
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
                    if (response.message) {
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
        // --------------------UPDATE--------------------------------
        $(".btnEdit").click(function() {
         
            const url = $(this).attr('data-url');
            $.ajax({
                type: "GET",
                url,
                success: function(res) {
                console.log(res)
                    $("#name_edit").val(res.data.name);
                    $("#store-image").html(`<img width="150px" height="150px" id="avatar" src={{asset("/img/director")}}/${res.data.image}>`)
                    $("#store-image").append(`<input type="hidden" name="hidden_image" value="${res.data.image}"/>`)
                    $("#desc_edit").val(res.data.desc);
                    $("#facebook_edit").val(res.data.facebook);
                    $("#twitter_edit").val(res.data.twitter);
                    $("#wiki_edit").val(res.data.wiki);
                    $("#formEditDirector").attr('action', '{{asset("/admin/director")}}/' + res.data.id);
                }
            })
               $("#EditModal").show();
        })

        $("#formEditDirector").submit(function(event) {
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
                        $('#EditModal').modal('hide');
                    } else {
                        $("#loginstatus").html(res.message);
                        $(".flash__icon").html('<i class="icon fa fa-times-circle"></i>');
                        $("input[name='email']").focus();
                        $(".flash").addClass("animate--drop-in-fade-out");
                        setTimeout(function() {
                            $(".flash").removeClass("animate--drop-in-fade-out");
                        }, 3500);
                    }
                },

            })

        })

    });
  
});
  // --------------------DELETE--------------------------------
    function deleteThis(url) {
        $("#deleteDirector").click(function() {
            $.ajax({
                type: "DELETE",
                url: url,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
                    let html = '';
                    $('#deleteModalDirector').modal('hide');
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
    }
    </script>
