<div>
    <table id="tableBilling">
        @csrf
        <tr>
            <th>NAME</th>
            <th>PACKAGE_ID</th>
            <th>ACTION</th>
        </tr>
        @foreach ($payments as $pay)
            <tr id="{{ $pay->id }}">
                <td>{{ $pay->name }}</td>
                <td>{{ $pay->package_id }}</td>
                <td>
                    <button onclick="responseOrder('ok', {{ $pay->id }})" class="btn btn-success">Accept</button>
                    <button onclick="responseOrder('', {{ $pay->id }})" class="btn btn-danger">Cancel</button>
                </td>

            </tr>
        @endforeach
    </table>
</div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
<script src="{{ asset('js/jquery.mCustomScrollbar.min.js') }}"></script>
<script src="{{ asset('js/wNumb.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/plyr.min.js') }}"></script>
<script src="{{ asset('js/jquery.morelines.min.js') }}"></script>
<script src="{{ asset('js/photoswipe.min.js') }}"></script>
<script src="{{ asset('js/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('/admin/js/edit.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.js"
integrity="sha512-PU5S6BA03fRv1Q5fpwXjg5nlRrgdoguZ74urFInkbABMCENyx5oP3hrDzYMMPh3qdLdknIvrGj3yqZ4JuU7Nag=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="{{ asset('jsbootstrap.js') }}"></script> --}}

<script>
    function responseOrder(action, id) {
        switch (action) {
            case '':
                $.ajax({
                    url: "billaccecpt",
                    method: "POST",
                    data: {
                        _token: $("input[name=_token]").val(),
                        result: false,
                        id: id
                    },
                    success: function(result) {
                        // $("div[name='tableData']").html(result);
                        $('#tableBilling').find('tr').each(function() {
                            if($(this).attr('id') == id){
                                $(this).remove();
                            }
                        });
                    },
                });
                break;
            case 'ok':
                $.ajax({
                    url: "billaccecpt",
                    method: "POST",
                    data: {
                        _token: $("input[name=_token]").val(),
                        result: true,
                        id: id
                    },
                    success: function(result) {
                        // $("div[name='tableData']").html(result);
                        $('#tableBilling').find('tr').each(function() {
                            if($(this).attr('id') == id){
                                $(this).remove();
                            }
                        });
                    },
                });
                break;
        }
    }

    let socket2 = io('http://localhost:6001', {
        transports: ['websocket', 'polling', 'flashsocket']
    })
    socket2.on('darkmovies_database_payment:message', function(data) {


        $("#tableBilling").append(`
            <tr>
                <td>${ data.id }</td>
                <td>${ data.name }</td>
                <td>${ data.package_id }</td>
                <td>
                    <button onclick="responseOrder('ok', ${ data.id })" class="btn btn-success">Accept</button>
                    <button onclick="responseOrder('', ${ data.id })" class="btn btn-danger">Cancel</button>    
                </td>
                
            </tr>`);
    })
</script>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

</style>
