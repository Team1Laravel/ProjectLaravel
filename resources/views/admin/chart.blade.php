<?php 
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
$movies = DB::select('SELECT year, count(1) count FROM movies group by year');
        $listmovies = [];
        $year = Carbon::now()->format("Y") - 10;

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
        $month = Carbon::now()->format("m") - 6;

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
<section class="no-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="height: 50px">   </div>
            <div class="col-lg-6">
                <div id="curve_chart_movie" style="width: 100%; height: 400px; margin-left: -30px"></div>
            </div>
            <div class="col-lg-6">
                <div id="curve_chart_user" style="width: 100%; height: 400px; margin-left: -20px"></div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var jlist = '<?php echo json_encode($listmovies); ?>';
        var list = JSON.parse(jlist);
        var obj0 = list[0];
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Movies'],
            [String(obj0.year), obj0.count]
        ]);
        $roww = [];
        for (let i = 1; i < list.length; i++) {
            $roww.push([String(list[i].year), list[i].count]);
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
                ticks: [0, 2, 4, 6, 8, 10]
            },
            width: 700
        };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart_movie'));
        chart.draw(data, options);

        var ulist = '<?php echo json_encode($listusers); ?>';
        var listU = JSON.parse(ulist);
        var obj0 = listU[0];
        var dataU = google.visualization.arrayToDataTable([
            ['Month', 'Users'],
            [String(obj0.month), obj0.count]
        ]);
        $roww = [];
        for (let i = 1; i < listU.length; i++) {
            $roww.push([String(listU[i].month), listU[i].count]);
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
                ticks: [0, 2, 4, 6, 8, 10]
            },
            width: 600
        };
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart_user'));
        chart.draw(dataU, options);
    }
</script>
