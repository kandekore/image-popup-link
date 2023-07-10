# Image Popup Dropdown Plugin

The Image Popup Dropdown plugin is a WordPress plugin that enables you to add a list of stores or locations, each with its own root URL. The plugin allows you to configure an image with a title and a popup dropdown menu that links to specific URLs associated with each store or location.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Configuration](#configuration)
- [Shortcode](#shortcode)
- [Styles and Scripts](#styles-and-scripts)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. Download the plugin files and extract them.
2. Upload the `image-popup-dropdown` directory to the `/wp-content/plugins/` directory.
3. Activate the Image Popup Dropdown plugin through the 'Plugins' menu in WordPress.

## Usage

Once the plugin is activated, you can start using it by following these steps:

1. Create a new post or edit an existing one.
2. In the post editor, add the desired image and provide a title.
3. Scroll down to the configuration section and enter the image URL and page path.
4. Publish or update the post.

The plugin will automatically generate a popup dropdown menu for the configured image. The dropdown menu will display a list of stores or locations defined in the plugin settings.

## Configuration

The Image Popup Dropdown plugin provides the following configuration options for each store or location:

- **Store Name**: The name of the store or location.
- **Store URL**: The root URL of the store or location.
- **Page Path**: The path or URL extension specific to the store or location.

To configure the stores or locations:

1. Go to the WordPress admin dashboard.
2. Click on 'Store Management' in the left menu.
3. Add or edit stores by entering the store name and URL.
4. Specify a unique page path for each store or location.
5. Click on 'Save Changes' to update the settings.

## Shortcode

The plugin provides a shortcode, `[ipd-display]`, which allows you to display the configured image with the popup dropdown in any post, page, or widget.

To use the shortcode, add it to your content with the ID of the image you want to display, like this: `[ipd-display id="123"]`, where `123` is the ID of the image post.

## Styles and Scripts

The Image Popup Dropdown plugin includes the necessary CSS and JavaScript files to style and enable the functionality of the popup dropdown.

You can customize the appearance of the plugin by modifying the CSS file located in the `ipd.css` file.

To enqueue the required scripts and styles, the plugin automatically adds them to the front-end of your WordPress site.

## Contributing

Contributions to the Image Popup Dropdown plugin are welcome! If you find any issues or have suggestions for improvements, please submit them through the GitHub repository of the plugin.

To contribute to the plugin:

1. Fork the GitHub repository.
2. Create a new branch for your feature or bug fix.
3. Make your modifications and commit your changes.
4. Push your branch to your forked repository.
5. Submit a pull request with a detailed description of your changes.

## License

The Image Popup Dropdown plugin is released under the [MIT License](https://opensource.org/licenses/MIT). You are free to use, modify, and distribute the plugin as per the terms of the license.
