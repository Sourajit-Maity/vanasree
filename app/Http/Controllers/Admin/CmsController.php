<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\Pages;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cms = Pages::findOrFail($id);
        if (!empty($cms)) {
            //dd($cms);
            if ($cms->slug == 'home_page') {
                //dd($cms);
                $details = Pages::with(['home'])->findOrFail($id);
                //dd($details);
                return view('admin.cms.home-page-edit', compact('details'));
            }
            // if ($cms->slug == 'faq_page') {
            //     $details = Pages::with(['faq'])->findOrFail($id);
            //     return view('admin.cms.faq-page-edit', compact('details'));
            // }
            if ($cms->slug == 'about_page') {
                $details = Pages::with(['about'])->findOrFail($id);
                return view('admin.cms.about-page-edit', compact('details'));
            }
            if ($cms->slug == 'contact_page') {
                $details = Pages::with(['contact'])->findOrFail($id);
                return view('admin.cms.contact-us-page-edit', compact('details'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
