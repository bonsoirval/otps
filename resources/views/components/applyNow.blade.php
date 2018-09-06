<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="{{ asset('js/jquery.min.js')}}"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>



<form id="apply" method="post" action ="{{route('alumni.apply.submit')}}" data-parsley-validate class="form-horizontal form-label-left">
{{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="recipient">Recipient <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="recipient" name="recipient" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="recipient_address">Recipient Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="recipient_address" name="recipient_address" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name"-->
                          <select name='country_id' id='country_id' class="form-control col-md-7 col-xs-12">
                              <option value="">--Select Destination Country--</option>
                              <option value="1">Nigeria</option>
                              <option value="2">USA</option>
                              <option value="3">Canada</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="amount_id" name="amount" class="form-control col-md-7 col-xs-12" required="required" type="text" readonly>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
<script>
  var price = [];
  price['1'] = 15000.00;
  price['2'] = 25000.00;
  price['3'] = 30000;

    // A $( document ).ready() block.
    $( document ).ready(function() {
      $('#country_id').on('change', function (){
          $("#amount_id").val(price[$('#country_id').val()]);
      });
    });
</script>
