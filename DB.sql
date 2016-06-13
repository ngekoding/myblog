-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.12-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table myblog.artikel
CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_post` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table myblog.artikel: 0 rows
/*!40000 ALTER TABLE `artikel` DISABLE KEYS */;
/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;


-- Dumping structure for table myblog.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.categories: ~6 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `slug`, `description`) VALUES
	(1, 'Tips & Tricks', 'tips-tricks', 'All about computer tips and tricks'),
	(2, 'Computer Hacking', 'computer-hacking', 'All about computer hacking'),
	(3, 'Programming', 'programming', 'All about programming'),
	(4, 'Story', 'story', 'Just for fun'),
	(5, 'Java Tutorial', 'java-tutorial', 'All about java programming'),
	(6, 'PHP Tutorial', 'php-tutorial', 'All about PHP programming'),
	(7, 'CSS Tutorial', 'css-tutorial', 'All about CSS tutorial');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.category_post: ~8 rows (approximately)
/*!40000 ALTER TABLE `category_post` DISABLE KEYS */;
INSERT INTO `category_post` (`id`, `category_id`, `post_id`) VALUES
	(7, 1, 10),
	(8, 3, 10),
	(9, 3, 11),
	(10, 1, 12),
	(11, 3, 12),
	(12, 1, 13),
	(13, 3, 13);
/*!40000 ALTER TABLE `category_post` ENABLE KEYS */;


-- Dumping structure for table myblog.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.migrations: ~9 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.posts: ~5 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `image`, `author_id`, `created_at`, `updated_at`) VALUES
	(10, 'Mengubah Alamat "Localhost" - Server Lokal', 'mengubah-alamat-localhost-server-lokal', '<p align="justify">Pada kesempatan kali ini, websiter newbie akan berbagi sedikit tips dan trik yang InsyaAllah dapat menambah ilmu kawan &ndash; kawan semua. Sesuai dengan judul diatas, kali ini akan newbie bagikan sebuah trik untuk mengubah alamat &ldquo;localhost&rdquo; server yang kita gunakan.</p>\r\n<p align="justify">Karena Tidak selamanya kita menggunakan localhost sebagai alamat server kita, alangkah enaknya jika kita dapat memodifikasinya, ya karena mungkin saja untuk mengelabui teman &ndash; teman kita yang melihat kita sedang berinternetan ria di server lokal kita. Akan tetapi seoalh &ndash; olah sedang berselancar diinternet sebagainmana biasanya.</p>\r\n<p align="justify">Tanpa berpanjang lebar lagi, silahkan simak langkah &ndash; langkah dibawah ini:</p>\r\n<ol>\r\n<li>\r\n<div align="justify">Jika server dalam keadaan aktif, stop dulu [conoth: xampp distop]</div>\r\n</li>\r\n<li>\r\n<div align="justify">Masuk ke folder &ldquo;<span style="color: #0080ff;">C:\\Windows\\System32\\drivers\\etc</span>&rdquo;</div>\r\n</li>\r\n<li>\r\n<div align="justify">Buka file yang bernama &ldquo;host&rdquo; yang bertipekan file dengan teks editor [misal: notepad]</div>\r\n</li>\r\n<li>\r\n<div align="justify">kemudian tambahkan script berikut ini pada bagian paling bawah<br /><span style="color: #0080ff;">127.0.0.1&nbsp;&nbsp;&nbsp; </span><a href="http://www.situsku.com"><span style="color: #0080ff;">www.situsku.com</span></a></div>\r\n</li>\r\n<li>\r\n<div align="justify">Setelah selesai, simpan</div>\r\n</li>\r\n<li>\r\n<div align="justify">Start lagi server [contoh: xampp di start</div>\r\n</li>\r\n</ol>\r\n<p align="justify"><strong>Penjelasan:</strong></p>\r\n<ul>\r\n<li>\r\n<div align="justify"><a href="http://websiternewbie.blogspot.com">www.situsku.com</a> merukan situs yang sama dengan situs localhost, jadi apabila Anda membuka situs <a href="http://websiternewbie.blogspot.com">www.situsku.com</a> maka akan dibawa menuju localhost, atau yang sebenarnya adalah 127.0.0.1.</div>\r\n</li>\r\n<li>\r\n<div align="justify">Jadi, hanya dengan menambahkan kode seperti diatas, Anda dapat bermain &ndash; main dengan alamat server local Anda. Dan tidak hanya satu situs saja, tetapi Anda juga dapat membuat banyak, silahkan dibuat sesuka hati.</div>\r\n</li>\r\n</ul>\r\n<p><strong>Pengeditan:</strong></p>\r\n<p><img src="/upload/image/contoh%20notepad_thumb.jpg" alt="" width="471" height="269" /></p>\r\n<p>Itulah sedikit tips dan trik dari websiter newbie dan semoga dapat bermanfaat.</p>', '/upload/image/ubah%20localhost_thumb.jpg', 3, '2016-06-06 10:01:54', '2016-06-10 06:06:31'),
	(11, 'Belajar HTML - Bagian 1', 'belajar-html-bagian-1', '<div align="justify"><strong>Pengenalan HTML</strong></div>\r\n<div style="text-align: justify;" align="justify">HTML merupakah kependekan dari Hypertext Markup Language yang dimana HTML ini merupakan pembangun dari sebuah website. Jadi tampilan website yang kita lihat tersebut struktur pembangun utamanya adalah HTML. Kemudian HTML itu merupakan <strong>&ldquo;Client Side Scripting&rdquo; </strong>yaitu bekerja pada bagian klien, atau bisa kita terjemahkan&nbsp; bahwa apa yang kita lihat didalam sebuah web browser, maka kita dapat pula melihat sintaksnya pada web browser tersebut yaitu dengan cara melihat Source Codenya (Ctrl+U). Lain halnya dengan PHP atau ASP yang merupakan <strong>&ldquo;Server Side Scripting&rdquo;, </strong>yaitu server melakukan pengolahan data terlebih dahulu sebelum memberikan hasilnya kepada klien atau sebelum ditampilkan pada web browser.</div>\r\n<div align="justify">&nbsp;</div>\r\n<div align="justify"><strong>Element HTML</strong></div>\r\n<div style="text-align: justify;" align="justify">Dokumen HTML tersusun dari elemen &ndash; elemen. Yang dimaksud dengan elemen yaitu komponen &ndash; komponen dasar pembentuk dokumen HTML. Beberapa contohnya yaitu: head, title, body, list, table, dan lain sebagainya.</div>\r\n<div align="justify">&nbsp;</div>\r\n<div align="justify"><strong>Sintaks Dasar HTML</strong></div>\r\n<div style="text-align: justify;" align="justify">Didalam HTML terdapat tiga jenis tag, yang mana setiap tag tersebut memiliki penulisan yang tidak terlalu berbeda dengan yang lainnya. Yaitu:</div>\r\n<ol>\r\n<li>\r\n<div align="justify"><em>Tag Pembuka</em></div>\r\n</li>\r\n<li>\r\n<div align="justify"><em>Tag Penutup</em></div>\r\n</li>\r\n<li>\r\n<div align="justify"><em>Tag Tunggal</em></div>\r\n</li>\r\n</ol>\r\n<div align="justify">Penjelasan:</div>\r\n<ol>\r\n<li>\r\n<div align="justify"><strong>Tag Pembuka<br /></strong>Penulisan tag pembuka yaitu dengan tanda <strong>&ldquo;&lt;&rdquo; &ldquo;elemen&rdquo; &ldquo;&gt;&rdquo;</strong>. <br />Contoh:</div>\r\n</li>\r\n<li>\r\n<div align="justify"><strong>Tag Penutup<br /></strong>Penulisan tag pembuka yaitu dengan tanda <strong>&ldquo;&rdquo;</strong>. Contoh:</div>\r\n</li>\r\n<li>\r\n<div align="justify"><strong>Tag Tunggal</strong><br /> Penulisan tag pembuka yaitu dengan tanda <strong>&ldquo;&lt;&rdquo; &ldquo;elemen&rdquo; &ldquo;/&gt;&rdquo;</strong>. <br />Contoh: <strong><br /></strong></div>\r\n</li>\r\n</ol>\r\n<p>Setiap tag pembuka harus mempunyai tag penutup, misalnya: pembuka harus ditutup dengan , jadi nama elemenya harus sama. Akan tetapi pada penulisan tag tunggal tidak perlu mempunyai tag penutup, karena memang tag tuggal ini telah mempunyai penutupnya sendiri seperti contoh diatas. Beberapa contoh dari tag tunggal yaitu: <code>&lt;br/&gt;</code> <code></code><code></code>dan<code></code> <code>&lt;hr/&gt;</code></p>\r\n<div style="text-align: justify;" align="justify">&nbsp;</div>\r\n<div style="text-align: justify;" align="justify">Kemudian, untuk membangun sebuah halaman web, terdapat sebuah tag dasar HTML yang harus diperhatikan dan harus dipahamai yaitu:</div>\r\n<pre>&lt;html&gt;<br />&lt;head&gt;<br />&lt;title&gt;Judul Website&lt;/title&gt;<br />&lt;/head&gt;<br />&lt;body&gt;<br /><br /><em>&ldquo;isi yang akan ditampilkan pada halaman web browser&rdquo;</em><br /><br />&lt;/body&gt;<br />&lt;/html&gt;</pre>\r\n<div style="text-align: justify;" align="justify">Jadi, taga diatas merupakan tag dasar dari HTML, dan perhatikannlah penulisan dari setiap tag. Setiap tag yang dibuka harus ditutup, dan urutannyapun harus diperhatikan dan dipahami.</div>', '/upload/image/dasar%20html%20img_thumb%5B4%5D.jpg', 3, '2016-06-06 10:08:21', '2016-06-10 06:05:20'),
	(12, 'Mengenal Fungsi MAX_FILE_SIZE – Upload File', 'mengenal-fungsi-max-file-size-upload-file', '<p align="justify">Selamat pagi, siang dan malam bagi semua pecinta dunia maya serta untuk yang sekedar lewat di websiter newbie. Pada kesempatan kali ini, websiter newbie akan berbagi sedikit mengenai upload file, akan tetapi tidak untuk menjelasakan bagaimana cara membuat fungsi upload file, karena sesuai dengan judul kali ini. Websiter newbie hanya berbagi tentang pengenalan dari fungsi MAX_FILE_SIZE pada form input html dari fungsi upload file. Kenapa websiter newbie membahas tentang masalah ini ? Akan websiter newbie jawab sendiri. hehehe&hellip; Karena itu bukan pertanyaan untuk para sahabat websiter newbie akan tetapi hanya sekedar alasan untuk membuat postingan kali ini. Okelah kalau begitu, tanpa panjang x lebar x tinggi lagi, websiter newbie akan menjelaskan dan bercerita mengenai hal tersebut.</p>\r\n<p align="justify">Pada awalnya, hal ini terjadi pada salah seorang teman saya yang masih baru belajar tentang web (seorang websiter newbie) yang saat itu sedang mempelajari tentang upload file. Dan ketika saya melihat script yang dibuatnya saya merasa terheran &ndash; heran. Karena pada script itu terdapat script yang menyatakan besar maksimal file yang tidak sesuai dengan apa yang websiter newbie ketahui. Tag itu adalah:</p>\r\n<pre>&lt;input type=&rdquo;hidden&rdquo; name=&rdquo;batas&rdquo; value=&rdquo;2000000&rdquo;&gt;</pre>\r\n<p align="justify">Terlihat pada script diatas biasa saja, akan tetapi saya yakin teman saya ini telah mendapat tutorial untuk membuat upload file, karena sebelumnya saya juga telah mempelajari tentang hal itu(sekitar 1 tahun yang lalu dari teman saya) akan tetapi yang saya gunakan itu adalah:</p>\r\n<pre>&lt;input type=&rdquo;hidden&rdquo; name=&rdquo;MAX_FILE_SIZE&rdquo; value=&rdquo;2000000&rdquo;&gt;</pre>\r\n<p align="justify">Nah, kemudian saya berfikir. Apakah teman saya ini sengaja mengganti name dari script tersebut, karena memang dia kadang &ndash; kadang membuat suatu yang berbeda dengan tutorial(Membuat logika sendiri = Good). Kemudian hal tersebut saya tanyakan kepada seorang teman(senior) yang lebih paham masalah web. Akan tetapi hal tersebut tidak dipermasalahkannya karena hanya sebagai name dari inputan tersebut. Saya mengatakan o iya ya dan mengatakan pula(setelah mengingat), bahwasanya dulu ketika belajar tentang upload file saya telah menemukan hal tersebut dan mempunyai fungsi untuk membatasi size/kapasitas file yang dapat diupload dari klien. Akan tetapi karena saya hanyalah seorang newbie, dan saya merasa kalau saya itu kemungkinan lupa apa yang saya pelajari jadi saya mengakhiri tentang pembahasan tentang hal tersebut.</p>\r\n<p align="justify">Akan tetapi, sebagai seorang newbie yang ingin tahu sekali, dan ingin mengingat hal yang dulunya saya lakukan tentang upload file. Maka setelah pulang dari sekolah(perbincangan dengan teman &ndash; teman diatas berlatar di sekolah) saya pun berniat membuktikan hal yang sebenarnya tentang masalah MAX_FILE_SIZE. Akhirnya setelah shalat isya saya menyiapkan diri untuk membuktikan kebenaran. Dan saya mulai dengan membuka notepad++ yang ada dilaptop saya, dan membuat dua buah file yaitu:</p>\r\n<p><code>index.php</code> dan <code>proses.php</code></p>\r\n<p align="justify">Penggunaan masing &ndash; masing file yaitu pada bagian index.php saya hanya menaruh script untuk htmlnya saja, yaitu sebuah inputan file yang isinya:</p>\r\n<pre>&lt;html&gt;<br />&lt;head&gt;<br />&nbsp;&nbsp;&nbsp; &lt;title&gt;Upload&lt;/title&gt;<br />&lt;/head&gt;<br />&lt;body&gt;<br />&nbsp;&nbsp;&nbsp; &lt;form action="proses.php" method="post" enctype="multipart/form-data"&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;input type="hidden" name="MAX_FILE_SIZE" value="2000000" /&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label&gt;Pilih File:&lt;/label&gt;&lt;br /&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;input type="file" name="file" /&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;input type="submit" name="upload" value="Upload" /&gt;<br />&nbsp;&nbsp;&nbsp; &lt;/form&gt;<br />&lt;/body&gt;<br />&lt;/html&gt;</pre>\r\n<p align="justify">Dan pada bagian proses saya akan melihat dan membuktikan apakah yang terjadi jika file yang akan saya upload melebihi kapasitas yang sudah saya tentukan dengan menggunakan MAX_FILE_SIZE pada bagian input. Script proses.php seperti dibawah ini:</p>\r\n<pre>&lt;?php<br />$file_name = $_FILES[\'file\'][\'name\'];<br />$file_tmp = $_FILES[\'file\'][\'tmp_name\'];<br />$file_error = $_FILES[\'file\'][\'error\'];<br />$file_size = $_FILES[\'file\'][\'size\'];<br /><br />echo "Nama File: ".$file_name."&lt;br&gt;Ukuran: ".$file_size."&lt;br&gt;Error: ".$file_error;<br />echo "&lt;br /&gt;&lt;br /&gt;";<br />$upload = move_uploaded_file($file_tmp,"hasil_upload/".$file_name);<br />if($upload)<br />&nbsp;&nbsp;&nbsp; {<br />&nbsp;&nbsp;&nbsp; echo "&lt;b&gt;Berhasil&lt;/b&gt;";<br />&nbsp;&nbsp;&nbsp; }<br />else{<br />&nbsp;&nbsp;&nbsp; echo "&lt;b&gt;Gagal !&lt;/b&gt;";<br />&nbsp;&nbsp;&nbsp; }<br />?&gt;</pre>\r\n<p align="justify">Okey, pada script diatas dapat dilihat bahwasanya saya hanya akan melihat hasilnya yaitu pada bagian name, error, dan ukurannya.&nbsp;</p>\r\n<p align="justify"><strong>Percobaan 1</strong></p>\r\n<p align="justify">Pada percobaan ini saya menngunggah file yang kapasitasnya<strong> kurang dari 2000000 bytes</strong> atau <strong>&lt; 2MB</strong>. Dan hasilnya yaitu: </p>\r\n<p align="justify"><img src="/upload/image/upload1.jpg" alt="" width="394" height="196" /></p>\r\n<p align="justify"><strong>Percobaan 2&nbsp; </strong></p>\r\n<p align="justify">Pada percobaan ini saya menngunggah file yang kapasitasnya <strong>lebih dari 2000000</strong> bytes atau <strong>&gt; 2MB.</strong> Dan hasilnya yaitu:</p>\r\n<p align="justify"><img src="/upload/image/upload2.jpg" alt="" width="380" height="185" /></p>\r\n<p align="justify"><strong>Kesimpulan:</strong></p>\r\n<p align="justify">Pada dua percobaan diatas terlihat terjadi perbedaan pada bagian Error, sedangkan apabila nilai error dari file yang akan kita upload bukan 0 (nol), maka proses upload akan gagal. Maka dari itu hal ini berpengaruh terhadap proses upload yang kita buat. Untuk kesimpulan yang lainnya mungkin sahabat newbie dapat menarik kesimpulan sendiri.</p>\r\n<p align="justify">Dan itulah yang menjadi dasar websiter newbie untuk membuat postingan ini, dan semoga bermanfaat bagi semunya. Dan dalam membuat postingan ini websiter newbie dalam keadaan sadar dengan sebenar &ndash; benarnya.. hahaha.</p>\r\n<p align="justify">Seperti membuat surat kuasa saja. Okelah sekian dan terima kasih.</p>', '', 3, '2016-06-07 00:35:00', '2016-06-10 06:10:00'),
	(13, 'Mengubah Alamat “Localhost” Lampp di Linux', 'mengubah-alamat-localhost-lampp-di-linux', '<p>Bismillah,</p>\r\n<p>Jika Anda sudah bosan dengan alamat localhost yang itu-itu saja, maka Anda masuk ditulisan yang&nbsp;tepat. Anda dapat mengubah alamat server lokal sesuai dengan yang Anda inginkan.</p>\r\n<p>Silahkan ikuti langkah-langkah sederhana dibawah ini.<span id="more-65"></span></p>\r\n<ol>\r\n<li>Buka Terminal dan&nbsp;masuk sebagai super user ( sudo su ).</li>\r\n<li>Buka file yang ada pada direktori: <code>/etc/hosts</code><strong><br /><br /></strong><strong><img src="/upload/image/local-1.png" alt="" width="602" height="92" /><br /></strong></li>\r\n<li>Tambahkan script <code>&ldquo;127.0.1.1 &nbsp; &nbsp; &nbsp; nur.com&rdquo; </code>seperti dibawah ini.<br /><br /><img src="/upload/image/local-2.png" alt="" width="602" height="280" /><br /> <br /><strong>nur.com&nbsp;:</strong> ganti sesuai dengan&nbsp;yang Anda inginkan.<br /><br /></li>\r\n<li>Sehingga sekarang Anda dapat membuka localhost dengan nur.com ( sesuai dengan yang Anda gunakan ). <br /><strong>Jangan lupa untuk menghidupkan service Lampp terlebih dahulu.<br /></strong><br /> <img src="/upload/image/local-3.png" alt="" width="605" height="377" /><br /><br /></li>\r\n<li>Selesai</li>\r\n</ol>', '/upload/image/noplacelike_mat.jpg', 3, '2016-06-07 00:47:14', '2016-06-10 06:13:14'),
	(21, 'Coba Aja', 'coba-aja', '<p>Lorem ipsum dolor</p>', '', 3, '2016-06-10 06:15:24', '2016-06-10 06:15:24');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.post_tag: ~8 rows (approximately)
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` (`id`, `tag_id`, `post_id`) VALUES
	(7, 4, 10),
	(8, 4, 11),
	(9, 5, 11),
	(10, 4, 12),
	(11, 5, 12),
	(12, 4, 13),
	(13, 5, 13);
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;


-- Dumping structure for table myblog.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table myblog.roles: ~2 rows (approximately)
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

-- Dumping data for table myblog.role_user: ~2 rows (approximately)
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

-- Dumping data for table myblog.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(3, 'Nur Muhammad', 'admin@nursblog.com', '$2y$10$1JkJYf.UNqDtZuh88x5kCuUML2p7SdJK4fhPh1A76M2/kq7tvmTsi', '7TBconu3vGxDFcSg89FaBcf0QpyuAEqMeCIO8dXwgBIuQTJs5uah0piyHyOe', '2016-06-02 09:48:29', '2016-06-06 08:55:38'),
	(5, 'Nabil Muhammad', 'author@nursblog.com', '$2y$10$.mN.oPVWJZxgnJ9.mprVqOj0a1/M.Uqf8aIhnu6o4MbhseMGcfFL6', 'XuWWGbeMNggcRVFobRmU8gG8QGGlD1q1D0Suy87dUDVe34wOwOoHQqzbRdAM', '2016-06-02 10:21:56', '2016-06-06 08:56:19'),
	(6, 'Resqa Dahmurah', 'contributor@nursblog.com', '$2y$10$2iCBmk1cWxoXJPqNhLyV8.ksly4KCYy2sMVdCzMIj754E/YoLgFCW', NULL, '2016-06-06 08:57:16', '2016-06-06 08:57:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
