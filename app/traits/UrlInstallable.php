<?php

namespace Tomodomo\Packages\Traits;

trait UrlInstallable
{
    /**
     * Get the installation config method.
     *
     * @return array
     */
    public function getInstallerConfig() : array
    {
        return [
            'method'   => $this::METHOD,
            'endpoint' => $this::ENDPOINT,
        ];
    }
}
