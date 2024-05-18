<?php

namespace App\Http\Livewire\Map;

use App\Models\Map;
use Livewire\Component;

class MapList extends Component
{
    public $mapId;
    public $search = '';
    public $action = ''; // flash
    public $message = ''; // flash

    protected $listeners = [
        'refreshParentMapping' => '$refresh',
        'deleteMapping',
        'editMapping',
        'deleteConfirmMapping'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createMapping()
    {
        $this->emit('resetInputFields');
        $this->emit('openMappingModal');
    }

    public function editMapping($mapId)
    {
        $this->mapId = $mapId;
        $this->emit('mapId', $this->mapId);
        $this->emit('openMappingModal');
    }

    public function deleteMapping($mapId)
    {
        Map::destroy($mapId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $maps = Map::all();
        } else {
            $maps = Map::where('plot_number', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.map.map-list', [
            'maps' => $maps
        ]);
    }
}
