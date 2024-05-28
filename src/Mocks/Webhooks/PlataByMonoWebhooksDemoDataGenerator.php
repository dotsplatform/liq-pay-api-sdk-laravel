<?php
/**
 * Description of LiqPayWebhooksDemoDataGenerator.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\Mocks\Webhooks;

class PlataByMonoWebhooksDemoDataGenerator
{
    public static function generateCreated(string $id, array $data = []): array
    {
        return array_merge([
            'invoiceId' => $id,
            'amount' => 30500,
            'ccy' => 980,
            'createdDate' => '2024-04-18T14:36:53Z',
            'modifiedDate' => '2024-04-18T14:36:53Z',
            'destination' => 'Оплата замовлення',
            'reference' => '0046-59300',
            'status' => 'created',
        ], $data);
    }

    public static function generateProcessing(string $id, array $data = []): array
    {
        return array_merge([
            'amount' => 7800,
            'ccy' => 980,
            'createdDate' => '2024-04-18T14:26:35Z',
            'destination' => 'Оплата замовлення',
            'finalAmount' => 0,
            'invoiceId' => $id,
            'modifiedDate' => '2024-04-18T14:26:43Z',
            'reference' => '0046-60548',
            'status' => 'processing',
        ], $data);
    }

    public static function generateOnHold(string $id, array $data = []): array
    {
        return array_merge([
            'amount' => 500,
            'ccy' => 980,
            'createdDate' => '2024-04-18T14:00:50Z',
            'destination' => 'Оплата замовлення',
            'invoiceId' => $id,
            'modifiedDate' => '2024-04-18T14:01:00Z',
            'reference' => '0046-50469',
            'status' => 'hold',
        ], $data);
    }

    public static function generateCapture(string $id, array $data = []): array
    {
        return array_merge([
            'amount' => 30500,
            'ccy' => 980,
            'createdDate' => '2024-04-18T14:36:53Z',
            'destination' => 'Оплата замовлення',
            'finalAmount' => 10500,
            'invoiceId' => $id,
            'modifiedDate' => '2024-04-18T14:38:10Z',
            'payMethod' => 'monopay',
            'paymentInfo' => [
                'approvalCode' => '553533',
                'bank' => 'Test bank',
                'country' => '804',
                'fee' => 137,
                'paymentMethod' => 'monopay',
                'paymentSystem' => '',
                'rrn' => '076215312896',
                'terminal' => 'MI000000',
                'tranId' => '425135733013',
            ],
            'reference' => '0046-59300',
            'status' => 'success',
        ], $data);
    }

    public static function failure(string $id, array $data = []): array
    {
        return array_merge([
            'invoiceId' => $id,
            'amount' => 7840,
            'ccy' => 980,
            'createdDate' => '2024-04-19T08:18:15Z',
            'destination' => 'Оплата замовлення',
            'errCode' => '1035',
            'failureReason' => '3DS перевірка не пройдена',
            'finalAmount' => 0,
            'modifiedDate' => '2024-04-19T08:19:08Z',
            'reference' => '0046-72947',
            'status' => 'failure',
        ], $data);
    }
}
