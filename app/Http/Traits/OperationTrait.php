<?php

namespace App\Http\Traits;

use App\Models\Operation;

trait OperationTrait
{
    public function total_caisse()
    {
        $depot = Operation::where('typeoperation_id', 1)->sum('total');
        $remise = Operation::where('typeoperation_id', 2)->sum('total');
        $retrait = Operation::where('typeoperation_id', 3)->sum('total');
        $total_caisse = $depot - $retrait - $remise > 0 ? $depot - $retrait - $remise : 0.00;
        return $total_caisse;
    }
}
