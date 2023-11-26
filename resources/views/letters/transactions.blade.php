@extends('layouts.app')
@section('styles')

@endsection
@section('content')
    <div class="container-fluid">
        <section>        
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 p-0">
                        <h6 class="card-header mt-2 pb-2">
                            تراکنش ها
                        </h6>
                        <div class="card-body">
            				<div class="col-md-12 mt-0 d-flex justify-content-center">

                    <div class="table-responsive">                
                    	<table class="table table-striped">
                        	<thead>
                        		<tr>
                            		<th scope="col">شناسه تراکنش</th>
                            		<th scope="col">مبلغ تراکنش</th>
                        			<th scope="col">وضعیت پرداخت</th>                            		
                            		<th scope="col">نام متقاضی</th>                            		
                            		<th scope="col">کد ملی متقاضی</th>
                            		<th scope="col">موبایل متقاضی</th>                            		
                        			<th scope="col">عملیات</th>                        			
                        		</tr>
                        		<tr>
                        			<form id="ajax-form"></form>
                            		<td></td>
                            		<td></td>
                            		<td></td>                            		
                            		<td>
	                                    <input type="text"  name="customer_name" id="customer_name" form="ajax-form">
                            		</td>
                            		<td>
	                                    <input type="text"  name="customer_national_code" id="customer_national_code" form="ajax-form">
                            		</td>
                            		<td>
	                                    <input type="text"  name="customer_mobile_number" id="customer_mobile_number" form="ajax-form">
                            		</td>        
                            		<td>
	                                    <button type="submit"  id="apply-filter" form="ajax-form">اعمال فیلتر</button>
                            		</td>        
                        		</tr>
                        	</thead>
                    	<tbody id="wrapper">{!! $tbody !!}</tbody>
                	</table>
            	</div>
            </div>
            <div class="col-md-12 mt-0 d-flex justify-content-center">
            	<div class="d-flex flex-wrap justify-content-between">
                	<div id="pagination">{!! $pagination !!}</div>
                    	@include('partials.per-page')
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
	<script>
function clearState()
{
    var uri = window.location.href.toString();
    if (uri.indexOf("?") > 0) {
        var clean_uri = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clean_uri);
    }
}
function filter(page)
{
    let body = $('body');
    body.addClass('loading');
    clearState();
    let data = new Array('page=' + page);
    $('[form=ajax-form]').each(function() {
        if($(this).attr('id') === 'apply-filter' || $(this).val().length === 0) {
            return;
        }
        data.push($(this).attr('id') + '=' + $(this).val());
    });
    history.pushState("", document.title, window.location.href + "?" + data.join('&'));
    $.ajax({
        type: 'GET',
        url: window.location.href + "?" + data.join('&'),
        data: {},
        success: function(response) {
            if (response.status === 'success') {
                $('#wrapper').html(response.content);
                $('#pagination').html(response.pagination);
            } else {
                swal.fire({'icon': 'error', 'title': response.content});
            }
        },
        error: function (e) {
            swal.fire({'icon': 'error', 'title': lang["a_problem_occurred_during_running_request"]});
        },
    }).always(function () {
        body.removeClass('loading');
    });
}
$(document).on('submit', '#ajax-form', function (e) {
    e.preventDefault();
    filter(1);
});
$(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    filter(page);
});

	</script>
@endsection