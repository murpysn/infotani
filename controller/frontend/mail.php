<?php
include "phpmailer/class.phpmailer.php";
if (isset($_POST['kirim'])) {

     //Membuat instance PHPMailer baru
     $mail = new PHPMailer;
     //Memberi tahu PHPMailer untuk menggunakan SMTP
     $mail->isSMTP();
     //Mengaktifkan SMTP debugging
     // 0 = off (digunakan untuk production)
     // 1 = pesan client
     // 2 = pesan client dan server
     $mail->SMTPDebug = 2;
     //HTML-friendly debug output
     $mail->Debugoutput = 'html';
     //hostname dari mail server
     $mail->Host = 'smtp.gmail.com';
     // gunakan
     // $mail->Host = gethostbyname('smtp.gmail.com');
     // jika jaringan Anda tidak mendukung SMTP melalui IPv6
     //Atur SMTP port - 587 untuk dikonfirmasi TLS, a.k.a. RFC4409 SMTP submission
     $mail->Port = 587;
     //Set sistem enkripsi untuk menggunakan - ssl (deprecated) atau tls
     $mail->SMTPSecure = 'tls';
     //SMTP authentication
     $mail->SMTPAuth = true;
     //Username yang digunakan untuk SMTP authentication - gunakan email gmail
     $mail->Username = "infotani.mif@gmail.com";
     //Password yang digunakan untuk SMTP authentication
     $mail->Password = "infotani123";
     //Email pengirim
     $mail->setFrom($_POST['email'], $_POST['nama']);
     //Alamat email alternatif balasan
     $mail->addReplyTo($_POST['email'], $_POST['nama']);
     //Email tujuan
     $mail->addAddress("infotani.mif@gmail.com", "You");
     //Subject email
     $mail->Subject = "Komentar dari ".$_POST['nama'];;
     //Membaca isi pesan HTML dari file eksternal, mengkonversi gambar yang di embed,
     //Mengubah HTML menjadi basic plain-text
     $mail->msgHTML($_POST['komentar']);
     //Replace plain text body dengan cara manual
     //$mail->AltBody = 'This is a plain-text message body';
     //Attach file gambar
     //$mail->addAttachment('images/phpmailer_mini.png');
     //mengirim pesan, mengecek error
     /*if (!$mail->send()) {
     echo "Email Error: " . $mail->ErrorInfo;
     } else {
     echo "Pesan Terkirim!";
     }*/

    /*$mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com"; //host masing2 provider email
    $mail->SMTPDebug = 2;
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = "infotani.mif@gmail.com"; //user email
    $mail->Password = "infotani123"; //password email
    $mail->SetFrom($_POST['email'], $_POST['nama']); //set email pengirim
    $mail->Subject = "Komentar dari ".$_POST['nama']; //subyek email
    $mail->AddAddress("infotani.mif@gmail.com", "You");  //tujuan email
*/

    /*$mail->MsgHTML($_POST['komentar']."
    <br>
    <button><a href='http://localhost/infotani/Pages/frontend/index.php'
     target='output'>Link contoh 1</a></button>
    ");*/


    //$mail->MsgHTML($_POST['komentar']);
    if($mail->Send()) {?> <script language="JavaScript">
    alert('Berhasil Terkirim');
    </script><?php
    header("location:../../pages/frontend/contact");

}else echo "Failed to sending message";
}
?>
