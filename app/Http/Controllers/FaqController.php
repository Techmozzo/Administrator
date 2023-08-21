<?php

namespace App\Http\Controllers;

use App\Http\Requests\FAQRequest;
use App\Models\Faq;

class FaqController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::latest()->paginate(10);
        return view('faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQRequest $request)
    {
        FAQ::create($request->all());
        return response()->json(['success' => true, 'message' => 'FAQ Created Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(FAQRequest $request, Faq $faq)
    {
        $faq->update($request->all());
        return response()->json(['success' => true, 'message' => 'FAQ Updated Successfully.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return response()->json(['success' => true, 'message' => 'FAQ Deleted Successfully.']);
    }

    public function adminIndex(){
        $faqs = Faq::latest()->paginate(5);
        return view('faqs.admin_index', compact('faqs'));
    }
}
