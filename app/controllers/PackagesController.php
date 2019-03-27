<?php

namespace Tomodomo\Packages\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use function WyriHaximus\listClassesInDirectories;

class PackagesController extends BaseController
{
    /**
     * Render the JSON for the packages.
     *
     * @return
     */
    public function renderJson(Request $request, Response $response, array $args) : Response
    {
        // Set up our empty packages array.
        $data = [
            'packages' => [],
        ];

        // Fetch all the package classes.
        $classes = listClassesInDirectories(__DIR__ . '/../packages/');

        foreach ($classes as $class) {
            $package = new $class;

            // Get the package name and the array of package versions.
            $packageName = $package->getNamespacedPackageName();
            $packageData = $package->build();

            if (empty($packageData)) {
                continue;
            }

            // Add to the packages array.
            $data['packages'][$packageName] = $packageData;
        }

        return $response->withJson($data);
    }
}
