<x-app-layout>
	<div class="container">
		<h3 class="m-3">Add Video, Image - <a href="{{route('dashboard')}}" class="btn-sm btn btn-primary">Back</a></h3>
		<div class="row">
			<div class="col-md-4">	
				<form action="{{route('gallery.store')}}" method="POST">
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
								<option value="0">Slider Image</option>
								<option value="1">About Us Video</option>
								<option value="2">Gallery</option>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" name="status" id="send-dist-type">
								<option value="0">Active</option>
								<option value="1">Inactive</option>
							</select>
						</div>
											<button class="btn btn-success">Add Video,Image</button>
					</div>

				</form>
			</div>
			<div class="col-md-8">
				<div class="row">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Image</th>
								<th scope="col">Url</th>
								<th scope="col">Type</th>
								<th scope="col">Status</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<th scope="row"></th>
								<td></td>
								<td><a href="" __blank>(see)</a></td>
								<td></td>
								<td></td>
								<td>
									<a href="{{route('gallery.destroy')}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
								</td>
							</tr>

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

