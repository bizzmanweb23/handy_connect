    @extends('admin.layouts.main')
@section('content')
 <form method="POST" action="{{ route('make-pdf-commercial') }}">
    @csrf
    <body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click"
        data-menu="vertical-menu-modern" data-col="2-columns"> 
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-12 mb-2 mt-1">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h5 class="content-header-title float-left pr-1 mb-0 text-capitalize">
                                    Lead</h5>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb p-0 mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}"><i
                                                    class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active text-capitalize">@lang('role.list')
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box col-md-12 mx-auto py-2"> 
                        <div class="justify-content-around p-1" >
                            <img src="{{ url('logo/goodmanlogo.png') }}" alt="asd" style="width:100%">
                            
                           
                        </div> 
                    
                    <div class="box-body   p-1">
                        <div class="row">
                            <div class="col-md-6">
                                
                                <strong>Office/Showroom :</strong>
                                <input type="text" name='office-showroom' class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                <div>
                                    <b>Tel:</b>
                                   <span>
                                   <input type="text" name='office-phone' class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                   </span>
                                </div> 
                                <div>
                                    <b>Email:</b>
                                <span>
                                <input type="text" name="office-email" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                </span>
                                </div> 
                                 
                            </div> 
                            <div class="col-md-6">
                                
                                <strong>Agreed & Accepted By :</strong> 
                                <div>
                                    <b>Customer Signature:</b>
                                    <span>
                                    <input type="text" name="customer-signature" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div> 
                                <div>
                                    <b>Name:</b>
                                <span>
                                <input type="text" name="customer-name" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                </span>
                                </div> 
                                <div>
                                    <b>Contact:</b>
                                 <span>
                                 <input type="text" name="customer-contact" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                 </span>
                                </div> 
                                
                            </div>
                        </div> 
                        <hr>
                       
                        <div class="row"> 
                            <div class="col">
                                <div>
                                    <strong>Date : </strong>
                                    <span>{{ date('m d Y') }}</span>
                                </div>
                                <div>
                                    <strong>Name :</strong>
                                    <span>
                                    <input type="text" name="date" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div>
                                <div>
                                    <strong>Address :</strong>
                                    <span>
                                    <input type="text" name="customer-address" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div>
                                <div>
                                    <strong>Postal Code: </strong>
                                    <span>
                                    <input type="text" name="postal-code" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div>  
                            </div>
                            <div class="col">
                                <div>
                                    <strong>Quotation/CONTRACT NO : </strong>
                                    <span>
                                    <input type="text" name="contract-no" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div>
                                <div>
                                    <strong>Co. Reg No :</strong>
                                    <span>
                                    <input type="text" name='co-reg-no' class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div>
                                <div>
                                    <strong>Payment Terms : </strong>
                                    <span>
                                    <input type="text" name="payment-terms" class="border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    </span>
                                </div>  
                            </div>
                        </div> <hr>
                        <div class="row">
                            <div class="col"> 
                                
                                <div class="mt-1">
                                    @foreach($commercial_value as $rows)
                                    <strong>Commercial : </strong>
                                    <input type="text" name="commercial-value" value="{{$rows->type_name}}" class="form-control form-sm border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    @endforeach
                                </div>

                                <div class="mt-1">
                                    <strong>Work Type : </strong> 
                                    @foreach($types as $t) 
                                    <input type="text" name="type-of-work" value="{{ $t->work_name }}" class="form-control form-sm border-top-0 border-left-0 border-right-0 rounded-0"> 
                                    @endforeach
                                </div>
                                <div class="mt-1">
                                    <strong>Scope of Work : </strong>
                                    @foreach($scopes as $s)
                                    <input type="text" name="scope-of-work" value="{{ $s->work_description .' $'. $s->price}}" class="form-control form-sm border-top-0 border-left-0 border-right-0 rounded-0">
                                    
                                    @endforeach
                                </div>
                            </div>
                        </div> 
                        <br>
                         <div class="row">
                             <div class="col">
                                 <button type="submit" class="btn btn-primary">
                                <i class="fa fa-download"></i>    
                                 Generate Pdf</button>
                             </div>
                         </div>
                    </div>

                </div>
 

                  
            </div>
        </div>
    </body>
</form>



@section('javascript')
    <script>
        // $('#main_delete_link').click(function(e) {
        //     e.preventDefault();
        //     delete_modal_selected_data("{{ URL::signedRoute('admin.employee.delete') }}", $(this).attr('href'),
        //         "{{ csrf_token() }}");
        //     employee_list.ajax.reload();
        // });

        $(document).ready(function() {
            lead_list = $('#lead_list').DataTable({
                "aaSorting": [],

                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                //responsive: 'false',
                dom: "Bfrtip",
                buttons: [

                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-file"></i>',
                        titleAttr: 'Copy',
                        title: $('.download_label').html(),
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel"></i>',
                        titleAttr: 'Excel',

                        title: $('.download_label').html(),
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-text"></i>',
                        titleAttr: 'CSV',
                        title: $('.download_label').html(),
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf"></i>',
                        titleAttr: 'PDF',
                        title: $('.download_label').html(),
                        exportOptions: {
                            columns: ':visible'

                        }
                    },

                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i>',
                        titleAttr: 'Print',
                        title: $('.download_label').html(),
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        },
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                    {
                        extend: 'colvis',
                        text: '<i class="fa fa-columns"></i>',
                        titleAttr: 'Columns',
                        title: $('.download_label').html(),
                        postfixButtons: ['colvisRestore']
                    },
                ],
                ajax: {
                    url: "{{ route('admin.show_lead_list') }}",
                    type: 'get',
                    data: {
                        id: "{{ Auth::user()->id }}"
                    }

                },
                columns: [{
                        data: 'unique_id',
                        name: 'unique_id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'mobile',
                        name: 'mobile'
                    },
                    {
                        data: 'action'
                    }
                ]
            })
        });
    </script>
@endsection

@endsection
