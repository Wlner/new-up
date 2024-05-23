<div class="modal-content">
    <div class="modal-header bg-primary text-light">
        <h1 class="modal-title fs-5">
            @if ($reservationId)
                <strong>Edit Reservation</strong>
            @else
                <strong>Add Reservation</strong>
            @endif
        </h1>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger bg-light text-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="mb-3 row">
                <div class="col-md-12">
                    <label for="first_name" class="form-label"><strong>First Name</strong><span class="login-danger">*</span></label>
                    <input id="first_name" class="form-control" type="text" wire:model="first_name" placeholder="First Name">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-12">
                    <label for="middle_name" class="form-label"><strong>Middle Name</strong></label>
                    <input id="middle_name" class="form-control" type="text" wire:model="middle_name" placeholder="Middle Name">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-12">
                    <label for="last_name" class="form-label"><strong>Last Name</strong></label>
                    <input id="last_name" class="form-control" type="text" wire:model="last_name" placeholder="Last Name">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-12">
                    <label for="date_birth" class="form-label"><strong>Date of Birth</strong><span class="text-danger">*</span></label>
                    <input id="date_birth" class="form-control" type="date" wire:model="date_birth" aria-label="Date of Birth" required>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-12">
                    <label for="date_death" class="form-label"><strong>Date of Death</strong><span class="text-danger">*</span></label>
                    <input id="date_death" class="form-control" type="date" wire:model="date_death" aria-label="Date of Death" required>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-12">
                    <label for="date_burial" class="form-label"><strong>Date of Burial</strong><span class="text-danger">*</span></label>
                    <input id="date_burial" class="form-control" type="date" wire:model="date_burial" aria-label="Date of Burial" required>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-12">
                    <label for="family_contact_person" class="form-label"><strong>Family Contact Person</strong><span class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col">
                            <input id="First_Name" class="form-control" type="text" wire:model="First_Name" placeholder="First Name" aria-label="First Name" required>
                            <br>
                            <input id="Middle_Name" class="form-control" type="text" wire:model="Middle_Name" placeholder="Middle Name" aria-label="Middle Name" required>
                            <br>
                            <input id="Last_Name" class="form-control" type="text" wire:model="Last_Name" placeholder="Last Name" aria-label="Last Name" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-12">
                    <label for="phone_number" class="form-label"><strong>Phone Number</strong><span class="text-danger">*</span></label>
                    <input id="phone_number" class="form-control" type="text" wire:model="phone_number" placeholder="Phone Number" aria-label="Phone Number" required>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
</div>
