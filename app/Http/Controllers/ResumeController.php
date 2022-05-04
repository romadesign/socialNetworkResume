<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResume;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function create()
	{
		$resume = json_encode(Resume::factory()->make());
		return view('resumes.create', compact('resume'));
	}
	public function store(StoreResume $request)
	{
		$data = $request->validated();
		return response()->json($data);
		
	}
}
