<?php

  // Load env variables
  $dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
  $dotenv->load();

  // Connect to DB
  ORM::configure('mysql:host='.getenv('DB_HOST').';dbname='.getenv('DB_NAME').'');
  ORM::configure('username', getenv('DB_USER'));
  ORM::configure('password', getenv('DB_PASS'));
