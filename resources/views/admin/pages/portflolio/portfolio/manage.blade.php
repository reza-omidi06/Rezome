@extends('admin.backend_master.dashboard.master_page')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mt-3" style="text-align:center;">مدیریت نمونه کار </h4>
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
                                        <a href="{{route('admin.portfoliocategory.manage')}}" class="btn btn-outline-primary mt-1">
                                            <i class="ri-add-box-fill">
                                                دسته بندی
                                            </i>
                                        </a>
                                        <a href="{{route('admin.portfolio.add')}}" class="btn btn-primary mt-1">
                                            <i class="ri-add-box-fill">
                                                افزودن
                                            </i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align:center;">دسته بندی</th>
                                    <th style="text-align:center;">نام </th>
                                    <th style="text-align:center;">مشتری</th>
                                    <th style="text-align:center;">آدرس اینترنتی</th>
                                    <th style="text-align:center;">Image</th>
                                    <th style="text-align:center;">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($manage_portfolio as $portfolio)
                                    <tr>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$i++}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{optional($portfolio->category)->name_portfolio_category}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {!! Str::limit($portfolio->portfolio_name,20) !!}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$portfolio->portfolio_client}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">

                                            <a href="{{$portfolio->portfolio_url}} "target="_blank" >
                                                {{$portfolio->portfolio_url}}
                                            </a>

                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            <img class="img_manag-cat" src="{{asset(!empty($portfolio->portfolio_image) ? $portfolio->portfolio_image : 'uploads/no_images.jpg')}}">
                                        </td>
                                        <td style="text-align:center;padding: 1.5rem 0;">
                                            <a href="{{route('admin.portfolio.edit',$portfolio->id)}}" class="btn btn-info sm" title="Edite Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.portfolio.delete',$portfolio->id)}}" id="delete" class="btn btn-danger sm" title="Delete Data" onclick="deleteData()">
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
