<?php 
defined('_BDZ') or die;
	$response['status']=1;
	$response['message'] = "Term And Condition Tersedia";
	$response['termandcondition']="<h3 style="text-align: center;"><strong>Syarat dan Ketentuan</strong></h3><br/><ol>
	<li>Anda diharuskan melakukan pendaftaran atau Sign Up untuk membuat akun BHC</li>
	<li>Dengan membuat akun BHC Anda bertanggung jawab atas segala konten yang ada di dalam akun Anda.</li>
	<li>Keamanan akun adalah tanggung jawab pengguna</li>
	<li>Anda menjamin bahwa data dan informasi yang Anda berikan ke Kami&nbsp;adalah data dan informasi yang akurat, terkini dan lengkap. Untuk ketentuan penggunaan data dan informasi yang Anda berikan, silahkan untuk merujuk pada Kebijakan Penggunaan Data (Privacy Policy)</li>
	<li>Dalam Website ini mungkin terdapat tautan&nbsp;ke website yang dikelola oleh pihak ketiga (contoh : Facebook, Twitter). BHC Indonesia&nbsp;tidak mengoperasikan, mengendalikan atau mendukung dalam bentuk apa pun aktivitas aplikasi pihak ketiga yang bersangkutan ataupun konten/isinya. Anda bertanggung jawab penuh atas penggunaan aplikasi pihak ketiga tersebut dan dianjurkan untuk mempelajari syarat dan ketentuan dari&nbsp;aplikasi pihak ketiga&nbsp;itu secara seksama.</li>
	<li>Adanya penggunaan layanan ketiga mengharuskan Anda untuk patuh pada Syarat dan Ketentuan aplikasi pihak ketiga tersebut.</li>
	<li>Konten yang dipublikasikan melalui www.bhc.com menggunakan akun aplikasi pihak ketiga pengguna merupakan tanggung jawab pengguna.</li>
	<li>Jika ditemukan virus atau malware dalam konten&nbsp;www.bhc.com bukan merupakan tanggung jawab BHC.</li>
	<li>Kerusakan aplikasi pihak ketiga bukan merupakan tanggung jawab BHC.</li>
	<li>Pembayaran atas penggunaan layanan Kami dapat dilakukan melalui transfer bank, tunai, dan cek. Seluruh biaya yang telah diterima oleh BHC tidak dapat dikembalikan.</li>
	<li>Layanan akan dihentikan jika pengguna tidak melakukan pembayaran pada batas waktu yang ditentukan.</li>
	<li>BHC tidak bertanggung jawab atas kehilangan data pada akun yang tidak diperpanjang selama 3 bulan berturut-turut.</li>
</ol>";
echo json_encode($response);



?>