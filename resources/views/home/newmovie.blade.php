<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MovieGenre;
use App\Models\Movie;

$movies = Movie::all()->where('premiere', '=', 1);
$movies_genres = MovieGenre::all();

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="home__title"><b>NEW MOVIES</b> OF THIS SEASON</h1>

            <button class="home__nav home__nav--prev" type="button">
                <i class="icon ion-ios-arrow-round-back"></i>
            </button>
            <button class="home__nav home__nav--next" type="button">
                <i class="icon ion-ios-arrow-round-forward"></i>
            </button>
        </div>

        <div class="col-12">
            <div class="owl-carousel home__carousel">
                @foreach ($movies as $movie)
                    <?php
                    
                    $star = DB::select("SELECT AVG(point) as point FROM nguoi_dung_danh_gias where movie_id ='$movie->id'")[0];
                    ?>
                    <div class="item">
                        <!-- card -->
                        <div class="card card--big">
                            <div class="card__cover">
                                <img style="max-height: 340px"
                                    src="{{ asset('img/catalogs/') }}/{{ $movie->image }}" alt="">
                                <a href="{{ url('/detail') }}/{{ $movie->name }}" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="{{ url('/detail') }}">{{ $movie->name }}</a></h3>
                                <span class="card__category">
                                    <?php
                                    
                                    $genres_by_movie = DB::select("select * from genres_movies where movie_id = $movie->id");
                                    foreach ($genres_by_movie as $key => $value) {
                                        $url = '/home/genre/' . $value->name;
                                        echo "<a href='" . $url . "'>" . $value->name . '</a>';
                                    }
                                    ?>
                                </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>{{ $star->point ? $star->point : 0 }}</span>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
