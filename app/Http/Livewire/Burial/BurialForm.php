<?php

namespace App\Http\Livewire\Burial;

use App\Models\Burial;
use Livewire\Component;

class BurialForm extends Component
{
    public $burialId, $first_name,$middle_name,$last_name,$block,$lot_code,$date_birth,$date_death,$date_burial;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'burialId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function burialId($burialId)
    {
        $this->burialId = $burialId;
        $burial = Burial::whereId($burialId)->first();
        $this->first_name = $burial->first_name;
        $this->middle_name = $burial->middle_name;
        $this->last_name = $burial->last_name;
        $this->block = $burial->block;
        $this->lot_code = $burial->lot_code;
        $this->date_birth = $burial->date_birth;
        $this->date_death = $burial->date_death;
        $this->date_burial = $burial->date_burial;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'block' => 'required',
            'lot_code' => 'required',
            'date_birth' => 'required',
            'date_death' => 'required',
            'date_burial' => 'required',
            
        ]);

        if ($this->burialId) {
            Burial::whereId($this->burialId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Burial::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeBurialModal');
        $this->emit('refreshParentBurial');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.burial.burial-form');
    }
}
