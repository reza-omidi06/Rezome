@php
    $about_view=App\Models\About::find(1)->first();
    $skill_view=App\Models\Skill::latest()->get();
@endphp
<div class="about wow fadeInUp" data-wow-delay="0.1s" id="about">
    <div class="container-fluid" style="direction: rtl;">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="{{asset(!empty($about_view->image_about) ? $about_view->image_about : 'uploads/erorr404.jpg')}}" alt="Image">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-header text-right">
                        <p>Learn About Me</p>
                        <h2>{{$about_view->title}}</h2>
                    </div>
                    <div class="about-text">
                        <p>
                            {!! $about_view->description !!}
                        </p>
                    </div>
                    <div class="skills">
                        @foreach($skill_view as $skills)
                            <div class="skill-name">
                                <p>{{$skills->skill_name_en}}</p><p>{{$skills->skill_percentage}}%</p>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$skills->skill_percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        @endforeach
                    </div>
                    @if($about_view->btn_name != null)
                        <a class="btn" href="{{asset($about_view->file_pdf)}}" target="_blank">Learn More</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
