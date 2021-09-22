-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2017 at 11:08 AM
-- Server version: 5.5.50-MariaDB
-- PHP Version: 5.6.26RC1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_chisto`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions` (
  `id` int(255) NOT NULL,
  `zayavka_id` int(255) NOT NULL,
  `dragon_id` int(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `notes` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `action_user`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `action_user`;
CREATE TABLE `action_user` (
`id` int(255)
,`zayavka_id` int(255)
,`dragon_id` int(255)
,`action` varchar(255)
,`active` int(1)
,`notes` text
,`date` varchar(255)
,`username` varchar(1111)
,`alias` text
);

-- --------------------------------------------------------

--
-- Table structure for table `busylogin`
--

DROP TABLE IF EXISTS `busylogin`;
CREATE TABLE `busylogin` (
  `id` int(255) NOT NULL,
  `user_id` text NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cleaning`
--

DROP TABLE IF EXISTS `cleaning`;
CREATE TABLE `cleaning` (
  `id` int(20) NOT NULL,
  `initiator` int(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `k_total` int(20) NOT NULL,
  `k_cancelled` int(20) NOT NULL,
  `k_chist` int(20) NOT NULL,
  `k_banned` int(20) NOT NULL,
  `k_prokli` int(20) NOT NULL,
  `k_katorga` int(20) NOT NULL,
  `k_otkaz` int(20) NOT NULL,
  `k_nevid` int(20) NOT NULL,
  `s_total` int(20) NOT NULL,
  `s_cancelled` int(20) NOT NULL,
  `s_chist` int(20) NOT NULL,
  `s_banned` int(20) NOT NULL,
  `s_prokli` int(20) NOT NULL,
  `s_katorga` int(20) NOT NULL,
  `s_otkaz` int(20) NOT NULL,
  `s_nevid` int(20) NOT NULL,
  `u_total` int(20) NOT NULL,
  `u_cancelled` int(20) NOT NULL,
  `u_chist` int(20) NOT NULL,
  `u_banned` int(20) NOT NULL,
  `u_prokli` int(20) NOT NULL,
  `u_katorga` int(20) NOT NULL,
  `u_otkaz` int(20) NOT NULL,
  `u_nevid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cleaning_data`
--

DROP TABLE IF EXISTS `cleaning_data`;
CREATE TABLE `cleaning_data` (
  `id` int(20) NOT NULL,
  `clean_id` int(20) NOT NULL,
  `dr_id` int(20) NOT NULL,
  `dr_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `boi` int(20) NOT NULL,
  `peredachi` int(20) NOT NULL,
  `chist` int(20) NOT NULL,
  `prokli` int(20) NOT NULL,
  `katorga` int(20) NOT NULL,
  `ban` int(20) NOT NULL,
  `otkaz` int(20) NOT NULL,
  `nevid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dragonsrights`
--

DROP TABLE IF EXISTS `dragonsrights`;
CREATE TABLE `dragonsrights` (
  `dragonid` int(11) NOT NULL,
  `superadmin` tinyint(1) NOT NULL,
  `kovcheg` tinyint(1) NOT NULL,
  `smorye` tinyint(1) NOT NULL,
  `utes` tinyint(1) NOT NULL,
  `boss` tinyint(1) NOT NULL,
  `boi_prov` tinyint(1) NOT NULL,
  `per_prov` tinyint(1) NOT NULL,
  `boi` tinyint(1) NOT NULL,
  `peredachi` tinyint(1) NOT NULL,
  `fullbp` tinyint(1) NOT NULL,
  `prokli` tinyint(1) NOT NULL,
  `katorga` tinyint(1) NOT NULL,
  `ban` tinyint(1) NOT NULL,
  `chistota` tinyint(1) NOT NULL,
  `nevid` tinyint(1) NOT NULL,
  `approver` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `lastActiveActions`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `lastActiveActions`;
CREATE TABLE `lastActiveActions` (
`zayavka_id` int(11)
,`action_id` int(255)
,`user_id` int(255)
,`city` varchar(20)
,`proverka_city` varchar(255)
,`status` varchar(255)
,`zayavka_active` int(1)
,`calculated` int(1)
,`action` varchar(255)
,`action_active` int(1)
,`dragon_id` int(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `loginip`
--

DROP TABLE IF EXISTS `loginip`;
CREATE TABLE `loginip` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_fails`
--

DROP TABLE IF EXISTS `login_fails`;
CREATE TABLE `login_fails` (
  `id` int(255) NOT NULL,
  `ip` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `official`
--

DROP TABLE IF EXISTS `official`;
CREATE TABLE `official` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(100) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `short_text` longblob NOT NULL,
  `full_text` longblob NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL,
  `last_edited_id` int(100) NOT NULL,
  `last_edited_name` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `pinned` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `passwordreset_attempts`
--

DROP TABLE IF EXISTS `passwordreset_attempts`;
CREATE TABLE `passwordreset_attempts` (
  `id` int(255) NOT NULL,
  `ip` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_acl_groups`
--

DROP TABLE IF EXISTS `phpbb_acl_groups`;
CREATE TABLE `phpbb_acl_groups` (
  `group_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `auth_option_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `auth_role_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `auth_setting` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_acl_groups`
--

INSERT INTO `phpbb_acl_groups` (`group_id`, `forum_id`, `auth_option_id`, `auth_role_id`, `auth_setting`) VALUES
(1, 0, 89, 0, 1),
(1, 0, 98, 0, 1),
(1, 0, 116, 0, 1),
(5, 0, 0, 5, 0),
(5, 0, 0, 1, 0),
(2, 0, 0, 6, 0),
(3, 0, 0, 6, 0),
(4, 0, 0, 5, 0),
(4, 0, 0, 10, 0),
(1, 1, 0, 17, 0),
(2, 1, 0, 17, 0),
(3, 1, 0, 17, 0),
(6, 1, 0, 17, 0),
(1, 2, 0, 17, 0),
(2, 2, 0, 15, 0),
(3, 2, 0, 15, 0),
(4, 2, 0, 21, 0),
(5, 2, 0, 14, 0),
(5, 2, 0, 10, 0),
(6, 2, 0, 19, 0),
(7, 0, 0, 23, 0),
(7, 2, 0, 24, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_acl_options`
--

DROP TABLE IF EXISTS `phpbb_acl_options`;
CREATE TABLE `phpbb_acl_options` (
  `auth_option_id` mediumint(8) UNSIGNED NOT NULL,
  `auth_option` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `is_global` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_local` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `founder_only` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_acl_options`
--

INSERT INTO `phpbb_acl_options` (`auth_option_id`, `auth_option`, `is_global`, `is_local`, `founder_only`) VALUES
(1, 'f_', 0, 1, 0),
(2, 'f_announce', 0, 1, 0),
(3, 'f_attach', 0, 1, 0),
(4, 'f_bbcode', 0, 1, 0),
(5, 'f_bump', 0, 1, 0),
(6, 'f_delete', 0, 1, 0),
(7, 'f_download', 0, 1, 0),
(8, 'f_edit', 0, 1, 0),
(9, 'f_email', 0, 1, 0),
(10, 'f_flash', 0, 1, 0),
(11, 'f_icons', 0, 1, 0),
(12, 'f_ignoreflood', 0, 1, 0),
(13, 'f_img', 0, 1, 0),
(14, 'f_list', 0, 1, 0),
(15, 'f_noapprove', 0, 1, 0),
(16, 'f_poll', 0, 1, 0),
(17, 'f_post', 0, 1, 0),
(18, 'f_postcount', 0, 1, 0),
(19, 'f_print', 0, 1, 0),
(20, 'f_read', 0, 1, 0),
(21, 'f_reply', 0, 1, 0),
(22, 'f_report', 0, 1, 0),
(23, 'f_search', 0, 1, 0),
(24, 'f_sigs', 0, 1, 0),
(25, 'f_smilies', 0, 1, 0),
(26, 'f_sticky', 0, 1, 0),
(27, 'f_subscribe', 0, 1, 0),
(28, 'f_user_lock', 0, 1, 0),
(29, 'f_vote', 0, 1, 0),
(30, 'f_votechg', 0, 1, 0),
(31, 'f_softdelete', 0, 1, 0),
(32, 'm_', 1, 1, 0),
(33, 'm_approve', 1, 1, 0),
(34, 'm_chgposter', 1, 1, 0),
(35, 'm_delete', 1, 1, 0),
(36, 'm_edit', 1, 1, 0),
(37, 'm_info', 1, 1, 0),
(38, 'm_lock', 1, 1, 0),
(39, 'm_merge', 1, 1, 0),
(40, 'm_move', 1, 1, 0),
(41, 'm_report', 1, 1, 0),
(42, 'm_split', 1, 1, 0),
(43, 'm_softdelete', 1, 1, 0),
(44, 'm_ban', 1, 0, 0),
(45, 'm_pm_report', 1, 0, 0),
(46, 'm_warn', 1, 0, 0),
(47, 'a_', 1, 0, 0),
(48, 'a_aauth', 1, 0, 0),
(49, 'a_attach', 1, 0, 0),
(50, 'a_authgroups', 1, 0, 0),
(51, 'a_authusers', 1, 0, 0),
(52, 'a_backup', 1, 0, 0),
(53, 'a_ban', 1, 0, 0),
(54, 'a_bbcode', 1, 0, 0),
(55, 'a_board', 1, 0, 0),
(56, 'a_bots', 1, 0, 0),
(57, 'a_clearlogs', 1, 0, 0),
(58, 'a_email', 1, 0, 0),
(59, 'a_extensions', 1, 0, 0),
(60, 'a_fauth', 1, 0, 0),
(61, 'a_forum', 1, 0, 0),
(62, 'a_forumadd', 1, 0, 0),
(63, 'a_forumdel', 1, 0, 0),
(64, 'a_group', 1, 0, 0),
(65, 'a_groupadd', 1, 0, 0),
(66, 'a_groupdel', 1, 0, 0),
(67, 'a_icons', 1, 0, 0),
(68, 'a_jabber', 1, 0, 0),
(69, 'a_language', 1, 0, 0),
(70, 'a_mauth', 1, 0, 0),
(71, 'a_modules', 1, 0, 0),
(72, 'a_names', 1, 0, 0),
(73, 'a_phpinfo', 1, 0, 0),
(74, 'a_profile', 1, 0, 0),
(75, 'a_prune', 1, 0, 0),
(76, 'a_ranks', 1, 0, 0),
(77, 'a_reasons', 1, 0, 0),
(78, 'a_roles', 1, 0, 0),
(79, 'a_search', 1, 0, 0),
(80, 'a_server', 1, 0, 0),
(81, 'a_styles', 1, 0, 0),
(82, 'a_switchperm', 1, 0, 0),
(83, 'a_uauth', 1, 0, 0),
(84, 'a_user', 1, 0, 0),
(85, 'a_userdel', 1, 0, 0),
(86, 'a_viewauth', 1, 0, 0),
(87, 'a_viewlogs', 1, 0, 0),
(88, 'a_words', 1, 0, 0),
(89, 'u_', 1, 0, 0),
(90, 'u_attach', 1, 0, 0),
(91, 'u_chgavatar', 1, 0, 0),
(92, 'u_chgcensors', 1, 0, 0),
(93, 'u_chgemail', 1, 0, 0),
(94, 'u_chggrp', 1, 0, 0),
(95, 'u_chgname', 1, 0, 0),
(96, 'u_chgpasswd', 1, 0, 0),
(97, 'u_chgprofileinfo', 1, 0, 0),
(98, 'u_download', 1, 0, 0),
(99, 'u_hideonline', 1, 0, 0),
(100, 'u_ignoreflood', 1, 0, 0),
(101, 'u_masspm', 1, 0, 0),
(102, 'u_masspm_group', 1, 0, 0),
(103, 'u_pm_attach', 1, 0, 0),
(104, 'u_pm_bbcode', 1, 0, 0),
(105, 'u_pm_delete', 1, 0, 0),
(106, 'u_pm_download', 1, 0, 0),
(107, 'u_pm_edit', 1, 0, 0),
(108, 'u_pm_emailpm', 1, 0, 0),
(109, 'u_pm_flash', 1, 0, 0),
(110, 'u_pm_forward', 1, 0, 0),
(111, 'u_pm_img', 1, 0, 0),
(112, 'u_pm_printpm', 1, 0, 0),
(113, 'u_pm_smilies', 1, 0, 0),
(114, 'u_readpm', 1, 0, 0),
(115, 'u_savedrafts', 1, 0, 0),
(116, 'u_search', 1, 0, 0),
(117, 'u_sendemail', 1, 0, 0),
(118, 'u_sendim', 1, 0, 0),
(119, 'u_sendpm', 1, 0, 0),
(120, 'u_sig', 1, 0, 0),
(121, 'u_viewonline', 1, 0, 0),
(122, 'u_viewprofile', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_acl_roles`
--

DROP TABLE IF EXISTS `phpbb_acl_roles`;
CREATE TABLE `phpbb_acl_roles` (
  `role_id` mediumint(8) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `role_description` text COLLATE utf8_bin NOT NULL,
  `role_type` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `role_order` smallint(4) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_acl_roles`
--

INSERT INTO `phpbb_acl_roles` (`role_id`, `role_name`, `role_description`, `role_type`, `role_order`) VALUES
(1, 'ROLE_ADMIN_STANDARD', 'ROLE_DESCRIPTION_ADMIN_STANDARD', 'a_', 1),
(2, 'ROLE_ADMIN_FORUM', 'ROLE_DESCRIPTION_ADMIN_FORUM', 'a_', 3),
(3, 'ROLE_ADMIN_USERGROUP', 'ROLE_DESCRIPTION_ADMIN_USERGROUP', 'a_', 4),
(4, 'ROLE_ADMIN_FULL', 'ROLE_DESCRIPTION_ADMIN_FULL', 'a_', 2),
(5, 'ROLE_USER_FULL', 'ROLE_DESCRIPTION_USER_FULL', 'u_', 3),
(6, 'ROLE_USER_STANDARD', 'ROLE_DESCRIPTION_USER_STANDARD', 'u_', 1),
(7, 'ROLE_USER_LIMITED', 'ROLE_DESCRIPTION_USER_LIMITED', 'u_', 2),
(8, 'ROLE_USER_NOPM', 'ROLE_DESCRIPTION_USER_NOPM', 'u_', 4),
(9, 'ROLE_USER_NOAVATAR', 'ROLE_DESCRIPTION_USER_NOAVATAR', 'u_', 5),
(10, 'ROLE_MOD_FULL', 'ROLE_DESCRIPTION_MOD_FULL', 'm_', 3),
(11, 'ROLE_MOD_STANDARD', 'ROLE_DESCRIPTION_MOD_STANDARD', 'm_', 1),
(12, 'ROLE_MOD_SIMPLE', 'ROLE_DESCRIPTION_MOD_SIMPLE', 'm_', 2),
(13, 'ROLE_MOD_QUEUE', 'ROLE_DESCRIPTION_MOD_QUEUE', 'm_', 4),
(14, 'ROLE_FORUM_FULL', 'ROLE_DESCRIPTION_FORUM_FULL', 'f_', 7),
(15, 'ROLE_FORUM_STANDARD', 'ROLE_DESCRIPTION_FORUM_STANDARD', 'f_', 5),
(16, 'ROLE_FORUM_NOACCESS', 'ROLE_DESCRIPTION_FORUM_NOACCESS', 'f_', 1),
(17, 'ROLE_FORUM_READONLY', 'ROLE_DESCRIPTION_FORUM_READONLY', 'f_', 2),
(18, 'ROLE_FORUM_LIMITED', 'ROLE_DESCRIPTION_FORUM_LIMITED', 'f_', 3),
(19, 'ROLE_FORUM_BOT', 'ROLE_DESCRIPTION_FORUM_BOT', 'f_', 9),
(20, 'ROLE_FORUM_ONQUEUE', 'ROLE_DESCRIPTION_FORUM_ONQUEUE', 'f_', 8),
(21, 'ROLE_FORUM_POLLS', 'ROLE_DESCRIPTION_FORUM_POLLS', 'f_', 6),
(22, 'ROLE_FORUM_LIMITED_POLLS', 'ROLE_DESCRIPTION_FORUM_LIMITED_POLLS', 'f_', 4),
(23, 'ROLE_USER_NEW_MEMBER', 'ROLE_DESCRIPTION_USER_NEW_MEMBER', 'u_', 6),
(24, 'ROLE_FORUM_NEW_MEMBER', 'ROLE_DESCRIPTION_FORUM_NEW_MEMBER', 'f_', 10);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_acl_roles_data`
--

DROP TABLE IF EXISTS `phpbb_acl_roles_data`;
CREATE TABLE `phpbb_acl_roles_data` (
  `role_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `auth_option_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `auth_setting` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_acl_roles_data`
--

INSERT INTO `phpbb_acl_roles_data` (`role_id`, `auth_option_id`, `auth_setting`) VALUES
(1, 47, 1),
(1, 49, 1),
(1, 50, 1),
(1, 51, 1),
(1, 53, 1),
(1, 54, 1),
(1, 55, 1),
(1, 59, 1),
(1, 60, 1),
(1, 61, 1),
(1, 62, 1),
(1, 63, 1),
(1, 64, 1),
(1, 65, 1),
(1, 66, 1),
(1, 67, 1),
(1, 70, 1),
(1, 72, 1),
(1, 74, 1),
(1, 75, 1),
(1, 76, 1),
(1, 77, 1),
(1, 83, 1),
(1, 84, 1),
(1, 85, 1),
(1, 86, 1),
(1, 87, 1),
(1, 88, 1),
(2, 47, 1),
(2, 50, 1),
(2, 51, 1),
(2, 60, 1),
(2, 61, 1),
(2, 62, 1),
(2, 63, 1),
(2, 70, 1),
(2, 75, 1),
(2, 83, 1),
(2, 86, 1),
(2, 87, 1),
(3, 47, 1),
(3, 50, 1),
(3, 51, 1),
(3, 53, 1),
(3, 64, 1),
(3, 65, 1),
(3, 66, 1),
(3, 76, 1),
(3, 83, 1),
(3, 84, 1),
(3, 86, 1),
(3, 87, 1),
(4, 47, 1),
(4, 48, 1),
(4, 49, 1),
(4, 50, 1),
(4, 51, 1),
(4, 52, 1),
(4, 53, 1),
(4, 54, 1),
(4, 55, 1),
(4, 56, 1),
(4, 57, 1),
(4, 58, 1),
(4, 59, 1),
(4, 60, 1),
(4, 61, 1),
(4, 62, 1),
(4, 63, 1),
(4, 64, 1),
(4, 65, 1),
(4, 66, 1),
(4, 67, 1),
(4, 68, 1),
(4, 69, 1),
(4, 70, 1),
(4, 71, 1),
(4, 72, 1),
(4, 73, 1),
(4, 74, 1),
(4, 75, 1),
(4, 76, 1),
(4, 77, 1),
(4, 78, 1),
(4, 79, 1),
(4, 80, 1),
(4, 81, 1),
(4, 82, 1),
(4, 83, 1),
(4, 84, 1),
(4, 85, 1),
(4, 86, 1),
(4, 87, 1),
(4, 88, 1),
(5, 89, 1),
(5, 90, 1),
(5, 91, 1),
(5, 92, 1),
(5, 93, 1),
(5, 94, 1),
(5, 95, 1),
(5, 96, 1),
(5, 97, 1),
(5, 98, 1),
(5, 99, 1),
(5, 100, 1),
(5, 101, 1),
(5, 102, 1),
(5, 103, 1),
(5, 104, 1),
(5, 105, 1),
(5, 106, 1),
(5, 107, 1),
(5, 108, 1),
(5, 109, 1),
(5, 110, 1),
(5, 111, 1),
(5, 112, 1),
(5, 113, 1),
(5, 114, 1),
(5, 115, 1),
(5, 116, 1),
(5, 117, 1),
(5, 118, 1),
(5, 119, 1),
(5, 120, 1),
(5, 121, 1),
(5, 122, 1),
(6, 89, 1),
(6, 90, 1),
(6, 91, 1),
(6, 92, 1),
(6, 93, 1),
(6, 96, 1),
(6, 97, 1),
(6, 98, 1),
(6, 99, 1),
(6, 101, 1),
(6, 102, 1),
(6, 103, 1),
(6, 104, 1),
(6, 105, 1),
(6, 106, 1),
(6, 107, 1),
(6, 108, 1),
(6, 111, 1),
(6, 112, 1),
(6, 113, 1),
(6, 114, 1),
(6, 115, 1),
(6, 116, 1),
(6, 117, 1),
(6, 118, 1),
(6, 119, 1),
(6, 120, 1),
(6, 122, 1),
(7, 89, 1),
(7, 91, 1),
(7, 92, 1),
(7, 93, 1),
(7, 96, 1),
(7, 97, 1),
(7, 98, 1),
(7, 99, 1),
(7, 104, 1),
(7, 105, 1),
(7, 106, 1),
(7, 107, 1),
(7, 110, 1),
(7, 111, 1),
(7, 112, 1),
(7, 113, 1),
(7, 114, 1),
(7, 119, 1),
(7, 120, 1),
(7, 122, 1),
(8, 89, 1),
(8, 91, 1),
(8, 92, 1),
(8, 93, 1),
(8, 96, 1),
(8, 98, 1),
(8, 99, 1),
(8, 101, 0),
(8, 102, 0),
(8, 114, 0),
(8, 119, 0),
(8, 120, 1),
(8, 122, 1),
(9, 89, 1),
(9, 91, 0),
(9, 92, 1),
(9, 93, 1),
(9, 96, 1),
(9, 97, 1),
(9, 98, 1),
(9, 99, 1),
(9, 104, 1),
(9, 105, 1),
(9, 106, 1),
(9, 107, 1),
(9, 110, 1),
(9, 111, 1),
(9, 112, 1),
(9, 113, 1),
(9, 114, 1),
(9, 119, 1),
(9, 120, 1),
(9, 122, 1),
(10, 32, 1),
(10, 33, 1),
(10, 34, 1),
(10, 35, 1),
(10, 36, 1),
(10, 37, 1),
(10, 38, 1),
(10, 39, 1),
(10, 40, 1),
(10, 41, 1),
(10, 42, 1),
(10, 43, 1),
(10, 44, 1),
(10, 45, 1),
(10, 46, 1),
(11, 32, 1),
(11, 33, 1),
(11, 35, 1),
(11, 36, 1),
(11, 37, 1),
(11, 38, 1),
(11, 39, 1),
(11, 40, 1),
(11, 41, 1),
(11, 42, 1),
(11, 43, 1),
(11, 45, 1),
(11, 46, 1),
(12, 32, 1),
(12, 35, 1),
(12, 36, 1),
(12, 37, 1),
(12, 41, 1),
(12, 43, 1),
(12, 45, 1),
(13, 32, 1),
(13, 33, 1),
(13, 36, 1),
(14, 1, 1),
(14, 2, 1),
(14, 3, 1),
(14, 4, 1),
(14, 5, 1),
(14, 6, 1),
(14, 7, 1),
(14, 8, 1),
(14, 9, 1),
(14, 10, 1),
(14, 11, 1),
(14, 12, 1),
(14, 13, 1),
(14, 14, 1),
(14, 15, 1),
(14, 16, 1),
(14, 17, 1),
(14, 18, 1),
(14, 19, 1),
(14, 20, 1),
(14, 21, 1),
(14, 22, 1),
(14, 23, 1),
(14, 24, 1),
(14, 25, 1),
(14, 26, 1),
(14, 27, 1),
(14, 28, 1),
(14, 29, 1),
(14, 30, 1),
(14, 31, 1),
(15, 1, 1),
(15, 3, 1),
(15, 4, 1),
(15, 5, 1),
(15, 6, 1),
(15, 7, 1),
(15, 8, 1),
(15, 9, 1),
(15, 11, 1),
(15, 13, 1),
(15, 14, 1),
(15, 15, 1),
(15, 17, 1),
(15, 18, 1),
(15, 19, 1),
(15, 20, 1),
(15, 21, 1),
(15, 22, 1),
(15, 23, 1),
(15, 24, 1),
(15, 25, 1),
(15, 27, 1),
(15, 29, 1),
(15, 30, 1),
(15, 31, 1),
(16, 1, 0),
(17, 1, 1),
(17, 7, 1),
(17, 14, 1),
(17, 19, 1),
(17, 20, 1),
(17, 23, 1),
(17, 27, 1),
(18, 1, 1),
(18, 4, 1),
(18, 7, 1),
(18, 8, 1),
(18, 9, 1),
(18, 13, 1),
(18, 14, 1),
(18, 15, 1),
(18, 17, 1),
(18, 18, 1),
(18, 19, 1),
(18, 20, 1),
(18, 21, 1),
(18, 22, 1),
(18, 23, 1),
(18, 24, 1),
(18, 25, 1),
(18, 27, 1),
(18, 29, 1),
(18, 31, 1),
(19, 1, 1),
(19, 7, 1),
(19, 14, 1),
(19, 19, 1),
(19, 20, 1),
(20, 1, 1),
(20, 3, 1),
(20, 4, 1),
(20, 7, 1),
(20, 8, 1),
(20, 9, 1),
(20, 13, 1),
(20, 14, 1),
(20, 15, 0),
(20, 17, 1),
(20, 18, 1),
(20, 19, 1),
(20, 20, 1),
(20, 21, 1),
(20, 22, 1),
(20, 23, 1),
(20, 24, 1),
(20, 25, 1),
(20, 27, 1),
(20, 29, 1),
(20, 31, 1),
(21, 1, 1),
(21, 3, 1),
(21, 4, 1),
(21, 5, 1),
(21, 6, 1),
(21, 7, 1),
(21, 8, 1),
(21, 9, 1),
(21, 11, 1),
(21, 13, 1),
(21, 14, 1),
(21, 15, 1),
(21, 16, 1),
(21, 17, 1),
(21, 18, 1),
(21, 19, 1),
(21, 20, 1),
(21, 21, 1),
(21, 22, 1),
(21, 23, 1),
(21, 24, 1),
(21, 25, 1),
(21, 27, 1),
(21, 29, 1),
(21, 30, 1),
(21, 31, 1),
(22, 1, 1),
(22, 4, 1),
(22, 7, 1),
(22, 8, 1),
(22, 9, 1),
(22, 13, 1),
(22, 14, 1),
(22, 15, 1),
(22, 16, 1),
(22, 17, 1),
(22, 18, 1),
(22, 19, 1),
(22, 20, 1),
(22, 21, 1),
(22, 22, 1),
(22, 23, 1),
(22, 24, 1),
(22, 25, 1),
(22, 27, 1),
(22, 29, 1),
(22, 31, 1),
(23, 97, 0),
(23, 101, 0),
(23, 102, 0),
(23, 119, 0),
(24, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_acl_users`
--

DROP TABLE IF EXISTS `phpbb_acl_users`;
CREATE TABLE `phpbb_acl_users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `auth_option_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `auth_role_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `auth_setting` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_acl_users`
--

INSERT INTO `phpbb_acl_users` (`user_id`, `forum_id`, `auth_option_id`, `auth_role_id`, `auth_setting`) VALUES
(2, 0, 0, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_attachments`
--

DROP TABLE IF EXISTS `phpbb_attachments`;
CREATE TABLE `phpbb_attachments` (
  `attach_id` mediumint(8) UNSIGNED NOT NULL,
  `post_msg_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `in_message` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `poster_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `is_orphan` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `physical_filename` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `real_filename` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `download_count` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `attach_comment` text COLLATE utf8_bin NOT NULL,
  `extension` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `mimetype` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `filesize` int(20) UNSIGNED NOT NULL DEFAULT '0',
  `filetime` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `thumbnail` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_banlist`
--

DROP TABLE IF EXISTS `phpbb_banlist`;
CREATE TABLE `phpbb_banlist` (
  `ban_id` mediumint(8) UNSIGNED NOT NULL,
  `ban_userid` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `ban_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ban_email` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ban_start` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ban_end` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ban_exclude` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ban_give_reason` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_bbcodes`
--

DROP TABLE IF EXISTS `phpbb_bbcodes`;
CREATE TABLE `phpbb_bbcodes` (
  `bbcode_id` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `bbcode_tag` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '',
  `bbcode_helpline` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_on_posting` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `bbcode_match` text COLLATE utf8_bin NOT NULL,
  `bbcode_tpl` mediumtext COLLATE utf8_bin NOT NULL,
  `first_pass_match` mediumtext COLLATE utf8_bin NOT NULL,
  `first_pass_replace` mediumtext COLLATE utf8_bin NOT NULL,
  `second_pass_match` mediumtext COLLATE utf8_bin NOT NULL,
  `second_pass_replace` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_bookmarks`
--

DROP TABLE IF EXISTS `phpbb_bookmarks`;
CREATE TABLE `phpbb_bookmarks` (
  `topic_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_bots`
--

DROP TABLE IF EXISTS `phpbb_bots`;
CREATE TABLE `phpbb_bots` (
  `bot_id` mediumint(8) UNSIGNED NOT NULL,
  `bot_active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `bot_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `bot_agent` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `bot_ip` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_bots`
--

INSERT INTO `phpbb_bots` (`bot_id`, `bot_active`, `bot_name`, `user_id`, `bot_agent`, `bot_ip`) VALUES
(1, 1, 'AdsBot [Google]', 3, 'AdsBot-Google', ''),
(2, 1, 'Alexa [Bot]', 4, 'ia_archiver', ''),
(3, 1, 'Alta Vista [Bot]', 5, 'Scooter/', ''),
(4, 1, 'Ask Jeeves [Bot]', 6, 'Ask Jeeves', ''),
(5, 1, 'Baidu [Spider]', 7, 'Baiduspider', ''),
(6, 1, 'Bing [Bot]', 8, 'bingbot/', ''),
(7, 1, 'Exabot [Bot]', 9, 'Exabot', ''),
(8, 1, 'FAST Enterprise [Crawler]', 10, 'FAST Enterprise Crawler', ''),
(9, 1, 'FAST WebCrawler [Crawler]', 11, 'FAST-WebCrawler/', ''),
(10, 1, 'Francis [Bot]', 12, 'http://www.neomo.de/', ''),
(11, 1, 'Gigabot [Bot]', 13, 'Gigabot/', ''),
(12, 1, 'Google Adsense [Bot]', 14, 'Mediapartners-Google', ''),
(13, 1, 'Google Desktop', 15, 'Google Desktop', ''),
(14, 1, 'Google Feedfetcher', 16, 'Feedfetcher-Google', ''),
(15, 1, 'Google [Bot]', 17, 'Googlebot', ''),
(16, 1, 'Heise IT-Markt [Crawler]', 18, 'heise-IT-Markt-Crawler', ''),
(17, 1, 'Heritrix [Crawler]', 19, 'heritrix/1.', ''),
(18, 1, 'IBM Research [Bot]', 20, 'ibm.com/cs/crawler', ''),
(19, 1, 'ICCrawler - ICjobs', 21, 'ICCrawler - ICjobs', ''),
(20, 1, 'ichiro [Crawler]', 22, 'ichiro/', ''),
(21, 1, 'Majestic-12 [Bot]', 23, 'MJ12bot/', ''),
(22, 1, 'Metager [Bot]', 24, 'MetagerBot/', ''),
(23, 1, 'MSN NewsBlogs', 25, 'msnbot-NewsBlogs/', ''),
(24, 1, 'MSN [Bot]', 26, 'msnbot/', ''),
(25, 1, 'MSNbot Media', 27, 'msnbot-media/', ''),
(26, 1, 'Nutch [Bot]', 28, 'http://lucene.apache.org/nutch/', ''),
(27, 1, 'Online link [Validator]', 29, 'online link validator', ''),
(28, 1, 'psbot [Picsearch]', 30, 'psbot/0', ''),
(29, 1, 'Sensis [Crawler]', 31, 'Sensis Web Crawler', ''),
(30, 1, 'SEO Crawler', 32, 'SEO search Crawler/', ''),
(31, 1, 'Seoma [Crawler]', 33, 'Seoma [SEO Crawler]', ''),
(32, 1, 'SEOSearch [Crawler]', 34, 'SEOsearch/', ''),
(33, 1, 'Snappy [Bot]', 35, 'Snappy/1.1 ( http://www.urltrends.com/ )', ''),
(34, 1, 'Steeler [Crawler]', 36, 'http://www.tkl.iis.u-tokyo.ac.jp/~crawler/', ''),
(35, 1, 'Telekom [Bot]', 37, 'crawleradmin.t-info@telekom.de', ''),
(36, 1, 'TurnitinBot [Bot]', 38, 'TurnitinBot/', ''),
(37, 1, 'Voyager [Bot]', 39, 'voyager/', ''),
(38, 1, 'W3 [Sitesearch]', 40, 'W3 SiteSearch Crawler', ''),
(39, 1, 'W3C [Linkcheck]', 41, 'W3C-checklink/', ''),
(40, 1, 'W3C [Validator]', 42, 'W3C_Validator', ''),
(41, 1, 'YaCy [Bot]', 43, 'yacybot', ''),
(42, 1, 'Yahoo MMCrawler [Bot]', 44, 'Yahoo-MMCrawler/', ''),
(43, 1, 'Yahoo Slurp [Bot]', 45, 'Yahoo! DE Slurp', ''),
(44, 1, 'Yahoo [Bot]', 46, 'Yahoo! Slurp', ''),
(45, 1, 'YahooSeeker [Bot]', 47, 'YahooSeeker/', '');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_config`
--

DROP TABLE IF EXISTS `phpbb_config`;
CREATE TABLE `phpbb_config` (
  `config_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `config_value` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `is_dynamic` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_config`
--

INSERT INTO `phpbb_config` (`config_name`, `config_value`, `is_dynamic`) VALUES
('active_sessions', '0', 0),
('allow_attachments', '1', 0),
('allow_autologin', '1', 0),
('allow_avatar', '1', 0),
('allow_avatar_gravatar', '0', 0),
('allow_avatar_local', '0', 0),
('allow_avatar_remote', '0', 0),
('allow_avatar_remote_upload', '0', 0),
('allow_avatar_upload', '1', 0),
('allow_bbcode', '1', 0),
('allow_birthdays', '1', 0),
('allow_bookmarks', '1', 0),
('allow_cdn', '0', 0),
('allow_emailreuse', '0', 0),
('allow_forum_notify', '1', 0),
('allow_live_searches', '1', 0),
('allow_mass_pm', '1', 0),
('allow_name_chars', 'USERNAME_CHARS_ANY', 0),
('allow_namechange', '0', 0),
('allow_nocensors', '0', 0),
('allow_password_reset', '1', 0),
('allow_pm_attach', '0', 0),
('allow_pm_report', '1', 0),
('allow_post_flash', '1', 0),
('allow_post_links', '1', 0),
('allow_privmsg', '1', 0),
('allow_quick_reply', '1', 0),
('allow_sig', '1', 0),
('allow_sig_bbcode', '1', 0),
('allow_sig_flash', '0', 0),
('allow_sig_img', '1', 0),
('allow_sig_links', '1', 0),
('allow_sig_pm', '1', 0),
('allow_sig_smilies', '1', 0),
('allow_smilies', '1', 0),
('allow_topic_notify', '1', 0),
('assets_version', '1', 0),
('attachment_quota', '52428800', 0),
('auth_bbcode_pm', '1', 0),
('auth_flash_pm', '0', 0),
('auth_img_pm', '1', 0),
('auth_method', 'db', 0),
('auth_oauth_bitly_key', '', 0),
('auth_oauth_bitly_secret', '', 0),
('auth_oauth_facebook_key', '', 0),
('auth_oauth_facebook_secret', '', 0),
('auth_oauth_google_key', '', 0),
('auth_oauth_google_secret', '', 0),
('auth_smilies_pm', '1', 0),
('avatar_filesize', '6144', 0),
('avatar_gallery_path', 'images/avatars/gallery', 0),
('avatar_max_height', '90', 0),
('avatar_max_width', '90', 0),
('avatar_min_height', '20', 0),
('avatar_min_width', '20', 0),
('avatar_path', 'images/avatars/upload', 0),
('avatar_salt', 'a2c05b74697c4347aceabee5a48a2061', 0),
('board_contact', 'adm@admin.com', 0),
('board_contact_name', '', 0),
('board_disable', '0', 0),
('board_disable_msg', '', 0),
('board_email', 'adm@admin.com', 0),
('board_email_form', '0', 0),
('board_email_sig', 'Спасибо, Администрация', 0),
('board_hide_emails', '1', 0),
('board_index_text', '', 0),
('board_startdate', '1490973941', 0),
('board_timezone', 'UTC', 0),
('browser_check', '1', 0),
('bump_interval', '10', 0),
('bump_type', 'd', 0),
('cache_gc', '7200', 0),
('cache_last_gc', '1493222618', 1),
('captcha_gd', '1', 0),
('captcha_gd_3d_noise', '1', 0),
('captcha_gd_fonts', '1', 0),
('captcha_gd_foreground_noise', '0', 0),
('captcha_gd_wave', '0', 0),
('captcha_gd_x_grid', '25', 0),
('captcha_gd_y_grid', '25', 0),
('captcha_plugin', 'core.captcha.plugins.gd', 0),
('check_attachment_content', '1', 0),
('check_dnsbl', '0', 0),
('chg_passforce', '0', 0),
('confirm_refresh', '1', 0),
('contact_admin_form_enable', '', 0),
('cookie_domain', 'dragons-apeha.ru', 0),
('cookie_name', 'phpbb3_qxspp', 0),
('cookie_path', '/', 0),
('cookie_secure', '0', 0),
('coppa_enable', '0', 0),
('coppa_fax', '', 0),
('coppa_mail', '', 0),
('cron_lock', '0', 1),
('database_gc', '604800', 0),
('database_last_gc', '1492755280', 1),
('dbms_version', '5.5.50-MariaDB', 0),
('default_dateformat', '|d M Y|, H:i', 0),
('default_lang', 'ru', 0),
('default_style', '2', 0),
('delete_time', '0', 0),
('display_last_edited', '1', 0),
('display_last_subject', '1', 0),
('display_order', '0', 0),
('edit_time', '0', 0),
('email_check_mx', '1', 0),
('email_enable', '0', 0),
('email_function_name', 'mail', 0),
('email_max_chunk_size', '50', 0),
('email_package_size', '20', 0),
('enable_confirm', '1', 0),
('enable_mod_rewrite', '0', 0),
('enable_pm_icons', '1', 0),
('enable_post_confirm', '1', 0),
('extension_force_unstable', '0', 0),
('feed_enable', '1', 0),
('feed_forum', '1', 0),
('feed_http_auth', '0', 0),
('feed_item_statistics', '1', 0),
('feed_limit_post', '15', 0),
('feed_limit_topic', '10', 0),
('feed_overall', '1', 0),
('feed_overall_forums', '0', 0),
('feed_topic', '1', 0),
('feed_topics_active', '0', 0),
('feed_topics_new', '1', 0),
('flood_interval', '15', 0),
('force_server_vars', '0', 0),
('form_token_lifetime', '7200', 0),
('form_token_mintime', '0', 0),
('form_token_sid_guests', '1', 0),
('forward_pm', '1', 0),
('forwarded_for_check', '0', 0),
('full_folder_action', '2', 0),
('fulltext_mysql_max_word_len', '254', 0),
('fulltext_mysql_min_word_len', '4', 0),
('fulltext_native_common_thres', '5', 0),
('fulltext_native_load_upd', '1', 0),
('fulltext_native_max_chars', '14', 0),
('fulltext_native_min_chars', '3', 0),
('fulltext_postgres_max_word_len', '254', 0),
('fulltext_postgres_min_word_len', '4', 0),
('fulltext_postgres_ts_name', 'simple', 0),
('fulltext_sphinx_indexer_mem_limit', '512', 0),
('fulltext_sphinx_stopwords', '0', 0),
('gzip_compress', '0', 0),
('hot_threshold', '25', 0),
('icons_path', 'images/icons', 0),
('img_create_thumbnail', '0', 0),
('img_display_inlined', '1', 0),
('img_imagick', '', 0),
('img_link_height', '0', 0),
('img_link_width', '0', 0),
('img_max_height', '0', 0),
('img_max_thumb_width', '400', 0),
('img_max_width', '0', 0),
('img_min_thumb_filesize', '12000', 0),
('ip_check', '3', 0),
('ip_login_limit_max', '50', 0),
('ip_login_limit_time', '21600', 0),
('ip_login_limit_use_forwarded', '0', 0),
('jab_enable', '0', 0),
('jab_host', '', 0),
('jab_package_size', '20', 0),
('jab_password', '', 0),
('jab_port', '5222', 0),
('jab_use_ssl', '0', 0),
('jab_username', '', 0),
('last_queue_run', '0', 1),
('ldap_base_dn', '', 0),
('ldap_email', '', 0),
('ldap_password', '', 0),
('ldap_port', '', 0),
('ldap_server', '', 0),
('ldap_uid', '', 0),
('ldap_user', '', 0),
('ldap_user_filter', '', 0),
('legend_sort_groupname', '0', 0),
('limit_load', '0', 0),
('limit_search_load', '0', 0),
('load_anon_lastread', '0', 0),
('load_birthdays', '1', 0),
('load_cpf_memberlist', '1', 0),
('load_cpf_pm', '1', 0),
('load_cpf_viewprofile', '1', 0),
('load_cpf_viewtopic', '1', 0),
('load_db_lastread', '1', 0),
('load_db_track', '1', 0),
('load_jquery_url', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', 0),
('load_jumpbox', '1', 0),
('load_moderators', '1', 0),
('load_notifications', '1', 0),
('load_online', '1', 0),
('load_online_guests', '1', 0),
('load_online_time', '5', 0),
('load_onlinetrack', '1', 0),
('load_search', '1', 0),
('load_tplcompile', '0', 0),
('load_unreads_search', '1', 0),
('load_user_activity', '1', 0),
('max_attachments', '3', 0),
('max_attachments_pm', '1', 0),
('max_autologin_time', '0', 0),
('max_filesize', '262144', 0),
('max_filesize_pm', '262144', 0),
('max_login_attempts', '3', 0),
('max_name_chars', '20', 0),
('max_num_search_keywords', '10', 0),
('max_pass_chars', '100', 0),
('max_poll_options', '10', 0),
('max_post_chars', '0', 0),
('max_post_font_size', '200', 0),
('max_post_img_height', '0', 0),
('max_post_img_width', '0', 0),
('max_post_smilies', '0', 0),
('max_post_urls', '0', 0),
('max_quote_depth', '3', 0),
('max_reg_attempts', '5', 0),
('max_sig_chars', '255', 0),
('max_sig_font_size', '200', 0),
('max_sig_img_height', '0', 0),
('max_sig_img_width', '0', 0),
('max_sig_smilies', '0', 0),
('max_sig_urls', '5', 0),
('mime_triggers', 'body|head|html|img|plaintext|a href|pre|script|table|title', 0),
('min_name_chars', '3', 0),
('min_pass_chars', '6', 0),
('min_post_chars', '1', 0),
('min_search_author_chars', '3', 0),
('new_member_group_default', '0', 0),
('new_member_post_limit', '3', 0),
('newest_user_colour', '', 1),
('newest_user_id', '63', 1),
('newest_username', 'Артём Николаевич', 1),
('num_files', '0', 1),
('num_posts', '2', 1),
('num_topics', '1', 1),
('num_users', '4', 1),
('override_user_style', '1', 0),
('pass_complex', 'PASS_TYPE_ANY', 0),
('plupload_last_gc', '0', 1),
('plupload_salt', 'c52713f2c791f4c2838e9bf4b19a5c73', 0),
('pm_edit_time', '0', 0),
('pm_max_boxes', '4', 0),
('pm_max_msgs', '50', 0),
('pm_max_recipients', '0', 0),
('posts_per_page', '10', 0),
('print_pm', '1', 0),
('questionnaire_unique_id', '9a7e2d9896465dbe', 0),
('queue_interval', '60', 0),
('rand_seed', 'aab55b9fa7816011986cc192c1a9c79d', 1),
('rand_seed_last_update', '1493228360', 1),
('ranks_path', 'images/ranks', 0),
('read_notification_expire_days', '30', 0),
('read_notification_gc', '86400', 0),
('read_notification_last_gc', '1493194939', 1),
('record_online_date', '1491212290', 1),
('record_online_users', '4', 1),
('referer_validation', '1', 0),
('require_activation', '3', 0),
('script_path', '/4istka/forum', 0),
('search_anonymous_interval', '0', 0),
('search_block_size', '250', 0),
('search_gc', '7200', 0),
('search_indexing_state', '', 1),
('search_interval', '0', 0),
('search_last_gc', '1493222615', 1),
('search_store_results', '1800', 0),
('search_type', '\\phpbb\\search\\fulltext_native', 0),
('secure_allow_deny', '1', 0),
('secure_allow_empty_referer', '1', 0),
('secure_downloads', '0', 0),
('server_name', 'dragons-apeha.ru', 0),
('server_port', '80', 0),
('server_protocol', 'http://', 0),
('session_gc', '3600', 0),
('session_last_gc', '1493228361', 1),
('session_length', '3600', 0),
('site_desc', 'Краткое описание вашей конференции', 0),
('site_home_text', 'Орден Драконов', 0),
('site_home_url', 'http://dragons-apeha.ru/', 0),
('sitename', 'Форум Ордена Драконов', 0),
('smilies_path', 'images/smilies', 0),
('smilies_per_page', '50', 0),
('smtp_auth_method', 'PLAIN', 0),
('smtp_delivery', '0', 0),
('smtp_host', '', 0),
('smtp_password', '12345', 0),
('smtp_port', '25', 0),
('smtp_username', '~root~', 0),
('teampage_forums', '1', 0),
('teampage_memberships', '1', 0),
('topics_per_page', '25', 0),
('tpl_allow_php', '0', 0),
('upload_dir_size', '0', 1),
('upload_icons_path', 'images/upload_icons', 0),
('upload_path', 'files', 0),
('use_system_cron', '0', 0),
('version', '3.1.10', 0),
('warnings_expire_days', '90', 0),
('warnings_gc', '14400', 0),
('warnings_last_gc', '1493222599', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_config_text`
--

DROP TABLE IF EXISTS `phpbb_config_text`;
CREATE TABLE `phpbb_config_text` (
  `config_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `config_value` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_config_text`
--

INSERT INTO `phpbb_config_text` (`config_name`, `config_value`) VALUES
('contact_admin_info', ''),
('contact_admin_info_bitfield', ''),
('contact_admin_info_flags', '7'),
('contact_admin_info_uid', '');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_confirm`
--

DROP TABLE IF EXISTS `phpbb_confirm`;
CREATE TABLE `phpbb_confirm` (
  `confirm_id` char(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_id` char(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `confirm_type` tinyint(3) NOT NULL DEFAULT '0',
  `code` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `seed` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `attempts` mediumint(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_disallow`
--

DROP TABLE IF EXISTS `phpbb_disallow`;
CREATE TABLE `phpbb_disallow` (
  `disallow_id` mediumint(8) UNSIGNED NOT NULL,
  `disallow_username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_drafts`
--

DROP TABLE IF EXISTS `phpbb_drafts`;
CREATE TABLE `phpbb_drafts` (
  `draft_id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `save_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `draft_subject` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `draft_message` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_ext`
--

DROP TABLE IF EXISTS `phpbb_ext`;
CREATE TABLE `phpbb_ext` (
  `ext_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ext_active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `ext_state` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_extensions`
--

DROP TABLE IF EXISTS `phpbb_extensions`;
CREATE TABLE `phpbb_extensions` (
  `extension_id` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `extension` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_extensions`
--

INSERT INTO `phpbb_extensions` (`extension_id`, `group_id`, `extension`) VALUES
(1, 1, 'gif'),
(2, 1, 'png'),
(3, 1, 'jpeg'),
(4, 1, 'jpg'),
(5, 1, 'tif'),
(6, 1, 'tiff'),
(7, 1, 'tga'),
(8, 2, 'gtar'),
(9, 2, 'gz'),
(10, 2, 'tar'),
(11, 2, 'zip'),
(12, 2, 'rar'),
(13, 2, 'ace'),
(14, 2, 'torrent'),
(15, 2, 'tgz'),
(16, 2, 'bz2'),
(17, 2, '7z'),
(18, 3, 'txt'),
(19, 3, 'c'),
(20, 3, 'h'),
(21, 3, 'cpp'),
(22, 3, 'hpp'),
(23, 3, 'diz'),
(24, 3, 'csv'),
(25, 3, 'ini'),
(26, 3, 'log'),
(27, 3, 'js'),
(28, 3, 'xml'),
(29, 4, 'xls'),
(30, 4, 'xlsx'),
(31, 4, 'xlsm'),
(32, 4, 'xlsb'),
(33, 4, 'doc'),
(34, 4, 'docx'),
(35, 4, 'docm'),
(36, 4, 'dot'),
(37, 4, 'dotx'),
(38, 4, 'dotm'),
(39, 4, 'pdf'),
(40, 4, 'ai'),
(41, 4, 'ps'),
(42, 4, 'ppt'),
(43, 4, 'pptx'),
(44, 4, 'pptm'),
(45, 4, 'odg'),
(46, 4, 'odp'),
(47, 4, 'ods'),
(48, 4, 'odt'),
(49, 4, 'rtf'),
(50, 5, 'rm'),
(51, 5, 'ram'),
(52, 6, 'wma'),
(53, 6, 'wmv'),
(54, 7, 'swf'),
(55, 8, 'mov'),
(56, 8, 'm4v'),
(57, 8, 'm4a'),
(58, 8, 'mp4'),
(59, 8, '3gp'),
(60, 8, '3g2'),
(61, 8, 'qt'),
(62, 9, 'mpeg'),
(63, 9, 'mpg'),
(64, 9, 'mp3'),
(65, 9, 'ogg'),
(66, 9, 'ogm');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_extension_groups`
--

DROP TABLE IF EXISTS `phpbb_extension_groups`;
CREATE TABLE `phpbb_extension_groups` (
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `cat_id` tinyint(2) NOT NULL DEFAULT '0',
  `allow_group` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `download_mode` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `upload_icon` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `max_filesize` int(20) UNSIGNED NOT NULL DEFAULT '0',
  `allowed_forums` text COLLATE utf8_bin NOT NULL,
  `allow_in_pm` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_extension_groups`
--

INSERT INTO `phpbb_extension_groups` (`group_id`, `group_name`, `cat_id`, `allow_group`, `download_mode`, `upload_icon`, `max_filesize`, `allowed_forums`, `allow_in_pm`) VALUES
(1, 'IMAGES', 1, 1, 1, '', 0, '', 0),
(2, 'ARCHIVES', 0, 1, 1, '', 0, '', 0),
(3, 'PLAIN_TEXT', 0, 0, 1, '', 0, '', 0),
(4, 'DOCUMENTS', 0, 0, 1, '', 0, '', 0),
(5, 'REAL_MEDIA', 3, 0, 1, '', 0, '', 0),
(6, 'WINDOWS_MEDIA', 2, 0, 1, '', 0, '', 0),
(7, 'FLASH_FILES', 5, 0, 1, '', 0, '', 0),
(8, 'QUICKTIME_MEDIA', 6, 0, 1, '', 0, '', 0),
(9, 'DOWNLOADABLE_FILES', 0, 0, 1, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_forums`
--

DROP TABLE IF EXISTS `phpbb_forums`;
CREATE TABLE `phpbb_forums` (
  `forum_id` mediumint(8) UNSIGNED NOT NULL,
  `parent_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `left_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `right_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_parents` mediumtext COLLATE utf8_bin NOT NULL,
  `forum_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_desc` text COLLATE utf8_bin NOT NULL,
  `forum_desc_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_desc_options` int(11) UNSIGNED NOT NULL DEFAULT '7',
  `forum_desc_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_link` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_password` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_style` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_image` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_rules` text COLLATE utf8_bin NOT NULL,
  `forum_rules_link` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_rules_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_rules_options` int(11) UNSIGNED NOT NULL DEFAULT '7',
  `forum_rules_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_topics_per_page` tinyint(4) NOT NULL DEFAULT '0',
  `forum_type` tinyint(4) NOT NULL DEFAULT '0',
  `forum_status` tinyint(4) NOT NULL DEFAULT '0',
  `forum_last_post_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_last_poster_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_last_post_subject` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_last_post_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `forum_last_poster_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_last_poster_colour` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '',
  `forum_flags` tinyint(4) NOT NULL DEFAULT '32',
  `display_on_index` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `enable_indexing` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `enable_icons` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `enable_prune` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `prune_next` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `prune_days` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `prune_viewed` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `prune_freq` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `display_subforum_list` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `forum_options` int(20) UNSIGNED NOT NULL DEFAULT '0',
  `forum_posts_approved` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_posts_unapproved` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_posts_softdeleted` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_topics_approved` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_topics_unapproved` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_topics_softdeleted` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `enable_shadow_prune` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `prune_shadow_days` mediumint(8) UNSIGNED NOT NULL DEFAULT '7',
  `prune_shadow_freq` mediumint(8) UNSIGNED NOT NULL DEFAULT '1',
  `prune_shadow_next` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_forums`
--

INSERT INTO `phpbb_forums` (`forum_id`, `parent_id`, `left_id`, `right_id`, `forum_parents`, `forum_name`, `forum_desc`, `forum_desc_bitfield`, `forum_desc_options`, `forum_desc_uid`, `forum_link`, `forum_password`, `forum_style`, `forum_image`, `forum_rules`, `forum_rules_link`, `forum_rules_bitfield`, `forum_rules_options`, `forum_rules_uid`, `forum_topics_per_page`, `forum_type`, `forum_status`, `forum_last_post_id`, `forum_last_poster_id`, `forum_last_post_subject`, `forum_last_post_time`, `forum_last_poster_name`, `forum_last_poster_colour`, `forum_flags`, `display_on_index`, `enable_indexing`, `enable_icons`, `enable_prune`, `prune_next`, `prune_days`, `prune_viewed`, `prune_freq`, `display_subforum_list`, `forum_options`, `forum_posts_approved`, `forum_posts_unapproved`, `forum_posts_softdeleted`, `forum_topics_approved`, `forum_topics_unapproved`, `forum_topics_softdeleted`, `enable_shadow_prune`, `prune_shadow_days`, `prune_shadow_freq`, `prune_shadow_next`) VALUES
(1, 0, 1, 4, '', 'Ваша первая категория', '', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 0, 0, 1, 2, '', 1490973941, 'admin', 'AA0000', 32, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 7, 1, 0),
(2, 1, 2, 3, 'a:1:{i:1;a:2:{i:0;s:40:"Ваша первая категория";i:1;i:0;}}', 'Ваш первый форум', 'Описание вашего первого форума.', '', 7, '', '', '', 0, '', '', '', '', 7, '', 0, 1, 0, 5, 57, 'Re: etste set set', 1491209643, 'Badly', '', 48, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 5, 4, 0, 2, 0, 0, 0, 7, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_forums_access`
--

DROP TABLE IF EXISTS `phpbb_forums_access`;
CREATE TABLE `phpbb_forums_access` (
  `forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `session_id` char(32) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_forums_track`
--

DROP TABLE IF EXISTS `phpbb_forums_track`;
CREATE TABLE `phpbb_forums_track` (
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `mark_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_forums_track`
--

INSERT INTO `phpbb_forums_track` (`user_id`, `forum_id`, `mark_time`) VALUES
(56, 2, 1491207526),
(57, 2, 1491209643);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_forums_watch`
--

DROP TABLE IF EXISTS `phpbb_forums_watch`;
CREATE TABLE `phpbb_forums_watch` (
  `forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `notify_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_groups`
--

DROP TABLE IF EXISTS `phpbb_groups`;
CREATE TABLE `phpbb_groups` (
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  `group_type` tinyint(4) NOT NULL DEFAULT '1',
  `group_founder_manage` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `group_skip_auth` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `group_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_desc` text COLLATE utf8_bin NOT NULL,
  `group_desc_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_desc_options` int(11) UNSIGNED NOT NULL DEFAULT '7',
  `group_desc_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_display` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `group_avatar` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_avatar_type` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_avatar_width` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `group_avatar_height` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `group_rank` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `group_colour` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_sig_chars` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `group_receive_pm` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `group_message_limit` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `group_legend` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `group_max_recipients` mediumint(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_groups`
--

INSERT INTO `phpbb_groups` (`group_id`, `group_type`, `group_founder_manage`, `group_skip_auth`, `group_name`, `group_desc`, `group_desc_bitfield`, `group_desc_options`, `group_desc_uid`, `group_display`, `group_avatar`, `group_avatar_type`, `group_avatar_width`, `group_avatar_height`, `group_rank`, `group_colour`, `group_sig_chars`, `group_receive_pm`, `group_message_limit`, `group_legend`, `group_max_recipients`) VALUES
(1, 3, 0, 0, 'GUESTS', '', '', 7, '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 5),
(2, 3, 0, 0, 'REGISTERED', '', '', 7, '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 5),
(3, 3, 0, 0, 'REGISTERED_COPPA', '', '', 7, '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 5),
(4, 3, 0, 0, 'GLOBAL_MODERATORS', '', '', 7, '', 0, '', '', 0, 0, 0, '00AA00', 0, 0, 0, 2, 0),
(5, 3, 1, 0, 'ADMINISTRATORS', '', '', 7, '', 0, '', '', 0, 0, 0, 'AA0000', 0, 0, 0, 1, 0),
(6, 3, 0, 0, 'BOTS', '', '', 7, '', 0, '', '', 0, 0, 0, '9E8DA7', 0, 0, 0, 0, 5),
(7, 3, 0, 0, 'NEWLY_REGISTERED', '', '', 7, '', 0, '', '', 0, 0, 0, '', 0, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_icons`
--

DROP TABLE IF EXISTS `phpbb_icons`;
CREATE TABLE `phpbb_icons` (
  `icons_id` mediumint(8) UNSIGNED NOT NULL,
  `icons_url` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `icons_width` tinyint(4) NOT NULL DEFAULT '0',
  `icons_height` tinyint(4) NOT NULL DEFAULT '0',
  `icons_order` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `display_on_posting` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_icons`
--

INSERT INTO `phpbb_icons` (`icons_id`, `icons_url`, `icons_width`, `icons_height`, `icons_order`, `display_on_posting`) VALUES
(1, 'misc/fire.gif', 16, 16, 1, 1),
(2, 'smile/redface.gif', 16, 16, 9, 1),
(3, 'smile/mrgreen.gif', 16, 16, 10, 1),
(4, 'misc/heart.gif', 16, 16, 4, 1),
(5, 'misc/star.gif', 16, 16, 2, 1),
(6, 'misc/radioactive.gif', 16, 16, 3, 1),
(7, 'misc/thinking.gif', 16, 16, 5, 1),
(8, 'smile/info.gif', 16, 16, 8, 1),
(9, 'smile/question.gif', 16, 16, 6, 1),
(10, 'smile/alert.gif', 16, 16, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_lang`
--

DROP TABLE IF EXISTS `phpbb_lang`;
CREATE TABLE `phpbb_lang` (
  `lang_id` tinyint(4) NOT NULL,
  `lang_iso` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lang_dir` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lang_english_name` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lang_local_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lang_author` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_lang`
--

INSERT INTO `phpbb_lang` (`lang_id`, `lang_iso`, `lang_dir`, `lang_english_name`, `lang_local_name`, `lang_author`) VALUES
(1, 'en', 'en', 'British English', 'British English', 'phpBB Limited'),
(2, 'ru', 'ru', 'Russian', 'Русский', 'rxu');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_log`
--

DROP TABLE IF EXISTS `phpbb_log`;
CREATE TABLE `phpbb_log` (
  `log_id` mediumint(8) UNSIGNED NOT NULL,
  `log_type` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `reportee_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `log_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `log_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `log_operation` text COLLATE utf8_bin NOT NULL,
  `log_data` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_log`
--

INSERT INTO `phpbb_log` (`log_id`, `log_type`, `user_id`, `forum_id`, `topic_id`, `reportee_id`, `log_ip`, `log_time`, `log_operation`, `log_data`) VALUES
(1, 0, 2, 0, 0, 0, '82.209.214.222', 1490973945, 'LOG_INSTALL_INSTALLED', 'a:1:{i:0;s:6:"3.1.10";}'),
(2, 1, 2, 2, 2, 0, '82.209.214.222', 1491207508, 'LOG_POST_APPROVED', 'a:1:{i:0;s:13:"etste set set";}'),
(3, 0, 2, 0, 0, 0, '82.209.214.222', 1491207583, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(4, 0, 2, 0, 0, 0, '82.209.214.222', 1491207609, 'LOG_ACL_TRANSFER_PERMISSIONS', 'a:1:{i:0;s:6:"~root~";}'),
(5, 0, 2, 0, 0, 0, '82.209.214.222', 1491207637, 'LOG_ACL_RESTORE_PERMISSIONS', 'a:1:{i:0;s:6:"~root~";}'),
(6, 1, 2, 2, 2, 0, '82.209.214.222', 1491208317, 'LOG_POST_APPROVED', 'a:1:{i:0;s:17:"Re: etste set set";}'),
(7, 0, 2, 0, 0, 0, '82.209.214.222', 1491209759, 'LOG_USERS_ADDED', 'a:2:{i:0;s:28:"Администраторы";i:1;s:5:"Badly";}'),
(8, 1, 57, 2, 2, 0, '90.150.90.69', 1491209791, 'LOG_POST_APPROVED', 'a:1:{i:0;s:17:"Re: etste set set";}'),
(9, 0, 57, 0, 0, 0, '90.150.90.69', 1491209796, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(10, 0, 2, 0, 0, 0, '82.209.214.222', 1491212838, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(11, 0, 2, 0, 0, 0, '82.209.214.222', 1491576201, 'LOG_ADMIN_AUTH_SUCCESS', ''),
(12, 0, 2, 0, 0, 0, '82.209.214.222', 1491576291, 'LOG_CONFIG_REGISTRATION', ''),
(13, 0, 2, 0, 0, 0, '82.209.214.222', 1491576833, 'LOG_CONFIG_SETTINGS', ''),
(14, 0, 2, 0, 0, 0, '82.209.214.222', 1491578128, 'LOG_STYLE_ADD', 'a:1:{i:0;s:20:"AllanStyle-SUBSILVER";}'),
(15, 0, 2, 0, 0, 0, '82.209.214.222', 1491578128, 'LOG_STYLE_ADD', 'a:1:{i:0;s:12:"Black-Silver";}'),
(16, 0, 2, 0, 0, 0, '82.209.214.222', 1491578128, 'LOG_STYLE_ADD', 'a:1:{i:0;s:10:"FTH_Tropic";}'),
(17, 0, 2, 0, 0, 0, '82.209.214.222', 1491578128, 'LOG_STYLE_ADD', 'a:1:{i:0;s:14:"IDLaunch_Fresh";}'),
(18, 0, 2, 0, 0, 0, '82.209.214.222', 1491578128, 'LOG_STYLE_ADD', 'a:1:{i:0;s:6:"PBTech";}'),
(19, 0, 2, 0, 0, 0, '82.209.214.222', 1491578128, 'LOG_STYLE_ADD', 'a:1:{i:0;s:25:"prosilver Special Edition";}'),
(20, 0, 2, 0, 0, 0, '82.209.214.222', 1491578347, 'LOG_CONFIG_SETTINGS', ''),
(21, 0, 2, 0, 0, 0, '82.209.214.222', 1491578362, 'LOG_CONFIG_SETTINGS', ''),
(22, 0, 2, 0, 0, 0, '82.209.214.222', 1491578519, 'LOG_CONFIG_POST', '');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_login_attempts`
--

DROP TABLE IF EXISTS `phpbb_login_attempts`;
CREATE TABLE `phpbb_login_attempts` (
  `attempt_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `attempt_browser` varchar(150) COLLATE utf8_bin NOT NULL DEFAULT '',
  `attempt_forwarded_for` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `attempt_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `username_clean` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_migrations`
--

DROP TABLE IF EXISTS `phpbb_migrations`;
CREATE TABLE `phpbb_migrations` (
  `migration_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `migration_depends_on` text COLLATE utf8_bin NOT NULL,
  `migration_schema_done` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `migration_data_done` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `migration_data_state` text COLLATE utf8_bin NOT NULL,
  `migration_start_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `migration_end_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_migrations`
--

INSERT INTO `phpbb_migrations` (`migration_name`, `migration_depends_on`, `migration_schema_done`, `migration_data_done`, `migration_data_state`, `migration_start_time`, `migration_end_time`) VALUES
('\\phpbb\\db\\migration\\data\\v30x\\local_url_bbcode', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_0', 'a:0:{}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_1', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_1_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc3";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc2', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc3', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10_rc2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11_rc2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11_rc1', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_10";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11_rc2', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc3";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc1', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc2', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc3', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12_rc2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_pl1', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_rc1', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14_rc1', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_1_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_0";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2_rc2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2_rc2', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_3', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_3_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_3_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_4', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_4_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_4_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_3";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5', 'a:1:{i:0;s:52:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5_rc1part2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_4";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5_rc1part2', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc4";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_5";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc2', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc3', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc4', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6_rc3";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_rc2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_pl1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_6";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_rc2', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_8', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_8_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_8_rc1', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_7_pl1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc4";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc1', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_8";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc2', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc3', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc4', 'a:1:{i:0;s:47:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_9_rc3";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\acp_prune_users_module', 'a:1:{i:0;s:35:"\\phpbb\\db\\migration\\data\\v310\\beta1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\acp_style_components_module', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\allow_cdn', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v310\\jquery_update";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\alpha1', 'a:18:{i:0;s:46:"\\phpbb\\db\\migration\\data\\v30x\\local_url_bbcode";i:1;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_12";i:2;s:57:"\\phpbb\\db\\migration\\data\\v310\\acp_style_components_module";i:3;s:39:"\\phpbb\\db\\migration\\data\\v310\\allow_cdn";i:4;s:49:"\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth";i:5;s:37:"\\phpbb\\db\\migration\\data\\v310\\avatars";i:6;s:40:"\\phpbb\\db\\migration\\data\\v310\\boardindex";i:7;s:44:"\\phpbb\\db\\migration\\data\\v310\\config_db_text";i:8;s:45:"\\phpbb\\db\\migration\\data\\v310\\forgot_password";i:9;s:41:"\\phpbb\\db\\migration\\data\\v310\\mod_rewrite";i:10;s:49:"\\phpbb\\db\\migration\\data\\v310\\mysql_fulltext_drop";i:11;s:40:"\\phpbb\\db\\migration\\data\\v310\\namespaces";i:12;s:48:"\\phpbb\\db\\migration\\data\\v310\\notifications_cron";i:13;s:60:"\\phpbb\\db\\migration\\data\\v310\\notification_options_reconvert";i:14;s:38:"\\phpbb\\db\\migration\\data\\v310\\plupload";i:15;s:51:"\\phpbb\\db\\migration\\data\\v310\\signature_module_auth";i:16;s:52:"\\phpbb\\db\\migration\\data\\v310\\softdelete_mcp_modules";i:17;s:38:"\\phpbb\\db\\migration\\data\\v310\\teampage";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\alpha2', 'a:2:{i:0;s:36:"\\phpbb\\db\\migration\\data\\v310\\alpha1";i:1;s:51:"\\phpbb\\db\\migration\\data\\v310\\notifications_cron_p2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\alpha3', 'a:4:{i:0;s:36:"\\phpbb\\db\\migration\\data\\v310\\alpha2";i:1;s:42:"\\phpbb\\db\\migration\\data\\v310\\avatar_types";i:2;s:39:"\\phpbb\\db\\migration\\data\\v310\\passwords";i:3;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth', 'a:0:{}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth2', 'a:1:{i:0;s:49:"\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\avatar_types', 'a:2:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";i:1;s:37:"\\phpbb\\db\\migration\\data\\v310\\avatars";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\avatars', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\beta1', 'a:7:{i:0;s:36:"\\phpbb\\db\\migration\\data\\v310\\alpha3";i:1;s:42:"\\phpbb\\db\\migration\\data\\v310\\passwords_p2";i:2;s:52:"\\phpbb\\db\\migration\\data\\v310\\postgres_fulltext_drop";i:3;s:63:"\\phpbb\\db\\migration\\data\\v310\\profilefield_change_load_settings";i:4;s:51:"\\phpbb\\db\\migration\\data\\v310\\profilefield_location";i:5;s:54:"\\phpbb\\db\\migration\\data\\v310\\soft_delete_mod_convert2";i:6;s:48:"\\phpbb\\db\\migration\\data\\v310\\ucp_popuppm_module";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\beta2', 'a:3:{i:0;s:35:"\\phpbb\\db\\migration\\data\\v310\\beta1";i:1;s:52:"\\phpbb\\db\\migration\\data\\v310\\acp_prune_users_module";i:2;s:59:"\\phpbb\\db\\migration\\data\\v310\\profilefield_location_cleanup";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\beta3', 'a:6:{i:0;s:35:"\\phpbb\\db\\migration\\data\\v310\\beta2";i:1;s:50:"\\phpbb\\db\\migration\\data\\v310\\auth_provider_oauth2";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\board_contact_name";i:3;s:44:"\\phpbb\\db\\migration\\data\\v310\\jquery_update2";i:4;s:50:"\\phpbb\\db\\migration\\data\\v310\\live_searches_config";i:5;s:49:"\\phpbb\\db\\migration\\data\\v310\\prune_shadow_topics";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\beta4', 'a:3:{i:0;s:35:"\\phpbb\\db\\migration\\data\\v310\\beta3";i:1;s:69:"\\phpbb\\db\\migration\\data\\v310\\extensions_version_check_force_unstable";i:2;s:58:"\\phpbb\\db\\migration\\data\\v310\\reset_missing_captcha_plugin";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\board_contact_name', 'a:1:{i:0;s:35:"\\phpbb\\db\\migration\\data\\v310\\beta2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\boardindex', 'a:0:{}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\bot_update', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc6";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\captcha_plugins', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\config_db_text', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\contact_admin_acp_module', 'a:0:{}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\contact_admin_form', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v310\\config_db_text";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\dev', 'a:5:{i:0;s:40:"\\phpbb\\db\\migration\\data\\v310\\extensions";i:1;s:45:"\\phpbb\\db\\migration\\data\\v310\\style_update_p2";i:2;s:41:"\\phpbb\\db\\migration\\data\\v310\\timezone_p2";i:3;s:52:"\\phpbb\\db\\migration\\data\\v310\\reported_posts_display";i:4;s:46:"\\phpbb\\db\\migration\\data\\v310\\migrations_table";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\extensions', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\extensions_version_check_force_unstable', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\forgot_password', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\gold', 'a:2:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc6";i:1;s:40:"\\phpbb\\db\\migration\\data\\v310\\bot_update";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\jquery_update', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\jquery_update2', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v310\\jquery_update";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\live_searches_config', 'a:0:{}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\migrations_table', 'a:0:{}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\mod_rewrite', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\mysql_fulltext_drop', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\namespaces', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\notification_options_reconvert', 'a:1:{i:0;s:54:"\\phpbb\\db\\migration\\data\\v310\\notifications_schema_fix";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\notifications', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\notifications_cron', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v310\\notifications";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\notifications_cron_p2', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v310\\notifications_cron";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\notifications_schema_fix', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v310\\notifications";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\notifications_use_full_name', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc3";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\passwords', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\passwords_convert_p1', 'a:1:{i:0;s:42:"\\phpbb\\db\\migration\\data\\v310\\passwords_p2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\passwords_convert_p2', 'a:1:{i:0;s:50:"\\phpbb\\db\\migration\\data\\v310\\passwords_convert_p1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\passwords_p2', 'a:1:{i:0;s:39:"\\phpbb\\db\\migration\\data\\v310\\passwords";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\plupload', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\postgres_fulltext_drop', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_aol', 'a:1:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_yahoo_cleanup";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_aol_cleanup', 'a:1:{i:0;s:46:"\\phpbb\\db\\migration\\data\\v310\\profilefield_aol";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_change_load_settings', 'a:1:{i:0;s:54:"\\phpbb\\db\\migration\\data\\v310\\profilefield_aol_cleanup";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_cleanup', 'a:2:{i:0;s:52:"\\phpbb\\db\\migration\\data\\v310\\profilefield_interests";i:1;s:53:"\\phpbb\\db\\migration\\data\\v310\\profilefield_occupation";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field', 'a:1:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_on_memberlist";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_facebook', 'a:3:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field";i:1;s:55:"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_field_validation_length', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc3";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_googleplus', 'a:3:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field";i:1;s:55:"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_icq', 'a:1:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_icq_cleanup', 'a:1:{i:0;s:46:"\\phpbb\\db\\migration\\data\\v310\\profilefield_icq";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_interests', 'a:2:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";i:1;s:55:"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_location', 'a:2:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";i:1;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_on_memberlist";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_location_cleanup', 'a:1:{i:0;s:51:"\\phpbb\\db\\migration\\data\\v310\\profilefield_location";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_occupation', 'a:1:{i:0;s:52:"\\phpbb\\db\\migration\\data\\v310\\profilefield_interests";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_on_memberlist', 'a:1:{i:0;s:50:"\\phpbb\\db\\migration\\data\\v310\\profilefield_cleanup";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_skype', 'a:3:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field";i:1;s:55:"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_twitter', 'a:3:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field";i:1;s:55:"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_types', 'a:1:{i:0;s:36:"\\phpbb\\db\\migration\\data\\v310\\alpha2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_website', 'a:2:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_on_memberlist";i:1;s:54:"\\phpbb\\db\\migration\\data\\v310\\profilefield_icq_cleanup";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_website_cleanup', 'a:1:{i:0;s:50:"\\phpbb\\db\\migration\\data\\v310\\profilefield_website";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_wlm', 'a:1:{i:0;s:58:"\\phpbb\\db\\migration\\data\\v310\\profilefield_website_cleanup";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_wlm_cleanup', 'a:1:{i:0;s:46:"\\phpbb\\db\\migration\\data\\v310\\profilefield_wlm";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_yahoo', 'a:1:{i:0;s:54:"\\phpbb\\db\\migration\\data\\v310\\profilefield_wlm_cleanup";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_yahoo_cleanup', 'a:1:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_yahoo";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\profilefield_youtube', 'a:3:{i:0;s:56:"\\phpbb\\db\\migration\\data\\v310\\profilefield_contact_field";i:1;s:55:"\\phpbb\\db\\migration\\data\\v310\\profilefield_show_novalue";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_types";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\prune_shadow_topics', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\rc1', 'a:9:{i:0;s:35:"\\phpbb\\db\\migration\\data\\v310\\beta4";i:1;s:54:"\\phpbb\\db\\migration\\data\\v310\\contact_admin_acp_module";i:2;s:48:"\\phpbb\\db\\migration\\data\\v310\\contact_admin_form";i:3;s:50:"\\phpbb\\db\\migration\\data\\v310\\passwords_convert_p2";i:4;s:51:"\\phpbb\\db\\migration\\data\\v310\\profilefield_facebook";i:5;s:53:"\\phpbb\\db\\migration\\data\\v310\\profilefield_googleplus";i:6;s:48:"\\phpbb\\db\\migration\\data\\v310\\profilefield_skype";i:7;s:50:"\\phpbb\\db\\migration\\data\\v310\\profilefield_twitter";i:8;s:50:"\\phpbb\\db\\migration\\data\\v310\\profilefield_youtube";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\rc2', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\rc3', 'a:5:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc2";i:1;s:45:"\\phpbb\\db\\migration\\data\\v310\\captcha_plugins";i:2;s:53:"\\phpbb\\db\\migration\\data\\v310\\rename_too_long_indexes";i:3;s:41:"\\phpbb\\db\\migration\\data\\v310\\search_type";i:4;s:49:"\\phpbb\\db\\migration\\data\\v310\\topic_sort_username";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\rc4', 'a:2:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc3";i:1;s:57:"\\phpbb\\db\\migration\\data\\v310\\notifications_use_full_name";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\rc5', 'a:3:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc4";i:1;s:66:"\\phpbb\\db\\migration\\data\\v310\\profilefield_field_validation_length";i:2;s:53:"\\phpbb\\db\\migration\\data\\v310\\remove_acp_styles_cache";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\rc6', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc5";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\remove_acp_styles_cache', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\rc4";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\rename_too_long_indexes', 'a:1:{i:0;s:43:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_0";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\reported_posts_display', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\reset_missing_captcha_plugin', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\search_type', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\signature_module_auth', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\soft_delete_mod_convert', 'a:1:{i:0;s:36:"\\phpbb\\db\\migration\\data\\v310\\alpha3";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\soft_delete_mod_convert2', 'a:1:{i:0;s:53:"\\phpbb\\db\\migration\\data\\v310\\soft_delete_mod_convert";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\softdelete_mcp_modules', 'a:2:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";i:1;s:43:"\\phpbb\\db\\migration\\data\\v310\\softdelete_p2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\softdelete_p1', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\softdelete_p2', 'a:2:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";i:1;s:43:"\\phpbb\\db\\migration\\data\\v310\\softdelete_p1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\style_update_p1', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\style_update_p2', 'a:1:{i:0;s:45:"\\phpbb\\db\\migration\\data\\v310\\style_update_p1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\teampage', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\timezone', 'a:1:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_11";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\timezone_p2', 'a:1:{i:0;s:38:"\\phpbb\\db\\migration\\data\\v310\\timezone";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\topic_sort_username', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v310\\ucp_popuppm_module', 'a:1:{i:0;s:33:"\\phpbb\\db\\migration\\data\\v310\\dev";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\add_log_time_index', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v319";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\increase_size_of_dateformat', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v317";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\m_pm_report', 'a:1:{i:0;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v316rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\m_softdelete_global', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v311";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\plupload_last_gc_dynamic', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v312";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\profilefield_remove_underscore_from_alpha', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v311";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\profilefield_yahoo_update_url', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v312";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\style_update', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v310\\gold";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\update_custom_bbcodes_with_idn', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v312";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v311', 'a:2:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v310\\gold";i:1;s:42:"\\phpbb\\db\\migration\\data\\v31x\\style_update";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v3110', 'a:1:{i:0;s:38:"\\phpbb\\db\\migration\\data\\v31x\\v3110rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v3110rc1', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v319";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v312', 'a:1:{i:0;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v312rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v312rc1', 'a:2:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v311";i:1;s:49:"\\phpbb\\db\\migration\\data\\v31x\\m_softdelete_global";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v313', 'a:1:{i:0;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v313rc2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v313rc1', 'a:5:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_rc1";i:1;s:54:"\\phpbb\\db\\migration\\data\\v31x\\plupload_last_gc_dynamic";i:2;s:71:"\\phpbb\\db\\migration\\data\\v31x\\profilefield_remove_underscore_from_alpha";i:3;s:59:"\\phpbb\\db\\migration\\data\\v31x\\profilefield_yahoo_update_url";i:4;s:60:"\\phpbb\\db\\migration\\data\\v31x\\update_custom_bbcodes_with_idn";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v313rc2', 'a:2:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_13_pl1";i:1;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v313rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v314', 'a:2:{i:0;s:44:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14";i:1;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v314rc2";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v314rc1', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v313";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v314rc2', 'a:2:{i:0;s:48:"\\phpbb\\db\\migration\\data\\v30x\\release_3_0_14_rc1";i:1;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v314rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v315', 'a:1:{i:0;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v315rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v315rc1', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v314";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v316', 'a:1:{i:0;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v316rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v316rc1', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v315";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v317', 'a:1:{i:0;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v317rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v317pl1', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v317";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v317rc1', 'a:2:{i:0;s:41:"\\phpbb\\db\\migration\\data\\v31x\\m_pm_report";i:1;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v316";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v318', 'a:1:{i:0;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v318rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v318rc1', 'a:2:{i:0;s:57:"\\phpbb\\db\\migration\\data\\v31x\\increase_size_of_dateformat";i:1;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v317pl1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v319', 'a:1:{i:0;s:37:"\\phpbb\\db\\migration\\data\\v31x\\v319rc1";}', 1, 1, '', 1490973946, 1490973946),
('\\phpbb\\db\\migration\\data\\v31x\\v319rc1', 'a:1:{i:0;s:34:"\\phpbb\\db\\migration\\data\\v31x\\v318";}', 1, 1, '', 1490973946, 1490973946);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_moderator_cache`
--

DROP TABLE IF EXISTS `phpbb_moderator_cache`;
CREATE TABLE `phpbb_moderator_cache` (
  `forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `group_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `group_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_on_index` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_modules`
--

DROP TABLE IF EXISTS `phpbb_modules`;
CREATE TABLE `phpbb_modules` (
  `module_id` mediumint(8) UNSIGNED NOT NULL,
  `module_enabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `module_display` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `module_basename` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `module_class` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `parent_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `left_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `right_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `module_langname` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `module_mode` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `module_auth` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_modules`
--

INSERT INTO `phpbb_modules` (`module_id`, `module_enabled`, `module_display`, `module_basename`, `module_class`, `parent_id`, `left_id`, `right_id`, `module_langname`, `module_mode`, `module_auth`) VALUES
(1, 1, 1, '', 'acp', 0, 1, 66, 'ACP_CAT_GENERAL', '', ''),
(2, 1, 1, '', 'acp', 1, 4, 17, 'ACP_QUICK_ACCESS', '', ''),
(3, 1, 1, '', 'acp', 1, 18, 43, 'ACP_BOARD_CONFIGURATION', '', ''),
(4, 1, 1, '', 'acp', 1, 44, 51, 'ACP_CLIENT_COMMUNICATION', '', ''),
(5, 1, 1, '', 'acp', 1, 52, 65, 'ACP_SERVER_CONFIGURATION', '', ''),
(6, 1, 1, '', 'acp', 0, 67, 86, 'ACP_CAT_FORUMS', '', ''),
(7, 1, 1, '', 'acp', 6, 68, 73, 'ACP_MANAGE_FORUMS', '', ''),
(8, 1, 1, '', 'acp', 6, 74, 85, 'ACP_FORUM_BASED_PERMISSIONS', '', ''),
(9, 1, 1, '', 'acp', 0, 87, 114, 'ACP_CAT_POSTING', '', ''),
(10, 1, 1, '', 'acp', 9, 88, 101, 'ACP_MESSAGES', '', ''),
(11, 1, 1, '', 'acp', 9, 102, 113, 'ACP_ATTACHMENTS', '', ''),
(12, 1, 1, '', 'acp', 0, 115, 172, 'ACP_CAT_USERGROUP', '', ''),
(13, 1, 1, '', 'acp', 12, 116, 151, 'ACP_CAT_USERS', '', ''),
(14, 1, 1, '', 'acp', 12, 152, 161, 'ACP_GROUPS', '', ''),
(15, 1, 1, '', 'acp', 12, 162, 171, 'ACP_USER_SECURITY', '', ''),
(16, 1, 1, '', 'acp', 0, 173, 222, 'ACP_CAT_PERMISSIONS', '', ''),
(17, 1, 1, '', 'acp', 16, 176, 185, 'ACP_GLOBAL_PERMISSIONS', '', ''),
(18, 1, 1, '', 'acp', 16, 186, 197, 'ACP_FORUM_BASED_PERMISSIONS', '', ''),
(19, 1, 1, '', 'acp', 16, 198, 207, 'ACP_PERMISSION_ROLES', '', ''),
(20, 1, 1, '', 'acp', 16, 208, 221, 'ACP_PERMISSION_MASKS', '', ''),
(21, 1, 1, '', 'acp', 0, 223, 238, 'ACP_CAT_CUSTOMISE', '', ''),
(22, 1, 1, '', 'acp', 21, 228, 233, 'ACP_STYLE_MANAGEMENT', '', ''),
(23, 1, 1, '', 'acp', 21, 224, 227, 'ACP_EXTENSION_MANAGEMENT', '', ''),
(24, 1, 1, '', 'acp', 21, 234, 237, 'ACP_LANGUAGE', '', ''),
(25, 1, 1, '', 'acp', 0, 239, 258, 'ACP_CAT_MAINTENANCE', '', ''),
(26, 1, 1, '', 'acp', 25, 240, 249, 'ACP_FORUM_LOGS', '', ''),
(27, 1, 1, '', 'acp', 25, 250, 257, 'ACP_CAT_DATABASE', '', ''),
(28, 1, 1, '', 'acp', 0, 259, 282, 'ACP_CAT_SYSTEM', '', ''),
(29, 1, 1, '', 'acp', 28, 260, 263, 'ACP_AUTOMATION', '', ''),
(30, 1, 1, '', 'acp', 28, 264, 273, 'ACP_GENERAL_TASKS', '', ''),
(31, 1, 1, '', 'acp', 28, 274, 281, 'ACP_MODULE_MANAGEMENT', '', ''),
(32, 1, 1, '', 'acp', 0, 283, 284, 'ACP_CAT_DOT_MODS', '', ''),
(33, 1, 1, 'acp_attachments', 'acp', 3, 19, 20, 'ACP_ATTACHMENT_SETTINGS', 'attach', 'acl_a_attach'),
(34, 1, 1, 'acp_attachments', 'acp', 11, 103, 104, 'ACP_ATTACHMENT_SETTINGS', 'attach', 'acl_a_attach'),
(35, 1, 1, 'acp_attachments', 'acp', 11, 105, 106, 'ACP_MANAGE_EXTENSIONS', 'extensions', 'acl_a_attach'),
(36, 1, 1, 'acp_attachments', 'acp', 11, 107, 108, 'ACP_EXTENSION_GROUPS', 'ext_groups', 'acl_a_attach'),
(37, 1, 1, 'acp_attachments', 'acp', 11, 109, 110, 'ACP_ORPHAN_ATTACHMENTS', 'orphan', 'acl_a_attach'),
(38, 1, 1, 'acp_attachments', 'acp', 11, 111, 112, 'ACP_MANAGE_ATTACHMENTS', 'manage', 'acl_a_attach'),
(39, 1, 1, 'acp_ban', 'acp', 15, 163, 164, 'ACP_BAN_EMAILS', 'email', 'acl_a_ban'),
(40, 1, 1, 'acp_ban', 'acp', 15, 165, 166, 'ACP_BAN_IPS', 'ip', 'acl_a_ban'),
(41, 1, 1, 'acp_ban', 'acp', 15, 167, 168, 'ACP_BAN_USERNAMES', 'user', 'acl_a_ban'),
(42, 1, 1, 'acp_bbcodes', 'acp', 10, 89, 90, 'ACP_BBCODES', 'bbcodes', 'acl_a_bbcode'),
(43, 1, 1, 'acp_board', 'acp', 3, 21, 22, 'ACP_BOARD_SETTINGS', 'settings', 'acl_a_board'),
(44, 1, 1, 'acp_board', 'acp', 3, 23, 24, 'ACP_BOARD_FEATURES', 'features', 'acl_a_board'),
(45, 1, 1, 'acp_board', 'acp', 3, 25, 26, 'ACP_AVATAR_SETTINGS', 'avatar', 'acl_a_board'),
(46, 1, 1, 'acp_board', 'acp', 3, 27, 28, 'ACP_MESSAGE_SETTINGS', 'message', 'acl_a_board'),
(47, 1, 1, 'acp_board', 'acp', 10, 91, 92, 'ACP_MESSAGE_SETTINGS', 'message', 'acl_a_board'),
(48, 1, 1, 'acp_board', 'acp', 3, 29, 30, 'ACP_POST_SETTINGS', 'post', 'acl_a_board'),
(49, 1, 1, 'acp_board', 'acp', 10, 93, 94, 'ACP_POST_SETTINGS', 'post', 'acl_a_board'),
(50, 1, 1, 'acp_board', 'acp', 3, 31, 32, 'ACP_SIGNATURE_SETTINGS', 'signature', 'acl_a_board'),
(51, 1, 1, 'acp_board', 'acp', 3, 33, 34, 'ACP_FEED_SETTINGS', 'feed', 'acl_a_board'),
(52, 1, 1, 'acp_board', 'acp', 3, 35, 36, 'ACP_REGISTER_SETTINGS', 'registration', 'acl_a_board'),
(53, 1, 1, 'acp_board', 'acp', 4, 45, 46, 'ACP_AUTH_SETTINGS', 'auth', 'acl_a_server'),
(54, 1, 1, 'acp_board', 'acp', 4, 47, 48, 'ACP_EMAIL_SETTINGS', 'email', 'acl_a_server'),
(55, 1, 1, 'acp_board', 'acp', 5, 53, 54, 'ACP_COOKIE_SETTINGS', 'cookie', 'acl_a_server'),
(56, 1, 1, 'acp_board', 'acp', 5, 55, 56, 'ACP_SERVER_SETTINGS', 'server', 'acl_a_server'),
(57, 1, 1, 'acp_board', 'acp', 5, 57, 58, 'ACP_SECURITY_SETTINGS', 'security', 'acl_a_server'),
(58, 1, 1, 'acp_board', 'acp', 5, 59, 60, 'ACP_LOAD_SETTINGS', 'load', 'acl_a_server'),
(59, 1, 1, 'acp_bots', 'acp', 30, 265, 266, 'ACP_BOTS', 'bots', 'acl_a_bots'),
(60, 1, 1, 'acp_captcha', 'acp', 3, 37, 38, 'ACP_VC_SETTINGS', 'visual', 'acl_a_board'),
(61, 1, 0, 'acp_captcha', 'acp', 3, 39, 40, 'ACP_VC_CAPTCHA_DISPLAY', 'img', 'acl_a_board'),
(62, 1, 1, 'acp_contact', 'acp', 3, 41, 42, 'ACP_CONTACT_SETTINGS', 'contact', 'acl_a_board'),
(63, 1, 1, 'acp_database', 'acp', 27, 251, 252, 'ACP_BACKUP', 'backup', 'acl_a_backup'),
(64, 1, 1, 'acp_database', 'acp', 27, 253, 254, 'ACP_RESTORE', 'restore', 'acl_a_backup'),
(65, 1, 1, 'acp_disallow', 'acp', 15, 169, 170, 'ACP_DISALLOW_USERNAMES', 'usernames', 'acl_a_names'),
(66, 1, 1, 'acp_email', 'acp', 30, 267, 268, 'ACP_MASS_EMAIL', 'email', 'acl_a_email && cfg_email_enable'),
(67, 1, 1, 'acp_extensions', 'acp', 23, 225, 226, 'ACP_EXTENSIONS', 'main', 'acl_a_extensions'),
(68, 1, 1, 'acp_forums', 'acp', 7, 69, 70, 'ACP_MANAGE_FORUMS', 'manage', 'acl_a_forum'),
(69, 1, 1, 'acp_groups', 'acp', 14, 153, 154, 'ACP_GROUPS_MANAGE', 'manage', 'acl_a_group'),
(70, 1, 1, 'acp_groups', 'acp', 14, 155, 156, 'ACP_GROUPS_POSITION', 'position', 'acl_a_group'),
(71, 1, 1, 'acp_icons', 'acp', 10, 95, 96, 'ACP_ICONS', 'icons', 'acl_a_icons'),
(72, 1, 1, 'acp_icons', 'acp', 10, 97, 98, 'ACP_SMILIES', 'smilies', 'acl_a_icons'),
(73, 1, 1, 'acp_inactive', 'acp', 13, 117, 118, 'ACP_INACTIVE_USERS', 'list', 'acl_a_user'),
(74, 1, 1, 'acp_jabber', 'acp', 4, 49, 50, 'ACP_JABBER_SETTINGS', 'settings', 'acl_a_jabber'),
(75, 1, 1, 'acp_language', 'acp', 24, 235, 236, 'ACP_LANGUAGE_PACKS', 'lang_packs', 'acl_a_language'),
(76, 1, 1, 'acp_logs', 'acp', 26, 241, 242, 'ACP_ADMIN_LOGS', 'admin', 'acl_a_viewlogs'),
(77, 1, 1, 'acp_logs', 'acp', 26, 243, 244, 'ACP_MOD_LOGS', 'mod', 'acl_a_viewlogs'),
(78, 1, 1, 'acp_logs', 'acp', 26, 245, 246, 'ACP_USERS_LOGS', 'users', 'acl_a_viewlogs'),
(79, 1, 1, 'acp_logs', 'acp', 26, 247, 248, 'ACP_CRITICAL_LOGS', 'critical', 'acl_a_viewlogs'),
(80, 1, 1, 'acp_main', 'acp', 1, 2, 3, 'ACP_INDEX', 'main', ''),
(81, 1, 1, 'acp_modules', 'acp', 31, 275, 276, 'ACP', 'acp', 'acl_a_modules'),
(82, 1, 1, 'acp_modules', 'acp', 31, 277, 278, 'UCP', 'ucp', 'acl_a_modules'),
(83, 1, 1, 'acp_modules', 'acp', 31, 279, 280, 'MCP', 'mcp', 'acl_a_modules'),
(84, 1, 1, 'acp_permission_roles', 'acp', 19, 199, 200, 'ACP_ADMIN_ROLES', 'admin_roles', 'acl_a_roles && acl_a_aauth'),
(85, 1, 1, 'acp_permission_roles', 'acp', 19, 201, 202, 'ACP_USER_ROLES', 'user_roles', 'acl_a_roles && acl_a_uauth'),
(86, 1, 1, 'acp_permission_roles', 'acp', 19, 203, 204, 'ACP_MOD_ROLES', 'mod_roles', 'acl_a_roles && acl_a_mauth'),
(87, 1, 1, 'acp_permission_roles', 'acp', 19, 205, 206, 'ACP_FORUM_ROLES', 'forum_roles', 'acl_a_roles && acl_a_fauth'),
(88, 1, 1, 'acp_permissions', 'acp', 16, 174, 175, 'ACP_PERMISSIONS', 'intro', 'acl_a_authusers || acl_a_authgroups || acl_a_viewauth'),
(89, 1, 0, 'acp_permissions', 'acp', 20, 209, 210, 'ACP_PERMISSION_TRACE', 'trace', 'acl_a_viewauth'),
(90, 1, 1, 'acp_permissions', 'acp', 18, 187, 188, 'ACP_FORUM_PERMISSIONS', 'setting_forum_local', 'acl_a_fauth && (acl_a_authusers || acl_a_authgroups)'),
(91, 1, 1, 'acp_permissions', 'acp', 18, 189, 190, 'ACP_FORUM_PERMISSIONS_COPY', 'setting_forum_copy', 'acl_a_fauth && acl_a_authusers && acl_a_authgroups && acl_a_mauth'),
(92, 1, 1, 'acp_permissions', 'acp', 18, 191, 192, 'ACP_FORUM_MODERATORS', 'setting_mod_local', 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),
(93, 1, 1, 'acp_permissions', 'acp', 17, 177, 178, 'ACP_USERS_PERMISSIONS', 'setting_user_global', 'acl_a_authusers && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
(94, 1, 1, 'acp_permissions', 'acp', 13, 121, 122, 'ACP_USERS_PERMISSIONS', 'setting_user_global', 'acl_a_authusers && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
(95, 1, 1, 'acp_permissions', 'acp', 18, 193, 194, 'ACP_USERS_FORUM_PERMISSIONS', 'setting_user_local', 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),
(96, 1, 1, 'acp_permissions', 'acp', 13, 123, 124, 'ACP_USERS_FORUM_PERMISSIONS', 'setting_user_local', 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),
(97, 1, 1, 'acp_permissions', 'acp', 17, 179, 180, 'ACP_GROUPS_PERMISSIONS', 'setting_group_global', 'acl_a_authgroups && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
(98, 1, 1, 'acp_permissions', 'acp', 14, 157, 158, 'ACP_GROUPS_PERMISSIONS', 'setting_group_global', 'acl_a_authgroups && (acl_a_aauth || acl_a_mauth || acl_a_uauth)'),
(99, 1, 1, 'acp_permissions', 'acp', 18, 195, 196, 'ACP_GROUPS_FORUM_PERMISSIONS', 'setting_group_local', 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),
(100, 1, 1, 'acp_permissions', 'acp', 14, 159, 160, 'ACP_GROUPS_FORUM_PERMISSIONS', 'setting_group_local', 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),
(101, 1, 1, 'acp_permissions', 'acp', 17, 181, 182, 'ACP_ADMINISTRATORS', 'setting_admin_global', 'acl_a_aauth && (acl_a_authusers || acl_a_authgroups)'),
(102, 1, 1, 'acp_permissions', 'acp', 17, 183, 184, 'ACP_GLOBAL_MODERATORS', 'setting_mod_global', 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),
(103, 1, 1, 'acp_permissions', 'acp', 20, 211, 212, 'ACP_VIEW_ADMIN_PERMISSIONS', 'view_admin_global', 'acl_a_viewauth'),
(104, 1, 1, 'acp_permissions', 'acp', 20, 213, 214, 'ACP_VIEW_USER_PERMISSIONS', 'view_user_global', 'acl_a_viewauth'),
(105, 1, 1, 'acp_permissions', 'acp', 20, 215, 216, 'ACP_VIEW_GLOBAL_MOD_PERMISSIONS', 'view_mod_global', 'acl_a_viewauth'),
(106, 1, 1, 'acp_permissions', 'acp', 20, 217, 218, 'ACP_VIEW_FORUM_MOD_PERMISSIONS', 'view_mod_local', 'acl_a_viewauth'),
(107, 1, 1, 'acp_permissions', 'acp', 20, 219, 220, 'ACP_VIEW_FORUM_PERMISSIONS', 'view_forum_local', 'acl_a_viewauth'),
(108, 1, 1, 'acp_php_info', 'acp', 30, 269, 270, 'ACP_PHP_INFO', 'info', 'acl_a_phpinfo'),
(109, 1, 1, 'acp_profile', 'acp', 13, 125, 126, 'ACP_CUSTOM_PROFILE_FIELDS', 'profile', 'acl_a_profile'),
(110, 1, 1, 'acp_prune', 'acp', 7, 71, 72, 'ACP_PRUNE_FORUMS', 'forums', 'acl_a_prune'),
(111, 1, 1, 'acp_prune', 'acp', 13, 127, 128, 'ACP_PRUNE_USERS', 'users', 'acl_a_userdel'),
(112, 1, 1, 'acp_ranks', 'acp', 13, 129, 130, 'ACP_MANAGE_RANKS', 'ranks', 'acl_a_ranks'),
(113, 1, 1, 'acp_reasons', 'acp', 30, 271, 272, 'ACP_MANAGE_REASONS', 'main', 'acl_a_reasons'),
(114, 1, 1, 'acp_search', 'acp', 5, 61, 62, 'ACP_SEARCH_SETTINGS', 'settings', 'acl_a_search'),
(115, 1, 1, 'acp_search', 'acp', 27, 255, 256, 'ACP_SEARCH_INDEX', 'index', 'acl_a_search'),
(116, 1, 1, 'acp_send_statistics', 'acp', 5, 63, 64, 'ACP_SEND_STATISTICS', 'send_statistics', 'acl_a_server'),
(117, 1, 1, 'acp_styles', 'acp', 22, 229, 230, 'ACP_STYLES', 'style', 'acl_a_styles'),
(118, 1, 1, 'acp_styles', 'acp', 22, 231, 232, 'ACP_STYLES_INSTALL', 'install', 'acl_a_styles'),
(119, 1, 1, 'acp_update', 'acp', 29, 261, 262, 'ACP_VERSION_CHECK', 'version_check', 'acl_a_board'),
(120, 1, 1, 'acp_users', 'acp', 13, 119, 120, 'ACP_MANAGE_USERS', 'overview', 'acl_a_user'),
(121, 1, 0, 'acp_users', 'acp', 13, 131, 132, 'ACP_USER_FEEDBACK', 'feedback', 'acl_a_user'),
(122, 1, 0, 'acp_users', 'acp', 13, 133, 134, 'ACP_USER_WARNINGS', 'warnings', 'acl_a_user'),
(123, 1, 0, 'acp_users', 'acp', 13, 135, 136, 'ACP_USER_PROFILE', 'profile', 'acl_a_user'),
(124, 1, 0, 'acp_users', 'acp', 13, 137, 138, 'ACP_USER_PREFS', 'prefs', 'acl_a_user'),
(125, 1, 0, 'acp_users', 'acp', 13, 139, 140, 'ACP_USER_AVATAR', 'avatar', 'acl_a_user'),
(126, 1, 0, 'acp_users', 'acp', 13, 141, 142, 'ACP_USER_RANK', 'rank', 'acl_a_user'),
(127, 1, 0, 'acp_users', 'acp', 13, 143, 144, 'ACP_USER_SIG', 'sig', 'acl_a_user'),
(128, 1, 0, 'acp_users', 'acp', 13, 145, 146, 'ACP_USER_GROUPS', 'groups', 'acl_a_user && acl_a_group'),
(129, 1, 0, 'acp_users', 'acp', 13, 147, 148, 'ACP_USER_PERM', 'perm', 'acl_a_user && acl_a_viewauth'),
(130, 1, 0, 'acp_users', 'acp', 13, 149, 150, 'ACP_USER_ATTACH', 'attach', 'acl_a_user'),
(131, 1, 1, 'acp_words', 'acp', 10, 99, 100, 'ACP_WORDS', 'words', 'acl_a_words'),
(132, 1, 1, 'acp_users', 'acp', 2, 5, 6, 'ACP_MANAGE_USERS', 'overview', 'acl_a_user'),
(133, 1, 1, 'acp_groups', 'acp', 2, 7, 8, 'ACP_GROUPS_MANAGE', 'manage', 'acl_a_group'),
(134, 1, 1, 'acp_forums', 'acp', 2, 9, 10, 'ACP_MANAGE_FORUMS', 'manage', 'acl_a_forum'),
(135, 1, 1, 'acp_logs', 'acp', 2, 11, 12, 'ACP_MOD_LOGS', 'mod', 'acl_a_viewlogs'),
(136, 1, 1, 'acp_bots', 'acp', 2, 13, 14, 'ACP_BOTS', 'bots', 'acl_a_bots'),
(137, 1, 1, 'acp_php_info', 'acp', 2, 15, 16, 'ACP_PHP_INFO', 'info', 'acl_a_phpinfo'),
(138, 1, 1, 'acp_permissions', 'acp', 8, 75, 76, 'ACP_FORUM_PERMISSIONS', 'setting_forum_local', 'acl_a_fauth && (acl_a_authusers || acl_a_authgroups)'),
(139, 1, 1, 'acp_permissions', 'acp', 8, 77, 78, 'ACP_FORUM_PERMISSIONS_COPY', 'setting_forum_copy', 'acl_a_fauth && acl_a_authusers && acl_a_authgroups && acl_a_mauth'),
(140, 1, 1, 'acp_permissions', 'acp', 8, 79, 80, 'ACP_FORUM_MODERATORS', 'setting_mod_local', 'acl_a_mauth && (acl_a_authusers || acl_a_authgroups)'),
(141, 1, 1, 'acp_permissions', 'acp', 8, 81, 82, 'ACP_USERS_FORUM_PERMISSIONS', 'setting_user_local', 'acl_a_authusers && (acl_a_mauth || acl_a_fauth)'),
(142, 1, 1, 'acp_permissions', 'acp', 8, 83, 84, 'ACP_GROUPS_FORUM_PERMISSIONS', 'setting_group_local', 'acl_a_authgroups && (acl_a_mauth || acl_a_fauth)'),
(143, 1, 1, '', 'mcp', 0, 1, 10, 'MCP_MAIN', '', ''),
(144, 1, 1, '', 'mcp', 0, 11, 22, 'MCP_QUEUE', '', ''),
(145, 1, 1, '', 'mcp', 0, 23, 36, 'MCP_REPORTS', '', ''),
(146, 1, 1, '', 'mcp', 0, 37, 42, 'MCP_NOTES', '', ''),
(147, 1, 1, '', 'mcp', 0, 43, 52, 'MCP_WARN', '', ''),
(148, 1, 1, '', 'mcp', 0, 53, 60, 'MCP_LOGS', '', ''),
(149, 1, 1, '', 'mcp', 0, 61, 68, 'MCP_BAN', '', ''),
(150, 1, 1, 'mcp_ban', 'mcp', 149, 62, 63, 'MCP_BAN_USERNAMES', 'user', 'acl_m_ban'),
(151, 1, 1, 'mcp_ban', 'mcp', 149, 64, 65, 'MCP_BAN_IPS', 'ip', 'acl_m_ban'),
(152, 1, 1, 'mcp_ban', 'mcp', 149, 66, 67, 'MCP_BAN_EMAILS', 'email', 'acl_m_ban'),
(153, 1, 1, 'mcp_logs', 'mcp', 148, 54, 55, 'MCP_LOGS_FRONT', 'front', 'acl_m_ || aclf_m_'),
(154, 1, 1, 'mcp_logs', 'mcp', 148, 56, 57, 'MCP_LOGS_FORUM_VIEW', 'forum_logs', 'acl_m_,$id'),
(155, 1, 1, 'mcp_logs', 'mcp', 148, 58, 59, 'MCP_LOGS_TOPIC_VIEW', 'topic_logs', 'acl_m_,$id'),
(156, 1, 1, 'mcp_main', 'mcp', 143, 2, 3, 'MCP_MAIN_FRONT', 'front', ''),
(157, 1, 1, 'mcp_main', 'mcp', 143, 4, 5, 'MCP_MAIN_FORUM_VIEW', 'forum_view', 'acl_m_,$id'),
(158, 1, 1, 'mcp_main', 'mcp', 143, 6, 7, 'MCP_MAIN_TOPIC_VIEW', 'topic_view', 'acl_m_,$id'),
(159, 1, 1, 'mcp_main', 'mcp', 143, 8, 9, 'MCP_MAIN_POST_DETAILS', 'post_details', 'acl_m_,$id || (!$id && aclf_m_)'),
(160, 1, 1, 'mcp_notes', 'mcp', 146, 38, 39, 'MCP_NOTES_FRONT', 'front', ''),
(161, 1, 1, 'mcp_notes', 'mcp', 146, 40, 41, 'MCP_NOTES_USER', 'user_notes', ''),
(162, 1, 1, 'mcp_pm_reports', 'mcp', 145, 30, 31, 'MCP_PM_REPORTS_OPEN', 'pm_reports', 'acl_m_pm_report'),
(163, 1, 1, 'mcp_pm_reports', 'mcp', 145, 32, 33, 'MCP_PM_REPORTS_CLOSED', 'pm_reports_closed', 'acl_m_pm_report'),
(164, 1, 1, 'mcp_pm_reports', 'mcp', 145, 34, 35, 'MCP_PM_REPORT_DETAILS', 'pm_report_details', 'acl_m_pm_report'),
(165, 1, 1, 'mcp_queue', 'mcp', 144, 12, 13, 'MCP_QUEUE_UNAPPROVED_TOPICS', 'unapproved_topics', 'aclf_m_approve'),
(166, 1, 1, 'mcp_queue', 'mcp', 144, 14, 15, 'MCP_QUEUE_UNAPPROVED_POSTS', 'unapproved_posts', 'aclf_m_approve'),
(167, 1, 1, 'mcp_queue', 'mcp', 144, 16, 17, 'MCP_QUEUE_DELETED_TOPICS', 'deleted_topics', 'aclf_m_approve'),
(168, 1, 1, 'mcp_queue', 'mcp', 144, 18, 19, 'MCP_QUEUE_DELETED_POSTS', 'deleted_posts', 'aclf_m_approve'),
(169, 1, 1, 'mcp_queue', 'mcp', 144, 20, 21, 'MCP_QUEUE_APPROVE_DETAILS', 'approve_details', 'acl_m_approve,$id || (!$id && aclf_m_approve)'),
(170, 1, 1, 'mcp_reports', 'mcp', 145, 24, 25, 'MCP_REPORTS_OPEN', 'reports', 'aclf_m_report'),
(171, 1, 1, 'mcp_reports', 'mcp', 145, 26, 27, 'MCP_REPORTS_CLOSED', 'reports_closed', 'aclf_m_report'),
(172, 1, 1, 'mcp_reports', 'mcp', 145, 28, 29, 'MCP_REPORT_DETAILS', 'report_details', 'acl_m_report,$id || (!$id && aclf_m_report)'),
(173, 1, 1, 'mcp_warn', 'mcp', 147, 44, 45, 'MCP_WARN_FRONT', 'front', 'aclf_m_warn'),
(174, 1, 1, 'mcp_warn', 'mcp', 147, 46, 47, 'MCP_WARN_LIST', 'list', 'aclf_m_warn'),
(175, 1, 1, 'mcp_warn', 'mcp', 147, 48, 49, 'MCP_WARN_USER', 'warn_user', 'aclf_m_warn'),
(176, 1, 1, 'mcp_warn', 'mcp', 147, 50, 51, 'MCP_WARN_POST', 'warn_post', 'acl_m_warn && acl_f_read,$id'),
(177, 1, 1, '', 'ucp', 0, 1, 14, 'UCP_MAIN', '', ''),
(178, 1, 1, '', 'ucp', 0, 15, 28, 'UCP_PROFILE', '', ''),
(179, 1, 1, '', 'ucp', 0, 29, 38, 'UCP_PREFS', '', ''),
(180, 1, 1, 'ucp_pm', 'ucp', 0, 39, 48, 'UCP_PM', '', ''),
(181, 1, 1, '', 'ucp', 0, 49, 54, 'UCP_USERGROUPS', '', ''),
(182, 1, 1, '', 'ucp', 0, 55, 60, 'UCP_ZEBRA', '', ''),
(183, 1, 1, 'ucp_attachments', 'ucp', 177, 10, 11, 'UCP_MAIN_ATTACHMENTS', 'attachments', 'acl_u_attach'),
(184, 1, 1, 'ucp_auth_link', 'ucp', 178, 26, 27, 'UCP_AUTH_LINK_MANAGE', 'auth_link', 'authmethod_oauth'),
(185, 1, 1, 'ucp_groups', 'ucp', 181, 50, 51, 'UCP_USERGROUPS_MEMBER', 'membership', ''),
(186, 1, 1, 'ucp_groups', 'ucp', 181, 52, 53, 'UCP_USERGROUPS_MANAGE', 'manage', ''),
(187, 1, 1, 'ucp_main', 'ucp', 177, 2, 3, 'UCP_MAIN_FRONT', 'front', ''),
(188, 1, 1, 'ucp_main', 'ucp', 177, 4, 5, 'UCP_MAIN_SUBSCRIBED', 'subscribed', ''),
(189, 1, 1, 'ucp_main', 'ucp', 177, 6, 7, 'UCP_MAIN_BOOKMARKS', 'bookmarks', 'cfg_allow_bookmarks'),
(190, 1, 1, 'ucp_main', 'ucp', 177, 8, 9, 'UCP_MAIN_DRAFTS', 'drafts', ''),
(191, 1, 1, 'ucp_notifications', 'ucp', 179, 36, 37, 'UCP_NOTIFICATION_OPTIONS', 'notification_options', ''),
(192, 1, 1, 'ucp_notifications', 'ucp', 177, 12, 13, 'UCP_NOTIFICATION_LIST', 'notification_list', ''),
(193, 1, 0, 'ucp_pm', 'ucp', 180, 40, 41, 'UCP_PM_VIEW', 'view', 'cfg_allow_privmsg'),
(194, 1, 1, 'ucp_pm', 'ucp', 180, 42, 43, 'UCP_PM_COMPOSE', 'compose', 'cfg_allow_privmsg'),
(195, 1, 1, 'ucp_pm', 'ucp', 180, 44, 45, 'UCP_PM_DRAFTS', 'drafts', 'cfg_allow_privmsg'),
(196, 1, 1, 'ucp_pm', 'ucp', 180, 46, 47, 'UCP_PM_OPTIONS', 'options', 'cfg_allow_privmsg'),
(197, 1, 1, 'ucp_prefs', 'ucp', 179, 30, 31, 'UCP_PREFS_PERSONAL', 'personal', ''),
(198, 1, 1, 'ucp_prefs', 'ucp', 179, 32, 33, 'UCP_PREFS_POST', 'post', ''),
(199, 1, 1, 'ucp_prefs', 'ucp', 179, 34, 35, 'UCP_PREFS_VIEW', 'view', ''),
(200, 1, 1, 'ucp_profile', 'ucp', 178, 16, 17, 'UCP_PROFILE_PROFILE_INFO', 'profile_info', 'acl_u_chgprofileinfo'),
(201, 1, 1, 'ucp_profile', 'ucp', 178, 18, 19, 'UCP_PROFILE_SIGNATURE', 'signature', 'acl_u_sig'),
(202, 1, 1, 'ucp_profile', 'ucp', 178, 20, 21, 'UCP_PROFILE_AVATAR', 'avatar', 'cfg_allow_avatar'),
(203, 1, 1, 'ucp_profile', 'ucp', 178, 22, 23, 'UCP_PROFILE_REG_DETAILS', 'reg_details', ''),
(204, 1, 1, 'ucp_profile', 'ucp', 178, 24, 25, 'UCP_PROFILE_AUTOLOGIN_KEYS', 'autologin_keys', ''),
(205, 1, 1, 'ucp_zebra', 'ucp', 182, 56, 57, 'UCP_ZEBRA_FRIENDS', 'friends', ''),
(206, 1, 1, 'ucp_zebra', 'ucp', 182, 58, 59, 'UCP_ZEBRA_FOES', 'foes', '');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_notifications`
--

DROP TABLE IF EXISTS `phpbb_notifications`;
CREATE TABLE `phpbb_notifications` (
  `notification_id` int(10) UNSIGNED NOT NULL,
  `notification_type_id` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `item_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `item_parent_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `notification_read` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `notification_time` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `notification_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_notifications`
--

INSERT INTO `phpbb_notifications` (`notification_id`, `notification_type_id`, `item_id`, `item_parent_id`, `user_id`, `notification_read`, `notification_time`, `notification_data`) VALUES
(2, 2, 2, 2, 56, 1, 1491207508, 'a:4:{s:9:"poster_id";s:2:"56";s:11:"topic_title";s:13:"etste set set";s:13:"post_username";s:0:"";s:10:"forum_name";s:30:"Ваш первый форум";}'),
(4, 6, 4, 2, 57, 1, 1491208317, 'a:6:{s:12:"post_subject";s:17:"Re: etste set set";s:9:"poster_id";s:2:"57";s:11:"topic_title";s:13:"etste set set";s:13:"post_username";s:0:"";s:8:"forum_id";s:1:"2";s:10:"forum_name";s:30:"Ваш первый форум";}'),
(6, 6, 5, 2, 57, 0, 1491209791, 'a:6:{s:12:"post_subject";s:17:"Re: etste set set";s:9:"poster_id";s:2:"57";s:11:"topic_title";s:13:"etste set set";s:13:"post_username";s:0:"";s:8:"forum_id";s:1:"2";s:10:"forum_name";s:30:"Ваш первый форум";}'),
(7, 8, 6, 2, 2, 0, 1491212338, 'a:6:{s:9:"poster_id";i:61;s:11:"topic_title";s:13:"etste set set";s:12:"post_subject";s:17:"Re: etste set set";s:13:"post_username";s:0:"";s:8:"forum_id";i:2;s:10:"forum_name";s:30:"Ваш первый форум";}'),
(8, 8, 6, 2, 57, 0, 1491212338, 'a:6:{s:9:"poster_id";i:61;s:11:"topic_title";s:13:"etste set set";s:12:"post_subject";s:17:"Re: etste set set";s:13:"post_username";s:0:"";s:8:"forum_id";i:2;s:10:"forum_name";s:30:"Ваш первый форум";}'),
(9, 8, 7, 2, 2, 0, 1491212354, 'a:6:{s:9:"poster_id";i:61;s:11:"topic_title";s:13:"etste set set";s:12:"post_subject";s:17:"Re: etste set set";s:13:"post_username";s:0:"";s:8:"forum_id";i:2;s:10:"forum_name";s:30:"Ваш первый форум";}'),
(10, 8, 7, 2, 57, 0, 1491212354, 'a:6:{s:9:"poster_id";i:61;s:11:"topic_title";s:13:"etste set set";s:12:"post_subject";s:17:"Re: etste set set";s:13:"post_username";s:0:"";s:8:"forum_id";i:2;s:10:"forum_name";s:30:"Ваш первый форум";}'),
(11, 8, 8, 2, 2, 0, 1491215191, 'a:6:{s:9:"poster_id";i:63;s:11:"topic_title";s:13:"etste set set";s:12:"post_subject";s:17:"Re: etste set set";s:13:"post_username";s:0:"";s:8:"forum_id";i:2;s:10:"forum_name";s:30:"Ваш первый форум";}'),
(12, 8, 8, 2, 57, 0, 1491215191, 'a:6:{s:9:"poster_id";i:63;s:11:"topic_title";s:13:"etste set set";s:12:"post_subject";s:17:"Re: etste set set";s:13:"post_username";s:0:"";s:8:"forum_id";i:2;s:10:"forum_name";s:30:"Ваш первый форум";}'),
(13, 8, 9, 2, 2, 0, 1493222631, 'a:6:{s:9:"poster_id";i:71;s:11:"topic_title";s:13:"etste set set";s:12:"post_subject";s:17:"Re: etste set set";s:13:"post_username";s:0:"";s:8:"forum_id";i:2;s:10:"forum_name";s:30:"Ваш первый форум";}'),
(14, 8, 9, 2, 57, 0, 1493222631, 'a:6:{s:9:"poster_id";i:71;s:11:"topic_title";s:13:"etste set set";s:12:"post_subject";s:17:"Re: etste set set";s:13:"post_username";s:0:"";s:8:"forum_id";i:2;s:10:"forum_name";s:30:"Ваш первый форум";}');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_notification_types`
--

DROP TABLE IF EXISTS `phpbb_notification_types`;
CREATE TABLE `phpbb_notification_types` (
  `notification_type_id` smallint(4) UNSIGNED NOT NULL,
  `notification_type_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `notification_type_enabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_notification_types`
--

INSERT INTO `phpbb_notification_types` (`notification_type_id`, `notification_type_name`, `notification_type_enabled`) VALUES
(1, 'notification.type.topic', 1),
(2, 'notification.type.approve_topic', 1),
(3, 'notification.type.quote', 1),
(4, 'notification.type.bookmark', 1),
(5, 'notification.type.post', 1),
(6, 'notification.type.approve_post', 1),
(7, 'notification.type.topic_in_queue', 1),
(8, 'notification.type.post_in_queue', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_oauth_accounts`
--

DROP TABLE IF EXISTS `phpbb_oauth_accounts`;
CREATE TABLE `phpbb_oauth_accounts` (
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `provider` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `oauth_provider_id` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_oauth_tokens`
--

DROP TABLE IF EXISTS `phpbb_oauth_tokens`;
CREATE TABLE `phpbb_oauth_tokens` (
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `session_id` char(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `provider` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `oauth_token` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_poll_options`
--

DROP TABLE IF EXISTS `phpbb_poll_options`;
CREATE TABLE `phpbb_poll_options` (
  `poll_option_id` tinyint(4) NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `poll_option_text` text COLLATE utf8_bin NOT NULL,
  `poll_option_total` mediumint(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_poll_votes`
--

DROP TABLE IF EXISTS `phpbb_poll_votes`;
CREATE TABLE `phpbb_poll_votes` (
  `topic_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `poll_option_id` tinyint(4) NOT NULL DEFAULT '0',
  `vote_user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `vote_user_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_posts`
--

DROP TABLE IF EXISTS `phpbb_posts`;
CREATE TABLE `phpbb_posts` (
  `post_id` mediumint(8) UNSIGNED NOT NULL,
  `topic_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `poster_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `icon_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `poster_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `post_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `post_reported` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `enable_bbcode` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `enable_smilies` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `enable_magic_url` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `enable_sig` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `post_username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `post_subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `post_text` mediumtext COLLATE utf8_bin NOT NULL,
  `post_checksum` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `post_attachment` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `bbcode_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `bbcode_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `post_postcount` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `post_edit_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `post_edit_reason` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `post_edit_user` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `post_edit_count` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `post_edit_locked` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `post_visibility` tinyint(3) NOT NULL DEFAULT '0',
  `post_delete_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `post_delete_reason` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `post_delete_user` mediumint(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_posts`
--

INSERT INTO `phpbb_posts` (`post_id`, `topic_id`, `forum_id`, `poster_id`, `icon_id`, `poster_ip`, `post_time`, `post_reported`, `enable_bbcode`, `enable_smilies`, `enable_magic_url`, `enable_sig`, `post_username`, `post_subject`, `post_text`, `post_checksum`, `post_attachment`, `bbcode_bitfield`, `bbcode_uid`, `post_postcount`, `post_edit_time`, `post_edit_reason`, `post_edit_user`, `post_edit_count`, `post_edit_locked`, `post_visibility`, `post_delete_time`, `post_delete_reason`, `post_delete_user`) VALUES
(1, 1, 2, 2, 0, '82.209.214.222', 1490973941, 0, 1, 1, 1, 1, '', 'Добро пожаловать в phpBB3', 'Это пример сообщения на вашей конференции phpBB3. Всё работает правильно. Вы можете удалить это сообщение и продолжить настройку вашей конференции. В процессе установки вашей первой категории и первому форуму были заданы подходящие права доступа для предустановленных групп администраторов, супермодераторов, гостей, зарегистрированных пользователей и зарегистрированных в соответствии с COPPA пользователей. Если вы решите удалить вашу первую категорию и первый форум, не забудьте установить права доступа для всех новых категорий и форумов, которые вы создаёте. Рекомендуем переименовать вашу первую категорию и первый форум и копировать права доступа с них вновь создаваемым категориям и форумам. Удачи!', '5dd683b17f641daf84c040bfefc58ce9', 0, '', '', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(2, 2, 2, 56, 0, '82.209.214.222', 1491207493, 0, 1, 1, 1, 1, '', 'etste set set', 'test set set set set set wse   <!-- s:arrow: --><img src="{SMILIES_PATH}/icon_arrow.gif" alt=":arrow:" title="Стрелка" /><!-- s:arrow: -->  <!-- s:arrow: --><img src="{SMILIES_PATH}/icon_arrow.gif" alt=":arrow:" title="Стрелка" /><!-- s:arrow: -->  <!-- s:arrow: --><img src="{SMILIES_PATH}/icon_arrow.gif" alt=":arrow:" title="Стрелка" /><!-- s:arrow: -->', '72d387a761069b12513e91428f5e2d72', 0, '', '3o5ihrpu', 1, 0, '', 0, 0, 0, 1, 1491207508, '', 2),
(3, 2, 2, 2, 0, '82.209.214.222', 1491207544, 0, 1, 1, 1, 1, '', 'Re: etste set set', 'set set dfg sdg eras gs sr', 'b79ababacadbc7cec796950092de2156', 0, '', '244c7qku', 1, 0, '', 0, 0, 0, 1, 0, '', 0),
(4, 2, 2, 57, 0, '90.150.90.69', 1491208007, 0, 1, 1, 1, 1, '', 'Re: etste set set', '<!-- s:P --><img src="{SMILIES_PATH}/icon_razz.gif" alt=":P" title="Дразнится" /><!-- s:P -->', '8a1b3fb14ba5c80be1bf03606f225fec', 0, '', 'yztuxf9i', 1, 0, '', 0, 0, 0, 1, 1491208317, '', 2),
(5, 2, 2, 57, 0, '90.150.90.69', 1491209643, 0, 1, 1, 1, 1, '', 'Re: etste set set', 'ывафыаываыва', '356e456fc37653531d1e9eeb8ddfa40a', 0, '', '2l4ejp1d', 1, 0, '', 0, 0, 0, 1, 1491209791, '', 57),
(6, 2, 2, 61, 0, '5.140.235.156', 1491212338, 0, 1, 1, 1, 1, '', 'Re: etste set set', 'лишь бы флудырить)', '8a357fd6f4a59cc4095c8c63f04f2c62', 0, '', 'ttflt71h', 1, 0, '', 0, 0, 0, 0, 0, '', 0),
(7, 2, 2, 61, 0, '5.140.235.156', 1491212354, 0, 1, 1, 1, 1, '', 'Re: etste set set', 'лишь бы флудырить)', '8a357fd6f4a59cc4095c8c63f04f2c62', 0, '', '2hkrtx8y', 1, 0, '', 0, 0, 0, 0, 0, '', 0),
(8, 2, 2, 63, 0, '213.108.183.53', 1491215191, 0, 1, 1, 1, 1, '', 'Re: etste set set', 'чо каво ololo', 'a6d07ff7028189b23fe283108bb3e5f3', 0, '', '3kqux2xv', 1, 0, '', 0, 0, 0, 0, 0, '', 0),
(9, 2, 2, 71, 0, '178.47.110.142', 1493222631, 0, 1, 1, 1, 1, '', 'Re: etste set set', '<!-- s:D --><img src="{SMILIES_PATH}/icon_e_biggrin.gif" alt=":D" title="Очень доволен" /><!-- s:D -->', '8f0d73882229b1f472cf172ee2f66ad8', 0, '', '3vwuahh8', 1, 0, '', 0, 0, 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_privmsgs`
--

DROP TABLE IF EXISTS `phpbb_privmsgs`;
CREATE TABLE `phpbb_privmsgs` (
  `msg_id` mediumint(8) UNSIGNED NOT NULL,
  `root_level` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `author_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `icon_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `author_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `message_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `enable_bbcode` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `enable_smilies` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `enable_magic_url` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `enable_sig` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `message_subject` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `message_text` mediumtext COLLATE utf8_bin NOT NULL,
  `message_edit_reason` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `message_edit_user` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `message_attachment` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `bbcode_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `bbcode_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `message_edit_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `message_edit_count` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `to_address` text COLLATE utf8_bin NOT NULL,
  `bcc_address` text COLLATE utf8_bin NOT NULL,
  `message_reported` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_privmsgs_folder`
--

DROP TABLE IF EXISTS `phpbb_privmsgs_folder`;
CREATE TABLE `phpbb_privmsgs_folder` (
  `folder_id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `folder_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pm_count` mediumint(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_privmsgs_rules`
--

DROP TABLE IF EXISTS `phpbb_privmsgs_rules`;
CREATE TABLE `phpbb_privmsgs_rules` (
  `rule_id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `rule_check` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `rule_connection` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `rule_string` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `rule_user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `rule_group_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `rule_action` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `rule_folder_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_privmsgs_to`
--

DROP TABLE IF EXISTS `phpbb_privmsgs_to`;
CREATE TABLE `phpbb_privmsgs_to` (
  `msg_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `author_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `pm_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `pm_new` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `pm_unread` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `pm_replied` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `pm_marked` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `pm_forwarded` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `folder_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_profile_fields`
--

DROP TABLE IF EXISTS `phpbb_profile_fields`;
CREATE TABLE `phpbb_profile_fields` (
  `field_id` mediumint(8) UNSIGNED NOT NULL,
  `field_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_type` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_ident` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_length` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_minlen` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_maxlen` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_novalue` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_default_value` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_validation` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_required` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `field_show_on_reg` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `field_hide` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `field_no_view` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `field_active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `field_order` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `field_show_profile` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `field_show_on_vt` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `field_show_novalue` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `field_show_on_pm` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `field_show_on_ml` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `field_is_contact` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `field_contact_desc` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `field_contact_url` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_profile_fields`
--

INSERT INTO `phpbb_profile_fields` (`field_id`, `field_name`, `field_type`, `field_ident`, `field_length`, `field_minlen`, `field_maxlen`, `field_novalue`, `field_default_value`, `field_validation`, `field_required`, `field_show_on_reg`, `field_hide`, `field_no_view`, `field_active`, `field_order`, `field_show_profile`, `field_show_on_vt`, `field_show_novalue`, `field_show_on_pm`, `field_show_on_ml`, `field_is_contact`, `field_contact_desc`, `field_contact_url`) VALUES
(1, 'phpbb_location', 'profilefields.type.string', 'phpbb_location', '20', '2', '100', '', '', '.*', 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, 1, 0, '', ''),
(2, 'phpbb_website', 'profilefields.type.url', 'phpbb_website', '40', '12', '255', '', '', '', 0, 0, 0, 0, 1, 2, 1, 1, 0, 1, 1, 1, 'VISIT_WEBSITE', '%s'),
(3, 'phpbb_interests', 'profilefields.type.text', 'phpbb_interests', '3|30', '2', '500', '', '', '.*', 0, 0, 0, 0, 0, 3, 1, 0, 0, 0, 0, 0, '', ''),
(4, 'phpbb_occupation', 'profilefields.type.text', 'phpbb_occupation', '3|30', '2', '500', '', '', '.*', 0, 0, 0, 0, 0, 4, 1, 0, 0, 0, 0, 0, '', ''),
(5, 'phpbb_aol', 'profilefields.type.string', 'phpbb_aol', '40', '5', '255', '', '', '.*', 0, 0, 0, 0, 0, 5, 1, 1, 0, 1, 1, 1, '', ''),
(6, 'phpbb_icq', 'profilefields.type.string', 'phpbb_icq', '20', '3', '15', '', '', '[0-9]+', 0, 0, 0, 0, 0, 6, 1, 1, 0, 1, 1, 1, 'SEND_ICQ_MESSAGE', 'https://www.icq.com/people/%s/'),
(7, 'phpbb_wlm', 'profilefields.type.string', 'phpbb_wlm', '40', '5', '255', '', '', '.*', 0, 0, 0, 0, 0, 7, 1, 1, 0, 1, 1, 1, '', ''),
(8, 'phpbb_yahoo', 'profilefields.type.string', 'phpbb_yahoo', '40', '5', '255', '', '', '.*', 0, 0, 0, 0, 0, 8, 1, 1, 0, 1, 1, 1, 'SEND_YIM_MESSAGE', 'ymsgr:sendim?%s'),
(9, 'phpbb_facebook', 'profilefields.type.string', 'phpbb_facebook', '20', '5', '50', '', '', '[\\w.]+', 0, 0, 0, 0, 1, 9, 1, 1, 0, 1, 1, 1, 'VIEW_FACEBOOK_PROFILE', 'http://facebook.com/%s/'),
(10, 'phpbb_twitter', 'profilefields.type.string', 'phpbb_twitter', '20', '1', '15', '', '', '[\\w_]+', 0, 0, 0, 0, 1, 10, 1, 1, 0, 1, 1, 1, 'VIEW_TWITTER_PROFILE', 'http://twitter.com/%s'),
(11, 'phpbb_skype', 'profilefields.type.string', 'phpbb_skype', '20', '6', '32', '', '', '[a-zA-Z][\\w\\.,\\-_]+', 0, 0, 0, 0, 1, 11, 1, 1, 0, 1, 1, 1, 'VIEW_SKYPE_PROFILE', 'skype:%s?userinfo'),
(12, 'phpbb_youtube', 'profilefields.type.string', 'phpbb_youtube', '20', '3', '60', '', '', '[a-zA-Z][\\w\\.,\\-_]+', 0, 0, 0, 0, 1, 12, 1, 1, 0, 1, 1, 1, 'VIEW_YOUTUBE_CHANNEL', 'http://youtube.com/user/%s'),
(13, 'phpbb_googleplus', 'profilefields.type.googleplus', 'phpbb_googleplus', '20', '3', '255', '', '', '[\\w]+', 0, 0, 0, 0, 1, 13, 1, 1, 0, 1, 1, 1, 'VIEW_GOOGLEPLUS_PROFILE', 'http://plus.google.com/%s');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_profile_fields_data`
--

DROP TABLE IF EXISTS `phpbb_profile_fields_data`;
CREATE TABLE `phpbb_profile_fields_data` (
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `pf_phpbb_interests` mediumtext COLLATE utf8_bin NOT NULL,
  `pf_phpbb_occupation` mediumtext COLLATE utf8_bin NOT NULL,
  `pf_phpbb_location` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_facebook` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_twitter` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_youtube` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_skype` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_icq` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_googleplus` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_website` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_wlm` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_yahoo` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pf_phpbb_aol` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_profile_fields_lang`
--

DROP TABLE IF EXISTS `phpbb_profile_fields_lang`;
CREATE TABLE `phpbb_profile_fields_lang` (
  `field_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `lang_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `option_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `field_type` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lang_value` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_profile_lang`
--

DROP TABLE IF EXISTS `phpbb_profile_lang`;
CREATE TABLE `phpbb_profile_lang` (
  `field_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `lang_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `lang_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lang_explain` text COLLATE utf8_bin NOT NULL,
  `lang_default_value` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_profile_lang`
--

INSERT INTO `phpbb_profile_lang` (`field_id`, `lang_id`, `lang_name`, `lang_explain`, `lang_default_value`) VALUES
(1, 1, 'LOCATION', '', ''),
(1, 2, 'LOCATION', '', ''),
(2, 1, 'WEBSITE', '', ''),
(2, 2, 'WEBSITE', '', ''),
(3, 1, 'INTERESTS', '', ''),
(3, 2, 'INTERESTS', '', ''),
(4, 1, 'OCCUPATION', '', ''),
(4, 2, 'OCCUPATION', '', ''),
(5, 1, 'AOL', '', ''),
(5, 2, 'AOL', '', ''),
(6, 1, 'ICQ', '', ''),
(6, 2, 'ICQ', '', ''),
(7, 1, 'WLM', '', ''),
(7, 2, 'WLM', '', ''),
(8, 1, 'YAHOO', '', ''),
(8, 2, 'YAHOO', '', ''),
(9, 1, 'FACEBOOK', '', ''),
(9, 2, 'FACEBOOK', '', ''),
(10, 1, 'TWITTER', '', ''),
(10, 2, 'TWITTER', '', ''),
(11, 1, 'SKYPE', '', ''),
(11, 2, 'SKYPE', '', ''),
(12, 1, 'YOUTUBE', '', ''),
(12, 2, 'YOUTUBE', '', ''),
(13, 1, 'GOOGLEPLUS', '', ''),
(13, 2, 'GOOGLEPLUS', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_ranks`
--

DROP TABLE IF EXISTS `phpbb_ranks`;
CREATE TABLE `phpbb_ranks` (
  `rank_id` mediumint(8) UNSIGNED NOT NULL,
  `rank_title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `rank_min` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `rank_special` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `rank_image` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_ranks`
--

INSERT INTO `phpbb_ranks` (`rank_id`, `rank_title`, `rank_min`, `rank_special`, `rank_image`) VALUES
(1, 'Администратор', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_reports`
--

DROP TABLE IF EXISTS `phpbb_reports`;
CREATE TABLE `phpbb_reports` (
  `report_id` mediumint(8) UNSIGNED NOT NULL,
  `reason_id` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `post_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_notify` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `report_closed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `report_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `report_text` mediumtext COLLATE utf8_bin NOT NULL,
  `pm_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `reported_post_enable_bbcode` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `reported_post_enable_smilies` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `reported_post_enable_magic_url` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `reported_post_text` mediumtext COLLATE utf8_bin NOT NULL,
  `reported_post_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `reported_post_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_reports_reasons`
--

DROP TABLE IF EXISTS `phpbb_reports_reasons`;
CREATE TABLE `phpbb_reports_reasons` (
  `reason_id` smallint(4) UNSIGNED NOT NULL,
  `reason_title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `reason_description` mediumtext COLLATE utf8_bin NOT NULL,
  `reason_order` smallint(4) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_reports_reasons`
--

INSERT INTO `phpbb_reports_reasons` (`reason_id`, `reason_title`, `reason_description`, `reason_order`) VALUES
(1, 'warez', 'Сообщение содержит ссылки на незаконные или пиратские программы.', 1),
(2, 'spam', 'Сообщение имеет единственной целью рекламу сайтов, программ или других продуктов, товаров, услуг и пр.', 2),
(3, 'off_topic', 'Сообщение не относится к обсуждаемой теме.', 3),
(4, 'other', 'Причина обжалования не относится ни к одной из перечисленных, используйте поле дополнительной информации.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_search_results`
--

DROP TABLE IF EXISTS `phpbb_search_results`;
CREATE TABLE `phpbb_search_results` (
  `search_key` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `search_keywords` mediumtext COLLATE utf8_bin NOT NULL,
  `search_authors` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_search_wordlist`
--

DROP TABLE IF EXISTS `phpbb_search_wordlist`;
CREATE TABLE `phpbb_search_wordlist` (
  `word_id` mediumint(8) UNSIGNED NOT NULL,
  `word_text` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `word_common` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `word_count` mediumint(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_search_wordlist`
--

INSERT INTO `phpbb_search_wordlist` (`word_id`, `word_text`, `word_common`, `word_count`) VALUES
(1, 'это', 0, 1),
(2, 'пример', 0, 1),
(3, 'сообщения', 0, 1),
(4, 'вашей', 0, 1),
(5, 'конференции', 0, 1),
(6, 'phpbb3', 0, 2),
(7, 'всё', 0, 1),
(8, 'работает', 0, 1),
(9, 'правильно', 0, 1),
(10, 'можете', 0, 1),
(11, 'удалить', 0, 1),
(12, 'сообщение', 0, 1),
(13, 'продолжить', 0, 1),
(14, 'настройку', 0, 1),
(15, 'процессе', 0, 1),
(16, 'установки', 0, 1),
(17, 'первой', 0, 1),
(18, 'категории', 0, 1),
(19, 'первому', 0, 1),
(20, 'форуму', 0, 1),
(21, 'были', 0, 1),
(22, 'заданы', 0, 1),
(23, 'подходящие', 0, 1),
(24, 'права', 0, 1),
(25, 'доступа', 0, 1),
(26, 'для', 0, 1),
(27, 'предустановленных', 0, 1),
(28, 'групп', 0, 1),
(29, 'администраторов', 0, 1),
(30, 'супермодераторов', 0, 1),
(31, 'гостей', 0, 1),
(32, 'зарегистрированных', 0, 1),
(33, 'пользователей', 0, 1),
(34, 'соответствии', 0, 1),
(35, 'coppa', 0, 1),
(36, 'если', 0, 1),
(37, 'решите', 0, 1),
(38, 'вашу', 0, 1),
(39, 'первую', 0, 1),
(40, 'категорию', 0, 1),
(41, 'первый', 0, 1),
(42, 'форум', 0, 1),
(43, 'забудьте', 0, 1),
(44, 'установить', 0, 1),
(45, 'всех', 0, 1),
(46, 'новых', 0, 1),
(47, 'категорий', 0, 1),
(48, 'форумов', 0, 1),
(49, 'которые', 0, 1),
(50, 'создаёте', 0, 1),
(51, 'рекомендуем', 0, 1),
(52, 'переименовать', 0, 1),
(53, 'копировать', 0, 1),
(54, 'них', 0, 1),
(55, 'вновь', 0, 1),
(56, 'создаваемым', 0, 1),
(57, 'категориям', 0, 1),
(58, 'форумам', 0, 1),
(59, 'удачи', 0, 1),
(60, 'добро', 0, 1),
(61, 'пожаловать', 0, 1),
(62, 'test', 0, 1),
(63, 'set', 0, 10),
(64, 'wse', 0, 1),
(65, 'etste', 0, 8),
(66, 'dfg', 0, 1),
(67, 'sdg', 0, 1),
(68, 'eras', 0, 1),
(69, 'ывафыаываыва', 0, 1),
(70, 'лишь', 0, 2),
(71, 'флудырить', 0, 2),
(72, 'каво', 0, 1),
(73, 'ololo', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_search_wordmatch`
--

DROP TABLE IF EXISTS `phpbb_search_wordmatch`;
CREATE TABLE `phpbb_search_wordmatch` (
  `post_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `word_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `title_match` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_search_wordmatch`
--

INSERT INTO `phpbb_search_wordmatch` (`post_id`, `word_id`, `title_match`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 4, 0),
(1, 5, 0),
(1, 6, 0),
(1, 6, 1),
(1, 7, 0),
(1, 8, 0),
(1, 9, 0),
(1, 10, 0),
(1, 11, 0),
(1, 12, 0),
(1, 13, 0),
(1, 14, 0),
(1, 15, 0),
(1, 16, 0),
(1, 17, 0),
(1, 18, 0),
(1, 19, 0),
(1, 20, 0),
(1, 21, 0),
(1, 22, 0),
(1, 23, 0),
(1, 24, 0),
(1, 25, 0),
(1, 26, 0),
(1, 27, 0),
(1, 28, 0),
(1, 29, 0),
(1, 30, 0),
(1, 31, 0),
(1, 32, 0),
(1, 33, 0),
(1, 34, 0),
(1, 35, 0),
(1, 36, 0),
(1, 37, 0),
(1, 38, 0),
(1, 39, 0),
(1, 40, 0),
(1, 41, 0),
(1, 42, 0),
(1, 43, 0),
(1, 44, 0),
(1, 45, 0),
(1, 46, 0),
(1, 47, 0),
(1, 48, 0),
(1, 49, 0),
(1, 50, 0),
(1, 51, 0),
(1, 52, 0),
(1, 53, 0),
(1, 54, 0),
(1, 55, 0),
(1, 56, 0),
(1, 57, 0),
(1, 58, 0),
(1, 59, 0),
(1, 60, 1),
(1, 61, 1),
(2, 62, 0),
(2, 63, 0),
(2, 63, 1),
(3, 63, 0),
(3, 63, 1),
(4, 63, 1),
(5, 63, 1),
(6, 63, 1),
(7, 63, 1),
(8, 63, 1),
(9, 63, 1),
(2, 64, 0),
(2, 65, 1),
(3, 65, 1),
(4, 65, 1),
(5, 65, 1),
(6, 65, 1),
(7, 65, 1),
(8, 65, 1),
(9, 65, 1),
(3, 66, 0),
(3, 67, 0),
(3, 68, 0),
(5, 69, 0),
(6, 70, 0),
(7, 70, 0),
(6, 71, 0),
(7, 71, 0),
(8, 72, 0),
(8, 73, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_sessions`
--

DROP TABLE IF EXISTS `phpbb_sessions`;
CREATE TABLE `phpbb_sessions` (
  `session_id` char(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `session_last_visit` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `session_start` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `session_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `session_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_browser` varchar(150) COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_forwarded_for` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_page` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `session_viewonline` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `session_autologin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `session_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `session_forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_sessions`
--

INSERT INTO `phpbb_sessions` (`session_id`, `session_user_id`, `session_last_visit`, `session_start`, `session_time`, `session_ip`, `session_browser`, `session_forwarded_for`, `session_page`, `session_viewonline`, `session_autologin`, `session_admin`, `session_forum_id`) VALUES
('6ba05f6ba64080c1f16e7a22cf76e6f4', 1, 1493228360, 1493228360, 1493228360, '5.189.122.240', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', '', 'index.php', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_sessions_keys`
--

DROP TABLE IF EXISTS `phpbb_sessions_keys`;
CREATE TABLE `phpbb_sessions_keys` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `last_login` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_sessions_keys`
--

INSERT INTO `phpbb_sessions_keys` (`key_id`, `user_id`, `last_ip`, `last_login`) VALUES
('1bc61c1d30cd6e777cec172056e507a8', 67, '213.108.183.53', 1491215777),
('50f2c0e7e42703443e1391e205e2b461', 63, '213.108.183.53', 1491214361),
('80dbd780b6e5dea6782df2921bed63fd', 54, '90.150.90.69', 1491204501),
('81f1d1554b60e30213263440893eaa02', 68, '90.150.90.69', 1492084915),
('a8d1cffd2892993da8ea03395574c1a5', 52, '37.212.143.185', 1491048084),
('b01562351501c664feca8825c2c5f7ec', 87, '46.8.138.219', 1492822925),
('f3b503a991feefda329822325d735c2d', 85, '178.62.237.202', 1492702914);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_sitelist`
--

DROP TABLE IF EXISTS `phpbb_sitelist`;
CREATE TABLE `phpbb_sitelist` (
  `site_id` mediumint(8) UNSIGNED NOT NULL,
  `site_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `site_hostname` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ip_exclude` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_smilies`
--

DROP TABLE IF EXISTS `phpbb_smilies`;
CREATE TABLE `phpbb_smilies` (
  `smiley_id` mediumint(8) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `emotion` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `smiley_url` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `smiley_width` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `smiley_height` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `smiley_order` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `display_on_posting` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_smilies`
--

INSERT INTO `phpbb_smilies` (`smiley_id`, `code`, `emotion`, `smiley_url`, `smiley_width`, `smiley_height`, `smiley_order`, `display_on_posting`) VALUES
(1, ':D', 'Очень доволен', 'icon_e_biggrin.gif', 15, 17, 1, 1),
(2, ':-D', 'Очень доволен', 'icon_e_biggrin.gif', 15, 17, 2, 1),
(3, ':grin:', 'Очень доволен', 'icon_e_biggrin.gif', 15, 17, 3, 1),
(4, ':)', 'Улыбается', 'icon_e_smile.gif', 15, 17, 4, 1),
(5, ':-)', 'Улыбается', 'icon_e_smile.gif', 15, 17, 5, 1),
(6, ':smile:', 'Улыбается', 'icon_e_smile.gif', 15, 17, 6, 1),
(7, ';)', 'Подмигивает', 'icon_e_wink.gif', 15, 17, 7, 1),
(8, ';-)', 'Подмигивает', 'icon_e_wink.gif', 15, 17, 8, 1),
(9, ':wink:', 'Подмигивает', 'icon_e_wink.gif', 15, 17, 9, 1),
(10, ':(', 'Грустный', 'icon_e_sad.gif', 15, 17, 10, 1),
(11, ':-(', 'Грустный', 'icon_e_sad.gif', 15, 17, 11, 1),
(12, ':sad:', 'Грустный', 'icon_e_sad.gif', 15, 17, 12, 1),
(13, ':o', 'Удивлён', 'icon_e_surprised.gif', 15, 17, 13, 1),
(14, ':-o', 'Удивлён', 'icon_e_surprised.gif', 15, 17, 14, 1),
(15, ':eek:', 'Удивлён', 'icon_e_surprised.gif', 15, 17, 15, 1),
(16, ':shock:', 'В шоке', 'icon_eek.gif', 15, 17, 16, 1),
(17, ':?', 'Озадачен', 'icon_e_confused.gif', 15, 17, 17, 1),
(18, ':-?', 'Озадачен', 'icon_e_confused.gif', 15, 17, 18, 1),
(19, ':???:', 'Озадачен', 'icon_e_confused.gif', 15, 17, 19, 1),
(20, '8-)', 'Всё путём', 'icon_cool.gif', 15, 17, 20, 1),
(21, ':cool:', 'Всё путём', 'icon_cool.gif', 15, 17, 21, 1),
(22, ':lol:', 'Смеётся', 'icon_lol.gif', 15, 17, 22, 1),
(23, ':x', 'Раздражён', 'icon_mad.gif', 15, 17, 23, 1),
(24, ':-x', 'Раздражён', 'icon_mad.gif', 15, 17, 24, 1),
(25, ':mad:', 'Раздражён', 'icon_mad.gif', 15, 17, 25, 1),
(26, ':P', 'Дразнится', 'icon_razz.gif', 15, 17, 26, 1),
(27, ':-P', 'Дразнится', 'icon_razz.gif', 15, 17, 27, 1),
(28, ':razz:', 'Дразнится', 'icon_razz.gif', 15, 17, 28, 1),
(29, ':oops:', 'Смущён', 'icon_redface.gif', 15, 17, 29, 1),
(30, ':cry:', 'Плачет или сильно расстроен', 'icon_cry.gif', 15, 17, 30, 1),
(31, ':evil:', 'Злой или очень раздражён', 'icon_evil.gif', 15, 17, 31, 1),
(32, ':twisted:', 'Очень зол', 'icon_twisted.gif', 15, 17, 32, 1),
(33, ':roll:', 'Закатывает глаза', 'icon_rolleyes.gif', 15, 17, 33, 1),
(34, ':!:', 'Восклицание', 'icon_exclaim.gif', 15, 17, 34, 1),
(35, ':?:', 'Вопрос', 'icon_question.gif', 15, 17, 35, 1),
(36, ':idea:', 'Идея', 'icon_idea.gif', 15, 17, 36, 1),
(37, ':arrow:', 'Стрелка', 'icon_arrow.gif', 15, 17, 37, 1),
(38, ':|', 'Нейтральный', 'icon_neutral.gif', 15, 17, 38, 1),
(39, ':-|', 'Нейтральный', 'icon_neutral.gif', 15, 17, 39, 1),
(40, ':mrgreen:', 'Зелёный', 'icon_mrgreen.gif', 15, 17, 40, 1),
(41, ':geek:', 'Ботан', 'icon_e_geek.gif', 17, 17, 41, 1),
(42, ':ugeek:', 'Мегаботан', 'icon_e_ugeek.gif', 17, 18, 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_styles`
--

DROP TABLE IF EXISTS `phpbb_styles`;
CREATE TABLE `phpbb_styles` (
  `style_id` mediumint(8) UNSIGNED NOT NULL,
  `style_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `style_copyright` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `style_active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `style_path` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `bbcode_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'kNg=',
  `style_parent_id` int(4) UNSIGNED NOT NULL DEFAULT '0',
  `style_parent_tree` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_styles`
--

INSERT INTO `phpbb_styles` (`style_id`, `style_name`, `style_copyright`, `style_active`, `style_path`, `bbcode_bitfield`, `style_parent_id`, `style_parent_tree`) VALUES
(1, 'prosilver', '&copy; phpBB Limited', 0, 'prosilver', 'kNg=', 0, ''),
(2, 'AllanStyle-SUBSILVER', '© Allan Style, 2017 phpbb3.x-tk.ru', 1, 'AllanStyle-SUBSILVER', '+Ng=', 1, 'prosilver'),
(3, 'Black-Silver', '© phpBB Limited, 2007', 0, 'Black-Silver', '+Ng=', 1, 'prosilver'),
(4, 'FTH_Tropic', '© Franck Thiriot, 2015 || 3.1.10 update: © Solidjeuh https://www.froddelpower.be , 2017', 0, 'FTH_Tropic', '+Ng=', 1, 'prosilver'),
(5, 'IDLaunch_Fresh', '© phpBB Spain, 2014-2017', 0, 'IDLaunch_Fresh', '+Ng=', 1, 'prosilver'),
(6, 'PBTech', '© PayBas, 2015', 0, 'pbtech', '+Ng=', 1, 'prosilver'),
(7, 'prosilver Special Edition', '© phpBB Limited, 2008', 0, 'prosilver_se', '+Ng=', 1, 'prosilver');

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_teampage`
--

DROP TABLE IF EXISTS `phpbb_teampage`;
CREATE TABLE `phpbb_teampage` (
  `teampage_id` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `teampage_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `teampage_position` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `teampage_parent` mediumint(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_teampage`
--

INSERT INTO `phpbb_teampage` (`teampage_id`, `group_id`, `teampage_name`, `teampage_position`, `teampage_parent`) VALUES
(1, 5, '', 1, 0),
(2, 4, '', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_topics`
--

DROP TABLE IF EXISTS `phpbb_topics`;
CREATE TABLE `phpbb_topics` (
  `topic_id` mediumint(8) UNSIGNED NOT NULL,
  `forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `icon_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_attachment` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `topic_reported` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `topic_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `topic_poster` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `topic_time_limit` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `topic_views` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_status` tinyint(3) NOT NULL DEFAULT '0',
  `topic_type` tinyint(3) NOT NULL DEFAULT '0',
  `topic_first_post_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_first_poster_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `topic_first_poster_colour` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_last_post_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_last_poster_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_last_poster_name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_last_poster_colour` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_last_post_subject` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_last_post_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `topic_last_view_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `topic_moved_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_bumped` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `topic_bumper` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `poll_title` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `poll_start` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `poll_length` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `poll_max_options` tinyint(4) NOT NULL DEFAULT '1',
  `poll_last_vote` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `poll_vote_change` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `topic_visibility` tinyint(3) NOT NULL DEFAULT '0',
  `topic_delete_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `topic_delete_reason` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `topic_delete_user` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_posts_approved` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_posts_unapproved` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_posts_softdeleted` mediumint(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_topics`
--

INSERT INTO `phpbb_topics` (`topic_id`, `forum_id`, `icon_id`, `topic_attachment`, `topic_reported`, `topic_title`, `topic_poster`, `topic_time`, `topic_time_limit`, `topic_views`, `topic_status`, `topic_type`, `topic_first_post_id`, `topic_first_poster_name`, `topic_first_poster_colour`, `topic_last_post_id`, `topic_last_poster_id`, `topic_last_poster_name`, `topic_last_poster_colour`, `topic_last_post_subject`, `topic_last_post_time`, `topic_last_view_time`, `topic_moved_id`, `topic_bumped`, `topic_bumper`, `poll_title`, `poll_start`, `poll_length`, `poll_max_options`, `poll_last_vote`, `poll_vote_change`, `topic_visibility`, `topic_delete_time`, `topic_delete_reason`, `topic_delete_user`, `topic_posts_approved`, `topic_posts_unapproved`, `topic_posts_softdeleted`) VALUES
(1, 2, 0, 0, 0, 'Добро пожаловать в phpBB3', 2, 1490973941, 0, 10, 0, 0, 1, 'admin', 'AA0000', 1, 2, 'admin', 'AA0000', 'Добро пожаловать в phpBB3', 1490973941, 1492758446, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 0, 1, 0, 0),
(2, 2, 0, 0, 0, 'etste set set', 56, 1491207493, 0, 33, 0, 0, 2, '~root~', '', 5, 57, 'Badly', '', 'Re: etste set set', 1491209643, 1493222636, 0, 0, 0, '', 0, 0, 1, 0, 0, 1, 0, '', 56, 4, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_topics_posted`
--

DROP TABLE IF EXISTS `phpbb_topics_posted`;
CREATE TABLE `phpbb_topics_posted` (
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_posted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_topics_posted`
--

INSERT INTO `phpbb_topics_posted` (`user_id`, `topic_id`, `topic_posted`) VALUES
(2, 1, 1),
(2, 2, 1),
(56, 2, 1),
(57, 2, 1),
(61, 2, 1),
(63, 2, 1),
(71, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_topics_track`
--

DROP TABLE IF EXISTS `phpbb_topics_track`;
CREATE TABLE `phpbb_topics_track` (
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `topic_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `forum_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `mark_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_topics_track`
--

INSERT INTO `phpbb_topics_track` (`user_id`, `topic_id`, `forum_id`, `mark_time`) VALUES
(2, 1, 2, 1490973941),
(2, 2, 2, 1491208007),
(57, 2, 2, 1491209643),
(61, 2, 2, 1491212354),
(63, 2, 2, 1491215191),
(71, 2, 2, 1493222631);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_topics_watch`
--

DROP TABLE IF EXISTS `phpbb_topics_watch`;
CREATE TABLE `phpbb_topics_watch` (
  `topic_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `notify_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_users`
--

DROP TABLE IF EXISTS `phpbb_users`;
CREATE TABLE `phpbb_users` (
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `user_type` tinyint(2) NOT NULL DEFAULT '0',
  `group_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '3',
  `user_permissions` mediumtext COLLATE utf8_bin NOT NULL,
  `user_perm_from` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_ip` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_regdate` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `username_clean` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_password` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_passchg` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_email` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_email_hash` bigint(20) NOT NULL DEFAULT '0',
  `user_birthday` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_lastvisit` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_lastmark` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_lastpost_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_lastpage` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_last_confirm_key` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_last_search` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_warnings` tinyint(4) NOT NULL DEFAULT '0',
  `user_last_warning` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_login_attempts` tinyint(4) NOT NULL DEFAULT '0',
  `user_inactive_reason` tinyint(2) NOT NULL DEFAULT '0',
  `user_inactive_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_posts` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_lang` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_timezone` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_dateformat` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT 'd M Y H:i',
  `user_style` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_rank` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_colour` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_new_privmsg` int(4) NOT NULL DEFAULT '0',
  `user_unread_privmsg` int(4) NOT NULL DEFAULT '0',
  `user_last_privmsg` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_message_rules` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `user_full_folder` int(11) NOT NULL DEFAULT '-3',
  `user_emailtime` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_topic_show_days` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `user_topic_sortby_type` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 't',
  `user_topic_sortby_dir` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 'd',
  `user_post_show_days` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `user_post_sortby_type` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 't',
  `user_post_sortby_dir` varchar(1) COLLATE utf8_bin NOT NULL DEFAULT 'a',
  `user_notify` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `user_notify_pm` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `user_notify_type` tinyint(4) NOT NULL DEFAULT '0',
  `user_allow_pm` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `user_allow_viewonline` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `user_allow_viewemail` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `user_allow_massemail` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `user_options` int(11) UNSIGNED NOT NULL DEFAULT '230271',
  `user_avatar` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_avatar_type` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_avatar_width` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `user_avatar_height` smallint(4) UNSIGNED NOT NULL DEFAULT '0',
  `user_sig` mediumtext COLLATE utf8_bin NOT NULL,
  `user_sig_bbcode_uid` varchar(8) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_sig_bbcode_bitfield` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_jabber` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_actkey` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_newpasswd` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_form_salt` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user_new` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `user_reminded` tinyint(4) NOT NULL DEFAULT '0',
  `user_reminded_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_users`
--

INSERT INTO `phpbb_users` (`user_id`, `user_type`, `group_id`, `user_permissions`, `user_perm_from`, `user_ip`, `user_regdate`, `username`, `username_clean`, `user_password`, `user_passchg`, `user_email`, `user_email_hash`, `user_birthday`, `user_lastvisit`, `user_lastmark`, `user_lastpost_time`, `user_lastpage`, `user_last_confirm_key`, `user_last_search`, `user_warnings`, `user_last_warning`, `user_login_attempts`, `user_inactive_reason`, `user_inactive_time`, `user_posts`, `user_lang`, `user_timezone`, `user_dateformat`, `user_style`, `user_rank`, `user_colour`, `user_new_privmsg`, `user_unread_privmsg`, `user_last_privmsg`, `user_message_rules`, `user_full_folder`, `user_emailtime`, `user_topic_show_days`, `user_topic_sortby_type`, `user_topic_sortby_dir`, `user_post_show_days`, `user_post_sortby_type`, `user_post_sortby_dir`, `user_notify`, `user_notify_pm`, `user_notify_type`, `user_allow_pm`, `user_allow_viewonline`, `user_allow_viewemail`, `user_allow_massemail`, `user_options`, `user_avatar`, `user_avatar_type`, `user_avatar_width`, `user_avatar_height`, `user_sig`, `user_sig_bbcode_uid`, `user_sig_bbcode_bitfield`, `user_jabber`, `user_actkey`, `user_newpasswd`, `user_form_salt`, `user_new`, `user_reminded`, `user_reminded_time`) VALUES
(1, 2, 1, '00000000000g13ydq8\ni1cjyo000000\ni1cjyo000000', 0, '', 1490973941, 'Anonymous', 'anonymous', '', 0, '', 0, '', 0, 0, 0, '', 'TC2LBKRGCW', 1492575847, 0, 0, 0, 0, 0, 0, 'en', '', 'd M Y H:i', 2, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '1eb2aa6db3ddb3b4', 1, 0, 0),
(2, 3, 5, 'zik0zjzik0zjzik0zg\ni1cjyo000000\nzik0zjzi8sg0', 0, '82.209.214.222', 1490973941, 'admin', 'admin', '$2y$10$QRZIJrACjcIesYvfgRHeM.qOiehhaSf4gmi1AKYvkHJ4840fMELVS', 0, 'adm@admin.com', 358223269313, '', 1491578630, 0, 1491207544, 'viewforum.php?f=2', '1VAC27DNIR', 0, 0, 0, 0, 0, 0, 2, 'ru', '', '|d M Y|, H:i', 0, 1, 'AA0000', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', 'd0fa7676803f69fa', 1, 0, 0),
(3, 2, 6, '', 0, '', 1490973945, 'AdsBot [Google]', 'adsbot [google]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '3871d8f749c1842e', 0, 0, 0),
(4, 2, 6, '', 0, '', 1490973945, 'Alexa [Bot]', 'alexa [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '39cc2a5b78b3ff12', 0, 0, 0),
(5, 2, 6, '', 0, '', 1490973945, 'Alta Vista [Bot]', 'alta vista [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'd46e50f0c0c72339', 0, 0, 0),
(6, 2, 6, '', 0, '', 1490973945, 'Ask Jeeves [Bot]', 'ask jeeves [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '48e5c3c0f8aa4844', 0, 0, 0),
(7, 2, 6, '', 0, '', 1490973945, 'Baidu [Spider]', 'baidu [spider]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '09f7eba553c5ae41', 0, 0, 0),
(8, 2, 6, '', 0, '', 1490973945, 'Bing [Bot]', 'bing [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '2fef93472207da30', 0, 0, 0),
(9, 2, 6, '', 0, '', 1490973945, 'Exabot [Bot]', 'exabot [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '09681eba4384040f', 0, 0, 0),
(10, 2, 6, '', 0, '', 1490973945, 'FAST Enterprise [Crawler]', 'fast enterprise [crawler]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '708a7b8aa837ccd8', 0, 0, 0),
(11, 2, 6, '', 0, '', 1490973945, 'FAST WebCrawler [Crawler]', 'fast webcrawler [crawler]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '3d08af0b270bd942', 0, 0, 0),
(12, 2, 6, '', 0, '', 1490973945, 'Francis [Bot]', 'francis [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '8af35e5df469710b', 0, 0, 0),
(13, 2, 6, '', 0, '', 1490973945, 'Gigabot [Bot]', 'gigabot [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '59c206c09c7c0617', 0, 0, 0),
(14, 2, 6, '', 0, '', 1490973945, 'Google Adsense [Bot]', 'google adsense [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '4681781e7cc88399', 0, 0, 0),
(15, 2, 6, '', 0, '', 1490973945, 'Google Desktop', 'google desktop', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '4f34d39eb4877c7e', 0, 0, 0),
(16, 2, 6, '', 0, '', 1490973945, 'Google Feedfetcher', 'google feedfetcher', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'b84662deaafa1054', 0, 0, 0),
(17, 2, 6, '\ni1cjyo000000\ni1cjr4000000', 0, '', 1490973945, 'Google [Bot]', 'google [bot]', '', 1490973945, '', 0, '', 1492947255, 1490973945, 0, 'viewtopic.php?p=1', '22USQB6UG5', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '8765fadb1def0543', 0, 0, 0),
(18, 2, 6, '', 0, '', 1490973945, 'Heise IT-Markt [Crawler]', 'heise it-markt [crawler]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '9b6ca9883a76eaef', 0, 0, 0),
(19, 2, 6, '', 0, '', 1490973945, 'Heritrix [Crawler]', 'heritrix [crawler]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'e7088b87350a037f', 0, 0, 0),
(20, 2, 6, '', 0, '', 1490973945, 'IBM Research [Bot]', 'ibm research [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'b4d0207855cb3603', 0, 0, 0),
(21, 2, 6, '', 0, '', 1490973945, 'ICCrawler - ICjobs', 'iccrawler - icjobs', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'f6903830077879d7', 0, 0, 0),
(22, 2, 6, '', 0, '', 1490973945, 'ichiro [Crawler]', 'ichiro [crawler]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'e7b708c2f3fee475', 0, 0, 0),
(23, 2, 6, '\ni1cjyo000000\ni1cjr4000000', 0, '', 1490973945, 'Majestic-12 [Bot]', 'majestic-12 [bot]', '', 1490973945, '', 0, '', 1492197138, 1490973945, 0, 'viewtopic.php?t=1', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '3dd7e53b80fa8f1f', 0, 0, 0),
(24, 2, 6, '', 0, '', 1490973945, 'Metager [Bot]', 'metager [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '694aa5b3d516b803', 0, 0, 0),
(25, 2, 6, '', 0, '', 1490973945, 'MSN NewsBlogs', 'msn newsblogs', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '2f9c7a8703a59563', 0, 0, 0),
(26, 2, 6, '', 0, '', 1490973945, 'MSN [Bot]', 'msn [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '5ca2d44f3e7100ae', 0, 0, 0),
(27, 2, 6, '', 0, '', 1490973945, 'MSNbot Media', 'msnbot media', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'dbea3da73928dbb9', 0, 0, 0),
(28, 2, 6, '', 0, '', 1490973945, 'Nutch [Bot]', 'nutch [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '663a76caffb21de0', 0, 0, 0),
(29, 2, 6, '', 0, '', 1490973945, 'Online link [Validator]', 'online link [validator]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '6bd9f5dc68f8254d', 0, 0, 0),
(30, 2, 6, '', 0, '', 1490973945, 'psbot [Picsearch]', 'psbot [picsearch]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '9d79963f1a6570a0', 0, 0, 0),
(31, 2, 6, '', 0, '', 1490973945, 'Sensis [Crawler]', 'sensis [crawler]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '89e0e76f43b0f5dd', 0, 0, 0),
(32, 2, 6, '', 0, '', 1490973945, 'SEO Crawler', 'seo crawler', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '55a6dd91ff6a8986', 0, 0, 0),
(33, 2, 6, '', 0, '', 1490973945, 'Seoma [Crawler]', 'seoma [crawler]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'f52b6ac7716900e3', 0, 0, 0),
(34, 2, 6, '', 0, '', 1490973945, 'SEOSearch [Crawler]', 'seosearch [crawler]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'bb4c4bf495db7c8f', 0, 0, 0),
(35, 2, 6, '', 0, '', 1490973945, 'Snappy [Bot]', 'snappy [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '93923a583a76e55a', 0, 0, 0),
(36, 2, 6, '', 0, '', 1490973945, 'Steeler [Crawler]', 'steeler [crawler]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '797cc92f5e5f824a', 0, 0, 0),
(37, 2, 6, '', 0, '', 1490973945, 'Telekom [Bot]', 'telekom [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'dc18986ddfa265c9', 0, 0, 0),
(38, 2, 6, '', 0, '', 1490973945, 'TurnitinBot [Bot]', 'turnitinbot [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '8c1b557fbfcf406a', 0, 0, 0),
(39, 2, 6, '', 0, '', 1490973945, 'Voyager [Bot]', 'voyager [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '2a4807da2263af3a', 0, 0, 0),
(40, 2, 6, '', 0, '', 1490973945, 'W3 [Sitesearch]', 'w3 [sitesearch]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '424b6daffdb29370', 0, 0, 0),
(41, 2, 6, '', 0, '', 1490973945, 'W3C [Linkcheck]', 'w3c [linkcheck]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'faada4c0261ae63c', 0, 0, 0),
(42, 2, 6, '', 0, '', 1490973945, 'W3C [Validator]', 'w3c [validator]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '7457a4fd51415b14', 0, 0, 0),
(43, 2, 6, '', 0, '', 1490973945, 'YaCy [Bot]', 'yacy [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '67c3cdea8cd1cb6a', 0, 0, 0),
(44, 2, 6, '', 0, '', 1490973945, 'Yahoo MMCrawler [Bot]', 'yahoo mmcrawler [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', '25a794ea60ebad26', 0, 0, 0),
(45, 2, 6, '', 0, '', 1490973945, 'Yahoo Slurp [Bot]', 'yahoo slurp [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'ae240872267217ad', 0, 0, 0),
(46, 2, 6, '', 0, '', 1490973945, 'Yahoo [Bot]', 'yahoo [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'e499eca4523b41f3', 0, 0, 0),
(47, 2, 6, '', 0, '', 1490973945, 'YahooSeeker [Bot]', 'yahooseeker [bot]', '', 1490973945, '', 0, '', 0, 1490973945, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'UTC', '|d M Y|, H:i', 0, 0, '9E8DA7', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 0, 1, 1, 0, 230271, '', '', 0, 0, '', '', '', '', '', '', 'dcc608a0ea94898c', 0, 0, 0),
(65, 0, 2, '00000000000v667wt0\ni1cjyo000000\nqlaq53000000', 0, '82.209.214.222', 1491215462, '~root~', '~root~', '$2y$10$Gsd3yyIaPM5hkIs7gN7n9eIySnqrx36TL4kZaSNkVmjDnfGzenESy', 1491215462, '', 0, '', 1491462367, 1491215462, 0, 'app.php/styles/prosilver/theme/ru/stylesheet.css?assets_version=1', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 0, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '597465b72c4749bc', 1, 0, 0),
(66, 0, 2, '00000000000v667wt0\ni1cjyo000000\nqlaq53000000', 0, '82.209.214.222', 1491215549, 'Нестор Петрович', 'нecтop πeтpoвич', '$2y$10$mngNg92qOVD6dDx2n27ALOBWZ0OrzHnYpNyNrHuF1BKgT6cBt7EeO', 1491215549, '', 0, '', 1491215780, 1491215549, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 0, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '85dbef75e4bb0516', 1, 0, 0),
(67, 0, 2, '00000000000v667wt0\ni1cjyo000000\nqlaq53000000', 0, '213.108.183.53', 1491215683, 'Артём Николаевич', 'apтём ниĸoлaeвич', '4a51f04213fef3e2e908b92f311c4039', 1491215683, '', 0, '', 1491221176, 1491215683, 0, 'app.php/styles/prosilver/theme/ru/stylesheet.css?assets_version=1', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 0, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(68, 0, 2, '00000000000v667wt0\ni1cjyo000000\nqlaq53000000', 0, '90.150.90.69', 1491215917, 'Badly', 'badly', '$2y$10$bOQ.gsG8RXUjwdtg1Fyj2ur0OwP8ZPAXYZsypQ7WZqZ.TeDQwTiVG', 1491215917, '', 0, '', 1492084915, 1491215917, 0, 'index.php', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 0, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '236834852ac093c9', 1, 0, 0),
(69, 0, 2, '00000000000v667wt0\ni1cjyo000000\nqlaq53000000', 0, '37.212.131.57', 1491216266, '-Shiver-', '-shiver-', 'f38e92f0caae061b355ec7734ad35438', 1491216266, '', 0, '', 1491218312, 1491216266, 0, 'app.php/styles/prosilver/theme/ru/stylesheet.css?assets_version=1', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 0, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(70, 0, 2, '00000000000v667wt0\ni1cjyo000000\nqlaq53000000', 0, '82.209.214.222', 1491217805, '###Мульт###', '###мyлƅт###', '$2y$10$gfBOVoRSeXE1Btpr4dIHbem5t3lCXbEdsmDOJwlcz3BM6qQ4kQe0G', 1491217805, '', 0, '', 1491217844, 1491217805, 0, 'app.php/styles/prosilver/theme/ru/icon_user_online.gif', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 0, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '1ce7398a4e9282bf', 1, 0, 0),
(71, 0, 2, '00000000000v667wt0\ni1cjyo000000\nqlaq53000000', 0, '5.140.235.156', 1491319761, 'Lira', 'lira', '$2y$10$YVYPrkRISjsH2gGR6qT2MOvdAMdXPGhCFz/oLz4q6FBQt6Pdu2E1W', 1491319761, '', 0, '', 1493222636, 1491319761, 1493222631, 'viewtopic.php?f=2&t=2', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 0, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '4b761cbf1ac330ef', 1, 0, 0),
(72, 0, 2, '00000000000v667wt0\r\ni1cjyo000000\r\nqlaq53000000', 0, '128.70.165.15', 1491412675, 'Only One. ', 'only one.', '3bdaf6f9e8402ba7e4ce32ffe17277ef', 1491412675, '', 0, '', 0, 1491412675, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 0, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(73, 0, 2, '00000000000v667wt0\r\ni1cjyo000000\r\nqlaq53000000', 0, '82.209.214.222', 1491929373, 'zaza', 'zaza', '61fc45ca085d0f0e7425f0f2dde06b74', 1491929373, '', 0, '', 0, 1491929373, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(79, 0, 2, '00000000000v667wt0\r\ni1cjyo000000\r\nqlaq53000000', 0, '82.209.214.222', 1492180434, 'teste', 'teste', '8f7708d309ba9673979a61b30b07bea2', 1492180434, '', 0, '', 0, 1492180434, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(80, 0, 2, '00000000000v667wt0\r\ni1cjyo000000\r\nqlaq53000000', 0, '82.209.214.222', 1492180442, '324234', '324234', '7fd89b6392cff869bba2ebe177ccde81', 1492180442, '', 0, '', 0, 1492180442, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(81, 0, 2, '00000000000v667wt0\r\ni1cjyo000000\r\nqlaq53000000', 0, '82.209.214.222', 1492180447, '345345', '345345', 'e1686c6c3b8724fdb1bee1fa753f580f', 1492180447, '', 0, '', 0, 1492180447, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(82, 0, 2, '00000000000v667wt0\r\ni1cjyo000000\r\nqlaq53000000', 0, '82.209.214.222', 1492183690, 'root_test', 'root_test', 'd32ffd3270e09c20cbacf2ca8e78a50f', 1492183690, '', 0, '', 0, 1492183690, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(83, 0, 2, '00000000000v667wt0\r\ni1cjyo000000\r\nqlaq53000000', 0, '82.209.214.222', 1492418645, 'вася', 'вacя', '14dd316f8ed26f35380261841096d7b3', 1492418645, '', 0, '', 0, 1492418645, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(85, 0, 2, '00000000000v667wt0\ni1cjyo000000\nqlaq53000000', 0, '178.62.237.202', 1492702734, 'Grubenarbeiter', 'grubenarbeiter', '$2y$10$nm0QNvWOQh3h1ji6E6mdJuhEmEVTcNL90q.wK4/XnXCrMDKkwyLcC', 1492702734, '', 0, '', 1492702915, 1492702734, 0, 'index.php', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '2ecc189f49662bf8', 1, 0, 0),
(86, 0, 2, '00000000000v667wt0\ni1cjyo000000\nqlaq53000000', 0, '145.255.2.249', 1492753125, '--Screwdriver--', '--screwdriver--', '$2y$10$JsIT2UquxaTxXGJIkzPfwetoRmWEENvW6EWn9RFsYx0kysqgWbcaq', 1492753125, '', 0, '', 1493194944, 1492753125, 0, 'index.php', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '7ef4d56cc76752f8', 1, 0, 0),
(87, 0, 2, '00000000000v667wt0\ni1cjyo000000\nqlaq53000000', 0, '46.8.138.223', 1492757152, 'Euphoria.', 'euphoria.', '$2y$10$9vl9tDvdmecHHEWeaQDJdulcZ1mmmNCB0xESVOiQPMvTpxXPxKele', 1492757152, '', 0, '', 1493194861, 1492757152, 0, 'index.php', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '05ddd64e60cb85ce', 1, 0, 0),
(89, 0, 2, '00000000000v667wt0\r\ni1cjyo000000\r\nqlaq53000000', 0, '176.121.194.105', 1492762406, 'смотрящий', 'cмoтpящий', '94349da715beca7e9fb021fc50476824', 1492762406, '', 0, '', 0, 1492762406, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(90, 0, 2, '00000000000v667wt0\r\ni1cjyo000000\r\nqlaq53000000', 0, '176.115.54.143', 1492796783, 'Lerd', 'lerd', '6ec886a5a24999ebc262ec8eb058e93e', 1492796783, '', 0, '', 0, 1492796783, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0),
(91, 0, 2, '00000000000v667wt0\r\ni1cjyo000000\r\nqlaq53000000', 0, '5.189.122.240', 1493228103, 'Destony', 'destony', '644c1df9462b01902de1742ffa82b74c', 1493228103, '', 0, '', 0, 1493228103, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 'ru', 'Africa/Addis_Ababa', '|d M Y|, H:i', 1, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'd', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_user_group`
--

DROP TABLE IF EXISTS `phpbb_user_group`;
CREATE TABLE `phpbb_user_group` (
  `group_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `group_leader` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `user_pending` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_user_group`
--

INSERT INTO `phpbb_user_group` (`group_id`, `user_id`, `group_leader`, `user_pending`) VALUES
(1, 1, 0, 0),
(2, 2, 0, 0),
(4, 2, 0, 0),
(5, 2, 1, 0),
(6, 3, 0, 0),
(6, 4, 0, 0),
(6, 5, 0, 0),
(6, 6, 0, 0),
(6, 7, 0, 0),
(6, 8, 0, 0),
(6, 9, 0, 0),
(6, 10, 0, 0),
(6, 11, 0, 0),
(6, 12, 0, 0),
(6, 13, 0, 0),
(6, 14, 0, 0),
(6, 15, 0, 0),
(6, 16, 0, 0),
(6, 17, 0, 0),
(6, 18, 0, 0),
(6, 19, 0, 0),
(6, 20, 0, 0),
(6, 21, 0, 0),
(6, 22, 0, 0),
(6, 23, 0, 0),
(6, 24, 0, 0),
(6, 25, 0, 0),
(6, 26, 0, 0),
(6, 27, 0, 0),
(6, 28, 0, 0),
(6, 29, 0, 0),
(6, 30, 0, 0),
(6, 31, 0, 0),
(6, 32, 0, 0),
(6, 33, 0, 0),
(6, 34, 0, 0),
(6, 35, 0, 0),
(6, 36, 0, 0),
(6, 37, 0, 0),
(6, 38, 0, 0),
(6, 39, 0, 0),
(6, 40, 0, 0),
(6, 41, 0, 0),
(6, 42, 0, 0),
(6, 43, 0, 0),
(6, 44, 0, 0),
(6, 45, 0, 0),
(6, 46, 0, 0),
(6, 47, 0, 0),
(2, 55, 0, 0),
(7, 55, 0, 0),
(2, 56, 0, 0),
(7, 56, 0, 0),
(2, 57, 0, 0),
(7, 57, 0, 0),
(5, 57, 0, 0),
(2, 58, 0, 0),
(7, 58, 0, 0),
(2, 59, 0, 0),
(7, 59, 0, 0),
(2, 60, 0, 0),
(7, 60, 0, 0),
(2, 61, 0, 0),
(7, 61, 0, 0),
(2, 62, 0, 0),
(7, 62, 0, 0),
(2, 63, 0, 0),
(7, 63, 0, 0),
(2, 64, 0, 0),
(7, 64, 0, 0),
(2, 65, 0, 0),
(7, 65, 0, 0),
(2, 66, 0, 0),
(7, 66, 0, 0),
(2, 67, 0, 0),
(7, 67, 0, 0),
(2, 68, 0, 0),
(7, 68, 0, 0),
(2, 69, 0, 0),
(7, 69, 0, 0),
(2, 70, 0, 0),
(7, 70, 0, 0),
(2, 71, 0, 0),
(7, 71, 0, 0),
(2, 72, 0, 0),
(7, 72, 0, 0),
(2, 73, 0, 0),
(7, 73, 0, 0),
(2, 79, 0, 0),
(7, 79, 0, 0),
(2, 80, 0, 0),
(7, 80, 0, 0),
(2, 81, 0, 0),
(7, 81, 0, 0),
(2, 82, 0, 0),
(7, 82, 0, 0),
(2, 83, 0, 0),
(7, 83, 0, 0),
(2, 85, 0, 0),
(7, 85, 0, 0),
(2, 86, 0, 0),
(7, 86, 0, 0),
(2, 87, 0, 0),
(7, 87, 0, 0),
(2, 89, 0, 0),
(7, 89, 0, 0),
(2, 90, 0, 0),
(7, 90, 0, 0),
(2, 91, 0, 0),
(7, 91, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_user_notifications`
--

DROP TABLE IF EXISTS `phpbb_user_notifications`;
CREATE TABLE `phpbb_user_notifications` (
  `item_type` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `item_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `method` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `notify` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `phpbb_user_notifications`
--

INSERT INTO `phpbb_user_notifications` (`item_type`, `item_id`, `user_id`, `method`, `notify`) VALUES
('notification.type.post', 0, 2, '', 1),
('notification.type.post', 0, 2, 'notification.method.email', 1),
('notification.type.topic', 0, 2, '', 1),
('notification.type.topic', 0, 2, 'notification.method.email', 1),
('notification.type.post', 0, 3, '', 1),
('notification.type.post', 0, 3, 'notification.method.email', 1),
('notification.type.topic', 0, 3, '', 1),
('notification.type.topic', 0, 3, 'notification.method.email', 1),
('notification.type.post', 0, 4, '', 1),
('notification.type.post', 0, 4, 'notification.method.email', 1),
('notification.type.topic', 0, 4, '', 1),
('notification.type.topic', 0, 4, 'notification.method.email', 1),
('notification.type.post', 0, 5, '', 1),
('notification.type.post', 0, 5, 'notification.method.email', 1),
('notification.type.topic', 0, 5, '', 1),
('notification.type.topic', 0, 5, 'notification.method.email', 1),
('notification.type.post', 0, 6, '', 1),
('notification.type.post', 0, 6, 'notification.method.email', 1),
('notification.type.topic', 0, 6, '', 1),
('notification.type.topic', 0, 6, 'notification.method.email', 1),
('notification.type.post', 0, 7, '', 1),
('notification.type.post', 0, 7, 'notification.method.email', 1),
('notification.type.topic', 0, 7, '', 1),
('notification.type.topic', 0, 7, 'notification.method.email', 1),
('notification.type.post', 0, 8, '', 1),
('notification.type.post', 0, 8, 'notification.method.email', 1),
('notification.type.topic', 0, 8, '', 1),
('notification.type.topic', 0, 8, 'notification.method.email', 1),
('notification.type.post', 0, 9, '', 1),
('notification.type.post', 0, 9, 'notification.method.email', 1),
('notification.type.topic', 0, 9, '', 1),
('notification.type.topic', 0, 9, 'notification.method.email', 1),
('notification.type.post', 0, 10, '', 1),
('notification.type.post', 0, 10, 'notification.method.email', 1),
('notification.type.topic', 0, 10, '', 1),
('notification.type.topic', 0, 10, 'notification.method.email', 1),
('notification.type.post', 0, 11, '', 1),
('notification.type.post', 0, 11, 'notification.method.email', 1),
('notification.type.topic', 0, 11, '', 1),
('notification.type.topic', 0, 11, 'notification.method.email', 1),
('notification.type.post', 0, 12, '', 1),
('notification.type.post', 0, 12, 'notification.method.email', 1),
('notification.type.topic', 0, 12, '', 1),
('notification.type.topic', 0, 12, 'notification.method.email', 1),
('notification.type.post', 0, 13, '', 1),
('notification.type.post', 0, 13, 'notification.method.email', 1),
('notification.type.topic', 0, 13, '', 1),
('notification.type.topic', 0, 13, 'notification.method.email', 1),
('notification.type.post', 0, 14, '', 1),
('notification.type.post', 0, 14, 'notification.method.email', 1),
('notification.type.topic', 0, 14, '', 1),
('notification.type.topic', 0, 14, 'notification.method.email', 1),
('notification.type.post', 0, 15, '', 1),
('notification.type.post', 0, 15, 'notification.method.email', 1),
('notification.type.topic', 0, 15, '', 1),
('notification.type.topic', 0, 15, 'notification.method.email', 1),
('notification.type.post', 0, 16, '', 1),
('notification.type.post', 0, 16, 'notification.method.email', 1),
('notification.type.topic', 0, 16, '', 1),
('notification.type.topic', 0, 16, 'notification.method.email', 1),
('notification.type.post', 0, 17, '', 1),
('notification.type.post', 0, 17, 'notification.method.email', 1),
('notification.type.topic', 0, 17, '', 1),
('notification.type.topic', 0, 17, 'notification.method.email', 1),
('notification.type.post', 0, 18, '', 1),
('notification.type.post', 0, 18, 'notification.method.email', 1),
('notification.type.topic', 0, 18, '', 1),
('notification.type.topic', 0, 18, 'notification.method.email', 1),
('notification.type.post', 0, 19, '', 1),
('notification.type.post', 0, 19, 'notification.method.email', 1),
('notification.type.topic', 0, 19, '', 1),
('notification.type.topic', 0, 19, 'notification.method.email', 1),
('notification.type.post', 0, 20, '', 1),
('notification.type.post', 0, 20, 'notification.method.email', 1),
('notification.type.topic', 0, 20, '', 1),
('notification.type.topic', 0, 20, 'notification.method.email', 1),
('notification.type.post', 0, 21, '', 1),
('notification.type.post', 0, 21, 'notification.method.email', 1),
('notification.type.topic', 0, 21, '', 1),
('notification.type.topic', 0, 21, 'notification.method.email', 1),
('notification.type.post', 0, 22, '', 1),
('notification.type.post', 0, 22, 'notification.method.email', 1),
('notification.type.topic', 0, 22, '', 1),
('notification.type.topic', 0, 22, 'notification.method.email', 1),
('notification.type.post', 0, 23, '', 1),
('notification.type.post', 0, 23, 'notification.method.email', 1),
('notification.type.topic', 0, 23, '', 1),
('notification.type.topic', 0, 23, 'notification.method.email', 1),
('notification.type.post', 0, 24, '', 1),
('notification.type.post', 0, 24, 'notification.method.email', 1),
('notification.type.topic', 0, 24, '', 1),
('notification.type.topic', 0, 24, 'notification.method.email', 1),
('notification.type.post', 0, 25, '', 1),
('notification.type.post', 0, 25, 'notification.method.email', 1),
('notification.type.topic', 0, 25, '', 1),
('notification.type.topic', 0, 25, 'notification.method.email', 1),
('notification.type.post', 0, 26, '', 1),
('notification.type.post', 0, 26, 'notification.method.email', 1),
('notification.type.topic', 0, 26, '', 1),
('notification.type.topic', 0, 26, 'notification.method.email', 1),
('notification.type.post', 0, 27, '', 1),
('notification.type.post', 0, 27, 'notification.method.email', 1),
('notification.type.topic', 0, 27, '', 1),
('notification.type.topic', 0, 27, 'notification.method.email', 1),
('notification.type.post', 0, 28, '', 1),
('notification.type.post', 0, 28, 'notification.method.email', 1),
('notification.type.topic', 0, 28, '', 1),
('notification.type.topic', 0, 28, 'notification.method.email', 1),
('notification.type.post', 0, 29, '', 1),
('notification.type.post', 0, 29, 'notification.method.email', 1),
('notification.type.topic', 0, 29, '', 1),
('notification.type.topic', 0, 29, 'notification.method.email', 1),
('notification.type.post', 0, 30, '', 1),
('notification.type.post', 0, 30, 'notification.method.email', 1),
('notification.type.topic', 0, 30, '', 1),
('notification.type.topic', 0, 30, 'notification.method.email', 1),
('notification.type.post', 0, 31, '', 1),
('notification.type.post', 0, 31, 'notification.method.email', 1),
('notification.type.topic', 0, 31, '', 1),
('notification.type.topic', 0, 31, 'notification.method.email', 1),
('notification.type.post', 0, 32, '', 1),
('notification.type.post', 0, 32, 'notification.method.email', 1),
('notification.type.topic', 0, 32, '', 1),
('notification.type.topic', 0, 32, 'notification.method.email', 1),
('notification.type.post', 0, 33, '', 1),
('notification.type.post', 0, 33, 'notification.method.email', 1),
('notification.type.topic', 0, 33, '', 1),
('notification.type.topic', 0, 33, 'notification.method.email', 1),
('notification.type.post', 0, 34, '', 1),
('notification.type.post', 0, 34, 'notification.method.email', 1),
('notification.type.topic', 0, 34, '', 1),
('notification.type.topic', 0, 34, 'notification.method.email', 1),
('notification.type.post', 0, 35, '', 1),
('notification.type.post', 0, 35, 'notification.method.email', 1),
('notification.type.topic', 0, 35, '', 1),
('notification.type.topic', 0, 35, 'notification.method.email', 1),
('notification.type.post', 0, 36, '', 1),
('notification.type.post', 0, 36, 'notification.method.email', 1),
('notification.type.topic', 0, 36, '', 1),
('notification.type.topic', 0, 36, 'notification.method.email', 1),
('notification.type.post', 0, 37, '', 1),
('notification.type.post', 0, 37, 'notification.method.email', 1),
('notification.type.topic', 0, 37, '', 1),
('notification.type.topic', 0, 37, 'notification.method.email', 1),
('notification.type.post', 0, 38, '', 1),
('notification.type.post', 0, 38, 'notification.method.email', 1),
('notification.type.topic', 0, 38, '', 1),
('notification.type.topic', 0, 38, 'notification.method.email', 1),
('notification.type.post', 0, 39, '', 1),
('notification.type.post', 0, 39, 'notification.method.email', 1),
('notification.type.topic', 0, 39, '', 1),
('notification.type.topic', 0, 39, 'notification.method.email', 1),
('notification.type.post', 0, 40, '', 1),
('notification.type.post', 0, 40, 'notification.method.email', 1),
('notification.type.topic', 0, 40, '', 1),
('notification.type.topic', 0, 40, 'notification.method.email', 1),
('notification.type.post', 0, 41, '', 1),
('notification.type.post', 0, 41, 'notification.method.email', 1),
('notification.type.topic', 0, 41, '', 1),
('notification.type.topic', 0, 41, 'notification.method.email', 1),
('notification.type.post', 0, 42, '', 1),
('notification.type.post', 0, 42, 'notification.method.email', 1),
('notification.type.topic', 0, 42, '', 1),
('notification.type.topic', 0, 42, 'notification.method.email', 1),
('notification.type.post', 0, 43, '', 1),
('notification.type.post', 0, 43, 'notification.method.email', 1),
('notification.type.topic', 0, 43, '', 1),
('notification.type.topic', 0, 43, 'notification.method.email', 1),
('notification.type.post', 0, 44, '', 1),
('notification.type.post', 0, 44, 'notification.method.email', 1),
('notification.type.topic', 0, 44, '', 1),
('notification.type.topic', 0, 44, 'notification.method.email', 1),
('notification.type.post', 0, 45, '', 1),
('notification.type.post', 0, 45, 'notification.method.email', 1),
('notification.type.topic', 0, 45, '', 1),
('notification.type.topic', 0, 45, 'notification.method.email', 1),
('notification.type.post', 0, 46, '', 1),
('notification.type.post', 0, 46, 'notification.method.email', 1),
('notification.type.topic', 0, 46, '', 1),
('notification.type.topic', 0, 46, 'notification.method.email', 1),
('notification.type.post', 0, 47, '', 1),
('notification.type.post', 0, 47, 'notification.method.email', 1),
('notification.type.topic', 0, 47, '', 1),
('notification.type.topic', 0, 47, 'notification.method.email', 1),
('notification.type.post', 0, 55, '', 1),
('notification.type.post', 0, 55, 'notification.method.email', 1),
('notification.type.topic', 0, 55, '', 1),
('notification.type.topic', 0, 55, 'notification.method.email', 1),
('notification.type.post', 0, 62, '', 1),
('notification.type.post', 0, 62, 'notification.method.email', 1),
('notification.type.topic', 0, 62, '', 1),
('notification.type.topic', 0, 62, 'notification.method.email', 1),
('notification.type.post', 0, 63, '', 1),
('notification.type.post', 0, 63, 'notification.method.email', 1),
('notification.type.topic', 0, 63, '', 1),
('notification.type.topic', 0, 63, 'notification.method.email', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_warnings`
--

DROP TABLE IF EXISTS `phpbb_warnings`;
CREATE TABLE `phpbb_warnings` (
  `warning_id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `post_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `log_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `warning_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_words`
--

DROP TABLE IF EXISTS `phpbb_words`;
CREATE TABLE `phpbb_words` (
  `word_id` mediumint(8) UNSIGNED NOT NULL,
  `word` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `replacement` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `phpbb_zebra`
--

DROP TABLE IF EXISTS `phpbb_zebra`;
CREATE TABLE `phpbb_zebra` (
  `user_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `zebra_id` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `friend` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `foe` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `registration_attempts`
--

DROP TABLE IF EXISTS `registration_attempts`;
CREATE TABLE `registration_attempts` (
  `id` int(255) NOT NULL,
  `ip` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `name` varchar(20) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`name`, `value`) VALUES
('busylogin_enabled', '0'),
('color_background', '#f5f5f6'),
('color_cancelled', '#666666'),
('color_chist', '#00ff00'),
('color_inprogress', '#ffff00'),
('color_killed', '#ff0000'),
('color_otkaz', '#500000'),
('color_otkaz_kosyak', ''),
('comment_color', '#434343'),
('enable_nevid_count', '1'),
('loadKovcheg', '49'),
('loadSmorye', '21'),
('loadUtes', '30'),
('login_attempts', '55'),
('max_z_per_day', '10000'),
('otkaz_color', '#ff0000'),
('own_z_color', '#fffff7'),
('register_attempts', '55'),
('restore_attempts', '55'),
('show_new_items_count', '1'),
('show_ready_items', '1'),
('sign_color', '#36b200');

-- --------------------------------------------------------

--
-- Table structure for table `sud`
--

DROP TABLE IF EXISTS `sud`;
CREATE TABLE `sud` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(100) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `short_text` longblob NOT NULL,
  `full_text` longblob NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `date_modified` varchar(255) NOT NULL,
  `last_edited_id` int(100) NOT NULL,
  `last_edited_name` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(1111) NOT NULL,
  `alias` text NOT NULL,
  `apeha_id` varchar(1111) NOT NULL,
  `groupId` int(255) NOT NULL,
  `date_registered` mediumtext NOT NULL,
  `date_lastseen` mediumtext NOT NULL,
  `ips` text NOT NULL,
  `password` text NOT NULL,
  `newpassword` varchar(50) NOT NULL,
  `authKey` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `approvekey` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `zayavka`
--

DROP TABLE IF EXISTS `zayavka`;
CREATE TABLE `zayavka` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `proverka_city` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date_added` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `otkaz_text` text NOT NULL,
  `date_last_update` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `calculated` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `zayavka_user_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `zayavka_user_view`;
CREATE TABLE `zayavka_user_view` (
`zId` int(11)
,`user_id` int(11)
,`type` varchar(20)
,`city` varchar(20)
,`proverka_city` varchar(255)
,`date_added` text
,`category` varchar(255)
,`status` varchar(255)
,`otkaz_text` text
,`date_last_update` varchar(255)
,`active` int(1)
,`calculated` int(1)
,`uId` int(11)
,`username` varchar(1111)
,`alias` text
,`apeha_id` varchar(1111)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `zayavka_with_active_actions`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `zayavka_with_active_actions`;
CREATE TABLE `zayavka_with_active_actions` (
`id` int(11)
,`action_id` int(255)
,`user_id` int(255)
,`city` varchar(20)
,`proverka_city` varchar(255)
,`status` varchar(255)
,`zayavka_active` int(1)
,`calculated` int(1)
,`action` varchar(255)
,`action_active` int(1)
,`dragon_id` int(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `zayavkiFullActions`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `zayavkiFullActions`;
CREATE TABLE `zayavkiFullActions` (
`id` int(11)
,`action_id` int(255)
,`user_id` int(255)
,`city` varchar(20)
,`proverka_city` varchar(255)
,`type` varchar(20)
,`date_added` text
,`category` varchar(255)
,`status` varchar(255)
,`otkaz_text` text
,`date_last_update` varchar(255)
,`active` int(1)
,`action` varchar(255)
,`action_active` int(1)
,`notes` text
,`action_date` varchar(255)
,`dragonusername` varchar(1111)
,`dragonalias` text
);

-- --------------------------------------------------------

--
-- Structure for view `action_user`
--
DROP TABLE IF EXISTS `action_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin_chisto`@`localhost` SQL SECURITY DEFINER VIEW `action_user`  AS  select `a`.`id` AS `id`,`a`.`zayavka_id` AS `zayavka_id`,`a`.`dragon_id` AS `dragon_id`,`a`.`action` AS `action`,`a`.`active` AS `active`,`a`.`notes` AS `notes`,`a`.`date` AS `date`,`u`.`username` AS `username`,`u`.`alias` AS `alias` from (`actions` `a` join `users` `u` on((`a`.`dragon_id` = `u`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `lastActiveActions`
--
DROP TABLE IF EXISTS `lastActiveActions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin_chisto`@`localhost` SQL SECURITY DEFINER VIEW `lastActiveActions`  AS  select `z`.`id` AS `zayavka_id`,max(`a`.`id`) AS `action_id`,`z`.`user_id` AS `user_id`,`z`.`city` AS `city`,`z`.`proverka_city` AS `proverka_city`,`z`.`status` AS `status`,`z`.`active` AS `zayavka_active`,`z`.`calculated` AS `calculated`,`a`.`action` AS `action`,`a`.`active` AS `action_active`,`a`.`dragon_id` AS `dragon_id` from (`actions` `a` join `zayavka` `z` on((`a`.`zayavka_id` = `z`.`id`))) where ((`a`.`active` = 1) and (`z`.`active` = 1)) group by `a`.`zayavka_id` ;

-- --------------------------------------------------------

--
-- Structure for view `zayavka_user_view`
--
DROP TABLE IF EXISTS `zayavka_user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin_chisto`@`localhost` SQL SECURITY DEFINER VIEW `zayavka_user_view`  AS  select `z`.`id` AS `zId`,`u`.`id` AS `user_id`,`z`.`type` AS `type`,`z`.`city` AS `city`,`z`.`proverka_city` AS `proverka_city`,`z`.`date_added` AS `date_added`,`z`.`category` AS `category`,`z`.`status` AS `status`,`z`.`otkaz_text` AS `otkaz_text`,`z`.`date_last_update` AS `date_last_update`,`z`.`active` AS `active`,`z`.`calculated` AS `calculated`,`u`.`id` AS `uId`,`u`.`username` AS `username`,`u`.`alias` AS `alias`,`u`.`apeha_id` AS `apeha_id` from (`zayavka` `z` join `users` `u` on((`z`.`user_id` = `u`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `zayavka_with_active_actions`
--
DROP TABLE IF EXISTS `zayavka_with_active_actions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin_chisto`@`localhost` SQL SECURITY DEFINER VIEW `zayavka_with_active_actions`  AS  select `z`.`id` AS `id`,`a`.`id` AS `action_id`,`z`.`user_id` AS `user_id`,`z`.`city` AS `city`,`z`.`proverka_city` AS `proverka_city`,`z`.`status` AS `status`,`z`.`active` AS `zayavka_active`,`z`.`calculated` AS `calculated`,`a`.`action` AS `action`,`a`.`active` AS `action_active`,`a`.`dragon_id` AS `dragon_id` from (`zayavka` `z` join `actions` `a` on((`z`.`id` = `a`.`zayavka_id`))) order by `z`.`id`,`a`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `zayavkiFullActions`
--
DROP TABLE IF EXISTS `zayavkiFullActions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin_chisto`@`localhost` SQL SECURITY DEFINER VIEW `zayavkiFullActions`  AS  select `z`.`id` AS `id`,`a`.`id` AS `action_id`,`z`.`user_id` AS `user_id`,`z`.`city` AS `city`,`z`.`proverka_city` AS `proverka_city`,`z`.`type` AS `type`,`z`.`date_added` AS `date_added`,`z`.`category` AS `category`,`z`.`status` AS `status`,`z`.`otkaz_text` AS `otkaz_text`,`z`.`date_last_update` AS `date_last_update`,`z`.`active` AS `active`,`a`.`action` AS `action`,`a`.`active` AS `action_active`,`a`.`notes` AS `notes`,`a`.`date` AS `action_date`,`u`.`username` AS `dragonusername`,`u`.`alias` AS `dragonalias` from ((`zayavka` `z` left join `actions` `a` on((`z`.`id` = `a`.`zayavka_id`))) left join `users` `u` on((`a`.`dragon_id` = `u`.`id`))) order by `z`.`id` desc,`a`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `busylogin`
--
ALTER TABLE `busylogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaning`
--
ALTER TABLE `cleaning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaning_data`
--
ALTER TABLE `cleaning_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dragonsrights`
--
ALTER TABLE `dragonsrights`
  ADD PRIMARY KEY (`dragonid`);

--
-- Indexes for table `loginip`
--
ALTER TABLE `loginip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_fails`
--
ALTER TABLE `login_fails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `official`
--
ALTER TABLE `official`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passwordreset_attempts`
--
ALTER TABLE `passwordreset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phpbb_acl_groups`
--
ALTER TABLE `phpbb_acl_groups`
  ADD KEY `group_id` (`group_id`),
  ADD KEY `auth_opt_id` (`auth_option_id`),
  ADD KEY `auth_role_id` (`auth_role_id`);

--
-- Indexes for table `phpbb_acl_options`
--
ALTER TABLE `phpbb_acl_options`
  ADD PRIMARY KEY (`auth_option_id`),
  ADD UNIQUE KEY `auth_option` (`auth_option`);

--
-- Indexes for table `phpbb_acl_roles`
--
ALTER TABLE `phpbb_acl_roles`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `role_type` (`role_type`),
  ADD KEY `role_order` (`role_order`);

--
-- Indexes for table `phpbb_acl_roles_data`
--
ALTER TABLE `phpbb_acl_roles_data`
  ADD PRIMARY KEY (`role_id`,`auth_option_id`),
  ADD KEY `ath_op_id` (`auth_option_id`);

--
-- Indexes for table `phpbb_acl_users`
--
ALTER TABLE `phpbb_acl_users`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `auth_option_id` (`auth_option_id`),
  ADD KEY `auth_role_id` (`auth_role_id`);

--
-- Indexes for table `phpbb_attachments`
--
ALTER TABLE `phpbb_attachments`
  ADD PRIMARY KEY (`attach_id`),
  ADD KEY `filetime` (`filetime`),
  ADD KEY `post_msg_id` (`post_msg_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `poster_id` (`poster_id`),
  ADD KEY `is_orphan` (`is_orphan`);

--
-- Indexes for table `phpbb_banlist`
--
ALTER TABLE `phpbb_banlist`
  ADD PRIMARY KEY (`ban_id`),
  ADD KEY `ban_end` (`ban_end`),
  ADD KEY `ban_user` (`ban_userid`,`ban_exclude`),
  ADD KEY `ban_email` (`ban_email`,`ban_exclude`),
  ADD KEY `ban_ip` (`ban_ip`,`ban_exclude`);

--
-- Indexes for table `phpbb_bbcodes`
--
ALTER TABLE `phpbb_bbcodes`
  ADD PRIMARY KEY (`bbcode_id`),
  ADD KEY `display_on_post` (`display_on_posting`);

--
-- Indexes for table `phpbb_bookmarks`
--
ALTER TABLE `phpbb_bookmarks`
  ADD PRIMARY KEY (`topic_id`,`user_id`);

--
-- Indexes for table `phpbb_bots`
--
ALTER TABLE `phpbb_bots`
  ADD PRIMARY KEY (`bot_id`),
  ADD KEY `bot_active` (`bot_active`);

--
-- Indexes for table `phpbb_config`
--
ALTER TABLE `phpbb_config`
  ADD PRIMARY KEY (`config_name`),
  ADD KEY `is_dynamic` (`is_dynamic`);

--
-- Indexes for table `phpbb_config_text`
--
ALTER TABLE `phpbb_config_text`
  ADD PRIMARY KEY (`config_name`);

--
-- Indexes for table `phpbb_confirm`
--
ALTER TABLE `phpbb_confirm`
  ADD PRIMARY KEY (`session_id`,`confirm_id`),
  ADD KEY `confirm_type` (`confirm_type`);

--
-- Indexes for table `phpbb_disallow`
--
ALTER TABLE `phpbb_disallow`
  ADD PRIMARY KEY (`disallow_id`);

--
-- Indexes for table `phpbb_drafts`
--
ALTER TABLE `phpbb_drafts`
  ADD PRIMARY KEY (`draft_id`),
  ADD KEY `save_time` (`save_time`);

--
-- Indexes for table `phpbb_ext`
--
ALTER TABLE `phpbb_ext`
  ADD UNIQUE KEY `ext_name` (`ext_name`);

--
-- Indexes for table `phpbb_extensions`
--
ALTER TABLE `phpbb_extensions`
  ADD PRIMARY KEY (`extension_id`);

--
-- Indexes for table `phpbb_extension_groups`
--
ALTER TABLE `phpbb_extension_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `phpbb_forums`
--
ALTER TABLE `phpbb_forums`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `left_right_id` (`left_id`,`right_id`),
  ADD KEY `forum_lastpost_id` (`forum_last_post_id`);

--
-- Indexes for table `phpbb_forums_access`
--
ALTER TABLE `phpbb_forums_access`
  ADD PRIMARY KEY (`forum_id`,`user_id`,`session_id`);

--
-- Indexes for table `phpbb_forums_track`
--
ALTER TABLE `phpbb_forums_track`
  ADD PRIMARY KEY (`user_id`,`forum_id`);

--
-- Indexes for table `phpbb_forums_watch`
--
ALTER TABLE `phpbb_forums_watch`
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `notify_stat` (`notify_status`);

--
-- Indexes for table `phpbb_groups`
--
ALTER TABLE `phpbb_groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `group_legend_name` (`group_legend`,`group_name`);

--
-- Indexes for table `phpbb_icons`
--
ALTER TABLE `phpbb_icons`
  ADD PRIMARY KEY (`icons_id`),
  ADD KEY `display_on_posting` (`display_on_posting`);

--
-- Indexes for table `phpbb_lang`
--
ALTER TABLE `phpbb_lang`
  ADD PRIMARY KEY (`lang_id`),
  ADD KEY `lang_iso` (`lang_iso`);

--
-- Indexes for table `phpbb_log`
--
ALTER TABLE `phpbb_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `log_type` (`log_type`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `reportee_id` (`reportee_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `log_time` (`log_time`);

--
-- Indexes for table `phpbb_login_attempts`
--
ALTER TABLE `phpbb_login_attempts`
  ADD KEY `att_ip` (`attempt_ip`,`attempt_time`),
  ADD KEY `att_for` (`attempt_forwarded_for`,`attempt_time`),
  ADD KEY `att_time` (`attempt_time`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phpbb_migrations`
--
ALTER TABLE `phpbb_migrations`
  ADD PRIMARY KEY (`migration_name`);

--
-- Indexes for table `phpbb_moderator_cache`
--
ALTER TABLE `phpbb_moderator_cache`
  ADD KEY `disp_idx` (`display_on_index`),
  ADD KEY `forum_id` (`forum_id`);

--
-- Indexes for table `phpbb_modules`
--
ALTER TABLE `phpbb_modules`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `left_right_id` (`left_id`,`right_id`),
  ADD KEY `module_enabled` (`module_enabled`),
  ADD KEY `class_left_id` (`module_class`,`left_id`);

--
-- Indexes for table `phpbb_notifications`
--
ALTER TABLE `phpbb_notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `item_ident` (`notification_type_id`,`item_id`),
  ADD KEY `user` (`user_id`,`notification_read`);

--
-- Indexes for table `phpbb_notification_types`
--
ALTER TABLE `phpbb_notification_types`
  ADD PRIMARY KEY (`notification_type_id`),
  ADD UNIQUE KEY `type` (`notification_type_name`);

--
-- Indexes for table `phpbb_oauth_accounts`
--
ALTER TABLE `phpbb_oauth_accounts`
  ADD PRIMARY KEY (`user_id`,`provider`);

--
-- Indexes for table `phpbb_oauth_tokens`
--
ALTER TABLE `phpbb_oauth_tokens`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `provider` (`provider`);

--
-- Indexes for table `phpbb_poll_options`
--
ALTER TABLE `phpbb_poll_options`
  ADD KEY `poll_opt_id` (`poll_option_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `phpbb_poll_votes`
--
ALTER TABLE `phpbb_poll_votes`
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `vote_user_id` (`vote_user_id`),
  ADD KEY `vote_user_ip` (`vote_user_ip`);

--
-- Indexes for table `phpbb_posts`
--
ALTER TABLE `phpbb_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `poster_ip` (`poster_ip`),
  ADD KEY `poster_id` (`poster_id`),
  ADD KEY `tid_post_time` (`topic_id`,`post_time`),
  ADD KEY `post_username` (`post_username`),
  ADD KEY `post_visibility` (`post_visibility`);

--
-- Indexes for table `phpbb_privmsgs`
--
ALTER TABLE `phpbb_privmsgs`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `author_ip` (`author_ip`),
  ADD KEY `message_time` (`message_time`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `root_level` (`root_level`);

--
-- Indexes for table `phpbb_privmsgs_folder`
--
ALTER TABLE `phpbb_privmsgs_folder`
  ADD PRIMARY KEY (`folder_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phpbb_privmsgs_rules`
--
ALTER TABLE `phpbb_privmsgs_rules`
  ADD PRIMARY KEY (`rule_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phpbb_privmsgs_to`
--
ALTER TABLE `phpbb_privmsgs_to`
  ADD KEY `msg_id` (`msg_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `usr_flder_id` (`user_id`,`folder_id`);

--
-- Indexes for table `phpbb_profile_fields`
--
ALTER TABLE `phpbb_profile_fields`
  ADD PRIMARY KEY (`field_id`),
  ADD KEY `fld_type` (`field_type`),
  ADD KEY `fld_ordr` (`field_order`);

--
-- Indexes for table `phpbb_profile_fields_data`
--
ALTER TABLE `phpbb_profile_fields_data`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `phpbb_profile_fields_lang`
--
ALTER TABLE `phpbb_profile_fields_lang`
  ADD PRIMARY KEY (`field_id`,`lang_id`,`option_id`);

--
-- Indexes for table `phpbb_profile_lang`
--
ALTER TABLE `phpbb_profile_lang`
  ADD PRIMARY KEY (`field_id`,`lang_id`);

--
-- Indexes for table `phpbb_ranks`
--
ALTER TABLE `phpbb_ranks`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `phpbb_reports`
--
ALTER TABLE `phpbb_reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `pm_id` (`pm_id`);

--
-- Indexes for table `phpbb_reports_reasons`
--
ALTER TABLE `phpbb_reports_reasons`
  ADD PRIMARY KEY (`reason_id`);

--
-- Indexes for table `phpbb_search_results`
--
ALTER TABLE `phpbb_search_results`
  ADD PRIMARY KEY (`search_key`);

--
-- Indexes for table `phpbb_search_wordlist`
--
ALTER TABLE `phpbb_search_wordlist`
  ADD PRIMARY KEY (`word_id`),
  ADD UNIQUE KEY `wrd_txt` (`word_text`),
  ADD KEY `wrd_cnt` (`word_count`);

--
-- Indexes for table `phpbb_search_wordmatch`
--
ALTER TABLE `phpbb_search_wordmatch`
  ADD UNIQUE KEY `un_mtch` (`word_id`,`post_id`,`title_match`),
  ADD KEY `word_id` (`word_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `phpbb_sessions`
--
ALTER TABLE `phpbb_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `session_time` (`session_time`),
  ADD KEY `session_user_id` (`session_user_id`),
  ADD KEY `session_fid` (`session_forum_id`);

--
-- Indexes for table `phpbb_sessions_keys`
--
ALTER TABLE `phpbb_sessions_keys`
  ADD PRIMARY KEY (`key_id`,`user_id`),
  ADD KEY `last_login` (`last_login`);

--
-- Indexes for table `phpbb_sitelist`
--
ALTER TABLE `phpbb_sitelist`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `phpbb_smilies`
--
ALTER TABLE `phpbb_smilies`
  ADD PRIMARY KEY (`smiley_id`),
  ADD KEY `display_on_post` (`display_on_posting`);

--
-- Indexes for table `phpbb_styles`
--
ALTER TABLE `phpbb_styles`
  ADD PRIMARY KEY (`style_id`),
  ADD UNIQUE KEY `style_name` (`style_name`);

--
-- Indexes for table `phpbb_teampage`
--
ALTER TABLE `phpbb_teampage`
  ADD PRIMARY KEY (`teampage_id`);

--
-- Indexes for table `phpbb_topics`
--
ALTER TABLE `phpbb_topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `forum_id_type` (`forum_id`,`topic_type`),
  ADD KEY `last_post_time` (`topic_last_post_time`),
  ADD KEY `fid_time_moved` (`forum_id`,`topic_last_post_time`,`topic_moved_id`),
  ADD KEY `topic_visibility` (`topic_visibility`),
  ADD KEY `forum_vis_last` (`forum_id`,`topic_visibility`,`topic_last_post_id`);

--
-- Indexes for table `phpbb_topics_posted`
--
ALTER TABLE `phpbb_topics_posted`
  ADD PRIMARY KEY (`user_id`,`topic_id`);

--
-- Indexes for table `phpbb_topics_track`
--
ALTER TABLE `phpbb_topics_track`
  ADD PRIMARY KEY (`user_id`,`topic_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `phpbb_topics_watch`
--
ALTER TABLE `phpbb_topics_watch`
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `notify_stat` (`notify_status`);

--
-- Indexes for table `phpbb_users`
--
ALTER TABLE `phpbb_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_clean` (`username_clean`),
  ADD KEY `user_birthday` (`user_birthday`),
  ADD KEY `user_email_hash` (`user_email_hash`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `phpbb_user_group`
--
ALTER TABLE `phpbb_user_group`
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_leader` (`group_leader`);

--
-- Indexes for table `phpbb_warnings`
--
ALTER TABLE `phpbb_warnings`
  ADD PRIMARY KEY (`warning_id`);

--
-- Indexes for table `phpbb_words`
--
ALTER TABLE `phpbb_words`
  ADD PRIMARY KEY (`word_id`);

--
-- Indexes for table `phpbb_zebra`
--
ALTER TABLE `phpbb_zebra`
  ADD PRIMARY KEY (`user_id`,`zebra_id`);

--
-- Indexes for table `registration_attempts`
--
ALTER TABLE `registration_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `sud`
--
ALTER TABLE `sud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zayavka`
--
ALTER TABLE `zayavka`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `busylogin`
--
ALTER TABLE `busylogin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cleaning`
--
ALTER TABLE `cleaning`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cleaning_data`
--
ALTER TABLE `cleaning_data`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `loginip`
--
ALTER TABLE `loginip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `login_fails`
--
ALTER TABLE `login_fails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `official`
--
ALTER TABLE `official`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `passwordreset_attempts`
--
ALTER TABLE `passwordreset_attempts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `phpbb_acl_options`
--
ALTER TABLE `phpbb_acl_options`
  MODIFY `auth_option_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `phpbb_acl_roles`
--
ALTER TABLE `phpbb_acl_roles`
  MODIFY `role_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `phpbb_attachments`
--
ALTER TABLE `phpbb_attachments`
  MODIFY `attach_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phpbb_banlist`
--
ALTER TABLE `phpbb_banlist`
  MODIFY `ban_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phpbb_bots`
--
ALTER TABLE `phpbb_bots`
  MODIFY `bot_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `phpbb_disallow`
--
ALTER TABLE `phpbb_disallow`
  MODIFY `disallow_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phpbb_drafts`
--
ALTER TABLE `phpbb_drafts`
  MODIFY `draft_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phpbb_extensions`
--
ALTER TABLE `phpbb_extensions`
  MODIFY `extension_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `phpbb_extension_groups`
--
ALTER TABLE `phpbb_extension_groups`
  MODIFY `group_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `phpbb_forums`
--
ALTER TABLE `phpbb_forums`
  MODIFY `forum_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `phpbb_groups`
--
ALTER TABLE `phpbb_groups`
  MODIFY `group_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `phpbb_icons`
--
ALTER TABLE `phpbb_icons`
  MODIFY `icons_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `phpbb_lang`
--
ALTER TABLE `phpbb_lang`
  MODIFY `lang_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `phpbb_log`
--
ALTER TABLE `phpbb_log`
  MODIFY `log_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `phpbb_modules`
--
ALTER TABLE `phpbb_modules`
  MODIFY `module_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
--
-- AUTO_INCREMENT for table `phpbb_notifications`
--
ALTER TABLE `phpbb_notifications`
  MODIFY `notification_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `phpbb_notification_types`
--
ALTER TABLE `phpbb_notification_types`
  MODIFY `notification_type_id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `phpbb_posts`
--
ALTER TABLE `phpbb_posts`
  MODIFY `post_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `phpbb_privmsgs`
--
ALTER TABLE `phpbb_privmsgs`
  MODIFY `msg_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phpbb_privmsgs_folder`
--
ALTER TABLE `phpbb_privmsgs_folder`
  MODIFY `folder_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phpbb_privmsgs_rules`
--
ALTER TABLE `phpbb_privmsgs_rules`
  MODIFY `rule_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phpbb_profile_fields`
--
ALTER TABLE `phpbb_profile_fields`
  MODIFY `field_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `phpbb_ranks`
--
ALTER TABLE `phpbb_ranks`
  MODIFY `rank_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `phpbb_reports`
--
ALTER TABLE `phpbb_reports`
  MODIFY `report_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phpbb_reports_reasons`
--
ALTER TABLE `phpbb_reports_reasons`
  MODIFY `reason_id` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `phpbb_search_wordlist`
--
ALTER TABLE `phpbb_search_wordlist`
  MODIFY `word_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `phpbb_sitelist`
--
ALTER TABLE `phpbb_sitelist`
  MODIFY `site_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phpbb_smilies`
--
ALTER TABLE `phpbb_smilies`
  MODIFY `smiley_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `phpbb_styles`
--
ALTER TABLE `phpbb_styles`
  MODIFY `style_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `phpbb_teampage`
--
ALTER TABLE `phpbb_teampage`
  MODIFY `teampage_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `phpbb_topics`
--
ALTER TABLE `phpbb_topics`
  MODIFY `topic_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `phpbb_users`
--
ALTER TABLE `phpbb_users`
  MODIFY `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `phpbb_warnings`
--
ALTER TABLE `phpbb_warnings`
  MODIFY `warning_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phpbb_words`
--
ALTER TABLE `phpbb_words`
  MODIFY `word_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registration_attempts`
--
ALTER TABLE `registration_attempts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `sud`
--
ALTER TABLE `sud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `zayavka`
--
ALTER TABLE `zayavka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
