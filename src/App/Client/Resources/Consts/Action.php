<?php
/**
 * Description of Action.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Resources\Consts;

enum Action: string
{
    case PAY = 'pay';
    case STATUS = 'status';
    case HOLD = 'hold';

    case HOLD_COMPLETION = 'hold_completion';

    case REFUND = 'refund';
    case AUTH = 'auth';
    case REGULAR = 'regular';
    case PAYSPLIT = 'paysplit';
    case SUBSCRIBE = 'subscribe';
    case PAYDONATE = 'paydonate';

    public function isHold(): bool
    {
        return $this === self::HOLD;
    }
}
