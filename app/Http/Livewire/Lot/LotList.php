<?php

namespace App\Http\Livewire\Lot;

use App\Models\Lot;
use Livewire\Component;

class LotList extends Component
{
    public $lotId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentLot' => '$refresh',
        'deleteLot',
        'editLot',
        'deleteConfirmLot'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createLot()
    {
        $this->emit('resetInputFields');
        $this->emit('openLotModal');
    }

    public function editLot($lotId)
    {
        $this->lotId = $lotId;
        $this->emit('lotId', $this->lotId);
        $this->emit('openLotModal');
    }

    public function deleteLot($lotId)
    {
        Lot::destroy($lotId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $lots  = Lot::all();
        } else {
            $lots  = Lot::where('number', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.Lot.Lot-list', [
            'lots' => $lots
        ]);
    }
}
