<?php

/*
 * Permet de situer le répértoire du fichier actuel
 */
namespace EventsTemplate;

use EventsTemplate\Listener\BlockBreakListener;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

/*
 * Création d'une class Main, celle-ci :
 *
 * Hérite des fonctionnalités de la class PluginBase, permettant d'accéder aux fonctions du fichier, exemple : onEnable(...)
 * Implemente la class Listener, présente lorsque l'on souhaite utiliser un evenement
 */
class Main extends PluginBase implements Listener {

    /*
     * Permet d'accéder aux fonctions du fichier, exemple : setInstance(...)
     */
    use SingletonTrait;

    /*
     * Se lance lorsque le serveur s'allume, dans ce cas il permet :
     *
     * D'enregister tout les evenements présent dans la class Main
     * D'annoncer le fait que le plugin s'est bien lancé
     * D'appeler la fonction registerEvents(...)
     *
     */
    public function onEnable(): void {

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin EventsTemplate ON");

        $this->registerEvents();
    }


    /*
     * Se lance lorsque le serveur s'éteint, dans ce cas il permet :
     *
     * D'annoncer le fait que le plugin s'est bien éteint
     *
     */
    public function onDisable(): void {

        $this->getLogger()->info("Plugin EventsTemplate OFF");
    }

    /*
     * Enregistre l'instance de notre class Main, dans ce cas il permet :
     *
     * De pouvoir utiliser n'importe où les fonctions héritées ou non de notre class Main
     */
    public function onLoad(): void {

        self::setInstance($this);
    }

    /*
     * Se lance lorsqu'on l'appelle, dans ce cas il permet :
     *
     * 1. D'executer le code à l'intérieur de cette fonction
     * 2. Ce code permet d'enregistrer l'évènement que nous avons créé
     */
    public function registerEvents(): void {

        /*
         * Variable initiée par l'instance de notre class Main
         *
         * Permet de stocker la valeur en cache pour ne pas faire de répétition
         */
        $instance = Main::getInstance();

        $instance->getServer()->getPluginManager()->registerEvents(new BlockBreakListener(), $instance);
    }
}