@extends('admin.backend_master.dashboard.master_page')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between" style="margin:1rem auto">
                        <h4 style="text-align:center;">پیام ها</h4>
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
                                    <div class="col-md-12 mb-3">
                                        <a href="#" class="btn btn-outline-success" >
                                            <i class="fa-solid fa-gear">
                                                تنطیمات
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align:center;">نام</th>
                                    <th style="text-align:center;">ایمیل </th>
                                    <th style="text-align:center;">شماره تماس</th>
                                    <th style="text-align:center;">موضوع پیام </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($contact_input as $contacts)

                                    <tr>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$i++}}

                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$contacts->name}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$contacts->email}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$contacts->phone}}
                                        </td>
                                        <td style="text-align:center;line-height: 3rem;">
                                            {{$contacts->subject}}
                                        </td>
                                        <td style="text-align:center;padding: 1.5rem 0;">
                                            <a href="{{route('admin.contact.show',$contacts->id)}}" class="btn btn-warning sm" title="Show Data">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                            <a href="{{route('admin.contact.destroy',$contacts->id)}}" id="delete" class="btn btn-danger sm" title="Delete Data" onclick="deleteData()">
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
