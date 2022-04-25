-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2022 pada 21.29
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
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `isi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensi_guru`
--

CREATE TABLE `tb_absensi_guru` (
  `id_absen_guru` int(25) NOT NULL,
  `kode_jadwal` varchar(25) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `status_kehadiran` varchar(11) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensi_siswa`
--

CREATE TABLE `tb_absensi_siswa` (
  `id_absensi_siswa` int(25) NOT NULL,
  `kode_jadwal` varchar(25) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `status_kehadiran` varchar(25) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gedung`
--

CREATE TABLE `tb_gedung` (
  `kode_gedung` varchar(10) NOT NULL,
  `nama_gedung` varchar(15) NOT NULL,
  `jumlah_lantai` varchar(10) NOT NULL,
  `panjang` varchar(10) NOT NULL,
  `tinggi` varchar(10) NOT NULL,
  `lebar` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nip` varchar(25) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nik` varchar(25) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status_keaktifan` int(11) NOT NULL DEFAULT 0,
  `status_pernikahan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal_pelajaran`
--

CREATE TABLE `tb_jadwal_pelajaran` (
  `kode_jadwal` varchar(25) NOT NULL,
  `id_tahun_akademik` int(25) NOT NULL,
  `kode_kelas` varchar(25) NOT NULL,
  `kode_pelajaran` varchar(25) NOT NULL,
  `kode_ruangan` varchar(25) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `hari` varchar(25) NOT NULL,
  `action` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `kode_jurusan` varchar(100) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL,
  `action` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kode_kelas` varchar(100) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `kode_jurusan` varchar(25) NOT NULL,
  `kode_ruangan` varchar(25) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `action` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kurikulum`
--

CREATE TABLE `tb_kurikulum` (
  `kode_kurikulum` int(25) NOT NULL,
  `nama_kurikulum` varchar(25) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `kode_mapel` varchar(25) NOT NULL,
  `kode_jurusan` varchar(25) NOT NULL,
  `nip` text NOT NULL,
  `kode_kurikulum` varchar(25) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `tingkat` varchar(11) NOT NULL,
  `action` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `kode_ruangan` varchar(25) NOT NULL,
  `kode_gedung` varchar(25) NOT NULL,
  `nama_ruangan` varchar(25) NOT NULL,
  `kapasitas` int(25) NOT NULL,
  `action` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` varchar(100) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(120) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `kode_kelas` varchar(100) NOT NULL,
  `kode_jurusan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahun_akademik`
--

CREATE TABLE `tb_tahun_akademik` (
  `id_tahun_akademik` int(25) NOT NULL,
  `tahun` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `nim` varchar(25) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `id_prodi` int(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `nim`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `id_prodi`) VALUES
(7, 'Admin', NULL, 'admin@gmail.com', 'profil20.jpg', '$2y$10$QEXdub0P6nQ9XsZWg44N5.Rxz69poStE3c6kxTc4Eah.MThIi.Mee', 1, 1, 1596001190, NULL),
(54, 'Arief Wibowo, S.Pd', NULL, 'ariefnapicips@gmail.com', 'profil25.jpg', '$2y$10$Bm2EFxN0GkBY7ZKnpryQZukAtxcPi1rSCgxlVe9i.nXSl1UmjGrNa', 3, 1, 1645857371, NULL),
(55, 'Teknik Audio Video', NULL, 'kaprodiAV@gmail.com', 'profil26.jpg', '$2y$10$AYy/15Wp5Stvaj8/3CiQP.uEhIlrH3tB6gpi2zU.VneKowPJa8S.e', 5, 1, 1645853207, 1),
(56, 'Teknik Kendaraan Ringan', NULL, 'kaprodiTKR@gmail.com', 'profil27.jpg', '$2y$10$zgITnNS/BbFv77cWTnXkcOcxLOd5GRyuP2YivWHDKpE7MblSAy7H2', 5, 1, 1645853247, 2),
(57, 'Akuntansi', NULL, 'kaprodiAK@gmail.com', 'profil28.jpg', '$2y$10$fMk5fYMiHeLkW1I2QAd17exTWCYafDzduiGaYOGdyMX16.q0SdniG', 5, 1, 1645853284, 3),
(58, 'Administrasi Perkantoran', NULL, 'kaprodiAP@gmail.com', 'profil29.jpg', '$2y$10$n48VMCYS.ZJKJdbA05uqGuY5fUlDxg3eb8.OHg2AR00xY4f5zL7w.', 5, 1, 1645853321, 4),
(59, 'Busana Butik', NULL, 'kaprodiBB@gmail.com', 'profil30.jpg', '$2y$10$bXfS0MylcuTZQjCU/7h.9uZHLQr9dP6rg9EsYivQgr/NPRzy9BX6.', 5, 1, 1645853350, 5),
(60, 'Kecantikan Rambut', NULL, 'kaprodiKR@gmail.com', 'profil31.jpg', '$2y$10$dAmBI4swSbvU/Au1UzOtmuQRkE.YMiYEbj8S3uyca9l2rXg/mx4va', 5, 1, 1645853386, 6),
(61, 'Analisis Kesehatan', NULL, 'kaprodiANKES@gmail.com', 'profil32.jpg', '$2y$10$WyY7QSoRoAc8ydRz7wFzduDVJPXVjwhVJ94ZY6ngpAQRpyBVc.3GG', 5, 1, 1645853424, 7),
(62, 'Maulana Ilham Mudhin Ghozali', NULL, 'ilham.ciplen@gmail.com ', 'gd.jpg', '$2y$10$./Jr29u9Ck8WGgctAFxrvOArBKJYDXV6.f5H5VbyHTpYm2kXMm87m', 4, 1, 1645853475, NULL),
(69, 'Ika Rizka Annisa, S.T., M.Pd.', NULL, 'kepsek1@gmail.com', 'profil32.jpg', '$2y$10$b5mUpogy54IkmA/IIWTpQO3yn88EnE1mFU34Lp8yvEMcfjPvWkFs2', 7, 1, 1646189812, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(7, 1, 7),
(32, 3, 4),
(33, 4, 5),
(34, 5, 6),
(35, 7, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Menu'),
(3, 'Kepsek'),
(4, 'Guru'),
(5, 'Siswa'),
(6, 'Kaprodi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(3, 'Guru'),
(4, 'Siswa'),
(5, 'Kepala Prodi'),
(6, 'Tatausaha\r\n'),
(7, 'Kepala Sekolah\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard Admin', 'admin', 'fas fa-fw fa-home', 1),
(5, 2, 'Menu Management', 'menu', 'fas fa-fw fa-folder-plus', 1),
(6, 2, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-plus', 1),
(49, 4, 'Dashboard Guru', 'guru', 'fas fa-fw fa-home', 1),
(50, 4, 'Absensi Siswa', 'guru/absensiswa', 'fas fa-fw fa-book', 1),
(51, 4, 'Bahan dan Tugas', 'guru/bahan', 'fas fa-fw fa-book', 1),
(52, 4, 'Kompetensi Dasar', 'guru/kompetensi', 'fas fa-fw fa-book', 1),
(53, 4, 'Journal KBM', 'guru/kbm', 'fas fa-fw fa-book', 1),
(54, 4, 'Laporan Nilai Siswa', 'guru/nilai', 'fas fa-fw fa-book', 1),
(57, 1, 'Data Master', 'admin/data_master', 'fas fa-fw fa-book', 1),
(58, 3, 'Dashboard Kepala Sekolah', 'kepsek', 'fas fa-fw fa-home', 1),
(59, 6, 'Dashboard Kaprodi', 'kaprodi', 'fas fa-fw fa-home', 1),
(61, 3, 'Laporan Guru', 'kepsek/lap_guru', 'fas fa-fw fa-book', 1),
(62, 3, 'Laporan Kesiswaan', 'kepsek/lap_siswa', 'fas fa-fw fa-book', 1),
(64, 5, 'Dashboard Siswa', 'siswa', 'fas fa-fw fa-home', 1),
(65, 5, 'Bahan dan Tugas', 'siswa/bahan_tugas', 'fas fa-fw fa-book', 1),
(66, 5, 'Laporan Nilai Siswa', 'siswa/lap_nilai', 'fas fa-fw fa-book', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_absensi_guru`
--
ALTER TABLE `tb_absensi_guru`
  ADD PRIMARY KEY (`id_absen_guru`);

--
-- Indeks untuk tabel `tb_absensi_siswa`
--
ALTER TABLE `tb_absensi_siswa`
  ADD PRIMARY KEY (`id_absensi_siswa`);

--
-- Indeks untuk tabel `tb_gedung`
--
ALTER TABLE `tb_gedung`
  ADD PRIMARY KEY (`kode_gedung`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `tb_jadwal_pelajaran`
--
ALTER TABLE `tb_jadwal_pelajaran`
  ADD PRIMARY KEY (`kode_jadwal`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indeks untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`kode_ruangan`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `tb_tahun_akademik`
--
ALTER TABLE `tb_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
