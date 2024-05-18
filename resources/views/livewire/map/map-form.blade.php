<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($deceasedId)
                Edit Deceased
            @else
                Add Deceased
            @endif
        </h1>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            First Name
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="first_name" placeholder="First Name" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Middle Name
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="middle_name" placeholder="Middle Name" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Last Name
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="text" wire:model="last_name" placeholder="Last Name" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Born Date
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="date" wire:model="born_date" placeholder="Born Date" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Died On
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="date" wire:model="died_on" placeholder="Died On" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Date of Burial
                            <span class="login-danger">*</span>
                        </label>
                        <input class="form-control" type="date" wire:model="date_burial" placeholder="Date of Burial" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Block
                            <span class="login-danger">*</span>
                        </label>
                        <select class="form-control select" wire:model="block_id">
                            <option value="" selected>Select a Block</option>
                            @foreach ($blocks as $block)
                                <option value="{{ $block->id }}">{{ $block->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>
                            Lot
                            <span class="login-danger">*</span>
                        </label>
                        <select class="form-control select" wire:model="lot_id">
                            <option value="" selected>Select a Lot</option>
                            @foreach ($lots as $lot)
                                <option value="{{ $lot->id }}">{{ $lot->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
