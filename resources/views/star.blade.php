<form class="rating" method="post">
    <div id="rating">

        <input type="radio" id="star5" name="rating" value="10" onclick="postToController()" />
        <label class="full" for="star5" title="Awesome - 5 stars"></label>

        <input type="radio" id="star4half" name="rating" value="9" onclick="postToController()" />
        <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>

        <input type="radio" id="star4" name="rating" value="8" onclick="postToController()" />
        <label class="full" for="star4" title="Pretty good - 4 stars"></label>

        <input type="radio" id="star3half" name="rating" value="7" onclick="postToController()" />
        <label class="half" for="star3half" title="Meh - 3.5 stars"></label>

        <input type="radio" id="star3" name="rating" value="6" onclick="postToController()" />
        <label class="full" for="star3" title="Meh - 3 stars"></label>

        <input type="radio" id="star2half" name="rating" value="5" onclick="postToController()" />
        <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>

        <input type="radio" id="star2" name="rating" value="4" onclick="postToController()" />
        <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

        <input type="radio" id="star1half" name="rating" value="3" onclick="postToController()" />
        <label class="half" for="star1half" title="Meh - 1.5 stars"></label>

        <input type="radio" id="star1" name="rating" value="2" onclick="postToController()" />
        <label class="full" for="star1" title="Sucks big time - 1 star"></label>

        <input type="radio" id="starhalf" name="rating" value="1" onclick="postToController()" />
        <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>

    </div>
</form>
<script>
    function postToController() {
        let ratingValue = 0;
        for (i = 0; i < document.getElementsByName('rating').length; i++) {
            if (document.getElementsByName('rating')[i].checked == true) {
                ratingValue = document.getElementsByName('rating')[i].value;
                alert(ratingValue);
                break;
            }
        }
        // $.ajax({
        //     url: "{{ url('detail/') }}",
        //     method: "POST",
        //     data: {
        //         _method: PUT,
        //         _token: _token,
        //         page: page,
        //         table: $("#table").val(),
        //     },
        //     cache: false,
        //     success: function(data) {
        //         $("#mainData").html(data);
        //     },
        // });
        // } 
    }
</script>
<style>
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

    /*reset css*/
    div,
    label {
        margin: 0;
        padding: 0;
    }

    body {
        margin: 20px;
    }

    h1 {
        font-size: 1.5em;
        margin: 10px;
    }

    /****** Style Star Rating Widget *****/
    #rating {
        border: none;
        float: left;
    }

    #rating>input {
        display: none;
    }

    /*ẩn input radio - vì chúng ta đã có label là GUI*/
    #rating>label:before {
        margin: 5px;
        font-size: 3.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    /*1 ngôi sao*/
    #rating>.half:before {
        content: "\f089";
        position: absolute;
    }

    /*0.5 ngôi sao*/
    #rating>label {
        color: #ddd;
        float: right;
    }

    /*float:right để lật ngược các ngôi sao lại đúng theo thứ tự trong thực tế*/
    /*thêm màu cho sao đã chọn và các ngôi sao phía trước*/
    #rating>input:checked~label,
    #rating:not(:checked)>label:hover,
    #rating:not(:checked)>label:hover~label {
        color: #FFD700;
    }

    /* Hover vào các sao phía trước ngôi sao đã chọn*/
    #rating>input:checked+label:hover,
    #rating>input:checked~label:hover,
    #rating>label:hover~input:checked~label,
    #rating>input:checked~label:hover~label {
        color: #FFED85;
    }

</style>
