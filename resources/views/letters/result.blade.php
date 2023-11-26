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
                            ایجاد نامه
                        </h6>
                        <div class="card-body">
            				<div class="col-md-12 mt-0 d-flex justify-content-center">
								<div class="alert">
									{{ $message }}
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

	</script>
@endsection