-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 May 2016, 17:47:45
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `mz`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE IF NOT EXISTS `ayar` (
  `title` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `aciklama` varchar(255) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `github` varchar(30) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `adres` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `cahce` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`title`, `keyword`, `aciklama`, `twitter`, `github`, `copyright`, `image`, `adres`, `tema`, `cahce`) VALUES
('EKblog', 'emin,kose,deneme,sitesi', 'Bu site tamamen deneme ama&ccedil;lÄ±dÄ±r. Sonradan istediÄŸiniz gibi d&uuml;zenleyebilirsiniz.', 'pcbeyin', 'pcbeyingit', 'Bu site tamen deneme ama&ccedil;lÄ±dÄ±r.', 'http://i.imgur.com/qNKawGR.jpg', 'http://localhost/mz/', 'http://localhost/mz/', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE IF NOT EXISTS `kategoriler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `katadi` varchar(255) NOT NULL,
  `katimge` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nic` text CHARACTER SET utf8 NOT NULL,
  `ad` text CHARACTER SET utf8 NOT NULL,
  `res` text CHARACTER SET utf8 NOT NULL,
  `hak` text CHARACTER SET utf8 NOT NULL,
  `yetki` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `profil`
--

INSERT INTO `profil` (`id`, `nic`, `ad`, `res`, `hak`, `yetki`) VALUES
(1, 'eminks', 'Emin Köse', 'http://i.hizliresim.com/D4bYYz.jpg', 'Bir çok alan ile uğraşan bir insan evladı', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE IF NOT EXISTS `sayfalar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `say_ad` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `say_resim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `say_icerik` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `say_etiket` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`id`, `say_ad`, `say_resim`, `say_icerik`, `say_etiket`) VALUES
(1, 'Deneme Sayfa', 'http://localhost/mz/dosya/149047851.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed faucibus libero. Mauris hendrerit metus vel ligula hendrerit, nec tempor est dignissim. Nulla odio orci, feugiat ut mollis vitae, pretium vitae ante. Pellentesque tempus vehicula mi, pellentesque egestas quam auctor eu. Fusce nisi lectus, molestie at pharetra vitae, ullamcorper tempus tellus. Integer laoreet libero vitae lacinia dignissim. Morbi vel mollis libero. Suspendisse potenti. In hac habitasse platea dictumst. Morbi at semper turpis. Nam elementum purus aliquam ipsum luctus, sed consectetur erat tincidunt. Nam congue mauris sit amet diam auctor, eu mollis dolor porta.</p>\r\n\r\n<p>Nunc nec urna efficitur magna ultricies ultrices. Aliquam at interdum arcu, id mollis quam. Nunc id nisi dui. Fusce maximus lacus nec est semper lobortis. Quisque auctor mattis purus dignissim dictum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed augue leo.</p>\r\n\r\n<p>Curabitur ac scelerisque massa. Vestibulum mollis nibh magna, ut tincidunt elit feugiat vitae. Mauris semper faucibus urna nec iaculis. Praesent lacus libero, commodo eget libero eu, consequat aliquet nisi. Etiam in vestibulum urna. Aliquam rutrum pellentesque risus eu auctor. Nulla facilisi. Donec scelerisque rhoncus eros, eget tempor nunc. Donec vehicula bibendum justo, ut convallis nulla vehicula ut.</p>\r\n\r\n<p>Suspendisse mattis tellus ornare justo iaculis, pretium viverra ante molestie. Fusce sodales nisi quis est vulputate, id scelerisque augue pellentesque. Donec et hendrerit justo. Nunc maximus dolor nisl, vitae condimentum urna sollicitudin ac. Vestibulum in lorem non neque malesuada pellentesque. Vestibulum pharetra tempor velit vel vulputate. Proin ut eros ipsum. Sed vitae mauris eu dolor dapibus sodales sed sed libero. Nam sapien tellus, mattis sed libero quis, blandit sodales elit. Sed in nulla tortor. Nullam et nisi eu tortor porta iaculis et in ante. Morbi pellentesque est eget lacus tincidunt condimentum.</p>\r\n\r\n<p>Nam mattis, ante nec maximus placerat, purus lorem ornare nisl, id pharetra lacus purus nec metus. In consectetur tortor purus, sit amet posuere mi lacinia id. Duis sed erat commodo, feugiat turpis vel, blandit metus. Donec malesuada dui quis nunc tempor, nec placerat nisi pretium. Vestibulum sit amet ligula mi. Maecenas at faucibus quam. Nam ut elit id diam bibendum volutpat. Quisque dignissim vitae augue eget scelerisque. Curabitur sit amet bibendum sapien, id iaculis odio. Morbi vel feugiat eros. Aenean consequat non enim faucibus pharetra. Fusce pellentesque, odio ullamcorper semper vestibulum, urna erat porttitor nunc, ut porttitor tortor tortor at sem. Donec eleifend, libero placerat fermentum ullamcorper, augue lorem facilisis dui, id rutrum erat sapien et elit. Suspendisse accumsan, purus sed aliquam porttitor, dui purus lobortis turpis, quis bibendum lacus elit id orci. Sed finibus libero sit amet mollis volutpat. Nam egestas sapien eleifend, auctor dolor a, eleifend lectus.</p>\r\n', 'denem1,deneme2,deneme3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kadi` varchar(50) NOT NULL DEFAULT '',
  `ksifi` varchar(100) NOT NULL DEFAULT '',
  `ytki` varchar(20) NOT NULL DEFAULT '',
  `adi` varchar(100) DEFAULT NULL,
  `eposta` varchar(255) DEFAULT NULL,
  `resim` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `kadi`, `ksifi`, `ytki`, `adi`, `eposta`, `resim`) VALUES
(1, 'pcbeyin', '8fa33c55bab9eefe351c993c0a4f69060a298c58', '1', 'Emin K&Ouml;SE', 'pinoki-tr@hotmail.com', 'http://localhost/mz/panel/assets/img/ek.jpg'),

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

CREATE TABLE IF NOT EXISTS `yazilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazi_ad` varchar(255) NOT NULL,
  `yazi_resim` varchar(255) NOT NULL,
  `yazi` text NOT NULL,
  `yazi_etiket` varchar(255) NOT NULL,
  `yazi_durum` int(11) NOT NULL,
  `Kat` varchar(255) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `minikus` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`id`, `yazi_ad`, `yazi_resim`, `yazi`, `yazi_etiket`, `yazi_durum`, `Kat`, `tarih`, `minikus`) VALUES
(1, 'Denem YazÄ± 1', 'http://localhost/mz//dosya/426513671.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed faucibus libero. Mauris hendrerit metus vel ligula hendrerit, nec tempor est dignissim. Nulla odio orci, feugiat ut mollis vitae, pretium vitae ante. Pellentesque tempus vehicula mi, pellentesque egestas quam auctor eu. Fusce nisi lectus, molestie at pharetra vitae, ullamcorper tempus tellus. Integer laoreet libero vitae lacinia dignissim. Morbi vel mollis libero. Suspendisse potenti. In hac habitasse platea dictumst. Morbi at semper turpis. Nam elementum purus aliquam ipsum luctus, sed consectetur erat tincidunt. Nam congue mauris sit amet diam auctor, eu mollis dolor porta.</p>\r\n\r\n<p>Nunc nec urna efficitur magna ultricies ultrices. Aliquam at interdum arcu, id mollis quam. Nunc id nisi dui. Fusce maximus lacus nec est semper lobortis. Quisque auctor mattis purus dignissim dictum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sed augue leo.</p>\r\n\r\n<p>Curabitur ac scelerisque massa. Vestibulum mollis nibh magna, ut tincidunt elit feugiat vitae. Mauris semper faucibus urna nec iaculis. Praesent lacus libero, commodo eget libero eu, consequat aliquet nisi. Etiam in vestibulum urna. Aliquam rutrum pellentesque risus eu auctor. Nulla facilisi. Donec scelerisque rhoncus eros, eget tempor nunc. Donec vehicula bibendum justo, ut convallis nulla vehicula ut.</p>\r\n\r\n<p>Suspendisse mattis tellus ornare justo iaculis, pretium viverra ante molestie. Fusce sodales nisi quis est vulputate, id scelerisque augue pellentesque. Donec et hendrerit justo. Nunc maximus dolor nisl, vitae condimentum urna sollicitudin ac. Vestibulum in lorem non neque malesuada pellentesque. Vestibulum pharetra tempor velit vel vulputate. Proin ut eros ipsum. Sed vitae mauris eu dolor dapibus sodales sed sed libero. Nam sapien tellus, mattis sed libero quis, blandit sodales elit. Sed in nulla tortor. Nullam et nisi eu tortor porta iaculis et in ante. Morbi pellentesque est eget lacus tincidunt condimentum.</p>\r\n\r\n<p>Nam mattis, ante nec maximus placerat, purus lorem ornare nisl, id pharetra lacus purus nec metus. In consectetur tortor purus, sit amet posuere mi lacinia id. Duis sed erat commodo, feugiat turpis vel, blandit metus. Donec malesuada dui quis nunc tempor, nec placerat nisi pretium. Vestibulum sit amet ligula mi. Maecenas at faucibus quam. Nam ut elit id diam bibendum volutpat. Quisque dignissim vitae augue eget scelerisque. Curabitur sit amet bibendum sapien, id iaculis odio. Morbi vel feugiat eros. Aenean consequat non enim faucibus pharetra. Fusce pellentesque, odio ullamcorper semper vestibulum, urna erat porttitor nunc, ut porttitor tortor tortor at sem. Donec eleifend, libero placerat fermentum ullamcorper, augue lorem facilisis dui, id rutrum erat sapien et elit. Suspendisse accumsan, purus sed aliquam porttitor, dui purus lobortis turpis, quis bibendum lacus elit id orci. Sed finibus libero sit amet mollis volutpat. Nam egestas sapien eleifend, auctor dolor a, eleifend lectus.</p>\r\n', 'deneme,den2,den3,den4', 1, '', '2016-04-27 13:38:26', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac viverra ex.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
