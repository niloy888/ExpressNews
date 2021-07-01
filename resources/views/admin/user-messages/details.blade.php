@extends('admin.master')

@section('body')

<div class="sl-mainpanel">
	<nav class="breadcrumb sl-breadcrumb">
		<a class="breadcrumb-item" href="{{route('user-dashboard')}}">Express News</a>
		<span class="breadcrumb-item active">Dashboard</span>
	</nav>

	<div class="sl-pagebody">



		<div class="row row-sm mg-t-20 ml-4">

			<div class="col-xl-11  mg-t-20 mg-xl-t-0">



				<div class="card widget-messages mg-t-20">
					<div class="card-header">
						<span>Messages</span>
						<a href=""><i class="icon ion-more"></i></a>
					</div><!-- card-header -->
					<div class="list-group list-group-flush">

						@foreach($messages as $message)
						<a href="" class="list-group-item list-group-item-action media">
							@if($message->sender_id==0)
							<img src="{{asset('/')}}admin/assets/img/admin.png" alt="">
							@else
							<img src="{{asset('/')}}admin/assets/img/user.png" alt="">
							@endif
							<div class="media-body">
								<div class="msg-top">
									@if($message->sender_id==0)
									<span>Admin</span>
									@else
									<span>{{$message->full_name}}</span>
									@endif
									<span>{{$message->created_at}}</span>
								</div>
								<p class="msg-summary">{{$message->message}}</p><br>
								<p class="msg-summary-big">
								@if($message->image)
									<img src="{{asset($message->image)}}" style="border-radius: 0%;"  width="300">
								@endif
								</p>
							</div><!-- media-body -->
						</a><!-- list-group-item -->
						@php
						$userId = $message->user_id;
						@endphp
						@endforeach
						
						
						

						<form action="{{route('admin-send-message')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="list-group-item list-group-item-action media">
								<input type="hidden" name="user_id" value="{{$userId}}">
							</div>
							<div class="list-group-item list-group-item-action media">

								<textarea placeholder="Write.." required="" name="message" rows="6"></textarea>
								<button class="ml-4 btn btn-secondary btn-lg" style="border-radius:90%">Send</button>

							</div>
						</form>


					</div><!-- list-group -->
					<div class="card-footer">

						<!-- <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-3"></i> Load more messages</a> -->
					</div><!-- card-footer -->
				</div><!-- card -->
			</div><!-- col-3 -->
		</div><!-- row -->

	</div><!-- sl-pagebody -->
	@include('reporter.include.footer')
</div>

@endsection