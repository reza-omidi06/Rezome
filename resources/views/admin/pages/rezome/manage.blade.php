@extends('admin.backend_master.dashboard.master_page')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@persian-tools/persian-datepicker/dist/css/persian-datepicker.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@persian-tools/persian-datepicker/dist/js/persian-datepicker.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between" style="margin:1rem auto">
                        <h4 style="text-align:center;">مدیریت رزومه</h4>
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
                                        <a href="{{route('admin.rezome.add')}}" class="btn btn-outline-success" >
                                            <i class="ri-add-box-fill">
                                              افزودن
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style=" background: #e7e7ff; color: #566a7f; ">
                                            تغیر عنوان
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <form method="POST" action="{{route('admin.rezome.title')}}"  class="py-3 accordion-form" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="title" class="form-label"><span style="color:#ec0808;">*&nbsp</span>تغیر نام  :</label>
                                                    <input id="title" type="text" name="title" class="form-control" value="{{$rezome_header->title}}" >
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="sub_title" class="form-label"><span style="color:#ec0808;">*&nbsp</span>عنوان :</label>
                                                    <input id="sub_title" type="text" name="sub_title" class="form-control" value="{{$rezome_header->sub_title}}">

                                                </div>
                                            </div>
                                            <!--end row-->
                                            <div class="row mb-3">
                                                <div class="col-md-5">
                                                     <button type="submit" class="btn btn-primary"> بروزرسانی </button>
                                                 </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align:center;">پزیشن شغلی</th>
                                    <th style="text-align:center;">عنوان </th>
                                    <th style="text-align:center;">تارخ </th>
                                    <th style="text-align:center;">فعال /غیر فعال </th>
                                    <th style="text-align:center;">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($rezome_manage as $rezome)
                                    <tr>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$i++}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$rezome->jobـposition}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$rezome->title}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            @if($rezome->Jobـendـdate != null)
                                                {{$rezome->Jobـstartـdate}}-{{$rezome->Jobـendـdate}}
                                            @else
                                                {{$rezome->Jobـstartـdate}}   -    تا کنون
                                            @endif

                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            @if( $rezome->status == 1)
                                                <form action="{{route('admin.rezome.inactive')}}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$rezome->id}}">
                                                    <button type="submit" class="btn btn-success" >فعال</button>
                                                </form>
                                            @else
                                                <form action="{{route('admin.rezome.active')}}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$rezome->id}}">
                                                    <button type="submit" class="btn btn-danger" >غیرفعال</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td style="text-align:center;padding: 1.5rem 0;">
                                            <a href="{{route('admin.rezome.edit',$rezome->id)}}" class="btn btn-info sm" title="Edite Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.rezome.delete',$rezome->id)}}" id="delete" class="btn btn-danger sm" title="Delete Data" onclick="deleteData()">
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
