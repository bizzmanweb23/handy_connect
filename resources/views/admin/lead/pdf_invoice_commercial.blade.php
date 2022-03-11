<style type="text/css">
    
   div table{
    width: 50%;
        float: left;
         
    }
    div {
        width: 100%;
        
    }
    
    input{
        border: 0px;
        font-size: 15px;
        color: #2E4053;

    }
    table tr td strong{
        font-size: 15px;
         
        color:  #212F3D ; 
    }
</style>
 
   
<body>  
<center >    
    <div style="width:100%; text-align: justify-all;"> 
    <div class="justify-content-around p-1" >
        <img src="{{ url('logo/goodmanlogo.png') }}" alt="asd" style="width:100%"> 
    </div> 
    <div>
        <h3>Agreed and Accepted By </h3>
    </div>
    
    <div>
       
         <table>
                <tr>
                    <td colspan="1">
                       <strong>Office / Showroom :</strong> 
                    </td>
                    <td>
                         <input type="text" value="{{ $office_address }}" > 
                    </td>
                </tr>
                <tr>
                    <td colspan="1">
                        <strong>Telphone :</strong>
                    </td>
                    <td>
                         <input type="text" value="{{ $office_contact }}"> 
                    </td>
                </tr>
                <tr>
                    <td colspan="1">
                        <strong>Email :</strong>
                    </td>
                    <td>
                        <input type="text"  value="{{ $office_email }}">
                    </td>
                </tr>
            </table>
          
            <table>
                <tr>
                    <td>
                    <strong>Customer Signature</strong>
                    </td>
                    <td>
                        <input type="text" name="" value="{{ $customer_signature }}">
                    </td>
                </tr>
                <tr>
                    <td>
                    <strong>Name :</strong>
                    </td>
                    <td>
                        <input type="text" value="{{ $customer_name }} " >
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Contact :</strong>
                    </td>
                    <td>
                        <input type="text" value="{{ $customer_phone}}" > 
                    </td>   
                </tr>
               
                
            </table> 
    </div>
    
    <br><br><br><br>
    <br> 
    <hr>
   <div>
       <table>
    <tr>
        <td>
           <strong>Name : </strong> 
        </td>
        <td>
           <input type="text" value="{{ $customer_name }}"  >      
        </td>
    </tr>
    <tr>
        <td>
            <strong>Address : </strong> 
        </td>
        <td>
            <input type="text" value="{{ $customer_address}}" >
        </td>
    </tr>
    <tr>
        <td>
            <strong>Postal Code : </strong>
        </td>
        <td>
            <input type="text" value="{{$postalcode}}" >
        </td>
    </tr>
    </table>  
     <table >
    <tr>
        <td>
           <strong>Quotation / Contract No : </strong> 
        </td>
        <td>
           <input type="text" name="residentail-value" value="{{$contract_no}}"  >      
        </td>
    </tr>
    <tr>
        <td>
            <strong>Co Reg No : </strong> 
        </td>
        <td>
            <input type="text" value="{{ $co_reg_no }}" >
        </td>
    </tr>
    <tr>
        <td>
            <strong>Payment Terms : </strong>
        </td>
        <td>

            <input type="text"  value="{{$payment_terms}}">
        </td>
    </tr>
    </table>
    </div>
    <br><br><br>
    <br><br><br>
<hr>
    <div>
         <table   style="width:100%">
        <tr>
            <td>
                <strong>Commercial : </strong>
            </td>
            <td> 
                {{ $commercial_value }}
                
            </td>
        </tr>
        <tr>
            <td>
                <strong>Work Type : </strong>
            </td>
            <td> 
                {{ $type_of_work}}  
                 
            </td>
        </tr>
        <tr>
            <td style="width:1.2in"><strong>Scope of Work : </strong></td>
            <td> 
                <p>
                    {{ $scope_of_work }}
                </p>
            </td>
        </tr>
    </table>
    </div>
  
    </div> 
</center>
</body>
   



 
 
