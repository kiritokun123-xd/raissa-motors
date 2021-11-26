<?php

class PDF extends FPDF
{
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(5);
    // Título
    $this->Cell(30,30,'IMAGEN',1,0,'C');
    $this->SetFont('Arial','B',8);
    $this->Cell(48,30,'PROFESIONALES COSECA SAC',1,0,'C');
    $this->SetFont('Arial','B',12);
    $this->Cell(55,30,'ORDEN DE PRODUCCION',1,0,'C');
    $this->Cell(50,30,'FECHA:',1,0,'L');
    // Salto de línea
    $this->Ln(35);
    $this->Cell(5);
    $this->Cell(80,20,'FECHA DE ENTREGA:',1,1,'L');
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}



function WriteHTML($html)
{
    // Intérprete de HTML
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Etiqueta de apertura
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Etiqueta de cierre
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modificar estilo y escoger la fuente correspondiente
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Escribir un hiper-enlace
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
}

$html = 'Ahora puede imprimir fácilmente texto mezclando diferentes estilos: <b>negrita</b>, <i>itálica</i>,
<u>subrayado</u>, o ¡ <b><i><u>todos a la vez</u></i></b>!<br><br>También puede incluir enlaces en el
texto, como <a href="http://www.fpdf.org">www.fpdf.org</a>, o en una imagen: pulse en el logotipo.';
$info = 'Cliente:______________________     Distribuidor:_______________________<br><br><br>Serie:________________________     Motor:___________________________';

$pdf = new PDF();
// Primera página

$pdf->AddPage();
$pdf->Image('../public/imagenes/logopedido.png',15,10,30,30,'','http://www.raissamotors.com');
$pdf->SetLeftMargin(15);
$pdf->SetFontSize(14);
$pdf->Cell(90,15,'Cliente:',0,0,'L');
$pdf->Cell(90,15,'Distribuidor:',0,1,'L');
$pdf->Cell(90,15,'Serie:',0,0,'L');
$pdf->Cell(90,15,'Motor:',0,1,'L');
$pdf->Ln(5);
$pdf->Cell(90,15,'VEHICULO:',1,0,'L');
$pdf->Cell(90,15,'TIPO:',1,1,'L');
$pdf->Cell(90,15,'COLOR:',1,0,'L');
$pdf->Cell(90,15,'FARO:',1,1,'L');
$pdf->Cell(90,15,'TACOMETRO:',1,0,'L');
$pdf->Cell(90,15,'ARO:',1,1,'L');
$pdf->Cell(90,15,'PARRILA:',1,0,'L');
$pdf->Cell(90,15,'TECHO:',1,1,'L');
$pdf->Cell(90,15,'ASIENTO:',1,0,'L');
$pdf->Cell(90,15,'MICA:',1,1,'L');
$pdf->Cell(90,15,'MASCARA:',1,0,'L');
$pdf->Ln(20);
$pdf->Cell(90,8,'EQUIPAMIENTO:',1,0,'L');
$pdf->Cell(90,8,'ADICIONALES:',1,1,'L');
$pdf->Cell(90,40,'',1,0,'L');
$pdf->Cell(90,40,'',1,1,'L');
$pdf->Output();
?>