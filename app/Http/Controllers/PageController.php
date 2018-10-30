<?php

namespace App\Http\Controllers;

use App\Repositories\PageRepository;
use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Page;

class PageController extends Controller
{
    protected $pageRep;

    public function __construct(PageRepository $page)
    {
        $this->pageRep = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->pageRep->hello();

        $pages = Page::orderBy('name')->paginate(30);

        return view('page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = Profile::orderBy('name')->get();
        
        return view('page.create', compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $page = $this->pageRep->save($request);

        if ($page['status']) {
            return redirect()->route('page.edit', ['id' => $page['id']])
                             ->with(['message' => $page['message'], 'code' => $page['code']]);
        } else {
            return redirect()->route('page.create')
                             ->with(['message' => $page['message'], 'code' => $page['code']]);
        }
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
    public function edit(Page $page)
    {
        // dd( $page, $page->profiles[0]->pivot->edit );

        $profiles = Profile::orderBy('name')->get();
        
        return view('page.edit', compact('page', 'profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $page = $this->pageRep->update($page->id, $request);

        if ($page['status']) {
            return redirect()->route('page.edit', ['id' => $page['id']])
                             ->with(['message' => $page['message'], 'code' => $page['code']]);
        } else {
            return redirect()->route('page.edit', ['id' => $page['id']])
                             ->with(['message' => $page['message'], 'code' => $page['code']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        try {
            
            $page->delete();
        
            return redirect()->route('page.index')
                            ->with(['message' => 'Página deletada com sucesso.', 'code' => 'success']);
        } catch(Exception $ex) {

            return redirect()->route('page.index')
                            ->with(['message' => 'Erro ao deletear página. Tente novamente.', 'code' => 'danger']);
        }
    }
}
