<div class="content">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active">Reservation List</li>
                </ul>
            </div>
        </div>
    </div>
    <livewire:flash-message.flash-message />
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card card-table show-entire">
                <div class="card-body">
                    <div class="mb-2 page-table-header">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-lg-8">
                                <div class="doctor-table-blk">
                                    <h3>Reservation List</h3>
                                    <div class="doctor-search-blk">
                                        <div class="add-group">
                                            <a wire:click="createReservation" class="btn btn-primary ms-2">
                                                <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 text-end">
                                <div class="top-nav-search table-search-blk">
                                    <form>
                                        <input type="text" class="form-control" placeholder="Search here" wire:model.debounce.500ms="search">
                                        <button type="submit" class="btn">
                                            <img src="{{ asset('assets/img/icons/search-normal.svg') }}" alt="">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0 border-0 custom-table comman-table datatable">
                            <thead>
                                <tr>
                                    
                                    <th>Burial Name</th>
                                    <th>Date of Birth</th>
                                    <th>Date of Death</th>
                                    <th>Date Burial</th>
                                    <th>family Contact Person </th>
                                    <th>Phone number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        
                                        <td>{{ $reservation->Burial_name }}</td>
                                        <td>{{ $reservation->date_birth }}</td>
                                        <td>{{ $reservation->date_death }}</td>
                                        <td>{{ $reservation->date_burial }}</td>
                                        <td>{{ $reservation->family_contact_person }}</td>
                                        <td>{{ $reservation->phone_number }}</td>
                                       
                                       

                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="mx-1 btn btn-primary btn-sm" wire:click="editReservation({{ $reservation->id }})" title="Edit">
                                                    <i class="fa fa-pencil-square"></i>
                                                </button>
                                                <a class="mx-1 btn btn-danger btn-sm" wire:click="deleteReservation({{ $reservation->id }})" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div wire:ignore.self class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <livewire:reservation.reservation-form />
    </div>
</div>

@section('custom_script')
    @include('layouts.scripts.reservation-scripts')
@endsection
