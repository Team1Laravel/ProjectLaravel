<?php
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;
use App\Models\User;
$movies = DB::select('SELECT year, count(1) count FROM movies group by year');
$lengthMovies = Movie::all();
$lengthUsers = User::all();
$subusers = $listsubscribes['allSubs'];
$listmovies = [];
$year = Carbon::now()->format('Y') - 10;

for ($i = 0; $i <= 9; $i++) {
    $flag = false;
    $year++;
    for ($j = 0; $j < sizeof($movies); $j++) {
        if ($movies[$j]->year == $year) {
            array_push($listmovies, ['year' => $movies[$j]->year, 'count' => $movies[$j]->count]);
            $flag = true;
            break;
        }
    }
    if (!$flag) {
        array_push($listmovies, ['year' => $year, 'count' => 0]);
    }
}

$users = DB::select('SELECT month(created_at) month, count(1) count FROM `users` where role_id = 2 group by month');

$listusers = [];
$month = Carbon::now()->format('m') - 6;

for ($i = 0; $i <= 5; $i++) {
    $flag = false;
    $month++;
    for ($j = 0; $j < sizeof($users); $j++) {
        if ($users[$j]->month == $month) {
            array_push($listusers, ['month' => $users[$j]->month, 'count' => $users[$j]->count]);
            $flag = true;
            break;
        }
    }
    if (!$flag) {
        array_push($listusers, ['month' => $month, 'count' => 0]);
    }
}

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<section class="no-padding-top no-padding-bottom" style="margin-top: 40px;">
    {{-- <div class="container-fluid">

    </div> --}}
</section>
<section class="no-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6 box-statistic">
                <!-- small box -->
                <div class="bg-statistic col-md-12" style="background-color: #FFF;">
                    <div class="col-md-8" style="float: left;">
                        <div class="col-md-12 d-flex justify-content-center p-statistic">MOVIE</div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <h3 class="h3-box-chart">{{ count($lengthMovies) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4" style="float: left">
                        <i class="fa fa-film"
                            style="font-size: 60px;margin-top: 15px; text-align: center; opacity: 0.5; color: red"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 box-statistic">
                <!-- small box -->
                <div class="bg-statistic col-md-12" style="background-color: #FFF;">
                    <div class="col-md-8" style="float: left;">
                        <div class="col-md-12 d-flex justify-content-center p-statistic">USER</div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <h3 class="h3-box-chart">{{ count($lengthUsers) }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4" style="float: left">
                        <i class="fa fa-users"
                            style="font-size: 60px;margin-top: 15px; text-align: center; opacity: 0.5; color: red"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 box-statistic">
                <div class="bg-statistic col-md-12" style="background-color: #FFF">
                    <div class="col-md-8" style="float: left;">
                        <div class="col-md-12 d-flex justify-content-center p-statistic">SUBSCRIBE</div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <h3 class="h3-box-chart">{{ $subusers }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4" style="float: left">
                        <i class="far fa-bell"
                            style="font-size: 60px;margin-top: 15px; text-align: center; opacity: 0.5; color: red"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 box-statistic">
                <!-- small box -->
                <div class="bg-statistic col-md-12" style="background-color: #FFF;">
                    <div class="col-md-8" style="float: left;">
                        <div class="col-md-12 d-flex justify-content-center p-statistic">REVENUE</div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <h3 class="h3-box-chart">{{ $total }}$</h3>
                        </div>
                    </div>
                    <div class="col-md-4" style="float: left">
                        <i class="fa fa-dollar-sign"
                            style="font-size: 60px;margin-top: 15px; text-align: center; opacity: 0.5; color: red"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="height: 50px"> </div>
            <div class="col-lg-6">
                <div id="curve_chart_movie" style="width: 100%; height: 400px; margin-left: -30px"></div>
            </div>
            <div class="col-lg-6">
                <div id="curve_chart_user" style="width: 100%; height: 400px; margin-left: -20px"></div>
            </div>
            <div class="col-lg-6">
                <div id="curve_chart_subscribe" style="width: 100%; height: 400px; margin-left: -30px"></div>
            </div>
            <div class="col-lg-6">
                <div id="curve_chart_revenue" style="width: 100%; height: 400px; margin-left: -30px"></div>
            </div>
        </div>
    </div>
</section>
<style>
    .box-statistic {
        /*  */
        opacity: 0.8;
        box-shadow: 0 1px 2px 1px rgb(43 43 43 / 10%), 0 11px 6px -7px rgb(43 43 43 / 10%);
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
        padding: 0 5px;
    }

    .bg-statistic {
        height: 100%;
        border-radius: 5px;
    }

    .h3-box-chart {
        font-size: 40px;
        border-radius: 50%;
        text-align: center;
        width: 90px;
        height: 60px;
    }

    .p-statistic {
        margin-top: 10px;
        font-weight: bold;
        font-size: 25px;
        text-align: center;
    }

</style>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        //chart movie
        var jlist = '<?php echo json_encode($listmovies); ?>';
        var list = JSON.parse(jlist);
        var obj0 = list[0];
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Movies', { role: 'style' }],
            [String(obj0.year), obj0.count, 'color: #FFA8A8']
        ]);
        $roww = [];
        for (let i = 1; i < list.length; i++) {
            $roww.push([String(list[i].year), list[i].count, 'color: #FFA8A8']);
        }
        data.addRows($roww);
        var options = {
            title: 'Total Movies and Publishing year',
            curveType: 'function',
            legend: {
                position: 'bottom'
            },
            vAxis: {
                minValue: 0,
                ticks: [0, 2, 4, 6, 8, 10],
                title: 'Total'
            },
            width: 700,
            hAxis: {
                title: 'Year'
            },
            colors: ['#FFA8A8']
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('curve_chart_movie'));
        chart.draw(data, options);
        //chart user
        var ulist = '<?php echo json_encode($listusers); ?>';
        var listU = JSON.parse(ulist);
        var obj0 = listU[0];
        var dataU = google.visualization.arrayToDataTable([
            ['Month', 'Users', { role: 'style' }],
            [String(obj0.month), obj0.count, 'color: #009900']
        ]);
        $roww = [];
        for (let i = 1; i < listU.length; i++) {
            $roww.push([String(listU[i].month), listU[i].count, 'color: #009900']);
        }
        dataU.addRows($roww);
        var options = {
            title: 'Total Users for the last 6 months',
            curveType: 'function',
            legend: {
                position: 'bottom'
            },
            vAxis: {
                minValue: 0,
                ticks: [0, 2, 4, 6, 8, 10],
                title: 'Total',
            },
            hAxis: {
                title: 'Month',
                
            },
            width: 600,
            colors: ['#009900']
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('curve_chart_user'));
        chart.draw(dataU, options);
        //chart subscribe
        var slist = '<?php echo json_encode($listsubscribes); ?>';
        var listS = JSON.parse(slist);
        var allUsers = listS["allUsers"];
        var allsubs = listS["allSubs"];
        var dataS = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Subscribed', allsubs],
            ['Not Subscribed', allUsers - allsubs],
        ]);
        $roww = [];
        for (let i = 1; i < listS.length; i++) {
            $roww.push([String(listS[i].month), listS[i].count]);
        }
        dataS.addRows($roww);
        var options = {
            title: 'Subscriber Rate',
            width: 600,
            colors: ['#009900', '#DD0000'],
        };
        var chart = new google.visualization.PieChart(document.getElementById('curve_chart_subscribe'));
        chart.draw(dataS, options);
        //chart revenue
        var rlist = '<?php echo json_encode($revenue); ?>';
        var listR = JSON.parse(rlist);
        console.log(listR);
        var obj0 = listR[0];
        var dataR = google.visualization.arrayToDataTable([
            ['Month', 'Money', { role: 'style' }],
            [String(obj0.month), obj0.sum, 'color: #009900']
        ]);
        $roww = [];
        for (let i = 1; i < listR.length; i++) {
            $roww.push([String(listR[i].month), listR[i].sum, 'color: #009900']);
        }
        dataR.addRows($roww);
        var options = {
            title: 'Total Money for the last 6 months',
            curveType: 'function',
            legend: {
                position: 'bottom'
            },
            vAxis: {
                minValue: 0,
                ticks: [0, 20, 40, 60, 80, 100],
                title: 'Total',
            },
            hAxis: {
                title: 'Month',
                
            },
            width: 600,
            colors: ['#009900']
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('curve_chart_revenue'));
        chart.draw(dataR, options);
    }
</script>
