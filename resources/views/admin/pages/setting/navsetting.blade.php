@extends('admin.backend_master.dashboard.master_page')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin: 1.5rem auto;">
                        <div class="card-body">
                            <div class="container-fluid" style="padding:0;margin: 0;">
                                <div class="row ">
                                    <div class="col-md-6" style="text-align: start;">
                                        <h4 class="card-title">تنظیمات منو </h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{route('admin.setting.update')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$nav_set->id}}">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="title" class="form-label"><span style="color:#ec0808;">*&nbsp</span>عنوان سایت :</label>
                                        <input id="title" type="text" name="title_site" class="form-control" value="{{$nav_set->title_site}}" >
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <p class="p-set-dev">
                                            در صورتی که هم آیکون آپلود شود و هم نام سایت، آیکون دارای اولویت بالاتری خواهد بود.
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="title" class="form-label"><span style="color:#ec0808;">*&nbsp</span>نام سایت :</label>
                                        <input id="title" type="text" name="name_site" class="form-control" value="{{$nav_set->name_site}}" >
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="image_services" class="form-label">ایکون سایت  : <span style="color:#d52626;font-size: 0.7rem;">(250x50)</span></label>
                                        <input name="image_site" class="form-control" type="file" id="image" style="width: 32%;">
                                        <input type="hidden" name="image_site" id="primaryImage" value="">
                                        <br>
                                        <img id="showImage" class="rounded avatar-lg" src="{{ asset(!empty($nav_set->image_site) ? $nav_set->image_site : 'uploads/no_images.jpg' ) }}" style="border: 1px solid;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <button class="btn btn-danger" style="width: 10%;">
                                        حذف عکس
                                    </button>
                                </div>
                                <div class="row">
                                    <div class="col-md-9 mb-3">
                                        <label for="description_services" class="form-label">توضیحات : </label>
                                        <textarea id="elm1" type="text" name="description" class="form-control">
                                                {!! $nav_set->description !!}
                                        </textarea>
                                    </div>
                                </div>


                                <!--end row-->
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary">بروزرسانی  </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

    </script>
    <script type="text/javascript">
        $(document).on('click', '.btn-danger', function(e) {
            e.preventDefault();

            // دریافت آی‌دی مورد نظر
            var id = $('input[name="id"]').val();

            // درخواست AJAX برای حذف عکس
            $.ajax({
                url: '{{ route("admin.setting.deletePhoto") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(response) {
                    alert(response.success);
                    $('#showImage').attr('src', 'uploads/no_images.jpg');
                }
            });
        });
    </script>

@endsection
