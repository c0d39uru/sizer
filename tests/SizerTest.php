<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Sizer\IEEESizer;
use Sizer\JEDECSizer;
use Sizer\Sizer;

class SizerTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_sizer($sizer, $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB): void
    {
        $this->assertions(Sizer::createFromBits($sizer, $b), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromBytes($sizer, $B), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromKiloBits($sizer, $kb), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromKiloBytes($sizer, $KB), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromMegaBits($sizer, $mb), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromMegaBytes($sizer, $MB), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromGigaBits($sizer, $gb), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromGigaBytes($sizer, $GB), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromTeraBits($sizer, $tb), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromTeraBytes($sizer, $TB), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromPetaBits($sizer, $pb), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromPetaBytes($sizer, $PB), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromExaBits($sizer, $eb), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
        $this->assertions(Sizer::createFromExaBytes($sizer, $EB), $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB);
    }

    public function dataProvider(): array
    {
        return [
            [new IEEESizer(), 9000000000000000000, 1.125E+18, 9.0E+15, 1.125E+15, 9000000000000, 1125000000000, 9000000000, 1125000000, 9000000, 1125000, 9000, 1125, 9, 1.125],
            [new JEDECSizer(), 2767011611000000000, 3.45876451375E+17, 2702159776367187.5, 337769972045898.44, 2638827906608.5815, 329853488326.0727, 2576980377.547443, 322122547.19343036, 2516582.3999486747, 314572.79999358434, 2457.5999999498777, 307.1999999937347, 2.3999999999510524, 0.29999999999388155],
        ];
    }

    private function assertions(Sizer $sut, $b, $B, $kb, $KB, $mb, $MB, $gb, $GB, $tb, $TB, $pb, $PB, $eb, $EB): void
    {
        $this->assertEquals($sut->toBits(), $b);
        $this->assertEquals($sut->toBytes(), $B);
        $this->assertEquals($sut->toKiloBits(), $kb);
        $this->assertEquals($sut->toKiloBytes(), $KB);
        $this->assertEquals($sut->toMegaBits(), $mb);
        $this->assertEquals($sut->toMegaBytes(), $MB);
        $this->assertEquals($sut->toGigaBits(), $gb);
        $this->assertEquals($sut->toGigaBytes(), $GB);
        $this->assertEquals($sut->toTeraBits(), $tb);
        $this->assertEquals($sut->toTeraBytes(), $TB);
        $this->assertEquals($sut->toPetaBits(), $pb);
        $this->assertEquals($sut->toPetaBytes(), $PB);
        $this->assertEquals($sut->toExaBits(), $eb);
        $this->assertEquals($sut->toExaBytes(), $EB);
    }
}
