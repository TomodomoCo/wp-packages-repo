<?php

namespace Tomodomo\Packages\Packages;

use Tomodomo\Packages\Models\Package;

class SearchWp extends Package
{
    /**
     * The package's name.
     *
     * @var string
     */
    const NAME = 'searchwp';

    /**
     * The package's website URL.
     *
     * @var string
     */
    const URL = 'https://searchwp.com';

    /**
     * The package type; typically 'wordpress-plugin'.
     *
     * @var string
     */
    const TYPE = 'wordpress-plugin';

    /**
     * Valid versions for this package.
     *
     * @var array
     */
    const VERSIONS = [
        '3.0.4',
        '3.0.3',
        '3.0.2',
        '3.0.1',
        '3.0.0',
    ];
}
