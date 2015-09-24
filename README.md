#Knowledge Base component
> PHP Component to build a knowledge base from your Markup files easily. 

##Installation
Make sure you have composer installed in your computer.

Install the component launching the following composer command
```shell
$ composer require lin3s/knowledge-base
```
    
Install a theme for your knowledge base. We use the following at LIN3S:
```shell
$ composer require lin3s/knowledge-base-GFMTemplate
```
Add the docs in markdown format to a folder that you will later add to the config. 
    
##Integrating it in your codebase
A front controller should look like this:
```php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use LIN3S\KnowledgeBase\Configuration;
use LIN3S\KnowledgeBase\Controller\PageController;
use LIN3S\KnowledgeBaseGFMTemplate\Template;
use Symfony\Component\HttpFoundation\Request;

$buildPath = realpath(dirname(__FILE__)) . '/build'; // Folder where all the cached files will be stored
$docsPath = realpath(dirname(__FILE__)) . '/docs';   // Folder where all the docs are located

$configuration = new Configuration($docsPath, $buildPath, new Template());
$controller = new PageController($configuration);

$request = Request::createFromGlobals();

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $request->server->get('REQUEST_URI'))) {
    $response = $controller->assetAction($request);
} else {
    $response = $controller->documentAction($request);
}
$response->send();
``` 
> You can edit as you want to match your needs

##Generating the docs
LIN3S Knowledge Base, caches all the markdown files already generated in html to improve performance.

Just create a `docs.php` file that includes the following to generate menu and html from your markdown files:

```php
#!/usr/bin/env php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use LIN3S\KnowledgeBase\Configuration;
use LIN3S\KnowledgeBaseGFMTemplate\Template;
use LIN3S\KnowledgeBase\Registry\GeneratorRegistry;
use LIN3S\KnowledgeBase\Generator\HTMLGenerator;
use LIN3S\KnowledgeBase\Generator\MenuGenerator;
use LIN3S\KnowledgeBase\Builder\DocumentationBuilder;
use LIN3S\KnowledgeBase\Iterator\DocumentIterator;

$docsPath = realpath(dirname(__FILE__)) . '/../docs';
$buildPath = realpath(dirname(__FILE__)) . '/../build';

$configuration = new Configuration($docsPath, $buildPath, new Template());

$generatorRegistry = new GeneratorRegistry();
$generatorRegistry
    ->add('html', new HTMLGenerator($this->configuration))
    ->add('route', new MenuGenerator($this->configuration));

$builder = new DocumentationBuilder(
    new DocumentIterator($this->configuration),
    $generatorRegistry
);

$builder->build();
```

Now just launch the following commands:
```shell
    $ php docs.php
```
> You need to create a symbolic link to match the assets url with the template you are using.

##Theming
To create your own theme just create a class that implements `LIN3S\KnowledgeBase\Templating\TemplateInterface` and
pass it as third parameter to the Configuration class used by the command and the controller.

Template rendering works together with the `Loader` classes. This class is responsible of fetching all required data
to generate a page. The `DefaultLoader` generates an array with the menu tree, the document converted to html and the
configuration class.

###Document building
Entry point for document building is located in `DocumentationBuilder` class that receives a `DocumentIterator` and an
instance of `GeneratorRegistry`. The first one contains the reference to all documents that need to be parsed, the
second one contains all the generators required in the building process.

If you want to add a custom Generator implement `GeneratorInterface` and add it to the `GeneratorRegistry` before
passing it to the `DocumentationBuilder`. 
> "Generation docs" section above, describes the whole process with code.
