<?php

namespace App\Http\Livewire\Reservation;

use Livewire\Component;
use App\Models\Reservation;

class ReservationForm extends Component
{
    public $reservationId, $first_name,$middle_name,$last_name,$date_birth,$date_death,$date_burial,$family_contact_person,$phone_number;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'reservationId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function reservationId($reservationId)
    {
        $this->reservationId = $reservationId;
        $reservation = Reservation::whereId($reservationId)->first();
        $this->first_name = $reservation->first_name;
        $this->middle_name = $reservation->middle_name;
        $this->last_name = $reservation->last_name;
        $this->date_birth = $reservation->date_birth;
        $this->date_death = $reservation->date_death;
        $this->date_burial = $reservation->date_burial;
        $this->family_contact_person = $reservation->family_contact_person;
        $this->phone_number = $reservation->phone_number;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'date_birth' => 'required',
            'date_death' => 'required',
            'date_burial' => 'required',
            'family_contact_person' => 'required',
            'phone_number' => 'required',
        ]);

        if ($this->reservationId) {
            Reservation::whereId($this->reservationId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
           //  $data['status_id'] = 11;
            Reservation::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeReservationModal');
        $this->emit('refreshParentReservation');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.reservation.reservation-form');
    }
}

