    @extends('layouts.app')
    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/persian-datepicker/css/persian-datepicker.min.css') }}">
    @endsection
    @section('content')

        <form action="{{ url('lawrights/store') }}" method="post" id="form-lawrights">
            @csrf
            <div class="col-md-3 mb-3">
                <label for="lawrights_num" class="form-label" type="post">شماره دفتر کل</label>
                <input type="text" class="form-control input-con" placeholder=""
                       name="lawrights_num"
                       id="lawrights_num">
                <div class="text-danger col-md-12 text-left p-0">
                    @error('lawrights_num')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <label for="lawrights_code" class="form-label">شماره حساب</label>
                <input type="text" class="form-control input-con"
                       name="lawrights_code"
                       id="lawrights_code">
                <div class="text-danger col-md-12 text-left p-0">
                    @error('lawrights_code')
                    {{ $message }}
                    @enderror()
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <label for="lawrights_nath" class="form-label">شماره ملی</label>
                <input type="text" class="form-control input-con"
                       name="lawrights_nath"
                       id="lawrights_nath">
                <div class="text-danger col-md-12 text-left p-0">
                    @error('lawrights_nath')
                    {{ $message }}
                    @enderror()
                </div>
            </div>


            <div class="d-grid gap-2 col-2 mx-auto" style="position: absolute;top: 85%;left: 10%">
                <button type="submit" class="btn btn-primary btn-lg" id="btn-save-lawrights" >ثبت </button>
            </div>
        </form>


    @endsection
    @section('scripts')
        <script src="{{ asset('vendor/persian-date/js/persian-date.min.js') }}"></script>
        <script src="{{ asset('vendor/persian-datepicker/js/persian-datepicker.min.js') }}"></script>
        <script>
            (function ($) {
                lawrights = {
                    init: function (cnfg) {
                        this.config = cnfg;
                        this.bindEvents();
                        this.setAjaxSetup();
                    },

                    bindEvents: function () {
                        this.config.btnSaveLawrights.on('click', this.sendLawrights);
                    },

                    getToken: function () {
                        return document.querySelector('meta[name="csrf-token"]')['content'];
                    },

                    setAjaxSetup: function () {
                        let self = lawrights;
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': self.getToken()
                            }
                        });
                    },
                    sendLawrights: function () {
                        let self = lawrights;
                        let checked = self.config.formLawrights.validate({
                            rules: {
                                'lawrights_num': {
                                    required: true,
                                },
                                'lawrights_code': {
                                    required: true,
                                },
                                'lawrights_nath': {
                                    required: true,
                                },
                            },
                            messages: {
                                'lawrights_num': {
                                    required: 'عنوان الزامی است'
                                },
                                'lawrights_code': {
                                    required: 'انتخاب دسته آگهی الزامی است'
                                },
                                'lawrights_nath': {
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
                        let data = new FormData(self.config.formLawrights[0]);
                        if (checked) {
                            $.ajax(
                                {
                                    'url': 'lawrights/store',
                                    'type': 'POST',
                                    'data': data,
                                    dataType: 'JSON',
                                    processData: false,
                                    contentType: false,
                                    beforeSend: function () {
                                        self.config.btnSaveLawrights.attr('disabled', true);
                                    },
                                    success: function (res) {
                                        self.config.formLawrights[0].reset();
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
                                        self.config.btnSaveLawrights.attr('disabled', false);
                                    }
                                }
                            )
                        }
                    }
                };

                lawrights.init({
                    btnSaveLawrights: $('#btn-save-lawrights'),
                    formLawrights: $('#form-lawrights'),
                });

            })(window.jQuery);


        </script>
    @endsection
