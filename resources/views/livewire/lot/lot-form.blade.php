<div class="modal-content">
	<div class="modal-header">
		<h1 class="modal-title fs-5">
			@if ($lotId)
			Edit Lot
			@else
			Add Lot
			@endif
		</h1>
		<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
	</div>
	@if ($errors->any())
	{{ implode('', $errors->all('<div>:message</div>')) }}
	@endif
	<form wire:submit.prevent="store" enctype="multipart/form-data">
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group local-forms">
						<label>
							Lot
							<span class="login-danger">*</span>
						</label>
						<input class="form-control" type="text" wire:model="description" placeholder />
					</div>
				</div>
			</div>

			<div class="mb-3 row">
				<div class="col-md-6">
					<label for="block_id" class="form-label">Block<span class="login-danger">*</span></label>
					<select id="block_id" class="form-select" wire:model="block_id">
						<option value="" selected>Select a Block</option>
						@foreach ($blocks as $block)
							<option value="{{ $block->id }}">{{ $block->description }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div> 

			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	</form>
</div>