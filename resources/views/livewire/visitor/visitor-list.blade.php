<div class="content">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active">Visitor List</li>
                </ul>
            </div>
        </div>
    </div>
    <livewire:flash-message.flash-message />
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12">
            <div class="card card-table show-entire">
                <div class="card-body">
                    <div class="mb-2 page-table-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="doctor-table-blk">
                                    <h3>Visitor List</h3>
                                    <div class="doctor-search-blk">
                                        <div class="add-group">
                                            <a wire:click="createVisitor" class="btn btn-primary ms-2">
                                                <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
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
                                    <th>Contact Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visitors as $visitor)
                                    <tr>
                                        <td>{{ $visitor->id }}</td>
                                        <td>{{ $visitor->first_name }}</td>
                                        <td>{{ $visitor->middle_name }}</td>
                                        <td>{{ $visitor->last_name }}</td>
                                        <td>{{ $visitor->contact_number }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="mx-1 btn btn-primary btn-sm" wire:click="editVisitor({{ $visitor->id }})" title="Edit">
                                                    <i class="fa fa-pencil-square"></i>
                                                </button>
                                                <a class="mx-1 btn btn-danger btn-sm" wire:click="deleteVisitor({{ $visitor->id }})" title="Delete">
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
<div wire:ignore.self class="modal fade" id="visitorModal" tabindex="-1" role="dialog" aria-labelledby="visitorModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <livewire:visitor.visitor-form />
    </div>
</div>

@section('custom_script')
    @include('layouts.scripts.visitor-scripts')
@endsection
