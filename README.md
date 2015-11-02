#KretaVCS
>VCS component of Kreta

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/96d83523-63d2-45c3-9d7c-45f20fdcd89d/mini.png)](https://insight.sensiolabs.com/projects/96d83523-63d2-45c3-9d7c-45f20fdcd89d)
[![Build Status](https://travis-ci.org/kreta-plugins/VCS.svg?branch=master)](https://travis-ci.org/kreta-plugins/VCS)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kreta-plugins/VCS/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kreta-plugins/VCS/?branch=master)
[![Total Downloads](https://poser.pugx.org/kreta/vcs/downloads)](https://packagist.org/packages/kreta/vcs)
[![Latest Stable Version](https://poser.pugx.org/kreta/vcs/v/stable.svg)](https://packagist.org/packages/kreta/vcs)
[![Latest Unstable Version](https://poser.pugx.org/kreta/vcs/v/unstable.svg)](https://packagist.org/packages/kreta/vcs)

##Tests
This library is completely tested by **[PHPSpec][1], SpecBDD framework for PHP**.

Because you want to contribute or simply because you want to throw the tests, you have to type the following command
in your terminal.
```
$ vendor/bin/phpspec run -fpretty
```
##Contributing
This library follows PHP coding standards, so pull requests need to execute the Fabien Potencier's [PHP-CS-Fixer][5]
and Marc Morera's [PHP-Formatter][6]. Furthermore, if the PR creates some not-PHP file remember that you have to put
the license header manually. In order to simplify we provide a Composer script that wraps all the commands related with
this process.
```bash
$ composer run-script cs
```

There is also a policy for contributing to this project. Pull requests must be explained step by step to make the
review process easy in order to accept and merge them. New methods or code improvements must come paired with
[PHPSpec][1] tests.

If you would like to contribute it is a good point to follow Symfony contribution standards, so please read the
[Contributing Code][2] in the project documentation. If you are submitting a pull request, please follow the guidelines
in the [Submitting a Patch][3] section and use the [Pull Request Template][4].

If you have any doubt or maybe you want to share some opinion, you can use our **Gitter chat**.

[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/kreta/kreta?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

##Credits
Kreta VCS is created by:
>
**@benatespina** - [benatespina@gmail.com](mailto:benatespina@gmail.com)<br>
**@gorkalaucirica** - [gorka.lauzirika@gmail.com](mailto:gorka.lauzirika@gmail.com)

##Licensing Options
[![License](https://poser.pugx.org/kreta/vcs/license.svg)](https://github.com/kreta-plugins/VCS/blob/master/LICENSE)

[1]: http://www.phpspec.net/
[2]: http://symfony.com/doc/current/contributing/code/index.html
[3]: http://symfony.com/doc/current/contributing/code/patches.html#check-list
[4]: http://symfony.com/doc/current/contributing/code/patches.html#make-a-pull-request
[5]: http://cs.sensiolabs.org/
[6]: https://github.com/mmoreram/php-formatter
