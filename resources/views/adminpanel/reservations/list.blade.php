<x-app-layout>
	<div class="container">
		<h3 class="m-3">Reservations - <a href="{{route('dashboard')}}" class="btn-sm btn btn-primary">Back</a></h3>
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<form method="get">
						<select class="form-control" onchange="this.form.submit()" name="sort">
							<option @if(request()->get('sort')=='norm') selected @endif value="norm">Filter</option>
							<option @if(request()->get('sort')=='+1 day') selected @endif value="+1 day">Today</option>
							<option @if(request()->get('sort')=='+2 day') selected @endif value="+2 day">Last 2 Days</option>
							<option @if(request()->get('sort')=='+5 day') selected @endif value="+5 day">Last 5 Days</option>
							<option @if(request()->get('sort')=='+7 day') selected @endif value="+7 day">This Week</option>
							<option @if(request()->get('sort')=='+14 day') selected @endif value="+14 day">2 This Week</option>
							<option @if(request()->get('sort')=='+30 day') selected @endif value="+30 day">This Mount</option>
						</select>
					</form> - <a href="{{route('reservation.index')}}">Reset</a>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Name Surname</th>
								<th scope="col">Date</th>
								<th scope="col">Guest</th>
								<th scope="col">Creating Date</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody> 
							@foreach($reservations as $reserv)
							<tr>
								<th scope="row">{{$loop->iteration}}</th>
								<td><a href="{{route('reservation.detail',$reserv->id)}}">{{$reserv->name}}</a></td>
								<td>{{$reserv->date}} - {{$reserv->time}}</td>
								<td>{{$reserv->guest}}</td>
								<td>{{$reserv->created_at->diffForHumans()}}</td>
								<td><a href="{{route('reservation.destroy',$reserv->id)}}" class="btn-sm btn btn-danger"><i class="fa fa-times"></i></a></td>
							</tr>
							@endforeach

						</tbody>
					</table>
					{{$reservations->withQueryString()->links()}}
				</div>
			</div>
			@if(Route::currentRouteName()=='reservation.detail')
			<div class="col-md-4">
				<div class="form-group">
					<label>Name Surname</label>
					<input class="form-control" type="text" readonly value="{{$reservv->name}}">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="text" readonly value="{{$reservv->email}}">
				</div>
				<div class="form-group">
					<label>Phone</label>
					<input class="form-control" type="text" readonly value="{{$reservv->phone}}">
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Date</label>
							<input class="form-control" type="text" readonly value="{{$reservv->date}}">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Time</label>
							<input class="form-control" type="text" readonly value="{{$reservv->time}}">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>Guest</label>
							<input class="form-control" type="text" readonly value="{{$reservv->guest}}">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Message</label>
					<textarea class="form-control" readonly rows="3">{{$reservv->message}}</textarea>
				</div>
				<div class="form-group">
					<a href="{{route('reservation.destroy',$reservv->id)}}" class="btn-sm btn btn-danger">Delete</a>
				</div>
			</div>
			@endif
		</div>
	</div>
</x-app-layout>

