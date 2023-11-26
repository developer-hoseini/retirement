@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/persian-datepicker/css/persian-datepicker.min.css') }}">
<style>
.text-left {
	text-align: left;
}
</style>
@endsection
@section('content')
    <div class="container-fluid">
        <section>        
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 p-0">
                        <h6 class="card-header">
                            ایجاد نامه
                        </h6>
                        <div class="card-body">
	                        <div class="row">

								<div class="container">
									<div class="accordion" id="accordionExample">


										<div class="card step-card">
    										<div  id="headingOne">
    										</div>

    											<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
        											data-bs-parent="#accordionExample">
        											<div class="card-body">
        									
    	                    							<div class="col-md-12 mt-0 d-flex justify-content-center">
															<div class="col-md-6 p-3">
																<form>
																	<div class="row mb-3 mt-5">
    																	<label for="abstract" class="col-sm-3 col-form-label">چکیده</label>
    																	<div class="col-sm-9">
      																		<textarea name="abstract" id="abstract" class="form-control"  rows="7"></textarea>
    																	</div>
  																	</div>
  																	<div class="row mb-3">
    																	<label for="registrationUnitId" class="col-sm-3 col-form-label">واحد ثبت</label>
    																	<div class="col-sm-9">
        																	<select name="registrationUnitId" class="form-control" id="registrationUnitId">
    																			<option>-- انتخاب کنید --</option>
    																			</select>
    																		</div>
  																		</div>
																		<div class="row mb-3 mt-5">
    																		<label for="originalNumber" class="col-sm-3 col-form-label">شماره فرستنده</label>
    																		<div class="col-sm-9">
      																			<input name="originalNumber" id="originalNumber" class="form-control" >
    																		</div>
  																		</div>  
																		<div class="row mb-3 mt-5">
    																		<label for="last_registered_number" class="col-sm-3 col-form-label">آخرین شماره ثبت شده</label>
    																		<div class="col-sm-9">
      																			<input name="last_registered_number" id="lastRegisteredNumber" class="form-control" >
    																		</div>
  																		</div>    
																		<div class="row mb-3 mt-5">
    																		<label for="registration_number" class="col-sm-3 col-form-label">شماره ثبت</label>
    																		<div class="col-sm-9">
      																			<input name="registration_number" id="registrationNumber" class="form-control" >
    																		</div>
  																		</div>    
																		<div class="row mb-3 mt-5">
    																		<label for="letterDate" class="col-sm-3 col-form-label">تاریخ نامه</label>
    																		<div class="col-sm-9">
      																			<input name="letterDate" id="letterDate" class="form-control" >
    																		</div>
  																		</div>    
																		<div class="row mb-3 mt-5">
    																		<label for="mailroomDate" class="col-sm-3 col-form-label">تاریخ دبیرخانه</label>
    																		<div class="col-sm-9">
      																			<input name="mailroomDate" id="mailroomDate" class="form-control" >
    																		</div>
  																		</div>      
																		<div class="row mb-3 mt-5">
    																		<div class="col-sm-3 col-form-label">
    																			<div class="form-check">
      																				<input class="form-check-input" type="checkbox" name="letterNeedsReply" id="letterNeedsReply" value="1">
      																				<label class="form-check-label" for="letterNeedsReply">
																				        مهلت پاسخ
      																				</label>
    																			</div>
  																			</div>    
    																		<div class="col-sm-9">
      																			<input name="replyDeadline" id="replyDeadline" class="form-control" >
    																		</div>
  																		</div>      
																		<div class="row mb-3 mt-5">
																		    <label for="summary" class="col-sm-3 col-form-label">خلاصه</label>
																		    <div class="col-sm-9">
      																			<textarea name="summary" id="summary" class="form-control"  rows="7"></textarea>
    																		</div>
  																		</div>    
																	<div class="d-flex justify-content-center">
																	<button type="button" class="btn btn-primary">تایید و مرحله بعد</button>
																	</div>
																	</form>
                        										</div>
                        										
                        										
															<div class="col-md-6 p-3">
																	<div class="row mb-3 mt-5">
    																	<label for="year" class="col-sm-3 col-form-label">سال</label>
    																	<div class="col-sm-3">
																			<div class="input-group mb-3">
  																				<button class="btn btn-outline-secondary" type="button" id="plus"><i class="fas fa-plus"></i></button>
  																				<input type="text" class="form-control text-center"  value="1401">
  																				<button class="btn btn-outline-secondary" type="button" id="minus"><i class="fas fa-minus"></i></button>
																			</div>
    																	</div>
  																	</div>
																	<div class="row mb-3 mt-5">
    																	<label for="registrationType" class="col-sm-3 col-form-label">نوع ثبت</label>
    																	<div class="col-sm-9">
																			<div class="btn-group mb-3" role="group">
																				<input type="radio" class="btn-check" name="registrationType" id="registrationType1" autocomplete="off"  value="0">
																				<label class="btn btn-outline-secondary" for="registrationType1">داخلی</label>
																				<input type="radio" class="btn-check" name="registrationType" id="registrationType2" autocomplete="off"  value="1">
																				<label class="btn btn-outline-secondary" for="registrationType2">وارده</label>
																				<input type="radio" class="btn-check" name="insert_type" id="insertType3" autocomplete="off"  value="2">
																				<label class="btn btn-outline-secondary" for="insertType3">صادره</label>
																			</div>
    																	</div>
  																	</div>
																	<div class="row mb-3 mt-5">
    																	<label for="priority" class="col-sm-3 col-form-label">فوریت</label>
    																	<div class="col-sm-9">    																	
																			<div class="btn-group mb-3" role="group">
																				<input type="radio" class="btn-check" name="priority" id="priority1" autocomplete="off"  value="0">
																				<label class="btn btn-outline-primary" for="priority1">عادی</label>
																				<input type="radio" class="btn-check" name="priority" id="priority2" autocomplete="off"  value="1">
																				<label class="btn btn-outline-primary" for="priority2">فوری</label>
																				<input type="radio" class="btn-check" name="priority" id="priority3" autocomplete="off"  value="2">
																				<label class="btn btn-outline-primary" for="priority3">خیلی فوری</label>
																				<input type="radio" class="btn-check" name="priority" id="priority4" autocomplete="off"  value="3">
																				<label class="btn btn-outline-primary" for="urgency4">آنی</label>																				
																			</div>
    																	</div>
  																	</div> 
																	<div class="row mb-3 mt-5">
    																	<label for="classificationLevel" class="col-sm-3 col-form-label">طبقه بندی</label>
    																	<div class="col-sm-9">    																	
																			<div class="btn-group mb-3" role="group">
																				<input type="radio" class="btn-check" name="classificationLevel" id="classificationLevel1" autocomplete="off"  value="0">
																				<label class="btn btn-outline-primary" for="classificationLevel1">عادی</label>
																				<input type="radio" class="btn-check" name="classificationLevel" id="classificationLevel2" autocomplete="off"  value="1">
																				<label class="btn btn-outline-primary" for="classificationLevel2">محرمانه</label>
																				<input type="radio" class="btn-check" name="classificationLevel" id="classificationLevel3" autocomplete="off" value="2" >
																				<label class="btn btn-outline-primary" for="classificationLevel3">خیلی محرمانه</label>
																				<input type="radio" class="btn-check" name="classificationLevel" id="classificationLevel4" autocomplete="off"  value="3">
																				<label class="btn btn-outline-primary" for="classificationLevel4">سری</label>																				
																				<input type="radio" class="btn-check" name="classificationLevel" id="classificationLevel5" autocomplete="off"  value="4">
																				<label class="btn btn-outline-primary" for="classificationLevel5">به کلی سری</label>																																								
																			</div>
    																	</div>
  																	</div>  																	  																	 																	
																	<div class="row mb-3 mt-5">
    																	<label for="attachmentType" class="col-sm-3 col-form-label">پیوست</label>
    																	<div class="col-sm-9">    																	
																			<div class="btn-group mb-3" role="group">
																				<input type="radio" class="btn-check" name="attachmentType" id="attachmentType1" autocomplete="off"  value="0">
																				<label class="btn btn-outline-primary" for="attachmentType1">ندارد</label>
																				<input type="radio" class="btn-check" name="attachmentType" id="attachmentType2" autocomplete="off"  value="1">
																				<label class="btn btn-outline-primary" for="attachmentType2">دستی</label>
																				<input type="radio" class="btn-check" name="attachmentType" id="attachmentType3" autocomplete="off" value="2" >
																				<label class="btn btn-outline-primary" for="attachmentType3">الکترونیکی</label>																																								
																				<input type="radio" class="btn-check" name="attachmentType" id="attachmentType4" autocomplete="off" value="3" >
																				<label class="btn btn-outline-primary" for="attachmentType4">ناشناخته</label>																																																												
																			</div>
    																	</div>
  																	</div>  																	  																	 																	  																	
  																	<div class="row mb-3">
    																	<label for="receiveType" class="col-sm-3 col-form-label">نحوه دریافت</label>
    																	<div class="col-sm-9">
        																	<select name="receiveType" class="form-control" id="receiveType">
    																			<option>-- انتخاب کنید --</option>
    																			</select>
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
                    			</div>
                			</div>
            			</div>
        </section>
    </div>    
@endsection
@section('scripts')
{{--    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script> --}}
{{--    {!! JsValidator::formRequest('App\Http\Requests\CityRequest') !!} --}}
    <script src="{{ asset('vendor/persian-date/js/persian-date.min.js') }}"></script>
    <script src="{{ asset('vendor/persian-datepicker/js/persian-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/dropify.min.js') }}"></script>
	<script>
        $('#letterDate').persianDatepicker({
            initialValue: false,
           // altField: '#started_at',
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
                enabled: true
            },
        });	
	</script>
@endsection