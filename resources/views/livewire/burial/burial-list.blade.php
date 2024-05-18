<div class="content">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active">Burial List</li>
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
                                    <h3>Burial List</h3>
                                    <div class="doctor-search-blk">
                                        <div class="add-group">
                                            <a wire:click="createBurial" class="btn btn-primary ms-2">
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
                        <table class="table mb-0 border-0 custom-table comman-table datatable" id="burialTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Block</th>
                                    <th>Lot Code</th>
                                    <th>Date of birth</th>
                                    <th>Date of death</th>
                                    <th>Date of Burial</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($burials as $burial)
                                    <tr id="row-{{ $burial->id }}">
                                        <td>{{ $burial->id }}</td>
                                        <td>{{ $burial->first_name }}</td>
                                        <td>{{ $burial->middle_name }}</td>
                                        <td>{{ $burial->last_name }}</td>
                                        <td>{{ $burial->block }}</td>
                                        <td>{{ $burial->lot_code }}</td>
                                        <td>{{ $burial->date_birth }}</td>
                                        <td>{{ $burial->date_death }}</td>
                                        <td>{{ $burial->date_burial }}</td>

                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <button type="button" class="mx-1 btn btn-primary btn-sm" wire:click="editBurial({{ $burial->id }})" title="Edit">
                                                    <i class="fa fa-pencil-square"></i>
                                                </button>
                                                <button type="button" class="mx-1 btn btn-danger btn-sm" wire:click="deleteBurial({{ $burial->id }})" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <!-- Add print button to the row -->
                                                <button type="button" class="mx-1 btn btn-secondary btn-sm" onclick="printRowWithHeader({{ $burial->id }})" title="Print">
                                                    <i class="fa fa-print"></i>
                                                </button>
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
<div wire:ignore.self class="modal fade" id="burialModal" tabindex="-1" role="dialog" aria-labelledby="burialModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <livewire:burial.burial-form />
    </div>
</div>

@section('custom_script')
    @include('layouts.scripts.burial-scripts')
    <script>
        // Function to print a specific row along with headers
        function printRowWithHeader(rowId) {
            // Get the table and the specific row
            var table = document.getElementById("burialTable");
            var row = document.getElementById("row-" + rowId);
            
            // Create a new window for printing
            var printWindow = window.open('', '_blank');
            
            // Write the HTML content to the new window
            printWindow.document.write('<html><head><title>Print Row</title></head><body>');
            
            // Add the headers
            var headers = table.querySelectorAll('th');
            printWindow.document.write('<table border="1"><thead><tr>');
            headers.forEach(header => {
                printWindow.document.write('<th>' + header.innerText + '</th>');
            });
            printWindow.document.write('</tr></thead>');
            
            // Add the specific row
            printWindow.document.write('<tbody>' + row.outerHTML + '</tbody>');
            printWindow.document.write('</table></body></html>');
            
            // Print the content and close the window
            printWindow.document.close();
            printWindow.print();
        }
    </script>
@endsection
