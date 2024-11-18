<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@php
    $prices=App\Models\PlanType::orderBy('name_type_fa','ASC')->get();
    $setting=\App\Models\OrderSetting::find(1)->first();
@endphp
<style>
    /*******************************/
    /********* Banner CSS **********/
    /*******************************/
    .banner {
        position: relative;
        width: 100%;
        margin: 45px 0;
        padding: 90px 0;
        background:{{$setting->order_setting_back_color}};
        /*background: #EF233C;*/
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-image:url('{{asset($setting->order_setting_back_image)}}');
        @if($setting->order_setting_back_attachment != 1)
            Background-attachment: unset;
        @else
         Background-attachment: fixed;
        @endif


    }
</style>
<div class="banner wow zoomIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="section-header text-center">
            <p>{{$setting->order_setting_title_up_title}}</p>
            <h2>{{$setting->order_setting_title}}t</h2>
        </div>
        <div class="container banner-text">
            <p>
                {!! $setting->order_setting_description !!}
            </p>

            <button class="open-button btn" onclick="openFormOrder()" style="color:{{$setting->order_setting_back_color}};background-color:{{$setting->order_setting_btn_color}} background:{{$setting->order_setting_btn_color}}; box-shadow: inset 0 0 0 50px {{$setting->order_setting_btn_color}};;">ثبت سفارش</button>
            <div class="form-popup" id="myFormOrder">
                <form action="{{route('admin.order.store')}}" method="POST" enctype="multipart/form-data" class="form-container">
                    @csrf
                    <span class="span-st">ثبت سفارش</span>
                    <hr style="width:50%">
                    <div class="row mb-3 mt-3">
                        <div class="col-md-6">
                            <select name="plan_id" class="form-control" aria-label="Disabled select example" required>
                                <option selected> پنل مورد نظر</option>
                                @foreach($prices as $price)
                                    <option value="{{$price->id}}">{{$price->name_type_fa}} | {{$price->price_type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="order_name" class="form-control mt-0" placeholder="نام" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="email" name="order_mail" class="form-control" placeholder="ex@mail.com" required>
                        </div>
                        <div class="col-md-6">
                            <input type="tel" name="order_phone" class="form-control" placeholder="0912xxxxxxx" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-10">
                            <span>توضیحات</span>
                            <textarea type="text" name="order_description" class="form-control">

                            </textarea>
                        </div>
                        <div class="col-md-8 col-four-md">
                            <input type="file" id="file" name="order_file" max="2MB">
                            <label for="file" class="btn-1">فایل پیوست</label>
                            <br>
                            <span id="fileName" style="display: block; margin-top: 10px;padding:.3rem;border-radius: .25rem;border:1px solid #ced4da;">هیچ فایلی انتخاب نشده است</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-submit-order">ثبت نظر</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn cancel btn-close-order" onclick="closeFormOrder()">بستن</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('file').addEventListener('change', function() {
        const fileNameSpan = document.getElementById("fileName");
        if (this.files && this.files[0]) {
            let fileName = this.files[0].name;

            if (fileName.length > 20) {
                fileName = fileName.substring(0, 20) + '...';
            }

            fileNameSpan.textContent = fileName;
        } else {
            fileNameSpan.textContent = "هیچ فایلی انتخاب نشده است";
        }
    });
</script>
<script type="text/javascript">

    function openFormOrder() {
        document.getElementById("myFormOrder").style.display = "block";
    }

    function closeFormOrder() {
        document.getElementById("myFormOrder").style.display = "none";
    }
</script>

@if(session('success'))
    <script>
        Swal.fire({
            title: 'درسریع ترین زمان ممکن باشما تماس می گیریم!',
            text: "{{ session(' پیام شما با موفقیت ارسال شد!') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

