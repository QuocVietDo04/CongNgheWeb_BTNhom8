-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 04, 2024 lúc 07:59 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tintuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Tin KHCN và HTQT'),
(2, 'Tin đào tạo'),
(3, 'Tin tức chung'),
(4, 'Tin công tác sinh viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `category_id`) VALUES
(1, 'Hội thảo đề xuất một số giải pháp nhằm khắc phục\r\nxói lở tại bờ biển Bảo Ninh, thành phố Đồng Hới,\r\ntỉnh Quảng Bình', 'Trong những ngày gần đây, hiện tượng bãi biển khu vực Bảo Ninh, đặc biệt là\r\nkhu vực bãi tắm liên tục bị xói lở nặng nề. Ghi nhận thời gian qua, mặc dù thời\r\ntiết không có mưa to gió lớn nhưng bãi biển du lịch Bảo Ninh bị sóng biển làm xói\r\nlở bãi cát khối lượng rất lớn và diện tích bãi cát bị nước biển cuốn đi tạo thành\r\nvực lớn trước bờ biển, tình trạng xói lở diễn ra rất nhanh.', '1 OLP.jpg', '2024-12-01 08:30:00', 1),
(2, 'Tập huấn về an toàn đập tại Bình Định - Dự án An\r\ntoàn đập Việt Nam – New Zealand pha 3', 'Trong khuôn khổ Pha 3 Dự án An toàn đập Việt Nam – New Zealand, Trường Đại\r\nhọc Thủy lợi kết hợp với Công ty Dam Watch và Viện GNS của New Zealand đã\r\ntiến hành lớp tập huấn về an toàn đập cho các cán bộ quản lý, kỹ sư trực tiếp\r\nquản lý các công trình hồ đập thủy lợi, thủy điện trên địa bàn tỉnh Bình Định.', '1652.jpg', '2024-12-01 10:15:00', 1),
(3, 'Hội nghị Quốc tế GEOTEC HANOI 2023 sắp diễn\r\nra tại Hà Nội, Việt Nam', 'Hội nghị Quốc tế lần thứ 5 về địa kỹ thuật để phát triển cơ sở hạ tầng bền vững,\r\nGEOTEC HANOI 2023 (https://geotechn.vn/), sẽ chính thức được tổ chức tại\r\nTrung tâm Hội nghị Quốc gia (NCC), Hà Nội, Việt Nam vào ngày 14 và 15 tháng\r\n12 năm 2023.', '1578.jpg', '2024-12-02 09:45:00', 1),
(4, 'Trường Đại học Thủy lợi nhận Dự án khoa học\r\ncông nghệ 5,5 tỷ đồng từ Quỹ Đổi mới sáng tạo\r\nVingroup', 'Ngày 16/01/2024 tại Hà Nội, Quỹ Đổi mới sáng tạo Vingroup (VINIF) vừa thông\r\nbáo phê duyệt tài trợ cho dự án “Nghiên cứu hệ thống quản lý nhiệt dành cho pin,\r\nthiết bị điện tử công suất và các thiết bị công suất khác của xe điện” do TS. Phan\r\nBình Nguyên, giảng viên Khoa Cơ khí, Trường Đại học Thủy lợi làm chủ nhiệm.', '1632.jpg', '2024-12-02 14:20:00', 1),
(5, 'GS.Susan Solomon, Viện công nghệ Masachusetts,Hoa Kỳ chia sẻ về biến đổi khí hậu', 'Biến đổi khí hậu đang là vấn đề gây nhiều sự chú ý và ảnh hưởng trực tiếp đến\r\nđời sống. Một trong những nguyên nhân dẫn đến sự biến đổi khí hậu đó là do lỗ\r\nthủng tầng ozone.', '1664.jpg', '2023-12-14 13:26:07', 1),
(6, 'PGS TS Lê Văn Chính: Nghề giáo vừa là “duyên”,vừa là thách thức', 'Trong hành trình hơn 8 năm gắn bó với giáo dục, PGS TS Lê Văn Chính – Phụ\r\ntrách Khoa Kinh tế và Quản lý (Trường Đại học Thủy Lợi) đã truyền cảm hứng và\r\nđồng hành cùng nhiều thế hệ sinh viên. Với Thầy, giảng dạy không chỉ là truyền\r\ntải kiến thức mà còn là quá trình chia sẻ, khích lệ, hướng dẫn sinh viên trên con\r\nđường phát triển bản thân và sự nghiệp.', '2 OLP.jpg', '2024-12-14 13:27:58', 2),
(7, 'Trường Đại học Thủy lợi tổ chức thành công buổi bảo vệ luận án tiến sĩ của NCS Phạm Lan Anh', 'Sáng ngày 01/11/2024, tại phòng 5, nhà K1, Trường Đại học Thủy lợi, buổi bảo\r\nvệ luận án tiến sĩ cấp Trường của nghiên cứu sinh Phạm Lan Anh đã diễn ra\r\nthành công.', '3 OLP.jpg', '2024-12-15 13:29:10', 2),
(8, 'Lễ ký kết Biên bản ghi nhớ hợp tác giữa Trường Đại học Thủy lợi (TLU), Hội Thủy lợi Việt Nam (VWRA) và Hiệp hội quốc tế về Nghiên cứu và kỹ thuật thủy văn môi trường (IAHR).', 'Ngày 01/02/2024, tại Trường Đại học Thủy lợi (TLU) đã diễn ra Lễ ký kết Biên\r\nbản ghi nhớ (MOU) hợp tác giữa TLU, Hội Thủy lợi Việt Nam (VWRA) và Hiệp\r\nhội quốc tế về Nghiên cứu và kỹ thuật thủy văn môi trường (IAHR). Lễ ký kết\r\nđánh dấu bước tiến quan trọng trong việc tăng cường hợp tác nghiên cứu, đào\r\ntạo và trao đổi chuyên môn trong lĩnh vực tài nguyên nước và môi trường giữa\r\ncác bên.', 'NZ.jpg', '2024-12-31 13:29:10', 2),
(9, 'Trường Đại học Thủy lợi hợp tác với Ai20X và\r\nWenet đào tạo nguồn nhân lực bán dẫn', 'Ngày 18/12/2023, Trường Đại học Thủy lợi đã có buổi làm việc với Tập đoàn\r\nAi20X và Công ty Wenet (Hoa Kỳ) về “Mô hình đào tạo nguồn nhân lực chíp bán\r\ndẫn - Semi conductor và giải pháp thúc đẩy hệ sinh thái công nghệ đổi mới sáng\r\ntạo từ ứng dụng công nghệ điện toán biên WENET”.', 'NZ1_1.jpg', '2024-12-01 13:31:02', 2),
(10, 'NCS Tăng Xuân Thọ bảo vệ luận án tiến sĩ cấp\r\nTrường', 'Ngày 9/12, Trường Đại học Thủy lợi tổ chức bảo vệ luận án tiến sĩ cấp Trường\r\ncho NCS Tăng Xuân Thọ', 'TLU-map.png', '2024-12-15 13:31:40', 2),
(11, 'Trường Đại học Thủy lợi gặp mặt LHS nước ngoài nhân dịp Quốc khánh', 'TLU – Chiều 2/12, tại P225/A2, Trường Đại học Thủy lợi tổ chức buổi gặp mặt\r\nlưu học sinh nhân dịp Quốc khánh nước CHDCND Lào (02/12), Vương quốc\r\nCămpuchia (09/11). Buổi gặp có sự chủ trì của GS.TS Nguyễn Trung Việt – Phó\r\nHiệu trưởng Nhà trường.', 'XoiloQB_1.jpg', '2024-11-03 13:33:28', 3),
(12, 'Đội tuyển Olympic Vật lý giành Giải Nhì toàn đoàn Khai giảng Khóa bồi dưỡng Lý luận chính trị dành cho đối tượng kết nạp Đảng', 'Sáng 1/12, tại Trường Đại học Khoa học (Đại học Thái Nguyên) đã diễn ra Lễ bế mạc Olympic Vật lý sinh viên toàn quốc lần thứ 26 năm 2024.', 'bb1.jpg', '2024-10-15 13:33:28', 3),
(13, 'Kế hoạch Bổ nhiệm chức danh Giáo sư, Phó giáo sư năm 2024', 'Ngày 21/11/2024, Hiệu trưởng đã ký duyệt Kế hoạch số 1009/KH-ĐHTL về việc\r\nBổ nhiệm chức danh Giáo sư, Phó giáo sư của Trường Đại học Thủy lợi năm\r\n2024 (kèm theo nhu cầu bổ nhiệm chức danh giáo sư, phó giáo sư)', 'cd1.jpg', '2024-08-23 13:40:12', 3),
(14, 'Gặp mặt đội tuyển dự thi Oympic Vật lý toàn quốc trước kỳ thi', 'TLU) – “Chuẩn bị tốt nhất để đạt được điểm rơi phong độ tốt nhất và giành giải\r\ncao nhất”', 'dv1.jpg', '2024-06-01 13:41:01', 3),
(15, 'Giải thưởng Loa Thành 2024: Tôn vinh tài năng trẻ ngành Xây dựng và Kiến trúc', 'Ngày 23/11/2024, tại Hà Nội, Lễ trao giải Loa Thành – sự kiện danh giá hàng đầu\r\ndành cho sinh viên ngành Xây dựng và Kiến trúc – đã diễn ra, vinh danh 66 đồ án\r\ntốt nghiệp xuất sắc nhất đến từ các trường đại học trên cả nước. Đây không chỉ\r\nlà nơi tôn vinh tài năng trẻ mà còn là dịp khẳng định sự sáng tạo và giá trị thực\r\ntiễn trong các ý tưởng của thế hệ kiến trúc sư, kỹ sư tương lai.', 'dv2.jpg', '2024-06-08 13:42:41', 4),
(16, 'Giải bóng bàn TLU 2024 chào mừng 65 năm thành lập Trường Đại học Thủy lợi (1959 – 2024) và kỷ niệm Ngày Nhà giáo Việt Nam 20/11', 'Nhân dịp kỷ niệm 65 năm thành lập Trường Đại học Thủy lợi (1959 – 2024) và 42\r\nnăm Ngày Nhà giáo Việt Nam (20/11/1982 - 20/11/2024), Câu lạc bộ Bóng bàn\r\nđã tổ chức thành công Giải bóng bàn TLU 2024.', 'la1.jpg', '2024-12-29 13:42:41', 4),
(17, 'Khai mạc Chiều ngày 22/10/2024 (Thứ Ba), tại Sân vận động Trường Đại học Thủy lợi, Lễ khai mạc Giải bóng đá cán bộ, giảng viên Trường Đại học Thủy lợi đã diễn ra với không khí vui tươi và sôi động.', 'Giải bóng đá cán bộ, giảng viên Trường Đại học Thủy lợi 2024: Sôi động, kịch tính', 'la11.jpg', '2024-09-15 13:44:23', 4),
(18, 'Bế mạc Hội thao sinh viên kỷ niệm 65 năm ngày thành lập Trường ĐH Thủy lợi', 'Chiều ngày 21/10/2024, Lễ Bế mạc Hội thao sinh viên chào mừng kỷ niệm 65 năm thành lập Trường Đại học Thủy lợi (11/1959-11/2024) đã diễn ra với không khí tưng bừng sau nhiều ngày tranh tài sôi nổi.', 'la12.jpg', '2024-12-09 13:45:44', 4),
(19, 'Đại học Thủy lợi đạt thành tích xuất sắc tại Hội thi tìm hiểu Luật Giao thông và Kỹ năng lái xe an toàn khu vực phía Bắc 2024', 'Ngày 19/10/2024, tại Thái Nguyên, Đại học Thủy lợi đã xuất sắc giành Giải Nhì chung cuộc tại Hội thi “Tìm hiểu Luật Giao thông đường bộ và Kỹ năng lái xe mô tô an toàn khu vực phía Bắc 2024.”', 'la2.jpg', '2024-04-14 13:46:46', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL CHECK (`role` in (0,1))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'user1', 'password1', 0),
(2, 'user2', 'password2', 0),
(3, 'user3', 'password3', 0),
(4, 'admin1', 'adminpass1', 1),
(5, 'admin2', 'adminpass2', 1),
(6, 'user4', 'password4', 0),
(7, 'user5', 'password5', 0),
(8, 'user6', 'password6', 0),
(9, 'admin3', 'adminpass3', 1),
(10, 'user7', 'password7', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
