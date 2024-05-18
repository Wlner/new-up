<?php

namespace App\Http\Livewire\Visitor;

use App\Models\Visitor;
use Livewire\Component;

class VisitorForm extends Component
{
    public $visitorId, $first_name,$middle_name,$last_name,$contact_number;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'visitorId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function visitorId($visitorId)
    {
        $this->visitorId = $visitorId;
        $visitor = Visitor::whereId($visitorId)->first();
        $this->first_name = $visitor->first_name;
        $this->middle_name = $visitor->middle_name;
        $this->last_name = $visitor->last_name;
        $this->contact_number = $visitor->dcontact_number;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
        ]);

        if ($this->visitorId) {
            Visitor::whereId($this->visitorId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Visitor::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeVisitorModal');
        $this->emit('refreshParentVisitor');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.visitor.visitor-form');
    }
}
