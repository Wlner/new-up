<div class="modal-content">
    <div class="modal-header bg-primary text-light">
        <h1 class="modal-title fs-5">
            @if ($burialId)
                Edit Burial
            @else
                Add Burial
            @endif
        </h1>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                        <input id="first_name" class="form-control form-control-lg" type="text" wire:model="first_name" placeholder="First Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="middle_name" class="form-label">Middle Name <span class="text-danger">*</span></label>
                        <input id="middle_name" class="form-control form-control-lg" type="text" wire:model="middle_name" placeholder="Middle Name" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                        <input id="last_name" class="form-control form-control-lg" type="text" wire:model="last_name" placeholder="Last Name" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="lot_code" class="form-label">Lot Code <span class="text-danger">*</span></label>
                    <select id="lot_code" class="form-control form-control-lg" wire:model="lot_code" required>
                      <option value="" disabled selected>Select a Lot Code</option>
                      @for ($i = 1; $i <= 50; $i++)
                        <option value="AL{{ str_pad($i, 3, '0', STR_PAD_LEFT) }}">AL{{ str_pad($i, 3, '0', STR_PAD_LEFT) }}</option>
                      @endfor
                      @for ($i = 1; $i <= 50; $i++)
                        <option value="BL{{ str_pad($i, 3, '0', STR_PAD_LEFT) }}">BL{{ str_pad($i, 3, '0', STR_PAD_LEFT) }}</option>
                      @endfor
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="block" class="form-label">Block <span class="text-danger">*</span></label>
                    <select id="block" class="form-control form-control-lg" wire:model="block" required>
                      <option value="" disabled selected>Select a Block</option>
                      <option value="A">Block A</option>
                      <option value="B">Block B</option>
                    </select>
                  </div>
                </div>
              </div>
              

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="born_date" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                        <input id="born_date" class="form-control form-control-lg" type="date" wire:model="date_birth" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_death" class="form-label">Date of Death <span class="text-danger">*</span></label>
                        <input id="date_death" class="form-control form-control-lg" type="date" wire:model="date_death" required>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_burial" class="form-label">Date of Burial <span class="text-danger">*</span></label>
                        <input id="date_burial" class="form-control form-control-lg" type="date" wire:model="date_burial" required>
                    </div>
                </div>
            </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-lg">Save</button>
        </div>
    </form>
</div>
