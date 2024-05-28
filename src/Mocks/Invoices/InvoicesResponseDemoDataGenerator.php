<?php
/**
 * Description of PaymentsResponseDataGenerator.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\Mocks\Invoices;

class InvoicesResponseDemoDataGenerator
{
    public static function generateSuccessCreateInvoice(array $data = []): array
    {
        return array_merge([
            'invoiceId' => '240418AaqQanruPSM7Qj',
            'pageUrl' => 'https://example.com',
        ], $data);
    }

    public static function generateFailCreateInvoice(array $data = []): array
    {
        return array_merge([
            'errCode' => 1001,
            'errText' => 'Something went wrong',
        ], $data);
    }

    public static function generateSuccessInvoiceStatus(array $data = []): array
    {
        return array_merge([
            'invoiceId' => '240418AaqQanruPSM7Qj',
            'status' => 'success',
            'payMethod' => 'monopay',
            'amount' => 30500,
            'ccy' => 980,
            'finalAmount' => 10500,
            'createdDate' => '2024-04-18T14:36:53Z',
            'modifiedDate' => '2024-04-18T14:38:10Z',
            'reference' => '0046-59300',
            'destination' => 'Оплата замовлення',
            'paymentInfo' => array_merge([
                'rrn' => '076215312896',
                'approvalCode' => '553533',
                'tranId' => '425135733013',
                'terminal' => 'MI000000',
                'bank' => 'Test bank',
                'paymentSystem' => '',
                'country' => '804',
                'fee' => 137,
                'paymentMethod' => 'monopay',
            ], $data['paymentInfo'] ?? []),
        ], $data);
    }

    public static function generateFailInvoiceStatus(array $data = []): array
    {
        return array_merge([
            'errCode' => 1001,
            'errText' => 'Something went wrong',
        ], $data);
    }

    public static function generateSuccessCancelInvoice(array $data = []): array
    {
        return array_merge([
            'status' => 'success',
            'createdDate' => '2024-04-18T14:36:53Z',
            'modifiedDate' => '2024-04-18T14:38:10Z',
        ], $data);
    }

    public static function generateFailCancelInvoice(array $data = []): array
    {
        return array_merge([
            'errCode' => 1001,
            'errText' => 'Something went wrong',
        ], $data);
    }

    public static function generateSuccessFinalizeInvoice(array $data = []): array
    {
        return array_merge([
            'status' => 'success',
        ], $data);
    }

    public static function generateFailFinalizeInvoice(array $data = []): array
    {
        return array_merge([
            'errCode' => 1001,
            'errText' => 'Something went wrong',
        ], $data);
    }
}
