<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Menu as Menus;

class Menu extends Component
{
	public $title,$time,$desc,$price;

	public function resetInputFields()
	{
		$this->title = '';
		$this->desc = '';
		$this->price = '';
	}

	public function storeFood()
	{
		$validatedData = $this->validate([
			'title'=>'required|max:255',
			'desc'=>'required|max:20000',
			'price'=>'required',
		]);

		Menus::create($validatedData);
		session()->flash('message', 'Food Added Successfuly');
		$this->resetInputFields();
	}

    public function render()
    {
        return view('livewire.menu');
    }
}
