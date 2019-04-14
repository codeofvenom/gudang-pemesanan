
<?php
require 'fpdf.php';

class PDF extends FPDF
{
    // Page header
    //public $nomer='90';
    public $header_text;

    public function setHeader($text)
    {
        $this->header_text = $text;
    }

    public function Header()
    {
        // Logo
        $this->Image(base_url().'assets/img/XXX.png', 8, 4, 20);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 12);
        // Move to the right
        // $this->Cell(100);
        // Title
        $this->Cell(0, 0, 'PEMERINTAH KOTA XXX', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 10, 'DINAS PENGENDALIAN PENDUDUK', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 0, 'DAN KELUARGA BERENCANA', 0, 0, 'C');
        $this->SetFont('Arial', 'B', 8);
        $this->Ln();
        $this->Cell(0, 8, 'Jl. XXX No 110 B XXX Kode Pos xxx', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 0, 'Website:www.XXXkota.go.id email:disdaldukkb@XXXkota.go.id', 0, 0, 'C');
        $this->Ln();
        $this->Cell(0, 12, '------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 0, 'C');
        $this->SetFont('Arial', 'B', 60);
        $this->SetTextColor(255, 192, 203);
        // $this->RotatedText(70,170,'Dinas Pengendalian Penduduk dan Keluarga Berencana',30);
        // Line break
        $this->Ln(20);
    }

    public function setNumber($number)
    {
        $this->nomer = $number;
    }

    // Page footer
    public function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(10);
        $this->Cell(0, 10, 'Catatan : ', 0, 0, 'L');
    }

    public function RotatedText($x, $y, $txt, $angle)
    {
        //Text rotated around its origin
        $this->Rotate($angle, $x, $y);
        $this->Text($x, $y, $txt);
        $this->Rotate(0);
    }

    public $angle = 0;

    public function Rotate($angle, $x = -1, $y = -1)
    {
        if ($x == -1) {
            $x = $this->x;
        }
        if ($y == -1) {
            $y = $this->y;
        }
        if ($this->angle != 0) {
            $this->_out('Q');
        }
        $this->angle = $angle;
        if ($angle != 0) {
            $angle *= M_PI / 180;
            $c = cos($angle);
            $s = sin($angle);
            $cx = $x * $this->k;
            $cy = ($this->h - $y) * $this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm', $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy));
        }
    }

    public function _endpage()
    {
        if ($this->angle != 0) {
            $this->angle = 0;
            $this->_out('Q');
        }
        parent::_endpage();
    }
}

$w = array(20, 20, 30, 15, 15, 15, 25, 25, 25);
$header = array('Tanggal', 'No Batch', 'Uraian', 'Masuk', 'Keluar', 'Sisa', 'Harga Satuan', 'Saldo', 'Sumber Dana');
$pdf = new PDF();
// $pdf->setHeader($no_pinjam);
$pdf->AliasNbPages();
$pdf->AddPage();
$nama_barang = '';
foreach ($persediaan as $row) {
    $nama_barang = $row->nama_barang;
}
$pdf->SetFont('Times', 'B', 12);
// $pdf->Cell(50);
$pdf->Cell(0, 10, 'KARTU PERSEDIAAN', 0, 1, 'C');
$pdf->Cell(0, 10, ''.$nama_barang, 0, 1, 'C');
$pdf->Ln(5);
$pdf->SetFont('Times', 'B', 10);
for ($i = 0; $i < count($header); ++$i) {
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
}
$pdf->Ln();
if (!empty($persediaan)) {
    $jumlahsisa = 0;
    $jumlahharga = 0;
    foreach ($persediaan as $row) {
        $pdf->SetFont('Times', '', 8);
        $pdf->Cell($w[0], 6, ''.$row->tanggal, 'LR');
        $pdf->Cell($w[1], 6, ''.$row->no_batch, 'LR');
        $pdf->Cell($w[2], 6, ''.$row->nama_instansi, 'LR');
        if ($row->keterangan == 'masuk') {
            $pdf->Cell($w[3], 6, ''.$row->jumlah, 'LR', 0, 'C');
            $jumlahsisa = $jumlahsisa + $row->jumlah;
            $jumlahharga = $jumlahharga + ($row->jumlah * $row->harga);
        } else {
            $pdf->Cell($w[3], 6, '', 'LR', 0, 'C');
        }
        if ($row->keterangan == 'keluar') {
            $pdf->Cell($w[4], 6, ''.$row->jumlah, 'LR', 0, 'C');
            $jumlahsisa = $jumlahsisa - $row->jumlah;
            $jumlahharga = $jumlahharga - ($row->jumlah * $row->harga);
        } else {
            $pdf->Cell($w[4], 6, '', 'LR', 0, 'C');
        }
        $pdf->Cell($w[5], 6, ''.$jumlahsisa, 'LR', 0, 'C');
        $pdf->Cell($w[6], 6, ''.$row->harga, 'LR');
        $pdf->Cell($w[7], 6, ''.$jumlahharga, 'LR');
        $pdf->Cell($w[8], 6, ''.$row->sumber_dana, 'LR');
        $pdf->Ln();
    }
}
$pdf->Cell(array_sum($w), 0, '', 'T');
$pdf->Output('D', 'Kartu Persediaan.pdf');
?>
