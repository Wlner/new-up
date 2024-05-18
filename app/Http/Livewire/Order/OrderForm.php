<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use Livewire\Component;

class OrderForm extends Component
{
    public $orderId,$type,$block,$lot_code, $target_completion, $description, $worker;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'orderId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function orderId($orderId)
    {
        $this->orderId = $orderId;
        $order = Order::whereId($orderId)->first();
        $this->type = $order->type;
        $this->block = $order->block;
        $this->lot_code = $order->lot_code;
        $this->target_completion = $order->target_completion;
        $this->description = $order->description;
        $this->worker = $order->worker;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'type' => 'required',
            'block' => 'required',
            'lot_code' => 'required',
            'target_completion' => 'required',
            'description' => 'required',
            'worker' => 'required',
        ]);

        if ($this->orderId) {
            Order::whereId($this->orderId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Order::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeOrderModal');
        $this->emit('refreshParentOrder');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.order.order-form');
    }
}
