<?php

namespace Tomodomo\Packages\Packages;

use Tomodomo\Packages\Models\Package;
use Tomodomo\Packages\Traits;

class RcpActiveCampaign extends Package
{
    use Traits\EddInstallable;

    /**
     * The package name.
     *
     * @const string
     */
    const NAME = 'rcp-activecampaign';

    /**
     * The package's website URL.
     *
     * @const string
     */
    const URL = 'https://restrictcontentpro.com';

    /**
     * The package type; typically 'wordpress-plugin'.
     *
     * @const string
     */
    const TYPE = 'wordpress-plugin';

    /**
     * The config data for the package.
     *
     * @var array
     */
    const CONFIG = [
        'endpoint' => 'https://restrictcontentpro.com',
        'itemName' => 'ActiveCampaign',
    ];
}
