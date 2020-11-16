<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Helper;

use Exception;

class HelperFunctions
{
    public function translatesUserActive(int $int): string
    {
        if ($int === 1) return 'Yes';
        return 'No';
    }

    public function verifyImage($nameFile, $type)
    {
        $extensionPermission = ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'];

        if (in_array($type, $extensionPermission) === FALSE) {
            throw new Exception('Extension file is invalid. Only (.png, .jpg, .jpeg, .gif)');
        }

        return $this->newNameImage($nameFile);
    }

    private function newNameImage($nameFile)
    {
        return sprintf('%s.%s', uniqid(), pathinfo($nameFile, PATHINFO_EXTENSION));
    }
}