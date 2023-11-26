@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/persian-datepicker/css/persian-datepicker.min.css') }}">
@endsection
@section('style')

@endsection
@section('content')
    <div class="container-fluid">
        {{-- @include('partials.breadcrumb', ['breadcrumb' => [['route_name' => 'cities.index', 'text' => ts_lang('Cities')], ['text' => ts_lang('Add city')]]])--}}
        <section>
            {{-- {!!Form::open()->route('cities.store')!!} --}}
            <?php /*
            <div class="card mb-4">
                <div class="d-flex flex-wrap justify-content-between">
                    <h6 class="mt-2">افزودن درخواست جدید</h6>
	                <a href="#">مشاهده درخواست ها</a>
                </div>
            </div>
            */?>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-4 p-0">
	                        <div class="row">
								<div class="container">
									<div class="accordion" id="accordionExample">
										<div class="steps" style="display: none">
    										<progress id="progress" value=0 max=100 ></progress>
    										<div class="step-item">
        										<button class="step-button text-center btn-success" type="button" data-bs-toggle="collapse"
            										data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="step-button1">
											            1
        										</button>
					        					<div class="step-title">
            										مشخصات
		        								</div>
			    							</div>
    										<div class="step-item">
        										<button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            										data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="step-button2">
            										2
										        </button>
										        <div class="step-title">
													مخاطبین
				        						</div>
										    </div>
    										<div class="step-item">
										        <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            										data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" id="step-button3">
            										3
        										</button>
										        <div class="step-title">
										        	 آپلود نامه
										        </div>
										    </div>
    										<div class="step-item">
        										<button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            										data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" id="step-button4">
            										4
        										</button>
										        <div class="step-title">
										            پرداخت
        										</div>
										    </div>
										</div>

										<div class="step-card" id="step-card1">
    										<div  id="headingOne">
    										</div>
    											<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
        											data-bs-parent="#accordionExample">
        											<div class="card-body">

    	                    							<div class="col-md-12 mt-0 d-flex justify-content-center">
															<div class="col-md-6 p-3">
																<form action="{{ route('letters.store') }}" method="post" id="letter-form" >
																	@csrf
																	<div class="row mb-3 mt-5">
    																	<label for="daftarKol" class="col-sm-3 col-form-label">شماره دفتر کل</label>
    																	<div class="col-sm-9">
      																		<input name="daftarKol" id="daftarKol" class="form-control"  rows="7">{{ old('daftarKol') }}</input>
																			@error('daftarKol')
																				<div class="alert-danger mt-1 mb-1">{{ $message }}</div>
																			@enderror
    																	</div>
  																	</div>

                                                                    <div class="row mb-3 mt-5">
                                                                        <label for="bankCode" class="col-sm-3 col-form-label">شماره حساب</label>
                                                                        <div class="col-sm-9">
                                                                            <input name="bankCode" id="bankCode" class="form-control"  value="{{ old('bankCode') }}">
                                                                            @error('bankCode')
                                                                            <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

																		<div class="row mb-3 mt-5">
    																		<label for="nationalCode" class="col-sm-3 col-form-label">کد ملی</label>
    																		<div class="col-sm-9">
      																			<input name="nationalCode" id="nationalCode" class="form-control"  value="{{ old('nationalCode') }}">
																			@error('nationalCode')
																				<div class="alert-danger mt-1 mb-1">{{ $message }}</div>
																			@enderror
    																		</div>
  																		</div>

																		<div class="row mb-3 mt-5">
    																		<label for="letterDateField" class="col-sm-3 col-form-label">تاریخ </label>
    																		<div class="col-sm-9">
      																			<input name="letterDateField" id="letterDateField" class="form-control"  value="{{ old('letterDateField') }}">
      																			<input type="hidden" name="letterDate" id="letterDate"  value="{{ old('letterDate') }}">
																			@error('letterDateField')
																				<div class="alert-danger mt-1 mb-1">{{ $message }}</div>
																			@enderror
    																		</div>
  																		</div>
  																</div>
                        									</div>

															<div class="col-md-12 mt-0 d-flex justify-content-center">

                                                                    <div class="d-flex justify-content-center " style="margin-left: 175px">
                                                                        <input type="checkbox" id="submit-letter-form" name="vehicle1" value="Bike">
                                                                        اطلاعات فوق مورد تایید است
																	<button type="button" class="btn btn-primary" style="position: absolute; left: 10%;top: 79%" id="register-payment-btn"> مرحله بعد</button>
																</div>
															</div>
        													</div>
    													</div>
													</div>
													<div class="card step-card"  id="step-card3">
    													<div  id="headingThree">
													    </div>
    													<div id="collapseThree" class="collapse" aria-labelledby=""
        													data-bs-parent="#accordionExample">
        													<div class="card-body">
	    	                    								<div class="col-md-12 mt-3 d-flex justify-content-center">
																	<div id="image-wrapper"></div>
																		<div id="clone-section">
																			<div id="clone"  class="mb-3">
																				<img src="" class="img-fluid">
																			</div>
																		</div>
																	</div>
        													</div>
    													</div>
													</div>
													<div class="card step-card" id="step-card4">
    													<div  id="headingThree">
													    </div>
    													<div id="collapseFour" class="collapse" aria-labelledby="headingFour"
        													data-bs-parent="#accordionExample">
        													<div class="card-body">
            														<div class="col-md-12 mt-0 d-flex justify-content-center mt-8 mb-8">
																	<div class="col-md-6 pt-6">
																		<div id="payment-info"  class="pb-8 pt-8 d-flex justify-content-center">
																			<table class="table table-bordered payment-info-table">
  																				<thead>
    																				<tr>
      																					<th colspan="4" class="text-center">پیش فاکتور</th>
    																				</tr>
  																				</thead>
  																				<tbody>
    																				<tr>
				      																	<td>مبلغ قابل پرداخت</td>
        																				<td>12000 تومان</td>
				    																</tr>
			    																	<tr>
    																					<td>نام ارباب رجوع</td>
    																					<td> </td>
    																				</tr>
    																			</tbody>
																			</table>
																		</div>
                                										<form action="http://ppg.icsdev.ir/" method="post">
                                    										@csrf
{{--                                    										<input hidden name="ver_code" class="payment_ver_code"--}}
{{--                                           										value="{{ unserialize(session()->get('authByOpenID'))["ver_code"] }}">--}}
                                    										<input hidden name="serial" class="payment_serial"  id="serial-input" value="{{--$payment->serial--}}">
                                    										<input hidden name="order_id" id="order-id-input" class="payment_order_id"
                                           										value="{{--$payment->id--}}">
                                    										<input hidden name="postback_url" id="postback-url-input"
                                           										value="https://mrudhamedancoms.icsdev.ir/payment/verify/[amount]/[order_id]">
                                    										<hr>
																		<div class="pt-40 d-flex justify-content-center">
																			<button type="submit" class="btn btn-primary">تایید و پرداخت</button>
                        												</div>
                        												</form>
                        											</div>
                        										</div>

        													</div>
    													</div>
													</div>
												</div>
											</div>
                        				</div>
                        			</div>

                			</div>
            			</div>
            {{-- {!!Form::close()!!} --}}
        </section>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\LetterRequest', '#letter-form') !!}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="{{ asset('vendor/persian-date/js/persian-date.min.js') }}"></script>
    <script src="{{ asset('vendor/persian-datepicker/js/persian-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/dropify.min.js') }}"></script>
	<script>

/*
		if ($("#letter-form").length > 0) {
			$("#letter-form").validate({
				rules: {
					daftarKol: {
						required: true
					},
					sender: {
						required: true,
					},
				},
				messages: {
					daftarKol: {
						required: "لطفا چکیده را وارد کنید",
					},
				},
			});
		}
*/
        $('#letterDateField').persianDatepicker({
            initialValue: false,
           altField: '#letterDate',
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
    		$(document).on('click', '#submit-letter-form', function(e) {
        		e.preventDefault();
    			$.ajax({
        			url: $("#letter-form").attr('action'),
        			type: 'POST',
        			data: $("#letter-form").serialize(),
        			success: function (response) {
         			if (response.status) {
						$('#letter-form').trigger('click');
						//$("#step-card2").css('display', 'none');
						//$("#step-card3").css('display', 'block');
         			} else {
         				$("#letter-form").submit();
         			}
        		}
    		});
    	});

    		$(document).on('click', '#register-payment-btn', function() {
    			$.ajax({
        			url: '{{ route("letters.register.payment") }}',
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
