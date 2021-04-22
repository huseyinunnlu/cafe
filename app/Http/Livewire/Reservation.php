<?php

namespace App\Http\Livewire;
use App\Models\Reserv;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivationMail;
class Reservation extends Component
{

	public $name,$email,$phone,$guest,$date,$time,$message,$code,$keys,$key,$enable,$validatedData;

	public function updated($fields)
	{
		$this->validateOnly($fields,[
			'name'=>'required|max:255',
			'email'=>'required|email',
			'phone'=>'required|integer',
			'guest'=>'required',
			'date'=>'required|date|after:today',
			'time'=>'required',
			'message'=>'required|max:1500',
		]);
	}

	public function sendMail()
	{
		$this->key= '';
		$this->keys = array_merge(range('a', 'z'), range('A', 'Z'));
		for($i=0; $i < 10; $i++) {
			$this->key .= $this->keys[array_rand($this->keys)];
		}
		Mail::to($this->email)->send(new ActivationMail($this->name,$this->email,$this->key));
		session()->flash('message', 'Code Sent successfully');
	}


	public function control()
	{
		$this->enable = 0;
		if ($this->key == $this->code) {
			$this->enable = 1;
			session()->flash('message', 'Code true.');
		}else{
			session()->flash('message', 'Code False check the code.');
		}
	}

	public function addReserv()
	{
		$validatedData = $this->validate([
			'name'=>'required|max:255',
			'email'=>'required|email',
			'phone'=>'required|integer',
			'guest'=>'required',
			'date'=>'required|date|after:today',
			'time'=>'required',
			'message'=>'required|max:1500',
		]);

		if($this->enable == 1){
			Reserv::create([
				'name'=>$this->name,
				'email'=>$this->email,
				'phone'=>$this->phone,
				'guest'=>$this->guest,
				'date'=>$this->date,
				'time'=>$this->time,
				'message'=>$this->message,
			]);
			session()->flash('message', 'Reservation Created successfully');
		}else{
			session()->flash('message', 'Error');
		}
	}

	public function render()
	{
		return view('livewire.reservation');
	}
}
