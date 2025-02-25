<?php

/**
 *
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
 * @since         CakePHP(tm) v 2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * This is email configuration file.
 *
 * Use it to configure email transports of CakePHP.
 *
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *  Mail - Send using PHP mail function
 *  Smtp - Send using SMTP
 *  Debug - Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email. Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {

    public $default = array(
        'host' => 'ssl://smtp.gmail.com',
        'from' => array('celri@tvu.edu.vn' => 'Hệ thống TLC Portal - CELRI - TVU'),
        'port' => 465,
        'username' => 'celri@tvu.edu.vn',
        'password' => 'celri123@',
        'transport' => 'Smtp',
        'timeout' => 2000
    );
    
     public $gmail = array(
        'host' => 'ssl://smtp.gmail.com',
        'from' => array('celri@tvu.edu.vn' => 'Hệ thống TLC Portal - CELRI - TVU'),
        'port' => 465,
        'username' => 'celri@tvu.edu.vn',
        'password' => 'celri123@',
        'transport' => 'Smtp',
        'timeout' => 2000
    );
     
        
}
