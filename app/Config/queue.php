<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$config['Queue']['sleeptime'] = 10;
$config['Queue']['gcprob'] = 10;
$config['Queue']['defaultworkertimeout'] = 120;
$config['Queue']['defaultworkerretries'] = 4;
$config['Queue']['workermaxruntime'] = 0;
$config['Queue']['exitwhennothingtodo'] = false;
$config['Queue']['cleanuptimeout'] = 2592000; // 30 days