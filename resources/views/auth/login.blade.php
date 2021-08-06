<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

    <!-- CSS -->
{{--    <link rel="stylesheet" href="{{asset("css/bootstrap-reboot.min.css")}}">--}}
{{--    <link rel="stylesheet" href="{{asset("css/bootstrap-grid.min.css")}}">--}}
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/jquery.mCustomScrollbar.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/nouislider.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/ionicons.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/plyr.css")}}">
    <link rel="stylesheet" href="{{asset("css/photoswipe.css")}}">
    <link rel="stylesheet" href="{{asset("css/default-skin.css")}}">
    <link rel="stylesheet" href="{{asset("css/main.css")}}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{asset("icon/favicon-32x32.png")}}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{asset("icon/favicon-32x32.png")}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset("icon/apple-touch-icon-72x72.png")}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset("icon/apple-touch-icon-114x114.png")}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset("icon/apple-touch-icon-144x144.png")}}">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>

	<!-- css flash message -->
	 <link rel="stylesheet" href="{{asset("css/flashmessage.css")}}">
	 <!--End css flash message -->
</head>
<body class="body">

<div class="sign section--bg" data-bg="img/section/section.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sign__content">
                    <!-- authorization form -->
                    <form method="POST" action="{{ route('login') }}" class="sign__form">
                        @csrf
                        <a href="index.html" class="sign__logo">
                            <img src="img/logo.svg" alt="">
                        </a>

                        <div class="sign__group">
                            <input value="{{ old('email') }}" name="email" type="text" class="sign__input"
                                   placeholder="Email" required autofocus>
                        </div>
                        @if ($errors->has('email'))
                        <span class="alert-danger mb-2" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <div class="sign__group">
                            <input type="password" class="sign__input" placeholder="Password" name="password" required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback alert-danger mb-2" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        <div class="sign__group sign__group--checkbox">
                            <input id="remember" name="remember" type="checkbox" checked="checked">
                            <label for="remember">Remember Me</label>
                        </div>

                        <button class="sign__btn" type="submit">Sign in</button>

                        <span class="sign__text">Don't have an account? <a href="{{route('register')}}">Sign up!</a></span>

                        <span class="sign__text"><a  href="http://127.0.0.1:8000/password/reset">Forgot password?</a></span>
                    </form>
                    <!-- end authorization form -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Flash message -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div class="flash">
  <div class="flash__icon">
    <i class="icon fa fa-check-circle-o"></i>
  </div>
  <p id="loginstatus" class="flash__body">    
  </p>
</div>
<!--End Flash message -->
<!-- JS -->
<script src="{{asset("js/jquery-3.3.1.min.js")}}"></script>
<script src="{{asset("js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("js/owl.carousel.min.js")}}"></script>
<script src="{{asset("js/jquery.mousewheel.min.js")}}"></script>
<script src="{{asset("js/jquery.mCustomScrollbar.min.js")}}"></script>
<script src="{{asset("js/wNumb.js")}}"></script>
<script src="{{asset("js/nouislider.min.js")}}"></script>
<script src="{{asset("js/plyr.min.js")}}"></script>
<script src="{{asset("js/jquery.morelines.min.js")}}"></script>
<script src="{{asset("js/photoswipe.min.js")}}"></script>
<script src="{{asset("js/photoswipe-ui-default.min.js")}}"></script>
<script src="{{asset("js/main.js")}}"></script>
</body>
<script type="text/javascript">
function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
}
$(document).ready(function() {
    $(".sign__form").submit(function(e) {
        e.preventDefault();
        if (!validateEmail($("input[name='email']").val())) {
            $("#loginstatus").html('Email invalidate');
            $(".flash__icon").html('<i class="icon fa fa-times-circle"></i>');
            $("input[name='email']").focus();
            $(".flash").addClass("animate--drop-in-fade-out");
            setTimeout(function() {
                $(".flash").removeClass("animate--drop-in-fade-out");
            }, 3500);
            return;
        }
        else if ($("input[name='password']").val().length < 8) {
            $("#loginstatus").html('Password must contain 8 characters');
            $(".flash__icon").html('<i class="icon fa fa-times-circle"></i>');
            $("input[name='password']").focus();
            $(".flash").addClass("animate--drop-in-fade-out");
            setTimeout(function() {
                $(".flash").removeClass("animate--drop-in-fade-out");
            }, 3500);
            return;
        }
        $.ajax({
            type: "POST",
            url: "{{ route('login') }}",
            data: {
                _token: '{{ csrf_token() }}',
                _method: 'POST',
                email: $("input[name='email']").val(),
                password: $("input[name='password']").val(),
            },
            success: function(res) {
                if (res.success) {
                    $("#loginstatus").html(res.message);
                    $(".flash__icon").html('<i class="icon fa fa-check-circle-o"></i>');
                    $(".flash").addClass("animate--drop-in-fade-out");
                    setTimeout(function() {
                        $(".flash").removeClass("animate--drop-in-fade-out");
                    }, 3500);
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
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
    });
});
</script>
</html>



