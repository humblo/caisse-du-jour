<?php

namespace App\Http\Controllers;

use App\Models\TypeOperation;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //
    public function view()
    {
        $typeOperations = TypeOperation::all()->toArray();
        return view('type.view', [
            'type_operations' => $typeOperations
        ]);
    }

    public function edit(int $typeoperation_id, Request $request)
    {
        $typeOperation = TypeOperation::where('id', $typeoperation_id)->first();
        return view('type.edit', [
            'typeOperation' => $typeOperation
        ]);
    }

    public function update(int $typeoperation_id, Request $request)
    {
        $typeOperation = TypeOperation::find($typeoperation_id);
        $typeOperation->title = $request->post('operation-name');
        $typeOperation->save();
        return redirect(route('type'));
    }

    public function delete(int $typeoperation_id, Request $request)
    {
        $typeOperation = TypeOperation::find($typeoperation_id);
        $typeOperation->delete();
        return redirect(route('type'));
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $typeOperation = new TypeOperation();
            $typeOperation->title = $request->post('operation-name');
            $typeOperation->save();
            return redirect(route('type'));
        }
        return view('type.add');
    }
}
