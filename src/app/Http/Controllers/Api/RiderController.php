<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RiderRequest;
use App\Services\RiderService;

class RiderController extends Controller
{
    /**
     * @var RiderService
     */
    private $riderService;

    /**
     * RiderController constructor.
     * @param RiderService $riderService
     */
    public function __construct(RiderService $riderService)
    {
        $this->riderService = $riderService;
    }

    /**
     * Store a newly created rider in database.
     */
    public function create(RiderRequest $request)
    {
        return $this->riderService->create($request->all());
    }
}
