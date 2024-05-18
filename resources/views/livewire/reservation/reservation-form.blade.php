<div class="modal-content">
    <div class="modal-header bg-primary text-light">
        <h1 class="modal-title fs-5">
            @if ($reservationId)
                Edit Reservation
            @else
                Add Reservation
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
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="burial_name" class="form-label"><strong>Burial Name</strong><span class="text-danger">*</span></label>
                    <input id="burial_name" class="form-control" type="text" wire:model="Burial_name" placeholder="Burial Name" aria-label="Burial Name" required>
                </div>

                <div class="col-md-6">
                    <label for="date_birth" class="form-label"><strong>Date of Birth</strong><span class="text-danger">*</span></label>
                    <input id="date_birth" class="form-control" type="date" wire:model="date_birth" aria-label="Date of Birth" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="date_death" class="form-label"><strong>Date of Death</strong><span class="text-danger">*</span></label>
                    <input id="date_death" class="form-control" type="date" wire:model="date_death" aria-label="Date of Death" required>
                </div>
                <div class="col-md-6">
                    <label for="date_burial" class="form-label"><strong>Date of Burial</strong><span class="text-danger">*</span></label>
                    <input id="date_burial" class="form-control" type="date" wire:model="date_burial" aria-label="Date of Burial" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="family_contact_person" class="form-label"><strong>Family Contact Person</strong><span class="text-danger">*</span></label>
                    <input id="family_contact_person" class="form-control" type="text" wire:model="family_contact_person" placeholder="Family Contact Person" aria-label="Family Contact Person" required>
                </div>

                <div class="col-md-6">
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
