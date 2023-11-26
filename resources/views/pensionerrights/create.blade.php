@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/persian-datepicker/css/persian-datepicker.min.css') }}">
@endsection
@section('content')

    <form action="{{ url('pensionerrights/store') }}" method="post" id="form-pensionerrights">
        @csrf
        <div class="col-md-3 mb-3">
            <label for="pensionerrights" class="form-label" type="post">شماره دفتر کل</label>
            <input type="text" class="form-control input-con" placeholder=""
                   name="pensionerrights"
                   id="pensionerrights">
            <div class="text-danger col-md-12 text-left p-0">
                @error('pensionerrights')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <label for="pensionerrights_num" class="form-label">شماره حساب</label>
            <input type="text" class="form-control input-con"
                   name="pensionerrights_num"
                   id="pensionerrights_num">
            <div class="text-danger col-md-12 text-left p-0">
                @error('pensionerrights_num')
                {{ $message }}
                @enderror()
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <label for="pensionerrights_nath" class="form-label">شماره ملی</label>
            <input type="text" class="form-control input-con"
                   name="pensionerrights_nath"
                   id="pensionerrights_nath">
            <div class="text-danger col-md-12 text-left p-0">
                @error('pensionerrights_nath')
                {{ $message }}
                @enderror()
            </div>
        </div>


        <div class="d-grid gap-2 col-2 mx-auto" style="position: absolute;top: 85%;left: 10%">
            <button type="submit" class="btn btn-primary btn-lg" id="btn-save-pensionerrights" >ثبت </button>
        </div>
    </form>


@endsection
@section('scripts')

    <script src="{{ asset('vendor/persian-date/js/persian-date.min.js') }}"></script>
    <script src="{{ asset('vendor/persian-datepicker/js/persian-datepicker.min.js') }}"></script>
    <script>

        (function ($) {
            pensionerrights = {
                init: function (cnfg) {
                    this.config = cnfg;
                    this.bindEvents();
                    this.setAjaxSetup();
                },

                bindEvents: function () {
                    this.config.btnSavePensionerrights.on('click', this.sendPensionerrights);
                },

                getToken: function () {
                    return document.querySelector('meta[name="csrf-token"]')['content'];
                },

                setAjaxSetup: function () {
                    let self = pensionerrights;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': self.getToken()
                        }
                    });
                },
                sendPensionerrights: function () {
                    let self = pensionerrights;
                    let checked = self.config.formPensionerrights.validate({
                        rules: {
                            'pensionerrights': {
                                required: true,
                            },
                            'pensionerrights_num': {
                                required: true,
                            },
                            'pensionerrights_nath': {
                                required: true,
                            },
                        },
                        messages: {
                            'pensionerrights': {
                                required: 'عنوان الزامی است'
                            },
                            'pensionerrights_num': {
                                required: 'انتخاب دسته آگهی الزامی است'
                            },
                            'pensionerrights_nath': {
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
                    let data = new FormData(self.config.formPensionerrights[0]);
                    if (checked) {
                        $.ajax(
                            {
                                'url': 'pensionerrights/store',
                                'type': 'POST',
                                'data': data,
                                dataType: 'JSON',
                                processData: false,
                                contentType: false,
                                beforeSend: function () {
                                    self.config.btnSavePensionerrights.attr('disabled', true);
                                },
                                success: function (res) {
                                    self.config.formPensionerrights[0].reset();
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
                                    self.config.btnSavePensionerrights.attr('disabled', false);
                                }
                            }
                        )
                    }
                }
            };

            pensionerrights.init({
                btnSavePensionerrights: $('#btn-save-pensionerrights'),
                formPensionerrights: $('#form-pensionerrights'),
            });

        })(window.jQuery);






    </script>
@endsection
