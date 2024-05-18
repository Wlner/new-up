<?php

namespace App\Http\Livewire\Dead;

use App\Models\Lot;
use App\Models\Block;
use Livewire\Component;
use App\Models\Dead;

class DeadForm extends Component
{
    public $deadId, $first_name, $middle_name, $last_name, $lot_id, $dt_birth, $dt_death;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'deadId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function deadId($deadId)
    {
        $this->deadId = $deadId;
        $deceased = Dead::whereId($deadId)->first();
        $this->first_name = $deceased->first_name;
        $this->middle_name = $deceased->middle_name;
        $this->last_name = $deceased->last_name;
        $this->lot_id = $deceased->lot_id;
        $this->dt_birth = $deceased->dt_birth;
        $this->dt_death = $deceased->last_name;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            //'lot_id' => 'required',
            'dt_birth' => 'required',
            'dt_death' => 'required',
        ]);

        if ($this->deadId) {
            Dead::whereId($this->deadId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Dead::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeDeadModal');
        $this->emit('refreshParentDead');
        $this->emit('refreshTable');
    }



    public function render()
    {
        return view('livewire.dead.dead-form');
    }
}
