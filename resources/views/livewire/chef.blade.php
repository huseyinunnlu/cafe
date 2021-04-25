
<div class="container">
	<div class="row">
		<div class="col-md-8">
			@if (session()->has('message'))
			<span class="alert alert-success" style="width: 100%;"> {{ session('message') }} </span>
			@endif
			<div class="header mt-3 mb-1 d-flex justify-content-between">
				<h3>Chefs - <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm">Go Back</a></h3>
				<h3>
					<button type="button" wire:click.prevent="create" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Chef</button>
				</h3>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name Surname</th>
						<th scope="col">Image</th>
						<th scope="col">Specs</th>
						<th scope="col">Delete</th>
					</tr>
				<tbody> 
					@foreach($chefs as $chef)
					<tr>
						<th scope="row">{{$loop->iteration}}</th>
						<td>{{$chef->name}}</td>
						<td><img src="{{asset('storage/uploads/'.$chef->photo)}}"></td>
						<td>{{$chef->spec}}</td>
						<td>
							<button wire:click.prevent="destroy({{$chef->id}})" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@if($open==1)
		<div class="col-md-4 mt-10 mb-4">
			<form enctype="multipart/form-data">
				<div class="form-group">
					<label>Name Surname</label><br>
					@error('name') <small class="text-danger">{{ $message }}</small> @enderror
					<input class="form-control" type="text" wire:model.debounce.500ms="name">
				</div>
				<div class="form-group">
					<label>Photo</label><br>
					@error('photo') <small class="text-danger">{{ $message }}</small> @enderror
					<input class="form-control" type="file" wire:model="photo">
				</div>
				<div class="form-group">
					<label>Spec</label><br>
					@error('spec') <small class="text-danger">{{ $message }}</small> @enderror
					<input class="form-control" type="text" wire:model.debounce.500ms="spec">
				</div>

				<div class="form-group">
					<label>Social 1</label><br>
					@error('social1') <small class="text-danger">{{ $message }}</small> @enderror
					<input class="form-control" type="text" wire:model.debounce.500ms="social1">
				</div>
				<div class="form-group">
					<label>Social 2</label><br>
					@error('social2') <small class="text-danger">{{ $message }}</small> @enderror
					<input class="form-control" type="text" wire:model.debounce.500ms="social2">
				</div>
				<div class="form-group">
					<label>Social 3</label><br>
					@error('social3') <small class="text-danger">{{ $message }}</small> @enderror
					<input class="form-control" type="text" wire:model.debounce.500ms="social3">
				</div>
				<div class="form-group">
					<label>Social 4</label><br>
					@error('social4') <small class="text-danger">{{ $message }}</small> @enderror
					<input class="form-control" type="text" wire:model.debounce.500ms="social4">
				</div>
				<div class="form-group">
					<button class="btn btn-success" wire:click.prevent="store">Add</button>
				</div>					
			</form>
		</div>	
		@endif
	</div>
</div>

