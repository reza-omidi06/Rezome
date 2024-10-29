@php
    $categoriys=\App\Models\PortfolioCategory::all();
    $portfolios=\App\Models\Portfolio::with('category')->get();
@endphp
<div class="portfolio" id="portfolio">
    <div class="container">
        <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
            <p>نمونه کار</p>
            <h2>نمونه کارهای من</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <ul id="portfolio-filter">
                    <li data-filter="*" class="filter-active">همه</li>
                    @foreach($categoriys as $category)
                    <li data-filter=".filter-{{$category->id}}">{{$category->name_portfolio_category}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row portfolio-container">
            @foreach($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-{{$portfolio->category->id}} wow fadeInUp" data-wow-delay="0.0s">
                    <div class="portfolio-wrap">
                        <div class="portfolio-img">
                            <img src="{{asset($portfolio->portfolio_image)}}" alt="Image">
                        </div>
                        <div class="portfolio-text">
                            <h3>{{$portfolio->portfolio_name}}</h3>
                            <a class="btn" href="{{asset($portfolio->portfolio_image)}}" data-lightbox="portfolio">+</a>
                        </div>
                    </div>
                </div>
            @endforeach
<!--
            <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-1 wow fadeInUp" data-wow-delay="0.0s">
                <div class="portfolio-wrap">
                    <div class="portfolio-img">
                        <img src="{{asset('frontend/assets/img/portfolio-1.jpg')}}" alt="Image">
                    </div>
                    <div class="portfolio-text">
                        <a href="#" target="_blank" now> eCommerce Website</a>
                        <h3></h3>
                        <a class="btn" href="{{asset('frontend/assets/img/portfolio-1.jpg')}}" data-lightbox="portfolio">+</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-2 wow fadeInUp" data-wow-delay="0.2s">
                <div class="portfolio-wrap">
                    <div class="portfolio-img">
                        <img src="{{asset('frontend/assets/img/portfolio-2.jpg')}}" alt="Image">
                    </div>
                    <div class="portfolio-text">
                        <h3>Product Landing Page</h3>
                        <a class="btn" href="{{asset('frontend/assets/img/portfolio-2.jpg')}}" data-lightbox="portfolio">+</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="portfolio-wrap">
                    <div class="portfolio-img">
                        <img src="{{asset('frontend/assets/img/portfolio-3.jpg')}}" alt="Image">
                    </div>
                    <div class="portfolio-text">
                        <h3>JavaScript quiz game</h3>
                        <a class="btn" href="{{asset('frontend/assets/img/portfolio-3.jpg')}}" data-lightbox="portfolio">+</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-1 wow fadeInUp" data-wow-delay="0.6s">
                <div class="portfolio-wrap">
                    <div class="portfolio-img">
                        <img src="{{asset('frontend/assets/img/portfolio-4.jpg')}}" alt="Image">
                    </div>
                    <div class="portfolio-text">
                        <h3>JavaScript drawing</h3>
                        <a class="btn" href="{{asset('frontend/assets/img/portfolio-4.jpg')}}" data-lightbox="portfolio">+</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-2 wow fadeInUp" data-wow-delay="0.8s">
                <div class="portfolio-wrap">
                    <div class="portfolio-img">
                        <img src="{{asset('frontend/assets/img/portfolio-5.jpg')}}" alt="Image">
                    </div>
                    <div class="portfolio-text">
                        <h3>Social Mobile Apps</h3>
                        <a class="btn" href="{{asset('frontend/assets/img/portfolio-5.jpg')}}" data-lightbox="portfolio">+</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-3 wow fadeInUp" data-wow-delay="1s">
                <div class="portfolio-wrap">
                    <div class="portfolio-img">
                        <img src="{{asset('frontend/assets/img/portfolio-6.jpg')}}" alt="Image">
                    </div>
                    <div class="portfolio-text">
                        <h3>Company Website</h3>
                        <a class="btn" href="{{asset('frontend/assets/img/portfolio-6.jpg')}}" data-lightbox="portfolio">+</a>
                    </div>
                </div>
            </div>
-->
        </div>
    </div>
</div>
