<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use Livewire\Component;

class OrderList extends Component
{
    public $orderId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentOrder' => '$refresh',
        'deleteOrder',
        'editOrder',
        'deleteConfirmOrder'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createOrder()
    {
        $this->emit('resetInputFields');
        $this->emit('openOrderModal');
    }

    public function editOrder($orderId)
    {
        $this->orderId = $orderId;
        $this->emit('orderId', $this->orderId);
        $this->emit('openOrderModal');
    }

    public function deleteOrder($orderId)
    {
        Order::destroy($orderId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $orders  = Order::all();
        } else {
            $orders  = Order::where('number', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.order.order-list', [
            'orders' => $orders
        ]);
    }
}
