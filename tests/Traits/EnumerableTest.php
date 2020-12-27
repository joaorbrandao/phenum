<?php

namespace Joaorbrandao\Phenum\Tests\Traits;

use PHPUnit\Framework\TestCase;
use Joaorbrandao\Phenum\Exceptions\DuplicateConstant;
use Joaorbrandao\Phenum\Exceptions\EnumValueNotFound;
use Joaorbrandao\Phenum\Exceptions\NoConstantsDefined;
use Joaorbrandao\Phenum\Tests\Fixtures\WrongEnumFixture;
use Joaorbrandao\Phenum\Tests\Fixtures\EmptyClassFixture;
use Joaorbrandao\Phenum\Tests\Fixtures\AlertMessageFixture;

class EnumerableTest extends TestCase
{
    public function test_get_all_constants_from_enum()
    {
        $all = AlertMessageFixture::all();

        $this->assertArrayHasKey('SUCCESS', $all);
        $this->assertEquals('success', $all['SUCCESS']);
        $this->assertArrayHasKey('ERROR', $all);
        $this->assertEquals('danger', $all['ERROR']);
        $this->assertArrayHasKey('WARNING', $all);
        $this->assertEquals('warning', $all['WARNING']);
        $this->assertArrayHasKey('INFO', $all);
        $this->assertEquals('info', $all['INFO']);
    }

    public function test_get_values_constants_from_enum()
    {
        $values = AlertMessageFixture::values();

        $this->assertTrue(in_array('success', $values));
        $this->assertTrue(in_array('danger', $values));
        $this->assertTrue(in_array('warning', $values));
        $this->assertTrue(in_array('info', $values));
    }

    public function test_get_values_fails_when_no_constants_are_defined()
    {
        $this->expectException(NoConstantsDefined::class);
        EmptyClassFixture::values();
    }

    public function test_get_constant_from_enum()
    {
        $name = AlertMessageFixture::get('success');

        $this->assertEquals('SUCCESS', $name);
    }

    public function test_get_fails_when_given_value_does_not_exist()
    {
        $this->expectException(EnumValueNotFound::class);

        AlertMessageFixture::get('asdfasd');
    }

    public function test_get_first_defined_constant()
    {
        $first = AlertMessageFixture::first();

        $this->assertEquals('success', $first);
    }
    
    public function test_get_first_fails_when_no_constants_are_defined()
    {
        $this->expectException(NoConstantsDefined::class);
        EmptyClassFixture::first();
    }

    public function test_get_last_defined_constant()
    {
        $last = AlertMessageFixture::last();

        $this->assertEquals('info', $last);
    }

    public function test_get_last_fails_when_no_constants_are_defined()
    {
        $this->expectException(NoConstantsDefined::class);
        EmptyClassFixture::last();
    }

    public function test_it_should_be_true_when_given_value_exists()
    {
        $this->assertTrue(AlertMessageFixture::exists('success'));
    }

    public function test_it_should_be_false_when_given_value_does_not_exist()
    {
        $this->assertFalse(AlertMessageFixture::exists('asdfasfd'));
    }

    public function test_it_should_fail_when_enum_has_two_constants_defined_with_same_value()
    {
        $this->expectException(DuplicateConstant::class);
        WrongEnumFixture::all();
    }
}
