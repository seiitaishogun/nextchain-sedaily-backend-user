<?php

namespace Service;

use Illuminate\Support\Facades\Crypt;

class CryptService
{
    public function paymentHash($date, int $price): string
    {
        $merchantKey = config('services.nicepay.merchantKey');
        $mid = config('services.nicepay.mid');

        return bin2hex(hash('sha256', $date.$mid.$price.$merchantKey, true));
    }

    public function callbackHash($authToken, $price, $date): string
    {
        $merchantKey = config('services.nicepay.merchantKey');
        $mid = config('services.nicepay.mid');

        return bin2hex(hash('sha256', $authToken.$mid.$price.$date.$merchantKey, true));
    }

    public function decryptPurchaseHash($purchaseHash): array
    {
        $decryptHash = Crypt::decryptString($purchaseHash);

        // $decrypt[0] = name, $decrypt[1] = phone, $decrypt[2] = password
        return explode('|', $decryptHash);
    }
}
