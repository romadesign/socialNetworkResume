<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResume;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ResumeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function create()
	{
		// $resume = json_encode(Resume::factory()->make());
		// return view('resumes.create', compact('resume'));
		return view('resumes.create');
	}

	private function savePicture($blob)
	{
		$img = Image::make($blob);
		$fileName = Str::uuid() . '.' . explode('/', $img->mime())[1];
		$filePath = "/pictures/$fileName";
		$img->save(public_path($filePath));
		return $filePath;
	}

	public function store(StoreResume $request)
	{
		$data = $request->validated();
		$picture = $data['content']['basics']['picture'];
		if ($picture !== '/pictures/default.png') {
			$uri = $this->savePicture($picture);
			$data['content']['basics']['picture'] = $uri;
		}
		$resume = auth()->user()->resumes()->create($data);

		return response($resume, Response::HTTP_CREATED);
	}

	public function edit(Resume $resume)
	{
		$this->authorize('update', $resume);
		return view('resumes.edit', ['resume' => json_encode($resume)]);
	}

	public function update(StoreResume $request, Resume $resume)
	{
		$this->authorize('update', $resume);

		$data = $request->validated();
		$picture = $data['content']['basics']['picture'];
		if ($picture !== $resume->content['basics']['picture']) {
			$uri = $this->savePicture($picture);
			$data['content']['basics']['picture'] = $uri;
		}
		$resume->update($data);
		return response('', Response::HTTP_CREATED);
	}
}