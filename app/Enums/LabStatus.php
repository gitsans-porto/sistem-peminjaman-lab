<?php

namespace App\Enums;

enum LabStatus: string
{
    case Tersedia = 'tersedia';
    case Maintenance = 'maintenance';

    public function label(): string
    {
        return match ($this) {
            self::Tersedia => 'Tersedia',
            self::Maintenance => 'Maintenance',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Tersedia => 'btn-success',   
            self::Maintenance => 'btn-warning',
        };
    }

    public function toggle(): self
    {
        return match ($this) {
            self::Tersedia => self::Maintenance,   
            self::Maintenance => self::Tersedia,
        };
    }
}
