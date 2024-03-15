<?php

namespace App\Services;

use App\Models\Restaurant;
use App\Models\RiderLocation;
use App\Repositories\RiderRepository;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RiderService extends ApiBaseService
{
    /**
     * @var RiderRepository
     */
    protected $riderRepository;

    /**
     * RiderService constructor.
     * @param RiderRepository $riderRepository
     */
    public function __construct(RiderRepository $riderRepository)
    {
        $this->riderRepository = $riderRepository;
    }
    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($data)
    {
        DB::beginTransaction();
        try {
            $rider =  $this->riderRepository->create($data);
            DB::commit();
            return $this->sendSuccessResponse($rider, 'New Rider Created Successfully!', ResponseAlias::HTTP_CREATED);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->sendErrorResponse($exception->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
