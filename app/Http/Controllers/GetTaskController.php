<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetTaskController extends Controller
{

	public static function list(){
		if(Auth::user()->role == "parent"){
			return self::parentList();
		}
		if(Auth::user()->role == "children"){
			return self::childList();
		}
	}

	public static function childList(){
		return self::childListRaw(Auth::user()->id);
	}

	public static function parentList(){
		return self::parentListRaw(Auth::user()->id);
	}

	public static function childListRaw($child){
		$list = Task::where('child', $child)->latest()->paginate(15)->toArray();
		return $list;
	}

	public static function parentListRaw($parent){
		$list = Task::where('parent', $parent)->latest()->paginate(15)->toArray();
		return $list;
	}

}
