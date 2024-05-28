<?php
/**
 * Description of LIqPaySignature.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Auth;

use Dots\Data\DTO;
use Dots\LiqPay\App\Client\Auth\DTO\LiqPayAuthDTO;

class LiqPaySignature
{
    public static function generate(LiqPayAuthDTO $authDTO, DTO $dto): string
    {
        $data = $dto->toArray();
        $data = base64_encode(json_encode($data) ?: '');

        return base64_encode(sha1($authDTO->getPrivateKey().$data.$authDTO->getPrivateKey(), true));
    }
}
