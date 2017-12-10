<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!doctype html>
<html lang="en">

<head>
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <?= $this->Html->meta('icon') ?>
    <!-- VENDOR CSS -->
    <?= $this->Html->css('./bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('./font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('./linearicons/style.css') ?>
    <?= $this->Html->css('./chartist/css/chartist-custom.css') ?>
    <!-- MAIN CSS -->
    <?= $this->Html->css('./main.css') ?>
    <?= $this->Html->css('./demo.css') ?>
    <?= $this->Html->script('./vendor/jquery/jquery.min.js')?>
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <?= $this->Html->image("logo-m.jpeg", ["alt" => "Logo", 'class'=>'img-responsive logo'])?>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">5</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                                <li><a href="#" class="more">See all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?= $this->Html->image("user.png", ["alt" => "Avatar", 'class'=>'img-circle'])?>
                            <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                <?= $this->Html->link('<i class="lnr lnr-exit"></i> <span>Cerrar Sessiòn</span>', ['controller'=>'cops', 'action' => 'logout'], ['escape' => false]) ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="#" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li>
                            <?= $this->Html->link(__('<i class="lnr lnr-code"></i> <span>Policias</span>'), ['controller'=>'cops', 'action' => 'index'],['escape'=>false]) ?>
                        </li>
                        <li>
                            <?= $this->Html->link(__('<i class="lnr lnr-code"></i> <span>Comisarias</span>'), ['controller'=>'stations', 'action' => 'index'],['escape'=>false]) ?>
                        </li>

                        <li>
                            <?= $this->Html->link(__('<i class="lnr lnr-code"></i> <span>Mapa de Incidencias</span>'), ['controller'=>'stations', 'action' => 'map'],['escape'=>false]) ?>
                        </li>

                        <li>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                <?= $this->fetch('content') ?>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    
    <?= $this->Html->script('./vendor/bootstrap/js/bootstrap.min.js')?>
    <?= $this->Html->script('./vendor/jquery-slimscroll/jquery.slimscroll.min.js')?>
    <?= $this->Html->script('./klorofil-common.js')?>
</body>

</html>

