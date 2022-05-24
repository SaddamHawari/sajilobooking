<section class="car-area section-bg section-padding ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title">Recommended Car Rentals</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <div class="col-lg-12">
                <div class="car-wrap">
                    <div class="car-carousel carousel-action">
                        @if(isset($cars))
                            @forelse($cars as $car)
                                <div class="card-item car-card mb-0">
                                    <div class="card-img">
                                        <a href="car-single.html" class="d-block">
                                            <img src="{{asset('img/images/car-img.png')}}" alt="car-img">
                                        </a>
                                        <span class="badge">{{ $car->type ?? '' }}</span>
                                        <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Save for later">
                                            <i class="la la-heart-o"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-meta">{{ $car->name ?? '' }}</p>
                                        <h3 class="card-title"><a href="car-single.html">{{ $car->description ?? '' }}</a></h3>
                                        <div class="card-attributes">
                                            <ul class="d-flex align-items-center">
                                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Passenger"><i class="la la-users"></i><span>4</span></li>
                                                <li class="d-flex align-items-center" data-toggle="tooltip" data-placement="top" title="Luggage"><i class="la la-suitcase"></i><span>1</span></li>
                                            </ul>
                                        </div>
                                        <div class="card-price d-flex align-items-center justify-content-between">
                                            <p>
                                                <span class="price__from">From</span>
                                                <span class="price__num">{{ $car->price ?? '' }}</span>
                                                <span class="price__text">Per day</span>
                                            </p>
                                            <a href="car-single.html" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div><!-- end card-item -->
                            @empty
                            @endforelse
                        @endif
                    </div><!-- end car-carousel -->
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
