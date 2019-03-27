<?php

namespace Tomodomo\Packages\Traits;

trait EddInstallable
{
    /**
     * The plugin installation method.
     *
     * @var string
     */
    public $method = 'edd';

	/**
	 * Fetch the current version of the plugin.
	 *
	 * @return array
	 */
	public function getLatestVersion() : string
	{
        // Get the installer configuration
        $config = $this->getInstallerConfig();

		// Build the request body
		$requestBody = [
			'edd_action' => 'get_version',
		];

        if ($config['itemId'] ?? false) {
			$requestBody['item_id'] = $config['itemId'];
        }

        if ($config['itemName'] ?? false) {
			$requestBody['item_name'] = $config['itemName'];
        }

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
     * Get the versions available for this plugin. EDD plugins
     * only have one version, and we pull it in via an API call.
     *
     * @return array
     */
    public function getVersions() : array
    {
        return [$this->getLatestVersion()];
    }
}
