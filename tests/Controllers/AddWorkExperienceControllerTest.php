<?php

namespace Tests\Controllers;

use App\Controllers\AddWorkExperienceController;
use App\Models\WorkExperienceModel;
use Tests\TestCase;

require_once 'src/Controllers/AddWorkExperienceController.php';

class AddWorkExperienceControllerTest extends TestCase
{
    public function testConstruct()
    {
        $workExperienceModelMock = $this->createMock(WorkExperienceModel::class);
        $workExperienceModelMock->expects($this->once())
            ->method('__construct')
            ->willReturn(WorkExperienceModel::class);
        $result = new AddWorkExperienceController($workExperienceModelMock);
        $this->assertInstanceOf(AddWorkExperienceController::class, $result);
    }
}