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
    public function basicCurl($url)
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
    public function jsonCurl($url)
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

    /**
    * Multi Curl function
    * Should return array of several curls
    */
    public function multiCurl($urls)
    {
        $chs = [];

        //init curls based on the amount of urls
        foreach ($urls as $key => $url) {
            array_push($chs, curl_init());
        }

        //add the urls to the curls and set opts.
        for ($i=0; $i < count($chs) - 1; $i++) {
            curl_setopt($chs[$i], CURLOPT_URL, $urls[$i]);
            curl_setopt($chs[$i], CURLOPT_HEADER, 0);
        }

        $mCurls = curl_multi_init();

        //add handles to the multi curl handler
        for ($i=0; $i < count($chs) - 1; $i++) {
            curl_multi_add_handle($mCurls, $chs[$i]);
        }

        //Run the handlers
        do {
            $mrc = curl_multi_exec($mCurls, $active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);
        while ($active && $mrc == CURLM_OK) {
            do {
                $mrc = curl_multi_exec($mCurls, $active);
            } while ($mrc == CURLM_CALL_MULTI_PERFORM);
        }

        $responses = [];

        foreach ($chs as $channel) {
            $html = curl_multi_getcontent($channel);
            $responses[] = json_decode($html, true);
            curl_multi_remove_handle($mCurls, $channel);
        }

        //Close handlers and finnish everything
        for ($i=0; $i < count($chs) - 1; $i++) {
            curl_multi_remove_handle($mCurls, $chs[$i]);
        }
        curl_multi_close($mCurls);

        return $responses;
    }

    public function quickCurl($urls)
    {

        $resp = [];

        for ($i=0; $i < sizeof($urls); $i++) {
            array_push($resp, $this->jsonCurl($urls[$i]));
        }

        return $resp;
    }
}
