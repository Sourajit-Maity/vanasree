<x-admin.details-table>
    <x-slot name="details">
    <style type="text/css">
        .table > thead tr th {
            background: #ffffff;
            color: #000039;
        }
    </style>
    <div class="row">
            <div class="col-md-6">
                <div class="kt-section">
                    <h1>User Bill Details</h1>
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>User Name  :</b></th>
                                    <th>{{isset($details->user->full_name)?$details->user->full_name:""}}</th>
                                </tr> 
                                <tr>
                                    <th><b>Receiver Name  :</b></th>
                                    <th>{{isset($details->receiver->full_name)?$details->receiver->full_name:""}}</th>
                                </tr>                             
                                <tr>
                                    <th><b>Year:</b></th>
                                    <th>{{$details->year}}</th>
                                </tr>
                                <tr>
                                    <th><b>Month:</b></th>
                                    <th>{{$details->month}}</th>
                                </tr>    
                                <tr>
                                    <th><b>Bill Number:</b></th>
                                    <th>{{$details->bill_no}}</th>
                                </tr> 
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
           

        

        <div class="row">
            <div class="col-md-12">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                               
                                <tr>
                                    <th><b>Bill Date:</b></th>
                                    <th>{!! \Carbon\Carbon::parse($details->created_at)->format('d M Y') !!}</th>
                                </tr>
                                <tr>
                                    <th><b>Payment Date:</b></th>
                                    <th>{!! \Carbon\Carbon::parse($details->updated_at)->format('d M Y') !!}</th>
                                </tr>                            
                               
                            </thead>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
      

        <div class="row">
            <div class="col-md-12">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>Total Amount:</b></th>
                                    <th>{{$details->total_amount}}</th>
                                </tr>
                                <tr>
                                    <th><b>Paid Amount:</b></th>
                                    <th>{{$details->discount_amount}}</th>
                                </tr>

                                <tr>
                                    <th><b>Service Charge:</b></th>
                                    <th>{{$details->service_charge}}</th>
                                </tr>

                                <tr>
                                    <th><b>Security Charge:</b></th>
                                    <th>{{$details->security_charge}}</th>
                                </tr>

                                <tr>
                                    <th><b>Electricity Charge:</b></th>
                                    <th>{{$details->electricity_charge}}</th>
                                </tr>

                                <tr>
                                    <th><b>Water Charge:</b></th>
                                    <th>{{$details->water_charge}}</th>
                                </tr>

                                <tr>
                                    <th><b>Maintainence Charge:</b></th>
                                    <th>{{$details->maintainence_charge}}</th>
                                </tr>

                                <tr>
                                    <th><b>Other Expenses Charge:</b></th>
                                    <th>{{$details->other_expenses_charge}}</th>
                                </tr>
                                                              
                            </thead>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                               
                                <tr>
                                    <th><b>Payment Status:</b></th>
                                    @if ($details->active == 1)
                                    <th>Due</th>
                                    @elseif ($details->active == 2)
                                    <th>Paid</th>
                                    @else
                                    <th>Not Paid</th>
                                    @endif
                                </tr>   
                                <tr>
                                    <th><b>Payment Mode:</b></th>
                                    @if ($details->payment_type == 1)
                                    <th>Cash</th>
                                    @elseif ($details->payment_type == 2)
                                    <th>Cheque</th>
                                    @else
                                    <th>Online</th>
                                    @endif
                                </tr>                             
                            </thead>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
    </x-slot>
</x-admin.details-table>