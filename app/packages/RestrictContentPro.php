<?php

namespace Tomodomo\Packages\Packages;

use Tomodomo\Packages\Models\Package;

class RestrictContentPro extends Package
{
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
	 * Denote that this is an EDD (Easy Digital Downloads) plugin.
	 *
	 * @const bool
	 */
	const EDD = true;
}
