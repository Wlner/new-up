<?php

namespace App\Http\Livewire\Dead;

use App\Models\Dead;
use Livewire\Component;

class DeadList extends Component
{
    public $deadId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentDead' => '$refresh',
        'deleteDead',
        'editDead',
        'deleteConfirmDead'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createDead()
    {
        $this->emit('resetInputFields');
        $this->emit('openDeadModal');
    }

    public function editDead($deadId)
    {
        $this->deadId = $deadId;
        $this->emit('deadId', $this->deadId);
        $this->emit('openDeadModal');
    }

    public function deleteDead($deadId)
    {
        Dead::destroy($deadId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $deads  = Dead::all();
        } else {
            $deads  = Dead::where('first_name','middle_name','last_name','lot_id','dt_birth','dt_death','user_id', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.dead.dead-list', [
            'deads' => $deads
        ]);
    }
}
