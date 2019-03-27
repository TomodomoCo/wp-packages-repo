<?php

namespace Tomodomo\Packages\Traits;

trait SerializedPostInstallable
{
    /**
     * Get the installation config method.
     *
     * @return array
     */
    public function getInstallerConfig() : array
    {
        $config = $this::DATA;

        // Add the method
        $config['method'] = $this::METHOD;

        return array_merge($config, $this::DATA);
    }
}
