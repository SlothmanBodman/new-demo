<?php

namespace App\Services;


class BusinessToolsService
{

    const VAT_RATE = 0.20;

    /**
     * Return the cost + vat 
     * @param float $cost
     * @return string
     */
    public function calculateCostWithVAT(float $cost): string
    {
        $vatCost = $cost * BusinessToolsService::VAT_RATE;
        $total = $vatCost + $cost;
        return number_format($total, 2);
    }
}
