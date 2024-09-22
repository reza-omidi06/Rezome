@php
    $rezome_title=App\Models\RezomeTitle::latest()->first();
    $rezome=App\Models\Rezome::latest()->get()
@endphp
<div class="experience" id="experience">
    <div class="container">
        <header class="section-header text-center wow zoomIn" data-wow-delay="0.1s">
            <p>{{ $rezome_title->title }}</p>
            <h2>{{ $rezome_title->sub_title }}</h2>
        </header>
        <div class="timeline">
            @foreach($rezome as $index => $rezome_item)
                @if($rezome_item->status != 0)
                <div class="timeline-item {{ $index % 2 == 0 ? 'left' : 'right' }} wow slideIn{{ $index % 2 == 0 ? 'Left' : 'Right' }}" data-wow-delay="0.1s">
                    <div class="timeline-text">
                        <div class="timeline-date">
                            @if($rezome_item->Jobـendـdate != null)
                                {{ $rezome_item->Jobـstartـdate }} - {{ $rezome_item->Jobـendـdate }}
                            @else
                                {{$rezome_item->Jobـstartـdate}}   -    تا کنون
                            @endif
                        </div>
                        <h2>{{ $rezome_item->jobـposition }}</h2>
                        <h4>{{ $rezome_item->title }}</h4>
                        <p>
                            {!! strip_tags($rezome_item->description_rezome) !!}
                        </p>

                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
