<?php
/*
 * @author Anakeen
 * @license http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License
 * @package FDL
*/

function fusers_importform(Action & $action)
{
    $usage = new ActionUsage($action);
    $usage->setDefinitionText("Get form option to import accounts");
    
    $usage->verify();

    $uprefs=json_decode($action->getParam("FUSERS_PORTPREF", "{}"),true);
    $options= array("stopOnError","dryRun");
    foreach ($options as $pref) {
        $action->lay->set("select_$pref", !empty($uprefs["import"][$pref])?"selected":"");
    }
    if (empty($uprefs["import"])) {
        $action->lay->set("select_dryRun", "select");
    }
    $action->lay->set("statusKey", uniqid("imacct"));
}
