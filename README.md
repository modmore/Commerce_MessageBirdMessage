# MessageBird integration for Commerce

Integration of the MessageBird API for [Commerce](https://www.modmore.com/commerce/) by modmore, that allows sending order messages via SMS automatically (as status change action) or manually (through the dashboard).

## Configuration & Usage

[See the modmore documentation for how to use the module](https://docs.modmore.com/en/Commerce/v1/Modules/Communication/MessageBird.html).

## Install as a package

The Commerce_MessageBird package is not yet installable as a package, but will be made available as one soon from modmore. If you're reading this after January 10th, 2018, please remind Mark via support@modmore.com to release the package.

## Building from source

To run the module from source, you'll need to take a few steps.

1. Clone the repository (or better yet, a clone of your own fork)

2. Copy config.core.sample.php to config.core.php, and if needed adjust it so that it includes your MODX site's config.core.php. Make sure you have [Commerce](https://www.modmore.com/commerce/) installed as well, of course.

3. In `core/components/commerce_messagebird/`, run a `composer install`. This will download the official MessageBird API library.

4. From the browser open `_bootstrap/index.php`, this will set up the necessary settings and will make the module known to Commerce.

