-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2023 lúc 07:19 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_mvc_update`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(200) NOT NULL,
  `adminEmail` varchar(200) NOT NULL,
  `adminUser` varchar(200) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(2, 'Lê Anh Quân', 'batpto@gmail.com', 'quanadmin', '202cb962ac59075b964b07152d234b70', 0),
(3, 'Nguyễn Văn B', 'nguyenvanb@gmail.com', 'Badmin', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_hdn`
--

CREATE TABLE `chitiet_hdn` (
  `id_sp` int(10) UNSIGNED NOT NULL,
  `id_hdn` int(10) UNSIGNED NOT NULL,
  `noidung` text NOT NULL,
  `ghichu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_km`
--

CREATE TABLE `chitiet_km` (
  `id_sp` int(10) UNSIGNED NOT NULL,
  `id_khuyenmai` int(10) UNSIGNED NOT NULL,
  `chitiet_km` text NOT NULL,
  `ghichu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongia`
--

CREATE TABLE `dongia` (
  `id_dongia` int(11) UNSIGNED NOT NULL,
  `ngaybatdau` varchar(25) NOT NULL,
  `ngayketthuc` varchar(25) NOT NULL,
  `gianhap` varchar(25) NOT NULL,
  `giaxuat` varchar(25) NOT NULL,
  `ctkm` varchar(200) NOT NULL,
  `nguoilap` varchar(100) NOT NULL,
  `ghichu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dongia`
--

INSERT INTO `dongia` (`id_dongia`, `ngaybatdau`, `ngayketthuc`, `gianhap`, `giaxuat`, `ctkm`, `nguoilap`, `ghichu`) VALUES
(7, '01/11/2023', '01/01/2024', '115200', '115200', 'Không có', 'Trần Văn A', 'Không có'),
(8, '14/10/2023', '14/12/2023', '67500', '67500', 'Không có', 'Lê Văn B', 'Không có'),
(9, '26/09/2023', '10/10/2023', '99000', '99000', 'Không có', 'Nguyễn Văn C', 'Không có'),
(10, '02/09/2023', '02/12/2023', '167000', '167000', 'Không có', 'Trần Thị D', 'Không có'),
(11, '11/11/2023', '11/01/2024', '108000', '108000', 'Không có', 'Lê Anh Quân', 'Không có'),
(12, '18/10/2023', '18/02/2024', '115320', '115320', 'Không có', 'Hồ Văn A', 'Không có'),
(13, '18/07/2023', '18/12/2023', '74800', '74800', 'Không có', 'Tạ Thị B', 'Không có'),
(14, '03/12/2023', '03/04/2023', '69300', '69300', 'Không có', 'Trần Văn A', 'Không có'),
(15, '01/10/2023', '12/12/2023', '71250', '71250', 'Không có', 'Nguyễn Văn C', 'Không có'),
(16, '15/07/2023', '02/12/2023', '82500', '82500', 'Không có', 'Lê Văn B', 'Không có'),
(17, '15/12/2023', '30/12/2023', '68000', '68000', 'Không có', 'Lê Văn B', 'Không có'),
(18, '06/06/2023', '10/02/2023', '152100', '152100', 'Không có', 'Trần Thị D', 'Không có'),
(19, '24/03/2023', '24/02/2024', '153000', '153000', 'Không có', 'Trần Thị D', 'Không có'),
(20, '20/12/2022', '30/12/2023', '89100', '89100', 'Không có', 'Hồ Văn C', 'Không có'),
(21, '08/10/2023', '13/02/2024', '170100', '170100', 'Không có', 'Hồ Văn C', 'Không có'),
(22, '01/04/2023', '01/02/2024', '15300', '15300', 'Không có', 'Hồ Văn C', 'Không có'),
(23, '20/12/2022', '30/12/2023', '140000', '140000', 'Không có', 'Lê Anh Quân', 'Không có'),
(24, '27/06/2023', '27/06/2024', '112000', '112000', 'Không có', 'Lê Anh Quân', 'Không có'),
(25, '11/12/2023', '11/12/2024', '126400', '126400', 'Không có', 'Lê Anh Quân', 'Không có');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonnhap`
--

CREATE TABLE `hoadonnhap` (
  `id_hdn` int(11) UNSIGNED NOT NULL,
  `id_ncc` int(10) UNSIGNED NOT NULL,
  `id_nhanvien` int(10) UNSIGNED NOT NULL,
  `ngaylap_hdn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonxuat`
--

CREATE TABLE `hoadonxuat` (
  `id_hdx` int(11) UNSIGNED NOT NULL,
  `id_sp` int(11) UNSIGNED NOT NULL,
  `ten_sp` varchar(200) NOT NULL,
  `id_khachhang` int(10) UNSIGNED NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` varchar(200) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `ngaylap_hdx` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonxuat`
--

INSERT INTO `hoadonxuat` (`id_hdx`, `id_sp`, `ten_sp`, `id_khachhang`, `soluong`, `gia`, `hinhanh`, `ngaylap_hdx`, `status`) VALUES
(15, 4, 'Cậu Nhóc Gặt Gió', 4, 1, '115200', '3cf69077c4.jpg', '2023-12-08 01:26:39', 1),
(16, 9, 'Tư duy chiến lược', 4, 1, '115320', '6aae247a7f.jpg', '2023-12-08 01:27:25', 1),
(22, 22, 'Gánh Gánh Gồng Gồng', 5, 1, '112000', '4360aeb2ea.jpg', '2023-12-08 05:42:58', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_khachhang` int(11) UNSIGNED NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `diachi` varchar(250) NOT NULL,
  `sdt` varchar(30) NOT NULL,
  `thanhpho` varchar(200) NOT NULL,
  `quocgia` varchar(200) NOT NULL,
  `zipcode` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_khachhang`, `tenkhachhang`, `diachi`, `sdt`, `thanhpho`, `quocgia`, `zipcode`, `email`, `password`) VALUES
(4, 'Lê Anh Quân', '1387  Huỳnh Tấn Phát ', '0703139865', 'TP. Hồ Chí Minh ', 'Việt Nam ', '123', 'batpto@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'Lê Trung Kiên ', '117 Lý Phục Man Q7 TPHCM ', '0903045566 ', 'TP. Hồ Chí Minh ', 'Việt Nam ', '123 ', 'kienle19092007@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Đoàn Quốc Huy', '138/13  Nguyễn Tất Thành', '0322545683', 'Cà Mau', 'Việt Nam', '123', 'thunghiem0105@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id_khuyenmai` int(11) UNSIGNED NOT NULL,
  `tenkhuyenmai` varchar(25) NOT NULL,
  `hinhanh_km` varchar(200) NOT NULL,
  `ngaybatdau` varchar(200) NOT NULL,
  `ngayketthuc` varchar(200) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id_khuyenmai`, `tenkhuyenmai`, `hinhanh_km`, `ngaybatdau`, `ngayketthuc`, `type`) VALUES
(12, 'Mua Sắm Thả Ga - Nhận Quà', '6f38d2333d.jpg', '10/01/2023', '10/05/2023', 1),
(13, 'Year Anh Sale', '32d0e804c4.png', '15/12/2023', '30/12/2023', 1),
(14, 'Chợ Phiên Dọn Kho', 'e4136fb1f0.jpg', '14/10/2023', '05/12/2023', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id_loaisanpham` int(11) UNSIGNED NOT NULL,
  `ten_loaisanpham` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id_loaisanpham`, `ten_loaisanpham`) VALUES
(5, 'Sách kinh tế'),
(6, 'Sách văn học'),
(7, 'Sách thiếu nhi'),
(8, 'Sách ngoại ngữ'),
(9, 'Kỹ năng sống'),
(10, 'Sách giáo khoa - tham khảo'),
(11, 'Tiểu sử - hồi ký');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitintuc`
--

CREATE TABLE `loaitintuc` (
  `id_loaitintuc` int(11) UNSIGNED NOT NULL,
  `tenloaitt` varchar(150) NOT NULL,
  `mota` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitintuc`
--

INSERT INTO `loaitintuc` (`id_loaitintuc`, `tenloaitt`, `mota`, `status`) VALUES
(1, 'Tin tác giả', 'Cập nhật thông tin về tác giả hằng ngày', 0),
(3, 'Tin sách', 'Cập nhật thông tin về sách hằng ngày', 0),
(4, 'Tin nhà xuất bản', 'Cập nhật thông tin về nhà xuất bản hằng ngày', 0),
(5, 'Tin độc giả', 'Cập nhật thông tin về độc giả hằng ngày', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id_ncc` int(11) UNSIGNED NOT NULL,
  `tenncc` varchar(200) NOT NULL,
  `tennguoidaidien` varchar(200) NOT NULL,
  `sdt` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `diachi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id_ncc`, `tenncc`, `tennguoidaidien`, `sdt`, `email`, `diachi`) VALUES
(2, 'Tân Việt', 'Nguyễn Thị A', '0812757799', 'online@tanvietbooks.com.vn', '449 Bạch Mai, Phường Trương Định, Quận Hai Bà Trưng, Hà Nội'),
(3, 'IPM', 'Trần Văn A', '0328383979', 'online.ipmvn@gmail.com', ' Số 110 Nguyễn Ngọc Nại, Khương Mai, Thanh Xuân, Hà Nội'),
(5, 'Nhã Nam', 'Nguyễn Văn B', '0903244248', 'info@nhanam.vn', 'Số 59, Đỗ Quang, Trung Hoà, Cầu Giấy, Hà Nội.'),
(6, 'Kim Đồng', 'Hồ Văn A', '(024)39434730', 'info@nxbkimdong.com.vn', '55 Quang Trung, Hà Nội, Việt Nam'),
(7, 'Đinh Tị', 'Lê Văn A', '0247.309.3388', 'contacts@dinhtibooks.vn', 'Khu 12 Ngõ 13 Lĩnh Nam P. Mai Động Q. Hoàng Mai - TP. Hà Nội'),
(8, 'Đông A', 'Lê Văn B', '02438569367', 'contact@sachdonga.vn', '209 Võ Văn Tần, P.5, Q.3, Tp. Hồ Chí Minh'),
(9, 'Thái Hà', 'Nguyễn Văn C', '02822532641', 'Sachthaiha@thaihabooks.com', '23 Tân Thới Nhất 6, P. Tân Thới Nhất, Q. 12, TP. HCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id_nhanvien` int(11) UNSIGNED NOT NULL,
  `ten_nhanvien` varchar(200) NOT NULL,
  `ngaysinh` varchar(100) NOT NULL,
  `sdt` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `diachi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id_nhanvien`, `ten_nhanvien`, `ngaysinh`, `sdt`, `email`, `diachi`) VALUES
(2, 'Lê Văn D', '03/12/2000', '0708921444', 'levanc2000@gmail.com', '115 Trần Văn Trà Quận 7 TPHCM'),
(4, 'Lê Anh A', '20/10/2001', '0902555666', 'anhA20102001@gmail.com', '1307 Huỳnh Tấn Phát Q7 TPHCM'),
(5, 'Trần Thị N', '04/09/1999', '0322567536', 'tranthiN@gmail.com', '117 Lý Phục Man Q7 TPHCM'),
(6, 'Nguyễn Anh B', '17/08/1995', '0903435687', 'nguyenB1995@gmail.com', '15 Tôn Thất Thuyết Q4 TPHCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudh`
--

CREATE TABLE `phieudh` (
  `id_pdh` int(11) UNSIGNED NOT NULL,
  `id_sp` int(10) UNSIGNED NOT NULL,
  `sId` varchar(255) NOT NULL,
  `ten_sp` varchar(200) NOT NULL,
  `gia` varchar(200) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) UNSIGNED NOT NULL,
  `ten_sp` varchar(200) NOT NULL,
  `id_dongia` int(11) UNSIGNED NOT NULL,
  `id_loaisanpham` int(10) UNSIGNED NOT NULL,
  `tacgia` varchar(200) NOT NULL,
  `nhaxuatban` varchar(200) NOT NULL,
  `mota_sp` text NOT NULL,
  `gia` varchar(200) NOT NULL,
  `soluong` int(11) NOT NULL,
  `product_type` int(11) NOT NULL,
  `hinhanh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten_sp`, `id_dongia`, `id_loaisanpham`, `tacgia`, `nhaxuatban`, `mota_sp`, `gia`, `soluong`, `product_type`, `hinhanh`) VALUES
(4, 'Cậu Nhóc Gặt Gió', 7, 6, 'William Kamkwamba, Bryan', 'Thanh Niên', 'Cậu nhóc gặt gió là một câu chuyện có thật đáng chú ý về sự sáng tạo của con người cũng như sức mạnh của niềm tin để vượt qua nghịch cảnh. Cuốn sách này sẽ truyền cảm hứng cho bất cứ ai còn nghi ngờ về sức mạnh quyết tâm của một cá nhân dám đứng lên để thay đổi và cải thiện cuộc sống của cả một cộng đồng.', '115200', 80, 1, '3cf69077c4.jpg'),
(5, 'Nơi Không Có Tuyết', 8, 11, 'Huỳnh Trọng Khang', 'NXB Trẻ', 'Nơi không có tuyết - tức là nói về miền nhiệt đới ẩm ương oi nồng. Chốn đó ngày xưa có cậu nhóc hết sức tò mò với cỗ máy lạ lùng có tên “tủ lạnh”, đôi buổi trưa hè lại rón rén mở cánh cửa ấy ra để thỏa niềm đam mê xem “tuyết” ra đời. Nhiều năm sau nhóc con ấy lớn khôn, dốc lòng học tập, dành dụm tiền tự lắp ráp cho mình chiếc phi cơ hòng chinh phục đỉnh tuyết băng vĩnh cửu Hy Mã Lạp Sơn. Giữa đêm trường bão tuyết, số mệnh đã run rủi cho “phi công” ấy mối duyên lạ kỳ với một bông tuyết xa xưa, bé tí ti thôi, nhưng là chứng nhân cho bao nỗi buồn thương của muôn người muôn vật trên Trái Đất tự xa xôi ngút ngàn. Một cuộc hàn huyên bắt đầu...\r\n\r\nCuốn sách vốn thuật về xứ tuyết giá lạnh, nhưng lại nồng ấm như cổ tích mẹ kể, là đại diện đẹp đẽ bước ra từ khung trời mơ mộng trong mắt em thơ, đồng thời cũng là áng thơ tinh tế dành tặng cho những điều vốn nhỏ nhoi trong mắt người lớn.', '67500', 80, 1, '2c4a096c47.jpg'),
(6, 'Có Chú Robot Ở Trong Vườn', 9, 6, 'Deborah Install', 'Kim đồng', 'Việc anh chàng Ben làm giỏi nhất là “thất bại”. Anh thất bại trong mọi thứ. Thế rồi ngày nọ, anh tìm thấy một chú robot bị hỏng tên Tang trong vườn nhà. Và Tang cần Ben.\r\n\r\nTang biết đồng cảm, yêu thương, đôi khi cứng đầu và nổi giận. Tang tuyệt vọng và cần được sửa chữa. Có lẽ Ben cũng thế. Trong hành trình bôn ba khắp thế giới, họ khám phá ra tình bạn, sự chữa lành có thể nảy sinh dưới những hoàn cảnh kì lạ nhất, và ý nghĩa thực sự của việc trưởng thành.\r\n\r\nHài hước, cảm động, duyên dáng và một chút khác thường, Có chú robot ở trong vườn là cuốn sách hoàn hảo cho bất kì ai từng gặp khó khăn trong việc kết nối với thế giới.\r\n\r\n“Đây là một chú robot không hiểu khái niệm “tại sao”, cố gắng lắm cũng chưa hiểu được ý nghĩa của “động lực”. Chú chưa bao giờ được dạy về sự tha thứ, nên chẳng biết mình từng làm thế chưa.\r\n\r\nThế nhưng, trong tất cả những hỉ nộ ái ố phức tạp của con người, chú dường như hiểu được về tình yêu.”\r\n\r\n“Một câu chuyện sáng tạo và vô cùng dễ thương, ấm áp.”', '99000', 80, 1, '3097cd9bb9.jpg'),
(7, 'Bờ Vai Nghiêng Nắng', 11, 11, 'Từ Kế Tường', 'Văn học', 'Những tác phẩm viết cho tuổi mới lớn của Từ Kế Tường là những tác phẩm không phải chỉ của một thời. Đó là tình bạn, tình yêu của tuổi thanh xuân mới chớm nở; đó là không khí học đường với thầy cô, trường lớp; đó là những niềm vui, nỗi buồn của những người đang đứng trước ngưỡng cửa cuộc đời; đó là tình cảm gia đình, người thân… Độc giả của Từ Kế Tường do vậy là độc giả của nhiều thế hệ. Họ là những độc giả nhỏ tuổi cùng thời với Từ Kế Tường khi nhà văn mới bắt đầu sáng tác, nay đã lên tuổi ông bà. Họ là những người đã đọc tác phẩm Từ Kế Tường qua những lần tái bản sau năm 1975, nay đã ở tuổi phụ huynh. Và cùng với sự ra mắt của tủ sách Tuổi Ngọc, tái bản lại những tác phẩm của nhà văn, thì Từ Kế Tường lại tiếp tục có những độc giả trẻ trung thuộc thế hệ mới.\r\n\r\nVà như thế, mong rằng nhà văn Từ Kế Tường lại thêm một lần mang những tác phẩm quay lại văn đàn với những thành công mới trong sự đón nhận của độc giả nhiểu thế hệ.', '108000', 75, 1, '02f8e10ef2.jpg'),
(8, 'Nghệ Thuật Tư Duy Chiến Lược', 10, 5, 'Avinash K Dixit, Barry J Nale', 'NXB Lao Động', 'Có phải các nhà đầu tư vĩ đại có thể nhìn thấy những điều mà hầu hết mọi người bỏ lỡ?\r\n\r\nCó phải các tay chơi poker sở hữu những tài năng mà chúng ta không có?\r\n\r\nCâu trả lời cho tất cả những câu hỏi trên là \"Không hề!\" Họ hoàn toàn \"bình thường\", như bạn, như tôi hay bất cứ ai ngoài kia.\r\n\r\nThông qua Nghệ thuật tư duy chiến lược, bạn sẽ thấy \"những người thành công\" trong mọi lĩnh vực từ giải trí đến chính trị, từ giáo dục đến thể thao, v.v... đạt thành công vang dội là nhờ luôn nắm vững lý thuyết trò chơi hay nghệ thuật tư duy chiến lược, với khả năng dự đoán những động thái tiếp theo của người cùng chơi, trong khi biết rõ rằng đối thủ đang cố gắng làm điều tương tự với mình.', '167000', 80, 1, '48e2ceeb65.jpg'),
(9, 'Tư duy chiến lược', 12, 11, 'Avinash K. Dixit, Barry J. Nal', 'Dân Trí', 'Tư duy chiến lược là nghệ thuật vượt qua đối thủ cạnh tranh, với nhận thức rằng họ cũng đang cố gắng vượt qua mình. Mỗi chúng ta đều phải áp dụng tư duy chiến lược, theo cách này hay cách khác, tại nơi làm việc và ngay cả ở nhà. Thương gia và các doanh nghiệp sử dụng các chiến lược cạnh tranh phù hợp để tồn tại. Những huấn luyện viên bóng đá vạch ra các kế hoạch chiến lược để các cầu thủ tiến hành trên sân bóng. Các bậc cha mẹ muốn giáo dục con cái cũng phải trở thành những nhà chiến lược nghiệp dư.\r\n\r\nTư duy chiến lược đúng đắn trong nhiều hoàn cảnh khác nhau vẫn luôn là một nghệ thuật. Nhưng nền tảng của nó được xây dựng trên một số nguyên tắc cơ bản – một khoa học về chiến lược. Sau khi đọc cuốn sách này, người đọc từ các lĩnh vực nghề nghiệp khác nhau có thể trở thành những nhà chiến lược giỏi hơn nếu họ biết được những nguyên tắc này.\r\n\r\nTư duy chiến lược đã mang đến cho nhiều người một cách nhìn mới về mọi sự kiện, hiện tượng trong xã hội, kể từ văn học, phim ảnh và thể thao cho đến các sự kiện chính trị, lịch sử.', '115320', 95, 1, '6aae247a7f.jpg'),
(10, ' Bẻ Khóa Bí Mật Triệu Phú', 13, 11, 'Thomas J Stanley, William D', 'NXB Tổng Hợp TPHCM', 'Cuốn sách bán chạy 3 năm liền của The New Your Times và có mặt trong danh sách bán chạy của The Wall Street Journal, Business Week, USA Today, Los Angeles Times . Đã hơn hai mươi năm kể từ khi hai tác giả Thomas J. Stanley và William D. Danko bắt đầu nghiên cứu về phương thức làm giàu.\r\n\r\nBan đầu, họ chỉ thực hiện nghiên cứu đơn thuần, tức là khảo sát những người sống ở các khu vực thượng lưu trên khắp nước Mỹ. Nhưng rồi họ đã phát hiện một điều kỳ lạ: Nhiều người sống trong những ngôi nhà sang trọng và lái những chiếc xe đắt tiền thực ra lại không quá giàu có! Sự thật này kéo theo một sự thật còn kỳ lạ hơn: Nhiều người cực kỳ giàu có lại không sống ở những khu vực thượng lưu như vậy!\r\n\r\nPhát hiện nho nhỏ ấy đã thay đổi cuộc sống của họ, khiến một người trong nhóm nghiên cứu là Tom Stanley quyết định gác lại sự nghiệp học thuật để cho ra đời ba cuốn sách về hoạt động marketing hướng đến tầng lớp giàu có ở Hoa Kỳ. Tom trở thành chuyên gia cố vấn cho các tập đoàn chuyên cung ứng hàng hóa và dịch vụ cho tầng lớp thượng lưu, đồng thời còn tiến hành các chương trình nghiên cứu về tầng lớp giàu có cho 7 trong số 10 tập đoàn cung cấp dịch vụ tài chính hàng đầu ở Mỹ.\r\n\r\nRiêng Thomas J. Stanley và William D. Danko cũng đã tổ chức hàng trăm cuộc hội thảo về chủ đề nhắm đến sự giàu có. Tại sao lại có nhiều người quan tâm tới những buổi nói chuyện của họ đến vậy? Bởi vì họ đã khám phá ra ai mới thực sự là người giàu có. Và quan trọng hơn cả là họ chỉ ra được cái cách mà những người bình thường có thể làm để trở nên giàu có.', '74800', 75, 1, 'bcc8314d3d.jpg'),
(11, 'Trò Bịp Trên Phố Wall', 10, 11, 'Michael Lewis', 'NXB Lao Động', 'Trò bịp trên phố Wall là hồi ký của Michael Lewis về bốn năm làm việc tại Hãng đầu tư Salomon Brothers, từ một thợ học việc non nớt đến một nhà buôn trái phiếu thành đạt, làm ra hàng triệu đô-la cho hãng và kiếm tiền từ cuộc đổ xô “tìm vàng” thời hiện đại.\r\n\r\nCuốn sách ghi lại giai đoạn đỉnh điểm của những năm điên cuồng và đầy biến động đó - một cái nhìn hậu trường trong một thời kỳ khác thường và hỗn loạn của nền kinh tế Mỹ. Bằng hiểu biết sâu rộng và những lý giải hài hước của người trong cuộc, Lewis miêu tả khoảng thời gian từ 1984 đến cuộc khủng hoảng 1987 như một thời kỳ mà lòng tham quá quắt và phương cách làm giàu vô nhân đạo chưa từng thấy thống trị thị trường.', '167000', 78, 1, 'ac4cbd8893.jpg'),
(12, 'Đám Trẻ Ở Đại Dương Đen', 14, 6, 'Châu Sa Đáy Mắt', 'Thế Giới', 'Đám trẻ ở đại dương đen là lời độc thoại và đối thoại của những đứa trẻ ở đại dương đen, nơi từng lớp sóng của nỗi buồn và tuyệt vọng không ngừng cuộn trào, lúc âm ỉ, khi dữ dội. Những đứa trẻ ấy phải vật lộn trong những góc tối tâm lý, với sự u uất đè nén từ tổn thương khi không được sinh ra trong một gia đình toàn vẹn, ấm êm, khi phải mang trên đôi vai non dại những gánh nặng không tưởng.\r\n\r\nSong song đó cũng là quá trình tự chữa lành vô cùng khó khăn của đám trẻ, cố gắng vươn mình ra khỏi đại dương đen, tìm cho mình một ánh sáng. Và chính những sự nỗ lực xoa dịu chính mình đó đã hóa thành những câu từ trong cuốn sách này, bất kể đau đớn thế nào.\r\nCuốn sách được viết bởi Châu Sa Đáy Mắt, một tác giả GenZ mong muốn cùng các bạn trẻ bộc bạch và vỗ về những xúc cảm chân thật về gia đình, xã hội và chính bản thân.\r\nSách được phát hành bởi Wavebooks - thương hiệu sách dành cho người Việt trẻ.', '69300', 60, 1, '4182158c53.jpg'),
(13, 'Trôi - Nguyễn Ngọc Tư', 15, 6, 'Nguyễn Ngọc Tư', 'NXB Trẻ', '“Em thà trôi một mình. Nhưng những gì còn sót lại của một cù lao phân rã chẳng là bao. Vài ba mái nhà lấp ló trên mặt nước, một vài cái lu, những rẻo đất đủ rộng cho một người ngồi thì cũng có, lại trôi đờ đẫn đằng xa. Mãi mới có mảnh đất trôi gần, đúng lúc nó rùng mình nứt làm hai.\r\n\r\nTrong mê lộ của nước, mình chẳng biết trôi được đến đâu. Không bãi bờ gì để định vị. Ngó đâu cũng chỉ thấy nước và bọt nước, cùng những vật chất nổi nênh.\r\n\r\nGiờ thì mạnh ai nấy trôi.” - Trích tác phẩm.\r\n---\r\nHọ nổi trôi, nhưng mắc kẹt lại đâu đó, cùng lúc. Họ tháo nhưng cũng là buộc. Họ tìm kiếm tự do, buông mình khỏi những nơi chốn, khỏi hiện thực nghiệt ngã, khỏi những vui buồn, nhưng làm sao mà thoát khỏi vòng vây của chân trời.  \r\n\r\nVới “Trôi”, Nguyễn Ngọc Tư, bằng tài năng kể chuyện hiếm có, đã mở ra một thế giới bất định với những con người cố níu lấy thứ gì đó, đồng thời cũng muốn thoát khỏi nó, trong hành trình trôi nổi dường như vô tận của mình. Độc giả dễ dàng tìm thấy sự đồng cảm nơi mỗi nhân vật, như thể họ là từng phần trong mỗi con người chúng ta - và con người ấy, được mô tả như vật thể lang thang vô định - luôn ở trong trạng thái loay hoay lý giải, làm sáng tỏ về điều mà họ đã mất đi. Và trong hành trình dạt trôi theo quỹ đạo của riêng mình, những vật thể này sượt qua nhau bất giác làm vẩn lên hơi ấm con người, gợi cảm giác cái đẹp được cầm trên tay, thường trực sẵn một nguy cơ tan rã. Sau rốt, liệu rằng các nối kết giữa người với người có đủ bền chặt để mỗi tâm hồn thôi là sự nổi trôi vĩnh viễn?   ', '71250', 80, 1, '0045f4b1ca.jpg'),
(14, 'Dược Sư Tự Sự', 16, 6, 'Natsu Hyuuga, Touko Shino', 'NXB Kim Đồng', 'Miêu Miêu là một cô gái làm công việc hầu hạ trong cung đình thời phong kiến.\r\n\r\nCâu chuyện của chúng ta bắt đầu với việc cô gái từng hành nghề dược sư ở phố hoa này nghe thấy người ta đồn thổi rằng: tất cả những đứa con của Hoàng đế đều đoản mệnh.\r\n\r\nPhiên bản tiếng Việt rất được mong đợi của tác phẩm trinh thám cổ trang đã được công chúng đón nhận nồng nhiệt. Giữa bối cảnh phương Đông thời phong kiến, cô gái làm nhiệm vụ “thử độc” liên tiếp phá giải những vụ án hóc búa xảy ra ở chốn cung đình.\r\n\r\n* DƯỢC SƯ TỰ SỰ là series light-novel thể loại trinh thám vô cùng độc đáo lấy bối cảnh cung đình. Là một trong những bộ light-novel đình đám nhất trong những năm gần đây, series đã vượt mốc 13 triệu bản tại thị trường Nhật Bản và luôn thống trị bảng xếp hạng bán chạy mỗi khi ra tập mới!', '82500', 68, 1, '48bf6b9dad.jpg'),
(15, 'Đứa Con Của Thời Tiết', 17, 6, 'SHINKAI MAKOTO', 'NXB Hà Nội', 'Tình thơ, gặp gỡ và chia ly là những vòng sóng đồng tâm trong thế giới Shinkai Makoto.\r\n\r\nTừng có cô Yuki chia tay Takao ở Khu vườn ngôn từ để đến dạy văn cho Mitsuha ở Your Name.\r\n\r\nNay lại có Mitsuha và Taki chia tay Your Name. để sang ĐỨA CON CỦA THỜI TIẾT, gặp gỡ các tâm sóng mới là Hina và Hodaka.\r\n\r\nĐứa con của thời tiết phác ra thương yêu cô đọng giữa hoang mang của đô thị lớn và ngặt nghèo hơn, là giữa hoang mang của một thời đại biến đổi khí hậu bấp bênh.\r\n\r\nVì một sự cố tình cờ, Hina được tạo hóa ban cho năng lực đặc biệt: làm nắng. Năng lực ấy càng thêm nhiệm màu khi đặt vào bối cảnh Nhật Bản hứng mưa triền miên, mưa đến mức vòm trời âm u trở thành cơm bữa, nước dâng gặm dần các đảo, và Tokyo có nguy cơ biến thành đô thị kênh đào.\r\n\r\nNhưng đến đây, phong cách song hành nhất quán của Shinkai lại trỗi dậy. Trong lạc có bi, trong hạnh phúc sẵn chia ly, được ban phép màu ắt phải đánh đổi. Đứa con của thời tiết cũng không thể tùy ý tắt bật nắng mưa mà không phải trả giá gì. Theo sau một lần làm nắng, là chất chứa hàng chuỗi ăn mòn, hối hận, mạo hiểm, giải cứu, và đằng đẵng cách xa.\r\n\r\nCũng như Your Name., ĐỨA CON CỦA THỜI TIẾT tiếp tục đan cài giữa truyền thống và hiện đại, huyền thoại và thực tế, nguy cơ và mộng ước, thiên tai và con người… nhưng có điểm khác là, lần đầu tiên hạnh phúc cá nhân đã được nhấn mạnh, nhân vật đã bứt mình khỏi tâm thế bao la vì mọi người.', '68000', 72, 1, '5a92e182da.jpg'),
(16, 'Tư Duy 0 Giây', 18, 9, 'Akaba Yuji', 'Công Thương', 'Bạn có bao giờ mất rất nhiều thời gian để nghĩ về một vấn đề, cứ suy đi tính lại mà vẫn không thể đưa ra kết luận và phương hướng giải quyết vấn đề?\r\n\r\nTrong cuốn sách “Tư duy 0 giây” giới thiệu một phương pháp vô cùng đơn giản mà đem lại hiệu quả cao trong việc rèn luyện trí óc nhanh nhạy hơn: viết ghi chú. Chỉ với một tờ giấy A4 và một cây bút bất kỳ, hãy viết tất cả những suy nghĩ, cảm xúc và ý tưởng trong đầu trong vòng chưa đầy 1 phút. Phương pháp này không chỉ giúp bạn mài giũa tư duy thêm nhạy bén, mà còn giúp bạn rèn luyện khả năng ngôn từ, diễn đạt được những cảm xúc, suy nghĩ của mình và tìm ra phương pháp giải quyết cho các vấn đề còn tồn đọng một cách nhanh chóng.\r\n\r\nCuốn sách trợ giúp chúng ta:\r\n\r\n- Luyện tập khả năng viết ghi chú, rèn luyện khả năng diễn đạt cảm xúc và suy nghĩ một cách dễ dàng\r\n\r\n- Nâng cao khả năng tư duy nhanh nhạy, phân tích và đánh giá các lập luận một cách logic\r\n\r\n- Phát triển kỹ năng tư duy sáng tạo, tự tìm ra giải pháp cho các vấn đề còn tồn đọng', '152100', 93, 1, '81ee69a7dd.jpg'),
(17, 'Khách Hàng Thật Sự Cần Gì?', 19, 9, 'Jim Kalbach', 'Thế Giới', 'Đây là cuốn sách nhập môn hướng dẫn cho bạn về “Job to Be done” (hay JTBD), một lý thuyết đã được nghiên cứu gần 30 năm. Cuốn sách tập hợp các phương pháp đang được thực hành hiện nay mà tác giả Jim Kalbach gọi là “các chiến thuật”, mượn cách nói ẩn dụ “sổ tay chiến thuật” trong thể thao. Về cơ bản, chiến thuật là các kỹ thuật riêng lẻ tạo nền tảng để thực hiện JTBD.\r\n\r\nMục đích của cuốn sách The Jobs to Be Done Playbook: Align Your Markets, Organization, and Strategy Around Customer Needs là cung cấp cho bạn một bản tham chiếu về các phương pháp tiếp cận khác nhau trong JTBD trên thực tế. Nhưng hãy nhớ rằng các phương pháp được trình bày trong cuốn sách này vẫn chưa phải là tất cả. Các tài liệu này được đưa ra dựa trên nghiên cứu của tác giả Jim Kalbach về JTBD và cách ông áp dụng các kỹ thuật trong JTBD cho công việc suốt 10 năm qua.\r\n\r\nKhi viết cuốn sách này, tác giả Jim Kalbach cũng có nhận thức sâu sắc về những thiếu sót của JTBD. Giống như bất kỳ phương pháp nào khác, JTBD không phải giải pháp cho mọi vấn đề mà sẽ có sự đánh đổi khi thực hành chúng. Khi bạn đọc cuốn sách này với tư duy phản biện, bạn nên lưu tâm những lợi ích sau đây của JTBD.', '153000', 56, 1, '314d69f914.jpg'),
(18, 'Học Như Einstein', 20, 9, 'Peter Hollins', 'Dân Trí', 'Học như Einstein: Cách để rút ngắn thời gian trở thành chuyên gia nhanh nhất có thể\r\n\r\nNẾU BẠN ĐANG TÌM CÁCH:\r\n\r\n- Tăng tốc khả năng học tập của mình,\r\n\r\n- Cải thiện trí nhớ ngay lập tức,\r\n\r\n- Tiếp thu các kỹ năng mới một cách hiệu quả,\r\n\r\n- Vượt qua các bài kiểm tra tài liệu và đạt điểm xuất sắc...\r\n\r\nCÂU TRẢ LỜI Ở NGAY TRƯỚC MẮT BẠN!!!\r\n\r\nHọc như Einstein là những hướng dẫn đã được khoa học chứng minh về cách sử dụng bộ não của bạn với tiềm năng tối đa như Albert Einstein. Đây KHÔNG phải là một cuốn sách giáo khoa nhàm chán với đầy những lời khuyên chung chung như “quản lý thời gian của bạn tốt và đừng nhồi nhét vào phút cuối”. Cuốn sách bao gồm NHỮNG CHIẾN THUẬT CỤ THỂ và KHẢ THI để GIẢI QUYẾT MỌI KHÍA CẠNH TRONG QUÁ TRÌNH HỌC TẬP của bạn - từ ghi nhớ, đọc nhanh hơn, tiếp thu nhiều hơn và tập trung hơn.\r\n\r\nKỹ năng học tập chủ động là một trong những kỹ năng quý giá nhất mà bạn từng sở hữu vì nó mở ra mọi thứ bạn muốn trong cuộc sống. Bạn có thể đạt được điều gì nếu bạn liên tục trau dồi và phát triển kiến thức? Thành công trong kinh doanh, sự hài lòng cá nhân, các mối quan hệ cùng tình bạn tốt đẹp hơn,... và TẠO RA CUỘC SỐNG MÀ BẠN MONG MUỐN.', '89100', 74, 1, '67e583db5b.jpg'),
(19, 'Học Tập Suốt Đời', 21, 9, 'Peter Hollins', 'Dân Trí', 'Peter Hollins là một nhà tâm lý học chuyên tư vấn và nghiên cứu hành vi con người. Ông có bằng BS và MA về tâm lý học. Ông đã tư vấn huấn luyện cho hàng chục người từ mọi tầng lớp xã hội trong khoảng 10 năm. Ông có văn phòng riêng tại Seattle, Washington.\r\n\r\nNgoài ra, ông còn được biết đến với vai trò là tác giả của rất nhiều cuốn sách về rèn luyện bản thân. Trong đó nổi bật nhất là những cuốn sách hướng dẫn về:Tính kỷ luật, tự giác, tinh thần nỗ lực không mệt mỏi, cách tìm động lực trong cuộc sống.\r\n\r\nNhững cuốn sách được viết dựa trên kinh nghiệm học tập, nghiên cứu và huấn luyện cá nhân của ông. Chính vì vậy, nó đóng vai trò như một khóa học thực tế, cực kỳ hữu ích cho độc giả.', '170100', 95, 1, 'e70153f1e0.jpg'),
(20, 'Động Từ Bất Quy Tắc', 22, 8, 'Mai Lan Hương', 'Đà Nẵng', 'Việc học một thứ ngôn ngữ khác không phải tiếng mẹ đẻ, bao giờ cũng đem lại cho bạn nhiều khó khăn, vì thế  để học tốt tiếng Anh hay bất kì thứ tiếng nào khác đòi hỏi bạn phải có sự kiên trì và tài liệu học tập tốt.\r\n\r\nĐộng Từ Bất Quy Tắc & Ngữ Pháp Tiếng Anh Căn Bản là tài liệu học Tiếng Anh căn bản dành cho người mới bắt đầu học tiếng Anh.\r\n\r\nCuốn sách gồm hai phần:\r\n\r\nPhần I:  Động từ bất quy tắc gồm bảng động từ bất quy tắc được chia theo 4: dạng hiện tại, quá khứ, quá khứ phân từ, hiện tại phân từ có kèm nghĩa của từ.\r\n\r\nPhần II: Những kiến thức Anh văn cơ bản giới thiệu kiến thức về các thể câu.', '15300', 55, 1, '26a986b9de.jpg'),
(21, 'Tiếng Anh Cho NgườI Bắt Đầu', 23, 11, 'Trang Anh, Minh Anh', 'Hồng Đức', 'Các bạn thân mến!\r\n\r\nTrong xu thế hội nhập và toàn cầu hoá như hiện nay, việc thông thạo tiếng Anh sẽ là một lợi thế, giúp chúng ta mở mang tầm mắt, nâng cao tri thức và có nhiều cơ hội việc làm cũng như sự thăng tiến. Có lẽ vì thế mà ngày càng có nhiều người quyết tâm theo học ngôn ngữ này. Tuy nhiên, với đại đa số người bắt đầu học tiếng Anh đều gặp khó khăn trong việc xác định nội dung và phương pháp học tập hiệu quả. Có rất nhiều người không biết nên bắt đầu học từ đâu, nên học những nội dung gì, nên học phần gì trước phần gì sau. Đó là còn chưa kể đến chương trình học trong nhà trường phổ thông vẫn nặng về lí thuyết và thi cử nên có rất nhiều bạn học sinh không thể tự tin sử dụng tiếng Anh trong giao tiếp hàng ngày.\r\n\r\nXuất phát từ thực tế đó, nhóm tác giả đã dành nhiều thời gian và tâm huyết để biên soạn cuốn TIẾNG ANH CHO NGƯỜI BẮT ĐẦU. Cuốn sách gồm có 30 bài, trong đó mỗi bài lại được chia thành các phần: nghe- nói- đọc- viết và ngữ pháp. Điểm đặc biệt của cuốn sách này là nó khai thác ý nghĩa và cách dùng của ngữ pháp tiếng Anh, rồi từ chính việc nắm được ngữ pháp tiếng Anh sẽ giúp người học vận dụng nó để nói đúng trong giao tiếp. Các tình huống giao tiếp được xây dựng dựa trên các cách dùng của các hiện tượng ngữ pháp và từ các\r\n\r\nchủ đề giao tiếp sẽ phát triển vốn từ vựng theo chủ đề. Khi đã có vốn từ vựng và ngữ pháp thì người học sẽ được đi vào rèn luyện các kĩ năng nghe- nói- đọc- viết. Tất cả những điều đó được tích hợp trong từng đơn vị bài học của cuốn sách.', '140000', 57, 1, '61dc4ef221.jpg'),
(22, 'Gánh Gánh Gồng Gồng', 24, 11, 'Nguyễn Thị Xuân Phượng', 'Tổng Hợp Thành Phố Hồ Chí Minh', 'Cuốn hồi ký gồm những câu chuyện về những thăng trầm cuộc đời của bà Nguyễn Thị Xuân Phượng từ năm 1945. Vào những năm 1967, khi đang là bác sĩ công tác tại Ủy ban Liên lạc văn hóa với người nước ngoài, do giỏi tiếng Pháp, bà Nguyễn Thị Xuân Phượng được Chủ tịch Hồ Chí Minh giao trọng trách chăm sóc sức khỏe cho vợ chồng đạo diễn người Hà Lan Joris Ivens và Marceline Loridan khi họ làm phim tại Vĩnh Linh. Cơ duyên này đã tạo nên bước ngoặt, khiến bà quyết định trở thành nữ đạo diễn phim tài liệu. Năm 1968, bà trở thành nữ đạo diễn, phóng viên chiến trường duy nhất ở Việt Nam làm việc tại Phòng Truyền hình, tiền thân của Đài truyền hình Việt Nam bây giờ. Bà đã thực hiện hàng loạt phim tài liệu mang tính thời sự, phản ánh những sự kiện chiến sự tại chiến trường Campuchia, biên giới phía bắc, và là một trong những phóng viên đầu tiên vào Dinh Độc lập theo trung đoàn xe tăng vào ngày 30.4.1975', '112000', 71, 1, '4360aeb2ea.jpg'),
(23, 'Hiểu Về Trái Tim ', 25, 9, 'Minh Niệm', 'NXB Tổng Hợp TPHCM', '“Hiểu về trái tim” là một cuốn sách đặc biệt được viết bởi thiền sư Minh Niệm. Với phong thái và lối hành văn gần gũi với những sinh hoạt của người Việt, thầy Minh Niệm đã thật sự thổi hồn Việt vào cuốn sách nhỏ này.\r\n\r\nXuất bản lần đầu tiên vào năm 2011, Hiểu Về Trái Tim trình làng cũng lúc với kỷ lục: cuốn sách có số lượng in lần đầu lớn nhất: 100.000 bản. Trung tâm sách kỷ lục Việt Nam công nhận kỳ tích ấy nhưng đến nay, con số phát hành của Hiểu về trái tim vẫn chưa có dấu hiệu chậm lại.\r\n\r\nLà tác phẩm đầu tay của nhà sư Minh Niệm, người sáng lập dòng thiền hiểu biết (Understanding Meditation), kết hợp giữa tư tưởng Phật giáo Đại thừa và Thiền nguyên thủy Vipassana, nhưng Hiểu Về Trái Tim không phải tác phẩm thuyết giáo về Phật pháp. Cuốn sách rất “đời” với những ưu tư của một người tu nhìn về cõi thế. Ở đó, có hạnh phúc, có đau khổ, có tình yêu, có cô đơn, có tuyệt vọng, có lười biếng, có yếu đuối, có buông xả… Nhưng, tất cả những hỉ nộ ái ố ấy đều được khoác lên tấm áo mới, một tấm áo tinh khiết và xuyên suốt, khiến người đọc khi nhìn vào, đều thấy mọi sự như nhẹ nhàng hơn…\r\n\r\nTrong dòng chảy tất bật của cuộc sống, có bao giờ chúng ta dừng lại và tự hỏi: Tại sao ta giận? Tại sao ta buồn? Tại sao ta hạnh phúc? Tại sao ta cô đơn?... Tất cả những hiện tượng tâm lý ấy không ngừng biến hóa trong ta và tác động lên đời sống của ta, nhưng ta lại biết rất ít về nguồn gốc và sự vận hành của nó. Chỉ cần một cơn giận, hay một ý niệm nghi ngờ, cũng có thể quét sạch năng lượng bình yên trong ta và khiến ta nhìn mọi thứ đều sai lệch. Từ thất bại này đến đổ vỡ khác mà ta không lý giải nổi, chỉ biết dùng ý chí để tự nhắc nhở mình cố gắng tiến bộ hơn. Cho nên, hiểu về trái tim chính là nhu cầu căn bản nhất của con người.', '126400', 80, 1, 'b85cbfb279.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tintuc` int(11) NOT NULL,
  `id_loaitintuc` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(200) NOT NULL,
  `mota` text NOT NULL,
  `noidung` text NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id_tintuc`, `id_loaitintuc`, `tieude`, `mota`, `noidung`, `hinhanh`, `status`) VALUES
(3, 1, 'Giản Tư Trung: Khai phóng giúp con người vững vàng trước biến động', 'Nhà giáo dục Giản Tư Trung nói mục tiêu của khai phóng giúp con người hướng tới giá trị tốt đẹp và biết cách ứng biến trong cuộc sống.', 'Mở đầu chương trình, ông Giản Tư Trung nói: \"Khai phóng có nghĩa là khai minh và giải phóng. Khai minh nghĩa là mở ra con người tăm tối của mình để đưa ánh sáng vào và khai phóng là hệ quả tất yếu của khai minh. Hoặc hiểu ngắn gọn hơn, khai phóng chính là khai mở tâm trí và giải phóng tiềm năng\".  Theo Giản Tư Trung, mục tiêu của khai phóng là mang con người tới những giá trị bất biến, đồng thời vững vàng hơn trước những biến động của cuộc sống. Trên tinh thần khuyến khích sự học khai phóng của mỗi người, Giản Tư Trung ra mắt cuốn sách Sư phạm khai phóng - Thế giới, Việt Nam và Tôi hồi tháng 3 năm nay.  Trong đó, ông nhấn mạnh tầm quan trọng của thực học để có thể trở thành con người tự do, công dân trách nhiệm và chuyên gia ưu tú. Tác giả cho biết: \"Trước đây tôi nói về chuyện đọc sách của cộng đồng, bây giờ tôi muốn nói về chuyện đọc sách của hai đối tượng tôi thấy rất quan trọng là doanh giới và giáo giới. Tất nhiên sự học của ai cũng quan trọng, nhưng sự học của những người làm sếp, làm thầy có những ý nghĩa riêng, không chỉ ảnh hưởng đến bản thân họ, mà còn ảnh hưởng đến xã hội, đến đội ngũ và tổ chức họ đang điều hành\".  \"Có rất nhiều người còn trẻ nhưng không còn mới. Ngược lại, có nhiều người tuổi cao nhưng vẫn mới. Vấn đề có lẽ là một ngày nào đó chúng ta sẽ già đi, nhưng chúng ta không nên cũ đi. Đó là cách chúng ta hiểu về thế hệ doanh nhân mới\", ông nói thêm.  Một số chuyên gia ở buổi đối thoại đồng quan điểm với ông Giản Tư Trung. Giáo sư Chu Hảo cho rằng trong mọi lĩnh vực, người quan trọng nhất luôn là người lãnh đạo, bởi khi lãnh đạo tự khai phóng chính mình, đội ngũ sẽ được khai phóng.  Với phó giáo sư Nguyễn Thiện Tống, thế hệ doanh nhân mới cần phải thấy, phải hiểu biết, phải đi từ khai trí đến khai tâm. \"Tôi rất quan trọng chuyện tư duy về nhận thức, và tiến sâu hơn là khai tâm. Có một câu chúng tôi được học từ nhỏ rằng, một tinh thần minh mẫn trong cơ thể tráng kiện, bây giờ nhìn lại thấy còn cần phải có thêm cả tấm lòng\", ông Tống nói.', 'bbbb6bf216.jpg', 0),
(4, 1, 'Nguyễn Việt Hà: \'Văn chương cần chữ tình\'', 'Tác giả \"Con giai phố cổ\" cho rằng điều làm nên cái hay cho tạp văn nói riêng, văn chương nói chung, là độ đậm của tình cảm, cảm xúc.', 'Nguyễn Việt Hà là cây bút nổi bật đương thời với các tiểu thuyết như Cơ hội của chúa, Khải huyền muộn, Ba ngôi của người. Không chỉ khuấy động văn đàn bằng các tiểu thuyết, Việt Hà còn tạo phong cách riêng ở thể loại tạp văn qua các tập sách Nhà văn thì chơi với ai, Con giai phố cổ, Đàn bà uống rượu.\r\n\r\nGiọng của phố là tập tạp văn mới nhất của anh, phát hành hồi tháng 5, cho thấy chất giọng đặc trưng của Nguyễn Việt Hà. Dịp này, nhà văn nêu quan điểm về quá trình sáng tạo văn chương.\r\n- Ở lời giới thiệu sách \"Giọng của phố\", anh cho rằng tạp văn là thể loại \"dễ tủi thân\" nếu phải miễn cưỡng so với tiểu thuyết và truyện ngắn. Tại sao anh có nhận định ấy?\r\n\r\n- Nói cho công bằng, không phải cứ viết tiểu thuyết là nhất, rồi đến truyện ngắn, bét nhất là tạp văn đâu. Cách chia ấy theo tôi chỉ mang tính tương đối.\r\n\r\nTôi thích chữ \"tạp văn\", đó là chữ do Lỗ Tấn nói. Lỗ Tấn là kiểu nhà văn không viết dài. Lịch sử văn chương không thiếu chuyện như vậy. Nhà văn Nguyễn Huy Thiệp nổi danh với truyện ngắn, khi ông chuyển sang tiểu thuyết mọi người vẫn chê. Rõ ràng, khi chuyển sang tiểu thuyết, bút lực của ông chưa được như truyện ngắn. \"Chưa được như\" là so với chính ông Thiệp thôi, còn người khác viết được như ông cũng \"hộc mì\". Người khen nhiều Tuổi 20 yêu dấu là Bảo Ninh, tôi cũng thấy tiểu thuyết đó không dở. Khi tôi viết Khải huyền muộn cũng là lúc ông Thiệp viết Tuổi 20 yêu dấu, cứ khoảng hai tuần ông lại gọi hỏi \"mày viết đến đâu rồi, tao xong được chương một, chương hai\". Tôi nghĩ \"ông này viết như cướp\". Sau này tôi mới biết cách ông Thiệp viết nhanh cũng là một thói quen.\r\n\r\nTrở lại Lỗ Tấn, hay Chekhov (với tôi là một người viết truyện ngắn vĩ đại) cũng vậy, họ là những người viết dài không quen, hoặc người ta không thích viết dài. Ta không thể nói tiểu thuyết hơn truyện ngắn, truyện ngắn hơn tạp văn được.\r\nKhi người ta nhờ tôi viết tạp văn, lúc ấy tôi đã là Nguyễn Việt Hà tác giả Cơ hội của chúa rồi. Tôi nhận lời thì nghĩ \"khó quái gì\", bắn đại bác còn được nữa là bắn súng lục. Nhưng bập vào mới biết là khó, một hai bài chưa nói lên điều gì. Nhất là khi mình lại đứng mục, mấy tờ làm columnist như Nhân Dân hàng tháng, Đẹp, Đàn ông đến ngày mà chưa thấy bài thì người ta giục lắm.\r\n\r\nTôi viết tạp văn là một thói quen mới. Tạp văn mà viết kỹ thuật quá, điệu đà quá cũng khó hay. Tạp văn là thứ nửa văn nửa báo. Thường tạp văn hay công bố ở những tờ báo. Đương nhiên tuần báo sẽ có \"sân\" cho tạp văn. Sân ấy rộng, hẹp ra sao tùy từng báo.\r\n\r\nTôi viết tạp văn cũng tầm năm bảy trăm cái. Đến giờ in thành năm tập, từ Nhà văn thì chơi với ai, Đàn bà uống rượu, Mặt của đàn ông, Con giai phố cổ, đến giờ là Giọng của phố. Mỗi tập 62 bài.', 'ceccc69f56.jpg', 0),
(5, 3, '\'Bốn kiếp thùy liễu\' - cốt cách phụ nữ qua truyện Sơn Táp', '\"Bốn kiếp thùy liễu\" thuật bốn chuyện ở thời đại lịch sử khác nhau của Trung Quốc, trong đó \"thùy liễu\" tượng trưng cốt cách cao đẹp của phụ nữ.', 'Sơn Táp, sinh ngày 26/10/1972 tại Bắc Kinh (Trung Quốc), hiện sống tại Pháp. Cô là nhà văn gốc Hoa nổi tiếng trên văn đàn thế giới với những tác phẩm viết về phụ nữ, trong đó có tiểu thuyết Bốn kiếp thùy liễu từng giành giải thưởng Prix Cazes-Brasserie Lipp năm 1999.\r\n\r\nLấy điểm tựa là những sự kiện trọng đại trong lịch sử Trung Quốc, Sơn Táp tạo nên thiên tiểu thuyết Bốn kiếp thùy liễu với các câu chuyện mang màu sắc liêu trai. Truyện đa dạng ngôi kể với kết cấu lắp ghép của văn học hiện đại. Nhà văn đã thổi làn gió nữ quyền vào \"mảnh đất\" tiểu thuyết lịch sử để ca ngợi vẻ đẹp, tài năng của những người phụ nữ, tô đậm vị thế của họ trong dòng chảy thời gian.\r\nTrong cả bốn câu chuyện, những nhân vật nữ như được mô tả như hình tượng trung tâm đầy nổi bật. Họ thách thức những luật lệ phong kiến, phá vỡ những quy tắc định đoạt cuộc đời của nữ giới. Vừa tràn trề tính nữ như cây thùy liễu, người nữ trong sách cũng có nội tâm bền bỉ và kiên cường như cây liễu trước cơn gió lốc. Họ mang trong mình hoài bão tự do, khát khao bình đẳng trong cuộc sống và tình yêu. Một Lục Y từ chối bị bó buộc trong lề thói hôn nhân thời phong kiến và vòng xoáy danh lợi, một Xuân Ninh giỏi giang, tháo vát gánh vác gia tộc, một Liễu nhẹ nhàng nhưng quả cảm trong cơn biến loạn của thời đại, một Thanh đại diện cho người phụ nữ hiện đại yêu và sống hết mình. Đặt chủ đề về người phụ nữ trong đối sánh với chủ đề to lớn như lịch sử, Sơn Táp thể hiện rõ niềm tự hào về phụ nữ Trung Hoa nói riêng và nữ giới nói chung.\r\n\r\nẨn đằng sau câu chuyện luân hồi của mỗi cá nhân, độc giả còn thấy trong Bốn kiếp thùy liễu một Trung Quốc thăng trầm lịch sử. Từ Trung Hoa dưới triều Minh cho đến cuối Mãn Thanh, từ Cách mạng Văn hóa đến Trung Quốc hiện đại, tác phẩm cho thấy một đất nước Trung Hoa vừa lớn mạnh và uy nghi, vừa có đấu tranh, loạn lạc. Nét bút của nhà văn ngợi ca vẻ đẹp của núi non, thảo nguyên trên quê hương bà, đồng thời cũng lột tả những cấm đoán của xã hội phong kiến hay thất bại của Cách mạng Văn hóa. Lịch sử lần nữa được tái thiết đa diện, mới mẻ qua cặp mắt của hậu thế.\r\nNgoài nét đặc sắc về văn hóa, tư tưởng phương Đông còn được Sơn Táp kế thừa và truyền tải trong sách bằng phong cách viết kỳ ảo, nửa thực nửa mộng. Hình ảnh \"thùy liễu\" là xương sống của toàn bộ cuốn tiểu thuyết vừa gắn liền với nỗi chia ly, vừa mang ý nghĩa như một vòng luân hồi của sự sống và cái chết trong tư duy người Trung Quốc. Môtíp luân hồi, thề nguyền, hóa thân, giấc mộng Nam Kha quen thuộc trong truyền kỳ, truyện thần quái được lồng ghép xuyên suốt tác phẩm. Những yếu tố này làm cho mỗi câu chuyện Sơn Táp kể đều mang nét lãng mạn, bí ẩn, cuốn hút người ta phải bóc tách để hiểu từng tầng lớp ý nghĩa bên trong.', '96e5d70ce2.jpg', 0),
(6, 3, '\'Khán giả học\' - vai trò của người xem phim', 'Kevin Goetz và Darlene Hayman nghiên cứu tâm lý người xem nhằm lý giải sự thành bại của các phim Hollywood, trong sách \"Khán giả học\".', 'Cuốn sách xuất bản trong nước hồi tháng 9, đưa ra cách tiếp cận mới khi khảo sát những điều khán giả chờ đợi ở một bộ phim. Hai tác giả đi sâu vào bóc tách tâm lý của khán giả trong 10 chương, từ đó đưa ra sự đúc kết về tầm ảnh hưởng của người xem đối với điện ảnh.\r\n\r\nKevin Goetz cho rằng những lời góp ý, nhận xét sẽ làm thay đổi diện mạo phim. Phản hồi từ khán giả trong các buổi chiếu thử có thể giúp tác phẩm được quảng bá rộng rãi, thậm chí nâng cao chất lượng về mặt nghệ thuật lẫn doanh thu. Goetz lấy ví dụ: \"Tờ giấy khảo sát sau khi xem phim có khối lượng chưa đến 100 gr, song lại mang sức mạnh tựa như cú móc hàm phải của võ sĩ Tyson\".\r\n\r\nSách có đoạn: \"Qua nhiều năm, các nhà nghiên cứu và những người dày dặn kinh nghiệm trong ngành công nghiệp điện ảnh đều biết rõ, thước đo then chốt cho mức độ hấp dẫn của bất kỳ bộ phim thương mại nào cũng được xác định bởi các điểm số xuất sắc và rất hay mà phim nhận được từ phản hồi của khán giả tham dự buổi chiếu thử\".\r\nTrong sách, hai nhà nghiên cứu thuật lại quy trình của buổi chiếu thử, từ việc chọn khán giả dựa theo số liệu nhân khẩu học, tiêu chí chọn địa điểm công chiếu, đến những khoảnh khắc trong phim khiến người xem bật cười hay òa khóc. Goetz nhấn mạnh việc lấy khảo sát từ khán giả có thể giúp biên kịch, nhà sản xuất và đạo diễn lược bỏ chi tiết thừa hoặc thêm yếu tố mới, nhằm đẩy câu chuyện lên cao trào, đồng thời giúp phim đạt hiệu quả tốt nhất.\r\n\r\nNhững lý giải nhằm chứng minh công việc sáng tạo giống như trò chơi \"đỏ đen\" có tên là tâm lý học. Sau buổi công chiếu thử, tiếng vỗ tay, hò hét hay phản ứng khóc, cười từ khán giả có thể trở thành tín hiệu dự báo mức độ thành công.\r\n\r\nTác phẩm còn cho thấy nền điện ảnh không chỉ có bề dày lịch sử, các đạo diễn gạo cội, phim bất hủ, mà là một ngành khoa học phải đối mặt với nhiều thử thách. Goetz đưa chuyện thực tế trong các buổi chiếu thử phim nhằm giúp độc giả có cơ hội chứng kiến hậu trường Hollywood từ nhiều khía cạnh.\r\nGoetz mời một số nhân vật nổi tiếng để chia sẻ trải nghiệm của họ với các buổi chiếu thử, gồm chủ hãng phim Blumhouse Jason Blum, đạo diễn Ron Howard và nhà sáng lập công ty Illumination Chris Meledandri. Theo Variety, sách cũng cung cấp góc nhìn về tác động của khán giả đối với bản dựng phim cuối trước khi công chiếu, như trong một số tác phẩm biểu tượng Fatal Attraction, Thelma & Louise và Cocktail.\r\nKevin Goetz là nhà sáng lập công ty nghiên cứu phim Screen Engine, có hơn 30 năm kinh nghiệm trong lĩnh vực điện ảnh. Anh cũng là thành viên của Viện Hàn lâm Khoa học Nghệ thuật Điện ảnh Mỹ, Hiệp hội các nhà sản xuất phim Mỹ. Sách đầu tay của Goetz Khán giả học ra mắt lần đầu năm 2021.\r\n\r\nDarlene Hayman là nhà phân tích nghiên cứu thị trường phim ảnh ở Mỹ, cộng tác với Kevin Goetz hơn 15 năm. Cô nổi tiếng vì hỗ trợ các đạo diễn trong việc nắm bắt thị hiếu khán giả, góp phần tinh chỉnh tác phẩm trong giai đoạn cuối quá trình hậu kỳ.', 'f31b025a6e.jpg', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `chitiet_hdn`
--
ALTER TABLE `chitiet_hdn`
  ADD KEY `id_sp` (`id_sp`,`id_hdn`),
  ADD KEY `id_hdn` (`id_hdn`);

--
-- Chỉ mục cho bảng `chitiet_km`
--
ALTER TABLE `chitiet_km`
  ADD KEY `id_sp` (`id_sp`,`id_khuyenmai`),
  ADD KEY `id_khuyenmai` (`id_khuyenmai`);

--
-- Chỉ mục cho bảng `dongia`
--
ALTER TABLE `dongia`
  ADD PRIMARY KEY (`id_dongia`);

--
-- Chỉ mục cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD PRIMARY KEY (`id_hdn`),
  ADD KEY `id_ncc` (`id_ncc`,`id_nhanvien`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Chỉ mục cho bảng `hoadonxuat`
--
ALTER TABLE `hoadonxuat`
  ADD PRIMARY KEY (`id_hdx`),
  ADD KEY `id_khachhang` (`id_khachhang`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id_khuyenmai`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id_loaisanpham`);

--
-- Chỉ mục cho bảng `loaitintuc`
--
ALTER TABLE `loaitintuc`
  ADD PRIMARY KEY (`id_loaitintuc`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id_ncc`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id_nhanvien`);

--
-- Chỉ mục cho bảng `phieudh`
--
ALTER TABLE `phieudh`
  ADD PRIMARY KEY (`id_pdh`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_dongia` (`id_dongia`),
  ADD KEY `id_loaisanpham` (`id_loaisanpham`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tintuc`),
  ADD KEY `id_loaitintuc` (`id_loaitintuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `dongia`
--
ALTER TABLE `dongia`
  MODIFY `id_dongia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  MODIFY `id_hdn` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadonxuat`
--
ALTER TABLE `hoadonxuat`
  MODIFY `id_hdx` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_khachhang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id_khuyenmai` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id_loaisanpham` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `loaitintuc`
--
ALTER TABLE `loaitintuc`
  MODIFY `id_loaitintuc` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id_ncc` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id_nhanvien` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `phieudh`
--
ALTER TABLE `phieudh`
  MODIFY `id_pdh` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_hdn`
--
ALTER TABLE `chitiet_hdn`
  ADD CONSTRAINT `chitiet_hdn_ibfk_1` FOREIGN KEY (`id_hdn`) REFERENCES `hoadonnhap` (`id_hdn`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `chitiet_hdn_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `chitiet_km`
--
ALTER TABLE `chitiet_km`
  ADD CONSTRAINT `chitiet_km_ibfk_1` FOREIGN KEY (`id_khuyenmai`) REFERENCES `khuyenmai` (`id_khuyenmai`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `chitiet_km_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD CONSTRAINT `hoadonnhap_ibfk_1` FOREIGN KEY (`id_ncc`) REFERENCES `nhacungcap` (`id_ncc`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `hoadonnhap_ibfk_2` FOREIGN KEY (`id_nhanvien`) REFERENCES `nhanvien` (`id_nhanvien`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `hoadonxuat`
--
ALTER TABLE `hoadonxuat`
  ADD CONSTRAINT `hoadonxuat_ibfk_2` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id_khachhang`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `hoadonxuat_ibfk_3` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `phieudh`
--
ALTER TABLE `phieudh`
  ADD CONSTRAINT `phieudh_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_dongia`) REFERENCES `dongia` (`id_dongia`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_loaisanpham`) REFERENCES `loaisanpham` (`id_loaisanpham`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`id_loaitintuc`) REFERENCES `loaitintuc` (`id_loaitintuc`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
