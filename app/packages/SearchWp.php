<?php

namespace Tomodomo\Packages\Packages;

use Tomodomo\Packages\Models\Package;
use Tomodomo\Packages\Traits;

class SearchWp extends Package
{
    use Traits\EddInstallable;

    /**
     * The package name.
     *
     * @const string
     */
    const NAME = 'searchwp';

    /**
     * The package's website URL.
     *
     * @const string
     */
    const URL = 'https://searchwp.com';

    /**
     * The package type; typically 'wordpress-plugin'.
     *
     * @const string
     */
    const TYPE = 'wordpress-plugin';

    /**
     * The extra data for the package.
     *
     * @const array
     */
    const CONFIG = [
        'endpoint' => 'https://searchwp.com',
        'itemName' => 'SearchWP',
    ];
}
