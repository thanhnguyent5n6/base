<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function loadDataItems(Request $request)
    {
        $data_items = User::all();

        $results = $this->transformDataLoad($data_items);
        return response()->json($results);
    }

    private function transformDataLoad($data_items)
    {
        $results = $data_items->each(function($item, $key) {
            $data = array();
            $data[$key]['id'] = $item->id;
            $data[$key]['name'] = $item->name;
            $data[$key]['email'] = $item->email;
            $data[$key]['created_at'] = $item->created_at->format('d/m/Y');
            return $data;
        });
        return $results;
    }

    public function store(Request $request)
    {
        $parameters = $request->all();
        $parameters['password'] = Hash::make($parameters['password']);
        $user = new User();
        $result = $user->create($parameters);
        return $result;
    }

    public function edit(Request $request)
    {
        $id = $request->id ?? 0;
        $data_item = User::find($id);

        return response()->json($data_item);
    }

    public function update(Request $request)
    {
        $id = $request->id ?? 0;
        $data_item = User::find($id);

        $data_item->name = $request->name ?? '';
        $data_item->email = $request->email ?? '';
        $data_item->password = isset($request->name) ? Hash::make($request->name) : '';
        $data_item->save();
        return $data_item;
    }

    public function delete(Request $request)
    {
        $id = $request->id ?? 0;
        $data_item = User::find($id);
        $data_item->delete();

        $data_items = User::all();

        $results = $this->transformDataLoad($data_items);
        return response()->json($results);
    }
}
