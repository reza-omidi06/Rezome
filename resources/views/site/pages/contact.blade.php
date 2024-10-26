<style>
    .contact .container-fluid {
        background: url({{asset('frontend/assets/img/contact.jpg')}}) left center no-repeat;
        background-size: contain;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="contact wow fadeInUp" data-wow-delay="0.1s" id="contact">
    <div class="container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form action="{{route('admin.contact.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="control-group">
                                <input type="text" name="name" class="form-control"  placeholder="نام شما" required="required" data-validation-required-message="نام را وارد کنید" />
                                <p class="help-block"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" name="email" class="form-control"  placeholder="ایمیل شما" required="required" data-validation-required-message="ایمل را وارد کنید" />
                                <p class="help-block"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" name="phone" class="form-control"  placeholder="شماره شما" required="required" data-validation-required-message="شماره تماس  را وارد کنید" />
                                <p class="help-block"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" name="subject" class="form-control"  placeholder="موضوع" required="required" data-validation-required-message="موضوع را وارد کنید" />
                                <p class="help-block"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control"  name="massage" placeholder="پیام"  data-validation-required-message="پیام شما"></textarea>
                                <p class="help-block"></p>
                            </div>
                            <div class="sub-cont">
                                <button class="btn" type="submit" id="sendMessageButton"> ارسال پیام</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('success'))
    <script>
        Swal.fire({
            title: 'ارسال شد!',
            text: "{{ session(' پیام شما با موفقیت ارسال شد!') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
