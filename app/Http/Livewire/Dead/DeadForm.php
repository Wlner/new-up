<?php

namespace App\Http\Livewire\Dead;

use App\Models\Lot;
use App\Models\Dead;
use App\Models\User;
use App\Models\Block;
use Livewire\Component;

class DeadForm extends Component
{
    public $deadId, $first_name, $middle_name, $last_name, $lot_id, $dt_birth, $dt_death,$dt_burial,$user_id;
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
        $dead = Dead::whereId($deadId)->first();
        $this->first_name = $dead->first_name;
        $this->middle_name = $dead->middle_name;
        $this->last_name = $dead->last_name;
        $this->lot_id = $dead->lot_id;
        $this->dt_birth = $dead->dt_birth;
        $this->dt_death = $dead->dt_death;
        $this->dt_burial = $dead->dt_burial;
        $this->user_id = $dead->user_id;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'lot_id' => 'required',
            'dt_birth' => 'required',
            'dt_death' => 'required',
            'dt_burial' => 'required',
            'user_id' => 'required',
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
        $lots  = Lot::all();
        $users  = User::all();
        return view('livewire.dead.dead-form',[
        'lots' =>$lots,
        'users' =>$users,
        ]);
    }
}
