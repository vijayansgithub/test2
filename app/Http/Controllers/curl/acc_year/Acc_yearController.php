<?php
//namespaces
namespace App\Http\Controllers\curl\acc_year;

//use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller as BaseController;

use App\Traits\CurlTraits;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Acc_year;
use Illuminate\Http\Request;

//curl Acc_yearController for curd operation
class Acc_yearController extends BaseController
{
	use CurlTraits;
	//read all data
    public function index()
    {
		
		//$url="services/support/ServiceRequest/api/acc_year.php";
		$url="https://vijaytech.000webhostapp.com/project_samples/api/curlresponse.php?action=list";

		$headers = ['Content-Type: application/json']; //, 'Authorization: Bearer ' . Session::get('auth_user')['accessToken']];
		$result = $this->getURL($url, $headers);
	    $datas=[];
		
		if ($result) {
            if ($result['errors']) {
				return view("curl.acc_year.index",["datas"=>$datas]);
			}
			$datas = $result['result']['message'];
		}
		
		return view("curl.acc_year.index",["datas"=>$datas["test"],"sno"=>1]);
    }
	
    //show single record
    public function show($id)
    {
		//$url="services/support/ServiceRequest/api/acc_year.php?id='$id'&action='edit'";
		$url="https://vijaytech.000webhostapp.com/project_samples/api/curlresponse.php?id=$id&action=edit";

		$headers = ['Content-Type: application/json']; //, 'Authorization: Bearer ' . Session::get('auth_user')['accessToken']];
		$result = $this->getURL($url, $headers);
	    $datas=[];
		
		if ($result) {
            if ($result['errors']) {
				return view("curl.acc_year.show",["datas"=>$datas]);
			}
			$datas = $result['result'];
		}
		
		return view("curl.acc_year.show",["datas"=>$datas]);
    }
	
    //insert new data
    public function store(Request $request)
    {
		//validate user input
		$request->validate=([
			"department"=>"required",
			"year"=>"required",
			]);
		
		$formParams = [
			'department' => $request['department'],
			'year' => $request['year'],
			'action'=>'insert',
		];
		
		//$url="services/support/ServiceRequest/api/acc_year.php";
		$url="https://vijaytech.000webhostapp.com/project_samples/api/acc_year.php";

		$headers = ['Content-Type: application/json']; //, 'Authorization: Bearer ' . Session::get('auth_user')['accessToken']];
		$result = $this->postURL($url,$formParams,$headers);
	    $datas=[];
		
		if ($result) {
            if ($result['errors']) {
				return route()->redirect("/acc_year")->with("failed","Acc Year Inserted Failed");
			}
		}
		
		return route()->redirect("/acc_year")->with("success","Acc Year Inserted Successfully");
    }
	
	//redirect to edit page
    public function edit($id)
    {
	
		//$url="services/support/ServiceRequest/api/acc_year.php?id='$id'";
		$url="https://vijaytech.000webhostapp.com/project_samples/api/curlresponse.php?id=$id&action=edit";

		$headers = ['Content-Type: application/json']; //, 'Authorization: Bearer ' . Session::get('auth_user')['accessToken']];
		$result = $this->getURL($url,$headers);
	    $datas=[];
		
		if ($result) {
            if ($result['errors']) {
				return view("curl.acc_year.edit",["datas"=>$datas]);
			}
		}
		
		return view("curl.acc_year.edit",["datas"=>$datas]);
    }
	
    //update existing data
    public function update(Request $request, $id)
    {
		//validate user input
		$request->validate=([
			"department"=>"required",
			"year"=>"required",
			]);
		
		$formParams = [
			'department' => $request['department'],
			'year' => $request['year'],
			'id' => $request['id'],
			'action'=>'update',
		];
		
		$url="services/support/ServiceRequest/api/acc_year.php";
		//$url="https://vijaytech.000webhostapp.com/project_samples/api/acc_year.php";

		$headers = ['Content-Type: application/json']; //, 'Authorization: Bearer ' . Session::get('auth_user')['accessToken']];
		$result = $this->postURL($url,$formParams,$headers);
	    $datas=[];
		
		if ($result) {
            if ($result['errors']) {
				return route()->redirect("/acc_year")->with("failed","Acc Year Updated Failed");
			}
		}
		
		return route()->redirect("/acc_year")->with("success","Acc Year Updated Successfully");
    }
	
    //delete a record
    public function destroy($id)
    {
		$formParams = [
			'id' => $id,
			'action'=>'update',
		];
		
		$url="services/support/ServiceRequest/api/acc_year.php";
		//$url="https://vijaytech.000webhostapp.com/project_samples/api/acc_year.php";

		$headers = ['Content-Type: application/json']; //, 'Authorization: Bearer ' . Session::get('auth_user')['accessToken']];
		$result = $this->postURL($url,$formParams,$headers);
	    $datas=[];
		
		if ($result) {
            if ($result['errors']) {
				return route()->redirect("/acc_year")->with("failed","Acc Year Deleted Failed");
			}
		}
		
		return route()->redirect("/acc_year")->with("success","Acc Year Deleted Failed");
    }
}

/**********************************************************/