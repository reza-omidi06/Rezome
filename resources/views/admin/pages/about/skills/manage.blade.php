@extends('admin.backend_master.dashboard.master_page')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between" style="margin:1rem auto">
                        <h4 style="text-align:center;">مدیریت مهارت ها</h4>
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
                                        <a href="{{route('admin.skill.add')}}" class="btn btn-outline-success" >
                                            <i class="ri-add-box-fill">
                                                درج مهارت
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align:center;">عنوان مهارت</th>
                                    <th style="text-align:center;">عنوان مهارت (لاتین)</th>
                                    <th style="text-align:center;">میزان مهارت</th>
                                    <th style="text-align:center;">توضیحات</th>
                                    <th style="text-align:center;">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($manage_skils as $skill)
                                    <tr>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$i++}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$skill->skill_name}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$skill->skill_name_en}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            %  {{$skill->skill_percentage}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {!! $skill->description !!}
                                        </td>
                                        <td style="text-align:center;padding: 1.5rem 0;">
                                            <a href="{{route('admin.skill.edit',$skill->id)}}" class="btn btn-info sm" title="Edite Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{route('admin.skill.delete',$skill->id)}}" id="delete" class="btn btn-danger sm" title="Delete Data" onclick="deleteData()">
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
