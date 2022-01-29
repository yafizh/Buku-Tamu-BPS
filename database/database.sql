CREATE DATABASE `db_buku_tamu_bps`;
USE `db_buku_tamu_bps`;

CREATE TABLE `tabel_user` (
    id INT NOT NULL AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    status ENUM('ADMIN','PETUGAS') NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO `tabel_user` (
    nama,
    username,
    password,
    status 
) VALUES 
('admin','admin','admin','ADMIN'),
('Andry','andry','andry','PETUGAS');


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
('SEKSI IPDS', 'Divisi Bagian SEKSI IPDS');

CREATE TABLE `tabel_pegawai` (
    id INT NOT NULL AUTO_INCREMENT,
    id_divisi INT NOT NULL,
    nama VARCHAR(255) NOT NULL,
    nip VARCHAR(255) NOT NULL,
    jenis_kelamin ENUM('L','P') NOT NULL,
    nomor_telepon VARCHAR(15) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_divisi) REFERENCES tabel_divisi (id)
);

INSERT INTO `tabel_pegawai` (
    id_divisi,
    nama,
    nip,
    jenis_kelamin,
    nomor_telepon
) VALUES 
(1,'Sukma Handayani, M.Si', '197503111996122000', 'P', '098732135523'),
(2,'Arfiani, S.Si', '198112042011011000', 'L', '098732135524'),
(3,'M. Agus Suharyanto, A.Md', '198810052011011000', 'L', '098732135522'),
(4,'Noor Hamimah, SE', '198607212011012000', 'P', '098732135521'),
(5,'Muhammad Taufik Hidayat, SST', '198803082012111000', 'L', '098732135527'),
(6,'Hanif Yontar Rahma, S.Si', '199412192019032000', 'L', '098732135529'),
(7,'Muhammad Adi Wijaya Kesuma, SST', '199412212018021000', 'L', '098732135528'),
(1,'Masdani, SE', '197110181993121000', 'L', '098732135533'),
(1,'Ulya Zahrotun Niswah, SST', '199407242018022000', 'P', '098732135534'),
(2,'Anggita Silmi Nabilah, SST', '199507062018022000', 'P', '098732135531'),
(3,'Muhammad Imam Sholihin, S.Tr.Stat.', '199711142021041000', 'L', '098732135532'),
(4,'Eko Wahyu Lestari, SST', '199403272017012000', 'L', '098732135535'),
(5,'Oktaviani, S.Tr.Stat.', '199610122019012000', 'P', '098732135536'),
(6,'Rusni', '196905102006041000', 'L', '098732135537'),
(7,'Taufik Ilhakim', '196807052007011000', 'L', '098732135538'),
(1,'Abu Hurairah', '198108232002121000', 'P', '098732135539'),
(2,'Azehar, SE.', '196902091993121000', 'P', '098732135599'),
(3,'Agusriadi', '197708062007101000', 'L', '098732135588'),
(4,'Nabhani', '198010172007101000', 'P', '098732135566'),
(5,'Herliani', '197504112009012000', 'P', '098732135511');

CREATE TABLE `tabel_tamu` (
    id INT NOT NULL AUTO_INCREMENT,
    id_pegawai INT NULL,
    id_divisi INT NULL,
    nama VARCHAR(255) NOT NULL,
    nomor_telepon VARCHAR(15) NOT NULL,
    jenis_kelamin ENUM('L','P') NOT NULL,
    asal_instansi VARCHAR(50) NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    keperluan VARCHAR(255) NOT NULL,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_pegawai) REFERENCES tabel_pegawai (id),
    FOREIGN KEY (id_divisi) REFERENCES tabel_divisi (id)
);



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
        tabel_tamu.*,
        tabel_divisi.nama_divisi, 
        tabel_pegawai.nama AS nama_pegawai 
    FROM 
        tabel_tamu  
    LEFT JOIN 
        tabel_divisi 
    ON 
        tabel_tamu.id_divisi=tabel_divisi.id 
    LEFT JOIN 
        tabel_pegawai 
    ON 
        tabel_tamu.id_pegawai=tabel_pegawai.id;

        
CREATE VIEW 
    `view_jumlah_kunjungan_divisi` 
AS 
    SELECT 
        tabel_divisi.*,
        (SELECT COUNT(id) FROM tabel_tamu WHERE tabel_tamu.id_divisi=tabel_divisi.id) AS jumlah_kunjungan 
    FROM 
        tabel_divisi;

CREATE VIEW 
    `view_jumlah_kunjungan_per_pegawai` 
AS 
    SELECT 
        tabel_pegawai.*,
        (SELECT COUNT(id) FROM tabel_tamu WHERE tabel_tamu.id_pegawai=tabel_pegawai.id) AS jumlah_pengunjung 
    FROM 
        tabel_pegawai;
        