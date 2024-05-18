<?php

namespace App\Http\Livewire\Reservation;

use App\Models\Reservation;
use Livewire\Component;

class ReservationList extends Component
{
    public $reservationId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentReservation' => '$refresh',
        'deleteReservation',
        'editReservation',
        'deleteConfirmReservation'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createReservation()
    {
        $this->emit('resetInputFields');
        $this->emit('openReservationModal');
    }

    public function editReservation($reservationId)
    {
        $this->reservationId = $reservationId;
        $this->emit('reserationId', $this->reserationId);
        $this->emit('openReservationModal');
    }

    public function deleteReservation($reservationId)
    {
        Reservation::destroy($reservationId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $reservations  = Reservation::all();
        } else {
            $reservations  = Reservation::where('number', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.Reservation.Reservation-list', [
            'reservations' => $reservations
        ]);
    }
}
