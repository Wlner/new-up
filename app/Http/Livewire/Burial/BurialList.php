<?php

namespace App\Http\Livewire\Burial;

use App\Models\Burial;
use Livewire\Component;

class BurialList extends Component
{
    public $burialId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentBurial' => '$refresh',
        'deleteBurial',
        'editBurial',
        'deleteConfirmBurial'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createBurial()
    {
        $this->emit('resetInputFields');
        $this->emit('openBurialModal');
    }

    public function editBurial($burialId)
    {
        $this->burialId = $burialId;
        $this->emit('burialId', $this->burialId);
        $this->emit('openburialModal');
    }

    public function deleteBurial($burialId)
    {
        Burial::destroy($burialId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $burials  = Burial::all();
        } else {
            $burials  = Burial::where('number', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.Burial.Burial-list', [
            'burials' => $burials
        ]);
    }
}
