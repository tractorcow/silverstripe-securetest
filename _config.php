<?php


// Automatically load the controller if enabled
if(SecureTest::$auto_load)
    DataObject::add_extension ('Page', 'SecurePageDecorator');