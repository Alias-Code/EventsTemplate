<?php

/*
 * Permet de situer le répértoire du fichier actuel
 */
namespace EventsTemplate\Listener;

use pocketmine\block\BlockLegacyIds;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;

/*
 * Création d'une class BlockBreakListener, celle-ci :
 *
 * Implémente la class Listener, présente lorsque l'on souhaite utiliser un evenement
 */
class BlockBreakListener implements Listener {

    /*
     * Se lance en fonction de l'utilité de l'évènement, dans ce cas, lorsque l'on casse un block
     *
     * Il comporte en paramètre une variable $event, initiée par la class BlockBreakEvent
     * Permettant ainsi d'accéder aux avantages de cette class via cette variable
     */
    public function onBlockBreak(BlockBreakEvent $event): void {

        /*
         * Permet d'obtenir le joueur qui casse le block
         */
        $player = $event->getPlayer();

        /*
         * Permet d'obtenir le block cassé par le joueur
         */
        $block = $event->getBlock();


        /*
         * Condition permettant de vérifier l'égalité entre deux valeurs
         *
         * 1. Id du block cassé
         * 2. Id que nous avons choisi
         *
         * Si les deux valeurs sont égales, alors le code dans la condition sera exécuté
         */
        if($block->getId() === BlockLegacyIds::STONE) {

            /*
             * Permet d'envoyer un message vert clair au joueur ayant cassé le block
             */
            $player->sendMessage("§aTu as cassé un block de pierre !");
        }
    }
}