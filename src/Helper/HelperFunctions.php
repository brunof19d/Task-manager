<?php


namespace App\Helper;


class HelperFunctions
{
    public function translatesUserActive(int $int): string
    {
        if ($int === 1) return 'Yes';
        return 'No';
    }
}