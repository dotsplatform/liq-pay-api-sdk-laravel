<?php
/**
 * Description of CancelPaymentDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Requests\Payments\DTO;

use Dots\LiqPay\App\Client\Resources\Consts\Action;
use Dots\LiqPay\App\Client\Resources\Consts\LiqPayApiVersion;

class CancelPaymentRequestDTO extends BaseLiqPayPaymentRequestDTO
{
    protected string $version = LiqPayApiVersion::V3;
    protected string $public_key;
    protected Action $action = Action::REFUND;
    protected float $amount;
    protected string $order_id;

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getPublicKey(): string
    {
        return $this->public_key;
    }

    public function getAction(): Action
    {
        return $this->action;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getOrderId(): string
    {
        return $this->order_id;
    }
}
