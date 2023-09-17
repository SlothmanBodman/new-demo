<?php

namespace App\Services;


class BusinessToolsService
{

    const VAT_RATE = 0.20;

    public function calculateCostWithVAT(float $cost): float
    {
        $vatCost = $cost * BusinessToolsService::VAT_RATE;
        $total = $vatCost + $cost;
        return number_format($total, 2);
    }
}
