-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 11:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `returns` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `category`, `coupon`, `product`, `blog`, `orders`, `other`, `report`, `role`, `returns`, `contact`, `comment`, `setting`, `stock`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Admin123', '123456789', 'admin12345@gmail.com', NULL, '$2y$10$6RSbrhGjQgKbXvsaQqjwj.OWEFsiNTXB51i3.emwnqBiQR/B/Lf4m', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, NULL, '2020-05-13 22:19:07'),
(2, 'admin1', '1234567489', 'admin1@mgail.com', NULL, '$2y$10$/772fmyLg2bKs9F9d5DRiu.RC12Fh..PXDXcemclnZOo1RHi7z4s.', NULL, NULL, '1', '1', NULL, NULL, '1', '1', NULL, NULL, '1', '1', NULL, NULL, 2, NULL, NULL),
(3, 'admin2', '132456468', 'admin2@gmail.com', NULL, '$2y$10$TH0C8iz.0n979C5MHXlnZOIou49tyyxrJLD.eGAkcCzJ23wt1pi26', NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogcategories`
--

CREATE TABLE `blogcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_vi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogcategories`
--

INSERT INTO `blogcategories` (`id`, `category_name_en`, `category_name_vi`, `created_at`, `updated_at`) VALUES
(1, 'English 2', 'Việt nam', '2020-05-08 14:43:56', '2020-05-08 14:55:35'),
(4, 'eng 2', 'v7', '2020-05-08 14:54:55', '2020-05-08 14:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_vi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_vi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `title_en`, `title_vi`, `image`, `details_en`, `details_vi`, `created_at`, `updated_at`) VALUES
(2, 1, 'New South Wales\' new logo and slogan slips by unnoticed', 'Logo và slogan mới của New South Wales do không được chú ý - gần như', 'public/images/blog/1666406668129044.png', '<p style=\"margin-bottom: 1rem; padding: 0px; color: rgb(18, 18, 18); font-family: &quot;Guardian Text Egyptian Web&quot;, Georgia, serif; font-size: 17px; font-variant-ligatures: common-ligatures;\">But at least people noticed Victoria had a new logo.<br></p><p style=\"margin-bottom: 1rem; padding: 0px; color: rgb(18, 18, 18); font-family: &quot;Guardian Text Egyptian Web&quot;, Georgia, serif; font-size: 17px; font-variant-ligatures: common-ligatures;\">Perhaps wary of similar negative publicity, New South Wales seems to have changed its corporate branding with no fanfare at all.</p><p style=\"margin-bottom: 1rem; padding: 0px; color: rgb(18, 18, 18); font-family: &quot;Guardian Text Egyptian Web&quot;, Georgia, serif; font-size: 17px; font-variant-ligatures: common-ligatures;\">In fact, the new logo and slogan appear to have been in place for at least a week. That’s at least a week in which Baird has managed to avoid a witty retort from Victoria’s premier, Daniel Andrews.</p><p style=\"margin-bottom: 1rem; padding: 0px; color: rgb(18, 18, 18); font-family: &quot;Guardian Text Egyptian Web&quot;, Georgia, serif; font-size: 17px; font-variant-ligatures: common-ligatures;\">The earliest reported sighting of the logo was at a press conference in Martin Place on 2 September, but ABC Sydney’s photo of it was met with a straight-faced response on Twitter: just one retweet.<br></p><figure class=\"element element-tweet\" data-canonical-url=\"https://twitter.com/702sydney/statuses/638909482697777152\" style=\"margin-top: 1rem; margin-bottom: 0.75rem; position: relative; color: rgb(18, 18, 18); font-family: &quot;Guardian Text Egyptian Web&quot;, Georgia, serif; font-size: 17px; font-variant-ligatures: common-ligatures;\"><twitter-widget class=\"twitter-tweet twitter-tweet-rendered\" id=\"twitter-widget-1\" data-tweet-id=\"638909482697777152\" style=\"width: 500px; position: static; visibility: visible; display: block; transform: rotate(0deg); max-width: 100%; min-width: 220px; margin-top: 10px; margin-bottom: 10px;\"><div data-twitter-event-id=\"1\" class=\"SandboxRoot env-bp-350\" style=\"max-height: 10000px; direction: ltr; background: 0px 0px; font-variant-ligatures: normal; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.4; font-family: Helvetica, Roboto, &quot;Segoe UI&quot;, Calibri, sans-serif; color: rgb(28, 32, 34); white-space: initial; position: relative;\"><div class=\"EmbeddedTweet EmbeddedTweet--cta js-clickToOpenTarget\" data-click-to-open-target=\"https://twitter.com/abcsydney/status/638909482697777152\" data-iframe-title=\"Twitter Tweet\" data-scribe=\"page:tweet\" id=\"twitter-widget-1\" lang=\"en\" data-twitter-event-id=\"4\" style=\"overflow: hidden; cursor: pointer; border: 1px solid rgb(225, 232, 237); border-radius: 5px; max-width: 520px;\"><div class=\"EmbeddedTweet-tweetContainer\"><div class=\"EmbeddedTweet-tweet\" style=\"padding: 20px 20px 10px;\"><blockquote class=\"Tweet h-entry js-tweetIdInfo subject expanded\" cite=\"https://twitter.com/abcsydney/status/638909482697777152\" data-tweet-id=\"638909482697777152\" data-scribe=\"section:subject\" style=\"margin-bottom: 0px; padding: 0px; list-style: none; border: none;\"><div class=\"Tweet-header\" style=\"display: flex;\"><a class=\"TweetAuthor-avatar  Identity-avatar u-linkBlend\" data-scribe=\"element:user_link\" href=\"https://twitter.com/abcsydney\" aria-label=\"ABC Sydney (screen name: abcsydney)\" style=\"color: inherit; text-decoration: inherit; -webkit-box-flex: 0; flex: 0 0 auto; height: 36px; margin-right: 9px; outline: 0px; font-weight: inherit;\"><img class=\"Avatar\" data-scribe=\"element:avatar\" data-src-2x=\"https://pbs.twimg.com/profile_images/875585932153438209/hrhYINYP_bigger.jpg\" alt=\"\" data-src-1x=\"https://pbs.twimg.com/profile_images/875585932153438209/hrhYINYP_normal.jpg\" src=\"https://pbs.twimg.com/profile_images/875585932153438209/hrhYINYP_normal.jpg\" style=\"border: 0px; max-width: 100%; max-height: 100%; border-radius: 50%;\"></a><div class=\"TweetAuthor js-inViewportScribingTarget\" data-scribe=\"component:author\" style=\"display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; overflow: hidden; width: min-content;\"><a class=\"TweetAuthor-link Identity u-linkBlend\" data-scribe=\"element:user_link\" href=\"https://twitter.com/abcsydney\" aria-label=\"ABC Sydney (screen name: abcsydney)\" style=\"color: inherit; text-decoration: inherit; display: flex; -webkit-box-align: start; align-items: flex-start; outline: 0px; font-weight: inherit;\"><div class=\"TweetAuthor-nameScreenNameContainer\" style=\"display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; line-height: 1.2; -webkit-box-align: start; align-items: flex-start; min-width: 0px;\"><span class=\"TweetAuthor-decoratedName\" style=\"display: flex; -webkit-box-align: center; align-items: center; min-width: 0px;\"><span class=\"TweetAuthor-name Identity-name customisable-highlight\" title=\"ABC Sydney\" data-scribe=\"element:name\" style=\"font-weight: 700; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; padding-right: 4px;\">ABC Sydney</span><span class=\"TweetAuthor-verifiedBadge\" data-scribe=\"element:verified_badge\" style=\"position: static; -webkit-box-flex: 0; flex: 0 0 auto; padding-right: 4px;\"><div class=\"Icon Icon--verified \" aria-label=\"Verified Account\" title=\"Verified Account\" role=\"img\" style=\"display: inline-block; height: 1.25em; background-repeat: no-repeat; background-size: contain; vertical-align: text-bottom; width: 1.11111em; background-image: url(&quot;data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2072%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h64v72H0z%22%2F%3E%3Cpath%20fill%3D%22%231da1f2%22%20d%3D%22M3%2037.315c0%204.125%202.162%207.726%205.363%209.624-.056.467-.09.937-.09%201.42%200%206.103%204.72%2011.045%2010.546%2011.045%201.295%200%202.542-.234%203.687-.686C24.22%2062.4%2027.827%2064.93%2032%2064.93c4.174%200%207.782-2.53%209.49-6.213%201.148.45%202.39.685%203.69.685%205.826%200%2010.546-4.94%2010.546-11.045%200-.483-.037-.953-.093-1.42C58.83%2045.04%2061%2041.44%2061%2037.314c0-4.37-2.42-8.15-5.933-9.946.427-1.203.658-2.5.658-3.865%200-6.104-4.72-11.045-10.545-11.045-1.302%200-2.543.232-3.69.688-1.707-3.685-5.315-6.216-9.49-6.216-4.173%200-7.778%202.53-9.492%206.216-1.146-.455-2.393-.688-3.688-.688-5.827%200-10.545%204.94-10.545%2011.045%200%201.364.23%202.662.656%203.864C5.42%2029.163%203%2032.944%203%2037.314z%22%2F%3E%3Cpath%20fill%3D%22%23FFF%22%20d%3D%22M17.87%2039.08l7.015%206.978c.585.582%201.35.873%202.116.873.77%200%201.542-.294%202.127-.883.344-.346%2015.98-15.974%2015.98-15.974%201.172-1.172%201.172-3.07%200-4.243-1.17-1.17-3.07-1.172-4.242%200l-13.87%2013.863-4.892-4.868c-1.174-1.168-3.074-1.164-4.242.01-1.168%201.176-1.163%203.075.01%204.244z%22%2F%3E%3C%2Fsvg%3E&quot;);\"></div><span class=\"u-hiddenVisually\" style=\"position: absolute !important; overflow: hidden !important; width: 1px !important; height: 1px !important; padding: 0px !important; border: 0px !important; clip: rect(1px, 1px, 1px, 1px) !important;\">✔</span></span></span><span class=\"TweetAuthor-screenName Identity-screenName\" title=\"@abcsydney\" data-scribe=\"element:screen_name\" dir=\"ltr\" style=\"color: rgb(105, 120, 130); font-size: 14px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; flex-shrink: 1;\">@abcsydney</span></div></a></div><div class=\"Tweet-brand\" style=\"margin-left: auto;\"><a href=\"https://twitter.com/abcsydney/status/638909482697777152\" data-scribe=\"element:logo\" style=\"color: rgb(43, 123, 185); outline: 0px;\"><div class=\"Icon Icon--twitter \" aria-label=\"View on Twitter\" title=\"View on Twitter\" role=\"presentation\" style=\"display: inline-block; height: 1.25em; background-repeat: no-repeat; background-size: contain; vertical-align: text-bottom; width: 1.25em; background-image: url(&quot;data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2072%2072%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h72v72H0z%22%2F%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%231da1f2%22%20d%3D%22M68.812%2015.14c-2.348%201.04-4.87%201.744-7.52%202.06%202.704-1.62%204.78-4.186%205.757-7.243-2.53%201.5-5.33%202.592-8.314%203.176C56.35%2010.59%2052.948%209%2049.182%209c-7.23%200-13.092%205.86-13.092%2013.093%200%201.026.118%202.02.338%202.98C25.543%2024.527%2015.9%2019.318%209.44%2011.396c-1.125%201.936-1.77%204.184-1.77%206.58%200%204.543%202.312%208.552%205.824%2010.9-2.146-.07-4.165-.658-5.93-1.64-.002.056-.002.11-.002.163%200%206.345%204.513%2011.638%2010.504%2012.84-1.1.298-2.256.457-3.45.457-.845%200-1.666-.078-2.464-.23%201.667%205.2%206.5%208.985%2012.23%209.09-4.482%203.51-10.13%205.605-16.26%205.605-1.055%200-2.096-.06-3.122-.184%205.794%203.717%2012.676%205.882%2020.067%205.882%2024.083%200%2037.25-19.95%2037.25-37.25%200-.565-.013-1.133-.038-1.693%202.558-1.847%204.778-4.15%206.532-6.774z%22%2F%3E%3C%2Fsvg%3E&quot;);\"></div></a></div></div><div class=\"Tweet-body e-entry-content\" data-scribe=\"component:tweet\" style=\"margin-top: 13px;\"><div class=\"Tweet-target js-inViewportScribingTarget\" style=\"height: 1px; width: 1px;\"></div><p class=\"Tweet-text e-entry-title\" lang=\"en\" dir=\"ltr\" style=\"margin-bottom: 0px; padding: 0px; list-style: none; border: none; white-space: pre-wrap; cursor: text; overflow-wrap: break-word; direction: ltr;\">Confirmed. This is the new logo and phrase  for <a href=\"https://twitter.com/hashtag/NSW?src=hash\" data-query-source=\"hashtag_click\" class=\"PrettyLink hashtag customisable\" dir=\"ltr\" rel=\"tag\" data-scribe=\"element:hashtag\" style=\"color: rgb(43, 123, 185); outline: 0px;\"><span class=\"PrettyLink-prefix\">#</span><span class=\"PrettyLink-value\">NSW</span></a> getting its first outing. What do you think of it? </p><div class=\"Tweet-card\" style=\"margin-top: 10.4px; font-size: 14px;\"><article class=\"MediaCard\r\n           \r\n           customisable-border\" data-scribe=\"component:card\" dir=\"ltr\"><div class=\"MediaCard-media\" data-scribe=\"element:photo\" style=\"position: relative; width: 458px; overflow: hidden;\"><div class=\"MediaCard-widthConstraint js-cspForcedStyle\" data-style=\"max-width: 1024px\" style=\"max-width: 1024px;\"><div class=\"MediaCard-mediaContainer js-cspForcedStyle MediaCard--roundedTop MediaCard--roundedBottom\" data-style=\"padding-bottom: 75.0000%\" style=\"position: relative; padding-bottom: 343.5px; background-color: rgb(245, 248, 250); overflow: hidden; border-radius: 4px;\"><a href=\"https://twitter.com/702sydney/status/638909482697777152/photo/1\" class=\"MediaCard-mediaAsset NaturalImage\" style=\"background-color: rgb(255, 255, 255); color: rgb(43, 123, 185); position: absolute; display: block; top: 0px; left: 0px; width: 458px; height: 343.5px; line-height: 0; transition: opacity 0.5s ease 0s; outline: 0px;\"><img class=\"NaturalImage-image\" data-image=\"https://pbs.twimg.com/media/CN3cxSlUAAERxq1\" data-image-format=\"jpg\" width=\"1024\" height=\"768\" title=\"View image on Twitter\" alt=\"View image on Twitter\" src=\"https://pbs.twimg.com/media/CN3cxSlUAAERxq1?format=jpg&amp;name=small\" style=\"border: 0px; max-width: 100%; line-height: 0; height: auto;\"></a></div></div></div></article></div><div class=\"TweetInfo\" style=\"display: flex; margin-top: 10.4px; font-size: 14px;\"><div class=\"TweetInfo-like\"><a class=\"TweetInfo-heart\" title=\"Like\" href=\"https://twitter.com/intent/like?tweet_id=638909482697777152\" data-scribe=\"component:actions\" style=\"color: rgb(43, 123, 185); display: flex; outline: 0px;\"><div data-scribe=\"element:heart\"><div class=\"Icon Icon--heart \" aria-label=\"Like\" title=\"Like\" role=\"img\" style=\"display: inline-block; height: 1.25em; background-repeat: no-repeat; background-size: contain; vertical-align: text-bottom; width: 1.25em; background-image: url(&quot;data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%23697882%22%20d%3D%22M12%2021.638h-.014C9.403%2021.59%201.95%2014.856%201.95%208.478c0-3.064%202.525-5.754%205.403-5.754%202.29%200%203.83%201.58%204.646%202.73.813-1.148%202.353-2.73%204.644-2.73%202.88%200%205.404%202.69%205.404%205.755%200%206.375-7.454%2013.11-10.037%2013.156H12zM7.354%204.225c-2.08%200-3.903%201.988-3.903%204.255%200%205.74%207.035%2011.596%208.55%2011.658%201.52-.062%208.55-5.917%208.55-11.658%200-2.267-1.822-4.255-3.902-4.255-2.528%200-3.94%202.936-3.952%202.965-.23.562-1.156.562-1.387%200-.015-.03-1.426-2.965-3.955-2.965z%22%2F%3E%3C%2Fsvg%3E&quot;);\"></div></div><span class=\"TweetInfo-heartStat\" data-scribe=\"element:heart_count\" style=\"margin-left: 3px;\">1</span></a></div><div class=\"TweetInfo-timeGeo\" style=\"margin-left: 12px; color: rgb(105, 120, 130); -webkit-box-flex: 1; flex: 1 1 0%;\"><a class=\"u-linkBlend u-url customisable-highlight long-permalink\" data-datetime=\"2015-09-02T03:01:05+0000\" data-scribe=\"element:full_timestamp\" href=\"https://twitter.com/abcsydney/status/638909482697777152\" style=\"color: inherit; text-decoration: inherit; outline: 0px; font-weight: inherit;\">10:01 AM - Sep 2, 2015</a></div><div class=\"tweet-InformationCircle\" data-scribe=\"element:notice\"><a href=\"https://support.twitter.com/articles/20175256\" class=\"Icon Icon--informationCircleWhite js-inViewportScribingTarget\" title=\"Twitter Ads info and privacy\" style=\"color: rgb(43, 123, 185); display: inline-block; height: 18px; background-repeat: no-repeat; background-size: contain; vertical-align: text-bottom; width: 18px; background-image: url(&quot;data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%23697882%22%20d%3D%22M12%2018.042c-.553%200-1-.447-1-1v-5.5c0-.553.447-1%201-1s1%20.447%201%201v5.5c0%20.553-.447%201-1%201z%22%2F%3E%3Ccircle%20class%3D%22icon%22%20fill%3D%22%23697882%22%20cx%3D%2212%22%20cy%3D%228.042%22%20r%3D%221.25%22%2F%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%23697882%22%20d%3D%22M12%2022.75C6.072%2022.75%201.25%2017.928%201.25%2012S6.072%201.25%2012%201.25%2022.75%206.072%2022.75%2012%2017.928%2022.75%2012%2022.75zm0-20C6.9%202.75%202.75%206.9%202.75%2012S6.9%2021.25%2012%2021.25s9.25-4.15%209.25-9.25S17.1%202.75%2012%202.75z%22%2F%3E%3C%2Fsvg%3E&quot;); outline: 0px;\"><span class=\"u-hiddenVisually\" style=\"position: absolute !important; overflow: hidden !important; width: 1px !important; height: 1px !important; padding: 0px !important; border: 0px !important; clip: rect(1px, 1px, 1px, 1px) !important;\">Twitter Ads info and privacy</span></a></div></div></div></blockquote></div><a class=\"CallToAction\" title=\"View ABC Sydney\'s profile on Twitter\" href=\"https://twitter.com/abcsydney\" data-scribe=\"section:cta component:news\" style=\"color: rgb(43, 123, 185); display: flex; -webkit-box-align: center; align-items: center; border-color: rgb(225, 232, 237); border-style: solid; border-radius: 0px 0px 4px 4px; border-width: 1px 0px 0px; padding: 9px 20px; font-size: 14px; outline: 0px;\"><div class=\"CallToAction-icon\" data-scribe=\"element:profile_icon\" style=\"display: inline;\"><div class=\"Icon Icon--profileCTA \" aria-label=\"View profile on Twitter\" title=\"View profile on Twitter\" role=\"img\" style=\"height: 1.25em; background-repeat: no-repeat; background-size: contain; vertical-align: text-bottom; width: 1.25em; background-image: url(&quot;data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%232b7bb9%22%20d%3D%22M12%2011.816c1.355%200%202.872-.15%203.84-1.256.814-.93%201.078-2.368.806-4.392-.38-2.825-2.117-4.512-4.646-4.512S7.734%203.343%207.354%206.17c-.272%202.022-.008%203.46.806%204.39.968%201.107%202.485%201.256%203.84%201.256zM8.84%206.368c.162-1.2.787-3.212%203.16-3.212s2.998%202.013%203.16%203.212c.207%201.55.057%202.627-.45%203.205-.455.52-1.266.743-2.71.743s-2.255-.223-2.71-.743c-.507-.578-.657-1.656-.45-3.205zm11.44%2012.868c-.877-3.526-4.282-5.99-8.28-5.99s-7.403%202.464-8.28%205.99c-.172.692-.028%201.4.395%201.94.408.52%201.04.82%201.733.82h12.304c.693%200%201.325-.3%201.733-.82.424-.54.567-1.247.394-1.94zm-1.576%201.016c-.126.16-.316.246-.552.246H5.848c-.235%200-.426-.085-.552-.246-.137-.174-.18-.412-.12-.654.71-2.855%203.517-4.85%206.824-4.85s6.114%201.994%206.824%204.85c.06.242.017.48-.12.654z%22%2F%3E%3C%2Fsvg%3E&quot;);\"></div></div><div class=\"CallToAction-text\" data-scribe=\"element:profile_text\" style=\"margin-left: 4px;\">See ABC Sydney\'s other Tweets</div><div class=\"CallToAction-chevron\" data-scribe=\"element:cta_chevron\" style=\"margin-left: auto; display: inline;\"><div class=\"Icon Icon--chevronRightCTA \" aria-label=\"View on Twitter\" title=\"View on Twitter\" role=\"img\" style=\"height: 1.25em; background-repeat: no-repeat; background-size: contain; vertical-align: text-bottom; width: 1.25em; background-image: url(&quot;data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%23697882%22%20d%3D%22M17.207%2011.293l-7.5-7.5c-.39-.39-1.023-.39-1.414%200s-.39%201.023%200%201.414L15.086%2012l-6.793%206.793c-.39.39-.39%201.023%200%201.414.195.195.45.293.707.293s.512-.098.707-.293l7.5-7.5c.39-.39.39-1.023%200-1.414z%22%2F%3E%3C%2Fsvg%3E&quot;); transform: scaleX(1);\"></div></div></a></div></div><div class=\"resize-sensor\" style=\"position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;\"><div class=\"resize-sensor-expand\" style=\"position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;\"><div style=\"position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 510px; height: 559px;\"></div></div><div class=\"resize-sensor-shrink\" style=\"position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; z-index: -1; visibility: hidden;\"><div style=\"position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 1000px; height: 1098.56px;\"></div></div></div></div></twitter-widget></figure><p style=\"margin-bottom: 1rem; padding: 0px; color: rgb(18, 18, 18); font-family: &quot;Guardian Text Egyptian Web&quot;, Georgia, serif; font-size: 17px; font-variant-ligatures: common-ligatures;\">When it resurfaced on the social network a week later, the response was somewhat larger, but also rather less kind.</p>', '<p style=\"margin-bottom: 1rem; padding: 0px;\"><font color=\"#121212\" face=\"Guardian Text Egyptian Web, Georgia, serif\"><span style=\"font-size: 17px; font-variant-ligatures: common-ligatures;\">Nhưng ít nhất mọi người nhận thấy Victoria có logo mới.</span></font></p><p style=\"margin-bottom: 1rem; padding: 0px;\"><font color=\"#121212\" face=\"Guardian Text Egyptian Web, Georgia, serif\"><span style=\"font-size: 17px; font-variant-ligatures: common-ligatures;\"><br></span></font></p><p style=\"margin-bottom: 1rem; padding: 0px;\"><font color=\"#121212\" face=\"Guardian Text Egyptian Web, Georgia, serif\"><span style=\"font-size: 17px; font-variant-ligatures: common-ligatures;\">Có lẽ cảnh giác với dư luận tiêu cực tương tự, New South Wales dường như đã thay đổi thương hiệu công ty của mình mà không có sự phô trương nào cả.</span></font></p><p style=\"margin-bottom: 1rem; padding: 0px;\"><font color=\"#121212\" face=\"Guardian Text Egyptian Web, Georgia, serif\"><span style=\"font-size: 17px; font-variant-ligatures: common-ligatures;\"><br></span></font></p><p style=\"margin-bottom: 1rem; padding: 0px;\"><font color=\"#121212\" face=\"Guardian Text Egyptian Web, Georgia, serif\"><span style=\"font-size: 17px; font-variant-ligatures: common-ligatures;\">Trên thực tế, logo và slogan mới dường như đã được đặt ra ít nhất một tuần. Đó là ít nhất một tuần trong đó Baird đã cố gắng tránh một câu trả lời dí dỏm từ thủ tướng Victoria Victoria, Daniel Andrew.</span></font></p><p style=\"margin-bottom: 1rem; padding: 0px;\"><font color=\"#121212\" face=\"Guardian Text Egyptian Web, Georgia, serif\"><span style=\"font-size: 17px; font-variant-ligatures: common-ligatures;\"><br></span></font></p><p style=\"margin-bottom: 1rem; padding: 0px;\"><font color=\"#121212\" face=\"Guardian Text Egyptian Web, Georgia, serif\"><span style=\"font-size: 17px; font-variant-ligatures: common-ligatures;\">Báo cáo sớm nhất về việc nhìn thấy logo là tại một cuộc họp báo ở Martin Place vào ngày 2 tháng 9, nhưng bức ảnh của ABC Sydney, đã được đáp ứng với một phản hồi trực diện trên Twitter: chỉ một tin nhắn.</span></font></p><figure class=\"element element-tweet\" data-canonical-url=\"https://twitter.com/702sydney/statuses/638909482697777152\" style=\"margin-top: 1rem; margin-bottom: 0.75rem; position: relative; color: rgb(18, 18, 18); font-family: &quot;Guardian Text Egyptian Web&quot;, Georgia, serif; font-size: 17px; font-variant-ligatures: common-ligatures;\"><twitter-widget class=\"twitter-tweet twitter-tweet-rendered\" id=\"twitter-widget-1\" data-tweet-id=\"638909482697777152\" style=\"width: 500px; position: static; visibility: visible; display: block; transform: rotate(0deg); max-width: 100%; min-width: 220px; margin-top: 10px; margin-bottom: 10px;\"><div data-twitter-event-id=\"1\" class=\"SandboxRoot env-bp-350\" style=\"max-height: 10000px; direction: ltr; background: 0px 0px; font-variant-ligatures: normal; font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 16px; line-height: 1.4; font-family: Helvetica, Roboto, &quot;Segoe UI&quot;, Calibri, sans-serif; color: rgb(28, 32, 34); white-space: initial; position: relative;\"><div class=\"EmbeddedTweet EmbeddedTweet--cta js-clickToOpenTarget\" data-click-to-open-target=\"https://twitter.com/abcsydney/status/638909482697777152\" data-iframe-title=\"Twitter Tweet\" data-scribe=\"page:tweet\" id=\"twitter-widget-1\" lang=\"en\" data-twitter-event-id=\"4\" style=\"overflow: hidden; cursor: pointer; border: 1px solid rgb(225, 232, 237); border-radius: 5px; max-width: 520px;\"><div class=\"EmbeddedTweet-tweetContainer\"><div class=\"EmbeddedTweet-tweet\" style=\"padding: 20px 20px 10px;\"><blockquote class=\"Tweet h-entry js-tweetIdInfo subject expanded\" cite=\"https://twitter.com/abcsydney/status/638909482697777152\" data-tweet-id=\"638909482697777152\" data-scribe=\"section:subject\" style=\"margin-bottom: 0px; padding: 0px; list-style: none; border: none;\"><div class=\"Tweet-header\" style=\"display: flex;\"><a class=\"TweetAuthor-avatar  Identity-avatar u-linkBlend\" data-scribe=\"element:user_link\" href=\"https://twitter.com/abcsydney\" aria-label=\"ABC Sydney (screen name: abcsydney)\" style=\"color: inherit; text-decoration: inherit; -webkit-box-flex: 0; flex: 0 0 auto; height: 36px; margin-right: 9px; outline: 0px; font-weight: inherit;\"><img class=\"Avatar\" data-scribe=\"element:avatar\" data-src-2x=\"https://pbs.twimg.com/profile_images/875585932153438209/hrhYINYP_bigger.jpg\" alt=\"\" data-src-1x=\"https://pbs.twimg.com/profile_images/875585932153438209/hrhYINYP_normal.jpg\" src=\"https://pbs.twimg.com/profile_images/875585932153438209/hrhYINYP_normal.jpg\" style=\"border: 0px; max-width: 100%; max-height: 100%; border-radius: 50%;\"></a><div class=\"TweetAuthor js-inViewportScribingTarget\" data-scribe=\"component:author\" style=\"display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; overflow: hidden; width: min-content;\"><a class=\"TweetAuthor-link Identity u-linkBlend\" data-scribe=\"element:user_link\" href=\"https://twitter.com/abcsydney\" aria-label=\"ABC Sydney (screen name: abcsydney)\" style=\"color: inherit; text-decoration: inherit; display: flex; -webkit-box-align: start; align-items: flex-start; outline: 0px; font-weight: inherit;\"><div class=\"TweetAuthor-nameScreenNameContainer\" style=\"display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; line-height: 1.2; -webkit-box-align: start; align-items: flex-start; min-width: 0px;\"><span class=\"TweetAuthor-decoratedName\" style=\"display: flex; -webkit-box-align: center; align-items: center; min-width: 0px;\"><span class=\"TweetAuthor-name Identity-name customisable-highlight\" title=\"ABC Sydney\" data-scribe=\"element:name\" style=\"font-weight: 700; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; padding-right: 4px;\">ABC Sydney</span><span class=\"TweetAuthor-verifiedBadge\" data-scribe=\"element:verified_badge\" style=\"position: static; -webkit-box-flex: 0; flex: 0 0 auto; padding-right: 4px;\"><div class=\"Icon Icon--verified \" aria-label=\"Verified Account\" title=\"Verified Account\" role=\"img\" style=\"display: inline-block; height: 1.25em; background-repeat: no-repeat; background-size: contain; vertical-align: text-bottom; width: 1.11111em; background-image: url(&quot;data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2072%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h64v72H0z%22%2F%3E%3Cpath%20fill%3D%22%231da1f2%22%20d%3D%22M3%2037.315c0%204.125%202.162%207.726%205.363%209.624-.056.467-.09.937-.09%201.42%200%206.103%204.72%2011.045%2010.546%2011.045%201.295%200%202.542-.234%203.687-.686C24.22%2062.4%2027.827%2064.93%2032%2064.93c4.174%200%207.782-2.53%209.49-6.213%201.148.45%202.39.685%203.69.685%205.826%200%2010.546-4.94%2010.546-11.045%200-.483-.037-.953-.093-1.42C58.83%2045.04%2061%2041.44%2061%2037.314c0-4.37-2.42-8.15-5.933-9.946.427-1.203.658-2.5.658-3.865%200-6.104-4.72-11.045-10.545-11.045-1.302%200-2.543.232-3.69.688-1.707-3.685-5.315-6.216-9.49-6.216-4.173%200-7.778%202.53-9.492%206.216-1.146-.455-2.393-.688-3.688-.688-5.827%200-10.545%204.94-10.545%2011.045%200%201.364.23%202.662.656%203.864C5.42%2029.163%203%2032.944%203%2037.314z%22%2F%3E%3Cpath%20fill%3D%22%23FFF%22%20d%3D%22M17.87%2039.08l7.015%206.978c.585.582%201.35.873%202.116.873.77%200%201.542-.294%202.127-.883.344-.346%2015.98-15.974%2015.98-15.974%201.172-1.172%201.172-3.07%200-4.243-1.17-1.17-3.07-1.172-4.242%200l-13.87%2013.863-4.892-4.868c-1.174-1.168-3.074-1.164-4.242.01-1.168%201.176-1.163%203.075.01%204.244z%22%2F%3E%3C%2Fsvg%3E&quot;);\"></div><span class=\"u-hiddenVisually\" style=\"position: absolute !important; overflow: hidden !important; width: 1px !important; height: 1px !important; padding: 0px !important; border: 0px !important; clip: rect(1px, 1px, 1px, 1px) !important;\">✔</span></span></span><span class=\"TweetAuthor-screenName Identity-screenName\" title=\"@abcsydney\" data-scribe=\"element:screen_name\" dir=\"ltr\" style=\"color: rgb(105, 120, 130); font-size: 14px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; flex-shrink: 1;\">@abcsydney</span></div></a></div><div class=\"Tweet-brand\" style=\"margin-left: auto;\"><a href=\"https://twitter.com/abcsydney/status/638909482697777152\" data-scribe=\"element:logo\" style=\"color: rgb(43, 123, 185); outline: 0px;\"><div class=\"Icon Icon--twitter \" aria-label=\"View on Twitter\" title=\"View on Twitter\" role=\"presentation\" style=\"display: inline-block; height: 1.25em; background-repeat: no-repeat; background-size: contain; vertical-align: text-bottom; width: 1.25em; background-image: url(&quot;data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2072%2072%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h72v72H0z%22%2F%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%231da1f2%22%20d%3D%22M68.812%2015.14c-2.348%201.04-4.87%201.744-7.52%202.06%202.704-1.62%204.78-4.186%205.757-7.243-2.53%201.5-5.33%202.592-8.314%203.176C56.35%2010.59%2052.948%209%2049.182%209c-7.23%200-13.092%205.86-13.092%2013.093%200%201.026.118%202.02.338%202.98C25.543%2024.527%2015.9%2019.318%209.44%2011.396c-1.125%201.936-1.77%204.184-1.77%206.58%200%204.543%202.312%208.552%205.824%2010.9-2.146-.07-4.165-.658-5.93-1.64-.002.056-.002.11-.002.163%200%206.345%204.513%2011.638%2010.504%2012.84-1.1.298-2.256.457-3.45.457-.845%200-1.666-.078-2.464-.23%201.667%205.2%206.5%208.985%2012.23%209.09-4.482%203.51-10.13%205.605-16.26%205.605-1.055%200-2.096-.06-3.122-.184%205.794%203.717%2012.676%205.882%2020.067%205.882%2024.083%200%2037.25-19.95%2037.25-37.25%200-.565-.013-1.133-.038-1.693%202.558-1.847%204.778-4.15%206.532-6.774z%22%2F%3E%3C%2Fsvg%3E&quot;);\"></div></a></div></div><div class=\"Tweet-body e-entry-content\" data-scribe=\"component:tweet\" style=\"margin-top: 13px;\"><div class=\"Tweet-target js-inViewportScribingTarget\" style=\"height: 1px; width: 1px;\"></div><p class=\"Tweet-text e-entry-title\" lang=\"en\" dir=\"ltr\" style=\"margin-bottom: 0px; padding: 0px; list-style: none; border: none; white-space: pre-wrap; cursor: text; overflow-wrap: break-word; direction: ltr;\">Confirmed. This is the new logo and phrase  for <a href=\"https://twitter.com/hashtag/NSW?src=hash\" data-query-source=\"hashtag_click\" class=\"PrettyLink hashtag customisable\" dir=\"ltr\" rel=\"tag\" data-scribe=\"element:hashtag\" style=\"color: rgb(43, 123, 185); outline: 0px;\"><span class=\"PrettyLink-prefix\">#</span><span class=\"PrettyLink-value\">NSW</span></a> getting its first outing. What do you think of it? </p><div class=\"Tweet-card\" style=\"margin-top: 10.4px; font-size: 14px;\"><article class=\"MediaCard\r\n           \r\n           customisable-border\" data-scribe=\"component:card\" dir=\"ltr\"><div class=\"MediaCard-media\" data-scribe=\"element:photo\" style=\"position: relative; width: 458px; overflow: hidden;\"><div class=\"MediaCard-widthConstraint js-cspForcedStyle\" data-style=\"max-width: 1024px\" style=\"max-width: 1024px;\"><div class=\"MediaCard-mediaContainer js-cspForcedStyle MediaCard--roundedTop MediaCard--roundedBottom\" data-style=\"padding-bottom: 75.0000%\" style=\"position: relative; padding-bottom: 343.5px; background-color: rgb(245, 248, 250); overflow: hidden; border-radius: 4px;\"><a href=\"https://twitter.com/702sydney/status/638909482697777152/photo/1\" class=\"MediaCard-mediaAsset NaturalImage\" style=\"background-color: rgb(255, 255, 255); color: rgb(43, 123, 185); position: absolute; display: block; top: 0px; left: 0px; width: 458px; height: 343.5px; line-height: 0; transition: opacity 0.5s ease 0s; outline: 0px;\"><img class=\"NaturalImage-image\" data-image=\"https://pbs.twimg.com/media/CN3cxSlUAAERxq1\" data-image-format=\"jpg\" width=\"1024\" height=\"768\" title=\"View image on Twitter\" alt=\"View image on Twitter\" src=\"https://pbs.twimg.com/media/CN3cxSlUAAERxq1?format=jpg&amp;name=small\" style=\"border: 0px; max-width: 100%; line-height: 0; height: auto;\"></a></div></div></div></article></div><div class=\"TweetInfo\" style=\"display: flex; margin-top: 10.4px; font-size: 14px;\"><div class=\"TweetInfo-like\"><a class=\"TweetInfo-heart\" title=\"Like\" href=\"https://twitter.com/intent/like?tweet_id=638909482697777152\" data-scribe=\"component:actions\" style=\"color: rgb(43, 123, 185); display: flex; outline: 0px;\"><div data-scribe=\"element:heart\"><div class=\"Icon Icon--heart \" aria-label=\"Like\" title=\"Like\" role=\"img\" style=\"display: inline-block; height: 1.25em; background-repeat: no-repeat; background-size: contain; vertical-align: text-bottom; width: 1.25em; background-image: url(&quot;data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%23697882%22%20d%3D%22M12%2021.638h-.014C9.403%2021.59%201.95%2014.856%201.95%208.478c0-3.064%202.525-5.754%205.403-5.754%202.29%200%203.83%201.58%204.646%202.73.813-1.148%202.353-2.73%204.644-2.73%202.88%200%205.404%202.69%205.404%205.755%200%206.375-7.454%2013.11-10.037%2013.156H12zM7.354%204.225c-2.08%200-3.903%201.988-3.903%204.255%200%205.74%207.035%2011.596%208.55%2011.658%201.52-.062%208.55-5.917%208.55-11.658%200-2.267-1.822-4.255-3.902-4.255-2.528%200-3.94%202.936-3.952%202.965-.23.562-1.156.562-1.387%200-.015-.03-1.426-2.965-3.955-2.965z%22%2F%3E%3C%2Fsvg%3E&quot;);\"></div></div><span class=\"TweetInfo-heartStat\" data-scribe=\"element:heart_count\" style=\"margin-left: 3px;\">1</span></a></div><div class=\"TweetInfo-timeGeo\" style=\"margin-left: 12px; color: rgb(105, 120, 130); -webkit-box-flex: 1; flex: 1 1 0%;\"><a class=\"u-linkBlend u-url customisable-highlight long-permalink\" data-datetime=\"2015-09-02T03:01:05+0000\" data-scribe=\"element:full_timestamp\" href=\"https://twitter.com/abcsydney/status/638909482697777152\" style=\"color: inherit; text-decoration: inherit; outline: 0px; font-weight: inherit;\">10:01 AM - Sep 2, 2015</a></div><div class=\"tweet-InformationCircle\" data-scribe=\"element:notice\"><a href=\"https://support.twitter.com/articles/20175256\" class=\"Icon Icon--informationCircleWhite js-inViewportScribingTarget\" title=\"Twitter Ads info and privacy\" style=\"color: rgb(43, 123, 185); display: inline-block; height: 18px; background-repeat: no-repeat; background-size: contain; vertical-align: text-bottom; width: 18px; background-image: url(&quot;data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%23697882%22%20d%3D%22M12%2018.042c-.553%200-1-.447-1-1v-5.5c0-.553.447-1%201-1s1%20.447%201%201v5.5c0%20.553-.447%201-1%201z%22%2F%3E%3Ccircle%20class%3D%22icon%22%20fill%3D%22%23697882%22%20cx%3D%2212%22%20cy%3D%228.042%22%20r%3D%221.25%22%2F%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%23697882%22%20d%3D%22M12%2022.75C6.072%2022.75%201.25%2017.928%201.25%2012S6.072%201.25%2012%201.25%2022.75%206.072%2022.75%2012%2017.928%2022.75%2012%2022.75zm0-20C6.9%202.75%202.75%206.9%202.75%2012S6.9%2021.25%2012%2021.25s9.25-4.15%209.25-9.25S17.1%202.75%2012%202.75z%22%2F%3E%3C%2Fsvg%3E&quot;); outline: 0px;\"><span class=\"u-hiddenVisually\" style=\"position: absolute !important; overflow: hidden !important; width: 1px !important; height: 1px !important; padding: 0px !important; border: 0px !important; clip: rect(1px, 1px, 1px, 1px) !important;\">Twitter Ads info and privacy</span></a></div></div></div></blockquote></div><a class=\"CallToAction\" title=\"View ABC Sydney\'s profile on Twitter\" href=\"https://twitter.com/abcsydney\" data-scribe=\"section:cta component:news\" style=\"color: rgb(43, 123, 185); display: flex; -webkit-box-align: center; align-items: center; border-color: rgb(225, 232, 237); border-style: solid; border-radius: 0px 0px 4px 4px; border-width: 1px 0px 0px; padding: 9px 20px; font-size: 14px; outline: 0px;\"><div class=\"CallToAction-icon\" data-scribe=\"element:profile_icon\" style=\"display: inline;\"><div class=\"Icon Icon--profileCTA \" aria-label=\"View profile on Twitter\" title=\"View profile on Twitter\" role=\"img\" style=\"height: 1.25em; background-repeat: no-repeat; background-size: contain; vertical-align: text-bottom; width: 1.25em; background-image: url(&quot;data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%232b7bb9%22%20d%3D%22M12%2011.816c1.355%200%202.872-.15%203.84-1.256.814-.93%201.078-2.368.806-4.392-.38-2.825-2.117-4.512-4.646-4.512S7.734%203.343%207.354%206.17c-.272%202.022-.008%203.46.806%204.39.968%201.107%202.485%201.256%203.84%201.256zM8.84%206.368c.162-1.2.787-3.212%203.16-3.212s2.998%202.013%203.16%203.212c.207%201.55.057%202.627-.45%203.205-.455.52-1.266.743-2.71.743s-2.255-.223-2.71-.743c-.507-.578-.657-1.656-.45-3.205zm11.44%2012.868c-.877-3.526-4.282-5.99-8.28-5.99s-7.403%202.464-8.28%205.99c-.172.692-.028%201.4.395%201.94.408.52%201.04.82%201.733.82h12.304c.693%200%201.325-.3%201.733-.82.424-.54.567-1.247.394-1.94zm-1.576%201.016c-.126.16-.316.246-.552.246H5.848c-.235%200-.426-.085-.552-.246-.137-.174-.18-.412-.12-.654.71-2.855%203.517-4.85%206.824-4.85s6.114%201.994%206.824%204.85c.06.242.017.48-.12.654z%22%2F%3E%3C%2Fsvg%3E&quot;);\"></div></div><div class=\"CallToAction-text\" data-scribe=\"element:profile_text\" style=\"margin-left: 4px;\">See ABC Sydney\'s other Tweets</div><div class=\"CallToAction-chevron\" data-scribe=\"element:cta_chevron\" style=\"margin-left: auto; display: inline;\"><div class=\"Icon Icon--chevronRightCTA \" aria-label=\"View on Twitter\" title=\"View on Twitter\" role=\"img\" style=\"height: 1.25em; background-repeat: no-repeat; background-size: contain; vertical-align: text-bottom; width: 1.25em; background-image: url(&quot;data:image/svg+xml;charset=utf-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20class%3D%22icon%22%20fill%3D%22%23697882%22%20d%3D%22M17.207%2011.293l-7.5-7.5c-.39-.39-1.023-.39-1.414%200s-.39%201.023%200%201.414L15.086%2012l-6.793%206.793c-.39.39-.39%201.023%200%201.414.195.195.45.293.707.293s.512-.098.707-.293l7.5-7.5c.39-.39.39-1.023%200-1.414z%22%2F%3E%3C%2Fsvg%3E&quot;); transform: scaleX(1);\"><br></div></div></a></div></div></div></twitter-widget></figure><p style=\"margin-bottom: 1rem; padding: 0px;\"><font color=\"#121212\" face=\"Guardian Text Egyptian Web, Georgia, serif\"><span style=\"font-size: 17px; font-variant-ligatures: common-ligatures;\">10:01 - ngày 2 tháng 9 năm 2015</span></font></p><p style=\"margin-bottom: 1rem; padding: 0px;\"><font color=\"#121212\" face=\"Guardian Text Egyptian Web, Georgia, serif\"><span style=\"font-size: 17px; font-variant-ligatures: common-ligatures;\">Thông tin và quyền riêng tư của Quảng cáo Twitter</span></font></p><p style=\"margin-bottom: 1rem; padding: 0px;\"><font color=\"#121212\" face=\"Guardian Text Egyptian Web, Georgia, serif\"><span style=\"font-size: 17px; font-variant-ligatures: common-ligatures;\">Xem các Tweet khác của ABC Sydney</span></font></p><p style=\"margin-bottom: 1rem; padding: 0px;\"><font color=\"#121212\" face=\"Guardian Text Egyptian Web, Georgia, serif\"><span style=\"font-size: 17px; font-variant-ligatures: common-ligatures;\">Khi nó xuất hiện trở lại trên mạng xã hội một tuần sau đó, phản hồi có phần lớn hơn, nhưng cũng khá ít tử tế.</span></font></p>', '2020-05-08 17:01:39', '2020-05-08 17:01:39'),
(3, 4, 'Dr. Anthony Fauci joins list of government officials entering self-quarantine over COVID-19 exposure', 'Tiến sĩ Anthony Fauci tham gia danh sách các quan chức chính phủ tự kiểm dịch khi tiếp xúc với COVID-19', 'public/images/blog/1666278008525410.jpg', '<p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">Dr. Anthony Fauci, the director of the National Institute of Allergy and Infectious Diseases, will be entering a \"modified quarantine\" due to exposure to someone who tested positive for the novel coronavirus.</p><p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">Fauci joins a growing list of administration officials taking precautions following the news of two known coronavirus cases at the White House, including the vice president\'s press secretary.</p><div data-box-type=\"fitt-adbox-incontentTeads\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\"></div><p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">The head of the Centers for Disease Control and Prevention, Director Dr. Robert Redfield, announced Saturday afternoon he would be going into self-quarantine due to \"low risk exposure\" to someone with the&nbsp;<a href=\"http://www.abcnews.com/coronavirus\" target=\"_blank\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: 0px; font-size: 17px; line-height: 28px; color: rgb(0, 45, 108); cursor: pointer; border-top: none; border-right: none; border-bottom: 1px dotted rgb(0, 45, 108); border-left: none; border-image: initial; padding-bottom: 2px;\">novel coronavirus</a>.</p><p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">The NIAID said Fauci tested negative for COVID-19 and is considered to be \"at relatively low risk based on the degree of his exposure.\" Fauci\'s quarantine was described as \"modified\" and he might still go to his office at the National Institutes of Health, where he would be the only one in the building.</p><div style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\"><div class=\"CalloutLink\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding-left: 24px; margin: 24px 0px;\"><div class=\"CalloutLink-item\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); display: flex; -webkit-box-align: baseline; align-items: baseline;\"><span style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: inherit;\"><svg class=\"icon__svg\" viewBox=\"0 0 24 24\"><use xlink:href=\"#icon__plus\"></use></svg></span><a class=\"AnchorLink CalloutLink-text\" tabindex=\"0\" data-track-moduleofclick=\"Callout\" data-track-position=\"0\" data-track-ctatext=\"MORE-Government-coronavirus-response-updates-Trump-downplays-record-unemployment-numbers-says-all-jobs-back-very-soon\" href=\"https://abcnews.go.com/Politics/government-coronavirus-response-updates-trump-downplays-record-unemployment/story?id=70576050\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: 0px; color: rgb(0, 45, 108); cursor: pointer; font-size: 16px; line-height: 21px; border: none; padding-bottom: 2px;\">MORE: Government coronavirus response updates: Trump downplays record unemployment numbers, says \'all\' jobs back \'very soon\'</a></div></div></div><p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">\"Nevertheless he is taking appropriate precautions to mitigate risk to any of his personal contacts while still allowing him to carry out his responsibilities in this public health crisis,\" NIAID told ABC News.</p><p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">Fauci and Redfield will be entering self-quarantine less than a day after Food and Drug Administration Commissioner Dr. Stephen Hahn said he would be isolating himself for similar reasons.</p><p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">\"CDC Director Dr. Robert Redfield has been determined to have had a low risk exposure on May 6 to a person at the White House who has COVID-19,\" the CDC said in a statement. \"He is feeling fine, and has no symptoms. He will be teleworking for the next two weeks. In the event Dr. Redfield must go to the White House to fulfill any responsibilities as part of WHTF on COVID-19 he will be following CDC Safety Practices for Critical Infrastructure Workers Who May Have Had Exposure to a Person with Suspected or Confirmed COVID-19.\"</p><p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">\"Those guidelines call for Dr. Redfield and anyone working on the Task Force at the WH to have their temperature taken and screened for symptoms each day, wear a face covering, and distance themselves from others,\" the agency added.</p>', '<p>Bác sĩ Anthony Fauci, giám đốc của Viện Dị ứng và Bệnh Truyền nhiễm Quốc gia, sẽ tham gia \"kiểm dịch sửa đổi\" do tiếp xúc với người đã thử nghiệm dương tính với coronavirus mới.</p><p><br></p><p>Fauci tham gia một danh sách ngày càng tăng các quan chức chính quyền đang đề phòng sau tin tức về hai trường hợp coronavirus được biết đến tại Nhà Trắng, bao gồm cả thư ký báo chí của phó tổng thống.</p><p><br></p><p>Người đứng đầu Trung tâm kiểm soát và phòng ngừa dịch bệnh, Giám đốc Tiến sĩ Robert Redfield, tuyên bố chiều thứ Bảy, ông sẽ tự kiểm dịch do \"phơi nhiễm rủi ro thấp\" với người mắc bệnh coronavirus mới.</p><p><br></p><p>NIAID cho biết Fauci đã thử nghiệm âm tính với COVID-19 và được coi là \"có nguy cơ tương đối thấp dựa trên mức độ phơi nhiễm của anh ta\". Kiểm dịch của Fauci được mô tả là \"đã được sửa đổi\" và anh ta vẫn có thể đến văn phòng của mình tại Viện Y tế Quốc gia, nơi anh ta sẽ là người duy nhất trong tòa nhà.</p><p><br></p><p>XEM THÊM: Cập nhật phản ứng coronavirus của chính phủ: Trump hạ thấp số lượng thất nghiệp kỷ lục, nói rằng \'tất cả\' công việc trở lại \'rất sớm\'</p><p>\"Tuy nhiên, anh ta đang thực hiện các biện pháp phòng ngừa thích hợp để giảm thiểu rủi ro cho bất kỳ liên hệ cá nhân nào trong khi vẫn cho phép anh ta thực hiện trách nhiệm của mình trong cuộc khủng hoảng sức khỏe cộng đồng này\", NIAID nói với ABC News.</p><p><br></p><p>Fauci và Redfield sẽ tự kiểm dịch chưa đầy một ngày sau khi Ủy viên Cục Quản lý Thực phẩm và Dược phẩm, Tiến sĩ Stephen Hahn nói rằng ông sẽ tự cô lập mình vì những lý do tương tự.</p><p><br></p><p>\"Giám đốc CDC, Tiến sĩ Robert Redfield đã được xác định là có rủi ro thấp vào ngày 6 tháng 5 đối với một người tại Nhà Trắng có COVID-19,\" CDC nói trong một tuyên bố. \"Anh ấy cảm thấy ổn, và không có triệu chứng. Anh ấy sẽ làm việc từ xa trong hai tuần tới. Trong trường hợp, Tiến sĩ Redfield phải đến Nhà Trắng để thực hiện mọi trách nhiệm như một phần của WHTF trên COVID-19, anh ấy sẽ theo dõi CDC Thực hành an toàn cho công nhân cơ sở hạ tầng quan trọng, những người có thể đã tiếp xúc với người bị nghi ngờ hoặc xác nhận COVID-19. \"</p><p><br></p><p>\"Những hướng dẫn đó kêu gọi Tiến sĩ Redfield và bất cứ ai làm việc trong Lực lượng đặc nhiệm tại WH phải kiểm tra nhiệt độ và kiểm tra các triệu chứng mỗi ngày, che mặt và cách xa người khác\", cơ quan này cho biết thêm.</p>', '2020-05-09 21:55:40', '2020-05-09 21:55:40');
INSERT INTO `blogs` (`id`, `category_id`, `title_en`, `title_vi`, `image`, `details_en`, `details_vi`, `created_at`, `updated_at`) VALUES
(4, 1, 'Reopening the country seen as greater risk among most Americans: POLL', 'Mở lại đất nước được coi là rủi ro lớn hơn trong số hầu hết người Mỹ: POLL', 'public/images/blog/1666406686299425.jpg', '<p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">Americans, by a large 30-point margin, are resistant to re-opening the country now, believing the risk to human life of opening the country outweighs the economic toll of remaining under restrictive lockdowns -- a concern that starkly divides along partisan lines, according to a&nbsp;<a href=\"https://www.ipsos.com/en-us/news-polls/abc-news-coronavirus-poll\" target=\"_blank\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: 0px; font-size: 17px; line-height: 28px; color: rgb(0, 45, 108); cursor: pointer; border-top: none; border-right: none; border-bottom: 1px dotted rgb(0, 45, 108); border-left: none; border-image: initial; padding-bottom: 2px;\">new ABC News/Ipsos</a>&nbsp;released Friday.</p><p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">In the new poll, conducted by Ipsos in partnership with ABC News using Ipsos’ Knowledge Panel, nearly two-thirds of Americans said they more closely align with the view that opening the county now is not advantageous since it will result in a higher death toll, while slightly more than one-third agree with the belief that an immediate reopening is beneficial to minimize the negative impact on the economy.</p><div data-box-type=\"fitt-adbox-incontentTeads\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\"></div><p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">But those attitudes show deep partisan divisions, with only 6% of Democrats, compared to 65% of Republicans, siding with the viewpoint of opening the country now to salvage the economy.</p><div style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px;\"><div class=\"CalloutLink\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding-left: 24px; margin: 24px 0px;\"><div class=\"CalloutLink-item\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); display: flex; -webkit-box-align: baseline; align-items: baseline;\"><span style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: inherit;\"><svg class=\"icon__svg\" viewBox=\"0 0 24 24\"><use xlink:href=\"#icon__plus\"></use></svg></span><a class=\"AnchorLink CalloutLink-text\" tabindex=\"0\" data-track-moduleofclick=\"Callout\" data-track-position=\"0\" data-track-ctatext=\"MORE-Americans-uneasy-about-returning-to-normal-as-restrictions-loosen-POLL\" href=\"https://abcnews.go.com/Politics/americans-uneasy-returning-normal-restrictions-loosen-poll/story?id=70423858\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); outline: 0px; color: rgb(0, 45, 108); cursor: pointer; font-size: 16px; line-height: 21px; border: none; padding-bottom: 2px;\">MORE: Americans uneasy about returning to normal as restrictions loosen: POLL</a></div></div></div><p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">An overwhelming 92% of Democrats and only 35% of Republicans oppose an immediate re-opening, citing the effect of the deadly virus. Independents trace the outlook of the country, with 36% supporting opening up the country now, and 63% opposing such a move.</p><p style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 24px; margin-bottom: 24px; font-family: TiemposText, Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; line-height: 28px;\">Sill, when asked about the likelihood of agreeing to get a safe and effective vaccine, the new survey shows some skepticism about being inoculated. One-quarter of Americans said they were not likely to get vaccinated, even if a safe and effective vaccine was developed. About three-quarters said they would likely get the immunization.</p>', '<p>Người Mỹ, với biên độ 30 điểm lớn, có khả năng chống lại việc mở cửa đất nước bây giờ, tin rằng rủi ro đối với cuộc sống của con người khi mở cửa đất nước vượt xa số tiền kinh tế còn lại dưới sự khóa chặt hạn chế - một mối lo ngại hoàn toàn chia rẽ theo đường lối đảng phái, theo ABC News / Ipsos mới phát hành hôm thứ Sáu.</p><p><br></p><p>Trong cuộc thăm dò mới, được thực hiện bởi Ipsos hợp tác với ABC News sử dụng Bảng kiến ​​thức của Ipsos, gần hai phần ba người Mỹ cho biết họ phù hợp chặt chẽ hơn với quan điểm rằng việc mở quận bây giờ không thuận lợi vì sẽ dẫn đến tỷ lệ tử vong cao hơn , trong khi hơn một phần ba đồng ý với niềm tin rằng việc mở lại ngay lập tức có lợi để giảm thiểu tác động tiêu cực đến nền kinh tế.</p><p><br></p><p>Nhưng những thái độ đó cho thấy sự chia rẽ sâu sắc của đảng phái, với chỉ 6% đảng Dân chủ, so với 65% đảng Cộng hòa, đứng về phía quan điểm mở cửa đất nước bây giờ để cứu vãn nền kinh tế.</p><p><br></p><p>XEM THÊM: Người Mỹ không yên tâm về việc trở lại bình thường vì những hạn chế nới lỏng: POLL</p><p>92% đảng Dân chủ áp đảo và chỉ 35% đảng Cộng hòa phản đối việc mở lại ngay lập tức, với lý do ảnh hưởng của loại virus chết người này. Độc lập theo dõi triển vọng của đất nước, với 36% ủng hộ việc mở cửa đất nước hiện nay và 63% phản đối một động thái như vậy.</p><p><br></p><p>Sill, khi được hỏi về khả năng đồng ý tiêm vắc-xin an toàn và hiệu quả, cuộc khảo sát mới cho thấy một số hoài nghi về việc tiêm chủng. Một phần tư người Mỹ cho biết họ không có khả năng được tiêm vắc-xin, ngay cả khi vắc-xin an toàn và hiệu quả được phát triển. Khoảng ba phần tư cho biết họ có thể sẽ được chủng ngừa.</p>', '2020-05-09 21:57:16', '2020-05-09 21:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Gucci', 'brands/xRUDdDqPGEHhyF5P89rhx4dnH0CAiE1mYZHz7Yw6.png', '2020-05-07 06:19:32', '2020-05-11 04:48:12'),
(2, 'Lenova', 'brands/tsDobfQUWkwCoO2CpoGOolAxbMsDIqeSQ48V3HkE.png', '2020-05-07 10:03:45', '2020-05-11 04:47:30'),
(3, 'Sony', 'brands/QPl1aETbWY7uDR2EO63AwmxxfdEkD6MIYcjio09H.png', '2020-05-08 18:29:17', '2020-05-11 04:48:27'),
(4, 'Ocean', 'brands/g8OcOtwJdwtjONVmsz8Xz6BcDQ1MuPXUDI8YHL01.png', '2020-05-08 18:29:30', '2020-05-08 18:29:30'),
(5, 'Dell', 'brands/trRHiy3yo0VViDRjcLbammNezQ2OhizML27XdXVk.png', '2020-05-08 18:29:45', '2020-05-11 04:47:42'),
(6, 'Levi\'s', 'brands/sFCZwMJHUegHI6hYRl2fSN5jpJsrcUZkUyi47lv2.png', '2020-05-08 18:29:56', '2020-05-11 05:27:46'),
(9, 'Asuss', 'brands/hiWuIS693mmZo4X7oCnztJyF6zTkN22pjW7qN0Z0.png', '2020-05-11 04:46:23', '2020-05-11 04:46:36'),
(10, 'Addidas', 'brands/0tSSS5vmbKX8kSki1lGjACnoL5XOp8sZoNQkOVNP.png', '2020-05-11 04:46:46', '2020-05-11 05:27:20'),
(11, 'Nike', 'brands/3XbLbCb0uWrLcd7BRUlfllI00zGNGDIoJO60baMr.png', '2020-05-11 04:46:57', '2020-05-11 04:46:57'),
(12, 'Cannon', 'brands/4BBQpVbVSpHwsTrwBWTDsShUabz72og51CqVVkox.png', '2020-05-11 04:47:08', '2020-05-11 04:47:08'),
(13, 'Rado', 'brands/GLD980DxqkHKeLXANUv3PuagNFypNfI4fCN93MBw.png', '2020-05-11 04:48:57', '2020-05-11 04:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '2020-05-07 03:12:49', '2020-05-08 18:23:05'),
(6, 'Laptop $ iPad', '2020-05-07 03:52:30', '2020-05-11 06:51:24'),
(9, 'Clothing & Apparel', '2020-05-08 18:23:30', '2020-05-11 06:15:38'),
(10, 'Cooking', '2020-05-08 18:23:40', '2020-05-08 18:27:38'),
(12, 'Slide', '2020-05-11 05:36:23', '2020-05-11 10:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `subject`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'asubject', 'Name1', '0321132', 'sdfds@gmail.com', 'sdfsdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'coupon', '15', '2020-05-07 10:21:05', '2020-05-07 10:21:05'),
(2, 'qwe', '20', '2020-05-07 10:22:39', '2020-05-07 10:22:39'),
(5, 'c1', '2', '2020-05-07 10:25:58', '2020-05-07 10:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_05_05_165203_create_admins_table', 1),
(13, '2020_05_05_231828_create_categories_table', 2),
(14, '2020_05_05_231925_create_subcategories_table', 2),
(15, '2020_05_06_162138_create_brands_table', 2),
(18, '2020_05_07_151116_create_coupons_table', 3),
(19, '2020_05_07_175617_create_subscribers_table', 4),
(31, '2020_05_07_233311_create_products_table', 5),
(37, '2020_05_08_211304_create_blogs_table', 6),
(38, '2020_05_08_213358_create_blogcategories_table', 6),
(39, '2020_05_09_111625_create_wishlists_table', 7),
(40, '2020_05_09_224037_create_settings_table', 8),
(41, '2016_06_01_000001_create_oauth_auth_codes_table', 9),
(42, '2016_06_01_000002_create_oauth_access_tokens_table', 9),
(43, '2016_06_01_000003_create_oauth_refresh_tokens_table', 9),
(44, '2016_06_01_000004_create_oauth_clients_table', 9),
(45, '2016_06_01_000005_create_oauth_personal_access_clients_table', 9),
(46, '2020_05_10_101301_create_orders_table', 10),
(47, '2020_05_10_101432_create_orders_details_table', 10),
(48, '2020_05_10_101522_create_shipping_table', 10),
(49, '2020_05_10_131658_create_seo_table', 11),
(50, '2020_05_11_005811_create_sitesetting_table', 12),
(51, '2020_05_11_051540_create_contact_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '5gcwLv86TUffkJEFJWdULNY91XgUi9Wi26AQXugQ', NULL, 'http://localhost', 1, 0, 0, '2020-05-09 22:24:00', '2020-05-09 22:24:00'),
(2, NULL, 'Laravel Password Grant Client', 'dIiDemeyBQQ46g97QYfQqzHmzh2QCbBj6Nxas8On', 'users', 'http://localhost', 0, 1, 0, '2020-05-09 22:24:00', '2020-05-09 22:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-05-09 22:24:00', '2020-05-09 22:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paying_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blnc_transection` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `return_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_type`, `payment_id`, `paying_amount`, `blnc_transection`, `stripe_order_id`, `subtotal`, `shipping`, `vat`, `total`, `status`, `return_order`, `month`, `date`, `year`, `status_code`, `created_at`, `updated_at`) VALUES
(1, '1', 'stripe', 'card_1GhDckHgz5XuWiH4rozssOej', '130400', 'txn_1GhDclHgz5XuWiH4rb5ILkCs', '5eb7e9c28fb37', '1,291.00', '10', '3', '1304', '3', '0', 'May', '10-05-20', '2020', '12345', NULL, NULL),
(2, '1', 'stripe', 'card_1GhDipHgz5XuWiH4ZwnOu1Qh', '101300', 'txn_1GhDiqHgz5XuWiH49RBnt1Pt', '5eb7eb3b298e2', '985', '10', '3', '1013', '3', '1', 'May', '10-05-20', '2020', '31231', NULL, NULL),
(3, '1', 'stripe', 'card_1GhG6qHgz5XuWiH4VYZ4xOMF', '201300', 'txn_1GhG6sHgz5XuWiH4C4Yyzdyx', '5eb80f14cb7a8', '1985', '10', '3', '2013', '3', '2', 'May', '10-05-20', '2020', '676822', NULL, NULL),
(4, '4', 'stripe', 'card_1GhKA0Hgz5XuWiH4ciyw5CML', '156400', 'txn_1GhKA1Hgz5XuWiH4hNXGQZ6h', '5eb84be85059a', '1536', '10', '3', '1564', '3', '0', 'May', '10-05-20', '2020', '446944', NULL, NULL),
(5, '4', 'stripe', 'card_1GhL0JHgz5XuWiH40QgXjgZH', '6400', 'txn_1GhL0KHgz5XuWiH4FBVIUEIB', '5eb858934beae', '51.00', '10', '3', '64', '3', '0', 'april', '10-04-2020', '2020', '328220', NULL, NULL),
(6, '4', 'stripe', 'card_1GhLqHHgz5XuWiH4tSviWWJZ', '201300', 'txn_1GhLqIHgz5XuWiH46O0jaWnp', '5eb86528a3991', '2,000.00', '10', '3', '2013', '3', '0', 'May', '11-05-2020', '2020', '165646', NULL, NULL),
(9, '5', 'stripe', 'card_1GhVlcHgz5XuWiH4enIXaqGp', '140100', 'txn_1GhVldHgz5XuWiH458O6dBMr', '5eb8fa2f91b35', '1,388.00', '10', '3', '1401', '2', '0', 'May', '11-05-2020', '2020', '893377', NULL, NULL),
(12, '1', 'oncash', NULL, NULL, NULL, NULL, '44,860.00', '10', '3', '44873', '0', '0', 'May', '11-05-20', '2020', '374130', NULL, NULL),
(13, '1', 'stripe', 'card_1GhdLeHgz5XuWiH48JonqXcQ', '202100', 'txn_1GhdLfHgz5XuWiH4nNABNpJ2', '5eb96c06eac9b', '2,008.00', '10', '3', '2021', '0', '0', 'May', '11-05-2020', '2020', '265279', NULL, NULL),
(14, '1', 'stripe', 'card_1Gi1xrHgz5XuWiH4tEjY214W', '930300', 'txn_1Gi1xsHgz5XuWiH4c3shGe1k', '5ebadda7c2c81', '9,290.00', '10', '3', '9303', '1', '0', 'May', '13-05-2020', '2020', '710062', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singleprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `singleprice`, `totalprice`, `created_at`, `updated_at`) VALUES
(1, 1, '5', 'Elec 2', 'black', 'L', '3', '97', '291', NULL, NULL),
(2, 1, '2', 'Clothing 1', 'red', 'L', '2', '500', '1000', NULL, NULL),
(3, 2, '7', 'Dress', 'Red', 'X', '2', '500', '1000', NULL, NULL),
(4, 3, '2', 'Clothing 1', 'red', 'X', '4', '500', '2000', NULL, NULL),
(5, 4, '4', 'Furniture 1', 'Black', 'X', '3', '17', '51', NULL, NULL),
(6, 4, '2', 'Clothing 1', 'red', 'XL', '3', '500', '1500', NULL, NULL),
(7, 5, '4', 'Furniture 1', 'Black', 'L', '3', '17', '51', NULL, NULL),
(8, 6, '2', 'Clothing 1', 'red', 'X', '4', '500', '2000', NULL, NULL),
(9, 9, '5', 'Elec 2', 'black', 'L', '4', '97', '388', NULL, NULL),
(10, 9, '2', 'Clothing 1', 'red', 'X', '2', '500', '1000', NULL, NULL),
(11, 12, '4', 'Furniture 1', 'Black', 'L', '2', '17', '34', NULL, NULL),
(12, 12, '25', 'Clothing 7', '456', '4', '4', '4645', '18580', NULL, NULL),
(13, 12, '29', 'Clothing 11', '132', '54', '2', '13123', '26246', NULL, NULL),
(14, 13, '11', 'Hot Deal 3', 'a', 'L', '4', '502', '2008', NULL, NULL),
(15, 14, '25', 'Clothing 7', '456', '4', '2', '4645', '9290', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `now_trending` int(11) DEFAULT NULL,
  `new_releases` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `coming_soon` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `image_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `color`, `size`, `code`, `quantity`, `description`, `detail`, `price`, `discount`, `video_link`, `main_slider`, `now_trending`, `new_releases`, `best_rated`, `mid_slider`, `coming_soon`, `hot_deal`, `image_one`, `image_two`, `image_three`, `image_four`, `status`) VALUES
(1, 12, 26, 3, 'Mid slide', 'Black', 'X', '456456', '45', 'Nice Elec', '<h2 style=\"margin-bottom: 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '100', NULL, 'https://www.youtube.com/user/RiotGamesInc', NULL, NULL, NULL, NULL, 1, NULL, NULL, 'public/images/product/110520_12_21_51.jpg', 'public/images/product/1666154126263080.jpg', 'public/images/product/1666154126282199.jpg', 'public/images/product/1666154126303079.jpg', 1),
(2, 12, 25, 2, 'Main 2', 'red', 'X,L,XL', '456', '5', 'Dresses', '<h2 style=\"margin-bottom: 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Why do we use it?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '700', '500', 'https://www.youtube.com/user/RiotGamesInc', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/110520_12_47_31.png', 'public/images/product/1666155042394327.jpg', 'public/images/product/1666155042507233.jpg', 'public/images/product/1666155042512095.jpg', 1),
(4, 9, 15, 5, 'Clothing 6', 'Black,Blue', 'L,X,XL', '654456', '875', 'nice', '<p><br></p><div id=\"bannerR\" style=\"margin: 0px -160px 0px 0px; padding: 0px; position: sticky; top: 20px; width: 160px; height: 10px; float: right; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"></div><div id=\"Panes\" style=\"margin: 15px 0px 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: center;\"><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left;\"><h2 style=\"margin-bottom: 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div>', '78', '17', 'https://www.youtube.com/user/RiotGamesInc', NULL, NULL, 1, 1, NULL, NULL, 1, 'public/images/product/110520_12_04_53.jpg', 'public/images/product/1666157048961001.jpg', 'public/images/product/1666157048965814.jpg', 'public/images/product/1666157049086761.jpg', 1),
(5, 12, 25, 5, 'Main slide', 'black', 'L', '456456', '453', 'dsfsdf', '<p><br></p><div id=\"bannerR\" style=\"margin: 0px -160px 0px 0px; padding: 0px; position: sticky; top: 20px; width: 160px; height: 10px; float: right; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"></div><div id=\"Panes\" style=\"margin: 15px 0px 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: center;\"><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left;\"><h2 style=\"margin-bottom: 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div>', '200', '97', 'https://www.youtube.com/user/RiotGamesInc', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/110520_12_23_30.jpg', 'public/images/product/1666175673745924.png', 'public/images/product/1666175673761997.jpg', 'public/images/product/1666175673769409.jpg', 1),
(6, 12, 26, 1, 'Mid slide', 'black,red', 'L', '456456', '456', 'dsfsdf', '<p><br></p><div id=\"bannerR\" style=\"margin: 0px -160px 0px 0px; padding: 0px; position: sticky; top: 20px; width: 160px; height: 10px; float: right; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"></div><div id=\"Panes\" style=\"margin: 15px 0px 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: center;\"><div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left;\"><h2 style=\"margin-bottom: 10px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div>', '456', '400', 'https://www.youtube.com/user/RiotGamesInc', NULL, NULL, NULL, NULL, 1, NULL, NULL, 'public/images/product/110520_12_49_50.jpg', 'public/images/product/1666175712541623.png', 'public/images/product/1666175712557236.jpg', 'public/images/product/1666175712563557.jpg', 1),
(7, 9, 27, 2, 'Hot deal 4', 'Red', 'X', '45645', '12', 'dffd', '<p>adsasd</p>', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'public/images/product/110520_13_03_02.jpg', 'public/images/product/1666186348625533.jpg', 'public/images/product/1666186348643875.jpg', 'public/images/product/1666186348663509.jpg', 1),
(8, 9, 27, 1, 'Hot Deal 2', 'a,White', 'c', '65', '546', 'Hot deal2', '<p>adsa</p>', '996', '700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'public/images/product/110520_12_06_39.jpg', 'public/images/product/1666187435997090.jpg', 'public/images/product/1666187436007892.jpg', 'public/images/product/1666187436016384.jpg', 1),
(9, 9, 27, 3, 'Hot Deal 1', 'a,Red', 'l', '57', '456', '456', '<p>ddasd</p>', '546', '456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'public/images/product/110520_12_18_57.jpg', 'public/images/product/100520_22_27_20.jpg', 'public/images/product/1666187777365282.jpg', 'public/images/product/1666187777391959.jpg', 1),
(10, 12, 25, 1, 'Main slide 3', 'Red,Blue', 'L,xl', '465', '100', '264', '<p>hrt</p>', '200', '100', 'https://www.youtube.com/user/RiotGamesInc', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/110520_12_02_29.jpg', 'public/images/product/1666345054436472.jpg', 'public/images/product/1666345054452513.jpg', 'public/images/product/1666345054469488.jpg', 1),
(11, 9, 27, 2, 'Hot Deal 3', 'Yello,a', 'L', '768', '12', 'dg', '<p>ads</p>', '502', NULL, 'https://www.youtube.com/user/RiotGamesInc', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'public/images/product/110520_12_17_40.jpg', 'public/images/product/1666345216473377.jpg', 'public/images/product/1666345216479925.jpg', 'public/images/product/1666345216485246.jpg', 1),
(12, 9, 27, 2, 'Hot deal 5', 'L,m', 'A', '456', '45', '456', '<p>a</p>', '453', NULL, 'https://www.youtube.com/user/RiotGamesInc', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'public/images/product/110520_12_46_58.jpg', 'public/images/product/1666345414013500.jpg', 'public/images/product/1666345414018535.jpg', 'public/images/product/1666345414024438.jpg', 1),
(13, 9, 9, 2, 'Clothing 5', NULL, NULL, '676822', '546', '4', '<p>4</p>', '45', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'public/images/product/110520_13_19_45.jpg', 'public/images/product/1666345556503544.jpg', 'public/images/product/1666345556509881.jpg', 'public/images/product/1666345556515526.jpg', 1),
(14, 9, 27, 2, 'Hot deal 6', 'l', 'L', '654456', '200', '5643', '<p>b</p>', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'public/images/product/110520_13_07_04.jpg', 'public/images/product/1666345613067271.jpg', 'public/images/product/1666345613073128.jpg', 'public/images/product/1666345613079181.jpg', 1),
(15, 9, 15, 2, 'Clothing 3', 'l', NULL, '654456', '45', 'gk', '<p>4</p>', '87', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'public/images/product/110520_13_57_41.jpg', 'public/images/product/1666345768253082.jpg', 'public/images/product/1666345768259658.jpg', 'public/images/product/1666345768267892.jpg', 1),
(16, 9, 21, 1, 'Clothing 1', 'Blue,Black', NULL, '1231', '100', 'nice', '<p>abc</p>', '100', NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 'public/images/product/1666400335808590.jpg', 'public/images/product/1666400335844054.jpg', 'public/images/product/1666400335853690.jpg', 'public/images/product/1666400335862242.jpg', 1),
(17, 1, 9, 3, 'Electronic 1', 'Blue', 'L', '645456', '100', 'ad', '<p>a</p>', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/1666400598081903.jpg', 'public/images/product/1666400598092526.jpg', 'public/images/product/1666400598100179.jpg', 'public/images/product/1666400598106676.jpg', 1),
(18, 1, 9, 5, 'Electronic 2', 'Blue', 'L', '456', '100', 'av', '<p>a</p>', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/110520_17_06_10.jpg', 'public/images/product/1666400796699113.jpg', 'public/images/product/1666400796704648.jpg', 'public/images/product/1666400796709677.jpg', 1),
(21, 1, 9, 3, 'Electronic 3', 'a', '45', '45', '4545', '45', '<p>4545</p>', '4545', '454', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/110520_17_24_09.jpg', 'public/images/product/1666401374011666.jpg', 'public/images/product/1666401374016023.jpg', 'public/images/product/1666401374020515.jpg', 1),
(22, 9, 16, 3, 'Clothing 2', '4', '44', '4456', '45', '456', '<p>476</p>', '456', '12', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'public/images/product/1666401594598925.jpg', 'public/images/product/1666401594612093.jpg', 'public/images/product/1666401594622171.jpg', 'public/images/product/1666401594631333.jpg', 1),
(23, 9, 17, 2, 'Clothing 4', '2', '4', '456', '46', '789', '<p><br></p><p>o</p>', '789', '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/1666402074124743.jpg', 'public/images/product/1666402074138170.jpg', 'public/images/product/1666402074148330.jpg', 'public/images/product/1666402074159338.jpg', 1),
(24, 9, 17, 4, 'Clothing 7', '1', '1', '13', '45', '123', '<p>456</p>', '14564', '13', NULL, NULL, 1, 1, 1, NULL, 1, NULL, 'public/images/product/1666402414723075.jpg', 'public/images/product/1666402414737331.jpg', 'public/images/product/1666402414747077.jpg', 'public/images/product/1666402414755830.jpg', 1),
(25, 9, 17, 4, 'Clothing 7', '456,4', '4', '5456', '456', '45', '<p>645</p>', '446456', '4645', NULL, NULL, 1, 1, 1, NULL, 1, 1, 'public/images/product/1666402503199207.jpg', 'public/images/product/1666402503213785.jpg', 'public/images/product/1666402503223043.jpg', 'public/images/product/1666402503232375.jpg', 1),
(26, 9, 16, 3, 'Clothing 8', '456', '456', '456', '456', '456', '<p>456</p>', '20000', '13123', NULL, NULL, 1, 1, 1, NULL, 1, NULL, 'public/images/product/1666402602568114.jpg', 'public/images/product/1666402602580226.jpg', 'public/images/product/1666402602589368.jpg', 'public/images/product/1666402602598669.jpg', 1),
(27, 9, 16, 10, 'Clothing 9', '456,4,5', '4,3', '456', '321', '456', '<p>46</p>', '115', NULL, NULL, NULL, 1, 1, 1, NULL, 1, NULL, 'public/images/product/1666402677663286.jpg', 'public/images/product/1666402677677967.jpg', 'public/images/product/1666402677686630.jpg', 'public/images/product/1666402677696019.jpg', 1),
(28, 9, 17, 10, 'Clothing 10', '12', '12', '123', '1231', '123', '<p>132</p>', '132123', NULL, NULL, NULL, 1, 1, 1, NULL, 1, NULL, 'public/images/product/1666402827411794.jpg', 'public/images/product/1666402827424783.jpg', 'public/images/product/1666402827434144.jpg', 'public/images/product/1666402827442934.jpg', 1),
(29, 9, 16, 2, 'Clothing 11', '132', '54', '676822', '456456', '456', '<p>46</p>', '13123', NULL, NULL, NULL, 1, 1, 1, NULL, 1, NULL, 'public/images/product/1666402893061240.jpg', 'public/images/product/1666402893079575.jpg', 'public/images/product/1666402893088871.jpg', 'public/images/product/1666402893098162.jpg', 1),
(30, 9, 16, 3, 'Clothing 12', '4', '456', '456', '456', '456', '<p>456</p>', '456', NULL, NULL, NULL, 1, 1, 1, NULL, 1, NULL, 'public/images/product/1666402938581416.jpg', 'public/images/product/1666402938595206.jpg', 'public/images/product/1666402938604640.jpg', 'public/images/product/1666402938612998.jpg', 1),
(31, 1, 9, 3, 'Electronic 4', '4', '4', '45645', '45', '45', '<p>456</p>', '456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/1666414416136848.jpg', 'public/images/product/1666414416162467.jpg', 'public/images/product/1666414416168787.jpg', 'public/images/product/1666414416175082.jpg', 1),
(32, 6, 13, 5, 'Laptop 1', '2', '45', '123', '45', '45', '<p>45</p>', '45', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/1666414497228420.jpg', 'public/images/product/1666414497236830.jpg', 'public/images/product/1666414497244729.jpg', 'public/images/product/1666414497251844.jpg', 1),
(33, 1, 9, 9, 'Electronic 5', '54', '45', '456', '453', '45', '<p>32</p>', '1345', '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/1666414553953602.jpg', 'public/images/product/1666414553964488.jpg', 'public/images/product/1666414553971786.jpg', 'public/images/product/1666414553978370.jpg', 1),
(34, 6, 13, 4, 'iPad 2', '3', '43', '123', '43', '543', '<p>54</p>', '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/1666414661507306.jpg', 'public/images/product/1666414661532832.jpg', 'public/images/product/1666414661541105.jpg', 'public/images/product/1666414661549847.jpg', 1),
(35, 6, 14, 4, 'iPad5', '113', '312', '123123', '13', '1321', '<p>43</p>', '13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/1666414709115582.jpg', 'public/images/product/1666414709132147.jpg', 'public/images/product/1666414709139944.jpg', 'public/images/product/1666414709148030.jpg', 1),
(36, 6, 14, 11, 'iPad7', '12', '12', '12123', '3112', '123', '<p>123</p>', '12312', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/1666414860847346.jpg', 'public/images/product/1666414860856100.jpg', 'public/images/product/1666414860862818.jpg', 'public/images/product/1666414860871060.jpg', 1),
(37, 6, 13, 3, 'IPad 8', '13', '123', '101', '123', '45', '<p>478</p>', '123', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/1666414946477669.jpg', 'public/images/product/1666414946486694.jpg', 'public/images/product/1666414946494886.jpg', 'public/images/product/1666414946550278.jpg', 0),
(38, 6, 14, 13, 'iPad 10', '4', '45', '543', '312', '34453', '<p>543</p>', '453', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/1666415011738240.jpg', 'public/images/product/1666415011750599.jpg', 'public/images/product/1666415011757141.jpg', 'public/images/product/1666415011764857.jpg', 1),
(39, 6, 14, 5, 'iPad 15', '45', '45', '564', '465', '45', '<p>4564</p>', '400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/1666415088572803.jpg', 'public/images/product/1666415088581096.jpg', 'public/images/product/1666415088589750.jpg', 'public/images/product/1666415088596449.jpg', 1),
(40, 1, 9, 4, 'Electronic 8', '45', '45', '56', '456', '456', '<p>768</p>', '123', '456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'public/images/product/1666415153217685.jpg', 'public/images/product/1666415153227748.jpg', 'public/images/product/1666415153236426.jpg', 'public/images/product/1666415153242762.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(10) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bing_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `google_analytics`, `bing_analytics`, `created_at`, `updated_at`) VALUES
(1, 'Title good', 'Nice author', 'new tag', 'description', 'google nice', 'Bing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adderss` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `shipping_charge`, `shopname`, `email`, `phone`, `adderss`, `logo`, `created_at`, `updated_at`) VALUES
(1, '3', '10', 'LK SHop', 'lkshopping@gmail.com', '123456789', 'vietnam', NULL, NULL, NULL),
(2, '3', '10', 'LK SHop', 'lkshopping@gmail.com', '123456789', 'vietnam', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `ship_name`, `ship_phone`, `ship_email`, `ship_address`, `ship_city`, `created_at`, `updated_at`) VALUES
(1, '1', 'hello', '456', 'ariyan@gmail.com', 'asd', 'ft', NULL, NULL),
(2, '2', 'new', '0321132', 'ariyan@gmail.com', 'sda', 'ft', NULL, NULL),
(3, '3', 'new', '0967239999', 'sdfds@gmail.com', 'asd', 'asd', NULL, NULL),
(4, '4', 'Name1', '0321132', 'admin@gmail.com', 'addresss1', 'city3213', NULL, NULL),
(5, '5', 'new', '0967239999', 'admin@gmail.com', 'sda', 'asd', NULL, NULL),
(6, '6', 'new', '456', 'ariyan@gmail.com', 'asd', 'asd', NULL, NULL),
(7, '7', 'new', '0967239999', 'ximew12881@zaelmo.com', 'asd', 'asd', NULL, NULL),
(8, '8', 'hello', '456', 'ariyan@gmail.com', 'sda', 'asd', NULL, NULL),
(9, '9', 'new 2', '456', 'sdfds@gmail.com', 'sad', 'city3213', NULL, NULL),
(10, '12', 'asdasd', '456', 'ariyan@gmail.com', 'asd', 'asd', NULL, NULL),
(11, '13', 'new 2', '456', 'ariyan@gmail.com', 'sda', 'city3213', NULL, NULL),
(12, '14', 'hello', '0967239999', 'admin12345@gmail.com', 'asd', 'asd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sitesetting`
--

CREATE TABLE `sitesetting` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesetting`
--

INSERT INTO `sitesetting` (`id`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `youtube`, `instagram`, `twitter`, `created_at`, `updated_at`) VALUES
(1, '6501026783', '0987465423', 'LKshopping@gmail.com', 'LKcompany', 'LKcompany street', 'LKshopping@facebook.com', 'LKcompany YouTube', 'LKcompany Instagram', 'LKcompany  Twitter', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(9, 1, 'Desktop Computers', '2020-05-08 18:24:03', '2020-05-08 18:24:03'),
(10, 1, 'Monitors', '2020-05-08 18:24:17', '2020-05-08 18:24:17'),
(11, 1, 'Laptops', '2020-05-08 18:24:27', '2020-05-08 18:24:27'),
(12, 1, 'iPad & Tablet', '2020-05-08 18:24:50', '2020-05-08 18:24:50'),
(13, 6, 'Beds, Frames & Bases', '2020-05-08 18:25:22', '2020-05-08 18:25:22'),
(14, 6, 'Nightstands', '2020-05-08 18:25:53', '2020-05-08 18:25:53'),
(15, 9, 'Shoes', '2020-05-08 18:26:05', '2020-05-08 18:26:05'),
(16, 9, 'Dress', '2020-05-08 18:26:13', '2020-05-08 18:26:13'),
(17, 9, 'Accessories', '2020-05-08 18:26:37', '2020-05-08 18:26:37'),
(18, 10, 'Pots', '2020-05-08 18:26:53', '2020-05-08 18:26:53'),
(19, 10, 'Cookware Sets', '2020-05-08 18:27:20', '2020-05-08 18:27:20'),
(20, 1, 'New sub', '2020-05-09 06:44:41', '2020-05-09 06:44:41'),
(21, 9, 'New Releases', '2020-05-11 06:16:25', '2020-05-11 06:16:25'),
(22, 9, 'Now Trending', '2020-05-11 06:17:32', '2020-05-11 06:17:32'),
(23, 1, 'Light', '2020-05-11 10:23:56', '2020-05-11 10:23:56'),
(24, 1, 'Chair', '2020-05-11 10:24:13', '2020-05-11 10:24:13'),
(25, 12, 'Main Slide', '2020-05-11 10:37:00', '2020-05-11 10:37:00'),
(26, 12, 'Mid Slide', '2020-05-11 10:37:12', '2020-05-11 10:37:12'),
(27, 9, 'Hot deal', '2020-05-11 10:40:14', '2020-05-11 10:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'hobow47026@gmail.com', '2020-05-07 11:42:16', '2020-05-07 11:42:16'),
(5, 'asjlk@gmail.com', '2020-05-07 12:27:20', '2020-05-07 12:27:20'),
(6, 'new@gmail.com', '2020-05-08 18:11:53', '2020-05-08 18:11:53'),
(7, 'sub@gmail.com', '2020-05-08 18:18:15', '2020-05-08 18:18:15'),
(8, 'sub2@gmail.com', '2020-05-08 18:18:49', '2020-05-08 18:18:49'),
(9, 'Newsuscriber@gmail.com', '2020-05-11 17:21:43', '2020-05-11 17:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `avt`, `provider`, `provider_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'khanh123', '123456789', 'khanh123@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$LTcLP3efbUg5Ud4Yl2fspubohIDdvg/RxX9tFD7Te9QkdBqVZ6Z/W', NULL, NULL, NULL),
(2, 'khanh12345', '123456789', 'khanh12345@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$FlY/FwNLs0AB.VfKK3zvFuWHh1CVcLMAXoXh8v58ne4AhCYs8FQT.', NULL, NULL, NULL),
(3, 'asdasd', '0967239999', 'xia1@zaelmo.com', NULL, NULL, NULL, NULL, '$2y$10$XRnImmM0rbJ6B09Zkvi47u89pJyNpxUHa7N8XxCYgXnUZkhvf2vhK', NULL, '2020-05-08 23:35:01', '2020-05-08 23:35:01'),
(4, 'afdsas', '456456464', 'sdfds@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$ndr9jo19SIO3JW.dEORnl.FZZG.Hthlh8oWAwlLTUgSjMzt3UkA22', NULL, '2020-05-08 23:42:20', '2020-05-14 01:10:27'),
(5, 'new', '0321132', 'ximew12881@zaelmo.com', NULL, NULL, NULL, NULL, '$2y$10$dAHLrsoJ/z8SKZYVllO8iOuaN1ipLdXM3n1YBFehHk7OPUyIRqMka', NULL, '2020-05-10 23:54:07', '2020-05-10 23:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL),
(2, 1, 7, NULL, NULL),
(3, 4, 2, NULL, NULL),
(4, 4, 4, NULL, NULL),
(5, 4, 5, NULL, NULL),
(6, 4, 7, NULL, NULL),
(7, 4, 8, NULL, NULL),
(8, 4, 9, NULL, NULL),
(9, 1, 8, NULL, NULL),
(10, 1, 27, NULL, NULL),
(11, 1, 17, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesetting`
--
ALTER TABLE `sitesetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogcategories`
--
ALTER TABLE `blogcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sitesetting`
--
ALTER TABLE `sitesetting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
