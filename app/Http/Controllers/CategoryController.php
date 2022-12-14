<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Components\Recursive;
use App\Http\Requests\CategoryCreateRequest;
use Illuminate\Support\Str;



class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category) {
        $this->htmlSelect= ' ';
        $this->category= $category;
    }

    public function create() {
        $htmlOption = $this->getCategory($parentId = ' ');
        return view('admin.category.create', compact('htmlOption'));
    }

    public function index() {
        $categories = $this->category->latest()->paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function store(CategoryCreateRequest $request) {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('categories.index');
    }

    public function getCategory($parentId) {
        $data = $this->category->all;
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function edit($id) {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);

        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update($id, CategoryCreateRequest $request) {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('categories.index');
    }

    public function delete($id) {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }

}
