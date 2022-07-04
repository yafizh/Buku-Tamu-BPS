DROP DATABASE IF EXISTS `db_buku_tamu_bps`;
CREATE DATABASE `db_buku_tamu_bps`;
USE `db_buku_tamu_bps`;

CREATE TABLE `tabel_ruangan` (
    id INT NOT NULL AUTO_INCREMENT,
    nama_ruangan VARCHAR(255) NOT NULL,
    keterangan VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE `tabel_user` (
    id INT NOT NULL AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    status ENUM('ADMIN','PETUGAS', 'TAMU') NOT NULL,
    gambar VARCHAR(255) NULL,
    PRIMARY KEY (id)
);

INSERT INTO `tabel_user` (
    nama,
    username,
    password,
    status,
    gambar  
) VALUES 
('admin','admin','admin','ADMIN', NULL),
('Andry','andry','andry','PETUGAS', NULL),
('Nursahid Arya Suyudi','arya','arya','TAMU', NULL),
('Rania Nor Aida','rania','rania','TAMU', NULL),
('Yuval Noah Harari','yuval','yuval','TAMU', NULL),
('Mark Manson','mark','mark','TAMU', NULL),
('Rustam Agus','rustam','rustam','TAMU', NULL),
('Budi Darma','budi','budi','TAMU', NULL),
('Hidayat Widya','hidayat','hidayat','TAMU', NULL),
('Faisal Imam','faisal','faisal','TAMU', NULL),
('Jamaluddin Firdaus','jamaluddin','jamaluddin','TAMU', NULL),
('Wati Nur','wati','wati','TAMU', NULL),
('Aminah Jamaluddin','aminah','aminah','TAMU', NULL),
('Putri Latifah','putri','putri','TAMU', NULL),
('Aditya Rahma','aditya','aditya','TAMU', NULL),
('Buana Jamaluddin','buana','buana','TAMU', NULL),
('Abdullah Burhan','abdullah','abdullah','TAMU', NULL),
('Krisna Sulaiman','krisna','krisna','TAMU', NULL),
('Zakaria Jamilah','zakaria','zakaria','TAMU', NULL),
('Tri Yuda','tri','tri','TAMU', NULL),
('Nirmala Aditya','nirmala','nirmala','TAMU', NULL),
('Irfan Hidayat','irfan','irfan','TAMU', NULL),
('Alya Mahmud','alya','alya','TAMU', NULL),
('Bima Nur','bima','bima','TAMU', NULL),
('Mahmud Adi','mahmud','mahmud','TAMU', NULL),
('Agung Lestari','agung','agung','TAMU', NULL),
('Usman Batari','usman','usman','TAMU', NULL),
('Agung Zakaria','agung2','agung2','TAMU', NULL),
('Dewi Mansur','dewi','dewi','TAMU', NULL),
('Ruslan Nirmala','ruslan','ruslan','TAMU', NULL),
('Guntur Batari','guntur','guntur','TAMU', NULL),
('Yohanes Dwi','yohanes','yohanes','TAMU', NULL),
('Aminah Burhan','aminah2','aminah2','TAMU', NULL),
('Harun Ibrahim','harun','harun','TAMU', NULL),
('Nur Mega','nur','nur','TAMU', NULL),
('Burhan Abdullah','burhan','burhan','TAMU', NULL),
('Irfan Kusuma','irfan2','irfan2','TAMU', NULL),
('Iskandar Bagus','iskandar','iskandar','TAMU', NULL),
('Buana Bulan','buana2','buana2','TAMU', NULL),
('Aminah Akhmad','aminah3','aminah3','TAMU', NULL),
('Wira Arif','wira','wira','TAMU', NULL),
('Putri Burhanuddin','burhanuddin','burhanuddin','TAMU', NULL);


CREATE TABLE `tabel_tamu` (
    id INT NOT NULL AUTO_INCREMENT,
    id_user INT NULL,
    nama VARCHAR(255) NOT NULL,
    nomor_telepon VARCHAR(15) NOT NULL,
    jenis_kelamin ENUM('L','P') NULL,
    asal_instansi VARCHAR(50) NOT NULL,
    alamat VARCHAR(255) NULL,
    status ENUM('AKTIF', 'MENDAFTAR', 'LUPA PASSWORD') NOT NULL,
    mendaftar_sendiri TINYINT(1) NOT NULL DEFAULT 0,
    tanggal_terdaftar DATETIME NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_user) REFERENCES tabel_user (id)
);

INSERT INTO `tabel_tamu` (
    id_user,
    nama,
    nomor_telepon,
    jenis_kelamin,
    asal_instansi,
    alamat, 
    status,
    mendaftar_sendiri,
    tanggal_terdaftar    
) VALUES 
(3, 'Nursahid Arya Suyudi', '0851898890', 'L', 'UNISKA', 'Banjarbaru','AKTIF', 0, NOW()),
(4, 'Rania Nor Aida', '0826603078', 'P', 'UNISKA', 'Banjarbaru','AKTIF', 0, NOW()),
(5, 'Yuval Noah Harari', '08750801323', 'L', 'Snarky Square', 'Amerika','AKTIF', 0, NOW()),
(6, 'Mark Manson', '086125847637', 'L', 'Snarky Square', 'Amerika','AKTIF', 0, NOW()),
(7, 'Rustam Agus', '08914581146', 'L', 'UNLAM', 'Banjarmasin','AKTIF', 0, NOW()),
(8, 'Budi Darma', '08595775305', 'L', 'UNLAM', 'Banjarmasin','AKTIF', 0, NOW()),
(9, 'Hidayat Widya', '0892556772338', 'L', 'STIMIK', 'Banjarmasin','AKTIF', 0, NOW()),
(10, 'Faisal Imam', '0880566688', 'L', 'STIMIK', 'Banjarmasin','AKTIF', 0, NOW()),
(11, 'Jamaluddin Firdaus', '0832800013778', 'L', 'Universitas Indonesia', 'Jakarta','AKTIF', 0, NOW()),
(12, 'Wati Nur', '081811885506', 'P', 'Universitas Indonesia', 'Jakarta','AKTIF', 0, NOW()),
(13, 'Aminah Jamaluddin', '0858091504175', 'P', 'ITB', 'Bandung','AKTIF', 0, NOW()),
(14, 'Putri Latifah', '082998727680', 'P', 'ITB', 'Bandung','AKTIF', 0, NOW()),
(15, 'Aditya Rahma', '08816947480', 'L', 'UGM', 'Yogyakarta','AKTIF', 0, NOW()),
(16, 'Buana Jamaluddin', '089838015337', 'L', 'UGM', 'Yogyakarta','AKTIF', 0, NOW()),
(17, 'Abdullah Burhan', '0886245354614', 'L', 'BPTP', 'Jakarta','AKTIF', 0, NOW()),
(18, 'Krisna Sulaiman', '0871124394760', 'L', 'BPTP', 'Jakarta','AKTIF', 0, NOW()),
(19, 'Zakaria Jamilah', '0897646254228', 'P', 'SMK 1 Martapura', 'Martapura','AKTIF', 0, NOW()),
(20, 'Tri Yuda', '08704173011', 'L', 'SMK 1 Martapura', 'Martapura','AKTIF', 0, NOW()),
(21, 'Nirmala Aditya', '082704111439', 'L', 'SMADA', 'Banjarbaru','AKTIF', 0, NOW()),
(22, 'Irfan Hidayat', '086140639646', 'P', 'SMADA', 'Banjarbaru','AKTIF', 0, NOW()),
(23, 'Alya Mahmud', '08642805113', 'L', 'Kejaksaan Agung', '','AKTIF', 1, NOW()),
(24, 'Bima Nur', '0881321573', 'L', 'Komisi Yudisial', 'Jr. Hang No. 246','AKTIF', 1, NOW()),
(25, 'Mahmud Adi', '08205920419', 'L', 'Badan Pemeriksa Keuangan', 'Ki. Tubagus Ismail No. 515','AKTIF', 1, NOW()),
(26, 'Agung Lestari', '0887340156', 'L', 'Badan Meteorologi', 'Gg. Sentot Alibasa No. 435','AKTIF', 1, NOW()),
(27, 'Usman Batari', '088437232178', 'L', 'Klimatologi', 'Ds. R.M. Said No. 664','AKTIF', 1, NOW()),
(28, 'Agung Zakaria', '08724364129', 'L', 'BMKG', 'Dk. Kalimalang No. 246','AKTIF', 1, NOW()),
(29, 'Dewi Mansur', '088419346293', 'P', 'Badan Tenaga Nuklir Nasional', 'Psr. Bata Putih No. 288','AKTIF', 1, NOW()),
(30, 'Ruslan Nirmala', '0810201595', 'P', 'Dinas Pendidikan', 'Dk. Sentot Alibasa No. 494','AKTIF', 1, NOW()),
(31, 'Guntur Batari', '088140449403', 'L', 'Dinas Pendidikan dan Kebudayaan', 'Jln. Radio No. 874','AKTIF', 1, NOW()),
(32, 'Yohanes Dwi', '08815836673', 'P', 'Dinas Kesehatan', 'Psr. Lembong No. 425','AKTIF', 1, NOW()),
(33, 'Aminah Burhan', '0886822141', 'P', 'Dinas Pekerjaan Umum', 'Gg. Kusmanto No. 617','AKTIF', 1, NOW()),
(34, 'Harun Ibrahim', '08383947306', 'L', 'Dinas Bina Marga', 'Ds. Abdul Muis No. 250','AKTIF', 1, NOW()),
(35, 'Nur Mega', '086624844004', 'P', 'Dinas Cipta Karya', 'Dk. Ekonomi No. 589','AKTIF', 1, NOW()),
(36, 'Burhan Abdullah', '081939747692', 'L', 'Satuan Polisi Pamong Praja', 'Ki. Baan No. 696','AKTIF', 1, NOW()),
(37, 'Irfan Kusuma', '0833456365', 'L', 'Dinas Sosial', 'Jr. Abdul No. 82','AKTIF', 1, NOW()),
(38, 'Iskandar Bagus', '0858147623', 'L', 'Dinas Tenaga Kerja', 'Psr. Ters. Kiaracondong No. 264','AKTIF', 1, NOW()),
(39, 'Buana Bulan', '0884956585319', 'L', 'Dinas Lingkungan Hidup', 'Dk. Jend. Sudirman No. 816','AKTIF', 1, NOW()),
(40, 'Aminah Akhmad', '087672355796', 'L', 'Dinas Perhubungan', 'Ki. Banal No. 276','AKTIF', 1, NOW()),
(41, 'Wira Arif', '083021082550', 'L', 'Badan Kepegawaian Daerah', 'Ds. Astana Anyar No. 360','AKTIF', 1, NOW()),
(42, 'Putri Burhanuddin', '08956835147', 'P', 'Dinas Pendapatan Daerah', 'Ki. Yos No. 640','AKTIF', 1, NOW());

CREATE TABLE `tabel_divisi` (
    id INT NOT NULL AUTO_INCREMENT,
    nama_divisi VARCHAR(255) NOT NULL,
    keterangan VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO `tabel_divisi` (
    nama_divisi,
    keterangan
) VALUES 
('KEPALA', 'Divisi Bagian KEPALA'),
('TATA USAHA', 'Divisi Bagian TATA USAHA'),
('SEKSI STATISTIK SOSIAL', 'Divisi Bagian SEKSI STATISTIK SOSIAL'),
('SEKSI NERWILIS', 'Divisi Bagian SEKSI NERWILIS'),
('SEKSI STATISTIK DISTRIBUSI', 'Divisi Bagian SEKSI STATISTIK DISTRIBUSI'),
('SEKSI STATISTIK PRODUKSI', 'Divisi Bagian SEKSI STATISTIK PRODUKSI'),
('SEKSI IPDS', 'Divisi Bagian SEKSI IPDS'),
('KOORDINATOR STATISTIK KECAMATAN', 'DIVISI Bagian KOORDINATOR STATISTIK KECAMATAN');

CREATE TABLE `tabel_pegawai` (
    id INT NOT NULL AUTO_INCREMENT,
    id_divisi INT NULL,
    nama VARCHAR(255) NOT NULL,
    nip VARCHAR(255) NOT NULL,
    jenis_kelamin ENUM('L','P') NOT NULL,
    nomor_telepon VARCHAR(15) NOT NULL,
    tanggal_lahir VARCHAR(15) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_divisi) REFERENCES tabel_divisi (id)
);

INSERT INTO `tabel_pegawai` (
    id_divisi,
    nama,
    nip,
    jenis_kelamin,
    nomor_telepon,
    tanggal_lahir 
) VALUES 
(1, 'Sukma Handayani, M.Si', '197503111996122000', 'P', '098732135523', CURRENT_DATE()),
(2, 'Arfiani, S.Si', '198112042011011000', 'L', '098732135524', CURRENT_DATE()),
(2, 'M. Agus Suharyanto, A.Md', '198810052011011000', 'L', '098732135522', CURRENT_DATE()),
(3, 'Noor Hamimah, SE', '198607212011012000', 'P', '098732135521', CURRENT_DATE()),
(3, 'Muhammad Taufik Hidayat, SST', '198803082012111000', 'L', '098732135527', CURRENT_DATE()),
(3, 'Hanif Yontar Rahma, S.Si', '199412192019032000', 'L', '098732135529', CURRENT_DATE()),
(6, 'Muhammad Adi Wijaya Kesuma, SST', '199412212018021000', 'L', '098732135528', CURRENT_DATE()),
(5, 'Masdani, SE', '197110181993121000', 'L', '098732135533', CURRENT_DATE()),
(5, 'Ulya Zahrotun Niswah, SST', '199407242018022000', 'P', '098732135534', CURRENT_DATE()),
(4, 'Anggita Silmi Nabilah, SST', '199507062018022000', 'P', '098732135531', CURRENT_DATE()),
(4, 'Muhammad Imam Sholihin, S.Tr.Stat.', '199711142021041000', 'L', '098732135532', CURRENT_DATE()),
(7, 'Eko Wahyu Lestari, SST', '199403272017012000', 'P', '098732135535', CURRENT_DATE()),
(7, 'Oktaviani, S.Tr.Stat.', '199610122019012000', 'P', '098732135536', CURRENT_DATE()),
(8, 'Rusni', '196905102006041000', 'L', '098732135537', CURRENT_DATE()),
(8, 'Taufik Ilhakim', '196807052007011000', 'L', '098732135538', CURRENT_DATE()),
(8, 'Abu Hurairah', '198108232002121000', 'P', '098732135539', CURRENT_DATE()),
(8, 'Azehar, SE.', '196902091993121000', 'L', '098732135599', CURRENT_DATE()),
(8, 'Agusriadi', '197708062007101000', 'L', '098732135588', CURRENT_DATE()),
(8, 'Nabhani', '198010172007101000', 'L', '098732135566', CURRENT_DATE()),
(8, 'Herliani', '197504112009012000', 'P', '098732135511', CURRENT_DATE());

CREATE TABLE `tabel_ikm`(
    id INT NOT NULL AUTO_INCREMENT,
    nilai INT NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `tabel_ikm` (
    `id`,
    `nilai` 
) VALUES
(1, 5),
(2, 5),
(3, 5),
(4, 3),
(5, 2),
(6, 4),
(7, 1),
(8, 2),
(9, 5),
(10, 5),
(11, 5),
(12, 2),
(13, 3),
(14, 4),
(15, 3),
(16, 4),
(17, 5),
(18, 4),
(19, 4),
(20, 4),
(21, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(46, 4),
(47, 4),
(48, 4),
(49, 4),
(50, 4),
(51, 4),
(52, 4),
(53, 4),
(54, 4),
(55, 4),
(56, 4),
(57, 4),
(58, 4),
(59, 4),
(60, 4),
(62, 2),
(63, 3),
(64, 4),
(65, 3),
(66, 4),
(67, 5),
(68, 4),
(69, 4),
(70, 4),
(71, 4),
(72, 4),
(73, 4),
(74, 4),
(75, 4),
(76, 4),
(77, 4),
(78, 4),
(79, 4),
(80, 4),
(81, 4),
(82, 4),
(83, 4),
(84, 4),
(85, 4),
(86, 4),
(87, 4),
(88, 4),
(89, 4),
(90, 4),
(91, 4),
(92, 4),
(93, 4),
(94, 4),
(95, 4),
(96, 4),
(97, 4),
(98, 4),
(99, 4),
(100, 4);

CREATE TABLE `tabel_pengajuan` (
    id INT NOT NULL AUTO_INCREMENT,
    id_pegawai INT NOT NULL,
    id_tamu INT NOT NULL,
    id_ikm INT NULL,
    waktu TIME NOT NULL,
    tanggal DATE NOT NULL,
    keperluan VARCHAR(255) NOT NULL,
    jenis_pertemuan ENUM('OFFLINE', 'ONLINE') NOT NULL,
    status ENUM('PENGAJUAN', 'DITOLAK', 'DITERIMA', 'SELESAI') NOT NULL,
    keterangan TEXT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_pegawai) REFERENCES tabel_pegawai (id),
    FOREIGN KEY (id_tamu) REFERENCES tabel_tamu (id) ON DELETE CASCADE
);

INSERT INTO `tabel_pengajuan` (
    `id`,
    `id_pegawai`, 
    `id_tamu`, 
    `id_ikm`, 
    `tanggal`, 
    `waktu`, 
    `keperluan`, 
    `jenis_pertemuan`, 
    `status` 
) VALUES
(1,1, 1, 1, CURRENT_DATE() - INTERVAL 1 DAY, '08:01:51', 'Meeting', 'ONLINE', 'PENGAJUAN'),
(2,2, 2, 2, CURRENT_DATE() - INTERVAL 1 DAY , '09:02:52', 'Meeting', 'ONLINE', 'SELESAI'),
(3,3, 3, 3, CURRENT_DATE() - INTERVAL 1 DAY , '10:03:53', 'Meeting', 'ONLINE', 'SELESAI'),
(4,4, 4, 4, CURRENT_DATE() - INTERVAL 1 DAY , '13:04:54', 'Meeting', 'ONLINE', 'SELESAI'),
(5,5, 5, 5, CURRENT_DATE() - INTERVAL 1 DAY , '14:05:50', 'Meeting', 'ONLINE', 'SELESAI'),
(6,6, 6, 6, CURRENT_DATE() - INTERVAL 2 DAY , '11:06:51', 'Meeting', 'ONLINE', 'SELESAI'),
(7,7, 7, 7, CURRENT_DATE() - INTERVAL 2 DAY , '09:07:52', 'Meeting', 'ONLINE', 'SELESAI'),
(8,8, 8, 8, CURRENT_DATE() - INTERVAL 2 DAY , '10:08:56', 'Meeting', 'ONLINE', 'SELESAI'),
(9,9, 9, 9, CURRENT_DATE() - INTERVAL 2 DAY , '14:09:57', 'Meeting', 'ONLINE', 'SELESAI'),
(10,10, 10, 10,CURRENT_DATE() - INTERVAL 2 DAY , '11:00:58', 'Meeting', 'ONLINE', 'SELESAI'),
(11,11, 11, 11,CURRENT_DATE() - INTERVAL 3 DAY , '13:01:59', 'Meeting', 'ONLINE', 'SELESAI'),
(12,12, 12, 12,CURRENT_DATE() - INTERVAL 3 DAY , '13:01:59', 'Meeting', 'ONLINE', 'SELESAI'),
(13,13, 13, 13,CURRENT_DATE() - INTERVAL 3 DAY , '10:02:52', 'Meeting', 'ONLINE', 'SELESAI'),
(14,14, 14, 14,CURRENT_DATE() - INTERVAL 3 DAY  , '13:03:53', 'Meeting', 'ONLINE', 'SELESAI'),
(15,15, 15, 15,CURRENT_DATE() - INTERVAL 3 DAY  , '14:04:54', 'Meeting', 'ONLINE', 'SELESAI'),
(16,16, 16, 16,CURRENT_DATE() - INTERVAL 4 DAY  , '09:05:55', 'Meeting', 'ONLINE', 'SELESAI'),
(17,17, 17, 17,CURRENT_DATE() - INTERVAL 4 DAY  , '08:06:56', 'Meeting', 'ONLINE', 'SELESAI'),
(18,18, 18, 18,CURRENT_DATE() - INTERVAL 4 DAY  , '10:07:57', 'Meeting', 'ONLINE', 'SELESAI'),
(19,19, 19, 19,CURRENT_DATE() - INTERVAL 4 DAY  , '11:08:58', 'Meeting', 'ONLINE', 'SELESAI'),
(20,20, 20, 20,CURRENT_DATE() - INTERVAL 4 DAY  , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(21,1, 20, 21,CURRENT_DATE() - INTERVAL 5 DAY  , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(22,2, 20, 22,CURRENT_DATE() - INTERVAL 5 DAY  , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(23,3, 20, 23,CURRENT_DATE() - INTERVAL 5 DAY  , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(24,4, 20, 24,CURRENT_DATE() - INTERVAL 5 DAY  , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(25,5, 20, 25,CURRENT_DATE() - INTERVAL 5 DAY  , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(26,6, 20, 26,CURRENT_DATE() - INTERVAL 6 DAY  , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(27,7, 20, 27,CURRENT_DATE() - INTERVAL 6 DAY  , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(28,8, 20, 28,CURRENT_DATE() - INTERVAL 6 DAY  , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(29,9, 20, 29,CURRENT_DATE() - INTERVAL 6 DAY  , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(30,10, 20, 30,CURRENT_DATE() - INTERVAL 6 DAY , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(31,11, 20, 31,CURRENT_DATE() - INTERVAL 7 DAY , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(32,12, 20, 32,CURRENT_DATE() - INTERVAL 7 DAY , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(33,13, 20, 33,CURRENT_DATE() - INTERVAL 7 DAY , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(34,14, 20, 34,CURRENT_DATE() - INTERVAL 7 DAY , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(35,15, 20, 35,CURRENT_DATE() - INTERVAL 7 DAY , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(36,16, 20, 36,CURRENT_DATE() - INTERVAL 8 DAY , '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(37,17, 20, 37,CURRENT_DATE() - INTERVAL 8 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(38,18, 20, 38,CURRENT_DATE() - INTERVAL 8 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(39,19, 20, 39,CURRENT_DATE() - INTERVAL 8 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(40,20, 20, 40,CURRENT_DATE() - INTERVAL 8 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(41,1, 20, 41,CURRENT_DATE() - INTERVAL 9 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(42,2, 20, 42,CURRENT_DATE() - INTERVAL 9 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(43,3, 20, 43,CURRENT_DATE() - INTERVAL 9 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(44,4, 20, 44,CURRENT_DATE() - INTERVAL 9 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(45,5, 20, 45,CURRENT_DATE() - INTERVAL 9 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(46,6, 20, 46,CURRENT_DATE() - INTERVAL 10 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(47,7, 20, 47,CURRENT_DATE() - INTERVAL 10 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(48,8, 20, 48,CURRENT_DATE() - INTERVAL 10 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(49,9, 20, 49,CURRENT_DATE() - INTERVAL 10 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(50,10, 20, 50,CURRENT_DATE() - INTERVAL 10 DAY, '14:09:59', 'Meeting', 'ONLINE', 'SELESAI'),
(51,11, 1, 51,CURRENT_DATE() - INTERVAL 11 DAY, '08:01:51', 'Meeting', 'OFFLINE', 'PENGAJUAN'),
(52,12, 2, 52,CURRENT_DATE() - INTERVAL 11 DAY, '09:02:52', 'Meeting', 'OFFLINE', 'SELESAI'),
(53,13, 3, 53,CURRENT_DATE() - INTERVAL 11 DAY, '10:03:53', 'Meeting', 'OFFLINE', 'SELESAI'),
(54,14, 4, 54,CURRENT_DATE() - INTERVAL 11 DAY, '13:04:54', 'Meeting', 'OFFLINE', 'SELESAI'),
(55,15, 5, 55,CURRENT_DATE() - INTERVAL 11 DAY, '14:05:50', 'Meeting', 'OFFLINE', 'SELESAI'),
(56,16, 6, 56,CURRENT_DATE() - INTERVAL 20 DAY, '11:06:51', 'Meeting', 'OFFLINE', 'SELESAI'),
(57,17, 7, 57,CURRENT_DATE() - INTERVAL 20 DAY, '09:07:52', 'Meeting', 'OFFLINE', 'SELESAI'),
(58,18, 8, 58,CURRENT_DATE() - INTERVAL 20 DAY, '10:08:56', 'Meeting', 'OFFLINE', 'SELESAI'),
(59,19, 9, 59,CURRENT_DATE() - INTERVAL 20 DAY, '14:09:57', 'Meeting', 'OFFLINE', 'SELESAI'),
(60,20, 20, 60,CURRENT_DATE() - INTERVAL 20 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(61,1, 20, 61,CURRENT_DATE() - INTERVAL 12 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(62,2, 20, 62,CURRENT_DATE() - INTERVAL 12 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(63,3, 20, 63,CURRENT_DATE() - INTERVAL 12 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(64,4, 20, 64,CURRENT_DATE() - INTERVAL 12 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(65,5, 20, 65,CURRENT_DATE() - INTERVAL 12 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(66,6, 20, 66,CURRENT_DATE() - INTERVAL 13 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(67,7, 20, 67,CURRENT_DATE() - INTERVAL 13 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(68,8, 20, 68,CURRENT_DATE() - INTERVAL 13 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(69,9, 20, 69,CURRENT_DATE() - INTERVAL 13 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(70,10, 20, 70,CURRENT_DATE() - INTERVAL 13 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(71,11, 20, 71,CURRENT_DATE() - INTERVAL 14 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(72,12, 20, 72,CURRENT_DATE() - INTERVAL 14 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(73,13, 20, 73,CURRENT_DATE() - INTERVAL 14 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(74,14, 20, 74,CURRENT_DATE() - INTERVAL 14 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(75,15, 20, 75,CURRENT_DATE() - INTERVAL 14 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(76,16, 20, 76,CURRENT_DATE() - INTERVAL 15 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(77,17, 20, 77,CURRENT_DATE() - INTERVAL 15 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(78,18, 20, 78,CURRENT_DATE() - INTERVAL 15 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(79,19, 20, 79,CURRENT_DATE() - INTERVAL 15 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(80,20, 20, 80,CURRENT_DATE() - INTERVAL 15 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(81,1, 20, 81,CURRENT_DATE() - INTERVAL 16 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(82,2, 20, 82,CURRENT_DATE() - INTERVAL 16 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(83,3, 20, 83,CURRENT_DATE() - INTERVAL 16 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(84,4, 20, 84,CURRENT_DATE() - INTERVAL 16 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(85,5, 20, 85,CURRENT_DATE() - INTERVAL 16 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(86,6, 20, 86,CURRENT_DATE() - INTERVAL 17 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(87,7, 20, 87,CURRENT_DATE() - INTERVAL 17 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(88,8, 20, 88,CURRENT_DATE() - INTERVAL 17 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(89,9, 20, 89,CURRENT_DATE() - INTERVAL 17 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(90,10, 20, 90,CURRENT_DATE() - INTERVAL 17 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(91,11, 20, 91,CURRENT_DATE() - INTERVAL 18 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(92,12, 20, 92,CURRENT_DATE() - INTERVAL 18 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(93,13, 20, 93,CURRENT_DATE() - INTERVAL 18 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(94,14, 20, 94,CURRENT_DATE() - INTERVAL 18 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(95,15, 20, 95,CURRENT_DATE() - INTERVAL 18 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(96,16, 20, 96,CURRENT_DATE() - INTERVAL 19 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(97,17, 20, 97,CURRENT_DATE() - INTERVAL 19 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(98,18, 20, 98,CURRENT_DATE() - INTERVAL 19 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(99,19, 20, 99,CURRENT_DATE() - INTERVAL 19 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI'),
(100,20, 20, 100,CURRENT_DATE() - INTERVAL 19 DAY, '14:09:59', 'Meeting', 'OFFLINE', 'SELESAI');


CREATE TABLE `tabel_kunjungan` (
    id INT NOT NULL AUTO_INCREMENT,
    id_pegawai INT NULL,
    nama VARCHAR(255) NOT NULL,
    nomor_telepon VARCHAR(15) NOT NULL,
    jenis_kelamin ENUM('L','P') NOT NULL,
    asal_instansi VARCHAR(50) NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    keperluan VARCHAR(255) NOT NULL,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    jenis_pertemuan ENUM('OFFLINE', 'ONLINE') NOT NULL,
    keterangan TEXT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_pegawai) REFERENCES tabel_pegawai (id) 
);

INSERT INTO `tabel_kunjungan` (
    `id_pegawai`, 
    `nama`, 
    `nomor_telepon`,
    `jenis_kelamin`, 
    `asal_instansi`, 
    `alamat`, 
    `keperluan`, 
    `tanggal`, 
    `waktu`,
    `jenis_pertemuan`,
    `keterangan` 
) VALUES
(1, 'Cemani Saragih S.Gz', '082234486701', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-1', '06:15:00', 'OFFLINE', NULL),
(2, 'Lalita Ella Andriani M.M.', '082234486702', 'L', 'PD Waluyo', 'Jr. Basuki No. 592', 'Pengantaran Berkas', '2022-06-1', '06:15:00', 'OFFLINE', NULL),
(3, 'Hadi Lazuardi S.Kom', '082234486703', 'L', 'PD Pratama', 'Ds. Babah No. 461', 'Pengantaran Berkas', '2022-06-3', '06:15:00', 'OFFLINE', NULL),
(4, 'Puspa Jane Puspasari', '082234486704', 'L', 'Jr. Sutarto No. 627', 'Jr. Sutarto No. 627', 'Pengantaran Berkas', '2022-06-2', '06:15:00', 'OFFLINE', NULL),
(5, 'Gandewa Mulyanto Suryono M.Kom.', '082234486705', 'L', 'UD Kusmawati Prasetya (Persero) Tbk', 'Dk. Abdul Muis No. 277', 'Pengantaran Berkas', '2022-06-2', '06:15:00', 'OFFLINE', NULL),
(6, 'Gadang Nardi Rajata S.Farm', '082234486706', 'L', 'CV Prakasa Aryani', 'Ds. Sugiyopranoto No. 170', 'Pengantaran Berkas', '2022-06-2', '06:15:00', 'OFFLINE', NULL),
(7, 'Kairav Kamal Siregar M.Farm', '082234486707', 'L', 'CV Zulaika Wahyudin', 'Ds. Moch. Ramdan No. 587', 'Pengantaran Berkas', '2022-06-4', '06:15:00', 'OFFLINE', NULL),
(8, 'Ilyas Firgantoro', '082234486708', 'L', 'UD Mayasari Tbk', 'Ds. Thamrin No. 466', 'Pengantaran Berkas', '2022-06-4', '06:15:00', 'OFFLINE', NULL),
(9, 'Yani Padmasari', '082234486709', 'L', 'CV Firgantoro Prasetyo', 'Jr. Kebangkitan Nasional No. 996', 'Pengantaran Berkas', '2022-06-5', '06:15:00', 'OFFLINE', NULL),
(10, 'Yani Anggraini', '082234486710', 'L', 'PD Sudiati Melani Tbk', 'Jln. Antapani Lama No. 792', 'Pengantaran Berkas', '2022-06-6', '06:15:00', 'OFFLINE', NULL),
(11, 'Hairyanto Manullang', '082234486711', 'L', 'CV Aryani Waskita (Persero) Tbk', 'Ds. Lembong No. 122', 'Pengantaran Berkas', '2022-06-5', '06:15:00', 'OFFLINE', NULL),
(12, 'Hartaka Nasim Sitompul', '082234486712', 'L', 'PD Putra Uyainah Tbk', 'Ds. Bank Dagang Negara No. 88', 'Pengantaran Berkas', '2022-06-4', '06:15:00', 'OFFLINE', NULL),
(13, 'Iriana Novitasari', '082234486713', 'L', 'PD Sihombing Siregar Tbk', 'Jr. Kyai Gede No. 223', 'Pengantaran Berkas', '2022-06-7', '06:15:00', 'OFFLINE', NULL),
(14, 'Wakiman Dabukke S.IP', '082234486714', 'L', 'UD Damanik (Persero) Tbk', 'Gg. Bakau No. 927', 'Pengantaran Berkas', '2022-06-4', '06:15:00', 'OFFLINE', NULL),
(15, 'Sarah Nurul Rahmawati S.Pd', '082234486715', 'L', 'UD Anggriawan Tbk', 'Kpg. Sentot Alibasa No. 631', 'Pengantaran Berkas', '2022-06-8', '06:15:00', 'OFFLINE', NULL),
(16, 'Wirda Usada', '082234486716', 'L', '', '', 'Pengantaran Berkas', '2022-06-8', '06:15:00', 'OFFLINE', NULL),
(17, 'Umaya Saefullah', '025123126291', 'L', 'PT Laksmiwati Budiyanto', 'Gg. Hang No. 919', 'Pengantaran Berkas', '2022-06-8', '06:15:00', 'OFFLINE', NULL),
(18, 'Jasmani Santoso', '0572045665994', 'L', 'PT Wacana Prabowo Tbk', 'Ds. Barasak No. 282', 'Pengantaran Berkas', '2022-06-9', '06:15:00', 'OFFLINE', NULL),
(19, 'Ajiono Hutasoit', '040306154741', 'L', 'PT Hidayanto (Persero) Tbk', 'Gg. Moch. Yamin No. 293', 'Pengantaran Berkas', '2022-06-10', '06:15:00', 'OFFLINE', NULL),
(20, 'Salimah Mayasari', '0546061459820', 'L', 'PD Wulandari', 'Jr. Imam No. 841', 'Pengantaran Berkas', '2022-06-11', '06:15:00', 'OFFLINE', NULL),
(1, 'Calista Hartati S.IP', '05054764102', 'L', 'UD Wastuti Novitasari Tbk', 'Psr. Babakan No. 600', 'Pengantaran Berkas', '2022-06-11', '06:15:00', 'OFFLINE', NULL),
(2, 'Jane Mulyani S.IP', '049286583576', 'L', 'Perum Kusumo Rahayu', 'Ds. Cikutra Barat No. 425', 'Pengantaran Berkas', '2022-06-11', '06:15:00', 'OFFLINE', NULL),
(3, 'Harimurti Putra M.Farm', '08450203244', 'L', 'Perum Winarno Andriani', 'Gg. Bambon No. 627', 'Pengantaran Berkas', '2022-06-11', '06:15:00', 'OFFLINE', NULL),
(4, 'Raden Zulkarnain', '089803509010', 'L', 'UD Purnawati', 'Ki. R.M. Said No. 953', 'Pengantaran Berkas', '2022-06-11', '06:15:00', 'OFFLINE', NULL),
(5, 'Zaenab Sudiati S.Sos', '026851467798', 'L', 'PD Yolanda Tbk', 'Amuntai', 'Pengantaran Berkas', '2022-06-12', '06:15:00', 'OFFLINE', NULL),
(6, 'Paris Wijayanti', '055304792986', 'L', 'CV Yuniar Safitri', 'Ki. Tambak No. 949', 'Pengantaran Berkas', '2022-06-13', '06:15:00', 'OFFLINE', NULL),
(7, 'Lalita Hastuti', '084807981467', 'L', 'CV Puspita Pertiwi Tbk', 'Jln. Ters. Buah Batu No. 734', 'Pengantaran Berkas', '2022-06-14', '06:15:00', 'OFFLINE', NULL),
(8, 'Ulva Amelia Laksita', '07849845198', 'L', 'PT Palastri Adriansyah (Persero) Tbk', 'Gg. Kalimantan No. 122', 'Pengantaran Berkas', '2022-06-15', '06:15:00', 'OFFLINE', NULL),
(9, 'Galiono Emong Tarihoran', '082234486729', 'L', 'PT Tampubolon', 'Jln. Tambak No. 187', 'Pengantaran Berkas', '2022-06-16', '06:15:00', 'OFFLINE', NULL),
(10, 'Betania Unjani Mulyani', '082234486730', 'L', 'PD Suryatmi (Persero) Tbk', 'Psr. Flora No. 591', 'Pengantaran Berkas', '2022-06-16', '06:15:00', 'OFFLINE', NULL),
(11, 'Citra Mayasari', '082234486731', 'L', 'CV Wastuti', 'Ki. Gading No. 44', 'Pengantaran Berkas', '2022-06-18', '06:15:00', 'OFFLINE', NULL),
(12, 'Jati Marbun', '082234486732', 'L', 'Perum Mustofa', 'Ds. M.T. Haryono No. 242', 'Pengantaran Berkas', '2022-06-19', '06:15:00', 'OFFLINE', NULL),
(13, 'Jaeman Saefullah', '082234486733', 'L', 'CV Ardianto', 'Jaeman Saefullah', 'Pengantaran Berkas', '2022-06-25', '06:15:00', 'OFFLINE', NULL),
(14, 'Achmad Rifai', '082250515252', 'L', 'UNISKA', 'Amuntai', 'PKL', '2022-06-25', '06:50:00', 'OFFLINE', NULL),
(15, 'Randi', '085251556677', 'L', 'Dinas Sosial', 'Amuntai', 'Meminta Data', '2022-06-04', '10:35:00', 'OFFLINE', NULL),
(16, 'Eru Setiawan', '082255778899', 'L', 'BPS HST', 'Barabai', 'Bertemu Kepala BPS HSU', '2022-06-04', '10:47:00', 'OFFLINE', NULL),
(17, 'M. Ronal', '085152223344', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-04', '10:50:00', 'OFFLINE', NULL),
(18, 'Dewangga Putra', '081213156678', 'L', 'BPS Balangan', 'Balangan', 'Meminta Data', '2022-06-04', '10:53:00', 'OFFLINE', NULL),
(19, 'Arhan Putra', '082255709877', 'L', 'STIA Amuntai', 'Amuntai', 'PKL', '2022-06-04', '10:58:00', 'OFFLINE', NULL),
(20, 'Fikri Wahyudi', '082255667798', 'L', 'STIA Amuntai', 'Amuntai', 'PKL', '2022-06-04', '10:59:00', 'OFFLINE', NULL),
(1, 'Nuril Maulida', '082215667798', 'P', 'UNLAM', 'Amuntai', 'PKL', '2022-06-10', '10:59:00', 'OFFLINE', NULL),
(2, 'Genta Puspa Rahmawati S.I.Kom', '0487 4060 020', 'L', 'Perum Nashiruddin Tbk', 'Ds. Basoka Raya No. 219', 'PKL', '2022-06-04', '11:00:00', 'OFFLINE' , NULL),
(3, 'Perum Nashiruddin Tbk', '081859830131', 'L', 'PD Jailani Utami Tbk', 'Dk. Setia Budi No. 775', 'PKL', '2022-06-04', '11:00:00', 'OFFLINE' , NULL),
(4, 'Balijan Firmansyah', '082215267798', 'L', 'CV Namaga (Persero) Tbk', 'Ki. Sam Ratulangi No. 87', 'PKL', '2022-06-04', '11:00:00', 'OFFLINE' , NULL),
(5, 'Kania Hassanah S.Farm', '09969098064', 'L', 'PT Widodo Tamba', 'Kpg. Kyai Mojo No. 638', 'PKL', '2022-06-04', '11:00:00', 'OFFLINE' , NULL),
(6, 'Siti Kuswandari', '098466637840', 'L', 'PD Putra (Persero) Tbk', 'Gg. Sumpah Pemuda No. 741', 'PKL', '2022-06-04', '11:00:00', 'OFFLINE' , NULL),
(7, 'Taufan Dwi Nainggolan', '08606328198', 'L', 'PD Tampubolon Pratiwi Tbk', 'Jr. Supono No. 831', 'PKL', '2022-06-04', '11:00:00', 'OFFLINE' , NULL),
(8, 'Jr. Supono No. 831', '08606328191', 'L', 'UD Prasetya Handayani (Persero) Tbk', 'Gg. Laswi No. 28', 'PKL', '2022-06-04', '11:00:00', 'OFFLINE' , NULL),
(9, 'Nilam Nuraini', '0244033565', 'L', 'PT Nasyidah', 'Gg. Baranang Siang No. 920', 'PKL', '2022-06-04', '11:00:00', 'OFFLINE' , NULL),
(10, 'Tina Laksita', '03578635310', 'L', 'Perum Budiman (Persero) Tbk', 'Ki. Warga No. 901', 'PKL', '2022-06-04', '11:00:00', 'OFFLINE' , NULL),
(11, 'Dalimin Haryanto', '033730513733', 'L', 'CV Ardianto', 'Gg. Kalimantan No. 260', 'PKL', '2022-06-04', '11:00:00', 'OFFLINE' , NULL),
(12, 'Olivia Pratiwi', '0225616341', 'L', 'PT Namaga', 'Psr. Pacuan Kuda No. 144', 'PKL', '2022-06-04', '11:00:00', 'OFFLINE' , NULL);


CREATE VIEW 
    `view_pegawai` 
AS 
    SELECT 
        tabel_pegawai.*,
        tabel_divisi.nama_divisi 
    FROM 
        tabel_pegawai  
    LEFT JOIN 
        tabel_divisi 
    ON 
        tabel_pegawai.id_divisi=tabel_divisi.id;

CREATE VIEW 
    `view_tamu` 
AS     
    SELECT 
        NULL AS id_tamu,
        NULL AS id_pengajuan,
        NULL AS id_ikm,
        tabel_kunjungan.id,
        tabel_kunjungan.nama,
        tabel_kunjungan.nomor_telepon,
        tabel_kunjungan.jenis_kelamin,
        tabel_kunjungan.asal_instansi,
        tabel_kunjungan.alamat,
        tabel_kunjungan.tanggal,
        tabel_kunjungan.waktu,
        tabel_kunjungan.keperluan,
        tabel_kunjungan.jenis_pertemuan,
        NULL AS status,
        tabel_pegawai.id AS id_pegawai, 
        tabel_pegawai.nama AS nama_pegawai 
    FROM 
        tabel_kunjungan  
    LEFT JOIN 
        tabel_pegawai 
    ON 
        tabel_kunjungan.id_pegawai=tabel_pegawai.id 
    UNION ALL
    SELECT 
        tabel_tamu.id AS id_tamu,
        tabel_pengajuan.id AS id_pengajuan,
        tabel_pengajuan.id_ikm,
        NULL AS id,
        tabel_tamu.nama,
        tabel_tamu.nomor_telepon,
        tabel_tamu.jenis_kelamin,
        tabel_tamu.asal_instansi,
        tabel_tamu.alamat,
        tabel_pengajuan.tanggal,
        tabel_pengajuan.waktu,
        tabel_pengajuan.keperluan,
        tabel_pengajuan.jenis_pertemuan,
        tabel_pengajuan.status,
        tabel_pegawai.id AS id_pegawai,
        tabel_pegawai.nama AS nama_pegawai 
    FROM 
        tabel_pengajuan  
    LEFT JOIN 
        tabel_pegawai 
    ON 
        tabel_pengajuan.id_pegawai=tabel_pegawai.id 
    LEFT JOIN 
        tabel_tamu 
    ON 
        tabel_pengajuan.id_tamu=tabel_tamu.id;

CREATE VIEW 
    `view_jumlah_kunjungan_per_pegawai` 
AS 
    SELECT 
        tabel_pegawai.*,
        (SELECT COUNT(id) FROM tabel_kunjungan WHERE tabel_kunjungan.id_pegawai=tabel_pegawai.id) AS jumlah_pengunjung 
    FROM 
        tabel_pegawai;

CREATE VIEW 
    `view_user` 
AS 
    SELECT 
        tabel_user.id,
        tabel_user.nama,
        tabel_user.username,
        tabel_user.password,
        tabel_user.status,
        tabel_user.gambar,
        tabel_tamu.jenis_kelamin,
        tabel_tamu.asal_instansi,
        tabel_tamu.nomor_telepon,
        tabel_tamu.alamat,
        tabel_tamu.id AS id_tamu 
    FROM 
        tabel_user 
    LEFT JOIN 
        tabel_tamu 
    ON 
        tabel_user.id=tabel_tamu.id_user;

CREATE VIEW
    view_pengajuan 
AS 
    SELECT 
        tp.id,
        tp.tanggal,
        tp.waktu,
        tt.nama,
        tt.nomor_telepon,
        tp.jenis_pertemuan,
        tt.asal_instansi,
        tpg.nama AS nama_pegawai,
        tp.keperluan  
    FROM 
        tabel_pengajuan AS tp
    INNER JOIN 
        tabel_tamu AS tt 
    ON 
        tt.id=tp.id_tamu 
    INNER JOIN 
        tabel_pegawai AS tpg 
    ON 
        tpg.id=tp.id_tamu;

CREATE VIEW
    view_ikm 
AS 
    SELECT 
        ti.id AS id_ikm,
        ti.nilai,
        tm.nama,
        tu.username,
        tm.asal_instansi,
        tm.nomor_telepon,
        tp.tanggal   
    FROM 
        tabel_ikm AS ti
    INNER JOIN 
        tabel_pengajuan AS tp 
    ON 
        ti.id=tp.id_ikm 
    INNER JOIN 
        tabel_tamu AS tm 
    ON 
        tm.id=tp.id_tamu 
    INNER JOIN 
        tabel_user AS tu 
    ON 
        tu.id=tm.id_user;

CREATE VIEW 
    `view_jumlah_jenis_kunjungan` 
AS 
    (
    SELECT 
        jenis_pertemuan,
        MONTH(tanggal) AS bulan, 
        YEAR(tanggal) AS tahun, 
        COUNT(nama) AS jumlah 
    FROM 
        view_tamu 
    WHERE 
        jenis_pertemuan='ONLINE' 
    GROUP BY 
        YEAR(tanggal), MONTH(tanggal)
    )
    UNION ALL
    (
    SELECT 
        jenis_pertemuan,
        MONTH(tanggal) AS bulan, 
        YEAR(tanggal) AS tahun, 
        COUNT(nama) AS jumlah 
    FROM 
        view_tamu 
    WHERE 
        jenis_pertemuan='OFFLINE' 
    GROUP BY 
        YEAR(tanggal), MONTH(tanggal)
    );