<div class="modal-content">
    <div class="modal-header bg-primary text-light">
        <h1 class="modal-title fs-5">
            @if ($orderId)
                Edit Order
            @else
                Add Order
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

    <form wire:submit.prevent="store" id="order-form" class="modal-body custom-modal-body">
        <div class="form-group custom-form-group">
            <!-- Type Selection -->
            <div class="form-field custom-form-field mb-3">
                <label for="type" class="form-label custom-form-label">
                    <strong>Type</strong><span class="login-danger">*</span>
                </label>
                <select id="type" class="form-control custom-form-control" wire:model="type">
                    <option value="" disabled selected>Select type</option>
                    <option value="maintenance">Maintenance</option>
                    <option value="Order">burial</option>
                </select>
                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Block Selection -->
            <div class="form-field custom-form-field mb-3">
                <label for="block" class="form-label custom-form-label">
                    <strong>Block</strong><span class="login-danger">*</span>
                </label>
                <select id="block" class="form-control custom-form-control" wire:model="block">
                    <option value="" disabled selected>Select a Block</option>
                    @foreach (range('A', 'H') as $block)
                        <option value="{{ $block }}">Block {{ $block }}</option>
                    @endforeach
                </select>
                @error('block') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Lot Code Selection -->
            <div class="form-field custom-form-field mb-3">
                <label for="lot_code" class="form-label custom-form-label">
                    <strong>Lot Code</strong><span class="login-danger">*</span>
                </label>
                <select id="lot_code" class="form-control custom-form-control" wire:model="lot_code">
                    <option value="" disabled selected>Select a lot code</option>
                    @foreach (['AL', 'BL', 'CL', 'DL'] as $prefix)
                        <optgroup label="{{ $prefix }} Lot Codes">
                            @foreach (range(1, 50) as $i)
                                <option value="{{ $prefix . str_pad($i, 3, '0', STR_PAD_LEFT) }}">
                                    {{ $prefix . str_pad($i, 3, '0', STR_PAD_LEFT) }}
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                @error('lot_code') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Target Completion -->
            <div class="form-field custom-form-field mb-3">
                <label for="target_completion" class="form-label custom-form-label">
                    <strong>Target Completion</strong><span class="login-danger">*</span>
                </label>
                <input type="date" id="target_completion" class="form-control custom-form-control" wire:model="target_completion" />
                @error('target_completion') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Description -->
            <div class="form-field custom-form-field mb-3">
                <label for="description" class="form-label custom-form-label">
                    <strong>Description</strong><span class="login-danger">*</span>
                </label>
                <input type="text" id="description" class="form-control custom-form-control" wire:model="description" placeholder="Enter description" />
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Worker Selection -->
            <div class="form-field custom-form-field mb-3">
                <label for="worker" class="form-label custom-form-label">
                    <strong>Worker</strong><span class="login-danger">*</span>
                </label>
                <select id="worker" class="form-control custom-form-control" wire:model="worker">
                    <option value="" disabled selected>Select worker</option>
                    <option value="worker1">Worker 1</option>
                    <option value="worker2">Worker 2</option>
                    <option value="staff">Staff</option>
                </select>
                @error('worker') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-lg">Save</button>
        </div>
    </form>
</div>