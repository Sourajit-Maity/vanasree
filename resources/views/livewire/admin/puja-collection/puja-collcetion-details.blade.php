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
                               
                               
                            </thead>
                        </table>
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
                                    <th><b>Year:</b></th>
                                    <th>{{$details->year}}</th>
                                </tr>
                                <tr>
                                    <th><b>Month:</b></th>
                                    <th>{{$details->month}}</th>
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
                                    <th><b>Bill Date:</b></th>
                                    <th>{!! \Carbon\Carbon::parse($details->created_at)->format('d M Y') !!}</th>
                                </tr>
                                <tr>
                                    <th><b>Payment Date:</b></th>
                                    <th>{!! \Carbon\Carbon::parse($details->updated_at)->format('d M Y') !!}</th>
                                </tr>
                               
                                <tr>
                                    <th><b>Additional Instructions:</b></th>
                                    <th>{{$details->additional_instructions}}</th>
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
                                    <th><b>Total Amount:</b></th>
                                    <th>{{$details->total_amount}}</th>
                                </tr>
                                <tr>
                                    <th><b>Paid Amount:</b></th>
                                    <th>{{$details->discount_amount}}</th>
                                </tr>
                                <tr>
                                    <th><b>Promo Code:</b></th>
                                    <th>{{$details->promo_code}}</th>
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
                                    @if ($details->payment_status == 1)
                                    <th>Due</th>
                                    @elseif ($details->payment_status == 2)
                                    <th>Paid</th>
                                    @else
                                    <th>Not Paid</th>
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