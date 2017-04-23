<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostStatusRepository;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use L5Starter\Core\Support\DateFormatter;
use Laracasts\Flash\Flash;

class PostController extends Controller
{
    protected $postCategory;
    protected $postStatus;
    protected $post;

    /**
     * PostStatusController constructor.
     *
     * @param \App\Repositories\PostCategoryRepository $postCategoryRepo
     * @param \App\Repositories\PostStatusRepository $postStatusRepo
     * @param \App\Repositories\PostRepository $postRepo
     */
    public function __construct(PostCategoryRepository $postCategoryRepo, PostStatusRepository $postStatusRepo, PostRepository $postRepo){
        $this->postCategory = $postCategoryRepo;
        $this->postStatus = $postStatusRepo;
        $this->post = $postRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->post->paginate();

        return view('admin.posts.index')->with([
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $postCategories = $this->postCategory->pluck('name', 'id');
        $postStatuses = $this->postStatus->pluck('name', 'id');

        return view('admin.posts.create')->with([
            'postCategories' => $postCategories,
            'postStatuses' => $postStatuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CreatePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $input = $request->all();
        $dateTime = (string) DateFormatter::unformat($input['publish_date_at']) .' '.$input['publish_hour'].':'.$input['publish_minute'];
        $input['publish_date'] = Carbon::createFromFormat('Y-m-d H:i', $dateTime)->toDateTimeString();
        // Save
        $request->user()->posts()->create($input);

        Flash::success(trans('l5starter::messages.create.success'));

        return redirect()->route('admin.posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = $this->post->findWithoutFail($id);

        if (empty($post)) {
            Flash::error(trans('l5starter::messages.404_not_found'));

            return redirect(route('admin.posts.index'));
        }

        $postCategories = $this->postCategory->pluck('name', 'id');
        $postStatuses = $this->postStatus->pluck('name', 'id');

        return view('admin.posts.edit')->with([
            'postCategories' => $postCategories,
            'postStatuses' => $postStatuses,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePostRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = $this->post->findWithoutFail($id);

        if (empty($post)) {
            Flash::error(trans('l5starter::messages.404_not_found'));

            return redirect(route('admin.posts.index'));
        }

        $input = $request->all();
        $dateTime = (string) DateFormatter::unformat($input['publish_date_at']).' '.$input['publish_hour'].':'.$input['publish_minute'];
        $input['publish_date'] = Carbon::createFromFormat('Y-m-d H:i', $dateTime)->toDateTimeString();
        // Save
        $this->post->update($input, $id);

        Flash::success(trans('l5starter::messages.update.success'));

        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->post->findWithoutFail($id);

        if (empty($post)) {
            Flash::error(trans('l5starter::messages.404_not_found'));

            return redirect(route('admin.posts.index'));
        }

        $this->post->delete($id);

        Flash::success(trans('l5starter::messages.delete.success'));

        return redirect(route('admin.posts.index'));
    }
}
