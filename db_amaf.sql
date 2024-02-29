-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2023 pada 03.46
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_amaf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_submenu` int(11) DEFAULT NULL,
  `nomor` varchar(225) DEFAULT NULL,
  `perihal` varchar(225) DEFAULT NULL,
  `divisi` varchar(115) DEFAULT NULL,
  `tgl_dokumen` date NOT NULL,
  `tgl_upload` date DEFAULT NULL,
  `detail_doc` varchar(225) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `nama_user` varchar(115) DEFAULT NULL,
  `jenis_id` int(11) DEFAULT NULL,
  `jenis_nama` varchar(115) DEFAULT NULL,
  `id_rak` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `document`
--

INSERT INTO `document` (`id`, `id_user`, `id_menu`, `id_submenu`, `nomor`, `perihal`, `divisi`, `tgl_dokumen`, `tgl_upload`, `detail_doc`, `status`, `nama_user`, `jenis_id`, `jenis_nama`, `id_rak`) VALUES
(2, 2, 41, 50, '06/2022', 'Company Profile PT UG Mandiri 2022', 'HCGA', '2023-05-04', '2023-05-04', 'Company_Profile_UG_Juni_2022_Company_Profile_UG_Juni_20221.pdf', 0, 'Administrator', NULL, NULL, NULL),
(4, 14, 41, 55, '01/2022', 'Corplan PT UG Mandiri 2022-2026', 'RSC', '0000-00-00', '2023-05-03', 'Corplan_UG_Mandiri_2022-2026_Corplan_UG_Mandiri_2022-2026.pdf', 0, 'Rahmat Setiawan', NULL, NULL, NULL),
(6, 21, 41, 56, '01/01/2023', 'Dashboard Cermati Januari 2023', 'RSC', '0000-00-00', '2023-05-02', '01012023_Dashboard_Cermati_Januari_2023.pdf', 0, 'Widia', NULL, NULL, NULL),
(7, 21, 41, 56, '02/02/2023', 'Dashboard Cermati Februari 2023', 'RSC', '0000-00-00', '2023-05-02', '02022023_Dashboard_Cermati_Februari_2023.pdf', 0, 'Widia', NULL, NULL, NULL),
(9, 21, 41, 56, '01/03/2022', 'Dashboard Cermati Maret 2022', 'RSC', '0000-00-00', '2023-05-02', '01032022_Dashboard_Cermati_Maret_2022.pdf', 0, 'Widia', NULL, NULL, NULL),
(10, 21, 41, 56, '02/04/2022', 'Dashboard Cermati April 2022', 'RSC', '0000-00-00', '2023-05-02', '02042022_Dasboard_Cermati_April_2022.pdf', 0, 'Widia', NULL, NULL, NULL),
(11, 21, 41, 56, '03/05/2022', 'Dashboard Cermati Mei 2022', 'RSC', '0000-00-00', '2023-05-02', '03052022_Dashboard_Cermati_Mei_2022.pdf', 0, 'Widia', NULL, NULL, NULL),
(12, 21, 41, 56, '04/06/2022', 'Dashboard Cermati Juni 2022', 'RSC', '0000-00-00', '2023-05-02', '04062022_Dashboard_Cermati_Juni_2022.pdf', 0, 'Widia', NULL, NULL, NULL),
(13, 21, 41, 56, '05/08/2022', 'Dashboard Cermati Agustus 2022', 'RSC', '0000-00-00', '2023-05-02', '05082022_Dashboard_Cermati_Agustus_2022.pdf', 0, 'Widia', NULL, NULL, NULL),
(14, 21, 41, 56, '06/09/2022', 'Dashboard Cermati September 2022', 'RSC', '0000-00-00', '2023-05-02', '06092022_Dashboard_Cermati_September_2022.pdf', 0, 'Widia', NULL, NULL, NULL),
(15, 21, 41, 56, '07/10/2022', 'Dashboard Cermati Oktober 2022', 'RSC', '0000-00-00', '2023-05-02', '07102022_Dashboard_Cermati_Oktober_2022.pdf', 0, 'Widia', NULL, NULL, NULL),
(16, 21, 41, 56, '08/12/2022', 'Dashboard Cermati Desember 2022', 'RSC', '0000-00-00', '2023-05-02', '08122022_Dashboard_Cermati_Desember_2022.pdf', 0, 'Widia', NULL, NULL, NULL),
(17, 21, 41, 63, '01/2020', 'SPO Hierarki & Penyusunan Ketentuan Internal', 'RSC', '2020-04-20', '2023-05-04', '012020_SPO_Hierarki_Penyusunan_Ketentuan_Internal.pdf', 0, 'Widia', NULL, NULL, NULL),
(18, 21, 41, 63, '02/2020', 'SPO Tata Tertib & Kedisiplinan Pegawai', 'RSC', '2020-06-29', '2023-05-04', '022020_SPO_Tata_Tertib_Kedisiplinan_Pegawai.pdf', 0, 'Widia', NULL, NULL, NULL),
(19, 21, 41, 63, '03/2020', 'SPO Pemberian Fasilitas Pegawai', 'RSC', '2020-06-18', '2023-05-04', '032020_SPO_Pemberian_Fasilitas_Pegawai.pdf', 0, 'Widia', NULL, NULL, NULL),
(20, 21, 41, 63, '03A/2020', 'SPO Addendum Pemberian Fasilitas Pegawai', 'RSC', '2021-08-23', '2023-05-04', '03A2020_SPO_Addendum_Pemberian_Fasilitas_Pegawai.pdf', 0, 'Widia', NULL, NULL, NULL),
(21, 14, 41, 54, '16 00 C 18039', 'Sertifikat SNI ISO 9001', 'Building Management', '0000-00-00', '2023-05-03', '16_00_C_18039_Sistem_Manajemen_SNI_ISO_9001.pdf', 0, 'Rahmat Setiawan', NULL, NULL, NULL),
(22, 14, 41, 54, '08 04 G 20026', 'Sertifikat SNI ISO 14001', 'Building Management', '0000-00-00', '2023-05-03', '08_04_G_20026_Sistem_Manajemen_SNI_ISO_14001.pdf', 0, 'Rahmat Setiawan', NULL, NULL, NULL),
(23, 14, 41, 54, '03 13 K 22000605', 'Sertifikat SNI ISO 37001', 'Building Management', '0000-00-00', '2023-05-03', '03_13_K_22000605_Sertifikat_SNI_ISO_37001.pdf', 0, 'Rahmat Setiawan', NULL, NULL, NULL),
(24, 21, 41, 63, '04/2020', 'SPO Pengangkutan Uang Kertas Asing (PUKA)', 'RSC', '2020-08-14', '2023-05-04', '042020_SPO_Pengangkutan_Uang_Kertas_Asing_(PUKA).pdf', 0, 'Widia', NULL, NULL, NULL),
(25, 14, 41, 54, '03 14 C 18010', 'Sertifikat SNI ISO 45001', 'Building Management', '0000-00-00', '2023-05-03', '03_14_C_18010_Sertifikat_SNI_ISO_45001.pdf', 0, 'Rahmat Setiawan', NULL, NULL, NULL),
(26, 14, 41, 54, 'SMK3 2021 AIS SK-183', 'Sertifikasi Sistem Manajemen K3', 'Building Management', '0000-00-00', '2023-05-03', 'SMK3_2021_AIS_SK-183_Sertifikasi_Sistem_Manajemen_K3.pdf', 0, 'Rahmat Setiawan', NULL, NULL, NULL),
(27, 21, 41, 51, '18/2020', 'Akta Notaris PT UG Mandiri Nomor 18', 'HCGA', '0000-00-00', '2023-05-02', '182020_Akta_Notaris_PT_UG_Mandiri_Nomor_18.pdf', 0, 'Widia', NULL, NULL, NULL),
(28, 21, 41, 51, '21/2017', 'Akta Notaris PT UG Mandiri Nomor 21', 'HCGA', '0000-00-00', '2023-05-02', '212017_Akta_Notaris_PT_UG_Mandiri_Nomor_21.pdf', 0, 'Widia', NULL, NULL, NULL),
(29, 21, 41, 51, '32/2021', 'Akta Notaris PT UG Mandiri Nomor 32', 'HCGA', '0000-00-00', '2023-05-02', '322021_Akta_Notaris_PT_UG_Mandiri_Nomor_32.pdf', 0, 'Widia', NULL, NULL, NULL),
(30, 21, 41, 51, '71/2021', 'Akta Notaris PT UG Mandiri Nomor 71', 'HCGA', '0000-00-00', '2023-05-02', '712021_Akta_Notaris_PT_UG_Mandiri_Nomor_71.pdf', 0, 'Widia', NULL, NULL, NULL),
(31, 21, 41, 51, '75/2019', 'Akta Notaris PT UG Mandiri Nomor 75', 'HCGA', '0000-00-00', '2023-05-02', '752019_Akta_Notaris_PT_UG_Mandiri_Nomor_75.pdf', 0, 'Widia', NULL, NULL, NULL),
(32, 21, 41, 51, '29/2018', 'Akta Pendirian PT UG Mandiri Nomor 29', 'HCGA', '0000-00-00', '2023-05-03', '292018_Akta_Notaris_PT_UG_Mandiri_Nomor_29.pdf', 0, 'Widia', NULL, NULL, NULL),
(33, 21, 41, 51, '38/2020', 'Akta Pendirian PT UG Arta Nomor 38', 'HCGA', '0000-00-00', '2023-05-03', '382020_Akta_Pendirian_PT_UG_Arta_Nomor_38.pdf', 0, 'Widia', NULL, NULL, NULL),
(34, 21, 41, 51, '53/2021', 'Akta Notaris PT UG Arta Nomor 53', 'HCGA', '0000-00-00', '2023-05-03', '532021_Akta_Notaris_PT_UG_Arta_Nomor_53.pdf', 0, 'Widia', NULL, NULL, NULL),
(35, 21, 41, 51, '72/2021', 'Akta Notaris PT UG Arta Nomor 72', 'HCGA', '0000-00-00', '2023-05-03', '722021_Akta_Notaris_PT_UG_Arta_Nomor_72.pdf', 0, 'Widia', NULL, NULL, NULL),
(37, 21, 41, 51, '29/2018', 'Akta Pendirian PT UG Bhakti Mandiri Nomor 29', 'HCGA', '0000-00-00', '2023-05-03', '292018_Akta_Pendirian_PT_UG_Bhakti_Mandiri_Nomor_29.pdf', 0, 'Widia', NULL, NULL, NULL),
(38, 21, 41, 65, '01/2021', 'PTO Cash Replenishment - First Level Maintenance (CR-FLM)', 'RSC', '2021-05-11', '2023-05-04', '012021_PTO_CR-FLM.pdf', 0, 'Widia', NULL, NULL, NULL),
(39, 21, 41, 63, '01/2021', 'SPO Cash Management & Other Services (CMOS)', 'RSC', '2021-05-18', '2023-05-04', '012021_SPO_Cash_Management_Other_Services_(CMOS).pdf', 0, 'Widia', NULL, NULL, NULL),
(40, 21, 41, 62, '01/2022', 'Kebijakan Manajemen Risiko', 'RSC', '2022-08-15', '2023-05-04', '012022_Kebijakan_Manajemen_Risiko.pdf', 0, 'Widia', NULL, NULL, NULL),
(41, 21, 41, 63, '01/2022', 'SPO Business Continuity Management UG Mandiri', 'RSC', '2022-09-06', '2023-05-04', '012022_SPO_Business_Continuity_Management.pdf', 0, 'Widia', NULL, NULL, NULL),
(42, 21, 41, 63, '02/2022', 'SPO Business Continuity Management CMOS', 'RSC', '2022-09-06', '2023-05-04', '022022_SPO_Business_Continuity_Management_CMOS.pdf', 0, 'Widia', NULL, NULL, NULL),
(43, 21, 41, 63, '03/2022', 'SPO Manajemen Risiko', 'RSC', '2022-09-01', '2023-05-04', '032022_SPO_Manajemen_Risiko.pdf', 0, 'Widia', NULL, NULL, NULL),
(44, 21, 41, 63, '04/2022', 'SPO Pengelolaan Teknologi Informasi', 'RSC', '2022-11-28', '2023-05-04', '042022_SPO_Pengelolaan_Teknologi_Informasi.pdf', 0, 'Widia', NULL, NULL, NULL),
(45, 21, 41, 63, '01/2023', 'SPO Pengelolaan Teknologi Informasi (Edisi ke - 2)', 'RSC', '2023-01-27', '2023-05-04', '012023_SPO_Pengelolaan_Teknologi_Informasi_(Edisi_ke_-_2)1.pdf', 0, 'Widia', NULL, NULL, NULL),
(46, 21, 41, 66, '001/2022', 'SK Komite Sistem Manajemen Anti Penyuapan (SMAP)', 'Building Management', '2022-08-18', '2023-05-04', '0012022_SK_Komite_Sistem_Manajemen_Anti_Penyuapan_(SMAP).pdf', 0, 'Widia', NULL, NULL, NULL),
(47, 21, 41, 66, '002/2022', 'Pedoman Sistem Manajemen Anti Penyuapan PT UG Mandiri', 'Building Management', '2022-08-19', '2023-05-04', '0022022_Pedoman_Sistem_Manajemen_Anti_Penyuapan_PT_UG_Mandiri.pdf', 0, 'Widia', NULL, NULL, NULL),
(48, 21, 41, 66, '003/2022', 'Pedoman Penanganan Gratifikasi PT UG Mandiri', 'Building Management', '2022-08-19', '2023-05-04', '0032022_Pedoman_Penanganan_Gratifikasi_PT_UG_Mandiri.pdf', 0, 'Widia', NULL, NULL, NULL),
(49, 21, 41, 66, '004/2022', 'Whistleblowing System (WBS) PT UG Mandiri', 'Building Management', '2022-08-19', '2023-05-04', '0042022_Whistleblowing_System_(WBS)_PT_UG_Mandiri.pdf', 0, 'Widia', NULL, NULL, NULL),
(50, 21, 41, 66, '005/2022', 'Daftar Induk Sistem Manajemen Anti Penyuapan (SMAP) ISO 37001', 'Building Management', '2022-10-03', '2023-05-04', '0052022_Daftar_Induk_Sistem_Manajemen_Anti_Penyuapan_(SMAP)_ISO_37001.pdf', 0, 'Widia', NULL, NULL, NULL),
(51, 21, 41, 66, '006/2022', 'Pakta Integritas Pegawai PT UG Mandiri', 'Building Management', '2022-09-13', '2023-05-04', '0062022_Fakta_Integritas_Pegawai_PT_UG_Mandiri.pdf', 0, 'Widia', NULL, NULL, NULL),
(52, 21, 41, 66, '007/2022', 'Pakta Integritas Rekanan PT UG Mandiri', 'Building Management', '2022-09-13', '2023-05-04', '0072022_Pakta_Integritas_Rekanan_PT_UG_Mandiri.pdf', 0, 'Widia', NULL, NULL, NULL),
(53, 21, 41, 66, '008/2022', 'Pernyataan Benturan Kepentingan (Conflict Of Interest) PT UG Mandiri', 'Building Management', '2022-09-13', '2023-05-04', '0082022_Pernyataan_Benturan_Kepentingan_(Conflict_Of_Interest)_PT_UG_Mandiri.pdf', 0, 'Widia', NULL, NULL, NULL),
(54, 21, 41, 66, '009/2022', 'Tinjauan Management Sistem Manajemen Anti Penyuapan (SMAP)', 'Building Management', '2022-08-22', '2023-05-04', '0092022_Tinjauan_Management_Sistem_Manajemen_Anti_Penyuapan_(SMAP).pdf', 0, 'Widia', NULL, NULL, NULL),
(55, 21, 41, 66, '010/2022', 'Pedoman Teknis Investigasi PT UG Mandiri', 'Building Management', '2022-08-19', '2023-05-04', '0102022_Pedoman_Teknis_Investigasi_PT_UG_Mandiri.pdf', 0, 'Widia', NULL, NULL, NULL),
(56, 21, 41, 66, '011/2022', 'Surat Tugas Audit Internal', 'Building Management', '2022-08-19', '2023-05-04', '0112022_Surat_Tugas_Audit_Internal.pdf', 0, 'Widia', NULL, NULL, NULL),
(57, 21, 41, 66, '012/2022', 'Corporate Sosial Responsibility(CSR)', 'Building Management', '2022-08-19', '2023-05-04', '0122022_Corporate_Sosial_Responsibility(CSR).pdf', 0, 'Widia', NULL, NULL, NULL),
(58, 21, 41, 66, '013/2022', 'Analisis SWOT Building Management', 'Building Management', '2022-08-19', '2023-05-04', '0132022_Analisis_SWOT_Building_Management.pdf', 0, 'Widia', NULL, NULL, NULL),
(59, 21, 41, 66, '014/2022', 'Rencana Strategis Building Management', 'Building Management', '2022-08-19', '2023-05-04', '0142022_Rencana_Strategis_Building_Management.pdf', 0, 'Widia', NULL, NULL, NULL),
(60, 21, 41, 66, '015/2022', 'Monitoring Pencapaian Sasaran Sistem Manajemen Anti Penyuapan (SMAP)', 'Building Management', '2022-08-19', '2023-05-04', '0152022_Monitoring_Pencapaian_Sasaran_Sistem_Manajemen_Anti_Penyuapan_(SMAP).pdf', 0, 'Widia', NULL, NULL, NULL),
(61, 21, 41, 66, '016/2022', 'Pendelegasian Kewenangan PT UG Mandiri', 'Building Management', '2022-08-19', '2023-05-04', '0162022_Pendelegasian_Kewenangan_PT_UG_Mandiri.pdf', 0, 'Widia', NULL, NULL, NULL),
(62, 21, 41, 66, '017/2017', 'Code Of Conduct', 'Building Management', '2017-12-29', '2023-05-04', '0172017_Code_Of_Conduct.pdf', 0, 'Widia', NULL, NULL, NULL),
(63, 23, 41, 72, '001/UU/V/2023', 'KUHP Hukum Pidana', 'RSC', '2023-05-10', '2023-05-10', '001KUHPV2023_KUHP_Hukum_Pidana.pdf', 0, 'Imelda', NULL, NULL, NULL),
(64, 23, 41, 72, '002/UU/V/2023', 'KUHP Hukum Perdata', 'RSC', '2023-05-10', '2023-05-10', '002UUV2023_KUHP_Hukum_Perdata.pdf', 0, 'Imelda', NULL, NULL, NULL),
(65, 23, 41, 72, '003/UU/V/2023', 'UU No 1 Tahun 1967 Tentang Penanaman Modal Asing', 'RSC', '2023-05-10', '2023-05-10', '003UUV2023_UU_No_1_Tahun_1967_Tentang_Penanaman_Modal_Asing.pdf', 0, 'Imelda', NULL, NULL, NULL),
(66, 23, 41, 72, '004/UU/V/2023', 'UU No 2 Tahun 2004 Tentang Penyelesaian Perselisihan Hubungan Industrial', 'RSC', '2023-05-10', '2023-05-10', '004UUV2023_UU_No_2_Tahun_2004_Tentang_Penyelesaian_Perselisihan_Hubungan_Industrial.pdf', 0, 'Imelda', NULL, NULL, NULL),
(67, 23, 41, 72, '005/UU/V/2023', 'UU No 2 Tahun 2008 Tentang Partai Politik', 'RSC', '2023-05-10', '2023-05-10', '005UUV2023_UU_No_2_Tahun_2008_Tentang_Partai_Politik.pdf', 0, 'Imelda', NULL, NULL, NULL),
(68, 23, 41, 72, '006/UU/V/2023', 'UU No 2 Tahun 2017 Tentang Jasa Konstruksi', 'RSC', '2023-05-10', '2023-05-10', '006UUV2023_UU_No_2_Tahun_2017_Tentang_Jasa_Konstruksi.pdf', 0, 'Imelda', NULL, NULL, NULL),
(69, 23, 41, 72, '007/UU/V/2023', 'UU No 3 Tahun 2014 Tentang Perindustrian', 'RSC', '2023-05-10', '2023-05-10', '007UUV2023_UU_No_3_Tahun_2014_Tentang_Perindustrian.pdf', 0, 'Imelda', NULL, NULL, NULL),
(70, 23, 41, 72, '008/UU/V/2023', 'UU No 5 Tahun 1997 Tentang Psikotropika', 'RSC', '2023-05-10', '2023-05-10', '008UUV2023_UU_No_5_Tahun_1997_Tentang_Psikotropika.pdf', 0, 'Imelda', NULL, NULL, NULL),
(71, 23, 41, 72, '009/UU/V/2023', 'UU No 5 Tahun 1999 Tentang Larangan Praktik Monopoli dan Persaingan Tidak Sehat', 'RSC', '2023-05-10', '2023-05-10', '009UUV2023_UU_No_5_Tahun_1999_Tentang_Larangan_Praktik_Monopoli_dan_Persaingan_Tidak_Sehat.pdf', 0, 'Imelda', NULL, NULL, NULL),
(72, 23, 41, 72, '010/UU/V/2023', 'UU No 6 Tahun 1983 Tentang Ketentuan Umum Tatacara Perpajakan', 'RSC', '2023-05-10', '2023-05-10', '010UUV2023_UU_No_6_Tahun_1983_Tentang_Ketentuan_Umum_Tatacara_Perpajakan.pdf', 0, 'Imelda', NULL, NULL, NULL),
(73, 23, 41, 72, '011/UU/V/23', 'UU No 7 Tahun 1983 Tentang Pajak Penghasilan', 'RSC', '2023-05-10', '2023-05-10', '011UUV23_UU_No_7_Tahun_1983_Tentang_Pajak_Penghasilan.pdf', 0, 'Imelda', NULL, NULL, NULL),
(74, 23, 41, 72, '012/UU/V/2023', 'UU No 7 Tahun 1991 Tentang Pajak Penghasilan (Perubahan)', 'RSC', '2023-05-10', '2023-05-10', '012UUV2023_UU_No_7_Tahun_1991_Tentang_Pajak_Penghasilan_(Perubahan).pdf', 0, 'Imelda', NULL, NULL, NULL),
(75, 23, 41, 72, '013/UU/V/2023', 'UU No 7 Tahun 1989 Tentang Peradilan Agama', 'RSC', '2023-05-10', '2023-05-10', '013UUV2023_UU_No_7_Tahun_1989_Tentang_Peradilan_Agama.pdf', 0, 'Imelda', NULL, NULL, NULL),
(76, 23, 41, 72, '014/UU/V/2023', 'UU No 7 Tahun 1992 Tentang Perbankan', 'RSC', '2023-05-10', '2023-05-10', '014UUV2023_UU_No_7_Tahun_1992_Tentang_Perbankan.pdf', 0, 'Imelda', NULL, NULL, NULL),
(77, 23, 41, 72, '015/UU/V/2023', 'UU No 7 Tahun 2004 Tentang Sumber Daya Air', 'RSC', '2023-05-10', '2023-05-10', '015UUV2023_UU_No_7_Tahun_2004_Tentang_Sumber_Daya_Air.pdf', 0, 'Imelda', NULL, NULL, NULL),
(78, 23, 41, 72, '016/UU/V/2023', 'UU No 7 Tahun 2011 Tentang Mata Uang', 'RSC', '2023-05-10', '2023-05-10', '016UUV2023_UU_No_7_Tahun_2011_Tentang_Mata_Uang.pdf', 0, 'Imelda', NULL, NULL, NULL),
(79, 23, 41, 72, '017/UU/V/2023', 'UU No 7 Tahun 2014 Tentang Perdagangan', 'RSC', '2023-05-10', '2023-05-10', '017UUV2023_UU_No_7_Tahun_2014_Tentang_Perdagangan.pdf', 0, 'Imelda', NULL, NULL, NULL),
(80, 23, 41, 72, '018/UU/V/2023', 'UU No 8 Tahun 1981 Tentang Hukum Acara Pidana', 'RSC', '2023-05-10', '2023-05-10', '018UUV2023_UU_No_8_Tahun_1981_Tentang_Hukum_Acara_Pidana.pdf', 0, 'Imelda', NULL, NULL, NULL),
(81, 23, 41, 72, '019/UU/V/2023', 'UU No 8 Tahun 1983 Tentang Pajak Pertambahan Nilai Barang dan Jasa dan Pajak Penjualan', 'RSC', '2023-05-10', '2023-05-10', '019UUV2023_UU_No_8_Tahun_1983_Tentang_Pajak_Pertambahan_Nilai_Barang_dan_Jasa_dan_Pajak_Penjualan.pdf', 0, 'Imelda', NULL, NULL, NULL),
(82, 23, 41, 72, '020/UU/V/2023', 'UU No 8 Tahun 1992 Tentang Perfilman', 'RSC', '2023-05-10', '2023-05-10', '020UUV2023_UU_No_8_Tahun_1992_Tentang_Perfilman.pdf', 0, 'Imelda', NULL, NULL, NULL),
(83, 23, 41, 72, '021/UU/V/2023', 'UU No 8 Tahun 1997 Tentang Dokumen Perusahaan', 'RSC', '2023-05-10', '2023-05-10', '021UUV2023_UU_No_8_Tahun_1997_Tentang_Dok_Perusahaan.pdf', 0, 'Imelda', NULL, NULL, NULL),
(84, 23, 41, 72, '022/UU/V/2023', 'UU No 8 Tahun 1999 Tentang Perlindungan Konsumen', 'RSC', '2023-05-10', '2023-05-10', '022UUV2023_UU_No_8_Tahun_1999_Tentang_Perlindungan_Konsumen.pdf', 0, 'Imelda', NULL, NULL, NULL),
(85, 23, 41, 72, '023/UU/V/2023', 'UU No 8 Tahun 2004 Perubahan UU No 22 TAHUN 1986 Tentang Peradilan Umum', 'RSC', '2023-05-10', '2023-05-10', '023UUV2023_UU_No_8_Tahun_2004_Perubahan_UU_No_22_TAHUN_1986_Tentang_Peradilan_Umum.pdf', 0, 'Imelda', NULL, NULL, NULL),
(86, 23, 41, 72, '024/UU/V/2023', 'UU No 8 Tahun 2010 Tentang Tindak Pidana Pencucian Uang (TPPU)', 'RSC', '2023-05-10', '2023-05-10', '024UUV2023_UU_No_8_Tahun_2010_Tentang_Tindak_Pidana_Pencucian_Uang_(TPPU).pdf', 0, 'Imelda', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_number_rak`
--

CREATE TABLE `file_number_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(115) DEFAULT NULL,
  `nomor_rak` varchar(115) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_jenis_document`
--

CREATE TABLE `master_jenis_document` (
  `id_jenis_doc` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_jenis` varchar(225) DEFAULT NULL,
  `singkat_jenis` varchar(115) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `memo`
--

CREATE TABLE `memo` (
  `id` int(11) NOT NULL,
  `no_manual` int(11) DEFAULT NULL,
  `tgl_memo` date DEFAULT NULL,
  `perihal` varchar(500) DEFAULT NULL,
  `isi_memo` text DEFAULT NULL,
  `tujuan_memo` varchar(115) DEFAULT NULL,
  `asal_memo` varchar(115) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `divisi` varchar(115) DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id`, `name`, `email`, `divisi`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(2, 'Administrator', 'info@ptugmandiri.com', 'RSC', 'default.png', '$2y$10$iQuUclJNDMhQbgUQ/cLGH.TX6D3Xzpsvr4FjhD4P2nCHASnAOOlPS', 1, 1, '0000-00-00'),
(14, 'Rahmat Setiawan', 'rahmat.setiawan@ugmandiri.co.id', 'Risk System and Compliance', 'default.png', '$2y$10$hm3Gbxs40bo5Xi36mhPXCO/GujB5ZqDYNWtkWRlRREOUEd.y9YtBK', 15, 1, '14/04/2023'),
(15, 'User', 'user@ugmandiri.co.id', 'UG Mandiri', 'default.png', '$2y$10$jZpvCEdBKwfNLEwO872ACusdefzEEUZSokwG.TZr/ub/gf5VN5.Lm', 16, 0, '14/04/2023'),
(17, 'dir01', 'dir01@ugmandiri.co.id', 'Direksi', 'default.png', '$2y$10$Lni8MZj5usf7Dl/sgQCjL.aE3FbTUPb8coSgzB1oW8gqVkbE3DbD.', 18, 0, '27/04/2023'),
(18, 'dir02', 'dir02@ugmandiri.co.id', 'Direksi', 'default.png', '$2y$10$a0LIFPP1c6oLUqoyXDFpg.Www.fto6y1JnilhMBNj5q2q5/QwOYlK', 19, 0, '27/04/2023'),
(21, 'Widia', 'widia@ugmandiri.co.id', 'RSC', 'default.png', '$2y$10$ADg5w6J7dMzZRLS1oYglf.QOBJUdpj3gLFfsHdF4EGci8wklfwCIe', 22, 1, '02/05/2023'),
(22, 'Endang', 'endang.pariyanto@ugmandiri.co.id', 'RSC', 'default.png', '$2y$10$U.3Bl9Lwwkz/KADlDMDR3.Nx.URmc6EXzWE7zStxNAU.BZr.VS36i', 23, 1, '02/05/2023'),
(23, 'Imelda', 'imeldafebriputri@ugmandiri.co.id', 'RSC', 'default.png', '$2y$10$YMGdz8M4290X5EZJmV8lPOT7jb/lochzUt4YVem8rEsYKvwJJeijK', 24, 1, '02/05/2023'),
(24, 'Ali', 'ali@ugmandiri.co.id', 'RSC', 'default.png', '$2y$10$2ZgPVE/8cJbqpG.g8az61u3W.rDWlJ8dLbmgWKE4g0HJ5jgjIbnWW', 25, 1, '02/05/2023'),
(25, 'Cici', 'cici.reta@ugmandiri.co.id', 'RSC', 'default.png', '$2y$10$DqogQAs8enGQc8jIi/lZs.EejNMHErnpVGqk1VzIIFnJpOoPIikuO', 26, 1, '02/05/2023'),
(27, 'Reko', 'reko@ugmandiri.co.id', 'RSC', 'default.png', '$2y$10$74Vt5/r5aQRDXGRkTe8GguwEkjgExK2WlUMQkC3Tgs9YeCZgrVUma', 28, 1, '02/05/2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `judul` varchar(225) DEFAULT NULL,
  `gambar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `upload`
--

INSERT INTO `upload` (`id`, `judul`, `gambar`) VALUES
(1, 'dsd', '3dcf33387adcc024b600a25d1a82265d.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(5, 15, 41),
(6, 15, 2),
(7, 16, 2),
(8, 16, 41),
(9, 17, 2),
(10, 17, 41),
(12, 1, 2),
(16, 19, 2),
(17, 19, 41),
(20, 18, 2),
(21, 18, 41),
(22, 1, 3),
(23, 1, 41),
(24, 20, 2),
(25, 20, 3),
(26, 20, 41),
(27, 21, 2),
(28, 21, 41),
(29, 22, 2),
(30, 22, 41),
(31, 23, 2),
(32, 23, 41),
(33, 24, 2),
(34, 24, 41),
(35, 25, 2),
(36, 25, 3),
(37, 25, 41),
(38, 26, 41),
(39, 26, 3),
(40, 26, 2),
(41, 27, 41),
(42, 27, 3),
(43, 27, 2),
(44, 28, 41),
(45, 28, 3),
(46, 28, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_sub_menu`
--

CREATE TABLE `user_access_sub_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `sub_menu_id` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT 0,
  `add` int(11) DEFAULT 0,
  `edit` int(11) DEFAULT 0,
  `delete` int(11) DEFAULT 0,
  `print` int(11) DEFAULT 0,
  `upload` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(41, 'Portal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(15, 'Rahmat Setiawan'),
(16, 'User'),
(18, 'dir01'),
(19, 'dir02'),
(22, 'Widia'),
(23, 'Endang'),
(24, 'Imelda'),
(25, 'Ali'),
(26, 'Cici'),
(28, 'Reko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_sub_menu` int(11) NOT NULL DEFAULT 0,
  `is_main_menu` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `is_sub_menu`, `is_main_menu`) VALUES
(1, 1, 'Dashboard', 'Dashboard', 'fas fa-fw fa-tachometer-alt', 1, 0, 0),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1, 0, 0),
(4, 3, 'Menu', NULL, 'fas fa-fw fa-folder-open', 1, 0, 0),
(5, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder-open', 1, 0, 4),
(6, 3, 'Submenu management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1, 0, 4),
(7, 1, 'User Management', 'admin/role', 'fas fa-fw fa-folder-open', 1, 0, 4),
(11, 1, 'Create an Account', 'Auth/registration', 'fas fa-fw fa-folder-open', 1, 0, 0),
(50, 41, 'Company Profile', 'Portal/CompanyProfile', 'fas fa-fw fa-folder-open', 1, 0, 0),
(51, 41, 'Akta Perusahaan', 'Portal/AktaPerusahaan', 'fas fa-fw fa-folder-open', 1, 0, 0),
(52, 41, 'Struktur Organisasi', 'Portal/StrukturOrganisasi', 'fas fa-fw fa-folder-open', 1, 0, 0),
(53, 41, 'Job Description', NULL, 'fas fa-fw fa-folder-open', 1, 1, 0),
(54, 41, 'Sertifikasi', 'Portal/Sertifikasi', 'fas fa-fw fa-folder-open', 1, 0, 0),
(55, 41, 'Corplan', 'Portal/Corplan', 'fas fa-fw fa-folder-open', 1, 0, 0),
(56, 41, 'Dashboard CERMATI', 'Portal/DashboardCERMATI', 'fas fa-fw fa-folder-open', 1, 0, 0),
(57, 41, 'Tingkat Kesehatan Perusahaan', 'Portal/TKP', 'fas fa-fw fa-folder-open', 1, 0, 0),
(58, 41, 'MOU &amp; PKS', 'Portal/MouPks', 'fas fa-fw fa-folder-open', 1, 0, 0),
(61, 41, 'Ketentuan Internal', NULL, 'fas fa-fw fa-folder-open', 1, 1, 0),
(62, 41, 'Kebijakan', 'Portal/Kebijakan', 'fas fa-fw fa-folder-open', 1, 0, 61),
(63, 41, 'Standar Prosedur Operasional', 'Portal/SPO', 'fas fa-fw fa-folder-open', 1, 0, 61),
(64, 41, 'Momerandum Prosedur', 'Portal/MP', 'fas fa-fw fa-folder-open', 1, 0, 61),
(65, 41, 'Petunjuk Teknis Operasional', 'Portal/PTO', 'fas fa-fw fa-folder-open', 1, 0, 61),
(66, 41, 'Pedoman ISO 37001', 'Portal/Pedoman', 'fas fa-fw fa-folder-open', 1, 0, 61),
(67, 41, 'Surat', 'Portal/Surat', 'fas fa-fw fa-folder-open', 1, 0, 61),
(68, 41, 'Nota', 'Portal/Nota', 'fas fa-fw fa-folder-open', 1, 0, 61),
(69, 41, 'Memo', 'Portal/Memo', 'fas fa-fw fa-folder-open', 1, 0, 61),
(70, 41, 'Lain - lain', 'Portal/KetIntLain', 'fas fa-fw fa-folder-open', 1, 0, 61),
(71, 41, 'Ketentuan Eksternal', NULL, 'fas fa-fw fa-folder-open', 1, 1, 0),
(72, 41, 'Undang - undang', 'Portal/UU', 'fas fa-fw fa-folder-open', 1, 0, 71),
(73, 41, 'Peraturan Pemerintah', 'Portal/PP', 'fas fa-fw fa-folder-open', 1, 0, 71),
(74, 41, 'Regulator', 'Portal/Regulator', 'fas fa-fw fa-folder-open', 1, 0, 71),
(75, 41, 'Lain - lain', 'Portal/KetEksLain', 'fas fa-fw fa-folder-open', 1, 0, 71),
(78, 1, 'Master', NULL, 'fas fa-fw fa-folder-open', 1, 1, 0),
(79, 1, 'Data Divisi', 'Master/divisi', 'fas fa-fw fa-folder-open', 1, 0, 0),
(81, 41, 'Building Management', 'Portal/JobDesBm', 'fas fa-fw fa-folder-open', 1, 0, 53),
(82, 41, 'Contruction and Property', 'Portal/JobDesCp', 'fas fa-fw fa-folder-open', 1, 0, 53),
(83, 41, 'Divisi Audit Internal', 'Portal/JobDesAudit', 'fas fa-fw fa-folder-open', 1, 0, 53),
(84, 41, 'Finance', 'Portal/JobDesFin', 'fas fa-fw fa-folder-open', 1, 0, 53),
(85, 41, 'HCGA', 'Portal/JobDesHcga', 'fas fa-fw fa-folder-open', 1, 0, 53),
(86, 41, 'IT Bussiness', 'Portal/JobDesItbs', 'fas fa-fw fa-folder-open', 1, 0, 53),
(87, 41, 'Risk System and Compliance', 'Portal/JobDesRsc', 'fas fa-fw fa-folder-open', 1, 0, 53);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `file_number_rak`
--
ALTER TABLE `file_number_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `master_jenis_document`
--
ALTER TABLE `master_jenis_document`
  ADD PRIMARY KEY (`id_jenis_doc`);

--
-- Indeks untuk tabel `memo`
--
ALTER TABLE `memo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `file_number_rak`
--
ALTER TABLE `file_number_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_jenis_document`
--
ALTER TABLE `master_jenis_document`
  MODIFY `id_jenis_doc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `memo`
--
ALTER TABLE `memo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `user_access_sub_menu`
--
ALTER TABLE `user_access_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
