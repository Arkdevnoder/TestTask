<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RemoveTaskController extends Controller
{

	public function process($author, $data){
		if(!isset($data['id'])){
			return ['error', 'No id'];
		}
		if($data['id'] == ''){
			return ['error', 'Empty id'];
		}
		$check = Task::where('id', '=', $data['id'])->first();
		if(!isset($check->id)){
			return ['error', 'Task not found'];
		}
		if((int) $check->parent !== (int) $author){
			return ['error', 'No permission'];
		}
		Task::where('id', '=', $data['id'])->delete();
		return ['success', 'Successfully removed'];
	}

	public function remove(Request $request){
		$validateFields = $request->validate([
			'id' => 'max:255'
		]);

		$check = $this->process(Auth::user()->id, $validateFields);
		if($check[0] == "success"){
			return redirect()->to(route('private'))->with('message', $check[1]);
		}
		if($check[0] == "error"){
			return redirect(route('private'))->withErrors([
				'formError' => $check[1]
			]);
		}
	}

}
