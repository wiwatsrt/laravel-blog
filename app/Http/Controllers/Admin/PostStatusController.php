<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatePostStatusRequest;
use App\Http\Requests\UpdatePostStatusRequest;
use App\Http\Controllers\Controller;
use App\Repositories\PostStatusRepository;
use Laracasts\Flash\Flash;

class PostStatusController extends Controller
{
    protected $postStatus;

    /**
     * PostStatusController constructor.
     *
     * @param \App\Repositories\PostStatusRepository $postStatusRepo
     */
    public function __construct(PostStatusRepository $postStatusRepo){
        $this->postStatus = $postStatusRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $postStatuses = $this->postStatus->paginate();

        return view('admin.post.statuses.index')->with([
            'postStatuses' => $postStatuses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.post.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CreatePostStatusRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostStatusRequest $request)
    {
        $this->postStatus->create($request->all());

        Flash::success(trans('l5starter::messages.create.success'));

        return redirect()->route('admin.post.statuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $postStatus = $this->postStatus->findWithoutFail($id);

        if (empty($postStatus)) {
            Flash::error(trans('l5starter::messages.404_not_found'));

            return redirect(route('admin.post.statuses.index'));
        }


        return view('admin.post.statuses.edit')->with([
            'postStatus' => $postStatus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePostStatusRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostStatusRequest $request, $id)
    {
        $postStatus = $this->postStatus->findWithoutFail($id);

        if (empty($postStatus)) {
            Flash::error(trans('l5starter::messages.404_not_found'));

            return redirect(route('admin.post.statuses.index'));
        }

        $this->postStatus->update($request->all(), $id);

        Flash::success(trans('l5starter::messages.update.success'));

        return redirect(route('admin.post.statuses.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postStatus = $this->postStatus->findWithoutFail($id);

        if (empty($postStatus)) {
            Flash::error(trans('l5starter::messages.404_not_found'));

            return redirect(route('admin.post.statuses.index'));
        }

        $this->postStatus->delete($id);

        Flash::success(trans('l5starter::messages.delete.success'));

        return redirect(route('admin.post.statuses.index'));
    }
}
