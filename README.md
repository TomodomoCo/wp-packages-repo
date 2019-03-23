# WP Packages Repo

This repository provides a "virtual" Composer packages repository for premium WordPress plugins.

It's designed to work in concert with the [Composer WP Pro Plugins](https://github.com/junaidbhura/composer-wp-pro-plugins) installer package, without needing to manually specify repositories for each plugin you wish to install.

## Caveats

It is not currently possible to retrieve download links to old versions of plugins sold via Easy Digital Downloads-powered stores. That means that you can only ever install the latest version of a given plugin via Composer.

## Usage

Add the `packages.tomodomo.co` Composer repository (or your own repository hostname if you choose to self-host) to your `composer.json` file, along with any other repositories (such as the `composer-wp-pro-plugins` repository, shown below).

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/junaidbhura/composer-wp-pro-plugins"
    },
    {
      "type": "composer",
      "url": "https://packages.tomodomo.co"
    }
  ]
}
```

## About Tomodomo

Tomodomo is a creative agency for magazine publishers. We use custom design and technology to speed up your editorial workflow, engage your readers, and build sustainable subscription revenue for your business.

Learn more at [tomodomo.co](https://tomodomo.co) or email us: [hello@tomodomo.co](mailto:hello@tomodomo.co)

## License & Conduct

This project is licensed under the terms of the MIT License, included in `LICENSE.md`.

All open source Tomodomo projects follow a strict code of conduct, included in `CODEOFCONDUCT.md`. We ask that all contributors adhere to the standards and guidelines in that document.

Thank you!
