
<x-layouts.welcome-layout>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<div class="w3-container w3-teal">
<h1>Minutes of Meeting</h1>
</div>

<div class="card card-default">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    
                </div>
            </div>
           
            
            <div class="table-responsive">
               <br>
        <table id="myTable" class="table table-bordered {{ count($moms) > 0 ? 'datatable' : '' }} pointer">
                    <thead>
                        <tr>
                            <th>SL.No</th>
                            <th>Meeting Of Minutes Number</th>
                            <th>Meeting Of Minutes Name</th>
                            <th>Meeting Of Minutes Date</th>
                            <th>Meeting Of Minutes Description</th>
                            <th>View Details</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (count($moms) > 0)
                            @foreach ($moms as $index => $mom)
                                <tr data-entry-id="h">
                                    <td>{{ $index+1 }}</td>
                                   
                                    <td>{{ $mom->mom_number }}</td>
                                    <td>{{ $mom->mom_name }}</td>
                                    <td>{!! \Carbon\Carbon::parse($mom->mom_date)->format('d M Y') !!}</td>
                                    <td>{{ $mom->mom_description }}</td>
                                    <td><a href="{{Storage::disk('public')->exists($mom->mom_photo_path) ? Storage::url($mom->mom_photo_path) : asset($mom->mom_image)}}" target="_blank">Read more</a></td>
                                   
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">No entries in table</td>
                            </tr>
                        @endif
                    </tbody>
        </table>
            <div class="d-flex justify-content-center">
                 {!! $moms->links() !!}
            </div>
            </div>
        </div>
    </div>

</x-layouts.welcome-layout>

