<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\category;
use App\Models\CategoryDescription;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category as CalculationCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $categories = Category::join('category_descriptions', 'categories.id', '=', 'category_descriptions.category_id')
            ->select(
                'categories.id',
                'categories.slug',
                'category_descriptions.name',
                'category_descriptions.language'
            )
            ->where('category_descriptions.language', $request->language)
            ->get();
        return  view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category([
            'slug' => $request->slug
        ]);
        $category->save();

        $items = $request->categoryDescription;
        foreach ($items as $item) {
            $categoryDescription = new CategoryDescription([
                'language' => $item['language'],
                'name' => $item['name']
            ]);
            $category->categoryDescriptions()->save($categoryDescription);
        }
        return redirect('categories')->with('status', '¡Categoría creada con éxito!');

/*         return redirect()->route('category.index');
 */    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        $categoryDescription = $category->categoryDescriptions;
        return view('categories.show', compact('category', 'categoryDescription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        $categoryDescription = $category->categoryDescriptions;

        return view('categories.edit', compact('category', 'categoryDescription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //actualizar categoria
        $category->slug = $request->slug;
        $category->save();
        //eliminar y actualizar descripcion de categoria
        $newCategoryDescription = $request->categoryDescription;
        $oldCategoryDescription = $category->categoryDescriptions;
        foreach ($oldCategoryDescription as $key => $oldItem) {
            $bandera = false;
            foreach ($newCategoryDescription as $key => $newItem) {
                # code...
                if ($oldItem['language'] == $newItem['language']) {
                    $categoryDescription = CategoryDescription::find($oldItem['id']);
                    $categoryDescription->name = $newItem['name'];
                    $categoryDescription->save();
                    $bandera = true;
                }
            }
            if ($bandera == false) {
                CategoryDescription::destroy($oldItem['id']);
            }
        }
        //agregar
        $oldCategoryDescription = $category->categoryDescriptions;
        foreach ($newCategoryDescription as $key => $newItem) {
            $bandera = false;
            foreach ($oldCategoryDescription as $key => $oldItem) {
                # code...
                if ($oldItem['language'] == $newItem['language']) {
                    $bandera = true;
                }
            }
            if ($bandera == false) {
                $categoryDescription = new CategoryDescription([
                    'language' => $newItem['language'],
                    'name' => $newItem['name']
                ]);
                $category->categoryDescriptions()->save($categoryDescription);
            }
        }
        return redirect('categories')->with('status', '¡Categoría actualizada con éxito!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->categoryDescriptions()->delete();
        return redirect('categories')->with('status', '¡Categoría eliminada con éxito!');
    }
}
