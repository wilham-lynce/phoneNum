@extends('master')
@section('content')
<link rel="stylesheet" href="index.css">
<body style="background: #e5e9eb; color: rgb(26, 54, 46);">
<form class="form-inline" action="trial" style="margin-left: 30%" >
  <div class="form-row align-items-center">
    <div class="col-auto">
      <div class="md-form">
        <select name="country_code" id="countrycode" class="form-control" style="width: auto ; margin-right:10px" >
          <option value="" disabled ="disabled" selected ="selected"><label for="code">Country-code</label></option>
          @foreach ($arrRegions as $region)
            <option value="{{$region}}">{{ $region }}</option>              
          @endforeach
        </select>
        <input type="text" name="phone_number" class="form-control mb-2" id="phoneNumber" placeholder="Phone number">
        <label class="sr-only" for="inlineFormInputMD">phone nunmber</label>
      </div>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect">Submit</button>
    </div>
  </div>
</form>
  <div class="form-group">
    <textarea class="form-control rounded-0" id="Textarea1" rows="10"></textarea>
  </div>
    <button type="button" id="btnSeparatorType" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">,</button>
    <div class="dropdown-menu">
      <a class="dropdown-item" id=""></a></a>
      <a class="dropdown-item" id="ddComma">,</a></a>
      <a class="dropdown-item" id="ddSemiColon">;</a>
       <a class="dropdown-item" id="ddHLine">|</a>
      <a class="dropdown-item" id="ddSpace">Space</a>
    </div>
        
    <button class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" id="btnSeperateMultiline">delimit</button>   
    <button class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" id="btnClear">Clear</button>   
    <div class="form-group">
    <textarea class="form-control rounded-0" id="Textarea2" rows="10"></textarea>
 </div>
</body>
<script type="text/javascript" src="{{asset('run.js')}}"></script>
@endsection