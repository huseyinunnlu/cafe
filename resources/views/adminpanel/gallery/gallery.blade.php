<x-app-layout>
	<div class="container">
		<h3 class="m-3">Add Video, Image - 
			<a href="{{route('dashboard')}}" class="btn-sm btn btn-primary">Back</a>
			@if(Route::currentRouteName()=='gallery.edit')
			<a href="{{route('gallery.index')}}" class="btn-sm btn btn-primary">Cancel Editing</a>
			@endif</h3>
		<div class="row">
			<div class="col-md-4">	
				@if(Route::currentRouteName()=='gallery.edit')
				<form action="{{route('gallery.update',$gallery->id)}}" method="POST" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="col-md-12">
						<div class="form-group">
							<label>Gallery Type</label>
							<select class="form-control" name="type" id="send-dist-type">
								<option @if($gallery->type=='image') selected @endif value="image">Image</option>
								<option @if($gallery->type=='video') selected @endif value="video">Video</option>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label class="mr-2">Url</label><a href="{{asset($gallery->url)}}" target="__blank">see</a>
							<input class="form-control" name="url" id="send-address" @if($gallery->type=='image') type="file" @else value="{{$gallery->url}}" type="text" @endif placeholder="Url">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Location</label>
							<select class="form-control" name="location" id="send-dist-type">
								<option @if($gallery->location=='0') selected @endif value="0">Slider Image</option>
								<option @if($gallery->location=='1') selected @endif value="1">About Us Video</option>
								<option @if($gallery->location=='2') selected @endif value="2">Gallery</option>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" name="status" id="send-dist-type">
								<option @if($gallery->status =='0') selected @endif value="0" selected>Active</option>
								<option @if($gallery->status =='1') selected @endif value="1">Inactive</option>
							</select>
						</div>
						<button class="btn btn-success">Add Video,Image</button>
					</div>
				</form>
				@else
				<form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="col-md-12">
						<div class="form-group">
							<label>Gallery Type</label>
							<select class="form-control" name="type" id="send-dist-type">
								<option selected>Select Gallery Type</option>
								<option value="image">Image</option>
								<option value="video">Video</option>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Url</label>
							<input class="form-control" name="url" id="send-address" type="text" placeholder="Url">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Location</label>
							<select class="form-control" name="location" id="send-dist-type">
								<option value="0" selected>Slider Image</option>
								<option value="1">About Us Video</option>
								<option value="2">Gallery</option>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" name="status" id="send-dist-type">
								<option value="0" selected>Active</option>
								<option value="1">Inactive</option>
							</select>
						</div>
						<button class="btn btn-success">Add Video,Image</button>
					</div>
				</form>
				@endif
			</div>
			<div class="col-md-8">
				<div class="row">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Gallery</th>
								<th scope="col">Type</th>
								<th scope="col">Status</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody>
							@foreach($galleries as $gallery)
							<tr>
								<th scope="row">{{$loop->iteration}}</th>
								<td>
									@if($gallery->type=='video')
									<a href="{{asset($gallery->url)}}" target="__blank">see</a>
									@else
									<img src="{{asset($gallery->url)}}" width="50px;">
									<a href="{{asset($gallery->url)}}" target="__blank">see</a>
									@endif
								</td>
								<td>@if($gallery->type=='video')
									<span class="badge badge-warning">Video - ({{$gallery->location}})</span>
									@else
									<span class="badge badge-warning">Image - ({{$gallery->location}})</span>
									@endif
								</td>
								<td>@if($gallery->status=='0')
									<span class="badge badge-success">Active</span>
									@else
									<span class="badge badge-danger">Inactive</span>
									@endif
								</td>
							<td>
								<a href="{{route('gallery.edit',$gallery->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
								<a href="{{route('gallery.destroy',$gallery->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function addressChange() {
			var inputBox = document.getElementById('send-address');
			this.value == 'image' ? inputBox.type = 'file' : inputBox.type = 'text';
		}
		document.getElementById('send-dist-type').addEventListener('change', addressChange);
	</script>
</x-app-layout>

