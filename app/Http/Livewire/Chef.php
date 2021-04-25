<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Chef as Chefs;

class Chef extends Component
{
	use WithFileUploads;

	public $name,$photo,$spec,$social1,$social2,$social3,$social4,$open,$filename,$selected_id;

	public function create() {
		$this->open = 1;
	}

	public function updated($fields)
	{
		$this->validateOnly($fields,[
			'name'=>'required|max:255',
			'photo'=>'required|mimes:png,jpg,jpeg|max:2048',
			'spec'=>'required',
			'social1'=>'url|nullable',
			'social2'=>'url|nullable',
			'social3'=>'url|nullable',
			'social4'=>'url|nullable',
		]);
	}

	public function store()
	{
		$this->validate([
			'name'=>'required|max:255',
			'photo'=>'required|mimes:png,jpg,jpeg|max:2048',
			'spec'=>'required',
			'social1'=>'url|nullable',
			'social2'=>'url|nullable',
			'social3'=>'url|nullable',
			'social4'=>'url|nullable',
		]);



		$photo = $this->photo->store('uploads');

		Chefs::create([
			'name'=>$this->name,
			'photo'=>$photo,
			'spec'=>$this->spec,
			'social1'=>$this->social1,
			'social2'=>$this->social2,
			'social3'=>$this->social3,
			'social4'=>$this->social4,
		]);
		session()->flash('message','Chef Added Successfully');
		$this->name = '';
		$this->photo = '';
		$this->spec = '';
		$this->social1 = '';
		$this->social2 = '';
		$this->social3 = '';
		$this->social4 = '';
		
	}

	public function destroy($id)
	{
		Chefs::find($id)->delete();
		session()->flash('message','Deleted Successfully');
	}

	public function render()
	{
		$chefs = Chefs::orderBy('id','DESC')->get();
		return view('livewire.chef',compact('chefs'));
	}
}
