# JShrink for TYPO3

[![License](http://img.shields.io/packagist/l/maximilian-walter/typo3-jshrink.svg)](https://github.com/maximilian-walter/typo3-jshrink/blob/master/LICENSE.txt)
[![Latest Stable Version](https://img.shields.io/github/release/maximilian-walter/typo3-jshrink.svg)](https://packagist.org/packages/maximilian-walter/typo3-shrink)
[![Total Downloads](http://img.shields.io/packagist/dt/maximilian-walter/typo3-jshrink.svg)](https://packagist.org/packages/maximilian-walter/typo3-shrink)

The TYPO3 core can compress CSS and JavaScript files to improve frontend-performance. Unlike CSS files the JavaScript files are
only compressed with GZip and not minified. This extension integrates the popular library
[JShrink](https://github.com/tedious/JShrink) to add this feature also for JavaScript.

This extension aims to be as lightweight as possible. Hopefully the minification will one day be integrated into the core to make this
extension obsolete.

It is no replacement for much more powerful extensions like [Scriptmerger](https://typo3.org/extensions/repository/view/scriptmerger)!


## Compatibility

This extension uses a [XClass](https://wiki.typo3.org/XCLASS) to hijack the method
```\TYPO3\CMS\Core\Resource\ResourceCompressor::compressJsFile()``` and add the call to JShrink. This could break with every update
of TYPO3, because this method is not defined as stable API. Please keep this in mind while your updating your instance.

If you have a better idea how JShrink could be integrated into the core, please drop me a line or create a pull request.

Currently supported versions: TYPO3 7.6.0 - 8.1.0 (newer versions should work, but are not tested yet) 


## Usage

Install the extension and make sure compression for JavaScript-files is [activated via Typoscript](https://docs.typo3.org/typo3cms/TyposcriptReference/Setup/Config/Index.html#compressjs):

```
page.config.compressJs = 1
```


## Installing

### Composer

Installing JShrink can be done through a variety of methods, although Composer is recommended.

```
"require": {
  "maximilian-walter/typo3-jshrink": "~1.0"
}
```

The JShrink-library will be automatically installed as dependency.


### TER

This extension can also be installed via TER. You have to search for the name "jshrink". If you do so, please make sure the class
```\JShrink\Minifier``` can be used.


## Contribution

Feel free to add issues or pull requests on GitHub. Code changes should follow the [Coding Guidelines of TYPO3](https://docs.typo3.org/typo3cms/CodingGuidelinesReference/).


## License

This extension is licensed under the GNU General Public License, either version 2 of the License, or any later version.

For the full copyright and license information, please read the LICENSE.txt file that was distributed with this source code.


## Attributions

The heavy lifting is done by the popular library JShrink - https://github.com/tedious/JShrink

The icon is based on Font Awesome by Dave Gandy - http://fontawesome.io

Thanks to all contributors for all your work on those great projects!