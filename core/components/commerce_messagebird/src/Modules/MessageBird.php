<?php
namespace modmore\CommerceMessageBird\Modules;
use modmore\Commerce\Admin\Widgets\Form\DescriptionField;
use modmore\Commerce\Modules\BaseModule;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Twig\Loader\ChainLoader;
use Twig\Loader\FilesystemLoader;

require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

class MessageBird extends BaseModule {

    public function getName()
    {
        $this->adapter->loadLexicon('commerce_messagebird:default');
        return $this->adapter->lexicon('commerce_messagebird');
    }

    public function getAuthor()
    {
        return 'Mark Hamstra';
    }

    public function getDescription()
    {
        return $this->adapter->lexicon('commerce_messagebird.description');
    }

    public function initialize(EventDispatcher $dispatcher)
    {
        // Load our lexicon
        $this->adapter->loadLexicon('commerce_messagebird:default');

        // Add the xPDO package, so Commerce can detect the derivative classes
        $root = dirname(dirname(__DIR__));
        $path = $root . '/model/';
        $this->adapter->loadPackage('commerce_messagebird', $path);

        // Add template path to twig
        /** @var ChainLoader $loader */
        $loader = $this->commerce->twig->getLoader();
        $loader->addLoader(new FilesystemLoader($root . '/templates/'));
    }

    public function getModuleConfiguration(\comModule $module)
    {
        $fields = [];

        $fields[] = new DescriptionField($this->commerce, [
            'description' => $this->adapter->lexicon('commerce_messagebird.module_description'),
        ]);

        return $fields;
    }
}
