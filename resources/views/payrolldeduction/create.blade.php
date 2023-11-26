@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/persian-datepicker/css/persian-datepicker.min.css') }}">
@endsection
@section('content')

    <form action="{{ url('payrolldeduction/store') }}" method="post" id="form-payrolldeduction">
        @csrf
        <div class="col-md-3 mb-3">
            <label for="payrolldeduction" class="form-label" type="post">شماره دفتر کل</label>
            <input type="text" class="form-control input-con" placeholder=""
                   name="payrolldeduction"
                   id="payrolldeduction">
            <div class="text-danger col-md-12 text-left p-0">
                @error('payrolldeduction')
                {{ $message }}
                @enderror
            </div>
        </div>


        <div class="col-md-3 mb-3">
            <label for="payrolldeduction_num" class="form-label">شماره حساب</label>
            <input type="text" class="form-control input-con"
                   name="payrolldeduction_num"
                   id="payrolldeduction_num">
            <div class="text-danger col-md-12 text-left p-0">
                @error('payrolldeduction_num')
                {{ $message }}
                @enderror()
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <label for="payrolldeduction_nath" class="form-label">شماره ملی</label>
            <input type="text" class="form-control input-con"
                   name="payrolldeduction_nath"
                   id="payrolldeduction_nath">
            <div class="text-danger col-md-12 text-left p-0">
                @error('payrolldeduction_nath')
                {{ $message }}
                @enderror()
            </div>
        </div>


        <div class="d-grid gap-2 col-2 mx-auto" style="position: absolute;top: 85%;left: 10%">
            <button type="submit" class="btn btn-primary btn-lg" id="btn-save-payrolldeduction" >ثبت </button>
        </div>
    </form>


@endsection
@section('scripts')

    <script src="{{ asset('vendor/persian-date/js/persian-date.min.js') }}"></script>
    <script src="{{ asset('vendor/persian-datepicker/js/persian-datepicker.min.js') }}"></script>
    <script>


        (function ($) {
            payrolldeduction = {
                init: function (cnfg) {
                    this.config = cnfg;
                    this.bindEvents();
                    this.setAjaxSetup();
                },

                bindEvents: function () {
                    this.config.btnSavePayrolldeduction.on('click', this.sendPayrolldeduction);
                },

                getToken: function () {
                    return document.querySelector('meta[name="csrf-token"]')['content'];
                },

                setAjaxSetup: function () {
                    let self = payrolldeduction;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': self.getToken()
                        }
                    });
                },
                sendPayrolldeduction: function () {
                    let self = payrolldeduction;
                    let checked = self.config.formPayrolldeduction.validate({
                        rules: {
                            'payrolldeduction': {
                                required: true,
                            },
                            'payrolldeduction_num': {
                                required: true,
                            },
                            'payrolldeduction_nath': {
                                required: true,
                            },
                        },
                        messages: {
                            'payrolldeduction': {
                                required: 'عنوان الزامی است'
                            },
                            'payrolldeduction_num': {
                                required: 'انتخاب دسته آگهی الزامی است'
                            },
                            'payrolldeduction_nath': {
                                required: 'انتخاب استان الزامی است'
                            },
                        },
                        highlight: function (el) {
                            $('#' + el.id).addClass('is-invalid');
                        },
                        unhighlight: function (el) {
                            $('#' + el.id).removeClass('is-invalid');
                        },
                        onfocusout: false,
                        focusCleanup: false,
                        errorClass: 'group-error-validate'
                    }).form();
                    let data = new FormData(self.config.formPayrolldeduction[0]);
                    if (checked) {
                        $.ajax(
                            {
                                'url': 'Payrolldeduction/store',
                                'type': 'POST',
                                'data': data,
                                dataType: 'JSON',
                                processData: false,
                                contentType: false,
                                beforeSend: function () {
                                    self.config.btnSavePayrolldeduction.attr('disabled', true);
                                },
                                success: function (res) {
                                    self.config.formPayrolldeduction[0].reset();
                                    izitoast.success({
                                        title: res.title,
                                        message: res.message,
                                        position: "bottomLeft",
                                        timeout: 8000,
                                        rtl: true
                                    });
                                },
                                error: function (err) {
                                    if (err.status == '422') {
                                        $.each(err.responseJSON.errors, function (i, v) {
                                            let el = $(v);
                                            izitoast.error({
                                                title: 'خطا',
                                                message: el[0],
                                                position: "bottomLeft",
                                                timeout: 4000,
                                                rtl: true
                                            })
                                        });
                                    } else if (err.status == '500') {
                                        izitoast.error({
                                            title: err.responseJSON.title,
                                            message: err.responseJSON.message,
                                            position: "bottomLeft",
                                            rtl: true,
                                            timeout: 3000,
                                        })
                                    }
                                },
                                complete: function () {
                                    self.config.btnSavePayrolldeduction.attr('disabled', false);
                                }
                            }
                        )
                    }
                }
            };

            payrolldeduction.init({
                btnSavePayrolldeduction: $('#btn-save-payrolldeduction'),
                formPayrolldeduction: $('#form-payrolldeduction'),
            });

        })(window.jQuery);









    </script>
@endsection
