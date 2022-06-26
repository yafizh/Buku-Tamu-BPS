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
('Aisyah Wira','aisyah','aisyah','TAMU', NULL);


CREATE TABLE `tabel_tamu` (
    id INT NOT NULL AUTO_INCREMENT,
    id_user INT NULL,
    nama VARCHAR(255) NOT NULL,
    nomor_telepon VARCHAR(15) NOT NULL,
    jenis_kelamin ENUM('L','P') NULL,
    asal_instansi VARCHAR(50) NOT NULL,
    alamat VARCHAR(255) NULL,
    status ENUM('AKTIF', 'MENDAFTAR', 'LUPA PASSWORD') NOT NULL,
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
    status  
) VALUES 
(3, 'Nursahid Arya Suyudi', '0851898890', 'L', 'UNISKA', 'Banjarbaru','AKTIF'),
(4, 'Rania Nor Aida', '0826603078', 'P', 'UNISKA', 'Banjarbaru','AKTIF'),
(5, 'Yuval Noah Harari', '08750801323', 'L', 'Snarky Square', 'Amerika','AKTIF'),
(6, 'Mark Manson', '086125847637', 'L', 'Snarky Square', 'Amerika','AKTIF'),
(7, 'Rustam Agus', '08914581146', 'L', 'UNLAM', 'Banjarmasin','AKTIF'),
(8, 'Budi Darma', '08595775305', 'L', 'UNLAM', 'Banjarmasin','AKTIF'),
(9, 'Hidayat Widya', '0892556772338', 'L', 'STIMIK', 'Banjarmasin','AKTIF'),
(10, 'Faisal Imam', '0880566688', 'L', 'STIMIK', 'Banjarmasin','AKTIF'),
(11, 'Jamaluddin Firdaus', '0832800013778', 'L', 'Universitas Indonesia', 'Jakarta','AKTIF'),
(12, 'Wati Nur', '081811885506', 'P', 'Universitas Indonesia', 'Jakarta','AKTIF'),
(13, 'Aminah Jamaluddin', '0858091504175', 'P', 'ITB', 'Bandung','AKTIF'),
(14, 'Putri Latifah', '082998727680', 'P', 'ITB', 'Bandung','AKTIF'),
(15, 'Aditya Rahma', '08816947480', 'L', 'UGM', 'Yogyakarta','AKTIF'),
(16, 'Buana Jamaluddin', '089838015337', 'L', 'UGM', 'Yogyakarta','AKTIF'),
(17, 'Abdullah Burhan', '0886245354614', 'L', 'BPTP', 'Jakarta','AKTIF'),
(18, 'Krisna Sulaiman', '0871124394760', 'L', 'BPTP', 'Jakarta','AKTIF'),
(19, 'Zakaria Jamilah', '0897646254228', 'P', 'SMK 1 Martapura', 'Martapura','AKTIF'),
(20, 'Tri Yuda', '08704173011', 'L', 'SMK 1 Martapura', 'Martapura','AKTIF'),
(21, 'Nirmala Aditya', '082704111439', 'L', 'SMADA', 'Banjarbaru','AKTIF'),
(22, 'Aisyah Wira', '0895754660317', 'P', 'SMADA', 'Banjarbaru','AKTIF');

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
    `id_pegawai`, 
    `id_tamu`, 
    `id_ikm`, 
    `tanggal`, 
    `waktu`, 
    `keperluan`, 
    `jenis_pertemuan`, 
    `status` 
) VALUES
(4, 1, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'PENGAJUAN'),
(4, 2, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 3, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 4, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 5, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 6, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 7, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 8, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 9, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 10, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 12, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 13, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 14, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 15, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 16, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 17, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 18, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 19, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI'),
(4, 20, NULL, CURRENT_DATE(), CURRENT_TIME(), 'Meeting', 'ONLINE', 'SELESAI');


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
(4, 'Nadiya1', '082234486701', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-1', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya2', '082234486702', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-1', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya3', '082234486703', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-3', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya4', '082234486704', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-2', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya5', '082234486705', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-2', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya6', '082234486706', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-2', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya7', '082234486707', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-4', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya8', '082234486708', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-4', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya9', '082234486709', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-5', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya10', '082234486710', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-6', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya11', '082234486711', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-5', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya12', '082234486712', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-4', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya13', '082234486713', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-7', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya14', '082234486714', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-4', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya15', '082234486715', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-8', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya16', '082234486716', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-8', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya17', '082234486717', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-8', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya18', '082234486718', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-9', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya19', '082234486719', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-10', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya20', '082234486720', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-11', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya21', '082234486721', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-11', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya22', '082234486722', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-11', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya23', '082234486723', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-11', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya24', '082234486724', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-11', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya25', '082234486725', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-12', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya26', '082234486726', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-13', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya27', '082234486727', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-14', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya28', '082234486728', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-15', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya29', '082234486729', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-16', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya30', '082234486730', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-16', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya31', '082234486731', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-18', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya32', '082234486732', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-19', '06:15:00', 'OFFLINE', NULL),
(4, 'Nadiya33', '082234486733', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-25', '06:15:00', 'OFFLINE', NULL),
(12, 'Achmad Rifai', '082250515252', 'L', 'UNISKA', 'Amuntai', 'PKL', '2022-06-25', '06:50:00', 'OFFLINE', NULL),
(4, 'Randi', '085251556677', 'L', 'Dinas Sosial', 'Amuntai', 'Meminta Data', '2022-06-04', '10:35:00', 'OFFLINE', NULL),
(1, 'Eru Setiawan', '082255778899', 'L', 'BPS HST', 'Barabai', 'Bertemu Kepala BPS HSU', '2022-06-04', '10:47:00', 'OFFLINE', NULL),
(11, 'M. Ronal', '085152223344', 'L', 'Dinas Sosial', 'Amuntai', 'Pengantaran Berkas', '2022-06-04', '10:50:00', 'OFFLINE', NULL),
(2, 'Dewangga Putra', '081213156678', 'L', 'BPS Balangan', 'Balangan', 'Meminta Data', '2022-06-04', '10:53:00', 'OFFLINE', NULL),
(12, 'Arhan Putra', '082255709877', 'L', 'STIA Amuntai', 'Amuntai', 'PKL', '2022-06-04', '10:58:00', 'OFFLINE', NULL),
(12, 'Fikri Wahyudi', '082255667798', 'L', 'STIA Amuntai', 'Amuntai', 'PKL', '2022-06-04', '10:59:00', 'OFFLINE', NULL),
(5, 'Nuril Maulida', '082215667798', 'P', 'UNLAM', 'Amuntai', 'PKL', '2022-06-10', '10:59:00', 'OFFLINE', NULL),
(12, 'Ananda Safitri', '085657988988', 'L', 'STIA Amuntai', 'Amuntai', 'PKL', '2022-06-04', '11:00:00', 'OFFLINE' , NULL);


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