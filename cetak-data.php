 <!-- section download-->
    <?php
    require_once __DIR__ . '/vendor/autoload.php';
    require 'function.php';
    $result = query("SELECT * FROM dosen ORDER BY id");

    session_start();
    if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
    }
    use Mpdf\Mpdf;
       
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->SetHeader('Laporan Dosen');
        $mpdf->SetFooter('Halaman {PAGENO}');
        $mpdf->SetDisplayMode('fullpage');

        $html = '
        <h1 style="text-align:center;">Daftar Dosen</h1>
        <div id="container-table">
    <table border="1" cellpadding="10" cellspacing="0" >
      <tr>
      <th class="table-heading">No.</th>
      <th class="table-heading">Foto</th>
        <th class="table-heading">Nama</th>
        <th class="table-heading">NIDN</th>
        <th class="table-heading">Email</th>
        <th class="table-heading">Prodi</th>
      </tr>
      ';
      
      foreach ($result as $row) : 
        $html .= '<tr>';
        $html .= '<td>'.$row["id"].'</td>';
        $html .= '<td><img src="http://localhost/projek/img/'.$row["foto"].'" width="50"></td>';
        $html .= '<td>'.$row["nama"].'</td>';
        $html .= '<td>'.$row["NIDN"].'</td>';
        $html .= '<td>'.$row["email"].'</td>';
        $html .= '<td>'.$row["prodi"].'</td>';
        $html .= '</tr>';
      endforeach;
      $html .= '
      </table>
      </div>';
      $mpdf->WriteHTML($html);
$mpdf->Output( 'Laporan Dosen.pdf', \Mpdf\Output\Destination::DOWNLOAD);  
        
    ?>