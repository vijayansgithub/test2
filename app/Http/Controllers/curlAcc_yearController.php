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
	//get post type data from api server
    public function postindex(Request $request )
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
		$result = $this->getURL('services/profile/SignUp/SignUpUser?id=2', $headers);
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
}

/**********************************************************/