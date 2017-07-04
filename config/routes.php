<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */

Router::defaultRouteClass('Route');

Router::addUrlFilter(function ($params, $request) {
    if (isset($request->params['lang']) && !isset($params['lang'])) {
        $params['lang'] = $request->params['lang'];
    } elseif (!isset($params['lang'])) {
        $params['lang'] = Router::getRequest()->session()->read('lang'); // set your default language here
    }
    return $params;
});


$lang = 'en';
if (Router::getRequest()->session()->check('Config.language')) {
    $lang = Router::getRequest()->session()->read('Config.language');
}

Router::redirect('/', "/$lang/");

Router::connect('/:lang/', ['controller' => 'Home', 'action' => 'index']);

Router::connect('/:lang/:controller', ['action' => 'index']);

Router::connect('/:lang/:controller/about', ['action' => 'about']);

Router::connect('/:lang/:controller/search', ['action' => 'search']);

Router::connect('/:lang/:controller/profile', ['action' => 'profile']);

Router::connect('/:lang/:controller/settings', ['action' => 'settings']);

Router::connect('/:lang/:controller/add', ['action' => 'add']);

Router::connect('/:lang/:controller/view/:id', ['action' => 'view'],  ['id' => '\d+', 'pass' => ['id']]);

Router::connect('/:lang/:controller/edit/:id', ['action' => 'edit'],  ['id' => '\d+', 'pass' => ['id']]);

Router::connect('/:lang/:controller/delete/:id', ['action' => 'delete'],  ['id' => '\d+', 'pass' => ['id']]);

Router::connect('/:lang/:controller/roledata_list/:id', ['action' => 'roledata_list'], ['id' => '\d+', 'pass' => ['id']]);

Router::connect('/:lang/:controller/login', ['action' => 'login']);

Router::connect('/:lang/:controller/logout', ['action' => 'logout']);

Router::connect('/:lang/:controller/accountLog', ['action' => 'accountLog']);

Router::connect('/:lang/:controller/equipment_item/:id/:slug', ['action' => 'equipment_item'], ['pass' => ['id', 'slug'], 'id' => '\d+']);
Router::connect('/:lang/:controller/del_equip', ['action' => 'del_equip']);
Router::connect('/:lang/:controller/edit_equipment', ['action' => 'edit_equipment']);

Router::connect('/:lang/:controller/start', ['action' => 'start']);
Router::connect('/:lang/:controller/find', ['action' => 'find']);
Router::connect('/:lang/:controller/addRoledataEquipment', ['action' => 'addRoledataEquipment']);
Router::connect('/:lang/:controller/addGuildMember', ['action' => 'addGuildMember']);
Router::connect('/:lang/:controller/view_sprite/:id', ['action' => 'view_sprite'], ['id' => '\d+', 'pass' => ['id']]);
Router::connect('/:lang/:controller/edit_sprite/:id', ['action' => 'edit_sprite'], ['id' => '\d+', 'pass' => ['id']]);
Router::connect('/:lang/:controller/members/:id', ['action' => 'members'], ['id' => '\d+', 'pass' => ['id']]);
Router::connect('/:lang/:controller/del_member', ['action' => 'del_member']);
Router::connect('/:lang/:controller/addFamilyMember', ['action' => 'addFamilyMember']);
Router::connect('/:lang/:controller/edit_skill', ['action' => 'edit_skill']);
Router::connect('/:lang/:controller/add_skill/:id', ['action' => 'add_skill'], ['id' => '\d+', 'pass' => ['id']]);
Router::connect('/:lang/:controller/delete_skill', ['action' => 'delete_skill']);
Router::connect('/:lang/:controller/related_skills/:id', ['action' => 'related_skills'], ['id' => '\d+', 'pass' => ['id']]);
Router::connect('/:lang/:controller/related_cities/:id', ['action' => 'related_cities'], ['id' => '\d+', 'pass' => ['id']]);
Router::connect('/:lang/:controller/related_commerce_rank/:id', ['action' => 'related_commerce_rank'], ['id' => '\d+', 'pass' => ['id']]);
Router::connect('/:lang/:controller/related_guild_roledata/:id', ['action' => 'related_guild_roledata'], ['id' => '\d+', 'pass' => ['id']]);
Router::connect('/:lang/:controller/nurslings/:id', ['action' => 'nurslings'], ['id' => '\d+', 'pass' => ['id']]);
Router::connect('/:lang/:controller/init', ['action' => 'init']);
Plugin::routes();
