<!-- Jquery -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" ></script>
<script type="text/javascript"  src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<form method="post" action = "{{route('alumni.apply.submit')}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
    {{ csrf_field() }}
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Recipient Organisation <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="recipient" required="required" class="form-control col-md-7 col-xs-12">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Recipient Address <span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <textarea name="address" class="form-control col-md-7 col-xs-12">
        </textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Recipient Country</label>
      <div class="col-md-6 col-sm-6 col-xs-12">
          <select id ='destinationCountry' name='recipientCountry' class="form-control col-md-7 col-xs-12">
              <option value="">--Select Destination Country--</option>
              <option value="1">Nigeria</option>
              <option value="2">USA</option>
              <option value="3">Canada</option>
          </select>
        <!--input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name"-->
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Transcript Price<span class="required">*</span>
      </label>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="price" id="price" required="required" class="form-control col-md-7 col-xs-12" readonly>
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
   price[1] = 15000.00;
   price[2] = 20000.00;
   price[3] = 25000.00;
          $(document).ready(function (){
            $('#destinationCountry').on('change', function(){
              country = $("#destinationCountry").val(); //$(this).find("option:selected").attr("value"));
              $('#price').val(price[country]);// = price[country];
              alert("Hello"+price[country]);
                alert("DOne");
            });
          });

  </script>
