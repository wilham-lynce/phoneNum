@extends('master')
@section('content')

<!DOCTYPE html>
<html>


  <head>
    <meta charset="UTF-8">
    <title>Comma Separator</title>
    <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-inline';" />
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row app-header">
        <h1 class="title"><img src="../assets/images/logo.png" width="30px"> Comma Separator</h1>
      </div>
      <div class="row app-body">
        <div class="col-5 text-container">
          <textarea id="txtInput"></textarea>
        </div>
        <div class="col-2 button-container">
          <div>
            <div class="btn-group">
              <button type="button" id="btnSeparatorType" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">,</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" id=""></a></a>
                <a class="dropdown-item" id="ddComma">,</a></a>
                <a class="dropdown-item" id="ddColon">:</a>
                <a class="dropdown-item" id="ddSemiColon">;</a>
                <a class="dropdown-item" id="ddDash">-</a>
                <a class="dropdown-item" id="ddSlash">/</a>
                <a class="dropdown-item" id="ddHLine">|</a>
                <a class="dropdown-item" id="ddSpace">Space</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" id="ddCustom">Custom</a>
              </div>
            </div>
            <button class="btn-primary button" id="btnSeperateMultiline" > &#8921; </button>
            <br>
            <button class="btn-primary button" id="btnSeperateSingleLine"> &#8920; </button>
            <br>
            <button class="btn-primary button" id="btnClear"> Clear </button>
          </div>
        </div>
        <div class="col-5 text-container">
          <textarea id="txtOutput"></textarea>
        </div>
      </div>
    </div>
    <script>window.jQuery = window.$ = require('jquery');</script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
  </body>
 
</html>
<script type="text/javascript" src="{{asset('rough.js')}}"></script>
@endsection














