<div class="modal-content">
    <div class="modal-header bg-primary text-light">
        <h1 class="modal-title fs-5">
            @if ($deadId)
                Edit Dead
            @else
                Add Dead
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
                <div class="col-md-4">
                    <label for="first_name" class="form-label">First Name<span class="text-danger">*</span></label>
                    <input id="first_name" class="form-control" type="text" wire:model="first_name" placeholder="First Name">
                </div>
                <div class="col-md-4">
                    <label for="middle_name" class="form-label">Middle Name<span class="text-danger">*</span></label>
                    <input id="middle_name" class="form-control" type="text" wire:model="middle_name" placeholder="Middle Name">
                </div>
                <div class="col-md-4">
                    <label for="last_name" class="form-label">Last Name<span class="text-danger">*</span></label>
                    <input id="last_name" class="form-control" type="text" wire:model="last_name" placeholder="Last Name">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="dt_birth" class="form-label">Born Date<span class="text-danger">*</span></label>
                    <input id="dt_birth" class="form-control" type="date" wire:model="dt_birth" placeholder="Born Date">
                </div>
                <div class="col-md-6">
                    <label for="dt_death" class="form-label">Died On<span class="text-danger">*</span></label>
                    <input id="dt_death" class="form-control" type="date" wire:model="dt_death" placeholder="Died On">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="dt_burial" class="form-label">Date Burial<span class="text-danger">*</span></label>
                    <input id="dt_burial" class="form-control" type="date" wire:model="dt_burial" placeholder="Date Burial">
                </div>
                <div class="col-md-6">
                    <label for="lot_id" class="form-label">Lot<span class="text-danger">*</span></label>
                    <select id="lot_id" class="form-select" wire:model="lot_id">
                        <option value="" selected>Select a Lot</option>
                        @foreach ($lots as $lot)
                            <option value="{{ $lot->id }}">{{ $lot->description }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="user_id" class="form-label">Worker<span class="text-danger">*</span></label>
                    <select id="user_id" class="form-select" wire:model="user_id">
                        <option value="" selected>Select a Worker</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <!-- Include Select2 library -->
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#user_id').select2({
                        placeholder: 'Select a Worker',
                        allowClear: true
                    });
                });
            </script>
            
            <script>
                $(document).ready(function() {
                    $('#user_id').select2({
                        placeholder: 'Select a Worker',
                        allowClear: true
                    });
                });
            </script>
            
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
</div>
