<?php
/**
 * Description of LiqPayPayment.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App\Client\Resources\Payments;

use Dots\Data\Entity;
use Dots\LiqPay\App\Client\Resources\Consts\Action;
use Dots\LiqPay\App\Client\Resources\Consts\PaymentStatus;

class LiqPayPayment extends Entity
{
    protected Action $action;

    protected string $payment_id;

    protected PaymentStatus $status;

    protected string $version;

    protected ?string $type;

    protected ?string $paytype;

    protected ?string $public_key;

    protected ?string $acq_id;

    protected ?string $order_id;

    protected ?string $liqpay_order_id;

    protected ?string $description;

    protected ?string $sender_phone;

    protected ?string $sender_first_name;

    protected ?string $sender_last_name;

    protected ?string $sender_card_mask2;

    protected ?string $sender_card_bank;

    protected ?string $sender_card_type;

    protected ?string $sender_card_country;

    protected ?string $card_token;

    protected ?float $amount;

    protected ?string $currency;

    protected ?string $sender_commission;

    protected ?string $receiver_commission;

    protected ?string $agent_commission;

    protected ?string $amount_debit;

    protected ?string $amount_credit;

    protected ?string $commission_debit;

    protected ?string $commission_credit;

    protected ?string $currency_debit;

    protected ?string $currency_credit;

    protected ?string $sender_bonus;

    protected ?string $amount_bonus;

    protected ?string $authcode_debit;

    protected ?string $authcode_credit;

    protected ?string $rrn_debit;

    protected ?string $rrn_credit;

    protected ?string $mpi_eci;

    protected ?string $is_3ds;

    protected ?string $create_date;

    protected ?string $end_date;

    protected ?string $completion_date;

    protected ?string $transaction_id;

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

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getPaytype(): ?string
    {
        return $this->paytype;
    }

    public function getPublicKey(): ?string
    {
        return $this->public_key;
    }

    public function getAcqId(): ?string
    {
        return $this->acq_id;
    }

    public function getOrderId(): ?string
    {
        return $this->order_id;
    }

    public function getLiqpayOrderId(): ?string
    {
        return $this->liqpay_order_id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getSenderPhone(): ?string
    {
        return $this->sender_phone;
    }

    public function getSenderFirstName(): ?string
    {
        return $this->sender_first_name;
    }

    public function getSenderLastName(): ?string
    {
        return $this->sender_last_name;
    }

    public function getSenderCardMask2(): ?string
    {
        return $this->sender_card_mask2;
    }

    public function getSenderCardBank(): ?string
    {
        return $this->sender_card_bank;
    }

    public function getSenderCardType(): ?string
    {
        return $this->sender_card_type;
    }

    public function getSenderCardCountry(): ?string
    {
        return $this->sender_card_country;
    }

    public function getCardToken(): ?string
    {
        return $this->card_token;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function getSenderCommission(): ?string
    {
        return $this->sender_commission;
    }

    public function getReceiverCommission(): ?string
    {
        return $this->receiver_commission;
    }

    public function getAgentCommission(): ?string
    {
        return $this->agent_commission;
    }

    public function getAmountDebit(): ?string
    {
        return $this->amount_debit;
    }

    public function getAmountCredit(): ?string
    {
        return $this->amount_credit;
    }

    public function getCommissionDebit(): ?string
    {
        return $this->commission_debit;
    }

    public function getCommissionCredit(): ?string
    {
        return $this->commission_credit;
    }

    public function getCurrencyDebit(): ?string
    {
        return $this->currency_debit;
    }

    public function getCurrencyCredit(): ?string
    {
        return $this->currency_credit;
    }

    public function getSenderBonus(): ?string
    {
        return $this->sender_bonus;
    }

    public function getAmountBonus(): ?string
    {
        return $this->amount_bonus;
    }

    public function getAuthcodeDebit(): ?string
    {
        return $this->authcode_debit;
    }

    public function getAuthcodeCredit(): ?string
    {
        return $this->authcode_credit;
    }

    public function getRrnDebit(): ?string
    {
        return $this->rrn_debit;
    }

    public function getRrnCredit(): ?string
    {
        return $this->rrn_credit;
    }

    public function getMpiEci(): ?string
    {
        return $this->mpi_eci;
    }

    public function getIs3ds(): ?string
    {
        return $this->is_3ds;
    }

    public function getCreateDate(): ?string
    {
        return $this->create_date;
    }

    public function getEndDate(): ?string
    {
        return $this->end_date;
    }

    public function getCompletionDate(): ?string
    {
        return $this->completion_date;
    }

    public function getTransactionId(): ?string
    {
        return $this->transaction_id;
    }
}
