@extends("layouts.common")
@section('content')
    <section class="section section--bg" data-bg="{{ asset('img/section/section.jpg') }}">
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <!-- section title -->
                <div class="col-12">
                    <h2 class="section__title">GENRES: {{ $name }}</h2>
                </div>
                <!-- end section title -->

                <!-- card -->
                @foreach ($movies as $movie)
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                        <div class="card">
                            <div class="card__cover">
                                <img style="max-height: 200px" src="{{ asset('img/catalogs/') }}/{{ $movie->image }}" alt="">
                                <a href="#" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                                <?php
                                
                                ?>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="#">I Dream in Another Language</a></h3>
                                <span class="card__category">
                                    <a href="#">Action</a>
                                    <a href="#">Triler</a>
                                </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- end card -->


                <!-- section btn -->
                <div class="col-12">
                    <a href="#" class="section__btn">Show more</a>
                </div>
                <!-- end section btn -->
            </div>
        </div>
    </section>
@endsection
