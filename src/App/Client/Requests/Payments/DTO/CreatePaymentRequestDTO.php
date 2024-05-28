<?php
/**
 * Description of CreatePaymentDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Requests\Payments\DTO;

use Dots\LiqPay\App\Client\Resources\Consts\Action;
use Dots\LiqPay\App\Client\Resources\Consts\Currency;
use Dots\LiqPay\App\Client\Resources\Consts\LiqPayApiVersion;

class CreatePaymentRequestDTO extends BaseLiqPayPaymentRequestDTO
{
    protected string $version = LiqPayApiVersion::V3;

    protected string $public_key;

    protected Action $action = Action::HOLD;

    protected float $amount;

    protected Currency $currency;

    protected string $description;

    protected string $order_id;

    protected ?string $server_url;

    protected ?string $result_url;

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

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getOrderId(): string
    {
        return $this->order_id;
    }

    public function getServerUrl(): ?string
    {
        return $this->server_url;
    }

    public function getResultUrl(): ?string
    {
        return $this->result_url;
    }
}
