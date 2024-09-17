@extends('admin.backend_master.dashboard.master_page')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between" style="margin:1rem auto">
                        <h4 style="text-align:center;">تنظیمات اسلاید اصلی </h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 mb-3" style="direction: ltr">
                                        <a href="#" class="btn btn-success" >
                                            <i class="ri-add-box-fill">
                                                ویرایش
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align:center;">تصویر</th>
                                    <th style="text-align:center;">عنوان</th>
                                    <th style="text-align:center;">نام</th>
                                    <th style="text-align:center;">متن ها </th>
                                    <th style="text-align:center;">لینک ها</th>
                                    <th style="text-align:center;">پس زمینه </th>
                                    {{--                                    <th style="text-align:center;">Image</th>--}}
                                    <th style="text-align:center;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @php($i=1)--}}
{{--                                @foreach($manage_portfolio as $portfolio)--}}
                                    <tr>
                                        <td style="text-align:center;line-height: 3rem;">
{{--                                            {{$i++}}--}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">

                                            1

                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
2
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
3
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            4
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
5
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            ۵5
                                        </td>

                                        {{--                                        <td style="text-align:center;line-height: 3rem;">--}}
                                        {{--                                            <img--}}
                                        {{--                                                src="{{asset(!empty($portfolio_cat->image_category) ? $portfolio_cat->image_category : 'uploads/no_images.jpg')}}"--}}
                                        {{--                                                style="width: 4rem; border: 1px solid #000; border-radius: 50%; height: auto;">--}}
                                        {{--                                            {{$portfolio_cat->image_category}}--}}
                                        {{--                                            portfolio_image--}}
                                        {{--                                        </td>--}}
                                        <td style="text-align:center;padding: 1.5rem 0;">
                                            <a href="#" class="btn btn-info sm" title="Edite Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" id="delete" class="btn btn-danger sm" title="Delete Data" onclick="deleteData()">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>

                                    </tr>
{{--                                @endforeach--}}
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
@endsection
