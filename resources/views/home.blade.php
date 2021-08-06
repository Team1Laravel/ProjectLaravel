<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;
use App\Models\GenresMovies;
use App\Models\Genre;

?>
@extends("layouts.common")
@section('content')
    <!-- home -->
    <section class="home">
        <!-- home bg -->
        <div class="owl-carousel home__bg">
            <div class="item home__cover" data-bg="img/home/home__bg.jpg"></div>
            <div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
            <div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
            <div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
        </div>
        <!-- end home bg -->

        @include('home.newmovie')
    </section>
    <!-- end home -->

    <!-- content -->
    <section class="content">
        <div class="content__head">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- content title -->
                        <h2 class="content__title">New items</h2>
                        <!-- end content title -->

                        <!-- content tabs nav -->
                        <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                            <?php
                            $genres = DB::table('genres')->get();
                            ?>
                            @foreach ($genres as $genre)
                                @if ($genre->id == $genres[0]->id)
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tab-{{ $genre->id }}"
                                            role="tab" aria-controls="tab-{{ $genre->id }}"
                                            aria-selected="true">{{ $genre->name }}</a>
                                    </li>

                                @else

                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tab-{{ $genre->id }}" role="tab"
                                            aria-controls="tab-{{ $genre->id }}"
                                            aria-selected="true">{{ $genre->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <!-- end content tabs nav -->

                        <!-- content mobile tabs nav -->
                        <div class="content__mobile-tabs" id="content__mobile-tabs">
                            <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="New items">
                                <span></span>
                            </div>

                            <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach ($genres as $genre)
                                        <li class="nav-item"><a class="nav-link active" id="{{ $genre->id }}-tab"
                                                data-toggle="tab" href="#tab-{{ $genre->id }}" role="tab"
                                                aria-controls="tab-{{ $genre->id }}"
                                                aria-selected="true">{{ $genre->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- end content mobile tabs nav -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- content tabs -->
            <div class="tab-content" id="myTabContent">
                @foreach ($genres as $genre)
                    @if ($genre->id == $genres[0]->id)
                        <div class="tab-pane fade show active" id="tab-{{ $genre->id }}" role="tabpanel"
                            aria-labelledby="{{ $genre->id }}-tab">
                            <div class="row">
                                <!-- card -->
                                <?php
                                $genres_movies = GenresMovies::all()->where('id', '=', $genre->id);
                                ?>
                                @foreach ($genres_movies as $item)
                                    <div class="col-6 col-sm-12 col-lg-6">
                                        <div class="card card--list">
                                            <div class="row">
                                                <?php
                                                $movie = Movie::all()->find($item->movie_id);
                                                ?>
                                                <div class="col-12 col-sm-4">
                                                    <div class="card__cover">
                                                        <img src="{{ asset('img/catalogs/') }}/{{ $movie->image }}"
                                                            alt="">
                                                        <a href="{{ $movie->video_link }}" class="card__play">
                                                            <i class="icon ion-ios-play"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-8">
                                                    <div class="card__content">
                                                        <h3 class="card__title"><a
                                                                href="{{ url('/detail') }}">{{ $movie->name }}</a>
                                                        </h3>
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
                                                            <span class="card__rate"><i
                                                                    class="icon ion-ios-star"></i>8.4</span>

                                                            <ul class="card__list">
                                                                <li>{{ $movie->quality }}</li>
                                                                <li>{{ $movie->age_limit }}+</li>
                                                            </ul>
                                                        </div>

                                                        <div class="card__description">
                                                            <p>{{ $movie->desc }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="tab-pane fade fade" id="tab-{{ $genre->id }}" role="tabpanel"
                            aria-labelledby="{{ $genre->id }}-tab">
                            <div class="row">
                                <!-- card -->
                                <?php
                                $genres_movies = GenresMovies::all()->where('id', '=', $genre->id);
                                ?>
                                @foreach ($genres_movies as $item)
                                    <div class="col-6 col-sm-12 col-lg-6">
                                        <div class="card card--list">
                                            <div class="row">
                                                <?php
                                                $movie = Movie::all()->find($item->movie_id);
                                                ?>
                                                <div class="col-12 col-sm-4">
                                                    <div class="card__cover">
                                                        <img width="190" height="237"
                                                            src="{{ asset('img/catalogs/') }}/{{ $movie->image }}"
                                                            alt="">
                                                        <a href="{{ $movie->video_link }}" class="card__play">
                                                            <i class="icon ion-ios-play"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-sm-8">
                                                    <div class="card__content">
                                                        <h3 class="card__title"><a
                                                                href="{{ url('/detail') }}">{{ $movie->name }}</a>
                                                        </h3>
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
                                                            <span class="card__rate"><i
                                                                    class="icon ion-ios-star"></i>8.4</span>

                                                            <ul class="card__list">
                                                                <li>{{ $movie->quality }}</li>
                                                                <li>{{ $movie->age_limit }}+</li>
                                                            </ul>
                                                        </div>

                                                        <div class="card__description">
                                                            <p>{{ $movie->desc }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                    <div class="row">
                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">I Dream in Another
                                            Language</a>
                                    </h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Action</a>
                                        <a href="{{ url('/detail') }}">Triler</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover2.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Benched</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover3.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Whitney</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Romance</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                        <a href="{{ url('/detail') }}">Music</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover4.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Blindspotting</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover5.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">I Dream in Another
                                            Language</a>
                                    </h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Action</a>
                                        <a href="{{ url('/detail') }}">Triler</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover6.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Benched</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover6.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Whitney</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Romance</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                        <a href="{{ url('/detail') }}">Music</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover5.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Blindspotting</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover4.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">I Dream in Another
                                            Language</a>
                                    </h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Action</a>
                                        <a href="{{ url('/detail') }}">Triler</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover3.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Benched</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover2.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Whitney</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Romance</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                        <a href="{{ url('/detail') }}">Music</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Blindspotting</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div> --}}

                {{-- <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                    <div class="row">
                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover2.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">I Dream in Another
                                            Language</a>
                                    </h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Action</a>
                                        <a href="{{ url('/detail') }}">Triler</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Benched</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover4.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Whitney</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Romance</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                        <a href="{{ url('/detail') }}">Music</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover3.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Blindspotting</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover6.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">I Dream in Another
                                            Language</a>
                                    </h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Action</a>
                                        <a href="{{ url('/detail') }}">Triler</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover5.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Benched</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover5.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Whitney</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Romance</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                        <a href="{{ url('/detail') }}">Music</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover6.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Blindspotting</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover3.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">I Dream in Another
                                            Language</a>
                                    </h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Action</a>
                                        <a href="{{ url('/detail') }}">Triler</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover4.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Benched</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Whitney</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Romance</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                        <a href="{{ url('/detail') }}">Music</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover2.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Blindspotting</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div> --}}

                {{-- <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="4-tab">
                    <div class="row">
                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">I Dream in Another
                                            Language</a>
                                    </h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Action</a>
                                        <a href="{{ url('/detail') }}">Triler</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover3.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Benched</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover2.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Whitney</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Romance</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                        <a href="{{ url('/detail') }}">Music</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover6.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Blindspotting</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover4.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">I Dream in Another
                                            Language</a>
                                    </h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Action</a>
                                        <a href="{{ url('/detail') }}">Triler</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover5.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Benched</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover6.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Whitney</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Romance</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                        <a href="{{ url('/detail') }}">Music</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover5.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Blindspotting</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover4.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">I Dream in Another
                                            Language</a>
                                    </h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Action</a>
                                        <a href="{{ url('/detail') }}">Triler</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover3.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Benched</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover2.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Whitney</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Romance</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                        <a href="{{ url('/detail') }}">Music</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <!-- card -->
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="img/covers/cover.jpg" alt="">
                                    <a href="{{ url('/detail') }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title"><a href="{{ url('/detail') }}">Blindspotting</a></h3>
                                    <span class="card__category">
                                        <a href="{{ url('/detail') }}">Comedy</a>
                                        <a href="{{ url('/detail') }}">Drama</a>
                                    </span>
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div> --}}
            </div>
            <!-- end content tabs -->
        </div>
    </section>
    <!-- end content -->

    <!-- expected premiere -->
    <section class="section section--bg" data-bg="img/section/section.jpg">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12">
                    <h2 class="section__title">Expected premiere</h2>
                </div>
                <!-- end section title -->

                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="img/covers/cover.jpg" alt="">
                            <a href="{{ url('/detail') }}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="{{ url('/detail') }}">I Dream in Another Language</a></h3>
                            <span class="card__category">
                                <a href="{{ url('/detail') }}">Action</a>
                                <a href="{{ url('/detail') }}">Triler</a>
                            </span>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="img/covers/cover3.jpg" alt="">
                            <a href="{{ url('/detail') }}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="{{ url('/detail') }}">Benched</a></h3>
                            <span class="card__category">
                                <a href="{{ url('/detail') }}">Comedy</a>
                            </span>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="img/covers/cover2.jpg" alt="">
                            <a href="{{ url('/detail') }}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="{{ url('/detail') }}">Whitney</a></h3>
                            <span class="card__category">
                                <a href="{{ url('/detail') }}">Romance</a>
                                <a href="{{ url('/detail') }}">Drama</a>
                                <a href="{{ url('/detail') }}">Music</a>
                            </span>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="img/covers/cover6.jpg" alt="">
                            <a href="{{ url('/detail') }}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="{{ url('/detail') }}">Blindspotting</a></h3>
                            <span class="card__category">
                                <a href="{{ url('/detail') }}">Comedy</a>
                                <a href="{{ url('/detail') }}">Drama</a>
                            </span>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="img/covers/cover4.jpg" alt="">
                            <a href="{{ url('/detail') }}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="{{ url('/detail') }}">I Dream in Another Language</a></h3>
                            <span class="card__category">
                                <a href="{{ url('/detail') }}">Action</a>
                                <a href="{{ url('/detail') }}">Triler</a>
                            </span>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="img/covers/cover5.jpg" alt="">
                            <a href="{{ url('/detail') }}" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="{{ url('/detail') }}">Benched</a></h3>
                            <span class="card__category">
                                <a href="{{ url('/detail') }}">Comedy</a>
                            </span>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <!-- section btn -->
                <div class="col-12">
                    <a href="{{ url('/detail') }}" class="section__btn">Show more</a>
                </div>
                <!-- end section btn -->
            </div>
        </div>
    </section>
    <!-- end expected premiere -->

    <!-- partners -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12">
                    <h2 class="section__title section__title--no-margin">Our Partners</h2>
                </div>
                <!-- end section title -->

                <!-- section text -->
                <div class="col-12">
                    <p class="section__text section__text--last-with-margin">It is a long <b>established</b> fact that a
                        reader will be distracted by the readable content of a page when looking at its layout. The
                        point of
                        using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                        using.
                    </p>
                </div>
                <!-- end section text -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{ url('/detail') }}" class="partner">
                        <img src="img/partners/themeforest-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{ url('/detail') }}" class="partner">
                        <img src="img/partners/audiojungle-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{ url('/detail') }}" class="partner">
                        <img src="img/partners/codecanyon-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{ url('/detail') }}" class="partner">
                        <img src="img/partners/photodune-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{ url('/detail') }}" class="partner">
                        <img src="img/partners/activeden-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="{{ url('/detail') }}" class="partner">
                        <img src="img/partners/3docean-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->
            </div>
        </div>
    </section>
    <!-- end partners -->

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
