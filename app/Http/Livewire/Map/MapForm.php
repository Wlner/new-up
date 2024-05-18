<?php

namespace App\Http\Livewire\Map;

use App\Models\Map;
use App\Models\Block;
use Livewire\Component;

class MapForm extends Component
{
    public $mapId, $block_id, $plot_number, $occupant_name, $occupant_age, $occupant_date_of_birth, $occupant_date_of_death;
    public $action = ''; // flash
    public $message = ''; // flash

    protected $listeners = [
        'mapId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    // edit
    public function mapId($mapId)
    {
        $this->mapId = $mapId;
        $mapping = Map::findOrFail($mapId);
        $this->block_id = $mapping->block_id;
        $this->plot_number = $mapping->plot_number;
        $this->occupant_name = $mapping->occupant_name;
        $this->occupant_age = $mapping->occupant_age;
        $this->occupant_date_of_birth = $mapping->occupant_date_of_birth;
        $this->occupant_date_of_death = $mapping->occupant_date_of_death;
    }

    // store
    public function store()
    {
        $data = $this->validate([
            'block_id' => 'required|exists:blocks,id',
            'plot_number' => 'required|string',
            'occupant_name' => 'required|string',
            'occupant_age' => 'required|integer',
            'occupant_date_of_birth' => 'required|date',
            'occupant_date_of_death' => 'required|date',
        ]);

        if ($this->mappingId) {
            $mapping = Map::findOrFail($this->mappingId);
            $mapping->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Map::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeMappingModal');
        $this->emit('refreshParentMapping');
        $this->emit('refreshTable');
    }

    public function render()
    {
        $blocks  = Block::all();
        return view('livewire.deceased.deceased-form',[
        'blocks' => $blocks,
       
        ]);

        
    }
}