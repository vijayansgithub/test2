<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Session;
use Log;

trait CurlTraits {

    /**
     * Send a request to any service
     * @return string
     */
    private $PORT = '443';
    //private $URL = 'https://df-unify-dev.azurewebsites.net/api/';
//    private $STA_URL = 'https://root.jpscodev.net/api/';
    //private $URL = 'https://uapi.myjps.net/api/';

    // private $URL = 'https://uapi.jpscodev.net/api/';

    // private $URL = "env('API_URL')";

    // uapi.jpscodev.net
    public function makeRequest($method, $requestUrl, $queryParams = [], $formParams = [], $headers = [], $hasFile = false) {

        #-- Dev --
        if (!empty(Session::has('BaseUrl'))) {
            // $session_bURL = Session::get('BaseUrl');
            $session_bURL = env('API_URL');
        } else {
            // $session_bURL = 'https://uapi.myjps.net';
            $session_bURL = env('API_URL');
        }

        // $URL = $session_bURL . '/api/';
        $URL = $session_bURL;
        
        #-- End of Dev --
        $client = new Client([
            //'base_uri' => $this->URL,
            'base_uri' => $URL,
        ]);

        $bodyType = 'form_params';

        if ($hasFile) {
            $bodyType = 'multipart';
            $multipart = [];

            foreach ($formParams as $name => $contents) {
                $multipart[] = [
                    'name' => $name,
                    'contents' => $contents
                ];
            }
        }

        $response = $client->request($method, $requestUrl, [
            'query' => $queryParams,
            $bodyType => $hasFile ? $multipart : $formParams,
            'headers' => $headers,
        ]);

        $response = $response->getBody()->getContents();

        return $response;
    }

    public function putURL($url, $params = [], $headers = [], $filesize = null) {
        Log::info('start' . $url);
        
        // if (!empty(Session::has('BaseUrl'))) {
        //     $url = Session::get('BaseUrl') . $url;
        // }else{
        //     $url = $this->URL . $url;
        // }

        if (!empty(Session::has('BaseUrl'))) {
            // $url = Session::get('BaseUrl') . $url;
            $url = env('API_URL').$url;
        }else{
            // $url = $this->URL . $url;
            $url = env('API_URL').$url;
        }

        $params = json_encode($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        //curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($filesize) {
//            echo $filesize;
            curl_setopt($ch, CURLOPT_INFILESIZE, $filesize);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        //print_r($info);
        //print_r($result);
        $err = curl_error($ch);
        if ($err) {
            return $err;
        }
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
        curl_close($ch);

        $result = json_decode($result, true);
        //print_r($result);
        Log::info('end' . $url);

        return $result;
    }

    public function postDURL($url, $params = [], $headers = [], $filesize = null) {
        Log::info('start' . $url);

//        $url = $this->URL . $url;
//        $url = $URL . $url;
        // $params = json_encode($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($filesize) {
//            echo $filesize;
            curl_setopt($ch, CURLOPT_INFILESIZE, $filesize);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
//        print_r($info);
//        print_r($result);
        $err = curl_error($ch);
        if ($err) {
            return $err;
        }
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
        curl_close($ch);

        $result = json_decode($result, true);
//           print_r($result);
        Log::info('end' . $url);

        return $result;
    }

    public function postURL($url, $params = [], $headers = [], $filesize = null) {
        Log::info('start' . $url);
       
        if (!empty(Session::has('BaseUrl'))) {
            // $url = Session::get('BaseUrl') . $url;
            $url = env('API_URL').$url;
        }else{
            // $url = $this->URL . $url;
            $url = env('API_URL').$url;
        }

        $params = json_encode($params);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($filesize) {
//            echo $filesize;
            curl_setopt($ch, CURLOPT_INFILESIZE, $filesize);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
//        print_r($info);
//        print_r($result);
        $err = curl_error($ch);
        if ($err) {
            return $err;
        }
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
        curl_close($ch);

        $result = json_decode($result, true);
//           print_r($result);
        Log::info('end' . $url);
        
        return $result;
    }

    public function getURL($url, $headers = []) {
        Log::info('start' . $url);

        // if (!empty(Session::has('BaseUrl'))) {
        //     $url = Session::get('BaseUrl') . $url;
        // }else{
        //     $url = $this->URL . $url;
        // }
        if (!empty(Session::has('BaseUrl'))) {
            // $url = Session::get('BaseUrl') . $url;
            $url = env('API_URL').$url;
        }else{
            // $url = $this->URL . $url;
            $url = env('API_URL').$url;
        }
//        $url = $URL . $url;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
//        print_r($info);
//        print_r($result);
        $err = curl_error($ch);
        if ($err) {
            return $err;
        }
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
        $result = json_decode($result, true);
        Log::info('end' . $url);

        return $result;
    }

    public function fileUploads($url, $params = [], $headers = [], $filesize = null) {
        Log::info('start' . $url);

        $curl = curl_init();

        // if (!empty(Session::has('BaseUrl'))) {
        //     $url = Session::get('BaseUrl') . $url;
        // }else{
        //     $url = $this->URL . $url;
        // }
        if (!empty(Session::has('BaseUrl'))) {
            // $url = Session::get('BaseUrl') . $url;
            $url = env('API_URL').$url;
        }else{
            // $url = $this->URL . $url;
            $url = env('API_URL').$url;
        }
//        $url = $URL . $url;
        curl_setopt_array($curl, array(
            // CURLOPT_URL => "https://df-unify-dev.azurewebsites.net//api/AttachmentsApi/Upload",
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            // CURLOPT_POSTFIELDS => array('ItemType' => 'New Service','ItemId' => 'c0c6d2d2-96b6-4e1d-bd95-724522792ee4','AttachmentType' => 'jpg','Upload'=> new CURLFILE('/C:/Users/Lenovo/Pictures/Saved Pictures/126-kb.jpg')),
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_HTTPHEADER => array($headers[1]),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response, true);
        // print_r($result);
        Log::info('end' . $url);

        return $result;
    }

}
