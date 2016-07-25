-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for myblog
CREATE DATABASE IF NOT EXISTS `myblog` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `myblog`;


-- Dumping structure for table myblog.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.categories: ~9 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `slug`, `description`) VALUES
	(1, 'Tips & Tricks', 'tips-tricks', 'All about computer tips and tricks'),
	(2, 'Computer Hacking', 'computer-hacking', 'All about computer hacking'),
	(3, 'Programming', 'programming', 'All about programming'),
	(4, 'Story', 'story', 'Just for fun'),
	(5, 'Java Tutorial', 'java-tutorial', 'All about java programming'),
	(6, 'PHP Tutorial', 'php-tutorial', 'All about PHP programming'),
	(7, 'CSS Tutorial', 'css-tutorial', 'All about CSS tutorial'),
	(8, 'Pemula', 'pemula', 'Persiapan belajar pemrograman'),
	(9, 'Menengah', 'menengah', 'Mengasah kemampuan lebih jauh'),
	(10, 'Mastah', 'mastah', 'Menjadi mastah pemrograman');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table myblog.category_post
CREATE TABLE IF NOT EXISTS `category_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_post_category_id_foreign` (`category_id`),
  KEY `category_post_post_id_foreign` (`post_id`),
  CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.category_post: ~34 rows (approximately)
/*!40000 ALTER TABLE `category_post` DISABLE KEYS */;
INSERT INTO `category_post` (`id`, `category_id`, `post_id`) VALUES
	(7, 1, 10),
	(8, 3, 10),
	(9, 3, 11),
	(10, 1, 12),
	(11, 3, 12),
	(12, 1, 13),
	(13, 3, 13),
	(14, 8, 10),
	(15, 9, 10),
	(16, 8, 11),
	(17, 8, 12),
	(18, 9, 12),
	(19, 8, 13),
	(20, 9, 13),
	(21, 1, 22),
	(22, 6, 22),
	(23, 9, 22),
	(24, 10, 22),
	(25, 3, 23),
	(26, 8, 23),
	(27, 1, 24),
	(28, 4, 24),
	(29, 8, 24),
	(30, 9, 24),
	(31, 6, 25),
	(32, 8, 25),
	(33, 9, 25),
	(34, 3, 26),
	(35, 8, 26),
	(36, 3, 27),
	(37, 7, 27),
	(38, 8, 27),
	(39, 3, 28),
	(40, 8, 28);
/*!40000 ALTER TABLE `category_post` ENABLE KEYS */;


-- Dumping structure for table myblog.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.migrations: ~27 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2013_05_26_025800_create_roles_table', 1),
	('2014_10_12_100000_create_password_resets_table', 1),
	('2016_05_19_090545_create_categories_table', 1),
	('2016_05_19_090615_create_tags_table', 1),
	('2016_05_19_090616_create_posts_table', 1),
	('2016_05_24_224546_create_category_post_table', 1),
	('2016_05_25_093648_create_post_tag_table', 1),
	('2016_06_02_065700_create_role_user_table', 2),
	('2014_10_12_000000_create_users_table', 3),
	('2013_05_26_025800_create_roles_table', 1),
	('2014_10_12_100000_create_password_resets_table', 1),
	('2016_05_19_090545_create_categories_table', 1),
	('2016_05_19_090615_create_tags_table', 1),
	('2016_05_19_090616_create_posts_table', 1),
	('2016_05_24_224546_create_category_post_table', 1),
	('2016_05_25_093648_create_post_tag_table', 1),
	('2016_06_02_065700_create_role_user_table', 2),
	('2014_10_12_000000_create_users_table', 3),
	('2013_05_26_025800_create_roles_table', 1),
	('2014_10_12_100000_create_password_resets_table', 1),
	('2016_05_19_090545_create_categories_table', 1),
	('2016_05_19_090615_create_tags_table', 1),
	('2016_05_19_090616_create_posts_table', 1),
	('2016_05_24_224546_create_category_post_table', 1),
	('2016_05_25_093648_create_post_tag_table', 1),
	('2016_06_02_065700_create_role_user_table', 2),
	('2014_10_12_000000_create_users_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table myblog.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table myblog.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_author_id_foreign` (`author_id`),
  CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.posts: ~11 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `image`, `author_id`, `created_at`, `updated_at`) VALUES
	(10, 'Begini Cara Mengubah Alamat Server Lokal "Localhost" Sesuai Keinginan - Windows', 'mengubah-alamat-localhost-server-lokal', '<p align="justify">Pada kesempatan kali ini, websiter newbie akan berbagi sedikit tips dan trik yang InsyaAllah dapat menambah ilmu kawan &ndash; kawan semua. Sesuai dengan judul diatas, kali ini akan newbie bagikan sebuah trik untuk mengubah alamat &ldquo;localhost&rdquo; server yang kita gunakan.</p>\r\n<p align="justify">Karena Tidak selamanya kita menggunakan localhost sebagai alamat server kita, alangkah enaknya jika kita dapat memodifikasinya, ya karena mungkin saja untuk mengelabui teman &ndash; teman kita yang melihat kita sedang berinternetan ria di server lokal kita. Akan tetapi seoalh &ndash; olah sedang berselancar diinternet sebagainmana biasanya.</p>\r\n<p align="justify">Tanpa berpanjang lebar lagi, silahkan simak langkah &ndash; langkah dibawah ini:</p>\r\n<ol>\r\n<li>\r\n<div align="justify">Jika server dalam keadaan aktif, stop dulu [conoth: xampp distop]</div>\r\n</li>\r\n<li>\r\n<div align="justify">Masuk ke folder &ldquo;<span style="color: #0080ff;">C:\\Windows\\System32\\drivers\\etc</span>&rdquo;</div>\r\n</li>\r\n<li>\r\n<div align="justify">Buka file yang bernama &ldquo;host&rdquo; yang bertipekan file dengan teks editor [misal: notepad]</div>\r\n</li>\r\n<li>\r\n<div align="justify">kemudian tambahkan script berikut ini pada bagian paling bawah<br /><span style="color: #0080ff;">127.0.0.1&nbsp;&nbsp;&nbsp; </span><a href="http://www.situsku.com"><span style="color: #0080ff;">www.situsku.com</span></a></div>\r\n</li>\r\n<li>\r\n<div align="justify">Setelah selesai, simpan</div>\r\n</li>\r\n<li>\r\n<div align="justify">Start lagi server [contoh: xampp di start</div>\r\n</li>\r\n</ol>\r\n<p align="justify"><strong>Penjelasan:</strong></p>\r\n<ul>\r\n<li>\r\n<div align="justify"><a href="http://websiternewbie.blogspot.com">www.situsku.com</a> merukan situs yang sama dengan situs localhost, jadi apabila Anda membuka situs <a href="http://websiternewbie.blogspot.com">www.situsku.com</a> maka akan dibawa menuju localhost, atau yang sebenarnya adalah 127.0.0.1.</div>\r\n</li>\r\n<li>\r\n<div align="justify">Jadi, hanya dengan menambahkan kode seperti diatas, Anda dapat bermain &ndash; main dengan alamat server local Anda. Dan tidak hanya satu situs saja, tetapi Anda juga dapat membuat banyak, silahkan dibuat sesuka hati.</div>\r\n</li>\r\n</ul>\r\n<p><strong>Pengeditan:</strong></p>\r\n<p><img src="/upload/image/contoh%20notepad_thumb.jpg" alt="" width="471" height="269" /></p>\r\n<p>Itulah sedikit tips dan trik dari websiter newbie dan semoga dapat bermanfaat.</p>', 'http://noor.hol.es:80/upload/image/Tips%20%26%20Trikcs.png', 3, '2016-06-06 21:01:54', '2016-07-13 16:42:09'),
	(11, 'Belajar Pemrograman Web Bagi Pemula - HTML (Hypertext Markup Language) ~ Bagian 1', 'belajar-html-bagian-1', '<div align="justify"><strong>Pengenalan HTML</strong></div>\r\n<div style="text-align: justify;" align="justify">HTML merupakah kependekan dari Hypertext Markup Language yang dimana HTML ini merupakan pembangun dari sebuah website. Jadi tampilan website yang kita lihat tersebut struktur pembangun utamanya adalah HTML. Kemudian HTML itu merupakan <strong>&ldquo;Client Side Scripting&rdquo; </strong>yaitu bekerja pada bagian klien, atau bisa kita terjemahkan&nbsp; bahwa apa yang kita lihat didalam sebuah web browser, maka kita dapat pula melihat sintaksnya pada web browser tersebut yaitu dengan cara melihat Source Codenya (Ctrl+U). Lain halnya dengan PHP atau ASP yang merupakan <strong>&ldquo;Server Side Scripting&rdquo;, </strong>yaitu server melakukan pengolahan data terlebih dahulu sebelum memberikan hasilnya kepada klien atau sebelum ditampilkan pada web browser.</div>\r\n<div align="justify">&nbsp;</div>\r\n<div align="justify"><strong>Element HTML</strong></div>\r\n<div style="text-align: justify;" align="justify">Dokumen HTML tersusun dari elemen &ndash; elemen. Yang dimaksud dengan elemen yaitu komponen &ndash; komponen dasar pembentuk dokumen HTML. Beberapa contohnya yaitu: head, title, body, list, table, dan lain sebagainya.</div>\r\n<div align="justify">&nbsp;</div>\r\n<div align="justify"><strong>Sintaks Dasar HTML</strong></div>\r\n<div style="text-align: justify;" align="justify">Didalam HTML terdapat tiga jenis tag, yang mana setiap tag tersebut memiliki penulisan yang tidak terlalu berbeda dengan yang lainnya. Yaitu:</div>\r\n<ol>\r\n<li>\r\n<div align="justify"><em>Tag Pembuka</em></div>\r\n</li>\r\n<li>\r\n<div align="justify"><em>Tag Penutup</em></div>\r\n</li>\r\n<li>\r\n<div align="justify"><em>Tag Tunggal</em></div>\r\n</li>\r\n</ol>\r\n<div align="justify">Penjelasan:</div>\r\n<ol>\r\n<li>\r\n<div align="justify"><strong>Tag Pembuka<br /></strong>Penulisan tag pembuka yaitu dengan tanda <strong>&ldquo;&lt;&rdquo; &ldquo;elemen&rdquo; &ldquo;&gt;&rdquo;</strong>. <br />Contoh:</div>\r\n</li>\r\n<li>\r\n<div align="justify"><strong>Tag Penutup<br /></strong>Penulisan tag pembuka yaitu dengan tanda <strong>&ldquo;&rdquo;</strong>. Contoh:</div>\r\n</li>\r\n<li>\r\n<div align="justify"><strong>Tag Tunggal</strong><br /> Penulisan tag pembuka yaitu dengan tanda <strong>&ldquo;&lt;&rdquo; &ldquo;elemen&rdquo; &ldquo;/&gt;&rdquo;</strong>. <br />Contoh: <strong><br /></strong></div>\r\n</li>\r\n</ol>\r\n<p>Setiap tag pembuka harus mempunyai tag penutup, misalnya: pembuka harus ditutup dengan , jadi nama elemenya harus sama. Akan tetapi pada penulisan tag tunggal tidak perlu mempunyai tag penutup, karena memang tag tuggal ini telah mempunyai penutupnya sendiri seperti contoh diatas. Beberapa contoh dari tag tunggal yaitu: <code>&lt;br/&gt;</code> dan<code></code> <code>&lt;hr/&gt;</code></p>\r\n<div style="text-align: justify;" align="justify">Kemudian, untuk membangun sebuah halaman web, terdapat sebuah tag dasar HTML yang harus diperhatikan dan harus dipahamai yaitu:</div>\r\n<div style="text-align: justify;" align="justify">&nbsp;</div>\r\n<div style="text-align: justify;" align="justify">\r\n<pre>&lt;html&gt;<br />&lt;head&gt;<br />&lt;title&gt;Judul Website&lt;/title&gt;<br />&lt;/head&gt;<br />&lt;body&gt;<br /><br /><strong><em>"Bagian ini yang akan tampil dibrowser"</em></strong><br /><br />&lt;/body&gt;<br />&lt;/html&gt;</pre>\r\n</div>\r\n<div style="text-align: justify;" align="justify">&nbsp;</div>\r\n<div style="text-align: justify;" align="justify">Jadi, taga diatas merupakan tag dasar dari HTML, dan perhatikannlah penulisan dari setiap tag. Setiap tag yang dibuka harus ditutup, dan urutannyapun harus diperhatikan dan dipahami.</div>', 'http://noor.hol.es:80/upload/image/Belajar%20HTML.png', 3, '2016-06-06 21:08:21', '2016-07-13 17:15:37'),
	(12, 'Belajar HTML Mengenal Fungsi MAX_FILE_SIZE Form Upload', 'mengenal-fungsi-max-file-size-upload-file', '<p align="justify">Selamat pagi, siang dan malam bagi semua pecinta dunia maya serta untuk yang sekedar lewat di websiter newbie. Pada kesempatan kali ini, websiter newbie akan berbagi sedikit mengenai upload file, akan tetapi tidak untuk menjelasakan bagaimana cara membuat fungsi upload file, karena sesuai dengan judul kali ini. Websiter newbie hanya berbagi tentang pengenalan dari fungsi MAX_FILE_SIZE pada form input html dari fungsi upload file. Kenapa websiter newbie membahas tentang masalah ini ? Akan websiter newbie jawab sendiri. hehehe&hellip; Karena itu bukan pertanyaan untuk para sahabat websiter newbie akan tetapi hanya sekedar alasan untuk membuat postingan kali ini. Okelah kalau begitu, tanpa panjang x lebar x tinggi lagi, websiter newbie akan menjelaskan dan bercerita mengenai hal tersebut.</p>\r\n<p align="justify">Pada awalnya, hal ini terjadi pada salah seorang teman saya yang masih baru belajar tentang web (seorang websiter newbie) yang saat itu sedang mempelajari tentang upload file. Dan ketika saya melihat script yang dibuatnya saya merasa terheran &ndash; heran. Karena pada script itu terdapat script yang menyatakan besar maksimal file yang tidak sesuai dengan apa yang websiter newbie ketahui. Tag itu adalah:</p>\r\n<pre>&lt;input type=&rdquo;hidden&rdquo; name=&rdquo;batas&rdquo; value=&rdquo;2000000&rdquo;&gt;</pre>\r\n<p align="justify">Terlihat pada script diatas biasa saja, akan tetapi saya yakin teman saya ini telah mendapat tutorial untuk membuat upload file, karena sebelumnya saya juga telah mempelajari tentang hal itu(sekitar 1 tahun yang lalu dari teman saya) akan tetapi yang saya gunakan itu adalah:</p>\r\n<pre>&lt;input type=&rdquo;hidden&rdquo; name=&rdquo;MAX_FILE_SIZE&rdquo; value=&rdquo;2000000&rdquo;&gt;</pre>\r\n<p align="justify">Nah, kemudian saya berfikir. Apakah teman saya ini sengaja mengganti name dari script tersebut, karena memang dia kadang &ndash; kadang membuat suatu yang berbeda dengan tutorial(Membuat logika sendiri = Good). Kemudian hal tersebut saya tanyakan kepada seorang teman(senior) yang lebih paham masalah web. Akan tetapi hal tersebut tidak dipermasalahkannya karena hanya sebagai name dari inputan tersebut. Saya mengatakan o iya ya dan mengatakan pula(setelah mengingat), bahwasanya dulu ketika belajar tentang upload file saya telah menemukan hal tersebut dan mempunyai fungsi untuk membatasi size/kapasitas file yang dapat diupload dari klien. Akan tetapi karena saya hanyalah seorang newbie, dan saya merasa kalau saya itu kemungkinan lupa apa yang saya pelajari jadi saya mengakhiri tentang pembahasan tentang hal tersebut.</p>\r\n<p align="justify">Akan tetapi, sebagai seorang newbie yang ingin tahu sekali, dan ingin mengingat hal yang dulunya saya lakukan tentang upload file. Maka setelah pulang dari sekolah(perbincangan dengan teman &ndash; teman diatas berlatar di sekolah) saya pun berniat membuktikan hal yang sebenarnya tentang masalah MAX_FILE_SIZE. Akhirnya setelah shalat isya saya menyiapkan diri untuk membuktikan kebenaran. Dan saya mulai dengan membuka notepad++ yang ada dilaptop saya, dan membuat dua buah file yaitu:</p>\r\n<p><code>index.php</code> dan <code>proses.php</code></p>\r\n<p align="justify">Penggunaan masing &ndash; masing file yaitu pada bagian index.php saya hanya menaruh script untuk htmlnya saja, yaitu sebuah inputan file yang isinya:</p>\r\n<pre>&lt;html&gt;<br />&lt;head&gt;<br />&nbsp;&nbsp;&nbsp; &lt;title&gt;Upload&lt;/title&gt;<br />&lt;/head&gt;<br />&lt;body&gt;<br />&nbsp;&nbsp;&nbsp; &lt;form action="proses.php" method="post" enctype="multipart/form-data"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;input type="hidden" name="MAX_FILE_SIZE" value="2000000" /&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label&gt;Pilih File:&lt;/label&gt;&lt;br /&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;input type="file" name="file" /&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;input type="submit" name="upload" value="Upload" /&gt;<br />&nbsp;&nbsp;&nbsp; &lt;/form&gt;<br />&lt;/body&gt;<br />&lt;/html&gt;</pre>\r\n<p align="justify">Dan pada bagian proses saya akan melihat dan membuktikan apakah yang terjadi jika file yang akan saya upload melebihi kapasitas yang sudah saya tentukan dengan menggunakan MAX_FILE_SIZE pada bagian input. Script proses.php seperti dibawah ini:</p>\r\n<pre>&lt;?php<br />$file_name = $_FILES[\'file\'][\'name\'];<br />$file_tmp = $_FILES[\'file\'][\'tmp_name\'];<br />$file_error = $_FILES[\'file\'][\'error\'];<br />$file_size = $_FILES[\'file\'][\'size\'];<br /><br />echo "Nama File: ".$file_name."&lt;br&gt;Ukuran: ".$file_size."&lt;br&gt;Error: ".$file_error;<br />echo "&lt;br /&gt;&lt;br /&gt;";<br />$upload = move_uploaded_file($file_tmp,"hasil_upload/".$file_name);<br />if($upload)<br />&nbsp;&nbsp;&nbsp; {<br />&nbsp;&nbsp;&nbsp; echo "&lt;b&gt;Berhasil&lt;/b&gt;";<br />&nbsp;&nbsp;&nbsp; }<br />else{<br />&nbsp;&nbsp;&nbsp; echo "&lt;b&gt;Gagal !&lt;/b&gt;";<br />&nbsp;&nbsp;&nbsp; }<br />?&gt;</pre>\r\n<p align="justify">Okey, pada script diatas dapat dilihat bahwasanya saya hanya akan melihat hasilnya yaitu pada bagian name, error, dan ukurannya.&nbsp;</p>\r\n<p align="justify"><strong>Percobaan 1</strong></p>\r\n<p align="justify">Pada percobaan ini saya menngunggah file yang kapasitasnya<strong> kurang dari 2000000 bytes</strong> atau <strong>&lt; 2MB</strong>. Dan hasilnya yaitu:</p>\r\n<p align="justify"><img src="/upload/image/upload1.jpg" alt="" width="394" height="196" /></p>\r\n<p align="justify"><strong>Percobaan 2&nbsp; </strong></p>\r\n<p align="justify">Pada percobaan ini saya menngunggah file yang kapasitasnya <strong>lebih dari 2000000</strong> bytes atau <strong>&gt; 2MB.</strong> Dan hasilnya yaitu:</p>\r\n<p align="justify"><img src="/upload/image/upload2.jpg" alt="" width="380" height="185" /></p>\r\n<p align="justify"><strong>Kesimpulan:</strong></p>\r\n<p align="justify">Pada dua percobaan diatas terlihat terjadi perbedaan pada bagian Error, sedangkan apabila nilai error dari file yang akan kita upload bukan 0 (nol), maka proses upload akan gagal. Maka dari itu hal ini berpengaruh terhadap proses upload yang kita buat. Untuk kesimpulan yang lainnya mungkin sahabat newbie dapat menarik kesimpulan sendiri.</p>\r\n<p align="justify">Dan itulah yang menjadi dasar websiter newbie untuk membuat postingan ini, dan semoga bermanfaat bagi semunya. Dan dalam membuat postingan ini websiter newbie dalam keadaan sadar dengan sebenar &ndash; benarnya.. hahaha.</p>\r\n<p align="justify">Seperti membuat surat kuasa saja. Okelah sekian dan terima kasih.</p>', 'http://noor.hol.es:80/upload/image/Tips%20%26%20Trikcs.png', 3, '2016-06-07 11:35:00', '2016-07-13 17:00:23'),
	(13, 'Begini Cara Mengubah Alamat Server Lokal "Localhost" Sesuai Keinginan - Linux', 'mengubah-alamat-localhost-lampp-di-linux', '<p>Bismillah,</p>\r\n<p>Jika Anda sudah bosan dengan alamat localhost yang itu-itu saja, maka Anda masuk ditulisan yang&nbsp;tepat. Anda dapat mengubah alamat server lokal sesuai dengan yang Anda inginkan.</p>\r\n<p>Silahkan ikuti langkah-langkah sederhana dibawah ini.<span id="more-65"></span></p>\r\n<ol>\r\n<li>Buka Terminal dan&nbsp;masuk sebagai super user ( sudo su ).</li>\r\n<li>Buka file yang ada pada direktori: <code>/etc/hosts</code><strong><br /><br /></strong><strong><img src="/upload/image/local-1.png" alt="" width="602" height="92" /><br /></strong></li>\r\n<li>Tambahkan script <code>&ldquo;127.0.1.1 &nbsp; &nbsp; &nbsp; nur.com&rdquo; </code>seperti dibawah ini.<br /><br /><img src="/upload/image/local-2.png" alt="" width="602" height="280" /><br /> <br /><strong>nur.com&nbsp;:</strong> ganti sesuai dengan&nbsp;yang Anda inginkan.<br /><br /></li>\r\n<li>Sehingga sekarang Anda dapat membuka localhost dengan nur.com ( sesuai dengan yang Anda gunakan ). <br /><strong>Jangan lupa untuk menghidupkan service Lampp terlebih dahulu.<br /></strong><br /> <img src="/upload/image/local-3.png" alt="" width="605" height="377" /><br /><br /></li>\r\n<li>Selesai</li>\r\n</ol>', 'http://noor.hol.es:80/upload/image/Tips%20%26%20Trikcs.png', 3, '2016-06-07 11:47:14', '2016-07-13 17:02:25'),
	(22, 'Mengaktifkan ZIP Extension PHP di Linux Ubuntu', 'mengaktifkan-zip-extension-php-di-linux-ubuntu', '<p>Bismillah,</p>\r\n<p>Masalah ini saya dapatkan ketika mencoba memasang&nbsp;OpenCart di Linux &ndash; Ubuntu Mate. Untuk menyelesaikan masalah ini, silahkan ikuti langkah-langkah sederhana dibawah ini.</p>\r\n<ol>\r\n<li>Hilangkan tanda komentar pada <strong>&ldquo;<span class="skimlinks-unlinked">zip.so</span>&rdquo;</strong> pada file <strong><span class="skimlinks-unlinked">php.ini</span></strong> (Letaknya: <strong>/opt/lampp/etc/<span class="skimlinks-unlinked">php.ini</span></strong>) dengan cara menghapus tanda titik koma &ldquo;<strong>;</strong>&rdquo; didepannya.</li>\r\n<li>Hilangkan tanda komentar pada <strong>&ldquo;extension_dir&rdquo;</strong> dan perbarui nilainya menjadi:&nbsp;<strong>extension_dir = &ldquo;/opt/lampp/lib/php/extensions/no-debug-non-zts-20100525&rdquo;</strong></li>\r\n<li><strong>Download <span class="skimlinks-unlinked">zip.so</span></strong> yang telah saya sertakan pada link dibawah, dan letakkan pada direktori extension_dir yang telah&nbsp;ditentukan di poin 2.</li>\r\n<li>Silahkan <strong>restart&nbsp;xampp / lampp</strong>.</li>\r\n<li>Selesai.</li>\r\n</ol>\r\n<p><a href="https://www.dropbox.com/s/3qr8v5w0g4u3lfh/zip.so" target="_blank">Download zip.so</a></p>', 'http://noor.hol.es:80/upload/image/Tips%20%26%20Trikcs.png', 3, '2016-07-13 17:08:47', '2016-07-13 17:08:47'),
	(23, 'Mengenal Sintaks Dasar HTML5 - The New Generation of HTML', 'mengenal-sintaks-dasar-html5-the-new-generation-of-html', '<p>Bismillah,</p>\r\n<p>Anda sudah mengenal HTML5?</p>\r\n<p>Ya, HTML5 adalah versi terbaru dari HTML. Namun tahukah Anda apa yang berubah dari versi HTML ini?</p>\r\n<p>Kata orang-orang sih HTML5 hadir dengan sifatnya yang lebih berkemanusiaan, Hehe :D. Jadi maksudnya, pada versi HTML5 kita mengenal yang namanya Semantic Tag, yaitu tag-tag yang digunakan dapat dipahami dengan mudah oleh programmer karena menggunakan bahasa inggris yang kita kenal, misalnya section, nav, aside, header dan footer.</p>\r\n<p>Nah, sebelum lebih jauh mempelajari HTML5. Berikut contoh sintaks dasarnya:</p>\r\n<pre class="w3-code notranslate htmlHigh"><span style="color: brown;"><span style="color: mediumblue;">&lt;</span>!DOCTYPE<span style="color: red;"> html</span><span style="color: mediumblue;">&gt;</span></span><br /> <span style="color: brown;"><span style="color: mediumblue;">&lt;</span>html<span style="color: mediumblue;">&gt;</span></span><br /><span style="color: brown;"><span style="color: mediumblue;">&lt;</span>head<span style="color: mediumblue;">&gt;</span></span><br /><span style="color: brown;"><span style="color: mediumblue;">&lt;</span>title<span style="color: mediumblue;">&gt;</span></span>Page Title<span style="color: brown;"><span style="color: mediumblue;">&lt;</span>/title<span style="color: mediumblue;">&gt;</span></span><br /> <span style="color: brown;"><span style="color: mediumblue;">&lt;</span>/head<span style="color: mediumblue;">&gt;</span></span><br /><span style="color: brown;"><span style="color: mediumblue;">&lt;</span>body<span style="color: mediumblue;">&gt;</span></span><br /><br /><span style="color: brown;"><span style="color: mediumblue;">&lt;</span>h1<span style="color: mediumblue;">&gt;</span></span>This is a Heading<span style="color: brown;"><span style="color: mediumblue;">&lt;</span>/h1<span style="color: mediumblue;">&gt;</span></span><br /><span style="color: brown;"><span style="color: mediumblue;">&lt;</span>p<span style="color: mediumblue;">&gt;</span></span>This is a paragraph.<span style="color: brown;"><span style="color: mediumblue;">&lt;</span>/p<span style="color: mediumblue;">&gt;</span></span><br /><br /> <span style="color: brown;"><span style="color: mediumblue;">&lt;</span>/body<span style="color: mediumblue;">&gt;</span></span><br /><span style="color: brown;"><span style="color: mediumblue;">&lt;</span>/html<span style="color: mediumblue;">&gt;</span></span></pre>', 'http://noor.hol.es:80/upload/image/Belajar%20HTML.png', 3, '2016-07-13 17:21:27', '2016-07-13 17:21:27'),
	(24, 'Membuat Artikel Blog Secara Offline Dengan Aplikasi Windows Live Writer ', 'membuat-artikel-blog-secara-offline-dengan-aplikasi-windows-live-writer', '<p style="text-align: left;" align="justify">Bismillah,</p>\r\n<p style="text-align: left;" align="justify">Apakah Anda seorang blogger? Jika iya, maka artikel ini sangat cocok untuk Anda.</p>\r\n<p style="text-align: left;" align="justify">Pada kesempatan kali ini, Websiter Newbie akan berbagi sedikit, karena yang sedikit lama &ndash; lama bisa menjadi bukit. Seperti kata banyak pepatah tuh.</p>\r\n<p style="text-align: left;" align="justify">Langsung saja kepermasalahan, ini newbie dapat dari pengalaman newbie sendiri saat baru &ndash; baru bergelut dibidang ngeblog, namanya juga masih newbie jadi pengetahuan masih sangatlah dangkal. Oleh sebab itu tidak salah kalo newbie berbagi hal yang masih kecil dulu, diantaranya tentang cara <strong>membuat postingan blog secara offline</strong>, seperti saat newbie membuat postingan ini. Kenapa perlu membuat postingan secara offline ? Nah, ini mempunyai banyak manfaat, diantaranya kita bisa membuat banyak postingan diblog tanpa harus langsung mempunyai koneksi internet, jadi apabila telah ada koneksi, kita tinggal memposting postingan yang telah kita buat sebelumnya. Jadi ini untuk menghemat biaya serta waktu juga, bila kita bayangkan untuk membuat sebuah postingan kita harus pergi ke warnet setiap saat, berapa banyak uang yang akan kita habiskan dan tentu waktu kita tidak akan terbuang dengan sia &ndash; sia.</p>\r\n<p style="text-align: left;" align="justify">Newbie rasa kata pengantar diatas cukup untuk menjelaskan tentang manfaat dan tujuan newbie membuat postingan kali ini. Jangan terlalu panjang dan lebar, nanti bisa jadi luas. Langsung saja yang merasakan kenikmatan ngeblog dengan <strong>Windows Live</strong> klik link dibawah. Dan setelah didownload silahakan diinstall, disana akan ada beberapa pilihan pengistalan aplikasi, pilih saja <strong>Windows Live Writer</strong> atau kalo mau yang lainnya silahkan. Newbie gak akan marah.</p>\r\n<p style="text-align: left;" align="justify">Tapi untuk install ini membutuhkan koneksi internet dan kita dapat menambahkan plugin yang lainnya untuk memperindah, seperti <strong>Cool Motion</strong> dan banyak lagi yang lainnya.</p>\r\n<p style="text-align: left;" align="justify">&nbsp;</p>\r\n<p style="text-align: center;" align="center"><a href="http://www.mediafire.com/?27sfmsxrgajmqxa" target="_blank">Download Windows Live Writer</a></p>\r\n<p style="text-align: left;" align="justify">&nbsp;</p>\r\n<p style="text-align: left;" align="justify"><strong>Catatan:</strong></p>\r\n<p style="text-align: left;" align="justify">Sebenarnya banyak sekali aplikasi lain yang digunakan untuk membuat postingan blog secara offline, dan banyak blog &ndash; blog lain yang membahasnya. Akan tetapi, dengan aplikasi tersebut newbie tidak merasa nyaman dan sering sekali aplikasi itu tidak bisa dijalankan dan rumit untuk dipahami penggunaannya. Akan tetapi dengan <strong>Windows Live</strong> ini newbie sangatlah nyaman menggunakannya dan penggunaannya pun sangatlah mudah. Ini bukan promo lo kawan, tapi newbie hanya berbagi pengalaman saja. Pengalaman adalah guru yang paling baik, seperti kata orang bijak. Hehe :)</p>', 'http://noor.hol.es:80/upload/image/Tips%20%26%20Trikcs.png', 3, '2016-07-13 17:26:18', '2016-07-13 17:26:18'),
	(25, 'Belajar Pemrograman Web Bagi Pemula - PHP (PHP Hypertext Preprocessor) ~ Perkenalan', 'belajar-pemrograman-web-bagi-pemula-php-php-hypertext-preprocessor-perkenalan', '<p>Bismillah,</p>\r\n<p>Pada kesempatan kali ini kita akan mengenal yang namanya PHP, dan tentu teman-teman sudah mengenal apa itu PHP kan? PHP itu kepanjangannya <strong>Pemberi Harapan Palsu. </strong>Hehe :D</p>\r\n<p>Biasanya yang bilang PHP itu Pemberi Harapan Palsu ialah mereka yang tersakiti -_- (Aku bukan tersangka).</p>\r\n<p>Aduh, ngocehnya udah ya. Sekarang kita masuk ke inti, sesuai judul kali ini kita akan berkenalan dengan PHP. PHP adalah bahasa yang digunakan untuk membuat konten website menjadi dinamis, berbeda dengan HTML yang bersifat statis. Nah, PHP ini dikenal juga dengan Server Side Scripting, yaitu kode program yang dibuat akan diproses diserver terlebih dahulu untuk kemudian hasilnya diberikan ke klien dalam bentuk HTML, JavaScript, dll.</p>\r\n<p>Sehingga, kita membutuhkan bantuan server untuk memulai menulis program dengan PHP. Misalnya dengan menggunakan Nginx, XAMPP, dll.</p>\r\n<p>Berikut adalah contoh paling sederhana kode PHP.</p>\r\n<pre>&lt;!DOCTYPE html&gt;<br /> &lt;html&gt;<br /> &lt;body&gt;<br /><br /> <strong><span class="marked">&lt;?php<br /> echo "My first PHP script!";<br /> ?&gt;</span></strong><br /> <br /> &lt;/body&gt;<br /> &lt;/html&gt; </pre>', 'http://noor.hol.es:80/upload/image/PHP.png', 3, '2016-07-13 17:37:55', '2016-07-13 17:37:55'),
	(26, 'Berkenalan Dengan jQuery - Write Less, Do More', 'berkenalan-dengan-jquery-write-less-do-more', '<p>jQuery atau JavaScript Library memiliki semboyan "Write Less, Do More" yang memiliki arti kurang lebih adalah penyerhanaan fungsi-fungsi rumit menjadi lebih ringkas. Dirancang dengan tujuan untuk memperingkas kode-kode javascript. Dirilis pertama kali pada tahun 2006 oleh John Resig. jQuery telah mencuri perhatian para developer web dan banyak digunakan oleh website terkemuka di dunia. Sebelum mulai mempelajari jQuery, kalian terlebih dahulu harus mengerti dasar-dasar penggunaan HTML, CSS dan JavaScript.</p>\r\n<h4>Kemampuan Library jQuery</h4>\r\n<p>Library jQuery memiliki kemampuan untuk:</p>\r\n<ol>\r\n<li>Kemudahan mengakses elemen-elemen HTML</li>\r\n<li>Menyederhanakan kode JavaScript lainnya</li>\r\n<li>Penganganan event HTML</li>\r\n<li>Efek-efek JavaScript dan Animasi</li>\r\n<li>Modifikasi HTML DOM (Document Object Model)</li>\r\n<li>Manipulasi elemen HTML</li>\r\n<li>Manipulasi elemen CSS</li>\r\n</ol>\r\n<p>Nah itu sedikit pengenalan jQuery. Tak kenal maka tak sayang, katanya sih gitu...</p>\r\n<p>&nbsp;</p>\r\n<p><em>(Diambil dari modul praktikum Pemrograman Web 2014/2015)</em></p>', 'http://noor.hol.es:80/upload/image/jQuery.png', 3, '2016-07-13 17:46:38', '2016-07-13 17:46:38'),
	(27, 'Belajar Mempercantik Tampilan Website Dengan CSS (Casecading Style Sheet)  ~ Pengenalan', 'belajar-mempercantik-tampilan-website-dengan-css-casecading-style-sheet-pengenalan', '<p>Bosan dengan tampilan website yang begitu-begitu saja?</p>\r\n<p>Nah, pada kesempatan kali ini kita akan berkenalan dengan CSS (Casecading Style Sheet) yaitu bahasa yang kita gunakan untuk mempercantik halaman website yang kita buat. Pada saat ini versi terbaru CSS adalah CSS3.</p>\r\n<h4>Apa saja yang dapat dilakukan dengan CSS?</h4>\r\n<ol>\r\n<li>Mengendalikan ukuran gambar dan memberikan <em>background</em> dari suatu elemen web</li>\r\n<li>memberikan warna baik pada suatu elemen web, teks, tabel, border, hyperlink, mouse over dan lainnya</li>\r\n<li>Menentukan jarak antar teks, spasi antar paragraf, margin, dan lain sebagainya dari suatu elemen web</li>\r\n</ol>\r\n<p>Tertarik mempelajari CSS lebih dalam? Silahkan kunjungi situs <a title="Kunjungi Situs" href="http://www.w3schools.com/css/default.asp" target="_blank">w3school</a> yang akan membantu teman-teman untuk memperluas cakrawala tentang CSS tersebut.</p>', 'http://noor.hol.es:80/upload/image/CSS.png', 3, '2016-07-13 17:54:03', '2016-07-13 17:54:03'),
	(28, 'Membuat Website Interaktif Dengan Javascript ~ Pengenalan', 'membuat-website-interaktif-dengan-javascript-pengenalan', '<h3>Bosan dengan tampilan website yang kaku?</h3>\r\n<p>Ini dia solusinya, dengan menggunakan javascript teman-teman dapat membuat website menjadi lebih interaktif. Sebelum lebih jauh, mari kita berkenalan dulu dengan JavaScript.</p>\r\n<p>&nbsp;</p>\r\n<p>JavaScript merupakan bahasa pemrograman yang menggunakan client side scripting, yang artinya pengeksekusian perintah-perintahnya dilakukan pada sisi browser (client) bukan pada server serperti bahasa java ataupun C, setiap instruksi diakhiri dengan karakter titik koma (;). Oleh karena itu hasil dari pemanggilan javascript tergantung pada browser.</p>\r\n<p>Beberapa hal penting yang perlu diketahui dalam javascript:</p>\r\n<ol>\r\n<li>Menggunakan blok awal "{" dan blok akhir "}"</li>\r\n<li>Case Sensitive artinya membedakan penamaan variable dan fungsi yang menggunakan huruf besar dan huruf kecil</li>\r\n<li>Ekstensi umumnya menggunakan <strong>*.js</strong></li>\r\n<li>setipa statement dapat diakhiri dengan ";" sebagaimana dengan C++, tetapi dapat pula tidak</li>\r\n<li>Jika tidak didukan dalam browser versi lama, scriptnya dapat disembunyikan diantara tag <code>&lt;!-</code> dan <code>//-&gt;</code></li>\r\n<li>Jika program dalam satu baris terlalu panjang dapat disambung kebaris berikutnya dengan karakter "/"</li>\r\n</ol>\r\n<p>Berikut contoh skrip sederhana JavaScript.</p>\r\n<pre>&lt;!DOCTYPE html&gt;<br />&lt;html&gt;<br />&lt;head&gt;<br />&nbsp;&nbsp; &nbsp;&lt;title&gt;Belajar JavaScript&lt;/title&gt;<br /><br />&nbsp;&nbsp; &nbsp;&lt;script type="text/javascript"&gt;<br />&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;window.alert("Hello World!");<br />&nbsp;&nbsp; &nbsp;&lt;/script&gt;<br /><br />&lt;/head&gt;<br />&lt;body&gt;<br />&lt;/body&gt;<br />&lt;/html&gt;</pre>\r\n<p>Sekian pengenalan JavaScript ini, semoga bermanfaat.</p>\r\n<p>&nbsp;</p>\r\n<p><em>(Diambil dari modul praktikum Pemrograman Web 2014/2015)</em></p>', 'http://noor.hol.es:80/upload/image/JavaScript.png', 3, '2016-07-13 18:21:33', '2016-07-13 18:21:33');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;


-- Dumping structure for table myblog.post_tag
CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_tag_tag_id_foreign` (`tag_id`),
  KEY `post_tag_post_id_foreign` (`post_id`),
  CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.post_tag: ~0 rows (approximately)
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;


-- Dumping structure for table myblog.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`) VALUES
	(1, 'admin'),
	(2, 'author'),
	(3, 'contributor');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table myblog.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id_role` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_role`,`id_user`),
  KEY `role_user_id_user_foreign` (`id_user`),
  CONSTRAINT `role_user_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.role_user: ~3 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`id_role`, `id_user`) VALUES
	(1, 3),
	(2, 5),
	(3, 6);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;


-- Dumping structure for table myblog.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.tags: ~5 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `name`, `slug`, `description`) VALUES
	(1, 'Algorithm', 'algorithm', 'Computer Algorithm'),
	(4, 'Tutorial', 'tutorial', 'All about tutorial'),
	(5, 'Basic', 'basic', 'All about something basic '),
	(6, 'Bresenham', 'bresenham', 'Bresenham Algorithm'),
	(7, 'UI/UX Design', 'ui-ux-design', 'All about design');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;


-- Dumping structure for table myblog.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(3, 'Nur Muhammad', 'admin@nursblog.com', '$2y$10$1JkJYf.UNqDtZuh88x5kCuUML2p7SdJK4fhPh1A76M2/kq7tvmTsi', 'iXzXLLbtQZ7ierRZc1TP2o52zDfovSLFfr6N5Lt7td3Y0636C9OrQzsn5FMp', '2016-06-02 09:48:29', '2016-07-13 07:59:56'),
	(5, 'Nabil Muhammad', 'author@nursblog.com', '$2y$10$.mN.oPVWJZxgnJ9.mprVqOj0a1/M.Uqf8aIhnu6o4MbhseMGcfFL6', 'XuWWGbeMNggcRVFobRmU8gG8QGGlD1q1D0Suy87dUDVe34wOwOoHQqzbRdAM', '2016-06-02 10:21:56', '2016-06-06 08:56:19'),
	(6, 'Resqa Dahmurah', 'contributor@nursblog.com', '$2y$10$2iCBmk1cWxoXJPqNhLyV8.ksly4KCYy2sMVdCzMIj754E/YoLgFCW', NULL, '2016-06-06 08:57:16', '2016-06-06 08:57:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
