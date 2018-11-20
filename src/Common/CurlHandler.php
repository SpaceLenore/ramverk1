<?php

namespace Anax\Common;


/**
* A Class for sending curl requests and getting back the data.
* This class should probably be implemented from a specific interface
* for a specific website / api
*/
class CurlHandler
{
    /**
    * Basic funtction for executing a curl command.
    * @param $url string: the url to curl in its complete from
    */
    function BasicCurl ($url)
    {
        //Make sure url is set
        if (isset($url)) {
            //set url
            $cInit = curl_init($url);
            //apply options and url
            curl_setopt($cInit, CURLOPT_RETURNTRANSFER, true);
            //catch the response
            $response = curl_exec($cInit);
            //close the curl command
            curl_close($cInit);

            //return the response
            return $response;
        } else {
            // $url was not set, returning false
            return false;
        }
    }

    /**
    * Json Curl funtction for executing a curl command and returning the respose in json.
    * @param $url string: the url to curl in its complete from
    */
    function JsonCurl ($url)
    {
        //Make sure url is set
        if (isset($url) && $url != "") {
            //set url
            $cInit = curl_init($url);
            //apply options and url
            curl_setopt($cInit, CURLOPT_RETURNTRANSFER, true);
            //catch the response
            $response = curl_exec($cInit);
            //close the curl command
            curl_close($cInit);
            //parse the response to json
            $jsonResult = json_decode($response, true);

            //return the response in json format
            return $jsonResult;
        } else {
            // $url was not set, returning false
            return false;
        }
    }
}
