-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2021 lúc 01:58 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `vai_tro` int(11) NOT NULL DEFAULT 2,
  `anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `email`, `mat_khau`, `ten`, `sdt`, `ngay_sinh`, `vai_tro`, `anh`, `ngay_tao`, `trang_thai`) VALUES
(1, 'vannamhdvt@gmail.com', 'c9740b276a32f2066522ee3362ae90aa', 'Trần Văn Nam', '0886458972', '2001-09-28', 2, 'new.jpg', '0000-00-00', 1),
(2, 'congtcph11890@fpt.edu.vn', '5a734ecdd0295bfc196a1d740bf3921f', 'Công ', '0862460235', '2021-11-10', 2, '', '2021-11-03', 1),
(3, 'nghiatqph13235@fpt.edu.vn', '4297f44b13955235245b2497399d7a93', 'nghia', '0123456789', '2021-12-11', 2, '', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `id_tour` int(11) NOT NULL,
  `noi_dung` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `danh_gia` int(11) NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `id_kh`, `id_tour`, `noi_dung`, `danh_gia`, `ngay_tao`, `trang_thai`) VALUES
(1, 7, 4, '<p>Tạm được</p>', 3, '2021-12-03 00:00:00', 1),
(2, 7, 4, '<figure class=\"image\"><img src=\"/DU_AN/images/files/Untitled(3).png\"></figure><p>ok đấy</p>', 5, '2021-12-03 06:09:08', 1),
(3, 7, 1, '<p>Oki</p>', 4, '2021-12-03 06:35:56', 1),
(5, 7, 1, '<p>Chưa đẹp</p>', 2, '2021-12-04 02:20:55', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten`, `ngay_tao`, `trang_thai`) VALUES
(1, 'Tour Linh Động', '2021-11-23', 1),
(2, 'Tour Cố Định', '2021-11-23', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia_chi`
--

CREATE TABLE `dia_chi` (
  `id` int(11) NOT NULL,
  `dia_chi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dia_chi`
--

INSERT INTO `dia_chi` (`id`, `dia_chi`, `ngay_tao`, `trang_thai`) VALUES
(1, 'Sa Pa', '2021-11-11', 1),
(4, 'Hà Nội', '2021-11-13', 1),
(5, 'Nha Trang', '2021-11-17', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `id_tour` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `nguoi_lon` int(11) NOT NULL,
  `tre_em` int(11) NOT NULL,
  `ngay_di` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noi_di` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lich_trinh` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `ngay_tao` date NOT NULL,
  `dat_coc` int(11) NOT NULL DEFAULT 2,
  `trang_thai` int(11) NOT NULL DEFAULT 2,
  `id_admin` int(11) NOT NULL,
  `thanh_toan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `id_tour`, `id_kh`, `nguoi_lon`, `tre_em`, `ngay_di`, `noi_di`, `lich_trinh`, `gia`, `ngay_tao`, `dat_coc`, `trang_thai`, `id_admin`, `thanh_toan`) VALUES
(1, 4, 5, 10, 0, '2021-11-22', 'Mỹ Phúc - Mỹ Lộc - Nam Định', '<p><strong>NGÀY 1 : HẢI PHÒNG – SAPA – KHÁM PHÁ CHỢ ĐÊM SAPA (Ăn trưa, tối)</strong><br>06:45 Quý khách có mặt tại bến xe, lên xe giường nằm khởi hành đi <strong>Sapa </strong>(dự kiến 07:00).<br>Chiều: Đến Sapa, Hướng dẫn viên đón đoàn đưa đi ăn trưa sau đó về khách sạn nhận phòng, nghỉ ngơi. 15h00: Quý khách tự do <strong>khám phá Sapa như Nhà Thờ Đá, Hồ Sapa, </strong>Mua sắm đồ tại các dãy phố ...18h00: Sau bữa tối, quý khách đi <strong>chợ tình SaPa</strong> (nếu vào tối thứ 7) - một nét văn hóa đặc sắc của đồng bào dân tộc thiểu số tại vùng núi Tây Bắc và  tự do dạo chơi chợ đêm Sapa, thưởng thức các món nướng đặc sắc vùng cao.</p><p><strong>NGÀY 2 : SAPA – CÁT CÁT – HÀM RỒNG (Ăn sáng, trưa, tối)</strong><br>Quý khách dùng bữa sáng tại khách sạn . 07h30: HDV và xe đưa đoàn đi tham quan <strong>bản Cát Cát</strong>, bản của người H’Mông đen, thăm <strong>thác nước Cát Cát</strong>, <strong>thuỷ điện Cát cát</strong> nơi có ba con suối gặp nhau tạo thành thung lũng Mường Hoa quý khách chụp ảnh lưu niệm. Ăn trưa.<br>14h30 HDV đưa quý khách đi tham quan <strong>khu du lịch núi Hàm Rồng</strong> - hòa mình trong bốn bề của các loài hoa & ngắm nhìn toàn cảnh thị trấn Sapa, xem biểu diễn của những chàng trai cô gái trong điệu khèn, điệu múa đặc trưng của dân tộc  miền Tây Bắc…18h00: Quý khách dùng bữa tối tại nhà hang, sau bữa tối Quý khách tự do dạo chơi và khám phá thị trấn Sapa về đêm.</p><p><strong>NGÀY 3 : CHINH PHỤC FANSIPAN– LÀO CAI - HẢI PHÒNG (Ăn sáng, trưa)</strong><br>Quý khách dùng bữa sáng tại khách sạn. .HDV đưa Quý khách tới nhà Ga SAPA, quý khách trải nghiệm<strong> tàu hỏa leo núi Mường Hoa (TỰ TÚC CHI PHÍ)</strong> ngắm nhìn khung cảnh thiên nhiên hùng vĩ của thung lũng Mường Hoa với núi đồi trập trùng. Đến Ga cáp treo, du khách sẽ tiếp tục hành trình khám phá Sun World Fansipan Legend với cáp treo ba dây hiện đại nhất thế giới băng qua <strong>dãy Hoàng Liên Sơn, chinh phục đỉnh Fansipan</strong> - nóc nhà Đông Dương và chiêm bái quần thể văn hóa tâm linh trên đỉnh Fansipan. (TỰ TÚC CHI PHÍ)<br>11h30: Quý khách về nhà hàng dùng bữa trưa, trả phòng khách sạn sau đó quý khách tự do đi chợ Sapa mua sắm về làm quà cho người thân. Quý khách có mặt tại văn phòng xe hoặc bến xe Sapa, lên xe giường nằm khởi hành về Hà Nội (dự kiến chuyến 13:30 hoặc 16:00- tùy ngày khởi hành). Về đến tp Hải Phòng, Quý khách tự túc phương tiện trở về nhà. Kết thúc chương trình tham quan.</p>', 23500000, '2021-11-18', 2, 1, 1, ''),
(2, 4, 5, 24, 1, '2021-11-28', 'Mỹ Phúc - Mỹ Lộc - Nam Định', '<p><strong>NGÀY 1 : HẢI PHÒNG – SAPA – KHÁM PHÁ CHỢ ĐÊM SAPA (Ăn trưa, tối)</strong><br>06:45 Quý khách có mặt tại bến xe, lên xe giường nằm khởi hành đi <strong>Sapa </strong>(dự kiến 07:00).<br>Chiều: Đến Sapa, Hướng dẫn viên đón đoàn đưa đi ăn trưa sau đó về khách sạn nhận phòng, nghỉ ngơi. 15h00: Quý khách tự do <strong>khám phá Sapa như Nhà Thờ Đá, Hồ Sapa, </strong>Mua sắm đồ tại các dãy phố ...18h00: Sau bữa tối, quý khách đi <strong>chợ tình SaPa</strong> (nếu vào tối thứ 7) - một nét văn hóa đặc sắc của đồng bào dân tộc thiểu số tại vùng núi Tây Bắc và  tự do dạo chơi chợ đêm Sapa, thưởng thức các món nướng đặc sắc vùng cao.</p><p><strong>NGÀY 2 : SAPA – CÁT CÁT – HÀM RỒNG (Ăn sáng, trưa, tối)</strong><br>Quý khách dùng bữa sáng tại khách sạn . 07h30: HDV và xe đưa đoàn đi tham quan <strong>bản Cát Cát</strong>, bản của người H’Mông đen, thăm <strong>thác nước Cát Cát</strong>, <strong>thuỷ điện Cát cát</strong> nơi có ba con suối gặp nhau tạo thành thung lũng Mường Hoa quý khách chụp ảnh lưu niệm. Ăn trưa.<br>14h30 HDV đưa quý khách đi tham quan <strong>khu du lịch núi Hàm Rồng</strong> - hòa mình trong bốn bề của các loài hoa & ngắm nhìn toàn cảnh thị trấn Sapa, xem biểu diễn của những chàng trai cô gái trong điệu khèn, điệu múa đặc trưng của dân tộc  miền Tây Bắc…18h00: Quý khách dùng bữa tối tại nhà hang, sau bữa tối Quý khách tự do dạo chơi và khám phá thị trấn Sapa về đêm.</p><p><strong>NGÀY 3 : CHINH PHỤC FANSIPAN– LÀO CAI - HẢI PHÒNG (Ăn sáng, trưa)</strong><br>Quý khách dùng bữa sáng tại khách sạn. .HDV đưa Quý khách tới nhà Ga SAPA, quý khách trải nghiệm<strong> tàu hỏa leo núi Mường Hoa (TỰ TÚC CHI PHÍ)</strong> ngắm nhìn khung cảnh thiên nhiên hùng vĩ của thung lũng Mường Hoa với núi đồi trập trùng. Đến Ga cáp treo, du khách sẽ tiếp tục hành trình khám phá Sun World Fansipan Legend với cáp treo ba dây hiện đại nhất thế giới băng qua <strong>dãy Hoàng Liên Sơn, chinh phục đỉnh Fansipan</strong> - nóc nhà Đông Dương và chiêm bái quần thể văn hóa tâm linh trên đỉnh Fansipan. (TỰ TÚC CHI PHÍ)<br>11h30: Quý khách về nhà hàng dùng bữa trưa, trả phòng khách sạn sau đó quý khách tự do đi chợ Sapa mua sắm về làm quà cho người thân. Quý khách có mặt tại văn phòng xe hoặc bến xe Sapa, lên xe giường nằm khởi hành về Hà Nội (dự kiến chuyến 13:30 hoặc 16:00- tùy ngày khởi hành). Về đến tp Hải Phòng, Quý khách tự túc phương tiện trở về nhà. Kết thúc chương trình tham quan.</p>', 58045000, '2021-11-18', 2, 1, 2, ''),
(4, 2, 7, 2, 0, '2021-11-23', 'Hồ Chí Minh', '<p><strong>NGÀY 1 | TP.HCM – HÀ NỘI – HẠ LONG (Ăn trưa, chiều)</strong></p><p> </p><p><strong>Sáng:</strong> Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất ba tiếng.</p><ul><li>Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý Khách làm thủ tục đón chuyến bay đi Hà Nội.</li><li>Đến sân bay Nội Bài, Hướng Dẫn Viên đón đoàn, Khởi hành đến Hạ Long. Đến núi Yên Tử - ngọn núi cao 1068 m so với mực nước biển, một thắng cảnh thiên nhiên còn lưu giữ hệ thống các di tích lịch sử văn hóa gắn với sự ra đời, hình thành và phát triển của thiền phái Trúc Lâm Yên Tử, được mệnh danh là “đất tổ Phật giáo Việt Nam”.</li></ul><p> </p><p><strong>Trưa:</strong> Dùng cơm trưa.</p><ul><li>Quý khách lên núi bằng cáp treo (chi phí cáp treo tự túc), tham quan chùa Hoa Yên, Bảo Tháp, Trúc Lâm Tam Tổ, Hàng Tùng 700 tuổi…xuống núi tham quan Thiền Viện Trúc Lâm với quả cầu Như Ý nặng 6 tấn được xếp kỷ lục guiness Việt Nam.</li><li>Đoàn khởi hành đến Hạ Long</li></ul><p> </p><p><strong>Tối: </strong>Dùng bữa tối. Nghỉ đêm tại Hạ Long.</p><ul><li>Quý khách tự do dạo phố, mua sắm tại chợ đêm hoặc tham gia khu Sunworld Hạ Long Park với tất cả khu trò chơi trong nhà, ngoài trời hoành tráng có các khu Công viên Rồng, Cáp treo Nữ Hoàng vòng quay Sun wheel…(chi phí tự túc).</li></ul><p> </p><p><strong>NGÀY 2 | HẠ LONG – NINH BÌNH (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 3 | NINH BÌNH – HÀ NỘI (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 4 | HÀ NỘI – LÀO CAI - SAPA (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 5 | SAPA – FANSIPAN – HÀ NỘI (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 6 | HÀ NỘI – TP.HCM (Ăn sáng, trưa)</strong></p><p> </p>', 16398000, '2021-11-20', 2, 1, 2, ''),
(6, 2, 5, 2, 0, '2021-11-23', 'Hồ Chí Minh', '<p><strong>NGÀY 1 | TP.HCM – HÀ NỘI – HẠ LONG (Ăn trưa, chiều)</strong></p><p> </p><p><strong>Sáng:</strong> Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất ba tiếng.</p><ul><li>Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý Khách làm thủ tục đón chuyến bay đi Hà Nội.</li><li>Đến sân bay Nội Bài, Hướng Dẫn Viên đón đoàn, Khởi hành đến Hạ Long. Đến núi Yên Tử - ngọn núi cao 1068 m so với mực nước biển, một thắng cảnh thiên nhiên còn lưu giữ hệ thống các di tích lịch sử văn hóa gắn với sự ra đời, hình thành và phát triển của thiền phái Trúc Lâm Yên Tử, được mệnh danh là “đất tổ Phật giáo Việt Nam”.</li></ul><p> </p><p><strong>Trưa:</strong> Dùng cơm trưa.</p><ul><li>Quý khách lên núi bằng cáp treo (chi phí cáp treo tự túc), tham quan chùa Hoa Yên, Bảo Tháp, Trúc Lâm Tam Tổ, Hàng Tùng 700 tuổi…xuống núi tham quan Thiền Viện Trúc Lâm với quả cầu Như Ý nặng 6 tấn được xếp kỷ lục guiness Việt Nam.</li><li>Đoàn khởi hành đến Hạ Long</li></ul><p> </p><p><strong>Tối: </strong>Dùng bữa tối. Nghỉ đêm tại Hạ Long.</p><ul><li>Quý khách tự do dạo phố, mua sắm tại chợ đêm hoặc tham gia khu Sunworld Hạ Long Park với tất cả khu trò chơi trong nhà, ngoài trời hoành tráng có các khu Công viên Rồng, Cáp treo Nữ Hoàng vòng quay Sun wheel…(chi phí tự túc).</li></ul><p> </p><p><strong>NGÀY 2 | HẠ LONG – NINH BÌNH (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 3 | NINH BÌNH – HÀ NỘI (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 4 | HÀ NỘI – LÀO CAI - SAPA (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 5 | SAPA – FANSIPAN – HÀ NỘI (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 6 | HÀ NỘI – TP.HCM (Ăn sáng, trưa)</strong></p><p> </p>', 16398000, '2021-11-20', 2, 1, 1, ''),
(7, 3, 7, 3, 0, '2021-11-16', 'Hồ Chí Minh', '<p><strong>NGÀY 1 | TP.HCM – HÀ NỘI – HÒA BÌNH – MAI CHÂU – MỘC CHÂU (Ăn trưa, chiều)</strong></p><p> </p><p> </p><p>Sáng: Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất hai tiếng. Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý khách làm thủ tục đón chuyến bay đi Hà Nội.</p><ul><li>Đến sân bay Nội Bài, xe đón Đoàn khởi hành đến Mai Châu.</li><li>Trên đường đến Hòa Bình, Quý khách có dịp ngắm nhìn Nhà máy thủy điện sông Đà (còn gọi là thủy điện Hòa Bình)</li><li>Chiêm ngưỡng toàn cảnh tuyệt đẹp của thung lũng Mai Châu trên đoạn đường đèo Thung Khe.</li></ul><p> </p><p> </p><p>Trưa: Dùng cơm trưa.</p><ul><li>Đoàn tiếp tục khởi hành đến Mai Châu, tham quan Bản Lác tìm hiểu phong tục tập quán của bản làng người Thái, nơi in đậm bản sắc văn hóa người Thái.</li><li>Rời Mai Châu, Đoàn khởi hành đến Cao Nguyên Mộc Châu nổi tiếng với những đồi chè xanh mướt trải dài đến tận bên kia quả đồi</li></ul><p> </p><p>Tối: Dùng cơm chiều. Nghỉ đêm Mộc Châu.</p><p><strong>NGÀY 2 | MỘC CHÂU – SƠN LA – ĐIỆN BIÊN (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 3 | ĐIỆN BIÊN – MƯỜNG LAY – SAPA (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 4 | SAPA – FANSIPAN – BẢN CÁT CÁT (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 5 | SAPA – YÊN BÁI – MÙ CANG CHẢI (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 6 | YÊN BÁI – PHÚ THỌ – HÀ NỘI –TP.HCM (Ăn sáng, trưa)</strong></p><p> </p>', 25197000, '2021-11-23', 2, 1, 2, ''),
(8, 2, 7, 10, 2, '2021-11-16', 'Hồ Chí Minh', '<p><strong>NGÀY 1 | TP.HCM – HÀ NỘI – HẠ LONG (Ăn trưa, chiều)</strong></p><p> </p><p><strong>Sáng:</strong> Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất ba tiếng.</p><ul><li>Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý Khách làm thủ tục đón chuyến bay đi Hà Nội.</li><li>Đến sân bay Nội Bài, Hướng Dẫn Viên đón đoàn, Khởi hành đến Hạ Long. Đến núi Yên Tử - ngọn núi cao 1068 m so với mực nước biển, một thắng cảnh thiên nhiên còn lưu giữ hệ thống các di tích lịch sử văn hóa gắn với sự ra đời, hình thành và phát triển của thiền phái Trúc Lâm Yên Tử, được mệnh danh là “đất tổ Phật giáo Việt Nam”.</li></ul><p> </p><p><strong>Trưa:</strong> Dùng cơm trưa.</p><ul><li>Quý khách lên núi bằng cáp treo (chi phí cáp treo tự túc), tham quan chùa Hoa Yên, Bảo Tháp, Trúc Lâm Tam Tổ, Hàng Tùng 700 tuổi…xuống núi tham quan Thiền Viện Trúc Lâm với quả cầu Như Ý nặng 6 tấn được xếp kỷ lục guiness Việt Nam.</li><li>Đoàn khởi hành đến Hạ Long</li></ul><p> </p><p><strong>Tối: </strong>Dùng bữa tối. Nghỉ đêm tại Hạ Long.</p><ul><li>Quý khách tự do dạo phố, mua sắm tại chợ đêm hoặc tham gia khu Sunworld Hạ Long Park với tất cả khu trò chơi trong nhà, ngoài trời hoành tráng có các khu Công viên Rồng, Cáp treo Nữ Hoàng vòng quay Sun wheel…(chi phí tự túc).</li></ul><p> </p><p><strong>NGÀY 2 | HẠ LONG – NINH BÌNH (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 3 | NINH BÌNH – HÀ NỘI (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 4 | HÀ NỘI – LÀO CAI - SAPA (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 5 | SAPA – FANSIPAN – HÀ NỘI (Ăn sáng, trưa, chiều)</strong></p><p> </p><p><strong>NGÀY 6 | HÀ NỘI – TP.HCM (Ăn sáng, trưa)</strong></p><p> </p>', 93468600, '2021-12-02', 2, 1, 3, ''),
(9, 5, 7, 15, 0, '2021-12-07', 'Nam Từ Liêm - Hà Nội', '<p><strong>NGÀY 1 | HÀ NỘI – SAPA – BẢN CÁT CÁT (Ăn trưa, tối)</strong></p><ul><li>05h30: Xe đón Quý khách tại điểm hẹn khởi hành đi Sa Pa. Xe dừng chân dọc đường cao tốc Nội Bài – Lào Cai để quý khách nghỉ ngơi ăn sáng (Chi phí ăn sáng tự túc)</li><li>12h30: Xe đến thị trấn Sa Pa nơi có rất nhiều dân tộc sinh sống như H’mong, Dao, Tày,… Qúy khách ăn trưa tại khách sạn sau đó nhận phòng và nghỉ ngơi (Thời gian nhận phòng từ sau 14h00)</li><li>14h30: HDV đưa quý khách đi thăm Bản Cát Cát nơi sinh sống của người H’Mong đen, một nơi phong cảnh hữu tình tại thung lũng nằm dưới chân đỉnh Fansipan hùng vĩ và HDV địa phương sẽ giới thiệu cho quý khách cuộc sống thường ngày của người dân tộc nơi đây, sau đó quý khách tiếp tục đi bộ đến thác nước Cát Cát, trạm thủy điện Cát Cát của người Pháp xây dựng từ những năm đầu thế kỉ XX. Quý khách vui chơi chụp hình lưu niệm và xe đón quý khách quay trở lại thị trấn Sa Pa.</li><li>Lưu ý: Chuyến đi bộ khám phá khéo dài trong khoảng 2 giờ với quãng đường 2.5 km</li><li>19h00: Đoàn dùng bữa tối tại nhà hàng khách sạn. Sau đó tự do dạo chơi, thưởng thức café phố núi,… Ngủ đêm tại khách sạn trung tâm thị trấn Sapa.</li></ul><p><strong>NGÀY 2 | SAPA – HÀ NỘI (Ăn sáng, trưa)</strong></p><ul><li>06h00: Qúy khách làm thủ tục trả phòng khách sạn và ăn sáng tại khách sạn.</li><li>07h00: Xe đón Quý khách khởi hành ra ga cáp treo Fansipan, đi cáp treo 3 dây dài nhất thế giới với chiều dài 6.292,5m. Quý khách sẽ được ngắm nhìn biểm mây bồng bềnh, thung lũng Mường Hoa và dãy Hoàng Liên Sơn tuyệt đẹp từ trên cao.</li><li>Sau 15 phút đi cáp treo, Quý khách tiếp tục leo bộ 604 bậc thang để đến với đỉnh Fansipan – Nóc nhà Đông Dương. Quý khách chụp hình để lưu lại khoảnh khách đáng nhớ này.</li><li>Sau đó Quý khách trở lại ga cáp treo để di chuyển xuống</li><li>11h30: Quý khách quay trở về thị trấn, ăn trưa tại nhà hàng, sau đó mua đặc sản Sapa về làm quà cho người thân</li><li>14h00: Quý Khách lên xe để trở về Hà Nội.</li><li>21h00: Về đến Hà Nội. Xe đưa Quý khách về điểm đón ban đầu, kết thúc hành trình khám phá thị trấn trong sương và Chinh phục đỉnh Fansipan 2 ngày 1 đêm đầy thú vị. Tạm biệt và hẹn gặp lại Quý khách trong những hành trình du lịch lần sau.</li><li>Ghi chú: Lịch trình thăm quan có thể thay đổi linh hoạt theo thực tế nhưng vẫn đảm bảo đầy đủ các điểm theo chương trình</li></ul>', 28350000, '2021-12-04', 2, 1, 3, ''),
(10, 6, 5, 10, 2, '2021-12-10', 'Hà Nội', '<p><strong>NGÀY 01: HÀ NỘI – BẮC KAN – HỒ BA BỂ (Ăn trưa, tối)</strong></p><p><br><strong>06h00:</strong> HDV đón khách tại điểm hẹn Nhà hát lớn Hà Nội. Xe khởi hành đi Bắc Kạn. Đoàn ăn sáng tại nhà hàng trên đường đi (chi phí tự túc).<br><strong>11h30:</strong> Ăn trưa tại nhà hàng tại ngã ba chợ Rã.</p><p><strong>14h00:</strong> Đến bến Buốc Lốm, hồ Ba Bể. Đoàn lên thuyền thăm quan những cảnh điểm đặc sắc như: Động Puông, Ao Tiên, đảo An Mạ, đảo Bà Góa... Ngồi trên chiếc thuyền lướt nhẹ mặt hồ xanh màu ngọc bích, du khách sẽ thấy như đang lạc vào cõi thần tiên êm đềm. Vẻ đẹp của mây trời, sóng nước nơi đây tựa như một bức tranh sơn thủy hữu tình khiến du khách như quên đi mọi ưu tư, phiền muộn.</p><p>+ Ao tiên, rộng hơn 3.000m2, được bao bọc bởi núi đá vôi và rừng già nguyên sinh. Đến đây du khách được ngắm nhìn những dấu chân trên đá và nghe câu chuyện huyền thoại.<br>+ Đền An Mạ, Tương truyền, trong chiến tranh phong kiến thời Lê - Mạc, các tướng nhà Mạc đã thất trận, chạy đến Động Puông rồi tuẫn tiết tại đó. Cảm kích tinh thần trung liệt, người dân đã dựng đền thờ họ Mạc, song lo bị quan quân nhà Lê dẹp bỏ nên đã đổi tên thành Đền An Mạ.<br>+ Đảo Bà Góa - một hòn đảo nhỏ xinh xắn nằm ngay vị trí trong tâm của Hồ, gắn liền với sự tích hình thành của Hồ.<br><strong>18h00:</strong> Đoàn nhận phòng nghỉ ngơi tại nhà sàn sinh thái trong bản Pác Ngòi của khu du lịch Ba Bể. Ăn tối. Nghỉ đêm tại NHÀ SÀN Ba Bể.</p><p><br><strong>NGÀY 02: BA BỂ - BẢN GIỐC - ĐỘNG NGƯỜM NGAO - CAO BẰNG</strong></p><p> </p><p><strong>Sáng: </strong>Sau bữa sáng, xe và HDV đưa Quý khách khởi hành đi Cao Bằng.</p><p><strong>Trưa:</strong> Quý khách ăn trưa tại nhà hàng.</p><p>Chiều: Quý khách thăm thác Bản Giốc, thác có độ cao 53m, chia làm 3 tầng được coi là thác đẹp nhất Việt Nam và là thác lớn nhất Đông Nam Á. Thác cũng là nơi giáp ranh với nước bạn Trung Hoa với cột mốc chủ quyền thiêng liêng của Tổ Quốc. Đến đây Quý khách có thể chiêm ngưỡng phong cảnh thiên nhiên hùng vĩ với những khối nước khổng lồ từ độ cao 30m đổ xuống trông xa như ba giải lụa trắng tuyệt đẹp (Quý khách có thể tự do chụp hình tại nơi đây). </p><p>Quý khách tiếp tục hành trình thăm Động Ngườm Ngao – một trong những động dài và đẹp nhất Việt Nam với nhiều truyền thuyết phong phú của dân tộc Tày. Vào trong động, Quý khách sẽ được chiêm ngưỡng khu “tứ trụ thiên đình” với những cột đá trông như cột chống trời; khu trung tâm với không gian rộng; khu châu báu là những núi nhũ lấp lánh ánh vàng, ánh bạc.</p><p>Xe đưa Quý khách về khách sạn, nhận phòng nghỉ ngơi.</p><p><strong>Tối: </strong>Quý khách dùng bữa tối tại nhà hàng, tự do dạo chơi, khám phá thị xã Cao Bằng về đêm. Nghỉ đêm tại khách sạn.<br><strong>Sáng:</strong> Quý khách dùng bữa sáng tại nhà hàng. Sau bữa sáng, Xe và HDV đưa Quý khách khởi hành đi thăm quan khu di tích Pắc Bó - nơi Bác Hồ sống và làm việc từ năm 1941-1945, tại đây còn lưu giữ 1 tấm gỗ là giường nằm nghỉ của Chủ tịch Hồ Chí Minh di tích lịch sử gắn liền với chủ tịch Hồ Chí Minh.</p><p>Quý khách tham quan Hang Cốc Pó, suối Lê Nin xanh trong, núi Các Mác….</p><p><strong>Trưa</strong>: Quý khách ăn trưa tại nhà hàng Cao Bằng, nghỉ ngơi.</p><p><strong>Tối: </strong>Đoàn về tới Hà Nội, HDV chia tay đoàn, kết thúc chương trình, hẹn Quý khách trong các chuyến du lịch tiếp theo.</p>', 28272000, '2021-12-08', 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioi_thieu`
--

CREATE TABLE `gioi_thieu` (
  `id` int(11) NOT NULL,
  `noi_dung` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gioi_thieu`
--

INSERT INTO `gioi_thieu` (`id`, `noi_dung`, `ngay_tao`, `trang_thai`) VALUES
(4, '<p><strong>THÔNG TIN CƠ BẢN VỀ CÔNG TY</strong><br>- Tên chính thức : CÔNG TY CỔ PHẦN VNTRAVEL<br>- Tên giao dịch đối ngoại: VNTRAVEL<br>- Hình thức sở hữu: &nbsp;Cổ phần; Thành lập: Ngày 01/11/2021</p><p><strong>TRỤ SỞ CHÍNH</strong><br>- Địa chỉ: Số 3 Trịnh Văn Bô, Nam Từ Liêm, Hà Nội.<br>- Hotline : 1900 xxxx<br>- Tel: (+84 8) 730 xxxx<br>- Website: <a href=\"\">vntravel.domain</a><br>- Email: example@email.com<br><br><strong>TẦM NHÌN</strong></p><ul><li>Trở thành Thương hiệu du lịch được yêu thích nhất của người Việt Nam</li><li>Trở thành Tập đoàn du lịch nghỉ dưỡng Top đầu Đông Nam á</li></ul><p><strong>SỨ MỆNH</strong></p><ul><li>Tạo ra các sản phẩm du lịch phong phú, nhân văn cho mọi gia đình Việt với</li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;GIÁ TRỊ GỐC – &nbsp;CHẤT LƯỢNG CAO&nbsp;</p><ul><li>Chuyển tải vẻ đẹp của các danh lam thắng cảnh, nét văn hóa độc đáo và những thành tựu phát triển mọi mặt của nhân loại tới khách hàng;</li><li>Kết nối, dẫn dắt đem đến cho du khách trải nghiệm thú vị trong từng hành trình đến với những miền đất Việt Nam tươi đẹp và những nền văn minh của các quốc gia trên thế giới.</li></ul><p><strong>CÁC SẢN PHẨM CỦA CÔNG TY</strong></p><ul><li>Tour Cố Định: Tour phục vụ những khách hàng có số lượng thành viên &lt; 7 người và có thời gian đi <strong>cố định</strong></li><li>Tour Linh Động: Tour phục vụ những khách hàng có số lượng thành viên &gt; 7 người và có thời gian đi <strong>linh động</strong> theo <strong>mong muốn của khách hàng</strong>, đặc biệt để nâng cao sự riêng tư và trải nghiệm cho khách hàng, tour sẽ là tour cá nhân (Không ghép tour).</li></ul><p><strong>QUÁ TRÌNH HÌNH THÀNH VÀ PHÁT TRIỂN CỦA DU LỊCH VIỆT</strong></p><ul><li>Được thành lập từ năm 2021 giữa lúc nền kinh tế trong nước và Quốc tế đang rất phát triển, <strong>VNTravel</strong> xuất hiện trên thị trường du lịch Việt Nam với sản phẩm du lịch&nbsp; &nbsp; &nbsp; &nbsp; trong nước chất lượng cao, giá thành rẻ đến bất ngờ.&nbsp;</li><li>Định hướng chiến lược mang tính đột phá tại thời điểm thành lập và đi vào vận hành trong những bước đi chập chững ban đầu của <strong>VNTravel</strong> đó là: Thay vì tập trung vào quảng cáo, đầu tư hệ thống bán hàng theo cách truyền thống làm tăng chi phí cố định dẫn đến tăng giá thành tour, Du lịch Việt đã tập trung đầu tư vốn vào chất lượng dịch vụ và xây dựng nguồn nhân lực để giữ dịch vụ được ổn định, tốt nhất cho du khách trong mọi thời điểm.</li></ul><p><i><strong>Công ty VNTravel</strong> luôn nỗ lực hết mình và không ngừng sáng tạo, đổi mới, phấn đấu trở thành công ty quy mô và chuyên nghiệp nhất trong lĩnh vực du lịch lữ hành. Với tầm nhìn xa của Ban Lãnh đạo công ty, hướng dẫn viên năng động, chuyên nghiệp; Kết hợp thế mạnh về nguồn tài chính vững chắc, mối quan hệ bền vững với các đối tác trong và ngoài nước; Công ty đã và ngày càng xây dựng nhiều sản phẩm du lịch và loại hình du lịch đa dạng phục vụ nhu cầu của khách hàng; Đem lại sự hài lòng, thoải mái, sự trải nghiệm thú vị trong từng chuyến thưởng ngoạn du lịch đầy đam mê và hấp dẫn cùng Du Lịch Việt.</i></p>', '2021-11-29', 1),
(5, 'TRỤ SỞ CHÍNH\r\n- Địa chỉ: 95B-97-99 Trần Hưng Đạo, Q.1, TPHCM.\r\n- Hotline : 1900 1177\r\n- Tel: (+84 8) 730 56789       \r\n- Website: www.dulichviet.com.vn\r\n- Email: info@dulichviet.com.vn', '2021-11-29', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten`, `email`, `mat_khau`, `sdt`, `ngay_tao`, `trang_thai`) VALUES
(5, 'Trần Văn Nam', 'namtvph13226@fpt.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', '0839551901', '2021-11-15', 1),
(7, 'Trần Nam', 'vannamhdvt@gmail.com', 'c9740b276a32f2066522ee3362ae90aa', '0369852147', '2021-11-20', 1),
(8, 'nghia', 'nghiatqph13235@fpt.edu.vn', '4297f44b13955235245b2497399d7a93', '0123456789', '03 12 2021', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_san`
--

CREATE TABLE `khach_san` (
  `id` int(11) NOT NULL,
  `ten_ks` varchar(255) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL,
  `id_dc` tinyint(1) NOT NULL DEFAULT 0,
  `dia_chi_ct` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `ngay_tao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khach_san`
--

INSERT INTO `khach_san` (`id`, `ten_ks`, `anh`, `mo_ta`, `id_dc`, `dia_chi_ct`, `sdt`, `trang_thai`, `ngay_tao`) VALUES
(12, 'hotel7', 'facebook-twitter-logos1-ss-192-1211-8848-1633665202.jpg', 'skfjksldjflksdjflsd', 2, 'Vĩnh lộc 2', 123948576, 1, '2021-11-15'),
(13, 'hotel2', '', 'SDFASDFASDF', 2, 'Vĩnh lộc - phùng xá - Thạch thát2', 123987654, 1, '2021-11-15'),
(14, 'hotel8', '360-1632992111-9036-1633426045.png', 'klfsdklfjklsdf', 2, 'Vĩnh lộc 9', 123948576, 1, '2021-11-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong_tien`
--

CREATE TABLE `phuong_tien` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bien_so` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_ghe` int(11) NOT NULL,
  `anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1,
  `ngay_ban` datetime DEFAULT NULL,
  `ngay_hoat_dong` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phuong_tien`
--

INSERT INTO `phuong_tien` (`id`, `ten`, `bien_so`, `so_ghe`, `anh`, `ngay_tao`, `trang_thai`, `ngay_ban`, `ngay_hoat_dong`) VALUES
(6, 'Trần Chí Công', '30-F1 999.13', 12, 'anh1.png.jpg', '2021-11-14', 1, NULL, NULL),
(7, 'Trần Chí Công', '30-F1 999.12', 1, 'anh1.png.jpg', '2021-11-14', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `ten_slide` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `ten_slide`, `image`, `url`, `ngay_tao`, `trang_thai`) VALUES
(3, 'slide3', 'slider1.jpg', 'url_slide4', '2021-11-24', 1),
(5, 'Slider1', 'slider2.jpg', 'urrl', '2021-11-29', 1),
(6, 'Slider2', 'slider3.jpg', 'url', '2021-11-29', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_diachi` int(11) NOT NULL,
  `anh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `ngay_di` date DEFAULT NULL,
  `ngay_den` date DEFAULT NULL,
  `noi_di` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thong_tin` varchar(10000) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `gia` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `khuyen_mai` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `luot_xem` int(11) NOT NULL DEFAULT 0,
  `ngay_tao` date NOT NULL,
  `ngay_sua` date NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`id`, `ten`, `id_diachi`, `anh`, `id_danhmuc`, `ngay_di`, `ngay_den`, `noi_di`, `mo_ta`, `thong_tin`, `gia`, `khuyen_mai`, `luot_xem`, `ngay_tao`, `ngay_sua`, `trang_thai`) VALUES
(1, 'Du lịch Nha Trang - Đà Lạt', 5, 'NHA-TRANG-DA-LAT759370251311.png', 1, NULL, NULL, 'Nha Trang', '<p><strong>Nha Trang - Dốc Lết - Tắm Khoáng - Vinpearland - Đà Lạt - QUÊ Garden - Kim Ngân Hills - Thiền Viện Trúc Lâm</strong></p><p><strong>5 ngày 4 đêm</strong></p>', '<p><strong>NGÀY 1 | TP.HCM – ĐÀ LẠT (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>Sáng&nbsp;&nbsp; &nbsp;Xe và Hướng Dẫn Viên Du Lịch Việt đón Quý khách tại điểm hẹn, khởi hành đi Đà Lạt.</strong></p><ul><li>Đoàn dùng bữa sáng tại Ngã Ba Dầu Dây. Đoàn tiếp tục khởi hành đến TP. Đà Lạt.</li></ul><p>&nbsp;</p><p><strong>Trưa:&nbsp;&nbsp; &nbsp;Dùng cơm trưa tại nhà hàng.</strong></p><ul><li>Tham quan Thiền Viện Trúc Lâm, đi cáp treo qua đồi Rôbin (chi phí tự túc), ngắm cảnh rừng thông, hồ Tuyền Lâm, núi Phượng Hoàng từ trên cao.</li><li>Đoàn đến Đà Lạt, đến Quảng trường Lâm Viên với tuyệt tác kiến trúc bằng kính: Bông Hoa Dã Quỳ và Nụ Hoa Atiso.</li></ul><p>&nbsp;</p><p><strong>Tối:&nbsp;&nbsp; &nbsp;Dùng cơm tối, nhận phòng nghỉ ngơi</strong></p><ul><li>Quý khách tự túc dạo thành phố Đà Lạt về đêm, ngắm cảnh Hồ Xuân Hương, thưởng thức hương vị cà phê phố núi (chi phí tự túc). Nghỉ đêm khách sạn tại Đà Lạt.</li></ul><p>&nbsp;</p><p><strong>NGÀY 2 | QUÊ GARDEN – ĐÀ LẠT VIEW – KIM NGÂN HILLS ( Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 3 | ĐÀ LẠT - NHA TRANG – THÁP BÀ PONAGAR (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 4 | NHA TRANG – DỐC LẾT – SUỐI KHOÁNG THÁP BÀ – VINPEARLLAND</strong></p><p>&nbsp;</p><p><strong>NGÀY 5 | NHA TRANG – TP. HỒ CHÍ MINH (Ăn sáng, trưa)</strong></p>', '4099000', '', 0, '2021-11-15', '2021-11-23', 1),
(2, 'Du lịch Hà Nội - Yên Tử - Hạ Long - Tràng An - Sa Pa', 1, '700345404987.jpg', 2, '2021-11-16', '2021-11-19', 'Hồ Chí Minh', '<p><strong>Hà Nội - Yên Tử - Hạ Long - Chùa Bái Đính - Tràng An - Sapa - Bản Cát Cát - Đỉnh Fansipan</strong></p><p><strong>6 ngày 5 đêm</strong></p>', '<p><strong>NGÀY 1 | TP.HCM – HÀ NỘI – HẠ LONG (Ăn trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>Sáng:</strong> Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất ba tiếng.</p><ul><li>Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý Khách làm thủ tục đón chuyến bay đi Hà Nội.</li><li>Đến sân bay Nội Bài, Hướng Dẫn Viên đón đoàn, Khởi hành đến Hạ Long. Đến núi Yên Tử - ngọn núi cao 1068 m so với mực nước biển, một thắng cảnh thiên nhiên còn lưu giữ hệ thống các di tích lịch sử văn hóa gắn với sự ra đời, hình thành và phát triển của thiền phái Trúc Lâm Yên Tử, được mệnh danh là “đất tổ Phật giáo Việt Nam”.</li></ul><p>&nbsp;</p><p><strong>Trưa:</strong> Dùng cơm trưa.</p><ul><li>Quý khách lên núi bằng cáp treo (chi phí cáp treo tự túc), tham quan chùa Hoa Yên, Bảo Tháp, Trúc Lâm Tam Tổ, Hàng Tùng 700 tuổi…xuống núi tham quan Thiền Viện Trúc Lâm với quả cầu Như Ý nặng 6 tấn được xếp kỷ lục guiness Việt Nam.</li><li>Đoàn khởi hành đến Hạ Long</li></ul><p>&nbsp;</p><p><strong>Tối: </strong>Dùng bữa tối. Nghỉ đêm tại Hạ Long.</p><ul><li>Quý khách tự do dạo phố, mua sắm tại chợ đêm hoặc tham gia khu Sunworld Hạ Long Park với tất cả khu trò chơi trong nhà, ngoài trời hoành tráng có các khu Công viên Rồng, Cáp treo Nữ Hoàng vòng quay Sun wheel…(chi phí tự túc).</li></ul><p>&nbsp;</p><p><strong>NGÀY 2 | HẠ LONG – NINH BÌNH (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 3 | NINH BÌNH – HÀ NỘI (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 4 | HÀ NỘI – LÀO CAI - SAPA (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 5 | SAPA – FANSIPAN – HÀ NỘI (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 6 | HÀ NỘI – TP.HCM (Ăn sáng, trưa)</strong></p><p>&nbsp;</p>', '8199000', '', 0, '2021-11-15', '2021-11-17', 1),
(3, 'Du lịch Miền Bắc Hà Nội - Mộc Châu - Sơn La - Điện Biên - Sa Pa - Phú Thọ - Đền Hùng', 1, 'Tour-tay-bac.jpg', 2, '2021-11-16', '2021-11-20', 'Hồ Chí Minh', '<p><strong>Tây Bắc: Du lịch Hè Hà Nội - Mộc Châu - Sơn La - Điện Biên - Sa Pa - Phú Thọ - Đền Hùng</strong></p><p><strong>6 ngày 5 đêm</strong></p>', '<p><strong>NGÀY 1 | TP.HCM – HÀ NỘI – HÒA BÌNH – MAI CHÂU – MỘC CHÂU (Ăn trưa, chiều)</strong></p><p>&nbsp;</p><p>&nbsp;</p><p>Sáng: Quý khách có mặt tại ga quốc nội, sân bay Tân Sơn Nhất trước giờ bay ít nhất hai tiếng. Đại diện công ty Du Lịch Việt đón và hỗ trợ Quý khách làm thủ tục đón chuyến bay đi Hà Nội.</p><ul><li>Đến sân bay Nội Bài, xe đón Đoàn khởi hành đến Mai Châu.</li><li>Trên đường đến Hòa Bình, Quý khách có dịp ngắm nhìn Nhà máy thủy điện sông Đà (còn gọi là thủy điện Hòa Bình)</li><li>Chiêm ngưỡng toàn cảnh tuyệt đẹp của thung lũng Mai Châu trên đoạn đường đèo Thung Khe.</li></ul><p>&nbsp;</p><p>&nbsp;</p><p>Trưa: Dùng cơm trưa.</p><ul><li>Đoàn tiếp tục khởi hành đến Mai Châu, tham quan Bản Lác tìm hiểu phong tục tập quán của bản làng người Thái, nơi in đậm bản sắc văn hóa người Thái.</li><li>Rời Mai Châu, Đoàn khởi hành đến Cao Nguyên Mộc Châu nổi tiếng với những đồi chè xanh mướt trải dài đến tận bên kia quả đồi</li></ul><p>&nbsp;</p><p>Tối: Dùng cơm chiều. Nghỉ đêm Mộc Châu.</p><p><strong>NGÀY 2 | MỘC CHÂU – SƠN LA – ĐIỆN BIÊN (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 3 | ĐIỆN BIÊN – MƯỜNG LAY – SAPA (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 4 | SAPA – FANSIPAN – BẢN CÁT CÁT (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 5 | SAPA – YÊN BÁI – MÙ CANG CHẢI (Ăn sáng, trưa, chiều)</strong></p><p>&nbsp;</p><p><strong>NGÀY 6 | YÊN BÁI – PHÚ THỌ – HÀ NỘI –TP.HCM (Ăn sáng, trưa)</strong></p><p>&nbsp;</p>', '8399000', '', 0, '2021-11-15', '2021-11-23', 1),
(4, 'DU LỊCH SAPA', 1, 'photo-1-1590288752660121049893-crop-1590289164370580694377.jpg', 1, NULL, NULL, 'Hải Phòng', '<p>- Du lịch Sapa: tham quan nhà thờ Đá, núi Hàm Rồng, ...&nbsp;</p><p>- Đặc biệt quý khách có cơ hội chinh phục đình Fasipan</p>', '<p><strong>NGÀY 1 : HẢI PHÒNG – SAPA – KHÁM PHÁ CHỢ ĐÊM SAPA (Ăn trưa, tối)</strong><br>06:45 Quý khách có mặt tại bến xe, lên xe giường nằm khởi hành đi <strong>Sapa </strong>(dự kiến 07:00).<br>Chiều: Đến Sapa, Hướng dẫn viên đón đoàn đưa đi ăn trưa sau đó về khách sạn nhận phòng, nghỉ ngơi. 15h00: Quý khách tự do <strong>khám phá Sapa như Nhà Thờ Đá, Hồ Sapa, </strong>Mua sắm đồ tại các dãy phố ...18h00: Sau bữa tối, quý khách đi <strong>chợ tình SaPa</strong> (nếu vào tối thứ 7) - một nét văn hóa đặc sắc của đồng bào dân tộc thiểu số tại vùng núi Tây Bắc và&nbsp; tự do dạo chơi chợ đêm Sapa, thưởng thức các món nướng đặc sắc vùng cao.</p><p><strong>NGÀY 2 : SAPA – CÁT CÁT – HÀM RỒNG (Ăn sáng, trưa, tối)</strong><br>Quý khách dùng bữa sáng tại khách sạn . 07h30: HDV và xe đưa đoàn đi tham quan <strong>bản Cát Cát</strong>, bản của người H’Mông đen, thăm <strong>thác nước Cát Cát</strong>, <strong>thuỷ điện Cát cát</strong> nơi có ba con suối gặp nhau tạo thành thung lũng Mường Hoa quý khách chụp ảnh lưu niệm. Ăn trưa.<br>14h30 HDV đưa quý khách đi tham quan <strong>khu du lịch núi Hàm Rồng</strong> - hòa mình trong bốn bề của các loài hoa &amp; ngắm nhìn toàn cảnh thị trấn Sapa, xem biểu diễn của những chàng trai cô gái trong điệu khèn, điệu múa đặc trưng của dân tộc&nbsp; miền Tây Bắc…18h00: Quý khách dùng bữa tối tại nhà hang, sau bữa tối Quý khách tự do dạo chơi và khám phá thị trấn Sapa về đêm.</p><p><strong>NGÀY 3 : CHINH PHỤC FANSIPAN– LÀO CAI - HẢI PHÒNG (Ăn sáng, trưa)</strong><br>Quý khách dùng bữa sáng tại khách sạn. .HDV đưa Quý khách tới nhà Ga SAPA, quý khách trải nghiệm<strong> tàu hỏa leo núi Mường Hoa (TỰ TÚC CHI PHÍ)</strong> ngắm nhìn khung cảnh thiên nhiên hùng vĩ của thung lũng Mường Hoa với núi đồi trập trùng. Đến Ga cáp treo, du khách sẽ tiếp tục hành trình khám phá Sun World Fansipan Legend với cáp treo ba dây hiện đại nhất thế giới băng qua <strong>dãy Hoàng Liên Sơn, chinh phục đỉnh Fansipan</strong> - nóc nhà Đông Dương và chiêm bái quần thể văn hóa tâm linh trên đỉnh Fansipan. (TỰ TÚC CHI PHÍ)<br>11h30: Quý khách về nhà hàng dùng bữa trưa, trả phòng khách sạn sau đó quý khách tự do đi chợ Sapa mua sắm về làm quà cho người thân. Quý khách có mặt tại văn phòng xe hoặc bến xe Sapa, lên xe giường nằm khởi hành về Hà Nội (dự kiến chuyến 13:30 hoặc 16:00- tùy ngày khởi hành). Về đến tp Hải Phòng, Quý khách tự túc phương tiện trở về nhà. Kết thúc chương trình tham quan.</p>', '2350000', '', 0, '2021-11-17', '2021-11-18', 1),
(5, 'Du lịch Hà Nội - Sapa', 1, 'du-lich-sapa-tham-quan-nha-tho-da-du-lich-viet.jpg', 1, NULL, NULL, 'Hà Nội', '<p><i>Du lịch Hà Nội - Sapa - Bản Cát Cát - Fansipan &nbsp;từ Hà Nội - Sapa - một thị trấn nhỏ cổ kính nằm trong lòng dãy Hoàng Liên Sơn là cái tên đã đi vào tâm khảm của nhiều du khách. Một mảnh đất bình yên nhưng ẩn chứa biết bao điều kỳ diệu của tạo hó', '<p><strong>NGÀY 1 | HÀ NỘI – SAPA – BẢN CÁT CÁT (Ăn trưa, tối)</strong></p><ul><li>05h30: Xe đón Quý khách tại điểm hẹn khởi hành đi Sa Pa. Xe dừng chân dọc đường cao tốc Nội Bài – Lào Cai để quý khách nghỉ ngơi ăn sáng (Chi phí ăn sáng tự túc)</li><li>12h30: Xe đến thị trấn Sa Pa nơi có rất nhiều dân tộc sinh sống như H’mong, Dao, Tày,… Qúy khách ăn trưa tại khách sạn sau đó nhận phòng và nghỉ ngơi (Thời gian nhận phòng từ sau 14h00)</li><li>14h30: HDV đưa quý khách đi thăm Bản Cát Cát nơi sinh sống của người H’Mong đen, một nơi phong cảnh hữu tình tại thung lũng nằm dưới chân đỉnh Fansipan hùng vĩ và HDV địa phương sẽ giới thiệu cho quý khách cuộc sống thường ngày của người dân tộc nơi đây, sau đó quý khách tiếp tục đi bộ đến thác nước Cát Cát, trạm thủy điện Cát Cát của người Pháp xây dựng từ những năm đầu thế kỉ XX. Quý khách vui chơi chụp hình lưu niệm và xe đón quý khách quay trở lại thị trấn Sa Pa.</li><li>Lưu ý: Chuyến đi bộ khám phá khéo dài trong khoảng 2 giờ với quãng đường 2.5 km</li><li>19h00: Đoàn dùng bữa tối tại nhà hàng khách sạn. Sau đó tự do dạo chơi, thưởng thức café phố núi,… Ngủ đêm tại khách sạn trung tâm thị trấn Sapa.</li></ul><p><strong>NGÀY 2 | SAPA – HÀ NỘI (Ăn sáng, trưa)</strong></p><ul><li>06h00: Qúy khách làm thủ tục trả phòng khách sạn và ăn sáng tại khách sạn.</li><li>07h00: Xe đón Quý khách khởi hành ra ga cáp treo Fansipan, đi cáp treo 3 dây dài nhất thế giới với chiều dài 6.292,5m. Quý khách sẽ được ngắm nhìn biểm mây bồng bềnh, thung lũng Mường Hoa và dãy Hoàng Liên Sơn tuyệt đẹp từ trên cao.</li><li>Sau 15 phút đi cáp treo, Quý khách tiếp tục leo bộ 604 bậc thang để đến với đỉnh Fansipan – Nóc nhà Đông Dương. Quý khách chụp hình để lưu lại khoảnh khách đáng nhớ này.</li><li>Sau đó Quý khách trở lại ga cáp treo để di chuyển xuống</li><li>11h30: Quý khách quay trở về thị trấn, ăn trưa tại nhà hàng, sau đó mua đặc sản Sapa về làm quà cho người thân</li><li>14h00: Quý Khách lên xe để trở về Hà Nội.</li><li>21h00: Về đến Hà Nội. Xe đưa Quý khách về điểm đón ban đầu, kết thúc hành trình khám phá thị trấn trong sương và Chinh phục đỉnh Fansipan 2 ngày 1 đêm đầy thú vị. Tạm biệt và hẹn gặp lại Quý khách trong những hành trình du lịch lần sau.</li><li>Ghi chú: Lịch trình thăm quan có thể thay đổi linh hoạt theo thực tế nhưng vẫn đảm bảo đầy đủ các điểm theo chương trình</li></ul>', '1890000', '', 0, '2021-12-03', '0000-00-00', 1),
(6, 'Tour Hà Nội - Hồ Ba Bể - Thác Bản Giốc', 4, '5edefb9ce95d4b8ee7ee074c2828182d.jpg', 2, '2021-12-10', '2021-12-12', 'Hà Nội', '<p><strong>Tour du lịch Hồ Ba Bể - Thác bản Giốc</strong>: Một chuyến du lịch kết hợp hai địa điểm đẹp của vùng núi phía Bắc Tổ quốc. Thác Bản Giốc - một trong những thác nước đẹp và lớn nhất thế giới và Hồ Ba bể - một thắng cảnh tuyệt đẹp ở Bắc Kạn.&nbsp', '<p><strong>NGÀY 01: HÀ NỘI – BẮC KAN – HỒ BA BỂ (Ăn trưa, tối)</strong></p><p><br><strong>06h00:</strong> HDV đón khách tại điểm hẹn Nhà hát lớn Hà Nội. Xe khởi hành đi Bắc Kạn. Đoàn ăn sáng tại nhà hàng trên đường đi (chi phí tự túc).<br><strong>11h30:</strong> Ăn trưa tại nhà hàng tại ngã ba chợ Rã.</p><p><strong>14h00:</strong> Đến bến Buốc Lốm, hồ Ba Bể. Đoàn lên thuyền thăm quan những cảnh điểm đặc sắc như: Động Puông, Ao Tiên, đảo An Mạ, đảo Bà Góa... Ngồi trên chiếc thuyền lướt nhẹ mặt hồ xanh màu ngọc bích, du khách sẽ thấy như đang lạc vào cõi thần tiên êm đềm. Vẻ đẹp của mây trời, sóng nước nơi đây tựa như một bức tranh sơn thủy hữu tình khiến du khách như quên đi mọi ưu tư, phiền muộn.</p><p>+ Ao tiên, rộng hơn 3.000m2, được bao bọc bởi núi đá vôi và rừng già nguyên sinh. Đến đây du khách được ngắm nhìn những dấu chân trên đá và nghe câu chuyện huyền thoại.<br>+ Đền An Mạ, Tương truyền, trong chiến tranh phong kiến thời Lê - Mạc, các tướng nhà Mạc đã thất trận, chạy đến Động Puông rồi tuẫn tiết tại đó. Cảm kích tinh thần trung liệt, người dân đã dựng đền thờ họ Mạc, song lo bị quan quân nhà Lê dẹp bỏ nên đã đổi tên thành Đền An Mạ.<br>+ Đảo Bà Góa - một hòn đảo nhỏ xinh xắn nằm ngay vị trí trong tâm của Hồ, gắn liền với sự tích hình thành của Hồ.<br><strong>18h00:</strong> Đoàn nhận phòng nghỉ ngơi tại nhà sàn sinh thái trong bản Pác Ngòi của khu du lịch Ba Bể. Ăn tối. Nghỉ đêm tại NHÀ SÀN Ba Bể.</p><p><br><strong>NGÀY 02: BA BỂ - BẢN GIỐC - ĐỘNG NGƯỜM NGAO - CAO BẰNG</strong></p><p>&nbsp;</p><p><strong>Sáng: </strong>Sau bữa sáng, xe và HDV đưa Quý khách khởi hành đi Cao Bằng.</p><p><strong>Trưa:</strong> Quý khách ăn trưa tại nhà hàng.</p><p>Chiều: Quý khách thăm thác Bản Giốc, thác có độ cao 53m, chia làm 3 tầng được coi là thác đẹp nhất Việt Nam và là thác lớn nhất Đông Nam Á. Thác cũng là nơi giáp ranh với nước bạn Trung Hoa với cột mốc chủ quyền thiêng liêng của Tổ Quốc. Đến đây Quý khách có thể chiêm ngưỡng phong cảnh thiên nhiên hùng vĩ với những khối nước khổng lồ từ độ cao 30m đổ xuống trông xa như ba giải lụa trắng tuyệt đẹp (Quý khách có thể tự do chụp hình tại nơi đây).&nbsp;</p><p>Quý khách tiếp tục hành trình thăm Động Ngườm Ngao – một trong những động dài và đẹp nhất Việt Nam với nhiều truyền thuyết phong phú của dân tộc Tày. Vào trong động, Quý khách sẽ được chiêm ngưỡng khu “tứ trụ thiên đình” với những cột đá trông như cột chống trời; khu trung tâm với không gian rộng; khu châu báu là những núi nhũ lấp lánh ánh vàng, ánh bạc.</p><p>Xe đưa Quý khách về khách sạn, nhận phòng nghỉ ngơi.</p><p><strong>Tối:&nbsp;</strong>Quý khách dùng bữa tối tại nhà hàng, tự do dạo chơi, khám phá thị xã Cao Bằng về đêm. Nghỉ đêm tại khách sạn.<br><strong>Sáng:</strong> Quý khách dùng bữa sáng tại nhà hàng. Sau bữa sáng, Xe và HDV đưa Quý khách khởi hành đi thăm quan khu di tích Pắc Bó - nơi Bác Hồ sống và làm việc từ năm 1941-1945, tại đây còn lưu giữ 1 tấm gỗ là giường nằm nghỉ của Chủ tịch Hồ Chí Minh di tích lịch sử gắn liền với chủ tịch Hồ Chí Minh.</p><p>Quý khách tham quan Hang Cốc Pó, suối Lê Nin xanh trong, núi Các Mác….</p><p><strong>Trưa</strong>: Quý khách ăn trưa tại nhà hàng Cao Bằng, nghỉ ngơi.</p><p><strong>Tối: </strong>Đoàn về tới Hà Nội, HDV chia tay đoàn, kết thúc chương trình, hẹn Quý khách trong các chuyến du lịch tiếp theo.</p>', '2480000', '', 0, '2021-12-08', '2021-12-08', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idtour` (`id_tour`),
  ADD KEY `FK_idkh` (`id_kh`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tour` (`id_tour`),
  ADD KEY `id_kh` (`id_kh`);

--
-- Chỉ mục cho bảng `gioi_thieu`
--
ALTER TABLE `gioi_thieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_san`
--
ALTER TABLE `khach_san`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phuong_tien`
--
ALTER TABLE `phuong_tien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_danhmuc` (`id_danhmuc`),
  ADD KEY `id_diachi` (`id_diachi`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `gioi_thieu`
--
ALTER TABLE `gioi_thieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `khach_san`
--
ALTER TABLE `khach_san`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `phuong_tien`
--
ALTER TABLE `phuong_tien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `FK_idkh` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `FK_idtour` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id`),
  ADD CONSTRAINT `id_tour` FOREIGN KEY (`id_tour`) REFERENCES `tour` (`id`);

--
-- Các ràng buộc cho bảng `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `id_danhmuc` FOREIGN KEY (`id_danhmuc`) REFERENCES `danh_muc` (`id`),
  ADD CONSTRAINT `id_diachi` FOREIGN KEY (`id_diachi`) REFERENCES `dia_chi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
