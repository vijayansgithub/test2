<?php
 
namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;

use App\Http\Controllers\Controller;
use App\Traits\CurlTraits;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Acc_year;
use Illuminate\Http\Request;
//curl curlAcc_yearController for curd operation
class curlAcc_yearController extends BaseController
{
	use CurlTraits;
	//get post type data from api server
    public function postindex()
    {
		$formParams = [
			'firstName' => $request['firstName'],
			'firstName' => $request['firstName'],
		];
		
		$headers = ['Content-Type: application/json']; //, 'Authorization: Bearer ' . Session::get('auth_user')['accessToken']];
		$result = $this->postURL('services/profile/SignUp/SignUpUser', $formParams, $headers);
        print_r($result);
		if ($result) {
            if ($result['errors']) {
                return redirect()->back()->withInput($request->input())->withErrors($result['errors']);
            }
            $result = $result['result'];
            return redirect()->back()->withSuccess($result['message']);
         
		}

        return redirect()->back()->withInput($request->input())->withErrors('Server could not be found Please try again !!');

    }
	//get get type data from api server
	public function getindex()
    {
		
		$headers = ['Content-Type: application/json']; //, 'Authorization: Bearer ' . Session::get('auth_user')['accessToken']];
		//$url = 'services/support/ServiceRequest/GetServiceClassTypes?serviceRequestType=start';
        $url='https://vijaytech.000webhostapp.com/project_samples/api/test1.php';
		
		$result = $this->getURL($url, $headers);
		echo "hh";
        print_r($result);
		if ($result) {
            if ($result['errors']) {
                return view("home");
            }
            $result = $result['result'];
            return view("home",["result"=>$result]);
         
		}
/*		
		//  Initiate curl
$ch = curl_init();
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
var_dump(json_decode($result, true));

echo file_get_contents($url);
*/
        return view('home');

    }
}

/**********************************************************/