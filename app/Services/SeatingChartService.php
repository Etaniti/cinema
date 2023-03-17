<?php

namespace App\Services;

use App\Models\SeatingChart;

class SeatingChartService
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  mixed $data
     * @return \App\Models\SeatingChart
     */
    public function store($data): SeatingChart
    {
        $data['seats'] = json_encode($data['seats']);
        return $seatingChart = SeatingChart::create($data);
    }
}
