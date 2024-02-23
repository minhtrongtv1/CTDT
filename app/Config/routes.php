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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

Router::connect('/', array('controller' => 'dashboards', 'action' => 'home'));
Router::connect('/help', array('controller' => 'dashboards', 'action' => 'help'));
Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
Router::connect('/signin', array('controller' => 'users', 'action' => 'signin'));
Router::connect('/changePassword', array('controller' => 'users', 'action' => 'changePassword'));
Router::connect('/myprofile', array('controller' => 'users', 'action' => 'myprofile'));
Router::connect('/update_my_profile', array('controller' => 'users', 'action' => 'update_my_profile'));
Router::connect('/google-oath', array('controller' => 'users', 'action' => 'goToGoogleLogin'));
Router::connect('/googleLoginCalback', array('controller' => 'users', 'action' => 'googleLoginCalback'));


/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
