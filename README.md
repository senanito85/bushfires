# CodeIgniter Bootstrap

[![Join the chat at https://gitter.im/sjlu/CodeIgniter-Bootstrap](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/sjlu/CodeIgniter-Bootstrap?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Bundles the following packages together.

* [CodeIgniter](https://github.com/bcit-ci/CodeIgniter)
* [CodeIgniter Rest Server](https://github.com/chriskacerguis/codeigniter-restserver)
* [Bootstrap](https://github.com/twbs/bootstrap)
* [Font Awesome](https://github.com/FortAwesome/Font-Awesome)
* [lodash](https://github.com/lodash/lodash)

## Use

If you're planning on just using/developing with CodeIgniter Bootstrap, don't clone the repository. Instead, use these steps to get a pre-compiled version of it.

* Download the latest [package](https://github.com/sjlu/CodeIgniter-Bootstrap/releases/download/1.0.4/CodeIgniter-Bootstrap.zip)
    * Or alternatively download another [release](https://github.com/sjlu/CodeIgniter-Bootstrap/releases)
* Use like any other [CodeIgniter install](http://codeigniter.com/user_guide/installation/index.html)

## Requirements

1. PHP 5.4 or greater
2. CodeIgniter 3.0+
3. Apache 2.3
4. Mysql 5.7

_Note: for 1.7.x support download v2.2 from Downloads tab_


## Important Update on 3.0.0

Please note that version 2.0.0 is in the works, and is considered a breaking change (per SemVer).  As CI 2.1.0 now has native support for Composer, this library will be moving to be composer based.

Take a look at the "development" branch to see what's up.

## Build

If you plan on extending the build process, you should follow these steps. This will only work on a _*nix_ machine and not on a Windows machine.

* Go to Document root
cd /var/www/html/

* First clone this reposistory
```
git clone https://github.com/senanito85/bushfires.git
cd bushfires
```

* Run the makefile
```
make
```

* Unzip the build
```
unzip bushfires.zip
```

## Docs

Check out the [Wiki](https://github.com/senanito85/bushfires/wiki) for information and CodeIgniter guides.

## License

MIT with [CodeIgniter Amendments](http://codeigniter.com/user_guide/license.html)
