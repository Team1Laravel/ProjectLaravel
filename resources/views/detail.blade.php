@extends("layouts.common")
@section('content')
    <!-- home -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <section class="home">
        <section class="content">
            <div class="content__head">
                <div class="container">
                    <div class="row">
                        @if ($movie != null)
                            <?php
                            
                            $star = DB::select("SELECT AVG(point) as point FROM nguoi_dung_danh_gias where movie_id ='$movie->id'")[0];
                            ?>
                            <div class="col-12">
                                <!-- content title -->
                                <h2 class="content__title">MOVIE: {{ $movie->name }}</h2>
                                <!-- end content title -->

                                <!-- content tabs nav -->
                                <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab"
                                            aria-controls="tab-1" aria-selected="true">About </a>
                                    </li>
                                </ul>
                                <!-- end content tabs nav -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="container">
                <!-- content tabs -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                        <div class="row">
                            <!-- card -->
                            <div class="col-12 ">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="card__cover col-12 col-sm-12">
                                                <img style="max-height: 450px"
                                                    src="{{ asset('img/catalogs/') }}/{{ $movie->image }}" alt="">
                                                <a href="#" class="card__play">
                                                    <i class="icon ion-ios-play"></i>
                                                </a>
                                            </div>
                                            <div class="col-12 col-sm-12">

                                                @include('star')
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-8">
                                            <div class="card__content">
                                                <h3 class="card__title"><a href="#">{{ $movie->name }}</a></h3>
                                                <span class="card__category">
                                                    <?php
                                                    $genres_by_movie = DB::select("select * from genres_movies where movie_id = $movie->id");
                                                    foreach ($genres_by_movie as $key => $value) {
                                                        $url = '/home/genre/' . $value->name;
                                                        echo "<a href='" . $url . "'>" . $value->name . '</a>';
                                                    }
                                                    ?>
                                                </span>

                                                <div class="card__wrap">
                                                    <span class="card__rate"><i class="icon ion-ios-star"></i>{{ $star->point ? $star->point : 0 }}</span>

                                                    <ul class="card__list">
                                                        <li>{{ $movie->quality }}</li>
                                                        <li>{{ $movie->age_limit }}+</li>
                                                    </ul>
                                                </div>

                                                <div class="card__description">
                                                    <p style="color: #F3F3F3">
                                                        {{ $movie->desc }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->


                        </div>
                    </div>


                    <!-- end card -->
                    <br />
                    <h2 class="section__title">Comments</h2>
                    <div class="mt-5">
                        <div class="col-md-12 col-xs-12" style="background-color: whitesmoke;">
                            <div class="fb-share-button" data-href="//facebook.com/Rì-viu-phim-103418141715660/"
                                data-layout="button_count" data-size="small" data-mobile-iframe="true"><a
                                    class="fb-xfbml-parse-ignore" target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Friviuphim.net%2Fshop%2F&amp;src=sdkpreparse">Chia
                                    sẻ</a></div>
                            <div class="fb-follow" data-href="//facebook.com/Rì-viu-phim-103418141715660" data-width="400px"
                                data-layout="button_count" data-size="small" data-show-faces="false"></div>
                            <div class="fb-send" data-href="//facebook.com/Rì-viu-phim-103418141715660/"></div>
                            <div class="fb-comments" data-href="http://127.0.0.1:8000/detail/{{ $movie->name }}"
                                data-width="1090" data-numposts="10" data-order-by="social"></div>

                        </div>
                    </div>
                    <!-- expected premiere -->

                </div>
            </div>
        </section>
    </section>
@endsection
