<?php
define ('company_name','某知名企业（上海）有限公司');
define ('time','2018年1月');

define ('K_TCPDF_EXTERNAL_CONFIG', true);

define ('K_PATH_IMAGES', dirname(__FILE__).'/../images/');

/**
 * Deafult image logo used be the default Header() method.
 * Please set here your own logo or an empty string to disable it.
 */
define ('PDF_HEADER_LOGO', '111.png');

/**
 * Header logo image width in user units.
 */
define ('PDF_HEADER_LOGO_WIDTH', 10);

/**
 * Cache directory for temporary files (full path).
 */
define ('K_PATH_CACHE', sys_get_temp_dir().'/');

/**
 * Generic name for a blank image.
 */
define ('K_BLANK_IMAGE', '_blank.png');

/**
 * Page format.
 */
define ('PDF_PAGE_FORMAT', 'A4');

/**
 * Page orientation (P=portrait, L=landscape).
 */
define ('PDF_PAGE_ORIENTATION', 'P');

/**
 * Document creator.
 */
define ('PDF_CREATOR', 'TCPDF');

/**
 * Document author.
 */
define ('PDF_AUTHOR', 'TCPDF');

/**
 * Header title.
 */
define ('PDF_HEADER_TITLE', '某知名企业（上海）有限公司 2018 年竞争力报告');

/**
 * Header description string.
 */
define ('PDF_HEADER_STRING', "数据由芯乐提供并制作\n2018 版权所有");

/**
 * Document unit of measure [pt=point, mm=millimeter, cm=centimeter, in=inch].
 */
define ('PDF_UNIT', 'mm');

/**
 * Header margin.
 */
define ('PDF_MARGIN_HEADER', 1);

/**
 * Footer margin.
 */
define ('PDF_MARGIN_FOOTER', 40);

/**
 * Top margin.
 */
define ('PDF_MARGIN_TOP', 16);

/**
 * Bottom margin.
 */
define ('PDF_MARGIN_BOTTOM',16);

/**
 * Left margin.
 */
define ('PDF_MARGIN_LEFT', 15);

/**
 * Right margin.
 */
define ('PDF_MARGIN_RIGHT', 10);

/**
 * Default main font name.
 */
define ('PDF_FONT_NAME_MAIN', 'simhei');

/**
 * Default main font size.
 */
define ('PDF_FONT_SIZE_MAIN', 8);

/**
 * Default data font name.
 */
define ('PDF_FONT_NAME_DATA', 'simhei');

/**
 * Default data font size.
 */
define ('PDF_FONT_SIZE_DATA', 9);

/**
 * Default monospaced font name.
 */
define ('PDF_FONT_MONOSPACED', 'courier');

/**
 * Ratio used to adjust the conversion of pixels to user units.
 */
define ('PDF_IMAGE_SCALE_RATIO', 1.25);

/**
 * Magnification factor for titles.
 */
define('HEAD_MAGNIFICATION', 1.1);

/**
 * Height of cell respect font height.
 */
define('K_CELL_HEIGHT_RATIO', 1.25);

/**
 * Title magnification respect main font size.
 */
define('K_TITLE_MAGNIFICATION', 1.3);

/**
 * Reduction factor for small font.
 */
define('K_SMALL_RATIO', 2/3);

/**
 * Set to true to enable the special procedure used to avoid the overlappind of symbols on Thai language.
 */
define('K_THAI_TOPCHARS', true);

/**
 * If true allows to call TCPDF methods using HTML syntax
 * IMPORTANT: For security reason, disable this feature if you are printing user HTML content.
 */
define('K_TCPDF_CALLS_IN_HTML', true);

/**
 * If true and PHP version is greater than 5, then the Error() method throw new exception instead of terminating the execution.
 */
define('K_TCPDF_THROW_EXCEPTION_ERROR', false);

//============================================================+
// END OF FILE
//============================================================+
