<?php
/**
 * Description of CancelInvoiceResposeDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Responses\Invoices;

use Dots\LiqPay\App\Client\Resources\Consts\Action;
use Dots\LiqPay\App\Client\Resources\Consts\PaymentStatus;
use Dots\LiqPay\App\Client\Responses\LiqPayResponseDTO;

class CancelPaymentResponseDTO extends LiqPayResponseDTO
{
    protected Action $action;

    protected string $payment_id;

    protected PaymentStatus $status;

    public function getAction(): Action
    {
        return $this->action;
    }

    public function getPaymentId(): string
    {
        return $this->payment_id;
    }

    public function getStatus(): PaymentStatus
    {
        return $this->status;
    }
}
