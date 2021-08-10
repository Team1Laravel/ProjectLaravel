<?php
use App\Models\ViewMovie;
use Illuminate\Support\Facades\DB;
use App\Models\MovieGenre;
$genres1 = DB::select('select * from genres');
?>
<div class="col-lg-12" style="margin-top:20px;">
    <div class="block margin-bottom-sm"
        style="background-color:#F0F8FF;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);font-weight: bolder;">
        <div class="title">
            <strong style="font-size:30px;">List Movies</strong>
        </div>
        <div class="row form-group form-inline">

            <div class="col-md-4 col-lg-4 col-xs-4">
                <div class="col-md-10" style=" ;margin: 20px 0">
                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-xs-4">
                <button style=";margin: 20px 0" type="button" class="btn btn-success" data-toggle="modal"
                    data-target="#InsertModal">
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
            @include('admin.movies.table')
        </div>
    </div>
</div>
<script type="text/javascript">
    //     $("#ishide").click(function(){
    //     	let val = $("#onoffishide").val();
    //     	if(val == ""){
    //     		$("#onoffishide").val(1);
    //     		$("#onoffishide").attr("checked","checked");

    //     	}else if(Number(val) == 1){
    //     		$("#onoffishide").val('1');
    //     		$("#onoffishide").attr("checked","checked");
    //     	}else{
    //     		$("#onoffishide").val('0');
    //     		$("#onoffishide").removeAttr("checked");

    //     	}

    //     })

    // add row in edit blade
    $("#addRow_u").click(function() {
        let allGenresjs = '<?php echo json_encode($genres1); ?>';
        let allGenres = JSON.parse(allGenresjs);
        let html = '';
        html += '<div id="inputFormRow_u">';
        html += '<div class="input-group mb-3">';
        html += '<select name="genre_id_u[]" id="genre_id_u" class="form-control" required="required">';
        html += '<option value="">Select genre</option>'
        for (const tmp of allGenres) {
            html += '<option value="' + tmp.id + '">' + tmp.name + '</option>'
        }
        html += '</select>';
        html += '<div class="input-group-append"> ';
        html += '<button id="removeRow_u" type="button" class="btn btn-danger">Remove</button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $('#newRow_u').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow_u', function() {
        let numItems = $('select[name="genre_id_u[]"]').length;
        if (numItems > 1) {
            $(this).closest('#inputFormRow_u').remove();
        }
    });
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        // --------------------UPDATE--------------------------------
        $(".btnEdit").click(function() {

            const url = $(this).attr('data-url');
            $.ajax({
                type: "GET",
                url,
                success: function(res) {

                    $("#name_edit").val(res.data.name);
                    $("#store-image").html(
                        `<img width="150px" height="150px" id="avatar" src={{ asset('/img/writers') }}/${res.data.image}>`
                    )
                    $("#store-image").append(
                        `<input type="hidden" name="hidden_image" value="${res.data.image}"/>`
                    )
                    let htmlmg = '';
                    let allGenresjs = '<?php echo json_encode($genres1); ?>';
                    let allGenres = JSON.parse(allGenresjs);
                    console.log(allGenres)
                    for (const val of res.moviegenres) {
                        htmlmg += '<div id="inputFormRow_u">';
                        htmlmg += '<div class="input-group mb-3">';
                        htmlmg +=
                            '<select name="genre_id_u[]" id="genre_id_u" class="form-control" required="required">';
                        htmlmg += '<option value="">Select genre</option>'
                        for (const tmp of allGenres) {
                            if (val.id === tmp.id) {
                                htmlmg += '<option value="' + tmp.id + '" selected>' + tmp
                                    .name + '</option>'
                            } else {
                                htmlmg += '<option value="' + tmp.id + '">' + tmp.name +
                                    '</option>'
                            }
                        }
                        htmlmg += '</select>';
                        htmlmg +=
                            '<div class="input-group-append"><button id="removeRow_u" type="button" class="btn btn-danger">Remove</button></div></div></div>';
                    }
                    $("#genre_edit").html(htmlmg);
                    $("#director_edit").val(res.data.director_id);
                    $("#writer_edit").val(res.data.writer_id);
                    $("#year_edit").val(res.data.year);
                    $("#desc_edit").val(res.data.desc);
                    $("#keyword_edit").val(res.data.keyword);
                    $("#video_link_edit").val(res.data.video_link);
                    $("#premiere_edit").val(res.data.premiere)
                    $("#quality_edit").val(res.data.quality);
                    $("#age_limit_edit").val(res.data.age_limit);
                    $("#country_edit").val(res.data.country);
                    $("#formEditMovie").attr('action', '{{ asset('/admin/movies') }}/' +
                        res
                        .data.id);
                }
            })
        })

        $("#formEditMovie").submit(function(event) {
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

                }
            });

        });


        // --------------------DELETE--------------------------------
        $(".btnDelete").click(function() {
            const url = $(this).attr('data-url');
            $("#deleteMovie").click(function() {
                $.ajax({
                    type: "DELETE",
                    url,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {

                        let html = '';
                        if (res.success) {
                            $('#DeleteModal').modal('hide');
                            $("#loginstatus").html(res.message);
                            $(".flash__icon").html(
                                '<i class="icon fa fa-check-circle"></i>');
                            $(".flash").addClass("animate--drop-in-fade-out");
                            setTimeout(function() {
                                $(".flash").removeClass(
                                    "animate--drop-in-fade-out");
                            }, 5500);
                            setTimeout(function() {
                                if (pageCurrent == null || isNaN(
                                        pageCurrent)) {
                                    fetch_datas(1);
                                } else {
                                    fetch_datas(pageCurrent);
                                }
                            }, 1000);
                        } else {
                            $("#loginstatus").html(res.message);
                            $(".flash__icon").html(
                                '<i class="icon fa fa-times-circle"></i>');
                            $("input[name='name']").focus();
                            $(".flash").addClass("animate--drop-in-fade-out");
                            setTimeout(function() {
                                $(".flash").removeClass(
                                    "animate--drop-in-fade-out");
                            }, 3500);
                        }
                    }
                })
            })
        })

        // --------------------INSERT--------------------------------
        $("#InsertForm").submit(function(e) {
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


                    if (response.success) {
                        $('#InsertModal').modal('hide');
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
                    } else {
                        $("#loginstatus").html(response.message);
                        $(".flash__icon").html('<i class="icon fa fa-times-circle"></i>');
                        $("input[name='name']").focus();
                        $(".flash").addClass("animate--drop-in-fade-out");
                        setTimeout(function() {
                            $(".flash").removeClass("animate--drop-in-fade-out");
                        }, 3500);
                    }

                }
            });
        });
    });
</script>
