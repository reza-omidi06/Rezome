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
                                        <a href="{{route('admin.plantype.create')}}" class="btn btn-primary" >
                                            <i class="ri-add-box-fill">
                                              افزودن
                                            </i>
                                        </a>
                                        <a href="{{route('admin.fecureplan.manage')}}" class="btn btn-outline-primary" >
                                            <i class="ri-add-box-fill">
                                              ویژگی پلن
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align:center;">نام پلن</th>
                                    <th style="text-align:center;">قیمت پلن</th>
                                    <th style="text-align:center;">فعال /غیر فعال </th>
                                    <th style="text-align:center;">پیشنهادی</th>
                                    <th style="text-align:center;">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($show_types as $show_type)
                                    <tr>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$i++}}
                                        </td>

                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$show_type->name_type_fa}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$show_type->price_type}}
                                        </td>

                                        <td style="text-align:center;line-height: 3rem;">

                                             @if( $show_type->status_type == 1)
                                                <form action="{{route('admin.plantype.inactive')}}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$show_type->id}}">
                                                    <button type="submit" class="btn btn-success" >فعال</button>
                                                </form>
                                            @else
                                                <form action="{{route('admin.plantype.active')}}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$show_type->id}}">
                                                    <button type="submit" class="btn btn-danger" >غیرفعال</button>
                                                </form>
                                            @endif

                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            @if($show_type->special ==1)
                                                <form method="POST" action="{{route('admin.inactive.special')}}" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$show_type->id}}">
                                                    <button type="submit" class="btn btn-success">فعال</button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{route('admin.active.special')}}" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$show_type->id}}">
                                                    <button type="submit" class="btn btn-danger">غیر فعال</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td style="text-align:center;padding: 1.5rem 0;">
                                            <a href="{{route('admin.plantype.edit',$show_type->id)}}" class="btn btn-info sm" title="Edite Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.plantype.destroy',$show_type->id)}}" id="delete" class="btn btn-danger sm" title="Delete Data" onclick="deleteData()">
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
