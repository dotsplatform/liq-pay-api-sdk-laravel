<?php
/**
 * Description of CancelPaymentResposeDTO.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Responses\Payments;

use Dots\LiqPay\App\Client\Responses\LiqPayResponseDTO;

class CancelPaymentResponseDTO extends LiqPayResponseDTO
{
    protected int $invoice_id;
    protected string $result;

    public function getInvoiceId(): int
    {
        return $this->invoice_id;
    }

    public function getResult(): string
    {
        return $this->result;
    }
}
