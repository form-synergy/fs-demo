<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Form Synergy Full Demo</title>

        <link 
            rel="stylesheet" 
            href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" 
            crossorigin="anonymous">
            <link rel="apple-touch-icon" sizes="57x57" href="//formsynergy.com/assets/icons/apple-icon-57x57.png">
            <link rel="apple-touch-icon" sizes="60x60" href="//formsynergy.com/assets/icons/apple-icon-60x60.png">
            <link rel="apple-touch-icon" sizes="72x72" href="//formsynergy.com/assets/icons/apple-icon-72x72.png">
            <link rel="apple-touch-icon" sizes="76x76" href="//formsynergy.com/assets/icons/apple-icon-76x76.png">
            <link rel="apple-touch-icon" sizes="114x114" href="//formsynergy.com/assets/icons/apple-icon-114x114.png">
            <link rel="apple-touch-icon" sizes="120x120" href="//formsynergy.com/assets/icons/apple-icon-120x120.png">
            <link rel="apple-touch-icon" sizes="144x144" href="//formsynergy.com/assets/icons/apple-icon-144x144.png">
            <link rel="apple-touch-icon" sizes="152x152" href="//formsynergy.com/assets/icons/apple-icon-152x152.png">
            <link rel="apple-touch-icon" sizes="180x180" href="//formsynergy.com/assets/icons/apple-icon-180x180.png">
            <link rel="icon" type="image/png" sizes="192x192" href="//formsynergy.com/assets/icons/android-icon-192x192.png">
            <link rel="icon" type="image/png" sizes="32x32" href="//formsynergy.com/assets/icons/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="96x96" href="//formsynergy.com/assets/icons/favicon-96x96.png">
            <link rel="icon" type="image/png" sizes="16x16" href="//formsynergy.com/assets/icons/favicon-16x16.png">
            <meta name="msapplication-TileColor" content="#ffffff">
            <meta name="msapplication-TileImage" content="//formsynergy.com/assets/icons/ms-icon-144x144.png">
            <meta name="theme-color" content="#ffffff">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            body {
                background: linear-gradient(rgba(62, 23, 155, 0.64) 0%, rgba(21, 111, 191, 0.62) 50%), linear-gradient(to right, rgba(15, 109, 191, 0.65) 20%, rgba(130, 36, 227, 0.25) 50%);
                background-position: left top;
                background-size: cover;
                overflow-y: hidden;
                height: 100vh;
                max-height: 100vh;
            }

            .bg-white-transparent {
                background-color: rgba(73, 80, 87, 0.64) !important;
            }
    
            header {
                text-align: center;
                margin: 4rem;
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                z-index: 200;
                height: 5rem;
            }

            .logo {
                color: white;
                font-size: 2.5rem;
                text-shadow: 0 1px 1px #3333336b;
                display: inline-flex;
                margin: auto;
            }

            .logo img {
                margin: 0.5rem;
            }

            .title-logo {
                vertical-align: middle;
            }

            .logo-interactive {
                opacity: 0.5;
                transition: all 0.5s;
            }

            body:not(.panel-active) #cards {
                margin-top: 10rem;
                position: relative;
                z-index: 100;
                opacity: 1;
                transition: opacity 1.7s, overflow 0.2s, height 0.2s cubic-bezier(.77, .59, .25, .6);
            }

            body:not(.panel-active) #svg {
                top: 15rem;
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                transition: all 0.2s cubic-bezier(.77, .59, .25, .6);
            }

            body.panel-active #cards {
                margin-top: 10rem;
                position: inherit;
                z-index: 100;
                opacity: 0;
                transition: opacity 0.5s, overflow 0.2s, height 0.2s cubic-bezier(.77, .59, .25, .6);
            }

            body.panel-active #svg {
                top: 0rem;
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                transition: all 0.2s cubic-bezier(.77, .59, .25, .6);
            }

            body:not(.panel-active) #panel-button {
                display: none;
                transition: all 0.6s cubic-bezier(.77, .59, .25, .6);
            }

            body.panel-active #panel-button {
                display: block;
                z-index: 100;
                transition: all 0.4s cubic-bezier(.77, .59, .25, .6);
            }

            #svg svg g:not(.active) circle {
                opacity: 0;
                fill: #fff;
                transition: fill 0.2s, opacity 0.5s cubic-bezier(.78, .14, .06, .54);
            }

            #svg svg g.active circle {
                opacity: 0.5;
                fill: #4D296D;
                transition: fill 0.2s, opacity 0.5s cubic-bezier(.78, .14, .06, .54);
            }

            #svg svg g:not(.active) path {
                opacity: 0.2;
                transition: all 0.5s cubic-bezier(.78, .14, .06, .54);
            }

            #svg svg g.active path {
                opacity: 1;
                transition: all 0.5s cubic-bezier(.78, .14, .06, .54);
            }
            .round-corners {
                border-radius: 0.25rem;
            }
        
        </style>
    <?php

        /**
         * Included in this demo
         *
         * Via FormSynergy PHP API
         * - Register and verify a domain
         * - Create a strategy
         * - Create modules
         *      - From packages
         *      - From scratch
         *      - Connecting and chain linking modules
         *
         * - Create objectives
         *
         * Include the FormSynergy javaScript library
         * - Instantiate
         * - Autoload scripts and style sheets
         * - Heart beat
         */

        /**
         * This package requires the FormSynergy PHP API
         * The PHP API is required as dependency, just in case you can
         * install it via composer: composer require form-synergy/php-api
         */
        require_once 'vendor/autoload.php';

        /**
         * Enable session manager
         */
        \FormSynergy\Session::enable();

        /**
         * Import the FormSynergy class
         */
        use \FormSynergy\Fs as FS;

        /**
         * Define a directory to store transaction
         */
         FS::Storage($variables['storage'][0], $variables['storage'][1]);

        /**
         * API configuration
         */
        FS::Config([
            'version' => 'v1',
            'protocol' => 'https',
            'endpoint' => 'api.formsynergy.com',
            'apikey' => $variables['config']['apikey'],
            'secretkey' => $variables['config']['secretkey'],
            'max_auth_count' => 15,
        ]);

        /**
         * Create a resource storage
         */
        $resources = FS::Resource('fs-demo');

        /**
         * Let's check if the full demo script
         * already generated the required resources.
         */
        if (!$resources->Find('installed')->In('package')) {

            /**
             * Run the installation script
             */
            \FormSynergy\Fs_Demo::Run($variables);
            $resources->Store('package')->Data([
                'installed' => true,
            ]);
        }

        if ($siteid = $resources->Find('siteid')->In('website')) {
            echo '<meta name="fs:siteid" content="' . $siteid . '">';
        }
        ?>
    </head>

    <body class="panel-active">
        <header>
            <div class="logo fs-logo" id="fs-logo">
                <img src="https://formsynergy.com/assets/images/fs-logo.svg" height="40" width="auto" alt="Form Synergy">
                <h1 class="title-logo">
                    <span class="logo-interactive  strong">Form</span>
                    <span class="logo-mod">Synergy</span>
                </h1>
            </div>
            <div class="container text-center" id="panel-button">
                <a href="#cards"> <i class="fas fa-chevron-circle-down text-white-50 fa-3x"></i> </a>
            </div>
        </header>


        <!-- This file can be replaced. It simply demonstrate the implementation of data tags and the javaScript client -->
        <?php

            /**
             * Note: We are using PHP in this example simply because
             * all resources are created dynamically and  all responses
             * are stored upon creation.
             *
             * However, simple HTML with data attributes will do.
             */

            ?>

        <div class="container" id="cards">
            <div class="card-deck">

                <!-- Contact Form -->
                <div class="card" id="card-contact-us">
                    <div class="card-header">
                        <span class="strong h4 text-secondary">Contact Form</span>
                    </div>
                    <div class="card-body">
                        <?php
                            /**
                             * When installation has completed it's process,
                             * we stored all responses together.
                             * We also named the stored data all.
                             *
                             * The following examples return the exact same data:
                             * $resources->Find('contactForm', 'description')->In('all');
                             * $resources->Find('contactForm')->In('all')['description'];
                             *
                             * These examples will return an error:
                             * $resources->Find('packages', 'contact-form', 'moduleid')->In('all');
                             * 
                             * This will return the data if it exists:
                             * $resources->Find('packages', 'contact-form')->In('all')['moduleid'];
                             */
                            echo $resources->Find('description')->In('contactForm');

                            ?>
                    </div>
                    <div class="card-footer">
                        <button     
                            class="btn btn-secondary btn-block" 
                            data-fs-etag="click:contact-form" 
                            data-fs-params='{
                                "trigger": {
                                    "moduleid": "<?php echo $resources->Find('moduleid')->In('contactForm'); ?>"
                                }
                            }'> Try the Contact Form </button>
                    </div>
                </div>
                <!-- ./ Contact Form -->

                <!-- Request call back -->
                <div class="card">
                    <div class="card-header">
                        <span class="strong h4 text-secondary">Request a Call Back</span>
                    </div>
                    <div class="card-body">
                        <?php echo $resources->Find('description')->In('requestCallback'); ?>
                    </div>
                    <div class="card-footer">
                        <button 
                            class="btn btn-secondary btn-block" 
                            data-fs-etag="click:request-call-back" 
                            data-fs-params='{
                                "trigger": {
                                    "moduleid": "<?php echo $resources->Find('moduleid')->In('requestCallback'); ?>"
                                }
                        }'> Try requesting a call back </button>
                    </div>
                </div>
                <!-- ./ Request call back -->

                <!-- News letter subscription -->
                <div class="card">
                    <div class="card-header">
                        <span class="strong h4 text-secondary">News Letter Subscription</span>
                    </div>
                    <div class="card-body">
                        <?php echo $resources->Find('description')->In('newsLetterSubscription'); ?>
                    </div>
                    <div class="card-footer">
                        <button 
                            class="btn btn-secondary btn-block" 
                            data-fs-etag="click:news-letter-subscription"
                            data-fs-params='{
                            "trigger": {
                                "moduleid": "<?php echo $resources->Find('moduleid')->In('newsLetterSubscription'); ?>"
                            }
                        }'> Try the news letter subscription </button>
                    </div>
                </div>
                <!-- ./ News letter subscription -->
            </div>
            <div class="mt-5 p-4">
                <div class="text-center">
                       <span class="text-white-50 h2">Please visit our website for a full list of features.</span> <a class="btn btn-outline-light btn-lg ml-5" href="https://formsynergy.com/features/">FormSynergy.com</a>
                    </div>
                   
            </div>
        </div>
        <div id="svg">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="100%" height="100%" viewBox="0 0 796 414" enable-background="new 0 0 796 414" xml:space="preserve">
                <g id="dna">
                    <path 
                        opacity="0.4" 
                        fill-rule="evenodd" 
                        clip-rule="evenodd" 
                        fill="#FCEAD9" 
                        d="M262.1,401.9l12.1,5.1c5.8,2.5,12.5-0.1,14.9-5.7
                            l15.2-34.5l32.5-3.2l22.3,28.6c3.7,4.8,10.8,5.8,15.7,2.3l35.8-25.7c4.9-3.5,5.9-10.3,2.2-15.1l-20.4-26l20-45.1l6.8-4.9l18-13
                            l13.3-9.7l39-4.6l24.2,30.7c3.6,4.6,10.3,5.6,15,2.2l37.2-26.8c4.7-3.4,5.6-9.8,2-14.4l-6.7-8.5l46.4-38.3l6.4,8.2
                            c3.7,4.7,10.4,5.4,14.9,1.6l28.1-24l36.7,14.7l9.9,12.7l13.3,17.1l5,6.4l0.6,0l4.8,37.2l-3.1,7.8l-8.3,20.9l-6.2,15.7l-30.3,25
                            l-36-14.5c-5.3-2.2-11.5,0.6-13.8,6.1l-18.2,44.2c-2.4,5.6,0.2,12,5.6,14.2l9,3.7l23.2,9.4l10.8,4.4c5.4,2.2,11.7-0.6,13.9-6.3
                            l16.3-41l37.9-31.4l30.5,12.3c5.7,2.3,12.1-0.7,14.3-6.5l16.1-42.2c2.2-5.8-0.5-12.2-6.1-14.5l-34.4-13.7l-4.2-31.9l27.3-23.1
                            c4.6-3.9,5.4-10.9,1.7-15.6L746.5,158c-3.7-4.8-10.4-5.5-15-1.6l-24.8,21.1l-45.1-18.2l-5-6.5l-13.4-17.3l-10-12.9l-6.1-38.5
                            L656.5,59c4.4-3.8,5.1-10.5,1.6-15L630.3,7.9c-3.5-4.6-9.9-5.2-14.3-1.4l-34.6,29.8c-4.4,3.8-5,10.5-1.5,15.1l25.6,33l7.6,48
                            l-24.7,21.2c-4.6,3.9-5.2,10.9-1.5,15.7l4.8,6.2l-46.4,38.4l-6.2-7.8c-3.6-4.6-10.3-5.5-15-2.2l-34.1,24.7l-48.7,5.9l-20.4-26
                            c-3.8-4.8-10.8-5.8-15.8-2.1l-35.8,26c-4.9,3.6-5.9,10.4-2.1,15.2l23.2,29.5l-16.3,36.7l-13.2,9.6L343,336.1l-6.7,4.9l0,0.7
                            l-37.8,3.5l-7.9-3.4l-21-9.3l-15.7-6.9l-24.4-31.9l16.1-36.2c2.4-5.4-0.2-11.8-5.7-14.3l-11.7-5.4l16.3-39.9l10.6,4.2
                            c5.7,2.2,12.1-0.5,14.5-6.1l12.7-30.5l47.9-6.8l38.8,15.2c5.4,2.1,11.5-0.6,13.8-6L401,125c2.3-5.4-0.2-11.5-5.5-13.6l-9.4-3.7
                            l-23.8-9.3l-9.2-3.6c-5.3-2.1-11.5,0.6-13.8,6L324,137.3l-38.4,5.5l-15.2-6l-20.5-8l-7.7-3L211.6,87l12.6-30.7
                            c2.3-5.7-0.4-12.1-6-14.3l-40.8-15.9c-5.6-2.2-12.1,0.7-14.4,6.3l-13.8,33.8l-31.6,5.3L94.1,41.8c-3.8-4.8-10.9-5.6-15.7-1.7
                            L43,68.6c-4.9,4-5.8,11.2-1.9,16.1l21,26.4l-18.4,46.6L9.6,185.9c-4.7,3.9-5.5,10.9-1.7,15.5l29.7,36.8c3.7,4.6,10.5,5.2,15.2,1.2
                            l36.5-31c4.6-3.9,5.3-10.7,1.6-15.3l-24.7-31L80.8,125l13-10.8l17.4-14.4l6.5-5.4l36.8-6.4l0.2,0.6l7.6,3l20.3,8l15.1,5.9l25,31.6
                            l-14.4,34.7c-2.3,5.6,0.4,12,6,14.2l6.2,2.4l-16,38.5l-9.2-4.2c-5.7-2.6-12.3-0.3-14.7,5.2l-19.4,43.3c-2.4,5.5,0.2,12,6,14.5
                            l41.3,18.2l30.7,39.9l-13.6,30.7c-2.5,5.7,0.3,12.3,6.1,14.8l6.9,2.9L262.1,401.9z" />
                </g>
                <g id="icons">
                    <g id="contact-form">

                        <circle 
                            data-fs-el="@<?php echo $resources->Find('moduleid')->In('contactForm'); ?>"
                            data-fs-opt='{
                                    "placement": "right-start"
                            }' 
                            fill="#4D296D" 
                            cx="361.6" 
                            cy="135.2" 
                            r="27.5" />

                        <path 
                            fill="#F9F9F9"
                            d="M345.9,124.4v-2.3c0-0.5,0.4-0.9,0.9-0.9h27.5c0.5,0,0.9,0.4,0.9,0.9v2.3c0,0.5-0.4,0.9-0.9,0.9h-27.5
                                C346.3,125.3,345.9,124.9,345.9,124.4z M346.8,134.5h27.5c0.5,0,0.9-0.4,0.9-0.9v-2.3c0-0.5-0.4-0.9-0.9-0.9h-27.5
                                c-0.5,0-0.9,0.4-0.9,0.9v2.3C345.9,134.1,346.3,134.5,346.8,134.5z M346.8,143.7h27.5c0.5,0,0.9-0.4,0.9-0.9v-2.3
                                c0-0.5-0.4-0.9-0.9-0.9h-27.5c-0.5,0-0.9,0.4-0.9,0.9v2.3C345.9,143.3,346.3,143.7,346.8,143.7z" />
                        <path 
                            fill="#FFFFFF" 
                            d="M364.5,150.9h9.9c0.2,0,0.8-0.4,0.8-0.9v-2.3c0-0.5-0.5-0.9-0.7-0.9h-10c-0.2,0-0.8,0.4-0.8,0.9v2.3
                                C363.7,150.5,364.3,150.9,364.5,150.9z" />
                    </g>
                    <g id="itworks">
                    
                        <circle 
                            data-fs-el="@<?php echo $resources->Find('moduleid')->In('itWorks'); ?>" 
                            data-fs-opt='{
                                    "placement": "left-end",
                                    "size": "lg"
                            }' 
                            fill="#4D296D" 
                            cx="248.8" 
                            cy="163.7" 
                            r="27.5" />

                        <path 
                            fill="#FFFFFF"
                            d="M266.5,164.1h-2.9v-2.9c0-1.3-1.1-2.4-2.4-2.4h-11v-2.4h2.9c0.8,0,1.4-0.6,1.4-1.4v-8.6
                                c0-0.8-0.6-1.4-1.4-1.4h-8.6c-0.8,0-1.4,0.6-1.4,1.4v8.6c0,0.8,0.6,1.4,1.4,1.4h2.9v2.4h-11c-1.3,0-2.4,1.1-2.4,2.4v2.9h-2.9
                                c-0.8,0-1.4,0.6-1.4,1.4v8.6c0,0.8,0.6,1.4,1.4,1.4h8.6c0.8,0,1.4-0.6,1.4-1.4v-8.6c0-0.8-0.6-1.4-1.4-1.4h-2.9v-2.4h10.5v2.4
                                h-2.9c-0.8,0-1.4,0.6-1.4,1.4v8.6c0,0.8,0.6,1.4,1.4,1.4h8.6c0.8,0,1.4-0.6,1.4-1.4v-8.6c0-0.8-0.6-1.4-1.4-1.4h-2.9v-2.4h10.5
                                v2.4h-2.9c-0.8,0-1.4,0.6-1.4,1.4v8.6c0,0.8,0.6,1.4,1.4,1.4h8.6c0.8,0,1.4-0.6,1.4-1.4v-8.6C268,164.7,267.3,164.1,266.5,164.1z" />
                    </g>
                    <g id="hello-again">

                        <circle 
                            data-fs-el="@<?php echo $resources->Find('moduleid')->In('helloAgain'); ?>"
                            data-fs-opt='{
                                    "placement": "bottom-start",
                                    "size": "lg"
                            }' 
                            fill="#4D296D" 
                            cx="203.8" 
                            cy="265.2" 
                            r="27.5" />

                        <path 
                            fill="#FFFFFF" 
                            d="M203.9,245.4c-6.2,0-10.2,2.5-13.3,7c-0.6,0.8-0.4,1.9,0.4,2.5l3.3,2.5c0.8,0.6,1.9,0.5,2.6-0.3
                                c1.9-2.4,3.4-3.8,6.4-3.8c2.4,0,5.3,1.5,5.3,3.8c0,1.7-1.4,2.6-3.8,4c-2.7,1.5-6.4,3.4-6.4,8.2v0.8c0,1,0.8,1.9,1.9,1.9h5.6
                                c1,0,1.9-0.8,1.9-1.9v-0.4c0-3.3,9.7-3.5,9.7-12.4C217.4,250.5,210.4,245.4,203.9,245.4z M203.1,274.3c-3,0-5.4,2.4-5.4,5.4
                                c0,3,2.4,5.4,5.4,5.4s5.4-2.4,5.4-5.4S206.1,274.3,203.1,274.3z" />
                    </g>
                    <g id="whats-your-email">

                        <circle 
                            data-fs-el="@<?php echo $resources->Find('moduleid')->In('whatsYourEmail'); ?>"
                            data-fs-opt='{
                                    "placement": "top"
                            }' 
                            fill="#4D296D" 
                            cx="265.2" 
                            cy="368.5" 
                            r="27.5" />
                        <path 
                            fill="#FFFFFF"
                            d="M265.2,347.2c-11.8,0-21.3,9.5-21.3,21.3c0,11.8,9.5,21.3,21.3,21.3c4.1,0,8.2-1.2,11.7-3.5
                                c1-0.7,1.3-2.1,0.5-3l-0.9-1.1c-0.7-0.8-1.8-1-2.7-0.4c-2.5,1.6-5.5,2.5-8.6,2.5c-8.7,0-15.8-7.1-15.8-15.8
                                c0-8.7,7.1-15.8,15.8-15.8c8.6,0,15.8,5,15.8,13.8c0,3.3-1.8,6.9-5,7.2c-1.5,0-1.5-1.1-1.2-2.6l2-10.4c0.2-1.3-0.7-2.5-2-2.5H271
                                c-0.6,0-1.1,0.4-1.2,1l0,0c-1.3-1.5-3.5-1.9-5.2-1.9c-6.4,0-11.9,5.4-11.9,13c0,5.6,3.2,9.1,8.3,9.1c2.3,0,4.9-1.3,6.5-3.3
                                c0.8,2.9,3.5,2.9,6.1,2.9c9.4,0,12.9-6.2,12.9-12.7C286.5,354.7,277,347.2,265.2,347.2z M263.3,373.4c-1.9,0-3.1-1.3-3.1-3.5
                                c0-3.9,2.6-6.3,5-6.3c1.9,0,3.1,1.3,3.1,3.5C268.3,371,265.4,373.4,263.3,373.4L263.3,373.4z" />
                    </g>
                    <g id="dont-share-email">

                        <circle
                            data-fs-el="@<?php echo $resources->Find('moduleid')->In('dontWantToShareMyEmail'); ?>"
                            data-fs-opt='{
                                    "placement": "top",
                                    "size": "lg"
                            }' 
                            fill="#4D296D" 
                            cx="373.4" 
                            cy="356.9" 
                            r="27.5" />

                        <path 
                            fill="#FFFFFF"
                            d="M373.3,366.6l2.3,3.3c-0.7,0.1-1.5,0.1-2.2,0.1c-8.5,0-16-4.6-20-11.4c-0.6-1.1-0.6-2.4,0-3.5
                                c1.7-2.9,4.1-5.4,6.8-7.3l4.1,5.8c-0.4,1-0.6,2.1-0.6,3.2C363.7,362.2,368,366.5,373.3,366.6z M393.4,358.6
                                c-2.3,3.8-5.6,6.9-9.6,8.9l0,0l3,4.2c0.5,0.8,0.4,1.8-0.4,2.4l-0.9,0.7c-0.8,0.5-1.8,0.4-2.4-0.4L360,342
                                c-0.5-0.8-0.4-1.8,0.4-2.4l0.9-0.7c0.8-0.5,1.8-0.4,2.4,0.4l3.6,5.2c1.9-0.5,3.9-0.8,6-0.8c8.5,0,16,4.6,20,11.4
                                C394.1,356.2,394.1,357.5,393.4,358.6L393.4,358.6z M383.1,356.9c0-5.4-4.3-9.7-9.7-9.7c-1.3,0-2.5,0.2-3.6,0.7l1.4,1.9
                                c1.8-0.6,3.9-0.4,5.7,0.5h0c-1.7,0-3,1.4-3,3.1c0,1.7,1.4,3,3,3c1.7,0,3.1-1.4,3.1-3v0c1.3,2.5,1.2,5.5-0.6,7.9v0l1.4,1.9
                                C382.2,361.5,383.1,359.3,383.1,356.9z M371.5,364l-5.5-7.9C365.6,359.9,368.1,363.2,371.5,364z" />
                    </g>
                    <g id="hey-thanks">
                        <circle 
                            data-fs-el="@<?php echo $resources->Find('moduleid')->In('heyThanks'); ?>"
                            data-fs-opt='{
                                    "placement": "left-end"
                            }' 
                            fill="#4D296D" 
                            cx="407.7" 
                            cy="245.4" 
                            r="27.5" />

                        <path 
                            fill="#FFFFFF"
                            d="M408.1,229.3c9.1,0,16.5,7.4,16.5,16.5c0,9.1-7.4,16.5-16.5,16.5c-9.1,0-16.5-7.4-16.5-16.5
                                C391.6,236.7,398.9,229.3,408.1,229.3 M408.1,225.3c-11.3,0-20.5,9.2-20.5,20.5s9.2,20.5,20.5,20.5s20.5-9.2,20.5-20.5
                                S419.4,225.3,408.1,225.3z M413.3,236.5c-0.8,0-1.5,0.2-2.2,0.5h0c1.1,0,1.9,0.9,1.9,1.9c0,1.1-0.9,1.9-1.9,1.9
                                c-1.1,0-1.9-0.9-1.9-1.9v0c-0.3,0.6-0.5,1.4-0.5,2.2c0,2.6,2.1,4.6,4.6,4.6c2.6,0,4.6-2.1,4.6-4.6S415.9,236.5,413.3,236.5z
                                M402.8,236.5c-0.8,0-1.5,0.2-2.2,0.5h0c1.1,0,1.9,0.9,1.9,1.9c0,1.1-0.9,1.9-1.9,1.9s-1.9-0.9-1.9-1.9v0
                                c-0.3,0.6-0.5,1.4-0.5,2.2c0,2.6,2.1,4.6,4.6,4.6c2.6,0,4.6-2.1,4.6-4.6S405.3,236.5,402.8,236.5z M418.9,251.6
                                c1.6-2.1-1.6-4.5-3.2-2.3c-4.1,5.6-11.2,5.6-15.3,0c-1.6-2.1-4.7,0.2-3.2,2.3C402.9,259.3,413.2,259.4,418.9,251.6z" />
                    </g>
                    <g id="your-email-address" opacity="0.7">

                        <circle 
                            data-fs-el="@<?php echo $resources->Find('moduleid')->In('yourEmailAddress'); ?>" 
                            data-fs-opt='{
                                    "placement": "top"
                            }' 
                            fill="#4D296D" 
                            cx="306.5" 
                            cy="252.8" 
                            r="27.5" />

                        <path 
                            fill="#FFFFFF"
                            d="M324.9,248c0.3-0.2,0.7,0,0.7,0.4v15.3c0,2-1.6,3.6-3.6,3.6h-31c-2,0-3.6-1.6-3.6-3.6v-15.3
                                c0-0.4,0.4-0.6,0.7-0.4c1.7,1.3,3.9,2.9,11.5,8.5c1.6,1.1,4.2,3.6,6.9,3.6c2.7,0,5.4-2.4,6.9-3.6C321,250.9,323.2,249.3,324.9,248
                                z M306.5,257.6c1.7,0,4.2-2.2,5.5-3.1c9.9-7.2,10.7-7.8,12.9-9.6c0.4-0.3,0.7-0.9,0.7-1.4v-1.4c0-2-1.6-3.6-3.6-3.6h-31
                                c-2,0-3.6,1.6-3.6,3.6v1.4c0,0.6,0.3,1.1,0.7,1.4c2.3,1.8,3,2.4,12.9,9.6C302.3,255.4,304.8,257.6,306.5,257.6L306.5,257.6z" />
                    </g>
                    <g id="news-letter">

                        <circle
                            data-fs-el="@<?php echo $resources->Find('moduleid')->In('newsLetterSubscription'); ?>"
                            data-fs-opt='{
                                    "placement": "right"
                            }' 
                            fill="#4D296D" 
                            cx="48.2" 
                            cy="199.1" 
                            r="27.5" />

                        <path
                            data-fs-el="@<?php echo $resources->Find('moduleid')->In('enforceNewsLetterSubscription'); ?>"
                            data-fs-opt='{
                                    "size": "lg",
                                    "placement": "right"
                            }' 
                            fill="#FFFFFF"
                            d="M66.5,185.8h-32c-0.9,0-1.7,0.7-1.7,1.7v0.6H30c-0.9,0-1.7,0.7-1.7,1.7v18.8c0,2.1,1.7,3.9,3.9,3.9h32.6
                                c1.8,0,3.3-1.5,3.3-3.3v-21.5C68.1,186.6,67.4,185.8,66.5,185.8z M32.2,209c-0.3,0-0.6-0.2-0.6-0.6v-17.1h1.1v17.1
                                C32.8,208.8,32.5,209,32.2,209z M48.5,207.9H38c-0.5,0-0.8-0.4-0.8-0.8v-0.6c0-0.5,0.4-0.8,0.8-0.8h10.5c0.5,0,0.8,0.4,0.8,0.8
                                v0.6C49.3,207.6,49,207.9,48.5,207.9z M62.9,207.9H52.4c-0.5,0-0.8-0.4-0.8-0.8v-0.6c0-0.5,0.4-0.8,0.8-0.8h10.5
                                c0.5,0,0.8,0.4,0.8,0.8v0.6C63.7,207.6,63.3,207.9,62.9,207.9z M48.5,201.3H38c-0.5,0-0.8-0.4-0.8-0.8v-0.6c0-0.5,0.4-0.8,0.8-0.8
                                h10.5c0.5,0,0.8,0.4,0.8,0.8v0.6C49.3,200.9,49,201.3,48.5,201.3z M62.9,201.3H52.4c-0.5,0-0.8-0.4-0.8-0.8v-0.6
                                c0-0.5,0.4-0.8,0.8-0.8h10.5c0.5,0,0.8,0.4,0.8,0.8v0.6C63.7,200.9,63.3,201.3,62.9,201.3z M62.9,194.7H38c-0.5,0-0.8-0.4-0.8-0.8
                                v-2.8c0-0.5,0.4-0.8,0.8-0.8h24.9c0.5,0,0.8,0.4,0.8,0.8v2.8C63.7,194.3,63.3,194.7,62.9,194.7z" />
                    </g>
                    <g id="request-call-back">

                        <circle 
                            data-fs-el="@<?php echo $resources->Find('moduleid')->In('requestCallback'); ?>"
                            data-fs-opt='{
                                    "placement": "left"
                            }' 
                            fill="#4D296D" 
                            cx="624" 
                            cy="165.8" 
                            r="27.5" />

                        <path 
                            fill="#FFFFFF" 
                            d="M638.8,151.3l-6.5-1.5c-0.7-0.2-1.4,0.2-1.7,0.9l-3,7c-0.3,0.6-0.1,1.3,0.4,1.7l3.8,3.1
                                c-2.2,4.8-6.2,8.8-11,11l-3.1-3.8c-0.4-0.5-1.1-0.7-1.7-0.4l-7,3c-0.7,0.3-1,1-0.9,1.7l1.5,6.5c0.2,0.7,0.8,1.2,1.5,1.2
                                c16,0,28.9-12.9,28.9-28.9C640,152.1,639.5,151.5,638.8,151.3z" />
                    </g>
                </g>
            </svg>
        </div>

        <!-- Display address interaction if enabled -->
        <div 
            data-fs-el="@<?php echo $resources->Find('moduleid')->In('mailingAddress'); ?>" 
            data-fs-opt='{
                "display": fixed",
                "placement": "centered"
        }'></div>

        <!-- 
            Include jQuery.
            Note: version fs-2.1 does not depend on jQuery, 
            however jQuery is used in this demo.
        -->
        <script 
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js">
        </script>

        <!--
            Please visit our JavaScript client page for other versions.
            https://formsynergy.com/javascript-client/
        -->
        <script 
            src="https://formsynergy.com/fs-js/r/fs-2.1.js" 
            id="fs-2.1">	
        </script>

        <script>
        (function ($, root, undefined) {
                
            $(function(){
                'use strict';
                setTimeout( function(){
                    $('body').removeClass('panel-active');
                    $('html, body').animate({
                        scrollTop: 0
                    },500);
                });

                /**
                 * Some javaScript to add handle the display.
                 */
                $(document).on('click', 'button[data-fs-etag]', function (e) {
                    $('body').addClass('panel-active');
                });

                $(document).on('click', '[href="#cards"]', function (e) {
                    $('body').removeClass('panel-active');
                    $('#svg svg .active').removeClass('active');
                    $('html, body').animate({
                        scrollTop: 0
                    },100);
                    e.preventDefault();
                });

                function remove_active(el) {
                    if ($(el).length < 1) {
                        $('#svg svg .active').removeClass('active');
                        $('body').removeClass('panel-active');
                        remove_active(el);
                    } else {
                        setTimeout(function () {
                            remove_active(el);
                        }, el.delay);
                    }
                }

                function svgIcons(e) {
                    // Remove className active.
                    let active = document.querySelectorAll('#svg svg .active');
                    for ( let each of active ) {
                        each.classList.remove('active');
                    }
                    // Retrieve params.
                    let button = e.target,
                        params = button.dataset.fsParams ? JSON.parse(button.dataset.fsParams) : false;
    
                        if( params ) {
                            // Find position element, add className active.
                            var fsEl = document.querySelector('[data-fs-el="@'+params.trigger.moduleid+'"]');
                            if( fsEl ) {
                                fsEl.parentNode.classList.add('active');
                            }
                        }
                }



                /**
                 * Instantiate the Form Synergy class
                 */
                const FS = new FormSynergy();

                /**
                 * Heartbeat is disable by default,
                 * Simply provide a time laps inbetween requests
                 */
                //FS.heartBeat(10000)

                /**
                 *  When engaged, any event triggered on data-fs-etag, 
                 *  will trigger an interaction.
                 */
                FS.engage();
                
                /**
                 * In order to programmatically create an interaction,
                 * simply use the bind method.
                 *
                 * NOTE: el and opt, can only be set using the bind method,
                 * if using fixed display. 
                 * 
                 */
                FS.bind(
                    '#fs-logo', // Add event listener on element
                    'click:welcome-demo', { // Set e:tag as event:tagName
                    trigger: {
                        moduleid: "<?php echo $resources->Find('moduleid')->In('contactForm'); ?>" // Module id
                    },
                    el: "#fs-logo", // Set position @ element
                    opt: {
                        display: "fixed",
                        size: "lg",
                        placement: "centered", // Placement.
                        theme: 'white'
                    } 
                }); // Delay display in milliseconds.

                /**
                * Localizing modules.
                * If connection difficulties with the Form Synergy service are encountered, 
                * interaction data can still be retrieved by localizing the modules.
                *
                * Simply replace the endpoint with your own, where you can capture
                * and store any data generated by interactions.
                */
                FS.setLocalMode({
                    request: {
                        // Include additional variables to a request
                        nonce: 'swef234dsrfsdsdfsdf'
                    },
                    endPoint: 'https://demo.formsynergy.com/packages/fs-demo/test/',
                });

                /**
                * POSITIONS:
                *
                * Positioning interactions will shift based on the positions, display and position area!
                * In order to shift the position of an interaction, 
                * they are two options:
                * - 1 Set offset position for each interaction 
                *   Add offset within the position opt "data-fs-opt"
                *   data-fs-opt='{
                *        "placement": "right",
                *        "up": "",
                *        "down": "",
                *        "left": "",
                *        "right": ""
                *  }' 
                * - 2 Set offset position for all interactions 
                */
                FS.offsetPositions({
                    up: '',
                    down: '',
                    left: '',
                    right: ''
                });

 
                /**
                 * Hooks can provide additional control.
                 * Available Hooks
                    let hooks = [
                        'interaction:start',
                        'request:start',
                        'response',
                        'interaction:onsubmit',
                        'interaction:ondismiss',
                        'interaction:creating',
                        'interaction:loading',
                        'interaction:removing',
                        'interaction:removed',
                        'interaction:active',
                        'interaction:adjusting', 
                        'engaging', 
                        'engaged'
                    ];

                    for( let hook of hooks) {
                        FS.on(hook, (data, eType) => {
                            console.log(eType);
                            console.log(data);
                        });
                    }
                */
                FS.on('interaction:ondismiss', (e, eType) => {
                    svgIcons(e.event);
                   
                }).on('interaction:onsubmit', (e, eType) => {
                    svgIcons(e.event);

                }).on('interaction:click', (e, eType)=> {
                    svgIcons(e.event);
                });
                
                /**
                 * Modules can be connected to a callback method.
                 * 
                 * When connecting to a callback using fs-php client
                 * cb: Must precede the callback name
                 * Example: cb:testCallback
                 */
                FS.createCallback('testCallback', (response, element) => {

                    /**
                     * contents(), only supports text.
                     */
                    // element.contents('Hello World'); 

                    /**
                     * createElement(), uses a virtual DOM technique.
                     * Supports: JSON, and Object
                     */
                    element.createElement({
                        tagName: "div",
                        attrs: {
                            class: "alert alert-info"
                        },
                        children: [{
                            tagName: "p",
                            children: [{
                                tagName: "strong",
                                children: [{
                                    tagName: "content",
                                    content: "Example alert"
                                }]
                            }]
                        }]
                    });
                });

            });
        
        })( jQuery, this ); 
       
        </script>
    </body>
</html>
