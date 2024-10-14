<?php declare(strict_types=1);

use Nabeghe\Levex\Levex;

class LevexTest extends \PHPUnit\Framework\TestCase
{
    public function testCalcLevel()
    {
        $this->assertSame(0, Levex::instance()->calcLevel(0));
        $this->assertSame(0, Levex::instance()->calcLevel(99));
        $this->assertSame(1, Levex::instance()->calcLevel(100));
        $this->assertSame(1, Levex::instance()->calcLevel(101));
        $this->assertSame(1, Levex::instance()->calcLevel(299));
        $this->assertSame(2, Levex::instance()->calcLevel(300));
        $this->assertSame(2, Levex::instance()->calcLevel(301));
        $this->assertSame(3, Levex::instance()->calcLevel(900));
        $this->assertSame(4, Levex::instance()->calcLevel(2700));
        $this->assertSame(5, Levex::instance()->calcLevel(8100));
    }

    public function testCalcRequiredXpToLevel()
    {
        $this->assertSame(0, Levex::instance()->calcRequiredXpToLevel(0));
        $this->assertSame(100, Levex::instance()->calcRequiredXpToLevel(1));
        $this->assertSame(300, Levex::instance()->calcRequiredXpToLevel(2));
        $this->assertSame(900, Levex::instance()->calcRequiredXpToLevel(3));
        $this->assertSame(2700, Levex::instance()->calcRequiredXpToLevel(4));
        $this->assertSame(8100, Levex::instance()->calcRequiredXpToLevel(5));
    }

    public function testCalcRemainingXpToLevel()
    {
        $this->assertSame(0, Levex::instance()->calcRemainingXpToLevel(1, 100));
        $this->assertSame(1, Levex::instance()->calcRemainingXpToLevel(1, 99));
        $this->assertSame(0, Levex::instance()->calcRemainingXpToLevel(1, 101));
        $this->assertSame(200, Levex::instance()->calcRemainingXpToLevel(2, 100));
        $this->assertSame(600, Levex::instance()->calcRemainingXpToLevel(3, 300));
    }

    public function testCalcRemainingPercentToLevel()
    {
        $this->assertSame(50, Levex::instance()->calcRemainingPercentToLevel(1, 50));
    }

    public function testCalcPassedPercentToLevel()
    {
        $this->assertSame(50, Levex::instance()->calcPassedPercentToLevel(1, 50));
    }

    public function testCalcXpByPrice()
    {
        $this->assertSame(1, Levex::instance()->calcXpByPrice(1));
        $this->assertSame(1, Levex::instance()->calcXpByPrice(10, 10));
    }

    public function testDetermineLevelName()
    {
        $this->assertSame('Noob', Levex::instance()->determineLevelName(1));
        $this->assertSame('Beginner', Levex::instance()->determineLevelName(2));
        $this->assertSame('Novice', Levex::instance()->determineLevelName(3));
        $this->assertSame('Apprentice', Levex::instance()->determineLevelName(4));
        $this->assertSame('Adept', Levex::instance()->determineLevelName(5));
        $this->assertSame('Expert', Levex::instance()->determineLevelName(6));
        $this->assertSame('Veteran', Levex::instance()->determineLevelName(7));
        $this->assertSame('Master', Levex::instance()->determineLevelName(8));
        $this->assertSame('Grandmaster', Levex::instance()->determineLevelName(9));
        $this->assertSame('Champion', Levex::instance()->determineLevelName(10));
        $this->assertSame('Hero', Levex::instance()->determineLevelName(11));
        $this->assertSame('Legend', Levex::instance()->determineLevelName(12));
        $this->assertSame('Mythic', Levex::instance()->determineLevelName(13));
        $this->assertSame('Immortal', Levex::instance()->determineLevelName(14));
        $this->assertSame('Supreme 1', Levex::instance()->determineLevelName(15));
        $this->assertSame('Supreme 14', Levex::instance()->determineLevelName(28));
        $this->assertSame('Angle 1', Levex::instance()->determineLevelName(29));
        $this->assertSame('Angle 2', Levex::instance()->determineLevelName(30));
        $this->assertSame('Angle 3', Levex::instance()->determineLevelName(31));
        $this->assertSame('Angle 4', Levex::instance()->determineLevelName(32));
        $this->assertSame('Angle 5', Levex::instance()->determineLevelName(33));
        $this->assertSame('Creator', Levex::instance()->determineLevelName(-1));
        $this->assertSame('Undefined', Levex::instance()->determineLevelName('MeowWw'));
    }
}