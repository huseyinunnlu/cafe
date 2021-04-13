<x-app-layout>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3 class="mt-3 mb-3"><i class="fa fa-gear"></i> Settings - <a href="{{route('dashboard')}}" class="btn-sm btn btn-primary">Go Back</a></h3>
				<form action="{{route('settings.update',$setting->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>Logo</label><a href="{{asset($setting->logo)}}" target="__blank" class="ml-2">see</a>
						<input class="form-control-file" type="file" value="" name="logo">
					</div>
					<div class="form-group">
						<label>About Us</label>
						<textarea name="about" id="about">{{$setting->about}}</textarea>
					</div>
					<div class="form-group">
						<label>Contact Us Text</label>
						<textarea name="contact" id="contact">{{$setting->contact}}</textarea>
					</div>
					<div class="form-group">
						<label>Copyright Text</label>
						<textarea name="copyright" class="form-control">{{$setting->copyright}}</textarea>
					</div>
					<div class="form-group">
						<label for="phone">Phone</label><small class="ml-2 text-muted">Ex(+90 000 000 00 00)</small>
						<input type="text" class="form-control" name="phone1" value="{{$setting->phone1}}">
						<input type="text" class="form-control mt-3 mb-3" name="phone2" value="{{$setting->phone2}}">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="{{$setting->email}}">
					</div>
					<div class="form-group">
						<label for="phone">Adress</label>
						<input type="text" name="adress" class="form-control" value="{{$setting->adress}}">
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<h3 class="mt-3 mb-3">Social Media Links</h3>
				@if(Route::currentRouteName()=='social.edit') <a href="{{route('settings.index')}}">Cancel</a>
				<form action="{{route('social.update',$social->id)}}" method="post">
					@csrf
					<div class="form-group">
						<label>Tile</label>
						<input class="form-control" type="text" name="title" value="{{$social->title}}">
					</div>
					<div class="form-group">
						<label>icon</label><small class="ml-2 text-muted">Ex fa-fa-facebook</small>
						<input class="form-control" type="text" name="icon" value="{{$social->icon}}">
					</div>
					<div class="form-group">
						<label>link</label><small class="ml-2 text-muted">Ex(https://www.facebook.com)</small>
						<input class="form-control" type="text" name="link" value="{{$social->link}}">
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status">
							<option value="0" @if($social->status=='0') selected @endif >Active</option>
							<option value="1" @if($social->status=='1') selected @endif >Inactive</option>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-success">Update</button>
					</div>
				</form>
				@else
				<form action="{{route('social.create')}}" method="post">
					@csrf
					<div class="form-group">
						<label>Tile</label>
						<input class="form-control" type="text" name="title">
					</div>
					<div class="form-group">
						<label>icon</label><small class="ml-2 text-muted">Ex fa-fa-facebook</small>
						<input class="form-control" type="text" name="icon">
					</div>
					<div class="form-group">
						<label>link</label><small class="ml-2 text-muted">Ex(https://www.facebook.com)</small>
						<input class="form-control" type="text" name="link">
					</div>
					<div class="form-group">
						<label>Status</label>
						<select class="form-control" name="status">
							<option value="0">Active</option>
							<option value="1">Inactive</option>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-success">Create</button>
					</div>
				</form>
				@endif



				<table class="table mt-10">
					<thead>
						<tr>
							<th scope="col">Title</th>
							<th scope="col">Icon</th>
							<th scope="col">Link</th>
							<th scope="col">Status</th>
							<th scope="col">Del.</th>
						</tr>
					</thead>
					<tbody>
						@foreach($socials as $social)
						<tr>
							<td><a href="{{route('social.edit',$social->id)}}">{{$social->title}}</a></td>
							<td><i class="{{$social->icon}}"></i></td>
							<td>{{$social->link}}</td>
							<td>@if($social->status=='0')
								<span class="badge badge-success">Active</span>
								@else 
								<span class="badge badge-danger">Inactive</span>
								@endif
							</td>
							<td><a href="{{route('social.destroy',$social->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		CKEDITOR.replace('about');
		CKEDITOR.replace('contact');
	</script>
</x-app-layout>