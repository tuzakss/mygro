<?php

ob_start();
session_start();

include('sampQueryAPI.php');

define("SUNUCUADI", "Rise Roleplay");
define("FORUMURL", "https://www.rise-roleplay.com");
define("ANARENK", "#800000");
define("IKINCILRENK", "#800000");
define("SUNUCUIP","52.143.151.153");

$mysql = mysqli_connect("localhost", "root", "", "sunucudb");

if(!$mysql)
{
   die("Veritabanı: " . mysqli_connect_error());
}

$sayfa = @$_GET["sayfa"];


echo '

<!DOCTYPE html>

<html lang="tr">

   <head>

      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="author" content="jensen, Allen">

      <title>', SUNUCUADI ,' - ', SayfaAdi($sayfa),'</title>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

      <link rel="stylesheet" href="style.css">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

     <script src="https://code.jquery.com/jquery-3.4.1.js"> </script>

      <script  src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


      <style>
      .tablolist:hover
      {
        background-color: ', ANARENK,';
        color: #fff;
      }
      ::-webkit-scrollbar-thumb
      {
        background: ', ANARENK,'; 
      }
      .ucpbuton
      {
        background-color: ', ANARENK,';
        color: #fff;
      }

      .butonhover a:hover
      {
         background-color: ', ANARENK,';
         color: #fff;
      }
      .listbadge
      {
         background-color: ', ANARENK,';
         color: #fff;
      }
      .ikonlar
      {
         font-size: 42px;
         color: ', ANARENK,';
      }
      .nav-bordered
      {
         background-color: ', ANARENK,';
         margin-bottom: -1px;
      }
      #sidebar
      {
         min-width: 250px;
         max-width: 250px;
         background: ', ANARENK,';
         color: #fff;
         transition: all 0.3s;
      }
      #sidebar ul li a:hover
      {
         color: ', ANARENK,';
         background: #fff;
      }
      a.download
      {
       background: #fff;
       color: ', ANARENK,';
      }
      #sidebar .sidebar-header
      {
         padding: 20px;
         background: ', IKINCILRENK,';
      }
      #sidebar ul li.active>a,
      a[aria-expanded="true"]
      {
         color: #fff;
         background: ', IKINCILRENK,';
      }
      ul ul a
      {
         font-size: 0.8em !important;
         padding-left: 30px !important;
         background: ', IKINCILRENK,';
      }
      button.article,
      button.article:hover
      {
         background: ', IKINCILRENK,' !important;
         color: #fff !important;
      }
      ::-webkit-scrollbar-thumb:hover
      {
         background: ', IKINCILRENK,'; 
      }
      .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active
      {
         margin-bottom: 1px;
         color: #fff;
         background-color: ', IKINCILRENK,';
         border-color: #dee2e6 #dee2e6 #fff;
      }



      </style>

   </head>

   <body>
      <div class="wrapper">

         <nav id="sidebar">

            <div class="fixed-left sidebar-header">

               <img width="200" src="grafik/logo.png"/>

            </div>

            <ul class="list-unstyled components">

               <li class="active">

                  <a href="index.php">Anasayfa</a>

               </li>';
               if(!isset($_SESSION['giris']))
               {

               }
               else
               {
                  echo '<li>

                     <a href="index.php?sayfa=karakter">Karakter Bilgileri</a>

                  </li>

                  ';

                  if(AdminKontrol(1))
                  {

                     echo '<li><a href="#adminozel" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admin Özel</a>

                     <ul class="collapse list-unstyled" id="adminozel">

                        <li>

                           <a href="index.php?sayfa=adminozel">Admin Özel</a>

                        </li>


                        <li>

                           <a href="index.php?sayfa=karaktersorgula">Karakter Sorgula</a>

                        </li>

                     </ul>

                  </li>';
                  }
               }

            if(isset($_POST['cikisyap']))
            {
               session_destroy();
               header('location: index.php?sayfa=giris');
            }

            echo '</ul>

            <ul class="list-unstyled CTAs">

               <li>

                  <a target="_blank" href="', FORUMURL,'" class="download">Forum</a>

               </li>
               ', !isset($_SESSION['giris']) ? '' : '<li>

               <form action="index.php" method="post">
               <button type="submit" name="cikisyap" class="btn article">Çıkış Yap</button>
               </form>
               </li>' ,'
               <li class="text-center">

                  <span>Rise RPG © 2020</span>

               </li>

            </ul>

         </nav>

         <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light">

               <div class="container-fluid">

          
                  
                  <div class="mobilenavbar">';
                  echo '
                 
                  <div class="topnav">
                    <a  href="#"><i color="', ANARENK,'" class="fa fa-home"></i> Anasayfa', SayfaAdi($sayfa) == 'Anasayfa' ? '' : '&nbsp;<i color="'. ANARENK.'" class="fas fa-angle-right" aria-hidden="true"></i>&nbsp;'. SayfaAdi($sayfa) ,'
                    </a>
                  </a>
                    <div id="myLinks">
                    ';
                     if(!isset($_SESSION['giris']))
                     {

                     }
                     else
                     {
                        echo '

                           <a href="index.php?sayfa=karakter">Karakter Bilgileri</a>

                      

            
                      
                              <a href="index.php?sayfa=adminozel">Admin Özel</a>


                      

                              <a href="index.php?sayfa=karaktersorgula">Karakter Sorgula</a>
                        <hr>

                        <a  style="color: ', IKINCILRENK,'" href="#">', $_SESSION['karakteradi'],'</a>
                  
                        <form action="index.php" method="post">
                           <button style="margin-left: 15px;" type="submit" name="cikisyap" class="btn article">Çıkış Yap</button>
                        </form>                   
                     
                        <hr>
                        
                          ';
                     }
  
  
  echo '
  

  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>



           
                  ';
             
                  echo '</div>
                  
                  

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">



                     <ul class="nav navbar-nav ">

                        <li>

                           <a href="index.php"><i color="', ANARENK,'" class="fa fa-home"></i> Anasayfa</a>', SayfaAdi($sayfa) == 'Anasayfa' ? '' : '&nbsp;<i color="'. ANARENK .'" class="fas fa-angle-right" aria-hidden="true"></i>&nbsp;'. SayfaAdi($sayfa) ,'

                        </li>


                     </ul>

                  
                  <a class="" href="#">';


                    echo '&nbsp;</a><div class="dropdown">';

                    if(!isset($_SESSION['giris']))
                    {
                     echo '<button class="text-white ucpbuton btn" href="index.php" role="button">Ziyaretçi</button>';
                    }
                    else
                    {
                     echo '
               
         
                  <button  type="button" class="ucpbuton kadi btn dropdown-toggle" data-toggle="dropdown">
                        <span class="pr-4">', $_SESSION['karakteradi'],'</span>
                        </button>
                        <div class="dropdown-menu butonhover">
                        <form action="index.php" method="post">
                        <button style="background-color:#fff; padding-left: 45px; padding-right: 45px;" type="submit" name="cikisyap" class="btn">Çıkış Yap</button>
                     </form>
                        </div>';
                    }
                    echo '</div>
                  </div>
               </div>
            </nav>';

         if(!isset($_SESSION['giris']) && $sayfa != 'hesapolustur')
         {
            Giris();
         }
         else
         {
            switch($sayfa)
            {
               case 'karakter': Karakter($_SESSION['karakteradi']); break;
               //case 'hesapolustur': HesapOlustur(); break;
               //case 'karakterbasvurusu': KarakterBasvurusu(); break;
               //case 'basvurugonder': BasvuruGonder(); break;
               //case 'basvurukontrol': BasvuruKontrol(); break;
               case 'adminozel': AdminOzel(); break;
               case 'karaktersorgula': KarakterSorgula(); break;
               //case 'basvurular': Basvurular(); break;
               case 'giris': Giris(); break;
               //case 'basvuruislem': BasvuruIslem(); break;
               default: Anasayfa(); break;
            }
         }



      echo '

         </div>

      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

   </body>

</html>

';


function Anasayfa()
{
   
   
      global $mysql;
      $karakterler = mysqli_query($mysql, "select count(*) from rp_accounts");
      $banlar = mysqli_query($mysql, "select count(*) from rp_blacklist");
      $birlikler = mysqli_query($mysql, "select count(*) from rp_factions");
      

      $bankasorgu = mysqli_query($mysql, "select SUM(BankMoney) from rp_accounts ");
      $bankapara = mysqli_fetch_row($bankasorgu)[0];
      $parasorgu = mysqli_query($mysql, "select SUM(PocketMoney) from rp_accounts ");
      $para = mysqli_fetch_row($parasorgu)[0];

      $ekonomi = $bankapara + $para;
      


      $evler = mysqli_query($mysql, "select count(*) from rp_houses ");
      $araclar = mysqli_query($mysql, "select count(*) from rp_vehicles ");
      $isyerleri = mysqli_query($mysql, "select count(*) from rp_companies ");



   
    echo '  <div class="row">

               <div class="col-md-6 col-xl-3">

                  <div class="card">

                     <div class="card-body">

                        <div class="single-widget-area d-flex align-items-center justify-content-between">

                           <div class="profit-icon">

                              <i class="ikonlar fa fa-dollar-sign"></i>

                           </div>

                           <div class="total-profit">

                              <h6 class="mb-0">Ekonomi</h6>

                              <div class="text-right counter font-30 font-weight-bold" data-comma-separated="true">
                       ';
                          echo $ekonomi;
                       
                       echo '
                       
                       </div>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-md-6 col-xl-3">

                  <div class="card">

                     <div class="card-body">

                        <div class="single-widget-area d-flex align-items-center justify-content-between">

                           <div class="profit-icon">

                              <i class="ikonlar fa fa-home"></i>

                           </div>

                           <div class="total-profit">

                              <h6 class="mb-0">Toplam Ev</h6>

                              <div class="text-right counter font-30 font-weight-bold" data-comma-separated="true">';
                       
                           while($ev=mysqli_fetch_array($evler))
            
                           {
                              echo ' '.$ev[0].' ';
                              
                           }
                       
                       echo '
                       </div>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-md-6 col-xl-3">

                  <div class="card">

                     <div class="card-body">

                        <div class="single-widget-area d-flex align-items-center justify-content-between">

                           <div class="profit-icon">

                              <i class="ikonlar fa fa-car"></i>

                           </div>

                           <div class="total-profit">

                              <h6 class="mb-0">Toplam Araç</h6>

                              <div class="text-right counter font-30 font-weight-bold" data-comma-separated="true">
                       
                       ';
                       
                           while($arac=mysqli_fetch_array($araclar))
            
                           {
                              echo ' '.$arac[0].' ';
                              
                           }
                       
                       echo '
                       
                       </div>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <div class="col-md-6 col-xl-3">

                  <div class="card">

                     <div class="card-body">

                        <div class="single-widget-area d-flex align-items-center justify-content-between">

                           <div class="profit-icon">

                              <i class="ikonlar fa fa-briefcase"></i>

                           </div>

                           <div class="total-profit">

                              <h6 class="mb-0">Toplam İşyeri</h6>

                              <div class="text-right counter font-30 font-weight-bold" data-comma-separated="true">';
                        while($isyeri=mysqli_fetch_array($isyerleri))
            
                           {
                              echo ' '.$isyeri[0].' ';
                              
                           }
                       echo '
                       </div>

                           </div>

                        </div>

                     </div>

                  </div>

               </div>

            </div>';

            echo '  <div class="row">
                <div class="col-md-6 col-x4">
                  <div class="card mt-3">

                     <div class="card-header">

                        <h6 class="mb-0 text-center">Sunucu Bilgileri</h6>

                     </div>

                     <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between align-items-center">Toplam Karakter

                           <span class="badge listbadge">', VeriToplam("rp_accounts"),'</span>

                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">Yasaklı Oyuncu Sayısı

                           <span class="badge listbadge">', VeriToplam("rp_blacklist"),'</span>

                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">Toplam Birlik

                           <span class="badge listbadge">', VeriToplam("rp_factions"),'</span>

                        </li>

                     </ul>

                  </div>

               </div>

               <div class="col-md-6 col-x4">

                  <div class="card mt-3">

                     <div class="card-header">

                        <h6 class="mb-0 text-center">Sunucu Bilgileri</h6>

                     </div>

                     <ul class="list-group list-group-flush">';
                        $samp = new sampQueryAPI(SUNUCUIP, 7777);
                        if($samp->isOnline())
                        {
                           $sampbilgi = $samp->getInfo();
                           echo '<li class="list-group-item d-flex justify-content-between align-items-center">Sunucu Durumu
                                    <span class="badge listbadge">Aktif</span>
                                 </li>
                                 <li class="list-group-item d-flex justify-content-between align-items-center">SA-MP Sürümü

                                    <span class="badge listbadge">0.3.DL-R1</span>

                                 </li>

                                 <li class="list-group-item d-flex justify-content-between align-items-center">Oyuncu Sayısı

                                    <span class="badge listbadge">', $sampbilgi['players'],'</span>

                                 </li>

                                 <li class="list-group-item d-flex justify-content-between align-items-center">Mod Sürümü

                                    <span class="badge listbadge">', $sampbilgi['gamemode'],'</span>

                                 </li>';
                        }
                        else
                        {
                           echo '<li class="list-group-item d-flex justify-content-between align-items-center">Sunucu Durumu
                                    <span class="badge listbadge">Kapalı</span>
                                 </li>
                                 <li class="list-group-item d-flex justify-content-between align-items-center">SA-MP Sürümü

                                    <span class="badge listbadge">Bilinmiyor</span>

                                 </li>

                                 <li class="list-group-item d-flex justify-content-between align-items-center">Oyuncu Sayısı

                                    <span class="badge listbadge">Bilinmiyor</span>

                                 </li>

                                 <li class="list-group-item d-flex justify-content-between align-items-center">Mod Sürümü

                                    <span class="badge listbadge">Bilinmiyor</span>

                                 </li>';
                        }

                        echo '
                     </ul>

                  </div>

               </div>

            </div>

            <div class="row mb-3">

               <div class="col-md-6 col-x4">

                  <div class="card mt-3">

                     <div class="card-header">

                        <h6 class="mb-0 text-center">En İyi Karakterler</h6>

                     </div>

                     <table class="table">

                        <tr>

                           <th>#</th>

                           <th>Karakter Adı</th>

                           <th>Seviye</th>

                        </tr>
                  ';
                  global $mysql;
                  $topkarakter = mysqli_query($mysql, "select * from rp_accounts order by Level DESC LIMIT 10");
                  
                     $i=1;
                  while($eniyik = mysqli_fetch_array($topkarakter))
                        {
                  
                           echo '
                           <tr>
                           <th>'.$i++.'</th>
                                 <td>', $eniyik['Username'],'</td>
                                 <td>', $eniyik['Level'],'</td>
                                 
                  
                           </tr>';
                        
                     }
                       
                       
               echo '
                     </table>

                  </div>

               </div>

               <div class="col-md-6 col-x4">

                  <div class="card mt-3">

                     <div class="card-header">

                        <h6 class="mb-0 text-center">En İyi Birlikler</h6>

                     </div>

                     <table class="table">

                        <tr>

                           <th>#</th>

                           <th>Birlik ID</th>

                           <th>Birlik Adı</th>

                           <th>Üye Sayı</th>

                        </tr>';

                  global $mysql;
                  $topkarakter = mysqli_query($mysql, "SELECT *, (SELECT COUNT(*) FROM rp_accounts WHERE FactionID = factionID) as uyesayi FROM rp_factions ORDER BY uyesayi DESC");
                  
                     $i=1;
                  while($eniyik = mysqli_fetch_array($topkarakter))
                        {
                  
                           echo '
                           <tr>
                           <th>'.$i++.'</th>
                                 <td>', $eniyik['fcID'],'</td>
                                 <td>', $eniyik['fcName'],'</td>
                                 <td>', $eniyik['uyesayi'],'</td>
                           </tr>';
                        
                     }
                  echo '
                       

                     </table>

                  </div>

               </div>

            </div>

            </div>';

}

function Karakter($isim)
{
    global $mysql;
    $isim = $mysql->real_escape_string($isim);
    $karaktersqlid = VeriGetir("rp_accounts", "Username", $isim, "ID");
    echo '  <div class="row">

              <div class="col">

                <div class="card mt-3">

                  <div class="card-header text-center">

                    <img class="rounded-circle" src="grafik/skin/', VeriGetir("rp_accounts", "ID", $karaktersqlid, "Skin"),'.png">

                    <h6 class="mt-2 mb-0 text-center">', $isim,'</h6>

                  </div>

                        <div class="card-body">


                                    <ul class="nav nav-tabs nav-bordered nav-justified">

                                        <li class="nav-item">

                                            <a href="#detaylar" data-toggle="tab" aria-expanded="false" class="nav-link">

                                                Detaylar

                                            </a>

                                        </li>

                                        <li class="nav-item">

                                            <a href="#sicil-kaydi" data-toggle="tab"  class="nav-link ">';
                                            $sicil = VeriKontrol("rp_tickets", "Player", $karaktersqlid);

                                            echo 'Sicil Kaydı <span class="badge badge-danger">', $sicil == 0 ? "" : $sicil ,'</span>

                                            </a>

                                        </li>

                                        <li class="nav-item">

                                            <a href="#mal-varligi" data-toggle="tab" aria-expanded="false" class="nav-link">

                                                Mal Varlığı

                                            </a>

                                        </li>

                                    </ul>

                                    

                                    <div class="tab-content">

                                        <div class="tab-pane active" id="detaylar">

    
                                       
                              <div class="row">

                                           <div class="col-md-4"> 
                                           
                                           <div class="p-3">';                                  
                                           $birlikid = VeriGetir("rp_accounts", "ID", $karaktersqlid, "FactionID");

                                           
                                    echo '<h6 class="display-block"><i class="fa fa-user"></i> Karakter Seviyesi: <span class="badge listbadge">', VeriGetir("rp_accounts", "ID", $karaktersqlid, "Level"),' Level</span></h6>';

                                    
                                    echo '<h6 class="display-block"><i class="fa fa-user"></i> Oynama Saati: <span class="badge listbadge">', VeriGetir("rp_accounts", "ID", $karaktersqlid, "HoursOnline"),' Saat</span></h6>';

                                    echo '<h6 class="display-block"><i class="fa fa-user"></i> Doğum Yeri: <span class="badge listbadge">', VeriGetir("rp_accounts", "ID", $karaktersqlid, "Origin"),'</span></h6>';

                                    echo '<h6 class="display-block"><i class="fa fa-user"></i> Karakter Yaşı: <span class="badge listbadge">', VeriGetir("rp_accounts", "ID", $karaktersqlid, "Age"),' </span></h6>';
                                    $cinsiyet = VeriGetir("rp_accounts", "ID", $karaktersqlid, "Gender");
                                    if($cinsiyet == 1)
                                    {
                                       echo '<h6 class="display-block"><i class="fa fa-user"></i> Cinsiyet: <span class="badge listbadge">', ' Erkek</span></h6>';
                                    }
                                    else
                                    {
                                       echo '<h6 class="display-block"><i class="fa fa-user"></i> Cinsiyet: <span class="badge listbadge">', '  Kadın</span></h6>';
                                    }
                                    $songiris = VeriGetir("rp_accounts", "ID", $karaktersqlid, "LoginDate");
                                   if($songiris < 1)
                                   {  
                                      $starih = new DateTime($songiris);
                                      echo '<h6 class="display-block"><i class="fa fa-user"></i> Son Giriş: <span class="badge listbadge">', $starih->format('d-m-Y H:i:s'),' </span></h6>';  
                                   }
                                   else
                                   {  
                                   echo '<h6 class="display-block"><i class="fa fa-user"></i> Son Giriş: <span class="badge listbadge">', '  N/A</span></h6>';
                                   }   

                                    echo'
                                 </div>

                                 </div>

                                 <div class="col-md-5">

                                  <div class="p-3">';

                                 $birlikid = VeriGetir("rp_accounts", "ID", $karaktersqlid, "FactionID");                                         
      
                                 echo '<h6 class="display-block"><i class="fa fa-users"></i> Birlik Adı: <span class="badge listbadge">', $birlikid == -1 ? "Yok" : VeriGetir("rp_factions", "fcID", $birlikid, "fcName"),'</span></h6>';

                                  echo '<h6 class="display-block"><i class="fa fa-users"></i> Birlik Rütbesi: <span class="badge listbadge">', $birlikid == -1 ? "Yok" : VeriGetir("rp_accounts", "ID", $karaktersqlid, "FactionRank"),'</span></h6>';
                          
                                  echo '<h6 class="display-block"><i class="fa fa-users"></i> Birlik ID: <span class="badge listbadge">', $birlikid == -1 ? "Yok" : $birlikid,'</span></h6>';


                                  $telefon = VeriGetir("rp_accounts", "ID", $karaktersqlid, "Phone");
                                  if($telefon < 1)
                                  {
                                     echo '<h6 class="display-block"><i class="fa fa-certificate"></i> Telefon Numarası: <span class="badge listbadge">N/A</span></h6>';
                                  }
                                  else
                                  {
                                     echo '<h6 class="display-block"><i class="fa fa-certificate"></i> Telefon Numarası: <span class="badge listbadge">', $telefon, '</span></h6>';
                                  }
                                  $vip = VeriGetir("rp_accounts", "ID", $karaktersqlid, "Donator");
                                  if($vip > 0)
                                  {
                                     echo '<h6 class="display-block"><i class="fa fa-certificate"></i> VIP: <span class="badge listbadge">', $vip ,'</span></h6>';
                                  }
                                  else
                                  {
                                     echo '<h6 class="display-block"><i class="fa fa-certificate"></i> VIP Durumu: <span class="badge listbadge">Yok</span></h6>';
                                  }

                                 echo '</div></div>

                                 <div class="col-md-3">

                                  <div class="p-3">';

                                    echo' <h6 class="display-block"><i class="fa fa-money"></i> Nakit Para: <span class="badge dolarbadge">', VeriGetir("rp_accounts", "ID", $karaktersqlid, "PocketMoney"),'$</span></h6>';
                                    
                                  echo '
                                      </div>

                                 </div>

                              </div>

                                        </div>

                                        <div class="tab-pane" id="sicil-kaydi">

                                        <table class="table table-hover table-striped table-bordered table-centered mb-0">

                                            <thead class="thead-dark">

                                                <tr>

                                                    <th>Tarih</th>

                                                    <th>Gerekçe</th>

                                                   <th>Memur</th>

                                                </tr>

                                            </thead>

                                            <tbody>';

                                          global $mysql;
                                          $sorgu = "SELECT * FROM rp_tickets WHERE Player = '". $karaktersqlid."'";
                                          $sonuc = mysqli_query($mysql, $sorgu);
                                          if(!mysqli_num_rows($sonuc))
                                          {
                                             echo '
                                             <tr>
                                                   <th style="text-align: center;" width="100%" scope="row">Sicil kaydı yok</span></th>
                                                   <td width="0%"> </td>
                                                   <td width="0%"> </td>
                                             </tr>';
                                          }
                                          else
                                          {
                                             while($veri = mysqli_fetch_array($sonuc))
                                             {
                                                echo '
                                                <tr>
                                                      <td>', $veri['Amount'],'</td>
                                                      <td>', $veri['Reason'],'</td>
                                                      <td>', $veri['Date'],'</td>
                                                </tr>';
                                             }
                                          }

                                          

                                             echo '</tbody>

                                        </table>

                                    </div>

                                        

                                        <div class="tab-pane" id="mal-varligi">

                               <div class="row">

                                          <div class="col-xl-6">

                            <div style="border:none; box-shadow:none;" class="card">

                                <div class="card-body">

                                    <h5 class="card-title mb-2">Araçlar</h5>';

                                    
                                 global $mysql;
                                 $sorgu = "SELECT * FROM rp_vehicles WHERE vOwner = '". $karaktersqlid."'";
                                 $sonuc = mysqli_query($mysql, $sorgu);
                                 if(!mysqli_num_rows($sonuc))
                                 {
                                    echo '<div class="alert alert-danger bg-danger text-white border-0" role="alert">
                                         <strong>Hata - </strong> Kullanıcının sahip olduğu araç bulunamadı.
                                           </div>';
                                 }
                                 else
                                 {
                                    while($veri = mysqli_fetch_array($sonuc))
                                    {
                                       echo '<div class="card ">
                                      <div class="card-body">
                                          <div class="member-content-area text-center">
                                               <div><img src="http://weedarr.wdfiles.com/local--files/veh/', $veri['vModel'],'.png" alt=""></div>
                                                  <div class="member-contact-info"> <br>
                                                      <h6>Plaka: ', $veri['vPlate'],'</h6>
                                                      <h6>Fiyat: ', $veri['vPrice'],'$</h6>
                                                  </div>
                                            </div>
                                      </div>
                                  </div>';
                                    }
                                 }


                        echo '</div></div></div>

                  <div class="col-xl-6">

                            <div style="border:none; box-shadow:none;" class="card">

                                <div class="card-body">

                                    <h5 class="card-title mb-2">Mülkler (Ev & İşyeri)</h5>';

                                
                                 global $mysql;
                                 $sorgu = "SELECT * FROM rp_houses WHERE hOwner = '". $karaktersqlid."'";
                                 $sonuc = mysqli_query($mysql, $sorgu);
                                 if(!mysqli_num_rows($sonuc))
                                 {
                                    echo '<div class="alert alert-danger bg-danger text-white border-0" role="alert">
                                         <strong>Hata - </strong> Kullanıcının sahip olduğu ev/işletme bulunamadı.
                                           </div>';
                                 }
                                 else
                                 {
                                    while($veri = mysqli_fetch_array($sonuc))
                                    {
                                       echo '<div class="card ">
                                      <div class="card-body">
                                          <div class="member-content-area text-center">
                                               <div><img style="max-height:150px" src="grafik/mulk.png" alt=""></div>
                                                  <div class="member-contact-info"> <br>
                                                      <h6>Ev SQLID: ', $veri['hID'],'</h6>
                                                      <h6>Fiyat: ', $veri['hForSale'],'$</h6>
                                                  </div>
                                            </div>
                                      </div>
                                  </div>';
                                    }
                                 }

                                 global $mysql;
                                 $sorgu = "SELECT * FROM rp_companies WHERE cOwner = '". $karaktersqlid."'";
                                 $sonuc = mysqli_query($mysql, $sorgu);
                                 while($veri = mysqli_fetch_array($sonuc))
                                 {
                                    echo '<div class="card ">
                                   <div class="card-body">
                                       <div class="member-content-area text-center">
                                            <div><img style="max-height:150px" src="grafik/mulk.png" alt=""></div>
                                               <div class="member-contact-info"> <br>
                                                   <h6>İşyeri SQLID: ', $veri['cID'],'</h6>
                                                   <h6>İşyeri: ', $veri['cName'],'</h6>
                                               </div>
                                         </div>
                                   </div>
                                  </div>';
                                 }

                               echo ' </div> 

                            </div> 

                        </div>

                  </div>

                                        </div>

                                    </div>

                                </div>

                </div>

              </div>

          </div>';

}

function HesapOlustur()
{/*
  if(isset($_POST['kullaniciadi']))
  {
    $kullaniciadi = $_POST['kullaniciadi'];
    $sifre = $_POST['sifre'];
    if(!$kullaniciadi)
    {
          echo '
          <div class="alert alert-danger bg-danger text-white border-0" role="danger">
          Kullanıcı adı boş bırakılamaz.
          </div>';
    }
    else if(strlen($kullaniciadi) > 24)
    {
          echo '
          <div class="alert alert-danger bg-danger text-white border-0" role="danger">
          Kullanıcı adı 24 karakterden fazla olamaz.
          </div>';
    }
    else if(!$sifre)
    {
          echo '
          <div class="alert alert-danger bg-danger text-white border-0" role="danger">
          Şifre boş bırakılamaz.
          </div>';
    }
    else
    {
      global $mysql;
      $hesapkontrol = "SELECT Username FROM accounts WHERE Username = '$kullaniciadi'";
      $sonuc = mysqli_query($mysql, $hesapkontrol);
      if(mysqli_num_rows($sonuc))
      {
          echo '
          <div class="alert alert-danger bg-danger text-white border-0" role="danger">
          Bu kullanıcı adı zaten var.
          </div>';
      }
      else
      {
        $ip = $_SERVER['REMOTE_ADDR'];
        $sorgu = "SELECT sonip FROM accounts WHERE sonip = '$ip'";
        $sonuc = mysqli_query($mysql, $sorgu);
        if(mysqli_num_rows($sonuc))
        {
          echo '
          <div class="alert alert-danger bg-danger text-white border-0" role="danger">
            Bu IP adresi üzerine kayıtlı hesap bulunuyor.
          </div>';
        }
        else
        {
          $sifre = $mysql->real_escape_string($sifre);
          $sifre = strtoupper(hash('whirlpool', $sifre));
          $sql = "INSERT INTO accounts (Username, Password, RegisterDate, sonip)
          VALUES ('$kullaniciadi', '$sifre', FROM_UNIXTIME(UNIX_TIMESTAMP()), '$ip')";
          if (mysqli_query($mysql, $sql))
          {
            echo '
            <div class="alert alert-success bg-success text-white border-0" role="success">
             Hesap oluşturuldu giriş yapabilirsin.
             </div>';
          }
          else
          {
             echo "DEBUG -.: " . $sql . "<br>" . mysqli_error($mysql);
          }
        }
      }
    }
  }
  else
  {
   echo '
   <div class="row">
      <div class="col">
      <form style="border:1px solid #e2e2e2; padding:10px;" method="POST" action="index.php?sayfa=hesapolustur" >
        <div class="form-group">
          <label for="exampleFormControlInput1"> Kullanıcı adı</label>
          <input maxlength="24" type="text" class="form-control" name="kullaniciadi" id="kullaniciadi" required>
        </div>
      
      <div class="form-group">
          <label for="exampleFormControlInput1"> Şifre </label>
          <input type="password" class="form-control" name="sifre" id="sifre" required>
        </div>
        
        <div class="form-group row">
          <div class="col-sm-10">
            <input type="submit" class="btn listbadge" value="Hesap Oluştur"></input>
          </div>
        </div>
      </form>
   </div>
</div>
';
}

}

function KarakterBasvurusu()
{
  $kdurum = false;
  if($kdurum == false)
  {
    echo '
      <div class="alert alert-danger bg-danger text-white border-0" role="danger">
      Karakter başvurusu kapalı
      </div>';
  }
  else
  {
     global $mysql;
     $hesap = $_SESSION['karakteradi'];
     $sorgu = "SELECT Username FROM characters WHERE Username = '$hesap'";
     $sonuc = mysqli_query($mysql, $sorgu);
     if(mysqli_num_rows($sonuc) > 2)
     {
        echo '
        <div class="alert alert-danger bg-danger text-white border-0" role="danger">
        Zaten 3 adet karakterin var.
        </div>';
     }
     else
     {
       echo '
       <div class="row">
          <div class="col">
          <form style="border:1px solid #e2e2e2; padding:10px;" method="POST" action="index.php?sayfa=basvurugonder" >
            
            <div class="form-group">
              <label for="exampleFormControlInput1"> Adı ve Soyadı</label>
              <input maxlength="24" type="text" class="form-control" name="karakteradi" id="karakteradi" placeholder="Kelly_Sheeran" required>
            </div>
          
            <div class="form-group">
              <label for="exampleFormControlInput1"> Boy </label>
              <input type="number" name="boy" class="form-control" id="boy" required>
              <label for="exampleFormControlInput1"> Kilo </label>
              <input type="number" name="kilo" class="form-control" id="kilo" required>
              <div class="form-group">
              <label for="exampleFormControlTextarea1">Görünüş</label>
              <textarea required minlength="20" class="form-control" id="gorunus" name="gorunus" rows="3"></textarea>
            </div>
            </div>

            <div class="form-group">
              <p style="color: #212529;">Soru 1</p>
              <input required type="radio" id="soru1" name="soru1" value="A">
              <label for="soru1">A) Cevap 1</label><br>
              <input type="radio" id="soru1" name="soru1" value="B">
              <label for="soru1">B) Cevap 2</label><br>
              <input type="radio" id="soru1" name="soru1" value="C">
              <label for="soru1">C) Cevap 3</label><br>
              <input type="radio" id="soru1" name="soru1" value="D">
              <label for="soru1">D) Cevap 4</label>
            </div>

            <div class="form-group">
              <p style="color: #212529;">Soru 2</p>
              <input required type="radio" id="soru2" name="soru2" value="A">
              <label for="soru2">A) Cevap 1</label><br>
              <input type="radio" id="soru2" name="soru2" value="B">
              <label for="soru2">B) Cevap 2</label><br>
              <input type="radio" id="soru2" name="soru2" value="C">
              <label for="soru2">C) Cevap 3</label><br>
              <input type="radio" id="soru2" name="soru2" value="D">
              <label for="soru2">D) Cevap 4</label>
            </div>

            <div class="form-group">
              <p style="color: #212529;">Soru 3</p>
              <input required type="radio" id="soru3" name="soru3" value="A">
              <label for="soru3">A) Cevap 1</label><br>
              <input type="radio" id="soru3" name="soru3" value="B">
              <label for="soru3">B) Cevap 2</label><br>
              <input type="radio" id="soru3" name="soru3" value="C">
              <label for="soru3">C) Cevap 3</label><br>
              <input type="radio" id="soru3" name="soru3" value="D">
              <label for="soru3">D) Cevap 4</label>
            </div>

            <div class="form-group">
              <p style="color: #212529;">Soru 4</p>
              <input required type="radio" id="soru4" name="soru4" value="A">
              <label for="soru4">A) Cevap 1</label><br>
              <input type="radio" id="soru4" name="soru4" value="B">
              <label for="soru4">B) Cevap 2</label><br>
              <input type="radio" id="soru4" name="soru4" value="C">
              <label for="soru4">C) Cevap 3</label><br>
              <input type="radio" id="soru4" name="soru4" value="D">
              <label for="soru4">D) Cevap 4</label>
            </div>

            <div class="form-group">
              <p style="color: #212529;">Soru 5</p>
              <input required type="radio" id="soru5" name="soru5" value="A">
              <label for="soru5">A) Cevap 1</label><br>
              <input type="radio" id="soru5" name="soru5" value="B">
              <label for="soru5">B) Cevap 2</label><br>
              <input type="radio" id="soru5" name="soru5" value="C">
              <label for="soru5">C) Cevap 3</label><br>
              <input type="radio" id="soru5" name="soru5" value="D">
              <label for="soru5">D) Cevap 4</label>
            </div>

            <div class="form-group">
              <p style="color: #212529;">Soru 6</p>
              <input required type="radio" id="soru6" name="soru6" value="A">
              <label for="soru6">A) Cevap 1</label><br>
              <input type="radio" id="soru6" name="soru6" value="B">
              <label for="soru6">B) Cevap 2</label><br>
              <input type="radio" id="soru6" name="soru6" value="C">
              <label for="soru6">C) Cevap 3</label><br>
              <input type="radio" id="soru6" name="soru6" value="D">
              <label for="soru6">D) Cevap 4</label>
            </div>


            <div class="form-group">
              <label for="exampleFormControlTextarea1">Biyografi</label>
              <textarea required minlength="100" class="form-control" id="biyografi" name="biyografi" rows="5"></textarea>
            </div>
            
            <div class="form-group row">
              <div class="col-sm-10">
                <input type="submit" class="btn listbadge" value="Başvuru Yap"></input>
              </div>
            </div>


          </form>
       </div>
    </div>
    ';
    }
  }*/
}

function BasvuruGonder()
{/*
    $karakteradi = $_POST['karakteradi'];
    $gorunus = $_POST['gorunus'];
    $soru1 = $_POST['soru1'];
    $soru2 = $_POST['soru2'];
    $soru3 = $_POST['soru3'];
    $soru4 = $_POST['soru4'];
    $soru5 = $_POST['soru5'];
    $soru6 = $_POST['soru6'];
    $biyografi = $_POST ['biyografi'];
    $biyografi=addslashes($biyografi);
    if(!IsValidName($_POST['karakteradi']))
    {
       echo '
       <div class="alert alert-danger bg-danger text-white border-0" role="danger">
       Karakter adında _ kullanmalısınız. (Örnek: John_Doe)
       </div>';
    }
    else
    {
       global $mysql;
       $KarakterKontrol = "SELECT karakteradi FROM basvurular WHERE karakteradi = '$karakteradi'";
       $sonuc = mysqli_query($mysql, $KarakterKontrol);
       $bvarmi = mysqli_num_rows($sonuc);
       $hesap = $_SESSION['karakteradi'];
       $KarakterKontrol = "SELECT hesap FROM basvurular WHERE hesap = '$hesap'";
       $sonuc = mysqli_query($mysql, $KarakterKontrol);
       if(mysqli_num_rows($sonuc) > 2)
       {
          echo '
          <div class="alert alert-danger bg-danger text-white border-0" role="danger">
          Zaten 3 adet başvurunuz var.
          </div>';
       }
       else
       {
         $KarakterKontrol = "SELECT Character FROM characters WHERE Character = '$karakteradi'";
         $sonuc = mysqli_query($mysql, $KarakterKontrol);
         $kvarmi = 0;
         if($sonuc) $kvarmi = mysqli_num_rows($sonuc);
         if(strlen($karakteradi) > 24)
         {
            echo '
            <div class="alert alert-danger bg-danger text-white border-0" role="danger">
            Karakter adı 24 karakterden fazla olamaz.
            </div>';
         }
         else if($bvarmi)
         {
            echo '
            <div class="alert alert-danger bg-danger text-white border-0" role="danger">
            Bu karakter adı ile başvuru gönderilmiş.
            </div>';
         }
         else if($kvarmi)
         {
            echo '
            <div class="alert alert-danger bg-danger text-white border-0" role="danger">
            Bu karakter adı sunucuda kayıtlı.
            </div>';
         }
         else if (!$biyografi)
         {
            echo '
            <div class="alert alert-danger bg-danger text-white border-0" role="danger">
            Biyografi bölümünü boş bıraktınız.
            </div>';
         }
         if(strlen($biyografi) > 2000)
         {
            echo '
            <div class="alert alert-danger bg-danger text-white border-0" role="danger">
            Biyografi 2000 karakterden fazla olamaz.
            </div>';
         }
         else
         {
            $gorunus = $mysql->real_escape_string($gorunus);
            $sql = "INSERT INTO basvurular (karakteradi, hesap, gorunus, biyografi, soru1, soru2, soru3, soru4, soru5, soru6) VALUES ('$karakteradi', '$hesap', '$gorunus', '$biyografi', '$soru1', '$soru2', '$soru3', '$soru4', '$soru5', '$soru6')";
            if(mysqli_query($mysql, $sql))
            {
               echo '
                  <div class="alert alert-success bg-success text-white border-0" role="success">
               Karakter başvurusu gönderildi.
               </div>';
            }
            else
            {
               echo "DEBUG -.: " . $sql . "<br>" . mysqli_error($mysql); // silinecek -allen
            }
         }
       }
   }*/
}

function AdminKontrol($seviye)
{
  global $mysql;
  $hesap = $_SESSION['karakteradi'];
  $sorgu = "SELECT * FROM rp_accounts WHERE Username = '$hesap' AND Admin >= $seviye";
  $sonuc = mysqli_query($mysql, $sorgu);
  if(mysqli_num_rows($sonuc)) return 1;
  else return 0;
  return 0;
}

function AdminOzel()
{        
      if(!AdminKontrol(1))
      {
         header('location: index.php');
      }
      else
      {

      global $mysql;
   

   echo ' <div class="row">

               <div class="col-md-6 col-x4">

                  <div class="card mt-3">

                     <div class="card-header">

                        <h6 class="mb-0 text-center">Sunucu Bilgileri</h6>

                     </div>

                     <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between align-items-center">Bekleyen Karakter Başvuruları  <span class="badge listbadge">';
                        echo VeriToplam("basvurular");

                  echo '
                  </span> </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Toplam Yönetici <span class="badge listbadge">
                  ';
                  $sonuc = mysqli_query($mysql, "SELECT * FROM rp_accounts WHERE Admin > 0");
                  echo mysqli_num_rows($sonuc);

                  echo '
                  </span> </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Toplam Destek <span class="badge listbadge">
                  ';
                  
                  $sonuc = mysqli_query($mysql, "SELECT * FROM rp_accounts WHERE Helper > 0");
                  echo mysqli_num_rows($sonuc);
                  
                  echo '
                  </span> </li>
                         <li class="list-group-item d-flex justify-content-between align-items-center">Toplam Polis <span class="badge listbadge">
                   ';
                  
                  echo VeriKontrol("rp_accounts", "FactionID", 2);
                   
                   echo '
                   </span> </li> 
                        <li class="list-group-item d-flex justify-content-between align-items-center">Toplam Doktor <span class="badge listbadge">
                  
                   ';
                   
                  echo VeriKontrol("rp_accounts", "FactionID", 3);
                   
                   echo '
                  
                  </span> </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">Toplam Gazeteci <span class="badge listbadge">
                  
                   ';
                   echo VeriKontrol("rp_accounts", "FactionID", 4);
                   
                   echo '
                  
                  </span> </li>

                     </ul>

                  </div>

               </div>

               <div class="col-md-6 col-x4">




                  <div class="card mt-3 table-responsive">
                     <div class="card-header">
                        <h6 class="mb-0 text-center">Yasaklı Karakterler</h6>
                     </div>
                  <div style="font-size: 13px;">
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>Yasaklanan</th>
                        <th>Yasaklayan</th>
                        <th>Sebep</th>
                        <th>IP</th>
                        <th>Tarih</th>
                      </tr>
                    </thead>
                    <tbody>';

                     global $mysql;
                     $sonuc = mysqli_query($mysql, "SELECT * FROM rp_blacklist");
                     if(!mysqli_num_rows($sonuc))
                     {
                        echo '
                        <tr>
                              <th style="text-align: center;" width="100%" scope="row">Yasaklı karakter yok</span></th>
                              <td width="0%"> </td>
                              <td width="0%"> </td>
                              <td width="0%"> </td>
                              <td width="0%"> </td>
                        </tr>';
                     }
                     else
                     {
                        while($veri = mysqli_fetch_array($sonuc))
                        {
                           echo '
                           <tr>
                                 <th>', $veri['Player'],'</th>
                                 <td>', $veri['BannedBy'],'</td>
                                 <td>', $veri['Reason'],'</td>
                                 <td>', $veri['IP'],'</td>
                                 <td>', $veri['Date'],'</td>
                           </tr>';
                        }
                     }
                    
                  echo ' </tbody>
                  </table>
                  </div>
                  </div>

               </div>

               <div class="col-md-6 col-x4">

                  <div class="card mt-3 table-responsive">
                     <div class="card-header">
                        <h6 class="mb-0 text-center">Admin - Tester Listesi</h6>
                     </div>
                  <div style="font-size: 13px;">
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>#</th>
                        <th>Ad</th>
                        <th>Karakter Adı</th>
                        <th>Seviye</th>
                        <th>Rütbe</th>
                      </tr>
                    </thead>
                    <tbody>';

                     global $mysql;
                     $yukle = 1;
                     $sonuc = mysqli_query($mysql, "SELECT * FROM rp_accounts WHERE (Admin > 0) OR (Helper > 0) ORDER BY Admin DESC, Helper ASC");
                     while($veri = mysqli_fetch_array($sonuc))
                     {
                        echo '
                        <tr>
                              <th>', $yukle,'</th>
                              <td>', $veri['AdminName'],'</td>
                              <td>', $veri['Username'],'</td>
                              <td>', $veri['Admin'] > 0 ? $veri['Admin'] : $veri['Helper'],'</td>
                              <td>', $veri['Admin'] > 0 ? 'Admin' : 'Helper','</td>
                        </tr>';
                        $yukle++;
                     }

                    
                  echo ' </tbody>
                  </table>
                  </div>
                  </div>

               </div>

               <div class="col-md-6 col-x4">

                  <div class="card mt-3 table-responsive">
                     <div class="card-header">
                        <h6 class="mb-0 text-center">Top 10 Zengin Oyuncu</h6>
                     </div>
                  <div style="font-size: 13px;">
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>#</th>
                        <th>Karakter Adı</th>
                        <th>Seviye</th>
                        <th>Para</th>
                      </tr>
                    </thead>
                    <tbody>';

                     global $mysql;
                     $yukle = 1;
                     $sonuc = mysqli_query($mysql, "SELECT * FROM rp_accounts ORDER BY PocketMoney + BankMoney DESC LIMIT 10");
                     while($veri = mysqli_fetch_array($sonuc))
                     {
                        echo '
                        <tr>
                        <th>', $yukle,'</th>
                        <td>', $veri['Username'],'</td>
                        <td>', $veri['Level'],'</td>
                        <td>', $veri['PocketMoney'] + $veri['BankMoney'],'</td>
                        </tr>';
                        $yukle++;
                     }
                    
                  echo ' </tbody>
                  </table>
                  </div>
                  </div>

               </div>



         </div>
         
     
       
         ';
      }

}

function KarakterSorgula()
{
    $admin = AdminKontrol(1);
    if(!$admin && !isset($_POST['tip']))
    {
      header('location: index.php');
    }
    else
    {
        if($admin && isset($_POST['tip']) == 0)
        {
         echo '
         <div class="row">
               <div class="col">
                            <div class="card">
                                <div class="card-body text-center">
                            
                                    <h4 class="card-title mb-2">Kullanıcı Sorgula</h4>
                                    <p class="text-muted">
                                        Aşağıdaki boşluğa aradığınız karakterin adını veya adının bir kısmını yazarak sogulama yapabilirsiniz.
                                    </p>

                                    <form method="POST" action="index.php?sayfa=karaktersorgula">
                                        <div class="form-group col-md-6 offset-md-3">
                                           <div class="input-group">
                                           <input hidden type="text" name="tip" value="0">
                                                <input required type="text" name="kullaniciadi" class="form-control" placeholder="Kullanıcı_Adı" aria-label="Username" aria-describedby="basic-addon1">
                                                   <div class="input-group-prepend">
                                                    <input type="submit" class="input-group-text" id="basic-addon1" >
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div>
                     </div>';
                   }

                     if(isset($_POST['kullaniciadi']))
                     {
                        if(!IsValidName($_POST['kullaniciadi']) && $_POST['tip'] == 0)
                        {
                           echo '<br/><div class="alert alert-danger bg-danger text-white border-0" role="alert">
                              <strong>Hata - </strong> Geçersiz karakter girdin. Örnek: John_Doe
                           </div>';
                        }
                        else
                        {
                           if(!VeriKontrol("rp_accounts", "Username", $_POST['kullaniciadi']))
                           {
                              echo '<br/><div class="alert alert-danger bg-danger text-white border-0" role="alert">
                              <strong>Hata - </strong> Karakter sunucuda bulunamadı.
                           </div>';
                           }
                           else Karakter($_POST['kullaniciadi']);
                        }
                     }
                  echo '</div>

               </div>
            </div>';
         }
}

function Basvurular()
{
   if(!AdminKontrol(1))
      {
         header('location: index.php');
      }
      else
      {

   echo '
         <div class="row">
               <div class="col">

                  <div class="card mt-3 table-responsive">
                     <div class="card-header">
                     ';
                     $basvurular = VeriToplam("basvurular");
                       echo ' <h6 class="mb-0 text-center">Karakter Başvuruları&nbsp;<span class="badge listbadge">', $basvurular == 0 ? "Yok" : $basvurular,'</span></h6>
                     </div>
                  <div style="font-size: 13px;">
                  <table  class="table ">
                    <thead class="thead-dark">
                      <tr>
                        <th>#</th>
                        <th>Karakter Adı</th>
                        <th>Hesap</th>
                        <th>Görünüş</th>
                        <th>Soru 1</th>
                        <th>Soru 2</th>
                        <th>Soru 3</th>
                        <th>Soru 4</th>
                        <th>Soru 5</th>
                        <th>Soru 6</th>
                        <th width="25%">Biyografi</th>
                        <th>İşlem</th>
                      </tr>
                    </thead>
                    <tbody style="border-top: 0;">';
            
                     global $mysql;
                     $basvuruAl = mysqli_query($mysql, "SELECT * FROM basvurular");
                     if(!mysqli_num_rows($basvuruAl))
                     {
                        echo '
                        <tr>
                              <th style="text-align: right;" width="100%" scope="row">Başvuru bulunamadı. </span></th>
                              <td width="0%"> </td>
                        </tr>';
                     }
                     else
                     {
                        while($basvuruCek = mysqli_fetch_array($basvuruAl))
                        {
                           echo '
                           <form method="POST" action="index.php?sayfa=basvuruislem">
                           <tr>
                                 <th><input class="basvuruinput" name="id" readonly value="', $basvuruCek['id'],'"></th>
                                 <td>', $basvuruCek['karakteradi'],'</td>
                                 <td>', $basvuruCek['hesap'],'</td>
                                 <td>', $basvuruCek['gorunus'],'</td>
                                 <td>', $basvuruCek['soru1'],'</td>
                                 <td>', $basvuruCek['soru2'],'</td>
                                 <td>', $basvuruCek['soru3'],'</td>
                                 <td>', $basvuruCek['soru4'],'</td>
                                 <td>', $basvuruCek['soru5'],'</td>
                                 <td>', $basvuruCek['soru6'],'</td>
                                 <td style="max-width: 50px;">', $basvuruCek['biyografi'],'</td>
                         <td><button name="kabulet" style="font-size: 10px;" type="submit" class="btn btn-success">Kabul Et</button>&nbsp;<button style="font-size: 11px;" type="submit" name="reddet" class="btn btn-danger">Reddet</button></td>

                           </tr>
                           </form>';
                        }
                     }
                    
                  echo ' </tbody>
                  </table>
                  </div>
                  </div>
               </div>
            </div>';
            }  
}


function BasvuruIslem()
{
   if(isset($_POST['kabulet']))
   {
      $bid = $_POST['id'];
      $karakteradi = VeriGetir("basvurular", "id", $bid, "karakteradi");
      $hesap = VeriGetir("basvurular", "id", $bid, "hesap");

      global $mysql;

      $sorgu = "SELECT * FROM characters WHERE Username = '$hesap'";
      $sonuc = mysqli_query($mysql, $sorgu);
      if($sonuc)
      {
        if(mysqli_num_rows($sonuc) > 2)
        {
          echo '<div class="alert alert-danger bg-danger text-white border-0" role="alert">
                  <strong>Hata - </strong> Bu karakter zaten 3 karaktere sahip.
                </div>';
        }
        else
        {
          $sorgu = "INSERT INTO `characters` (`Username`, `Character`, `CreateDate`)
          VALUES ('$hesap', '$karakteradi', UNIX_TIMESTAMP())";
          if(mysqli_query($mysql, $sorgu))
          {
            echo ' <div class="alert alert-success bg-success text-white border-0" role="success">
              ', $karakteradi,' karakteri kabul edildi.1
              </div>';
          }
          else
          {
             echo "DEBUG -.: " . $sql . "<br>" . mysqli_error($mysql);
          }
            
        }
      }
      else
        {
          $sorgu = "INSERT INTO `characters` (`Username`, `Character`, `CreateDate`)
          VALUES ('$hesap', '$karakteradi', UNIX_TIMESTAMP())";
          if(mysqli_query($mysql, $sorgu))
          {
            echo ' <div class="alert alert-success bg-success text-white border-0" role="success">
              ', $karakteradi,' karakteri kabul edildi.2
              </div>';
          }
          else
          {
             echo "DEBUG -.: " . $sql . "<br>" . mysqli_error($mysql);
          }
        }
      $sorgu = "DELETE FROM basvurular WHERE id = $bid";
      mysqli_query($mysql, $sorgu);
   }
   else if(isset($_POST['reddet']))
   {
      $bid = $_POST['id'];
      $karakteradi = VeriGetir("basvurular", "id", $bid, "karakteradi");
      global $mysql;
      $sorgu = "DELETE FROM basvurular WHERE id = $bid";
      mysqli_query($mysql, $sorgu);
      echo '', $karakteradi,' karakterini reddettin.';
   }
}

function Giris()
{
   if(isset($_SESSION['giris']) && $_SESSION['giris'] == 1)
   {
      header('location: index.php');
   }
      echo '<div id="contentlogin">
             <div class="container">
               <div class="row mx-lg-n5 justify-content-center p-5">
                 <div class="col py-3 px-lg-5 border bg-light">';

            if(isset($_POST['gkarakteradi']) && isset($_POST['gsifre']))
            {
               global $mysql;
               if($_POST['gkarakteradi'])
               {
                  $sifre = $_POST['gsifre'];
                  $sifre = $mysql->real_escape_string($sifre);
                  $karakteradi = $_POST['gkarakteradi'];
                  $karakteradi = $mysql->real_escape_string($karakteradi);
                  $sifre = strtoupper(hash('whirlpool', $sifre));
                  $sorgu = "SELECT * FROM rp_accounts WHERE Username = '". $karakteradi."' AND Pass = '". $sifre."'";
                  $sonuc = mysqli_query($mysql, $sorgu);
                  if(mysqli_num_rows($sonuc) == 1)
                  {
                     $_SESSION['giris'] = 1;
                     $_SESSION['sqlid'] = VeriGetir("accounts", "Username", $karakteradi, "ID");
                     $_SESSION['karakteradi'] = $karakteradi;
                     header('location: index.php');
                  }
                  else
                  {
                    echo '<div class="alert alert-danger bg-danger text-white border-0" role="alert">
                                          <strong>Hata - </strong> Hatalı karakter adı yada şifre.
                        </div>';
                  /*
                     $sorgu = "SELECT * FROM basvurular WHERE karakteradi = '". $_POST['gkarakteradi']."'";
                     $sonuc = mysqli_query($mysql, $sorgu);
                     if(mysqli_num_rows($sonuc) == 1)
                     {
                        echo '<div class="alert alert-success bg-success text-white border-0" role="alert">
                                          <strong>Bilgi - </strong> Karakter başvurunuz onay sürecinde.
                        </div>';
                     }
                     else
                     {
                     echo '<div class="alert alert-danger bg-danger text-white border-0" role="alert">
                                          <strong>Hata - </strong> Hatalı karakter adı yada şifre.
                        </div>';
                     }*/
                  }
               }
            }

           echo '<h3 class="mt-4">Karakter Girişi</h3>
                   <form action="index.php?sayfa=giris" method="post">
                     <div class="input-group input-group-sm mt-4 mb-3">
                       <div class="input-group-prepend">
                         <div class="input-group-text"><i class="fas fa-user"></i></div>
                       </div>
                       <input type="text" class="form-control" name="gkarakteradi" placeholder="Karakter_Adı" required>
                     </div>
                     <div class="input-group input-group-sm mb-3">
                       <div class="input-group-prepend">
                         <div class="input-group-text"><i class="fas fa-lock"></i></div>
                       </div>
                       <input type="password" class="form-control" name="gsifre" placeholder="Şifre" required>
                     </div>
                     <div class="d-flex justify-content-center mb-4">
                       <button type="submit" class="btn btn-outline-secondary">Giriş Yap</button>
                     </div>
                   </form>
                 </div>
                 <div style="background-image: url(grafik/loginbg.png); background-size: cover;" class="col-6 py-3 px-lg-5 border bg-light"></div>
               </div>
             </div>
         </div>';
}

function IsValidName($name)
{// Vince
   return preg_match("/^[A-Z]{1}[A-Za-z]+_[A-Z]{1}[A-Za-z]+$/", $name);
}

function SayfaAdi($sayfa)
{
   $sayfaadi;
   switch($sayfa)
   {
      case 'karakter': $sayfaadi = 'Karakter Bilgileri'; break;
      case 'hesapolustur': $sayfaadi = 'Hesap Oluştur'; break;
      case 'karakterbasvurusu': $sayfaadi = 'Karakter Başvurusu'; break;
      case 'adminozel': $sayfaadi = 'Admin Özel'; break;
      case 'basvurular': $sayfaadi = 'Karakter Başvuruları'; break;
      case 'karaktersorgula': $sayfaadi = 'Karakter Sorgula'; break;
      case 'basvurugonder': $sayfaadi = 'BasvuruGonder'; break;
      case 'giris': $sayfaadi = 'Giriş'; break;
      default: $sayfaadi = 'Anasayfa'; break;
   }
   return $sayfaadi;
}

function VeriGetir($tabloadi, $sutun, $veri, $donecekveri)
{
   $verigetir = -1;
   global $mysql;
   $sorgu = "SELECT `$donecekveri` FROM `$tabloadi` WHERE `$sutun` = '$veri'";
   $sonuc = mysqli_query($mysql, $sorgu);
   if(mysqli_num_rows($sonuc))
   {
      $row = mysqli_fetch_assoc($sonuc);
      $verigetir = $row[$donecekveri];
      mysqli_free_result($sonuc);
   }
   return $verigetir;
}

function VeriKontrol($tabloadi, $sutun, $veri)
{
   global $mysql;
   $sorgu = "SELECT * FROM `$tabloadi` WHERE `$sutun` = '$veri'";
   $sonuc = mysqli_query($mysql, $sorgu);
   return mysqli_num_rows($sonuc);
}

function VeriToplam($tabloadi)
{
   global $mysql;
   $sonuc = mysqli_query($mysql, "SELECT * FROM `$tabloadi`");
   return mysqli_num_rows($sonuc);
}
?>



   <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    <script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

    
