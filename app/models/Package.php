<?php

namespace Tomodomo\Packages\Models;

use GuzzleHttp\Guzzle;

class Package {
    /**
     * The Composer package namespace.
     *
     * @const string
     */
    const NAMESPACE = 'junaidbhura';

    /**
     * Build an array of packages for each version.
     *
     * @return array
     */
    public function build() : array
    {
        $versions = [];
		$availableVersions = $this::VERSIONS;

		// If this is a plugin sold via an EDD store, it gets special treatment.
		// EDD only allows us to retrieve authorised downloads for the current
		// active version, so we fetch that version via an API request and only
		// use that version.
		if ($this::EDD && empty($availableVersions)) {
			$availableVersions[] = $this->getLatestVersion();
		}

        // Build an array of all the package's versions.
        foreach ($availableVersions as $version) {
            $versions[$version] = $this->buildVersion($version);
        }

        return $versions;
    }

	/**
	 * Fetch the current version of the plugin.
	 *
	 * @return array
	 */
	public function getLatestVersion() : string
	{
		if ($this::EDD === false) {
			throw new \Exception('This plugin is not sold via an Easy Digital Downloads store.');
		}

		// Build the request body
		$requestBody = [
			'edd_action' => 'get_version',
			'item_name'  => $this::PRODUCT_NAME,
		];

		// Build a new Guzzle client
		$http = new \GuzzleHttp\Client();

		// Send a request to the EDD endpoing
		$response = $http->request(
			'post',
			$this::URL,
			[
				'form_params' => $requestBody,
			],
		);

		// Extract the response
		$body = json_decode((string) $response->getBody(), true);

		// If we can't get a stable version, throw an exception
		if (($body['stable_version'] ?? false) === false) {
			throw new \Exception('No stable version was available.');
		}

		// Return the version number
		return $body['stable_version'];
	}

    /**
     * Get the namespaced package name.
     *
     * @return string
     */
    public function getNamespacedPackageName() : string
    {
        return $this::NAMESPACE . '/' . $this::NAME;
    }

    /**
     * Build a specific version of the package.
     *
     * @param string $version
     *
     * @return array
     */
    public function buildVersion(string $version) : array
    {
        return [
            'name'    => $this->getNamespacedPackageName(),
            'type'    => $this::TYPE,
            'version' => $version,
            'dist'    => [
                'type' => 'zip',
                'url'  => $this::URL,
            ],
            'require' => [
                'junaidbhura/composer-wp-pro-plugins' => '*',
            ],
        ];
    }
}
