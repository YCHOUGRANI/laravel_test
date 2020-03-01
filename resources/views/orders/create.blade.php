@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Order</div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('orders-store') }}">
                        @include('orders.partials.form')
                        <div class="form-group">
                            <div class="col-md-6">
                                <button id='bt_save' type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
 $(document).ready(function() {

		$('select[name=company_id]').on('change', function() {
                      var ln_company_id=parseInt(this.value) +1 ;
if (!isNaN(ln_company_id)){
var ls_select='';

ls_select +='<select name="contact_id" id="contact_id" class="form-control">';
ls_select +='<option value="">Please select...</option>';

axios.get('/order_contact/'+ln_company_id)
  .then(function (response) {
    response.data.forEach(contact => {
    ls_select +=" <option value='"+contact.id+"'>"+contact.first_name+" "+contact.last_name+"</option>";
  });
ls_select +=" </select>";

$("#div_contact_id").removeClass("d-none");
$("#div_contact_select").html(ls_select);
   
  });


} else {
 $("#div_contact_id").addClass("d-none");
}
                     console.log(ln_company_id);
                });


})

</script>
@endsection
