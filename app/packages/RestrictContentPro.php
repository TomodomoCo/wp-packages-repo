<?php

namespace Tomodomo\Packages\Packages;

use Tomodomo\Packages\Models\Package;
use Tomodomo\Packages\Traits;

class RestrictContentPro extends Package
{
    use Traits\EddInstallable;

    /**
     * The package name.
     *
     * @const string
     */
    const NAME = 'restrict-content-pro';

	/**
	 * The product name.
	 *
	 * @const string
	 */
	const PRODUCT_NAME = 'Restrict Content Pro';

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
	 * The available versions for this plugin. For EDD plugins, should be an empty array.
	 *
	 * @const array
	 */
	const VERSIONS = [];

    /**
     * The extra data for the package.
     *
     * @const array
     */
    const DATA = [
        'endpoint'  => 'https://restrictcontentpro.com',
        'item_name' => 'Restrict Content Pro',
    ];
}
