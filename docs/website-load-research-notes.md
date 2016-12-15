# Tips to make a website load faster
```sh
```
Page loading time is obviously an important part of any website’s user experience, website visitors tend to care more about speed. Additionally, page loading time is becoming a more important factor when it comes to search engine rankings. To achieve this, the following factors/tips must be put in place;

## 1. Minify HTML, CSS and JavaScript
To do so, remove all unnecessary comments, white space and code. This will improve performance because the file size will be reduced. To minify HTML, check out HTML Compress. For JavaScript, use` YUI Compressor`, and for CSS, test out CSS Compressor. A fourth option is to make use of the `PageSpeed` Insights Chrome Extension to create an optimized version of your HTML code. `The PageSpeed Insights page also lists other programs you can use`.

## 2. Make CSS and JavaScript External
 Using external files will generally make the pages load faster because JavaScript and CSS files are cached by the browser.

 if you use CSS in a web page, `place the CSS in the HEAD element`. This makes the page appear load faster and it can do so progressively. With `JavaScript, move the scripts to the bottom` of the page.
 
## 3. Eliminate Duplicate Scripts in a Web Page
This issue might seem strange but it is actually common. Duplicate JavaScript and CSS files degrade performance by creating `unnecessary HTTP requests` and `wasted JavaScript execution`. It´s also important to check and see if scripts have been duplicated in external files, as well. To avoid this problem is to use a `script management module` with your templates

## 4. Optimize Images
Reduce image sizes using either GIF, PNG-8. or JPEG as the file formats. Make sure the size matches your usage and set the size for each page with the height and width. Do not make use of scaling, especially from larger to smaller images. The image result might look fine on screen but the file size will be the same. To truly take advantage of the smaller dimensions, use an image editing program and scale the image accordingly. The resulting file size will be smaller. It´s also important to experiment with compression for with all of these file formats. At some point you will obtain an acceptable compression with a minimum loss of quality. Experimentation is key.

## 5. Use GZIP compression
If your hosting company uses GZIP compression and deflation these can make a significant difference and speed up your site. It´s possible to reduce file sizes by 70% without losing image quality or video size. To see if your site uses GZIP already, [here´s](http://www.gidnetwork.com/tools/gzip-test.php) a test you can use.

## 6. Add Expires Headers
Due to web page complexity, many HTTP requests could be required to load all of the components. When you use Expires headers those components can be cached and this avoids unnecessary HTTP requests on successive page views. While Expires headers are most commonly associated with images, they can also be used for scripts, style sheets, and Flash.

## 7. Use a Reliable CMS

Your CMS is the framework of your website; if you use simple HTML or popular and reliable CMSs like WordPress or Drupal you should be fine. If, however, you’re using a less popular CMS or something you built for yourself, you risk having a slow website; make sure you run appropriate tests and do the right research to ensure that a CMS is fast and reliable before using

## 8. Fix All Broken Links on Your Website

While broken links inside your content won’t affect your website speed, although they can make for a bad user experience, broken links in your JavaScript, CSS and Image URLs can make your website irritatingly slower; be sure to scan these aspects of your website for broken links and [fix them](http://webdesign.about.com/od/speed/a/broken-links-slow-your-website.htm) before they send your users away.

## 9. Limit the Number of External Requests

To ensure a fully functional website, you have to rely on files and resources from other websites; as a result, you have to embed videos, presentations and other multimedia files. While this isn’t necessarily bad, if it’s too much or if you’re requesting external files from slow websites, it can have an impact on your site load time.

Try to limit the number of external requests your website will make; if possible, host as many files as you can on your server. For other files, only let your website request them from very reliable websites

## 10. Use a Reliable CMS

Your CMS is the framework of your website; if you use simple HTML or popular and reliable CMSs [like WordPress or Drupal](http://websitesetup.org/cms-comparison-wordpress-vs-joomla-drupal/) you should be fine. If, however, you’re using a less popular CMS or something you built for yourself, you risk having a slow website; make sure you run appropriate tests and do the right research to ensure that a CMS is fast and reliable before using it

## 11. Use a caching plugin

If you’re using WordPress, one of the quickest and easiest ways to cut your page loading speed is to install a caching plugin like `WP Total Cache` or `WP Super Cache`. Both are free to download and very good. Despite their name, caching plugins do quite a lot beyond browser caching, although that is their primary function. I’ll discuss the benefits and how to add browser caching in a second without a plugin, but for those using WordPress and looking to improve page speed quickly, it’s often easier to just install a plugin.

## 12. Turn off ping backs and trackbacks in WordPress

Pingbacks and trackbacks don’t really serve any practical use in WordPress, and yet they’re often enabled by default. I’d recommend turning both of these off as they do clog up your database and increase the number of requests that are made.


## 13. Minimize HTTP Requests

Start a campaign to reduce the number of components on each page.

By doing this, you reduce the number of HTTP requests needed to make the page render—and you’ll significantly improve site performance.

## 14. Reduce the number of plugins you use on your site
Too many plugins slow your site,create security issues and often cause crashes and other technical difficulties.

Deactivate and delete any unnecessary plugins. Then weed out any pugins that slow your site speed.

## 15. Reduce redirects.
Redirects create additional HTTP requests and increase load time. So you want to keep them to a minimum.

To make sure a responsive redirect doesn't slow your site:

    Use a HTTP redirect to send users with mobile user agents directly to the mobile equivalent URL without any intermediate redirects.
    
    Include the <link rel=”alternate”> markup in your desktop pages to identify the mobile equivalent URL so Googlebot can discover your mobile pages.






