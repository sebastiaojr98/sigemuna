<?php
    namespace App\Support\Traits;

    trait Logo
    {
        private function createLogo()
        {
            $logo = __DIR__."/../../../public/img/logo.png";
            $logo = base64_encode(file_get_contents($logo));
            $logo = 'data:image/png;base64,' . $logo;
            return $logo;
        }

        private function createLogoCMCN()
        {
            $logo = __DIR__."/../../../public/img/logo-cmcn.png";
            $logo = base64_encode(file_get_contents($logo));
            $logo = 'data:image/png;base64,' . $logo;
            return $logo;
        }

        private function createSeal()
        {
            $seal = __DIR__."/../../../public/img/seal.png";
            $seal = base64_encode(file_get_contents($seal));
            $seal = 'data:image/png;base64,' . $seal;
            return $seal;
        }

        private function createQrCode()
        {
            $seal = __DIR__."/../../../public/img/qrcode.jpg";
            $seal = base64_encode(file_get_contents($seal));
            $seal = 'data:image/png;base64,' . $seal;
            return $seal;
        }
    }