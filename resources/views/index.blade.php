@extends('master')
@section('content')
<link rel="stylesheet" href="index.css">
<body style="background: #e5e9eb; color: rgb(26, 54, 46);">
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