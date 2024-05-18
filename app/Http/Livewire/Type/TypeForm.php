<?php

namespace App\Http\Livewire\Type;

use App\Models\Type;
use Livewire\Component;

class TypeForm extends Component
{
    public $typeId, $maintenance,$burial;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'typeId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function typeId($typeId)
    {
        $this->typeId = $typeId;
        $type = Type::whereId($typeId)->first();
        $this->maintenance = $type->maintenance;
        $this->burial = $type->burial;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'maintenance' => 'required',
            'burial' => 'required',
        ]);

        if ($this->typeId) {
            Type::whereId($this->typeId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Type::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeTypeModal');
        $this->emit('refreshParentType');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.type.type-form');
    }
}
