<?php
/**
 * Description of LiqPayServiceProvider.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Oleksandr Polosmak <o.polosmak@dotsplatform.com>
 */

namespace Dots\LiqPay\App;

use Illuminate\Support\ServiceProvider;

class LiqPayServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/liq-pay.php' => config_path('liq-pay.php'),
        ]);
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/liq-pay.php',
            'liq-pay',
        );
    }
}
