<?php declare(strict_types = 1);

namespace Sizer;

final class Sizer
{
    private const POWER_OF_KILO_IN_A_MEGA = 2;
    private const POWER_OF_KILO_IN_A_GIGA = 3;
    private const POWER_OF_KILO_IN_A_TERA = 4;
    private const POWER_OF_KILO_IN_A_PETA = 5;
    private const POWER_OF_KILO_IN_A_EXA = 6;

    public const BITS_PER_BYTE = 8;

    /**
     * @var int
     */
    private $bits;
    /**
     * @var Sizable
     */
    private $sizer;

    public static function createFromBits(Sizable $sizer, int $bits): self
    {
        return new static($sizer, $bits);
    }

    public static function createFromBytes(Sizable $sizer, float $bytes): self
    {
        return new static($sizer, (int)$bytes * self::BITS_PER_BYTE);
    }

    public static function createFromKiloBits(Sizable $sizer, float $kiloBits): self
    {
        return new static($sizer, (int)self::kilo($kiloBits, $sizer->aKilo()));
    }

    public static function createFromKiloBytes(Sizable $sizer, float $kiloBytes): self
    {
        return new static($sizer, (int)self::kilo($kiloBytes, $sizer->aKilo()) * self::BITS_PER_BYTE);
    }

    public static function createFromMegaBits(Sizable $sizer, float $megaBits): self
    {
        return new static($sizer, (int)self::mega($megaBits, $sizer->aKilo()));
    }

    public static function createFromMegaBytes(Sizable $sizer, float $megaBytes): self
    {
        return new static($sizer, (int)self::mega($megaBytes, $sizer->aKilo()) * self::BITS_PER_BYTE);
    }

    public static function createFromGigaBits(Sizable $sizer, float $gigaBits): self
    {
        return new static($sizer, (int)self::giga($gigaBits, $sizer->aKilo()));
    }

    public static function createFromGigaBytes(Sizable $sizer, float $gigaBytes): self
    {
        return new static($sizer, (int)self::giga($gigaBytes, $sizer->aKilo()) * self::BITS_PER_BYTE);
    }

    public static function createFromTeraBits(Sizable $sizer, float $teraBits): self
    {
        return new static($sizer, (int)self::tera($teraBits, $sizer->aKilo()));
    }

    public static function createFromTeraBytes(Sizable $sizer, float $teraBytes): self
    {
        return new static($sizer, (int)self::tera($teraBytes, $sizer->aKilo()) * self::BITS_PER_BYTE);
    }

    public static function createFromPetaBits(Sizable $sizer, float $petaBits): self
    {
        return new static($sizer, (int)self::peta($petaBits, $sizer->aKilo()));
    }

    public static function createFromPetaBytes(Sizable $sizer, float $petaBytes): self
    {
        return new static($sizer, (int)self::peta($petaBytes, $sizer->aKilo()) * self::BITS_PER_BYTE);
    }

    public static function createFromExaBits(Sizable $sizer, float $exaBits): self
    {
        return new static($sizer, (int)self::exa($exaBits, $sizer->aKilo()));
    }

    public static function createFromExaBytes(Sizable $sizer, float $exaBytes): self
    {
        return new static($sizer, (int)self::exa($exaBytes, $sizer->aKilo()) * self::BITS_PER_BYTE);
    }

    public function toBits(): int
    {
        return $this->bits;
    }

    public function toBytes(): float
    {
        return $this->toBits() / self::BITS_PER_BYTE;
    }

    public function toKiloBits(): float
    {
        return $this->toBits() / self::kilo(1, $this->sizer->aKilo());
    }

    public function toKiloBytes(): float
    {
        return $this->toKiloBits() / self::BITS_PER_BYTE;
    }

    public function toMegaBits(): float
    {
        return $this->toBits() / self::mega(1, $this->sizer->aKilo());
    }

    public function toMegaBytes(): float
    {
        return $this->toMegaBits() / self::BITS_PER_BYTE;
    }

    public function toGigaBits(): float
    {
        return $this->toBits() / self::giga(1, $this->sizer->aKilo());
    }

    public function toGigaBytes(): float
    {
        return $this->toGigaBits() / self::BITS_PER_BYTE;
    }

    public function toTeraBits(): float
    {
        return $this->toBits() / self::tera(1, $this->sizer->aKilo());
    }

    public function toTeraBytes(): float
    {
        return $this->toTeraBits() / self::BITS_PER_BYTE;
    }

    public function toPetaBits(): float
    {
        return $this->toBits() / self::peta(1, $this->sizer->aKilo());
    }

    public function toPetaBytes(): float
    {
        return $this->toPetaBits() / self::BITS_PER_BYTE;
    }

    public function toExaBits(): float
    {
        return $this->toBits() / self::exa(1, $this->sizer->aKilo());
    }

    public function toExaBytes(): float
    {
        return $this->toExaBits() / self::BITS_PER_BYTE;
    }

    private function __construct(Sizable $sizer, int $bits)
    {
        $this->bits = $bits;
        $this->sizer = $sizer;
    }

    private static function kilo(float $quantity, int $kilo): float
    {
        return $quantity * $kilo;
    }

    private static function mega(float $quantity, int $kilo): float
    {
        return $quantity * $kilo ** self::POWER_OF_KILO_IN_A_MEGA;
    }

    private static function giga(float $quantity, int $kilo): float
    {
        return $quantity * $kilo ** self::POWER_OF_KILO_IN_A_GIGA;
    }

    private static function tera(float $quantity, int $kilo): float
    {
        return $quantity * $kilo ** self::POWER_OF_KILO_IN_A_TERA;
    }

    private static function peta(float $quantity, int $kilo): float
    {
        return $quantity * $kilo ** self::POWER_OF_KILO_IN_A_PETA;
    }

    private static function exa(float $quantity, int $kilo): float
    {
        return $quantity * $kilo ** self::POWER_OF_KILO_IN_A_EXA;
    }
}