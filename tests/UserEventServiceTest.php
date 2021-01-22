<?php

namespace App\Tests;

use App\Entity\UserEvent;
use App\Repository\UserEventRepository;
use App\Services\UserEventService;
use PHPUnit\Framework\TestCase;

class UserEventServiceTest extends TestCase
{
    protected $userEventRepository;
    protected $userEventService;

    protected function setUp(): void
    {
        $this->userEventRepository = $this->createMock(userEventRepository::class);
        $this->userEventService    = new UserEventService($this->userEventRepository);
    }

    public function testResponse()
    {
        $type = array();
        $this->userEventRepository->method('findBetweenDates')->willReturn($type);
        self::assertIsArray($type);
    }
    
    public function testService()
    {
        $beginDate   = date('Y-m-d', strtotime('-30 days')) . ' 00:00:00';
        $finishDate  = date('Y-m-d') . ' 23:59:59';
        $response    = $this->userEventService->userEventList($beginDate, $finishDate);
        self::assertIsArray($response);
    }
   
    public function testObjectType()
    {
        $mocks = [$this->createMock(UserEvent::class),$this->createMock(UserEvent::class),$this->createMock(UserEvent::class)];        
        $this->userEventRepository->method('findBetweenDates')->willReturn($mocks);
        foreach ($mocks as $mock) {
            self::assertInstanceOf(UserEvent::class, $mock);
        }
    }

    public function testFailedObject()
    {
        $mocks = [$this->createMock(UserEventService::class),$this->createMock(UserEventService::class),$this->createMock(UserEventService::class)];
        $this->userEventRepository->method('findBetweenDates')->willReturn($mocks);        
        foreach ($mocks as $mock) {
            self::assertNotInstanceOf(UserEvent::class, $mock);
        }
        
    }
}
