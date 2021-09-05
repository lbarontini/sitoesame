<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqsCategory;
use Illuminate\Http\Request;
use App\Http\Requests\FaqRequest;
use App\Http\Requests\FaqsCategoryRequest;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('faqs.index',['faqs_categories'=>FaqsCategory::All()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin_work');
        return view('faqs.create',['faqs_categories'=>FaqsCategory::All()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $this->authorize('admin_work');
        $faq = new Faq;
        $faq->fill($request->validated());
        $faq->faqs_category()->associate($request->validated()['faqs_category']);
        $faq->save();

        return response()->json(['redirect' => route('faqs.index')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $this->authorize('admin_work');
        return view('faqs.edit',['faq'=>$faq,'faqs_categories'=>FaqsCategory::All()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        $this->authorize('admin_work');

        $faq->update($request->validated());
        $faq->faqs_category()->dissociate();
        $faq->faqs_category()->associate($request->validated()['faqs_category']);
        $faq->save();

        return response()->json(['redirect' => route('faqs.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $this->authorize('staff_work');
        $faq->delete();
        return response()->json(['redirect' => route('faqs.index')]);
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCategory()
    {
        $this->authorize('admin_work');
        return view('faqs.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategory(FaqsCategoryRequest $request)
    {
        $this->authorize('admin_work');
        $faqsCategory = new FaqsCategory;
        $faqsCategory->fill($request->validated());
        $faqsCategory->save();

        return response()->json(['redirect' => route('faqs.index')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FaqsCategory  $faqsCategory
     * @return \Illuminate\Http\Response
     */
    public function editCategory(FaqsCategory $faqsCategory)
    {
        $this->authorize('admin_work');
        return view('faqs.edit_category',['faqs_category'=>$faqsCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FaqsCategory  $faqsCategory
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(FaqsCategoryRequest $request, FaqsCategory $faqsCategory)
    {
        $this->authorize('admin_work');

        $faqsCategory->update($request->validated());
        $faqsCategory->save();

        return response()->json(['redirect' => route('faqs.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FaqsCategory  $faqsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroyCategory(FaqsCategory $faqsCategory)
    {
        $this->authorize('staff_work');
        $faqsCategory->delete();
        return response()->json(['redirect' => route('faqs.index')]);
    }
}
