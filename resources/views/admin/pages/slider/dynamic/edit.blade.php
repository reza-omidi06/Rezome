@extends('admin.backend_master.dashboard.master_page')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin: 1.5rem auto;">
                        <div class="card-body">
                            <div class="container-fluid" style="padding:0;margin: 0;">
                                <div class="row ">
                                    <div class="col-md-6" style="text-align: start;">
                                        <h4 class="card-title">ویرایش متن های متحرک </h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{route('admin.dynamic.update')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$dynamic_edit->id }}">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="portfolio_name" class="form-label">متن </label>
                                        <textarea id="elm1" name="text_dynamic" class="form-control">
                                            {{$dynamic_edit->text_dynamic}}
                                        </textarea>
                                    </div>
                                </div>
                                <!--end row-->
                                <div class="row mb-3">
                                    <div class="col-md-5">
                                        <button type="submit" class="btn btn-primary">بروزرسانی </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
