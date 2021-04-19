<?php
 
namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Acc_year;
use Illuminate\Http\Request;
class Acc_yearController extends BaseController
{
    public function index()
    {
		$datas = auth()->user();
		return $this->sendResponse("Success",$datas);
    }
 
    public function show($id)
    {
		$datas = auth()->user()->Acc_year()->find($id);
		
		if (!$datas) {
		return $this->sendError("Data Not found on ".$id);
		}
		
		return $this->sendResponse("Success",$datas->toArray());
    }
 
    public function store(Request $request)
    {
		$request->validate=([
			"department"=>"required",
			"year"=>"required",
		]);
		
		$datas = new Acc_year();
		$datas->department = $request->department;
		$datas->year = $request->year;
		
		if (auth()->user()->Acc_year()->save($datas))
		return $this->sendResponse("Success",$datas->toArray());
		else
		return $this->sendError("Data Creation Failed");
    }
 
    public function update(Request $request, $id)
    {
		$request->validate=([
			"department"=>"required",
			"year"=>"required",
		]);
		
		$datas = auth()->user()->Acc_year()->find($id);
		
		if (!$datas) {
		return $this->sendError("Data with id  not found");
		}
		
		$updated = $Acc_year->fill($request->all())->save();
		
		if ($updated)
		return $this->sendResponse("Success");
		else
		return $this->sendError("Data could not be updated");
    }
 
    public function destroy($id)
    {
		$datas = auth()->user()->Acc_year()->find($id);
		
		if (!$datas) {
		return $this->sendError("Data with id  not found");
		}
		
		if ($product->delete())
		return $this->sendResponse("Success");
		else
		return $this->sendError("Product could not be deleted");
    }
}

/**********************************************************/