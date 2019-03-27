<?php

namespace Tomodomo\Packages\Models;

use GuzzleHttp\Guzzle;

class Package {
    /**
     * The Composer package namespace.
     *
     * @const string
     */
    const NAMESPACE = 'tomodomo';

    /**
     * Build an array of packages for each version.
     *
     * @return array
     */
    public function build() : array
    {
        $versions = [];
        $availableVersions = $this->getVersions();

        // Build an array of all the package's versions.
        foreach ($availableVersions as $version) {
            $versions[$version] = $this->getComposerRelease($version);
        }

        return $versions;
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
     * Get the basic Composer data about this package as an array.
     *
     * @return array
     */
    public function getComposerData() : array
    {
        return [
            'name'    => $this->getNamespacedPackageName(),
            'type'    => $this::TYPE,
            'dist'    => [
                'type' => 'zip',
                'url'  => $this::URL, // This is the URL that the installer library overrides.
            ],
            'require' => [
                'tomodomo/wp-packages-installer' => '*',
            ],
            'extra'   => [
                'wp-packages-installer-config' => $this->getInstallerConfig(),
            ],
        ];
    }

    /**
     * Build a specific version of the package.
     *
     * @param string $version
     *
     * @return array
     */
    public function getComposerRelease(string $version) : array
    {
        // Get the Composer data for this package
        $data = $this->getComposerData();

        // Add the version number for the release
        $data['version'] = $version;

        return $data;
    }

    /**
     * Get the versions available for this plugin.
     *
     * @return array
     */
    public function getVersions() : array
    {
        return $this::VERSIONS;
    }
}
