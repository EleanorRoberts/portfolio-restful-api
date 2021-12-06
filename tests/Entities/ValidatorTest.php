<?php

namespace Tests\Entities;

use App\Entities\Validator;
use Tests\TestCase;
use TypeError;

require_once 'src/Controllers/AddWorkExperienceController.php';

class ValidatorTest extends TestCase
{
    // Add AboutMe tests
    public function testValidateAddAboutMeSuccess(): void {
        $testData = [
            'name' => 'Potato',
            'description' => 'Potatoes are very good I like them a lot I hope to one day have a potato farm'
            ];
        $attempt = Validator::validateAddAboutMe($testData);
        $this->assertEquals(true, $attempt);
    }

    public function testValidateAddAboutMeFailure(): void {
        $testData = 'Potatoes are very good I like them a lot I hope to one day have a potato farm';
        $this->expectException(TypeError::class);
        $attempt = Validator::validateAddAboutMe($testData);
    }

//    public function testValidateAddAboutMeMalformed(): void {
//        $testData = [
//            'yoyo' => 'The kids are back in town',
//            3030 => ['Hakuna matatat']
//        ];
//        $this->expectException(TypeError::class);
//        $this->assertStatus(422);
//        $attempt = Validator::validateAddAboutMe($testData);
//    }

    // Edit AboutMe tests
//    public function testValidateEditAboutMeShortStringSuccess(): void {
//        $testData = [
//            'field' => 'name',
//            'newValue' => 'Potato'
//        ];
//        $attempt = Validator::validateAddAboutMe($testData);
//        $this->assertEquals(true, $attempt);
//    }
//
//
//    public function testValidateEditAboutMeLongStringSuccess(): void {
//        $testData = [
//            'field' => 'description',
//            'newValue' => 'Potatoes are very good I like them a lot I hope to one day have a potato farm'
//        ];
//        $attempt = Validator::validateAddAboutMe($testData);
//        $this->assertEquals(true, $attempt);
//    }

    public function testValidateEditAboutMeFailure(): void {
        $testData = 'Potatoes are very good I like them a lot I hope to one day have a potato farm';
        $this->expectException(TypeError::class);
        $attempt = Validator::validateAddAboutMe($testData);
    }

    // Add Education tests
    public function testValidateAddEducationAllFieldsSuccess(): void {
        $testData = [
            'level' => 'Potato',
            'institution' => 'The Potato Farm',
            'grade' => 'A*',
            'startDate' => '2020-12-12',
            'endDate' => '2021-12-12'
        ];
        $attempt = Validator::validateAddEducation($testData);
        $this->assertEquals(true, $attempt);
    }

    public function testValidateAddEducationLeastFieldsSuccess(): void {
        $testData = [
            'level' => 'Potato',
            'institution' => 'The Potato Farm'
        ];
        $attempt = Validator::validateAddEducation($testData);
        $this->assertEquals(true, $attempt);
    }

    public function testValidateAddEducationFailure(): void {
        $testData = 'Potatoes are very good I like them a lot I hope to one day have a potato farm';
        $this->expectException(TypeError::class);
        $attempt = Validator::validateAddAboutMe($testData);
    }

    // Add Hobby tests
    public function testValidateAddHobbySuccess(): void {
        $testData = [
            'name' => 'Potato'
        ];
        $attempt = Validator::validateAddHobby($testData);
        $this->assertEquals(true, $attempt);
    }

    public function testValidateAddHobbyFailure(): void {
        $testData = 'Potatoes are very good I like them a lot I hope to one day have a potato farm';
        $this->expectException(TypeError::class);
        $attempt = Validator::validateAddAboutMe($testData);
    }

    //Add OtherCertification test
    public function testValidateAddOtherCertificationAllFieldsSuccess(): void {
        $testData = [
            'name' => 'Potato',
            'certifier' => 'The Potato Farm',
            'achievedDate' => '2020-12-12'
        ];
        $attempt = Validator::validateAddOtherCertification($testData);
        $this->assertEquals(true, $attempt);
    }

    public function testValidateAddOtherCertificationLeastFieldsSuccess(): void {
        $testData = [
            'name' => 'Potato',
            'certifier' => 'The Potato Farm'
        ];
        $attempt = Validator::validateAddOtherCertification($testData);
        $this->assertEquals(true, $attempt);
    }

    public function testValidateAddOtherCertificationFailure(): void {
        $testData = 'Potatoes are very good I like them a lot I hope to one day have a potato farm';
        $this->expectException(TypeError::class);
        $attempt = Validator::validateAddAboutMe($testData);
    }

    // Add Project tests
    public function testValidateAddProjectAllFieldsSuccess(): void {
        $testData = [
            'name' => 'Potato',
            'about' => 'I love potatoes they are a wonderful vegetable and they taste so good is so many varied ways',
            'githubLink' => 'wwww.github.co.uk/Nova-is-the-bestest?yes-she-is',
            'liveVersion' => 'wwww.github.co.uk/Nova-is-the-bestest?yes-she-is'
            ];
        $attempt = Validator::validateAddProject($testData);
        $this->assertEquals(true, $attempt);
    }

    public function testValidateAddProjectLeastFieldsSuccess(): void {
        $testData = [
            'name' => 'Potato',
            'about' => 'I love potatoes they are a wonderful vegetable and they taste so good is so many varied ways',
        ];
        $attempt = Validator::validateAddProject($testData);
        $this->assertEquals(true, $attempt);
    }

    public function testValidateAddProjectFailure(): void {
        $testData = 'Potatoes are very good I like them a lot I hope to one day have a potato farm';
        $this->expectException(TypeError::class);
        $attempt = Validator::validateAddAboutMe($testData);
    }

    // Add WorkExperience tests
    public function testValidateAddWorkExperienceAllFieldsSuccess(): void {
        $testData = [
            'company' => 'Potato Inc',
            'position' => 'Potato Farmer',
            'startDate' => '2020-01-01',
            'leaveDate' => '2022-12-22',
            'about' => 'Potatoes are very good I like them a lot I hope to one day have a potato farm'
        ];
        $attempt = Validator::validateAddWorkExperience($testData);
        $this->assertEquals(true, $attempt);
    }

    public function testValidateAddWorkExperienceLeastFieldsSuccess(): void {
        $testData = [
            'company' => 'Potato Inc',
            'position' => 'A Potato Farmer'
        ];
        $attempt = Validator::validateAddWorkExperience($testData);
        $this->assertEquals(true, $attempt);
    }

    public function testValidateAddWorkExperienceFailure(): void {
        $testData = 'Potatoes are very good I like them a lot I hope to one day have a potato farm';
        $this->expectException(TypeError::class);
        $attempt = Validator::validateAddAboutMe($testData);
    }
}