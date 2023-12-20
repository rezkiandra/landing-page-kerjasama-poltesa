-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2023 pada 16.31
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerjasama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `lokasi` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `judul`, `deskripsi`, `lokasi`, `tanggal`, `gambar`) VALUES
(1, 'Direktur Poltesa Tandatangani MoC Dengan 3 Universitas Taiwan', 'Direktur Politeknik Negeri Sambas (Poltesa) tandatangani naskah Memorandum of Corporate (MoC) dengan 3 Universitas Taiwan yang tergabung dalam International Talent Circulation Base (INTACT Base Taiwan – Indonesia), diantaranya adalah : Cheng Shiu University, Hsing Wu University, dan Chaoyang University of Technology, yang dilaksanakan di Hotel Park Hyatt Jakarta, pada 13 Desember 2023.\r\n\r\nPenandatanganan kerjasama ini diikuti oleh seluruh Politeknik Negeri di lingkungan Direktorat Jenderal Pendidikan Vokasi, dimana Sekretariat Direktorat Jenderal Pendidikan Vokasi yang memfasilitasi kerjasama antara Politeknik Negeri Indonesia dengan INTACT Base.\r\n\r\nTujuan utama dari MoC ini adalah:\r\nA. Untuk berkolaborasi dalam pembinaan bakat bagi mahasiswa atau lulusan Pendidikan Tinggi Vokasional Indonesia (D3, D4, dan S1) untuk melanjutkan studi lanjutan melalui pendaftaran di Program Khusus Pendidikan Bakat Industri Internasional (selanjutnya disebut sebagai “Program INTENSE”) yang ditawarkan oleh Universitas di Taiwan.\r\nB. Untuk bersama-sama mempromosikan pengajaran dan pembelajaran bahasa Tionghoa di Indonesia.\r\n\r\nAdapun Bidang Kolaborasi pada MoC ini meliputi:\r\nA. Pengembangan Bakat\r\na. INTACT Base setuju untuk memfasilitasi pendaftaran calon mahasiswa yang memenuhi syarat di Program INTENSE di Universitas-Universitas di Taiwan.\r\nb. INTACT Base setuju tidak hanya untuk memberikan informasi yang cukup kepada calon mahasiswa Program INTENSE mengenai beasiswa pemerintah yang mencakup biaya kuliah dan beasiswa yang disediakan perusahaan untuk biaya hidup, tetapi juga untuk memfasilitasi prosedur aplikasi beasiswa mereka.\r\nc. Poltesa setuju untuk mengidentifikasi mahasiswa yang memenuhi syarat dan mempromosikan kesadaran Program INTENSE di antara mahasiswa mereka.\r\nB. Pendidikan Bahasa Tionghoa\r\na. INTACT Base setuju untuk mendukung pengembangan dan implementasi kursus bahasa Tionghoa di Poltesa\r\nb. Poltesa setuju untuk mengintegrasikan kursus bahasa Tionghoa ke dalam kurikulumnya dan mempromosikan kursus-kursus ini di antara mahasiswa mereka.\r\n\r\nDirektur Poltesa, Yuliansyah menyambut baik kerjasama ini, “kami sangat menyambut baik kerjasama ini, dan kami ucapkan terimakasih yang sebesar-besarnya kepada Sekretariat Direktorat Jenderal Pendidikan Vokasi yang telah memfasilitasi Kerjasama dengan INTACT BASE ini”, ungkapnya.\r\n\r\nLebih lanjut Direktur berharap semoga kerjasama ini dapat berjalan dengan baik, “saya berharap semoga kerjasama ini dapat berjalan dengan baik, dan berkelanjutan, dengan kerjasama-kerjasama di bidang lain”, harapnya', 'Kampus', '2023-12-13', 'berita-1.jpg'),
(2, 'Prodi TMM Poltesa Gelar Kuliah Umum Jurnalistik', 'Program Studi (Prodi) D-IV Teknik Multimedia (TMM) Politeknik Negeri Sambas (Poltesa) menggelar Kuliah Umum dengan Tema “Peluang dan Tantangan Penerapan Multimedia dalam Jurnalistik dan Konten Digital di Era Society 5.0” dengan narasumber, Rizki Fadriani, S.Pd. Jurnalistik, Reporter, Host Triponcast Tribun Pontianak, Kontributor Beranda Olahraga, yang dilaksanakan di Aula Kuliah Terpadu 1, 30 November 2023.\r\n\r\nHadir dalam kegiatan ini, Wakil Direktur I, Ketua Jurusan dan Sekretaris Manajemen Informatika, Koordinator Prodi TMM, para Dosen dan Mahasiswa Prodi TMM Poltesa.\r\n\r\nSekretaris Jurusan Manajemen Informatika, Andri Hidayat menyampaikan tujuan dari kegiatan ini, “tujuan kegiatan ini diantaranya adalah untuk pengenalan jurnalistik kepada mahasiswa Prodi TMM, dimana Prodi TMM ini selalu bersentuhan dengan konten-konten digital dan jurnalistik, kita tahu bagaimana awak media menyiapkan berita yang harus disiapkan update, tentunya harus di ikuti dengan kemampuan-kemampun yang mumpuni dari pelaku jurnalistik, tidak mungkin berita itu disajikan tanpa diedit, ada tim redaksi atau editor, disitulah peran Multimedia”, jelasnya.\r\n\r\nAndri Hidayat juga menyampaikan bahwa terdapat tiga sesi pada kegiatan ini, “ada tiga sesi yang akan disampaikan dalam kegiatan ini yang pertama Sinergi Multimedia dan Jurnalistik, yang kedua Peluang dan Tantangan Penerapan Multimedia dalam Jurnalistik, dan yang ketiga Best Prestise dalam pembuatan konten digital dan publikasi”, ujarnya.\r\n\r\nWakil Direktur I Poltesa, Budi Setiawan juga menyampaikan tujuan utama kegiatan kuliah umum bagi mahasiswa, “tujuan utama kegiatan kuliah umum bagi mahasiswa adalah untuk membuka mindset atau wawasan para mahasiswa untuk mengetahui kondisi real sebenarnya terkait ilmu yang telah di pelajari, bagaimana follow up-nya di lapangan, apakah sesuai penerapannya atau tidak, sehingga kita dapat melakukan evaluasi dalam pembelajaran”, ungkapnya.\r\n\r\nLebih lanjut Budi Setiawan menuturkan bahwa kampus selalu berusaha untuk mempersiapkan mahasiswa kompeten, “kegiatan kuliah umum ini merupakan salah satu komitmen kampus dalam menguatkan kompetensi mahasiswa dan lulusan, selain itu kami juga mendorong agar mahasiswa Poltesa mengikuti kegiatan Merdeka Belajar Kampus Merdeka, seperti Pertukaran Mahasiswa Merdeka atau PMM, MSIB, IISMA, Magang Intership, dan lainnya, ini semua dilakukan agar mahasiswa Poltesa terbiasa melakukan intereksi-interaksi antara dunia pendidikan dengan dunia industri, sehingga kedepan setelah lulus mahasiswa itu tau apa yang akan dikerjakannya”, tuturnya.\r\n\r\nBudi Setiawan berharap agar mahasiswa Poltesa dapat melakukan penyesuaian dan penerapan terhadap ilmu yang dipelajari, “harapan kami kepada para mahasiswa sekalian adalah agar para mahasiswa dapat melakukan sinkronisasi antara ilmu yang dipelajari di kampus dengan kenyataan yang ada diluar, sehingga mahasiswa dapat melakukan penyesuaian dan penerapannya di lapangan dengan baik, dan dapat memberikan manfaat yang sebesar-besarnya bagi masyarakat”, harapnya.', 'Kampus', '2023-12-05', 'berita-2.jpg'),
(3, 'Poltesa Gelar Seminar Nasional SEHATI ABDIMAS 2023', 'Politeknik Negeri Sambas (Poltesa) menggelar Seminar Nasional Penelitian dan Pengabdian Kepada Masyarakat (SEHATI ABDIMAS) yang dilaksanakan di Aula Gedung Kuliah Terpadu 1, pada 4 Desember 2023.\r\n\r\nSEHATI ABDIMAS merupakan agenda tahunan Poltesa, dimana Pusat Penelitian dan Pengabdian Kepada Masyarakat (PPPM) Poltesa yang menjadi leading sector pada kegiatan ini.\r\n\r\nHadir dalam kegiatan ini, Direktur beserta unsur pimpinan dan para dosen Poltesa, LPPM IAIS, Dinas Pariwisata Kepemudaan dan Olahraga Kab. Sambas, Dinas Koperasi, UMKM, Perindustrian dan Perdagangan Kab. Sambas, Dinas Pendidikan dan Kebudayaan Kab. Sambas, Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana Kab. Sambas.\r\n\r\nKeynote Speaker dalam kegiatan ini adalah,\r\n1. Teti Armiati Argo, MES., Ph.D. Tim Ahli SDGs Center Institut Teknologi Bandung, yang menyampaikan materi tentang “Peran Perguruan Tinggi dalam Mendorong Pencapaian SDGs: Peluang dan Tantangan di Era Digital”.\r\n2. Yudithya Ratih, S.T., M.T. Urban Ecology Lucturer, Politeknik Negeri Pontianak, yang menyampaikan materi tentang “Inisiatif dan Praktik Baik Pembangunan Berkelanjutan di Era Digital”.\r\n\r\nTujuan dari kegiatan SEHATI ABDIMAS Poltesa tahun 2023 meliputi :\r\n1. mengkaji dan mendiskusikan isu–isu terkait dengan dampak dan peran teknologi digital dalam mendorong pencapaian Sustainable Development Goals (SDGs) ;\r\n2. mengidentifikasi berbagai solusi yang inovatif dan strategis yang dapat dilaksanakan oleh berbagai pemangku kepentingan, seperti pemerintah, sektor swasta, akademisi, masyarakat sipil, dan media;\r\n3. membagikan insiatif dan praktik baik yang menjadi aksi dan solusi pencapaian SDGs pada skala lokal.\r\n\r\nDirektur Poltesa, Yuliansyah menjelaskan tentang latarbelakang kegiatan ini, “agenda tahunan SEHATI ABDIMAS ini digelar dalam rangka untuk menggali dan mengeksplorasi karya-karya para dosen dalam tugas Tridharma Perguruan Tinggi, yaitu Pendidikan, Pengajaran, Penelitian dan PKM, kita ingin mengajak dosen-dosen yang mengikuti Seminar ini untuk berbagi ilmu dan pengetahuan yang bisa dijadikan rujukan para pemangku kepentingan dalam mengambil kebijakan, dalam hal ini adalah pemerintah dan bisa juga pihak swasta, kegiatan ini adalah salah satu input yang harus didapatkan pemerintah, baik Pemerintah Provinsi maupun Pemerintah Kabupaten dalam menentukan langkah-langkah strategis pembangunan ke depan”, jelasnya.\r\n\r\nLebih lanjut Yuliansyah menjelaskan posisi Poltesa dalam SDGs ini, “Poltesa sebagai Perguruan Tinggi bertanggungjawab mengambil bagian dalam SDGs, dari 17 tujuan utama dari lingkup SDGs ini, kita semua dapat mengambil peran, Poltesa ingin berkontribusi dalam menciptakan ekosistem dan lingkungan yang baik, bersih, dan ramah, Perguruan Tinggi merupakan role model dan rujukan, untuk itu saya mengajak kepada seluruh keluarga besar Poltesa agar dapat menjadi contoh yang baik, dan membantu tugas-tugas pemerintahan melalui Program Studi yang ada, seperti Kepariwisataan, Agroindustri, Teknik Mesin Pertanian dan lain-lainnya, kita harus mengambil bagian dalam membangun kawasan ini, namun kita tidak bisa bekerja secara parsial, perlu kolaborasi dan kerjasama yang kuat”, ungkapnya.\r\n\r\nYuliansyah juga menyampaikan harapannya untuk SDGs, “Poltesa sebagai institusi pendidikan tinggi terus meningkatkan kolaborasi dan sinergi dengan Pemerintah Provinsi, maupun Pemerintah Kabupaten, karena Pemerintah Provinsi dan Kabupaten ini merupakan ujung tombak dalam cita-cita pembangunan, kita harus sering-sering mendiskusikan 17 tujuan SDGs ini, sehingga kita dapat melihat bagian mana yang menjadi prioritas, yang kemudian disesuaikan dengan potensi wilayah, baik di Provinsi maupun Kabupaten, sehingga kita dapat bersama menentukan kerja-kerja yang efektif – efisien dan melakukan langkah-langkah strategis yang berbasis rencana pembangunan, kita lihat dan sinkronkan agar kerja-kerja efektif ini dapat terorganisir dengan baik”, harapnya.\r\n\r\nKegiatan ini diikuti 34 Perguruan Tinggi seluruh Indonesia, dan 2 Instansi Pemerintah, serta 100 orang Pemakalah, dengan jumlah paper 102 artikel.\r\nBerikut daftar Perguruan Tinggi dan Instansi Pemerintah yang mengikuti SEHATI ABDIMAS 2023 :\r\nPerguruan Tinggi Akademik Negeri:\r\n– Universitas Negeri Jakarta\r\n– Universitas Sebelas Maret\r\n– Universitas Jambi\r\n– Universitas Bengkulu\r\n– Universitas Negeri Malang\r\n– Universitas Gadjah Mada\r\n– Universitas Trunojoyo Madura\r\n– Universitas Mulawarman\r\n– Universitas Pendidikan Indonesia\r\n– Universitas Halu Oleo\r\n– UIN Ar-Raniry\r\n– Universitas Pendidikan Ganesha\r\n\r\nPerguruan Tinggi Akademik Swasta:\r\n– Universitas PGRI Yogyakarta\r\n– Universitas Udayana\r\n– UIN Sunan Kalijaga Yogyakarta\r\n– UIN Sultan Maulana Hasanuddin Banten\r\n– STIM Indonesia Handayani\r\n– STIE Satya Dharma Singaraja\r\n– Universitas Janabadra\r\n– Institut Agama Islam DDI Sidenreng Rappang\r\n– STIKes Santa Elisabeth Medan\r\n– Universitas Darussalam Gontor\r\n– Universitas Kristen Petra\r\n– Universitas Muhammadiyah Surakarta\r\n– STIEM Bongaya Makassar\r\n– Universitas Sang Bumi Ruwa Jurai\r\n– STISIPOL Pahlawan 12\r\n\r\nPerguruan Tinggi Vokasi:\r\n– Politeknik Negeri Sambas\r\n– Politeknik Manufaktur Bandung\r\n– Politkenik Kesehatan Kemenkes Malang\r\n– Politeknik Negeri Sriwijaya\r\n– Politeknik Negeri Cilacap\r\n– Politeknik Pertanian Negeri Payakumbuh\r\n– Politeknik Negeri Balikpapan\r\n\r\nInstansi pemerintah:\r\n– Sekretariat Jenderal Kementerian Keuangan RI\r\n– PT. Riset Perkebunan Nusantara', 'Kampus', '2023-12-04', 'berita-3.jpg'),
(4, 'Awalinda Mahasiswa Poltesa Berhasil Raih Medali Emas dan Perak Pada Pekan Paralympic Kalbar', 'Awalinda, mahasiswa Program Studi (Prodi) Agroindustri Pangan (AIP) Politeknik Negeri Sambas (Poltesa) berhasil meraih 2 Medali Emas, dan 1 Medali Perak pada Cabang Olahraga Para Renang dalam Pekan Paralympic Provinsi Kalimantan Barat (Kalbar) Tahun 2023.\r\n\r\nPekan Paralympic merupakan perhelatan olahraga terbesar di Provinsi Kalbar bagi penyandang disabilitas. Terdapat beberapa cabang olahraga yang dipertandingkan, yakni : Para Atletik, Para Angkat Berat, Para Badminton, Boccia, Boche, Para Tenis Meja, Para Panahan, Para Renang, Paracycling, dan Para Esport.\r\n\r\nSebelum mengikuti kegiatan ini, ada beberapa tahapan yang harus dilalui Awalinda, salah satunya yaitu proses karantina di Pontianak yang berlangsung sejak awal bulan September 2023. Karena status Awalinda yang juga merupakan mahasiswa semester 3 di Prodi Agroindustri Pangan, maka Awalinda juga harus tetap menjalani proses akademiknya, yaitu kegiatan Praktik Industri di UMKM yang bergerak di bidang pangan.\r\n\r\nBerkat kegigihan Awalinda dalam mengikuti kegiatan ini, ia berhasil melalui proses Karantina dan melaksanakan program Praktik Industri dengan baik.\r\n\r\nAwalinda menjelaskan bahwa Kampus telah membantu kelancaran kegiatannya dengan berkomunikasi pada pihak UMKM dan pengurus National Paralimpic Centre (NPC), “Alhamdulillah saya bersyukur sekali karena Koordinator Prodi AIP telah membantu berkomunikasi dengan pengurus National Paralimpic Centre (NPC) untuk memfasilitasi kegiatan praktik industri saya di UMKM yang ada di Pontianak, sehingga saya dapat mengikuti kegiatan latihan renang dari Jam 07.00 – 11.00, dan Praktik Industri jam 13.00 – 17.00, saya sangat bersyukur dan berterimakasih sekali atas dukungan dan kebijaksanaan kampus terhadap saya”, ujarnya.\r\n\r\nAwalinda juga menjelaskan bahwa keterbatasan fisik pada dirinya tidak membuat ia minder, “saya memang memiliki keterbatasan pada fisik saya, namun hal itu tidak membuat saya minder, justru saya menjadi lebih bersemangat, karena saya ingin menunjukkan kepada semua orang bahwa keterbatasan bukan halangan kita untuk berkarya dan meraih prestasi, untuk itu kita harus selalu berdoa dan berusaha dengan sekuat daya upaya untuk mencapai apa yang dicita-citakan”, jelasnya.\r\n\r\nDirektur Poltesa, Yuliansyah menyampaikan rasa bangga atas capaian Awalinda, “Syukur Alhamdulillah, saya merasa sangat bangga mendengar kabar prestasi Awalinda, ini merupakan prestasi yang luar biasa”, ujarnya.\r\n\r\nLebih lanjut Yuliansyah menyampaikan bahwa prestasi Awalinda ini merupakan inspirasi bagi kita semua, “Awalinda telah menginspirasi kita semua, ditengah keterbatasannya ia terus berusaha dan menunjukkan semangat yang luar biasa, sehingga ia mampu mengatasi masalah dan keterbatasannya, ini harus menjadi contoh, terutama bagi para mahasiswa Poltesa, harus mau berfikir keras untuk mencari solusi terhadap segala masalah yang dihadapi”, ungkapnya', 'Kampus', '2023-11-29', 'berita-4.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id` int(11) NOT NULL,
  `judul_foto` varchar(50) DEFAULT NULL,
  `lokasi` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_foto`
--

INSERT INTO `tb_foto` (`id`, `judul_foto`, `lokasi`, `tanggal`, `gambar`) VALUES
(1, 'Dies Natalis POLTESA', 'Kampus', '2023-12-19', 'dies-natalis.jpg'),
(2, 'Gedung POLTESA', 'Kampus', '2023-12-19', 'gedung-1.jpg'),
(3, 'Gedung POLTESA', 'Kampus', '2023-12-19', 'gedung-2.jpg'),
(4, 'Kuliah Umum Agro', 'Kampus', '2023-12-20', 'galeri-1.jpg'),
(5, 'Kuliah Umum Agro', 'Kampus', '2023-12-20', 'galeri-2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kemitraan_keluar`
--

CREATE TABLE `tb_kemitraan_keluar` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kemitraan_kunjungan`
--

CREATE TABLE `tb_kemitraan_kunjungan` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kerjasama_dalam`
--

CREATE TABLE `tb_kerjasama_dalam` (
  `id` int(11) NOT NULL,
  `mitra_kerjasama` varchar(100) DEFAULT NULL,
  `bentuk_lembaga` varchar(100) DEFAULT NULL,
  `jenis_kegiatan` varchar(255) DEFAULT NULL,
  `waktu_mulai` date DEFAULT NULL,
  `waktu_berakhir` date DEFAULT NULL,
  `mou_poltesa` varchar(50) DEFAULT NULL,
  `mou_mitra` varchar(50) DEFAULT NULL,
  `status` char(20) DEFAULT NULL,
  `lokasi` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kerjasama_luar`
--

CREATE TABLE `tb_kerjasama_luar` (
  `id` int(11) NOT NULL,
  `mitra_kerjasama` varchar(100) DEFAULT NULL,
  `bentuk_lembaga` varchar(100) DEFAULT NULL,
  `jenis_kegiatan` varchar(100) DEFAULT NULL,
  `waktu_mulai` date DEFAULT NULL,
  `waktu_berakhir` date DEFAULT NULL,
  `mou_poltesa` varchar(50) DEFAULT NULL,
  `mou_mitra` varchar(50) DEFAULT NULL,
  `status` char(20) DEFAULT NULL,
  `lokasi` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mitra`
--

CREATE TABLE `tb_mitra` (
  `id` int(11) NOT NULL,
  `nama_mitra` varchar(50) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tentang`
--

CREATE TABLE `tb_tentang` (
  `id` int(11) NOT NULL,
  `banner` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(1, 'adminpoltesa', '13456806be38d53adbec4e56d8f12999');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_video`
--

CREATE TABLE `tb_video` (
  `id` int(11) NOT NULL,
  `judul_video` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kemitraan_keluar`
--
ALTER TABLE `tb_kemitraan_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kemitraan_kunjungan`
--
ALTER TABLE `tb_kemitraan_kunjungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kerjasama_dalam`
--
ALTER TABLE `tb_kerjasama_dalam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kerjasama_luar`
--
ALTER TABLE `tb_kerjasama_luar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mitra`
--
ALTER TABLE `tb_mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tentang`
--
ALTER TABLE `tb_tentang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_video`
--
ALTER TABLE `tb_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_kemitraan_keluar`
--
ALTER TABLE `tb_kemitraan_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kemitraan_kunjungan`
--
ALTER TABLE `tb_kemitraan_kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kerjasama_dalam`
--
ALTER TABLE `tb_kerjasama_dalam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kerjasama_luar`
--
ALTER TABLE `tb_kerjasama_luar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_mitra`
--
ALTER TABLE `tb_mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_tentang`
--
ALTER TABLE `tb_tentang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_video`
--
ALTER TABLE `tb_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
