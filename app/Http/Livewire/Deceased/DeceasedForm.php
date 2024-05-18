<?php

namespace App\Http\Livewire\Deceased;

use App\Models\Lot;
use App\Models\Block;
use Livewire\Component;
use App\Models\Deceased;

class DeceasedForm extends Component
{
    public $deceasedId, $first_name,$middle_name,$last_name,$block_id,$lot_id,$born_date,$died_on,$date_burial;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'deceasedId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function deceasedId($deceasedId)
    {
        $this->deceasedId = $deceasedId;
        $deceased = Deceased::whereId($deceasedId)->first();
        $this->first_name = $deceased->first_name;
        $this->middle_name = $deceased->middle_name;
        $this->last_name = $deceased->last_name;
        $this->block_id = $deceased->block_id;
        $this->lot_id = $deceased->lot_id;
        $this->born_date = $deceased->born_date;
        $this->died_on = $deceased->last_name;
        $this->date_burial = $deceased->date_burial;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'block_id' => 'required',
            'lot_id' => 'required',
            'born_date' => 'required',
            'died_on' => 'required',
            'date_burial' => 'required',
        ]);

        if ($this->deceasedId) {
            Deceased::whereId($this->deceasedId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Deceased::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeDeceasedModal');
        $this->emit('refreshParentDeceased');
        $this->emit('refreshTable');
    }



public function render()
{
    return view('livewire.deceased.deceased-form');
}
}

