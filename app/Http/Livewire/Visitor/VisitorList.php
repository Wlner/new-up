<?php

namespace App\Http\Livewire\Visitor;

use App\Models\Visitor;
use Livewire\Component;

class VisitorList extends Component
{
    public $visitorId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentVisitor' => '$refresh',
        'deleteVisitor',
        'editVisitor',
        'deleteConfirmVisitor'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createVisitor()
    {
        $this->emit('resetInputFields');
        $this->emit('openVisitorModal');
    }

    public function editVisitor($visitorId)
    {
        $this->visitorId = $visitorId;
        $this->emit('visitorId', $this->visitorId);
        $this->emit('openVisitorModal');
    }

    public function deleteVisitor($visitorId)
    {
        Visitor::destroy($visitorId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $visitors  = Visitor::all();
        } else {
            $visitors  = Visitor::where('number', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.visitor.visitor-list', [
            'visitors' => $visitors
        ]);
    }
}
