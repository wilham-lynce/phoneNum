<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;



class PhoneInput extends Controller
{
   public function regions()
   {
    $phoneUtil = PhoneNumberUtil::getInstance();
    $arrRegion = $phoneUtil -> getSupportedRegions();
    return view('index',['arrRegions'=>$arrRegion]);
   }


   public function numberType(Request $req)
   {
    $phoneUtil = PhoneNumberUtil::getInstance();
    $numberType->getNumberType($req);

   }


   public function trial()
   {
        $swissNumberStr = $req;
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        try {
            $swissNumberProto = $phoneUtil->parse($swissNumberStr, "GH");
            var_dump($swissNumberProto);
        } catch (\libphonenumber\NumberParseException $e) {
            var_dump($e);
        }
        $isValid = $phoneUtil->isValidNumber($swissNumberProto);
        var_dump($isValid);

                // Produces "+41446681800"
        echo $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::E164);

        // Produces "044 668 18 00"
        echo $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::NATIONAL);

        // Produces "+41 44 668 18 00"
        echo $phoneUtil->format($swissNumberProto, \libphonenumber\PhoneNumberFormat::INTERNATIONAL);

   }


   public function numInfo(Request $req)
   {
    $phoneUtil = PhoneNumberUtil::getInstance();
    $geocoder = \libphonenumber\geocoding\PhoneNumberOfflineGeocoder::getInstance();
    
    // $validity = PhoneNumberUtil::isValidNumber();
    //  $X =$req->input();
    //  return $X;
    $data = $req->input();
    $separate = json_decode(json_encode(($data),true));
    $num =  $separate->phone_number;
    $country_code = $separate->country_code;

    try {
        $NumberProto = $phoneUtil->parse($num, $country_code);
        // print_r($NumberProto);
    } catch (\libphonenumber\NumberParseException $e) {
        print_r($e);
    }
    // return $number;
    // return $country_code;
    // $isValid = $phoneUtil->isValidNumber($NumberProto);
    // print_r($isValid);

    print_r($phoneUtil->format($NumberProto, \libphonenumber\PhoneNumberFormat::E164));

        // Produces "044 668 18 00"
    print_r($phoneUtil->format($NumberProto, \libphonenumber\PhoneNumberFormat::NATIONAL));

        // Produces "+41 44 668 18 00"
    print_r($phoneUtil->format($NumberProto, \libphonenumber\PhoneNumberFormat::INTERNATIONAL));

    print_r($geocoder->getDescriptionForNumber($NumberProto, $country_code));


   }


   public function internationalFormat(Request $req)
   {
    $phoneUtil = PhoneNumberUtil::getInstance();
    $carrierMapper = \libphonenumber\PhoneNumberToCarrierMapper::getInstance();
    $geocoder = \libphonenumber\geocoding\PhoneNumberOfflineGeocoder::getInstance();
    
    // $validity = PhoneNumberUtil::isValidNumber();
    //  $X =$req->input();
    //  return $X;
    $data = $req->input();
    $separate = json_decode(json_encode(($data),true));
    $num =  $separate->phone_number;
    $country_code = $separate->country_code;

    try {
        $NumberProto = $phoneUtil->parse($num, $country_code);
        $chNumber = \libphonenumber\PhoneNumberUtil::getInstance()->parse($num, $country_code);
        // print_r($NumberProto);
    } catch (\libphonenumber\NumberParseException $e) {
        print_r($e);
    }
        
        $car  =   $carrierMapper->getNameForNumber($chNumber, 'en');
        $eformat =   ($phoneUtil->format($NumberProto, \libphonenumber\PhoneNumberFormat::E164));
        $intoutput=  ($phoneUtil->format($NumberProto, \libphonenumber\PhoneNumberFormat::INTERNATIONAL));
        $nat=  ($phoneUtil->format($NumberProto, \libphonenumber\PhoneNumberFormat::NATIONAL));

        return view('sketch',['inter'=>$intoutput,'natout'=>$nat,'eform'=>$eformat,'ini'=>$num,'cc'=>$country_code, 'description'=>$car]);
        
   }





   
}
