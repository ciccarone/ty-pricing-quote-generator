<?php require __DIR__ . '/app/header.php';

  // Base
  $process = new Pdf();
  echo $process->generate_pdf();
