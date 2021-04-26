<div class="container">
	<div class="row row justify-content-center">
		<div class="col-md-9">
			<div class="mt-3 mb-2 header d-flex justify-content-between">
				<h3>Menu - <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm"> Go Back </a></h3>
				<h3>
					<a href="{{route('dashboard')}}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Add Category </a>
					<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addMenu"><i class="fa fa-plus"></i> Add</button>
				</h3>
				
					@if(session()->has('message'))
						<div class="alert alert-success">{{session('message')}}</div>
					@endif
				
			</div>
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
					<tr>
						<th scope="row"></th>
						<td><a href=""></a></td>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<a href="" class="btn-sm btn btn-danger"><i class="fa fa-times"></i></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!--Create Menu Modal -->
<div wire:ignore.self class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Food</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form >
					<div class="form-group">
						<label>Title</label>
						@error('title') <small class="text-danger"> {{ $message }} </small>@enderror
						<input type="type" class="form-control" wire:model="title">
					</div>
					<div class="row">
						
						<div class="col-md-4">
							<div class="form-group">
								<label>Price</label>
								@error('price') <small class="text-danger"> {{ $message }} </small>@enderror
								<input type="number" class="form-control" wire:model="price">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Description</label>
						@error('title') <small class="text-danger"> {{ $message }} </small>@enderror
						<textarea class="form-control" id="desc"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success btn-sm" wire:click.prevent="storeFood">Add Food</button>
			</div>
		</div>
	</div>
</div>


