<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdatePostCategoryRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostCategoryRequest;
use App\Repositories\PostCategoryRepository;
use Laracasts\Flash\Flash;

class PostCategoryController extends Controller
{
    protected $postCategory;

    /**
     * PostCategoryController constructor.
     *
     * @param \App\Repositories\PostCategoryRepository $postCategoryRepo
     */
    public function __construct(PostCategoryRepository $postCategoryRepo){
        $this->postCategory = $postCategoryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->postCategory->paginate();
        $parentCategories = $this->postCategory->findWhere(['parent_id' => 0])->pluck('name');

        return view('admin.post.categories.index')->with([
            'parentCategories' => $parentCategories,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $parentCategories = $this->postCategory->findWhere(['parent_id' => null])->pluck('name');

        return view('admin.post.categories.create')->with('parentCategories', $parentCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CreatePostCategoryRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostCategoryRequest $request)
    {
        $this->postCategory->create($request->all());

        Flash::success(trans('l5starter::messages.create.success'));

        return redirect()->route('admin.post.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = $this->postCategory->findWithoutFail($id);

        if (empty($category)) {
            Flash::error(trans('l5starter::messages.404_not_found'));

            return redirect(route('admin.post.categories.index'));
        }

        $parentCategories = $this->postCategory->findWhere(['parent_id' => null])->pluck('name');

        return view('admin.post.categories.edit')->with([
            'parentCategories' => $parentCategories,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePostCategoryRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostCategoryRequest $request, $id)
    {
        $category = $this->postCategory->findWithoutFail($id);

        if (empty($category)) {
            Flash::error(trans('l5starter::messages.404_not_found'));

            return redirect(route('admin.post.categories.index'));
        }

        $this->postCategory->update($request->all(), $id);

        Flash::success(trans('l5starter::messages.update.success'));

        return redirect(route('admin.post.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->postCategory->findWithoutFail($id);

        if (empty($category)) {
            Flash::error(trans('l5starter::messages.404_not_found'));

            return redirect(route('admin.post.categories.index'));
        }

        $this->postCategory->delete($id);

        Flash::success(trans('l5starter::messages.delete.success'));

        return redirect(route('admin.post.categories.index'));
    }
}
