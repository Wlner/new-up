<?php

namespace App\Http\Livewire\Lot;

use App\Models\Lot;
use Livewire\Component;

class LotForm extends Component
{
    public $lotId, $description;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'lotId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function lotId($lotId)
    {
        $this->lotId = $lotId;
        $lot = Lot::whereId($lotId)->first();
        $this->description = $lot->description;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
        ]);

        if ($this->lotId) {
            Lot::whereId($this->lotId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Lot::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeLotModal');
        $this->emit('refreshParentLot');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.lot.lot-form');
    }
}
