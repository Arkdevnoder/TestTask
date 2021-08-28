<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class EditTaskController extends Controller
{

	public function process($author, $data){
		if(!isset($data['id'])){
			return ['error', 'No id'];
		}
		if(!isset($data['rate'])){
			return ['error', 'No rate'];
		}
		if(!isset($data['status'])){
			return ['error', 'No status'];
		}
		if(!isset($data['text'])){
			return ['error', 'No text'];
		}
		if($data['id'] == ''){
			return ['error', 'Empty id'];
		}
		if($data['rate'] == ''){
			return ['error', 'Empty rate'];
		}
		if($data['status'] == ''){
			return ['error', 'Empty status'];
		}
		if($data['text'] == ''){
			return ['error', 'Empty text'];
		}

		$check = Task::where('id', '=', $data['id'])->first();
		if(!isset($check->id)){
			return ['error', 'Task not found'];
		}
		if((int) $check->parent !== (int) $author){
			return ['error', 'No permission'];
		}
		Task::where('id', '=', $data['id'])->update($data);
		return ['success', 'Successfully updated'];
	}
    
	public function update(Request $request){

		$validateFields = $request->validate([
			'id' => 'max:255',
			'status' => 'max:3000',
			'rate' => 'max:3000',
			'text' => 'max:3000'
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
