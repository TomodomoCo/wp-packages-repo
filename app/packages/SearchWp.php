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
	 * The product name.
	 *
	 * @const string
	 */
	const PRODUCT_NAME = 'SearchWP';

    /**
     * The package's website URL.
     *
     * @const string
     */
    const URL = 'https://searchwp.com';

    /**
     * The plugin installation method.
     *
     * @const string
     */
    const METHOD = 'edd';

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
        'endpoint'  => 'https://searchwp.com',
        'item_name' => 'SearchWP',
    ];
}
