<section class="hotel-area section-bg section-padding overflow-hidden padding-right-100px padding-left-100px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading text-center">
                    <h2 class="sec__title line-height-55">Most Popular Hotel <br> Destinations</h2>
                </div><!-- end section-heading -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
        <div class="row padding-top-50px">
            <div class="col-lg-12">
                <div class="hotel-card-wrap">
                    <div class="hotel-card-carousel carousel-action">
                        @if(isset($hotels))

                            @forelse($hotels as $hotel)
                                <div class="card-item mb-0">
                                    <div class="card-img">
                                        <a href="{{ route('hotel.detail', $hotel->id) }}" class="d-block">
                                            <img src="{{$hotel->image ? $hotel->image :''}}" alt="hotel-img" width="300px" height="300px">
                                        </a>
                                        <span class="badge">{{ $hotel->type ? $hotel->type :'' }}</span>
                                        <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top" title="Bookmark">
                                            <i class="la la-heart-o"></i>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{ route('hotel.detail', $hotel->id) }}">{{ $hotel->name ? $hotel->name :'' }}</a></h3>
                                        <p class="card-meta">{{ $hotel->address ? $hotel->address :'' }}</p>
                                        <div class="card-price d-flex align-items-center justify-content-between">
                                            <p>
                                                <span class="price__from">From</span>
                                                <span class="price__num">{{ $hotel->price ? $hotel->price :'' }}</span>
                                                <span class="price__text">Per night</span>
                                            </p>
                                            <a href="{{ route('hotel.detail', $hotel->id) }}" class="btn-text">See details<i class="la la-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div><!-- end card-item -->
                            @empty

                            @endforelse

{{--                       --}}
                        @endif
                    </div><!-- end hotel-card-carousel -->
                </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container-fluid -->
</section>
