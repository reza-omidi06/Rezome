@extends('admin.backend_master.dashboard.master_page')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between content-height">
                        <h4>مدیریت دسته بندی ها </h4>

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
                                    <div class="col-md-12 mb-3" style="text-align:end;">
                                        <a href="{{route('admin.portfoliocategory.add')}}" class="btn btn-outline-primary mt-1">
                                            <i class="ri-add-box-fill">
                                               دسته بندی جدید
                                            </i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align:center;">نام دسته بندی</th>
                                    <th style="text-align:center;">نام دسته(لاتین)</th>
                                    <th style="text-align:center;">تصویر</th>
                                    <th style="text-align:center;">توضیحات</th>
                                    <th style="text-align:center;">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($detail_portfolio_category as $portfolio_category)
                                    <tr>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$i++}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$portfolio_category->name_portfolio_category}}

                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$portfolio_category->name_en_portfolio_category}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            <img class="img_manag-cat" src="{{asset(!empty($portfolio_category->image_portfolio_category) ? $portfolio_category->image_portfolio_category : 'uploads/no_images.jpg')}}">
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {!! Str::limit(strip_tags($portfolio_category->description_portfolio_category),16) !!}
                                        </td>
                                        <td style="text-align:center;padding: 1.5rem 0;">
                                            <a href="{{route('admin.portfoliocategory.edit',$portfolio_category->id)}}" class="btn btn-info sm" title="Edite Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.portfoliocategory.delete',$portfolio_category->id)}}" id="delete" class="btn btn-danger sm" title="Delete Data" onclick="deleteData()">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
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
