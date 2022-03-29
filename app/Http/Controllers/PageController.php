<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\TypeOperation;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    static $billets = [5, 10, 20, 50, 100, 200, 500];
    static $pieces = [1, 2];
    static $centimes = [1, 2, 5, 10, 20, 50];

    public function dashboard()
    {
        if (!auth()->check()) {
            return redirect('/');
        }
        $data = Operation::all()->toArray();
        $depot = Operation::where('typeoperation_id', 1)->sum('total');
        $remise = Operation::where('typeoperation_id', 2)->sum('total');
        $retrait = Operation::where('typeoperation_id', 3)->sum('total');
        $total_caisse = $depot - $retrait - $remise > 0 ? $depot - $retrait - $remise : 0.00;
        return view('pages.dashboard', [
            'data' => $data,
            'total_caisse' => $total_caisse,
        ]);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = $request->post();

            $operation = new Operation();
            $operation->typeoperation_id = $data['operation'];
            $operation->date = $data['date'];
            $operation->note = $data['note'];
            $operation->total = $data['total-billet'] + $data['total-piece'] + $data['total-centime'];
            $operation->content = json_encode(['billet' => $data['billet'], 'piece' => $data['piece'], 'centime' => $data['centime']]);
            $operation->save();
            return redirect('/dashboard');
        }

        $typeOperations = TypeOperation::all();
        return view('pages.create-edit', [
            'billets' => self::$billets,
            'pieces' => self::$pieces,
            'centimes' => self::$centimes,
            'type_operations' => $typeOperations
        ]);
    }

    public function delete(Request $request)
    {
        $result = Operation::where('id',$request->post('data_id'))->delete();
        if ($result) {
            $depot = Operation::where('typeoperation_id', 1)->sum('total');
            $remise = Operation::where('typeoperation_id', 2)->sum('total');
            $retrait = Operation::where('typeoperation_id', 3)->sum('total');
            $total_caisse = $depot - $retrait - $remise > 0 ? $depot - $retrait - $remise : '0 €';
            return response()->json([
                'total_caisse' => $total_caisse,
            ]);
        }
    }

    public function update(int $operation_id, Request $request)
    {
        $operation = Operation::where('id',$operation_id)->first();
        $typeOperations = TypeOperation::all();
        return view('pages.update', [
            'billets' => self::$billets,
            'pieces' => self::$pieces,
            'centimes' => self::$centimes,
            'operation' => $operation,
            'type_operations' => $typeOperations,
            'content' => json_decode($operation['content'])
        ]);
    }

    public function saved(int $operation_id,Request $request)
    {
        $data = $request->post();
        $operation = Operation::where('id',$operation_id)->first();
        $operation->date = $data['date'];
        $operation->note = $data['note'];
        $operation->total = $data['total-billet'] + $data['total-piece'] + $data['total-centime'];
        $operation->content = json_encode(['billet' => $data['billet'], 'piece' => $data['piece'], 'centime' => $data['centime']]);
        $operation->save();
        return redirect('/dashboard');


    }
}
