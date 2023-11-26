@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/persian-datepicker/css/persian-datepicker.min.css') }}">
@endsection
@section('content')
    <section>
<form action="{{ url('payslip/store') }}" method="post" id="form-payslip">
    @csrf
    <div class="col-md-3 mb-3">
        <label for="payslip_num" class="form-label" type="post">شماره دفتر کل</label>
        <input type="text" class="form-control input-con" placeholder=""
               name="payslip_num"
               id="payslip_num">
        <div class="text-danger col-md-12 text-left p-0">
            @error('payslip_num')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label for="payslip_acc" class="form-label">شماره حساب</label>
        <input type="text" class="form-control input-con"
        name="payslip_acc"
        id="payslip_acc">
        <div class="text-danger col-md-12 text-left p-0">
        @error('payslip_acc')
        {{ $message }}
        @enderror()
    </div>
    </div>

    <div class="col-md-3 mb-3">
        <label for="payslip_code" class="form-label">شماره ملی</label>
        <input type="text" class="form-control input-con"
        name="payslip_code"
        id="payslip_code">
        <div class="text-danger col-md-12 text-left p-0">
        @error('payslip_code')
        {{ $message }}
        @enderror()
    </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="payslip_month" class="col-sm-3 col-form-label"> مربوط به ماه</label>

            <input name="payslip_month" id="payslip_month" class="form-control" >
{{--            <input type="hidden" name="payslip_month" id="payslip_month" >--}}
            @error('payslip_month')
            <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>

    <div class="d-grid gap-2 col-2 mx-auto" style="position: absolute;top: 85%;left: 10%">
    <button type="submit" class="btn btn-primary btn-lg" id="btn-save-payslip">ثبت </button>
    </div>
</form>

    </section>


@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\PayslipRequest', '#payslip-form') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="{{ asset('vendor/persian-date/js/persian-date.min.js') }}"></script>
    <script src="{{ asset('vendor/persian-datepicker/js/persian-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/dropify.min.js') }}"></script>
    <script>

        /*
                if ($("#payslip-form").length > 0) {
                    $("#payslip-form").validate({
                        rules: {
                            abstract: {
                                required: true
                            },
                            sender: {
                                required: true,
                            },
                        },
                        messages: {
                            abstract: {
                                required: "لطفا چکیده را وارد کنید",
                            },
                        },
                    });
                }
        */
        $('#payslip_month').persianDatepicker({
            initialValue: false,
            altField: '#payslipDate',
            observer: false,
            altFormat: 'X',
            format: 'D MMMM YYYY ساعت HH:mm',
            minDate: new persianDate().unix(),
            toolbox: {
                enabled: false
            },
            timePicker: {
                showMeridian: false,
                timeFormat: 'HH:mm:ss p',
                enabled: false
            },
        });

        let imageCount = 0;
        const stepButtons = document.querySelectorAll('.step-button');
        const progress = document.querySelector('#progress');
        const stepCards = document.querySelectorAll('.step-card');
        $(document).ready(function () {
            stepCards.forEach((card, cardIndex)=>{
                if(0 != cardIndex){
                    card.style.display =  'none';
                } else {
                    card.style.display =  'block';
                }
            })
        });
        Array.from(stepButtons).forEach((button,index) => {
            button.addEventListener('click', () => {
                progress.setAttribute('value', index * 100 /(stepButtons.length - 1) );//there are 4 buttons. 3 spaces.

                stepButtons.forEach((item, secindex)=>{
                    if(index > secindex){
                        item.classList.add('done');
                    }
                    if(index < secindex){
                        item.classList.remove('done');
                    }
                })
                stepCards.forEach((card, cardIndex)=>{
                    if(index != cardIndex){
                        card.style.display =  'none';
                    } else {
                        card.style.display =  'block';
                    }
                })
            })
        })

        if($('.dropify').length) {
            $('.dropify').dropify({
                messages: {
                    default: 'عکس را بکشید و رها کنید.',
                    replace: 'عکس را بکشید و رها کنید تا جایگزین شود.',
                    remove: 'حذف',
                    error: 'خطایی در آپلود تصویر رخ داد.'
                }
            });
        }

        $(document).on('click', '#plusBtn', function() {
            let year = parseInt($('#year').val());
            if (year < 1410) {
                $('#year').val(year+1);
            }
        });
        $(document).on('click', '#minusBtn', function() {
            let year = parseInt($('#year').val());
            if (year > 1390) {
                $('#year').val(year-1);
            }
        });


        $(document).on('click', '#image-upload-btn', function() {
            let formData = new FormData(document.getElementById("image-form"));
            $.ajax({
                type: 'POST',
                url: $("#image-form").attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 0) {
                        if(response.errors.image) {
                            Swal.fire({
                                iconHtml: '<i class="fas fa-info"></i>',
                                html: response.errors.image[0],
                                confirmButtonText: 'متوجه شدم'
                            });
                        }
                    } else {
                        var clone = $("#clone").clone();
                        clone.attr('id', 'image-div-' + imageCount);
                        clone.find('img').attr('src', response.url);
                        imageCount++;
                        clone.appendTo("#image-wrapper");
                        $('#image-input').parent().find(".dropify-clear").trigger('click');
                        //const [imageInput] = document.getElementById("image-input").files;
                        //alert(imageInput);
                        //alert(URL.createObjectURL(imageInput));
                        //alert(response.url);

                    }

                    //$('#image-wrapper').html('<img src="' + response.data.path + '" class="d-block mx-auto img-fluid">');
                    //$('#image_id').val(response.data.id);
                },
                error: function (response) {
                    swal.fire("error", "", 'error');
                }
            });
        });
        $(document).on('click', '#submit-first-step', function(e) {
            $('#step-button2').trigger('click');
        });
        $(document).on('click', '#submit-payslip-form', function(e) {
            e.preventDefault();
            $.ajax({
                url: $("#payslip-form").attr('action'),
                type: 'POST',
                data: $("#payslip-form").serialize(),
                success: function (response) {
                    if (response.status) {
                        $('#step-button3').trigger('click');
                        //$("#step-card2").css('display', 'none');
                        //$("#step-card3").css('display', 'block');
                    } else {
                        $("#payslip-form").submit();
                    }
                }
            });
        });

        $(document).on('click', '#register-payment-btn', function() {
            $.ajax({
                url: '{{ route("payslip.register.payment") }}',
                type: 'GET',
                success: function (response) {
                    if (response.status) {
                        $('#step-button4').trigger('click');
                        $("#serial-input").val(response.payment.serial);
                        $("#order-id-input").val(response.payment.id);
                    } else {
                        Swal.fire({
                            iconHtml: '<i class="fas fa-error"></i>',
                            html: 'عملیات با خطا مواجه شد',
                            confirmButtonText: 'متوجه شدم'
                        });
                    }
                }
            });
        });
    </script>
@endsection
