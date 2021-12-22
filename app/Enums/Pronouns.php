<?php

namespace App\Enums;

final class Pronouns
{
    protected static string $ae_aer = 'ae/aer';
    protected static string $ey_emm = 'e/em';
    protected static string $he_him = 'he/him';
    protected static string $per_per = 'per/per';
    protected static string $she_her = 'she/her';
    protected static string $ve_ver = 've/ver';
    protected static string $xe_xem = 'xe/xem';
    protected static string $ze_hir = 'ze/hir';

    /**
     * @return array<int,string>
     */
    public  static function all(): array
    {
        return [
            static::$ae_aer,
            static::$ey_emm,
            static::$he_him,
            static::$per_per,
            static::$she_her,
            static::$ve_ver,
            static::$xe_xem,
            static::$ze_hir,
        ];
    }
}

