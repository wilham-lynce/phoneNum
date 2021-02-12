<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;

class PhoneInput extends Controller
{
    public function regions()
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        $arrRegion = $phoneUtil->getSupportedRegions();
        return view("index", ["arrRegions" => $arrRegion]);
    }

    public function number(Request $req)
    {
        $num = $req->input("phone_number");
        $country_code = $req->input("country_code");
        $numbers = explode(",", $num);
        // dd($numbers);
        if (isset($num) && isset($country_code)) {
            $formattedNumbers = collect($numbers)->map(function ($x) use (
                $country_code
            ) {
                $phoneUtil = PhoneNumberUtil::getInstance();
                $carrierMapper = \libphonenumber\PhoneNumberToCarrierMapper::getInstance();
                $geocoder = \libphonenumber\geocoding\PhoneNumberOfflineGeocoder::getInstance();

                $NumberProto = $phoneUtil->parse($x, $country_code);
                $chNumber = \libphonenumber\PhoneNumberUtil::getInstance()->parse(
                    $x,
                    $country_code
                );
                $car = $carrierMapper->getNameForNumber($chNumber, "en");
                $eformat = $phoneUtil->format(
                    $NumberProto,
                    \libphonenumber\PhoneNumberFormat::E164
                );
                $intoutput = $phoneUtil->format(
                    $NumberProto,
                    \libphonenumber\PhoneNumberFormat::INTERNATIONAL
                );
                $nat = $phoneUtil->format(
                    $NumberProto,
                    \libphonenumber\PhoneNumberFormat::NATIONAL
                );
                return (object) [
                    "phone" => $x,
                    "code" => $country_code,
                    "eform" => $eformat,
                    "national" => $nat,
                    "international" => $intoutput,
                    "carrier" => $car,
                ];
            });
            return view("sketch", ["info" => $formattedNumbers]);
        } else {
            echo "<script>";
            echo "alert('please make sure you have provided the necessary info i.e the country code and the phone number(s)')";
            echo "</script>";
        }
    }

    public function trial(Request $request)
    {
        $swissNumberStr = $request;
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
        echo $phoneUtil->format(
            $swissNumberProto,
            \libphonenumber\PhoneNumberFormat::E164
        );

        // Produces "044 668 18 00"
        echo $phoneUtil->format(
            $swissNumberProto,
            \libphonenumber\PhoneNumberFormat::NATIONAL
        );

        // Produces "+41 44 668 18 00"
        echo $phoneUtil->format(
            $swissNumberProto,
            \libphonenumber\PhoneNumberFormat::INTERNATIONAL
        );
    }

    public function numInfo(Request $request)
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        $geocoder = \libphonenumber\geocoding\PhoneNumberOfflineGeocoder::getInstance();

        $num = $request->input("phone_number");
        $cc = $request->input("");
        // $separate = json_decode(json_encode(($data),true));
        // $num =  $separate->phone_number;
        // $country_code = $separate->country_code;
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
        $separate = json_decode(json_encode($data, true));
        $num = $separate->phone_number;
        $country_code = $separate->country_code;

        try {
            $NumberProto = $phoneUtil->parse($num, $country_code);
            $chNumber = \libphonenumber\PhoneNumberUtil::getInstance()->parse(
                $num,
                $country_code
            );
            // print_r($NumberProto);
        } catch (\libphonenumber\NumberParseException $e) {
            print_r($e);
        }

        $car = $carrierMapper->getNameForNumber($chNumber, "en");
        $eformat = $phoneUtil->format(
            $NumberProto,
            \libphonenumber\PhoneNumberFormat::E164
        );
        $intoutput = $phoneUtil->format(
            $NumberProto,
            \libphonenumber\PhoneNumberFormat::INTERNATIONAL
        );
        $nat = $phoneUtil->format(
            $NumberProto,
            \libphonenumber\PhoneNumberFormat::NATIONAL
        );

        return view("sketch", [
            "inter" => $intoutput,
            "natout" => $nat,
            "eform" => $eformat,
            "ini" => $num,
            "cc" => $country_code,
            "description" => $car,
        ]);
    }
}

// $numbers = ['0553995074', '0244459784'];
// $formattedNumbers = collect($numbers)->map(function ($number) {
//     return (object)[
//         'nat' => $number . 'nat',
//         'cat' => 'cat' . $number,
//         'dog' => 'dogs' . $number
//     ];
// });
// return view('name of blade file', ['numbers' => $formattedNumbers]);

// // Blade file
// @foreach($numbers as $number)
// <td>{{ $number->nat }}</td>
// <td>{{ $number->cat }}</td>
// <td>{{ $number->dog }}</td>
// @endforeach
