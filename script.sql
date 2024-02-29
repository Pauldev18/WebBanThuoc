CREATE DATABASE QuanLyBanThuoc;

USE QuanLyBanThuoc;


CREATE TABLE DanhMucThuoc (
    MaLoai INT NOT NULL auto_increment,
    TenLoai VARCHAR(100),
    MoTa VARCHAR(255),
    PRIMARY KEY (MaLoai)
);

CREATE TABLE NhaNhapKhau (
    MaNhaNhapKhau INT NOT NULL auto_increment,
    TenNhaNhapKhau VARCHAR(100),
    DiaChi VARCHAR(255),
    DienThoai VARCHAR(20),
    PRIMARY KEY (MaNhaNhapKhau)
);

CREATE TABLE NhaPhanPhoi (
    MaNhaPhanPhoi INT NOT NULL auto_increment,
    TenNhaPhanPhoi VARCHAR(100),
    DiaChi VARCHAR(255),
    DienThoai VARCHAR(20),
    PRIMARY KEY (MaNhaPhanPhoi)
);

CREATE TABLE NhaSanXuat (
    MaNhaSanXuat INT NOT NULL auto_increment,
    TenNhaSanXuat VARCHAR(100),
    DiaChi VARCHAR(255),
    DienThoai VARCHAR(20),
    PRIMARY KEY (MaNhaSanXuat)
);
CREATE TABLE KhachHang (
    MaKhachHang INT NOT NULL auto_increment,
    TenKhachHang VARCHAR(100),
    DiaChi VARCHAR(255),
    DienThoai VARCHAR(20),
    Email VARCHAR(100),
    GhiChu TEXT,
    PRIMARY KEY (MaKhachHang)
);

CREATE TABLE Thuoc (
    MaThuoc INT NOT NULL auto_increment,
    TenThuoc VARCHAR(100),
    MaLoai INT,
    MaNhaSanXuat INT,
    MaNhaNhapKhau INT,
    MaNhaPhanPhoi INT,
    MoTa VARCHAR(255),
    SoLuongTonKho INT,
    Anh VARCHAR(255),
    GiaTien DECIMAL(10, 3),
    PRIMARY KEY (MaThuoc),
    FOREIGN KEY (MaLoai) REFERENCES DanhMucThuoc(MaLoai),
    FOREIGN KEY (MaNhaSanXuat) REFERENCES NhaSanXuat(MaNhaSanXuat),
    FOREIGN KEY (MaNhaNhapKhau) REFERENCES NhaNhapKhau(MaNhaNhapKhau),
    FOREIGN KEY (MaNhaPhanPhoi) REFERENCES NhaPhanPhoi(MaNhaPhanPhoi)
);
CREATE TABLE NguoiDung (
    MaNguoiDung INT NOT NULL auto_increment,
    TenNguoiDung VARCHAR(100),
    MatKhau VARCHAR(50),
    Email VARCHAR(100),
    LoaiNguoiDung VARCHAR(50),
    PRIMARY KEY (MaNguoiDung)
);



CREATE TABLE HoaDonBanThuoc (
    MaHoaDon INT NOT NULL auto_increment,
    MaKhachHang INT,
    MaNguoiDung INT,
    NgayTaoHoaDon DATETIME,
    PRIMARY KEY (MaHoaDon),
    FOREIGN KEY (MaKhachHang) REFERENCES KhachHang(MaKhachHang),
    FOREIGN KEY (MaNguoiDung) REFERENCES NguoiDung(MaNguoiDung)
);

CREATE TABLE ChiTietHoaDon (
    MaChiTietHoaDon INT NOT NULL auto_increment,
    MaHoaDon INT,
    MaThuoc INT,
    SoLuong INT,
    DonGia DECIMAL(10, 3),
    PRIMARY KEY (MaChiTietHoaDon),
    FOREIGN KEY (MaHoaDon) REFERENCES HoaDonBanThuoc(MaHoaDon),
    FOREIGN KEY (MaThuoc) REFERENCES Thuoc(MaThuoc)
);