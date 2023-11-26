@extends('layouts.app')
@section('styles')

<style>

</style>
@endsection
@section('content')
    <div class="container-fluid" >
        {{-- @include('partials.breadcrumb', ['breadcrumb' => [['route_name' => 'cities.index', 'text' => ts_lang('Cities')], ['text' => ts_lang('Add city')]]])--}}
        <sec tion>        
			<div id="deviceSettings"  class="mb-6 d-flex justify-content-center">
			<div class="align-self-center">
				<p class="text-center">تنظیمات کارتخوان</p>
				<p class="text-center">دستگاه کارتخوان با شناسه 73000001 متصل است.</p>	
				</div>
			</div>
			<div id="deviceSettingsTable"  class="mb-6 d-flex justify-content-center">		

<table class="table table-bordered device-settings-table">
  <thead>
    <tr>
      <th colspan="4" class="text-center">افزونه فایرفاکس</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>نسخه افزونه: 1.2.2</td>
      <td>آدرس IP تنظیم شده در سامانه: 192.168.22.220</td>
    </tr>
    <tr>
      <td>شناسه کارتخوان تنظیم شده در افزونه: 73000001</td>
      <td>کد دفتر تنظیم شده در سامانه: 72000000</td>
    </tr>
  </tbody>
</table>
</div>
        </section>
    </div>    
@endsection
@section('scripts')

@endsection