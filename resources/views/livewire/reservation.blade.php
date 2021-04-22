<div class="col-lg-6">
	<div class="contact-form">


		<form id="contact">
			<div class="row">
				<div class="col-md-12">
					<h4>Table Reservation</h4>
				</div>
				<div class="col-md-12">
					@error('name') <small class="text-danger">{{ $message }}</small> @enderror
					<input type="text" wire:model.bounce.500="name" placeholder="Your Name*">
				</div>
				<div class="col-md-12">
					@if (session()->has('message'))
						{{ session('message') }}
					@endif
					@error('email') <small class="text-danger">{{ $message }}</small> @enderror
					<small>
						@if(!empty($email))<a type="button" class="text-primary" wire:click="sendMail">Send Activation Mail</a>@endif
					</small>
					<input type="email" wire:model.bounce.500="email" placeholder="Your Email Address">
					@if($key)
					<input type="text" wire:model.bounce.500="code" placeholder="Your Code">
					<a type="button" class="text-primary" wire:click="control">Check</a>
					@endif
				</div>
				<div class="col-md-12">
					@error('phone') <small class="text-danger">{{ $message }}</small> @enderror
					<input type="text" placeholder="Phone Number*" wire:model.bounce.500="phone">
				</div>
				<div class="col-md-12">
					@error('guest') <small class="text-danger">{{ $message }}</small> @enderror
					<select wire:model.lazy="guest">
						<option value="number-guests">Number Of Guests</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select>
					
				</div>
				<div class="col-md-12">
					@error('date') <small class="text-danger">{{ $message }}</small> @enderror
					<input type="date" class="form-control" placeholder="dd/mm/yyyy" wire:model.lazy="date">
				</div>
				<div class="col-md-12">
					@error('time') <small class="text-danger">{{ $message }}</small> @enderror
					<select wire:model.lazy="time">
						<option value="time">Time</option>
						<option name="Breakfast" id="Breakfast">Breakfast</option>
						<option name="Lunch" id="Lunch">Lunch</option>
						<option name="Dinner" id="Dinner">Dinner</option>
					</select>
				</div>
				<div class="col-md-12">
					@error('message') <small class="text-danger">{{ $message }}</small> @enderror
					<textarea wire:model.bounce.500="message" placeholder="Message"></textarea>	
				</div>
				<div class="col-md-12">
					<button type="button" wire:click.prevent="addReserv" data-toggle="modal" data-target="#exampleModal">Create Reservation</button>
				</div>
			</div>			
		</form>
	</div>
</div>
<style type="text/css">
	.modal-button{
		position: relative;
		top: -34px;
		left: 15px;
		width: 100;
	}

	.modal-footer {
		display: flex;
	}
</style>
