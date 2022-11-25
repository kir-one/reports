
<?php

	// include autoloader
	require_once 'dompdf/autoload.inc.php';

	// reference the Dompdf namespace
	use Dompdf\Dompdf;
	use Dompdf\Options;
	use Dompdf\FontMetrics;

	$options = new Options(); 

	$id = $_POST['ID'];
	$file_name = "report";

	// assign investigador id
	$link = "http://localhost/pdf_sample.php?valueID=$id";

	// instantiate and use the dompdf class
	$html= file_get_contents($link);
	$dompdf = new Dompdf();
	$dompdf->getOptions()->setChroot("C:\\laragon\\www");
	$dompdf->loadHtml ($html);

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'portrait');
	$dompdf->render();

	// Render the HTML as PDF
	$text = "Documento no oficial";
	$canvas = $dompdf->get_canvas();
	$fontMetrics = new FontMetrics($canvas, $options);
	$w = $canvas->get_width();
	$h = $canvas->get_height();
	$font = $fontMetrics->getFont('Arial, sains row');

	$txtHeight = $fontMetrics->getFontHeight($font, 14);
	$textWidth = $fontMetrics->getTextWidth($text, $font, 14);
	$canvas->set_opacity(.2, "Multiply");
	$x = (($w-$textWidth)/2);
	$y = (($h-$txtHeight)/2);

	$canvas->page_text($x, $y, $text, $font, 14);

	// Output the generated PDF to Browser
	$dompdf->stream($file_name.".pdf");

?>