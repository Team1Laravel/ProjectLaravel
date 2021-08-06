@extends("layouts.common")
@section('content')
    <!-- home -->
    <section class="home">
     

    <!-- content -->
    <section class="content">
        <div class="content__head">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- content title -->
                        <h2 class="content__title">Phim: Bố Già</h2>
                        <!-- end content title -->

                        <!-- content tabs nav -->
                        <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab"
                                   aria-controls="tab-1"
                                   aria-selected="true">About </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
                                   aria-selected="false">Details</a>
                            </li>
                        </ul>
                        <!-- end content tabs nav -->
                    </div>
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
                                        <div class="card__cover">
                                            <img src="img/covers/anh1.jpg" alt="">
                                            <a href="#" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8">
                                        <div class="card__content">
                                            <h3 class="card__title"><a href="#">Bố Già (Bản Điện Ảnh)</a></h3>
                                            <span class="card__category">
												<a href="#">Tình Cảm</a>
												<a href="#">Cảm Động</a>
											</span>

                                            <div class="card__wrap">
                                                <span class="card__rate"><i class="icon ion-ios-star"></i>9.0</span>

                                                <ul class="card__list">
                                                    <li>HD</li>
                                                    <li>16+</li>
                                                </ul>
                                            </div>

                                            <div class="card__description">
                                                <p>
                                                    <strong>Phim Bố Già Bản Điện Ảnh Full HD&nbsp;</strong>
                                                    của Trấn Thành  dựa trên loạt phim web drama cực kì thịnh hành trên Youtube với hàng chục triệu lượt xem.
                                                    Bộ phim với sự đầu từ lớn hứa hẹn sẽ mang đến tiếng cười ngày Tết cho khán giả.
                                                    Khác với phiên bản web drama đã từng công chiếu trước đó, bộ phim lần này của Trấn Thành sẽ khai thác một góc nhìn mới, những nhân vật hoàn toàn mới.
                                                    Nổi bật trong đó phải kể đến bộ tứ anh em Giàu – Sang – Phú – Quý xuất hiện trong First Look của bộ phim về xóm lao động nghèo.
                                                </p>
                                                <p>
                                                    Trấn Thành đầu tư bốn tỷ đồng cho sản phẩm phim điện ảnh đầu tay này và chọn đạo diễn Vũ Ngọc Đãng tham gia vào dự án phim.
                                                     Bản gốc thu hút khán giả nhờ tình tiết đời thường, bình dân khi nhân vật của Trấn Thành thể hiện ấn tượng cả hai sở trường diễn hài lẫn bi.
                                                     Anh còn tham gia vào khâu nội dung bằng cách tư vấn cho biên kịch các tình huống, lời thoại mang chất hài hước, triết lý.
                                                </p>
                                                <p>
                                                    <i> PHIM </i>
                                                    sẽ ra mắt vào mùng 1 tết âm lịch năm 2021 này, tức là ngày 12.2.2021, gia nhập đường đua phim Tết cùng 
                                                    các bộ phim Việt Nam khác. Cùng chờ xem nhé
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

                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                    <div class="row">
                        <!-- card -->
                        <div class="col-12">
                            <div class="card__description">
                                <p>
                                Bố già là câu chuyện thường nhật về một gia đình ở một xóm lao động nghèo tại thành phố Hồ Chí Minh,
                                 ở đó có bộ tứ anh em Giàu, Sang, Phú, Quý. Ba Sang (Trấn Thành) là cha đơn thân, một mình nuôi hai con Quắn và Bù Tọt,
                                  trong đó đứa con trai đầu hơn 20 tuổi tên Quắn (Tuấn Trần) là một YouTuber kiếm tiền từ những lượt xem trên YouTube. 
                                  Tính ông cần kiệm còn Quắn có phần bốc đồng, nông nổi, có thể mua chiếc quần hay đôi giày giá hơn 10 triệu đồng.
                                   Ông hay bao đồng, thường can thiệp vào chuyện láng giềng và cố gắng giúp đỡ tất cả mọi người xung quanh, 
                                   còn Quắn thì cho rằng mỗi người có một cuộc sống riêng.
                                 Dù yêu thương nhau nhưng khoảng cách giữa các thế hệ đã dẫn đến những mâu thuẫn cha con nảy sinh.
                                </p>
                                <p>
                                Dự án phim điện ảnh Bố già được công bố lần đầu tiên vào ngày 17 tháng 9 năm 2020, chuyển thể từ phim chiếu mạng cùng tên được công chiếu vào đầu năm 2020 – một bộ phim cũng do Trấn Thành sản xuất và đóng chính – nhưng được xây dựng khác hoàn toàn với bản gốc.
                                Vốn là một người yêu thích bản phim chiếu mạng, đặc biệt về mặt nội dung và diễn xuất, đạo diễn Vũ Ngọc Đãng cho biết cảm thấy "bất ngờ và phấn khích", đồng thời đồng ý tham gia dự án ngay khi Trấn Thành gửi lời mời.
                                Cùng với các diễn viên từ bản phim chiếu mạng quay trở lại phiên bản điện ảnh, bao gồm Lê Giang, Quốc Khánh, Tuấn Trần và NSND Ngọc Giàu, phim còn có thêm nhiều diễn viên mới góp mặt như Lan Phương, Hoàng Mèo, La Thành và bé Ngân Chi.
                                Phần chỉ đạo diễn viên của Trấn Thành được thực hiện nghiêm ngặt: Lê Giang phải bỏ lối diễn trước đây, nhập vai đúng tâm lý, bị la mắng thường xuyên; Tuấn Trần phải xăm mình, cạo trọc, giảm cân và để tóc quắn đúng với tạo hình nhân vật. 
                                Trong đêm tiệc đóng máy ngày 31 tháng 10 năm 2020, Vũ Ngọc Đãng nhận xét Trấn Thành "có cái đầu biên kịch và đạo diễn cực kỳ giỏi".
                                Ngoài việc là vai chính và đồng đạo diễn, Trấn Thành còn đảm nhận vai trò biên kịch (viết 90% lời thoại trong phim) và nhà sản xuất.Phim có tổng kinh phí gần
                                1 triệu USD (gần 23 tỷ đồng), được ghi hình trong vòng hai tháng đến khi đóng máy vào cuối 
                                tháng 10 năm 2020. Bối cảnh chính của phim đặt tại một con hẻm nhỏ xóm lao động 
                                Sài Gòn nằm dưới chân cầu Nguyễn Văn Cừ (quận 4); đoàn phim mất vài tháng để tìm được con hẻm
                                đáp ứng được yêu cầu của đạo diễn. Tại đây, ê-kíp tự xây dựng những ngôi nhà cùng nội thất bên trong,
                                đồng thời bít miệng cống, bơm nước ngập đường để tái hiện lại cảnh thành phố ngập nước sau mưa.
                                Riêng cảnh mở đầu của phim dài khoảng 2 phút được quay theo công nghệ một cú máy liên tục 
                                với chi phí hơn 1 tỷ đồng, tốn hơn 100 giờ quay với hơn 100 diễn viên quần chúng tham gia.
                                </p>
                            </div>    
                        </div>
                    </div>
                    </div>
                        <!-- end card -->
                        <br/><h2 class="section__title">Comments</h2>
                        		<div class="mt-5" >
                        		<div class="col-md-12 col-xs-12" style="background-color: whitesmoke;">
                        		<div class="fb-share-button" data-href="//facebook.com/Rì-viu-phim-103418141715660/" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Friviuphim.net%2Fshop%2F&amp;src=sdkpreparse">Chia sẻ</a></div>
<div class="fb-follow" data-href="//facebook.com/Rì-viu-phim-103418141715660" data-width="400px" data-layout="button_count" data-size="small" data-show-faces="false"></div>
<div class="fb-send" data-href="//facebook.com/Rì-viu-phim-103418141715660/"></div>
<div class="fb-comments" data-href="http://127.0.0.1:8000/admin/users" data-width="1090" data-numposts="10" data-order-by="social"></div>
		
                        		</div>
								</div>
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
                            <a href="#" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
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
                <!-- end card -->

                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="img/covers/cover3.jpg" alt="">
                            <a href="#" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="#">Benched</a></h3>
                            <span class="card__category">
								<a href="#">Comedy</a>
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
                            <a href="#" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="#">Whitney</a></h3>
                            <span class="card__category">
								<a href="#">Romance</a>
								<a href="#">Drama</a>
								<a href="#">Music</a>
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
                            <a href="#" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="#">Blindspotting</a></h3>
                            <span class="card__category">
								<a href="#">Comedy</a>
								<a href="#">Drama</a>
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
                            <a href="#" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
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
                <!-- end card -->

                <!-- card -->
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="card">
                        <div class="card__cover">
                            <img src="img/covers/cover5.jpg" alt="">
                            <a href="#" class="card__play">
                                <i class="icon ion-ios-play"></i>
                            </a>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title"><a href="#">Benched</a></h3>
                            <span class="card__category">
								<a href="#">Comedy</a>
							</span>
                            <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <!-- section btn -->
                <div class="col-12">
                    <a href="#" class="section__btn">Show more</a>
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
                    <a href="#" class="partner">
                        <img src="img/partners/themeforest-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/audiojungle-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/codecanyon-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/photodune-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/activeden-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
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
