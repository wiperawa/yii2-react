<?php

namespace bTokman\react;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Script\Event;
use Composer\Script\ScriptEvents;

final class BundlesBuilder implements PluginInterface, EventSubscriberInterface
{

    /**
     * @var Composer $composer
     */
    private $composer;

    /**
     * @var IOInterface $io;
     */
    private $io;

    /**
     * Returns list of events the plugin is subscribed to.
     *
     * @return array list of events
     */
    public static function getSubscribedEvents()
    {
        return [
            ScriptEvents::POST_AUTOLOAD_DUMP => [
                ['onPostAutoloadDump', 0],
            ],
        ];
    }

    /**
     * @param Composer $composer
     * @param IOInterface $io
     */

    public function activate( Composer $composer,  IOInterface $io)
    {
        $io->write('start bTokman');
        $this->composer = $composer;
        $this->io = $io;
    }

    /**
     * @param Event $event
     */
    public function onPostAutoloadDump(Event $event)
    {

        $this->io->write('[bTokman/yii2-react] Start building React bundle..');
    }

    public function deactivate( Composer $composer, IOInterface $io)
    {
        // do nothing
    }

    public function uninstall( Composer $composer, IOInterface $io)
    {
        // do nothing
    }
}
