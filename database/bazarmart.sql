-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2022 pada 08.26
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazarmart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id_category`, `category_name`) VALUES
(1, 'elektronik'),
(2, 'buah'),
(3, 'sayur'),
(4, 'bahan pokok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL,
  `invoice` int(11) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_product`
--

CREATE TABLE `order_product` (
  `invoice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status_order` varchar(255) NOT NULL DEFAULT 'Belum dikonfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` varchar(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(32) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `name`, `price`, `description`, `image`, `status`, `created_at`, `id_category`) VALUES
(2, 'kecap bango 135ml', '10000', '<p><strong>kecap bango 135ml</strong> Bango Kecap Manis merupakan kecap manis yang terbuat dari bahan alami pilihan seperti kedelai hitam berkualitas, gula kelapa, garam, dan air. kedelai hitam pilihan difermentasi terlebih dulu beberapa bulan untuk kemudian melalui proses pengolahan khusus agar dapat berpadu sempurna dengan bahan-bahan lain untuk menghasilkan citarasa unik yang membuat Kecap Bango berbeda dari kecap-kecap lainnya. kecap ini hadir dalam kemasan pouch praktis yang memudahkana Anda untuk menyajikan hidangan istimewa dengan rasa yang nikmat.</p>\r\n\r\n\r\n<p>spesifikasi :</p>\r\n\r\n<p>1. mantep<br />\r\n2. oke</p>\r\n', 'kecap.jpeg', 1, '2022-11-19 15:30:15', 4),
(3, 'gulaku 1kg', '15000', '<p><strong>Gulaku putih 1kg</strong></p>\r\n\r\n', 'gula.jpeg', 1, '2022-11-19 15:32:20', 4),
(4, 'minyak goreng 1liter', '25000', '<p><strong>Bimoli Minyak Goreng</strong>Bimoli Klasik Minyak Goreng adalah minyak goreng yang memang dibuat dari pilihan kelapa sawit berkualitas, serta dalam tahap pemrosesannya dilakukan oleh tenaga ahli dan diawasi secara ketat sehingga dapat memenuhi standar kualitas internasional. Jadi, apapun kebutuhan memasak Anda baik itu menumis atau menggoreng akan lebih maksimal karena suhu minyak goreng Bimoli yang jernih itu lebih stabil panasnya</p>\r\n\r\n<p>Buat Masakan Lebih Renyah & Krenyes\r\nDisamping itu, keunggulan minyak goreng Bimoli yaitu kaya akan sumber beta-karoten (pro vitamin A) dan sumber vitamin E. Itu karena minyak goreng Bimoli 100% dihasilkan dari minyak sawit dengan grade terbaik. Juga dalam tahan produksinya Bimoli melakukan 6 tahap pemurnian yang dikenal dengan proses PMP, atau pemurnian multi proses. Dengan proses pemurnian ini maka zat-zat penting yang dibutuhkan oleh tubuh akan tetap terjaga dengan baik.</p>\r\n', 'minyakgoreng.jpeg', 1, '2022-11-19 15:34:09', 4),
(5, 'semangka merah 2kg', '20000', '<p>Manfaat buah semangka untuk kesehatan\r\n1. Kaya Likopen dan Antioksidan\r\nWarna merah semangka berasal dari zat likopen, sebuah senyawa antioksidan yang dapat membantu mencegah penuaan dini kulit.\r\nStudi menunjukkan semangka memiliki lebih banyak antioksidan ketimbang tomat. Untuk mendapatkan manfaat semangka seperti likopen, pilih yang berwarna merah daripada kuning atau oranye.\r\nSelain itu, semangka tanpa biji cenderung memiliki lebih banyak likopen ketimbang semangka dengan biji. Likopen yang kita konsumsi dapat berubah menjadi vitamin A, vitamin yang penting untuk kesehatan mata.\r\n2. Menyehatkan Jantung\r\nSemangka juga memiliki kandungan asam amino yang disebut sebagai citrulline. Manfaat buah semangka yang satu ini berfungsi untuk membantu menurunkan tekanan darah.\r\nJantung juga bisa memperoleh manfaat semangka dari lycopene. Studi menunjukkan bahwa lycopene dapat mengurangi risiko penyakit serangan jantung.\r\nTentu saja untuk menghindari penyakit jantung, gaya hidup Anda juga perlu diperhatikan. Selain mengonsumsi semangka, pastikan Anda berolahraga teratur, tidak merokok, membatasi asupan berkolesterol tinggi, dan menjalani pola hidup sehat sesuai anjuran dokter.\r\n3. Melindungi Persendian\r\nSemangka memiliki jenis pigmen alami yang disebut beta-cryptoxanthin. Tahukah Anda, bahwa manfaat semangka ini bisa melindungi persendian Anda dari peradangan atau pembengkakan.\r\nBeberapa penelitian menunjukkan bahwa kandungan semangka tersebut akan mengurangi progresivitas penyakit rheumatoid arthritis alias bengkak dan kaku pada persendian.</p>\r\n', 'semangka.jpeg', 1, '2022-11-19 15:35:05', 2),
(6, 'sayur bayam 1 ikat', '8000', '<p><strong>Sayur bayam 1 iket \r\n</strong></p>\r\n\r\n', 'sayurbayam.jpeg', 1, '2022-11-19 15:36:50', 3),
(7, 'wortel 250gram', '20000', '<p><strong>Wortel Lokal Segar Dijamin Super Pilihan</strong></p>\r\n\r\n\r\n', 'wortel.jpeg', 1, '2022-11-19 15:40:39', 3),
(8, 'tepung terigu 1kg', '14000', '<p>Tepung Terigu Segitiga Biru Bogasari. 1kg berat pada kemasan. Exp. 2023 (masih lama)\r\n\r\nTepung terigu untuk aneka makanan, dibuat dari gandum berkualitas</p>\r\n\r\n', 'tepungterigu.jpeg', 1, '2022-11-19 15:41:58', 4),
(9, 'beras 5kg', '70000', '<p>Beras Idola diproduksi dengan teknologi canggih dan dari beras pilihan. Tanpa pengawet dan pewangi. Menghasilkan nasi yang enak.</p>\r\n<p>- PREMIUM</p>\r\n<p>- BERSIH</p>\r\n<p>- TANPA PEMUTIH</p>\r\n<p>- TANPA PENGAWET</p>\r\n<p>- TANPA PEWANGI</p>\r\n', 'beras.jfif', 1, '2022-11-19 15:42:34', 4),
(10, 'Kopi kapal api', '13000', '<p><strong>Spesifikasi Produk :</strong>1 Renteng ( 10 Bungkus kemasan 24gram )\r\n1 Dus isi 120 Bungkus ( 12 Renteng )</p>\r\n\r\n<p>Kopi Kapal Api terbuat dari biji kopi pilihan dan diproses dengan mesin yang paling modern yang menghasilkan kopi berkualitas tinggi dengan Aroma terbaik dan Rasa yang enak.</p>\r\n\r\n<p>Kapal Api Special Mix Dibuat dari Biji kopi pilihan yang diolah dengan mesin yang paling modern dan campuran gula murni. Menjadikannya paduan spesial dari kopi dan gula. Kemasan Praktisnya, membuat kopi siap seduh dengan aroma kopi senikmat selera pilihan</p>\r\n', 'kopi kapal api.jpg', 1, '2022-11-19 15:43:16', 4),
(11, 'melon madu', '50000', '<p>Penjelasan Jujur Produk :</p>\r\n\r\n<p>MELON GEDE</p>\r\n<p>Melon Madu pasti manis...</p>\r\n<p>Harga Rp 50.000 /buah\r\n</p>\r\n\r\n<p>1buah = 2,5kg sampai 3 Kg</p>\r\n', 'melon.jpg', 1, '2022-11-19 15:44:01', 2),
(12, 'Sedaap Tasty Bakmi Ayam', '5000', '<p>Mie sedaap Tasty 129 gr.</p>\r\n\r\n<p>Mie instant dengan daging ayam asli.\r\n</p>\r\n', 'indomie.jpg', 1, '2022-11-19 15:44:50', 4),
(13, 'saos sambal 340ml', '15000', '<p>Saus sambel/Chilli Sauce Delmonte</p>\r\n\r\n<p>Isi bersih 340ml</p>\r\n', 'saos sambal.jpeg', 1, '2022-11-19 15:45:39', 4),
(14, 'Teh Sariwangi', '7000', '<p>Teh Sariwangi 1 Pack isi 25</p>\r\n\r\n<p>Harga per Pack</p>\r\n', 'teh.jpg', 1, '2022-11-19 15:47:05', 4),
(15, 'pisang 1kg', '20000', '<p><strong>Pisang Cavendish sunpride segar FB/FH</strong>Harga tertera untuk 1kg pisang.</p>\r\n\r\n<p>Packing buah menggunakan tambahan bubble wrap, kami berusaha agar buah yang anda beli sampai ke tujuan dengan bagus dan mulus.</p>\r\n', 'buahpisang.png', 1, '2022-11-19 15:47:47', 2),
(16, 'rambutan 1kg', '20000', '<p>rambutan harga per 1kg</p>', 'buahrambutan.png', 1, '2022-11-20 14:09:20', 2),
(17, 'brokoli 500gr', '30000', '<p>Brokoli memliki kandungan vitamin A, vitamin B,...', 'sayurbrokoli.png', 1, '2022-11-21 15:49:01', 3),
(18, 'sayur kol 1bulat', '20000', '<p><strong>sayur kol 1bulat</strong></p>\r\n\r\n\r\n', 'sayurkol.png', 1, '2022-11-21 15:51:22', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `no_whatsapp` varchar(13) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `address`, `no_whatsapp`, `id_role`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$Uo9jiU5GJQhEZCc5YbC37OFWb.FvoX8JhVPoj.ymRY7mwkb2DjFUu', 'KAYU BESAR', '08788199999', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`invoice`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_product`
--
ALTER TABLE `order_product`
  MODIFY `invoice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
