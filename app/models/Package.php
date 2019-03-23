<?php

namespace Tomodomo\Packages\Models;

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

        // Build an array of all the package's versions.
        foreach ($this::VERSIONS as $version) {
            $versions[$version] = $this->buildVersion($version);
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
