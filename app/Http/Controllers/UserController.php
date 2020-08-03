<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function getDatatable(Request $request)
    {
        try {
            $draw           = $request->input('draw');
            $start          = $request->input('start');
            $length         = $request->input('length');
            $page           = (int)$start > 0 ? ($start / $length) + 1 : 1;
            $limit          = (int)$length > 0 ? $length : 10;
            $columnIndex    = $request->input('order')[0]['column'];
            $columnName     = $request->input('columns')[$columnIndex]['data'];
            $columnSortOrder = $request->input('order')[0]['dir'];
            $searchValue    = $request->input('search')['value'];
            $conditions     = '1 = 1';
            
            if (!empty($searchValue)) {
                $conditions .= " AND name LIKE '%" . trim($searchValue) . "%'";
                $conditions .= " OR email LIKE '%" . trim($searchValue) . "%'";
            }
            $countAll = User::count();
            $paginate = User::select('*')
                ->whereRaw($conditions)
                ->orderBy($columnName, $columnSortOrder)
                ->paginate($limit, ["*"], 'page', $page);
            $items = array();

            foreach ($paginate->items() as $idx => $row) {
                $action = null;
                $routeDetail = route("user.edit", $row['id']);
                $action .= '<a href="' . $routeDetail . '"><i class="fas fa-edit"></i></a>';
                $items[] = array(
                    "id"        => $row['id'],
                    "name"      => $row['name'],
                    "email"     => $row->email,
                    "action"    => $action,
                );
            }

            $response = array(
                "draw"              => (int)$draw,
                "recordsTotal"      => (int)$countAll,
                "recordsFiltered"   => (int)$paginate->total(),
                "data"              => $items
            );

            return response()->json($response);

        } 
        
        catch (\Exception $e) {
            Log::error($e->getMessage());
            abort(500);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        return view('users.index');
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
        //
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
