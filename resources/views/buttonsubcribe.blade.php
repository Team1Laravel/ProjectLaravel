 <link rel="stylesheet" href="{{ asset('css/buttonsubcribe.css') }}">

 <div title="Subcribe" class="wrap">
     <button id="clicksubscribes" class="buttonsubcribe"><img width="80%" src="<?php echo url('/') . '/img/logo.svg'; ?>"
             style="cursor:pointer"></button>
 </div>
 <script>
     $(document).ready(function() {
         $("#clicksubscribes").click(function() {
             alert("The paragraph was clicked.");
         });
     });
 </script>
