<?php
  use Dompdf\Dompdf;
  /**
   *
   */
  class Pdf extends Base
  {

    function __construct()
    {
      $this->dom = new Dompdf();
    }

    public function generate_pdf()
    {
      $this->dom->loadHtml('sd fasd fas dfasd fasd fasdf asd fhello world');
      $this->dom->setPaper('A4', 'landscape');
      $this->dom->render();
      $this->dom->stream('my.pdf',array('Attachment'=>0));
    }

  }
