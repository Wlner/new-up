<?php

namespace App\Http\Livewire\Lot;

use App\Models\Lot;
use App\Models\Block;
use Livewire\Component;

class LotForm extends Component
{
    public $lotId, $description, $block_id;
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
        $this->block_id = $lot->block_id;
    }

    //store
    //store
public function store()
{
    $data = $this->validate([
        'description' => 'required',
        'block_id' => 'required',
    ]);

    // Check if the lot is already occupied
    $existingLot = Lot::where('description', $data['description'])
        ->where('block_id', $data['block_id'])
        ->first();

    if ($existingLot) {
        // If the lot is already occupied, show an error message
        $this->addError('description', 'This lot is already occupied.');
        return;
    }

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
        $blocks  = Block::all();
        return view('livewire.lot.lot-form',[
        'blocks' => $blocks,
        ]);
    }
}
