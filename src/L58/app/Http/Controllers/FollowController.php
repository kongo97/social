<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $follow = Follow::where('id_follower', 'LIKE', "%$keyword%")
                ->orWhere('id_followed', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $follow = Follow::latest()->paginate($perPage);
        }

        return view('follow.index', compact('follow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('follow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'id_follower' => 'required',
			'id_followed' => 'required'
		]);
        $requestData = $request->all();
        
        Follow::create($requestData);

        return redirect('follow')->with('flash_message', 'Follow added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $follow = Follow::findOrFail($id);

        return view('follow.show', compact('follow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $follow = Follow::findOrFail($id);

        return view('follow.edit', compact('follow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'id_follower' => 'required',
			'id_followed' => 'required'
		]);
        $requestData = $request->all();
        
        $follow = Follow::findOrFail($id);
        $follow->update($requestData);

        return redirect('follow')->with('flash_message', 'Follow updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Follow::destroy($id);

        return redirect('follow')->with('flash_message', 'Follow deleted!');
    }
}
