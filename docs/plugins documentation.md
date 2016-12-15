# PLUGINS DOCUMENTATION
#### 1.Better Analytics 
The Better Google Analytics plugin allows you to easily add Google Analytics code to your website and gives you the power to track virtually everything. Better Google Analytics includes heat maps, reports, charts, events and site issue tracking in your WordPress admin area without the need to log into your Google Analytics account.

Better Google Analytics allows you to manage your Google Analytics account from within your WordPress admin area 

### [Installation] [df1]

* Upload better-analytics folder to the /wp-content/plugins/ directory.
* Activate the Better Google Analytics plugin through the 'Plugins' menu in the WordPress admin area.
* Link your Google Analytics account under 'Settings -> Better Analytics -> API'.
* Pick your Google Analytics Web Property ID under 'Settings -> Better Analytics -> General'.

### 2.Contact Form 7 
Contact Form 7 can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup. The form supports Ajax-powered submitting, CAPTCHA, Akismet spam filtering and so on

### [Installation] [df1]
* Upload the entire contact-form-7 folder to the /wp-content/plugins/ directory.
* Activate the plugin through the 'Plugins' menu in WordPress.
* Once the plugin is active, you will see a new 'tab' inside Contact Form 7 admin interface

### 3.Email Subscribers and Newsletter
Email Subscribers is a fully featured newsletter plugin. It helps you achieve all your newsletter related tasks effectively in one single place.
Email Subscribers plugin has a separate page with the HTML editor. You can easily create HTML newsletters using this editor in around 5 minutes. You also have a separate page to select the include and exclude categories before sending each newsletter. You can quickly import/ export email addresses of registered users and commentators to the subscription list using the import-export option in the plugin.
Email Subscribers plugin also has a subscription box and it allows users to publicly subscribe by submitting their email addresses. You can add the subscription box to your site using

* [Shortcode for any posts or pages] [df1]
[email-subscribers namefield="YES" desc="" group="Public"]
* [Widget option][df1]
Go to Dashboard->Appearance->Widgets. Drag and drop the Email Subscribers widget to your sidebar location.
* [Add directly in the theme][df1]
<?php es_subbox( $namefield = "YES", $desc = "", $group = "" ); ?>

[Main advantages][df1]

* Easily collect emails by adding a subscription form to your sidebar (using widget), post (using shortcode) or theme file (using php code)
* Send beautifully crafted HTML newsletters and send them to your subscribers. Either manually (or schedule it)
* Send notifications newsletters notifying your subscribers about the newly published post on your blog
* Auto generate latest available posts in the blog and send to your subscribers via cron job

[Plugin Features][df1]

* Send notification emails to subscribers when new posts are published.
* Option to schedule mail (Cron job option) or send them manually.
* Collect customer emails by adding a subscription box (Widget/Shortcode/PHP Code).
* Double opt-in and single opt-in facility for subscribers.
* Email notification to admin when user signs up (Optional).
* Automatic welcome mail to subscribers (Optional).
* Unsubscribe link in the mail.
* Import/Export subscribers emails.
* HTML editor to compose newsletters.
* Send newsletters.
* Alphabetized list in send mail page.
* Sent mail status and when it was viewed.
* Support localization or internationalization.
* Include/exclude categories while sending a newsletter.
* Ability to control user access (Roles and Capabilities).

### 4. Featured Video Plus
Featured Videos work like Featured Images, just smoother: Paste a video URL into the designated new box on the post edit screen and the video will be displayed in place of a post image.

* Automagically! If your theme makes use of WordPress' native featured image functionality you are set: Automatic insertion, lazy loading or lightbox overlays, its your choice. If this does not work you can either
* insert the [featured-video-plus]-Shortcode in your posts or
* manually make use of the PHP-functions in your theme's source files.

### Installation

* Visit your WordPress Administration interface and go to Plugins -> Add New
* Search for Featured Video Plus, and click Install Now below the plugin's name
* When the installation finished, click Activate Plugin
The plugin is ready to go. Now edit your posts and add video links to the Featured Video box on the right! Plugin specific settings can be found under Settings -> Media.
##### [Theme integration] [df1]

If the automatic integration fails you can always fallback to either using the shortcode or adjusting your themes sourcecode manually:
Shortcode
```sh
[featured-video-plus]
[featured-video-plus width=300]
```
PHP-functions
```sh
the_post_video( $size )
has_post_video( $post_id )
get_the_post_video( $post_id, $size )
get_the_post_video_url( $post_id )
get_the_post_video_image( $post_id )
get_the_post_video_image_url( $post_id )
```
All parameters are optional. If no ```$post_id``` is given the current post's ID will be used. ```$size``` is either a string keyword``` (thumbnail, medium, large``` or ```full)``` or a 2-item array representing width and height in pixels, e.g.```array(560,320).```
When editing your theme's sourcecode keep in mind that a future update through WordPress.org might overwrite your changes

### 5. Newsletter
##### [Installation] [df1] 
Newsletter is a real newsletter system for your WordPress blog: perfect for list building, you can easily create, send and track e-mails, headache-free. It just works out of box!
###### Main Features

> NEW responsive email Drag & Drop composer
> Unlimited Subscribers with statistics
Unlimited Emails with tracking
Customizable subscription widget, page or custom form
Wordpress User Registration seamless integration
Single And Double Opt-In plus privacy checkbox for EU laws compliance
Subscribers preferences to fine-target your campaigns
SMTP-Ready
Customizable Themes
Html and Text versions of Emails
All messages are fully translatable from Admin Panel (no .po/.mo)
Diagnostics Panel to check your blog mailing capability
Compatible with Postman, WP Mail SMTP, Easy WP SMTP, Easy SMTP Mail, WP Mail Bank
Integration with WordPress registration

Newsletter subscription check box on standard WordPress registration form
Auto confirmation on first login
Imports already registered users

#### 6. W3 Total Cache
This plugin is designed to improve user experience and page speed.

## Benefits:
* At least 10x improvement in overall site performance (Grade A in YSlow or significant Google Page Speed improvements) when fully configured.
* Improved conversion rates and "site performance" which affect your site's rank on Google.com.
* Instant/subsequent page views: browser caching.
* Optimized progressive render: pages start rendering quickly.
* Reduced page load time: increased visitor time on site; visitors view more pages.
* Improved web server performance; sustain high traffic periods.
* Up to 80% bandwidth savings via minify and HTTP compression of HTML, CSS, JavaScript and feeds.

## Features:
* Compatible with shared hosting, virtual private / dedicated servers and dedicated servers / clusters.
* Transparent content delivery network (CDN) management with Media Library, theme files and WordPress itself.
* Mobile support: respective caching of pages by referrer or groups of user agents including theme switching for groups of referrers or user agents.
* Caching of (minified and compressed) pages and posts in memory or on disk or on CDN (mirror only).
* Caching of (minified and compressed) CSS and JavaScript in memory, on disk or on CDN.
* Caching of feeds (site, categories, tags, comments, search results) in memory or on disk or on CDN (mirror only).
* Caching of search results pages (i.e. URIs with query string variables) in memory or on disk.
* Caching of database objects in memory or on disk.
* Caching of objects in memory or on disk.
* Minification of posts and pages and feeds.
* Minification of inline, embedded or 3rd party JavaScript (with automated updates).
* Minification of inline, embedded or 3rd party CSS (with automated updates).
* Browser caching using cache-control, future expire headers and entity tags (ETag) with "cache-busting".
* JavaScript grouping by template (home page, post page etc) with embed location control.
* Non-blocking JavaScript embedding.
* Import post attachments directly into the Media Library (and CDN).
* WP-CLI support for cache purging, query string updating and more.

### Installation

* Visit your WordPress Administration interface and go to Plugins -> Add New
* Search for Featured W3 Total Cache, and click Install Now below the plugin's name
* When the installation finished, click Activate Plugin
On the Dashboard there`s a performance tab. Hover over it then click on the general settings where you will need to make some changes so as to optimize your web speed.

>On the page cache enable it by clicking the checkbox then save. This helps the browser to save a hardcopy of the page on your server.

>The Minify option rerules the white spaces and other characters from the css files and javascript files which are required upon accessing the site thus reducing the bandwith used to send that information to the visitor. This is done by enabling the minify option then leave the rest as they are in default then save.

>Enable the database cache via the checkbox. This helps to store frequently used items/queries.

>The browser cache helps to store data on the user`s browser.So enable it by clicking on the checkbox.

>The CDN (content delivery network) helps to store data related to media files,images and attatchments.So enable it by clicking on the checkbox.

>Monitoring section helps to monitor the web activity and load time.Since there is no API Key disable the monitoring option checkbox.


Markdown is a lightweight markup language based on the formatting conventions that people naturally use in email.  As [John Gruber] writes on the [Markdown site][df1]

> The overriding design goal for Markdown's
> formatting syntax is to make it as readable
> as possible. The idea is that a
> Markdown-formatted document should be
> publishable as-is, as plain text, without
> looking like it's been marked up with tags
> or formatting instructions.

This text you see here is *actually* written in Markdown! To get a feel for Markdown's syntax, type some text into the left window and watch the results in the right.

### Version
3.2.7

### Tech

Dillinger uses a number of open source projects to work properly:

* [AngularJS] - HTML enhanced for web apps!
* [Ace Editor] - awesome web-based text editor
* [markdown-it] - Markdown parser done right. Fast and easy to extend.
* [Twitter Bootstrap] - great UI boilerplate for modern web apps
* [node.js] - evented I/O for the backend
* [Express] - fast node.js network app framework [@tjholowaychuk]
* [Gulp] - the streaming build system
* [keymaster.js] - awesome keyboard handler lib by [@thomasfuchs]
* [jQuery] - is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers.

And of course Dillinger itself is open source with a [public repository][dill]
 on GitHub.

### Installation

Dillinger requires [Node.js](https://nodejs.org/) v4+ to run.

You need Gulp installed globally:

```sh
$ npm i -g gulp
```

```sh
$ git clone [git-repo-url] dillinger
$ cd dillinger
$ npm i -d
$ NODE_ENV=production node app
```

### Plugins

Dillinger is currently extended with the following plugins

* Dropbox
* Github
* Google Drive
* OneDrive

Readmes, how to use them in your own application can be found here:

* [plugins/dropbox/README.md] [PlDb]
* [plugins/github/README.md] [PlGh]
* [plugins/googledrive/README.md] [PlGd]
* [plugins/onedrive/README.md] [PlOd]

### Development

Want to contribute? Great!

Dillinger uses Gulp + Webpack for fast developing.
Make a change in your file and instantanously see your updates!

Open your favorite Terminal and run these commands.

First Tab:
```sh
$ node app
```

Second Tab:
```sh
$ gulp watch
```

(optional) Third:
```sh
$ karma start
```

### Docker
Dillinger is very easy to install and deploy in a Docker container.

By default, the Docker will expose port 80, so change this within the Dockerfile if necessary. When ready, simply use the Dockerfile to build the image.

```sh
cd dillinger
docker build -t <youruser>/dillinger:latest .
```
This will create the dillinger image and pull in the necessary dependencies. Once done, run the Docker and map the port to whatever you wish on your host. In this example, we simply map port 80 of the host to port 80 of the Docker (or whatever port was exposed in the Dockerfile):

```sh
docker run -d -p 80:80 --restart="always" <youruser>/dillinger:latest
```

Verify the deployment by navigating to your server address in your preferred browser.

### N|Solid and NGINX

More details coming soon.

#### docker-compose.yml

Change the path for the nginx conf mounting path to your full path, not mine!

### Todos

 - Write Tests
 - Rethink Github Save
 - Add Code Comments
 - Add Night Mode

License
----

MIT


**Free Software, Hell Yeah!**

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)


   [dill]: <https://github.com/joemccann/dillinger>
   [git-repo-url]: <https://github.com/joemccann/dillinger.git>
   [john gruber]: <http://daringfireball.net>
   [@thomasfuchs]: <http://twitter.com/thomasfuchs>
   [df1]: <http://daringfireball.net/projects/markdown/>
   [markdown-it]: <https://github.com/markdown-it/markdown-it>
   [Ace Editor]: <http://ace.ajax.org>
   [node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [keymaster.js]: <https://github.com/madrobby/keymaster>
   [jQuery]: <http://jquery.com>
   [@tjholowaychuk]: <http://twitter.com/tjholowaychuk>
   [express]: <http://expressjs.com>
   [AngularJS]: <http://angularjs.org>
   [Gulp]: <http://gulpjs.com>

   [PlDb]: <https://github.com/joemccann/dillinger/tree/master/plugins/dropbox/README.md>
   [PlGh]:  <https://github.com/joemccann/dillinger/tree/master/plugins/github/README.md>
   [PlGd]: <https://github.com/joemccann/dillinger/tree/master/plugins/googledrive/README.md>
   [PlOd]: <https://github.com/joemccann/dillinger/tree/master/plugins/onedrive/README.md>
