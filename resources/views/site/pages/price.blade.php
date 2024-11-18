@php
    $view_plan_title = App\Models\PlanTitle::find(1)->first();
    $view_plan = \App\Models\PlanType::with('features')->latest()->get();
@endphp

<div class="price" id="price">
    <div class="container">
        <div class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
            <p>{{ $view_plan_title->title }}</p>
            <h2>{{ $view_plan_title->sub_title }}</h2>
        </div>
        <div class="row">
            @foreach($view_plan as $plan)
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="price-item {{ $plan->special ? 'special-style' : '' }}">
                        <div class="price-header">x
                            <div class="price-title">
                                <h2>{{ $plan->name_type_fa }}</h2>
                            </div>
                            <div class="price-prices">
                                <h2><small>تومان</small><span>{{ $plan->price_type }}</span></h2>
                            </div>
                        </div>
                        <div class="price-body">
                            <div class="price-description">
                                <ul>
                                    @foreach($plan->features as $feature)
                                        @php
                                            $featureList = explode(',', $feature->features);
                                        @endphp
                                        @foreach($featureList as $featureItem)
                                            <li>{{ trim($featureItem) }}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="price-footer">
                            <div class="price-action">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
