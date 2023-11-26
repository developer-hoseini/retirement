@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/persian-datepicker/css/persian-datepicker.min.css') }}">
<style>
.text-left {
	text-align: left;
}
.table-responsive { 
	width:1400px; 
	overflow-x:auto;
}
</style>
@endsection
@section('content')
    <div class="container-fluid">
        <section>        
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card mb-4 p-0">
                    <h6 class="card-header pt-4 pb-4">
                        جستجوی نامه
                    </h6>
                    <div class="card-body">      			    											
    	                <div class="col-md-12 col-sm-12 col-xs-12 mt-0 d-flex justify-content-center">		
									<div class="col-md-6 col-sm-6 col-xs-12 p-3">
										<div class="row mb-4 mt-5">
    										<label for="year" class="col-sm-3 col-form-label">سال</label>
    										<div class="col-sm-3">
												<div class="input-group mb-3">
  													<button class="btn btn-outline-secondary" type="button" id="plus"><i class="fas fa-plus"></i></button>
  													<input type="text" class="form-control text-center"  value="1401">
  													<button class="btn btn-outline-secondary" type="button" id="minus"><i class="fas fa-minus"></i></button>
												</div>
    										</div>
  										</div>		
										<div class="row mb-3">
											<div class="form-check col-sm-3">
											    <input class="form-check-input" type="radio" name="letterDateType" id="letterDateType1">
   												<label class="form-check-label" for="letterDateType1">
													تاریخ نامه
    											</label>
											</div>											
    										<div class="col-sm-9">
      											<select name="dateLimitation" id="dateLimitation" class="form-control" >
      												<option value="" selected>-- انتخاب کنید --</option>      												
      												<option value="0">روز جاری</option>
      												<option value="1">هفته جاری</option>
      												<option value="2">ماه جاری</option>
      												<option value="3">سال جاری</option>      													      													      													
    											</select>
    										</div>
  										</div>
										<div class="row mb-3">
    										<label for="fromDate" class="col-sm-3 col-form-label text-left">از</label>
    										<div class="col-sm-9">
      											<input name="fromDate" id="fromDate" class="form-control" >
    										</div>
  										</div>  											    
										<div class="row mb-5">
    										<label for="toDate" class="col-sm-3 col-form-label text-left">تا</label>
    										<div class="col-sm-9">
      											<input name="toDate" id="toDate" class="form-control" >
    										</div>
  										</div>  											    
										<div class="row mb-3">
											<div class="form-check col-sm-3">
											    <input class="form-check-input" type="radio" name="letterDateType" id="letterDateType2">
   												<label class="form-check-label" for="letterDateType2">
													تاریخ دبیرخانه نامه
    											</label>
											</div>											
    										<div class="col-sm-9">
      											<select name="regUnitDateLimitation" id="regUnitDateLimitation" class="form-control" >
      												<option value="" selected>-- انتخاب کنید --</option>      												
      												<option value="0">روز جاری</option>
      												<option value="1">هفته جاری</option>
      												<option value="2">ماه جاری</option>
      												<option value="3">سال جاری</option>      													      													      													
    											</select>
    										</div>
  										</div>
										<div class="row mb-3">
    										<label for="fromRegUnitDate" class="col-sm-3 col-form-label text-left">از</label>
    										<div class="col-sm-9">
      											<input name="fromRegUnitDate" id="fromRegUnitDate" class="form-control" >
    										</div>
  										</div>  											    
										<div class="row mb-5">
    										<label for="toRegUnitDate" class="col-sm-3 col-form-label text-left">تا</label>
    										<div class="col-sm-9">
      											<input name="toRegUnitDate" id="toRegUnitDate" class="form-control" >
    										</div>
  										</div>  	
										<div class="row mb-3">
											<div class="form-check col-sm-3">
											    <input class="form-check-input" type="radio" name="letterDateType" id="letterDateType3">
   												<label class="form-check-label" for="letterDateType3">
													تاریخ ایجاد نامه
    											</label>
											</div>											
    										<div class="col-sm-9">
      											<select name="creationDateLimitation" id="creationDateLimitation" class="form-control" >
      												<option value="" selected>-- انتخاب کنید --</option>      												
      												<option value="0">روز جاری</option>
      												<option value="1">هفته جاری</option>
      												<option value="2">ماه جاری</option>
      												<option value="3">سال جاری</option>      													      													      													
    											</select>
    										</div>
  										</div>
										<div class="row mb-3">
    										<label for="fromCreationDate" class="col-sm-3 col-form-label text-left">از</label>
    										<div class="col-sm-9">
      											<input name="fromCreationDate" id="fromCreationDate" class="form-control" >
    										</div>
  										</div>  											    
										<div class="row mb-5">
    										<label for="toCreationDate" class="col-sm-3 col-form-label text-left">تا</label>
    										<div class="col-sm-9">
      											<input name="toCreationDate" id="toCreationDate" class="form-control" >
    										</div>
  										</div>  											      																					      											
  										<div class="row mb-3">
    										<label for="serialNumber" class="col-sm-3 col-form-label">شماره سریال</label>
    										<div class="col-sm-9">
        										<input type="text" name="serialNumber" class="form-control" id="serialNumber">
    										</div>
  										</div>  												  																																									
										<div class="row mb-3 mt-5">
    										<label for="abstract" class="col-sm-3 col-form-label">چکیده</label>
    										<div class="col-sm-9">
      											<input type="text" name="abstract" id="abstract" class="form-control" >
    										</div>
  										</div>																					
                       				</div>                        										
									<div class="col-md-6 col-sm-6 col-xs-12 p-3 mt-5">
  											<div class="row mb-3">
    											<label for="receiveType" class="col-sm-3 col-form-label">جانشین</label>
    											<div class="col-sm-9">
        											<select name="receiveType" class="form-control" id="receiveType">
    													<option>-- انتخاب کنید --</option>
    												</select>
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
    											<label for="type" class="col-sm-3 col-form-label">نوع نامه</label>
    											<div class="col-sm-9">    																	
													<div class="btn-group mb-3" role="group">
														<input type="radio" class="btn-check" name="type" id="type1" autocomplete="off"  value="0">
														<label class="btn btn-outline-primary" for="type1">ارسال نشده</label>
														<input type="radio" class="btn-check" name="type" id="type2" autocomplete="off"  value="1">
														<label class="btn btn-outline-primary" for="type2">ارسال شده</label>																			
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
    											<label for="sender" class="col-sm-3 col-form-label">فرستنده</label>
    											<div class="col-sm-9">
      											<select name="sender" id="sender" class="form-control" >
      												<option value="" >-- انتخاب کنید --</option>      												      													      													      													
    											</select>
    											</div>
  											</div>
											<div class="row mb-3 mt-5">
    											<label for="reciever" class="col-sm-3 col-form-label">گیرنده</label>
    											<div class="col-sm-9">
      											<select name="reciever" id="reciever" class="form-control" >
      												<option value="" >-- انتخاب کنید --</option>      												      													      													      													
    											</select>
    											</div>
  											</div>  											 											  											
  											<div class="row mb-3">
    											<label for="status" class="col-sm-3 col-form-label">وضعیت</label>
    											<div class="col-sm-9">
        											<select name="status" class="form-control" id="status">
    													<option>-- انتخاب کنید --</option>
    												</select>
    											</div>
  											</div>															  																																  																	 																	
											<div class="row mb-3 mt-5">
    											<label for="trackingCode" class="col-sm-3 col-form-label">کد مکاتباتی</label>
    											<div class="col-sm-9">
      												<input type="text" name="trackingCode" id="trackingCode" class="form-control" >
    											</div>
  											</div>  											  											
											<div class="row mb-3 mt-5">
    											<label for="trackingCode" class="col-sm-3 col-form-label">شماره پیش نویس</label>
    											<div class="col-sm-9">
      												<input type="text" name="trackingCode" id="trackingCode" class="form-control" >
    											</div>
  											</div>  											  											  											  																	  																	 																	  																	  																	
										</div>    												    	                								  			
                        </div>						
						<div class="col-md-12 col-sm-12 col-xs-12 d-flex justify-content-center mt-5">
							<button type="button" class="btn btn-primary">جستجو</button>
						</div>
					</div>
				</div>
						
						
                <div class="card mb-4 mt-3 p-0">
                    <h6 class="card-header pt-4 pb-4">
                        نتایج جستجو
                    </h6>
                    <div class="card-body">					    
						<div class="col-md-12 col-sm-12 col-xs-12">
						
						
						
						
						
						
						
						
						
						
                    <div class="table-responsive" >                
                    	<table class="table" >
                        	<thead>
                        		<tr>
                            		<th colspan="3">شماره ثبت</th>
                            		<th colspan="9">چکیده</th>
                            		<th colspan="3">شماره فرستنده</th>
                            		<th colspan="2">تاریخ نامه</th>
                            		
                            		<th colspan="3">نوع ثبت</th>                            		                            		
                            		<th colspan="3">واحد ثبت</th>
                            		<th colspan="3">فرستنده</th>
                            		<th colspan="6">گیرندگان اصلی</th>
                            		
                            		<th colspan="6">گیرندگان رونوشت</th>
                            		<th colspan="3">وضعیت</th>
                            		<th colspan="7" >وضعیت امضا دیجیتال</th>
                            		<th colspan="3">تاریخ ایجاد</th>
                            		
                            		<th colspan="3">آخرین ویرایش</th>
                            		<th colspan="3">ویرایش نامه</th>                            		
                            		<th colspan="3">پاسخ نامه</th>                            		                            		                            		                            		                            		                            		                            		                            		                            		                            		
                        		</tr>

                        	</thead>
                    	<tbody id="wrapper">
                        		<tr>
                            		<td colspan="3">254585</td>
                            		<td colspan="9">درخواست پروانه کسب</td>
                            		<td colspan="3">548254</td>
                            		<td colspan="2">1401-02-05</td>
                            		
                            		<td colspan="3">وارده</td>                            		                            		
                            		<td colspan="3">شهرسازی همدان</td>
                            		<td colspan="3">پیشخوان همدان</td>
                            		<td colspan="6">اداره کل شهرسازی</td>
                            		
                            		<td colspan="6">شهرسازی همدان</td>
                            		<td colspan="3">در حال بررسی</td>
                            		<td colspan="7">امضا شده</td>
                            		<td colspan="3">1401-03-12</td>
                            		
                            		<td colspan="3">1401-04-15</td>
                            		<td colspan="3"><i class="fas fa-edit"></i></td>                            		
                            		<td colspan="3"><i class="fas fa-eye"></i></td>                            		                            		                            		                            		                            		                            		                            		                            		                            		                            		
                        		</tr>                    	
                    	</tbody>
                	</table>
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