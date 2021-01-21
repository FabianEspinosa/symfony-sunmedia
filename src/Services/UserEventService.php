<?php

namespace App\Services;

use App\Repository\UserEventRepository;

class UserEventService
{
    protected $userEventRepository;

    public function __construct(UserEventRepository $userEventRepository)
    {
        $this->userEventRepository = $userEventRepository;
    }

    /**
     * @return UserEvents[]
     */
    public function userEventList($beginDate, $finishDate)
    {
       return $this->userEventRepository->findBetweenDates($beginDate, $finishDate);
    }
}
