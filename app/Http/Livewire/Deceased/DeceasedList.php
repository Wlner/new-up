<?php

namespace App\Http\Livewire\Deceased;

use App\Models\Deceased;
use Livewire\Component;

class DeceasedList extends Component
{
    public $deceasedId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentDeceased' => '$refresh',
        'deleteDeceased',
        'editDeceased',
        'deleteConfirmDeceased'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createDeceased()
    {
        $this->emit('resetInputFields');
        $this->emit('openDeceasedModal');
    }

    public function editDeceased($deceasedId)
    {
        $this->deceasedId = $deceasedId;
        $this->emit('deceasedId', $this->deceasedId);
        $this->emit('openDeceasedModal');
    }

    public function deleteDeceased($deceasedId)
    {
        Deceased::destroy($deceasedId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $deceases  = Deceased::all();
        } else {
            $deceases  = Deceased::where('number', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.deceased.deceased-list', [
            'deceases' => $deceases
        ]);
    }
}
