@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/persian-datepicker/css/persian-datepicker.min.css') }}">
@endsection
@section('content')

    <form action="{{ url('accountnumber/store') }}" method="post" id="form-account">
        @csrf
        <div class="col-md-3 mb-3">
                <label for="accountnumber_num" class="form-label" type="post">شماره دفتر کل</label>
            <input type="text" class="form-control input-con" placeholder=""
                   name="accountnumber_num"
                   id="accountnumber_num">
            <div class="text-danger col-md-12 text-left p-0">
                @error('accountnumber_num')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3 mb-3">
                <label for="accountnumber_code" class="form-label">شماره حساب</label>
            <input type="text" class="form-control input-con"
                   name="accountnumber_code"
                   id="accountnumber_code">
            <div class="text-danger col-md-12 text-left p-0">
                @error('accountnumber_code')
                {{ $message }}
                @enderror()
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <label for="accountnumber_nath" class="form-label">شماره ملی</label>
            <input type="text" class="form-control input-con"
                   name="accountnumber_nath"
                   id="accountnumber_nath">
            <div class="text-danger col-md-12 text-left p-0">
                @error('accountnumber_nath')
                {{ $message }}
                @enderror()
            </div>
        </div>


        <div class="d-grid gap-2 col-2 mx-auto" style="position: absolute;top: 85%;left: 10%">
            <button type="submit" class="btn btn-primary btn-lg" id="btn-save-account" >ثبت </button>
        </div>
    </form>


@endsection
@section('scripts')
    <script src="{{ asset('vendor/persian-date/js/persian-date.min.js') }}"></script>
    <script src="{{ asset('vendor/persian-datepicker/js/persian-datepicker.min.js') }}"></script>
    <script>
        (function ($) {
            account = {
                init: function (cnfg) {
                    this.config = cnfg;
                    this.bindEvents();
                    this.setAjaxSetup();
                },

                bindEvents: function () {
                    this.config.btnSaveAccount.on('click', this.sendAccount);
                },

                getToken: function () {
                    return document.querySelector('meta[name="csrf-token"]')['content'];
                },

                setAjaxSetup: function () {
                    let self = account;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': self.getToken()
                        }
                    });
                },
                sendAccount: function () {
                    let self = account;
                    let checked = self.config.formAccount.validate({
                        rules: {
                            'accountnumber_num': {
                                required: true,
                            },
                            'accountnumber_code': {
                                required: true,
                            },
                            'accountnumber_nath': {
                                required: true,
                            },
                        },
                        messages: {
                            'accountnumber_num': {
                                required: 'عنوان الزامی است'
                            },
                            'accountnumber_code': {
                                required: 'انتخاب دسته آگهی الزامی است'
                            },
                            'accountnumber_nath': {
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
                    let data = new FormData(self.config.formAccount[0]);
                    if (checked) {
                        $.ajax(
                            {
                                'url': 'accountnumber/store',
                                'type': 'POST',
                                'data': data,
                                dataType: 'JSON',
                                processData: false,
                                contentType: false,
                                beforeSend: function () {
                                    self.config.btnSaveAccount.attr('disabled', true);
                                },
                                success: function (res) {
                                    self.config.formAccount[0].reset();
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
                                    self.config.btnSaveAccount.attr('disabled', false);
                                }
                            }
                        )
                    }
                }
            };

            account.init({
                btnSaveAccount: $('#btn-save-account'),
                formAccount: $('#form-account'),
            });

        })(window.jQuery);

    </script>
@endsection
