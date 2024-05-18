<div class="content">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active">Dead List</li>
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
                                    <h3>Dead List</h3>
                                    <div class="doctor-search-blk">
                                        <div class="add-group">
                                            <a wire:click="createDead" class="btn btn-primary ms-2">
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
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Block</th>
                                    <th>Lot #</th>
                                    <th>Date of Birth</th>
                                    <th>Date of Death</th>
                                    <th>Date of Burial</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deads as $dead)
                                    <tr>
                                        <td>{{ $dead->id ?? ''}}</td>
                                        <td>{{ $dead->first_name ?? ''}}</td>
                                        <td>{{ $dead->middle_name ?? ''}}</td>
                                        <td>{{ $dead->last_name ?? ''}}</td>
                                        <td>{{ $dead->Lot->Block->description ?? ''}}</td>
                                        <td>{{ $dead->Lot->description ?? ''}}</td>
                                        <td>{{ $dead->dt_birth ?? ''}}</td>
                                        <td>{{ $dead->dt_death ?? ''}}</td>
                                        <td>{{ $dead->date_burial ?? ''}}</td>

                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="mx-1 btn btn-primary btn-sm" wire:click="editDead({{ $dead->id }})" title="Edit">
                                                    <i class="fa fa-pencil-square"></i>
                                                </button>
                                                <a class="mx-1 btn btn-danger btn-sm" wire:click="deleteDead({{ $dead->id }})" title="Delete">
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
<div wire:ignore.self class="modal fade" id="deadModal" tabindex="-1" role="dialog" aria-labelledby="deadModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <livewire:dead.dead-form />
    </div>
</div>

@section('custom_script')
    @include('layouts.scripts.dead-scripts')
@endsection

