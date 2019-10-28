<?php

use PHPUnit\Framework\TestCase;
use Ybazli\Faker\Faker;

class FakerTest extends TestCase
{

    /** @test */
    public function test_first_name_method()
    {
        $faker = new Faker();
        $firstName = $faker->firstName();
        $this->assertTrue(is_string($firstName));
        $this->assertEquals(count(explode(' ', $firstName)), 1);
    }

    /** @test */
    public function test_last_name_method()
    {
        $faker = new Faker();

        $lastName = $faker->firstName();
        $this->assertTrue(is_string($lastName));
    }

    /**
     * @Test
     *  full name most be a string
     *  when explode the fullname it most be array with 2 index
     */
    public function test_full_name_method()
    {
        $faker = new Faker;
        $fullName = $faker->fullName();
        $this->assertTrue(is_string($fullName));
        $this->assertEquals(count(explode(' ', $fullName)), 2);
    }

    /**
     * @Test
     * job title is string
     *  */
    public function test_job_title_method()
    {
        $faker = new Faker;
        $jobTitle = $faker->jobTitle();
        $this->assertTrue(is_string($jobTitle));
    }

    /** @test */
    public function test_email_method()
    {
        $faker = new Faker;
        $email = $faker->email();

        //check is string
        $this->assertTrue(is_string($email));

        //check public prefix email is exists
        $emailToArray = explode('@', $email);
        $emailsPrefix = $faker->objects['email'];
        $this->assertTrue(in_array($emailToArray[1], $emailsPrefix));
    }

    /** @test */
    public function test_word_method()
    {
        $faker = new Faker;
        $word = $faker->word();
        $this->assertTrue(is_string($word));
    }

    /** @test */
    public function test_sentence_method()
    {
        $faker = new Faker;
        $sentence = $faker->sentence();
        // check is stirng
        $this->assertTrue(is_string($sentence));

        //check the sentence more than one word
        $exlpodedString = explode(' ', $sentence);
        $this->assertGreaterThan(1, count($exlpodedString));
    }

    /** @test */
    public function test_age_method()
    {
        $faker = new Faker;
        $age = $faker->age();
        // check for integer
        $this->assertIsInt($age);
        //check is min 18 and max 50
        $this->assertTrue($age >= 18);
        $this->assertTrue($age <= 50);
        //check arguments $min $max
        $age = $faker->age(20, 22);
        $this->assertTrue($age >= 20 && $age <= 22);
    }



    /**
     * @test Address
     */
    public function test_address_method()
    {
        $faker = new Faker;
        $address = $faker->address();
        //check for string
        $this->assertIsString($address);
        //check for more than a word
        $words = explode(' ', $address);

        $this->assertTrue($words > 1);
    }


    /**
     * @test birthday
     */
    public function test_birthday_method()
    {
        // year-mouth-day
        $faker = new Faker;
        $birthday = $faker->birthday();
        //check for string
        $this->assertIsString($birthday);
        //check for sign with or without arrgument
        // dd(strpos($birthday, '.'));
        $this->assertTrue(strpos($birthday, '-') !== false);
        //check for 3 index array
        $explode = explode('-', $birthday);
        $this->assertSame(count($explode), 3);
        //check year >= 1950 && year <= 2002
        $this->assertTrue($explode[0] >= 1950 && $explode[0] <= 2002);
        //check month <= 12
        $this->assertTrue($explode[1] >= 1 && $explode[1] <= 12);
        //check day <= 30
        $this->assertTrue($explode[2] >= 1 && $explode[2] <= 30);
        //+check for create timetamps with carbon
    }


    /**
     * @test paragraph
     */
    public function test_paragraph_method()
    {
        $faker = new Faker;
        $paragraph = $faker->paragraph();
        $this->assertIsString($paragraph);
        $this->assertTrue(strlen($paragraph)  > 1);
    }


    /**
     * @test identify code
     */
    public function test_identify_method()
    {
        // assertions
        $faker = new Faker;
        $identify = $faker->identify();
        $this->assertTrue(strlen(string($identify)) == 11);
    }



    /**
     * @test mobile number
     */
    public function test_mobile_method()
    {
        $faker = new Faker;
        $mobile = $faker->mobile();
        $this->assertSame(strlen($mobile), 10);
        $this->assertIsString($mobile);
    }



    /**
     * @test city 
     */
    public function test_city_method()
    {
        $faker = new Faker;
        $city = $faker->city();
        //check for array
        $this->assertIsArray($city);
        //the array count must to be 2 city&ilce
        $this->assertSame(count($city), 2);
    }
}
