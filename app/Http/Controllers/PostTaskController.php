<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PostTaskController extends Controller
{
	public function process($author, $data){

		if(!isset($data['id'])){
			return ['error', 'No id'];
		}
		if(!isset($data['text'])){
			return ['error', 'No text'];
		}
		if($data['id'] == ''){
			return ['error', 'Empty id'];
		}
		if($data['text'] == ''){
			return ['error', 'Empty text'];
		}

		$check = User::where('hash', '=', $data['id'])->first();

		if(!isset($check->toArray())){
			return ['error', 'Child not found'];
		}
		
		$check = $check->toArray();

		unset($data['id']);
		$data['parent'] = $author;
		$data['child'] = $check['id'];
		$data['status'] = 'At the beginning';
		$data['rate'] = '0';

		$task = Task::create($data);
		if($task){
			return ['success', 'Successfully updated'];
		}

		return ['error', 'Error occurred'];

	}
    
	public function insert(Request $request){

		$validateFields = $request->validate([
			'id' => 'max:255',
			'text' => 'max:3000'
		]);

		if(!$request->has('id')){
			return redirect(route('private'))->withErrors([
				'formError' => 'Please, enter child ID'
			]);
		}
		if(!$request->has('text')){
			return redirect(route('private'))->withErrors([
				'formError' => 'Please, enter text'
			]);
		}

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
