<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostTagRequest;
use App\Http\Requests\UpdatePostTagRequest;
use App\Repositories\PostTagRepository;
use Laracasts\Flash\Flash;

class PostTagController extends Controller
{
    protected $postTag;

    /**
     * PostTagController constructor.
     *
     * @param \App\Repositories\PostTagRepository $postTagRepo
     */
    public function __construct(PostTagRepository $postTagRepo){
        $this->postTag = $postTagRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $postTags = $this->postTag->paginate();

        return view('admin.post.tags.index')->with([
            'postTags' => $postTags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.post.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CreatePostTagRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostTagRequest $request)
    {
        $this->postTag->create($request->all());

        Flash::success(trans('l5starter::messages.create.success'));

        return redirect()->route('admin.post.tags.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $postTag = $this->postTag->findWithoutFail($id);

        if (empty($postTag)) {
            Flash::error(trans('l5starter::messages.404_not_found'));

            return redirect(route('admin.post.tags.index'));
        }


        return view('admin.post.tags.edit')->with([
            'postTag' => $postTag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePostTagRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostTagRequest $request, $id)
    {
        $postTag = $this->postTag->findWithoutFail($id);

        if (empty($postTag)) {
            Flash::error(trans('l5starter::messages.404_not_found'));

            return redirect(route('admin.post.tags.index'));
        }

        $this->postTag->update($request->all(), $id);

        Flash::success(trans('l5starter::messages.update.success'));

        return redirect(route('admin.post.tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postTag = $this->postTag->findWithoutFail($id);

        if (empty($postTag)) {
            Flash::error(trans('l5starter::messages.404_not_found'));

            return redirect(route('admin.post.tags.index'));
        }

        $this->postTag->delete($id);

        Flash::success(trans('l5starter::messages.delete.success'));

        return redirect(route('admin.post.tags.index'));
    }
}
