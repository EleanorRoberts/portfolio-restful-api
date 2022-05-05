<?php

namespace Tests\Services;

use App\Services\FormatResponse;
use Tests\TestCase;
use TypeError;

require_once 'src/Controllers/AddWorkExperienceController.php';

class FormatResponseTest extends TestCase
{
    public function testConvertToDefaultAllSuccess(): void {
        $testMessage = 'Potato goddess';
        $testAttempt = true;
        $testData = [
            'Goddess' => 'Potato'
        ];
        $attempt = FormatResponse::convertToDefault($testMessage, $testAttempt, $testData);
        $this->assertEquals(["success" => true, "message" => 'Potato goddess', "data" => ['Goddess' => 'Potato']], $attempt);
    }

    public function testConvertToDefaultNoDataSuccess(): void {
        $testMessage = 'Nova wins the day';
        $testAttempt = false;
        $attempt = FormatResponse::convertToDefault($testMessage, $testAttempt);
        $this->assertEquals(["success" => false, "message" => 'Nova wins the day'], $attempt);
    }

    public function testConvertToDefaultMessageFailure(): void {
        $testMessage = ['Potatoes are very good I like them a lot I hope to one day have a potato farm'];
        $this->expectException(TypeError::class);
        $attempt = FormatResponse::convertToDefault($testMessage);
    }

    public function testConvertToDefaultAttemptFailure(): void {
        $testMessage = 'Potatoes are very good I like them a lot I hope to one day have a potato farm';
        $testAttempt = ['King Potato' => 0];
        $this->expectException(TypeError::class);
        $attempt = FormatResponse::convertToDefault($testMessage, $testAttempt);
    }

    public function testConvertToDefaultDataFailure(): void {
        $testMessage = 'Potatoes are very good I like them a lot I hope to one day have a potato farm';
        $testAttempt = true;
        $testData = 'Yummy sushi pjs';
        $this->expectException(TypeError::class);
        $attempt = FormatResponse::convertToDefault($testMessage, $testAttempt, $testData);
    }
}