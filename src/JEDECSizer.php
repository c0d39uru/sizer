<?php declare(strict_types = 1);

namespace Sizer;

class JEDECSizer implements Sizable
{
    public function aKilo() : int
    {
        return (1 << 10);
    }
}