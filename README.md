# Gazkoob Custom WordPress Theme

Welcome to the Gazkoob theme project. This is a bespoke WordPress theme built from the ground up for **Gazkoob**, a professional car wrapping and ceramic coating service. The theme focuses on a clean, modern design, a great user experience, and high performance.

---
## Core Features

We've packed this theme with modern features to ensure it's both fast and functional:

* **Fully Responsive:** The custom design looks great on all devices, from mobile phones to desktops.
* **Performance Focused:** Built with speed in mind. This includes inlining critical CSS for fast initial rendering, deferring non-essential scripts, and lazy-loading heavy assets like maps.
* **Self-Hosted Fonts:** The theme uses a local version of the **Vazirmatn** font, which is included in the project files. This ensures fast and reliable font loading without relying on external servers.
* **AJAX-Powered Forms:** Users can submit consultation requests through a sleek popup or in-post form without the page ever needing to reload.
* **Custom Admin Area:** All consultation requests are neatly stored and managed in a dedicated "Consultation Requests" section in the WordPress dashboard.
* **Custom Templates:** Includes specially designed templates for the "Contact Us" and "404 Not Found" pages.
* **Accessible & SEO-Friendly:** The theme is built with semantic HTML and correct heading structures. We've also resolved common accessibility issues like color contrast and redundant alt text.

---
## Installation & Setup

To install or update the theme on your WordPress site, please follow these steps carefully.

1.  **Prepare the file:** Compress the entire `gazkoob-theme` folder into a single `.zip` file.
2.  **Go to your Dashboard:** Log in to WordPress and navigate to **Appearance > Themes**.
3.  **Delete the Old Version (Important for updates):** To update the theme, you must delete the old version first. Activate another theme temporarily (like "Twenty Twenty-Four"), then click on the Gazkoob theme details and select **Delete**.
4.  **Upload New Version:** Click **Add New Theme**, then **Upload Theme**. Select the `.zip` file you created and proceed with the installation.
5.  **Activate:** Once installed, activate the Gazkoob theme.

---
## Configuration

### Contact Information
The main contact details (address, mobile number, email) can be changed in the WordPress Customizer under **Appearance > Customize**. The landline number is hardcoded in `footer.php` and `template-contact.php`.

### Main Menu
The primary navigation menu is managed under **Appearance > Menus**.

### SEO Settings
All SEO configurations, especially meta descriptions for pages and posts, should be handled through the **Rank Math** plugin for best results.

### Customizing the Maps
The map iframes in the footer and on the contact page are hardcoded. To update them:

1.  Get your new `iframe` embed code from Google Maps or Neshan.
2.  Open these two files for editing:
    * `footer.php`
    * `template-contact.php`
3.  Find the existing `<iframe>` code blocks and replace them with your new ones. The relevant section in `footer.php` looks like this:
    ```html
    <div class="footer-maps-container">
        <div class="footer-map">
             <iframe class="lazy-map" title="Google Map location for Gazkoob in footer" data-src="..." ...></iframe>
        </div>
        <div class="footer-map">
            <iframe class="lazy-map" title="Neshan Map location for Gazkoob in footer" data-src="..." ...></iframe>
        </div>
    </div>
    ```

---
## For Developers

### Technologies Used
* **Back-End:** PHP, WordPress
* **Front-End:** HTML5, CSS3, JavaScript (ES6+), jQuery, AJAX
* **Server:** Debian (Linux), Apache
* **Performance:** Critical CSS, Lazy Loading (Intersection Observer API), Defer Loading

### Security & Version Control
* **API Keys:** This project currently contains hardcoded API keys for map services in `footer.php` and `template-contact.php`. Before making this repository public, these keys **must be removed** and loaded securely using environment variables or another secure method.
* **`.gitignore`:** Always use a standard WordPress `.gitignore` file to prevent sensitive files (like `wp-config.php`) and unnecessary folders (like `uploads`) from being committed to your repository.
* **Server Modules:** For the `.htaccess` caching and header rules to function correctly, the `mod_expires` and `mod_headers` Apache modules must be enabled on the server.

<p align="center">
  Made with ❤️ by Komeyl Kalhorinia
</p>