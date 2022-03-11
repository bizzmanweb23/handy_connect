<style>
    #scopes{ 
        text-align:justify; 
        width:100%;
    }
    select option{
        font-size: 12px;
    }
</style>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="list-group-item active" id="nav-residential-tab" data-bs-toggle="tab" data-bs-target="#residential" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Residential</button>
    <button class="list-group-item" id="nav-commercial-tab" data-bs-toggle="tab" data-bs-target="#commercial" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Commercial</button> 
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id=" "  role="tabpanel" aria-labelledby="nav-home-tab">
      <div class='box  px-2 py-2'> 
        <div class="box-header with-border">
            <h4>Add Quotation</h4>
            <div class="box-tools float-right">
                {{-- <a href="" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                    @lang('role.add') @lang('services.service')
                </a> --}}
            </div>
        </div>  
      <div class='box-body'> 
          
       <form method="POST" action="{{ route('invoice') }}" id="form"> @csrf 
            <section>
               <div class="row mt-1">
                    <div class="col-md-6">
                        <label>Customer Name</label>
                        <input type="text" class="form-control " placeholder='Customer Name'>
                    </div>
                    <div class="col-md-6">
                        <label>Date</label>
                        <input type='date' name='date' class="form-control"/>
                    </div>
               </div>
            </section>
            <section>
               <div class="row mt-1">
                    <div class="col-md-6">
                       <label>Company</label>
                       <select class="form-control" name="company-name">
                           <option value="">Goodman Interior Pte Ltd</option>
                           <option value="">Goodman Interior(S) Pte Ltd</option>
                           <option value="">Goodman Creatives Pte Ltd</option>
                           <option value="">Goodman Enterprise Pte Ltd</option>
                       </select>
                    </div> 
                </div>
               
                <h4 class="mt-1">Services</h4>  
                <div class="row mt-1"> 
                    <div class="col-md-6"> 
                         <div class="row" id="residential-menu">
                            <div class="col-md-12">
                               <h6>Residential</h6> 
                               <select class="form form-control" name='residential' >
                                  @foreach($residential as $res)
                                  <option value="{{ $res->id }}">{{ $res->type_name}}</option>
                                  @endforeach
                               </select>   

                            </div>  
                            </div>
                            <div class="row" id="commercial-menu">
                            <div class="col-md-12">
                               <h6>Commercial</h6>
                               <select class="form form-control" name="commercial"   >
                                   @foreach($commercial as $com)
                                   <option value="{{$com->id}}">{{$com->type_name}}</option>
                                   @endforeach
                               </select> 
                            </div>  
                           </div> 
                    </div>
                </div>
            </section>
    <div class="row mt-2">
    <div class='col-md-6'> 
    <h6>List of Work Item</h6> 
       <select class="form form-control select list-of-works"  id='' name="list-of-work"> 
           @foreach($work as $rows)
           <option class="text-wrap" id="{{$rows->id}}" value="{{ $rows->id }}">
               <p>{{ $rows->work_name }}</p>
           </option>
           @endforeach
       </select> 
    </div>
</div> 

<div class="row mt-2">
   <div class='col-md-9'>
       <h6>Scope Of Works</h6>
       <select class="form form-control scopes_of_work"  name="scope-of-work" multiple>  
           
       </select> 
   </div>
    <div class="col-md-3">
        <h6>Price</h6>
        <input name='price' class="form form-control" required='required'>
    </div>
</div>
       <section class="my-1">
           <div class="box">
               <div class="box-body">
                   <table  class="border table-bordered" id="lead_list" cellspacing="0" width="100%">
               <thead> 
                   <th>Service</th><th>List of Work</th><th>Scope of Work</th> 
               </thead>
               <tbody id='selected-work'>
                   <tr>
                   <td>service</td>
                   <td>List of work</td>
                   <td>Scope of Work</td>
                   </tr>
               </tbody>
           </table>
               </div>
           </div>
       </section>
<div class="row my-1" id="invoice-btn">
    <div class="col-md-12">
        <button type="submit" class="btn  btn-primary ">Generate invoice</button> 
    </div>
</div>     
</form> 
</div> 
</div>
</div>
 
<script src="{{ asset('asset/admin/js/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){
  
    $.ajaxSetup({ 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });  
    
    $('.list-of-works').on('change', function(e){
         
        var id =$('.select option:selected').attr("id");
        
        if(id){
            $.ajax({
                url:'{{url("get/scope")}}'+'/'+id,
                type:'get',
                dataType:'json',
                data:{id:id},
                
                success :function(data){
                   if(data){
                    $('.scopes_of_work').empty();
                    $('.scopes_of_work').append('<optgroup label="Choose scope of work here"></optgroup>');
                    $.each(data, function(key ,scope){  
                        $('.scopes_of_work').append(
                            '<option   value="'+scope.id+'">'+ scope.work_description +'  '+ scope.work_cost +'</option>'
                        );
                    });
                   } else {
                       $('.scopes_of_work').empty();
                   }
                    
                } 
                
            })
        } else {
            $('.scopes_of_work').empty();
        }
        
    });  
    
      $('#commercial-menu').hide();
       $('#residential-menu').show();
    $('#nav-residential-tab').on('click', function(){
        $('#commercial-menu').hide();
          $('#residential-menu').show();
          $('#form').attr('action',"{{ route('invoice') }}");

    });
    $('#nav-commercial-tab').on('click', function(){
          $('#commercial-menu').show();
            $('#residential-menu').hide();
            $('#form').attr('action',"{{ route('invoice-commercial') }}");
    });
   
 
    
})
</script>

 

 

