# Turntable plugin for CakePHP

[![Build Status](https://travis-ci.com/t73biz/cakephp-turntable.svg?branch=master)](https://travis-ci.com/t73biz/cakephp-turntable)

## Description

Turntable is a [Foundation](https://foundation.zurb.com/) solution for CakePHP 3.x using 
[Foundation 6](https://packagist.org/packages/zurb/foundation).

The plugin includes a bake template theme that aligns with the default bake templates. It also includes the Foundation 6
assets and applies the appropriate classes to the structure. 

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require t73biz/turntable
```

This is followed by a command to install the plugin,
```
bin/cake plugin load Turntable
```
which will modify your ```App\Application::bootstrap``` method to load the Turntable Plugin.

The next step is to symlink the zurb/foundation distribution files with the command,
```
bin/cake glaze
```

### Glaze command options
The optional argument `--sass`,`-s` can be used to symlink the foundation scss assets as well. By default, only the css 
files for foundation dist are symlinked.
The optional argument `--clean`, `-c` can be used to cleanup the dist files symlinked to webroot. This can be used in 
conjunction with the `--sass` option to clean the sass files as well.


## Baking
The Turntable Plugin offers Foundation 6 compatible baking and can be invoked with the bake command option `-t Turntable`,
as in,
```
bin/cake bake template all -t Turntable
```
This will use the bake templates provided in the Turntable Plugin.