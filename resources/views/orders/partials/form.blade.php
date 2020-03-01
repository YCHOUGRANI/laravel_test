{{ csrf_field() }}
@if ($errors->any())
       @foreach($errors->all() as $error)
           <p class="alert alert-danger">
                {{$error}}
           </p>
       @endforeach
@endif
<div class="form-group{{ $errors->has('item_ids[]') ? ' has-error' : '' }}">
    <label for="item_ids[]" class="col-md-4 control-label">Please select your items</label>
    <div class="col-md-12">
        
            
            @foreach($items as $id => $name)
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox"  name="item_ids[]"  {{ $id == old('item_ids', $id) ? ' ' : ''}} value="{{$id}}" id="{{$id}}">
    </div>
  </div>
 <label class="form-control"   for="{{$id}}">{{$name}}</label>

</div>

               
            @endforeach
       
        @if ($errors->has('item_ids[]'))
            <span class="help-block">
                <strong>{{ $errors->first('item_ids[]') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
    <label for="company_id" class="col-md-4 control-label">Company</label>
    <div class="col-md-12">
        <select name="company_id" id="company_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($companies as $id => $name)
                <option value="{{ $id }}"
                        {{ $id == old('company_id', $order->company_id) ? ' selected' : ''}}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('company_id'))
            <span class="help-block">
                <strong>{{ $errors->first('company_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div id='div_contact_id' class="d-none form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Contact</label>
    <div id='div_contact_select' class="col-md-12">
        
        @if ($errors->has('contact_id'))
            <span class="help-block">
                <strong>{{ $errors->first('contacts_id') }}</strong>
            </span>
        @endif
    </div>
</div>


