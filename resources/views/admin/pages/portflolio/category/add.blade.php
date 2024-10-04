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
                                        <h4 class="card-title">افزودن دسته بندی  </h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{route('admin.portfoliocategory.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name_portfolio_category" class="form-label"><span style="color:#ec0808;">*&nbsp</span>نام دسته :</label>
                                        <input id="name_portfolio_category" type="text" name="name_portfolio_category" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name_en_portfolio_category" class="form-label"><span style="color:#ec0808;">*&nbsp</span>نام دسته (لاتین) : </label>
                                        <input id="name_en_portfolio_category" type="text" name="name_en_portfolio_category" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9 mb-3">
                                        <label for="description_portfolio_category" class="form-label">توضیحات : </label>
                                        <textarea id="elm1" type="text" name="description_portfolio_category" class="form-control">

                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="image_portfolio_category" class="form-label">ابعاد عکس : <span style="color:#d52626;font-size: 0.7rem;">(150x150)</span></label>
                                        <input name="image_portfolio_category" class="form-control" type="file"   id="image"   style="width: 32%;">
                                        <input type="hidden" name="image_portfolio_category" id="primaryImage" value="">
                                        <br>
                                        <img id="showImage" class="rounded avatar-lg" src="{{asset('uploads/no_images.jpg')}}" style="border: 1px solid;">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                </div>

                                <!--end row-->
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-success">اضافه کردن </button>
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
@endsection
